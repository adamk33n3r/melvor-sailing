import { Constants } from '../../ts/Constants';
import { createTooltipComponent } from '../../ts/util';
import { EquipmentEquipTooltipComponent } from '../equipment-equip-tooltip/equipment-equip-tooltip';

function getImgSrc(slot: string, emptyMedia: string) {
    const upgradeChain = game.shop.upgradeChains.namespaceMaps.get('sailing').get(slot);
    const lowest = game.shop.getLowestUpgradeInChain(upgradeChain.rootUpgrade);
    return lowest !== undefined ? lowest.media : mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl(emptyMedia);
}

export interface EquipmentComponentProps {
    imgSrc: string;
    quantity: number;
    update(): void;
    mounted($el: HTMLElement): void;
}

export function EquipmentComponent(slot: string, emptyMedia: string): Component<EquipmentComponentProps> {
    const upgradeChain = game.shop.upgradeChains.namespaceMaps.get(Constants.MOD_NAMESPACE).get(slot);
    const equipped = new EquippedItem(new EquipmentSlot(game.registeredNamespaces.getNamespace(Constants.MOD_NAMESPACE), {
        id: 'sailing_dummy_equipment_slot',
        emptyMedia: '',
        emptyName: '',
        requirements: [],
        providesEquipStats: true,
        allowQuantity: false,
        gridPosition: {
            col: 0,
            row: 69
        }
    }, game), game.emptyEquipmentItem);
    const tooltipElem = new EquipmentTooltipElement();
    const quickEquip = new QuickEquipTooltipElement();
    return {
        $template: '#sail-equipment-icon-template',
        // $template: '#equipment-grid-icon-template',
        imgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl(emptyMedia),
        quantity: null,
        update() {
            this.imgSrc = getImgSrc(slot, emptyMedia);
            const lowest = game.shop.getLowestUpgradeInChain(upgradeChain.rootUpgrade);
            const equipmentItem = new EquipmentItem(game.registeredNamespaces.getNamespace(Constants.MOD_NAMESPACE), {
                id: 'sailing_dummy_equipment_item',
                name: lowest ? lowest.name : upgradeChain.defaultName,
                customDescription: 'this is a description',
                tier: 'none',
                validSlots: [],
                media: '',
                occupiesSlots: [],
                equipRequirements: [],
                equipmentStats: lowest ? lowest.contains.stats.modifiers.map((mod) => ({key:mod.modifier.localID, value: mod.value})) as any : [],
                category: '',
                type: '',
                ignoreCompletion: false,
                obtainFromItemLog: false,
                golbinRaidExclusive: false,
                sellsFor: 0,
            }, game);

            // todo: look into using the upgrade chain display or copying it
            equipped.setEquipped(equipmentItem, 1, []);
            tooltipElem.setFromSlot(equipped);
        },
        mounted($el: HTMLElement) {
            const imgEle = $el.querySelector('.sailing-equip-img') as HTMLImageElement;
            quickEquip.init(MAX_QUICK_EQUIP_ITEMS);

            tooltipElem.setFromSlot(equipped);
            this.tooltip = tippy(imgEle, {
                content: tooltipElem,
                placement: 'top',
                interactive: false,
                animation: false,
                popperOptions: {
                    strategy: 'fixed',
                    modifiers: [{
                        name: 'flip',
                        options: {
                            fallbackPlacements: ['top'],
                        },
                    }, {
                        name: 'preventOverflow',
                        options: {
                            altAxis: true,
                            tether: false,
                        },
                    }],
                },
            });
            // const equip = EquipmentEquipTooltipComponent(slot, (buttonData) => {
            //     this.imgSrc = buttonData.upgrade.media;
            // });
            // const quickEquipTooltip = createTooltipComponent(imgEle, equip, {
            //     placement: 'bottom',
            //     interactive: true,
            //     animation: false,
            //     trigger: 'click',
            //     popperOptions: {
            //         strategy: 'fixed',
            //         modifiers: [{
            //             name: 'flip',
            //             options: {
            //                 fallbackPlacements: ['bottom'],
            //             },
            //         }, {
            //             name: 'preventOverflow',
            //             options: {
            //                 altAxis: true,
            //                 tether: false,
            //             },
            //         }],
            //     },
            // });

            // quickEquipTooltip.setProps({
            //     onShow: () => equip.updateOptions(),
            //     // onShow: () => quickEquip.setEquipped(game.combat.player, equipped),
            // });
        }
    };
}
