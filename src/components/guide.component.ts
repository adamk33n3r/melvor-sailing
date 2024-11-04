import { Sailing } from '../ts/sailing';

export function GuideComponent(sailing: Sailing) {
  let self = {} as ReturnType<typeof GuideComponent>;
  return {
    $template: '#sailing-guide-template',
    skill: sailing,
    modifiers: [
      {
        name: 'Combat',
        media: sailing.getMediaURL('img/cannon_bronze.png'),
        description:
          `Generally provided by <img class="skill-icon-xs" src="${sailing.getMediaURL('img/cannon_bronze.png')}"> <strong>Cannons</strong>, Combat provides you with INSERT_BENEFIT_HERE.`,
      },
      {
        name: 'Morale',
        media: sailing.getMediaURL('img/figurehead_bronze.png'),
        description:
          `Generally provided by <img class="skill-icon-xs" src="${sailing.getMediaURL('img/figurehead_bronze.png')}"> <strong>Figureheads</strong>, Morale provides you with an increase in loot rolls.`,
      },
      {
        name: 'Seafaring',
        media: sailing.getMediaURL('img/hull_bronze.png'),
        description:
          `Generally provided by <img class="skill-icon-xs" src="${sailing.getMediaURL('img/hull_bronze.png')}"> <strong>Hulls</strong>, Seafaring provides you with increased XP.`,
      },
      {
        name: 'Speed',
        media: sailing.getMediaURL('img/rudder_normal.png'),
        description:
          `Generally provided by <img class="skill-icon-xs" src="${sailing.getMediaURL('img/rudder_normal.png')}"> <strong>Rudders</strong>, Speed provides you with faster trip times.`,
      },
    ],
    upgrades: sailing.shipUpgrades.allObjects.map((upgrade) => ({
      name: upgrade.localID,
      media: upgrade.media,
      description: upgrade.description,
      stats: upgrade.stats.describeAsSpanHTML(),
    })),
    ports: [],
    mounted() {
      self = this;
    },
  };
}
