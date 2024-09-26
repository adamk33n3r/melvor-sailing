export enum BoatState {
    ReadyToSail,
    OnTrip,
    HasReturned,
}
export class Boat extends NamespacedObject {
    private _sailTimer: Timer = null;
    public state: BoatState = BoatState.ReadyToSail;

    get sailTimer() {
        return this._sailTimer;
    }

    get onTrip() {
        return this._sailTimer.ticksLeft > 0;
    }

    constructor(namespace: DataNamespace, localId: string, game: Game) {
        super(namespace, localId);
        this._sailTimer = new Timer('Skill', () => this.onReturn());
    }

    private updateCallbacks: VoidFunction[] = [];

    public registerOnUpdate(action: VoidFunction) {
        this.updateCallbacks.push(action);
    }

    public setSail() {
        this._sailTimer.action = () => this.onReturn();
        this._sailTimer.start(1000*60*60*3);
        this.state = BoatState.OnTrip;
        this.callBackCallbacks();
    }
    
    public collectLoot() {
        game.sailing.generateLoot(this, () => {
            this.state = BoatState.ReadyToSail;
            this.callBackCallbacks();
        });
    }

    public encode(writer: SaveWriter): SaveWriter {
        writer.writeUint32(this.state);
        this._sailTimer.encode(writer);

        return writer;
    }

    public decode(reader: SaveWriter, version: number): void {
        console.log('decoding boat');
        this.state = reader.getUint32();
        console.log('decoded state:', this.state);
        this._sailTimer = new Timer('Skill', () => this.onReturn());
        this._sailTimer.decode(reader, version);
        console.log('decoded sail timer:', this._sailTimer.ticksLeft);

        this.callBackCallbacks();
    }

    private onReturn() {
        console.log(`Boat ${this.id} Has Returned!`);
        this.state = BoatState.HasReturned;
        this.callBackCallbacks();
    }

    private callBackCallbacks() {
        this.updateCallbacks.forEach((callback) => callback());
    }
}
