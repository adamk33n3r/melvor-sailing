interface BoatEquipmentSlotData extends EquipmentSlotData {}

export class BoatEquipmentSlot extends NamespacedObject {
    constructor(namespace: DataNamespace, data: BoatEquipmentSlotData, game: Game) {
        super(namespace, data.id);
    }
}
