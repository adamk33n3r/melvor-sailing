import { SailingPage } from '../components/sailing';
import { Ship, ShipAction, ShipState, DummyShip, ShipActionData } from './ship';
import { Constants } from './Constants';
import { UserInterface } from './ui';
import { Port, PortData } from './port';
import { LootComponent } from '../components/loot.component';

class SailingRenderQueue extends MasterySkillRenderQueue<ShipAction> {
  ships = true;
}

interface SailingSkillData extends BaseSkillData {
  categories?: SkillCategoryData[];
  ports?: PortData[];
  ships?: ShipActionData[];
}

export class Sailing extends SkillWithMastery<ShipAction, SailingSkillData> {
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
  public ships: NamespaceRegistry<Ship>;
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
    this.ships = new NamespaceRegistry(game.registeredNamespaces, Ship.name);
  }

  public generateLoot(ship: Ship, onClose: VoidFunction) {
    // const hullUpgrade = this.game.shop.getLowestUpgradeInChain(this.hullChain.rootUpgrade);
    // const deckItemUpgrade = this.game.shop.getLowestUpgradeInChain(this.deckItemsChain.rootUpgrade);
    // const rudderUpgrade = this.game.shop.getLowestUpgradeInChain(this.rudderChain.rootUpgrade);
    // const ramUpgrade = this.game.shop.getLowestUpgradeInChain(this.ramChain.rootUpgrade);

    const rewards = new Rewards(this.game);
    rewards.setActionInterval(ship.interval);

    const lootMap = new Map<AnyItem, number>();

    const numRolls = rollInteger(ship.port.minRolls, ship.port.maxRolls);
    for (let i = 0; i < numRolls; i++) {
      const lootItem = ship.port.lootTable.getDrop();
      const prev = lootMap.get(lootItem.item) ?? 0;
      lootMap.set(lootItem.item, prev + lootItem.quantity)
    }
    const items = Array.from(lootMap).map(([item, quantity]) => ({ item, quantity }));

    const currencies: CurrencyQuantity[] = [];
    ship.port.currencyDrops.forEach(({ currency, min, max }) => {
      currencies.push({ currency, quantity: this.modifyCurrencyReward(currency, rollInteger(min, max), ship.action) });
    });
    rewards.addItemsAndCurrency({ items, currencies })

    rewards.addXP(this, ship.baseXP, ship.action);

    const masteryXPToAdd = this.getMasteryXPToAddForAction(ship.action, ship.scaledForMasteryInterval);
    const masteryPoolXPToAdd = this.getMasteryXPToAddToPool(masteryXPToAdd);

    this.rollForMasteryTokens(rewards, ship.action.realm);
    this.rollForRareDrops(ship.action.level, rewards, ship.action);
    this.rollForAdditionalItems(rewards, ship.interval);
    this.rollForAncientRelics(ship.action.level, ship.action.realm);
    this.rollForPets(ship.interval, ship.action);

    const dummyHost = document.createElement('div');
    ui.create(LootComponent(ship.action, rewards, masteryXPToAdd, masteryPoolXPToAdd), dummyHost);
    addModalToQueue({
      iconHtml: `<img class="mbts__logo-img" src="${game.sailing.media}" />`,
      title: ship.port.name,
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
        this.addMasteryForAction(ship.action, ship.scaledForMasteryInterval);

        this.updateNotification(ship, -1);

        onClose();
      },
    });
  }

  public override rollForPets(interval: number, action: ShipAction) {
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

  private updateNotification(ship: Ship, quantity: number) {
    this.game.notifications.addNotification(this.returnNotification, {
      text: `Ships have returned!`,
      media: this.media,
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

    this.renderQueue.ships = true;
  }

  public override renderModifierChange(): void {
    super.renderModifierChange();
    this.renderQueue.ships = true;
  }

  public override onMasteryLevelUp(action: ShipAction, oldLevel: number, newLevel: number): void {
    super.onMasteryLevelUp(action, oldLevel, newLevel);
  }

  public override render() {
    super.render();

    this.renderShips();
  }

  public renderShips() {
    if (!this.renderQueue.ships) {
      return;
    }


    this.page.shipComponents.forEach((shipComponent) => {
      shipComponent.update();
    });

    this.renderQueue.ships = false;
  }

  public override onLoad(): void {
    super.onLoad();

    for (const action of this.actions.registeredObjects.values()) {
      this.renderQueue.actionMastery.add(action);
    }

    this.renderQueue.ships = true;
  }

  public override getRegistry(type: ScopeSourceType): NamespaceRegistry<NamedObject> | undefined {
    switch (type) {
      case ScopeSourceType.Action:
        return this.actions;
    }
  }

  public override registerData(namespace: DataNamespace, data: SailingSkillData): void {
    super.registerData(namespace, data);
    console.log('Sailing#registerData');

    if (data.ports !== undefined) {
      console.log(`Registering ${data.ports.length} Ports`);
      data.ports.forEach((port) => {
        this.ports.registerObject(new Port(namespace, port, this.game));
      });
    }

    if (data.ships !== undefined) {
      console.log(`Registering ${data.ships.length} Ships`);
      data.ships.forEach((ship) => {
        this.actions.registerObject(new ShipAction(namespace, ship, this.game));
      });
    }
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
    
    const tinyIsland = this.ports.getObjectSafe('sailing:tinyIsland');
    this.actions.allObjects.forEach((action) => {
      const ship = new Ship(game.registeredNamespaces.getNamespaceSafe(Constants.MOD_NAMESPACE), action, tinyIsland, this.game);
      ship.registerOnUpdate(() => {
        if (ship.state == ShipState.HasReturned) {
          this.updateNotification(ship, 1);
        }
      });
      this.ships.registerObject(ship);
    });
  }

  private decodeShip(reader: SaveWriter, version: number): Ship {
    let ship = reader.getNamespacedObject(this.ships);
    if (typeof ship === 'string') {
      if (ship.startsWith('sailing')) {
        ship = this.ships.getDummyObject(ship, DummyShip, this.game);
      } else {
        ship = this.game.constructDummyObject(ship, DummyShip);
      }
    }
    ship.decode(reader, version);
    return ship;
  }

  public override decode(reader: SaveWriter, version: number): void {
    super.decode(reader, version);

    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    const saveVersion = reader.getUint32();

    const numShips = reader.getUint32();
    for (let i = 0; i < numShips; i++) {
      this.decodeShip(reader, version);
    }
    const numDummyShips = reader.getUint32();
    for (let i = 0; i < numDummyShips; i++) {
      this.decodeShip(reader, version);
    }
  }

  public override encode(writer: SaveWriter): SaveWriter {
    super.encode(writer);

    writer.writeUint32(Constants.VERSION);

    writer.writeUint32(this.ships.size);
    this.ships.forEach((ship) => {
      writer.writeNamespacedObject(ship);
      ship.encode(writer);
    });
    writer.writeUint32(this.ships.dummySize);
    this.ships.forEachDummy((ship) => {
      writer.writeNamespacedObject(ship);
      ship.encode(writer);
    });

    return writer;
  }

  public passiveTick() {
    this.ships.forEach(ship => {
      ship.sailTimer.tick();
    });
  }

  public getErrorLog(): string {
    return this.ships.allObjects.map((ship) => {
      return `Ship: ${ship.name}
State: ${ship.state}
Port: ${ship.port.name}
`;
    }).join('\n');
  }

  public isMasteryActionUnlocked(action: ShipAction): boolean {
    return this.isBasicSkillRecipeUnlocked(action);
  }

  // eslint-disable-next-line @typescript-eslint/no-unused-vars
  public getActionIDFromOldID(oldActionID: number, idMap: NumericIDMap): string {
    return '';
  }
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
