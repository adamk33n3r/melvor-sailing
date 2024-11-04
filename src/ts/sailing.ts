import { SailingPageComponent } from '../components/sailing';
import { Ship, ShipAction, ShipState, DummyShip, ShipActionData, ShipUpgrade, ShipUpgradeData } from './ship';
import { Constants } from './Constants';
import { UserInterface } from './ui';
import { NormalPort, Port, PortData, SkillPort } from './port';
import { LootComponent } from '../components/loot.component';
import { Logger, LogLevel } from './logger';

class SailingRenderQueue extends MasterySkillRenderQueue<ShipAction> {
  ships = true;
}

interface SailingSkillData extends BaseSkillData {
  categories?: SkillCategoryData[];
  ports?: PortData[];
  docks?: ShipActionData[];
  shipUpgrades?: ShipUpgradeData[];
}

export class SailingNotification extends SuccessNotification {
  constructor(public ship?: Ship) {
    super('sailing:Returned');
  }
}

export class Sailing extends SkillWithMastery<ShipAction, SailingSkillData> {
  public logger = new Logger('Sailing');
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
  public testLootGen(rolls: number = 5) {
    const ship = this.ships.allObjects[0];
    const rewards = new Rewards(this.game);
    ship.selectedPort.generateLoot(rolls, rewards, ship.action);
    console.log(rewards.getItemQuantityArray());
    for (const reward of rewards.getItemQuantityArray().sort((a, b) => b.item.sellsFor.quantity - a.item.sellsFor.quantity)) {
      console.log(reward.quantity, reward.item.name);
    }
  }
  /* devblock:end */

  public saveVersion = -1;
  public _media = 'img/sailing-boat.png';
  public renderQueue = new SailingRenderQueue();
  public page = SailingPageComponent();
  public categories: NamespaceRegistry<SkillCategory>;
  public ships: NamespaceRegistry<Ship>;
  public shipUpgrades: NamespaceRegistry<ShipUpgrade>;
  public ports: NamespaceRegistry<Port>;

  public hullChain?: ShopUpgradeChain;
  public deckItemsChain?: ShopUpgradeChain;
  public rudderChain?: ShopUpgradeChain;
  public ramChain?: ShopUpgradeChain;

  public ui?: UserInterface;

  private returnNotification = new SailingNotification();

  constructor(namespace: DataNamespace, game: Game) {
    super(namespace, 'Sailing', game);
    if (process.env.NODE_ENV === 'production') {
      this.logger.setLevel(LogLevel.Info);
    } else {
      this.logger.setLevel(LogLevel.Debug);
    }
    this.categories = new NamespaceRegistry(game.registeredNamespaces, SkillCategory.name);
    this.ports = new NamespaceRegistry(game.registeredNamespaces, Port.name);
    this.ships = new NamespaceRegistry(game.registeredNamespaces, Ship.name);
    this.shipUpgrades = new NamespaceRegistry(game.registeredNamespaces, ShipUpgrade.name);
  }

