import { SailingPageComponent } from '../components/sailing';
import { Ship, Dock, ShipState, DummyShip, DockData, ShipUpgrade, ShipUpgradeData } from './ship';
import { Constants } from './Constants';
import { UserInterface } from './ui';
import { NormalPort, Port, PortData, SkillPort } from './port';
import { LootComponent } from '../components/loot.component';
import { Logger, LogLevel } from './logger';
import { SailingAction } from './sailingaction';

class SailingRenderQueue extends MasterySkillRenderQueue<SailingAction> {
  ships = true;
  ports = true;
}

interface SailingSkillData extends BaseSkillData {
  categories?: SkillCategoryData[];
  ports?: PortData[];
  docks?: DockData[];
  shipUpgrades?: ShipUpgradeData[];
}

class SailingRewards extends Rewards {
  public applyRate(rate: number) {
    this._items.forEach((quantity, item, m) => {
      m.set(item, Math.ceil(quantity * rate));
    });
    this._currencies.forEach((quantity, currency, m) => {
      m.set(currency, Math.ceil(quantity * rate));
    });
    this._xp.forEach((quantity) => {
      if (quantity.noAction > 0) {
        quantity.noAction = Math.ceil(quantity.noAction * rate);
      }
      quantity.action.forEach((amount, action, m) => {
        m.set(action, Math.ceil(amount * rate));
      });
    });
    this._abyssalXP.forEach((quantity) => {
      if (quantity.noAction > 0) {
        quantity.noAction = Math.ceil(quantity.noAction * rate);
      }
      quantity.action.forEach((amount, action, m) => {
        m.set(action, Math.ceil(amount * rate));
      });
    });
  }
}

export class SailingNotification extends SuccessNotification {
  constructor(public ship?: Ship) {
    super('sailing:Returned');
  }
}

