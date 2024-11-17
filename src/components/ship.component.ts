import { LockState, Ship, ShipState } from '../ts/ship';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { formatTime, getElementByIdAndRemoveId, tickToTime } from '../ts/util';
import { DropdownComponent } from './dropdown/dropdown.component';
import { EquipmentComponent } from './equipment/equipment.component';
import { PortComponent } from './port.component';

function getPortOptions() {
    return game.sailing.ports.allObjects.map((p: Port) => {
        const hasLevel = p.hasLevelRequirements();
        const levelReqs = p.getLevelRequirements();
        const hoverEle = createElement('div');
        for (const req of levelReqs) {
            const reqSpan = createElement('span', { className: 'font-size-sm' });
            reqSpan.append(...req.getNodes('skill-icon-xs mr-1'));
            toggleDangerSuccess(reqSpan, req.isMet());
            hoverEle.append(reqSpan, createElement('br'));
        }
        return {
            name: hasLevel ? p.name : (
                p.isNormalPort() ? `Unlocked at Level ${p.level}` :
                p.isSkillPort() ? `Unlocked at ${p.skill.name} Level ${p.level}` :
                'ERROR WITH REQUIREMENTS'
            ),
            value: p,
            media: p.media,
            disabled: !hasLevel,
            hover: hoverEle,
        };
    });
}

