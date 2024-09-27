import { DummyPort, Port } from './port';

export enum BoatState {
    ReadyToSail,
    OnTrip,
    HasReturned,
}
export class Boat extends NamespacedObject {
    private _sailTimer: Timer = null;
    public state: BoatState = BoatState.ReadyToSail;
    public port: Port;

    get sailTimer() {
        return this._sailTimer;
    }

    get onTrip() {
        return this._sailTimer.ticksLeft > 0;
    }

    constructor(namespace: DataNamespace, localId: string, private game: Game) {
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
        writer.writeNamespacedObject(this.port);

        return writer;
    }

    private decodePort(reader: SaveWriter, version: number): Port {
        let port = reader.getNamespacedObject(game.sailing.ports);
        if (typeof port === 'string') {
        console.log('not registered:', port);
        // TODO: Ask to explain this dummy object
        if (port.startsWith('sailing')) {
            port = game.sailing.ports.getDummyObject(port, DummyPort, this.game);
            console.log('getting dummy:', port);
        } else {
            port = this.game.constructDummyObject(port, DummyPort);
        }
        }
        // port.decode(reader, version);
        return port;
    }

    public decode(reader: SaveWriter, version: number): void {
        this.state = reader.getUint32();
        this._sailTimer = new Timer('Skill', () => this.onReturn());
        this._sailTimer.decode(reader, version);

        this.port = this.decodePort(reader, version);

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
