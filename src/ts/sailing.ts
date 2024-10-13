import { SailingPage } from '../components/sailing';
import { Boat, BoatAction, BoatState, DummyBoat } from './boat';
import { Constants } from './Constants';
import { UserInterface } from './ui';
import { Port, PortData } from './port';
import { LootComponent } from '../components/loot.component';

class SailingRenderQueue extends MasterySkillRenderQueue<BoatAction> {
  boats = true;
}

interface SailingSkillData extends BaseSkillData {
  categories?: SkillCategoryData[];
  ports?: PortData[];
}

export class Sailing extends SkillWithMastery<BoatAction, SailingSkillData> {
  /* devblock:start */
  public resetMasteries() {
    this.actionMastery.forEach((actionMastery) => {
      actionMastery.xp = 0;
      actionMastery.level = 1;
    });
    this.actions.forEach((action) => this.updateMasteryDisplays(action));
  }
  public removePets() {
    this.game.petManager.unlocked.clear();
    this.game.petManager.modifiers.entries.clear();
    this.game.petManager.modifiers.entriesByID.clear();
  }
  public setLevel(level: number) {
    this.setXP(exp.levelToXP(level) + 1);
  }
  /* devblock:end */

  public _media = 'img/sailing-boat.png';
  public renderQueue = new SailingRenderQueue();
  public page = new SailingPage();
  public categories: NamespaceRegistry<SkillCategory>;
  public boats: NamespaceRegistry<Boat>;
  public ports: NamespaceRegistry<Port>;

  public hullChain?: ShopUpgradeChain;
  public deckItemsChain?: ShopUpgradeChain;
  public rudderChain?: ShopUpgradeChain;
  public ramChain?: ShopUpgradeChain;

  public ui?: UserInterface;

  private returnNotification = new SuccessNotification('sailing:Returned');

  constructor(namespace: DataNamespace, game: Game) {
    super(namespace, 'Sailing', game);
    this.categories = new NamespaceRegistry(game.registeredNamespaces, SkillCategory.name);
    this.ports = new NamespaceRegistry(game.registeredNamespaces, Port.name);
    this.boats = new NamespaceRegistry(game.registeredNamespaces, Boat.name);
  }

  public generateLoot(boat: Boat, onClose: VoidFunction) {
    // const hullUpgrade = this.game.shop.getLowestUpgradeInChain(this.hullChain.rootUpgrade);
    // const deckItemUpgrade = this.game.shop.getLowestUpgradeInChain(this.deckItemsChain.rootUpgrade);
    // const rudderUpgrade = this.game.shop.getLowestUpgradeInChain(this.rudderChain.rootUpgrade);
    // const ramUpgrade = this.game.shop.getLowestUpgradeInChain(this.ramChain.rootUpgrade);

    const rewards = new Rewards(this.game);
    rewards.setActionInterval(boat.interval);

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

    this.rollForMasteryTokens(rewards, boat.action.realm);
    this.rollForRareDrops(boat.action.level, rewards, boat.action);
    this.rollForAdditionalItems(rewards, boat.interval);
    this.rollForAncientRelics(boat.action.level, boat.action.realm);
    this.rollForPets(boat.interval, boat.action);

    const dummyHost = document.createElement('div');
    ui.create(LootComponent(boat.action, rewards, masteryXPToAdd, masteryPoolXPToAdd), dummyHost);
    addModalToQueue({
      iconHtml: `<img class="mbts__logo-img" src="${game.sailing.media}" />`,
      title: boat.port.name,
      confirmButtonText: 'Collect',
      confirmButtonColor: '#3085d6',
      // Can't let cancel because loot is generated here instead of on ship return
      // showCancelButton: true,
      html: dummyHost,
      didDestroy: () => {
        // if (!result.value) {
        //   return;
        // }
        rewards.setSource('Sailing.Loot');
        rewards.giveRewards(true);
        this.addMasteryForAction(boat.action, boat.scaledForMasteryInterval);

        this.updateNotification(boat, -1);

        onClose();
      },
    });
  }

  public override rollForPets(interval: number, action: BoatAction) {
    super.rollForPets(interval / 100, action);
  }

  public override rollForMasteryTokens(rewards: Rewards, realm: Realm): void {
    const portDistance = rewards.actionInterval / 60 / 1000;
    const tokens = this.masteryTokens.get(realm);
    if (tokens !== undefined) {
      tokens.forEach((token) => {
        if (!token.rollInSkill)
          return;
        const masteryTokenChance = this.masteryTokenChance * portDistance;
        if (rollPercentage(masteryTokenChance)) {
          // Max tokens 1 per hour
          const qty = 1 + this.game.modifiers.flatMasteryTokens + Math.floor(portDistance / rollInteger(60, 600));
          rewards.addItem(token, qty);
        }
      });
    }
  }

