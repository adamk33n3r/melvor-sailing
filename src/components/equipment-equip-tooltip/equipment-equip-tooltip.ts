function getAllPurchasedInChain(chain: ShopUpgradeChain) {
    const purchased = new Set<ShopPurchase>();
    let current = chain.rootUpgrade;
    while (current !== undefined) {
        if (game.shop.isUpgradePurchased(current)) {
            purchased.add(current);
        }
        current = current.unlockRequirements[0]?.purchase;
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
        init() {},
        update() {},
        updateOptions() {
            const upgradeChain = game.shop.upgradeChains.namespaceMaps.get('sailing').get(upgrade);
            const lowest = game.shop.getLowestUpgradeInChain(upgradeChain.rootUpgrade);
            console.log(lowest);
            // for testing, will just be lowest per chain in slot

            const allPurchased = getAllPurchasedInChain(upgradeChain);
            this.buttons = [];
            allPurchased.forEach((purchase) => {
                (this.buttons as ButtonData[]).push({
                    image: purchase.media,
                    upgrade: purchase,
                });
            });
        },
        mounted($el: HTMLElement) {
        },
    };
}
