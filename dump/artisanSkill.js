'use strict';
class ArtisanSkill extends CraftingSkill {
  get actionXP() {
    return this.activeRecipe.baseExperience;
  }
  get actionAbyssalXP() {
    return this.activeRecipe.baseAbyssalExperience;
  }
  get actionInterval() {
    return this.modifyInterval(this.baseInterval, this.masteryAction);
  }
  get actionLevel() {
    return this.activeRecipe.level;
  }
  get actionAbyssalLevel() {
    return this.activeRecipe.abyssalLevel;
  }
  get masteryAction() {
    return this.activeRecipe;
  }
  createButtonOnClick() {
    if (this.isActive) {
      this.stop();
    } else if (this.selectedRecipe !== undefined) {
      if (this.getCurrentRecipeCosts().checkIfOwned()) {
        this.start();
      } else {
        notifyPlayer(this, this.noCostsMessage, 'danger');
      }
    }
  }
  selectRecipeOnClick(recipe) {
    if (recipe !== this.selectedRecipe && this.isActive && !this.stop()) return;
    this.selectedRecipe = recipe;
    this.renderQueue.selectedRecipe = true;
    this.render();
    if (isOnMobileLayout) {
      try {
        const element = document.getElementById(`${this.localID.toLowerCase()}-category-container`);
        window.scrollTo({ top: element.offsetTop + 300, behavior: 'smooth' });
      } catch (e) {
        console.warn('Could not scroll to element. Error: ' + e);
      }
    }
  }
  onLoad() {
    super.onLoad();
    this.menu.setCreateCallback(() => this.createButtonOnClick());
    if (this.selectionTabs.size > 0) {
      const [firstTab] = this.selectionTabs.values();
      showElement(firstTab);
    }
    this.renderQueue.selectionTabs = true;
    this.renderQueue.selectedRecipe = true;
    if (this.isActive) {
      this.renderQueue.progressBar = true;
    }
    this.render();
  }
  onAncientRelicUnlock() {
    super.onAncientRelicUnlock();
    this.renderQueue.selectedRecipe = true;
  }
  queueBankQuantityRender(item) {
    this.renderQueue.quantities = true;
    this.renderQueue.selectedRecipe = true;
  }
  onModifierChange() {
    super.onModifierChange();
    this.renderQueue.selectionTabs = true;
    this.renderQueue.selectedRecipe = true;
  }
  onEquipmentChange() {}
  onAnyLevelUp() {
    super.onAnyLevelUp();
    this.renderQueue.selectionTabs = true;
  }
  getErrorLog() {
    var _a;
    return `${super.getErrorLog()}
Selected Recipe ID: ${(_a = this.selectedRecipe) === null || _a === void 0 ? void 0 : _a.id}`;
  }
  render() {
    this.renderSelectedRecipe();
    super.render();
    this.renderQuantities();
    this.renderRecipeInfo();
    this.renderProgressBar();
    this.renderSelectionTabs();
  }
  renderRealmVisibility() {
    if (this.renderQueue.realmVisibility.size === 0) return;
    this.renderQueue.realmVisibility.forEach((realm) => {
      var _a;
      (_a = this.realmSelect) === null || _a === void 0 ? void 0 : _a.updateRealmVisibility(realm);
      if (spendMasteryMenu.curentSkill === this) spendMasteryMenu.updateRealmUnlock(realm);
      this.categoryMenu.updateRealmUnlock(realm);
    });
    this.renderQueue.realmVisibility.clear();
  }
  getRecipeCosts(recipe) {
    const costs = new Costs(this.game);
    costs.setSource(`Skill.${this.id}.Recipe.${recipe.id}`);
    recipe.itemCosts.forEach(({ item, quantity }) => {
      quantity = this.modifyItemCost(item, quantity, recipe);
      if (quantity > 0) costs.addItem(item, quantity);
    });
    recipe.currencyCosts.forEach(({ currency, quantity }) => {
      quantity = this.modifyCurrencyCost(currency, quantity, recipe);
      if (quantity > 0) costs.addCurrency(currency, quantity);
    });
    return costs;
  }
  getCurrentRecipeCosts() {
    return this.getRecipeCosts(this.activeRecipe);
  }
  renderQuantities() {
    if (!this.renderQueue.quantities) return;
    this.menu.updateQuantities(this.game);
    this.renderQueue.quantities = false;
  }
  renderSelectedRecipe() {
    if (!this.renderQueue.selectedRecipe) return;
    if (this.selectedRecipe !== undefined) {
      const item = this.actionItem;
      const quantity = this.getMinimumPrimaryProductBaseQuantity(
        item,
        this.unmodifiedActionQuantity,
        this.getActionModifierQuery(this.selectedRecipe),
      );
      this.menu.setProduct(item, quantity);
      this.menu.setSelected(this, this.selectedRecipe);
      const costs = this.getCurrentRecipeCosts();
      this.menu.setIngredients(costs.getItemQuantityArray(), costs.getCurrencyQuantityArray(), this.game);
      this.renderQueue.recipeInfo = true;
      this.renderQueue.actionMastery.add(this.masteryAction);
    }
    this.renderQueue.selectedRecipe = false;
  }
  renderRecipeInfo() {
    if (!this.renderQueue.recipeInfo) return;
    const recipe = this.masteryAction;
    const masteryXPToAdd = this.getMasteryXPToAddForAction(recipe, this.masteryModifiedInterval);
    const baseMasteryXP = this.getBaseMasteryXPToAddForAction(recipe, this.masteryModifiedInterval);
    this.menu.updateGrants(
      this.modifyXP(this.actionXP),
      this.actionXP,
      masteryXPToAdd,
      baseMasteryXP,
      this.getMasteryXPToAddToPool(masteryXPToAdd),
      this.activeRecipe.realm,
    );
    this.menu.updateGrantsSources(this, recipe);
    this.menu.updateChances(
      this.getPreservationChance(recipe),
      this.getPreservationCap(recipe),
      this.getPreservationSources(recipe),
      this.getDoublingChance(recipe),
      this.getDoublingSources(recipe),
    );
    const query = this.getActionModifierQuery(recipe);
    this.menu.updateAdditionalPrimaryQuantity(
      this.getFlatAdditionalPrimaryProductQuantity(this.actionItem, query),
      this.getAdditionalPrimaryResourceQuantitySources(query),
    );
    this.menu.updateCostReduction(this.getCostReduction(recipe), this.getCostReductionSources(recipe));
    this.menu.updateInterval(this.actionInterval, this.getIntervalSources(recipe));
    this.menu.updateAbyssalGrants(this.modifyAbyssalXP(this.actionAbyssalXP), this.actionAbyssalXP);
    this.renderQueue.recipeInfo = false;
  }
  renderProgressBar() {
    if (!this.renderQueue.progressBar) return;
    if (this.isActive) {
      this.menu.animateProgressFromTimer(this.actionTimer);
    } else {
      this.menu.stopProgressBar();
    }
    this.renderQueue.progressBar = false;
  }
  renderSelectionTabs() {
    if (!this.renderQueue.selectionTabs) return;
    this.selectionTabs.forEach((tab) => {
      tab.updateRecipes(this);
    });
    this.renderQueue.selectionTabs = false;
  }
  getBestMasteryRealm() {
    if (this.selectedRecipe !== undefined) return this.selectedRecipe.realm;
    return super.getBestMasteryRealm();
  }
  encode(writer) {
    super.encode(writer);
    writer.writeBoolean(this.selectedRecipe !== undefined);
    if (this.selectedRecipe !== undefined) writer.writeNamespacedObject(this.selectedRecipe);
    return writer;
  }
  decode(reader, version) {
    super.decode(reader, version);
    if (reader.getBoolean()) {
      const recipe = reader.getNamespacedObject(this.actions);
      if (typeof recipe === 'string') this.shouldResetAction = true;
      else this.selectedRecipe = recipe;
    }
    if (this.shouldResetAction) this.resetActionState();
  }
  deserialize(reader, version, idMap) {
    super.deserialize(reader.getVariableLengthChunk(), version, idMap);
    this.selectedRecipe = this.actions.getObjectByID(this.getActionIDFromOldID(reader.getNumber(), idMap));
    if (this.isActive && this.selectedRecipe === undefined) this.shouldResetAction = true;
    if (this.shouldResetAction) this.resetActionState();
  }
}
class ArtisanSkillRenderQueue extends GatheringSkillRenderQueue {
  constructor() {
    super(...arguments);
    this.quantities = false;
    this.recipeInfo = false;
    this.selectedRecipe = false;
    this.selectionTabs = false;
  }
}
class ArtisanSkillRecipe extends BasicSkillRecipe {
  constructor(namespace, data, game) {
    super(namespace, data, game);
    this.currencyCosts = [];
    try {
      this.itemCosts = game.items.getQuantities(data.itemCosts);
      if (data.currencyCosts) this.currencyCosts = game.getCurrencyQuantities(data.currencyCosts);
      if (data.gpCost) this.currencyCosts.push({ currency: game.gp, quantity: data.gpCost });
      if (data.scCost) this.currencyCosts.push({ currency: game.slayerCoins, quantity: data.scCost });
    } catch (e) {
      throw new DataConstructionError(ArtisanSkillRecipe.name, e, this.id);
    }
  }
  applyDataModification(data, game) {
    super.applyDataModification(data, game);
    try {
      if (data.itemCosts !== undefined) {
        this.itemCosts = game.items.modifyQuantities(this.itemCosts, data.itemCosts);
      }
      if (data.currencyCosts !== undefined) {
        this.currencyCosts = game.modifyCurrencyQuantities(this.currencyCosts, data.currencyCosts);
      }
    } catch (e) {
      throw new DataModificationError(ArtisanSkillRecipe.name, e, this.id);
    }
  }
}
class CategorizedArtisanRecipe extends ArtisanSkillRecipe {
  constructor(namespace, data, game, skill) {
    super(namespace, data, game);
    this.skill = skill;
    try {
      this.category = skill.categories.getObjectSafe(data.categoryID);
    } catch (e) {
      throw new DataConstructionError(CategorizedArtisanRecipe.name, e, this.id);
    }
  }
  applyDataModification(data, game) {
    super.applyDataModification(data, game);
    try {
      if (data.categoryID !== undefined) this.category = this.skill.categories.getObjectSafe(data.categoryID);
    } catch (e) {
      throw new DataModificationError(CategorizedArtisanRecipe.name, e, this.id);
    }
  }
}
class SingleProductArtisanSkillRecipe extends CategorizedArtisanRecipe {
  constructor(namespace, data, game, skill) {
    super(namespace, data, game, skill);
    try {
      this.product = game.items.getObjectSafe(data.productID);
      this.baseQuantity = data.baseQuantity;
    } catch (e) {
      throw new DataConstructionError(SingleProductArtisanSkillRecipe.name, e, this.id);
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
      if (data.productID !== undefined) this.product = game.items.getObjectSafe(data.productID);
      if (data.baseQuantity !== undefined) this.baseQuantity = data.baseQuantity;
    } catch (e) {
      throw new DataModificationError(SingleProductArtisanSkillRecipe.name, e, this.id);
    }
  }
}
checkFileVersion('?11766');
