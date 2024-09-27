import { Boat, BoatState } from '../ts/boat';
import { ComponentClass } from '../ts/component';
import { Constants } from '../ts/Constants';
import { Port } from '../ts/port';
import { BoatAction } from '../ts/sailing';
import { getElementByIdWithoutId, tickToTime } from '../ts/util';
import { DropdownComponent } from './dropdown/dropdown.component';
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
        port: DropdownComponent({
            name: 'Port',
            selected: { name: boat.port.name, value: boat.port, media: boat.port.media },
            options: game.sailing.ports.allObjects.map((p: Port) => {
                const hasLevel = game.sailing.level >= p.level;
                return {
                    name: hasLevel ? p.name : `Unlocked at Level ${p.level}`,
                    value: p,
                    media: p.media,
                    disabled: !hasLevel,
                };
            }),
        }, (port: Port) => {
            console.log('CHANGED PORT:', port);
            boat.port = port;
        }),
        update() {
            const self = this as ReturnType<typeof BoatComponent>;
            self.isLocked = game.sailing.level < self.getAction().level;
            self.hull.update();
            self.deckItems.update();
            self.rudder.update();
            self.ram.update();
            self.port.setEnabled(this.readyToSail);
            self.port.setData({
                name: 'Port',
                selected: { name: boat.port.name, value: boat.port, media: boat.port.media },
                options: game.sailing.ports.allObjects.map((p: Port) => {
                    const hasLevel = game.sailing.level >= p.level;
                    return {
                        name: hasLevel ? p.name : `Unlocked at Level ${p.level}`,
                        value: p,
                        media: p.media,
                        disabled: !hasLevel,
                    };
                }),
            });
        },
        mounted() {
            const self = this as ReturnType<typeof BoatComponent>;
            console.log('!!!MOUNTED');
            ui.create(self.hull, getElementByIdWithoutId('hull-grid'));
            ui.create(self.deckItems, getElementByIdWithoutId('deck-grid'));
            ui.create(self.rudder, getElementByIdWithoutId('rudder-grid'));
            ui.create(self.ram, getElementByIdWithoutId('ram-grid'));
            ui.create(self.port, getElementByIdWithoutId('dropdown'));

            setInterval(() => {
                self.returnTimer = tickToTime(self.boat.sailTimer.ticksLeft);
            }, 1000);

            self.boat.registerOnUpdate(() => {
                console.log('ON UPDATE');
                self.readyToSail = self.boat.state == BoatState.ReadyToSail;
                self.onTrip = self.boat.state == BoatState.OnTrip;
                self.hasReturned = self.boat.state == BoatState.HasReturned;
                self.returnTimer = tickToTime(self.boat.sailTimer.ticksLeft);
                self.port.setEnabled(self.readyToSail);
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
