import { Boat, BoatState } from '../ts/boat';
import { ComponentClass } from '../ts/component';
import { Constants } from '../ts/Constants';
import { BoatAction } from '../ts/sailing';
import { getElementByIdWithoutId, tickToTime } from '../ts/util';
import { EquipmentComponent, EquipmentComponentProps } from './equipment/equipment.component';

export function BoatComponent(boat: Boat) {
    return {
        $template: '#sailing-boat-template',
        boat,
        isLocked: true,
        getAction(): BoatAction {
            return game.sailing.actions.find(action => action.localID === this.boat.localID);
        },
        lockedImgSrc: mod.getContext(Constants.MOD_NAMESPACE).getResourceUrl('img/sailing-boat.png'),
        readyToSail: true,
        onTrip: false,
        hasReturned: false,
        returnTimer: '',
        hull: EquipmentComponent('Hull', 'img/hull_bronze.png'),
        deckItems: EquipmentComponent('Deck_Items', 'img/hull_empty.png'),
        rudder: EquipmentComponent('Rudder', 'img/hull_empty.png'),
        ram: EquipmentComponent('Ram', 'img/hull_empty.png'),
        update() {
            this.isLocked = game.sailing.level < this.getAction().level;
            this.hull.update();
            this.deckItems.update();
            this.rudder.update();
            this.ram.update();
        },
        mounted() {
            console.log('!!!MOUNTED');
            ui.create(this.hull, getElementByIdWithoutId('hull-grid'));
            ui.create(this.deckItems, getElementByIdWithoutId('deck-grid'));
            ui.create(this.rudder, getElementByIdWithoutId('rudder-grid'));
            ui.create(this.ram, getElementByIdWithoutId('ram-grid'));

            setInterval(() => {
                this.returnTimer = tickToTime(this.boat.sailTimer.ticksLeft);
            }, 1000);

            this.boat.registerOnUpdate(() => {
                console.log('ON UPDATE');
                // this.onTrip = false;
                // this.hasReturned = true;
                this.readyToSail = this.boat.state == BoatState.ReadyToSail;
                this.onTrip = this.boat.state == BoatState.OnTrip;
                this.hasReturned = this.boat.state == BoatState.HasReturned;
                this.returnTimer = tickToTime(this.boat.sailTimer.ticksLeft);
            });
        },

        setSail() {
            console.log('SET SAIL');
            this.boat.setSail();
        },
        collectLoot() {
            this.boat.collectLoot();
        }
    }
}
