import { BoatAction } from '../ts/boat';

export function LootComponent(
  action: BoatAction,
  rewards: Rewards,
  masteryXP: number,
  masteryPoolXP: number,
) {
  return {
    $template: '#sailing-loot-template',
    actionName: action.name,
    currencies: rewards.getCurrencyQuantityArray().map(({ currency, quantity }) => ({ currency, quantity: formatNumber(quantity) })),
    loot: rewards.getItemQuantityArray(),
    xp: formatFixed(game.sailing.modifyXP(rewards.getXP(game.sailing, action), action), 0),
    masteryXP: formatFixed(masteryXP, 0),
    masteryPoolXP: formatFixed(masteryPoolXP, 0),
    skillIcon: game.sailing.media,
  }
}
