import { Constants } from './Constants';
import { DummyPort, Port } from './port';
import { SailingAction } from './sailingaction';

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

export interface ShipUpgradeData extends RealmedObjectData {
    media: string;
    level: number;
    description: string;
    modifiers: ModifierValuesRecordData;
    currencyCosts: IDQuantity[];
    itemCosts: IDQuantity[];
}

export class ShipUpgrade extends RealmedObject {
    private _media: string;
    private _level: number;
    private _description: string;
    private _currencyCosts: CurrencyQuantity[];
    private _itemCosts: ItemQuantity<AnyItem>[];
    private _stats: StatObject;
    public get media() {
        return this.getMediaURL(this._media);
    }
    public get level() {
        return this._level;
    }
    public get description() {
        return this._description;
    }
    public get currencyCosts() {
        return this._currencyCosts;
    }
    public get itemCosts() {
        return this._itemCosts;
    }
    public get stats() {
        return this._stats;
    }
    public get modifiers() {
        return this._stats.modifiers;
    }
    constructor(namespace: DataNamespace, data: ShipUpgradeData, game: Game) {
        super(namespace, data, game);
        this._media = data.media;
        this._level = data.level;
        this._description = data.description;
        this._stats = new StatObject({ modifiers: data.modifiers }, game, `${ShipUpgrade.name} with id "${this.id}"`);
        this._currencyCosts = game.getCurrencyQuantities(data.currencyCosts);
        this._itemCosts = game.items.getQuantities(data.itemCosts);
    }
}

export interface DockData extends BasicSkillRecipeData {
    currencyCosts: IDQuantity[];
    itemCosts: IDQuantity[];
}

export class Dock extends SailingAction {
  private _currencyCosts: CurrencyQuantity[];
  private _itemCosts: ItemQuantity<AnyItem>[];
  public get currencyCosts() {
    return this._currencyCosts;
  }
  public get itemCosts() {
    return this._itemCosts;
  }

  public isUnlocked(): boolean {
    return true;
  }

  constructor(namespace: DataNamespace, data: DockData, private game: Game) {
    super(namespace, data, game);
    this._currencyCosts = game.getCurrencyQuantities(data.currencyCosts);
    this._itemCosts = game.items.getQuantities(data.itemCosts);
  }

  public get name() {
    return getLangString(`${Constants.MOD_NAMESPACE}_Dock_${this.localID}`);
  }

  public get media() {
    return this.getMediaURL('img/sailing-boat.png');
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
    private _state: ShipState = ShipState.ReadyToSail;
    private _dock: Dock;
    private _lockState: LockState = LockState.Locked;
    private _currentUpgrade: ShipUpgrade;
    public selectedPort: Port;

    get sailTimer() {
        return this._sailTimer;
    }

    get state() {
        return this._state;
    }

    get dock() {
        return this._dock;
    }

    get lockState() {
        return this._lockState;
    }

    set lockState(value: LockState) {
        this._lockState = value;
        this.callBackCallbacks();
    }

    get name() {
        return this.dock.name;
    }

    get media() {
        return this._currentUpgrade.media;
    }

    get interval() {
        return this.selectedPort.interval;
    }

    get modifiedInterval() {
        return this.selectedPort.modifiedInterval;
        // return this.game.sailing.modifyInterval(this.interval, this.action);
    }

    get scaledForMasteryInterval() {
        return this.selectedPort.scaledForMasteryInterval;
    }

    get baseXP() {
        return this.selectedPort.baseExperience;
    }

    get onTrip() {
        return this._sailTimer.ticksLeft > 0;
    }

    get currentUpgrade() {
        return this._currentUpgrade;
    }

    constructor(namespace: DataNamespace, action: Dock, upgrade: ShipUpgrade, port: Port, private game: Game) {
        super(namespace, action.localID);
        this._sailTimer = new Timer('Skill', () => this.onReturn());
        this._dock = action;
        this._currentUpgrade = upgrade;
        this.selectedPort = port;
        this._lockState = action.currencyCosts.length === 0 && action.itemCosts.length === 0 ? LockState.Unlocked : LockState.Locked;
    }

    private updateCallbacks: VoidFunction[] = [];

    public registerOnUpdate(action: VoidFunction) {
        this.updateCallbacks.push(action);
    }

    public upgrade() {
        const nextUpgrade = this.getNextUpgrade();
        if (nextUpgrade === undefined) return;
        this.game.sailing.logger.debug(`upgradeShip: from ${this.currentUpgrade.id} to ${nextUpgrade.id}`);
        this._currentUpgrade = nextUpgrade;
        this.game.sailing.computeProvidedStats(true);
        this.game.sailing.page.update();
    }

    public getNextUpgrade() {
        return this.game.sailing.shipUpgrades.allObjects
            .sort((a, b) => a.level - b.level)
            .find((upgrade) => {
                return upgrade.level > this.currentUpgrade.level;
            });
    }

    public setSail() {
        this._sailTimer.action = () => this.onReturn();
        if (process.env.NODE_ENV === 'production') {
            this._sailTimer.start(this.modifiedInterval);
        } else {
            this._sailTimer.start(1000*1);
        }
        this._state = ShipState.OnTrip;
        this.callBackCallbacks();
    }
    
    public collectLoot() {
        game.sailing.generateLoot(this, () => {
            this._state = ShipState.ReadyToSail;
            this.callBackCallbacks();
        });
    }

    public getUpgradeCosts() {
        const nextUpgrade = this.getNextUpgrade();
        if (nextUpgrade === undefined) return;

        const costs = new Costs(this.game);

        nextUpgrade.currencyCosts.forEach(({ currency, quantity }) => {
            costs.addCurrency(currency, quantity);
        });

        nextUpgrade.itemCosts.forEach(({ item, quantity }) => {
            costs.addItem(item, quantity);
        });

        return costs;
    }

    public encode(writer: SaveWriter): SaveWriter {
        writer.writeUint32(this._state);
        this._sailTimer.encode(writer);
        writer.writeUint32(this._lockState);
        writer.writeNamespacedObject(this.currentUpgrade);
        writer.writeNamespacedObject(this.selectedPort);

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

    private decodeUpgrade(reader: SaveWriter, _version: number): ShipUpgrade {
        let upgrade = reader.getNamespacedObject(game.sailing.shipUpgrades);
        if (typeof upgrade === 'string') {
            upgrade = game.sailing.shipUpgrades.getObjectSafe('sailing:Cutter');
        }
        return upgrade;
    }

    public decode(reader: SaveWriter, version: number): void {
        this._state = reader.getUint32();
        this._sailTimer = new Timer('Skill', () => this.onReturn());
        this._sailTimer.decode(reader, version);
        if (this.game.sailing.saveVersion >= 2) {
            this._lockState = reader.getUint32();
            this._currentUpgrade = this.decodeUpgrade(reader, version);
        }

        this.selectedPort = this.decodePort(reader, version);

        this.callBackCallbacks();
    }

    private onReturn() {
        this._state = ShipState.HasReturned;
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
            new Dock(namespace, {
                id: localID,
                baseExperience: 0,
                level: 1,
                currencyCosts: [],
                itemCosts: [],
            }, game),
            game.sailing.shipUpgrades.getObjectSafe('sailing:Cutter'),
            game.sailing.ports.getObjectSafe('sailing:tinyIsland'),
            game,
        );
    }
}
