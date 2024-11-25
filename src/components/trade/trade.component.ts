import { Instance } from 'tippy.js';
import { Port } from '../../ts/port';
import { LockState, Ship, ShipState } from '../../ts/ship';
import { formatTime, getElementByIdAndRemoveId, tickToTime } from '../../ts/util';
import { PortComponent } from '../port.component';

export function TradeComponent(ship: Ship) {
  return {
    $template: '#sailing-trade-template',
    ship,
    selectedPort: ship.selectedPort,
    currentUpgrade: ship.currentUpgrade,
    isLocked: true,
    readyToSail: true,
    onTrip: false,
    hasReturned: false,
    successChance: 0,
    returnTimer: 'Done',
    xpIcon: null as unknown as XpIconElement,
    masteryIcon: null as unknown as MasteryXpIconElement,
    masteryPoolIcon: null as unknown as MasteryPoolIconElement,
    intervalIcon: null as unknown as IntervalIconElement,
    progressBar: null as unknown as ProgressBarElement,
    shipInfo: null as unknown as Instance,
    portInfo: null as unknown as Instance,
    mounted() {
      const parent = document.getElementById(`trade:${ship.localID}`);
      if (!parent) throw new Error(`Could not find parent element with id: ${ship.localID}`);

      ship.registerOnUpdate(() => {
        this.update();
      });

      const grantsContainer = getElementByIdAndRemoveId('grants-container', parent);

      this.xpIcon = getElementByIdAndRemoveId('sailing-xp', grantsContainer);
      this.masteryIcon = getElementByIdAndRemoveId('sailing-mastery-xp', grantsContainer);
      this.masteryPoolIcon = getElementByIdAndRemoveId('sailing-pool-xp', grantsContainer);
      this.intervalIcon = getElementByIdAndRemoveId('sailing-interval', grantsContainer);
      this.progressBar = getElementByIdAndRemoveId('sailing-progress-bar', parent);
      const shipInfo = getElementByIdAndRemoveId('ship-info', parent);
      this.shipInfo = tippy(shipInfo, {
        placement: 'top',
        allowHTML: true,
        interactive: false,
        animation: false,
        popperOptions: {
            strategy: 'fixed',
            modifiers: [{
                name: 'flip',
                options: {
                    fallbackPlacements: ['top'],
                },
            }, {
                name: 'preventOverflow',
                options: {
                    altAxis: true,
                    tether: false,
                },
            }],
        },
      });
      const portInfo = getElementByIdAndRemoveId('port-info', parent);
      this.portInfo = tippy(portInfo, {
        placement: 'top',
        allowHTML: true,
        interactive: false,
        animation: false,
        popperOptions: {
            strategy: 'fixed',
            modifiers: [{
                name: 'flip',
                options: {
                    fallbackPlacements: ['top'],
                },
            }, {
                name: 'preventOverflow',
                options: {
                    altAxis: true,
                    tether: false,
                },
            }],
        },
      });
    },
    update() {
      this.isLocked = ship.lockState == LockState.Locked;
      this.readyToSail = ship.state == ShipState.ReadyToSail;
      this.onTrip = ship.state == ShipState.OnTrip;
      this.hasReturned = ship.state == ShipState.HasReturned;
      this.selectedPort = ship.selectedPort;
      this.currentUpgrade = ship.currentUpgrade;
      const combatMod = game.sailing.getCombatModifier(ship.dock);
      this.successChance = Math.round(Math.min(1, combatMod / ship.selectedPort.sailingStats.combat) * 100);

      game.sailing.updateActionMasteries();
      this.updateGrants();
      this.updateProgressBar();
      this.updateInfoTooltips();
    },
    updateReturnTimer() {
        if (ship.sailTimer.ticksLeft <= 0) {
          if (this.returnTimer !== 'Done') this.returnTimer = 'Done';
        } else {
          this.returnTimer = tickToTime(ship.sailTimer.ticksLeft);
        }
    },
    updateInfoTooltips() {
      const shipStats = ship.currentUpgrade.stats.describeAsSpanHTML();
      this.shipInfo.setContent(shipStats.length > 0 ? shipStats : 'No Bonuses');
      this.portInfo.setContent(`${ship.selectedPort.sailingStats.combat} Combat`);
    },
    updateGrants() {
      const baseMasteryXPToAdd = game.sailing.getBaseMasteryXPToAddForAction(ship.dock, ship.scaledForMasteryInterval);
      const masteryXPToAdd = game.sailing.getMasteryXPToAddForAction(ship.dock, ship.scaledForMasteryInterval);
      const masteryPoolXPToAdd = game.sailing.getMasteryXPToAddToPool(masteryXPToAdd);
      this.xpIcon.setXP(game.sailing.modifyXP(ship.baseXP, ship.dock), ship.baseXP);
      this.xpIcon.setSources(game.sailing.getXPSources(ship.dock));
      this.masteryIcon.setXP(masteryXPToAdd, baseMasteryXPToAdd);
      this.masteryIcon.setSources(game.sailing.getMasteryXPSources(ship.dock));
      this.masteryPoolIcon.setXP(masteryPoolXPToAdd);
      if (game.unlockedRealms.length > 1) {
        this.masteryPoolIcon.setRealm(game.defaultRealm);
      } else {
        this.masteryPoolIcon.hideRealms();
      }
      this.intervalIcon.setCustomInterval(
        formatTime(ship.modifiedInterval / 1000),
        game.sailing.getIntervalSources(ship.dock),
      );
    },
    updateProgressBar() {
      if (ship.onTrip) {
        this.progressBar.animateProgressFromTimer(ship.sailTimer);
      } else {
        this.progressBar.stopAnimation();
      }
    },
    setSail() {
      ship.setSail();
      this.updateProgressBar();
    },
    collectLoot() {
      ship.collectLoot();
    },
    async selectPort() {
      const html = document.createElement('div');
      html.classList.add(
        'row',
        'row-deck',
        'gutters-tiny',
        'row-cols-1',
        'row-cols-md-2',
        'row-cols-xl-3',
        'row-cols-xxl-6',
      );
      const portComponents: ReturnType<typeof PortComponent>[] = [];
      game.sailing.ports.forEach((port) => {
        const portComponent = PortComponent(port, html, {
          onSelect: () => {
            for (const comp of portComponents) {
              if (comp === portComponent) continue;
              comp.deselect();
            }
          },
          ship,
          tradeComponent: this,
        });
        portComponents.push(portComponent);
        ui.create(portComponent, html);
      });
      game.sailing.updateActionMasteries();
      return SwalLocale.fire<Port | undefined>({
        iconHtml: `<img class="mbts__logo-img" src="${ship.media}" />`,
        title: ship.name,
        width: '75%',
        customClass: {
          ...defaultSwalCustomClass,
          htmlContainer: 'container-fluid',
        },
        html,
        showCancelButton: true,
        preConfirm: () => {
          return portComponents.find((port) => port.isSelected)?.port;
        },
        confirmButtonText: 'Select',
      }).then((result) => {
        if (result.isConfirmed && result.value) {
          ship.selectedPort = this.selectedPort = result.value;
          this.update();
        }
      });
    },
  };
}
