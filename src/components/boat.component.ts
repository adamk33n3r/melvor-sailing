import { Boat, BoatState } from '../ts/boat';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { formatTime, getElementByIdWithoutId as getElementByIdAndRemoveId, tickToTime } from '../ts/util';
import { DropdownComponent } from './dropdown/dropdown.component';
import { EquipmentComponent, EquipmentComponentProps } from './equipment/equipment.component';

export function BoatComponent(boat: Boat) {
    let self = {} as ReturnType<typeof BoatComponent>;
    return {
        $template: '#sailing-boat-template',
        boat,
        isLocked: true,
        lockedImgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('img/sailing-boat.png'),
        readyToSail: true,
        onTrip: false,
        hasReturned: false,
        returnTime: tickToTime(boat.modifiedInterval / TICK_INTERVAL, true),
        returnTimer: 'Done',
        hull: EquipmentComponent('Hull', 'img/hull_bronze.png'),
        deckItems: EquipmentComponent('Deck_Items', 'img/hull_empty.png'),
        rudder: EquipmentComponent('Rudder', 'img/hull_empty.png'),
        ram: EquipmentComponent('Ram', 'img/hull_empty.png'),
        port: DropdownComponent({
            name: '',
            side: 'left',
            selected: { name: boat.port.name, value: boat.port, media: boat.port.media },
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
            boat.port = port;
            self.returnTime = tickToTime(boat.modifiedInterval / TICK_INTERVAL, true);
            self.updateGrants();
        }),
        xpIcon: null as XpIconElement,
        masteryIcon: null as MasteryXpIconElement,
        masteryPoolIcon: null as MasteryPoolIconElement,
        intervalIcon: null as IntervalIconElement,
        progressBar: null as ProgressBarElement,
        update() {
            self.isLocked = game.sailing.level < boat.action.level;
            self.hull.update();
            self.deckItems.update();
            self.rudder.update();
            self.ram.update();
            self.port.setEnabled(this.readyToSail);
            self.returnTime = tickToTime(boat.modifiedInterval / TICK_INTERVAL, true);
            self.port.setData({
                selected: { name: boat.port.name, value: boat.port, media: boat.port.media },
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
            const baseMasteryXPToAdd = game.sailing.getBaseMasteryXPToAddForAction(boat.action, boat.scaledForMasteryInterval);
            const masteryXPToAdd = game.sailing.getMasteryXPToAddForAction(boat.action, boat.scaledForMasteryInterval);
            const masteryPoolXPToAdd = game.sailing.getMasteryXPToAddToPool(masteryXPToAdd);
            self.xpIcon.setXP(game.sailing.modifyXP(boat.baseXP, boat.action), boat.baseXP);
            self.xpIcon.setSources(game.sailing.getXPSources(boat.action));
            self.masteryIcon.setXP(masteryXPToAdd, baseMasteryXPToAdd);
            self.masteryIcon.setSources(game.sailing.getMasteryXPSources(boat.action));
            self.masteryPoolIcon.setXP(masteryPoolXPToAdd);
            game.unlockedRealms.length > 1 ? this.masteryPoolIcon.setRealm(game.defaultRealm) : this.masteryPoolIcon.hideRealms();
            self.intervalIcon.setCustomInterval(formatTime(boat.modifiedInterval/1000), game.sailing.getIntervalSources(boat.action));
        },
        updateProgressBar() {
            if (self.progressBar !== undefined) {
                if (boat.onTrip) {
                    self.progressBar.animateProgressFromTimer(boat.sailTimer);
                } else {
                    self.progressBar.stopAnimation();
                }
            }
        },
        mounted() {
            // HACK: This is so we can reference the reactive proxy object `this` in the dropdown callback
            self = this;
            const parent = document.getElementById(self.boat.localID);
            ui.create(self.hull, getElementByIdAndRemoveId('hull-grid', parent));
            ui.create(self.deckItems, getElementByIdAndRemoveId('deck-grid', parent));
            ui.create(self.rudder, getElementByIdAndRemoveId('rudder-grid', parent));
            ui.create(self.ram, getElementByIdAndRemoveId('ram-grid', parent));
            ui.create(self.port, getElementByIdAndRemoveId('dropdown', parent));

            setInterval(() => {
                self.returnTimer = tickToTime(self.boat.sailTimer.ticksLeft);
                if (self.boat.sailTimer.ticksLeft === 0) self.returnTimer = 'Done';
                self.updateProgressBar();
            }, 1000);

            self.boat.registerOnUpdate(() => {
                self.readyToSail = self.boat.state == BoatState.ReadyToSail;
                self.onTrip = self.boat.state == BoatState.OnTrip;
                self.hasReturned = self.boat.state == BoatState.HasReturned;
                self.returnTimer = tickToTime(self.boat.sailTimer.ticksLeft);
                if (self.boat.sailTimer.ticksLeft === 0) self.returnTimer = 'Done';
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
            boat.setSail();
            self.updateProgressBar();
        },
        collectLoot() {
            boat.collectLoot();
        },
        viewLoot() {
            SwalLocale.fire({
              iconHtml: `<img class="mbts__logo-img" src="${game.sailing.media}" />`,
              title: boat.port.name,
              html: boat.port.currencyDrops.map((drop) => `${formatNumber(drop.min)} - ${formatNumber(drop.max)} <img class="skill-icon-xs" src="${drop.currency.media}"> ${drop.currency.name}`).join('<br>') + '<hr>' +
                `${boat.port.minRolls} - ${boat.port.maxRolls} Rolls<br>` +
                boat.port.lootTable.sortedDropsArray.map((drop) => `${drop.minQuantity} - ${drop.maxQuantity} x <img class="skill-icon-xs" src="${drop.item.media}"/> ${drop.item.name}`).join('<br>'),
            });
        }
    }
}
