import { Constants } from '../../ts/Constants';

function getAllPurchasedInChain(chain: ShopUpgradeChain) {
    const purchased = new Set<ShopPurchase>();
    let current: ShopPurchase | undefined = chain.rootUpgrade;
    while (current !== undefined) {
        if (game.shop.isUpgradePurchased(current)) {
            purchased.add(current);
        }
        current = current.unlockRequirements.at(0)?.purchase;
    }
    return purchased;
}

interface ButtonData {
    upgrade: ShopPurchase;
    image: string;
}

export function EquipmentEquipTooltipComponent(upgrade: string, onEquip: (buttonData: ButtonData) => void) {
    return {
        $template: '#equipment-equip-tooltip-template',
        buttons: [] as ButtonData[],
        equip(buttonData: ButtonData) {
            console.log('equip:', buttonData);
            onEquip(buttonData);
        },
        updateOptions() {
            const upgradeChain = game.shop.upgradeChains.getObjectSafe(`${Constants.MOD_NAMESPACE}:${upgrade}`);
            // const lowest = game.shop.getLowestUpgradeInChain(upgradeChain.rootUpgrade);
            // for testing, will just be lowest per chain in slot

            const allPurchased = getAllPurchasedInChain(upgradeChain);
            this.buttons = [];
            allPurchased.forEach((purchase) => {
                this.buttons.push({
                    image: purchase.media,
                    upgrade: purchase,
                });
            });
        },
        mounted($el: HTMLElement) {
            console.log('mounted:', $el);
        },
    };
}