export class Sailing extends SkillWithMastery<SailingAction, SailingSkillData> {
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
    const rewards = new SailingRewards(this.game);
    ship.selectedPort.generateLoot(rolls, rewards, ship.dock);
    this.logger.log(rewards.getItemQuantityArray());
    for (const reward of rewards.getItemQuantityArray().sort((a, b) => b.item.sellsFor.quantity - a.item.sellsFor.quantity)) {
      this.logger.log(reward.quantity, reward.item.name);
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

    const rewards = new SailingRewards(this.game);
    rewards.setActionInterval(ship.interval);

    const rollMod = this.getRollModifier(ship.dock);
    const numRolls = rollInteger(Math.round(ship.selectedPort.minRolls * rollMod), Math.round(ship.selectedPort.maxRolls * rollMod));
    ship.selectedPort.generateLoot(numRolls, rewards, ship.dock);

    rewards.addXP(this, ship.baseXP, ship.dock);

    const masteryXPToAdd = this.getMasteryXPToAddForAction(ship.dock, ship.scaledForMasteryInterval);
    const portMasteryXPToAdd = this.getMasteryXPToAddForAction(ship.selectedPort, ship.scaledForMasteryInterval);
    const masteryPoolXPToAdd = this.getMasteryXPToAddToPool(masteryXPToAdd + portMasteryXPToAdd);

    this.rollForMasteryTokens(rewards, ship.dock.realm);
    this.rollForRareDrops(ship.dock.level, rewards, ship.dock);
    this.rollForAdditionalItems(rewards, ship.interval);
    this.rollForAncientRelics(ship.dock.level, ship.dock.realm);
    this.rollForPets(ship.interval, ship.dock);

    const dummyHost = document.createElement('div');
    ui.create(LootComponent(ship.dock, ship.selectedPort, rewards, masteryXPToAdd, portMasteryXPToAdd, masteryPoolXPToAdd), dummyHost);
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

        const combatMod = this.getCombatModifier(ship.dock);
        const chance = Math.min(1, combatMod / ship.selectedPort.sailingStats.combat);
        if (rollPercentage(chance * 100)) {
          rewards.applyRate(0.5);
        }

        rewards.giveRewards(true);
        this.addMasteryForAction(ship.dock, ship.scaledForMasteryInterval);
        this.addMasteryForAction(ship.selectedPort, ship.scaledForMasteryInterval);

        this.updateNotification(-1);

        onClose();
      },
    });
  }

  public getRollModifier(action?: Dock): number {
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

  public getCombatModifier(dock?: Dock): number {
    return this.game.modifiers.getValue('sailing:Combat', this.getActionModifierQuery(dock));
  }

  public modifySailingCurrencyReward(currency: Currency, amount: number, dock: Dock, port: Port): number {
    amount *= 1 + (this.getCurrencyModifier(currency, dock), this.getCurrencyModifier(currency, port)) / 100;
    amount = Math.floor(amount);
    if (this.id !== 'melvorD:Magic') amount += this.getFlatCurrencyModifier(currency, dock) + this.getFlatCurrencyModifier(currency, port);
    return Math.max(amount, 0);
  }

  public override _buildPercentageIntervalSources(action?: NamedObject): ModifierSourceBuilder {
    const builder = super._buildPercentageIntervalSources(action);
    builder.addSources('sailing:Speed', this.getActionModifierQuery(action), -0.01);
    return builder;
  }

  public override rollForPets(interval: number, action: Dock) {
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

  public override checkMasteryLevelBonusFilter(action: SailingAction, filter: string): boolean {
    switch (filter) {
      case 'Port':
        return action instanceof Port;
      case 'Dock':
        return action instanceof Dock;
    }
    return true;
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
    this.renderQueue.ports = true;
  }

  public override renderModifierChange(): void {
    super.renderModifierChange();
    this.renderQueue.ships = true;
    this.renderQueue.ports = true;
  }

  public override onMasteryLevelUp(action: Dock, oldLevel: number, newLevel: number): void {
    super.onMasteryLevelUp(action, oldLevel, newLevel);
  }

  public override render() {
    super.render();

    this.renderShips();
    this.renderPorts();
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

  public renderPorts() {
    if (!this.renderQueue.ports) {
      return;
    }

    this.page.portComponents.forEach((portComponent) => {
      portComponent.update();
    });

    this.renderQueue.ports = false;
  }

  public override onLoad(): void {
    super.onLoad();

    this.updateActionMasteries();

    this.renderQueue.ships = true;
    this.renderQueue.ports = true;
  }

  public updateActionMasteries() {
    for (const action of this.actions.registeredObjects.values()) {
      this.renderQueue.actionMastery.add(action);
    }
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
          case 'normal': {
            this.logger.debug(`Registering Normal Port: ${port.name}`);
            const normalPort = new NormalPort(namespace, port, this.game);
            this.ports.registerObject(normalPort);
            this.actions.registerObject(normalPort);
            break;
          }
          case 'skill': {
            this.logger.debug(`Registering Skill Port: ${port.name}`);
            const skillPort = new SkillPort(namespace, port, this.game);
            this.ports.registerObject(skillPort);
            this.actions.registerObject(skillPort);
            break;
          }
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
        this.actions.registerObject(new Dock(namespace, dock, this.game));
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

    // TODO: filter out ports that you have not unlocked so they are a secret
    this.sortedMasteryActions = this.actions.allObjects.sort((a, b) => a.level - b.level);

    // Use unshift so that the skill mastery milestone is last after sort if there are lvl 99 actions or ports
    this.milestones.unshift(...this.actions.allObjects.filter((action) => !(action instanceof SkillPort)));
    // this.milestones.unshift(...this.ports.filter((port) => port instanceof NormalPort).map((port) => port as NormalPort));
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
    // TODO: migrate this data into ship action itself
    this.actions.allObjects.forEach((action) => {
      if (action instanceof Dock) {
        const ship = new Ship(namespace, action, cutter, tinyIsland, this.game);
        ship.registerOnUpdate(() => {
          if (ship.state == ShipState.HasReturned) {
            this.updateNotification(1);
          }
        });
        this.ships.registerObject(ship);
      }
    });


    for (const port of this.ports.filter((port) => port.isSkillPort())) {
      const unlockItem = new Item(namespace, {
        id: `navigationChart_${port.localID}`,
        name: `Navigation Chart (${port.name})`,
        category: "Sailing",
        type: "Chart",
        media: "img/navigation_chart.png",
        ignoreCompletion: false,
        obtainFromItemLog: false,
        golbinRaidExclusive: false,
        sellsFor: 100000,
      }, this.game);
      this.logger.debug(`Registering unlock item: ${unlockItem.name}`);
      this.game.items.registerObject(unlockItem);
      (port as SkillPort).unlockItem = unlockItem;
    }

    this.logger.debug('end of postDataRegistration');
  }

  private decodeShip(reader: SaveWriter, version: number): Ship {
    let ship = reader.getNamespacedObject(this.ships);
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

  public isMasteryActionUnlocked(action: Dock): boolean {
    return this.isBasicSkillRecipeUnlocked(action);
  }

  // eslint-disable-next-line @typescript-eslint/no-unused-vars
  public getActionIDFromOldID(oldActionID: number, idMap: NumericIDMap): string {
    return '';
  }

  public override onPageChange(): void {
    this.logger.debug('onPageChange');
    this.renderQueue.ships = true;
    this.renderQueue.ports = true;
    super.onPageChange();
  }

  public override queueBankQuantityRender(item: AnyItem): void {
    this.logger.debug('queueBankQuantityRender:', item);
    this.renderQueue.ships = true;
    this.renderQueue.ports = true;
  }

  public queueCurrencyQuantityRender(currency: Currency): void {
    this.logger.debug('queueCurrencyQuantityRender:', currency);
    this.renderQueue.ships = true;
    this.renderQueue.ports = true;
  }
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
