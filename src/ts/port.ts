import { SailingAction } from './sailingaction';
import { Dock } from './ship';
import { cascadeInterp2, ChanceData, getChance } from './util';

interface BasePortData extends BasicSkillRecipeData {
    name: string;
    type: string;
    description: string;
    distance: number;
    sailingStats: {
        combat: number;
        morale: number;
        seafaring: number;
    };
    requirements: AnyRequirementData[];
    minRolls: number;
    maxRolls: number;
    currencyDrops: CurrencyDropData[];
}
export interface NormalPortData extends BasePortData {
    type: 'normal';
    media: string;
    lootTable: DropTableData[];
}
export interface SkillPortData extends BasePortData {
    type: 'skill';
    skillID: string;
}
export type PortData = NormalPortData | SkillPortData;

export abstract class Port extends SailingAction {
    private _name: string;
    private _type: PortData['type'];
    private _description: string;
    private _distance: number;
    private _sailingStats: {
        combat: number;
        morale: number;
        seafaring: number;
    };
    private _requirements: AnyRequirement[];
    private _minRolls: number;
    private _maxRolls: number;
    private _currencyDrops: CurrencyDrop[];

    public get name() {
        return this._name;
    }

    public get type() {
        return this._type;
    }

    public get description() {
        return this._description;
    }

    public get distance() {
        return this._distance;
    }

    public get sailingStats() {
        return this._sailingStats;
    }

    public get requirements() {
        return this._requirements;
    }

    public get minRolls() {
        return this._minRolls;
    }

    public get maxRolls() {
        return this._maxRolls;
    }

    public get currencyDrops() {
        return this._currencyDrops;
    }

    protected get logger() {
        return this.game.sailing.logger;
    }
    
    get interval() {
        return this.distance * 60 * 1000;
    }

    get scaledForMasteryInterval() {
        return this.distance * 1000;
    }

    constructor(namespace: DataNamespace, data: PortData, protected game: Game) {
        super(namespace, data, game);
        this._name = data.name;
        this._type = data.type;
        this._description = data.description;
        this._distance = data.distance;
        this._sailingStats = data.sailingStats;
        this._requirements = this.game.getRequirementsFromData(data.requirements);
        this._minRolls = data.minRolls;
        this._maxRolls = data.maxRolls;
        this.baseExperience = this.distance * (this.distance / 8);

        this._currencyDrops = data.currencyDrops.map(({ currencyID, min, max }) => {
            return { currency: game.currencies.getObjectSafe(currencyID), min, max };
        });
    }

    public abstract generateLoot(numRolls: number, rewards: Rewards, action: Dock): void;
    public abstract getPossibleLoot(): string;
    protected generateCurrencyLoot(dock: Dock) {
        const currencies: CurrencyQuantity[] = [];
        this.currencyDrops.forEach(({ currency, min, max }) => {
            currencies.push({ currency, quantity: this.game.sailing.modifySailingCurrencyReward(currency, rollInteger(min, max), dock, this) });
        });
        return currencies;
    }

    public abstract hasLevelRequirements(): boolean;
    public getLevelRequirements(): SkillLevelRequirement[] {
        return this.requirements.filter((req) => req.type === 'SkillLevel');
    }

    public meetsRequirements(): boolean {
        return this.game.checkRequirements(this.requirements);
    }

    public isNormalPort(): this is NormalPort {
        return this.type === 'normal';
    }

    public isSkillPort(): this is SkillPort {
        return this.type === 'skill';
    }
}

export class NormalPort extends Port {
    private _media: string;
    private _lootTable: DropTable;

    public get media() {
        return this.getMediaURL(this._media);
    }

    public get lootTable() {
        return this._lootTable;
    }

    // All normal ports are unlocked
    public isUnlocked(): boolean {
        return true;
    }

    constructor(namespace: DataNamespace, data: NormalPortData, game: Game) {
        super(namespace, data, game);
        this._media = data.media;
        this._lootTable = new DropTable(game, data.lootTable);
        // Schema requires there to be a sailing skill level requirement for normal ports
        this.level = this.getLevelRequirements().find((req) => req.skill === this.game.sailing)!.level;
    }

    public generateLoot(numRolls: number, rewards: Rewards, dock: Dock): void {
        const currencies = this.generateCurrencyLoot(dock);

        const items = [] as AnyItemQuantity[];
        for (let i = 0; i < numRolls; i++) {
            items.push(this.lootTable.getDrop());
        }

        rewards.addItemsAndCurrency({ items, currencies });
    }

    public getPossibleLoot(): string {
        return this.lootTable.sortedDropsArray.map((drop) => `${drop.minQuantity} - ${drop.maxQuantity} x <img class="skill-icon-xs" src="${drop.item.media}"/> ${drop.item.name}`).join('<br>');
    }

