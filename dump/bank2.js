'use strict';
class ItemUpgrade {
  constructor(data, game) {
    var _a;
    this.currencyCosts = [];
    try {
      this.itemCosts = game.items.getQuantities(data.itemCosts);
      if (data.currencyCosts) this.currencyCosts = game.getCurrencyQuantities(data.currencyCosts);
      if (data.gpCost) this.currencyCosts.push({ currency: game.gp, quantity: data.gpCost });
      if (data.scCost) this.currencyCosts.push({ currency: game.slayerCoins, quantity: data.scCost });
      this.rootItems = data.rootItemIDs.map((itemID) => {
        const item = game.items.getObjectSafe(itemID);
        if (
          !this.itemCosts.some((cost) => {
            return item === cost.item;
          })
        )
          throw new Error(`Error constructing item upgrade, ${item.id} is set as root item, but is not a cost`);
        return item;
      });
      const upgradedItem = game.items.getObjectSafe(data.upgradedItemID);
      this.upgradedItem = upgradedItem;
      this.isDowngrade = data.isDowngrade;
      this.upgradedQuantity = (_a = data.quantity) !== null && _a !== void 0 ? _a : 1;
    } catch (e) {
      throw new DataConstructionError(ItemUpgrade.name, e);
    }
  }
  applyDataModification(modData, game) {
    if (modData.itemCosts !== undefined) {
      if (modData.itemCosts.remove !== undefined) {
        modData.itemCosts.remove.forEach((itemID) => {
          const item = game.items.getObjectSafe(itemID);
          this.itemCosts = this.itemCosts.filter((cost) => cost.item !== item);
        });
      }
      if (modData.itemCosts.add !== undefined) {
        modData.itemCosts.add.forEach((itemData) => {
          const item = game.items.getObjectSafe(itemData.id);
          if (
            !this.itemCosts.some((cost) => {
              return item === cost.item;
            })
          )
            this.itemCosts.push({ item, quantity: itemData.quantity });
        });
      }
    }
    if (modData.currencyCosts !== undefined) {
      if (modData.currencyCosts.remove !== undefined) {
        modData.currencyCosts.remove.forEach((currencyID) => {
          const currency = game.currencies.getObjectSafe(currencyID);
          this.currencyCosts = this.currencyCosts.filter((cost) => cost.currency !== currency);
        });
      }
      if (modData.currencyCosts.add !== undefined) {
        modData.currencyCosts.add.forEach((currencyData) => {
          const currency = game.currencies.getObjectSafe(currencyData.id);
          if (
            !this.currencyCosts.some((cost) => {
              return currency === cost.currency;
            })
          )
            this.currencyCosts.push({ currency, quantity: currencyData.quantity });
        });
        this.currencyCosts.push(...game.getCurrencyQuantities(modData.currencyCosts.add));
      }
    }
    if (modData.rootItemIDs !== undefined) {
      if (modData.rootItemIDs.remove !== undefined) {
        modData.rootItemIDs.remove.forEach((itemID) => {
          const item = game.items.getObjectSafe(itemID);
          this.rootItems = this.rootItems.filter((rootItem) => rootItem !== item);
        });
      }
      if (modData.rootItemIDs.add !== undefined) {
        modData.rootItemIDs.add.forEach((itemID) => {
          const item = game.items.getObjectSafe(itemID);
          if (
            !this.itemCosts.some((cost) => {
              return item === cost.item;
            })
          )
            throw new Error(`Error constructing item upgrade, ${item.id} is set as root item, but is not a cost`);
          if (!this.rootItems.includes(item)) this.rootItems.push(item);
        });
      }
    }
  }
}
class BankRenderQueue {
  constructor() {
    this.items = new Set();
    this.tabIcons = new Set();
    this.bankSearch = false;
    this.bankValue = false;
    this.space = false;
  }
}
class ItemFoundEvent extends GameEvent {
  constructor(item) {
    super();
    this.item = item;
  }
}
class ItemQuantityChangedEvent extends GameEvent {
  constructor(item, oldQuantity, newQuantity) {
    super();
    this.item = item;
    this.oldQuantity = oldQuantity;
    this.newQuantity = newQuantity;
  }
}
class Bank extends GameEventEmitter {
  constructor(game, initialTabs = 12, baseSlots = 20) {
    super();
    this.game = game;
    this.baseSlots = baseSlots;
    this.renderQueue = new BankRenderQueue();
    this.lockedItems = new Set();
    this.lostItems = new Map();
    this.newItemsAdded = false;
    this.items = new Map();
    this.itemsByTab = [];
    this.defaultItemTabs = new Map();
    this.customSortOrder = [];
    this.glowingItems = new Set();
    this.tabIcons = new Map();
    this.itemSelectionMode = 0;
    this.selectedItems = new Set();
    this.selectedBankItem = undefined;
    this.itemUpgrades = new Map();
    this.selectedBankTab = 0;
    this.nextOpenedItems = new Map();
    this.searchArray = [];
    this.currentSearchQuery = '';
    this.eightDelay = false;
    this.postLoadItems = new Map();
    for (let i = 0; i < initialTabs; i++) {
      this.itemsByTab.push([]);
    }
    this.defaultSortOrder = new NamespacedArray(this.game.items);
  }
  get slotsSelected() {
    return this.selectedItems.size;
  }
  get unlockedItemArray() {
    return this.filterItems((bankItem) => !bankItem.locked);
  }
  get tabCount() {
    return this.itemsByTab.length;
  }
  get emitItemEvents() {
    return true;
  }
  registerSortOrder(order) {
    this.defaultSortOrder.registerData(order);
  }
  encode(writer) {
    writer.writeSet(this.lockedItems, writeNamespaced);
    writer.writeArray(this.itemsByTab, (bankItems, writer) => {
      writer.writeArray(bankItems, (bankItem, writer) => {
        writer.writeNamespacedObject(bankItem.item);
        writer.writeUint32(bankItem.quantity);
      });
    });
    writer.writeMap(this.defaultItemTabs, writeNamespaced, (tabID, writer) => writer.writeUint8(tabID));
    writer.writeArray(this.customSortOrder, writeNamespaced);
    writer.writeSet(this.glowingItems, writeNamespaced);
    writer.writeMap(this.tabIcons, (tabID) => writer.writeUint8(tabID), writeNamespaced);
    return writer;
  }
  decode(reader, version) {
    const getItem = (reader) => {
      const item = reader.getNamespacedObject(this.game.items);
      if (typeof item === 'string') {
        if (item.startsWith('melvor')) return this.game.items.getDummyObject(item, DummyItem, this.game);
        else return undefined;
      }
      return item;
    };
    this.lockedItems = reader.getSet(getItem);
    this.itemsByTab = reader.getArray((reader) => {
      return reader.getArray((reader) => {
        const item = getItem(reader);
        const quantity = reader.getUint32();
        if (item === undefined) return undefined;
        return new BankItem(this, item, quantity, 0, 0);
      });
    });
    this.defaultItemTabs = reader.getMap(getItem, (reader) => reader.getUint8());
    this.customSortOrder = reader.getArray(getItem);
    this.glowingItems = reader.getSet(getItem);
    this.tabIcons = reader.getMap((reader) => reader.getUint8(), readNamespacedReject(this.game.items));
    this.itemsByTab.forEach((bankItems, tabID) => {
      bankItems.forEach((bankItem, tabPosition) => {
        bankItem.tab = tabID;
        bankItem.tabPosition = tabPosition;
        this.items.set(bankItem.item, bankItem);
      });
    });
  }
  convertFromOldFormat(save, idMap) {
    var _a, _b;
    const getItem = (oldID) => {
      const newID = idMap.items[oldID];
      let item = this.game.items.getObjectByID(newID);
      if (newID === undefined) return undefined;
      if (item === undefined) item = this.game.items.getDummyObject(newID, DummyItem, this.game);
      return item;
    };
    if (save.itemsAlreadyFound !== undefined) {
      save.itemsAlreadyFound.forEach((itemID) => {
        const item = getItem(itemID);
        if (item !== undefined) this.glowingItems.add(item);
      });
    }
    if (save.lockedItems !== undefined) {
      save.lockedItems.forEach((itemID) => {
        const item = getItem(itemID);
        if (item !== undefined) this.lockedItems.add(item);
      });
    }
    if (save.bank !== undefined) {
      save.bank.forEach((oldBankItem) => {
        const item = getItem(oldBankItem.id);
        if (item === undefined) return;
        const tabID = clampValue(oldBankItem.tab, 0, this.tabCount - 1);
        const bankItem = new BankItem(this, item, oldBankItem.qty, tabID, 0);
        this.itemsByTab[tabID].push(bankItem);
        this.items.set(item, bankItem);
      });
    }
    if (save.bankTabIcons !== undefined) {
      save.bankTabIcons.forEach((itemID, tabID) => {
        if (tabID >= 0 && tabID < this.tabCount && itemID !== -1) {
          const item = this.game.items.getObjectByID(idMap.items[itemID]);
          if (item !== undefined) this.tabIcons.set(tabID, item);
        }
      });
    }
    if (
      ((_b = (_a = save.SETTINGS) === null || _a === void 0 ? void 0 : _a.bank) === null || _b === void 0
        ? void 0
        : _b.defaultItemTab) !== undefined
    ) {
      save.SETTINGS.bank.defaultItemTab.forEach(({ itemID, tab }) => {
        const item = getItem(itemID);
        const tabID = clampValue(tab, 0, this.tabCount - 1);
        if (item !== undefined) this.defaultItemTabs.set(item, tabID);
      });
    }
    this.itemsByTab.forEach((tabItems) => {
      tabItems.forEach((bankItem, tabPosition) => (bankItem.tabPosition = tabPosition));
    });
  }
  addItemOnLoad(item, quantity) {
    var _a;
    this.postLoadItems.set(item, ((_a = this.postLoadItems.get(item)) !== null && _a !== void 0 ? _a : 0) + quantity);
  }
  addDummyItemOnLoad(itemID, quantity) {
    const item = this.game.items.getDummyObject(itemID, DummyItem, this.game);
    this.addItemOnLoad(item, quantity);
  }
  onLoad() {
    this.postLoadItems.forEach((quantity, item) => {
      this.addItem(item, quantity, false, false, true);
    });
    if (this.game.settings.bankSortOrder === 5 && this.customSortOrder.length === 0) this.storeCustomSortOrder();
    bankTabMenu.loadTabs(this);
    bankTabMenu.loadAllItems(this);
    for (let i = 0; i < this.tabCount; i++) {
      this.renderQueue.tabIcons.add(i);
    }
    this.renderQueue.space = true;
    this.renderQueue.bankValue = true;
    this.updateSearchArray();
  }
  renderModifierChange() {
    this.onModifierChange();
  }
  onModifierChange() {
    this.renderQueue.bankValue = true;
    this.renderQueue.space = true;
  }
  onEquipmentChange() {
    if (this.selectedBankItem !== undefined && this.selectedBankItem.item instanceof EquipmentItem) {
      bankSideBarMenu.updateEquipItem(this.selectedBankItem.item, this.game);
    }
  }
  isItemInPosition(item, tab, tabPosition) {
    const bankItem = this.itemsByTab[tab][tabPosition];
    return (bankItem === null || bankItem === void 0 ? void 0 : bankItem.item) === item;
  }
  registerItemUpgrades(data) {
    data.forEach((datum) => {
      const upgrade = new ItemUpgrade(datum, this.game);
      upgrade.rootItems.forEach((item) => {
        let upgradeArray = this.itemUpgrades.get(item);
        if (upgradeArray === undefined) {
          upgradeArray = [];
          this.itemUpgrades.set(item, upgradeArray);
        }
        upgradeArray.push(upgrade);
      });
    });
  }
  modifyItemUpgrades(modData) {
    modData.forEach((datum) => {
      const item = this.game.items.getObjectSafe(datum.id);
      this.itemUpgrades.forEach((itemUpgrade) => {
        itemUpgrade.forEach((upgrade) => {
          if (upgrade.upgradedItem === item) {
            upgrade.applyDataModification(datum, this.game);
          }
        });
      });
    });
  }
  isItemSelected(item) {
    var _a;
    return ((_a = this.selectedBankItem) === null || _a === void 0 ? void 0 : _a.item) === item;
  }
  hasItem(item) {
    return this.items.has(item);
  }
  hasUnlockedItem(item) {
    return this.hasItem(item) && !this.lockedItems.has(item);
  }
  getTabMedia(tabID) {
    const customItem = this.tabIcons.get(tabID);
    if (customItem !== undefined) return customItem.media;
    const firstItemInTab = this.itemsByTab[tabID][0];
    if (firstItemInTab === undefined) return assets.getURI('assets/media/skills/combat/food_empty.png');
    return firstItemInTab.item.media;
  }
  render() {
    if (this.renderQueue.items.size > 0) {
      let renderRunes = false;
      if (this.newItemsAdded) {
        this.newItemsAdded = false;
      }
      this.renderQueue.items.forEach((item) => {
        var _a, _b, _c;
        const existingIcon = bankTabMenu.itemIcons.get(item);
        const bankItem = this.items.get(item);
        renderRunes || (renderRunes = item.type === 'Rune');
        if (existingIcon !== undefined && bankItem !== undefined) {
          existingIcon.updateQuantity(bankItem, this.game.settings.enableAccessibility);
          if (((_a = this.selectedBankItem) === null || _a === void 0 ? void 0 : _a.item) === item) {
            bankSideBarMenu.updateItemQuantity(bankItem);
          }
        } else if (existingIcon === undefined && bankItem !== undefined) {
          bankTabMenu.addItemToEndofTab(this, bankItem);
        } else if (existingIcon !== undefined && bankItem === undefined) {
          bankTabMenu.removeItemFromTab(item);
          if (((_b = this.selectedBankItem) === null || _b === void 0 ? void 0 : _b.item) === item) {
            this.deselectBankItem();
          }
        }
        if (item instanceof MasteryTokenItem) {
          spendMasteryMenu.updateTokenQuantity(
            item,
            (_c = bankItem === null || bankItem === void 0 ? void 0 : bankItem.quantity) !== null && _c !== void 0
              ? _c
              : 0,
          );
        }
      });
      this.renderQueue.bankValue = true;
      this.renderQueue.space = true;
      if (renderRunes) combatMenus.runes.updateCounts(this);
      this.renderQueue.items.clear();
    }
    if (this.renderQueue.bankSearch) {
      this.updateSearchArray();
      if (this.currentSearchQuery !== '') this.onBankSearchChange(this.currentSearchQuery);
      this.renderQueue.bankSearch = false;
    }
    if (this.renderQueue.tabIcons.size > 0) {
      this.renderQueue.tabIcons.forEach((tabID) => {
        bankTabMenu.setTabImage(tabID, this.getTabMedia(tabID));
      });
      this.renderQueue.tabIcons.clear();
    }
    if (this.renderQueue.bankValue) {
      bankTabMenu.updateBankValue(this);
      this.renderQueue.bankValue = false;
    }
    if (this.renderQueue.space) {
      document.querySelectorAll('.bank-space-nav').forEach((element) => this.updateSpaceElement(element));
      bankTabMenu.updateBankSpace(this);
      this.renderQueue.space = false;
    }
  }
  updateSpaceElement(element) {
    element.textContent = `${numberWithCommas(this.occupiedSlots)} / ${numberWithCommas(this.maximumSlots)}`;
    if (this.occupiedSlots >= this.maximumSlots) {
      element.classList.add('text-danger');
    } else {
      element.classList.remove('text-danger');
    }
  }
  queueQuantityUpdates(item) {
    var _a, _b;
    if (
      ((_b = (_a = this.game.openPage) === null || _a === void 0 ? void 0 : _a.action) === null || _b === void 0
        ? void 0
        : _b.queueBankQuantityRender) !== undefined
    )
      this.game.openPage.action.queueBankQuantityRender(item);
    this.game.shop.renderQueue.costs = true;
    this.game.summoning.renderQueue.synergyQuantities = true;
  }
  getItemDefaultTab(item) {
    var _a;
    return (_a = this.defaultItemTabs.get(item)) !== null && _a !== void 0 ? _a : 0;
  }
  getItemSalePrice(item, quantity = 1) {
    const currency = item.sellsFor.currency;
    let salePrice = item.sellsFor.quantity * quantity;
    let priceModifier = this.game.modifiers.getValue('melvorD:itemSaleCurrencyGain', currency.modQuery);
    if (item.type === 'Logs') {
      priceModifier += this.game.modifiers.getValue('melvorD:currencyGainFromLogSales', currency.modQuery);
    }
    if (item.type === 'Raw Fish')
      priceModifier += this.game.modifiers.getValue('melvorD:currencyGainFromRawFishSales', currency.modQuery);
    salePrice *= 1 + priceModifier / 100;
    return Math.max(Math.floor(salePrice), 0);
  }
  getTabValue(tabID) {
    const value = new SparseNumericMap();
    this.itemsByTab[tabID].forEach(({ item, quantity }) => {
      value.add(item.sellsFor.currency, this.getItemSalePrice(item, quantity));
    });
    return value;
  }
  getBankValue() {
    const value = new SparseNumericMap();
    for (let i = 0; i < this.itemsByTab.length; i++) {
      const tabValue = this.getTabValue(i);
      tabValue.forEach((quantity, currency) => {
        value.add(currency, quantity);
      });
    }
    return value;
  }
  getSnapShot() {
    const snapShot = new Map();
    this.items.forEach(({ quantity }, item) => {
      snapShot.set(item, quantity);
    });
    return snapShot;
  }
  getHistory() {
    const history = [];
    this.itemsByTab.forEach((tabArray) => {
      tabArray.forEach(({ item, quantity }) => {
        history.push({ item, quantity });
      });
    });
    return history;
  }
  addQuantityToExistingItems(quantity) {
    if (quantity <= 0) return;
    this.itemsByTab.forEach((tabArray) => {
      tabArray.forEach((bankItem) => {
        this.addItem(bankItem.item, quantity, false, false, false, false);
      });
    });
  }
  empty() {
    const tabCount = this.tabCount;
    this.itemsByTab = [];
    for (let i = 0; i < tabCount; i++) {
      this.itemsByTab.push([]);
    }
    this.items.clear();
  }
  addTabs(quantity) {
    if (this.tabCount === Bank.MAXIMUM_TABS) {
      console.warn(`Bank cannot have more than ${Bank.MAXIMUM_TABS} tabs.`);
      return;
    }
    for (let i = 0; i < quantity; i++) {
      if (this.tabCount === Bank.MAXIMUM_TABS) {
        console.warn(`Maximum of ${Bank.MAXIMUM_TABS} Bank Tabs reached.`);
        break;
      }
      this.itemsByTab.push([]);
    }
    bankTabMenu.updateTabCount(this);
  }
  moveItemInTab(tabID, oldTabPosition, newTabPosition) {
    const tab = this.itemsByTab[tabID];
    const item = tab.splice(oldTabPosition, 1);
    tab.splice(newTabPosition, 0, ...item);
    const lowestPosition = Math.min(oldTabPosition, newTabPosition);
    this.reassignBankItemPositions(tabID, lowestPosition);
    if (oldTabPosition === 0 || newTabPosition === 0) this.renderQueue.tabIcons.add(tabID);
    if (tabID === 0) this.checkForClueChasers();
    this.storeCustomSortOrder();
  }
  moveItemToNewTab(oldTabID, newTabID, oldTabPosition) {
    const oldTab = this.itemsByTab[oldTabID];
    const item = oldTab.splice(oldTabPosition, 1);
    this.reassignBankItemPositions(oldTabID, oldTabPosition);
    const newTab = this.itemsByTab[newTabID];
    item[0].tab = newTabID;
    item[0].tabPosition = newTab.length;
    if (newTab.length === 0) this.renderQueue.tabIcons.add(newTabID);
    if (oldTabPosition === 0) this.renderQueue.tabIcons.add(oldTabID);
    newTab.push(...item);
    this.defaultItemTabs.set(item[0].item, newTabID);
    this.storeCustomSortOrder();
    this.renderQueue.bankValue = true;
  }
  checkForClueChasers() {
    const clueChasers = this.game.items.getObjectByID('melvorD:Clue_Chasers_Insignia');
    if (clueChasers === undefined || this.hasItem(clueChasers)) return;
    const condition = [
      'melvorD:Maple_Logs',
      'melvorD:Redwood_Logs',
      'melvorD:Raw_Swordfish',
      'melvorD:Raw_Crab',
      'melvorD:Herring',
      'melvorD:Burnt_Cave_Fish',
    ];
    if (
      condition.every((id, i) => {
        const bankItem = this.itemsByTab[0][i];
        return bankItem !== undefined && bankItem.item.id === id;
      })
    ) {
      this.addItem(clueChasers, 1, false, true);
    }
  }
  get maximumSlots() {
    return this.baseSlots + this.game.modifiers.bankSpace;
  }
  get occupiedSlots() {
    return this.items.size;
  }
  addItemByID(itemID, quantity, logLost, found, ignoreSpace = false, notify = true, itemSource = 'Game.Unknown') {
    const item = this.game.items.getObjectByID(itemID);
    if (item === undefined)
      throw new Error(`Error adding item to bank by id. Item with id: ${itemID} is not registered.`);
    this.addItem(item, quantity, logLost, found, ignoreSpace, notify, itemSource);
  }
  addItem(item, quantity, logLost, found, ignoreSpace = false, notify = true, itemSource = 'Game.Unknown') {
    var _a, _b;
    if (quantity <= 0) throw new Error(`Tried to add negative or zero quantity to bank.`);
    let success = false;
    let bankItem = this.items.get(item);
    let oldQuantity = 0;
    let newQuantity = quantity;
    if (bankItem !== undefined) {
      oldQuantity = bankItem.quantity;
      bankItem.quantity += quantity;
      newQuantity = bankItem.quantity;
      success = true;
    } else if (this.occupiedSlots < this.maximumSlots || ignoreSpace) {
      const tab = this.getItemDefaultTab(item);
      bankItem = new BankItem(this, item, quantity, tab, this.itemsByTab[tab].length);
      this.items.set(item, bankItem);
      this.itemsByTab[tab].push(bankItem);
      if (this.game.settings.bankSortOrder === 5 && !this.customSortOrder.includes(item)) this.storeCustomSortOrder();
      success = true;
      this.renderQueue.bankSearch = true;
      this.newItemsAdded = true;
      if (bankItem.tabPosition === 0) this.renderQueue.tabIcons.add(tab);
    }
    if (success) {
      if (found) {
        const newItem = this.game.stats.itemFindCount(item) === 0;
        this.game.stats.Items.add(item, ItemStats.TimesFound, quantity);
        if (newItem) {
          const event = new ItemFoundEvent(item);
          this._events.emit('itemFound', event);
          if (this.emitItemEvents) item.emit('found', event);
          this.game.completion.updateItem(item);
          this.glowingItems.add(item);
          if (item instanceof EquipmentItem) this.game.minibar.addItemOnDiscovery(item);
          this.game.renderQueue.birthdayEventProgress = true;
        }
      }
      if (!loadingOfflineProgress) this.game.telemetry.createItemGainedEvent(item, quantity, itemSource);
      this.renderQueue.items.add(item);
      (_a = this.game.archaeology) === null || _a === void 0 ? void 0 : _a.renderQueue.museumArtefacts.add(item);
      this.queueQuantityUpdates(item);
      if (notify) this.game.combat.notifications.add({ type: 'Item', args: [item, quantity] });
      const event = new ItemQuantityChangedEvent(item, oldQuantity, newQuantity);
      this._events.emit('itemChanged', event);
      if (this.emitItemEvents) item.emit('bankQuantityChanged', event);
    } else {
      if (notify) this.game.combat.notifications.add({ type: 'BankFull', args: [] });
      if (logLost) {
        this.lostItems.set(item, ((_b = this.lostItems.get(item)) !== null && _b !== void 0 ? _b : 0) + quantity);
      }
    }
    return success;
  }
  removeItemQuantity(item, quantity, removeItemCharges) {
    var _a;
    if (quantity <= 0) throw new Error(`Tried to remove negative or zero quantity from bank.`);
    const bankItem = this.items.get(item);
    if (bankItem === undefined) throw new Error(`Tried to remove quantity from bank, but item is not in bank.`);
    const oldQuantity = bankItem.quantity;
    bankItem.quantity -= quantity;
    let newQuantity = bankItem.quantity;
    if (bankItem.quantity <= 0) {
      newQuantity = 0;
      this.items.delete(item);
      const bankTab = this.itemsByTab[bankItem.tab];
      bankTab.splice(bankItem.tabPosition, 1);
      this.reassignBankItemPositions(bankItem.tab, bankItem.tabPosition);
      if (removeItemCharges && item instanceof EquipmentItem) {
        this.game.itemCharges.removeAllCharges(item);
      }
      this.renderQueue.bankSearch = true;
      if (bankItem.tabPosition === 0) this.renderQueue.tabIcons.add(bankItem.tab);
      (_a = this.game.archaeology) === null || _a === void 0 ? void 0 : _a.museum.updateMuseumItem(item, this.game);
    }
    this.renderQueue.items.add(item);
    this.queueQuantityUpdates(item);
    const event = new ItemQuantityChangedEvent(item, oldQuantity, newQuantity);
    this._events.emit('itemChanged', event);
    if (this.emitItemEvents) item.emit('bankQuantityChanged', event);
  }
  removeItemQuantityByID(itemID, quantity, removeItemCharges) {
    const item = this.game.items.getObjectByID(itemID);
    if (item === undefined)
      throw new Error(`Error removing item from bank by id. Item with id: ${itemID} is not registered.`);
    this.removeItemQuantity(item, quantity, removeItemCharges);
  }
  getQty(item) {
    var _a, _b;
    return (_b = (_a = this.items.get(item)) === null || _a === void 0 ? void 0 : _a.quantity) !== null && _b !== void 0
      ? _b
      : 0;
  }
  filterItems(predicate) {
    const filtered = [];
    this.items.forEach((bankItem) => {
      if (predicate(bankItem)) filtered.push(bankItem.item);
    });
    return filtered;
  }
  checkForItems(costs) {
    return costs.every((cost) => {
      return this.getQty(cost.item) >= cost.quantity;
    });
  }
  consumeItems(costs) {
    costs.forEach((cost) => {
      this.removeItemQuantity(cost.item, cost.quantity, true);
    });
  }
  willItemsFit(items) {
    const newItems = new Set();
    return items.every(({ item }) => {
      if (this.hasItem(item)) return true;
      newItems.add(item);
      return this.occupiedSlots + newItems.size <= this.maximumSlots;
    });
  }
  moveItemModeOnClick() {
    if (this.itemSelectionMode === 1) this.setItemSelectionMode(0);
    else this.setItemSelectionMode(1);
  }
  sellItemModeOnClick() {
    if (this.itemSelectionMode === 2) this.setItemSelectionMode(0);
    else this.setItemSelectionMode(2);
  }
  selectItemOnClick(item) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined) {
      console.warn('Tried to select item in bank, but it does not exist');
      return;
    }
    switch (this.itemSelectionMode) {
      case 0:
        this.toggleItemForSelection(bankItem);
        break;
      case 1:
        this.toggleItemForMoving(bankItem);
        break;
      case 2:
        this.toggleItemForSelling(bankItem);
        break;
    }
  }
  onItemDoubleClick(item) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined || this.itemSelectionMode !== 0) return;
    if (
      this.game.settings.defaultToCurrentEquipSet &&
      item instanceof EquipmentItem &&
      item.validSlots[0].id !== 'melvorD:Summon1' &&
      this.game.settings.enableDoubleClickEquip
    ) {
      this.game.combat.player.equipCallback(item, item.validSlots[0], Infinity);
    } else if (item instanceof OpenableItem && !bankItem.locked && this.game.settings.enableDoubleClickOpen) {
      this.openItemOnClick(item, Infinity);
    } else if (item instanceof BoneItem && !bankItem.locked && this.game.settings.enableDoubleClickBury) {
      this.buryItemOnClick(item, Infinity);
    } else if (item instanceof SoulItem && !bankItem.locked) {
      this.releaseSoulItemOnClick(item, Infinity);
    }
  }
  toggleItemLock(bankItem) {
    if (this.lockedItems.has(bankItem.item)) {
      this.lockedItems.delete(bankItem.item);
    } else {
      this.lockedItems.add(bankItem.item);
    }
    bankTabMenu.updateItemLockBorder(bankItem, this.game.settings.useDefaultBankBorders);
    if (bankItem === this.selectedBankItem) {
      bankSideBarMenu.setItemLocked(bankItem.locked);
    }
  }
  reassignBankItemPositions(tabID, startingPosition) {
    const tab = this.itemsByTab[tabID];
    for (let tabPosition = startingPosition; tabPosition < tab.length; tabPosition++) {
      tab[tabPosition].tabPosition = tabPosition;
    }
  }
  toggleItemSelected(bankItem) {
    if (this.selectedItems.has(bankItem)) {
      this.selectedItems.delete(bankItem);
      bankTabMenu.setItemUnselected(bankItem.item, this.itemSelectionMode);
    } else {
      this.selectedItems.add(bankItem);
      bankTabMenu.setItemSelected(bankItem.item, this.itemSelectionMode);
    }
  }
  deselectBankItem() {
    if (this.selectedBankItem === undefined) return;
    bankTabMenu.setItemUnselected(this.selectedBankItem.item, this.itemSelectionMode);
    this.selectedBankItem = undefined;
    if (checkMediaQuery('(max-width: 991px)')) closeBankSidebar();
    bankSideBarMenu.setUnselected();
  }
  toggleItemForSelection(bankItem) {
    if (this.selectedBankItem === bankItem) {
      this.deselectBankItem();
    } else {
      if (this.selectedBankItem !== undefined)
        bankTabMenu.setItemUnselected(this.selectedBankItem.item, this.itemSelectionMode);
      if (this.game.settings.defaultToCurrentEquipSet)
        this.game.combat.player.changeEquipToSet(this.game.combat.player.selectedEquipmentSet);
      this.selectedBankItem = bankItem;
      if (checkMediaQuery('(max-width: 991px)')) openBankSidebar();
      bankSideBarMenu.setItem(bankItem, this.game);
      bankTabMenu.setItemSelected(bankItem.item, this.itemSelectionMode);
      if (bankItem.isGlowing) {
        this.glowingItems.delete(bankItem.item);
        bankTabMenu.updateItemGlow(bankItem);
      }
    }
  }
  toggleItemForMoving(bankItem) {
    this.toggleItemSelected(bankItem);
    bankMoveModeMenu.updateSelectionCount(this);
  }
  toggleItemForSelling(bankItem) {
    if (this.lockedItems.has(bankItem.item)) return;
    this.toggleItemSelected(bankItem);
    bankSellModeMenu.updateSelectionValues(this);
  }
  setItemSelectionMode(selectionMode) {
    if (selectionMode === this.itemSelectionMode) return;
    this.disableItemSelectionMode();
    this.itemSelectionMode = selectionMode;
    switch (selectionMode) {
      case 1:
        if (this.selectedBankItem !== undefined) this.deselectBankItem();
        showElement(bankMoveModeMenu);
        bankMoveModeMenu.updateSelectionCount(this);
        break;
      case 2:
        if (this.selectedBankItem !== undefined) this.deselectBankItem();
        showElement(bankSellModeMenu);
        bankSellModeMenu.updateSelectionValues(this);
        break;
    }
  }
  disableItemSelectionMode() {
    if (this.itemSelectionMode === 0) return;
    bankTabMenu.setItemsUnselected(this.selectedItems, this.itemSelectionMode);
    this.selectedItems.clear();
    switch (this.itemSelectionMode) {
      case 1:
        hideElement(bankMoveModeMenu);
        break;
      case 2:
        hideElement(bankSellModeMenu);
        break;
    }
  }
  moveSelectedItemsToTab(newTabID) {
    if (this.itemSelectionMode !== 1) return;
    const selectedItemsByTab = new Map();
    this.selectedItems.forEach((bankItem) => {
      if (bankItem.tab === newTabID) return;
      let tabArray = selectedItemsByTab.get(bankItem.tab);
      if (tabArray === undefined) {
        tabArray = [];
        selectedItemsByTab.set(bankItem.tab, tabArray);
      }
      tabArray.push(bankItem);
    });
    const tabToAddTo = this.itemsByTab[newTabID];
    const bankItemsMoved = [];
    selectedItemsByTab.forEach((tabArray, tabID) => {
      const tabToRemoveFrom = this.itemsByTab[tabID];
      tabArray.sort((a, b) => a.tabPosition - b.tabPosition);
      const lowestTabPosition = tabArray[0].tabPosition;
      let itemsRemoved = 0;
      tabArray.forEach((bankItem) => {
        const removedItems = tabToRemoveFrom.splice(bankItem.tabPosition - itemsRemoved, 1);
        removedItems[0].tab = newTabID;
        removedItems[0].tabPosition = tabToAddTo.length;
        if (tabToAddTo.length === 0) this.renderQueue.tabIcons.add(newTabID);
        tabToAddTo.push(...removedItems);
        bankItemsMoved.push(...removedItems);
        itemsRemoved++;
      });
      this.reassignBankItemPositions(tabID, lowestTabPosition);
      if (lowestTabPosition === 0) this.renderQueue.tabIcons.add(tabID);
    });
    bankTabMenu.moveIconsToNewTab(bankItemsMoved, newTabID);
    bankItemsMoved.forEach(({ item }) => this.defaultItemTabs.set(item, newTabID));
    this.storeCustomSortOrder();
    this.setItemSelectionMode(0);
    this.renderQueue.bankValue = true;
  }
  getSelectedItemInfo() {
    let count = 0;
    const value = new SparseNumericMap();
    let firstCurrency;
    this.selectedItems.forEach((bankItem) => {
      if (!bankItem.locked) {
        const item = bankItem.item;
        count++;
        firstCurrency !== null && firstCurrency !== void 0 ? firstCurrency : (firstCurrency = item.sellsFor.currency);
        value.add(item.sellsFor.currency, this.getItemSalePrice(item, bankItem.quantity));
      }
    });
    return { count, value, firstCurrency };
  }
  sellAllSelectedItems() {
    if (this.itemSelectionMode !== 2) return;
    const { value, count, firstCurrency } = this.getSelectedItemInfo();
    if (count <= 0 || firstCurrency === undefined) return;
    this.fireBulkItemSaleConfirmation(value, firstCurrency, count, () => {
      this.processSellSelectedItems();
      this.setItemSelectionMode(0);
    });
  }
  processSellSelectedItems() {
    this.selectedItems.forEach((bankItem) => {
      this.processItemSale(bankItem.item, bankItem.quantity);
    });
  }
  sellUnlockedItemsOnClick() {
    const tab = this.itemsByTab[this.selectedBankTab];
    let itemCount = 0;
    const totalCurrency = new SparseNumericMap();
    let firstCurrency;
    tab.forEach((bankItem) => {
      if (!bankItem.locked) {
        itemCount++;
        firstCurrency !== null && firstCurrency !== void 0
          ? firstCurrency
          : (firstCurrency = bankItem.item.sellsFor.currency);
        totalCurrency.add(bankItem.item.sellsFor.currency, this.getItemSalePrice(bankItem.item, bankItem.quantity));
      }
    });
    if (itemCount <= 0 || firstCurrency === undefined) return;
    this.fireBulkItemSaleConfirmation(totalCurrency, firstCurrency, itemCount, () => this.processSelectedTabSale());
  }
  processSelectedTabSale() {
    const itemsToSell = [];
    this.itemsByTab[this.selectedBankTab].forEach((bankItem) => {
      if (!bankItem.locked) itemsToSell.push(bankItem);
    });
    itemsToSell.forEach((bankItem) => {
      this.processItemSale(bankItem.item, bankItem.quantity);
    });
  }
  setLockOfSelectedTab(locked) {
    this.itemsByTab[this.selectedBankTab].forEach((bankItem) => {
      if (bankItem.locked !== locked) this.toggleItemLock(bankItem);
    });
  }
  setLockOfAllItemsOnClick(locked) {
    SwalLocale.fire({
      title: getLangString('BANK_STRING_52'),
      html: `<h5 class="font-w400 text-combat-smoke font-size-sm mb-2">${getLangString(
        `BANK_STRING_${locked ? '51' : '50'}`,
      )}</h5><h5 class="font-w600 text-danger font-size-sm mb-1">${getLangString('MENU_TEXT_CANNOT_UNDO')}</h5>`,
      showCancelButton: true,
      icon: 'warning',
    }).then((result) => {
      if (result.value) {
        this.setLockOfAllItems(locked);
      }
    });
  }
  setLockOfAllItems(locked) {
    this.items.forEach((bankItem) => {
      if (bankItem.locked !== locked) this.toggleItemLock(bankItem);
    });
  }
  fireBulkItemSaleConfirmation(totalCurrency, firstCurrency, count, onConfirm) {
    const modalBody = createElement('div', { className: 'justify-vertical-center text-dark' });
    totalCurrency.forEach((quantity, currency) => {
      const saleSpan = createElement('span', { parent: modalBody });
      createElement('img', {
        className: 'skill-icon-xxs mr-1',
        attributes: [['src', currency.media]],
        parent: saleSpan,
      });
      saleSpan.append(currency.formatAmount(numberWithCommas(quantity)));
    });
    SwalLocale.fire({
      title: templateString(getLangString('MENU_TEXT_SELL_NUM_ITEMS'), { num: `${numberWithCommas(count)}` }),
      html: modalBody,
      imageUrl: firstCurrency.media,
      imageWidth: 64,
      imageHeight: 64,
      imageAlt: firstCurrency.name,
      showCancelButton: true,
      confirmButtonText: getLangString('BANK_STRING_22'),
    }).then((result) => {
      if (result.value) {
        onConfirm();
      }
    });
  }
  sortButtonOnClick() {
    let sortFunction;
    switch (this.game.settings.bankSortOrder) {
      case 0:
        sortFunction = sortByOrder(this.defaultSortOrder, 'item');
        break;
      case 1:
        sortFunction = (a, b) => sortByCurrencyValue(false, a.itemSellValue, b.itemSellValue);
        break;
      case 2:
        sortFunction = (a, b) => sortByCurrencyValue(true, a.itemSellValue, b.itemSellValue);
        break;
      case 3:
        sortFunction = (a, b) => sortByCurrencyValue(false, a.stackValue, b.stackValue);
        break;
      case 4:
        sortFunction = (a, b) => sortByCurrencyValue(true, a.stackValue, b.stackValue);
        break;
      case 5:
        sortFunction = sortByOrder(this.customSortOrder, 'item');
        break;
      default:
        throw new Error(`Error sorting bank, sort order setting: ${this.game.settings.bankSortOrder} is invalid.`);
    }
    this.itemsByTab.forEach((tab, tabID) => {
      const tabOrder = tab.sort(sortFunction).map((bankItem) => bankItem.item.id);
      this.reassignBankItemPositions(tabID, 0);
      bankTabMenu.sortTabByOrder(tabID, tabOrder);
      this.renderQueue.tabIcons.add(tabID);
    });
    bankTabMenu.validateItemOrder();
  }
  storeCustomSortOrder() {
    if (this.game.settings.bankSortOrder !== 5) return;
    this.customSortOrder = [];
    this.itemsByTab.forEach((tabArray) => {
      tabArray.forEach((bankItem) => this.customSortOrder.push(bankItem.item));
    });
    this.defaultSortOrder.forEach((item) => {
      if (!this.items.has(item)) this.customSortOrder.push(item);
    });
  }
  processItemSale(item, quantity) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    quantity = Math.min(bankItem.quantity, quantity);
    const currency = item.sellsFor.currency;
    const salePrice = this.getItemSalePrice(item, quantity);
    currency.add(salePrice);
    this.game.stats.General.add(GeneralStats.TotalItemsSold, quantity);
    this.game.stats.Items.add(item, ItemStats.TimesSold, quantity);
    if (currency === this.game.gp) this.game.stats.Items.add(item, ItemStats.GpFromSale, salePrice);
    this.removeItemQuantity(item, quantity, true);
    this.game.telemetry.createItemRemovedFromBankEvent(item, quantity, `Bank.ItemSale`);
    if (currency === this.game.gp)
      this.game.telemetry.createGPAdjustedEvent(salePrice, this.game.gp.amount, `ItemSale.${item.id}`);
    if (currency === this.game.abyssalPieces)
      this.game.telemetry.createAPAdjustedEvent(salePrice, this.game.abyssalPieces.amount, `ItemSale.${item.id}`);
  }
  sellItemOnClick(item, quantity) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined || quantity < 1) return;
    if (!this.game.tutorial.complete && this.game.tutorial.bannedItemSales.has(item)) {
      SwalLocale.fire({
        title: getLangString('MENU_TEXT_ITEM_SALE_LOCKED'),
        html: `<h5 class="font-w400 text-combat-smoke font-size-sm"><img class="skill-icon-xs mr-1" src="${
          item.media
        }"> ${getLangString('MENU_TEXT_ITEM_NEEDED_TUTORIAL')}</h5>`,
        icon: 'warning',
      });
      return;
    }
    quantity = Math.min(bankItem.quantity, quantity);
    const salePrice = this.getItemSalePrice(item, quantity);
    if (this.game.settings.showSaleConfirmations) {
      SwalLocale.fire({
        title: getLangString('BANK_STRING_23'),
        html: `<span class='text-dark'>
        ${numberWithCommas(quantity)} x ${item.name}<br>
        <img class='skill-icon-xs mr-2' src='${item.sellsFor.currency.media}'>${item.sellsFor.currency.formatAmount(
          numberWithCommas(salePrice),
        )}
        </span>`,
        imageUrl: item.media,
        imageWidth: 64,
        imageHeight: 64,
        imageAlt: item.name,
        showCancelButton: true,
        confirmButtonText: getLangString('BANK_STRING_22'),
      }).then((result) => {
        if (result.value) {
          this.processItemSale(item, quantity);
        }
      });
    } else {
      this.processItemSale(item, quantity);
    }
  }
  getPrayerPointsPerBone(item) {
    let points = item.prayerPoints + this.game.modifiers.flatPrayerPointsFromBurying;
    points *= 1 + this.game.modifiers.prayerPointsFromBurying / 100;
    points = Math.floor(points);
    return Math.max(points, 1);
  }
  buryItemOnClick(item, quantity) {
    if (!this.game.prayer.isUnlocked) {
      lockedSkillAlert(this.game.prayer, 'SKILL_UNLOCK_BURY');
      return;
    }
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    quantity = Math.min(bankItem.quantity, quantity);
    this.removeItemQuantity(item, quantity, true);
    this.game.stats.Prayer.add(PrayerStats.BonesBuried, quantity);
    this.game.stats.Items.add(item, ItemStats.TimesBuried, quantity);
    const pointsToGive = this.getPrayerPointsPerBone(item) * quantity;
    this.game.combat.player.addPrayerPoints(pointsToGive);
    this.game.combat.player.render();
    notifyPlayer(this.game.prayer, getLangString('COMBAT_MISC_16'), 'success', pointsToGive);
  }
  getSoulPointsPerSoul(item) {
    const points = item.soulPoints + this.game.modifiers.flatSoulPointsFromReleasing;
    return Math.max(points, 1);
  }
  releaseSoulItemOnClick(item, quantity) {
    if (!this.game.prayer.isUnlocked) {
      lockedSkillAlert(this.game.prayer, 'SKILL_UNLOCK_RELEASE');
      return;
    }
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    quantity = Math.min(bankItem.quantity, quantity);
    this.removeItemQuantity(item, quantity, true);
    this.game.stats.Prayer.add(PrayerStats.SoulsReleased, quantity);
    this.game.stats.Items.add(item, ItemStats.TimesReleased, quantity);
    const pointsToGive = this.getSoulPointsPerSoul(item) * quantity;
    this.game.combat.player.addSoulPoints(pointsToGive);
    this.game.combat.player.render();
    notifyPlayer(this.game.prayer, getLangString('SOUL_POINTS'), 'success', pointsToGive);
  }
  openItemOnClick(item, quantity) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    if (item.keyItem !== undefined && this.getQty(item.keyItem.item) < item.keyItem.quantity) return;
    quantity = Math.min(bankItem.quantity, quantity);
    let interval = 500;
    if (item.id === 'melvorD:Chest_of_Witwix' && this.game.characterName === 'witwix') interval = 5000;
    SwalLocale.fire({
      html: `<div id="item-open-contents" class="text-dark justify-vertical-center"><p>${templateLangString(
        'BANK_STRING_41',
        { itemName: item.name, qty: numberWithCommas(quantity) },
      )}</p><div style="width:90px;height:90px;"><div class="skill-icon-md spinner-border spinner-border-sm text-danger" role="status"></div></div></div>`,
      imageUrl: item.media,
      imageWidth: 64,
      imageHeight: 64,
      imageAlt: item.name,
    });
    window.setTimeout(() => {
      this.processItemOpen(item, quantity);
    }, interval);
  }
  processItemOpen(item, quantity) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    quantity = Math.min(bankItem.quantity, quantity);
    if (item.keyItem !== undefined && item.keyItem.quantity > 0) {
      const maxQuantity = Math.floor(this.getQty(item.keyItem.item) / item.keyItem.quantity);
      quantity = Math.min(quantity, maxQuantity);
    }
    const itemsToAdd = new Map();
    let bankSlotsOccupied = 0;
    let itemsOpened = 0;
    while (itemsOpened < quantity) {
      let nextItem;
      if (item.id === 'melvorD:Chest_of_Witwix' && this.game.characterName === 'witwix') {
        const item = this.game.items.getObjectByID('melvorD:Amulet_of_Calculated_Promotion');
        if (item === undefined) throw new Error(`Error, item not registered.`);
        nextItem = { item, quantity: 1 };
      } else {
        const prevNextItem = this.nextOpenedItems.get(item);
        if (prevNextItem === undefined) {
          nextItem = item.dropTable.getDrop();
        } else {
          nextItem = prevNextItem;
          this.nextOpenedItems.delete(item);
        }
      }
      const currentAdded = itemsToAdd.get(nextItem.item);
      if (currentAdded === undefined) {
        if (this.hasItem(nextItem.item)) {
          itemsToAdd.set(nextItem.item, nextItem.quantity);
          itemsOpened++;
        } else if (this.occupiedSlots + bankSlotsOccupied < this.maximumSlots) {
          bankSlotsOccupied++;
          itemsToAdd.set(nextItem.item, nextItem.quantity);
          itemsOpened++;
        } else {
          if (itemsOpened === 0) {
            $('#item-open-contents').html(
              `<p>${templateLangString('BANK_STRING_41', {
                itemName: item.name,
                qty: numberWithCommas(quantity),
              })}</p><span class="text-danger">${getLangString('TOASTS_FULL_BANK')}</span>`,
            );
          } else {
            bankFullNotify();
          }
          this.nextOpenedItems.set(item, nextItem);
          break;
        }
      } else {
        itemsToAdd.set(nextItem.item, currentAdded + nextItem.quantity);
        itemsOpened++;
      }
    }
    this.removeItemQuantity(item, itemsOpened, true);
    if (item.keyItem !== undefined && item.keyItem.quantity > 0) {
      this.removeItemQuantity(item.keyItem.item, itemsOpened * item.keyItem.quantity, true);
    }
    this.game.stats.Items.add(item, ItemStats.TimesOpened, itemsOpened);
    itemsToAdd.forEach((quantity, newItem) => {
      this.addItem(newItem, quantity, false, true);
    });
    $('#item-open-contents').html(`<span class='text-dark'>
      <p>
      ${getLangString('MENU_TEXT_YOU_OPENED')}<br>
      <small class='text-info'>${itemsOpened} ${item.name}</small>
      </p>
      ${getLangString('MENU_TEXT_YOU_FOUND')}
      </span><br>`);
    const addedArray = [...itemsToAdd];
    let count = 0;
    const itemInterval = setInterval(() => {
      if (count < addedArray.length) {
        $('#item-open-contents').append(
          `<small class="js-animation-object animated fadeInLeft text-dark">${numberWithCommas(
            addedArray[count][1],
          )} <img class="skill-icon-xs mr-2" src="${addedArray[count][0].media}">${
            addedArray[count][0].name
          }<br></small>`,
        );
        count++;
      } else {
        clearInterval(itemInterval);
      }
    }, 200);
  }
  readItemOnClick(item) {
    item.showContents();
    switch (item.id) {
      case 'melvorD:Message_In_A_Bottle':
        this.game.fishing.unlockSecretArea();
        break;
      case 'melvorF:Merchants_Permit':
        if (!this.game.merchantsPermitRead) {
          this.game.merchantsPermitRead = true;
          this.game.shop.renderQueue.costs = true;
        }
        break;
    }
  }
  claimItemOnClick(item, quantity) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    quantity = Math.min(bankItem.quantity, quantity);
    this.removeItemQuantity(item, quantity, true);
    this.game.computeTokenItemStats(true);
  }
  claimMasteryTokenOnClick(item, quantity) {
    const bankItem = this.items.get(item);
    if (bankItem === undefined) return;
    quantity = Math.min(bankItem.quantity, quantity);
    const skill = item.skill;
    const tokenPercent = item.percent + this.game.modifiers.xpFromMasteryTokens;
    if (!skill.hasMastery) throw new Error(`Error claiming mastery token. Mastery Token skill does not have mastery.`);
    const basePoolCap = skill.getBaseMasteryPoolCap(item.realm);
    const xpPerToken = Math.floor((basePoolCap * tokenPercent) / 100);
    const xpRemaining = skill.getMasteryPoolCap(item.realm) - skill.getMasteryPoolXP(item.realm);
    const tokensToFillPool = Math.floor(xpRemaining / xpPerToken);
    quantity = Math.min(quantity, tokensToFillPool);
    const totalXpToAdd = xpPerToken * quantity;
    skill.addMasteryPoolXP(item.realm, totalXpToAdd);
    if (quantity === tokensToFillPool)
      notifyPlayer(skill, templateLangString('TOASTS_MAX_POOL_TOKENS', { count: `${tokensToFillPool}` }), 'info', 0);
    notifyPlayer(
      skill,
      templateLangString('TOASTS_POOL_XP_GRANTED', { xp: numberWithCommas(totalXpToAdd) }),
      'success',
      0,
    );
    this.removeItemQuantity(item, quantity, true);
    $('#mastery-pool-spend-token-qty').text(numberWithCommas(this.getQty(item)));
  }
  getMaxUpgradeQuantity(upgrade) {
    let maxUpgrades = Infinity;
    upgrade.currencyCosts.forEach(({ currency, quantity }) => {
      maxUpgrades = Math.min(maxUpgrades, Math.floor(currency.amount / quantity));
    });
    upgrade.itemCosts.forEach(({ item, quantity }) => {
      maxUpgrades = Math.min(maxUpgrades, Math.floor(this.getQty(item) / quantity));
    });
    return maxUpgrades;
  }
  checkUpgradePotionRequirement(upgrade) {
    let requirementsMet = true;
    if (upgrade.upgradedItem instanceof PotionItem) {
      const recipe = this.game.herblore.getRecipeForPotion(upgrade.upgradedItem);
      requirementsMet =
        recipe !== undefined &&
        this.game.herblore.getMasteryLevel(recipe) >= Herblore.tierMasteryLevels[upgrade.upgradedItem.tier];
    }
    return requirementsMet;
  }
  fireItemUpgradeModal(upgrade, rootItem) {
    itemUpgradeMenu.setUpgrade(upgrade, rootItem, this, this.game);
    $('#modal-item-upgrade').modal('show');
  }
  upgradeItemOnClick(upgrade, upgradeQuantity) {
    if (!this.checkUpgradePotionRequirement(upgrade)) return;
    upgradeQuantity = Math.min(this.getMaxUpgradeQuantity(upgrade), upgradeQuantity);
    const costs = new Costs(this.game);
    costs.setSource(`Bank.ItemUpgrade.${upgrade.upgradedItem.id}`);
    upgrade.currencyCosts.forEach(({ currency, quantity }) => {
      costs.addCurrency(currency, quantity * upgradeQuantity);
    });
    upgrade.itemCosts.forEach(({ item, quantity }) => {
      costs.addItem(item, quantity * upgradeQuantity);
    });
    const itemQuantity = upgradeQuantity * upgrade.upgradedQuantity;
    if (this.addItem(upgrade.upgradedItem, itemQuantity, false, true)) {
      costs.consumeCosts();
    }
    if (this.selectedBankItem !== undefined) bankSideBarMenu.setItem(this.selectedBankItem, game);
  }
  useEightOnClick(eight) {
    const bankItem = this.items.get(eight);
    if (bankItem === undefined) return;
    const eightRoll = rollInteger(1, 8);
    if (eightRoll === 8) {
      this.addItem(eight, 8, false, true);
    }
    this.removeItemQuantity(eight, 1, true);
  }
  findAFriendOnClick(cracker) {
    SwalLocale.fire({
      title: '...',
      html: `<small><div class="spinner-border spinner-border-sm text-primary mr-2" id="friend-finder-progress-spinner" role="status"></div>${getLangString(
        'MENU_TEXT_FINDING_A_FRIEND',
      )}</small>`,
      imageUrl: assets.getURI('assets/media/main/question.png'),
      imageWidth: 64,
      imageHeight: 64,
      imageAlt: 'Offline',
      allowOutsideClick: false,
    });
    $('.swal2-confirm').attr('disabled', 'true');
    const success = (data) => {
      if (data === 'true') {
        SwalLocale.fire({
          title: ':D',
          html: getLangString('BANK_STRING_FOUND_A_FRIEND'),
          imageUrl: assets.getURI('assets/media/bank/friendship_bracelet.png'),
          imageWidth: 64,
          imageHeight: 64,
          imageAlt: getLangString('BANK_STRING_YAY_FRIEND'),
        });
        this.addItemByID('melvorD:Friendship_Bracelet', 1, false, true);
      } else {
        SwalLocale.fire({ title: ':(', html: getLangString('MENU_TEXT_NO_FRIENDS_FOUND') });
      }
    };
    setTimeout(() => {
      $.ajax({ url: 'misc/findAFriend.php', type: 'POST', async: true, success });
    }, 2000);
  }
  updateSearchArray() {
    this.searchArray = [];
    this.items.forEach((bankItem) => {
      this.searchArray.push({
        item: bankItem.item,
        qty: bankItem.quantity,
        name: bankItem.item.name,
        category: bankItem.item.category,
        description: bankItem.item.description,
        type: bankItem.item.type,
        tab: bankItem.tab,
        slot: '',
        namespace: bankItem.item.namespace,
        namespaceName: bankItem.item.namespaceDisplayName,
      });
      if (bankItem.item instanceof EquipmentItem) {
        this.searchArray[this.searchArray.length - 1].slot = bankItem.item.validSlots
          .map((slot) => slot.emptyName)
          .join(' ');
      }
    });
  }
  onBankSearchChange(query) {
    if (query === '') {
      bankTabMenu.showAllItems();
      bankOptionsMenu.setSearchNormal();
    } else {
      const options = {
        shouldSort: true,
        tokenize: true,
        matchAllTokens: true,
        findAllMatches: true,
        threshold: 0.1,
        location: 0,
        distance: 100,
        maxPatternLength: 32,
        minMatchCharLength: 1,
        keys: ['name', 'category', 'id', 'type', 'description', 'slot', 'namespace', 'namespaceName'],
      };
      const fuse = new Fuse(this.searchArray, options);
      const result = fuse.search(query);
      const foundItems = new Set();
      const foundTabs = new Set();
      result.forEach((search) => {
        const bankItem = this.items.get(search.item);
        if (bankItem !== undefined) {
          foundItems.add(bankItem.item);
          if (bankItem.tab !== this.selectedBankTab) foundTabs.add(bankItem.tab);
        }
      });
      bankTabMenu.updateForSearchResult(foundItems, foundTabs, this.game.settings.enableScrollableBankTabs);
      if (foundItems.size === 0) {
        bankOptionsMenu.setSearchNone();
      } else {
        bankOptionsMenu.setSearchNormal();
      }
      switch (query) {
        case 'wherearemylemons':
          this.addItemByID('melvorD:Lemon', 1, false, true);
          break;
        case '8':
          if (!this.eightDelay) {
            this.addItemByID('melvorD:Eight', 1, false, true);
            this.eightDelay = true;
            window.setTimeout(() => {
              this.eightDelay = false;
            }, 8000);
          }
          break;
        case 'uuddlrlrba':
          showFireworks(true);
          window.setTimeout(function () {
            removePyro();
            clearInterval(pyroInterval);
          }, 10000);
          break;
      }
    }
  }
  setSelectedItemAsTabIcon(tabID) {
    if (this.selectedBankItem === undefined || this.tabIcons.get(tabID) === this.selectedBankItem.item) {
      this.resetTabIcon(tabID);
    } else {
      this.tabIcons.set(tabID, this.selectedBankItem.item);
    }
    this.renderQueue.tabIcons.add(tabID);
  }
  resetTabIcon(tabID) {
    this.tabIcons.delete(tabID);
    this.renderQueue.tabIcons.add(tabID);
  }
  changeDefaultSort(sortSetting) {
    this.game.settings.changeChoiceSetting('bankSortOrder', 5);
    if (sortSetting === 5 && this.customSortOrder.length === 0) {
      this.storeCustomSortOrder();
    }
  }
  updateItemBorders() {
    this.items.forEach((bankItem) => {
      bankTabMenu.updateItemLockBorder(bankItem, this.game.settings.useDefaultBankBorders);
    });
  }
  validateItemOrders() {
    this.itemsByTab.forEach((tab, tabID) => {
      tab.forEach((bankItem, tabPos) => {
        if (bankItem.tab !== tabID)
          console.warn(`${bankItem.item.name} has a mismatched tab. Real: ${tabID}, Item: ${bankItem.tab}`);
        if (bankItem.tabPosition !== tabPos)
          console.warn(
            `${bankItem.item.name} has a mismatched tab position. Real: ${tabPos}, Item: ${bankItem.tabPosition}`,
          );
      });
    });
  }
  printItemsNotInDefaultSortOrder() {
    this.game.items.namespaceMaps.forEach((itemMap, namespace) => {
      const unsorted = [];
      itemMap.forEach((item) => {
        if (
          !item.golbinRaidExclusive &&
          !(item === this.game.emptyEquipmentItem || item === this.game.emptyFoodItem) &&
          !this.defaultSortOrder.includes(item)
        )
          unsorted.push(item);
      });
      if (unsorted.length > 0) {
        console.log(`=== ${unsorted.length} Unsorted Items in Namespace: ${namespace} ===`);
        console.log(unsorted.map((item) => `"${item.id}"`).join(',\n'));
      }
    });
  }
}
Bank.MAXIMUM_TABS = 255;
class BankItem {
  constructor(bank, item, quantity, tab, tabPosition) {
    this.bank = bank;
    this.item = item;
    this.quantity = quantity;
    this.tab = tab;
    this.tabPosition = tabPosition;
  }
  get itemSellValue() {
    return { currency: this.item.sellsFor.currency, quantity: this.bank.getItemSalePrice(this.item) };
  }
  get stackValue() {
    return { currency: this.item.sellsFor.currency, quantity: this.bank.getItemSalePrice(this.item, this.quantity) };
  }
  get locked() {
    return this.bank.lockedItems.has(this.item);
  }
  get isGlowing() {
    return this.bank.glowingItems.has(this.item);
  }
}
class GolbinRaidBank extends Bank {
  get emitItemEvents() {
    return false;
  }
  render() {
    if (this.renderQueue.items.size > 0) {
      let renderRunes = false;
      this.renderQueue.items.forEach((item) => {
        renderRunes || (renderRunes = item.type === 'Rune');
      });
      if (renderRunes) combatMenus.runes.updateCounts(this);
      this.renderQueue.items.clear();
    }
  }
}
checkFileVersion('?11766');