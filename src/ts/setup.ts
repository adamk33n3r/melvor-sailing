// Modules
// You can import script modules and have full type completion
import Greeter from '../components/Greeter/Greeter';

// Data
// Game data for registration
import ModData from '../data/sailing.json';
import DeckItems from '../data/deckItems.json';
import Rams from '../data/rams.json';
import Rudders from '../data/rudders.json';
import Sails from '../data/hulls.json';

// Styles
// Will automatically load your styles upon loading the mod
import '../css/styles.css';

// Images
// To bundle your mod's icon
import '../img/icon.png';
// Reference images using `ctx.getResourceUrl`
import LargeIcon from '../img/icon_large.png';
// import '../img/sail_adamant.png';
// import '../img/sail_rune.png';
// import '../img/sail_dragon.png';
import './images';

import { Sailing } from './sailing';
import { Translation } from './translation';
import { UserInterface } from './ui';

declare global {
  interface Game {
    sailing: Sailing;
  }
}

export async function setup(ctx: Modding.ModContext) {

  const trans = new Translation(ctx);
  trans.patch();
  trans.register();

  console.log('SAILING MOD SETUP');

  console.log('BEFORE SKILL REGISTER');
  const sailing = game.registerSkill(game.registeredNamespaces.getNamespace('sailing'), Sailing);
  console.log('AFTER SKILL REGISTER');

  // Register our GameData
  await ctx.gameData.addPackage(ModData as GameDataPackage);
  console.log("FINISHED MAIN PACKAGE");
  await Promise.all([
    ctx.gameData.addPackage(DeckItems as GameDataPackage),
    ctx.gameData.addPackage(Rams as GameDataPackage),
    ctx.gameData.addPackage(Rudders as GameDataPackage),
    ctx.gameData.addPackage(Sails as GameDataPackage),
  ]);
  console.log(ModData);

  game.sailing = sailing;

  ctx.onInterfaceAvailable(() => {
    console.log('CREATE UI');
    sailing.ui= new UserInterface(ctx, game, sailing);
    console.log('AFTER UI CREATE');
  });


  // await ctx.gameData.addPackage(ModData2 as any);

  ctx.patch(Shop, 'buyItemOnClick').after((_, purchase, confirmed) => {
    if (purchase.category.id === 'sailing:SailingUpgrades') {
      if (confirmed) {
        sailing.page.boatComponent.update();
      }
    }
  });

  ctx.patch(BankSidebarMenuElement, 'setItem').before(function(bankItem, game) {
    console.log(bankItem);
    if (bankItem.item.category === 'Sailing') {
      if ((this as any).equipSailing === undefined) {
        (this as any).equipSailing = ui.create((function EquipSailing(props: any) {
          return {
            $template: '#equip-sailing-item-template',
            props
          };
        })({}), this.selectedMenu.selectedItemContainer).querySelector('#equip-sailing-item-container');
      }
    }
    // this.selectedMenu.createEquipItemButtons()
  });
  ctx.patch(BankSidebarMenuElement, 'setItem').after(function(_, bankItem, game) {
    const asdf = (this as any).equipSailing as Element;
    hideElement(asdf.querySelector('#equip-quantity-slider-container'));
    hideElement(asdf.querySelector('#size-elem-2'))
    const btnArea = asdf.querySelector('#size-elem-5');
    btnArea.innerHTML = '';

    const item = bankItem.item as EquipmentItem;
    if (item.namespace !== 'sailing' || item.validSlots === undefined) {
      hideElement(asdf);
    } else {
      const slot = item.validSlots[0];

      const equipBtn = createElement('button', {
        className: 'btn btn-sm btn-outline-secondary m-1 w-100',
      });

      const equipSlotImage = asdf.querySelector('#equip-slot-image') as HTMLImageElement;
      const equipSlotName = asdf.querySelector('#equip-slot-name');
      equipSlotImage.src = slot.emptyMedia;
      equipSlotName.textContent = slot.emptyName;
      equipBtn.innerHTML = this.selectedMenu.createReplaceItemHTML(slot, item, game.combat.player);
      equipBtn.onclick = () => {
        game.combat.player.equipCallback(item, slot, 1);
      };
      btnArea.append(equipBtn);
      showElement(asdf);
    }
  })

  ctx.onCharacterLoaded(() => {
    console.log('!!!ON CHARACTER LOADED');
  });

  ctx.onInterfaceReady(() => {
    console.log('!!!ON INTERFACE READY');

    sidebar.categories().filter((cat) => cat.id === 'Passive')[0].toggle()
    sidebar.categories().filter((cat) => cat.id === 'Non-Combat')[0].toggle()
    game.shop.purchases.forEachInNamespace('sailing', (purchase) => {
      console.log('Purchase:', purchase);
    });
    game.shop.upgradesPurchased.forEach((count, upgrade) => {
      console.log('Purchased upgrade:', upgrade, count);
    });
    




  });

  ctx.onInterfaceAvailable(() => {
    console.log('!!!ON INTERFACE AVAILABLE');

  });

  // Because we're loading our templates.min.html file via the manifest.json,
  // the templates aren't available until after the setup() function runs
  ctx.onModsLoaded(() => {
    console.log('!!!ON MODS LOADED');
    const root = document.createElement('div');
    ui.create(Greeter({ name: 'Melvor' }), root);


    ctx.settings.section('General').add({
      type: 'number',
      name: 'xp-multiplier',
      label: 'XP Multiplier',
      hint: 'Multiply all XP gains by this amount',
      default: 1
    } as any);
    ctx.settings.section('General').add({
      type: 'number',
      name: 'mastery-xp-multiplier',
      label: 'Mastery XP Multiplier',
      hint: 'Multiply all Mastery XP gains by this amount',
      default: 1
    } as any);
    ctx.patch(Skill<any>, 'addXP').before(function (amount, masteryAction) {
      const xpMultiplier = ctx.settings.section('General').get('xp-multiplier') as number;
      return [amount * xpMultiplier, masteryAction];
    });
    ctx.patch(SkillWithMastery<any, any>, 'getMasteryXPModifier').after(function (modifier) {
      const masteryXpMultiplier = ctx.settings.section('General').get('mastery-xp-multiplier') as number;
      return modifier + masteryXpMultiplier;
    });

    sidebar.category('Modding').item('Mod Boilerplate', {
      icon: ctx.getResourceUrl('img/icon.png'),
      onClick() {
        open(ctx, root);
      },
    });




  });
}

function open(ctx: Modding.ModContext, html: HTMLElement) {
  SwalLocale.fire({
    iconHtml: `<img class="mbts__logo-img" src="${ctx.getResourceUrl(LargeIcon)}" />`,
    title: ctx.name,
    html,
  });
}