    public hasLevelRequirements(): boolean {
        return this.game.sailing.level >= this.level;
    }
}

export class SkillPort extends Port {
    private _skill: AnySkill;
    public get skill() {
        return this._skill;
    }

    public get media() {
        return this._skill.media;
    }

    public get isCrafting() {
        return this._skill instanceof CraftingSkill;
    }

    public get isGathering() {
        return this._skill instanceof GatheringSkill;
    }

    private _unlockItem?: Item;
    public get unlockItem() {
        return this._unlockItem!;
    }
    public set unlockItem(value: Item) {
        this._unlockItem = value;
    }

    public isUnlocked() {
        return game.stats.itemFindCount(this.unlockItem) > 0;
    }

    constructor(namespace: DataNamespace, data: SkillPortData, game: Game) {
        super(namespace, data, game);
        this._skill = game.skills.getObjectSafe(data.skillID);
        this.level = this.getLevelRequirements().find((req) => req.skill === this.skill)?.level ?? 1;
    }

    public override generateLoot(numRolls: number, rewards: Rewards, dock: Dock): void {
        const currencies = this.generateCurrencyLoot(dock);
        rewards.addItemsAndCurrency({ currencies });

        const chanceData = this.getProductChances(this.level, this.skill.level);
        this.logger.debug('chanceData', chanceData);

        for (let n = 0; n < numRolls; n++) {
            for (let i = 0; i < chanceData.length; i++) {
                const data = chanceData[i];
                if (i === chanceData.length - 1) {
                    this.logger.debug(`failed all rolls, so adding lowest chance item as default: ${data.product.name}`);
                    rewards.addItem(data.product, 1);
                } else if (rollPercentage(getChance(data, this.skill.level))) {
                    this.logger.debug(`success roll for ${data.product.name}`);
                    rewards.addItem(data.product, 1);
                }
            }
        }
    }

    public getProductChances(minLevel?: number, maxLevel?: number): ChanceData<AnyItem>[] {
        const recipes = this.getProductRecipes(minLevel, maxLevel);
        let lowChance = 0;
        const chanceData = [] as ChanceData<AnyItem>[];
        if (this.skill instanceof Mining) {
            const coal = recipes.splice(recipes.findIndex((ore) => ore.product.localID === 'Coal_Ore'), 1)[0];
            chanceData.push(
                {
                    product: coal.product,
                    req: coal.level,
                    low: 25,
                    high: 50,
                },
            );
        }
        return chanceData.concat(recipes.slice(0, this.getRecipeCount()).map((recipe, idx) => {
            lowChance += 5;
            // Last recipe is always 100% so that you always get an item
            const isLast = idx === recipes.length - 1;
            return {
                product: recipe.product,
                req: recipe.level,
                low: isLast ? 100 : lowChance,
                high: isLast ? 100 : lowChance * 2,
            };
        }));
    }

    private getRecipeCount(): number {
        if (
            this.skill instanceof Cooking ||
            this.skill instanceof Runecrafting
        ) {
            return 5;
        }

        return 10;
    }

    public getProductRecipes(minLevel?: number, maxLevel?: number): SingleProductRecipe[] {
        if (this.skill instanceof SkillWithMastery) {
            return this.skill.actions
                .filter((action) => action instanceof SingleProductRecipe || action instanceof SingleProductArtisanSkillRecipe)
                .map((action) => action as SingleProductRecipe | SingleProductArtisanSkillRecipe<SkillCategory>)
                .filter((action) => minLevel === undefined || action.level >= minLevel)
                .filter((action) => maxLevel === undefined || action.level <= maxLevel)
                .sort((a, b) => b.level - a.level || b.uid - a.uid);
        }

        return [];
    }

    public getPossibleLoot(): string {
        const chances = this.getProductChances(this.level, this.skill.level);
        return chances.map((chance, idx) => `%${formatFixed(cascadeInterp2(chances, this.skill.level, idx), 2)} - <img class="skill-icon-xs" src="${chance.product.media}"/> ${chance.product.name}`).join('<br>');
    }

    public hasLevelRequirements(): boolean {
        return this.game.checkRequirements(this.getLevelRequirements());
    }
}

export class DummyPort extends NormalPort {
    constructor(namespace: DataNamespace, id: string, game: Game) {
        super(
            namespace,
            {
                id,
                name: '',
                description: '',
                media: 'melvor:assets/media/main/question.png',
                distance: 0,
                type: 'normal',
                minRolls: 1,
                maxRolls: 1,
                baseExperience: 0,
                level: 1,
                lootTable: [],
                sailingStats: {
                    combat: 100,
                    morale: 100,
                    seafaring: 100,
                },
                requirements: [
                    {
                        type: 'SkillLevel',
                        skillID: 'sailing:Sailing',
                        level: 1,
                    },
                ],
                currencyDrops: [],
            },
            game,
        );
    }
}
