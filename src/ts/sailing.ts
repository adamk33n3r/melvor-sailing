import { SailingPage } from '../components/sailing';
import { Boat } from './boat';
import { Constants } from './Constants';
import { UserInterface } from './ui';
const ctx = mod.getContext(Constants.MOD_NAMESPACE);
// console.log('import meta', import.meta);
// console.log(version);
import SailingBoat from '../img/sailing-boat.png';
import { Port, PortData } from './port';
import { LootComponent } from '../components/loot.component';

class SailingRenderQueue extends MasterySkillRenderQueue<BoatAction> {
  boats: boolean;
}
interface SailingSkillData extends BaseSkillData {
  categories?: SkillCategoryData[];
  ports?: PortData[];
};
interface SailingMasteryData extends BasicSkillRecipeData {
  name: string;
}
export class BoatAction extends BasicSkillRecipe {
  constructor(namespace: DataNamespace, data: SailingMasteryData, game: Game) {
    super(namespace, data, game);
  }

  public get name() {
    return this.localID;
    return getLangString(`Myth_Music_Instrument_${this.localID}`);
  }

  public get media() {
    return this.getMediaURL('img/sailing-boat.png');
    // return this.getMediaURL(this.data.media);
  }
}
export class Sailing extends SkillWithMastery<BoatAction, SailingSkillData> {
  passiveTick() {
    this.boats.forEach(boat => {
      boat.sailTimer.tick();
    });
  }
  getErrorLog(): string {
    return 'Already active';
    // return `Is Active: ${this.isActive}\n`;
  }
  isMasteryActionUnlocked(action: BoatAction): boolean {
    // return true;
    return this.isBasicSkillRecipeUnlocked(action);
  }
  getActionIDFromOldID(oldActionID: number, idMap: NumericIDMap): string {
    return '';
  }
  public _media = 'img/sailing-boat.png';
  public renderQueue = new SailingRenderQueue();
  // public page: Element;
  public page: SailingPage;
  public boat: Component<any>;
  public categories: NamespaceRegistry<SkillCategory>;
  public boats: NamespaceRegistry<Boat>;
  public ports: NamespaceRegistry<Port>;

  public ui: UserInterface;
  // private lootTable: DropTable;
  // private loot: CombatLoot;

  constructor(namespace: DataNamespace, game: Game) {
    super(namespace, 'Sailing', game);
    console.log('loaded sailing skill');
    this.categories = new NamespaceRegistry(game.registeredNamespaces, SkillCategory.name);
    this.ports = new NamespaceRegistry(game.registeredNamespaces, Port.name);
    this.boats = new NamespaceRegistry(game.registeredNamespaces, Boat.name);
  }

  public generateLoot(boat: Boat, onClose: VoidFunction) {
    console.log('generating loot for boat:', boat.id);

    const lootMap = new Map<AnyItem, number>();

    const numRolls = rollInteger(boat.port.minRolls, boat.port.maxRolls);
    for (let i = 0; i < numRolls; i++) {
      const lootItem = boat.port.lootTable.getDrop();
      const prev = lootMap.get(lootItem.item) ?? 0;
      lootMap.set(lootItem.item, prev + lootItem.quantity)
    }

    const currencyMap = new Map<Currency, number>();
    boat.port.currencyDrops.forEach(({ currency, min, max }) => {
      currencyMap.set(currency, rollInteger(min, max));
    });
    const currencies = Array.from(currencyMap).map(([currency, quantity]) => ({ currency, quantity }));
    const loot = Array.from(lootMap).map(([item, quantity]) => ({ item, quantity }));
    const dummyHost = document.createElement('div');
    const xpAmt = boat.port.distance * boat.port.distance;
    ui.create(LootComponent(xpAmt, currencies, loot), dummyHost);
    SwalLocale.fire({
      iconHtml: `<img class="mbts__logo-img" src="${ctx.getResourceUrl(SailingBoat)}" />`,
      title: ctx.name,
      html: dummyHost,
    }).then(() => {
      for (const currencyQ of currencies) {
        currencyQ.currency.add(currencyQ.quantity);
      }
      const action = this.actions.allObjects.find(action => action.localID === boat.localID);
      loot.forEach((itemQ) => {
        this.game.bank.addItem(itemQ.item, itemQ.quantity, false, true, true, true, 'Sailing.Loot');
      });
      this.addXP(xpAmt, action);
      this.addMasteryXP(action, xpAmt);
      this.addMasteryForAction(action, boat.port.distance * 60 * 1000);
      onClose();
    });
  }

  public onLevelUp(oldLevel: number, newLevel: number) {
    super.onLevelUp(oldLevel, newLevel);

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

  // TODO: Add progress bar to boats
    // public renderProgressBar() {
    //     if (!this.renderQueue.progressBar) {
    //         return;
    //     }

    //     const progressBar = this.userInterface.instruments.get(this.activeInstrument)?.progressBar;

    //     if (progressBar !== this.renderedProgressBar) {
    //         this.renderedProgressBar?.stopAnimation();
    //     }

    //     if (progressBar !== undefined) {
    //         if (this.isActive) {
    //             progressBar.animateProgressFromTimer(this.actionTimer);
    //             this.renderedProgressBar = progressBar;
    //         } else {
    //             progressBar.stopAnimation();
    //             this.renderedProgressBar = undefined;
    //         }
    //     }

    //     this.renderQueue.progressBar = false;
    // }

  public initMenus(): void {
    super.initMenus();
    console.log('PAGE:', this.page.setCategoryMenu(this.categories));
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
      name: "Boat 1",
      level: 1,
      baseExperience: 1,
      realm: "melvorD:Melvor",
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat2",
      name: "Boat 2",
      level: 15,
      baseExperience: 10,
      realm: "melvorD:Melvor",
    }, this.game))
    // each boat is a further destination, so they'll take longer and have higher rewards?
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat3",
      name: "Boat 3",
      level: 50,
      baseExperience: 100,
      realm: "melvorD:Melvor",
    }, this.game))
    this.actions.registerObject(new BoatAction(namespace, {
      id: "Boat4",
      name: "Boat 4",
      level: 70,
      baseExperience: 1000,
      realm: "melvorD:Melvor",
    }, this.game))

    this.actions.allObjects.forEach((action) => {
      this.boats.registerObject(new Boat(namespace, action.localID, this.game));
    });

    if (data.ports !== undefined) {
      console.log(`Registering ${data.ports.length} Ports`);
      data.ports.forEach((port) => {
        console.log(port);
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

    // Use unshift so that the skill mastery milestone is last after sort if there are lvl 99 actions or ports
    this.milestones.unshift(...this.actions.allObjects);
    this.milestones.unshift(...this.ports.allObjects);
    this.sortMilestones();
  }

  private decodeBoat(reader: SaveWriter, version: number): Boat {
    let boat = reader.getNamespacedObject(this.boats);
    if (typeof boat === 'string') {
      console.log('not registered:', boat);
      // TODO: Ask to explain this dummy object
      if (boat.startsWith('sailing')) {
        boat = this.boats.getDummyObject(boat, Boat, this.game);
        console.log('getting dummy:', boat);
      } else {
        boat = this.game.constructDummyObject(boat, Boat);
      }
    }
    boat.decode(reader, version);
    return boat;
  }

  public decode(reader: SaveWriter, version: number): void {
    super.decode(reader, version);

    const saveVersion = reader.getUint32();
    console.log('decoded save version', saveVersion);

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
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
