'use strict';
const TOTH_SKILL_LEVEL_BREAKDOWN = [
  { namespace: 'melvorD', levels: 99 },
  { namespace: 'melvorTotH', levels: 21 },
];
class SkillRenderQueue {
  constructor() {
    this.xp = false;
    this.level = false;
    this.xpCap = false;
    this.levelCapPurchase = false;
    this.abyssalLevelCapPurchase = false;
    this.previousLevel = 1;
    this.lock = false;
    this.ancientRelics = false;
    this.abyssalXP = false;
    this.abyssalLevel = false;
    this.previousAbyssalLevel = 1;
    this.realmSelection = false;
    this.realmVisibility = new Set();
    this.levelVisibility = false;
    this.abyssalLevelVisibility = false;
  }
}
class SkillLevelChangedEvent extends GameEvent {
  constructor(skill, oldLevel, newLevel) {
    super();
    this.skill = skill;
    this.oldLevel = oldLevel;
    this.newLevel = newLevel;
  }
}
class SkillXPEarnedEvent extends GameEvent {
  constructor(skill, oldXP, newXP) {
    super();
    this.skill = skill;
    this.oldXP = oldXP;
    this.newXP = newXP;
  }
}
class Skill extends NamespacedObject {
  constructor(namespace, id, game) {
    super(namespace, id);
    this.game = game;
    this.providedStats = new StatProvider();
    this.pets = [];
    this.rareDrops = [];
    this.ancientRelicSets = new Map();
    this.unlockRequirements = [];
    this.unlockUnlisteners = [];
    this.BASE_CORRUPT_CHANCE = 5;
    this.minibarOptions = { defaultItems: new Set(), upgrades: [], pets: [] };
    this.milestones = [];
    this.abyssalMilestones = [];
    this._currentLevelCap = -1;
    this._currentAbyssalLevelCap = -1;
    this.isGatingLevelCapPurchases = false;
    this.isGatingAbyssalLevelCapPurchases = false;
    this.levelCapButtons = [];
    this.abyssalLevelCapButtons = [];
    this.headerUpgradeChains = [];
    this.headerItemCharges = [];
    this._level = 1;
    this._xp = 0;
    this._abyssalLevel = 1;
    this._abyssalXP = 0;
    this._unlocked = false;
    this._hasAbyssalLevels = false;
    this.timeToLevelTracker = new Map();
    this.timeToLevelTicks = 0;
    this.timeToLevelPercentStart = 0;
    this.actionQueryCache = new Map();
    this.acionItemQueryCache = new Map();
    this.itemQueryCache = new Map();
    this.realmLoadFailed = false;
    this.equipMilestones = [];
    if (this.startingLevel > 1) this._xp = exp.levelToXP(this.startingLevel) + 1;
    if (this.startingAbyssalLevel > 1) this._abyssalXP = exp.levelToXP(this.startingAbyssalLevel) + 1;
    this._level = this.startingLevel;
    this._abyssalLevel = this.startingAbyssalLevel;
    if (this.maxLevelCap >= 99) this.milestones.push(new SkillMasteryMilestone(this));
    this.currentRealm = game.defaultRealm;
    this.skillTrees = new NamespaceRegistry(game.registeredNamespaces, SkillTree.name);
    this.modQuery = new ModifierQuery({ skill: this });
    const events = mitt();
    this.on = events.on;
    this.off = events.off;
    this._events = { emit: events.emit };
  }
  get level() {
    return this._level;
  }
  get xp() {
    return this._xp;
  }
  get nextLevelProgress() {
    let percent = 100;
    if (this.level < this.currentLevelCap) {
      const currentLevelXP = exp.levelToXP(this.level);
      const nextLevelXP = exp.levelToXP(this.level + 1);
      percent = (100 * (this.xp - currentLevelXP)) / (nextLevelXP - currentLevelXP);
    }
    return percent;
  }
  get nextAbyssalLevelProgress() {
    let percent = 100;
    if (this.abyssalLevel < this.currentAbyssalLevelCap) {
      const currentLevelXP = abyssalExp.levelToXP(this.abyssalLevel);
      const nextLevelXP = abyssalExp.levelToXP(this.abyssalLevel + 1);
      percent = (100 * (this.abyssalXP - currentLevelXP)) / (nextLevelXP - currentLevelXP);
    }
    return percent;
  }
  get name() {
    return getLangString(`SKILL_NAME_${this.localID}`);
  }
  get media() {
    return this.getMediaURL(this._media);
  }
  get hasMastery() {
    return false;
  }
  get isCombat() {
    return false;
  }
  get hasMinibar() {
    return true;
  }
  get abyssalXP() {
    return this._abyssalXP;
  }
  get abyssalLevel() {
    return this._abyssalLevel;
  }
  get hasAncientRelics() {
    return this.ancientRelicSets.size > 0;
  }
  sortMilestones() {
    this.milestones = this.milestones.filter((milestone) => milestone.level > 0);
    this.milestones.sort((a, b) => a.level - b.level);
    this.abyssalMilestones.sort((a, b) => a.abyssalLevel - b.abyssalLevel);
  }
  get virtualLevel() {
    return exp.xpToLevel(this._xp);
  }
  get virtualAbyssalLevel() {
    return abyssalExp.xpToLevel(this._abyssalXP);
  }
  get maxLevelCap() {
    return cloudManager.hasTotHEntitlementAndIsEnabled ? 120 : 99;
  }
  get levelCapSet() {
    return this._currentLevelCap > 0;
  }
  get currentLevelCap() {
    if (this.levelCapSet) return Math.min(this.maxLevelCap, this._currentLevelCap);
    return this.maxLevelCap;
  }
  get maxAbyssalLevelCap() {
    return cloudManager.hasItAEntitlementAndIsEnabled ? 60 : 1;
  }
  get abyssalLevelCapSet() {
    return this._currentAbyssalLevelCap > 0;
  }
  get currentAbyssalLevelCap() {
    if (this.abyssalLevelCapSet) return Math.min(this.maxAbyssalLevelCap, this._currentAbyssalLevelCap);
    return this.maxAbyssalLevelCap;
  }
  get startingLevel() {
    return 1;
  }
  get startingAbyssalLevel() {
    return 1;
  }
  get tutorialLevelCap() {
    return 3;
  }
  get levelCompletionBreakdown() {
    return [{ namespace: this.namespace, levels: this.maxLevelCap }];
  }
  get abyssalLevelCompletionBreakdown() {
    const breakdown = [];
    if (this.hasAbyssalLevels) breakdown.push({ namespace: 'melvorItA', levels: this.maxAbyssalLevelCap });
    return breakdown;
  }
  get isUnlocked() {
    return this._unlocked;
  }
  get hasSkillTree() {
    return this.skillTrees.size > 0;
  }
  get hasAbyssalLevels() {
    return this._hasAbyssalLevels;
  }
  get shouldShowStandardLevels() {
    return this.maxLevelCap > 1 && (this.standardLevelRealm === undefined || this.standardLevelRealm.isUnlocked);
  }
  get shouldShowAbyssalLevels() {
    return this._hasAbyssalLevels && (this.abyssalLevelRealm === undefined || this.abyssalLevelRealm.isUnlocked);
  }
  get availableRealmCount() {
    return this.game.realms.filter((realm) => {
      return isRequirementMet(realm.unlockRequirements);
    }).length;
  }
  getItemForRegistration(id) {
    const item = this.game.items.getObjectByID(id);
    if (item === undefined)
      throw new Error(`Error registering data for skill: ${this.id}. Item with id: ${id} is not registered.`);
    return item;
  }
  getRealmOptions() {
    return [];
  }
  selectRealm(realm) {
    if (!realm.isUnlocked) return;
    this.currentRealm = realm;
    this.onRealmChange();
  }
  onRealmChange() {}
  initMenus() {
    RealmSelectMenuElement.initializeForSkill(this);
    SkillHeaderElement.initializeForSkill(this);
    LevelCapPurchaseButtonElement.initializeForSkill(this);
  }
  onLoad() {
    this.renderQueue.level = true;
    this.renderQueue.xp = true;
    this.renderQueue.xpCap = true;
    this.renderQueue.levelCapPurchase = true;
    this.renderQueue.abyssalLevelCapPurchase = true;
    this.renderQueue.previousLevel = this.level;
    this.renderQueue.previousAbyssalLevel = this.abyssalLevel;
    this.renderQueue.lock = true;
    this.renderQueue.abyssalLevel = true;
    this.renderQueue.abyssalXP = true;
    this.skillTrees.forEach((skillTree) => {
      skillTree.onLoad();
      const missingPoints = this.abyssalLevel - 1 - skillTree.points - skillTree.getTotalPointsSpent();
      if (missingPoints > 0) skillTree.addPoints(missingPoints);
    });
    this.renderQueue.realmSelection = true;
    this.game.realms.forEach((realm) => this.renderQueue.realmVisibility.add(realm));
    this.renderQueue.levelVisibility = true;
    this.renderQueue.abyssalLevelVisibility = true;
    this.assignUnlockListeners();
    this.computeProvidedStats(false);
  }
  computeProvidedStats(updatePlayer = false) {
    this.providedStats.reset();
    this.addProvidedStats();
    if (updatePlayer) this.game.combat.computeAllStats();
  }
  addProvidedStats() {
    this.ancientRelicSets.forEach((relicSet) => {
      relicSet.foundRelics.forEach((count, relic) => {
        this.providedStats.addStatObject(relic, relic.stats);
      });
      if (relicSet.isComplete) this.providedStats.addStatObject(relicSet.completedRelic, relicSet.completedRelic.stats);
    });
    this.skillTrees.forEach((tree) => {
      tree.unlockedNodes.forEach((node) => {
        this.providedStats.addStatObject(node, node.stats);
      });
    });
  }
  render() {
    this.renderXP();
    this.renderLockStatus();
    this.renderLevelVisibility();
    this.renderLevel();
    this.renderXPCap();
    this.renderAbyssalXP();
    this.renderAbyssalLevelVisibility();
    this.renderAbyssalLevel();
    this.renderLevelCapPurchase();
    this.renderAbyssalLevelCapPurchase();
    this.renderRealmSelection();
    this.renderRealmVisibility();
  }
  renderXP() {
    var _a;
    if (!this.renderQueue.xp) return;
    skillProgressDisplay.updateXP(this);
    (_a = this.header) === null || _a === void 0 ? void 0 : _a.updateXP(this.game, this);
    if (this.isCombat) combatSkillProgressTable.updateXP(this.game, this);
    this.renderQueue.xp = false;
  }
  renderLevel() {
    var _a;
    if (!this.renderQueue.level) return;
    if (this.renderQueue.previousLevel < this.level) {
      if (!this.game.settings.useSmallLevelUpNotifications || this.level === 99) {
        this.fireLevelUpModal(this.renderQueue.previousLevel);
        if (this.level === 99) showFireworks();
      } else {
        this.game.combat.notifications.add({ type: 'LevelUp', args: [this] });
      }
      this.renderQueue.previousLevel = this.level;
    }
    skillNav.updateSkillLevel(this);
    skillProgressDisplay.updateLevel(this);
    (_a = this.header) === null || _a === void 0 ? void 0 : _a.updateLevel(this.game, this);
    if (this.isCombat) combatSkillProgressTable.updateLevel(this.game, this);
    this.renderQueue.level = false;
  }
  renderAbyssalXP() {
    var _a;
    if (!this.renderQueue.abyssalXP) return;
    skillProgressDisplay.updateAbyssalXP(this);
    (_a = this.header) === null || _a === void 0 ? void 0 : _a.updateAbyssalXP(this.game, this);
    if (this.isCombat) combatSkillProgressTable.updateAbyssalXP(this.game, this);
    this.renderQueue.abyssalXP = false;
  }
  renderAbyssalLevel() {
    var _a;
    if (!this.renderQueue.abyssalLevel) return;
    if (this.renderQueue.previousAbyssalLevel < this.abyssalLevel) {
      if (!this.game.settings.useSmallLevelUpNotifications || this.abyssalLevel === this.maxAbyssalLevelCap) {
        this.fireAbyssalLevelUpModal(this.renderQueue.previousAbyssalLevel);
        if (this.abyssalLevel === this.maxAbyssalLevelCap) showFireworks();
      } else {
        this.game.combat.notifications.add({ type: 'AbyssalLevelUp', args: [this] });
      }
      this.renderQueue.previousAbyssalLevel = this.abyssalLevel;
    }
    skillNav.updateAbyssalSkillLevel(this);
    skillProgressDisplay.updateAbyssalLevel(this);
    (_a = this.header) === null || _a === void 0 ? void 0 : _a.updateAbyssalLevel(this.game, this);
    if (this.isCombat) combatSkillProgressTable.updateAbyssalLevel(this.game, this);
    this.renderQueue.abyssalLevel = false;
  }
  renderLockStatus() {
    if (!this.renderQueue.lock) return;
    skillNav.updateSkillLock(this);
    this.renderQueue.lock = false;
  }
  renderRealmSelection() {
    if (!this.renderQueue.realmSelection || this.realmSelect === undefined) {
      this.renderQueue.realmSelection = false;
      return;
    }
    if (this.availableRealmCount > 1) {
      showElement(this.realmSelect);
    } else hideElement(this.realmSelect);
    this.renderQueue.realmSelection = false;
  }
  renderRealmVisibility() {
    if (this.renderQueue.realmVisibility.size === 0) return;
    if (this.realmSelect !== undefined) {
      this.renderQueue.realmVisibility.forEach((realm) => {
        this.realmSelect.updateRealmVisibility(realm);
      });
    }
    this.renderQueue.realmVisibility.clear();
  }
  renderLevelVisibility() {
    var _a;
    if (!this.renderQueue.levelVisibility) return;
    skillNav.updateLevelVisibility(this);
    (_a = this.header) === null || _a === void 0 ? void 0 : _a.updateLevelVisibility(this);
    if (this.isCombat) combatSkillProgressTable.updateLevelVisibility(this);
    this.renderQueue.levelVisibility = false;
  }
  renderAbyssalLevelVisibility() {
    var _a;
    if (!this.renderQueue.abyssalLevelVisibility) return;
    skillNav.updateAbyssalLevelVisibility(this);
    (_a = this.header) === null || _a === void 0 ? void 0 : _a.updateAbyssalLevelVisibility(this);
    if (this.isCombat) combatSkillProgressTable.updateAbyssalLevelVisibility(this);
    this.renderQueue.abyssalLevelVisibility = false;
  }
  fireLevelUpModal(previousLevel) {
    addModalToQueue({
      title: getLangString('COMPLETION_CONGRATS'),
      html: `<span class="text-dark">${templateLangString('TOASTS_SKILL_LEVEL_UP', {
        skillName: this.name,
        level: `${numberWithCommas(this.level)}`,
      })}${this.getNewMilestoneHTML(previousLevel)}</span>`,
      imageUrl: this.media,
      imageWidth: 64,
      imageHeight: 64,
      imageAlt: this.name,
    });
  }
  fireAbyssalLevelUpModal(previousLevel) {
    addModalToQueue({
      title: getLangString('COMPLETION_CONGRATS'),
      html: `<span class="text-dark">${templateLangString('ABYSSAL_LEVEL_UP_MSG', {
        skillName: this.name,
        level: `${this.abyssalLevel}`,
      })}${this.getNewAbyssalMilestoneHTML(previousLevel)}</span>`,
      imageUrl: this.media,
      imageWidth: 64,
      imageHeight: 64,
      imageAlt: this.name,
    });
  }
  getNewMilestoneHTML(previousLevel) {
    let html = ``;
    let milestoneCount = 0;
    this.milestones.forEach((milestone) => {
      if (previousLevel < milestone.level && this.level >= milestone.level) {
        html += `<div class="h5 font-w600 mb-0"><img class="skill-icon-xs mr-2" src="${milestone.media}">${milestone.name}</div>`;
        milestoneCount++;
      }
    });
    if (milestoneCount > 0) {
      html =
        `<h5 class="font-w600 font-size-sm pt-3 mb-1 text-success">${getLangString(
          'COMPLETION_SKILL_LEVEL_MILESTONES',
        )}</div>` + html;
    }
    if (this.level >= 99 && previousLevel < 99) {
      const skillCape = this.game.shop.purchases.find((purchase) => {
        return (
          purchase.category.id === 'melvorD:Skillcapes' &&
          purchase.purchaseRequirements.length === 1 &&
          purchase.purchaseRequirements[0].type === 'SkillLevel' &&
          purchase.purchaseRequirements[0].skill === this
        );
      });
      if (skillCape !== undefined)
        html += `<div class="h5 font-w400 font-size-sm text-success pt-3">${templateLangString(
          'COMPLETION_SKILL_LEVEL_99_NOTICE',
          { itemName: `<strong>${skillCape.contains.items[0].item.name}</strong>` },
        )}`;
    }
    if (this.level >= 120 && previousLevel < 120) {
      const superiorSkillCape = this.game.shop.purchases.find((purchase) => {
        return (
          purchase.category.id === 'melvorTotH:SuperiorSkillcapes' &&
          purchase.purchaseRequirements.length === 1 &&
          purchase.purchaseRequirements[0].type === 'SkillLevel' &&
          purchase.purchaseRequirements[0].skill === this
        );
      });
      if (superiorSkillCape !== undefined)
        html += `<div class="h5 font-w400 font-size-sm text-success pt-3">${templateLangString(
          'COMPLETION_SKILL_LEVEL_99_NOTICE',
          { itemName: `<strong>${superiorSkillCape.contains.items[0].item.name}</strong>` },
        )}`;
    }
    return html;
  }
  getNewAbyssalMilestoneHTML(previousLevel) {
    let html = ``;
    let milestoneCount = 0;
    this.abyssalMilestones.forEach((milestone) => {
      if (previousLevel < milestone.abyssalLevel && this.abyssalLevel >= milestone.abyssalLevel) {
        html += `<div class="h5 font-w600 mb-0"><img class="skill-icon-xs mr-2" src="${milestone.media}">${milestone.name}</div>`;
        milestoneCount++;
      }
    });
    if (milestoneCount > 0) {
      html =
        `<h5 class="font-w600 font-size-sm pt-3 mb-1 text-success">${getLangString(
          'COMPLETION_SKILL_LEVEL_MILESTONES',
        )}</div>` + html;
    }
    return html;
  }
  renderXPCap() {
    var _a, _b;
    if (!this.renderQueue.xpCap) return;
    if (this.game.currentGamemode.capNonCombatSkillLevels && !this.isCombat) {
      const combatLevel = this.game.playerNormalCombatLevel;
      const xpCap = exp.levelToXP(combatLevel + 1) - 1;
      (_a = this.header) === null || _a === void 0 ? void 0 : _a.toggleCombatLevelCap(this._xp >= xpCap);
    } else {
      (_b = this.header) === null || _b === void 0 ? void 0 : _b.toggleCombatLevelCap(false);
    }
    this.renderQueue.xpCap = false;
  }
  renderLevelCapPurchase() {
    if (!this.renderQueue.levelCapPurchase) return;
    const capCost = this.game.currentGamemode.levelCapCost;
    if (!this.isGatingLevelCapPurchases && capCost !== undefined && this.currentLevelCap < this.maxLevelCap) {
      const canPurchase = capCost.canIncreaseLevelCap(this);
      const oldCap = this.currentLevelCap;
      const newCap = Math.min(this.maxLevelCap, oldCap + capCost.increase);
      if (canPurchase) {
        this.levelCapButtons.forEach((button) => {
          button.setCapChange(oldCap, newCap);
          button.setAvailable();
        });
      } else {
        this.levelCapButtons.forEach((button) => {
          button.setCapChange(oldCap, newCap);
          button.setUnavailable();
        });
      }
    } else {
      this.levelCapButtons.forEach(hideElement);
    }
    this.renderQueue.levelCapPurchase = false;
  }
  renderAbyssalLevelCapPurchase() {
    if (!this.renderQueue.abyssalLevelCapPurchase) return;
    const capCost = this.game.currentGamemode.abyssalLevelCapCost;
    if (
      this.hasAbyssalLevels &&
      !this.isGatingAbyssalLevelCapPurchases &&
      capCost !== undefined &&
      this.currentAbyssalLevelCap < this.maxAbyssalLevelCap
    ) {
      const canPurchase = capCost.canIncreaseAbyssalLevelCap(this);
      const oldCap = this.currentAbyssalLevelCap;
      const newCap = Math.min(this.maxAbyssalLevelCap, oldCap + capCost.increase);
      if (canPurchase) {
        this.abyssalLevelCapButtons.forEach((button) => {
          button.setCapChange(oldCap, newCap);
          button.setAvailable();
        });
      } else {
        this.abyssalLevelCapButtons.forEach((button) => {
          button.setCapChange(oldCap, newCap);
          button.setUnavailable();
        });
      }
    } else {
      this.abyssalLevelCapButtons.forEach(hideElement);
    }
    this.renderQueue.abyssalLevelCapPurchase = false;
  }
  addXP(amount, action) {
    if (!this._unlocked || amount === 0) return false;
    amount = this.modifyXP(amount, action);
    const oldXP = this._xp;
    this._xp += amount;
    this.capXPForTutorial();
    this.capXPForGamemode();
    const newXP = this._xp;
    if (oldXP !== newXP) this._events.emit('xpEarned', new SkillXPEarnedEvent(this, oldXP, newXP));
    const levelIncreased = this._xp > exp.levelToXP(this.level + 1) && this.level < this.currentLevelCap;
    if (levelIncreased) {
      this.levelUp();
    }
    this.game.combat.notifications.add({ type: 'SkillXP', args: [this, amount] });
    this.renderQueue.xp = true;
    return levelIncreased;
  }
  addAbyssalXP(amount, action) {
    if (!this._unlocked || !this.hasAbyssalLevels || amount === 0) return false;
    amount = this.modifyAbyssalXP(amount, action);
    const oldXP = this._abyssalXP;
    this._abyssalXP += amount;
    this.capAXPForGamemode();
    const newXP = this._abyssalXP;
    if (oldXP !== newXP) this._events.emit('abyssalXPEarned', new SkillXPEarnedEvent(this, oldXP, newXP));
    const levelIncreased =
      this._abyssalXP > abyssalExp.levelToXP(this.abyssalLevel + 1) && this.abyssalLevel < this.currentAbyssalLevelCap;
    if (levelIncreased) {
      this.abyssalLevelUp();
    }
    this.game.combat.notifications.add({ type: 'AbyssalXP', args: [this, amount] });
    this.renderQueue.abyssalXP = true;
    return levelIncreased;
  }
  capXPForTutorial() {
    if (this.game.tutorial.complete) return;
    const xpCap = exp.levelToXP(this.tutorialLevelCap + 1) - 1;
    if (this._xp > xpCap) {
      this._xp = xpCap;
      this.game.combat.notifications.add({
        type: 'Player',
        args: [
          this,
          getLangString(`MISC_STRING_${this.tutorialLevelCap === 3 ? 'TUTORIAL_0' : 'TUTORIAL_1'}`),
          'danger',
        ],
      });
    }
  }
  capXPForGamemode() {
    if (this.game.currentGamemode.capNonCombatSkillLevels) {
      if (this.isCombat) return;
      const combatLevel = this.game.playerNormalCombatLevel;
      const xpCap = exp.levelToXP(combatLevel + 1) - 1;
      if (this._xp > xpCap) {
        this._xp = xpCap;
        this.renderQueue.xpCap = true;
      }
    } else if (!this.game.currentGamemode.allowXPOverLevelCap) {
      const xpCap = exp.levelToXP(this.currentLevelCap + 1) - 1;
      if (this._xp > xpCap) {
        this._xp = xpCap;
        this.renderQueue.xpCap = true;
      }
    }
  }
  capAXPForGamemode() {
    if (!this.game.currentGamemode.allowXPOverLevelCap) {
      const axpCap = abyssalExp.levelToXP(this.currentAbyssalLevelCap + 1) - 1;
      if (this._abyssalXP > axpCap) {
        this._abyssalXP = axpCap;
      }
    }
  }
  isLevelCapBelow(cap) {
    return this._currentLevelCap < cap;
  }
  applyLevelCapIncrease(increase) {
    this.increaseLevelCap(increase.increase, increase.maximum);
  }
  increaseLevelCap(amount, max = Infinity) {
    const newCap = Math.min(this._currentLevelCap + amount, max);
    if (newCap < this._currentLevelCap) return;
    this.setLevelCap(newCap);
  }
  applySetLevelCap(newCap) {
    if (this._currentLevelCap >= newCap) return;
    this.setLevelCap(newCap);
  }
  setLevelCap(newCap) {
    this._currentLevelCap = newCap;
    this.renderQueue.level = true;
    this.renderQueue.xp = true;
    if (this._xp > exp.levelToXP(this.level + 1) && this.level < this.currentLevelCap) {
      this.levelUp();
    }
  }
  isAbyssalLevelCapBelow(cap) {
    return this._currentAbyssalLevelCap < cap;
  }
  applyAbyssalLevelCapIncrease(increase) {
    this.increaseAbyssalLevelCap(increase.increase, increase.maximum);
  }
  increaseAbyssalLevelCap(amount, max = Infinity) {
    const newCap = Math.min(this._currentAbyssalLevelCap + amount, max);
    if (newCap < this._currentAbyssalLevelCap) return;
    this.setAbyssalLevelCap(newCap);
  }
  applySetAbyssalLevelCap(newCap) {
    if (this._currentAbyssalLevelCap >= newCap) return;
    this.setAbyssalLevelCap(newCap);
  }
  setAbyssalLevelCap(count) {
    this._currentAbyssalLevelCap = count;
    this.renderQueue.abyssalLevel = true;
    this.renderQueue.abyssalXP = true;
    if (
      this._abyssalXP > abyssalExp.levelToXP(this.abyssalLevel + 1) &&
      this.abyssalLevel < this.currentAbyssalLevelCap
    ) {
      this.abyssalLevelUp();
    }
  }
  levelUp() {
    const oldLevel = this._level;
    this._level = Math.min(this.currentLevelCap, exp.xpToLevel(this._xp));
    const newLevel = this._level;
    this.onLevelUp(oldLevel, newLevel);
  }
  abyssalLevelUp() {
    const oldLevel = this._abyssalLevel;
    this._abyssalLevel = Math.min(this.currentAbyssalLevelCap, abyssalExp.xpToLevel(this._abyssalXP));
    const newLevel = this._abyssalLevel;
    this.onAbyssalLevelUp(oldLevel, newLevel);
  }
  getActionModifierQuery(action) {
    const cached = this.actionQueryCache.get(action);
    if (cached !== undefined) return cached;
    const query = new ModifierQuery(this.getActionModifierQueryParams(action));
    this.actionQueryCache.set(action, query);
    return query;
  }
  getActionItemModifierQuery(action) {
    const cached = this.acionItemQueryCache.get(action);
    if (cached !== undefined) return cached;
    const query = this.getActionModifierQuery(action).clone();
    query.add({ item: true });
    this.acionItemQueryCache.set(action, query);
    return query;
  }
  getActionModifierQueryParams(action) {
    const scope = { skill: this, action };
    if (action instanceof RealmedObject) {
      scope.realm = action.realm;
    }
    return scope;
  }
  getCurrencyModifierQuery(currency, action) {
    const query = this.getActionModifierQuery(action).clone();
    query.add({ currency });
    return query;
  }
  getItemModifierQuery(item) {
    const cached = this.itemQueryCache.get(item);
    if (cached !== undefined) return cached;
    const query = new ModifierQuery({ skill: this, item });
    this.itemQueryCache.set(item, query);
    return query;
  }
  modifyXP(amount, action) {
    amount *= 1 + this.getXPModifier(action) / 100;
    if (this.game.modifiers.halveSkillXP > 0) amount /= 2;
    return amount;
  }
  _buildXPSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:skillXP', this.getActionModifierQuery(action));
    if (!this.isCombat) builder.addSources('melvorD:nonCombatSkillXP');
    return builder;
  }
  getXPSources(action) {
    return this._buildXPSources(action).getSpans();
  }
  modifyAbyssalXP(amount, action) {
    amount *= 1 + this.getAbyssalXPModifier(action) / 100;
    return amount;
  }
  _buildAbyssalXPSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:abyssalSkillXP', this.getActionModifierQuery(action));
    if (this.isCombat) builder.addSources('melvorD:abyssalCombatSkillXP');
    return builder;
  }
  getAbyssalXPSources(action) {
    return this._buildAbyssalXPSources(action).getSpans();
  }
  getXPModifier(action) {
    let modifier = this.game.modifiers.getValue('melvorD:skillXP', this.getActionModifierQuery(action));
    if (!this.isCombat) modifier += this.game.modifiers.nonCombatSkillXP;
    return modifier;
  }
  getAbyssalXPModifier(action) {
    let modifier = this.game.modifiers.getValue('melvorD:abyssalSkillXP', this.getActionModifierQuery(action));
    if (this.isCombat) {
      modifier += this.game.modifiers.abyssalCombatSkillXP;
    }
    return modifier;
  }
  getUncappedDoublingChance(action) {
    let chance = this.game.modifiers.globalItemDoublingChance;
    chance += this.game.modifiers.getValue('melvorD:skillItemDoublingChance', this.getActionModifierQuery(action));
    return chance;
  }
  getDoublingChance(action) {
    return clampValue(this.getUncappedDoublingChance(action), 0, 100);
  }
  _buildDoublingSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:globalItemDoublingChance');
    builder.addSources('melvorD:skillItemDoublingChance', this.getActionModifierQuery(action));
    return builder;
  }
  getDoublingSources(action) {
    return this._buildDoublingSources(action).getSpans();
  }
  getUncappedCostReduction(action, item) {
    return this.game.modifiers.getValue('melvorD:skillCostReduction', this.getActionModifierQuery(action));
  }
  getCostReduction(action, item) {
    return Math.min(80, this.getUncappedCostReduction(action, item));
  }
  _buildCostReductionSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:skillCostReduction', this.getActionModifierQuery(action));
    return builder;
  }
  getCostReductionSources(action) {
    return this._buildCostReductionSources(action).getSpans();
  }
  getFlatCostReduction(action, item) {
    return 0;
  }
  modifyItemCost(item, quantity, recipe) {
    const costReduction = this.getCostReduction(recipe, item);
    quantity *= 1 - costReduction / 100;
    quantity = Math.ceil(quantity);
    quantity -= this.getFlatCostReduction(recipe, item);
    return Math.max(1, quantity);
  }
  modifyCurrencyCost(currency, quantity, recipe) {
    const costReduction = this.getCostReduction(recipe);
    quantity *= 1 - costReduction / 100;
    quantity = Math.ceil(quantity);
    quantity -= this.getFlatCostReduction(recipe);
    return Math.max(1, quantity);
  }
  getFlatIntervalModifier(action) {
    return this.game.modifiers.getValue('melvorD:flatSkillInterval', this.getActionModifierQuery(action));
  }
  _buildFlatIntervalSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers);
    builder.addSources('melvorD:flatSkillInterval', this.getActionModifierQuery(action));
    return builder;
  }
  getFlatIntervalSources(action) {
    return this._buildFlatIntervalSources(action).getSpans();
  }
  getPercentageIntervalModifier(action) {
    return this.game.modifiers.getValue('melvorD:skillInterval', this.getActionModifierQuery(action));
  }
  _buildPercentageIntervalSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:skillInterval', this.getActionModifierQuery(action));
    return builder;
  }
  getPercentageIntervalSources(action) {
    return this._buildPercentageIntervalSources(action).getSpans();
  }
  getIntervalSources(action) {
    return this.getPercentageIntervalSources(action).concat(this.getFlatIntervalSources(action));
  }
  modifyInterval(interval, action) {
    const flatModifier = this.getFlatIntervalModifier(action);
    const percentModifier = this.getPercentageIntervalModifier(action);
    interval *= 1 + percentModifier / 100;
    interval += flatModifier;
    if (this.game.modifiers.halveSkillInterval > 0) interval /= 2;
    interval = roundToTickInterval(interval);
    return Math.max(interval, 250);
  }
  getFlatBasePrimaryProductQuantityModifier(item, query) {
    return this.game.modifiers.getValue('melvorD:flatBasePrimaryProductQuantity', query);
  }
  getRandomFlatBasePrimaryProductQuantity(item, query) {
    let quantity = 0;
    const plusOneChance = this.game.modifiers.getValue('melvorD:flatBasePrimaryProductQuantityChance', query);
    if (rollPercentage(plusOneChance)) quantity++;
    return quantity;
  }
  getBasePrimaryProductQuantityModifier(item, query) {
    return this.game.modifiers.getValue('melvorD:basePrimaryProductQuantity', query);
  }
  applyPrimaryProductMultipliers(item, quantity, action, query) {
    if (rollPercentage(this.getDoublingChance(action))) quantity *= 2;
    quantity *= Math.pow(2, this.game.modifiers.getValue('melvorD:doubleItemsSkill', query));
    quantity *= Math.pow(2, this.game.modifiers.getValue('melvorD:bypassDoubleItemsSkill', query));
    return quantity;
  }
  getRandomFlatAdditionalPrimaryProductQuantity(item, action, query) {
    let quantity = 0;
    if (rollPercentage(this.game.modifiers.getValue('melvorD:additionalPrimaryProductChance', query))) quantity++;
    if (rollPercentage(this.game.modifiers.getValue('melvorD:additional2PrimaryProductChance', query))) quantity += 2;
    if (rollPercentage(this.game.modifiers.getValue('melvorD:additional3PrimaryProductChance', query))) quantity += 3;
    if (rollPercentage(this.game.modifiers.getValue('melvorD:additional5PrimaryProductChance', query))) quantity += 5;
    if (rollPercentage(this.game.modifiers.getValue('melvorD:additional8PrimaryProductChance', query))) quantity += 8;
    return quantity;
  }
  getFlatAdditionalPrimaryProductQuantity(item, query) {
    const quantity = this.game.modifiers.getValue('melvorD:flatAdditionalPrimaryProductQuantity', query);
    return Math.max(quantity, 0);
  }
  _buildAdditionalPrimaryResourceQuantitySources(query) {
    const builder = new ModifierSourceBuilder(this.game.modifiers);
    builder.addSources('melvorD:flatAdditionalPrimaryProductQuantity', query);
    return builder;
  }
  getAdditionalPrimaryResourceQuantitySources(query) {
    return this._buildAdditionalPrimaryResourceQuantitySources(query).getSpans();
  }
  getMinimumPrimaryProductBaseQuantity(item, quantity, query) {
    quantity += this.getFlatBasePrimaryProductQuantityModifier(item, query);
    quantity *= 1 + this.getBasePrimaryProductQuantityModifier(item, query) / 100;
    quantity = Math.floor(quantity);
    return quantity;
  }
  modifyPrimaryProductQuantity(item, quantity, action) {
    const query = this.getActionModifierQuery(action);
    quantity += this.getFlatBasePrimaryProductQuantityModifier(item, query);
    quantity += this.getRandomFlatBasePrimaryProductQuantity(item, query);
    quantity *= 1 + this.getBasePrimaryProductQuantityModifier(item, query) / 100;
    quantity = Math.floor(quantity);
    quantity = this.applyPrimaryProductMultipliers(item, quantity, action, query);
    quantity += this.getFlatAdditionalPrimaryProductQuantity(item, query);
    quantity += this.getRandomFlatAdditionalPrimaryProductQuantity(item, action, query);
    return Math.max(quantity, 1);
  }
  addCurrencyFromPrimaryProductGain(rewards, item, quantity, action) {
    const currency = item.sellsFor.currency;
    const modifier = this.game.modifiers.getValue(
      'melvorD:currencyGainBasedOnProduct',
      this.getCurrencyModifierQuery(currency, action),
    );
    if (modifier > 0) {
      let quantity = Math.floor((item.sellsFor.quantity * modifier) / 100);
      quantity = this.modifyCurrencyReward(currency, quantity, action);
      if (quantity > 0) rewards.addCurrency(currency, quantity);
    }
  }
  getPreservationChance(action) {
    let chance = this.game.modifiers.getValue('melvorD:skillPreservationChance', this.getActionModifierQuery(action));
    chance += this.game.modifiers.bypassGlobalPreservationChance;
    return clampValue(chance, 0, this.getPreservationCap(action));
  }
  _buildPreservationSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:skillPreservationChance', this.getActionModifierQuery(action));
    builder.addSources('melvorD:bypassGlobalPreservationChance');
    return builder;
  }
  getPreservationSources(action) {
    return this._buildPreservationSources(action).getSpans();
  }
  getPreservationCap(action) {
    const baseCap = 80;
    const modifier = this.game.modifiers.getValue('melvorD:skillPreservationCap', this.getActionModifierQuery(action));
    return baseCap + modifier;
  }
  getCurrencyModifier(currency, action) {
    return this.game.modifiers.getValue('melvorD:currencyGain', this.getCurrencyModifierQuery(currency, action));
  }
  getFlatCurrencyModifier(currency, action) {
    return this.game.modifiers.getValue('melvorD:flatCurrencyGain', this.getCurrencyModifierQuery(currency, action));
  }
  modifyCurrencyReward(currency, amount, action) {
    amount *= 1 + this.getCurrencyModifier(currency, action) / 100;
    amount = Math.floor(amount);
    if (this.id !== 'melvorD:Magic') amount += this.getFlatCurrencyModifier(currency, action);
    return Math.max(amount, 0);
  }
  setXP(value) {
    this._xp = value;
    const oldLevel = this._level;
    this._level = Math.min(this.currentLevelCap, exp.xpToLevel(this._xp));
    this.renderQueue.xp = true;
    this.onLevelUp(oldLevel, this._level);
  }
  setAbyssalXP(value) {
    this._abyssalXP = value;
    const oldLevel = this._abyssalLevel;
    this._abyssalLevel = Math.min(this.currentAbyssalLevelCap, abyssalExp.xpToLevel(this._abyssalXP));
    this.renderQueue.abyssalXP = true;
    this.onAbyssalLevelUp(oldLevel, this._abyssalLevel);
  }
  setUnlock(isUnlocked) {
    this._unlocked = isUnlocked;
    if (isUnlocked) {
      this.unassignUnlockListeners();
    } else {
      this.assignUnlockListeners();
    }
    this.onUnlock();
  }
  onUnlock() {
    this.renderQueue.lock = true;
  }
  unlockOnClick() {
    if (this._unlocked) return;
    const cost = this.game.getSkillUnlockCost();
    if (!this.game.gp.canAfford(cost)) return;
    this.game.gp.remove(cost);
    this.setUnlock(true);
    SwalLocale.fire({
      icon: 'success',
      title: getLangString('MENU_TEXT_SKILL_UNLOCKED'),
      html: `<span class='text-dark'>${getLangString('MENU_TEXT_YOU_MAY_USE_SKILL')}</span>`,
    });
    this.game.telemetry.createGPAdjustedEvent(-cost, this.game.gp.amount, `AdventureMode.UnlockSkill.${this.id}`);
  }
  assignUnlockListeners() {
    if (this._unlocked || this.unlockRequirements.length === 0) return;
    this.unassignUnlockListeners();
    this.unlockUnlisteners = this.unlockRequirements.map((requirement) => {
      return requirement.assignHandler(() => this.autoUnlock());
    });
  }
  unassignUnlockListeners() {
    this.unlockUnlisteners.forEach((unlistener) => unlistener());
    this.unlockUnlisteners = [];
  }
  autoUnlock() {
    if (!this.game.checkRequirements(this.unlockRequirements)) return;
    this.setUnlock(true);
    addModalToQueue({
      title: templateLangString('SKILL_UNLOCKED', { skillName: this.name }),
      html: `<span class='text-dark'>${getLangString('MENU_TEXT_YOU_MAY_USE_SKILL')}</span>`,
      imageUrl: this.media,
      imageHeight: 128,
      imageWidth: 128,
    });
  }
  rollForPets(interval, action) {
    this.pets.forEach((pet) => {
      if (action === undefined || pet.isCorrectRealmForPetDrop(action.realm))
        this.game.petManager.rollForSkillPet(pet, interval, this);
    });
  }
  onLevelUp(oldLevel, newLevel) {
    this._events.emit('levelChanged', new SkillLevelChangedEvent(this, oldLevel, newLevel));
    this.game.completion.updateSkill(this);
    this.renderQueue.level = true;
    if (this.isCombat) {
      this.game.skills.forEach((skill) => {
        if (!skill.isCombat) skill.renderQueue.xpCap = true;
      });
    }
    if (this.isGatingLevelCapPurchases) {
      this.game.skills.forEach((skill) => {
        if (!skill.isGatingLevelCapPurchases) skill.renderQueue.levelCapPurchase = true;
      });
    } else if (newLevel === this.currentLevelCap && this.game.currentGamemode.levelCapCost !== undefined) {
      this.renderQueue.levelCapPurchase = true;
    }
    this.unlockAncientRelicsOnLevelUp(oldLevel, newLevel);
    this.onAnyLevelUp();
  }
  onAbyssalLevelUp(oldLevel, newLevel) {
    this._events.emit('abyssalLevelChanged', new SkillLevelChangedEvent(this, oldLevel, newLevel));
    this.game.completion.updateSkill(this);
    this.timeToLevelTracker.set(newLevel, this.timeToLevelTicks);
    this.timeToLevelTicks = 0;
    this.renderQueue.abyssalLevel = true;
    this.skillTrees.forEach((skillTree) => {
      skillTree.addPoints(newLevel - oldLevel);
    });
    if (this.isGatingAbyssalLevelCapPurchases) {
      this.game.skills.forEach((skill) => {
        if (!skill.isGatingAbyssalLevelCapPurchases) skill.renderQueue.abyssalLevelCapPurchase = true;
      });
    } else if (
      newLevel === this.currentAbyssalLevelCap &&
      this.game.currentGamemode.abyssalLevelCapCost !== undefined
    ) {
      this.renderQueue.abyssalLevelCapPurchase = true;
    }
    this.unlockAncientRelicsOnAbyssalLevelUp(oldLevel, newLevel);
    this.onAnyLevelUp();
  }
  onAnyLevelUp() {
    if (this.isCombat) {
      this.game.combat.player.renderQueue.combatLevel = true;
    }
    this.game.queueRequirementRenders();
    this.game.stats.General.wasMutated = true;
  }
  isCorrectGamemodeForRareDrop(drop) {
    return drop.gamemodes === undefined || drop.gamemodes.includes(this.game.currentGamemode);
  }
  isCorrectRealmForRareDrop(drop, realm) {
    return drop.realms.size === 0 || drop.realms.has(realm);
  }
  rollForAdditionalItems(rewards, interval, action) {
    const query = this.getActionItemModifierQuery(action);
    const chanceResult = this.game.modifiers.query('melvorD:additionalRandomSkillItemChance', query);
    const intervalChanceResult = this.game.modifiers.query('melvorD:additionalRandomSkillItemChancePerInterval', query);
    if (chanceResult.length > 0 || intervalChanceResult.length > 0) {
      const itemChances = new SparseNumericMap();
      chanceResult.forEach((entry) => {
        itemChances.add(entry.scope.item, entry.value);
      });
      intervalChanceResult.forEach((entry) => {
        itemChances.add(entry.scope.item, (entry.value * interval) / 1000);
      });
      itemChances.forEach((chance, item) => {
        if (rollPercentage(chance)) rewards.addItem(item, 1);
      });
    }
    this.game.modifiers.query('melvorD:flatAdditionalSkillItem', query).forEach((entry) => {
      rewards.addItem(entry.scope.item, entry.value);
    });
    const gemChance = this.game.modifiers.getValue('melvorD:additionalRandomGemChance', query);
    if (gemChance > 0 && rollPercentage(gemChance)) {
      rewards.addItem(this.game.randomGemTable.getDrop().item, 1);
    }
    const abyssalGemChance =
      this.game.modifiers.getValue('melvorD:additionalRandomAbyssalGemChance', query) +
      (this.game.modifiers.getValue('melvorD:additionalRandomAbyssalGemChancePerInterval', query) * interval) / 1000;
    if (abyssalGemChance > 0 && this.game.randomAbyssalGemTable.size > 0 && rollPercentage(abyssalGemChance)) {
      rewards.addItem(this.game.randomAbyssalGemTable.getDrop().item, 1);
    }
    const fragmentChance = this.game.modifiers.getValue('melvorD:additionalRandomFragmentChance', query);
    if (fragmentChance > 0 && this.game.randomFragmentTable.size > 0 && rollPercentage(fragmentChance)) {
      rewards.addItem(this.game.randomFragmentTable.getDrop().item, 1);
    }
    const firemakingOilChance = this.game.modifiers.getValue('melvorD:additionalRandomFiremakingOilChance', query);
    if (firemakingOilChance > 0 && this.game.randomFiremakingOilTable.size > 0 && rollPercentage(firemakingOilChance)) {
      rewards.addItem(this.game.randomFiremakingOilTable.getDrop().item, 1);
    }
  }
  rollForRareDrops(level, rewards, action) {
    this.rareDrops.forEach((drop) => {
      let realmToCheck = game.defaultRealm;
      if (action !== undefined) realmToCheck = action.realm;
      if (
        this.game.checkRequirements(drop.requirements) &&
        this.isCorrectGamemodeForRareDrop(drop) &&
        this.isCorrectRealmForRareDrop(drop, realmToCheck) &&
        ((drop.item.localID.includes('Birthday_Present') && this.game.settings.toggleBirthdayEvent) ||
          !drop.item.localID.includes('Birthday_Present')) &&
        rollForOffItem(this.getRareDropChance(level, drop.chance))
      ) {
        if (drop.altItem !== undefined && this.game.modifiers.allowSignetDrops) {
          rewards.addItem(drop.altItem, drop.quantity);
        } else {
          rewards.addItem(drop.item, drop.quantity);
        }
      }
    });
  }
  rollForAncientRelics(level, realm) {
    if (!this.game.currentGamemode.allowAncientRelicDrops || !this.hasAncientRelics) return;
    const relicSet = this.ancientRelicSets.get(realm);
    if (relicSet === undefined || relicSet.isComplete) return;
    for (let i = 0; i < relicSet.relicDrops.length; i++) {
      const drop = relicSet.relicDrops[i];
      if (relicSet.isRelicFound(drop.relic) || !this.game.checkRequirements(drop.requirements)) continue;
      if (this.rollForAncientRelic(level, realm, drop)) {
        this.locateAncientRelic(relicSet, drop.relic);
        break;
      }
    }
  }
  rollForAncientRelic(level, realm, drop) {
    let chance = this.getRareDropChance(level, drop.chance);
    chance *= 1 + this.game.modifiers.getValue('melvorD:ancientRelicLocationChance', realm.modQuery) / 100;
    return rollPercentage(chance);
  }
  unlockAncientRelicsOnLevelUp(oldLevel, newLevel) {
    if (!this.hasAncientRelics || !this.game.currentGamemode.allowAncientRelicDrops) return;
    this.ancientRelicSets.forEach((relicSet) => {
      if (relicSet.levelUpUnlocks.length === 0 || relicSet.isComplete) return;
      let relicsToUnlock = 0;
      for (let i = 0; i < relicSet.levelUpUnlocks.length; i++) {
        const level = relicSet.levelUpUnlocks[i];
        if (newLevel >= level && oldLevel < level) relicsToUnlock++;
      }
      this.unlockRelicDrops(relicSet, relicsToUnlock);
    });
  }
  unlockAncientRelicsOnAbyssalLevelUp(oldLevel, newLevel) {
    if (!this.hasAncientRelics || !this.game.currentGamemode.allowAncientRelicDrops) return;
    this.ancientRelicSets.forEach((relicSet) => {
      if (relicSet.abyssalLevelUpUnlocks.length === 0 || relicSet.isComplete) return;
      let relicsToUnlock = 0;
      for (let i = 0; i < relicSet.abyssalLevelUpUnlocks.length; i++) {
        const level = relicSet.abyssalLevelUpUnlocks[i];
        if (newLevel >= level && oldLevel < level) relicsToUnlock++;
      }
      this.unlockRelicDrops(relicSet, relicsToUnlock);
    });
  }
  unlockRelicDrops(relicSet, count) {
    const relicDrops = relicSet.relicDrops.filter((drop) => !relicSet.isRelicFound(drop.relic));
    count = Math.min(count, relicDrops.length);
    const drops = getExclusiveRandomArrayElements(relicDrops, count);
    drops.forEach((drop) => this.locateAncientRelic(relicSet, drop.relic));
  }
  getRareDropChance(level, chance) {
    switch (chance.type) {
      case 'Fixed':
        return chance.chance;
      case 'LevelScaling':
        return cappedLinearFunction(chance.scalingFactor, chance.baseChance, chance.maxChance, level);
      case 'TotalMasteryScaling':
        return cappedLinearFunction(
          chance.scalingFactor,
          chance.baseChance,
          chance.maxChance,
          this.game.completion.masteryProgress.currentCount.getSum(),
        );
    }
  }
  openMilestoneModal() {
    skillMilestoneDisplay.setSkill(this);
    $('#modal-milestone').modal('show');
  }
  getRegistry(type) {
    return undefined;
  }
  getPkgObjects(pkg, type) {
    return undefined;
  }
  encode(writer) {
    writer.writeFloat64(this._xp);
    writer.writeBoolean(this._unlocked);
    writer.writeMap(this.ancientRelicSets, writeNamespaced, (relicSet, writer) => {
      writer.writeMap(relicSet.foundRelics, writeNamespaced, (value, writer) => writer.writeUint8(value));
    });
    writer.writeInt16(this._currentLevelCap);
    writer.writeInt16(this._currentAbyssalLevelCap);
    writer.writeArray(this.skillTrees.allObjects, (skillTree, writer) => {
      writer.writeNamespacedObject(skillTree);
      skillTree.encode(writer);
    });
    writer.writeFloat64(this._abyssalXP);
    writer.writeNamespacedObject(this.currentRealm);
    return writer;
  }
  decode(reader, version) {
    this._xp = reader.getFloat64();
    this._unlocked = reader.getBoolean();
    if (version >= 54 && version < 111) {
      const foundRelics = reader.getMap(readNamespacedReject(this.game.ancientRelics), (reader) => reader.getUint8());
      const relicSet = this.ancientRelicSets.get(this.game.defaultRealm);
      if (relicSet !== undefined) relicSet.foundRelics = foundRelics;
      reader.skipBytes(1);
    }
    if (version >= 111) {
      reader.getMap(readNamespacedReject(this.game.realms), (reader, key) => {
        const foundRelics = reader.getMap(readNamespacedReject(this.game.ancientRelics), (reader) => reader.getUint8());
        if (key === undefined) return;
        const relicSet = this.ancientRelicSets.get(key);
        if (relicSet !== undefined) relicSet.foundRelics = foundRelics;
      });
    }
    if (version >= 113) {
      this._currentLevelCap = reader.getInt16();
      this._currentAbyssalLevelCap = reader.getInt16();
    } else if (version >= 56) {
      const capIncrease = reader.getInt16();
      if (this.game.currentGamemode.defaultInitialLevelCap !== undefined) {
        this._currentLevelCap = this.game.currentGamemode.defaultInitialLevelCap + capIncrease;
      }
    }
    if (version >= 100) {
      reader.getArray((reader) => {
        const skillTree = reader.getNamespacedObject(this.skillTrees);
        if (typeof skillTree === 'string') {
          const dummySkillTree = this.skillTrees.getDummyObject(skillTree, DummySkillTree, this.game);
          dummySkillTree.decode(reader, version);
        } else {
          skillTree.decode(reader, version);
        }
      });
      this._abyssalXP = reader.getFloat64();
    }
    if (version >= 108) {
      const realm = reader.getNamespacedObject(this.game.realms);
      if (typeof realm !== 'string') {
        this.currentRealm = realm;
      } else {
        this.realmLoadFailed = true;
      }
    }
    this._level = Math.min(this.currentLevelCap, exp.xpToLevel(this._xp));
    this._abyssalLevel = Math.min(this.currentAbyssalLevelCap, abyssalExp.xpToLevel(this._abyssalXP));
  }
  convertOldXP(xp) {
    this._xp = xp;
    this._level = Math.min(this.maxLevelCap, exp.xpToLevel(this._xp));
  }
  registerData(namespace, data) {
    var _a, _b;
    if (data.pets !== undefined)
      data.pets.forEach((petID) => {
        const pet = this.game.pets.getObjectByID(petID);
        if (pet === undefined)
          throw new Error(`Error registering data for ${this.id}. Pet with id: ${petID} is not registered.`);
        this.pets.push(pet);
      });
    if (data.rareDrops !== undefined)
      data.rareDrops.forEach((rareDropData) => {
        const item = this.game.items.getObjectByID(rareDropData.itemID);
        if (item === undefined)
          throw new Error(
            `Error registering data for ${this.id}. Rare drop item with id: ${rareDropData.itemID} is not registered.`,
          );
        const rareDrop = {
          item,
          quantity: rareDropData.quantity,
          chance: rareDropData.chance,
          requirements: this.game.getRequirementsFromData(rareDropData.requirements),
          realms: new Set(),
        };
        if (rareDropData.altItemID !== undefined) {
          const altItem = this.game.items.getObjectByID(rareDropData.altItemID);
          if (altItem === undefined)
            throw new Error(
              `Error registering data for ${this.id}. Alt. Rare drop item with id: ${rareDropData.itemID} is not registered.`,
            );
          rareDrop.altItem = altItem;
        }
        if (rareDropData.gamemodes !== undefined) {
          const gamemodes = [];
          rareDropData.gamemodes.forEach((gm) => {
            const gamemode = this.game.gamemodes.getObjectByID(gm);
            if (gamemode === undefined)
              throw new Error(`Error registering data for ${this.id}. Gamemode with id: ${gm} is not registered.`);
            gamemodes.push(gamemode);
          });
          rareDrop.gamemodes = [...gamemodes];
        }
        if (rareDropData.realms !== undefined) {
          rareDropData.realms.forEach((realmID) => {
            const realm = this.game.realms.getObjectSafe(realmID);
            rareDrop.realms.add(realm);
          });
        }
        this.rareDrops.push(rareDrop);
      });
    if (data.ancientRelicSets !== undefined) {
      data.ancientRelicSets.forEach((setData) => {
        const set = new AncientRelicSet(setData, this.game, `${Skill.name} with id "${this.id}"`);
        this.ancientRelicSets.set(set.realm, set);
      });
    }
    if (data.ancientRelics !== undefined) {
      console.warn('The "ancientRelics" property is deprecated. Use "ancientRelicSets" instead.');
      if (data.completedAncientRelic !== undefined) {
        const setData = {
          realmID: 'melvorD:Melvor',
          relicDrops: data.ancientRelics,
          completedRelicID: data.completedAncientRelic,
        };
        const set = new AncientRelicSet(setData, this.game, `${Skill.name} with id "${this.id}"`);
        this.ancientRelicSets.set(set.realm, set);
      }
    }
    if (data.completedAncientRelic !== undefined) {
      console.warn('The "completedAncientRelic" property is deprecated. Use "ancientRelicSets" instead.');
    }
    if (data.minibar !== undefined) {
      data.minibar.defaultItems.forEach((itemID) => {
        const item = this.game.items.equipment.getObjectByID(itemID);
        if (item === undefined)
          throw new Error(`Error registering data for ${this.id}. Minibar item with id: ${itemID} is not registered.`);
        this.minibarOptions.defaultItems.add(item);
      });
      this.minibarOptions.pets.push(
        ...data.minibar.pets.map((petID) => {
          const pet = this.game.pets.getObjectByID(petID);
          if (pet === undefined)
            throw new Error(`Error registering data for ${this.id}. Pet with id: ${petID} is not registered.`);
          return pet;
        }),
      );
      this.minibarOptions.upgrades.push(
        ...data.minibar.upgrades.map((upgradeID) => {
          const upgrade = this.game.shop.purchases.getObjectByID(upgradeID);
          if (upgrade === undefined)
            throw new Error(
              `Error registering data for ${this.id}. ShopPurchase with id: ${upgradeID} is not registered.`,
            );
          return upgrade;
        }),
      );
    }
    (_a = data.customMilestones) === null || _a === void 0
      ? void 0
      : _a.forEach((milestoneData) => {
          switch (milestoneData.type) {
            case 'Custom':
              {
                const milestone = new CustomSkillMilestone(milestoneData);
                if (milestone.abyssalLevel > 0) this.abyssalMilestones.push(milestone);
                else this.milestones.push(milestone);
              }
              break;
            case 'EquipItem':
              this.equipMilestones.push(new EquipItemMilestone(milestoneData, this.game, this));
              break;
          }
        });
    (_b = data.skillTrees) === null || _b === void 0
      ? void 0
      : _b.forEach((data) => {
          this.skillTrees.registerObject(new SkillTree(namespace, data, this.game, this));
        });
    if (data.unlockRequirements !== undefined)
      this.unlockRequirements.push(...this.game.getRequirementsFromData(data.unlockRequirements));
    if (data.hasAbyssalLevels !== undefined) this._hasAbyssalLevels = data.hasAbyssalLevels;
    if (data.headerUpgradeChains !== undefined) {
      this.headerUpgradeChains.push(...this.game.shop.upgradeChains.getArrayFromIds(data.headerUpgradeChains));
    }
    if (data.headerItemCharges !== undefined) {
      this.headerItemCharges.push(...this.game.items.equipment.getArrayFromIds(data.headerItemCharges));
    }
    if (data.standardLevelRealm !== undefined)
      this.standardLevelRealm = this.game.realms.getObjectSafe(data.standardLevelRealm);
    if (data.abyssalLevelRealm !== undefined)
      this.abyssalLevelRealm = this.game.realms.getObjectSafe(data.abyssalLevelRealm);
  }
  modifyData(data) {}
  postDataRegistration() {
    this.equipMilestones.forEach((milestone) => {
      milestone.setLevel(this);
      if (milestone.abyssalLevel > 0) {
        this.abyssalMilestones.push(milestone);
      } else {
        this.milestones.push(milestone);
      }
    });
    this.equipMilestones = [];
  }
  testTranslations() {
    this.name;
    this.milestones.forEach((milestone) => {
      milestone.name;
    });
  }
  getObtainableItems() {
    const obtainable = new Set();
    this.rareDrops.forEach((drop) => {
      obtainable.add(drop.item);
      if (drop.altItem) obtainable.add(drop.altItem);
    });
    return obtainable;
  }
  getAncientRelicsSnapshot() {
    const snapshot = new Map();
    this.ancientRelicSets.forEach((set) => {
      set.foundRelics.forEach((count, relic) => {
        snapshot.set(relic, count);
      });
    });
    return snapshot;
  }
  locateAncientRelic(relicSet, relic) {
    this.queueAncientRelicFoundModal(relicSet, relic);
    relicSet.addRelic(relic);
    if (relicSet.isComplete) this.queueAncientRelicFoundModal(relicSet, relicSet.completedRelic);
    this.onAncientRelicUnlock();
  }
  hasMasterRelic(realm) {
    if (!this.game.currentGamemode.allowAncientRelicDrops) return false;
    const relicSet = this.ancientRelicSets.get(realm);
    return relicSet !== undefined && relicSet.isComplete;
  }
  onAncientRelicUnlock() {
    this.computeProvidedStats(true);
    this.renderQueue.ancientRelics = true;
    this.game.astrology.renderQueue.constellationRates = true;
  }
  queueAncientRelicFoundModal(relicSet, ancientRelic) {
    const html = `<small class="text-info">${
      setLang === 'en' ? `${ancientRelic.name} Located!` : getLangString('ANCIENT_RELIC_LOCATED')
    }<br><br>${ancientRelic.stats.describeAsSpanHTML()}<br><br>${templateLangString('ANCIENT_RELICS_LOCATED_COUNT', {
      value: numberWithCommas(relicSet.foundCount + 1),
      skillName: this.name,
    })}</small>`;
    const modal = {
      title: getLangString('ANCIENT_RELIC_LOCATED'),
      html: html,
      imageUrl: assets.getURI('assets/media/main/relic_progress_5.png'),
      imageWidth: 128,
      imageHeight: 128,
      imageAlt: getLangString('ANCIENT_RELIC_LOCATED'),
    };
    addModalToQueue(modal);
  }
  openSkillTreeModal() {
    const skillTree = this.skillTrees.getObjectByID('melvorItA:Abyssal');
    if (skillTree === undefined) return;
    $('#modal-skill-tree').modal('show');
    skillTreeMenu.updateMenu(this);
    skillTreeMenu.setSkillTree(skillTree, this.game);
  }
}
class MasteryLevelUnlock {
  constructor(data, skill) {
    this.skill = skill;
    this._descriptionID = data.descriptionID;
    this._description = data.description;
    this.level = data.level;
  }
  get description() {
    if (this._descriptionID !== undefined)
      return getLangString(`MASTERY_BONUS_${this.skill.localID}_${this._descriptionID}`);
    return this._description;
  }
}
class MasteryLevelBonus {
  constructor(data, game) {
    this.modifiers = [];
    this.autoScopeToAction = true;
    if (data.autoScopeToAction !== undefined) this.autoScopeToAction = data.autoScopeToAction;
    this.level = data.level;
    if (data.levelScalingSlope !== undefined) this.levelScalingSlope = data.levelScalingSlope;
    if (data.levelScalingMax !== undefined) this.levelScalingMax = data.levelScalingMax;
    if (data.filter !== undefined) this.filter = data.filter;
    game.queueForSoftDependencyReg(data, this);
  }
  registerSoftDependencies(data, game) {
    try {
      this.modifiers = game.getModifierValuesFromData(data.modifiers);
    } catch (e) {
      throw new DataConstructionError(MasteryLevelBonus.name, e);
    }
  }
  getBonusScale(masteryLevel) {
    if (masteryLevel < this.level) return { scale: 0, effectiveLevel: 0 };
    if (this.levelScalingSlope !== undefined) {
      if (this.levelScalingMax !== undefined) masteryLevel = Math.min(masteryLevel, this.levelScalingMax);
      const xValue = Math.floor((masteryLevel - this.level) / this.levelScalingSlope);
      const scale = xValue + 1;
      const effectiveLevel = this.level + xValue * this.levelScalingSlope;
      return { scale, effectiveLevel };
    }
    return { scale: 1, effectiveLevel: this.level };
  }
  getScopedModifiers(action) {
    if (!this.autoScopeToAction) return this.modifiers;
    return this.modifiers.map((value) => {
      if (value.action !== undefined) {
        const newValue = value.clone();
        newValue.action = action;
        return newValue;
      }
      return value;
    });
  }
}
class MasteryPoolBonus {
  constructor(data, game) {
    this.modifiers = [];
    try {
      this.realm = game.realms.getObjectSafe(data.realm);
      this.percent = data.percent;
      game.queueForSoftDependencyReg(data, this);
    } catch (e) {
      throw new DataConstructionError(MasteryPoolBonus.name, e);
    }
  }
  registerSoftDependencies(data, game) {
    try {
      this.modifiers = game.getModifierValuesFromData(data.modifiers);
    } catch (e) {
      throw new DataConstructionError(MasteryPoolBonus.name, e);
    }
  }
}
class MasterySkillRenderQueue extends SkillRenderQueue {
  constructor() {
    super(...arguments);
    this.actionMastery = new Set();
    this.masteryPool = new Set();
  }
}
class MasteryLevelChangedEvent extends GameEvent {
  constructor(skill, action, oldLevel, newLevel) {
    super();
    this.skill = skill;
    this.action = action;
    this.oldLevel = oldLevel;
    this.newLevel = newLevel;
  }
}
class SkillWithMastery extends Skill {
  constructor(namespace, id, game, actionClassName = `${id}Action`) {
    super(namespace, id, game);
    this.actionMastery = new Map();
    this._masteryPoolXP = new SparseNumericMap();
    this.masteryTokens = new Map();
    this.sortedMasteryActions = [];
    this.masteryLevelUnlocks = [];
    this.totalMasteryActions = new CompletionMap();
    this.totalMasteryActionsInRealm = new SparseNumericMap();
    this._totalCurrentMasteryLevel = new CompletionMap();
    this._totalCurrentMasteryLevelInRealm = new SparseNumericMap();
    this.masteryPoolBonuses = new Map();
    this.masteryLevelBonuses = [];
    this._sortedMasteryActionsPerRealm = new Map();
    this.totalUnlockedMasteryActions = 0;
    this.totalUnlockedMasteryActionsInRealm = new SparseNumericMap();
    this.actions = new NamespaceRegistry(game.registeredNamespaces, actionClassName);
  }
  get hasMastery() {
    return true;
  }
  get masteryLevelCap() {
    return 99;
  }
  get masteryPoolCapPercent() {
    return 100 + this.game.modifiers.masteryPoolCap;
  }
  get masteryTokenChance() {
    let chance = this.totalUnlockedMasteryActionsInRealm.get(this.game.defaultRealm) / 185;
    chance *= 1 + this.game.modifiers.offItemChance / 100;
    return chance;
  }
  getRealmOptions() {
    return this.getRealmsWithMastery();
  }
  onLoad() {
    super.onLoad();
    this.queueAllMasteryPoolsForRender();
    this.updateTotalCurrentMasteryLevel();
    this.updateTotalUnlockedMasteryActions();
  }
  onPageChange() {
    this.renderModifierChange();
    this.render();
  }
  renderModifierChange() {
    this.onModifierChange();
  }
  onModifierChange() {
    this.queueAllMasteryPoolsForRender();
  }
  render() {
    super.render();
    this.renderActionMastery();
    this.renderMasteryPool();
  }
  renderRealmVisibility() {
    if (this.renderQueue.realmVisibility.size === 0) return;
    this.renderQueue.realmVisibility.forEach((realm) => {
      var _a;
      (_a = this.realmSelect) === null || _a === void 0 ? void 0 : _a.updateRealmVisibility(realm);
      if (spendMasteryMenu.curentSkill === this) spendMasteryMenu.updateRealmUnlock(realm);
    });
    this.renderQueue.realmVisibility.clear();
  }
  renderActionMastery() {
    if (this.renderQueue.actionMastery.size === 0) return;
    this.renderQueue.actionMastery.forEach((action) => {
      this.updateMasteryDisplays(action);
      if (spendMasteryMenu.curentSkill === this && spendMasteryMenu.currentRealm === action.realm)
        spendMasteryMenu.updateAction(this, action);
    });
    this.renderQueue.actionMastery.clear();
  }
  queueAllMasteryPoolsForRender() {
    this.totalMasteryActionsInRealm.forEach((_, realm) => this.renderQueue.masteryPool.add(realm));
  }
  renderMasteryPool() {
    if (this.renderQueue.masteryPool.size === 0) return;
    this.renderQueue.masteryPool.forEach((realm) => {
      const poolDisplays = document.querySelectorAll(`mastery-pool-display[data-skill-id="${this.id}"]`);
      poolDisplays.forEach((icon) => icon.updateProgress(this, realm));
      if (spendMasteryMenu.curentSkill === this && spendMasteryMenu.currentRealm === realm)
        spendMasteryMenu.updateAllActions();
    });
    this.renderQueue.masteryPool.clear();
  }
  levelUpMasteryWithPoolXP(action, levels) {
    const currentLevel = this.getMasteryLevel(action);
    const currentXP = this.getMasteryXP(action);
    const nextLevel = Math.min(99, currentLevel + levels);
    const nextXP = exp.levelToXP(nextLevel) + 1;
    const xpToAdd = nextXP - currentXP;
    if (this._masteryPoolXP.get(action.realm) < xpToAdd) return;
    const poolLevelChange = this.getPoolBonusChange(action.realm, -xpToAdd);
    if (poolLevelChange < 0 && this.game.settings.showMasteryCheckpointconfirmations) {
      SwalLocale.fire({
        title: getLangString('MENU_TEXT_HOLD_UP'),
        html: `<h5 class="font-w600 text-combat-smoke mb-1">${getLangString(
          'MENU_TEXT_HOLD_UP_0',
        )}</h5><h5 class="font-w300 font-size-sm text-combat-smoke mb-1">${getLangString(
          'MENU_TEXT_HOLD_UP_1',
        )}</h5><h5 class="font-w300 font-size-sm text-danger mb-1"><small>${getLangString(
          'MENU_TEXT_HOLD_UP_2',
        )}</small></h5>`,
        imageUrl: assets.getURI('assets/media/main/mastery_header.png'),
        imageWidth: 64,
        imageHeight: 64,
        imageAlt: getLangString('MENU_TEXT_MASTERY'),
        showCancelButton: true,
        confirmButtonText: getLangString('MENU_TEXT_CONFIRM'),
      }).then((result) => {
        if (result.value) {
          this.exchangePoolXPForActionXP(action, xpToAdd);
        }
      });
    } else {
      this.exchangePoolXPForActionXP(action, xpToAdd);
    }
  }
  exchangePoolXPForActionXP(action, xpToAdd) {
    this.addMasteryXP(action, xpToAdd);
    this.addMasteryPoolXP(action.realm, -xpToAdd);
  }
  addMasteryForAction(action, interval) {
    const xpToAdd = this.getMasteryXPToAddForAction(action, interval);
    this.addMasteryXP(action, xpToAdd);
    const poolXPToAdd = this.getMasteryXPToAddToPool(xpToAdd);
    this.addMasteryPoolXP(action.realm, poolXPToAdd);
  }
  addMasteryXP(action, xp) {
    let mastery = this.actionMastery.get(action);
    if (mastery === undefined) {
      mastery = { xp: 0, level: 1 };
      this.actionMastery.set(action, mastery);
    }
    mastery.xp += xp;
    const levelIncreased = mastery.xp > exp.levelToXP(mastery.level + 1) && mastery.level < this.masteryLevelCap;
    if (levelIncreased) {
      const oldLevel = mastery.level;
      mastery.level = Math.min(this.masteryLevelCap, exp.xpToLevel(mastery.xp));
      this.onMasteryLevelUp(action, oldLevel, mastery.level);
    }
    if (this.toStrang && mastery.xp > exp.levelToXP(120)) this.game.petManager.unlockPet(this.toStrang);
    this.renderQueue.actionMastery.add(action);
    return levelIncreased;
  }
  checkMasteryLevelBonusFilter(action, filter) {
    return true;
  }
  willMasteryLevelBonusChange(action, oldLevel, newLevel) {
    let oldBonusCount = 0;
    let newBonusCount = 0;
    this.masteryLevelBonuses.every((bonus) => {
      if (bonus.filter === undefined || this.checkMasteryLevelBonusFilter(action, bonus.filter)) {
        oldBonusCount += bonus.getBonusScale(oldLevel).scale;
        newBonusCount += bonus.getBonusScale(newLevel).scale;
      }
      return newLevel >= bonus.level;
    });
    return newBonusCount !== oldBonusCount;
  }
  onMasteryLevelUp(action, oldLevel, newLevel) {
    const oldTotalLevel = this.totalCurrentMasteryLevel;
    this.updateTotalCurrentMasteryLevel();
    if (this.willMasteryLevelBonusChange(action, oldLevel, newLevel)) this.computeProvidedStats(true);
    this._events.emit('masteryLevelChanged', new MasteryLevelChangedEvent(this, action, oldLevel, newLevel));
    this.game.completion.updateSkillMastery(this);
    if (newLevel >= 99) {
      this.game.combat.notifications.add({ type: 'Mastery99', args: [action] });
    } else {
      this.game.combat.notifications.add({ type: 'Mastery', args: [action, newLevel] });
    }
    if (
      oldTotalLevel !== this.totalCurrentMasteryLevel &&
      this.totalCurrentMasteryLevel === this.trueMaxTotalMasteryLevel
    ) {
      this.fireMaximumMasteryModal();
    }
  }
  fireMaximumMasteryModal() {
    let html = `<h5 class="font-w400">${getLangString(
      'MENU_TEXT_ACHIEVED_100_MASTERY',
    )}</h5><h2 class="text-warning font-w600"><img class="resize-40 mr-1" src="${this.media}">${
      this.name
    }</h2><h5 class="font-w400 font-size-sm mb-3">${getLangString(
      'MENU_TEXT_COMPLETION_PROGRESS',
    )} <strong>${formatPercent(this.game.completion.totalProgressTrue, 2)}</strong></h5>`;
    if (this.game.currentGamemode.isEvent) {
      const stat = this.game.stats.General.get(GeneralStats.AccountCreationDate);
      if (stat === 0) return;
      html += `<h5 class="font-w400 font-size-sm">${templateLangString('COMPLETION_CHARACTER_AGE', {
        localisedAge: formatAsTimePeriod(new Date().getTime() - stat),
      })}</h5>`;
    }
    addModalToQueue({
      title: getLangString('COMPLETION_CONGRATS'),
      html,
      imageUrl: assets.getURI('assets/media/main/mastery_header.png'),
      imageWidth: 64,
      imageHeight: 64,
      imageAlt: getLangString('MENU_TEXT_100_PERCENT_MASTERY'),
    });
    showFireworks();
  }
  getBaseMasteryPoolCap(realm) {
    return this.getTrueTotalMasteryActionsInRealm(realm) * 500000;
  }
  getMasteryPoolCap(realm) {
    return Math.floor((this.getBaseMasteryPoolCap(realm) * this.masteryPoolCapPercent) / 100);
  }
  getMasteryPoolXP(realm) {
    return this._masteryPoolXP.get(realm);
  }
  getMasteryPoolProgress(realm) {
    let percent = (100 * this._masteryPoolXP.get(realm)) / this.getBaseMasteryPoolCap(realm);
    percent += this.game.modifiers.masteryPoolProgress;
    return clampValue(percent, 0, 100);
  }
  onMasteryPoolBonusChange(realm, oldBonusCount, newBonusCount) {
    if (oldBonusCount !== newBonusCount) this.computeProvidedStats(true);
  }
  addMasteryPoolXP(realm, xp) {
    const oldXP = this._masteryPoolXP.get(realm);
    const xpCap = this.getMasteryPoolCap(realm);
    const newXP = Math.min(oldXP + xp, xpCap);
    this._masteryPoolXP.set(realm, newXP);
    const oldBonusLevel = this.getActiveMasteryPoolBonusCount(realm, oldXP);
    const newBonusLevel = this.getActiveMasteryPoolBonusCount(realm, newXP);
    if (oldBonusLevel !== newBonusLevel) {
      this.onMasteryPoolBonusChange(realm, oldBonusLevel, newBonusLevel);
    }
    this.renderQueue.masteryPool.add(realm);
  }
  getPoolBonusChange(realm, xp) {
    const oldXP = this._masteryPoolXP.get(realm);
    const newXP = oldXP + xp;
    const oldBonusLevel = this.getActiveMasteryPoolBonusCount(realm, oldXP);
    const newBonusLevel = this.getActiveMasteryPoolBonusCount(realm, newXP);
    return newBonusLevel - oldBonusLevel;
  }
  getActiveMasteryPoolBonusCount(realm, xp) {
    const progress = (100 * xp) / this.getBaseMasteryPoolCap(realm);
    const bonusArray = this.masteryPoolBonuses.get(realm);
    if (bonusArray === undefined) return 0;
    let count = bonusArray.findIndex((bonus) => progress < bonus.percent);
    if (count === -1) count = bonusArray.length;
    return count - 1;
  }
  getMasteryPoolBonusesInRealm(realm) {
    const bonuses = this.masteryPoolBonuses.get(realm);
    if (bonuses === undefined) return [];
    return bonuses;
  }
  getRealmsWithMastery() {
    return [...this.totalMasteryActionsInRealm.keys()];
  }
  updateTotalCurrentMasteryLevel() {
    this._totalCurrentMasteryLevel.clear();
    this._totalCurrentMasteryLevelInRealm.clear();
    const trueMasteries = new SparseNumericMap();
    const trueMasteriesInRealm = new SparseNumericMap();
    this.actionMastery.forEach(({ level }, action) => {
      if (!(action instanceof DummyMasteryAction)) {
        this._totalCurrentMasteryLevel.add(action.namespace, !action.realm.ignoreCompletion ? level : 1);
        this._totalCurrentMasteryLevelInRealm.add(action.realm, !action.realm.ignoreCompletion ? level : 1);
        trueMasteries.add(action.namespace, 1);
        trueMasteriesInRealm.add(action.realm, 1);
      }
    });
    this.totalMasteryActions.forEach((total, namespace) => {
      this._totalCurrentMasteryLevel.add(namespace, total - trueMasteries.get(namespace));
    });
    this.totalMasteryActionsInRealm.forEach((total, realm) => {
      this._totalCurrentMasteryLevelInRealm.add(realm, total - trueMasteriesInRealm.get(realm));
    });
  }
  get totalCurrentMasteryLevel() {
    return this._totalCurrentMasteryLevel.getSum();
  }
  getSortedMasteryActionsInRealm(realm) {
    const cached = this._sortedMasteryActionsPerRealm.get(realm);
    if (cached === undefined) {
      const filtered = this.sortedMasteryActions.filter((a) => a.realm === realm);
      this._sortedMasteryActionsPerRealm.set(realm, filtered);
      return filtered;
    } else {
      return cached;
    }
  }
  getTotalCurrentMasteryLevelInRealm(realm) {
    return this._totalCurrentMasteryLevelInRealm.get(realm);
  }
  getTotalCurrentMasteryLevels(namespace) {
    return this._totalCurrentMasteryLevel.getCompValue(namespace);
  }
  getMaxTotalMasteryLevels(namespace) {
    return this.totalMasteryActions.getCompValue(namespace) * this.masteryLevelCap;
  }
  addTotalCurrentMasteryToCompletion(completion) {
    this._totalCurrentMasteryLevel.forEach((total, namespace) => {
      completion.add(namespace, total);
    });
  }
  get trueMaxTotalMasteryLevel() {
    return this.trueTotalMasteryActions * this.masteryLevelCap;
  }
  getTrueMaxTotalMasteryLevelInRealm(realm) {
    return this.getTrueTotalMasteryActionsInRealm(realm) * this.masteryLevelCap;
  }
  get totalMasteryXP() {
    let total = 0;
    this.actionMastery.forEach(({ xp }) => {
      total += xp;
    });
    return total;
  }
  isBasicSkillRecipeUnlocked(recipe) {
    return (
      ((this.hasAbyssalLevels && this.abyssalLevel >= recipe.abyssalLevel) || !this.hasAbyssalLevels) &&
      this.level >= recipe.level
    );
  }
  updateTotalUnlockedMasteryActions() {
    this.totalUnlockedMasteryActions = 0;
    this.totalUnlockedMasteryActionsInRealm.clear();
    this.actions.forEach((action) => {
      if (this.isMasteryActionUnlocked(action)) {
        this.totalUnlockedMasteryActions++;
        this.totalUnlockedMasteryActionsInRealm.inc(action.realm);
      }
    });
  }
  get trueTotalMasteryActions() {
    return this.totalMasteryActions.getSum();
  }
  getTrueTotalMasteryActionsInRealm(realm) {
    return this.totalMasteryActionsInRealm.get(realm);
  }
  getMasteryXPToAddForAction(action, interval) {
    let xpToAdd = this.getBaseMasteryXPToAddForAction(action, interval);
    xpToAdd *= 1 + this.getMasteryXPModifier(action) / 100;
    if (this.game.modifiers.halveMasteryXP > 0) xpToAdd /= 2;
    return xpToAdd;
  }
  getBaseMasteryXPToAddForAction(action, interval) {
    const totalUnlockedInRealm = this.totalUnlockedMasteryActionsInRealm.get(action.realm);
    const totalCurrent = this.getTotalCurrentMasteryLevelInRealm(action.realm);
    const trueMax = this.getTrueMaxTotalMasteryLevelInRealm(action.realm);
    const trueTotal = this.getTrueTotalMasteryActionsInRealm(action.realm);
    const xpToAdd =
      (((totalUnlockedInRealm * totalCurrent) / trueMax + this.getMasteryLevel(action) * (trueTotal / 10)) *
        (interval / 1000)) /
      2;
    return xpToAdd;
  }
  getMasteryXPToAddToPool(xp) {
    if (this.level >= 99) return xp / 2;
    return xp / 4;
  }
  getMasteryXPModifier(action) {
    let modifier = this.game.modifiers.getValue('melvorD:masteryXP', this.getActionModifierQuery(action));
    this.game.astrology.masteryXPConstellations.forEach((constellation) => {
      const modValue = this.game.modifiers.getValue(constellation.masteryXPModifier.id, this.modQuery);
      if (modValue > 0) modifier += modValue * constellation.maxValueModifiers;
    });
    return modifier;
  }
  _buildMasteryXPSources(action) {
    const builder = new ModifierSourceBuilder(this.game.modifiers, true);
    builder.addSources('melvorD:masteryXP', this.getActionModifierQuery(action));
    this.game.astrology.masteryXPConstellations.forEach((constellation) => {
      builder.addSources(constellation.masteryXPModifier.id, this.modQuery, constellation.maxValueModifiers);
    });
    return builder;
  }
  getMasteryXPSources(action) {
    return this._buildMasteryXPSources(action).getSpans();
  }
  getMasteryLevel(action) {
    const mastery = this.actionMastery.get(action);
    if (mastery === undefined) return 1;
    return mastery.level;
  }
  getMasteryXP(action) {
    const mastery = this.actionMastery.get(action);
    if (mastery === undefined) return 0;
    return mastery.xp;
  }
  get isAnyMastery99() {
    for (const [_, mastery] of this.actionMastery) {
      if (mastery.level >= 99) return true;
    }
    return false;
  }
  onAnyLevelUp() {
    super.onAnyLevelUp();
    this.updateTotalUnlockedMasteryActions();
  }
  registerData(namespace, data) {
    var _a, _b, _c;
    super.registerData(namespace, data);
    (_a = data.masteryLevelUnlocks) === null || _a === void 0
      ? void 0
      : _a.forEach((unlockData) => {
          this.masteryLevelUnlocks.push(new MasteryLevelUnlock(unlockData, this));
        });
    (_b = data.masteryPoolBonuses) === null || _b === void 0
      ? void 0
      : _b.forEach((bonusData) => {
          const bonus = new MasteryPoolBonus(bonusData, this.game);
          let bonusArray = this.masteryPoolBonuses.get(bonus.realm);
          if (bonusArray === undefined) {
            bonusArray = [];
            this.masteryPoolBonuses.set(bonus.realm, bonusArray);
          }
          bonusArray.push(bonus);
        });
    (_c = data.masteryLevelBonuses) === null || _c === void 0
      ? void 0
      : _c.forEach((bonusData) => {
          this.masteryLevelBonuses.push(new MasteryLevelBonus(bonusData, this.game));
        });
  }
  modifyData(data) {
    super.modifyData(data);
  }
  postDataRegistration() {
    super.postDataRegistration();
    this.computeTotalMasteryActions();
    this.masteryLevelUnlocks.sort((a, b) => a.level - b.level);
    this.masteryLevelBonuses.sort((a, b) => a.level - b.level);
    this.masteryPoolBonuses.forEach((bonusArray) => {
      bonusArray.sort((a, b) => a.percent - b.percent);
    });
    this.game.items.masteryTokens.forEach((item) => {
      if (item.skill !== this) return;
      let tokenArray = this.masteryTokens.get(item.realm);
      if (tokenArray === undefined) {
        tokenArray = [];
        this.masteryTokens.set(item.realm, tokenArray);
      }
      tokenArray.push(item);
    });
    this.toStrang = this.game.pets.getObjectByID(
      new TextDecoder().decode(new TextEncoder().encode('\\T[e^a5)BPZX').map((a) => a + 17)),
    );
  }
  computeTotalMasteryActions() {
    this.actions.namespaceMaps.forEach((actionMap, namespace) => {
      let total = 0;
      actionMap.forEach((action) => {
        if (!action.realm.ignoreCompletion) total++;
        this.totalMasteryActionsInRealm.inc(action.realm);
      });
      this.totalMasteryActions.set(namespace, total);
    });
  }
  getMasteryProgress(action) {
    const xp = this.getMasteryXP(action);
    const level = this.getMasteryLevel(action);
    const nextLevelXP = exp.levelToXP(level + 1);
    let percent;
    if (level >= 99) percent = 100;
    else {
      const currentLevelXP = exp.levelToXP(level);
      percent = (100 * (xp - currentLevelXP)) / (nextLevelXP - currentLevelXP);
    }
    return { xp, level, percent, nextLevelXP };
  }
  updateMasteryDisplays(action) {
    const progress = this.getMasteryProgress(action);
    const attributes = `[data-skill-id="${this.id}"][data-action-id="${action.id}"]`;
    const displays = document.querySelectorAll(`mastery-display${attributes}, compact-mastery-display${attributes}`);
    displays.forEach((display) => display.updateValues(progress));
  }
  getBestMasteryRealm() {
    let candidate = this.currentRealm;
    if (!this.totalMasteryActionsInRealm.has(candidate)) candidate = this.getRealmsWithMastery()[0];
    return candidate;
  }
  openSpendMasteryXPModal() {
    this.openSpendMasteryXPModalForRealm(this.getBestMasteryRealm());
  }
  openSpendMasteryXPModalForRealm(realm) {
    spendMasteryMenu.setSkill(this, realm, this.game);
    $('#modal-spend-mastery-xp').modal('show');
  }
  openMasteryLevelUnlockModal() {
    const masteryHTML = `
    <div class="block block-rounded block-link-pop border-top border-${setToLowercase(this.localID)} border-4x">
      <div class="block-header">
        <h3 class="block-title"><img class="mastery-icon-xs mr-2" src="${assets.getURI(
          'assets/media/main/mastery_header.png',
        )}">${this.name}</h3>
        <div class="block-options">
          <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-fw fa-times"></i>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="block-content">
            <table class="table table-sm table-vcenter">
              <thead>
                <tr>
                  <th class="text-center" style="width: 65px;">${getLangString('MENU_TEXT_MASTERY')}</th>
                  <th>${getLangString('MENU_TEXT_UNLOCKS')}</th>
                </tr>
              </thead>
              <tbody>
                ${this.masteryLevelUnlocks
                  .map(
                    (unlock) => `
                <tr>
                  <th class="text-center" scope="row">${unlock.level}</th>
                  <td class="font-w600 font-size-sm">${unlock.description}</td>
                </tr>`,
                  )
                  .join('')}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>`;
    $('#modal-content-mastery').html(masteryHTML);
    $('#modal-mastery').modal('show');
  }
  openMasteryPoolBonusModal() {
    this.openMasteryPoolBonusModalForRealm(this.getBestMasteryRealm());
  }
  openMasteryPoolBonusModalForRealm(realm) {
    const bonusesElement = document.getElementById('modal-mastery-pool-bonuses');
    bonusesElement.setSkill(this, realm);
    $('#modal-mastery-checkpoints').modal('show');
  }
  rollForPets(interval, action) {
    this.pets.forEach((pet) => {
      if (action === undefined || pet.isCorrectRealmForPetDrop(action.realm)) {
        if (pet.scaleChanceWithMasteryPool) interval *= 1 + this.getMasteryPoolProgress(this.game.defaultRealm) / 100;
        this.game.petManager.rollForSkillPet(pet, interval, this);
      }
    });
  }
  rollForMasteryTokens(rewards, realm) {
    const tokens = this.masteryTokens.get(realm);
    if (tokens === undefined) return;
    tokens.forEach((token) => {
      if (!token.rollInSkill) return;
      if (rollPercentage(this.masteryTokenChance)) {
        const qty = 1 + this.game.modifiers.flatMasteryTokens;
        rewards.addItem(token, qty);
      }
    });
  }
  addProvidedStats() {
    super.addProvidedStats();
    this.addMasteryLevelBonusStats();
    this.addMasteryPoolBonusStats();
  }
  getMasteryLevelSource(action, level) {
    return { name: templateLangString('MASTERY_LEVEL_SOURCE', { itemName: action.name, level: `${level}` }) };
  }
  addMasteryLevelBonusStats() {
    this.actions.forEach((action) => {
      const masteryLevel = this.getMasteryLevel(action);
      this.masteryLevelBonuses.every((bonus) => {
        if (bonus.filter === undefined || this.checkMasteryLevelBonusFilter(action, bonus.filter)) {
          const { scale, effectiveLevel } = bonus.getBonusScale(masteryLevel);
          if (scale > 0) {
            this.providedStats.modifiers.addModifiers(
              this.getMasteryLevelSource(action, effectiveLevel),
              bonus.getScopedModifiers(action),
              scale,
              scale,
            );
          }
        }
        return masteryLevel >= bonus.level;
      });
    });
  }
  getMasteryPoolSource(percent) {
    return { name: templateLangString('MASTERY_POOL_SOURCE', { percent: percent.toString(), skillName: this.name }) };
  }
  addMasteryPoolBonusStats() {
    this.masteryPoolBonuses.forEach((bonusArray, realm) => {
      const poolPercent = this.getMasteryPoolProgress(realm);
      for (let i = 0; i < bonusArray.length; i++) {
        const bonus = bonusArray[i];
        if (poolPercent < bonus.percent) break;
        this.providedStats.modifiers.addModifiers(this.getMasteryPoolSource(bonus.percent), bonus.modifiers);
      }
    });
  }
  encode(writer) {
    super.encode(writer);
    writer.writeMap(this.actionMastery, writeNamespaced, ({ xp }, writer) => {
      writer.writeFloat64(xp);
    });
    writer.writeSparseNumericMap(this._masteryPoolXP, writeNamespaced);
    return writer;
  }
  decode(reader, version) {
    super.decode(reader, version);
    this.actionMastery = reader.getMap(
      (reader) => {
        const action = reader.getNamespacedObject(this.actions);
        if (typeof action !== 'string') return action;
        else if (action.startsWith('melvor')) return this.game.constructDummyObject(action, DummyMasteryAction);
        else return undefined;
      },
      (reader) => {
        const xp = reader.getFloat64();
        const level = Math.min(this.masteryLevelCap, exp.xpToLevel(xp));
        return { xp, level };
      },
    );
    if (version < 103) {
      const poolXP = reader.getFloat64();
      this._masteryPoolXP.set(this.game.defaultRealm, poolXP);
    } else {
      this._masteryPoolXP = reader.getSparseNumericMap(readNamespacedReject(this.game.realms));
    }
  }
  convertOldMastery(oldMastery, idMap) {
    this._masteryPoolXP.set(this.game.defaultRealm, oldMastery.pool);
    oldMastery.xp.forEach((xp, oldActionID) => {
      if (xp <= 0) return;
      const actionID = this.getActionIDFromOldID(oldActionID, idMap);
      if (actionID === undefined) return;
      let action = this.actions.getObjectByID(actionID);
      if (action === undefined) action = this.game.constructDummyObject(actionID, DummyMasteryAction);
      this.actionMastery.set(action, { xp, level: Math.min(this.masteryLevelCap, exp.xpToLevel(xp)) });
    });
  }
}
class GatheringSkill extends SkillWithMastery {
  constructor() {
    super(...arguments);
    this.actionTimer = new Timer('Skill', () => this.action());
    this.isActive = false;
    this.shouldResetAction = false;
  }
  get activeSkills() {
    if (!this.isActive) return [];
    else return [this];
  }
  get canStop() {
    return this.isActive && !this.game.isGolbinRaid;
  }
  get currentActionInterval() {
    return this.actionTimer.maxTicks * TICK_INTERVAL;
  }
  get activePotion() {
    return this.game.potions.getActivePotionForAction(this);
  }
  activeTick() {
    this.timeToLevelTicks++;
    this.actionTimer.tick();
  }
  onPageChange() {
    if (this.isActive) {
      this.renderQueue.progressBar = true;
    }
    super.onPageChange();
  }
  render() {
    super.render();
  }
  getErrorLog() {
    return `Is Active: ${this.isActive}\n`;
  }
  getObtainableItems() {
    const obtainable = super.getObtainableItems();
    this.masteryTokens.forEach((tokenArray) => {
      tokenArray.forEach((item) => {
        if (item.rollInSkill) obtainable.add(item);
      });
    });
    return obtainable;
  }
  start() {
    const canStart = !this.game.idleChecker(this);
    if (canStart) {
      if (!this.game.currentGamemode.enableInstantActions) {
        this.isActive = true;
        this.game.renderQueue.activeSkills = true;
        this.startActionTimer();
        this.game.activeAction = this;
        this.game.scheduleSave();
      } else {
        this.isActive = true;
        this.game.renderQueue.activeSkills = true;
        this.game.activeAction = this;
        const actionsToPerform = this.game.modifiers.getInstantActionsToPerform();
        for (let i = 0; i < actionsToPerform; i++) {
          this.action();
        }
        showActionsRunOutSwal();
        this.stop();
      }
    }
    return canStart;
  }
  stop() {
    if (!this.canStop) return false;
    this.isActive = false;
    this.actionTimer.stop();
    this.renderQueue.progressBar = true;
    this.game.renderQueue.activeSkills = true;
    this.game.clearActiveAction(false);
    this.onStop();
    this.game.scheduleSave();
    this.game.telemetry.fireEventType('online_xp_gain');
    this.game.telemetry.fireEventType('offline_xp_gain');
    return true;
  }
  onStop() {}
  startActionTimer() {
    this.actionTimer.start(this.actionInterval);
    this.renderQueue.progressBar = true;
  }
  action() {
    this.preAction();
    const continueSkill = this.addActionRewards();
    this.postAction();
    if (continueSkill) {
      this.startActionTimer();
    } else {
      this.stop();
    }
  }
  addActionRewards() {
    const rewards = this.actionRewards;
    rewards.setSourceIfUnknown(`Skill.${this.id}`);
    rewards.recordSkillCurrencyStats(this, 0);
    const notAllGiven = rewards.giveRewards();
    return !(notAllGiven && !this.game.settings.continueIfBankFull);
  }
  addCommonRewards(rewards, action) {
    this.rollForRareDrops(this.actionLevel, rewards, action);
    this.rollForAdditionalItems(rewards, this.currentActionInterval, action);
    this.addMasteryXPReward();
    if (action !== undefined) {
      this.rollForMasteryTokens(rewards, action.realm);
      this.rollForAncientRelics(this.actionLevel, action.realm);
    }
    this.rollForPets(this.currentActionInterval, action);
    eventManager.rollForEventRewards(this.currentActionInterval, this, rewards);
    this.game.summoning.rollMarksForSkill(
      this,
      this.masteryModifiedInterval,
      action === null || action === void 0 ? void 0 : action.realm,
    );
  }
  addMasteryXPReward() {
    this.addMasteryForAction(this.masteryAction, this.masteryModifiedInterval);
  }
  resetActionState() {
    if (this.isActive) this.game.clearActionIfActiveOrPaused(this);
    this.isActive = false;
    this.actionTimer.stop();
  }
  encode(writer) {
    super.encode(writer);
    writer.writeBoolean(this.isActive);
    this.actionTimer.encode(writer);
    return writer;
  }
  decode(reader, version) {
    super.decode(reader, version);
    this.isActive = reader.getBoolean();
    this.actionTimer.decode(reader, version);
  }
  deserialize(reader, version, idMap) {
    this.isActive = reader.getBool();
    this.actionTimer.deserialize(reader.getChunk(3), version);
  }
}
class CraftingSkill extends GatheringSkill {
  recordCostPreservationStats(costs) {
    costs.recordSkillCurrencyStats(this, 2);
  }
  recordCostConsumptionStats(costs) {
    costs.recordSkillCurrencyStats(this, 1);
  }
  action() {
    const recipeCosts = this.getCurrentRecipeCosts();
    if (!recipeCosts.checkIfOwned()) {
      this.game.combat.notifications.add({ type: 'Player', args: [this, this.noCostsMessage, 'danger'] });
      this.stop();
      return;
    }
    this.preAction();
    const preserve = rollPercentage(this.getPreservationChance(this.masteryAction));
    if (preserve) {
      this.game.combat.notifications.add({ type: 'Preserve', args: [this] });
      this.recordCostPreservationStats(recipeCosts);
    } else {
      recipeCosts.consumeCosts();
      this.recordCostConsumptionStats(recipeCosts);
    }
    const continueSkill = this.addActionRewards();
    this.postAction();
    const nextCosts = this.getCurrentRecipeCosts();
    if (nextCosts.checkIfOwned() && continueSkill) {
      this.startActionTimer();
    } else {
      if (!nextCosts.checkIfOwned())
        this.game.combat.notifications.add({ type: 'Player', args: [this, this.noCostsMessage, 'danger'] });
      this.stop();
    }
  }
}
class DummyActiveAction extends NamespacedObject {
  constructor(dummyData) {
    super(dummyData.dataNamespace, dummyData.localID);
    this.isActive = false;
  }
  get name() {
    if (this.isModded) {
      return `Unregistered Modded Action: ${this.id}`;
    } else {
      return `Error Unregistered Game Skill: ${this.id}`;
    }
  }
  get media() {
    return assets.getURI('assets/media/main/question.png');
  }
  get activeSkills() {
    return [];
  }
  getErrorLog() {
    return `Error: Unregistered Action: ${this.id}`;
  }
  stop() {
    return false;
  }
  activeTick() {
    throw new Error('Error Tried to tick dummy active action.');
  }
}
class BasicSkillRecipe extends MasteryAction {
  constructor(namespace, data, game) {
    var _a, _b;
    super(namespace, data, game);
    this.baseExperience = data.baseExperience;
    this.level = data.level;
    this.abyssalLevel = (_a = data.abyssalLevel) !== null && _a !== void 0 ? _a : 0;
    this.baseAbyssalExperience = (_b = data.baseAbyssalExperience) !== null && _b !== void 0 ? _b : 0;
  }
  applyDataModification(data, game) {
    if (data.baseExperience !== undefined) this.baseExperience = data.baseExperience;
    if (data.level !== undefined) this.level = data.level;
    if (data.abyssalLevel !== undefined) this.abyssalLevel = data.abyssalLevel;
    if (data.baseAbyssalExperience !== undefined) this.baseAbyssalExperience = data.baseAbyssalExperience;
  }
}
BasicSkillRecipe.sortByLevels = (a, b) => {
  if (a.level === b.level) {
    return a.abyssalLevel - b.abyssalLevel;
  }
  return a.level - b.level;
};
class SingleProductRecipe extends BasicSkillRecipe {
  constructor(namespace, data, game) {
    super(namespace, data, game);
    try {
      this.product = game.items.getObjectSafe(data.productId);
    } catch (e) {
      throw new DataConstructionError(SingleProductRecipe.name, e, this.id);
    }
  }
  get name() {
    return this.product.name;
  }
  get media() {
    return this.product.media;
  }
  applyDataModification(data, game) {
    super.applyDataModification(data, game);
    try {
      if (data.productId !== undefined) this.product = game.items.getObjectSafe(data.productId);
    } catch (e) {
      throw new DataModificationError(SingleProductRecipe.name, e, this.id);
    }
  }
}
class SkillCategory extends RealmedObject {
  constructor(namespace, data, skill, game) {
    super(namespace, data, game);
    this.skill = skill;
    this._name = data.name;
    this._media = data.media;
  }
  get media() {
    return this.getMediaURL(this._media);
  }
  get name() {
    if (this.isModded) {
      return this._name;
    } else {
      return getLangString(`SKILL_CATEGORY_${this.skill.localID}_${this.localID}`);
    }
  }
}
class SkillSubcategory extends NamespacedObject {
  constructor(namespace, data) {
    super(namespace, data.id);
    this._name = data.name;
    if (data.nameLang !== undefined) this._nameLang = data.nameLang;
  }
  get name() {
    if (this._nameLang !== undefined) return getLangString(this._nameLang);
    return this._name;
  }
}
class GatheringSkillRenderQueue extends MasterySkillRenderQueue {
  constructor() {
    super(...arguments);
    this.progressBar = false;
  }
}
class FixedCosts {
  constructor(data, game) {
    try {
      if (data.currencies !== undefined) this.currencies = game.getCurrencyQuantities(data.currencies);
      if (data.gp) {
        if (!this.currencies) this.currencies = [];
        this.currencies.push({ currency: game.gp, quantity: data.gp });
      }
      if (data.sc) {
        if (!this.currencies) this.currencies = [];
        this.currencies.push({ currency: game.slayerCoins, quantity: data.sc });
      }
      if (data.items !== undefined) this.items = game.items.getQuantities(data.items);
    } catch (e) {
      throw new DataConstructionError(FixedCosts.name, e);
    }
  }
}
class Costs {
  constructor(game) {
    this.game = game;
    this._items = new Map();
    this._currencies = new Map();
    this._source = 'Unknown';
  }
  get isFree() {
    return this._currencies.size === 0 && this._items.size === 0;
  }
  addItemByID(itemID, quantity) {
    const item = this.game.items.getObjectByID(itemID);
    if (item === undefined) throw new Error(`Error adding item with id: ${itemID}, item is not registered.`);
    this.addItem(item, quantity);
  }
  addItem(item, quantity) {
    var _a;
    this._items.set(item, quantity + ((_a = this._items.get(item)) !== null && _a !== void 0 ? _a : 0));
  }
  addCurrency(currency, quantity) {
    var _a;
    this._currencies.set(
      currency,
      quantity + ((_a = this._currencies.get(currency)) !== null && _a !== void 0 ? _a : 0),
    );
  }
  addGP(amount) {
    this.addCurrency(this.game.gp, amount);
  }
  addSlayerCoins(amount) {
    this.addCurrency(this.game.slayerCoins, amount);
  }
  setSource(source) {
    this._source = source;
  }
  setSourceIfUnknown(source) {
    if (this._source === 'Unknown') this._source = source;
  }
  addItemsAndCurrency(costs, multiplier = 1) {
    var _a, _b;
    (_a = costs.currencies) === null || _a === void 0
      ? void 0
      : _a.forEach(({ currency, quantity }) => {
          this.addCurrency(currency, Math.floor(quantity * multiplier));
        });
    (_b = costs.items) === null || _b === void 0
      ? void 0
      : _b.forEach(({ item, quantity }) => {
          quantity = Math.max(Math.floor(quantity * multiplier), 1);
          this.addItem(item, quantity);
        });
  }
  getItemQuantityArray() {
    const costArray = [];
    this._items.forEach((quantity, item) => costArray.push({ item, quantity }));
    return costArray;
  }
  getCurrencyQuantityArray() {
    const currencies = [];
    this._currencies.forEach((quantity, currency) => currencies.push({ currency, quantity }));
    return currencies;
  }
  recordSkillCurrencyStats(skill, stat) {
    this._currencies.forEach((amount, currency) => {
      currency.stats.skill.add(skill, stat, amount);
    });
  }
  recordCurrencyStats(stat) {
    this._currencies.forEach((amount, currency) => {
      currency.stats.add(stat, amount);
    });
  }
  recordBulkItemStat(tracker, stat) {
    let statTotal = 0;
    this._items.forEach((qty) => {
      statTotal += qty;
    });
    tracker.add(stat, statTotal);
  }
  recordItemSkillCurrencyStat(skill, stat) {
    this._items.forEach((qty, item) => {
      item.sellsFor.currency.stats.skill.add(skill, stat, qty * item.sellsFor.quantity);
    });
  }
  recordIndividualItemStat(stat) {
    this._items.forEach((qty, item) => {
      this.game.stats.Items.add(item, stat, qty);
    });
  }
  reset() {
    this._currencies.clear();
    this._items.clear();
  }
  checkIfOwned() {
    let owned = true;
    this._currencies.forEach((qty, currency) => {
      owned && (owned = currency.canAfford(qty));
    });
    this._items.forEach((qty, item) => {
      owned && (owned = this.game.bank.getQty(item) >= qty);
    });
    return owned;
  }
  consumeCosts() {
    this._currencies.forEach((quantity, currency) => {
      currency.remove(quantity);
      if (currency === this.game.gp)
        this.game.telemetry.createGPAdjustedEvent(-quantity, currency.amount, this._source);
      if (currency === this.game.abyssalPieces)
        this.game.telemetry.createAPAdjustedEvent(-quantity, currency.amount, this._source);
    });
    this._items.forEach((quantity, item) => {
      if (quantity > 0) this.game.bank.removeItemQuantity(item, quantity, true);
    });
  }
  clone() {
    const clone = new Costs(this.game);
    clone.addCosts(this);
    return clone;
  }
  addCosts(costs) {
    costs._currencies.forEach((quantity, currency) => {
      this.addCurrency(currency, quantity);
    });
    costs._items.forEach((quantity, item) => {
      this.addItem(item, quantity);
    });
  }
}
class Rewards extends Costs {
  constructor() {
    super(...arguments);
    this.source = 'Game.Unknown';
    this.actionInterval = 0;
    this._xp = new Map();
    this._abyssalXP = new Map();
  }
  addXP(skill, amount, action) {
    Rewards.addToXPMap(this._xp, skill, amount, action);
  }
  getXP(skill, action) {
    return Rewards.getFromXPMap(this._xp, skill, action);
  }
  addAbyssalXP(skill, amount, action) {
    Rewards.addToXPMap(this._abyssalXP, skill, amount, action);
  }
  getAbyssalXP(skill, action) {
    return Rewards.getFromXPMap(this._abyssalXP, skill, action);
  }
  setActionInterval(interval) {
    this.actionInterval = interval;
  }
  giveRewards(ignoreBankSpace = false) {
    let notAllItemsGiven = false;
    this._items.forEach((quantity, item) => {
      notAllItemsGiven =
        !this.game.bank.addItem(item, quantity, true, true, ignoreBankSpace, true, this.source) || notAllItemsGiven;
    });
    this._currencies.forEach((quantity, currency) => {
      currency.add(quantity);
      if (currency === this.game.gp) this.game.telemetry.createGPAdjustedEvent(quantity, currency.amount, this.source);
      if (currency === this.game.abyssalPieces)
        this.game.telemetry.createAPAdjustedEvent(quantity, currency.amount, this.source);
    });
    this._xp.forEach((xp, skill) => {
      const xpBefore = skill.xp;
      const levelBefore = skill.level;
      if (xp.noAction > 0) skill.addXP(xp.noAction);
      xp.action.forEach((amount, action) => {
        skill.addXP(amount, action);
      });
      if (skill.xp > xpBefore) {
        this.game.telemetry.createOnlineXPGainEvent(
          skill,
          this.actionInterval,
          xpBefore,
          skill.xp,
          levelBefore,
          skill.level,
        );
      }
    });
    this._abyssalXP.forEach((xp, skill) => {
      const xpBefore = skill.abyssalXP;
      const levelBefore = skill.abyssalLevel;
      if (xp.noAction > 0) skill.addAbyssalXP(xp.noAction);
      xp.action.forEach((amount, action) => {
        skill.addAbyssalXP(amount, action);
      });
      if (skill.abyssalXP > xpBefore) {
        this.game.telemetry.createOnlineAXPGainEvent(
          skill,
          this.actionInterval,
          xpBefore,
          skill.abyssalXP,
          levelBefore,
          skill.abyssalLevel,
        );
      }
    });
    return notAllItemsGiven;
  }
  forceGiveRewards() {
    return this.giveRewards(true);
  }
  reset() {
    super.reset();
    this._xp.clear();
  }
  setSource(source) {
    this.source = source;
  }
  static addToXPMap(xpMap, skill, amount, action) {
    var _a;
    let xp = xpMap.get(skill);
    if (xp === undefined) {
      xp = { noAction: 0, action: new Map() };
      xpMap.set(skill, xp);
    }
    if (action === undefined) {
      xp.noAction += amount;
    } else {
      xp.action.set(action, amount + ((_a = xp.action.get(action)) !== null && _a !== void 0 ? _a : 0));
    }
  }
  static getFromXPMap(xpMap, skill, action) {
    var _a;
    const xp = xpMap.get(skill);
    if (xp === undefined) return 0;
    if (action === undefined) {
      return xp.noAction;
    } else {
      return (_a = xp.action.get(action)) !== null && _a !== void 0 ? _a : 0;
    }
  }
}
checkFileVersion('?11766');