  public generateLoot(ship: Ship, onClose: VoidFunction) {
    // const hullUpgrade = this.game.shop.getLowestUpgradeInChain(this.hullChain.rootUpgrade);
    // const deckItemUpgrade = this.game.shop.getLowestUpgradeInChain(this.deckItemsChain.rootUpgrade);
    // const rudderUpgrade = this.game.shop.getLowestUpgradeInChain(this.rudderChain.rootUpgrade);
    // const ramUpgrade = this.game.shop.getLowestUpgradeInChain(this.ramChain.rootUpgrade);

    const rewards = new Rewards(this.game);
    rewards.setActionInterval(ship.interval);

    const rollMod = this.getRollModifier(ship.action);
    const numRolls = rollInteger(Math.round(ship.selectedPort.minRolls * rollMod), Math.round(ship.selectedPort.maxRolls * rollMod));
    ship.selectedPort.generateLoot(numRolls, rewards, ship.action);

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
      title: ship.selectedPort.name,
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

        this.updateNotification(-1);

        onClose();
      },
    });
  }

  public getRollModifier(action?: ShipAction): number {
    const morale = this.game.modifiers.getValue('sailing:Morale', this.getActionModifierQuery(action));
    // Every 100 morale is 1% more min and max rolls
    return 1 + morale / 100 / 100;
  }

  public override getXPModifier(action?: NamedObject): number {
    const mod = super.getXPModifier(action);
    const seafaring = this.game.modifiers.getValue('sailing:Seafaring', this.getActionModifierQuery(action));
    // Every 100 seafaring is 1% more xp
    return mod + seafaring / 100;
  }

  public override getPercentageIntervalModifier(action?: NamedObject): number {
    const mod = super.getPercentageIntervalModifier(action);
    const speed = this.game.modifiers.getValue('sailing:Speed', this.getActionModifierQuery(action));
    // Every 100 speed is 1% less interval
    return mod - speed / 100;
  }

  public override _buildPercentageIntervalSources(action?: NamedObject): ModifierSourceBuilder {
    const builder = super._buildPercentageIntervalSources(action);
    builder.addSources('sailing:Speed', this.getActionModifierQuery(action), -0.01);
    return builder;
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

  private updateNotification(quantity: number) {
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

    if (data.ports !== undefined) {
      this.logger.info(`Registering ${data.ports.length} Ports`);
      data.ports.forEach((port) => {
        switch (port.type) {
          case 'normal':
            this.ports.registerObject(new NormalPort(namespace, port, this.game));
            break;
          case 'skill':
            this.ports.registerObject(new SkillPort(namespace, port, this.game));
            break;
        }
      });
    }

    if (data.shipUpgrades !== undefined) {
      this.logger.info(`Registering ${data.shipUpgrades.length} ShipUpgrades`);
      data.shipUpgrades.forEach((upgradeData) => {
        this.shipUpgrades.registerObject(new ShipUpgrade(namespace, upgradeData, this.game));
      });
    }

    if (data.docks !== undefined) {
      this.logger.info(`Registering ${data.docks.length} Docks`);
      data.docks.forEach((dock) => {
        this.actions.registerObject(new ShipAction(namespace, dock, this.game));
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
    const namespace = game.registeredNamespaces.getNamespaceSafe(Constants.MOD_NAMESPACE);

    this.sortedMasteryActions = this.actions.allObjects.sort((a, b) => a.level - b.level);

    // Use unshift so that the skill mastery milestone is last after sort if there are lvl 99 actions or ports
    this.milestones.unshift(...this.actions.allObjects);
    this.milestones.unshift(...this.ports.filter((port) => port instanceof NormalPort).map((port) => port as NormalPort));
    this.sortMilestones();
    this.logger.debug('postDataRegistration');

    const chains = this.game.shop.upgradeChains.namespaceMaps.get(Constants.MOD_NAMESPACE);
    if (chains) {
      this.hullChain = chains.get(Constants.HULL_CHAIN_ID);
      this.deckItemsChain = chains.get(Constants.DECK_ITEMS_CHAIN_ID);
      this.rudderChain = chains.get(Constants.RUDDER_CHAIN_ID);
      this.ramChain = chains.get(Constants.RAM_CHAIN_ID);
    }
    
    const tinyIsland = this.ports.getObjectSafe('sailing:tinyIsland');
    const cutter = this.shipUpgrades.getObjectSafe('sailing:Cutter');
    this.actions.allObjects.forEach((action) => {
      const ship = new Ship(namespace, action, cutter, tinyIsland, this.game);
      ship.registerOnUpdate(() => {
        if (ship.state == ShipState.HasReturned) {
          this.updateNotification(1);
        }
      });
      this.ships.registerObject(ship);
    });


    for (const port of this.ports.filter((port) => port instanceof SkillPort)) {
      this.game.items.registerObject(new Item(namespace, {
        id: `navigationChart_${port.localID}`,
        name: `Navigation Chart (${port.name})`,
        category: "Sailing",
        type: "Chart",
        media: "img/navigation_chart.png",
        ignoreCompletion: false,
        obtainFromItemLog: false,
        golbinRaidExclusive: false,
        sellsFor: 100000,
      }, this.game));
    }

    this.logger.debug('end of postDataRegistration');
  }

  private decodeShip(reader: SaveWriter, version: number): Ship {
    let ship = reader.getNamespacedObject(this.ships);
    this.logger.error(ship);
    if (typeof ship === 'string') {
      if (ship.startsWith('sailing')) {
        // Upgrade boats to new dock name
        if (ship.startsWith('sailing:Boat')) {
          ship = this.ships.getObjectSafe(`sailing:Dock${ship.slice(ship.indexOf(':Boat') + 5)}`);
        } else {
          ship = this.ships.getDummyObject(ship, DummyShip, this.game);
        }
      } else {
        ship = this.game.constructDummyObject(ship, DummyShip);
      }
    }

    ship.decode(reader, version);
    return ship;
  }

  public override decode(reader: SaveWriter, version: number): void {
    super.decode(reader, version);

    this.saveVersion = reader.getUint32();

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
Port: ${ship.selectedPort.name}
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

  public override onPageChange(): void {
    this.logger.debug('onPageChange');
    this.renderQueue.ships = true;
    super.onPageChange();
  }

  public override queueBankQuantityRender(item: AnyItem): void {
    this.logger.debug('queueBankQuantityRender:', item);
    this.renderQueue.ships = true;
  }

  public queueCurrencyQuantityRender(currency: Currency): void {
    this.logger.debug('queueCurrencyQuantityRender:', currency);
    this.renderQueue.ships = true;
  }
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
