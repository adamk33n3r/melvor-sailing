import { ComponentClass } from '../ts/component';
import { BoatComponent } from './boat.component';

export class SailingPage extends ComponentClass {
  $template = '#sailing-page-template';
  // todo: loop through boats registery
  boatComponents: Component<any>[] = []
  categoryMenu: CategoryMenuElement;
  // constructor() {
  //   super();
  //   game.sailing.boats.forEach((boat) => {
  //     const boatComponent = new BoatComponent(boat);
  //   });
  // }
  mounted() {
    game.sailing.boats.forEach((boat) => {
      const boatComponent = BoatComponent(boat);
      this.boatComponents.push(boatComponent);
      ui.create(boatComponent, document.getElementById('boat-container'));
    });
  }
  update() {
    this.boatComponents.forEach((boatComponent) => {
      boatComponent.update();
    });
  }
  setCategoryMenu(options: any) {
    console.log('!!!!!!!!!!!!!!!!!:', options);
    console.log(this.$refs);
    console.log(this.categoryMenu);
    // console.log((this.categoryMenu as CategoryMenuElement).addOptions(options.allObjects, "Select Sailing Category", /*switchToCategory(this.selectionTabs)*/ null));
  }
  getCategoryMenu() {
    return this.$refs;
  }
}

