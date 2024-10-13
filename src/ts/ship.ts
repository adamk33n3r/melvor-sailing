import { Constants } from './Constants';
import { DummyPort, Port } from './port';

export enum ShipState {
    ReadyToSail,
    OnTrip,
    HasReturned,
}

export interface TripData {
    boat: Ship;
    port: Port;
    interval: number;
    hull: ShopPurchase;
    deckItems: ShopPurchase;
    rudder: ShopPurchase;
    ram: ShopPurchase;
}

export interface ShipActionData extends BasicSkillRecipeData {
    media: string;
    currencyCosts: IDQuantity[];
    itemCosts: IDQuantity[];
}

export class ShipAction extends BasicSkillRecipe {
  private _media: string;
  private _currencyCosts: CurrencyQuantity[];
  private _itemCosts: ItemQuantity<AnyItem>[];
  public get currencyCosts() {
    return this._currencyCosts;
  }
  public get itemCosts() {
    return this._itemCosts;
  }
  constructor(namespace: DataNamespace, data: ShipActionData, private game: Game) {
    super(namespace, data, game);
    this._media = data.media;
    this._currencyCosts = game.getCurrencyQuantities(data.currencyCosts);
    this._itemCosts = game.items.getQuantities(data.itemCosts);
  }

  public get name() {
    return getLangString(`${Constants.MOD_NAMESPACE}_Boat_${this.localID}`);
  }

  public get media() {
    return this.getMediaURL(this._media);
  }

  public getUnlockCosts() {
    const costs = new Costs(this.game);

    this._currencyCosts.forEach(({ currency, quantity }) => {
      costs.addCurrency(currency, quantity);
    });

    this._itemCosts.forEach(({ item, quantity }) => {
      costs.addItem(item, quantity);
    });

    return costs;
  }
}

export enum LockState {
  Locked,
  Unlocked,
}


export class Ship extends NamespacedObject {
    private _sailTimer: Timer;
    public state: ShipState = ShipState.ReadyToSail;
    private _action: ShipAction;
    public lockState: LockState = LockState.Locked;

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
        return this.port.distance * (this.port.distance / 8);
    }

    get onTrip() {
        return this._sailTimer.ticksLeft > 0;
    }

    constructor(namespace: DataNamespace, action: ShipAction, public port: Port, private game: Game) {
        super(namespace, action.localID);
        this._sailTimer = new Timer('Skill', () => this.onReturn());
        this._action = action;
        this.lockState = action.currencyCosts.length === 0 && action.itemCosts.length === 0 ? LockState.Unlocked : LockState.Locked;
    }

    private updateCallbacks: VoidFunction[] = [];

    public registerOnUpdate(action: VoidFunction) {
        this.updateCallbacks.push(action);
    }

    public setSail() {
        this._sailTimer.action = () => this.onReturn();
        if (process.env.NODE_ENV === 'production') {
            this._sailTimer.start(this.modifiedInterval);
        } else {
            this._sailTimer.start(1000*1);
        }
        this.state = ShipState.OnTrip;
        this.callBackCallbacks();
    }
    
    public collectLoot() {
        game.sailing.generateLoot(this, () => {
            this.state = ShipState.ReadyToSail;
            this.callBackCallbacks();
        });
    }

    public encode(writer: SaveWriter): SaveWriter {
        writer.writeUint32(this.state);
        this._sailTimer.encode(writer);
        writer.writeUint32(this.lockState);
        writer.writeNamespacedObject(this.port);

        return writer;
    }

    private decodePort(reader: SaveWriter, _version: number): Port {
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
        if (this.game.sailing.saveVersion >= 2) {
            this.lockState = reader.getUint32();
        }

        this.port = this.decodePort(reader, version);

        this.callBackCallbacks();
    }

    private onReturn() {
        this.state = ShipState.HasReturned;
        this.callBackCallbacks();
    }

    private callBackCallbacks() {
        this.updateCallbacks.forEach((callback) => callback());
    }
}

export class DummyShip extends Ship {
    constructor(namespace: DataNamespace, localID: string, game: Game) {
        super(
            namespace,
            new ShipAction(namespace, {
                id: localID,
                baseExperience: 0,
                level: 1,
                media: 'img/sailing-boat.png',
                currencyCosts: [],
                itemCosts: [],
            }, game),
            game.sailing.ports.getObjectSafe('sailing:tinyIsland'),
            game,
        );
    }
}
