import { SailingPage } from '../components/sailing';
import { UserInterface } from './ui';

class SailingRenderQueue extends MasterySkillRenderQueue<SailingMastery> { }
interface SailingSkillData extends BaseSkillData {
  categories: SkillCategoryData[];
};
interface SailingMasteryDate extends BasicSkillRecipeData {
  name: string;
}
class SailingMastery extends BasicSkillRecipe {
  public get name() {
    return 'sailing mastery';
    return getLangString(`Myth_Music_Instrument_${this.localID}`);
  }

  public get media() {
    return this.getMediaURL('img/sailing-boat.png');
    // return this.getMediaURL(this.data.media);
  }
}
export class Sailing extends SkillWithMastery<SailingMastery, SailingSkillData> {
  getErrorLog(): string {
    return 'Already active';
    // return `Is Active: ${this.isActive}\n`;
  }
  isMasteryActionUnlocked(action: SailingMastery): boolean {
    return true;
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

  public ui: UserInterface;

  constructor(namespace: DataNamespace, game: Game) {
    super(namespace, 'Sailing', game);
    console.log('loaded sailing skill');
    this.categories = new NamespaceRegistry(game.registeredNamespaces, SkillCategory.name);
  }

  render() {
    super.render();

    
  }
  initMenus(): void {
    super.initMenus();
    console.log('PAGE:', this.page.setCategoryMenu(this.categories));
  }

  public onLoad(): void {
    super.onLoad();

    for (const action of this.actions.registeredObjects.values()) {
      this.renderQueue.actionMastery.add(action);
    }
  }

  public postDataRegistration(): void {
    super.postDataRegistration();

    this.milestones.push(...this.actions.allObjects);
    this.sortMilestones();
  }

  public getRegistry(type: ScopeSourceType): NamespaceRegistry<NamedObject> | undefined {
    switch (type) {
      case ScopeSourceType.Action:
        return this.actions;
    }
  }


  registerData(namespace: DataNamespace, data: SailingSkillData): void {
    super.registerData(namespace, data);
    if (data.categories !== undefined) {
      console.log(`Registering ${data.categories.length} Categories`);
      data.categories.forEach(category => {
        this.categories.registerObject(new SkillCategory(namespace, category, this, this.game));
      });
    }

    this.actions.registerObject(new SailingMastery(namespace, {
      id: "sailingMastery1",
      level: 1,
      baseExperience: 1,
      realm: "melvorD:Melvor",
    }, this.game))
  }
  modifyData(data: FixedMasterySkillModificationData): void {
    super.modifyData(data);
    if (data.headerUpgradeChains !== undefined) {
      this.headerUpgradeChains.push(...game.shop.upgradeChains.getArrayFromIds(data.headerUpgradeChains));
    }
  }
}

interface FixedMasterySkillModificationData extends MasterySkillData {}