export function ShipComponent(ship: Ship) {
    let self = {} as ReturnType<typeof ShipComponent>;
    return {
        $template: '#sailing-ship-template',
        ship,
        isLocked: true,
        hasLevel: false,
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
            selected: { name: ship.selectedPort.name, value: ship.selectedPort, media: ship.selectedPort.media },
            options: getPortOptions(),
        }, (port: Port) => {
            ship.selectedPort = port;
            self.returnTime = tickToTime(ship.modifiedInterval / TICK_INTERVAL, true);
            self.updateGrants();
        }),
        unlockCosts: null as unknown as QuantityIconsElement,
        upgradeCosts: null as unknown as QuantityIconsElement,
        itemCosts: ship.action.itemCosts,
        currencyCosts: ship.action.currencyCosts,
        xpIcon: null as unknown as XpIconElement,
        masteryIcon: null as unknown as MasteryXpIconElement,
        masteryPoolIcon: null as unknown as MasteryPoolIconElement,
        intervalIcon: null as unknown as IntervalIconElement,
        progressBar: null as unknown as ProgressBarElement,
        _canUnlock() {
            const abyssalLevelMet = ship.action.abyssalLevel === 0 ||  game.sailing.abyssalLevel >= ship.action.abyssalLevel;
            return (
                game.sailing.level >= ship.action.level &&
                ship.action.getUnlockCosts().checkIfOwned() &&
                abyssalLevelMet
            );
        },
        canUnlock: false,
        unlockShip() {
            const costs = ship.action.getUnlockCosts();
            costs.setSource(`Skill.${game.sailing.id}.UnlockShip`);
            if (!costs.checkIfOwned() || game.sailing.level < ship.action.level || game.sailing.abyssalLevel < ship.action.abyssalLevel) return;
            costs.consumeCosts();
            self.isLocked = false;
            ship.lockState = LockState.Unlocked;
        },
        currentUpgrade: ship.currentUpgrade,
        nextUpgrade: ship.getNextUpgrade(),
        _canUpgrade(): boolean {
            return  (
                self.nextUpgrade &&
                game.sailing.level >= self.nextUpgrade.level &&
                ship.getUpgradeCosts()?.checkIfOwned()
            ) ?? false;
        },
        canUpgrade: false,
        upgradeShip() {
            if (!self.nextUpgrade) return;
            const costs = ship.getUpgradeCosts();
            if (!costs) return;
            costs.setSource(`Skill.${game.sailing.id}.UpgradeShip`);
            if (!costs.checkIfOwned() || game.sailing.level < self.nextUpgrade.level) return;
            costs.consumeCosts();
            ship.upgrade();
            self.currentUpgrade = ship.currentUpgrade;
            self.nextUpgrade = ship.getNextUpgrade();
            self.updateUpgradeCosts();
        },
        update() {
            self.hasLevel = game.sailing.level >= ship.action.level;
            self.isLocked = ship.lockState == LockState.Locked;
            self.canUnlock = self._canUnlock();
            self.unlockCosts.updateQuantities(game);
            self.canUpgrade = self._canUpgrade();
            self.upgradeCosts.updateQuantities(game);
            self.hull.update();
            self.deckItems.update();
            self.rudder.update();
            self.ram.update();
            self.currentUpgrade = ship.currentUpgrade;
            self.nextUpgrade = ship.getNextUpgrade();
            // self.port.setEnabled(this.readyToSail);
            self.returnTime = tickToTime(ship.modifiedInterval / TICK_INTERVAL, true);
            // self.port.setData({
            //     selected: { name: ship.selectedPort.name, value: ship.selectedPort, media: ship.selectedPort.media },
            //     options: getPortOptions(),
            // });
            self.updateGrants();
            self.updateProgressBar();
            self.updateUpgradeCosts();
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
        updateUpgradeCosts() {
            const nextUpgrade = ship.getNextUpgrade();
            if (nextUpgrade) {
                self.upgradeCosts.setIcons(nextUpgrade.itemCosts, nextUpgrade.currencyCosts);
                self.upgradeCosts.currencies.forEach((currency) => {
                    currency.quantity.textContent = formatNumber(currency.currencyQuantity!.quantity);
                    currency.container.onmouseover = () => {
                        currency.quantity.textContent = numberWithCommas(currency.currencyQuantity!.quantity);
                    };
                    currency.container.onmouseleave = () => {
                        currency.quantity.textContent = formatNumber(currency.currencyQuantity!.quantity);
                    };
                });
                self.upgradeCosts.items.forEach((item) => {
                    item.quantity.textContent = formatNumber(item.itemQuantity!.quantity);
                    item.container.onmouseover = () => {
                        item.quantity.textContent = numberWithCommas(item.itemQuantity!.quantity);
                    };
                    item.container.onmouseleave = () => {
                        item.quantity.textContent = formatNumber(item.itemQuantity!.quantity);
                    };
                });
            }
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

            // ui.create(self.port, getElementByIdAndRemoveId('dropdown', parent));

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
                // self.port.setEnabled(self.readyToSail);

                self.updateGrants();
                self.updateProgressBar();
                self.currentUpgrade = self.ship.currentUpgrade;
                // Important to not reference ship with self here
                // so that it doesn't proxyfy the game
                self.nextUpgrade = ship.getNextUpgrade();
                self.updateUpgradeCosts();
            });

            self.unlockCosts = getElementByIdAndRemoveId('unlockCosts', parent);
            self.unlockCosts.addCurrencyIcons(ship.action.currencyCosts);
            self.unlockCosts.addItemIcons(ship.action.itemCosts, false);
            self.unlockCosts.currencies.forEach((currency) => {
                currency.quantity.textContent = formatNumber(currency.currencyQuantity!.quantity);
                currency.container.onmouseover = () => {
                    currency.quantity.textContent = numberWithCommas(currency.currencyQuantity!.quantity);
                };
                currency.container.onmouseleave = () => {
                    currency.quantity.textContent = formatNumber(currency.currencyQuantity!.quantity);
                };
            });
            self.unlockCosts.items.forEach((item) => {
                item.quantity.textContent = formatNumber(item.itemQuantity!.quantity);
                item.container.onmouseover = () => {
                    item.quantity.textContent = numberWithCommas(item.itemQuantity!.quantity);
                };
                item.container.onmouseleave = () => {
                    item.quantity.textContent = formatNumber(item.itemQuantity!.quantity);
                };
            });

            self.upgradeCosts = getElementByIdAndRemoveId('upgradeCosts', parent);

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
            const rollMod = game.sailing.getRollModifier(ship.action);
            return SwalLocale.fire({
                iconHtml: `<img class="mbts__logo-img" src="${ship.selectedPort.media}" />`,
                title: ship.selectedPort.name,
                html: ship.selectedPort.currencyDrops.map((drop) => `Always Drops:<br>${formatNumber(drop.min)} - ${formatNumber(drop.max)} <img class="skill-icon-xs" src="${drop.currency.media}"> ${drop.currency.name}`).join('<br>') + '<hr>' +
                    `${Math.round(ship.selectedPort.minRolls * rollMod)} - ${Math.round(ship.selectedPort.maxRolls * rollMod)} Rolls<br>` +
                    ship.selectedPort.getPossibleLoot(),
            });
        },
        async selectPort() {
            const html = document.createElement('div');
            html.classList.add(
                'row',
                'row-deck',
                'gutters-tiny',
                'row-cols-1',
                'row-cols-md-2',
                'row-cols-xl-3',
                'row-cols-xxl-6',
            );
            const portComponents: ReturnType<typeof PortComponent>[] = [];
            game.sailing.ports.forEach((port) => {
                const portComponent = PortComponent(port, html, {
                    onSelect: () => {
                        for (const comp of portComponents) {
                            if (comp === portComponent) continue;
                            comp.deselect();
                        }
                    },
                    ship,
                    shipComponent: this,
                });
                portComponents.push(portComponent);
                ui.create(portComponent, html);
            });
            game.sailing.updateActionMasteries();
            return SwalLocale.fire<Port | undefined>({
                iconHtml: `<img class="mbts__logo-img" src="${ship.media}" />`,
                title: ship.name,
                width: '75%',
                customClass: {
                    ...defaultSwalCustomClass,
                    htmlContainer: 'container-fluid',
                },
                html,
                showCancelButton: true,
                preConfirm: () => {
                    return portComponents.find((port) => port.isSelected)?.port;
                },
                confirmButtonText: 'Select',
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    ship.selectedPort = result.value;
                    this.update();
                }
            });
        },
    };
}
