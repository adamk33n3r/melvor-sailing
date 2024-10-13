import { ComponentClass } from '../ts/component';
import { BoatComponent } from './boat.component';

export class SailingPage extends ComponentClass {
  override $template = '#sailing-page-template';
  boatComponents: ReturnType<typeof BoatComponent>[] = []
  mounted() {
    game.sailing.boats.forEach((boat) => {
      const boatComponent = BoatComponent(boat);
      this.boatComponents.push(boatComponent);
      ui.create(boatComponent, document.getElementById('boat-container')!);
    });
  }
  override update() {
    this.boatComponents.forEach((boatComponent) => {
      boatComponent.update();
    });
  }
}

