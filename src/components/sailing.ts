import { ComponentClass } from '../ts/component';
import { ShipComponent } from './ship.component';

export class SailingPage extends ComponentClass {
  override $template = '#sailing-page-template';
  shipComponents: ReturnType<typeof ShipComponent>[] = []
  mounted() {
    game.sailing.ships.forEach((ship) => {
      const shipComponent = ShipComponent(ship);
      this.shipComponents.push(shipComponent);
      ui.create(shipComponent, document.getElementById('ship-container')!);
    });
  }
  override update() {
    this.shipComponents.forEach((shipComponent) => {
      shipComponent.update();
    });
  }
}

