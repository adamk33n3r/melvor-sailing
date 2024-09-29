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
    xp: Math.floor(game.sailing.modifyXP(rewards.getXP(game.sailing, action), action)),
    masteryXP: Math.floor(masteryXP),
    masteryPoolXP: Math.floor(masteryPoolXP),
    skillIcon: game.sailing.media,
  }
}
