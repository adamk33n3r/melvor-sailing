import { Ship } from '../ts/ship';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { formatTime, getElementByIdAndRemoveId } from '../ts/util';
import { ShipComponent } from './ship.component';
// import { DropdownComponent } from './dropdown/dropdown.component';

// function getShipOptions() {
//     return game.sailing.ships.allObjects.map((s: Ship) => {
//         // Make hover show equipment?

//         // const hasLevel = s.hasLevelRequirements();
//         // const levelReqs = s.getLevelRequirements();
//         // const hoverEle = createElement('div');
//         // for (const req of levelReqs) {
//         //     const reqSpan = createElement('span', { className: 'font-size-sm' });
//         //     reqSpan.append(...req.getNodes('skill-icon-xs mr-1'));
//         //     toggleDangerSuccess(reqSpan, req.isMet());
//         //     hoverEle.append(reqSpan, createElement('br'));
//         // }
//         return {
//             name: s.name,
//             value: s,
//             media: s.media,
//             disabled: s.lockState === LockState.Locked || s.state !== ShipState.ReadyToSail,
//             // hover: hoverEle,
//         };
//     });
// }

interface PortComponentOptions {
    onSelect?: () => void;
    ship?: Ship;
    shipComponent?: ReturnType<typeof ShipComponent>;
    showLoot?: boolean;
}

/**
 * 
 * @param port The port to show.
 * @param host The host element this component will be attached to.
 * @param onSelect If defined, it will allow the component to be selected and the callback will be called when it has been.
 * @param ship The ship this port is attached to. Used to calculate grants.
 * @returns 
 */
export function PortComponent(port: Port, host: HTMLElement, options?: PortComponentOptions) {
    // let self = {} as ReturnType<typeof PortComponent>;
    return {
        $template: '#sailing-port-template',
        port,
        options,
        selectMode: options?.onSelect !== undefined && options.ship !== undefined,
        isLocked: true,
        hasLevel: false,
        lockedImgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('img/sailing-boat.png'),
        lootImg: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('melvor:assets/media/bank/pirate_booty.png'),
        xpIcon: null as unknown as XpIconElement,
        masteryIcon: null as unknown as MasteryXpIconElement,
        masteryPoolIcon: null as unknown as MasteryPoolIconElement,
        intervalIcon: null as unknown as IntervalIconElement,
        isSelected: options?.ship?.selectedPort === port,
        update() {
            this.hasLevel = port.hasLevelRequirements();
            this.isLocked = !this.hasLevel || port.type === 'skill'; // AND you haven't gotten the associated nav chart
            // self.isLocked = ship.lockState == LockState.Locked;
            // self.ship.setData({
            //     selected: { name: self.selectedShip.name, value: self.selectedShip, media: self.selectedShip.media },
            //     options: getShipOptions(),
            // });
            this.updateGrants();
            // self.updateProgressBar();
            // self.updateUpgradeCosts();
        },
        updateGrants() {
            if (options?.ship) {
                showElement(this.masteryIcon);
                showElement(this.masteryPoolIcon);
                const baseMasteryXPToAdd = game.sailing.getBaseMasteryXPToAddForAction(options.ship.action, port.scaledForMasteryInterval);
                const masteryXPToAdd = game.sailing.getMasteryXPToAddForAction(options.ship.action, port.scaledForMasteryInterval);
                const masteryPoolXPToAdd = game.sailing.getMasteryXPToAddToPool(masteryXPToAdd);
                this.masteryIcon.setXP(masteryXPToAdd, baseMasteryXPToAdd);
                this.masteryIcon.setSources(game.sailing.getMasteryXPSources(options.ship.action));
                this.masteryPoolIcon.setXP(masteryPoolXPToAdd);
                if (game.unlockedRealms.length > 1) {
                    this.masteryPoolIcon.setRealm(game.defaultRealm);
                } else {
                    this.masteryPoolIcon.hideRealms();
                }
            } else {
                hideElement(this.masteryIcon);
                hideElement(this.masteryPoolIcon);
            }
            this.xpIcon.setXP(game.sailing.modifyXP(port.baseExperience, options?.ship?.action), port.baseExperience);
            this.xpIcon.setSources(game.sailing.getXPSources(options?.ship?.action));
            this.intervalIcon.setCustomInterval(formatTime(port.modifiedInterval/1000), game.sailing.getIntervalSources(port));
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
            // self = this;
            const parent = getElementByIdAndRemoveId(port.localID, host);
            // ui.create(self.hull, getElementByIdAndRemoveId('hull-grid', parent));
            // ui.create(self.deckItems, getElementByIdAndRemoveId('deck-grid', parent));
            // ui.create(self.rudder, getElementByIdAndRemoveId('rudder-grid', parent));
            // ui.create(self.ram, getElementByIdAndRemoveId('ram-grid', parent));
            // ui.create(this.ship, getElementByIdAndRemoveId('dropdown', parent));

            const grantsContainer = getElementByIdAndRemoveId('grants-container', parent);

            this.xpIcon = getElementByIdAndRemoveId('sailing-xp', grantsContainer);
            this.masteryIcon = getElementByIdAndRemoveId('sailing-mastery-xp', grantsContainer);
            this.masteryPoolIcon = getElementByIdAndRemoveId('sailing-pool-xp', grantsContainer);
            this.intervalIcon = getElementByIdAndRemoveId('sailing-interval', grantsContainer);

            this.update();
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
            }).then(async () => {
                if (options?.shipComponent) {
                    await options.shipComponent.selectPort();
                }
            });
        },
        selectPort() {
            if (!options?.onSelect || this.isLocked) return;
            this.isSelected = true;
            options.onSelect();
        },
        deselect() {
            this.isSelected = false;
        },
    };
}