  private updateNotification(boat: Boat, quantity: number) {
    this.game.notifications.addNotification(this.returnNotification, {
      text: `Ships have returned!`,
      media: boat.media,
      quantity,
      isImportant: true,
      isError: false,
    });
    //@ts-expect-error The above addNotification call will cause this to not be undefined
    const quant = this.game.notifications.activeNotifications.get(this.returnNotification).quantity;
    if (quant > 0) {
      skillNav.setGlowing(this, true);
    } else {
      skillNav.setGlowing(this, false);
      this.game.notifications.removeNotification(this.returnNotification);
    }
  }

  public override onLevelUp(oldLevel: number, newLevel: number) {
    super.onLevelUp(oldLevel, newLevel);

    this.renderQueue.boats = true;
  }

  public override renderModifierChange(): void {
    super.renderModifierChange();
    this.renderQueue.boats = true;
  }

  public override onMasteryLevelUp(action: BoatAction, oldLevel: number, newLevel: number): void {
    super.onMasteryLevelUp(action, oldLevel, newLevel);
  }

  public override render() {
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

  public override onLoad(): void {
    super.onLoad();

    for (const action of this.actions.registeredObjects.values()) {
      this.renderQueue.actionMastery.add(action);
    }

    this.renderQueue.boats = true;
  }

  public override getRegistry(type: ScopeSourceType): NamespaceRegistry<NamedObject> | undefined {
    switch (type) {
      case ScopeSourceType.Action:
        return this.actions;
    }
  }

  public override registerData(namespace: DataNamespace, data: SailingSkillData): void {
    super.registerData(namespace, data);

    if (data.ports !== undefined) {
      console.log(`Registering ${data.ports.length} Ports`);
      data.ports.forEach((port) => {
        this.ports.registerObject(new Port(namespace, port, this.game));
      });
    }

    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat1",
      level: 1,
      baseExperience: 1,
      realm: "melvorD:Melvor",
      media: 'img/sailing-boat.png',
      currencyCosts: [],
      itemCosts: [],
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat2",
      level: 30,
      baseExperience: 1,
      realm: "melvorD:Melvor",
      media: 'img/ship.png',
      currencyCosts: [{id: 'melvorD:GP', quantity: 100}],
      itemCosts: [],
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat3",
      level: 50,
      baseExperience: 1,
      realm: "melvorD:Melvor",
      media: 'img/submarine.png',
      currencyCosts: [{id: 'melvorD:GP', quantity: 10000}],
      itemCosts: [],
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat4",
      level: 70,
      baseExperience: 1,
      realm: "melvorD:Melvor",
      media: 'img/container-ship.png',
      currencyCosts: [{id: 'melvorD:GP', quantity: 1000000}],
      itemCosts: [{id: 'melvorD:Dragonite_Bar', quantity: 10000}],
    }, this.game))
    
    const tinyIsland = this.ports.getObjectSafe('sailing:tinyIsland');
    this.actions.allObjects.forEach((action) => {
      const boat = new Boat(namespace, action, tinyIsland, this.game);
      boat.registerOnUpdate(() => {
        if (boat.state == BoatState.HasReturned) {
          this.updateNotification(boat, 1);
        }
      });
      this.boats.registerObject(boat);
    });
  }

  public override modifyData(data: FixedMasterySkillModificationData): void {
    super.modifyData(data);
    if (data.headerUpgradeChains !== undefined) {
      this.headerUpgradeChains.push(...game.shop.upgradeChains.getArrayFromIds(data.headerUpgradeChains));
    }
  }

  public override postDataRegistration(): void {
    super.postDataRegistration();

    this.sortedMasteryActions = this.actions.allObjects.sort((a, b) => a.level - b.level);

    // Use unshift so that the skill mastery milestone is last after sort if there are lvl 99 actions or ports
    this.milestones.unshift(...this.actions.allObjects);
    this.milestones.unshift(...this.ports.allObjects);
    this.sortMilestones();

    const chains = this.game.shop.upgradeChains.namespaceMaps.get(Constants.MOD_NAMESPACE);
    if (chains) {
      this.hullChain = chains.get(Constants.HULL_CHAIN_ID);
      this.deckItemsChain = chains.get(Constants.DECK_ITEMS_CHAIN_ID);
      this.rudderChain = chains.get(Constants.RUDDER_CHAIN_ID);
      this.ramChain = chains.get(Constants.RAM_CHAIN_ID);
    }
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

  public override decode(reader: SaveWriter, version: number): void {
    super.decode(reader, version);

    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    const saveVersion = reader.getUint32();

    const numBoats = reader.getUint32();
    for (let i = 0; i < numBoats; i++) {
      this.decodeBoat(reader, version);
    }
    const numDummyBoats = reader.getUint32();
    for (let i = 0; i < numDummyBoats; i++) {
      this.decodeBoat(reader, version);
    }
  }

  public override encode(writer: SaveWriter): SaveWriter {
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

  // eslint-disable-next-line @typescript-eslint/no-unused-vars
  public getActionIDFromOldID(oldActionID: number, idMap: NumericIDMap): string {
    return '';
  }
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
