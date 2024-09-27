export interface PortData extends RealmedObjectData, MilestoneLike {
    description: string;
    lootTable: DropTableData[];
    currencyDrops: CurrencyDropData[];
}

export class Port extends NamespacedObject {
    private _name: string;
    private _description: string;
    private _media: string;
    private _level: number;
    private _lootTable: DropTable;
    private _currencyDrops: CurrencyDrop[];

    public get name() {
        return this._name;
    }

    public get description() {
        return this._description;
    }

    public get media() {
        return this.getMediaURL(this._media);
    }

    public get level() {
        return this._level;
    }

    public get lootTable() {
        return this._lootTable;
    }

    public get currencyDrops() {
        return this._currencyDrops;
    }

    constructor(namespace: DataNamespace, data: PortData, game: Game) {
        super(namespace, data.id);
        this._name = data.name;
        this._description = data.description;
        this._media = data.media;
        this._level = data.level;

        this._lootTable = new DropTable(game, data.lootTable);
        this._currencyDrops = data.currencyDrops.map(({ currencyID, min, max }) => {
            return { currency: game.currencies.getObjectSafe(currencyID), min, max };
        });
    }
}

export class DummyPort extends Port {
    constructor(namespace: DataNamespace, id: string, game: Game) {
        super(
            namespace,
            {
                id,
                name: '',
                description: '',
                media: 'assets/media/main/question.png',
                level: 1,
                lootTable: [],
                currencyDrops: [],
            },
            game,
        );
    }
}
