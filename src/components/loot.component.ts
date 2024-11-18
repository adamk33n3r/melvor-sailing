import { Port } from '../ts/port';
import { Dock } from '../ts/ship';

export function LootComponent(
  dock: Dock,
  port: Port,
  rewards: Rewards,
  masteryXP: number,
  portMasteryXP: number,
  masteryPoolXP: number,
) {
  return {
    $template: '#sailing-loot-template',
    dockName: dock.name,
    portName: port.name,
    currencies: rewards.getCurrencyQuantityArray().map(({ currency, quantity }) => ({ currency, quantity: formatNumber(quantity) })),
    loot: rewards.getItemQuantityArray(),
    xp: formatFixed(game.sailing.modifyXP(rewards.getXP(game.sailing, dock), dock), 0),
    masteryXP: formatFixed(masteryXP, 0),
    portMasteryXP: formatFixed(portMasteryXP, 0),
    masteryPoolXP: formatFixed(masteryPoolXP, 0),
    skillIcon: game.sailing.media,
  };
}
