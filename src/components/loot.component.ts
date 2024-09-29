export function LootComponent(
  xp: number,
  currencies: CurrencyQuantity[],
  loot: AnyItemQuantity[],
) {
  return {
    $template: '#sailing-loot-template',
    currencies,
    loot,
    xp,
    skillIcon: game.sailing.media,
  }
}
