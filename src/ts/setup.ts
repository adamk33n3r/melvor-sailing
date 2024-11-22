import pkg from '../../package.json';
// Game data for registration
import ModData from '../data/sailing.json';
import AoDData from '../data/sailing-aod.json';
import ShipsData from '../data/ships.json';
import PortsData from '../data/ports.json';
import DeckItems from '../data/deckItems.json';
import Rams from '../data/rams.json';
import Rudders from '../data/rudders.json';
import Sails from '../data/hulls.json';

// Styles
// Will automatically load your styles upon loading the mod
import '../css/styles.css';

// Images
import './images';

/* devblock:start */
import * as Util from './util';
/* devblock:end */

import { Sailing, SailingNotification } from './sailing';
import { Translation } from './translation';
import { UserInterface } from './ui';
import { Constants } from './Constants';
import { GuideComponent } from '../components/guide.component';

declare global {
  interface Game {
    sailing: Sailing;
    /* devblock:start */
    util: typeof Util;
    /* devblock:end */
  }
}

export async function setup(ctx: Modding.ModContext) {
  const trans = new Translation(ctx);
  trans.register();

  const origUpdateUIForLanguageChange = window.updateUIForLanguageChange;
  window.updateUIForLanguageChange = function () {
    trans.register();
    origUpdateUIForLanguageChange();
  };

  const sailing = game.registerSkill(game.registeredNamespaces.getNamespaceSafe(Constants.MOD_NAMESPACE), Sailing);
  sailing.logger.info(`Loading Sailing v${pkg.version}`);
  sailing.init(ctx);
  game.sailing = sailing;

  /* devblock:start */
  game.util = Util;
  /* devblock:end */

  // Register our GameData
  sailing.logger.debug('Adding base package...');
  await ctx.gameData.addPackage(ModData as GameDataPackage);
  sailing.logger.debug('Adding extra packages...');
  await Promise.all([
    ctx.gameData.addPackage(ShipsData as GameDataPackage),
    ctx.gameData.addPackage(PortsData as GameDataPackage),
    ctx.gameData.addPackage(DeckItems as GameDataPackage),
    ctx.gameData.addPackage(Rams as GameDataPackage),
    ctx.gameData.addPackage(Rudders as GameDataPackage),
    ctx.gameData.addPackage(Sails as GameDataPackage),
  ]);
  sailing.logger.debug('Done adding packages');

  if (cloudManager.hasAoDEntitlementAndIsEnabled) {
    await ctx.gameData.addPackage(AoDData as GameDataPackage);
  }

  ctx.onCharacterLoaded(() => {
    sailing.setMasteryActionsAndMilestones();
  });

  ctx.onInterfaceAvailable(() => {
    const parent = $('#tutorial-page-Woodcutting').parent().get(0);
    const guideComponent = GuideComponent(sailing);
    ui.create(guideComponent, parent!);

    tippy('.modio-link', {
      content: `<div class="font-size-sm">${getLangString('VIEW_ON_MODIO')}</div>`,
      placement: 'top',
      allowHTML: true,
      interactive: false,
      animation: false,
    });

    sailing.ui = new UserInterface(ctx, game, sailing);
  });

  ctx.onModsLoaded(async () => {
    if (cloudManager.hasAoDEntitlementAndIsEnabled) {
      const levelCapIncreases = [ 'sailing:Pre99Dungeons', 'sailing:ImpendingDarknessSet100' ];

      if (cloudManager.hasTotHEntitlementAndIsEnabled) {
        levelCapIncreases.push('sailing:Post99Dungeons', 'sailing:ThroneOfTheHeraldSet120');
      }

      const gamemodes = game.gamemodes.filter(
        (gamemode) =>
          gamemode.defaultInitialLevelCap !== undefined &&
          gamemode.levelCapIncreases.length > 0 &&
          gamemode.useDefaultSkillUnlockRequirements &&
          !gamemode.allowSkillUnlock,
      );

      await ctx.gameData.addPackage({
        $schema: '',
        namespace: 'sailing',
        modifications: {
          gamemodes: gamemodes.map((gamemode) => ({
            id: gamemode.id,
            levelCapIncreases: {
              add: levelCapIncreases,
            },
            startingSkills: {
              add: [ 'sailing:Sailing' ],
            },
            skillUnlockRequirements: [
              {
                skillID: 'sailing:Sailing',
                requirements: [
                  {
                    type: 'SkillLevel',
                    skillID: 'melvorD:Attack',
                    level: 1,
                  },
                ],
              },
            ],
          })),
        },
      });

      ctx.patch(EventManager, 'loadEvents').after(() => {
        if(game.currentGamemode.startingSkills?.has(game.sailing)) {
          game.sailing.setUnlock(true);
        }
      });
    }
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

  ctx.patch(GameNotificationElement, 'setImportance').after(function (_, key, notification, game) {
    if (key instanceof SailingNotification && notification.isImportant) {
      const original = this.container.onclick!;
      this.container.onclick = (ev: MouseEvent) => {
        original.call(this, ev);
        changePage(game.pages.getObjectSafe('sailing:Sailing'));
      };
    }
  });
}
