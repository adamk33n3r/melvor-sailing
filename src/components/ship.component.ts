import { Ship, ShipState } from '../ts/ship';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { formatTime, getElementByIdWithoutId as getElementByIdAndRemoveId, tickToTime } from '../ts/util';
import { DropdownComponent } from './dropdown/dropdown.component';
import { EquipmentComponent } from './equipment/equipment.component';

export function ShipComponent(ship: Ship) {
    let self = {} as ReturnType<typeof ShipComponent>;
    return {
        $template: '#sailing-ship-template',
        ship,
        isLocked: true,
        lockedImgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('img/sailing-boat.png'),
        readyToSail: true,
        onTrip: false,
        hasReturned: false,
        returnTime: tickToTime(ship.modifiedInterval / TICK_INTERVAL, true),
        returnTimer: 'Done',
        lootImg: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('melvor:assets/media/bank/pirate_booty.png'),
        hull: EquipmentComponent('Hull', 'img/hull_bronze.png'),
        deckItems: EquipmentComponent('Deck_Items', 'img/hull_empty.png'),
        rudder: EquipmentComponent('Rudder', 'img/hull_empty.png'),
        ram: EquipmentComponent('Ram', 'img/hull_empty.png'),
        port: DropdownComponent({
            name: '',
            side: 'left',
            block: true,
            selected: { name: ship.port.name, value: ship.port, media: ship.port.media },
            options: game.sailing.ports.allObjects.map((p: Port) => {
                const hasLevel = game.sailing.level >= p.level;
                return {
                    name: hasLevel ? p.name : `Unlocked at Level ${p.level}`,
                    value: p,
                    media: p.media,
                    disabled: !hasLevel,
                };
            }),
        }, (port: Port) => {
            ship.port = port;
            self.returnTime = tickToTime(ship.modifiedInterval / TICK_INTERVAL, true);
            self.updateGrants();
        }),
        xpIcon: null as unknown as XpIconElement,
        masteryIcon: null as unknown as MasteryXpIconElement,
        masteryPoolIcon: null as unknown as MasteryPoolIconElement,
        intervalIcon: null as unknown as IntervalIconElement,
        progressBar: null as unknown as ProgressBarElement,
        update() {
            self.isLocked = game.sailing.level < ship.action.level;
            self.hull.update();
            self.deckItems.update();
            self.rudder.update();
            self.ram.update();
            self.port.setEnabled(this.readyToSail);
            self.returnTime = tickToTime(ship.modifiedInterval / TICK_INTERVAL, true);
            self.port.setData({
                selected: { name: ship.port.name, value: ship.port, media: ship.port.media },
                options: game.sailing.ports.allObjects.map((p: Port) => {
                    const hasLevel = game.sailing.level >= p.level;
                    return {
                        name: hasLevel ? p.name : `Unlocked at Level ${p.level}`,
                        value: p,
                        media: p.media,
                        disabled: !hasLevel,
                    };
                }),
            });
            self.updateGrants();
            self.updateProgressBar();
        },
        updateGrants() {
            const baseMasteryXPToAdd = game.sailing.getBaseMasteryXPToAddForAction(ship.action, ship.scaledForMasteryInterval);
            const masteryXPToAdd = game.sailing.getMasteryXPToAddForAction(ship.action, ship.scaledForMasteryInterval);
            const masteryPoolXPToAdd = game.sailing.getMasteryXPToAddToPool(masteryXPToAdd);
            self.xpIcon.setXP(game.sailing.modifyXP(ship.baseXP, ship.action), ship.baseXP);
            self.xpIcon.setSources(game.sailing.getXPSources(ship.action));
            self.masteryIcon.setXP(masteryXPToAdd, baseMasteryXPToAdd);
            self.masteryIcon.setSources(game.sailing.getMasteryXPSources(ship.action));
            self.masteryPoolIcon.setXP(masteryPoolXPToAdd);
            if (game.unlockedRealms.length > 1) {
                this.masteryPoolIcon.setRealm(game.defaultRealm);
             } else {
                this.masteryPoolIcon.hideRealms();
             }
            self.intervalIcon.setCustomInterval(formatTime(ship.modifiedInterval/1000), game.sailing.getIntervalSources(ship.action));
        },
        updateProgressBar() {
            if (ship.onTrip) {
                self.progressBar.animateProgressFromTimer(ship.sailTimer);
            } else {
                self.progressBar.stopAnimation();
            }
        },
        mounted() {
            // HACK: This is so we can reference the reactive proxy object `this` in the dropdown callback
            self = this;
            const parent = document.getElementById(self.ship.localID);
            if (!parent) throw new Error(`Could not find parent element with id: ${self.ship.localID}`);
            // ui.create(self.hull, getElementByIdAndRemoveId('hull-grid', parent));
            // ui.create(self.deckItems, getElementByIdAndRemoveId('deck-grid', parent));
            // ui.create(self.rudder, getElementByIdAndRemoveId('rudder-grid', parent));
            // ui.create(self.ram, getElementByIdAndRemoveId('ram-grid', parent));
            ui.create(self.port, getElementByIdAndRemoveId('dropdown', parent));

            setInterval(() => {
                self.returnTimer = tickToTime(self.ship.sailTimer.ticksLeft);
                if (self.ship.sailTimer.ticksLeft <= 0) self.returnTimer = 'Done';
                self.updateProgressBar();
            }, 1000);

            self.ship.registerOnUpdate(() => {
                self.readyToSail = self.ship.state == ShipState.ReadyToSail;
                self.onTrip = self.ship.state == ShipState.OnTrip;
                self.hasReturned = self.ship.state == ShipState.HasReturned;
                self.returnTimer = tickToTime(self.ship.sailTimer.ticksLeft);
                if (self.ship.sailTimer.ticksLeft <= 0) self.returnTimer = 'Done';
                self.port.setEnabled(self.readyToSail);

                self.updateGrants();
                self.updateProgressBar();
            });


            const grantsContainer = getElementByIdAndRemoveId('grants-container', parent);

            self.xpIcon = getElementByIdAndRemoveId('sailing-xp', grantsContainer);
            self.masteryIcon = getElementByIdAndRemoveId('sailing-mastery-xp', grantsContainer);
            self.masteryPoolIcon = getElementByIdAndRemoveId('sailing-pool-xp', grantsContainer);
            self.intervalIcon = getElementByIdAndRemoveId('sailing-interval', grantsContainer);

            self.progressBar = getElementByIdAndRemoveId('sailing-progress-bar', parent);
        },

        setSail() {
            ship.setSail();
            self.updateProgressBar();
        },
        collectLoot() {
            ship.collectLoot();
        },
        async viewLoot() {
            return SwalLocale.fire({
                iconHtml: `<img class="mbts__logo-img" src="${game.sailing.media}" />`,
                title: ship.port.name,
                html: ship.port.currencyDrops.map((drop) => `Always Drops:<br>${formatNumber(drop.min)} - ${formatNumber(drop.max)} <img class="skill-icon-xs" src="${drop.currency.media}"> ${drop.currency.name}`).join('<br>') + '<hr>' +
                    `${ship.port.minRolls} - ${ship.port.maxRolls} Rolls<br>` +
                    ship.port.lootTable.sortedDropsArray.map((drop) => `${drop.minQuantity} - ${drop.maxQuantity} x <img class="skill-icon-xs" src="${drop.item.media}"/> ${drop.item.name}`).join('<br>'),
            });
        },
    }
}
