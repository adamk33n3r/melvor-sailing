import { SailingPage } from '../components/sailing';
import { Boat, DummyBoat } from './boat';
import { Constants } from './Constants';
import { UserInterface } from './ui';
import { Port, PortData } from './port';
import { LootComponent } from '../components/loot.component';

class SailingRenderQueue extends MasterySkillRenderQueue<BoatAction> {
  boats: boolean;
}

interface SailingSkillData extends BaseSkillData {
  categories?: SkillCategoryData[];
  ports?: PortData[];
}

interface BoatActionData extends BasicSkillRecipeData {
}

export class BoatAction extends BasicSkillRecipe {
  private _name: string;
  constructor(namespace: DataNamespace, data: BoatActionData, game: Game) {
    super(namespace, data, game);
  }

  public get name() {
    return getLangString(`${Constants.MOD_NAMESPACE}_Boat_${this.localID}`);
  }

  public get media() {
    return this.getMediaURL('img/sailing-boat.png');
  }
}

export class Sailing extends SkillWithMastery<BoatAction, SailingSkillData> {
  public resetMasteries() {
    this.actionMastery.forEach((actionMastery) => {
      actionMastery.xp = 0;
      actionMastery.level = 1;
    });
    this.actions.forEach((action) => this.updateMasteryDisplays(action));
  }
  public _media = 'img/sailing-boat.png';
  public renderQueue = new SailingRenderQueue();
  public page: SailingPage;
  public categories: NamespaceRegistry<SkillCategory>;
  public boats: NamespaceRegistry<Boat>;
  public ports: NamespaceRegistry<Port>;

  public hullChain: ShopUpgradeChain;
  public deckItemsChain: ShopUpgradeChain;
  public rudderChain: ShopUpgradeChain;
  public ramChain: ShopUpgradeChain;

  public ui: UserInterface;

  constructor(namespace: DataNamespace, game: Game) {
    super(namespace, 'Sailing', game);
    this.categories = new NamespaceRegistry(game.registeredNamespaces, SkillCategory.name);
    this.ports = new NamespaceRegistry(game.registeredNamespaces, Port.name);
    this.boats = new NamespaceRegistry(game.registeredNamespaces, Boat.name);
  }

  public generateLoot(boat: Boat, onClose: VoidFunction) {
    // this.game.shop.getLowestUpgradeInChain(this.hullChain.rootUpgrade)

    const rewards = new Rewards(this.game);

    const lootMap = new Map<AnyItem, number>();

    const numRolls = rollInteger(boat.port.minRolls, boat.port.maxRolls);
    for (let i = 0; i < numRolls; i++) {
      const lootItem = boat.port.lootTable.getDrop();
      const prev = lootMap.get(lootItem.item) ?? 0;
      lootMap.set(lootItem.item, prev + lootItem.quantity)
    }
    const items = Array.from(lootMap).map(([item, quantity]) => ({ item, quantity }));

    const currencies: CurrencyQuantity[] = [];
    boat.port.currencyDrops.forEach(({ currency, min, max }) => {
      currencies.push({ currency, quantity: this.modifyCurrencyReward(currency, rollInteger(min, max), boat.action) });
    });
    rewards.addItemsAndCurrency({ items, currencies })

    rewards.addXP(this, boat.baseXP, boat.action);

    const masteryXPToAdd = this.getMasteryXPToAddForAction(boat.action, boat.scaledForMasteryInterval);
    const masteryPoolXPToAdd = this.getMasteryXPToAddToPool(masteryXPToAdd);

    this.rollForRareDrops(boat.action.level, rewards, boat.action);
    this.rollForAdditionalItems(rewards, boat.interval);
    this.rollForAncientRelics(boat.action.level, boat.action.realm);
    this.rollForMasteryTokens(rewards, boat.action.realm);
    this.rollForPets(boat.interval, boat.action);

    const dummyHost = document.createElement('div');
    ui.create(LootComponent(boat.action, rewards, masteryXPToAdd, masteryPoolXPToAdd), dummyHost);
    SwalLocale.fire({
      iconHtml: `<img class="mbts__logo-img" src="${game.sailing.media}" />`,
      title: boat.port.name,
      confirmButtonText: 'Collect',
      confirmButtonColor: '#3085d6',
      // Can't let cancel because loot is generated here instead of on ship return
      // showCancelButton: true,
      html: dummyHost,
    }).then((result) => {
      // if (!result.value) {
      //   return;
      // }
      rewards.setSource('Sailing.Loot');
      rewards.giveRewards(true);
      this.addMasteryForAction(boat.action, boat.scaledForMasteryInterval);
      onClose();
    });
  }

  public onLevelUp(oldLevel: number, newLevel: number) {
    super.onLevelUp(oldLevel, newLevel);

    this.renderQueue.boats = true;
  }

  public renderModifierChange(): void {
    super.renderModifierChange();
    this.renderQueue.boats = true;
  }

  public onMasteryLevelUp(action: BoatAction, oldLevel: number, newLevel: number): void {
    super.onMasteryLevelUp(action, oldLevel, newLevel);
  }

  public render() {
    super.render();

    this.renderBoats();
  }

