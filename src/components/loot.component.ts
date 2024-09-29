import { BoatAction } from '../ts/sailing';

export function LootComponent(
  action: BoatAction,
  rewards: Rewards,
  masteryXP: number,
  masteryPoolXP: number,
) {
  return {
    $template: '#sailing-loot-template',
    actionName: action.name,
    currencies: rewards.getCurrencyQuantityArray(),
    loot: rewards.getItemQuantityArray(),
    xp: rewards.getXP(game.sailing, action),
    masteryXP,
    masteryPoolXP,
    skillIcon: game.sailing.media,
  }
}
