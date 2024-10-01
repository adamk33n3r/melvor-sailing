import { Constants } from './Constants'

import { languages } from './language';

export class Translation {
    constructor(private readonly ctx: Modding.ModContext) { }

    public register() {
        let lang = setLang;

        // ???
        if (lang === 'lemon' || lang === 'carrot') {
            lang = 'en';
        }

        const keysToNotPrefix: (string)[] = [
            'SHOP_NAME',
            'SHOP_DESCRIPTION',
            'ITEM_NAME',
            'ITEM_DESCRIPTION',
            'MAGIC_SPELL_NAME',
            'MAGIC_AURORA_NAME',
            'COMBAT_AREA_NAME',
            'SLAYER_AREA_NAME',
            'SLAYER_AREA_EFFECT',
            'DUNGEON_NAME',
            'MONSTER_NAME',
            'MONSTER_DESCRIPTION',
            'PET_NAME',
            'SKILL_NAME',
            'SPECIAL_ATTACK_NAME',
            'SPECIAL_ATTACK_DESCRIPTION',
            'PAGE_NAME',
            'PASSIVE_NAME',
            'PASSIVE_DESCRIPTION',
            'EQUIPMENT_STAT',
        ];

        // Based on how translation is retrieved,
        // we may or may not have to specify the mod namespace
        for (const [key, value] of Object.entries<string>(languages[lang])) {
            if (keysToNotPrefix.some(prefix => key.includes(prefix))) {
                loadedLangJson[key] = value;
            } else {
                loadedLangJson[`${Constants.MOD_NAMESPACE}_${key}`] = value;
            }
        }

        // Delayed, register pet hints dynamically
        this.ctx.onModsLoaded(function () {
            const combatAreas: Map<string, CombatArea> | undefined = game.combatAreas.namespaceMaps.get(Constants.MOD_NAMESPACE);
            const slayerAreas: Map<string, SlayerArea> | undefined = game.slayerAreas.namespaceMaps.get(Constants.MOD_NAMESPACE);

            if (combatAreas !== undefined) {
                combatAreas.forEach(function (combatArea) {
                    combatArea.monsters.forEach(function (monster) {
                        if (monster.pet !== undefined) {
                            Translation.addOrUpdatePetHint(monster.pet.pet.localID, combatArea.name);
                        }
                    })
                });
            }
            if (slayerAreas !== undefined) {
                slayerAreas.forEach(function (slayerArea) {
                    slayerArea.monsters.forEach(function (monster) {
                        if (monster.pet !== undefined) {
                            Translation.addOrUpdatePetHint(monster.pet.pet.localID, slayerArea.name);
                        }
                    })
                    if (slayerArea.pet !== undefined) {
                        Translation.addOrUpdatePetHint(slayerArea.pet.pet.localID, slayerArea.name);
                    }
                });
            }
        });
    }

    private static addOrUpdatePetHint(petLocalId: string, source: string): void {
        const existingSource = loadedLangJson[`${Constants.MOD_NAMESPACE}_PET_HINT_${petLocalId}`];
        loadedLangJson[`${Constants.MOD_NAMESPACE}_PET_HINT_${petLocalId}`] = existingSource && existingSource.length > 0
            ? `${existingSource}, ${source}`
            : `${source}`;
    }
}