  public renderBoats() {
    if (!this.renderQueue.boats) {
      return;
    }


    this.page.boatComponents.forEach((boatComponent) => {
      boatComponent.update();
    });

    this.renderQueue.boats = false;
  }

  public onLoad(): void {
    super.onLoad();

    for (const action of this.actions.registeredObjects.values()) {
      this.renderQueue.actionMastery.add(action);
    }

    this.renderQueue.boats = true;
  }

  public getRegistry(type: ScopeSourceType): NamespaceRegistry<NamedObject> | undefined {
    switch (type) {
      case ScopeSourceType.Action:
        return this.actions;
    }
  }

  public registerData(namespace: DataNamespace, data: SailingSkillData): void {
    super.registerData(namespace, data);
    if (data.categories !== undefined) {
      console.log(`Registering ${data.categories.length} Categories`);
      data.categories.forEach(category => {
        this.categories.registerObject(new SkillCategory(namespace, category, this, this.game));
      });
    }

    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat1",
      level: 1,
      baseExperience: 1,
      realm: "melvorD:Melvor",
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat2",
      level: 15,
      baseExperience: 1,
      realm: "melvorD:Melvor",
    }, this.game))
    // each boat is a further destination, so they'll take longer and have higher rewards?
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat3",
      level: 50,
      baseExperience: 1,
      realm: "melvorD:Melvor",
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat4",
      level: 70,
      baseExperience: 1,
      realm: "melvorD:Melvor",
    }, this.game))

    this.actions.allObjects.forEach((action) => {
      this.boats.registerObject(new Boat(namespace, action, this.game));
    });

    if (data.ports !== undefined) {
      console.log(`Registering ${data.ports.length} Ports`);
      data.ports.forEach((port) => {
        this.ports.registerObject(new Port(namespace, port, this.game));
      });
    }

    this.boats.forEach((boat) => {
      boat.port = this.ports.getObjectSafe('sailing:tinyIsland');
    });
  }

  public modifyData(data: FixedMasterySkillModificationData): void {
    super.modifyData(data);
    if (data.headerUpgradeChains !== undefined) {
      this.headerUpgradeChains.push(...game.shop.upgradeChains.getArrayFromIds(data.headerUpgradeChains));
    }
  }

  public postDataRegistration(): void {
    super.postDataRegistration();

    this.sortedMasteryActions = this.actions.allObjects.sort((a, b) => a.level - b.level);

    // Use unshift so that the skill mastery milestone is last after sort if there are lvl 99 actions or ports
    this.milestones.unshift(...this.actions.allObjects);
    this.milestones.unshift(...this.ports.allObjects);
    this.sortMilestones();

    const chains = this.game.shop.upgradeChains.namespaceMaps.get(Constants.MOD_NAMESPACE);
    this.hullChain = chains.get(Constants.HULL_CHAIN_ID);
    this.deckItemsChain = chains.get(Constants.DECK_ITEMS_CHAIN_ID);
    this.rudderChain = chains.get(Constants.RUDDER_CHAIN_ID);
    this.ramChain = chains.get(Constants.RAM_CHAIN_ID);
  }

  private decodeBoat(reader: SaveWriter, version: number): Boat {
    let boat = reader.getNamespacedObject(this.boats);
    if (typeof boat === 'string') {
      if (boat.startsWith('sailing')) {
        boat = this.boats.getDummyObject(boat, DummyBoat, this.game);
      } else {
        boat = this.game.constructDummyObject(boat, DummyBoat);
      }
    }
    boat.decode(reader, version);
    return boat;
  }

  public decode(reader: SaveWriter, version: number): void {
    super.decode(reader, version);

    const saveVersion = reader.getUint32();

    const numBoats = reader.getUint32();
    for (let i = 0; i < numBoats; i++) {
      this.decodeBoat(reader, version);
    }
    const numDummyBoats = reader.getUint32();
    const tinyIsland = this.ports.getObjectSafe('sailing:tinyIsland');
    for (let i = 0; i < numDummyBoats; i++) {
      const boat = this.decodeBoat(reader, version);
      if (boat.port === undefined) boat.port = tinyIsland;
    }
  }

  public encode(writer: SaveWriter): SaveWriter {
    super.encode(writer);

    writer.writeUint32(Constants.VERSION);

    writer.writeUint32(this.boats.size);
    this.boats.forEach((boat) => {
      writer.writeNamespacedObject(boat);
      boat.encode(writer);
    });
    writer.writeUint32(this.boats.dummySize);
    this.boats.forEachDummy((boat) => {
      writer.writeNamespacedObject(boat);
      boat.encode(writer);
    });

    return writer;
  }

  public passiveTick() {
    this.boats.forEach(boat => {
      boat.sailTimer.tick();
    });
  }

  public getErrorLog(): string {
    return this.boats.allObjects.map((boat) => {
      return `Boat: ${boat.name}
State: ${boat.state}
Port: ${boat.port.name}
`;
    }).join('\n');
  }

  public isMasteryActionUnlocked(action: BoatAction): boolean {
    return this.isBasicSkillRecipeUnlocked(action);
  }

  public getActionIDFromOldID(oldActionID: number, idMap: NumericIDMap): string {
    return '';
  }
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
