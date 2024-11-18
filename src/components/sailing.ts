import { getElementByIdAndRemoveId } from '../ts/util';
import { ExploreComponent } from './explore/explore.component';
import { PortComponent } from './port.component';
import { ShipComponent } from './ship.component';

export function SailingPageComponent() {
  return {
    $template: '#sailing-page-template',
    exploreComponents: [] as ReturnType<typeof ExploreComponent>[],
    shipComponents: [] as ReturnType<typeof ShipComponent>[],
    portComponents: [] as ReturnType<typeof PortComponent>[],
    exploreMenu: null as unknown as HTMLElement,
    shipMenu: null as unknown as HTMLElement,
    portMenu: null as unknown as HTMLElement,
    exploreContainer: null as unknown as HTMLElement,
    shipContainer: null as unknown as HTMLElement,
    portContainer: null as unknown as HTMLElement,
    mounted() {
      const parent = document.getElementById('sailing-container')!;

      this.exploreMenu = getElementByIdAndRemoveId('sailing-explore-menu', parent);
      this.shipMenu = getElementByIdAndRemoveId('sailing-ship-menu', parent);
      this.portMenu = getElementByIdAndRemoveId('sailing-port-menu', parent);

      this.exploreContainer = getElementByIdAndRemoveId('explore-container', parent);
      this.shipContainer = getElementByIdAndRemoveId('ship-container', parent);
      this.portContainer = getElementByIdAndRemoveId('port-container', parent);

      game.sailing.ships.forEach((ship) => {
        const shipComponent = ShipComponent(ship);
        this.shipComponents.push(shipComponent);
        ui.create(shipComponent, this.shipContainer);

        const exploreComponent = ExploreComponent(ship);
        this.exploreComponents.push(exploreComponent);
        ui.create(exploreComponent, this.exploreContainer);
      });

      game.sailing.ports.forEach((port) => {
        const portComponent = PortComponent(port, this.portContainer, {
          showLoot: true,
        });
        this.portComponents.push(portComponent);
        ui.create(portComponent, this.portContainer);
      });

      this.changeCategory(this.exploreMenu, this.exploreContainer);
      // this.changeCategory(this.shipMenu, this.shipContainer);
      // this.changeCategory(this.portMenu, this.portContainer);
    },
    update() {
      game.sailing.logger.debug('SailingPageComponent.update');
      this.exploreComponents.forEach((exploreComponent) => {
        exploreComponent.update();
      });
      this.shipComponents.forEach((shipComponent) => {
        shipComponent.update();
      });
      this.portComponents.forEach((portComponent) => {
        portComponent.update();
      });
    },
    changeCategory(ele: HTMLElement, category: HTMLElement) {
      this.exploreMenu.classList.remove('township-tab-selected');
      this.shipMenu.classList.remove('township-tab-selected');
      this.portMenu.classList.remove('township-tab-selected');
      ele.classList.add('township-tab-selected');
      this.exploreContainer.classList.add('d-none');
      this.shipContainer.classList.add('d-none');
      this.portContainer.classList.add('d-none');
      category.classList.remove('d-none');
    },
  };
}

