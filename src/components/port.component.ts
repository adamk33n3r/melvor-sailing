import { LockState, Ship, ShipState } from '../ts/ship';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { formatTime, getElementByIdAndRemoveId } from '../ts/util';
import { DropdownComponent } from './dropdown/dropdown.component';

function getShipOptions() {
    return game.sailing.ships.allObjects.map((s: Ship) => {
        // Make hover show equipment?

        // const hasLevel = s.hasLevelRequirements();
        // const levelReqs = s.getLevelRequirements();
        // const hoverEle = createElement('div');
        // for (const req of levelReqs) {
        //     const reqSpan = createElement('span', { className: 'font-size-sm' });
        //     reqSpan.append(...req.getNodes('skill-icon-xs mr-1'));
        //     toggleDangerSuccess(reqSpan, req.isMet());
        //     hoverEle.append(reqSpan, createElement('br'));
        // }
        return {
            name: s.name,
            value: s,
            media: s.media,
            disabled: s.lockState === LockState.Locked || s.state !== ShipState.ReadyToSail,
            // hover: hoverEle,
        };
    });
}

export function PortComponent(port: Port) {
    let self = {} as ReturnType<typeof PortComponent>;
    const firstShip = game.sailing.ships.allObjects[0];
    let selectedShip = firstShip;
    return {
        $template: '#sailing-port-template',
        port,
        isLocked: true,
        hasLevel: false,
        lockedImgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('img/sailing-boat.png'),
        onTrip: false,
        hasReturned: false,
        lootImg: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('melvor:assets/media/bank/pirate_booty.png'),
        ship: DropdownComponent({
            name: '',
            side: 'left',
            block: true,
            selected: { name: firstShip.name, value: firstShip, media: firstShip.media },
            options: getShipOptions(),
        }, (ship: Ship) => {
            self.selectedShip = selectedShip = ship;
            ship.selectedPort = port;
            self.updateGrants();
            ship.registerOnUpdate(() => {
                // self.readyToSail = self.ship.state == ShipState.ReadyToSail;
                // self.onTrip = self.ship.state == ShipState.OnTrip;
                // self.hasReturned = self.ship.state == ShipState.HasReturned;

                self.updateGrants();
            });

        }),
        selectedShip: null as unknown as Ship,
        xpIcon: null as unknown as XpIconElement,
        masteryIcon: null as unknown as MasteryXpIconElement,
        masteryPoolIcon: null as unknown as MasteryPoolIconElement,
        intervalIcon: null as unknown as IntervalIconElement,
        update() {
            console.log('PORT COMPONENT UPDATE');
            self.hasLevel = port.hasLevelRequirements();
            self.isLocked = port.type === 'skill'; // AND you haven't gotten the associated nav chart
            // self.isLocked = ship.lockState == LockState.Locked;
            self.ship.setData({
                selected: { name: self.selectedShip.name, value: self.selectedShip, media: self.selectedShip.media },
                options: getShipOptions(),
            });
            self.updateGrants();
            // self.updateProgressBar();
            // self.updateUpgradeCosts();
        },
        updateGrants() {
            const baseMasteryXPToAdd = game.sailing.getBaseMasteryXPToAddForAction(self.selectedShip.action, port.scaledForMasteryInterval);
            const masteryXPToAdd = game.sailing.getMasteryXPToAddForAction(self.selectedShip.action, port.scaledForMasteryInterval);
            const masteryPoolXPToAdd = game.sailing.getMasteryXPToAddToPool(masteryXPToAdd);
            self.xpIcon.setXP(game.sailing.modifyXP(port.baseXP, self.selectedShip.action), port.baseXP);
            self.xpIcon.setSources(game.sailing.getXPSources(self.selectedShip.action));
            self.masteryIcon.setXP(masteryXPToAdd, baseMasteryXPToAdd);
            self.masteryIcon.setSources(game.sailing.getMasteryXPSources(self.selectedShip.action));
            self.masteryPoolIcon.setXP(masteryPoolXPToAdd);
            if (game.unlockedRealms.length > 1) {
                this.masteryPoolIcon.setRealm(game.defaultRealm);
             } else {
                this.masteryPoolIcon.hideRealms();
             }
            self.intervalIcon.setCustomInterval(formatTime(port.modifiedInterval/1000), game.sailing.getIntervalSources(port));
        },
        // updateProgressBar() {
        //     if (ship.onTrip) {
        //         self.progressBar.animateProgressFromTimer(ship.sailTimer);
        //     } else {
        //         self.progressBar.stopAnimation();
        //     }
        // },
        mounted() {
            // HACK: This is so we can reference the reactive proxy object `this` in the dropdown callback
            self = this;
            self.selectedShip = firstShip;
            const parent = document.getElementById(port.localID);
            if (!parent) throw new Error(`Could not find parent element with id: ${port.localID}`);
            // ui.create(self.hull, getElementByIdAndRemoveId('hull-grid', parent));
            // ui.create(self.deckItems, getElementByIdAndRemoveId('deck-grid', parent));
            // ui.create(self.rudder, getElementByIdAndRemoveId('rudder-grid', parent));
            // ui.create(self.ram, getElementByIdAndRemoveId('ram-grid', parent));
            ui.create(self.ship, getElementByIdAndRemoveId('dropdown', parent));

            const grantsContainer = getElementByIdAndRemoveId('grants-container', parent);

            self.xpIcon = getElementByIdAndRemoveId('sailing-xp', grantsContainer);
            self.masteryIcon = getElementByIdAndRemoveId('sailing-mastery-xp', grantsContainer);
            self.masteryPoolIcon = getElementByIdAndRemoveId('sailing-pool-xp', grantsContainer);
            self.intervalIcon = getElementByIdAndRemoveId('sailing-interval', grantsContainer);
        },

        // setSail() {
        //     ship.setSail();
        //     self.updateProgressBar();
        // },
        // collectLoot() {
        //     ship.collectLoot();
        // },
        async viewLoot() {
            const rollMod = game.sailing.getRollModifier();
            return SwalLocale.fire({
                iconHtml: `<img class="mbts__logo-img" src="${port.media}" />`,
                title: port.name,
                html: port.currencyDrops.map((drop) => `Always Drops:<br>${formatNumber(drop.min)} - ${formatNumber(drop.max)} <img class="skill-icon-xs" src="${drop.currency.media}"> ${drop.currency.name}`).join('<br>') + '<hr>' +
                    `${Math.round(port.minRolls * rollMod)} - ${Math.round(port.maxRolls * rollMod)} Rolls<br>` +
                    port.getPossibleLoot(),
            });
        },
    };
}
