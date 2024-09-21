import { ComponentClass } from '../ts/component';
import { EquipmentComponent, EquipmentComponentProps } from './equipment/equipment.component';

export interface BoatComponentProps {
    localId: string;
    hull: EquipmentComponentProps;
    deckItems: EquipmentComponentProps;
    rudder: EquipmentComponentProps;
    ram: EquipmentComponentProps;
    mounted($el: HTMLElement): void;
}

export class BoatComponent extends ComponentClass {
    constructor() {
        super();
        console.log('CREATING BOAT COMPONENT');
    }
    $template = '#sailing-boat-template';
    localId = 'sailing-boat-1';
    hull = EquipmentComponent('Hull', 'img/hull_empty.png');
    deckItems = EquipmentComponent('Deck_Items', 'img/hull_empty.png');
    rudder = EquipmentComponent('Rudder', 'img/hull_empty.png');
    ram = EquipmentComponent('Ram', 'img/hull_empty.png');
    update() {
        this.hull.update();
        this.deckItems.update();
        this.rudder.update();
        this.ram.update();
    }
    mounted() {
        console.log('!!!MOUNTED');
        ui.create(this.hull, document.getElementById('hull-grid'));
        ui.create(this.deckItems, document.getElementById('deck-grid'));
        ui.create(this.rudder, document.getElementById('rudder-grid'));
        ui.create(this.ram, document.getElementById('ram-grid'));
        // const sailGrid = document.getElementById('sail-grid') as EquipmentGridIconElement;
        // const slot = new EquipmentSlot(game.registeredNamespaces.getNamespace('sailing'), {
        //     id: 'Sail',
        //     emptyMedia: 'melvor:assets/media/bank/armour_helmet.png',
        //     emptyName: 'Sail',
        //     requirements: [],
        //     providesEquipStats: false,
        //     allowQuantity: false,
        //     gridPosition: {
        //         col: 0,
        //         row: 18
        //     }
        // }, game);
        // sailGrid.setSlot(slot, game);
        // sailGrid.setEquipped(game.combat.player, new EquippedItem(slot, game.emptyEquipmentItem));

        // ui.create(EquipmentComponent('Deck_Items', 'img/deck_empty.png'), document.getElementById('deck-grid'));
        // ui.create(EquipmentComponent('Rudder', 'img/rudder_empty.png'), document.getElementById('rudder-grid'));
        // ui.create(EquipmentComponent('Ram', 'img/ram_empty.png'), document.getElementById('ram-grid'));
    }
}
