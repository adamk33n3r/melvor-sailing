import { Ship } from '../ts/ship';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { formatTime, getElementByIdAndRemoveId } from '../ts/util';
import { TradeComponent } from './trade/trade.component';

interface PortComponentOptions {
    onSelect?: () => void;
    ship?: Ship;
    tradeComponent?: ReturnType<typeof TradeComponent>;
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
        isHidden: true,
        hasLevel: false,
        hasCombat: false,
        lockedImgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('img/sailing-boat.png'),
        lootImg: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('melvor:assets/media/bank/pirate_booty.png'),
        xpIcon: null as unknown as XpIconElement,
        masteryIcon: null as unknown as MasteryXpIconElement,
        masteryPoolIcon: null as unknown as MasteryPoolIconElement,
        intervalIcon: null as unknown as IntervalIconElement,
        isSelected: options?.ship?.selectedPort === port,
        update() {
            this.hasLevel = port.hasLevelRequirements();
            this.isHidden = port.isSkillPort() && !port.isUnlocked();
            this.isLocked = !this.hasLevel || this.isHidden;
            this.hasCombat = game.sailing.getCombatModifier() >= port.sailingStats.combat;
            this.updateGrants();
        },
        updateGrants() {
            if (options?.ship) {
                showElement(this.masteryIcon);
                showElement(this.masteryPoolIcon);
                const baseMasteryXPToAdd = game.sailing.getBaseMasteryXPToAddForAction(options.ship.dock, port.scaledForMasteryInterval);
                const masteryXPToAdd = game.sailing.getMasteryXPToAddForAction(options.ship.dock, port.scaledForMasteryInterval);
                const masteryPoolXPToAdd = game.sailing.getMasteryXPToAddToPool(masteryXPToAdd);
                this.masteryIcon.setXP(masteryXPToAdd, baseMasteryXPToAdd);
                this.masteryIcon.setSources(game.sailing.getMasteryXPSources(options.ship.dock));
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
            this.xpIcon.setXP(game.sailing.modifyXP(port.baseExperience, options?.ship?.dock), port.baseExperience);
            this.xpIcon.setSources(game.sailing.getXPSources(options?.ship?.dock));
            this.intervalIcon.setCustomInterval(formatTime((options?.ship?.modifiedInterval ?? port.interval) / 1000), game.sailing.getIntervalSources(port));
        },
        mounted() {
            const parent = getElementByIdAndRemoveId(port.localID, host);

            const grantsContainer = getElementByIdAndRemoveId('grants-container', parent);

            this.xpIcon = getElementByIdAndRemoveId('sailing-xp', grantsContainer);
            this.masteryIcon = getElementByIdAndRemoveId('sailing-mastery-xp', grantsContainer);
            this.masteryPoolIcon = getElementByIdAndRemoveId('sailing-pool-xp', grantsContainer);
            this.intervalIcon = getElementByIdAndRemoveId('sailing-interval', grantsContainer);

            this.update();
        },
        async viewLoot() {
            const rollMod = game.sailing.getRollModifier();
            return SwalLocale.fire({
                iconHtml: `<img class="mbts__logo-img" src="${port.media}" />`,
                title: port.name,
                html: port.currencyDrops.map((drop) => `Always Drops:<br>${formatNumber(drop.min)} - ${formatNumber(drop.max)} <img class="skill-icon-xs" src="${drop.currency.media}"> ${drop.currency.name}`).join('<br>') + '<hr>' +
                    `${Math.round(port.minRolls * rollMod)} - ${Math.round(port.maxRolls * rollMod)} Rolls<br>` +
                    port.getPossibleLoot(),
            }).then(async () => {
                if (options?.tradeComponent) {
                    await options.tradeComponent.selectPort();
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
