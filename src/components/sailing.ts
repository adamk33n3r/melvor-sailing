import { ComponentClass } from '../ts/component';
import { BoatComponent, BoatComponentProps } from './boat';

export class SailingPage extends ComponentClass {
  $template = '#sailing-page-template';
  boatComponent = new BoatComponent();
  categoryMenu: CategoryMenuElement;
  mounted() {
    ui.create(this.boatComponent, document.getElementById('boat-container'));
  }
  update() {
    this.boatComponent.update();
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

