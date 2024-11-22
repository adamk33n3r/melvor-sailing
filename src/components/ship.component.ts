import { LockState, Ship, ShipState } from '../ts/ship';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { getElementByIdAndRemoveId, tickToTime } from '../ts/util';
import { DropdownComponent } from './dropdown/dropdown.component';
import { EquipmentComponent } from './equipment/equipment.component';

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
        }),
        unlockCosts: null as unknown as QuantityIconsElement,
        upgradeCosts: null as unknown as QuantityIconsElement,
        hasLevelForUpgrade: (ship.getNextUpgrade()?.level ?? Infinity) <= game.sailing.level,
        itemCosts: ship.dock.itemCosts,
        currencyCosts: ship.dock.currencyCosts,
        _canUnlock() {
            const abyssalLevelMet = ship.dock.abyssalLevel === 0 ||  game.sailing.abyssalLevel >= ship.dock.abyssalLevel;
            return (
                game.sailing.level >= ship.dock.level &&
                ship.dock.getUnlockCosts().checkIfOwned() &&
                abyssalLevelMet
            );
        },
        canUnlock: false,
        unlockShip() {
            const costs = ship.dock.getUnlockCosts();
            costs.setSource(`Skill.${game.sailing.id}.UnlockShip`);
            if (!costs.checkIfOwned() || game.sailing.level < ship.dock.level || game.sailing.abyssalLevel < ship.dock.abyssalLevel) return;
            costs.consumeCosts();
            self.isLocked = false;
            ship.lockState = LockState.Unlocked;
            // To clear buy button
            game.sailing.page.update();
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
            self.hasLevel = game.sailing.level >= ship.dock.level;
            self.currentUpgrade = ship.currentUpgrade;
            self.nextUpgrade = ship.getNextUpgrade();
            self.hasLevelForUpgrade = (self.nextUpgrade?.level ?? Infinity) <= game.sailing.level;
            self.isLocked = ship.lockState == LockState.Locked;
            self.canUnlock = self._canUnlock();
            self.unlockCosts.updateQuantities(game);
            self.canUpgrade = self._canUpgrade();
            self.upgradeCosts.updateQuantities(game);
            self.hull.update();
            self.deckItems.update();
            self.rudder.update();
            self.ram.update();
            // self.port.setEnabled(this.readyToSail);
            self.returnTime = tickToTime(ship.modifiedInterval / TICK_INTERVAL, true);
            // self.port.setData({
            //     selected: { name: ship.selectedPort.name, value: ship.selectedPort, media: ship.selectedPort.media },
            //     options: getPortOptions(),
            // });
            self.updateUpgradeCosts();
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

            self.ship.registerOnUpdate(() => {
                self.readyToSail = self.ship.state == ShipState.ReadyToSail;
                self.onTrip = self.ship.state == ShipState.OnTrip;
                self.hasReturned = self.ship.state == ShipState.HasReturned;
                self.returnTimer = tickToTime(self.ship.sailTimer.ticksLeft);
                if (self.ship.sailTimer.ticksLeft <= 0) self.returnTimer = 'Done';
                // self.port.setEnabled(self.readyToSail);

                self.currentUpgrade = self.ship.currentUpgrade;
                // Important to not reference ship with self here
                // so that it doesn't proxyfy the game
                self.nextUpgrade = ship.getNextUpgrade();
                self.updateUpgradeCosts();
            });

            self.unlockCosts = getElementByIdAndRemoveId('unlockCosts', parent);
            self.unlockCosts.addCurrencyIcons(ship.dock.currencyCosts);
            self.unlockCosts.addItemIcons(ship.dock.itemCosts, false);
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
        },
        async viewLoot() {
            const rollMod = game.sailing.getRollModifier(ship.dock);
            return SwalLocale.fire({
                iconHtml: `<img class="mbts__logo-img" src="${ship.selectedPort.media}" />`,
                title: ship.selectedPort.name,
                html: ship.selectedPort.currencyDrops.map((drop) => `Always Drops:<br>${formatNumber(drop.min)} - ${formatNumber(drop.max)} <img class="skill-icon-xs" src="${drop.currency.media}"> ${drop.currency.name}`).join('<br>') + '<hr>' +
                    `${Math.round(ship.selectedPort.minRolls * rollMod)} - ${Math.round(ship.selectedPort.maxRolls * rollMod)} Rolls<br>` +
                    ship.selectedPort.getPossibleLoot(),
            });
        },
    };
}
