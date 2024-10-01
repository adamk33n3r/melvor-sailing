import { DummyPort, Port } from './port';
import { BoatAction } from './sailing';

export enum BoatState {
    ReadyToSail,
    OnTrip,
    HasReturned,
}

export interface TripData {
    boat: Boat;
    port: Port;
    interval: number;
    hull: ShopPurchase;
    deckItems: ShopPurchase;
    rudder: ShopPurchase;
    ram: ShopPurchase;
}

export class Boat extends NamespacedObject {
    private _sailTimer: Timer = null;
    public state: BoatState = BoatState.ReadyToSail;
    public port: Port;
    private _action: BoatAction;

    get sailTimer() {
        return this._sailTimer;
    }

    get action() {
        return this._action;
    }

    get name() {
        return this.action.name;
    }

    get media() {
        return this.action.media;
    }

    get interval() {
        return this.port.distance * 60 * 1000;
    }

    get modifiedInterval() {
        return this.game.sailing.modifyInterval(this.interval, this.action);
    }

    get scaledForMasteryInterval() {
        return this.port.distance * 1000;
    }

    get baseXP() {
        return this.port.distance * (this.port.distance / 4);
    }

    get onTrip() {
        return this._sailTimer.ticksLeft > 0;
    }

    constructor(namespace: DataNamespace, action: BoatAction, private game: Game) {
        super(namespace, action.localID);
        this._sailTimer = new Timer('Skill', () => this.onReturn());
        this._action = action;
    }

    private updateCallbacks: VoidFunction[] = [];

    public registerOnUpdate(action: VoidFunction) {
        this.updateCallbacks.push(action);
    }

    public setSail() {
        this._sailTimer.action = () => this.onReturn();
        // this._sailTimer.start(this.modifiedInterval);
        this._sailTimer.start(1000*5);
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
            if (port.startsWith('sailing')) {
                port = game.sailing.ports.getDummyObject(port, DummyPort, this.game);
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
        this.state = BoatState.HasReturned;
        this.callBackCallbacks();
    }

    private callBackCallbacks() {
        this.updateCallbacks.forEach((callback) => callback());
    }
}

export class DummyBoat extends Boat {
    constructor(namespace: DataNamespace, localID: string, game: Game) {
        super(
            namespace,
            new BoatAction(namespace, {
                id: localID,
                baseExperience: 0,
                level: 1,
            }, game),
            game,
        );
    }
}
