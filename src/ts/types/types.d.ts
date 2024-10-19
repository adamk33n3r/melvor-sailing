declare module "*.png" {
  // eslint-disable-next-line @typescript-eslint/no-explicit-any
  const value: any;
  export default value;
}

type Component<T> = {
  [P in keyof T]: T[P];
} & {
  $template: string;
  update(): void;
};

// interface SailingEquipmentItemData extends BaseItemData {
//     itemType: 'SailingEquipment';
//     equipRequirements: AnyRequirementData[];
//     equipmentStats: AnyEquipStatData[];
//     validSlots: string[];
// }
// // declare global {
//   interface GameDataPackage2 extends GameDataPackage {
//     data?: GameData2;
//   }
//   declare type AnyItemData2 = ItemData | EquipmentItemData | WeaponItemData | FoodItemData | BoneItemData | PotionItemData | ReadableItemData | OpenableItemData | TokenItemData | MasteryTokenItemData | CompostItemData | SoulItemData | RuneItemData | FiremakingOilItemData | SailingEquipmentItemData;
//   interface GameData2 extends GameData {
//     items?: AnyItemData2[];
//   }
// // }

// declare namespace Modding {
//   export interface ModContext extends Modding.ModContext {
//     gameData: {
//       addPackage: (data: string | GameDataPackage2) => Promise<void>;
//       buildPackage: (builder: (packageBuilder: Modding.GameDataPackageBuilder) => void) => {
//         package: GameDataPackage;
//         add: () => Promise<void>;
//       };
//     }
//   }
// }
