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
import { Constants } from './Constants';

declare global {
  interface Game {
    sailing: Sailing;
  }
}

export async function setup(ctx: Modding.ModContext) {

  const trans = new Translation(ctx);
  trans.register();

  const sailing = game.registerSkill(game.registeredNamespaces.getNamespace('sailing'), Sailing);

  // Register our GameData
  await ctx.gameData.addPackage(ModData as GameDataPackage);
  await Promise.all([
    ctx.gameData.addPackage(DeckItems as GameDataPackage),
    ctx.gameData.addPackage(Rams as GameDataPackage),
    ctx.gameData.addPackage(Rudders as GameDataPackage),
    ctx.gameData.addPackage(Sails as GameDataPackage),
  ]);

  game.sailing = sailing;

  ctx.onInterfaceAvailable(() => {
    sailing.ui = new UserInterface(ctx, game, sailing);
  });

  ctx.patch(Shop, 'buyItemOnClick').after((_, purchase, confirmed) => {
    if (purchase.category.id === 'sailing:SailingUpgrades') {
      if (confirmed) {
        sailing.page.update();
      }
    }
  });

  ctx.patch(ShopUpgradeChain, 'defaultMedia').get(function (original) {
    if (this.namespace === Constants.MOD_NAMESPACE && this._defaultMedia.startsWith('sailing:')) {
      return ctx.getResourceUrl(this._defaultMedia.substring(Constants.MOD_NAMESPACE.length + 1));
    }

    return original();
  });
}
