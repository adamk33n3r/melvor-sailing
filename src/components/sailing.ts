import { Sailing } from '../ts/sailing';
import { LockState } from '../ts/ship';
import { getElementByIdAndRemoveId } from '../ts/util';
import { TradeComponent } from './trade/trade.component';
import { PortComponent } from './port.component';
import { ShipComponent } from './ship.component';

export function SailingPageComponent(sailing: Sailing) {
  return {
    $template: '#sailing-page-template',
    infoAlert: null as unknown as HTMLElement,
    tradeImg: sailing.getMediaURL('melvor:assets/media/main/coins.png'),
    shipsImg: sailing.getMediaURL('img/sailing-boat.png'),
    portsImg: sailing.getMediaURL('img/port.png'),
    showShipsButton: true,
    tradeComponents: [] as ReturnType<typeof TradeComponent>[],
    shipComponents: [] as ReturnType<typeof ShipComponent>[],
    portComponents: [] as ReturnType<typeof PortComponent>[],
    tradeMenu: null as unknown as HTMLElement,
    shipMenu: null as unknown as HTMLElement,
    portMenu: null as unknown as HTMLElement,
    tradeContainer: null as unknown as HTMLElement,
    shipContainer: null as unknown as HTMLElement,
    portContainer: null as unknown as HTMLElement,
    mounted() {
      const parent = document.getElementById('sailing-container')!;

      this.infoAlert = getElementByIdAndRemoveId('sailing-info-alert', parent);
      if (localStorage.getItem('sailing:infoAlertDismissed')) {
        this.infoAlert.classList.add('d-none');
      }

      this.tradeMenu = getElementByIdAndRemoveId('sailing-trade-menu', parent);
      this.shipMenu = getElementByIdAndRemoveId('sailing-ship-menu', parent);
      this.portMenu = getElementByIdAndRemoveId('sailing-port-menu', parent);

      this.tradeContainer = getElementByIdAndRemoveId('trade-container', parent);
      this.shipContainer = getElementByIdAndRemoveId('ship-container', parent);
      this.portContainer = getElementByIdAndRemoveId('port-container', parent);

      game.sailing.ships.forEach((ship) => {
        const shipComponent = ShipComponent(ship);
        this.shipComponents.push(shipComponent);
        ui.create(shipComponent, this.shipContainer);

        const tradeComponent = TradeComponent(ship);
        this.tradeComponents.push(tradeComponent);
        ui.create(tradeComponent, this.tradeContainer);
      });

      game.sailing.ports.forEach((port) => {
        const portComponent = PortComponent(port, this.portContainer, {
          showLoot: true,
        });
        this.portComponents.push(portComponent);
        ui.create(portComponent, this.portContainer);
      });

      this.changeCategory(this.tradeMenu, this.tradeContainer);
      // this.changeCategory(this.shipMenu, this.shipContainer);
      // this.changeCategory(this.portMenu, this.portContainer);
    },
    update() {
      this.showShipsButton = sailing.ships.every((ship) => ship.lockState == LockState.Locked);
      game.sailing.logger.debug('SailingPageComponent.update');
      this.tradeComponents.forEach((tradeComponent) => {
        tradeComponent.update();
      });
      this.shipComponents.forEach((shipComponent) => {
        shipComponent.update();
      });
      this.portComponents.forEach((portComponent) => {
        portComponent.update();
      });
    },
    changeCategory(ele: HTMLElement, category: HTMLElement) {
      this.tradeMenu.classList.remove('township-tab-selected');
      this.shipMenu.classList.remove('township-tab-selected');
      this.portMenu.classList.remove('township-tab-selected');
      ele.classList.add('township-tab-selected');
      this.tradeContainer.classList.add('d-none');
      this.shipContainer.classList.add('d-none');
      this.portContainer.classList.add('d-none');
      category.classList.remove('d-none');
    },
    dismissInfoAlert() {
      localStorage.setItem('sailing:infoAlertDismissed', 'true');
      this.infoAlert.classList.add('d-none');
    },
  };
}

