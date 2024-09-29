<div id="interface-version" class="d-none">201</div><!-- START Component Templates -->
<template id="summoning-mark-menu-template">
  <div class="block-content">
    <div class="row" id="discovery-container">
      <div class="col-12 text-center">
        <h5 class="h4 font-w600 text-combat-smoke mb-1">
          <img class="m-0 mr-2" id="category-image" style="width:32px;">
          <span id="category-name"></span>
        </h5>
      </div>
      <div class="col-12 text-center">
        <h5 class="font-w600 font-size-sm text-warning">
          <lang-string lang-id="MENU_TEXT_MARK_INFO_0"></lang-string><br><br>
          <lang-string lang-id="MENU_TEXT_MARK_INFO_1"></lang-string><br>
          <span class="text-danger">
            <lang-string lang-id="MENU_TEXT_MARK_INFO_2"></lang-string>
          </span>
        </h5>
      </div>
      <div class="col-12 text-center">
        <h5 class="font-w600 font-size-sm text-success">
          <lang-string lang-id="MENU_TEXT_MARK_INFO_3" lang-html="true"></lang-string>
        </h5>
      </div>
    </div>
  </div>
</template><template id="township-casual-task-template">
  <div class="block block-rounded">
    <div class="block-header block-header-default bg-daily p-2">
      <ul class="nav-main nav-main-horizontal nav-main-horizontal-override nav-justified font-size-sm w-100">
        <li class="nav-item text-left">
          <h3 class="block-title"><lang-string lang-id="TOWNSHIP_TASKS_DAILY_TASK"></lang-string></h3>
        </li>
        <li class="nav-item text-right">
          <a class="btn btn-sm btn-dark pointer-enabled font-w600" id="skip-button"></a>
        </li>
      </ul>
    </div>
    <div class="p-2 bg-combat-inner-dark">
      <h5 class="font-w600 font-size-sm mb-1 text-warning" id="task-description"></h5>
      <div class="township-task-container" id="goal-container"></div>
      <div class="font-w600 text-success">
        <lang-string lang-id="MENU_TEXT_TOWNSHIP_TASK_REWARDS"></lang-string>
        <div class="township-task-container" id="rewards-container"></div>
        <button class="btn btn-sm btn-success" id="complete-button">
          <lang-string lang-id="TOWNSHIP_TASKS_CLAIM_REWARDS"></lang-string>
        </button>
      </div>
    </div>
  </div>
</template>
<template id="defensive-stats-template">
  <div class="block block-rounded-double bg-combat-inner-dark pb-2 p-0 mb-0">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
        <lang-string lang-id="COMBAT_MISC_91"></lang-string>
      </h5>
    </div>
    <evasion-table id="evasion"></evasion-table>
    <div role="separator" class="dropdown-divider mx-2"></div>
    <resistance-table id="resistance"></resistance-table>
  </div>
</template><template id="attack-spell-menu-template">
  <div class="row" id="spell-container">
    <div class="col-12">
      <small class="text-warning">
        <span id="book-name"></span><br>
        <span id="curse-aurora-info"></span>
      </small>
    </div>
    <div class="col-12" id="no-damage-modifiers-container">
      <small class="text-danger">
        <i class="fa fa-fw fa-info-circle mr-2"></i>
        <span id="no-damage-modifiers-message"></span>
      </small>
    </div>
    <div class="col-12" id="no-special-attacks-container">
      <small class="text-danger">
        <i class="fa fa-fw fa-info-circle mr-2"></i>
        <span id="no-special-attacks-message"></span>
      </small>
    </div>
  </div>
</template><template id="firemaking-bonfire-menu-template">
  <div class="block block-rounded border-top border-firemaking border-4x">
    <div class="block-content block-content-full">
      <div class="row row-deck gutters-tiny">
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="font-size-sm font-w400 text-center text-dark justify-vertical-center">
              <img id="bonfire-image" class="skill-icon-md" />
              <div>
                <span id="status-text" class="mr-2"></span><span class="text-danger" id="status-state"></span>
              </div>
              <div id="standard-xp-bonus">
                <span class="mr-2"><lang-string lang-id="MENU_TEXT_FIREMAKING_XP_BONUS"></lang-string></span><span
                  class="text-success" id="standard-xp-percent">0%</span>
              </div>
              <div id="abyssal-xp-bonus">
                <span class="mr-2"><lang-string lang-id="FIREMAKING_AXP_BONUS"></lang-string></span><span
                  class="text-success" id="abyssal-xp-percent">0%</span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="justify-vertical-center">
              <div class="justify-horizontal-center icon-size-48 mb-2">
                <button class="btn btn-primary m-1 p-2" type="button" style="min-height: 48px" id="light-button">
                  <lang-string lang-id="MENU_TEXT_LIGHT_BONFIRE"></lang-string>
                </button>
                <button class="btn btn-danger m-1 p-2 d-none" type="button" style="min-height: 48px" id="stop-button">
                  <lang-string lang-id="MENU_TEXT_STOP_BONFIRE"></lang-string>
                </button>
                <interval-icon id="interval"></interval-icon>
              </div>
              <progress-bar class="progress-height-5 w-80" id="progress-bar"></progress-bar>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2 text-center">
            <span class="font-w600 text-info"><lang-string
                lang-id="MENU_TEXT_FIREMAKING_BONFIRE_NOTICE"></lang-string></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template><template id="level-cap-purchase-button-template">
  <button class="btn btn-sm btn-success font-size-xs" id="increase-button"><span id="text"></span> <span id="cap-change"></span></button>
</template><template id="ancient-relics-menu-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="skill-dropdown-button"></button>
        <div class="dropdown-menu dropdown-menu-right font-size-sm max-vh-60 overflow-y-auto" id="skill-dropdown-options">
        </div>
      </div>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block block-content mb-0">
      <realm-tab-select class="d-block mb-2" id="realm-select"></realm-tab-select>
      <div class="row gutters-tiny">
        <div class="col-12 col-lg-6">
          <img id="relic-image" data-src="assets/media/main/relic_progress_0.png" class="w-100 mb-3">
        </div>
        <div class="col-12 col-lg-6">
          <h5 class="font-size-sm font-w400 mb-2"><lang-string lang-id="ANCIENT_RELICS_NOTICE_0"></lang-string></h5>
          <h5 class="font-size-sm font-w400 mb-2 text-warning" id="level-unlock-notice"><lang-string lang-id="ANCIENT_RELICS_NOTICE_1"></lang-string></h5>
          <ul class="nav-main px-3" id="relics-container"></ul>
          <h5 class="font-size-sm mb-2"><lang-string lang-id="ANCIENT_RELICS_NOTICE_2"></lang-string></h5>
          <ul class="nav-main px-3">
            <ancient-relic id="completed-relic"></ancient-relic>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template><template id="township-tasks-menu-template">
  <div class="row">
    <div class="col-12">
      <ul class="nav-main nav-main-horizontal flex-wrap font-w600 font-size-sm ">
        <li class="m-1 mr-2" id="casual-tasks-completed"></li>
        <li class="m-1 mr-2" id="next-casual-task-timer"></li>
      </ul>
    </div>
    <div class="col-12 mb-2" id="button-container">
      <button class="btn btn-sm m-1 bg-primary text-white" id="view-all-button"><lang-string lang-id="TOWNSHIP_MENU_VIEW_ALL"></lang-string></button>
      <button class="btn btn-sm m-1 bg-daily text-white" id="casual-task-button"><lang-string lang-id="TOWNSHIP_TASKS_CASUAL_TASKS"></lang-string></button>
    </div>
    <div class="col-12">
      <div class="row" id="category-container">
        <township-casual-task-category class="col-12 col-md-6 col-xl-4 mb-3" id="casual-task-category"></township-casual-task-category>
      </div>
    </div>
    <div class="col-12 d-none" id="task-container"></div>
    <div class="col-12 d-none" id="casual-task-container"></div>
  </div>
</template><template id="player-stats-template">
  <div class="d-none" id="triangle-tooltip-elem"></div>
  <div class="block block-rounded-double bg-combat-inner-dark p-0 mb-2">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
        <lang-string lang-id="COMBAT_MISC_77"></lang-string>
      </h5>
      <img
        class="skill-icon-xxs"
        data-src="assets/media/main/cb_triangle_icon.png"
        id="combat-triangle-icon"
        style="position: absolute; right: 16px"
      />
    </div>
    <div class="combat-stats-table px-2 text-combat-smoke font-size-sm">
      <div>
        <lang-string lang-id="DAMAGE_TYPE"></lang-string>
        <span>
          <img class="skill-icon-xxs m-0 mr-1" id="damage-type-icon" />
          <span id="damage-type-name"></span>
        </span>
      </div>
      <div role="separator" class="dropdown-divider"></div>
      <div>
        <lang-string lang-id="MINIMUM_HIT"></lang-string>
        <span>
          <img
            class="skill-icon-xxs m-0 mr-2 d-none"
            data-src="assets/media/main/cb_triangle_icon.png"
            id="max-hit-triangle-icon-0"
          />
          <span id="min-hit"></span>
        </span>
      </div>
      <div>
        <lang-string lang-id="GAME_GUIDE_30"></lang-string>
        <span>
          <img
            class="skill-icon-xxs m-0 mr-2 d-none"
            data-src="assets/media/main/cb_triangle_icon.png"
            id="max-hit-triangle-icon-1"
          />
          <span id="max-hit"></span>
        </span>
      </div>
      <div id="summoning-max-hit-container">
        <span>
          <img
            class="skill-icon-xxs m-0 mr-1"
            data-src="assets/media/skills/summoning/summoning.png"
            id="summoning-icon"
          />
          <lang-string lang-id="GAME_GUIDE_30"></lang-string>
        </span>
        <span>
          <img
            class="skill-icon-xxs m-0 mr-2 d-none"
            data-src="assets/media/main/cb_triangle_icon.png"
            id="max-hit-triangle-icon-2"
          />
          <span id="summoning-max-hit"></span>
        </span>
      </div>
      <div id="barrier-max-hit-container">
        <span>
          <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/combat/barrier.png" id="barrier-icon" />
          <lang-string lang-id="GAME_GUIDE_30"></lang-string>
        </span>
        <span>
          <img
            class="skill-icon-xxs m-0 mr-2 d-none"
            data-src="assets/media/main/cb_triangle_icon.png"
            id="max-hit-triangle-icon-3"
          />
          <span id="barrier-max-hit"></span>
        </span>
      </div>
      <div>
        <lang-string lang-id="COMBAT_MISC_13"></lang-string>
        <span id="hit-chance"></span>
      </div>
      <div>
        <lang-string lang-id="COMBAT_MISC_14"></lang-string>
        <span id="accuracy-rating"></span>
      </div>
      <div>
        <lang-string lang-id="CRIT_CHANCE"></lang-string>
        <span id="crit-chance"></span>
      </div>
      <div>
        <lang-string lang-id="CRIT_MULTIPLIER"></lang-string>
        <span id="crit-multiplier"></span>
      </div>
      <div>
        <lang-string lang-id="LIFESTEAL"></lang-string>
        <span id="lifesteal"></span>
      </div>
      <div role="separator" class="dropdown-divider"></div>
    </div>
    <resistance-table id="resistance"></resistance-table>
    <div role="separator" class="dropdown-divider mx-2"></div>
    <evasion-table id="evasion"></evasion-table>
    <div role="separator" class="dropdown-divider mx-2"></div>
    <div class="combat-stats-table px-2 text-combat-smoke font-size-sm">
      <div class="d-none" id="prayer-level-container">
        <span>
          <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/prayer/prayer.png" />
          <lang-string lang-id="COMBAT_MISC_79"></lang-string>
        </span>
        <span id="prayer-level"></span>
      </div>
      <div>
        <span>
          <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/prayer/prayer.png" />
          <lang-string lang-id="COMBAT_MISC_16"></lang-string>
        </span>
        <span id="prayer-points"></span>
      </div>
      <div id="soul-points-container">
        <span>
          <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/bank/Lesser_Soul.png" />
          <lang-string lang-id="SOUL_POINTS"></lang-string>
        </span>
        <span id="soul-points"></span>
      </div>
      <div>
        <span>
          <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/prayer/prayer.png" />
          <lang-string lang-id="COMBAT_MISC_17"></lang-string>
        </span>
        <span id="active-prayers"></span>
      </div>
    </div>
  </div>
</template>
<template id="spell-button-template">
  <ul class="nav nav-pills nav-justified push">
    <li class="nav-item mr-1">
      <small class="text-warning">
        <a class="pointer-enabled nav-link border border-dark p-0" id="link">
          <img class="skill-icon-xs" id="spell-image">
        </a>
      </small>
    </li>
  </ul>
</template><template id="resistance-span-template">
  <span>
    <img class="skill-icon-xxs m-0 mr-1" id="icon">
    <span id="name"></span>
  </span>
  <span id="value"></span>
</template><template id="combat-skill-progress-table-template">
  <table class="table table-sm table-vcenter">
    <thead>
      <tr>
        <th class="text-center" style="width: 50px"><small>#</small></th>
        <th style="width: 75px">
          <small>
            <lang-string lang-id="MENU_TEXT_LEVEL_HEADER"></lang-string>
          </small>
        </th>
        <th style="width: 50px"><small>%</small></th>
        <th class="d-none d-md-table-cell" style="width: 20%">
          <small>
            <lang-string lang-id="MENU_TEXT_XP_HEADER"></lang-string>
          </small>
        </th>
        <th style="width: 20%" id="level-cap-header"></th>
        <th>
          <small>
            <lang-string lang-id="TUTORIAL_MISC_0"></lang-string>
          </small>
        </th>
      </tr>
    </thead>
    <tbody id="table-body"></tbody>
  </table>
</template>
<template id="combat-skill-progress-table-row-template">
  <tr id="row">
    <th class="text-center" scope="row">
      <img class="skill-icon-xs" id="skill-image" />
    </th>
    <td class="font-w600 font-size-sm">
      <div id="skill-level-container-0"><small id="skill-level"></small></div>
      <div id="abyssal-level-container-0">
        <img class="skill-icon-xxs mr-1" data-src="assets/media/skills/combat/abyssal_damage.png" /><small
          id="abyssal-level"
        ></small>
      </div>
    </td>
    <td class="font-w600 font-size-sm">
      <div id="skill-level-container-1"><small id="skill-level-progress"></small></div>
      <div id="abyssal-level-container-1"><small id="abyssal-level-progress"></small></div>
    </td>
    <td class="font-w600 font-size-sm d-none d-md-table-cell">
      <div id="skill-level-container-2"><small id="skill-xp"></small></div>
      <div id="abyssal-level-container-2"><small id="abyssal-xp"></small></div>
    </td>
    <td class="font-size-sm" id="level-cap-container">
      <level-cap-purchase-button id="level-cap-button"></level-cap-purchase-button>
      <level-cap-purchase-button id="abyssal-level-cap-button"></level-cap-purchase-button>
    </td>
    <td>
      <div class="progress active my-1" style="height: 8px" id="skill-progress-bar-container">
        <div
          class="progress-bar bg-info"
          id="skill-progress-bar"
          role="progressbar"
          style="width: 69%"
          aria-valuenow="0"
          aria-valuemin="0"
          aria-valuemax="100"
        ></div>
      </div>
      <div class="progress active my-1" style="height: 8px" id="abyssal-progress-bar-container">
        <div
          class="progress-bar bg-danger"
          id="abyssal-progress-bar"
          role="progressbar"
          style="width: 69%"
          aria-valuenow="0"
          aria-valuemin="0"
          aria-valuemax="100"
        ></div>
      </div>
    </td>
  </tr>
</template>
<template id="curse-spell-menu-template">
  <div class="row" id="spell-container">
    <div class="col-12">
      <small class="text-warning">
        <lang-string lang-id="COMBAT_MISC_CURSE_SPELLBOOK_NAME"></lang-string><br>
        <lang-string lang-id="COMBAT_MISC_CURSE_SPELLBOOK_DESC"></lang-string>
      </small>
    </div>
  </div>
</template><template id="curse-spell-tooltip-template">
  <div class="justify-vertical-center font-size-sm text-center">
    <span class='text-warning font-size-base' id="spell-name"></span>
    <lang-string lang-id="COMBAT_MISC_GIVES_THE_ENEMY"></lang-string>
    <span class="text-danger" id="enemy-modifiers"></span>
    <span id="enemy-turns"></span>
    <spell-tooltip-runes id="rune-costs"></spell-tooltip-runes>
  </div>
</template><template id="firemaking-log-menu-template">
  <div class="block block-rounded border-top border-firemaking border-4x">
    <div class="block-content block-content-full">
      <div class="row row-deck gutters-tiny">
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="font-size-sm font-w400 text-dark">
              <div id="realm-select">
                <div class="d-lg-none">
                  <button class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke" type="button" id="expand-button">
                    <span><lang-string lang-id="MENU_TEXT_SELECT_LOGS"></lang-string></span>
                    <i class="fa fa-bars"></i>
                  </button>
                </div>
                <div class="d-none d-lg-block mt-2 mt-lg-0" id="expand-div">
                  <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center" id="realm-container"></ul>
                </div>
              </div>
              <div class="dropdown text-center" id="dropdown-select">
                <button type="button" class="btn btn-light dropdown-toggle" id="log-select-button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <lang-string lang-id="MENU_TEXT_SELECT_LOGS"></lang-string>
                </button>
                <div class="dropdown-menu font-size-sm overflow-y-auto" aria-labelledby="log-select-button"
                  x-placement="bottom-start"
                  style="max-height: 60vh; z-index: 9999;position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);"
                  id="log-options-container">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="block block-rounded-double bg-combat-inner-dark">
            <div class="justify-vertical-center h-100">
              <item-current-icon class="icon-size-64" id="log-quantity"></item-current-icon>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <h5 class="font-size-sm font-w600 text-muted m-1">
              <small>
                <lang-string lang-id="MENU_TEXT_BURN"></lang-string>
              </small>
            </h5>
            <h5 class="font-w700 text-left text-combat-smoke m-1">
              <span id="log-name">-</span>
            </h5>
            <div class="justify-horizontal-left icon-size-48">
              <preservation-icon id="preservation"></preservation-icon>
              <doubling-icon id="doubling"></doubling-icon>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark">
            <div class="row no-gutters">
              <div class="col-md-2"></div>
              <div class="col-12 col-md-8">
                <mastery-display class="mastery-6" id="mastery"></mastery-display>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12" id="primary-products">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="row no-gutters">
              <div class="col-12 col-sm-6">
                <h5 class="font-w600 font-size-sm mb-1 text-center">
                  <lang-string lang-id="MENU_TEXT_PRODUCES"></lang-string>
                </h5>
                <div class="justify-horizontal-center flex-wrap icon-size-48" id="primary-icon-container"></div>
              </div>
              <haves-box class="col-12 col-sm-6 icon-size-48" id="primary-haves"></haves-box>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <grants-box class="icon-size-48" id="grants"></grants-box>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="justify-vertical-center">
              <div class="justify-horizontal-center icon-size-48 mb-2">
                <button class="btn btn-warning m-1 p-2" type="button" style="min-height: 48px;" id="burn-button">
                  <lang-string lang-id="MENU_TEXT_BURN"></lang-string>
                </button>
                <interval-icon id="interval"></interval-icon>
              </div>
              <progress-bar class="progress-height-5 w-80" id="progress-bar"></progress-bar>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template><template id="skill-header-template">
  <div class="block block-rounded mb-0">
    <div class="progress active mb-0 border border-top border-1x border-dark" style="height: 8px"
      id="skill-level-container-0">
      <div class="progress-bar bg-info" id="skill-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
        aria-valuemin="0" aria-valuemax="100">
      </div>
    </div>
    <div class="progress active mb-0 border border-top border-1x border-dark" style="height: 8px"
      id="abyssal-level-container-0">
      <div class="progress-bar bg-danger" id="abyssal-progress-bar" role="progressbar" style="width: 0%;"
        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
      </div>
    </div>
    <div class="skill-header-container font-size-xs font-w600" id="upper-container">
      <div class="justify-horizontal-center" id="skill-level-container-1">
        <lang-string class="mr-1" lang-id="MENU_TEXT_SKILL_LEVEL"></lang-string>
        <span class="bg-success skill-header-badge" id="skill-level"></span>
      </div>
      <div class="justify-vertical-center">
        <div class="justify-horizontal-center" id="skill-level-container-2">
          <lang-string class="mr-1" lang-id="MENU_TEXT_SKILL XP"></lang-string><span class="bg-info skill-header-badge"
            id="skill-xp"></span>
        </div>
        <span class="text-danger d-none" id="combat-level-xp-limit"><i class="fa fa-info-circle mr-1"></i><lang-string
            lang-id="MENU_TEXT_ADV_MODE_XP_LIMIT_WARNING"></lang-string></span>
      </div>
      <div class="justify-horizontal-center" id="abyssal-level-container-1">
        <lang-string class="mr-1" lang-id="ABYSSAL_LEVEL"></lang-string><span class="bg-danger skill-header-badge"
          id="abyssal-level"></span>
      </div>
      <div class="justify-horizontal-center" id="abyssal-level-container-2">
        <lang-string class="mr-1" lang-id="ABYSSAL_XP"></lang-string><span class="bg-danger skill-header-badge"
          id="abyssal-xp"></span>
      </div>
      <div id="upgrade-chain-container"></div>
      <div id="item-charge-container"></div>
    </div>
    <div class="skill-header-container" id="lower-container">
      <level-cap-purchase-button id="level-cap-button"></level-cap-purchase-button>
      <level-cap-purchase-button id="abyssal-level-cap-button"></level-cap-purchase-button>
      <skill-tree-button id="skill-tree-button"></skill-tree-button>
    </div>
  </div>
</template><template id="triangle-damage-tooltip-template">
  <div class="justify-vertical-center text-center font-size-sm">
    <span id="attack-types"></span>
    <div>
      <lang-string class="text-warning" lang-id="COMBAT_MISC_DAMAGE_DEALT_MULT"></lang-string>
      <span id="damage-multiplier"></span>
    </div>
    <div>
      <lang-string class="text-warning" lang-id="COMBAT_MISC_DAMAGE_REDUCTION_MULT"></lang-string>
      <span id="resistance-multiplier"></span>
    </div>
  </div>
</template>
<template id="harvesting-vein-template">
  <div
    class="block block-rounded block-link-pop border-top border-danger border-4x justify-vertical-center d-none"
    id="locked-container"
  >
    <div class="block-content block-content-full bg-light pb-0">
      <div class="font-size-sm font-w600 text-center text-muted">
        <span id="harvesting-locked-text"><lang-string lang-id="MENU_TEXT_LOCKED"></lang-string></span><br />
        <img class="mining-ore-img m-3" data-src="assets/media/skills/harvesting/harvesting.png" /><br />
        <span class="badge badge-danger badge-pill w-100 mb-1" id="next-level">Level 69</span>
        <span class="badge badge-danger badge-pill w-100 mb-1" id="next-abyssal-level">Abyssal Level 69</span>
      </div>
    </div>
  </div>
  <div id="unlocked-container">
    <a
      class="block block-rounded block-link-pop border-top border-harvesting border-4x pointer-enabled"
      id="vein-button"
    >
      <div class="block-content block-content-full bg-light pb-0">
        <div class="media d-flex align-items-center">
          <div class="mr-2">
            <img class="mining-ore-img" id="vein-image" data-src="assets/media/bank/rune_essence.png" />
          </div>
          <div class="media-body text-center">
            <div class="font-w600 font-size-xs">
              <lang-string id="vein-status-text" lang-id="MENU_TEXT_HARVEST"></lang-string>
            </div>
            <div class="font-w600">
              <span id="vein-name-text"></span>
            </div>
            <div class="row justify-content-center gutters-tiny text-center icon-size-32">
              <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
              <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
              <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
              <interval-icon id="interval-icon"></interval-icon>
            </div>
            <div id="vein-requirement-text" class="font-size-sm font-w400 text-center text-danger d-none"></div>
          </div>
        </div>
        <div class="font-size-sm font-w600 text-center text-muted">
          <br /><small id="vein-hp-progress-text"></small> <br /><small id="vein-quantity-text"></small>
        </div>
        <progress-bar class="progress-height-5 mb-1" id="hp-progress"></progress-bar>
        <progress-bar class="mb-2" id="harvesting-progress"></progress-bar>
        <div class="font-size-sm font-w600 text-center text-muted">
          <small id="vein-chance-text"></small>
        </div>
        <ul class="nav-main nav-main-horizontal nav-main-horizontal-justify font-size-sm" id="vein-products"></ul>
      </div>
      <div class="block-content bg-light">
        <mastery-display id="mastery-display" class="mastery-8"></mastery-display>
      </div>
    </a>
  </div>
</template>
<template id="township-casual-task-category-template">
  <a class="block block-rounded block-link-pop pointer-enabled" id="button">
    <div class="block-content block-content-full bg-daily">
      <div class="media d-flex align-items-center push mb-0">
        <img class="mr-2 height-48" data-src="assets/media/skills/woodcutting/woodcutting.png" />
        <div class="media-body text-left">
          <h4 class="font-w600 text-left text-white mb-0">
            <lang-string lang-id="TOWNSHIP_TASKS_CASUAL_TASKS"></lang-string
            ><i class="fa fa-exclamation-circle ml-1 text-success" id="completion-icon"></i>
          </h4>
          <h5 class="font-size-sm font-w400 text-left text-warning mb-1" id="tasks-remaining"></h5>
        </div>
      </div>
    </div>
  </a>
</template>
<template id="spellbook-menu-template">
  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2 mb-2">
    <div class="row no-gutters">
      <div class="col-6">
        <h5 class="font-w700 text-combat-smoke text-left m-1 mb-2">
          <lang-string lang-id="COMBAT_MISC_70"></lang-string>
        </h5>
      </div>
      <div class="col-6">
        <h5 class="font-w400 text-right m-1 mb-2">
          <small id="weapon-notice" class="text-danger">
            <lang-string lang-id="COMBAT_MISC_71"></lang-string>
          </small>
        </h5>
      </div>
    </div>
    <div class="p-1">
      <div class="row no-gutters">
        <div class="col-12 push">
          <div class="btn-group w-100" role="group" id="attack-button-group"></div>
        </div>
        <div class="col-12 push">
          <div class="btn-group w-100" role="group">
            <button class="btn btn-sm btn-outline-secondary" id="curse-button">
              <img class="skill-icon-xs" data-src="assets/media/skills/combat/curses.png" />
            </button>
            <button class="btn btn-sm btn-outline-secondary" id="aurora-button">
              <img class="skill-icon-xs" data-src="assets/media/skills/combat/auroras.png" />
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="p-1">
      <attack-spell-menu id="attack-spell-menu"></attack-spell-menu>
      <curse-spell-menu id="curse-spell-menu" class="d-none"></curse-spell-menu>
      <aurora-spell-menu id="aurora-spell-menu" class="d-none"></aurora-spell-menu>
    </div>
    <div class="p-1" id="combat-runes-option">
      <div class="row">
        <div class="col-12 text-center">
          <settings-checkbox
            class="bg-light rounded p-2 text-center font-size-sm justify-vertical-center"
            data-setting-id="useCombinationRunes"
          ></settings-checkbox>
        </div>
      </div>
    </div>
    <div class="p-1">
      <div class="row">
        <div class="col-12 font-w400 font-size-sm text-center">
          <div class="bg-light rounded p-2 text-center font-size-sm">
            <div class="text-warning"><lang-string lang-id="COMBAT_MISC_73"></lang-string></div>
            <div><lang-string lang-id="COMBAT_MISC_74"></lang-string></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="combat-levels-template">
  <div class="combat-stats-table font-size-sm">
    <div id="hitpoints-container" class="d-none">
      <span
        ><img class="skill-icon-xxs" data-src="assets/media/skills/combat/hitpoints.png" id="hitpoints-icon"
      /></span>
      <small id="max-hitpoints">-</small>
    </div>
    <div>
      <span><img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" id="combat-icon" /></span>
      <small id="combat-level">-</small>
    </div>
    <div>
      <span><img class="skill-icon-xxs" data-src="assets/media/skills/attack/attack.png" id="attack-icon" /></span>
      <small id="attack-level">-</small>
    </div>
    <div>
      <span
        ><img class="skill-icon-xxs" data-src="assets/media/skills/strength/strength.png" id="strength-icon"
      /></span>
      <small id="strength-level">-</small>
    </div>
    <div>
      <span><img class="skill-icon-xxs" data-src="assets/media/skills/defence/defence.png" id="defence-icon" /></span>
      <small id="defence-level">-</small>
    </div>
    <div>
      <span><img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" id="ranged-icon" /></span>
      <small id="ranged-level">-</small>
    </div>
    <div>
      <span><img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" id="magic-icon" /></span>
      <small id="magic-level">-</small>
    </div>
    <div id="corruption-container" class="d-none">
      <span
        ><img class="skill-icon-xxs" data-src="assets/media/skills/corruption/corruption.png" id="corruption-icon"
      /></span>
      <small id="corruption-level">-</small>
    </div>
  </div>
</template>
<template id="evasion-table-template">
  <div class="combat-stats-table px-2 text-combat-smoke font-size-sm">
    <div>
      <span>
        <img class="skill-icon-xxs mr-1" data-src="assets/media/skills/combat/attack.png" id="melee-icon" />
        <lang-string lang-id="COMBAT_MISC_15"></lang-string>
      </span>
      <span id="melee-evasion"></span>
    </div>
    <div>
      <span>
        <img class="skill-icon-xxs mr-1" data-src="assets/media/skills/ranged/ranged.png" id="ranged-icon" />
        <lang-string lang-id="COMBAT_MISC_15"></lang-string>
      </span>
      <span id="ranged-evasion"></span>
    </div>
    <div>
      <span>
        <img class="skill-icon-xxs mr-1" data-src="assets/media/skills/magic/magic.png" id="magic-icon" />
        <lang-string lang-id="COMBAT_MISC_15"></lang-string>
      </span>
      <span id="magic-evasion"></span>
    </div>
  </div>
</template>
<template id="attack-spell-tooltip-template">
  <div class="justify-vertical-center font-size-sm text-center">
    <span class="text-warning font-size-base font-w600" id="spell-name"></span>
    <span class="font-size-xs" id="spell-damage"></span>
    <span class="font-size-xs" id="combat-effects"></span>
    <span class="font-size-xs" id="special-attack"></span>
    <spell-tooltip-runes id="rune-costs" class="font-size-xs"></spell-tooltip-runes>
  </div>
</template>
<template id="skill-sidebar-aside-template">
  <span class="spinner-border spinner-border-sm text-info" id="loading-spinner"></span>
  <i class="fa fa-lock text-danger d-none" id="lock-icon"></i>
  <span class="d-none" id="level"></span>
  <span class="text-danger d-none" id="abyssal-level"></span>
</template><template id="harvesting-vein-product-template">
  <li class="nav-main-item align-items-center">
    <div class="mr-2 media d-flex">
      <div><img class="skill-icon-xs mr-1" id="product-image"></div>
      <div class="media-body">
        <div class="text-danger" id="product-name"></div>
        <div class="text-muted small" id="required-intensity"></div>
      </div>
    </div>
  </li>
</template><template id="realmed-category-menu-template">
  <div class="bg-white p-3 push content-justify-center w-100" id="container">
    <div class="d-lg-none">
      <button class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke" type="button" id="expand-button">
        <span id="expand-text"></span>
        <i class="fa fa-bars"></i>
      </button>
    </div>
    <div class="d-none d-lg-block mt-2 mt-lg-0" id="expand-div">
      <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center" id="main-container"></ul>
    </div>
  </div>
</template><template id="skill-cap-increase-modal-template">
  <div class="justify-vertical-center" id="button-container"></div>
</template><template id="prayer-book-menu-template">
  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2 mb-2">
    <div class="row no-gutters">
      <div class="col-6">
        <h5 class="font-w700 text-combat-smoke text-left m-1 mb-2">
          <lang-string lang-id="SKILL_NAME_Prayer"></lang-string>
        </h5>
      </div>
      <div class="col-6">
        <h5 class="font-w400 text-combat-smoke text-right m-1 mb-2">
          <small>
            <lang-string lang-id="COMBAT_MISC_75"></lang-string>
          </small>
        </h5>
      </div>
    </div>
    <div class="p-1 btn-group w-100 d-none" role="group" id="book-buttons">
      <button class="btn btn-sm btn-outline-success" id="standard-button">
        <img class="skill-icon-xs" data-src="assets/media/skills/prayer/prayer.png" />
      </button>
      <button class="btn btn-sm btn-outline-secondary" id="unholy-button">
        <img class="skill-icon-xs" data-src="assets/media/skills/prayer/unholy_prayer.png" />
      </button>
      <button class="btn btn-sm btn-outline-secondary" id="abyssal-button">
        <img class="skill-icon-xs" data-src="assets/media/skills/combat/abyssal_damage.png" />
      </button>
    </div>
    <div class="p-1" id="standard-container">
      <div class="row">
        <span id="standard-anchor"></span>
      </div>
    </div>
    <div class="p-1 d-none" id="unholy-container">
      <div class="row">
        <div class="col-12 font-size-sm text-warning font-w600 mb-2">
          <div class="bg-light rounded p-2 text-center">
            <i class="fa fa-exclamation-circle mr-2"></i>
            <lang-string lang-id="UNHOLY_PRAYERS_MSG_0"></lang-string>
          </div>
        </div>
        <span id="unholy-anchor"></span>
        <div class="col-12 font-size-sm text-info">
          <div class="bg-light rounded p-2 text-center">
            <i class="fa fa-fw fa-info-circle mr-2"></i>
            <lang-string lang-id="UNHOLY_PRAYERS_MSG_1"></lang-string>
          </div>
        </div>
      </div>
    </div>
    <div class="p-1 d-none" id="abyssal-container">
      <div class="row">
        <span id="abyssal-anchor"></span>
      </div>
    </div>
  </div>
</template>
<template id="offensive-stats-template">
  <div class="block block-rounded-double bg-combat-inner-dark pb-2 p-0 mb-0">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
        <lang-string lang-id="COMBAT_MISC_42"></lang-string>
      </h5>
    </div>
    <div class="combat-stats-table px-2 text-combat-smoke font-size-sm">
      <div>
        <lang-string lang-id="DAMAGE_TYPE"></lang-string>
        <span><img class="skill-icon-xxs m-0 mr-1" id="damage-type-icon"><span id="damage-type-name"></span></span>
      </div>
      <div role="separator" class="dropdown-divider"></div>
      <div>
        <lang-string lang-id="COMBAT_MISC_101"></lang-string>
        <span><img class="skill-icon-xxs" id="attack-type-icon"></span>
      </div>
      <div class="d-none" id="attack-interval-container">
        <lang-string lang-id="COMBAT_MISC_9"></lang-string>
        <span id="attack-interval"></span>
      </div>
      <div>
        <lang-string lang-id="COMBAT_MISC_11"></lang-string>
        <span id="min-hit"></span>
      </div>
      <div>
        <lang-string lang-id="COMBAT_MISC_12"></lang-string>
        <span id="max-hit"></span>
      </div>
      <div>
        <lang-string lang-id="COMBAT_MISC_13"></lang-string>
        <span id="hit-chance"></span>
      </div>
      <div>
        <lang-string lang-id="COMBAT_MISC_14"></lang-string>
        <span id="accuracy-rating"></span>
      </div>
    </div>
  </div>
</template><template id="offline-loading-template">
  <div class="block-content block-content-full">
    <div class="row">
      <div class="col-12 justify-vertical-center" id="loading-container">
        <span class="mb-1"><lang-string lang-id="MENU_TEXT_LOADING_OFFLINE_PROGRESS"></lang-string></span>
        <div class="progress active w-100 mb-1" style="height: 10px">
          <div class="progress-bar bg-info" id="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
            aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <span class="mb-1"><span class="font-w600 mr-2"><lang-string lang-id="OFFLINE_TIME_LEFT"></lang-string></span><span
            class="text-warning text-monospace" id="time-left"></span></span>
        <span id="ticks-per-second"></span>
      </div>
      <div class="col-12 d-none" id="error-container">
        <h5 class='font-w600 text-danger mb-1'><lang-string lang-id="ERROR_OFFLINE_ERROR_0"></lang-string></h5>
        <h5 class='font-w600 text-info font-size-sm mb-4'><lang-string lang-id="ERROR_SKILL_STOPPED"></lang-string></h5>
        <h5 class="font-w600 text-danger mb-1 d-none" id="mod-text"></h5>
        <h5 class='font-w400 font-size-sm mb-1' id="dev-text">Please let the dev know of this error. Please copy the
          entire
          contents of the error message when reporting it:</h5>
        <textarea class="form-control text-danger" id="error-text" rows="5"
          onclick="this.setSelectionRange(0, this.value.length)" value="There should be an error here?"
          readonly></textarea>
      </div>
    </div>
  </div>
</template><template id="enemy-special-attacks-template">
  <div class="block block-rounded-double bg-combat-inner-dark text-center pb-1 mb-2">
    <div class="block-header block-header-default bg-combat-enemy-spec-block-header px-3 py-1 mb-2">
      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
        <lang-string lang-id="MENU_TEXT_ENEMY_SPECIAL_ATTACKS"></lang-string>
      </h5>
    </div>
    <div class="block-content font-w400 font-size-sm text-combat-smoke px-2 pt-0" id="description-container"></div>
  </div>
</template><template id="rune-menu-template">
  <div class="block block-rounded-double bg-combat-inner-dark text-center mb-2">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
        <lang-string lang-id="COMBAT_MISC_76"></lang-string>
      </h5>
    </div>
    <div class="block-content block-content-full p-1">
      <div class="row" id="row-container">
        <realm-tab-select class="col-12" id="realm-select"></realm-tab-select>
      </div>
    </div>
  </div>
</template>
<template id="township-task-goal-template">
  <div class="block block-rounded-double text-center m-0 p-1 spell-not-selected" id="container">
    <span id="description"></span>
  </div>
</template><template id="firemaking-oil-menu-template">
  <div class="block block-rounded border-top border-firemaking border-4x">
    <div class="block-content block-content-full">
      <div class="row row-deck gutters-tiny">
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2 text-center">
            <span class="font-w600 text-warning"
              ><lang-string lang-id="MENU_TEXT_FIREMAKING_OIL_NOTICE"></lang-string
            ></span>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="font-size-sm font-w400 text-center text-dark">
              <div class="dropdown">
                <button
                  type="button"
                  class="btn btn-light dropdown-toggle"
                  id="oil-select-button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <lang-string lang-id="FIREMAKING_SELECT_OIL"></lang-string>
                </button>
                <div
                  class="dropdown-menu font-size-sm overflow-y-auto"
                  aria-labelledby="oil-select-button"
                  x-placement="bottom-start"
                  style="
                    max-height: 60vh;
                    max-width: 500px;
                    z-index: 9999;
                    position: absolute;
                    will-change: transform;
                    top: 0px;
                    left: 0px;
                    transform: translate3d(0px, 38px, 0px);
                  "
                  id="oil-options-container"
                ></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="block block-rounded-double bg-combat-inner-dark">
            <div class="justify-vertical-center h-100">
              <item-current-icon class="icon-size-64" id="oil-quantity"></item-current-icon>
            </div>
          </div>
        </div>
        <div class="col-8">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <h5 class="font-w700 text-left text-combat-smoke m-1">
              <span id="oil-name">-</span>
            </h5>
            <h5 class="font-w400 font-size-sm text-left text-success m-1">
              <span id="oil-info">-</span>
            </h5>
          </div>
        </div>
        <div class="col-12">
          <div class="block block-rounded-double bg-combat-inner-dark p-2">
            <div class="justify-vertical-center">
              <div class="justify-horizontal-center icon-size-48 mb-2">
                <button class="btn btn-primary m-1 p-2" type="button" style="min-height: 48px" id="oil-button">
                  <lang-string lang-id="FIREMAKING_OIL_MY_LOGS"></lang-string>
                </button>
                <button class="btn btn-danger m-1 p-2 d-none" type="button" style="min-height: 48px" id="stop-button">
                  <lang-string lang-id="MENU_TEXT_STOP_OIL"></lang-string>
                </button>
                <interval-icon id="interval"></interval-icon>
              </div>
              <progress-bar class="progress-height-5 w-80" id="progress-bar"></progress-bar>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="skill-cap-increase-button-template">
  <button class="btn btn-outline-primary m-1" id="select-button">
    <img class="skill-icon-xs mr-1" id="skill-image"> <small>(<span id="current-cap"></span> -> <span id="new-cap"></span>)</small>
  </button>
</template><template id="locked-constellation-menu-template">
  <div
    class="block block-content block-content-full block-rounded-extra block-link-pop border-top border-danger border-4x text-center justify-vertical-center"
  >
    <div class="row gutters-tiny">
      <div class="col-12 p-2">
        <img class="astro-img" data-src="assets/media/skills/astrology/astrology.png" />
      </div>
      <div class="col-12 pt-2">
        <h4 class="font-w700 mb-2"><lang-string lang-id="MENU_TEXT_LOCKED"></lang-string></h4>
      </div>
      <div class="col-12">
        <div class="justify-vertical-center">
          <span class="badge badge-danger badge-pill w-100 mb-1" id="level"></span>
          <span class="badge badge-danger badge-pill w-100 mb-1" id="abyssal-level"></span>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="township-task-category-template">
  <a class="block block-rounded block-link-pop pointer-enabled" id="button">
    <div class="block-content block-content-full" id="container">
      <div class="media d-flex align-items-center push mb-0">
        <img class="mr-2 height-48" id="category-image">
        <div class="media-body text-left">
          <h4 class="font-w600 text-left text-white mb-0">
            <span id="category-name"></span><i class="fa fa-exclamation-circle ml-1 text-success" id="completion-icon"></i>
          </h4>
          <h5 class="font-size-sm font-w400 text-left text-warning mb-1" id="completion-count"></h5>
          <div class="progress active" style="height: 5px;">
            <div class="progress-bar bg-info" style="width: 0%;" id="progress-bar" aria-roledescription="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>
      </div>
    </div>
  </a>
</template><template id="special-attack-span-template">
  <strong id="name"></strong> (<span id="chance"></span>) - <span id="description"></span> <span class="text-info" id="max-hit"></span>
</template><template id="level-cap-purchase-modal-template">
  <div class="justify-vertical-center">
    <span id="level-gate-info"></span>
    <div class="justify-horizontal-center mb-2" id="level-gates"></div>
    <div class="justify-horizontal-evenly w-100">
      <button class="btn btn-primary" id="purchase-one-button">
        <span id="purchase-one-increase"></span>
        <quantity-icons class="icon-size-32" id="purchase-one-cost"></quantity-icons>
      </button>
      <button class="btn btn-primary" id="purchase-max-button">
        <span id="purchase-max-increase"></span>
        <quantity-icons class="icon-size-32" id="purchase-max-cost"></quantity-icons>
      </button>
    </div>
  </div>
</template><template id="monster-stats-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title" id="modal-title"></h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block-content block-content-full">
      <div class="row row-deck gutters-tiny">
        <div class="col-12 col-lg-8">
          <div class="block block-rounded-double bg-combat-inner-dark text-center mb-2">
            <div class="block-header block-header-default bg-dark-bank-block-header">
              <h5 class="font-w600 text-light text-center w-100 mb-1" id="monster-name"></h5>
            </div>
            <div class="block-content">
              <div class="row no-gutters">
                <div class="col-12 text-center">
                  <a class="font-w600 font-size-xs text-primary pointer-enabled" id="wiki-link">
                    <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xxs">
                    <lang-string lang-id="VIEW_ON_OFFICIAL_WIKI"></lang-string>
                  </a>
                </div>
                <combat-levels class="col-2 d-block" id="levels"></combat-levels>
                <div class="col-10 col-md-8">
                  <img class="combat-enemy-img" id="monster-image">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4">
          <div class="block mb-2">
            <offensive-stats class="mb-2 d-block" id="offensive-stats"></offensive-stats>
            <defensive-stats class="d-block" id="defensive-stats"></defensive-stats>
          </div>
        </div>
        <enemy-special-attacks class="col-12 d-block" id="special-attacks"></enemy-special-attacks>
        <enemy-passives class="col-12 d-block" id="combat-passives"></enemy-passives>
      </div>
    </div>
  </div>
</template><template id="combat-passive-span-template">
  <strong id="name"></strong> - <span id="description"></span>
</template><template id="combat-loot-menu-template">
  <div class="block block-rounded-double bg-combat-inner-dark p-0" style="min-height: 400px;">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-2">
      <div class="row no-gutters w-100">
        <div class="col-8 justify-vertical-center">
          <h5 class="font-size-sm font-w600 mb-0 w-100 text-left" id="loot-quantity"></h5>
        </div>
        <div class="col-4">
          <h5 class="font-w400 text-combat-smoke text-right m-1 mb-2">
            <button type="button" class="btn btn-sm btn-success" id="loot-all-button">
              <lang-string lang-id="COMBAT_MISC_46"></lang-string>
            </button>
          </h5>
        </div>
      </div>
    </div>
    <div class="block-content block-content-full">
      <div class="justify-horizontal-left flex-wrap" id="loot-container"></div>
      <div class="row px-3">
        <div class="col-12">
          <h5 class="font-w400 text-combat-smoke text-center m-1"><small id="looting-amulet-text"></small></h5>
        </div>
      </div>
    </div>
  </div>
</template><template id="locked-spell-tooltip-template">
  <div class="justify-vertical-center font-size-sm text-center">
    <lang-string class="text-info" lang-id="MENU_TEXT_REQUIRES"></lang-string>
    <span class="text-success" id="level-required"></span>
    <span class="text-success" id="abyssal-level-required"></span>
    <span class="text-success" id="item-required"></span>
    <lang-string lang-id="COMBAT_MISC_PRATS_IDEA" id="prats-idea"></lang-string>
  </div>
</template><template id="prayer-button-template">
  <ul class="nav nav-pills nav-justified push">
    <li class="nav-item mr-1">
      <a class="pointer-enabled nav-link border border-dark p-0" id="link">
        <img class="skill-icon-xs" id="prayer-image">
      </a>
    </li>
  </ul>
</template><template id="locked-prayer-tooltip-template">
  <div class="justify-vertical-center text-warning text-center">
    <span id="level"></span>
    <span id="abyssal-level"></span>
  </div>
</template><template id="township-task-template">
  <div class="block block-rounded">
    <div class="block-header block-header-default p-2" id="header">
      <ul class="nav-main nav-main-horizontal nav-main-horizontal-override nav-justified font-size-sm w-100">
        <li class="nav-item text-left">
          <h3 class="block-title" id="task-name"></h3>
        </li>
      </ul>
      <div class="block-options" id="realm-container">
        <img class="skill-icon-xs mr-1" id="realm-image" />
      </div>
    </div>
    <div class="p-2 bg-combat-inner-dark">
      <h5 class="font-w600 font-size-sm mb-1 text-warning" id="task-description"></h5>
      <div class="township-task-container" id="goal-container"></div>
      <div class="font-w600 text-success">
        <lang-string lang-id="MENU_TEXT_TOWNSHIP_TASK_REWARDS"></lang-string>
        <div class="township-task-container" id="rewards-container"></div>
        <button class="btn btn-sm btn-success" id="complete-button">
          <lang-string lang-id="TOWNSHIP_TASKS_CLAIM_REWARDS"></lang-string>
        </button>
      </div>
    </div>
  </div>
</template>

<template id="ancient-relic-template">
  <li class="nav-item">
    <div class="block block-rounded-double bg-combat-inner-dark p-3" id="relic-container">
      <div class="font-size-xs" id="relic-name"></div>
      <div class="font-w600 font-size-sm" id="relic-modifiers"></div>
    </div>
  </li>
</template><template id="offline-progress-template">
  <div id="message-container">
    <h5 class='font-w400'><span id="time-away"></span><br><small class="text-info"><lang-string
          lang-id="MENU_TEXT_MAX_OFFLINE_TIME"></lang-string></small></h5>
    <h5 class='font-w400 font-size-sm mb-1'><lang-string lang-id="MISC_STRING_5"></lang-string></h5>
  </div>
</template><template id="aurora-spell-tooltip-template">
  <div class="justify-vertical-center font-size-sm text-center">
    <span class='text-warning font-size-base' id="spell-name"></span>
    <span id="description"></span>
    <spell-tooltip-runes id="rune-costs"></spell-tooltip-runes>
  </div>
</template><template id="skill-tree-button-template">
  <button role="button" class="btn btn-sm btn-info font-size-xs" id="view-button">
    <lang-string lang-id="VIEW_SKILL_TREE"></lang-string>
  </button>
</template><template id="aurora-spell-menu-template">
  <div class="row" id="spell-container">
    <div class="col-12">
      <small class="text-warning">
        <lang-string lang-id="COMBAT_MISC_AURORA_SPELLBOOK_NAME"></lang-string><br>
        <lang-string lang-id="COMBAT_MISC_AURORA_SPELLBOOK_DESC"></lang-string>
      </small>
    </div>
  </div>
</template><template id="summoning-max-hit-template">
  <div class="col-8 font-w400 font-size-sm text-combat-smoke">
    <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/summoning/summoning.png" />
    <lang-string lang-id="GAME_GUIDE_30"></lang-string>
    <small class="text-nowrap"
      >( <img class="skill-icon-xxs m-0 mr-1" id="damage-type-media" /><span id="damage-type-name"></span> )
    </small>
  </div>
  <div class="col-4 text-left">
    <span id="max-hit" class="font-w600 font-size-sm text-combat-smoke"></span>
    <span id="max-hit-diff" class="text-success font-w400 d-none"></span>
  </div>
</template>
<template id="spell-tooltip-runes-template">
  <div class="justify-vertical-center font-size-sm">
    <lang-string lang-id="MENU_TEXT_REQUIRES"></lang-string>
    <div class="justify-horizontal-center" id="rune-costs"></div>
    <lang-string lang-id="MENU_TEXT_OR" id="or-text"></lang-string>
    <lang-string class="text-info" lang-id="MENU_TEXT_USE_COMBINATION_RUNES" id="alt-rune-text"></lang-string>
    <div class="justify-horizontal-center" id="alt-rune-costs"></div>
  </div>
</template><template id="prayer-tooltip-template">
  <div class="justify-vertical-center text-center">
    <span class="text-warning" id="prayer-name"></span>
    <small id="unholy-scaling"></small>
    <small class="text-info justify-vertical-center" id="stats"></small>
    <small id="xp-info"></small>
    <small id="player-points"></small>
    <small id="enemy-points"></small>
    <small id="regen-points"></small>
  </div>
</template><template id="township-task-reward-template">
  <div class="block block-rounded-double py-1 px-2" id="container">
  </div>
</template><template id="enemy-passives-template">
  <div class="block block-rounded-double bg-combat-inner-dark text-center pb-1 mb-2">
    <div class="block-header block-header-default bg-combat-enemy-passive-block-header px-3 py-1 mb-2">
      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
        <lang-string lang-id="MENU_TEXT_ENEMY_PASSIVES"></lang-string>
      </h5>
    </div>
    <div class="block-content font-w400 font-size-sm text-combat-smoke px-2 pt-0" id="description-container"></div>
  </div>
</template><template id="resistance-table-template">
  <div class="combat-stats-table px-2 text-combat-smoke font-size-sm" id="container"></div>
</template><template id="mastery-display-template">
  <div class="media d-flex align-items-center push m-0">
    <div class="m-1 font-w600"><img class="mastery-icon-sm mr-2"
        data-src="assets/media/main/mastery_header.png" id="icon"><span id="level">-</span></div>
    <div class="media-body">
      <div class="font-w400 text-center">
        <h5 class="font-w400 font-size-sm text-combat-smoke m-1"><small id="xp-progress">-</small></h5>
      </div>
      <div class="font-size-sm mb-2">
        <div class="progress active mr-2 mt-2 ml-1">
          <div class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
            aria-valuemax="100" id="progress-bar"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="compact-mastery-display-template">
  <div class="d-flex flex-wrap justify-content-center">
    <small class="ml-2 mr-2 text-nowrap"><img class="skill-icon-xxs mr-1"
        data-src="assets/media/main/mastery_header.png" id="icon"><span class="mr-2"
        id="level">1</span></small>
    <small class="text-w400" id="progress-percent">(0.00%)</small>
  </div>
</template>
<template id="potion-select-menu-template">
  <div class="block block-rounded block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title">
        <lang-string lang-id="MISC_STRING_22"></lang-string>
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <h5 class="font-w600 pl-4 font-size-sm text-left mb-1 text-warning">
      <lang-string lang-id="MISC_STRING_23"></lang-string>
    </h5>
    <h5 class="font-w600 pl-4 font-size-sm text-left mb-1 text-info">
      <lang-string lang-id="MISC_STRING_24"></lang-string>
    </h5>
    <div class="row no-gutters">
      <div class="col-12 col-lg-6 font-w400 font-size-sm text-center">
        <div class="form-group">
          <label class="d-block">
            <lang-string lang-id="MISC_STRING_25"></lang-string>
          </label>
          <settings-checkbox class="d-inline-flex" data-setting-id="showTierIPotions"></settings-checkbox>
          <settings-checkbox class="d-inline-flex" data-setting-id="showTierIIPotions"></settings-checkbox>
          <settings-checkbox class="d-inline-flex" data-setting-id="showTierIIIPotions"></settings-checkbox>
          <settings-checkbox class="d-inline-flex" data-setting-id="showTierIVPotions"></settings-checkbox>
        </div>
      </div>
      <div class="col-12 col-lg-6 font-w400 font-size-sm text-center p-2">
        <div class="form-group">
          <label class="d-block">
            <lang-string lang-id="MISC_STRING_26"></lang-string>
          </label>
          <div class="form-check form-check-inline">
            <input class="form-check-input pointer-enabled" type="checkbox" value="" id="auto-reuse-checkbox">
            <label class="form-check-label pointer-enabled" for="auto-reuse-checkbox">
              <lang-string lang-id="MISC_STRING_27"></lang-string>
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="row gutters-tiny block-content row-deck" id="potion-container"></div>
  </div>
</template>
<template id="potion-select-menu-item-template">
  <div class="block block-rounded-double bg-combat-inner-dark p-3">
    <div class="media d-flex align-items-center push mb-0">
      <div class=" mr-2">
        <img class="shop-img" id="potion-image"><br>
        <h5 class="font-w700 font-size-sm text-center mb-1" id="potion-quantity">0</h5>
      </div>
      <div class="media-body text-left">
        <h5 class="font-w700 mb-1 "><span id="potion-name"></span> <button role="button"
            class="btn btn-sm btn-success ml-2" id="use-button">
            <lang-string lang-id="MISC_STRING_29"></lang-string>
          </button></h5>
        <h5 class="font-w400 font-size-sm mb-1 text-info" id="potion-description"></h5>
        <h5 class="font-w400 font-size-sm mb-1 text-success" id="potion-charges"></h5>
      </div>
    </div>
  </div>
</template>
<template id="item-charge-display-template">
  <img class="skill-icon-xxs" id="item-image">
  <span id="item-charges" class="text-danger"></span>
</template>
<template id="mastery-pool-display-template">
  <div class="media d-flex align-items-center push m-0">
    <div class="m-1">
      <img class="skill-icon-xs m-0" data-src="assets/media/main/mastery_pool.png" id="pool-icon">
    </div>
    <div class="media-body">
      <div class="justify-vertical-center font-size-sm mr-1 mt-2 ml-1" id="progress-bar-container"></div>
      <div class="justify-horizontal-left flex-wrap font-w400 font-size-sm text-combat-smoke" id="label-container"></div>
    </div>
  </div>
</template>
<template id="mastery-skill-options-template">
  <div class="row no-gutters">
    <mastery-pool-display class="col-12 col-lg-8" id="pool-display"></mastery-pool-display>
    <div class="col-12 col-md-4">
      <div class="ml-2 mr-2 text-right">
        <button role="button" class="btn btn-sm btn-info m-1 font-size-xs" id="view-checkpoints-button">
          <lang-string lang-id="MENU_TEXT_MASTERY_VIEW_CHECKPOINTS"></lang-string>
        </button>
        <button role="button" class="btn btn-sm btn-success m-1 font-size-xs" id="spend-mastery-button"></button>
      </div>
    </div>
  </div>
</template>
<template id="spend-mastery-menu-item-template">
  <div class="block block-rounded-double bg-combat-inner-dark p-2">
    <div class="media d-flex align-items-center push">
      <div class="mr-1">
        <img class="skill-icon-sm" id="action-image">
      </div>
      <div class="media-body">
        <div class="row no-gutters">
          <div class="col-12"><span class="font-w600 font-size-sm text-combat-smoke" id="mastery-name"></span></div>
        </div>
        <div class="progress active" style="height: 10px">
          <div id="mastery-progress" class="progress-bar bg-info" role="progressbar" style="width: 0%;"
            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row no-gutters">
          <div class="col-3 font-w400 font-size-sm text-combat-smoke">
            <img class="skill-icon-xxs mr-1" data-src="assets/media/main/mastery_header.png">
            <strong id="mastery-level">1</strong>
          </div>
          <div class="col-9 font-w400 font-size-sm text-combat-smoke text-right"><span id="xp-required"></span></div>
        </div>
      </div>
      <div class="ml-2">
        <button role="button" id="level-up-button" class="btn btn-sm btn-danger">+1</button>
      </div>
    </div>
  </div>
</template>
<template id="spend-mastery-menu-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark sticky-div">
      <h3 class="block-title">
        <lang-string lang-id="MENU_TEXT_SPEND_MASTERY_XP"></lang-string>
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block-content block-content-full">
      <div class="row gutters-tiny" id="mastery-item-container">
        <div class="col-12 block sticky-div modal-body">
          <div class="row gutters-tiny">
            <realm-tab-select id="realm-select"></realm-tab-select>
            <div class="col-12 pl-1 pr-1">
              <div class="row no-gutters">
                <mastery-pool-display class="col-12 col-lg-8" id="pool-display"></mastery-pool-display>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <h5 class="font-w400 font-size-sm text-danger m-2"><i class="fa fa-fw fa-info-circle mr-1"></i>
                <lang-string lang-id="MENU_TEXT_MPXP_NOTICE"></lang-string>
              </h5>
              <div class="justify-horizontal-left flex-wrap" id="claim-token-container"></div>
            </div>
            <div class="col-12 col-md-6 text-right">
              <button role="button" class="btn btn-sm btn-success m-1" id="set-level-1-button">+1</button>
              <button role="button" class="btn btn-sm btn-success m-1" id="set-level-5-button">+5</button>
              <button role="button" class="btn btn-sm btn-success m-1" id="set-level-10-button">+10</button>
              <div class="form-group" id="filter-container">
                <settings-checkbox id="level-99-filter" data-setting-id="hideMaxLevelMasteries" data-inline="true"></settings-checkbox>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="settings-checkbox-template">
  <div class="form-check" id="container">
    <input class="form-check-input pointer-enabled" type="checkbox" value="" id="input">
    <label class="form-check-label pointer-enabled" id="label"></label>
  </div>
</template>
<template id="settings-switch-template">
  <div class="custom-control custom-switch" id="control">
    <input type="checkbox" class="custom-control-input" id="input">
    <label class="custom-control-label font-size-sm text-muted" id="label"></label>
  </div>
</template>
<template id="settings-dropdown-template">
  <div class="form-inline flex-wrap-reverse">
    <div class="dropdown">
      <button type="button" class="btn btn-primary dropdown-toggle font-size-sm" id="dropdown-button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
      <div class="dropdown-menu overflow-y-auto" id="options-container" style="max-height: 60vh;"></div>
    </div>
    <span class="font-size-sm text-muted ml-2" id="label"></span>
  </div>
</template>
<template id="upgrade-chain-display-template">
  <span class="font-w600" id="chain-name"></span> <img class="skill-icon-xs m-0 mr-1" id="upgrade-img"><span class="p-1 bg-warning rounded font-w600 d-none"
    id="upgrade-name"></span>
</template>
<template id="slayer-task-menu-template">
  <div class="block block-rounded-double bg-combat-inner-dark p-0 pb-2 mb-2">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
      <h5 class="font-size-sm font-w600 mb-0">
        <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/slayer/slayer.png"
          id="slayer-icon">
        <lang-string lang-id="COMBAT_MISC_21"></lang-string>
      </h5>
      <div class="block-options">
        <h5 class="font-w600 text-combat-smoke text-right mr-1 mb-0">
          <div id="new-task-spinner" class="spinner-border spinner-border-sm text-primary ml-2" role="status"></div>
          <a class="combat-action pointer-enabled" id="new-task-button">
            <small id="new-task-button-text">
              <lang-string lang-id="COMBAT_MISC_22"></lang-string>
            </small>
          </a>
        </h5>
      </div>
    </div>
    <div class="row no-gutters px-2">
      <div class="col-12 justify-vertical-center d-none" id="select-task-container">
        <div class="d-none my-1 btn-group w-100" id="select-realm-container"></div>
      </div>
      <div class="col-12">
        <div id="locating-content"><img class="skill-icon-xs m-0 mr-2 js-tooltip-enabled"
            data-src="assets/media/main/question.png">
          <lang-string lang-id="COMBAT_MISC_80"></lang-string>
        </div>
        <h5 class="font-w400 font-size-sm text-combat-smoke text-center m-1" id="monster-container">
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <div class="slayer-task-img-container"><img class="slayer-task m-0 mb-2 mr-2 pointer-enabled"
                  id="monster-image">
                <img class="skill-icon-xxs m-1"
                  data-src="assets/media/skills/combat/attack.png" id="monster-attack-type"><img class="skill-icon-xxs m-1"
                  data-src="assets/media/skills/combat/combat.png"><span
                  id="monster-level" class="font-size-xs">386</span>
              </div>
            </div>
            <div class="media-body text-left">
              <div class="font-size-sm">
                <small id="task-tier"></small>
              </div>
              <div class="font-w600" id="monster-name"></div>
              <div class="font-size-sm">
                <button role="button" class="btn btn-sm btn-primary mt-2" id="jump-to-enemy-button">
                  <lang-string lang-id="COMBAT_MISC_28"></lang-string>
                </button>
              </div>
            </div>
          </div>
        </h5>
        <h5 class="font-w600 text-center mb-0 pt-2" id="extend-container">
          <span class="text-danger" id="extend-message"><small>
              <lang-string lang-id="COMBAT_MISC_81"></lang-string>
            </small></span>
          <a class="combat-action pointer-enabled" id="extend-task-button"><small id="extend-task-cost"></small></a>
        </h5>
      </div>
      <settings-checkbox class="col-12 font-w400 font-size-sm text-center d-none pt-1" id="auto-slayer-checkbox"
        data-setting-id="enableAutoSlayer"></settings-checkbox>
    </div>
  </div>
</template>
<template id="farming-category-button-template">
  <a class="block block-content block-rounded block-link-pop border-top border-farming border-4x pointer-enabled p-2"
    id="link">
    <div class="media d-flex align-items-center push">
      <div class="mr-2">
        <img class="bank-img p-2" id="category-image">
      </div>
      <div class="media-body">
        <div class="font-w600" id="category-name"></div>
        <div class="font-size-sm" id="category-description"></div>
        <div class="font-size-sm text-success d-none" id="harvest-ready-notice">
          <lang-string lang-id="MENU_TEXT_HARVEST_READY"></lang-string>
        </div>
      </div>
    </div>
  </a>
</template>
<template id="farming-category-options-template">
  <div class="block block-content text-center">
    <button type="button" class="btn btn-sm btn-secondary m-1" id="harvest-all-button"></button>
    <button type="button" class="btn btn-sm btn-success m-1" id="plant-all-button"></button>
    <button type="button" class="btn btn-sm btn-alt-success m-1" id="plant-all-selected-button"></button>
  </div>
</template>
<template id="farming-plot-template">
  <div class="block block-rounded block-link-pop border-top border-farming border-4x">
    <div class="block-header border-bottom">
      <h3 class="block-title" id="category-name"></h3>
      <div class="block-options">
        <div class="dropdown">
          <button type="button" class="btn btn-dark dropdown-toggle" id="select-seed-dropdown-button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="skill-icon-xs m-0" id="select-seed-dropdown-image">
          </button>
          <div class="dropdown-menu dropdown-menu-right font-size-sm overflow-y-auto" style="max-height:80vh;"
            id="select-seed-dropdown-options">
            <a class="dropdown-item pointer-enabled">
              <img class="skill-icon-xs mr-1" id="settings-dropdown-2-option-13-image"
                data-src="assets/media/bank/seeds_potato.png">
              Potato Seeds (0)
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="block-content text-center">
      <button type="button" class="btn btn-lg btn-success" id="plant-seed-button">
        <lang-string lang-id="MENU_TEXT_PLANT"></lang-string>
      </button>
      <img class="skill-icon-sm" id="seed-image"><br>
      <small id="growth-status"></small>
    </div>
    <div class="col-12 row justify-content-center gutters-tiny text-center icon-size-32">
      <xp-icon id="xp-icon"></xp-icon>
      <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
      <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
      <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
    </div>
    <div class="block-content text-center">
      <lang-string lang-id="MENU_TEXT_COMPOST_APPLIED"></lang-string> <span
        class="font-w600 text-danger" id="compost-status"><lang-string lang-id="MENU_TEXT_NO_COMPOST"></lang-string></span>
        <button class="btn btn-sm btn-outline-danger m-1 d-none" id="remove-compost">X</button>
      </div>
    <div class="block-content text-center">
      <button type="button" class="btn btn-lg btn-danger mr-1" id="destroy-button">
        <lang-string lang-id="MENU_TEXT_DESTROY"></lang-string>
      </button>
      <button type="button" class="btn btn-lg btn-success mr-1" id="harvest-button">
        <lang-string lang-id="MENU_TEXT_HARVEST"></lang-string>
      </button>
      <ul class="nav-main nav-main-horrizontal" id="compost-buttons"></ul>
      <h5 class="font-w400 mb-1 font-size-sm" id="growth-chance"></h5>
    </div>
  </div>
</template>
<template id="locked-farming-plot-template">
  <div class="block block-rounded block-link-pop border-top border-danger border-4x">
    <div class="block-header text-center border-bottom py-3">
      <h3 class="block-title">
        <lang-string lang-id="MENU_TEXT_LOCKED"></lang-string>
      </h3>
    </div>
    <div class="block-content justify-vertical-center">
      <div class="text-center">
        <lang-string lang-id="MENU_TEXT_REQUIREMENTS"></lang-string>
      </div>
      <div class="text-center mt-2">
        <p class="mb-1">
          <img class="skill-icon-xs" data-src="assets/media/skills/farming/farming.png"> <span
            class="text-success" id="farming-level-required"></span><br>
        </p>
        <p class="mb-1 d-none" id="farming-abyssal-level-required-container">
          <img class="skill-icon-xs" data-src="assets/media/skills/farming/farming.png"> <span
            class="text-success" id="farming-abyssal-level-required"></span><br>
        </p>
        <div class="row justify-content-center icon-size-48" id="icon-container"></div>
        <button type="button" class="btn btn-lg btn-success m-2" id="unlock-button">
          <lang-string lang-id="MENU_TEXT_UNLOCK"></lang-string>
        </button>
      </div>
    </div>
  </div>
</template>
<template id="farming-seed-select-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title">
        <lang-string lang-id="MENU_TEXT_PLANT"></lang-string>
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="row row-deck">
      <div class="col-12 col-md-6">
        <div class="block-content">
          <div>
            <realm-tab-select id="realm-select"></realm-tab-select>
            <div class="bg-combat-inner-dark rounded px-2 py-1 m-1 text-center">
              <span class="font-w500 text-warning font-size-sm" id="seed-notice"></span>
            </div>
            <div class="btn-group-vertical w-100" id="seed-button-container"></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="block-content">
          <p class="text-size-sm text-dark text-center border-top border-bottom" style="width: 100%;">
            <lang-string lang-id="FARMING_MISC_23"></lang-string>
          </p>
          <div class="row gutters-tiny text-size-sm text-muted">
            <div class="col-12">
              <lang-string lang-id="FARMING_MISC_16"></lang-string> <span id="recipe-owned-quantity">-</span>
            </div>
            <div class="col-12">
              <span id="recipe-product-quantity">-</span>
            </div>
            <div class="col-12">
              <mastery-display class="mastery-6" id="recipe-mastery"></mastery-display>
            </div>
            <div class="col-12">
              <lang-string lang-id="FARMING_MISC_18"></lang-string> <span id="recipe-category">-</span>
            </div>
            <div class="col-12" id="recipe-level-cont">
              <lang-string lang-id="FARMING_MISC_19"></lang-string> <span id="recipe-level">-</span>
            </div>
            <div class="col-12" id="recipe-abyssal-level-cont">
              <lang-string lang-id="ABYSSAL_LEVEL_REQUIRED"></lang-string> <span id="recipe-abyssal-level">-</span>
            </div>
            <div class="col-12">
              <lang-string lang-id="FARMING_MISC_20"></lang-string> <span id="recipe-quantity">-</span>
            </div>
            <div class="col-12">
              <lang-string lang-id="FARMING_MISC_21"></lang-string> <span id="recipe-interval">-</span>
            </div>
            <div class="col-12 row justify-content-left gutters-tiny text-center mb-3 icon-size-48" id="grants-container">
              <xp-icon id="xp-icon"></xp-icon>
              <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
              <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
              <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
            </div>
            <div class="col-12">
              <button type="button" id="plant-button" class="btn btn-success d-none" data-dismiss="modal">
                <lang-string lang-id="FARMING_MISC_22"></lang-string>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block-content block-content-full text-right border-top">
      <button type="button" class="btn btn-danger" data-dismiss="modal">
        <lang-string lang-id="FARMING_MISC_24"></lang-string>
      </button>
    </div>
  </div>
</template>
<template id="tutorial-stage-display-template">
  <div class="block block-rounded d-flex flex-column">
    <div class="block-content block-content-full block-content-sm font-size-sm bg-primary" id="header">
      <div class="font-w600 d-flex align-items-center"><span class="p-1 rounded mr-2 font-size-xs bg-info"
          id="stage-status"></span>
        <lang-string lang-id="MISC_STRING_TASK"></lang-string> - <span id="stage-name"></span>
      </div>
    </div>
    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-left pb-0">
      <h5 class="font-w500 font-size-sm text-warning mb-0"><i class="fa fa-info-circle mr-2"></i>
        <span id="stage-description"></span>
      </h5>
    </div>
    <div class="block-content block-content-full">
      <div class="row no-gutters">
        <div class="col-12 col-xl-6">
          <div class="media d-flex align-items-center push m-0">
            <div class="mr-3">
              <div class="item item-rounded bg-dark">
                <h2 class="h5 font-w500 text-primary mb-0" id="task-completion"></h2>
              </div>
            </div>
            <div class="media-body">
              <dt class="font-size-h2 font-w700"><span class="font-w600"><img class="skill-icon-sm mr-2"
                    id="page-icon"><a class="pointer-enabled" id="page-link"></a></span></dt>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-6">
          <div id="task-container">
          </div>
        </div>
      </div>
    </div>
    <div class="block-content block-content-full block-content-sm bg-dark font-size-sm">
      <div class="font-w400 d-flex align-items-center">
        <lang-string lang-id="TUTORIAL_MISC_2"></lang-string> <button role="button" class="btn btn-sm btn-success ml-2"
          id="claim-rewards-button">
          <lang-string lang-id="MISC_STRING_CLAIM"></lang-string>
        </button>
      </div>
    </div>
  </div>
</template>
<template id="tutorial-progress-display-template">
  <div class="block block-rounded">
    <div class="block-content block-content-full border-top border-tutorialIsland border-4x">
      <div
        class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2 text-center text-sm-left">
        <div class="flex-sm-fill">
          <h1 class="h3 font-w700 mb-2 text-warning">
            <lang-string lang-id="PAGE_NAME_TutorialIsland"></lang-string>
          </h1>
          <h5 class="font-w500 text-muted mb-2">
            <lang-string lang-id="TUTORIAL_MISC_1"></lang-string>
          </h5>
          <button role="button" class="btn btn-sm btn-alt-danger" id="skip-button">
            <lang-string lang-id="TUTORIAL_MISC_5"></lang-string>
          </button>
        </div>
        <div class="mt-3 mt-sm-0 ml-sm-3 text-sm-right">
          <h1 class="h3 font-w700 mb-2 text-primary">
            <lang-string lang-id="TUTORIAL_MISC_0"></lang-string>
          </h1>
          <h2 class="h5 font-w500 text-primary mb-0"><span id="stages-completed">-</span> / <span
              id="total-stages">-</span></h2>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="lore-book-button-template">
  <div class="media d-flex align-items-center push m-0">
    <div class="m-1 font-w600">
      <img class="skill-icon-sm mr-2" id="book-image">
    </div>
    <div class="media-body">
      <div class="block block-rounded-double bg-combat-inner-dark p-1 mb-0 border-top border-1x border-info text-left">
        <h5 class="font-w700 font-size-sm m-1 text-success" id="book-title"></h5>
      </div>
    </div>
    <div class="m-1">
      <button class="btn btn-sm btn-primary" role="button" id="read-button">
        <lang-string lang-id="BANK_STRING_33"></lang-string>
      </button>
    </div>
  </div>
</template>
<template id="key-binding-edit-template">
  <div class="row">
    <div class="col-4 justify-vertical-center">
      <span class="mb-0 font-w400 font-size-sm" id="name"></span>
    </div>
    <div class="col-4">
      <div class="d-flex">
        <button class="btn btn-alt-primary flat-border-right flex-grow-1" id="binding-0">Unbound</button>
        <button class="btn btn-danger flat-border-left" id="clear-binding-0">X</button>
      </div>
    </div>
    <div class="col-4">
      <div class="d-flex">
        <button class="btn btn-alt-primary flat-border-right flex-grow-1" id="binding-1">Unbound</button>
        <button class="btn btn-danger flat-border-left" id="clear-binding-1">X</button>
      </div>
    </div>
  </div>
</template>
<template id="realm-select-option-template">
  <li class="nav-main-item" id="list-item">
    <a class="nav-main-link active" id="link">
      <img class="skill-icon-xs m-0 mr-2" id="realm-image">
      <span class="nav-main-link-name" id="span">
        <i class="fa fa-lock mr-1" id="lock-icon"></i> <span id="realm-name"></span>
      </span>
    </a>
    <ul class="nav-main-submenu d-none" id="submenu"></ul>
  </li>
</template>
<template id="realm-select-menu-template">
  <div class="bg-white p-3 push content-justify-center w-100">
    <div class="d-lg-none">
      <button class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke"
        type="button" id="expand-btn">
        <span><lang-string lang-id="SELECT_REALM"></lang-string></span><i class="fa fa-bars"></i>
      </button>
    </div>
    <div class="d-none d-lg-block mt-2 mt-lg-0" id="expanded">
      <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center" id="realm-container"></ul>
    </div>
  </div>
</template>
<template id="skill-milestone-display-template">
  <div id="block" class="block block-rounded block-link-pop border-top border-4x">
    <div class="block-header">
      <h3 class="block-title" id="skill-name"></h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-12 d-none" id="level-options">
        <div class="block block-rounded mb-2">
          <ul class="nav nav-tabs nav-tabs-block" role="tablist">
            <li class="nav-item">
              <a id="standard-tab" class="nav-link pointer-enabled active" role="tab" aria-selected="true"><lang-string lang-id="STANDARD_LEVELS"></lang-string></a>
            </li>
            <li class="nav-item">
              <a id="abyssal-tab" class="nav-link pointer-enabled" role="tab"><lang-string lang-id="ABYSSAL_LEVELS"></lang-string></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <dd class="text-muted mb-2" id="no-milestone-notice">
            <div class="bg-dark rounded p-2 text-center text-info font-size-sm">
              <i class="fa fa-exclamation-circle mr-2"></i><lang-string lang-id="NO_MILESTONES_MSG"></lang-string>
            </div>
          </dd>
          <table class="table table-sm table-vcenter">
            <thead>
              <tr>
                <th class="text-center" style="width: 65px;" id="level-text"></th>
                <th><lang-string lang-id="MENU_TEXT_UNLOCKS"></lang-string></th>
              </tr>
            </thead>
            <tbody id="milestone-container"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="recipe-selection-tab-template">
  <div class="block-content">
    <div class="row" id="recipe-container"></div>
  </div>
</template>
<template id="recipe-option-template">
  <ul class="nav nav-pills nav-justified">
    <li class="nav-item mr-1">
      <a id="unlocked" class="block block-link-pop nav-link border pointer-enabled font-w600 mb-1">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-2">
            <img id="recipe-image" class="shop-img">
          </div>
          <div class="media-body text-left">
            <div><span id="recipe-name"></span></div>
            <div><span class="font-w400 font-size-sm" id="recipe-cost"></span></div>
            <div id="multiple-recipes" class="d-none"><span class="font-w600 font-size-xs text-info"><i class="fa fa-fw fa-info-circle mr-1"></i><lang-string lang-id="MULTIPLE_RECIPES_MSG"></lang-string></span></div>
          </div>
        </div>
      </a>
      <div id="locked-container" class="block block-link-pop nav-link border pointer-enabled font-w600 mb-1">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-2">
            <img class="shop-img" data-src="assets/media/main/question.png">
          </div>
          <div class="media-body text-left">
            <span id="locked" class="nav-link font-size-sm border border-danger justify-vertical-center"></span>
          </div>
        </div>
      </div>
    </li>
  </ul>
</template>
<template id="summoning-recipe-option-template">
  <ul class="nav nav-pills nav-justified">
    <li class="nav-item mr-1">
      <a id="unlocked" class="block block-link-pop nav-link border pointer-enabled font-w600 mb-1">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-2"><img id="recipe-image" class="shop-img"></div>
          <div class="media-body text-left">
            <div><span class="font-w600 font-size-lg" id="recipe-name"></span><span class="font-w600 font-size-sm text-warning ml-2" id="recipe-tier"></span></div>
            <div><span class="font-w400 font-size-sm" id="recipe-cost"></span></div>
            <div id="multiple-recipes" class="d-none"><span class="font-w600 font-size-xs text-info"><i class="fa fa-fw fa-info-circle mr-1"></i><lang-string lang-id="MULTIPLE_RECIPES_MSG"></lang-string></span></div>
          </div>
        </div>
      </a>
      <div id="locked-container" class="block block-link-pop nav-link border pointer-enabled font-w600 mb-1">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-2">
            <img class="shop-img" data-src="assets/media/main/question.png">
          </div>
          <div class="media-body text-left">
            <span id="locked" class="nav-link font-size-sm border border-danger justify-vertical-center"></span>
          </div>
        </div>
      </div>
    </li>
  </ul>
</template>
<template id="skill-tree-menu-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="btn-skill-trees-dropdown"></button>
        <div class="dropdown-menu dropdown-menu-right font-size-sm max-vh-60 overflow-y-auto" id="skill-trees-dropdown-items">
        </div>
      </div>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block-content block-content-full">
      <div class="row">
        <div class="col-12 d-flex justify-content-end">
          <span class="font-size-sm"><lang-string lang-id="MENU_TEXT_SKILL_TREE_HINT"></lang-string></span>
        </div>
        <div class="col-8">
          <div class="btn-group mb-2">
            <button class="btn btn-primary" id="zoom-in"><i class="fa fa-plus"></i></button>
            <button class="btn btn-primary" id="zoom-out"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="col-4 d-flex justify-content-end">
          <span class="font-w600 mr-1"><lang-string lang-id="CURRENT_SKILL_TREE_POINTS_TO_SPEND"></lang-string></span>
          <span id="points-count" class="text-danger">0</span>
        </div>
        <div class="col-12 d-flex flex-column overflow-auto pt-5" id="node-scroll-container">
          <div class="position-relative m-auto" id="node-container"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="skill-tree-node-info-template">
  <div class="justify-vertical-center">
    <span class="font-w600 font-size-lg" id="name"></span>
    <div class="font-size-sm" id="requirements"></div>
    <div class="justify-vertical-center font-w600 font-size-sm" id="stats"></div>
    <div class="justify-vertical-center font-w600 font-size-sm" id="costs">
      <span class="font-size-base"><lang-string lang-id="MENU_TEXT_COSTS"></lang-string></span>
    </div>
  </div>
</template>
<template id="skill-tree-node-icon-template">
  <span class="font-size-sm font-w700" style="
    position: absolute;
    top: 6px;
    left: 6px;
    z-index: 1;
" id="name"></span>
  <img id="icon-image">
  <img id="locked-image" data-src="assets/media/skillTree/locked.png">
  <div class="font-size-xs justify-content-space-evenly text-center font-w600 overflow-y-auto py-3" id="description"></div>
  <span id="point-cost" class="font-size-sm badge badge-pill justify-vertical-center badge-danger"></span>
</template>
<template id="category-menu-template">
  <div class="bg-white p-3 push content-justify-center w-100" id="container">
    <div class="d-lg-none">
      <button class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke" type="button" id="expand-button">
        <span id="expand-text"></span>
        <i class="fa fa-bars"></i>
      </button>
    </div>
    <div class="d-none d-lg-block mt-2 mt-lg-0" id="expand-div">
      <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center" id="options-container"></ul>
    </div>
  </div>
</template>
<template id="category-menu-option-template">
  <li class="nav-main-item">
    <a class="nav-main-link active" id="link">
      <img class="skill-icon-xs m-0 mr-2" id="image">
      <span class="nav-main-link-name" id="name"></span>
    </a>
  </li>
</template>
<template id="mastery-pool-bonus-template">
  <div class="block block-rounded-double bg-combat-inner-dark p-3">
    <div class="media d-flex align-items-center push">
      <div class="mr-3">
        <h2 class="font-w700 text-success mb-0" id="percent"></h2>
      </div>
      <div class="media-body">
        <div class="font-w600 font-size-sm justify-vertical-left" id="description"></div>
        <div class="font-size-sm">
          <small id="xp-required"></small>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="mastery-pool-bonuses-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title">
        <lang-string lang-id="MENU_TEXT_MASTERY_POOL_CHECKPOINTS"></lang-string>
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block-content block-content-full">
      <realm-tab-select id="realm-select"></realm-tab-select>
      <div class="row gutters-tiny" id="bonus-container"></div>
    </div>
  </div>
</template>
<template id="realm-tab-select-template">
  <ul class="nav nav-tabs nav-tabs-blocks" role="tablist" id="options-container"></ul>
</template>
<!-- This is the base template for info icons, but I might as well create individual ones per icon type -->
<template id="info-icon-template">
  <div id="container" class="bank-item no-bg pointer-enabled m-2 info-icon">
    <img class="p-2" id="image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill" id="text"></small>
    </div>
  </div>
</template>

<!-- Attach an info-icon class to the container, this way we can use css -->
<template id="xp-icon-tooltip-template">
  <div class="text-center">
    <span class="font-w700 text-warning" id="xp"></span>
  </div>
  <div role="separator" class="dropdown-divider"></div>
  <div class="text-center">
    <small id="base-xp"></small><br>
    <small class="text-success" id="modifiers-xp"></small>
  </div>
  <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container" style="max-height:300px;overflow:auto;"></div>
</template>

<template id="xp-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/xp.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="xp"></small>
    </div>
  </div>
</template>

<template id="abyssal-xp-icon-template">
  <div id="container" class="bg-combat-ita pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/xp.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="xp"></small>
    </div>
    <img class="skill-icon-xxs info-icon-overlay" data-src="assets/media/skills/combat/abyssal_damage.png">
  </div>
</template>

<template id="skill-xp-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="skill-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="xp"></small>
    </div>
  </div>
</template>

<template id="interval-icon-tooltip-template">
  <div class="text-center text-warning">
    <lang-string lang-id="MENU_TEXT_TOOLTIP_INTERVAL"></lang-string><br>
    <small><lang-string lang-id="MENU_TEXT_INCLUSIVE_OF_BONUSES"></lang-string></small>
  </div>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="interval-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="image" data-src="assets/media/main/timer.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="interval"></small>
    </div>
  </div>
</template>

<template id="doubling-icon-tooltip-template">
  <h5 class="font-w400 font-size-sm mb-1 text-warning text-center">
    <lang-string lang-id="MENU_TEXT_TOOLTIP_DOUBLE"></lang-string>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-danger text-center" id="cap"></h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center">
    <small>
      <lang-string lang-id="MENU_TEXT_TOOLTIP_CHANCE_BELOW"></lang-string>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-info">
    <small>
      <s>
        <lang-string lang-id="MENU_TEXT_TOOLTIP_FUTURE_UPDATE"></lang-string>
      </s>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-warning">
      <lang-string lang-id="FUTURE_IS_NOW_OLD_MAN"></lang-string>
  </h5>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="doubling-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/double.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="chance"></small>
    </div>
  </div>
</template>

<template id="preservation-icon-tooltip-template">
  <h5 class="font-w400 font-size-sm mb-1 text-warning text-center">
    <lang-string lang-id="MENU_TEXT_TOOLTIP_PRESERVE"></lang-string>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-danger text-center" id="cap"></h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center">
    <small>
      <lang-string lang-id="MENU_TEXT_TOOLTIP_CHANCE_BELOW"></lang-string>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-info">
    <small>
      <s>
        <lang-string lang-id="MENU_TEXT_TOOLTIP_FUTURE_UPDATE"></lang-string>
      </s>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-warning">
      <lang-string lang-id="FUTURE_IS_NOW_OLD_MAN"></lang-string>
  </h5>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="preservation-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/preservation.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="chance"></small>
    </div>
  </div>
</template>

<template id="perfect-cook-icon-tooltip-template">
  <h5 class="font-w400 font-size-sm mb-1 text-warning text-center">
    <lang-string lang-id="MENU_TEXT_TOOLTIP_PERFECT_COOK"></lang-string>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-danger text-center" id="cap"></h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center">
    <small>
      <lang-string lang-id="MENU_TEXT_TOOLTIP_CHANCE_BELOW"></lang-string>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-info">
    <small>
      <s>
        <lang-string lang-id="MENU_TEXT_TOOLTIP_FUTURE_UPDATE"></lang-string>
      </s>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-warning">
      <lang-string lang-id="FUTURE_IS_NOW_OLD_MAN"></lang-string>
  </h5>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="perfect-cook-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/skills/cooking/perfect.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="chance"></small>
    </div>
  </div>
</template>

<template id="cooking-success-icon-tooltip-template">
  <h5 class="font-w400 font-size-sm mb-1 text-warning text-center">
    <lang-string lang-id="MENU_TEXT_TOOLTIP_SUCCESSFUL_COOK"></lang-string>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-danger text-center" id="cap"></h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center">
    <small>
      <lang-string lang-id="MENU_TEXT_TOOLTIP_CHANCE_BELOW"></lang-string>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-info">
    <small>
      <s>
        <lang-string lang-id="MENU_TEXT_TOOLTIP_FUTURE_UPDATE"></lang-string>
      </s>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-warning">
      <lang-string lang-id="FUTURE_IS_NOW_OLD_MAN"></lang-string>
  </h5>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="cooking-success-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/tick.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="chance"></small>
    </div>
  </div>
</template>

<template id="additional-primary-quantity-icon-tooltip-template">
  <h5 class="font-w400 font-size-sm mb-1 text-warning text-center"><lang-string lang-id="MENU_TEXT_TOOLTIP_ADDITIONAL_PRIMARY_RESOURCE"></lang-string></h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-info">
    <small>
      <s>
        <lang-string lang-id="MENU_TEXT_TOOLTIP_FUTURE_UPDATE"></lang-string>
      </s>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-warning">
      <lang-string lang-id="FUTURE_IS_NOW_OLD_MAN"></lang-string>
  </h5>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="additional-primary-quantity-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/additionalResource.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="quantity"></small>
    </div>
  </div>
</template>

<template id="cost-reduction-icon-tooltip-template">
  <h5 class="font-w400 font-size-sm mb-1 text-warning text-center">
    <lang-string lang-id="MENU_TEXT_TOOLTIP_COST_REDUCTION"></lang-string>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-danger text-center" id="cap"></h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-info">
    <small>
      <s>
        <lang-string lang-id="MENU_TEXT_TOOLTIP_FUTURE_UPDATE"></lang-string>
      </s>
    </small>
  </h5>
  <h5 class="font-w400 font-size-sm mb-1 text-center text-warning">
      <lang-string lang-id="FUTURE_IS_NOW_OLD_MAN"></lang-string>
  </h5>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm" id="source-container"></div>
</template>

<template id="cost-reduction-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/costReduction.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="percent"></small>
    </div>
  </div>
</template>

<template id="mastery-xp-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/mastery_header.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="xp"></small>
    </div>
  </div>
</template>

<template id="mastery-pool-icon-tooltip-template">
  <div class="text-center">
    <span id="xp"></span><br>
    <small><lang-string lang-id="MENU_TEXT_INCLUSIVE_OF_BONUSES"></lang-string></small>
  </div>
</template>

<template id="mastery-pool-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/main/mastery_pool.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="xp"></small>
    </div>
    <img class="skill-icon-xxs info-icon-overlay d-none" id="realm-icon-melvor" data-src="assets/media/main/logo_no_text.png">
    <img class="skill-icon-xxs info-icon-overlay d-none" id="realm-icon-abyssal" data-src="assets/media/skills/combat/abyssal_damage.png">
    <img class="skill-icon-xxs info-icon-overlay d-none" id="realm-icon-unknown" data-src="assets/media/main/question.png">
  </div>
</template>

<template id="stealth-icon-tooltip-template">
  <div class="text-center">
    <h5 class="font-w600 font-size-sm mb-1 text-white" id="stealth-vs-perception"></h5>
    <h5 class="font-w400 font-size-sm mb-1"><lang-string lang-id="MENU_TEXT_THIS_GIVES_YOU"></lang-string></h5>
    <small>
      <span id="success-rate"></span><br>
      <span id="increased-doubling"></span><br>
      <span id="npc-unique-chance"></span><br>
    </small>
    <div class="dropdown-divider"></div>
  <div class="row gutters-tiny w-100 px-3 font-size-sm mt-2" id="source-container"></div>
  </div>
</template>

<template id="stealth-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/skills/thieving/thieving.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="stealth"></small>
    </div>
  </div>
</template>

<template id="item-chance-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="item-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="chance"></small>
    </div>
  </div>
</template>

<template id="meteorite-chance-icon-tooltip-template">
  <div class="text-center">
    <strong><lang-string lang-id="ORE_NAME_Meteorite_Ore"></lang-string></strong>
  </div>
  <div class="text-center">
    <small><lang-string lang-id="METEORITE_TOOLTIP_INFO"></lang-string></small>
  </div>
</template>

<template id="meteorite-chance-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/skills/astrology/meteorite.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="chance"></small>
    </div>
  </div>
</template>

<template id="starfall-chance-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" data-src="assets/media/skills/astrology/starfall.png">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="chance"></small>
    </div>
  </div>
</template>

<template id="item-quantity-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="item-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="quantity"></small>
    </div>
    <img class="skill-icon-xxs is-in-shop d-none" id="auto-buy-icon" data-src="assets/media/main/shop_header.png">
  </div>
</template>

<template id="cooking-stockpile-icon-template">
  <div id="container" class="pointer-enabled info-icon border border-primary ml-1 mb-1 mt-1 mr-0">
    <img class="p-2" id="item-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="quantity"></small>
    </div>
  </div>
</template>

<template id="currency-quantity-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="currency-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-secondary" id="quantity"></small>
    </div>
  </div>
</template>

<template id="item-current-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="item-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="quantity"></small>
    </div>
    <img class="skill-icon-xxs is-in-shop d-none" id="auto-buy-icon" data-src="assets/media/main/shop_header.png">
  </div>
</template>

<template id="currency-current-icon-template">
  <div id="container" class="btn-light pointer-enabled m-2 info-icon">
    <img class="p-2" id="currency-image">
    <div class="font-size-sm text-white text-center">
      <small class="badge-pill bg-primary" id="quantity"></small>
    </div>
  </div>
</template>

<template id="quantity-icons-template">
  <span id="empty-text"></span>
</template>

<template id="current-quantity-icons-template">
  <span id="empty-text"></span>
</template>

<template id="requires-box-template">
  <h5 class="font-w600 mb-1 text-center">
    <lang-string lang-id="MENU_TEXT_REQUIRES"></lang-string>
  </h5>
  <quantity-icons id="icons"></quantity-icons>
</template>

<template id="haves-box-template">
  <h5 class="font-w600 mb-1 text-center">
    <lang-string lang-id="MENU_TEXT_YOU_HAVE"></lang-string>
  </h5>
  <current-quantity-icons id="icons"></current-quantity-icons>
</template>

<template id="produces-box-template">
  <h5 class="font-w600 mb-1 text-center">
    <lang-string lang-id="MENU_TEXT_PRODUCES"></lang-string>
  </h5>
  <quantity-icons id="icons"></quantity-icons>
</template>

<template id="grants-box-template">
  <h5 class="font-w600 mb-1 text-center">
    <lang-string lang-id="MENU_TEXT_GRANTS"></lang-string>
  </h5>
  <div class="justify-horizontal-center flex-wrap" id="icon-container">
    <span id="dash">-</span>
    <xp-icon id="xp-icon"></xp-icon>
    <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
    <mastery-xp-icon id="mastery-xp-icon"></mastery-xp-icon>
    <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
  </div>
</template>

<template id="cooking-bonus-box-template">
  <h5 class="font-w600 mb-1 text-center">
    <lang-string lang-id="MENU_TEXT_BONUSES"></lang-string>
  </h5>
  <div class="justify-horizontal-center flex-wrap" id="icon-container">
    <span id="dash">-</span>
    <preservation-icon class="d-none" id="preserve"></preservation-icon>
    <doubling-icon class="d-none" id="double"></doubling-icon>
    <perfect-cook-icon class="d-none" id="perfect"></perfect-cook-icon>
    <cooking-success-icon class="d-none" id="success"></cooking-success-icon>
    <additional-primary-quantity-icon class="d-none" id="additional-primary-quantity"></additional-primary-quantity-icon>
    <cost-reduction-icon class="d-none" id="cost-reduction"></cost-reduction-icon>
  </div>
</template>

<template id="artisan-menu-template">
  <div class="col-12 px-0">
    <div class="block-content block-content-full">
      <div class="row gutters-tiny">
        <div class="col-12">
          <div class="row row-deck gutters-tiny">
            <div class="col-4">
              <div class="block block-rounded-double bg-combat-inner-dark text-center p-3">
                <img class="bank-img-detail" id="product-image">
                <div style="position:absolute;left:0;bottom:10px;width:100%;">
                  <small class="font-w600 badge-pill bg-secondary m-1 text-white" id="product-quantity">-</small>
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="block block-rounded-double bg-combat-inner-dark pt-2 pl-2 pr-2 pb-1">
                <h5 class="font-size-sm font-w600 text-muted m-1">
                  <small>
                    <lang-string lang-id="MENU_TEXT_CREATE"></lang-string>
                  </small>
                </h5>
                <h5 class="font-w700 text-left text-combat-smoke m-1">
                  <span id="product-name">-</span>
                </h5>
                <h5 class="font-w400 font-size-sm text-left text-bank-desc m-1 mb-2">
                  <small id="product-description"></small>
                </h5>
                <h5 class="font-w400 font-size-sm text-left text-bank-desc m-1 mb-2">
                  <small id="selected-text">
                    <lang-string lang-id="MENU_TEXT_NONE_SELECTED"></lang-string>
                  </small>
                </h5>
                <h5 class="font-w400 font-size-sm text-left combat-action m-1 mb-2 pointer-enabled d-none" id="view-stats-text">
                  <lang-string lang-id="MENU_TEXT_VIEW_STATS"></lang-string>
                </h5>
                <div class="col-12">
                  <div class="row icon-size-48">
                    <preservation-icon id="product-preservation"></preservation-icon>
                    <doubling-icon id="product-doubling"></doubling-icon>
                    <additional-primary-quantity-icon class="d-none" id="product-additional-primary-quantity"></additional-primary-quantity-icon>
                    <cost-reduction-icon class="d-none" id="product-cost-reduction"></cost-reduction-icon>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark">
            <div class="row no-gutters">
              <div class="col-md-2"></div>
              <div class="col-12 col-md-8">
                <mastery-display class="mastery-6" id="mastery"></mastery-display>
              </div>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark pt-2 pb-1 text-center">
            <div class="row no-gutters">
              <div class="col-12 d-none" id="drop-down-container">
                <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <lang-string lang-id="MENU_TEXT_SELECT_RECIPE"></lang-string>
                  </button>
                  <div class="dropdown-menu font-size-sm overflow-y-auto" style="max-height: 60vh;z-index:1000;" id="recipe-options-container"></div>
                </div>
              </div>
              <requires-box class="col-12 col-sm-6 pb-2 icon-size-48" id="requires"></requires-box>
              <haves-box class="col-12 col-sm-6 pb-2 icon-size-48" id="haves"></haves-box>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark pt-2 pb-1 text-center">
            <div class="row no-gutters">
              <produces-box class="col-12 col-sm-6 pb-2 icon-size-48" id="produces"></produces-box>
              <grants-box class="col-12 col-sm-6 pb-2 icon-size-48" id="grants"></grants-box>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark p-3 text-center">
            <div class="row justify-content-center icon-size-48">
              <div>
                <button class="btn btn-success m-2 p-2" type="button" style="min-height: 48px;" id="create-button">
                  <lang-string lang-id="MENU_TEXT_CREATE"></lang-string>
                </button>
              </div>
              <interval-icon id="interval"></interval-icon>
              <div class="col-12">
                <progress-bar class="progress-height-5" id="progress-bar"></progress-bar>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<template id="herblore-artisan-menu-template">
  <div class="col-12">
    <div class="block-content block-content-full">
      <div class="row gutters-tiny">
        <div class="col-12">
          <div class="row row-deck gutters-tiny">
            <div class="col-4">
              <div class="block block-rounded-double bg-combat-inner-dark text-center p-3">
                <img class="bank-img-detail" id="product-image">
                <div style="position:absolute;left:0;bottom:10px;width:100%;">
                  <small class="font-w600 badge-pill bg-secondary m-1 text-white" id="product-quantity">-</small>
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="block block-rounded-double bg-combat-inner-dark pt-2 pl-2 pr-2 pb-1">
                <h5 class="font-size-sm font-w600 text-muted m-1">
                  <small>
                    <lang-string lang-id="MENU_TEXT_CREATE"></lang-string>
                  </small>
                </h5>
                <h5 class="font-w700 text-left text-combat-smoke m-1">
                  <span id="product-name">-</span>
                </h5>
                <h5 class="font-w400 font-size-sm text-left text-bank-desc m-1 mb-2">
                  <small id="product-description"></small>
                  <h5 class="font-w700 text-left text-combat-smoke m-1 d-none" id="tier-container">
                    <small class="mr-2" id="tier-text">
                      <lang-string lang-id="MENU_TEXT_POTION_TIER"></lang-string>
                    </small>
                    <span id="tier-span"></span>
                  </h5>
                </h5>
                <h5 class="font-w400 font-size-sm text-left text-bank-desc m-1 mb-2">
                  <small id="selected-text">
                    <lang-string lang-id="MENU_TEXT_NONE_SELECTED"></lang-string>
                  </small>
                </h5>
                <h5 class="font-w400 font-size-sm text-left combat-action m-1 mb-2 pointer-enabled d-none" id="view-stats-text">
                  <lang-string lang-id="MENU_TEXT_VIEW_STATS"></lang-string>
                </h5>
                <div class="col-12">
                  <div class="row icon-size-48">
                    <preservation-icon id="product-preservation"></preservation-icon>
                    <doubling-icon id="product-doubling"></doubling-icon>
                    <additional-primary-quantity-icon class="d-none" id="product-additional-primary-quantity"></additional-primary-quantity-icon>
                    <cost-reduction-icon class="d-none" id="product-cost-reduction"></cost-reduction-icon>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark">
            <div class="row no-gutters">
              <div class="col-md-2"></div>
              <div class="col-12 col-md-8">
                <mastery-display class="mastery-6" id="mastery"></mastery-display>
              </div>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark pt-2 pb-1 text-center">
            <div class="row no-gutters">
              <div class="col-12 d-none" id="drop-down-container">
                <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <lang-string lang-id="MENU_TEXT_SELECT_RECIPE"></lang-string>
                  </button>
                  <div class="dropdown-menu font-size-sm overflow-y-auto" style="max-height: 60vh;z-index:1000;" id="recipe-options-container"></div>
                </div>
              </div>
              <requires-box class="col-12 col-sm-6 pb-2 icon-size-48" id="requires"></requires-box>
              <haves-box class="col-12 col-sm-6 pb-2 icon-size-48" id="haves"></haves-box>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark pt-2 pb-1 text-center">
            <div class="row no-gutters">
              <produces-box class="col-12 col-sm-6 pb-2 icon-size-48" id="produces"></produces-box>
              <grants-box class="col-12 col-sm-6 pb-2 icon-size-48" id="grants"></grants-box>
            </div>
          </div>
          <div class="col-12 block block-rounded-double bg-combat-inner-dark p-3 text-center">
            <div class="row justify-content-center icon-size-48">
              <div>
                <button class="btn btn-success m-2 p-2" type="button" style="min-height: 48px;" id="create-button">
                  <lang-string lang-id="MENU_TEXT_CREATE"></lang-string>
                </button>
              </div>
              <interval-icon id="interval"></interval-icon>
              <div class="col-12">
                <progress-bar class="progress-height-5" id="progress-bar"></progress-bar>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="progress-bar-template">
  <div class="progress active" id="outer-bar">
    <div id="inner-bar" class="progress-bar bg-info progress-fast" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
</template>
<!-- END Component Templates -->
<!-- START Readable Item Templates -->
<template id="Message_In_A_Bottle_Swal_Content">
  <small><em>
      <lang-string lang-id="MISC_STRING_MESSAGE_IN_BOTTLE_TEXT"></lang-string>
    </em></small>
  <br>
  <br>
  <small class="text-success">
    <lang-string lang-id="MISC_STRING_MESSAGE_IN_BOTTLE_UNLOCK"></lang-string>
  </small>
</template>
<template id="Merchants_Permit_Swal_Content">
  <small><em>
      <lang-string lang-id="MISC_STRING_MERCHANTS_PERMIT_TEXT_0"></lang-string>
    </em><br>
    <lang-string lang-id="MISC_STRING_MERCHANTS_PERMIT_TEXT_1"></lang-string>
  </small>
  <br>
  <br>
  <small class="text-success">
    <lang-string lang-id="MISC_STRING_MERCHANTS_PERMIT_UNLOCK"></lang-string>
  </small>
</template>
<template id="Clue_Scroll_1_Swal_Content">
  <span class="text-info"><em>
      <lang-string lang-id="BIRTHDAY_EVENT_2023_CLUE_SCROLL_1"></lang-string>
    </em></span>
</template>
<template id="Clue_Scroll_2_Swal_Content">
  <span class="text-info"><em>
      <lang-string lang-id="BIRTHDAY_EVENT_2023_CLUE_SCROLL_2"></lang-string>
    </em></span>
</template>
<template id="Clue_Scroll_3_Swal_Content">
  <span class="text-info"><em>
      <lang-string lang-id="BIRTHDAY_EVENT_2023_CLUE_SCROLL_3"></lang-string>
    </em></span>
</template>
<template id="Clue_Scroll_4_Swal_Content">
  <span class="text-info"><em>
      <lang-string lang-id="BIRTHDAY_EVENT_2023_CLUE_SCROLL_4"></lang-string>
    </em></span>
</template>
<template id="Clue_Scroll_5_Swal_Content">
  <span class="text-info"><em>
      <lang-string lang-id="BIRTHDAY_EVENT_2023_CLUE_SCROLL_5"></lang-string>
    </em></span>
</template>
<template id="Clue_Scroll_6_Swal_Content">
  <span class="text-info"><em>
      <lang-string lang-id="BIRTHDAY_EVENT_2023_CLUE_SCROLL_6"></lang-string>
    </em></span>
</template>
<template id="Melantis_Clue_1_Swal_Content">
  <em class="font-size-sm">
    <lang-string lang-id="MELANTIS_CLUE_1_TEXT" lang-html="true"></lang-string>
  </em>
</template>
<template id="Melantis_Clue_2_Swal_Content">
  <img class="w-100" data-src="assets/media/skills/cartography/misc/melantis_clue_2.png"
    data-alt-lang-id="MELANTIS_CLUE_2_ALT_TEXT">
  <em class="font-size-sm text-info"><lang-string lang-id="MELANTIS_CLUE_2_TEXT"></lang-string></em>
</template>
<template id="Melantis_Clue_3_Swal_Content">
  <img class="w-100" data-src="assets/media/skills/cartography/misc/melantis_clue_3.png"
    data-alt-lang-id="MELANTIS_CLUE_3_ALT_TEXT">
  <em class="font-size-sm text-info"><lang-string lang-id="MELANTIS_CLUE_3_TEXT"></lang-string></em>
</template>
<template id="Melantis_Clue_4_Swal_Content">
  <em class="font-size-sm">
    <lang-string lang-id="MELANTIS_CLUE_4_TEXT" lang-html="true"></lang-string>
  </em>
</template>
<!-- END Readable Item Templates -->
<template id="corruption-element-template">
  <div class="media d-flex align-items-center push">
    <div class="mr-1">
      <div class="bank-item no-bg btn-light m-1">
        <img class="bank-img p-2" id="img">
      </div>
    </div>
    <div class="media-body">
      <div class="font-size-sm font-w600">
        <span class="text-success d-none" id="unlocked"><lang-string lang-id="MENU_TEXT_UNLOCKED"></lang-string></span>
        <span class="text-danger d-none" id="locked"><lang-string lang-id="MENU_TEXT_LOCKED"></lang-string></span>
      </div>
      <div class="font-size-xs"><span id="description"></span></div>
      <div class="font-size-xs"><span id="unlock-reqs"></span>
      </div>
    </div>
  </div>
</template>
<template id="corruption-menu-template">
</template>
<template id="Apology_Letter_Swal_Content">
  <strong>We're so sorry</strong>
  <br>
  <br>
  <span>
    Now that we have received confirmation from our finance department that initial M-Buck sales have made a huge profit, we'd like to say sorry.<br><br>
    We care about <s>money</s> you, and we want to make it up to you. We're giving you this apology letter for FREE as a token of our appreciation.<br><br>
    Over the new few weeks, we'll think about how we can make it up to you. We'll think about keeping you updated on our progress, and that's our promise.<br><br>
    <strong>Thank you for your continued support!</strong><br><br>
    <small><em>Free player advertisement:</em></small><br>
    Have you skipped the Battle Pass requirements yet? If not, what are you waiting for!? It's such a convenient way to get the best items in the game!
  </span>
</template>
<!-- END Readable Item Templates -->
		<div id="page-overlay"></div>
		<!-- Side Overlay-->
		<aside id="side-overlay" class="font-size-sm">
		  <!-- Side Content -->
		  <div class="content-side">
		    <!-- Side Overlay Tabs -->
		    <div class="block pull-x pull-t pb-5" id="bank-sidebar-overlay-container">
		    </div>
		    <!-- END Side Overlay Tabs -->
		  </div>
		  <!-- END Side Content -->
		</aside>
		<!-- END Side Overlay --><!-- Sidebar -->
<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header bg-white-5">
        <!-- Logo -->
        <div class="font-w600 text-dual text-center" style="z-index:1;pointer-events:none;width:95%;">
                <img class="logo-sidebar game-logo p-1" data-src="assets/media/main/MI-Into-the-Abyss-Logo.png?2" style="height:90px!important;margin-top: 16px!important;position:relative;left:5%;">
            <!--<span class="smini-hide">
                    <span class="font-w700 font-size-h5">Melvor Idle</span>
            </span>-->
        </div>
        <!-- END Logo -->

        <!-- Options -->
        <div>

            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" onClick="void(0)">
                <i class="fa fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
    </div>
    <!-- END Side Header -->
    <!-- Side Navigation -->
    <div class="js-sidebar-scroll">
        <div class="content-side content-side-full pt-1">
            <ul class="nav-main" data-file-version="?11766">
                <!-- Populated in sidebar.ts -->
            </ul>
        </div>
    </div>
    <!-- END Side Navigation -->
</nav>
<!-- END Sidebar --><!-- UPDATE NOTIFICATION -->
<div class="bg-image d-none" style="background-color: #34495e!important;" id="game-update-notification">
    <div class="bg-primary-dark-op">
        <div class="content content-narrow content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                <div class="flex-sm-fill">
                    <h1 class="font-w600 text-white mb-0 js-appear-enabled animated fadeIn" data-toggle="appear" id="header-update-released-title">Game Update Available</h1>
                    <h2 class="h4 font-w400 text-white-75 mb-0 js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="250">Please Export your save prior to refreshing.</h2>
                </div>
                <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                    <span class="d-inline-block js-appear-enabled animated fadeIn" data-toggle="appear" data-timeout="350">
                        <button class="btn btn-warning m-1 px-4 py-2 js-click-ripple-enabled d-none browser-only" data-toggle="click-ripple" onClick="downloadSave();" style="overflow: hidden; position: relative; z-index: 1;">
                            <i class="fa fa-download mr-1"></i> Download Save
                        </button>
                        <button type="button" class="btn btn-primary m-1 px-4 py-2 js-click-ripple-enabled" data-toggle="modal" data-target="#modal-import-export">
                            <i class="fa fa-file-export mr-1"></i> Export Save
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END UPDATE NOTIFICATION -->        
<!-- Main Container -->
<main id="main-container" class="main-container-mobile">
            
    <!-- Header -->
<header id="page-header" class="mb-3-mobile">
  <!-- Header Content -->
  <div class="content-header game-page-header bg-woodcutting" id="header-theme">
    <!-- Left Section -->
    <div class="d-flex align-items-center">
      <!-- Toggle Sidebar -->
      <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
      <button type="button" id="sidebar-btn" class="btn btn-sm btn-dual text-combat-smoke mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
        <i class="fa fa-fw fa-bars"></i>
      </button>
      <!-- END Toggle Sidebar -->
      <div class="m-header-icon pointer-enabled m-1-mobile" onClick="viewGameGuide();"><img data-src="assets/media/main/woodcutting_header.png" id="header-icon" height="32px" width="32px"></div>
      <div class="flex-sm-fill h5 my-2 mr-1">
        <div class="flex-sm-fill mr-1 mb-0 font-size-sm-mobile" id="header-title">Woodcutting</div>
        <div class="flex-sm-fill font-size-xs mr-1 mb-0" id="game-guide-header-link">
          <a class="pointer-enabled text-white" onclick="viewGameGuide();">
            <img data-src="assets/media/main/lore.png" class="skill-icon-xxs mr-1">
            <span id="game-guide-header-span"><lang-string lang-id="GAME_GUIDE_195"></lang-string></span>
          </a>
        </div>
      </div>
    </div>
    <!-- END Left Section -->
    <div class="justify-horizontal-right header-cloud-save">
      <span class="h5 font-w400 font-size-sm mr-2 mb-0 d-none" id="header-cloud-save-time"><small>
        <span id="last-cloud-save-span"><lang-string lang-id="MENU_TEXT_LAST_CLOUD_SAVE"></lang-string></span> <i id="last-cloud-save-question" class="fa fa-question-circle"></i></small><br class="d-mobile-none"><span class="d-lg-none">: </span><span class="font-w600" id="last-cloudsave-time">-</span></span>
      <button class="btn btn-sm btn-success border-1x border-dark d-none mr-1 font-size-xs-mobile" id="header-cloud-save-btn-connected" onClick="cloudManager.forceUpdatePlayFabSave();">
        <div class="spinner-border spinner-border-sm text-primary mr-2 d-none" role="status" id="forceSyncSpinner"></div><lang-string lang-id="MISC_STRING_FORCE_SAVE"></lang-string>
      </button>
      <button class="btn btn-sm btn-warning border-1x border-dark d-none" id="header-cloud-save-btn-connecting" disabled><lang-string lang-id="MENU_TEXT_CONNECTING"></lang-string></button>
      <button class="btn btn-sm btn-danger border-1x border-dark" id="header-cloud-save-btn-disconnected" disabled><lang-string lang-id="MENU_TEXT_NOT_LOGGED_INTO_CLOUD"></lang-string></button>
    </div>
    <!-- Right Section -->
    <div class="d-flex align-items-right">
      <div class="dropdown d-inline-block">
        <span class="text-size-sm font-w600 text-white badge badge-danger" id="header-potion-charges" style="position: absolute;bottom: -5px;right: -5px;pointer-events: none;"></span>
        <button type="button" class="btn btn-sm btn-dual text-combat-smoke" id="page-header-potions-dropdown" aria-haspopup="true" aria-expanded="true">
          <img class="skill-icon-xxs" id="header-potion-image" data-src="assets/media/skills/herblore/potion_empty.png">
        </button>
      </div>
      <div class="dropdown d-inline-block ml-1">
        <button type="button" class="btn btn-sm btn-dual text-combat-smoke" id="page-header-equipment-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="skill-icon-xxs" data-src="assets/media/bank/armour_helmet.png" id="page-header-equipment-dropdown-image">
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 border-0 font-size-sm" id="header-equipment-dropdown" aria-labelledby="page-header-equipment-dropdown" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-245px, 31px, 0px);">
          <div class="p-2 text-center">
            <h5 class="dropdown-header">
              <button role="button" class="btn btn-info" onClick="viewEquipmentStats();"><lang-string lang-id="COMBAT_MISC_113"></lang-string></button>
            </h5>
          </div>
          <div class="block-content block-content-full text-center pt-0">
            <div id="combat-equipment-set-container-1">
              <small class="text-dark"><lang-string lang-id="COMBAT_MISC_114"></lang-string></small><br>
              <div class="btn-group mb-1" id="combat-equipment-set-menu-1">
              </div>
            </div>
            <equipment-grid></equipment-grid>
          </div>
        </div>
      </div>
      <div class="dropdown d-inline-block ml-1">
        <button type="button" class="btn btn-sm btn-dual text-combat-smoke" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="skill-icon-xxs" id="header-account-icon" data-src="assets/media/skills/combat/combat.png" style="width: 18px;">
          <span id="account-name" class="d-none d-sm-inline-block ml-1"></span>
          <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
          <div class="expansion-1-status-dot d-none" style="position: absolute;top: -6px;left: 2px;"><span class="text-toth">•</span></div>
          <div class="expansion-2-status-dot d-none" style="position: absolute;top: 0px;left: 2px;"><span class="text-aod">•</span></div>
          <div class="expansion-3-status-dot d-none" style="position: absolute;top: 6px;left: 2px;"><span class="text-ita">•</span></div>
        </button>
        <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" id="header-user-options-dropdown" aria-labelledby="page-header-user-dropdown" style="min-width: 325px;">
          <div class="p-2">
            <span class="dropdown-melvor-cloud d-none" id="header-cloud-status-options"></span>
            <div role="separator" class="dropdown-divider dropdown-melvor-cloud d-none"></div>
            <h5 class="dropdown-header text-warning"><lang-string lang-id="SETTINGS_SETTING_7_0"></lang-string></h5>
            <a class="dropdown-item d-flex align-items-center justify-content-between pointer-enabled" onclick="saveData(); createSaveShareLink(currentCharacter);">
              <span>
                <i class="fa fa-share-square mr-1"></i>
                <lang-string lang-id="MENU_TEXT_CREATE_SAVE_LINK"></lang-string>
              </span>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between pointer-enabled" onclick="saveData(); openDownloadSave(currentCharacter);">
              <span><i class="fa fa-file-download mr-1"></i><lang-string lang-id="CHARACTER_SELECT_36"></lang-string></span>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between pointer-enabled" onclick="saveData(); openExportSave(currentCharacter);">
              <span><i class="fa fa-file-export mr-1"></i><lang-string lang-id="CHARACTER_SELECT_37"></lang-string></span>
            </a>
            <h5 class="dropdown-header text-warning"><lang-string lang-id="MISC_STRING_19"></lang-string></h5>
            <a class="dropdown-item d-flex align-items-center justify-content-between pointer-enabled" onclick="showUsernameChange()">
              <span><lang-string lang-id="MISC_STRING_20"></lang-string></span>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between pointer-enabled" onclick="showPageLoader(); saveData(); location.reload();">
              <span><lang-string lang-id="MISC_STRING_21"></lang-string></span>
            </a>
          </div>
        </div>
      </div>
      <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
  </div>
</header>
<!-- END Header --><div style="position: fixed; top: 2rem; right: 2rem; z-index: 9999999;">
				
    <div id="tutorial-tip-toast" class="toast fade hide" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img class="skill-icon-xxs mr-2" id="tutorial-tip-titleImg" data-src="assets/media/main/mastery_header.png">
            <strong class="mr-auto" id="tutorial-tip-title">Mastery Level Up!</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="toast-body" id="tutorial-tip-description">
            Be sure to check the <img class="skill-icon-xxs mr-1" data-src="assets/media/main/mastery_header.png"><strong>Mastery</strong> tab in the sidebar to see the benefits of Mastery Levels.
        </div>
    </div>

</div><div class="block-content block-content-full d-none" id="tutorial-container">
	<div class="row row-deck gutters-tiny">
    <tutorial-stage-display class="col-12" id="tutorial-stage-header"></tutorial-stage-display>
  </div>
</div><!-- COMBAT Content -->
<template id="combat-event-menu-template">
  <div class="block block-rounded block-link-pop border-top border-combat border-4x">
    <div class="block-header">
      <h3 class="mb-0 block-title" id="combat-event-menu-title">
        <lang-string lang-id="BANE_EVENT_0"></lang-string>
      </h3>
    </div>
    <div class="block-content pt-2">
      <div class="row">
        <div class="col-12 col-md-6 pb-2">
          <button class="btn btn-sm btn-danger w-100" role="button" id="combat-event-menu-startButton">
            <lang-string lang-id="BANE_EVENT_BTN_1"></lang-string>
          </button>
        </div>
        <div class="col-12 col-md-6 pb-2">
          <button class="btn btn-sm btn-info w-100" role="button" id="combat-event-menu-passiveButton">
            <lang-string lang-id="BANE_EVENT_BTN_2"></lang-string>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="combat-area-menu-template">
  <div class="block block-content block-rounded border-top border-combat border-4x pointer-enabled px-1"
    id="open-button">
    <div style="position: absolute;right: 4px;top: 5px;">
      <a class="font-w600 font-size-sm m-2 pointer-enabled dropdown-toggle" id="area-info-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><lang-string lang-id="MENU_TEXT_AREA_INFO"></lang-string></a>
      <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="dropdown-default-primary">
        <a class="dropdown-item pointer-enabled" id="view-monster-list-cont"><lang-string lang-id="MENU_TEXT_VIEW_MONSTER_LIST"></lang-string></a>
        <a class="dropdown-item pointer-enabled" id="view-combat-triangle"><lang-string lang-id="MENU_TEXT_VIEW_COMBAT_TRIANGLE"></lang-string></a>
        <div class="dropdown-divider" id="area-info-divider"></div>
        <div class="dropdown-item" id="complete-count"></div>
        <div class="dropdown-item" id="pet-located"></div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item pointer-enabled font-size-xs" id="wiki-link">
          <img class="skill-icon-xxs mr-1" data-src="assets/media/main/wiki_logo.svg?2" src="assets/media/main/wiki_logo.svg?2">
          <lang-string lang-id="VIEW_ON_OFFICIAL_WIKI"></lang-string>
        </a>
      </div>
    </div>
    <img id="title-aod" class="combat-area-title-aod d-none" data-src="assets/media/main/MI-Atlas-of-Discovery-Title.png">
    <img id="title-toth" class="combat-area-title-toth d-none" data-src="assets/media/main/MI-Throne-of-the-Herald-Title.png">
    <div class="media d-flex align-items-center push">
      <div class="mr-3">
        <img class="shop-img" id="image">
      </div>
      <div class="media-body" id="locked-container">
        <div class="font-w600" id="unlock-text"></div>
      </div>
      <div class="media-body" id="unlocked-container">
        <span class="p-1 bg-success rounded font-w700 d-none" id="tutorial-here"><lang-string
            lang-id="COMBAT_MISC_HERE"></lang-string></span>
        <div class="font-w600">
          <span id="area-name"></span>
          <span class="badge badge-pill m-1" id="min-difficulty-badge"></span>
          <span id="difficulty-dash">-</span>
          <span class="badge badge-pill m-1" id="max-difficulty-badge"></span>
        </div>
        <div class="font-size-2sm font-w600 text-warning d-none" id="barrier-notification"></div>
        <div class="font-size-2sm font-w600 text-warning d-none" id="combat-triangle-notification"></div>
        <div class="font-size-2sm font-w600 text-warning d-none" id="damage-type-notification"></div>
        <div class="font-size-2sm font-w600" id="entry-requirements-title"><lang-string
            lang-id="COMBAT_MISC_48"></lang-string></div>
        <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-size-2sm" id="entry-requirements">
        </ul>
        <div class="font-size-2sm text-danger" id="area-effect-container">
          <i class="fa fa-fw fa-info-circle mr-1"></i>
          <span id="effect-description"></span>
        </div>
        <div class="font-size-2sm d-none" id="monster-count"></div>
        <div class="font-size-2sm d-none" id="monster-level"></div>
        <div class="font-size-2sm d-none" id="rewards"></div>
        <div class="font-size-2sm font-size-xs font-w600 text-warning d-none" id="skill-unlock"></div>
      </div>
    </div>
    <div id="open-options" class="d-none"></div>
    <div class="font-size-sm d-none" id="event-button-cont">
      <button class="btn btn-sm btn-danger m-1 w-100" role="button" id="event-button"></button>
    </div>
  </div>
</template>
<template id="combat-triangle-set-table-template">
  <table class="table table-bordered table-vcenter">
    <col>
    <colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup>
    <colgroup span="2"></colgroup>
    <tr>
      <th colspan="7" scope="colgroup" class="text-center">
        <img class="skill-icon-xs mr-1" id="img" data-src="assets/media/main/missing_artwork.png">
        <span class="mr-2" id="name"></span>
        <img class="skill-icon-xs mr-1" id="area-img" data-src="assets/media/main/missing_artwork.png">
        <span class="mr-2" id="area-name"></span>
        <img class="skill-icon-xs mr-1" id="gamemode-img" data-src="assets/media/main/missing_artwork.png">
        <span class="mr-2" id="gamemode-name"></span><br>
        <span class="font-size-xs font-w400"><lang-string lang-id="MENU_TEXT_LEGEND_DMG_MODIFIER"></lang-string> | <lang-string lang-id="MENU_TEXT_LEGEND_RESIST_MODIFIER"></lang-string></span>
      </th>
    </tr>
    <tr>
      <th class="text-center" style="width: 150px;" rowspan="2"><lang-string lang-id="MENU_TEXT_PLAYER_ATTACK_STYLE"></lang-string></th>
      <th colspan="2" scope="colgroup"><img class="skill-icon-xs mr-1" data-src="assets/media/skills/combat/attack.png"><lang-string lang-id="MENU_TEXT_VS_MELEE"></lang-string></th>
      <th colspan="2" scope="colgroup"><img class="skill-icon-xs mr-1" data-src="assets/media/skills/ranged/ranged.png"><lang-string lang-id="MENU_TEXT_VS_RANGED"></lang-string></th>
      <th colspan="2" scope="colgroup"><img class="skill-icon-xs mr-1" data-src="assets/media/skills/magic/magic.png"><lang-string lang-id="MENU_TEXT_VS_MAGIC"></lang-string></th>
    </tr>
    <tr>
      <th scope="col"><lang-string lang-id="MENU_TEXT_LEGEND_DMG"></lang-string></th>
      <th scope="col"><lang-string lang-id="MENU_TEXT_LEGEND_RESIST"></lang-string></th>
      <th scope="col"><lang-string lang-id="MENU_TEXT_LEGEND_DMG"></lang-string></th>
      <th scope="col"><lang-string lang-id="MENU_TEXT_LEGEND_RESIST"></lang-string></th>
      <th scope="col"><lang-string lang-id="MENU_TEXT_LEGEND_DMG"></lang-string></th>
      <th scope="col"><lang-string lang-id="MENU_TEXT_LEGEND_RESIST"></lang-string></th>
    </tr>
    <tbody id="table-body"></tbody>
  </table>
</template>
<template id="combat-triangle-set-table-row-template">
    <td class="text-center" scope="row"><span id="player-attack-type">Melee</span></td>
    <td class="font-w600 font-size-sm"><span id="vs-melee-dmg">+0%</span></td> 
    <td class="font-w600 font-size-sm"><span id="vs-melee-dr">1.00x</span></td>
    <td class="font-w600 font-size-sm"><span id="vs-ranged-dmg">+10%</span></td>
    <td class="font-w600 font-size-sm"><span id="vs-ranged-dr">1.25x</span></td>
    <td class="font-w600 font-size-sm"><span id="vs-magic-dmg">-15%</span></td>
    <td class="font-w600 font-size-sm"><span id="vs-magic-dr">0.75x</span></td>
</template>
<template id="view-monster-list-table-template">
  <table class="table table-bordered table-vcenter">
    <tr>
      <th colspan="4" class="text-center">
        <img class="skill-icon-xs mr-1" id="area-img" data-src="assets/media/main/missing_artwork.png">
        <span class="mr-2" id="area-name"></span>
      </th>
    </tr>
    <tr>
      <th class="text-center">#</th>
      <th class="text-center">Monster</th>
    </tr>
    <tbody id="table-body"></tbody>
  </table>
</template>
<template id="view-monster-list-table-row-template">
    <td class="text-center"><span id="count"></span></td>
    <td class="text-left">
      <div class="media d-flex align-items-center push">
        <div class="mr-2">
          <img class="skill-icon-md" id="monster-img">
        </div>
        <div class="media-body text-left">
          <div><img class="skill-icon-xxs mr-1" id="attack-type"> <a class="font-w600 text-white" id="name"></a></div>
          <div><span class="font-w400 font-size-sm" id="combat-level"></span></div>
          <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-size-xs">
            <li class="mr-2" id="barrier-container">
                <img class="skill-icon-xs mr-1" data-src="assets/media/skills/combat/barrier.png">
                <span id="barrier"></span>
            </li>
            <li class="mr-2">
                <img class="skill-icon-xs mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png">
                <span id="hitpoints">69</span>
            </li>
          </ul>
        </div>
      </div>
    </td> 
</template>
<template id="monster-select-table-template">
  <table class="table table-sm table-vcenter">
    <colgroup>
      <col style="width: 80px;" />
      <col />
      <col style="width: 125px;" />
    </colgroup>
    <thead>
      <tr>
        <th class="text-center"><small>#</small></th>
        <th><small><lang-string lang-id="COMBAT_MISC_NAME"></lang-string></small></th>
        <th class="text-center"><small><lang-string lang-id="COMBAT_MISC_OPTIONS"></lang-string></small></th>
      </tr>
    </thead>
    <tbody id="table-body"></tbody>
  </table>
</template>
<template id="monster-select-table-row-template">
  <tr id="row">
    <th class="text-center" scope="row">
      <img class="max-height-64 max-width-64" id="monster-image">
    </th>
    <td class="font-w600 font-size-sm">
      <img class="skill-icon-xxs mr-1" id="attack-type"><span id="monster-name"></span><br>
      <small class="font-w400" id="combat-level"></small><br>
      <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-size-xs w-100">
        <li class="mr-2">
          <small>
            <img class="skill-icon-xs mr-1 d-none" id="barrier-icon"
              data-src="assets/media/skills/combat/barrier.png">
            <span id="barrier"></span>
          </small>
        </li>
        <li class="mr-2">
          <small>
            <img class="skill-icon-xs mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png">
            <span id="hitpoints"></span>
          </small>
        </li>
      </ul>
    </td>
    <td class="text-center">
      <button class="btn btn-sm btn-danger m-1 w-100" role="button" id="fight-button"><lang-string
          lang-id="COMBAT_MISC_53"></lang-string></button>
      <button class="btn btn-sm btn-primary m-1 w-100" role="button" id="drops-button"><lang-string
          lang-id="COMBAT_MISC_104"></lang-string></button>
    </td>
  </tr>
</template>
<template id="dungeon-select-template">
  <div class="font-size-sm p-1">
    <button class="btn btn-sm w-100" role="button" id="start-button"></button>
  </div>
</template>
<template id="abyss-depth-select-template">
  <div class="font-size-sm">
    <button class="btn btn-sm m-1 w-100" role="button" id="start-button"></button>
  </div>
</template>
<template id="stronghold-select-template">
  <table class="table table-sm table-vcenter">
    <colgroup>
      <col style="width: 75px;" />
      <col style="width: 160px;" />
      <col />
    </colgroup>
    <thead>
      <tr>
        <th class="text-center"><small><lang-string lang-id="MENU_TEXT_TIER"></lang-string></small></th>
        <th><small><lang-string lang-id="COMBAT_MISC_48"></lang-string></small></th>
        <th class="text-center"><small><lang-string lang-id="COMBAT_MISC_OPTIONS"></lang-string></small></th>
      </tr>
    </thead>
    <tbody id="table-body"></tbody>
  </table>
</template>
<template id="stronghold-tier-row-template">
  <tr id="row">
    <th><span class="font-w600 font-size-sm" id="name"></span></th>
    <td>
      <ul id="requirements-container" class="list justify-vertical-center mb-0 font-size-2sm">
      </ul>
    </td>
    <td class="text-center">
      <button class="btn btn-sm btn-danger m-1" role="button" id="start-button"><lang-string
          lang-id="MENU_TEXT_START"></lang-string></button>
      <button class="btn btn-sm btn-primary m-1" role="button" id="rewards-button"><lang-string
          lang-id="TUTORIAL_MISC_2"></lang-string></button>
    </td>
  </tr>
</template>
<template id="equipment-tooltip-template">
  <div class="justify-vertical-center">
    <span class="text-warning" id="item-name"></span>
    <span class="text-white" id="item-damage-type"></span>
    <small class="text-info text-center" id="item-description"></small>
    <small class="text-center" id="item-spec"></small>
    <small class="text-success justify-vertical-center" id="stat-container"></small>
  </div>
</template>
<template id="quick-equip-tooltip-template">
  <div class="text-center font-size-xs">
    <lang-string lang-id="MENU_TEXT_QUICK_EQUIP"></lang-string>
    <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-sm" id="button-container">
      <div class="btn-group-vertical m-1">
        <button class="btn btn-sm btn-outline-danger" id="unequip-button">X</button>
      </div>
    </ul>
  </div>
</template>
<template id="quick-equip-tooltip-button-template">
  <div class="btn-group-vertical m-1">
    <button class="btn btn-sm" id="equip"><img class="skill-icon-xs" id="image"></button>
    <button class="btn btn-sm btn-outline-warning font-size-xs" id="set"><lang-string
        lang-id="MENU_TEXT_SET"></lang-string></button>
  </div>
</template>
<template id="food-select-option-template">
  <span id="quantity"></span>
  <img class="combat-food" id="image">
  <span id="hitpoints"></span>
  <div class="mt-1 font-size-2sm d-none" id="modifiers"></div>
</template>
<template id="food-select-menu-template">
  <div class="btn-group">
    <button class="btn text-combat-smoke font-size-sm btn-outline-secondary" type="button" id="eat-button">
      <food-select-option id="selected"></food-select-option>
    </button>
    <button class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false" id="dropdown-food-select" type="button">
      <span class="sr-only"><lang-string lang-id="COMBAT_MISC_TOGGLE_DROPDOWN"></lang-string></span>
    </button>
    <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-food-select" id="options-container">
      <div class="dropdown-divider" id="drop-divider"></div>
      <a class="dropdown-item text-danger pointer-enabled" id="unequip-button"><lang-string
          lang-id="COMBAT_MISC_122"></lang-string></a>
    </div>
  </div>
</template>
<template id="equipment-grid-template">
  <div id="container">
    <div id="summoning-synergy-container">
      <img id="summoning-synergy-icon" class="skill-icon-sm" data-src="assets/media/skills/summoning/synergy_inactive.png">
    </div>
  </div>
</template>
<template id="equipment-grid-icon-template">
  <div id="container" class="overlay-container overlay-bottom">
    <img id="image"
      class="combat-equip-img border border-2x border-rounded-equip border-combat-outline p-1 pointer-enabled">
    <span id="quantity" class="overlay-item text-size-sm font-w600 badge badge-danger">0</span>
  </div>
</template>
<template id="character-resistance-template">
  <div class="col-8 font-w400 font-size-sm text-combat-smoke">
    <img class="skill-icon-xxs m-0 mr-1" id="media">
    <span id="name"></span>
  </div>
  <div class="col-4 text-right" id="resistance-div">
    <span id="resistance" class="font-w600 font-size-sm text-combat-smoke"></span> <span id="resistance-diff" class="text-success font-w400 d-none"></span>
  </div>
</template><div class="content d-none" id="combat-container">
  <div class="row row-deck gutters-tiny" id="combat-top-menu">
    <div class="col-12" id="offline-combat-alert">
      <div class="alert alert-danger alert-dismissable w-100" role="alert">
        <h3 class="alert-heading h4 my-2">
          <lang-string lang-id="COMBAT_MISC_55"></lang-string>
        </h3>
        <p class="mb-2">
          <lang-string lang-id="COMBAT_MISC_56"></lang-string>
        </p>
        <button role="button" class="btn btn-success m-1" onClick="showEnableOfflineCombatModal();">
          <lang-string lang-id="COMBAT_MISC_57"></lang-string>
        </button>
        <button role="button" class="btn btn-danger m-1" onClick="dismissOfflineCombatAlert();">
          <lang-string lang-id="COMBAT_MISC_58"></lang-string>
        </button>
      </div>
    </div>
    <combat-event-menu class="col-12" id="combat-event-menu"></combat-event-menu>
    <div class="col-12">
      <div class="block block-rounded block-link-pop border-top border-combat border-4x">
        <div class="col-12 pointer-enabled" onClick="toggleCombatSkillMenu();">
          <h5 class="font-w600 font-size-sm p-3 m-0"><i class="far fa-eye mr-2 d-none" id="combat-skill-menu-open"></i><i class="far fa-eye-slash mr-2" id="combat-skill-menu-closed"></i>
            <lang-string lang-id="COMBAT_MISC_94"></lang-string>
          </h5>
        </div>
        <combat-skill-progress-table class="col-12 d-none" id="combat-skill-progress-table"></combat-skill-progress-table>
      </div>
    </div>
  </div>
  <category-menu id="combat-area-category-menu"></category-menu>
  <div class="row row-deck">
    <div class="col-12 col-md-6 pl-0 p-0-mobile" id="combat-fight-container-player">
      <div class="block block-rounded block-link-pop border-top border-success border-4x bg-combat-dark">
        <div class="border-bottom border-2x text-combat-smoke pointer-enabled d-lg-none" onClick="togglePlayerContainer();">
          <h5 class="font-w600 font-size-sm text-combat-smoke p-3 m-0"><i class="far fa-eye mr-2"></i><lang-string lang-id="MENU_TEXT_PLAYER_CONTAINER"></lang-string></h5>
        </div>
        <div class="row no-gutters">
          <div class="col-12">
            <div class="block-content">
              <div class="row">
                <div class="col-12 col-xl-6 px-2 px-0-mobile">
                  <div class="row m-0 position-relative invisible">
                    <div class="progress combat active mb-1" style="height: 6px;">
                      <div class="progress-bar bg-secondary" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      </div>
                    </div>
                  </div>
                  <div class="row m-0 position-relative">
                    <div class="progress active bg-danger col-12 p-0" style="height: 15px">
                      <div id="combat-player-hitpoints-bar" class="progress-bar bg-success" role="progressbar" style="width: 40%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                      </div>
                    </div>
                    <div class="font-size-sm font-w600 text-danger" id="combat-player-splash-container"></div>
                  </div>
                  <div id="combat-player-effect-progress-bar-container"></div>
                  <div class="text-size-sm text-combat-smoke text-left mb-1 flex-row row no-gutters">
                    <div>
                      <span class="font-w700 align-middle">
                        <img class="skill-icon-xs mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png">
                        <span id="combat-player-hitpoints-current">-</span><span class="font-size-xs font-w400">/</span><span class="font-size-xs font-w400" id="combat-player-hitpoints-max">-</span>
                      </span>
                    </div>
                    <span class="ml-2" id="combat-player-auto-eat">
                      <img class="skill-icon-xs auto-eat-icon" data-src="assets/media/shop/autoeat.png">
                    </span>
                    <span class="pt-1 font-size-sm text-warning d-none" id="combat-player-auto-eat-span">
                    </span>
                    <div id="combat-player-effect-progress-icon-container"></div>
                  </div>
                </div>
                <div class="col-12 col-xl-6">
                  <progress-bar class="progress-height-6 mb-1 summoning-combat-bar" id="combat-progress-attack-summoning"></progress-bar>
                  <progress-bar class="progress-height-10" id="combat-progress-attack-player"></progress-bar>
                  <h5 class="text-combat-smoke text-center">
                    <small>
                      <span id="combat-player-attack-speed-desc">
                        <lang-string lang-id="COMBAT_MISC_9"></lang-string>
                      </span>
                      <span id="combat-player-attack-speed">-</span>
                    </small>
                    <img class="skill-icon-xs ml-2 d-none" id="combat-player-special-attack-icon" data-src="assets/media/main/special_attack.png">
                  </h5>
                </div>
                <div class="col-12">
                  <div class="text-size-sm text-combat-smoke text-left mb-1 flex-row row no-gutters" style="min-height:26px">
                    <div id="combat-player-effect-icon-container" class="row no-gutters flex-row">
                    </div>
                  </div>
                </div>
                <div class="col-4 col-lg-2 d-none combat-player-golbin-stats">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/skills/attack/attack.png">
                    <span class="text-size-sm text-combat-smoke" id="combat-player-golbin-stat-Attack">1</span>
                  </div>
                </div>
                <div class="col-4 col-lg-2 d-none combat-player-golbin-stats">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/skills/strength/strength.png">
                    <span class="text-size-sm text-combat-smoke" id="combat-player-golbin-stat-Strength">1</span>
                  </div>
                </div>
                <div class="col-4 col-lg-2 d-none combat-player-golbin-stats">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/skills/defence/defence.png">
                    <span class="text-size-sm text-combat-smoke" id="combat-player-golbin-stat-Defence">1</span>

                  </div>
                </div>
                <div class="col-4 col-lg-2 d-none combat-player-golbin-stats">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/skills/hitpoints/hitpoints.png">
                    <span class="text-size-sm text-combat-smoke" id="combat-player-golbin-stat-Hitpoints">10</span>

                  </div>
                </div>
                <div class="col-4 col-lg-2 d-none combat-player-golbin-stats">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/skills/ranged/ranged.png">
                    <span class="text-size-sm text-combat-smoke" id="combat-player-golbin-stat-Ranged">1</span>
                  </div>
                </div>
                <div class="col-4 col-lg-2 d-none combat-player-golbin-stats">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/skills/magic/magic.png">
                    <span class="text-size-sm text-combat-smoke" id="combat-player-golbin-stat-Magic">1</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="block-content pt-0 px-2 px-1-mobile">
              <div class="block block-rounded-double bg-combat-inner-dark text-center p-0 mb-2">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_105"></lang-string>
                  </h5>
                </div>
                <div class="row no-gutters px-2">
                  <div class="col-12">
                    <h5 class="font-w400 text-center m-1 mb-2 mt-2">
                      <food-select-menu id="combat-food-select"></food-select-menu>
                    </h5>
                  </div>
                  <div class="col-12">
                    <span class="font-w400 text-info text-center m-1 mb-2"><small><lang-string lang-id="COMBAT_MISC_HOLD_TO_EAT"></lang-string></small></span>
                  </div>
                  <settings-checkbox class="col-12 font-w400 font-size-sm text-center d-none" id="combat-food-auto-swap" data-setting-id="enableAutoSwapFood"></settings-checkbox>
                </div>
              </div>
              <div id="combat-player-container">
                <div class="block block-rounded-double bg-combat-inner-dark text-center p-0 mb-2">
                  <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                    <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                      <lang-string lang-id="COMBAT_MISC_106"></lang-string>
                    </h5>
                  </div>
                  <div class="px-2">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled" id="combat-menu-item-0" data-src="assets/media/bank/armour_helmet_bronze.png" onClick="changeCombatMenu(0);">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled" id="combat-menu-item-1" data-src="assets/media/skills/combat/spellbook.png" onClick="changeCombatMenu(1);">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled" id="combat-menu-item-3" data-src="assets/media/bank/rune_air.png" onClick="changeCombatMenu(3);">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled" id="combat-menu-item-2" data-src="assets/media/skills/prayer/prayer.png" onClick="changeCombatMenu(2);">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled d-lg-none" id="combat-menu-item-4" data-src="assets/media/skills/combat/combat.png" onClick="changeCombatMenu(4);">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled d-lg-none" id="combat-menu-item-5" data-src="assets/media/skills/slayer/slayer.png" onClick="changeCombatMenu(5);">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled" id="combat-menu-item-6" data-src="assets/media/skills/summoning/summoning.png" onClick="openSynergiesBreakdown();">
                    <img class="combat-menu-img border-rounded-equip p-1 m-1 pointer-enabled glow-animation expansion-3-show" id="combat-menu-item-7" data-src="assets/media/skills/corruption/corruption.png" onClick="openBrowseCorruption();">
                  </div>
                </div>
                <div id="combat-menu-0">
                  <div class="block block-rounded-double bg-combat-inner-dark text-center p-0 mb-2">
                    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                      <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                        <lang-string lang-id="COMBAT_MISC_18"></lang-string>
                      </h5>
                    </div>
                    <div class="row no-gutters px-2">
                      <div class="col-12">
                        <h5 class="font-w600 text-center m-1 mb-2 pointer-enabled"><a class="combat-action" onClick="viewEquipmentStats();"><small>
                              <lang-string lang-id="COMBAT_MISC_19"></lang-string>
                            </small></a></h5>
                      </div>
                    </div>
                    <equipment-grid class="px-2"></equipment-grid>
                    <div class="row px-2">
                      <div class="col-12" id="combat-equipment-set-container-0">
                        <div class="col-12">
                          <h5 class="font-w400 h5 text-combat-smoke text-center m-1 mb-2 mt-2"><small>
                              <lang-string lang-id="COMBAT_MISC_20"></lang-string>
                            </small></h5>
                        </div>
                        <div class="col-12 px-0">
                          <div class="font-w400 text-center m-1 mb-2" id="combat-equipment-set-menu-0">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-none" id="combat-menu-1">
                  <spellbook-menu id="combat-spellbook-menu"></spellbook-menu>
                </div>
                <div class="d-none" id="combat-menu-2">
                  <prayer-book-menu id="combat-prayer-book-menu"></prayer-book-menu>
                </div>
                <div class="d-none" id="combat-menu-3">
                  <rune-menu id="combat-rune-menu"></rune-menu>
                </div>
                <div class="d-none" id="combat-menu-4"></div>
                <div class="d-none" id="combat-menu-5"></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="block-content pt-0 px-2 px-1-mobile" id="desktop-combat-menus">
              <player-stats id="combat-player-stats"></player-stats>
              <slayer-task-menu id="combat-slayer-task-menu"></slayer-task-menu>
              <div class="block block-rounded-double bg-combat-inner-dark p-0 mb-2 d-none" id="combat-corruption-settings">
                  <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                    <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                      <img class="skill-icon-xxs m-0 mr-1" data-src="assets/media/skills/corruption/corruption.png">
                      <lang-string lang-id="SKILL_NAME_Corruption"></lang-string>
                    </h5>
                  </div>
                  <div class="row gutters-tiny">
                    <settings-checkbox class="font-w400 font-size-sm text-center p-2 w-100" id="combat-perma-corruption" data-setting-id="enablePermaCorruption"></settings-checkbox>
                  </div>
              </div>
              <div class="block block-rounded-double bg-combat-inner-dark text-center mb-2 p-0-mobile" id="combat-attack-styles">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_31"></lang-string>
                  </h5>
                </div>
                <div class="row gutters-tiny px-2" id="melee-attack-style-buttons"></div>
                <div class="row gutters-tiny px-2" id="ranged-attack-style-buttons"></div>
                <div class="row gutters-tiny px-2" id="magic-attack-style-buttons"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 pr-0 p-0-mobile" id="combat-fight-container-enemy">
      <div class="block block-rounded block-link-pop bg-combat-dark border-top border-danger border-4x">
        <div class="border-bottom border-2x text-combat-smoke d-lg-none">
          <h5 class="font-w600 font-size-sm text-combat-smoke p-3 m-0"><lang-string lang-id="PAGE_NAME_Combat"></lang-string></h5>
        </div>
        <div class="row row-deck">
          <div class="col-12">
            <div class="block-content">
              <div class="row">
                <div class="col-12 col-xl-6 px-2 px-0-mobile">
                  <div id="combat-enemy-barrier-container" class="invisible barrier-info">
                    <div class="row m-0 mb-1 position-relative">
                      <div class="progress active bg-secondary col-12 p-0" style="height: 7px">
                        <div id="combat-enemy-barrier-bar" class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-0 position-relative">
                    <div class="progress active bg-danger col-12 p-0" style="height: 15px">
                      <div id="combat-enemy-hitpoints-bar" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="font-size-sm font-w600 text-danger" id="combat-enemy-splash-container"></div>
                  </div>
                  <div id="combat-enemy-effect-progress-bar-container"></div>
                </div>
                <div class="col-12 col-xl-6 px-2 px-0-mobile">
                  <div class="invisible">
                    <div class="row m-0 mb-1 position-relative">
                      <div class="progress active bg-secondary col-12 p-0" style="height: 3px">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                  <progress-bar class="progress-height-10" id="combat-progress-attack-enemy"></progress-bar>
                  <div class="text-size-sm text-combat-smoke text-center">
                    <small>
                      <span id="combat-enemy-attack-speed-desc">Attack Interval:</span> <span id="combat-enemy-attack-speed">-</span>
                    </small>
                  </div>
                </div>
                <div class="col-12">
                  <div class="text-size-sm text-combat-smoke text-left mb-1 flex-row row no-gutters">
                    <div style="min-width:135px">
                      <span class="font-w700 align-middle">
                        <img class="skill-icon-xs mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png">
                        <span id="combat-enemy-hitpoints-current">-</span><span class="font-size-xs font-w400">/</span><span class="font-size-xs font-w400" id="combat-enemy-hitpoints-max">-</span>
                      </span>
                    </div>
                    <div id="combat-enemy-barrier-container-1" class="barrier-info">
                        <span class="font-w700 align-middle ml-2">
                          <img class="skill-icon-xs mr-1" data-src="assets/media/skills/combat/barrier.png">
                          <span id="combat-enemy-barrier-current">-</span><span class="font-size-xs font-w400">/</span><span class="font-size-xs font-w400" id="combat-enemy-barrier-max">-</span>
                        </span>
                      </div>
                    <div id="combat-enemy-effect-progress-icon-container"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 d-none" id="combat-pause-container">
            <div class="block-content pt-0 px-1-mobile">
              <div class="block block-rounded-double bg-combat-inner-dark text-center p-2 mb-2">
                <h5 class="font-w600 text-danger mb-1">
                  <lang-string lang-id="COMBAT_MISC_82"></lang-string>
                </h5>
                <div class="font-size-sm mb-1">
                  <lang-string lang-id="COMBAT_MISC_83"></lang-string>
                </div>
                <button role="button" class="btn btn-success" onClick="game.combat.resumeDungeon();">
                  <lang-string lang-id="COMBAT_MISC_84"></lang-string>
                </button>
              </div>
            </div>
          </div>
          <div class="col-12 d-none" id="combat-golbin-raid-wave-skip">
            <div class="block-content pt-0 px-1-mobile">
              <div class="block block-rounded-double bg-combat-inner-dark p-3">
                <div class="row no-gutters">
                  <div class="col-12 col-md-6 text-center">
                    <h5 class="font-w600 text-combat-smoke font-size-sm mb-1"><span id="golbin-raid-skip-cost"></span></h5>
                  </div>
                  <div class="col-12 col-md-6 text-center">
                    <button role="button" class="btn btn-success" onClick="game.golbinRaid.skipWave();">
                      <lang-string lang-id="COMBAT_MISC_86"></lang-string>
                    </button>
                    <h5 class="font-w600 text-combat-smoke font-size-sm mb-1"><small><span data-currency-quantity="melvorD:RaidCoins" data-currency-format="youHave" id="golbin-raid-skip-current"></span></small></h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="block-content pt-0 px-2 px-1-mobile">
              <div class="block block-rounded-double bg-combat-inner-dark text-center pb-1 mb-2">
                <div class="block-header block-header-default bg-combat-enemy-name-block-header px-3 py-1 mb-0">
                  <h5 class="font-size-md font-w600 mb-0 w-100 text-center">
                    <img class="skill-icon-xs mr-2" id="combat-enemy-attack-type-name" data-src="assets/media/skills/attack/attack.png">
                    <span class="text-light" id="combat-enemy-name">-</span>
                  </h5>
                </div>
                <div class="bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-w600 font-size-sm mb-0">
                    <small>
                      <img class="skill-icon-xxs mr-2" id="combat-dungeon-img" data-src="assets/media/main/question.png">
                      <span id="combat-dungeon-name">
                        <lang-string lang-id="COMBAT_MISC_88"></lang-string>
                      </span>
                      <span id="combat-dungeon-floor-count"></span> <span id="combat-dungeon-count"></span><span id="combat-area-effect"></span>
                    </small>
                  </h5>
                </div>
                <div class="row no-gutters px-2">
                  <div class="col-12">
                    <div class="row no-gutters">
                      <div class="col-12">
                        <div id="combat-enemy-img" style="height:260px;"></div>
                      </div>
                      <div class="col-12">
                        <div class="text-size-sm text-combat-smoke text-left mb-1 flex-row row no-gutters" style="min-height:26px">
                          <div id="combat-enemy-effect-icon-container" class="row no-gutters flex-row">
                          </div>
                        </div>
                      </div>
                    </div>
                    <combat-levels style="position:absolute;top:-4px;left:-6px" id="combat-enemy-levels"></combat-levels>
                  </div>
                  <div class="col-12">
                    <div class="row gutters-tiny">
                      <div class="col-12">
                        <button role="button" class="btn btn-sm btn-danger m-1 w-100 d-none" id="combat-btn-attack">
                          ATTACK PEW PEW
                        </button>
                      </div>
                      <div class="col-6">
                        <button role="button" class="btn btn-sm btn-primary m-1 w-100" id="combat-btn-monster-drops">
                          <lang-string lang-id="COMBAT_MISC_41"></lang-string>
                        </button>
                      </div>
                      <div class="col-6" id="combat-enemy-options">
                        <button type="button" class="btn btn-sm btn-warning m-1 w-100" id="combat-btn-run"><img class="skill-icon-xxs mr-1" data-src="assets/media/skills/combat/run.png">
                          <lang-string lang-id="COMBAT_MISC_40"></lang-string>
                        </button>
                      </div>
                      <div class="col-6">
                        <button role="button" class="btn btn-sm btn-primary m-1 d-none w-100" id="combat-btn-modifiers-raid" onclick="game.golbinRaid.fireViewModifiersModal()">
                          <lang-string lang-id="GOLBIN_RAID_VIEW_MODIFIERS"></lang-string>
                        </button>
                      </div>
                      <div class="col-6">
                        <button role="button" class="btn btn-sm btn-danger m-1 d-none w-100" id="combat-btn-pause-raid" onclick="game.golbinRaid.pause()">
                          <lang-string lang-id="GOLBIN_RAID_PAUSE_RAID"></lang-string>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-12" id="combat-enemy-special-attack-desc-container-block">
            <div class="block-content pt-0 w-100 px-2 px-1-mobile">
              <enemy-special-attacks id="combat-enemy-special-attacks"></enemy-special-attacks>
            </div>
          </div>
          <div class="col-12" id="combat-enemy-passive-desc-container-block">
            <div class="block-content pt-0 w-100 px-2 px-1-mobile">
              <enemy-passives id="combat-enemy-passives"></enemy-passives>
            </div>
          </div>
          <div class="col-12">
            <div class="block-content pt-0 px-2 px-1-mobile">
              <div class="row row-deck">
                <offensive-stats class="col-12 col-xl-6 d-block mb-2" id="combat-enemy-offensive-stats"></offensive-stats>
                <defensive-stats class="col-12 col-xl-6 d-block mb-2" id="combat-enemy-defensive-stats"></defensive-stats>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="block-content pt-0 px-2 px-1-mobile">
              <combat-loot-menu id="combat-loot"></combat-loot-menu>
            </div>
          </div>
          <div class="col-12" id="destroy-combat-loot-container">
            <h5 class="font-w400 text-combat-smoke text-right w-100 pr-3 pt-3 mb-2"><button type="button" class="btn btn-sm btn-danger" id="combat-btn-destroy-all-loot">
                <lang-string lang-id="MENU_TEXT_DESTROY_LOOT"></lang-string>
              </button></h5>
          </div>
        </div>
      </div>
    </div>
    <div id="monsters"></div>
  </div>

</div>
<!-- END COMBAT Content --><!-- WOODCUTTING Content -->
<template id="woodcutting-tree-template">
  <div class="block block-rounded block-link-pop border-top border-danger border-4x justify-vertical-center" id="locked-container">
    <div class="block-content block-content-full bg-light pb-0">
      <div class="font-size-sm font-w600 text-center text-muted"><span id="woodcutting-locked-text"><lang-string lang-id="MENU_TEXT_LOCKED"></lang-string></span><br>
        <img class="mining-ore-img m-3" data-src="assets/media/skills/woodcutting/woodcutting.png"><br>
        <span class="badge badge-danger badge-pill w-100 mb-1" id="level-required">Level 1</span>
        <div class="badge badge-danger badge-pill w-100 d-none" id="abyssal-level-required"></div>
      </div>
      <div class="font-size-sm font-w600 text-danger badge-pill mb-1 text-center" id="requirements"></div>
    </div>
  </div>
  <a class="block block-rounded block-link-pop border-top border-woodcutting border-4x pointer-enabled d-none" id="button">
    <div class="block-content block-content-full pb-0">
      <div class="font-size-sm font-w600 text-center text-muted" id="unlocked-text">
        <small><lang-string lang-id="MENU_TEXT_CUT"></lang-string></small><br>
        <span id="tree-name"></span><br>
        <small><span id="xp-text"></span> / <i class="far fa-clock mr-1"></i><span id="interval-text"></span></small>
      </div>
      <div class="text-center">
        <img class="mining-ore-img" id="tree-image">
      </div>
      <div class="progress active" id="progress-container">
        <div class="progress-bar bg-woodcutting" role="progressbar" style="width: 0%;" aria-valuenow="0"
          aria-valuemin="0" aria-valuemax="100" id="progress-bar"></div>
      </div>
    </div>
    <div class="block-content" id="mastery-container">
      <mastery-display class="mastery-8" id="mastery"></mastery-display>
    </div>
  </a>
</template>
<div class="content d-none" id="woodcutting-container">

<div class="skill-info">
  <skill-header data-skill-id="melvorD:Woodcutting"></skill-header>
</div>
<!-- TREES -->
<div class="row row-deck" id="woodcutting-tree-container">
    <div class="col-12">
        <div class="block block-rounded block-link-pop border-top border-woodcutting border-4x">
            <div class="block-content block-content-full">
                <progress-bar id="cut-tree-progress"></progress-bar>
                <div class="col-12">
                    <div class="row justify-content-center" id="woodcutting-grants" style="min-height:56px;">
                        <h5 class="font-w600 font-size-sm mt-2 mb-1" id="woodcutting-info-message"><lang-string lang-id="MISC_STRING_10"></lang-string></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <realm-select-menu class="col-12" data-skill-id="melvorD:Woodcutting"></realm-select-menu>
</div>
<!-- END TREES -->

</div>
<!-- END WOODCUTTING Content --><!-- FISHING Content -->
<!-- Template for a menu that displays a fishing area -->
<template id="fishing-area-menu-template">
  <div class="block block-rounded border-top border-fishing border-4x" id="area-block" style="height:370px;">
    <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1 pointer-enabled flex-wrap" id="area-header">
      <h5 class="font-size-sm font-w600 mb-0 text-left">
        <i class="fa text-muted mr-2 font-w300 fa-eye" id="area-eyecon"></i>
        <span id="area-name"></span>
      </h5>
      <div class="block-options">
        <span class="font-w600 font-size-sm mr-2 content-item" id="fish-chance"></span>
        <span class="font-w600 font-size-sm mr-2 content-item" id="junk-chance"></span>
        <span class="font-w600 font-size-sm mr-2 content-item" id="special-chance"></span>
      </div>
    </div>
    <div class="row gutters-tiny">
      <div class="col-12 col-md-6">
        <div class="block-content block-content-full text-center p-2" id="button-container"></div>
      </div>
      <div class="col-12 col-md-6">
        <div class="block-content block-content-full text-center p-2" id="info-container">
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="fishing-img m-2 d-none" id="fish-image">
            </div>
            <div class="media-body">
              <small>
                <lang-string lang-id="SKILL_NAME_Fishing"></lang-string>
              </small>
              <br><span id="fish-name">-</span>
            </div>
          </div>
          <div class="col-12 d-none" id="fish-info-container">
            <div class="col-12 row justify-content-center gutters-tiny text-center mb-3 icon-size-32">
              <xp-icon id="xp-icon"></xp-icon>
              <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
              <skill-xp-icon id="str-xp-icon"></skill-xp-icon>
              <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
              <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
            </div>
            <div class="h5 font-w400 font-size-sm text-combat-smoke m-2"><i class="far fa-clock mr-1"></i><span id="fish-interval"></span></div>
            <mastery-display class="mastery-4" id="fish-mastery"></mastery-display>
          </div>
          <button role="button" class="btn btn-sm btn-info m-1 mt-3 d-none" id="start-button"></button>
          <div class="col-12">
            <div class="spinner-border spinner-border-sm text-primary mr-2 d-none" id="status-spinner" role="status"></div><span class="font-w400 font-size-sm"><small id="status-text"></small></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<!-- Template for an unlocked individual fish buttons in the fishing area menu -->
<template id="fishing-area-menu-button-template">
  <ul class="nav nav-pills nav-justified push">
    <li class="nav-item mr-1">
      <a class="block block-link-pop nav-link border pointer-enabled font-w600 mb-1" id="link">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-2">
            <img class="skill-icon-sm" data-src="assets/media/main/question.png" id="fish-image">
          </div>
          <div class="media-body text-left">
            <div class="justify-vertical-left">
              <span id="fish-name"></span>
              <span class="text-danger" id="level"></span>
              <span class="text-danger" id="abyssal-level"></span>
            </div>
            <div class="font-w400" id="fish-rates-cont">
              <small><span class="font-w600 mr-2" id="xp-text">69</span><i class="far fa-clock mr-1"></i><span id="interval-text">2 - 4 seconds</span></small></div>
          </div>
        </div>
      </a>
    </li>
  </ul>
</template>
<!-- Template for fishing contest menu -->
<template id="fishing-contest-menu-template">
  <div class="block block-rounded block-content block-content-full border-top border-fishing border-4x">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="row no-gutters">
          <div class="col-12">
            <h3 class="font-w600 text-left mb-2 text-combat-smoke" id="block-title"><lang-string lang-id="MELVOR_IDLES_FISHING_CONTEST"></lang-string></h3>
          </div>
          <div class="col-12">
            <h5 class="font-w600 text-danger mb-2" id="contest-status"><lang-string lang-id="FISHING_CONTEST_NOT_STARTED"></lang-string></h5>
          </div>
          <div class="col-12">
            <span class="font-w600 text-left mb-0"><lang-string lang-id="FISHING_CONTEST_SET_DIFFICULTY"></lang-string></span>
          </div>
          <div class="col-12" id="difficulties">
          </div>
          <div class="col-12 mb-2">
            <button class="btn btn-danger m-1" id="btn-stop-contest"><lang-string lang-id="FISHING_CONTEST_STOP_CONTEST"></lang-string></button>
          </div>
          <div class="col-12 font-size-sm">
            <div><lang-string lang-id="FISHING_CONTEST_REQUIRED_FISH"></lang-string> <span class="text-success" id="required-fish"></span></div>
            <div><lang-string lang-id="FISHING_CONTEST_BEST_CATCH"></lang-string> <span class="text-success" id="best-fish"></span></div>
          </div>
          <div class="col-12 font-size-sm mt-2">
            <lang-string lang-id="FISHING_CONTEST_DIFFICULTY"></lang-string> <span class="text-info font-w600" id="chosen-difficulty"></span>
          </div>
          <div class="col-12 font-size-sm push">
            <lang-string lang-id="FISHING_CONTEST_REMAINING_ACTIONS"></lang-string> <span class="text-info font-w600" id="remaining-actions"></span>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row no-gutters">
          <div class="col-12">
            <div class="dropdown-divider"></div>
          </div>
          <div class="col-12">
            <h5 class="font-w600 mb-2"><lang-string lang-id="FISHING_CONTEST_LEADERBOARD"></lang-string></h5>
          </div>
          <div class="col-12 font-size-sm mt-2" id="leaderboard">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<div class="content d-none" id="fishing-container">


    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Fishing"></skill-header>
    </div>
  <div class="row row-deck" id="fishing-contest-menu-container"></div>
  <!-- FISHING -->
  <div class="row row-deck" id="fishing-area-menu-container">
    <realm-select-menu class="col-12" data-skill-id="melvorD:Fishing"></realm-select-menu>
  </div>
  <!-- END FISHING -->

</div>
<!-- END FISHING Content --><!-- FIREMAKING Content -->
<div class="content d-none" id="firemaking-container">
  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Firemaking"></skill-header>
  </div>
<!-- FIREMAKING -->
  <div class="row">
    <firemaking-log-menu class="col-12 col-lg-6" id="firemaking-log-menu"></firemaking-log-menu>
    <div class="col-12 col-lg-6">
      <div class="row gutters-tiny">
        <firemaking-bonfire-menu id="firemaking-bonfire-menu" class="col-12"></firemaking-bonfire-menu>
        <firemaking-oil-menu id="firemaking-oil-menu" class="col-12 expansion-3-show"></firemaking-oil-menu>
      </div>
    </div>
  </div>
<!-- END FIREMAKING -->
</div>
<!-- END FIREMAKING Content --><!-- COOKING Content -->
<div class="content d-none" id="cooking-container">
  <template id="cooking-recipe-selection-template">
    <div class="block block-rounded-double bg-combat-inner-dark p-3">
      <div class="media d-flex align-items-center push mb-0">
        <div class=" mr-2">
          <img class="shop-img" id="product-image">
          <h5 class="font-w700 font-size-sm"><img class="skill-icon-xxs ml-2 mr-1" data-src="assets/media/main/mastery_header.png"><span id="mastery-level" class="mr-1"></span><small class="font-w400" id="mastery-percent"></small></h5>
        </div>
        <div class="media-body text-left">
          <h5 class="font-w700 mb-1"><span id="product-name"></span><button role="button" class="btn btn-sm btn-success ml-2" id="select-button" data-dismiss="modal"><lang-string lang-id="MISC_STRING_29"></lang-string></button></h5>
          <div class="row gutters-tiny mb-3 icon-size-48">
            <interval-icon id="interval-icon"></interval-icon>
            <quantity-icons id="cost-icons"></quantity-icons>
          </div>
          <h5 class="font-w400 font-size-sm mb-0">
            <img class="skill-icon-xxs mr-1" data-src="assets/media/skills/cooking/cooking.png"><span id="cooking-xp"></span><img class="skill-icon-xxs ml-2 mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png"><span id="healing-amount"></span>
          </h5>
        </div>
      </div>
      <div class="font-w400 font-size-sm mb-0" id="food-modifiers-cont">
        <div role="separator" class="dropdown-divider"></div>
        <h5 class="font-w600 font-size-sm mb-0 text-center"><lang-string lang-id="MENU_TEXT_COOKING_WHEN_SET_AS"></lang-string></h5>
        <div class="font-w400 font-size-sm mb-0 text-center" id="food-modifiers"></div>
      </div>
      <div class="font-w400 font-size-sm mb-0" id="perfect-food-modifiers-cont">
        <div role="separator" class="dropdown-divider"></div>
        <h5 class="font-w600 font-size-sm mb-0 text-center"><lang-string lang-id="MENU_TEXT_COOKING_WHEN_SET_AS_PERFECT" lang-html="true"></lang-string></h5>
        <div class="font-w400 font-size-sm mb-0 text-center" id="perfect-food-modifiers"></div>
      </div>
    </div>
  </template>
  <template id="locked-cooking-recipe-template">
    <div class="block block-rounded-double bg-combat-inner-dark p-3">
      <div class="media d-flex align-items-center push mb-0">
        <div class="mr-2">
          <img class="shop-img" data-src="assets/media/main/question.png">
        </div>
        <div class="media-body text-left">
          <h5 class="font-w700 mb-1 text-danger" id="locked-text"></h5>
        </div>
      </div>
    </div>
  </template>
  <template id="cooking-menu-template">
    <div class="block block-rounded border-top border-cooking border-4x">
      <div class="block-content block-content-full">
        <div class="font-size-sm font-w400">
          <div class="row gutters-tiny">
            <div class="col-6 text-left">
              <div class="media d-flex align-items-center push">
                <div class="mr-2">
                  <img class="resize-48 m-0" id="upgrade-image">
                </div>
                <div class="media-body text-left">
                  <h5 class="font-w700 mb-0" id="upgrade-name"></h5>
                </div>
              </div>
            </div>
            <div class="col-6 text-right">
              <button class="btn btn-sm btn-primary" type="button" id="select-recipe-button">
                <lang-string lang-id="MENU_TEXT_SELECT_COOKING_RECIPE"></lang-string>
              </button>
            </div>
            <div class="col-12 mt-2" id="selected-recipe-container">
              <div class="block block-rounded-double bg-combat-inner-dark p-3">
                <div class="media d-flex align-items-center push mb-0">
                  <div class="col-12">
                    <div class="media d-flex align-items-center push m-0">
                      <div class="m-1 font-w600">
                        <img class="resize-40 mr-1" id="product-image"><br>
                        <small class="font-w600 badge-pill bg-secondary m-1" style="position: absolute;" id="product-count">0</small>
                      </div>
                      <div class="media-body">
                        <h5 class="font-w700 mb-1 text-center" id="product-name"></h5>
                        <div class="font-w400 font-size-sm text-center">
                          <img class="skill-icon-xxs mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png">
                          <span id="product-healing"></span>
                        </div>
                      </div>
                    </div>
                    <requires-box class="mb-3 icon-size-48 icon-box-small" id="requires"></requires-box>
                    <grants-box class="mb-3 icon-size-32 icon-box-small" id="grants"></grants-box>
                  </div>
                </div>
                <mastery-display class="mastery-6" id="mastery"></mastery-display>
              </div>
            </div>
            <haves-box class="col-12 p-1 icon-size-48" id="haves"></haves-box>
            <cooking-bonus-box class="col-12 p-1 icon-size-48" id="bonuses"></cooking-bonus-box>
            <div class="col-12 mt-2 text-center">
              <div class="btn-group w-100 p-1" role="group" aria-label="HorizontalPrimary">
                <button class="btn btn-success" id="active-cook-button">
                  <lang-string lang-id="MENU_TEXT_ACTIVE_COOK"></lang-string>
                  <div class="font-size-sm text-white text-center" style="position: absolute;z-index: 99;width: 100%;bottom: -10px;left: 0;">
                    <small class="badge-pill bg-secondary" id="active-cook-interval">-</small>
                  </div>
                </button>
                <button class="btn btn-primary" id="passive-cook-button">
                  <lang-string lang-id="MENU_TEXT_PASSIVE_COOK"></lang-string>
                  <div class="font-size-sm text-white text-center" style="position: absolute;z-index: 99;width: 100%;bottom: -10px;left: 0;">
                    <small class="badge-pill bg-secondary" id="passive-cook-interval">-</small>
                  </div>
                </button>
              </div>
            </div>
            <div class="col-12">
              <progress-bar class="progress-height-20" style="margin:5px;" id="progress-bar"></progress-bar>
            </div>
            <div class="col-12 p-1 text-center">
              <div class="media d-flex align-items-center push">
                <cooking-stockpile-icon class="icon-size-48" id="stock-pile-icon"></cooking-stockpile-icon>
                <button class="btn btn-sm btn-primary m-1" id="stock-pile-button">
                  <lang-string lang-id="MENU_TEXT_COLLECT_FROM_STOCKPILE"></lang-string>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>

    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Cooking"></skill-header>
    </div>
  <!-- COOKING -->
  <div class="row gutters-tiny row-deck" id="cooking-menu-container">
  </div>
  <!-- END COOKING -->

</div>
<!-- END COOKING Content --><!-- MINING Content -->
<template id="mining-rock-template">
  <div class="block block-rounded block-link-pop border-top border-danger border-4x justify-vertical-center d-none" id="locked-container">
    <div class="block-content block-content-full pb-0">
      <div class="font-size-sm font-w600 text-center text-muted"><span id="mining-locked-text"><lang-string lang-id="MENU_TEXT_LOCKED"></lang-string></span><br>
        <img class="mining-ore-img m-3" data-src="assets/media/skills/mining/mining.png"><br>
        <span class="badge badge-danger badge-pill mb-1 w-100" id="next-level">Level 90</span>
        <span class="badge badge-danger badge-pill mb-1 w-100" id="next-abyssal-level">Abyssal Level 90</span>
      </div>
      <div class="font-size-sm font-w600 text-danger badge-pill mb-1 d-none" id="mining-pickaxe-required"></div>
    </div>
  </div>
  <a class="block block-rounded block-link-pop border-top border-mining border-4x pointer-enabled" id="unlocked-container">
    <div class="block-content block-content-full pb-0">
      <div class="font-size-sm font-w600 text-center text-muted">
        <small><lang-string id="rock-status-text" lang-id="MENU_TEXT_MINE"></lang-string></small><br>
        <span id="rock-name-text"></span><br>
        <small id="rock-type-text" class="badge badge-pill"></small><br>
        <div class="col-12 row justify-content-center gutters-tiny text-center icon-size-32">
          <xp-icon id="xp-icon"></xp-icon>
          <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
          <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
          <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
          <interval-icon id="interval-icon"></interval-icon>
        </div>
        <div id="rock-requirement-text" class="font-size-sm font-w400 text-center text-danger d-none"></div>
        <img class="mining-ore-img" id="rock-image" data-src="assets/media/bank/rune_essence.png">
        <br><small id="rock-hp-progress-text"></small>
      </div>
      <progress-bar class="progress-height-5 mb-1" id="hp-progress"></progress-bar>
      <progress-bar class="mb-2" id="mining-progress"></progress-bar>
    </div>
    <div class="p-1 mx-2 bg-combat-inner-dark rounded font-size-xs text-info mb-1 text-center font-w500 d-none" id="gem-vein-text"></div>
    <div class="p-1 mx-2 bg-combat-inner-dark rounded font-size-xs text-info mb-1 text-center font-w500 d-none" id="meteorite-text"></div>
    <div class="p-1 mx-2 bg-combat-inner-dark rounded font-size-xs text-info mb-1 text-center font-w500 d-none" id="fragment-text"></div>
    <div class="p-2">
      <mastery-display id="mastery-display" class="mastery-8"></mastery-display>
    </div>
  </a>
</template>
<template id="locked-ore-template">
  <div class="block block-rounded block-link-pop border-top border-danger border-4x justify-vertical-center">
    <div class="block-content block-content-full bg-light pb-0">
      <div class="font-size-sm font-w600 text-center text-muted"><span id="mining-locked-text"><lang-string lang-id="MENU_TEXT_LOCKED"></lang-string></span><br>
        <img class="mining-ore-img m-3" data-src="assets/media/skills/mining/mining.png"><br>
        <span class="badge badge-danger badge-pill mb-1" id="mining-next-level">Level 90</span>
      </div>
      <div class="font-size-sm font-w600 text-danger badge-pill mb-1 d-none" id="mining-pickaxe-required"></div>
    </div>
  </div>
</template>
<div class="content d-none" id="mining-container">
  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Mining"></skill-header>
  </div>
  <div class="row row-deck" id="mining-ores-container">
    <realm-select-menu class="col-12" data-skill-id="melvorD:Mining"></realm-select-menu>
  </div>
  <!-- END MINING -->
</div>
<!-- END MINING Content --><!-- SMITHING Content -->
<div class="content d-none" id="smithing-container">
  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Smithing"></skill-header>
  </div>
  <!-- SMITHING -->
  <div class="row row-deck">
    <realmed-category-menu class="col-12" id="smithing-category-menu"></realmed-category-menu>
    <div class="col-12">
      <div class="block block-rounded block-link-pop border-top border-smithing border-4x">
        <div class="row no-gutters" id="smithing-category-container">
          <div class="col-12 col-md-4">
            <artisan-menu id="smithing-artisan-menu"></artisan-menu>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END SMITHING -->
</div>
<!-- END SMITHING Content --><!-- THIEVING Content -->
<template id="thieving-area-panel-template">
  <div class="block block-rounded border-top border-thieving border-4x">
    <div class="row no-gutters">
      <div class="col-12 pointer-enabled" id="header">
        <div class="block-content text-center">
          <i class="fa fa-eye text-muted mr-2 font-w300" id="eye-icon"></i>
          <span class="h5 font-w600" id="area-name"></span>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="block-content block-content-full text-center" id="target-container"></div>
      </div>
      <div class="col-12 col-md-6">
        <div class="block-content block-content-full text-center" id="info-container">
          <div class="font-size-sm font-w600 text-center text-muted">
            <small id="info-skill-name"></small><br>
            <span id="info-box-name">-</span><br>
            <img class="fishing-img m-2" id="info-box-image">
          </div>
          <div class="justify-vertical-center">
            <thieving-info-box id="info-box"></thieving-info-box>
          </div>
          <button class="btn btn-sm btn-success m-1 mt-3" role="button" id="start-button">
            <lang-string lang-id="MENU_TEXT_PICKPOCKET"></lang-string>
          </button>
          <button class="btn btn-sm btn-info m-1 mt-3" role="button" id="drops-button">
            <lang-string lang-id="MENU_TEXT_SHOW_DROPS"></lang-string>
          </button>
          <progress-bar class="mt-3 progress-height-5" id="progress-bar"></progress-bar>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="thieving-info-box-template">
  <div class="media-body">
    <div class="row justify-content-center pb-2 icon-size-48">
      <stealth-icon id="stealth"></stealth-icon>
      <doubling-icon id="double"></doubling-icon>
    </div>
    <div class="row justify-content-center icon-size-48">
      <xp-icon id="xp"></xp-icon>
      <abyssal-xp-icon id="abyssal-xp"></abyssal-xp-icon>
      <mastery-xp-icon id="mastery-xp"></mastery-xp-icon>
      <mastery-pool-icon id="pool-xp"></mastery-pool-icon>
      <interval-icon id="interval"></interval-icon>
    </div>
  </div>
</template>
<template id="thieving-npc-nav-template">
  <ul class="nav nav-pills nav-justified">
    <li class="nav-item mr-1">
      <a class="block block-link-pop nav-link border pointer-enabled font-w600 p-1" id="button">
        <div class="media d-flex align-items-center" id="button-content">
          <div class="m-1">
            <img class="skill-icon-md mr-1" id="npc-image">
          </div>
          <div class="media-body">
            <div class="text-center">
              <h5 class="font-w700 text-combat-smoke mb-1 d-flex flex-wrap justify-content-center">
                <span id="npc-name"></span>
                <compact-mastery-display id="mastery-display"></compact-mastery-display>
              </h5>
            </div>
            <div class="font-w400 font-size-xs mb-2">
              <span id="perception"></span><br>
              <span id="success"></span><br>
              <span id="max-hit"></span>
            </div>
          </div>
        </div>
        <div class="justify-vertical-center" id="unlock">
          <span class="text-danger" id="level"></span>
          <span class="text-danger" id="abyssal-level"></span>
        </div>
      </a>
    </li>
  </ul>
</template>
<div class="content d-none" id="thieving-container">
    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Thieving"></skill-header>
    </div>
  <div class="row row-deck">
    <!-- Hitpoints - Thieving -->
    <div class="col-12" id="offline-thieving-alert">
      <div class="alert alert-danger alert-dismissable w-100" role="alert">
        <h3 class="alert-heading h4 my-2"><lang-string lang-id="MENU_TEXT_THIEVING_NOTICE_0"></lang-string></h3>
        <p class="mb-2 font-w700"><lang-string lang-id="MENU_TEXT_THIEVING_NOTICE_1"></lang-string></p>
        <p class="mb-2"><lang-string lang-id="MENU_TEXT_THIEVING_NOTICE_2"></lang-string></p>
        <p class="mb-2"><lang-string lang-id="MENU_TEXT_THIEVING_NOTICE_3"></lang-string></p>
        <button role="button" class="btn btn-success m-1" onclick="enableOfflineThieving();"><lang-string lang-id="COMBAT_MISC_57"></lang-string></button>
        <button role="button" class="btn btn-danger m-1" onclick="dismissOfflineThievingAlert();"><lang-string lang-id="COMBAT_MISC_58"></lang-string></button>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4">
      <div class="block block-rounded block-link-pop border-top border-thieving border-4x">
        <div class="block-content text-center mb-1">
          <span class="text-size-sm text-muted">
            <img class="skill-icon-xs mr-1" data-src="assets/media/skills/hitpoints/hitpoints.png">
            <span id="thieving-player-hitpoints-current"></span>/<span id="thieving-player-hitpoints-max"></span> 
            <lang-string lang-id="MENU_TEXT_HP"></lang-string>
            <span class="ml-2" id="thieving-player-auto-eat">
              <img class="skill-icon-xs auto-eat-icon" data-src="assets/media/shop/autoeat.png">
            </span>
            <span class="pt-1 font-size-sm text-warning d-none" id="thieving-player-auto-eat-span"></span>
          </span>
          <div class="progress active bg-danger" style="height: 10px">
            <div id="thieving-player-hitpoints-bar" class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Hitpoints - Thieving -->

    <!-- Food - Thieving -->
    <div class="col-12 col-md-6 col-lg-4">
      <div class="block block-rounded block-link-pop border-top border-thieving border-4x">
        <div class="block-content text-center mb-1">
          <food-select-menu id="thieving-food-select"></food-select-menu>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="block block-rounded block-link-pop border-top border-thieving border-4x">
        <settings-switch class="block-content font-size-sm text-center mb-1" data-setting-id="continueThievingOnStun" data-size="large"></settings-switch>
      </div>
    </div>
  </div>

  <div class="row gutters-tiny" id="thieving-npc-container">
    <realm-select-menu class="col-12" data-skill-id="melvorD:Thieving"></realm-select-menu>
  </div>
</div>
<!-- END THIEVING Content --><!-- FARMING Content -->
<div class="content d-none" id="farming-container">

  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Farming"></skill-header>
  </div>
  <div class="row row-deck gutters-tiny" id="farming-category-container"></div>
  <div class="row row-deck gutters-tiny">
    <!-- Farming Area Container -->
    <div class="row row-deck mt-2" id="farming-plot-container">
      <farming-category-options class="col-12" id="farming-category-options"></farming-category-options>
    </div>
  </div>
</div>
<!-- END FARMING Content --><!-- FLETCHING Content -->
<div class="content d-none" id="fletching-container">
    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Fletching"></skill-header>
    </div>
    <div class="row row-deck">
        <realmed-category-menu class="col-12" id="fletching-category-menu"></realmed-category-menu>
        <div class="col-12">
            <div class="block block-rounded block-link-pop border-top border-fletching border-4x">
                <div class="row no-gutters" id="fletching-category-container">
                    <div class="col-12 col-md-4">
                      <artisan-menu id="fletching-artisan-menu"></artisan-menu>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Fletching Content --><!-- CRAFTING Content -->
<div class="content d-none" id="crafting-container">

    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Crafting"></skill-header>
    </div>
    <div class="row row-deck">

        <realmed-category-menu class="col-12" id="crafting-category-menu"></realmed-category-menu>

        <div class="col-12">
            <div class="block block-rounded block-link-pop border-top border-crafting border-4x">
                <div class="row no-gutters" id="crafting-category-container">
                    <div class="col-12 col-md-4">
                      <artisan-menu id="crafting-artisan-menu"></artisan-menu>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END CRAFTING CONTENT --><!-- RUNECRAFTING Content -->
<div class="content d-none" id="runecrafting-container">
    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Runecrafting"></skill-header>
    </div>
    <div class="row row-deck">
        <realmed-category-menu class="col-12" id="runecrafting-category-menu"></realmed-category-menu>
        <div class="col-12">
            <div class="block block-rounded block-link-pop border-top border-runecrafting border-4x">
                <div class="row no-gutters" id="runecrafting-category-container">
                    <div class="col-12 col-md-4">
                      <artisan-menu id="runecrafting-artisan-menu"></artisan-menu>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--END RUNECRAFTING CONTENT --><!-- HERBLORE Content -->
<div class="content d-none" id="herblore-container">
    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Herblore"></skill-header>
    </div>
    <div class="row row-deck">
        <realmed-category-menu class="col-12" id="herblore-category-menu"></realmed-category-menu>

        <div class="col-12">
            <div class="block block-rounded block-link-pop border-top border-herblore border-4x">
                <div class="row no-gutters" id="herblore-category-container">
                    <div class="col-12 col-md-4">
                      <herblore-artisan-menu id="herblore-artisan-menu"></herblore-artisan-menu>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END HERBLORE Content --><!-- AGILITY Content -->
<div class="content d-none" id="agility-container">
  <template id="built-agility-obstacle-template">
    <div class="block block-rounded block-link-pop border-top border-agility border-4x" id="block-container">
      <h5 class="text-center font-w600 mb-0 pt-2" id="tier-name">Obstacle 1</h5>
      <div class="block-content text-center pt-2">
        <div class="col-12 justify-vertical-center" id="unbuilt-content">
          <h5 class="font-size-sm font-w400 mb-2 text-success" id="create-text"></h5>
          <h5 class="font-size-sm font-w400 mb-2"><img class="skill-icon-md" data-src="assets/media/main/stamina.png"></h5>
        </div>
        <div class="row no-gutters" id="built-content">
          <div class="col-12 col-lg-6 justify-vertical-center">
            <h5 class="p-1 bg-danger rounded font-w700 mb-1" id="inactive-text">
              <lang-string lang-id="MENU_TEXT_INACTIVE"></lang-string>
            </h5>
            <h5 class="font-w600 mb-2">
              <span id="name"></span>
              <small class="font-w300 text-warning ml-2">
                <i class="far fa-clock mr-1"></i>
                <span id="interval"></span>
              </small>
            </h5>
            <h5 class="font-size-sm font-w600 mb-1">
              <lang-string lang-id="MENU_TEXT_AGILITY_GRANTS"></lang-string>
            </h5>
            <h5 class="font-size-sm font-w400 text-success mb-1">
              <span class="mr-2 ml-2" id="xp-container">
                <img class="skill-icon-xs mr-2" data-src="assets/media/skills/agility/agility.png">
                <span id="xp-amount"></span>
              </span>
              <span class="mr-2 ml-2" id="axp-container">
                <img class="skill-icon-xs mr-2" data-src="assets/media/skills/agility/agility.png">
                <span id="axp-amount"></span>
              </span>
              <span id="item-currency-container"></span>
            </h5>
            <div class="block-content">
              <mastery-display id="mastery-display" class="mastery-8"></mastery-display>
            </div>
          </div>
          <div class="col-12 col-lg-6 justify-vertical-center">
            <h5 class="font-size-sm font-w600 mb-1">
              <lang-string lang-id="MENU_TEXT_GLOBAL_ACTIVE_PASSIVES"></lang-string>
            </h5>
            <div id="bonus-container"></div>
          </div>
          <div class="col-12 text-right">
            <button role="button" class="btn btn-sm btn-info m-1" id="select-obstacle-button">
              <lang-string lang-id="MENU_TEXT_VIEW_OBSTACLE"></lang-string>
            </button>
            <button role="button" class="btn btn-sm btn-danger m-1" id="destroy-obstacle-button">
              <lang-string lang-id="MENU_TEXT_DESTROY_OBSTACLE"></lang-string>
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  <template id="passive-pillar-menu-template">
    <div class="block block-rounded block-link-pop border-top border-warning border-4x" id="block-container">
      <div class="block-content block-content-full text-center">
        <div class="col-12 justify-vertical-center" id="unbuilt-content">
          <h5 class="font-size-sm font-w400 mb-2 text-success" id="create-text"></h5>
          <h5 class="font-w600 mb-0">
            <lang-string lang-id="MENU_TEXT_PASSIVE_PILLAR_DESC"></lang-string>
          </h5>
          <h5 class="font-size-sm font-w400 mb-2"><img class="skill-icon-md" data-src="assets/media/skills/agility/agility.png"></h5>
        </div>
        <div class="row no-gutters" id="built-content">
          <div class="col-12 col-lg-6 justify-vertical-center">
            <h5 class="p-1 bg-danger rounded font-w700 mb-1" id="active-text">
              <lang-string lang-id="MENU_TEXT_INACTIVE"></lang-string>
            </h5>
            <h5 class="font-w600 mb-2" id="name"></h5>
          </div>
          <div class="col-12 col-lg-6 justify-vertical-center">
            <h5 class="font-size-sm font-w600 mb-1">
              <lang-string lang-id="MENU_TEXT_GLOBAL_ACTIVE_PASSIVES"></lang-string>
            </h5>
            <div id="passive-container"></div>
          </div>
          <div class="col-12 text-right">
            <button role="button" class="btn btn-sm btn-info m-1" id="pillar-selection-button"></button>
            <button role="button" class="btn btn-sm btn-danger m-1" id="pillar-destroy-button"></button>
          </div>
        </div>
      </div>
    </div>
  </template>
  <template id="agility-obstacle-selection-template">
    <a class="block block-rounded block-link-pop border-top border-success border-4x pointer-enabled" id="link">
      <div class="block-content block-content-full text-center">
        <div class="row no-gutters">
          <div class="col-12 col-lg-6 justify-vertical-center">
            <h5 class="p-1 bg-success rounded font-size-sm font-w700 mb-1" id="active-text">
              <lang-string lang-id="MENU_TEXT_ACTIVE"></lang-string>
            </h5>
            <h5 class="font-w600 mb-2">
              <span id="name"></span>
              <span id="interval-mastery-container">
                <small class="font-w300 text-warning ml-2">
                  <i class="far fa-clock mr-1"></i>
                  <span id="interval"></span>
                </small>
                <small class="font-w600 text-combat-smoke ml-2">
                  <img class="skill-icon-xxs mr-1" data-src="assets/media/main/mastery_header.png">
                  <span id="mastery-level"></span>
                </small>
                <small class="font-w300 text-combat-smoke font-size-sm" id="mastery-percent"></small>
              </span>
            </h5>
            <h5 class="font-size-sm font-w300 mb-1 text-combat-smoke" id="build-count"></h5>
            <h5 class="font-size-sm font-w300 mb-2 text-combat-smoke" id="cost-reduction-header">
              <span class="font-w600">
                <lang-string lang-id="MENU_TEXT_COST_REDUCTION"></lang-string>
              </span>
              <img class="skill-icon-xxs ml-2 mr-1" data-src="assets/media/main/coins.png"><span class="text-warning" id="gp-reduction"></span>
              <img class="skill-icon-xxs ml-2 mr-1" data-src="assets/media/main/slayer_coins.png"><span class="text-warning" id="sc-reduction"></span>
              <lang-string lang-id="MENU_TEXT_ITEMS" class="ml-2 mr-1"></lang-string><span class="text-warning" id="item-reduction"></span>
            </h5>
            <h5 class="font-size-sm font-w600 mb-1">
              <lang-string lang-id="MENU_TEXT_COST"></lang-string>
              <div id="cost-container" class="d-inline-block"></div>
            </h5>
            <h5 class="font-size-sm font-w600 mb-1" id="requirement-header">
              <lang-string lang-id="MENU_TEXT_REQUIRES"></lang-string>
              <div id="requirement-container" class="d-inline-block"></div>
            </h5>
          </div>
          <div class="col-12 col-lg-6 justify-vertical-center">
            <h5 class="font-size-sm font-w600 mb-1" id="grants-title">
              <lang-string lang-id="MENU_TEXT_AGILITY_GRANTS"></lang-string>
            </h5>
            <h5 class="font-size-sm font-w400 text-success mb-1" id="grants-container">
              <span class="mr-2 ml-2" id="xp-container">
                <img class="skill-icon-xs mr-2" data-src="assets/media/skills/agility/agility.png">
                <span id="xp-amount"></span>
              </span>
              <span class="mr-2 ml-2" id="axp-container">
                <img class="skill-icon-xs mr-2" data-src="assets/media/skills/agility/agility.png">
                <span id="axp-amount"></span>
              </span>
              <span id="item-currency-container"></span>
            </h5>
            <h5 class="font-size-sm font-w600 mb-1">
              <lang-string lang-id="MENU_TEXT_GLOBAL_ACTIVE_PASSIVES"></lang-string>
            </h5>
            <div id="passives-container"></div>
          </div>
        </div>
      </div>
    </a>
  </template>
  <template id="inline-requirement-template">
    <img class="skill-icon-xs mr-2" id="image">
    <span id="text"></span>
  </template>
  <template id="multi-progress-bar-template">
    <div class="progress active mb-2 ml-2 mr-2" style="height: 20px;" id="bar-container"></div>
  </template>
  <template id="agility-breakdown-template">
    <div class="font-w600 font-size-sm mb-1">
      <ul class="nav-main nav-main-horizontal nav-main-horizontal-justify">
        <li class="nav-main-item">
          <div>
            <lang-string lang-id="MENU_TEXT_AGILITY_BREAKDOWN" class="m-1"></lang-string>
          </div>
          <div>
            <span class="font-w400 m-1 ml-2 text-warning no-wrap"><i class="far fa-clock mr-1"></i><span id="interval"></span></span>
            <span class="font-w400 m-1 ml-2 text-success no-wrap" id="xp-container"><img class="skill-icon-xxs mr-1" data-src="assets/media/skills/agility/agility.png"><span id="xp-amount"></span></span>
            <span class="font-w400 m-1 ml-2 text-success no-wrap" id="axp-container"><img class="skill-icon-xxs mr-1" data-src="assets/media/skills/agility/agility.png"><span id="axp-amount"></span></span>
            <span id="currency-container" class="font-w400 text-success"></span>
            <span id="items-container" class="font-w400 text-success"></span>
          </div>
        </li>
        <li class="nav-main-item">
          <button role="button" class="btn btn-sm btn-secondary m-1 ml-2" id="view-passives-button"><lang-string lang-id="MENU_TEXT_VIEW_AGILITY_PASSIVES"></lang-string></button>
        </li>
        <li class="nav-main-item">
          <div class="input-group">
            <input type="text" class="form-control form-control-lg" id="search-bar" name="agility-obstacle-search" placeholder="">
            <div class="input-group-append">
              <button type="button" class="btn btn-danger" id="clear-search-bar">X</button>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </template>
  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Agility"></skill-header>
  </div>
  <div class="row row-deck">

    <div class="col-12">
      <div class="block block-rounded block-link-pop border-top border-agility border-4x">
        <agility-breakdown class="d-block block-content" id="agility-breakdown"></agility-breakdown>
        <div class="block-content pt-1">
          <multi-progress-bar id="agility-progress-bar" style="height: 20px;"></multi-progress-bar>
        </div>
      </div>
    </div>
    <realm-select-menu class="col-12" data-skill-id="melvorD:Agility"></realm-select-menu>
    <div class="col-6 col-lg-3">
      <button role="button" class="btn btn-success m-2 w-100" id="agility-start-button">
        <lang-string lang-id="MENU_TEXT_START_AGILITY"></lang-string>
      </button>
    </div>
    <div class="col-6 col-lg-3">
      <button role="button" class="btn btn-danger m-2 w-100" id="agility-stop-button">
        <lang-string lang-id="MENU_TEXT_STOP_AGILITY"></lang-string>
      </button>
    </div>
    <div class="col-6 col-lg-3">
      <div class="dropdown">
        <button role="button" class="btn btn-primary m-2 dropdown-toggle w-100 text-wrap" id="agility-load-blueprint-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <lang-string lang-id="MENU_TEXT_LOAD_BLUEPRINT"></lang-string>
        </button>
        <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-secondary">
          <a class="dropdown-item pointer-enabled" id="agility-load-blueprint-button-0"><img id="agility-blueprint-realm-0" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SLOT_LOAD"></lang-string> <span class="text-warning" id="agility-blueprint-name-0">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-load-blueprint-button-1"><img id="agility-blueprint-realm-1" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SLOT_LOAD"></lang-string> <span class="text-success" id="agility-blueprint-name-1">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-load-blueprint-button-2"><img id="agility-blueprint-realm-2" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SLOT_LOAD"></lang-string> <span class="text-success" id="agility-blueprint-name-2">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-load-blueprint-button-3"><img id="agility-blueprint-realm-3" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SLOT_LOAD"></lang-string> <span class="text-warning" id="agility-blueprint-name-3">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-load-blueprint-button-4"><img id="agility-blueprint-realm-4" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SLOT_LOAD"></lang-string> <span class="text-warning" id="agility-blueprint-name-4">Empty</span></a>
        </div>
      </div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="dropdown">
        <button role="button" class="btn btn-warning m-2 dropdown-toggle w-100 text-wrap" id="agility-save-blueprint-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <lang-string lang-id="MENU_TEXT_SAVE_BLUEPRINT"></lang-string>
        </button>
        <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="dropdown-default-secondary">
          <a class="dropdown-item pointer-enabled" id="agility-save-blueprint-button-0"><img id="agility-blueprint-realm-0" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SAVE_TO_SLOT_1"></lang-string> <span class="text-warning" id="agility-blueprint-name-0">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-save-blueprint-button-1"><img id="agility-blueprint-realm-1" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SAVE_TO_SLOT_2"></lang-string> <span class="text-success" id="agility-blueprint-name-1">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-save-blueprint-button-2"><img id="agility-blueprint-realm-2" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SAVE_TO_SLOT_3"></lang-string> <span class="text-success" id="agility-blueprint-name-2">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-save-blueprint-button-3"><img id="agility-blueprint-realm-3" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SAVE_TO_SLOT_4"></lang-string> <span class="text-warning" id="agility-blueprint-name-3">Empty</span></a>
          <a class="dropdown-item pointer-enabled" id="agility-save-blueprint-button-4"><img id="agility-blueprint-realm-4" class="skill-icon-xs mr-1 d-none" data-src="assets/media/main/logo_no_text.png"><lang-string lang-id="SAVE_TO_SLOT_5"></lang-string> <span class="text-warning" id="agility-blueprint-name-4">Empty</span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="row row-deck gutters-tiny" id="skill-content-container-20">
  </div>
  <!-- END AGILITY -->

</div>
<!-- END AGILITY Content --><!-- SUMMONING Content -->
<template id="summoning-mark-discovery-template">
  <div class="block block-rounded block-link-pop border-top border-summoning border-4x">
    <div class="block-content block-content-full">
      <div class="font-size-sm font-w600 text-center text-muted">
        <small id="mark-status"></small>
        <br><span id="mark-name"></span>
      </div>
      <div class="font-size-h2 font-w400 text-center text-dark"><img class="m-2" id="mark-image" style="width:64px;"></div>
      <h5 class="font-size-2sm font-w700 text-center text-danger mb-1" id="level-required"></h5>
      <h5 class="font-size-2sm font-w700 text-center text-danger mb-1" id="abyssal-level-required"></h5>
      <div id="discovered-content">
        <h5 class="font-size-sm font-w400 text-center text-combat-smoke mb-1">
          <lang-string lang-id="MENU_TEXT_DISCOVERY_PROGRESS"></lang-string>
        </h5>
        <div class="progress active mb-2" style="height:8px;">
          <div class="progress-bar bg-success" id="mark-progress" role="progressbar" style="width: 100%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
          </div>
        </div>
        <h5 class="font-size-sm font-w400 text-center text-combat-smoke mb-1">
          <lang-string lang-id="MENU_TEXT_DISCOVERED_IN"></lang-string>
        </h5>
        <h5 class="font-size-sm font-w400 text-center text-combat-smoke mb-1" id="mark-skill-images"></h5>
        <h5 class="font-size-sm font-w400 text-center text-combat-smoke mb-1" id="mark-discovery-total"></h5>
        <div class="text-center p-1"><button role="button" class="btn btn-sm btn-primary" id="quick-create-button">
            <lang-string lang-id="MENU_TEXT_CREATE_FAMILIAR"></lang-string>
          </button></div>
      </div>
    </div>
  </div>
</template>
<template id="summoning-synergy-search-template">
  <div class="media d-flex align-items-center push pointer-enabled" id="flex-container">
    <div class="mr-1">
      <div class="bank-item no-bg btn-light pointer-enabled m-1" id="mark-container-0">
        <img class="bank-img p-2" id="mark-image-0">
        <div class="font-size-sm text-white text-center in-bank">
          <small class="badge-pill bg-secondary" id="mark-quantity-0">0</small>
        </div>
        <img class="skill-icon-xs familiar-skill" id="mark-skill-image-0">
      </div>
    </div>
    <div class="mr-1">
      <img class="skill-icon-xs" id="synergy-icon">
    </div>
    <div class="mr-1">
      <div class="bank-item no-bg btn-light pointer-enabled m-1" id="mark-container-1">
        <img class="bank-img p-2" id="mark-image-1">
        <div class="font-size-sm text-white text-center">
          <small class="badge-pill bg-secondary" id="mark-quantity-1">0</small>
        </div>
        <img class="skill-icon-xs familiar-skill" id="mark-skill-image-1">
      </div>
    </div>
    <div class="media-body">
      <div class="font-size-sm" id="synergy-description"></div>
    </div>
  </div>
</template>
<template id="synergy-search-menu-template">
  <div class="col-12 col-lg-6">
    <h5 class="font-w700 text-warning mb-1">
      <lang-string lang-id="MISC_STRING_12"></lang-string>
    </h5>
    <h5 class="font-w600 font-size-sm text-success mb-1">
      <lang-string lang-id="MISC_STRING_13"></lang-string>
    </h5>
  </div>
  <div class="col-12 col-lg-6 text-right">
    <button type="button" class="btn btn-sm btn-warning m-1" id="show-all-button">
      <lang-string lang-id="SHOP_MISC_0"></lang-string>
    </button>
    <button type="button" class="btn btn-sm btn-info m-1" id="show-unlocked-button">
      <lang-string lang-id="MISC_STRING_15"></lang-string>
    </button>
    <button type="button" class="btn btn-sm btn-primary dropdown-toggle m-1" id="dropdown-default-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <lang-string lang-id="MISC_STRING_16"></lang-string>
    </button>
    <div class="dropdown-menu overflow-y-auto" id="filter-dropdown-options" aria-labelledby="dropdown-default-primary" style="height:80vh;">
    </div>
  </div>
  <div class="col-12">
    <input type="text" class="form-control form-control-lg py-4" id="search-bar" name="summoning-synergy-search" placeholder="">
  </div>
  <div class="col-12">
    <h5 class="font-w600 font-size-sm text-info mt-2 mb-3">
      <lang-string lang-id="MISC_STRING_14"></lang-string>
    </h5>
  </div>
</template>
<template id="synergy-search-menu-option-template">
  <a class="dropdown-item pointer-enabled pt-1 pb-1" id="link">
    <h5 class="font-w600 font-size-sm mb-1"><img class="skill-icon-xs" id="option-image"><span id="option-name"></span></h5>
  </a>
</template>
<div class="content d-none" id="summoning-container">
    <div class="skill-info">
      <skill-header data-skill-id="melvorD:Summoning"></skill-header>
    </div>
  <div class="row row-deck">
    <realmed-category-menu class="col-12" id="summoning-category-menu"></realmed-category-menu>
    <div class="col-12">
      <div class="block block-rounded block-link-pop border-top border-summoning border-4x">
        <div class="row no-gutters" id="summoning-category-container">
          <div class="col-12 col-md-6 col-lg-4" id="summoning-creation-element">
            <artisan-menu id="summoning-artisan-menu"></artisan-menu>
          </div>
          <div id="summoning-mark-element" class="col-12 d-none">
            <summoning-mark-menu id="summoning-mark-menu"></summoning-mark-menu>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--END SUMMONING CONTENT --><!-- ALT MAGIC CONTENT -->
<template id="alt-magic-menu-template">
  <div class="col-12">
    <div class="row row-deck gutters-tiny">
      <div class="col-6">
        <div class="block block-rounded-double bg-combat-inner-dark p-2 d-flex flex-column align-items-center justify-content-center">
          <img class="pointer-enabled mb-2 w-50" id="spell-image" data-src="assets/media/skills/magic/magic.png">
          <div class="badge-pill bg-primary font-size-sm font-w600 text-center" id="image-info">
            <small>
              <lang-string lang-id="MENU_TEXT_CLICK_IMAGE"></lang-string>
            </small>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="block block-rounded-double bg-combat-inner-dark p-2">
          <div class="font-size-sm font-w600 text-center text-muted">
            <small><lang-string lang-id="MENU_TEXT_CAST"></lang-string></small>
            <br><span id="spell-name">-</span>
            <br><small id="spell-description" class="text-info">-</small>
          </div>
          <div class="d-flex justify-content-center pb-2 icon-size-48" id="doubling-icon-cont">
            <doubling-icon id="doubling-icon"></doubling-icon>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-rounded-double bg-combat-inner-dark font-w400 font-size-sm text-center p-2">
      <settings-checkbox data-setting-id="useCombinationRunes"></settings-checkbox>
    </div>
    <div class="row row-deck gutters-tiny">
      <div class="col-12 col-sm-6 ">
        <div class="block block-rounded-double bg-combat-inner-dark pt-2 pb-2">
          <div class="font-size-sm font-w600 text-center text-muted">
            <requires-box class="pb-2 col-12 icon-size-48" id="rune-requirements"></requires-box>
          </div>
          <div class="font-size-sm font-w600 text-center text-muted" id="item-requirements-container">
            <div class="pb-2 col-12">
              <h5 class="font-w600 mb-1 text-center font-size-sm">
                <lang-string lang-id="MENU_TEXT_AND"></lang-string>
              </h5>
              <quantity-icons class="icon-size-48" id="item-requirements"></quantity-icons>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6">
        <div class="block block-rounded-double bg-combat-inner-dark pt-2 pb-2">
          <div class="font-size-sm font-w600 text-center text-muted">
            <haves-box class="col-12 pb-2 icon-size-48" id="rune-haves"></haves-box>
          </div>
          <div class="font-size-sm font-w600 text-center text-muted" id="item-haves-container">
            <div class="pb-2 col-12">
              <h5 class="font-w600 mb-1 text-center font-size-sm">
                <lang-string lang-id="MENU_TEXT_AND"></lang-string>
              </h5>
              <current-quantity-icons class="icon-size-48" id="item-haves"></current-quantity-icons>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-rounded-double bg-combat-inner-dark p-2">
      <div class="row no-gutters">
        <div class="col-6">
          <div class="font-size-sm font-w600 text-center text-muted">
            <produces-box class="pb-2 col-12 icon-size-48" id="produces-single"></produces-box>
          </div>
        </div>
        <div class="col-6">
          <div class="font-size-sm font-w600 text-center text-muted">
            <haves-box class="col-12 pb-2 icon-size-48" id="produces-current"></haves-box>
          </div>
        </div>
      </div>
    </div>
    <div class="block block-rounded-double bg-combat-inner-dark p-2">
      <div class="font-size-sm font-w600 text-center text-muted">
        <grants-box class="pb-2 col-12 icon-size-48" id="grants"></grants-box>
      </div>
    </div>
    <div class="block block-rounded-double bg-combat-inner-dark p-3">
      <div class="font-size-sm font-w600 text-center text-muted d-flex justify-content-center pb-2 icon-size-48">
        <button type="button" class="btn btn-success m-2 p-2" style="min-height: 48px;" id="cast-button">
          <lang-string lang-id="MENU_TEXT_CAST"></lang-string>
        </button>
        <interval-icon id="interval"></interval-icon>
      </div>
      <progress-bar class="progress-height-5" id="progress-bar"></progress-bar>
    </div>
  </div>
</template>
<template id="alt-magic-item-menu-template">
  <div class="block-content">
    <div class="row">
      <div class="col-12">
        <div class="font-size-sm font-w600 text-center text-muted">
          <small>
            <lang-string lang-id="MENU_TEXT_SELECT_ITEM"></lang-string>
          </small>
        </div>
      </div>
      <div class="col-12 row" id="button-container">
      </div>
    </div>
  </div>
</template>
<template id="alt-magic-item-select-template">
  <div class="col-2">
    <ul class="nav nav-pills nav-justified push">
      <li class="nav-item mr-1">
        <a class="nav-link border" id="link">
          <img class="skill-icon-xs mr-2" id="image" loading="lazy">
        </a>
      </li>
    </ul>
  </div>
</template>
<template id="alt-magic-bar-select-template">
  <div class="col-6">
    <ul class="nav nav-pills nav-justified push">
      <li class="nav-item mr-1">
        <a class="nav-link border" id="link">
          <img class="skill-icon-xs mr-2" data-src="assets/media/bank/bronze_bar.png" id="bar-image"><span id="bar-name"></span></a>
      </li>
    </ul>
  </div>
</template>
<template id="alt-magic-bar-locked-template">
  <div class="col-6">
    <ul class="nav nav-pills nav-justified push">
      <li class="nav-item mr-1">
        <span class="nav-link font-size-sm border border-danger" id="message-span"></span>
      </li>
    </ul>
  </div>
</template>
<div class="content d-none" id="magic-container">
  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Magic"></skill-header>
  </div>
  <div class="row row-deck gutters-tiny">
    <div class="col-12 alt-desc">
      <div class="block block-rounded block-link-pop border-top border-magic border-4x">
        <div class="block-content font-w400 font-size-sm text-center">
          <strong>Alt. Magic</strong> is an alternative method to train <img class="skill-icon-xs mr-1" data-src="assets/media/skills/magic/magic.png"><strong>Magic</strong> using non-combat spells. It's still the same Skill as usual.
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded block-link-pop border-top border-magic border-4x">
        <div class="row no-gutters" id="altmagic-category-container">
          <alt-magic-menu class="col-12 col-md-4 p-4 row gutters-tiny" id="magic-screen-cast"></alt-magic-menu>
          <alt-magic-item-menu id="magic-screen-select" class="col-12 col-md-4 d-none">
          </alt-magic-item-menu>
        </div>
      </div>
    </div>
    <div class="col-6">
    </div>
  </div>
</div>
<!-- END ALT MAGIC CONTENT --><!-- ASTROLOGY Content -->
<div class="content d-none" id="astrology-container">
  <template id="constellation-menu-template">
    <div class="block block-content block-content-full block-rounded-extra block-link-pop border-top border-astrology border-4x text-center">
      <div class="row gutters-tiny">
        <div class="col-12 p-2">
          <img class="astro-img" id="image">
        </div>
        <div class="col-12 pt-2">
          <h4 class="font-w700 mb-2" id="name"></h4>
        </div>
        <div class="col-12" id="skill-icons">
          <img class="skill-icon-xs m-2" id="skill-icon-0">
        </div>
        <div class="col-12 row justify-content-center gutters-tiny text-center icon-size-32">
          <xp-icon id="xp-icon"></xp-icon>
          <abyssal-xp-icon id="abyssal-xp-icon"></abyssal-xp-icon>
          <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
          <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
          <interval-icon id="interval-icon"></interval-icon>
        </div>
        <div class="col-12 row justify-content-center gutters-tiny text-center" id="rewards-container">

        </div>
        <div class="col-12 p-2">
          <progress-bar class="m-2 mt-0 progress-height-15" id="progress-bar"></progress-bar>
        </div>
        <div class="col-12">
          <button class="btn btn-alt-success ml-3 mr-3 mb-3 mt-1" id="study-button">
            <lang-string lang-id="ASTROLOGY_BTN_0"></lang-string>
          </button>
          <button class="btn btn-alt-info ml-3 mr-3 mb-3 mt-1" id="explore-button">Go Back</button>
        </div>
        <div class="col-12">
          <mastery-display id="mastery-display" class="mastery-6"></mastery-display>
        </div>
        <div class="col-12 row justify-content-center pt-2 icon-size-48 d-none" id="stardust-breakdown"></div>
      </div>
    </div>
  </template>
  <template id="astrology-modifier-display-template">
    <div class="media d-flex align-items-center push m-0">
      <div class="m-1 font-w600">
        <img class="skill-icon-sm mr-2" id="star-image">
      </div>
      <div class="media-body">
        <div class="block block-rounded-double bg-combat-inner-dark p-1 mb-0 border-top border-1x border-info text-left" id="modifier-container">
          <h5 class="font-w700 font-size-sm m-1" id="modifier-text"></h5>
        </div>
        <ul class="nav-main nav-main-horizontal nav-main-horizontal-override" id="modifier-progress">
          <li class="astro-mod locked m-1" id="modifier-progress-locked"></li>
          <li class="astro-mod active m-1" id="modifier-progress-active"></li>
          <li class="astro-mod inactive m-1" id="modifier-progress-inactive"></li>
         </ul>
      </div>
      <div class="m-1">
        <button class="btn btn-sm btn-primary" role="button" id="upgrade-button">
          <img class="skill-icon-xs mr-1" id="stardust-image">
          <span id="stardust-quantity"></span>
        </button>
      </div>
    </div>
  </template>
  <template id="astrology-exploration-panel-template">
    <div class="block block-content block-content-full block-rounded-extra block-link-pop border-top border-astrology border-4x text-center p1 pt-3">
      <div class="row no-gutters">
        <div class="col-12">
          <div class="row no-gutters" id="standard-modifier-container"></div>
        </div>
        <div class="col-12">
          <div class="row no-gutters" id="unique-modifier-container"></div>
        </div>
        <div class="col-12">
          <div class="row no-gutters" id="abyssal-modifier-container"></div>
        </div>
      </div>
    </div>
  </template>
  <template id="astrology-information-panel-template">
    <div class="block block-rounded block-link-pop border-top border-thieving border-4x">
      <div class="text-center mb-1">
        <div class="row gutters-tiny">
          <div class="col-12 col-md-6 pt-3">
            <button class="btn btn-alt-warning" role="button" id="view-all-modifiers-button">
              <lang-string lang-id="ASTROLOGY_BTN_6"></lang-string>
            </button>
          </div>
          <div class="col-12 col-md-6 row justify-content-center pt-1 mb-1 icon-size-48">
            <doubling-icon id="doubling-chance"></doubling-icon>
            <meteorite-chance-icon id="meteorite-chance"></meteorite-chance-icon>
            <starfall-chance-icon id="starfall-chance"></starfall-chance-icon>
          </div>
        </div>
      </div>
    </div>
  </template>

  <div class="skill-info">
    <skill-header data-skill-id="melvorD:Astrology"></skill-header>
  </div>
  <div class="row row-deck">
    <astrology-information-panel class="col-12" id="astrology-info-panel"></astrology-information-panel>
  </div>
  <div class="row row-deck" id="astrology-container-content">
    <realm-select-menu class="col-12" data-skill-id="melvorD:Astrology"></realm-select-menu>
    <locked-constellation-menu class="col-6 col-lg-3" id="astrology-locked-constellation"></locked-constellation-menu>
    <astrology-exploration-panel class="col-12 col-lg-9 d-none" id="astrology-exploration-panel"></astrology-exploration-panel>
  </div>
  <!-- END ASTROLOGY -->
</div>
<!-- END ASTROLOGY Content --><div class="content d-none" id="tutorialIsland-container">
  <div class="row row-deck">
    <tutorial-progress-display class="col-12" id="tutorial-progress"></tutorial-progress-display>
  </div>
  <div class="row row-deck" id="tutorial-stage-container"></div>
</div><!-- TOWNSHIP Content -->
<div class="content d-none" id="township-container">
    <template id="township-resource-display-template">
  <li class="block block-rounded-double bg-combat-inner-dark text-center pl-1 mr-1"
    style="min-width: 150px;" id="set-priority-button">
    <div class="overlay-container overlay-top" id="storage-overlay">
      <img class="skill-icon-xxs overlay-item" id="storage-overlay-img" src="assets/media/main/missing_artwork.png">
    </div>
    <div class="media d-flex align-items-center" style="line-height: 1.15;">
      <div class="mr-1">
        <img class="skill-icon-xs mr-1" id="resource-icon">
      </div>
      <div class="media-body text-left">
        <div>
          <span class="mr-1">
            <small class="font-w600" id="resource-amount"></small>
          </span>
        </div>
        <div>
          <span class="mr-1">
            <small class="text-muted" id="resource-rate">0 /t</small>
          </span>
        </div>
      </div>
    </div>
  </li>
</template>
<template id="building-requirements-template">
  <ul class="list-unstyled font-size-xs text-center mb-0 bg-light rounded p-1 mb-1">
    <li id="level-requirement" class="font-w600 text-danger"></li>
    <li id="pop-requirement" class="font-w600 text-danger"></li>
    <li id="abyssal-level-requirement" class="font-w600 text-danger"></li>
    <li id="fortification-requirement" class="font-w600 text-danger"></li>
    <li><ul class="nav-main font-size-xs mb-0" id="other-requirements"></ul></li>
  </ul>
</template>
<template id="township-town-biome-select-template">
  <li class="m-1">
    <a id="select-button" class="block block-rounded-double w-100 block-link-pop bg-combat-inner-dark p-1 pointer-enabled ts-biome-select-border">
      <div class="media d-flex align-items-center">
        <div class="mr-1">
          <img class="skill-icon-sm skill-icon-xs-mobile" id="biome-image">
        </div>
        <div class="media-body text-left">
          <ul class="nav-main nav-main-horizontal nav-main-horizontal-justify">
            <li><span class="font-w600" id="biome-name"></span> <small id="biome-progress"></small></li>
            <li class="text-right"><i class="fa fa-hammer text-warning mr-1" id="build-available"></i></li>
          </ul>
          <div class="progress active mb-1" style="height: 6px">
            <div class="progress-bar bg-info" id="biome-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
          <div id="level-requirement" class="font-w600 text-danger font-size-xs"></div>
          <div id="pop-requirement" class="font-w600 text-danger font-size-xs"></div>
          <div id="abyssal-level-requirement" class="font-w600 text-danger font-size-xs"></div>
          <div id="fortification-requirement" class="font-w600 text-danger font-size-xs"></div>
          <ul class="nav-main font-size-xs mb-0" id="other-requirements"></ul>
        </div>
      </div>
    </a>
  </li>
</template>
<template id="township-building-summary-template">
  <small class="badge badge-primary" id="count" style="position: absolute;left: 3px;top: 0;"></small>
  <div class="media d-flex align-items-center" style="min-height:91px;">
    <div class="mr-1">
      <img class="resize-64" id="image">
    </div>
    <div class="media-body text-left">
      <div class="font-size-sm mb-0">
        <span class="font-w700 text-warning mr-1" id="name"></span>
      </div>
      <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs" id="provides"></ul>
      <div id="resource-output"></div>
      <div class="font-size-xs text-left" id="modifiers"></div>
    </div>
  </div>
  <div id="extra-requirements">
    <div role="separator" class="dropdown-divider"></div>
    <div class="font-size-xs text-left font-w600 text-danger" id="level-requirement"></div>
    <div class="font-size-xs text-left font-w600 text-danger" id="pop-requirement"></div>
    <div class="font-size-xs text-left font-w600 text-danger" id="abyssal-level-requirement"></div>
    <div class="font-size-xs text-left font-w600 text-danger" id="fortification-requirement"></div>
  </div>
</template>
<template id="building-in-town-template">
  <div class="block block-rounded-double bg-combat-inner-dark text-center p-0 township-glower" id="building-div">
    <div class="block-header block-header-default bg-dark-bank-block-header px-1 py-1 mb-1 flex-wrap">
      <div class="font-size-xs font-w600 mb-0 text-left" id="building-efficiency">
      </div>
      <div class="block-options">
        <ul class="nav-main nav-main-horizontal nav-main-horizontal-center township" id="upgrade-data">
          <li class="astro-mod locked mr-1" id="upgrade-data-locked"></li>
          <li class="astro-mod active mr-1" id="upgrade-data-active"></li>
          <li class="astro-mod inactive mr-1" id="upgrade-data-inactive"></li>
        </ul>
      </div>
    </div>
    <div class="row gutters-tiny px-2">
      <div class="col-12">
        <div class="media d-flex align-items-center">
          <div class="mr-1">
            <img class="resize-64" id="building-image">
          </div>
          <div class="media-body text-left">
            <div class="font-size-sm mb-0">
              <span class="font-w700 text-warning mr-1" id="building-name"></span>
              <img class="skill-icon-xxs ml-2 d-none" id="building-task-icon">
            </div>
            <div role="separator" class="dropdown-divider mt-1 mb-1 mr-2" style="border-top: 1px solid #878787;"></div>
            <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs"
              id="building-totals"></ul>
            <div>
              <div id="resource-output"></div>
            </div>
            <div class="font-size-xs text-left" id="building-stats"></div>
          </div>
          <div class="ml-1">
            <div class="btn-group-vertical" id="upgrade-button-group">
              <button class="btn btn-success" id="upgrade-button"><i class="fa fa-hammer"></i></button>
              <button type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle p-0 upgrade-qty-dropdown"
                id="upgrade-qty-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1</button>
              <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="upgrade-qty-dropdown" x-placement="bottom-start"
                id="upgrade-qty-options"></div>
              </div>
              <button class="btn btn-warning d-none" id="repair-button"><i class="fa fa-tools"></i></button>
          </div>
        </div>
      </div>
      <div class="col-12">
        <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs">
          <li id="upgrades-to-name"></li>
        </ul>
        <div class="progress active mb-1 border border-top border-1x border-dark" style="height: 12px">
          <div class="progress-bar bg-warning" id="upgrade-progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
          </div>
        </div>
      </div>
      <div class="col-12" id="requirements-container"></div>
      <div class="col-12" id="upgrades-to-container">
        <div class="media d-flex align-items-center">
          <div class="media-body text-left">
            <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs"
              id="upgrades-to-costs">
              <li class="mr-1 font-w600">
                <lang-string lang-id="MENU_TEXT_COST"></lang-string>
              </li>
            </ul>
            <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs"
              id="upgrades-to-provides">
              <li class="mr-1 font-w600">
                Provides:
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-12" id="repair-container">
        <div class="media d-flex align-items-center">
          <div class="media-body text-left">
            <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs"
              id="repair-costs">
              <li class="mr-1 font-w600">
                Repair Cost
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="township-yeet-template">
  <li style="min-width: 100px;">
    <a class="block block-rounded-double block-link-pop bg-combat-inner-dark pl-1 mr-1 pointer-enabled"
      id="yeet-button">
      <div class="media d-flex align-items-center">
        <div class="mr-1">
          <img class="skill-icon-xs mr-1" id="resource-image">
        </div>
        <div class="media-body text-left">
          <div>
            <span class="mr-1"><small class="font-w600" id="resource-amount"></small></span>
          </div>
        </div>
      </div>
    </a>
  </li>
</template>
<template id="township-cap-resource-template">
  <div class="media d-flex align-items-center">
    <div class="mr-1">
      <img class="skill-icon-sm mr-1" id="resource-image">
    </div>
    <div class="media-body text-left">
      <div class="font-w600 text-warning"><span id="resource-name"></span></div>
      <div class="font-w400 font-size-sm">
        <lang-string lang-id="TOWNSHIP_MENU_RESOURCE_CAP"></lang-string>
        <button type="button"
              class="btn btn-sm btn-secondary dropdown-toggle"
              id="cap-qty-dropdown" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">100%</button>
        <div class="dropdown-menu font-size-sm" aria-labelledby="cap-qty-dropdown" x-placement="bottom-start" id="cap-qty-options"></div>
      </div>
    </div>
  </div>
  <div role="separator" class="dropdown-divider"></div>
</template>
<template id="township-conversion-template">
  <li>
    <a class="block block-link-pop pointer-enabled mr-1 mb-2 btn no-bg btn-light border border-0x" role="button" id="convert-button" style="width: 365px;">
      <div class="media d-flex align-items-center">
        <div class="mr-1">
          <img class="convert-img p-2" id="convert-from-image">
        </div>
        <div class="media-body text-left font-size-sm">
          <div class="font-w600">
            <span id="item-name" class="text-white"></span>
          </div>
          <div class="font-w400 text-info font-size-xs">
            <span id="item-description"></span>
          </div>
        </div>
      </div>
      <div class="font-size-xs text-white text-center">
        <span class="badge-pill bg-secondary" id="convert-quantity">0</span>
      </div>
    </a>
  </li>
</template>
<template id="township-conversion-swal-template">
  <div class="row no-gutters">
    <div class="col-12 font-size-sm mb-2 block block-rounded-double bg-combat-inner-dark p-1 d-none" id="item-contents"></div>
    <div class="col-3"></div>
    <div class="col-6">
      <h5 class="font-size-sm mb-1"><lang-string lang-id="MENU_TEXT_RATIO"></lang-string></h5>
      <div class="block block-rounded-double bg-combat-inner-dark mb-1">
        <div class="media d-flex align-items-center">
          <div class="media-body text-right">
            <img class="skill-icon-xs mr-1" id="convert-from-image-ratio">
            <small class="font-w600" id="convert-from-quantity-ratio"></small>
          </div>
          <div class="m-2">=></div>
          <div class="media-body text-left">
            <small class="font-w600" id="convert-to-quantity-ratio"></small>
            <img class="skill-icon-xs ml-1" id="convert-to-image-ratio" />
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="media d-flex align-items-center mb-2">
    <div class="media-body text-center block block-rounded-double bg-combat-inner-dark mb-1">
      <img class="bank-img p-1" id="convert-from-image">
      <div class="font-size-sm text-white text-center">
        <small class="badge-pill bg-primary" id="convert-from-quantity"></small>
      </div>
    </div>
    <div class="m-2">=></div>
    <div class="media-body text-center block block-rounded-double bg-combat-inner-dark mb-1">
      <img class="bank-img p-1" id="convert-to-image">
      <div class="font-size-sm text-white text-center">
        <small class="badge-pill bg-secondary" id="convert-to-quantity"></small>
      </div>
    </div>
  </div>
  <div class="mb-1 w-100" id="btn-group-percent">
    <button class="btn btn-sm btn-primary m-1" id="btn-percent"></button>
  </div>
  <div class="media d-flex align-items-center mb-2">
    <div class="media-body text-center">
      <div class="btn-group mb-1 w-100" id="btn-group-number">
        <button class="btn btn-sm btn-secondary m-1" id="btn-number"></button>
      </div>
    </div>
    <div class="ml-1">
      <input type="number" class="form-control form-control-sm" id="convert-quantity-input" style="max-width:120px"/>
    </div>
  </div>
  <div class="media d-flex align-items-center mb-2">
    <div class="mr-2 font-size-sm"><lang-string lang-id="TOWNSHIP_MENU_TRADER_YOU_RECEIVE"></lang-string></div>
    <div class="media-body text-center block block-rounded-double bg-combat-inner-dark mb-1">
      <img class="skill-icon-xs mr-1" id="receive-image">
      <small class="font-w400" id="receive-quantity"></small>
    </div>
  </div>
</template>
<template id="township-worship-select-button-template">
  <button id="select-button" class="btn btn-lg text-dark m-1 btn-outline-dark">
    <span id="worship-name"></span><br>
    <small id="worship-description"></small>
  </button>
</template>
<template id="township-worship-select-template">
  <div class="block block-rounded-double bg-combat-inner-dark p-2" id="modifier-div">
    <small id="modifier-container"><lang-string lang-id="TOWNSHIP_MENU_ALWAYS_ACTIVE"></lang-string><br></small>
  </div>
</template>
<template id="township-conversion-jump-to-template">
  <li id="resource-list">
    <a class="block block-rounded-double block-link-pop bg-combat-inner-dark text-center p-1 pointer-enabled mr-1 mb-1">
      <img class="skill-icon-sm" id="resource-icon">
    </a>
  </li>
</template>    <div class="skill-info">
      <div class="row row-deck gutters-tiny">
        <skill-header class="col-12" data-skill-id="melvorD:Township"></skill-header>
        <div class="col-12 d-lg-none" id="DIV_MAIN_INFO_TOGGLES">
          <div class="block pt-2 mb-0" style="background-color: rgba(0, 0, 0, 0.5) !important;box-shadow:none!important;">
            <div class="row gutters-tiny">
              <div class="col-12">
                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center township font-w400 font-size-sm">
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1" style="min-width: 48%" id="TOWN_TOGGLE_INFO">
                    <button class="btn btn-sm btn-primary w-100" onclick="townshipUI.toggleTownInfo();"><lang-string lang-id="MENU_TEXT_TOWNSHIP_TOGGLE_INFO"></lang-string></button>
                  </li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1" style="min-width: 48%" id="TOWN_TOGGLE_RESOURCES">
                    <button class="btn btn-sm btn-primary w-100" onclick="townshipUI.toggleTownResources();"><lang-string lang-id="MENU_TEXT_TOWNSHIP_TOGGLE_RESOURCES"></lang-string></button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12" id="DIV_MAIN_INFO">
          <div class="block pl-2 pr-2 pb-0 pt-1 mb-0" style="background-color: rgba(0, 0, 0, 0.5) !important;box-shadow:none!important;">
            <div class="row gutters-tiny" id="TOWN_TABLE">
              <div class="col-12">
                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center township font-w400 font-size-sm" id="township-town-info">
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info" id="TOWN_POPULATION"></li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info" id="TOWN_FORTIFICATION"></li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info">
                    <div class="media d-flex align-items-center" style="line-height: 1.15;">
                      <div class="mr-1">
                        <img class="skill-icon-xs mr-1" data-src="assets/media/skills/township/storage.png" />
                      </div>
                      <div class="media-body text-left">
                        <small class="font-w600 text-warning">
                          <lang-string lang-id="TOWNSHIP_MENU_STORAGE"></lang-string>
                        </small>
                        <div>
                          <small class="mr-1 font-w600" id="RESOURCE_storage"></small>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info" id="TOWN_SOULSTORAGE">
                    <div class="media d-flex align-items-center" style="line-height: 1.15;">
                      <div class="mr-1">
                        <img class="skill-icon-xs mr-1" data-src="assets/media/skills/township/soul_storage.png" />
                      </div>
                      <div class="media-body text-left">
                        <small class="font-w600 text-warning">
                          <lang-string lang-id="TOWNSHIP_MENU_SOUL_STORAGE"></lang-string>
                        </small>
                        <div>
                          <small class="mr-1 font-w600" id="RESOURCE_soulStorage"></small>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info" id="TOWN_HAPPINESS"></li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info" id="TOWN_EDUCATION"></li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 township-town-info township-header-info" id="TOWN_HEALTH"></li>
                  <li class="block block-rounded-double bg-combat-inner-dark text-center mx-1 pointer-enabled township-header-info" id="TOWN_WORSHIP"></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-12" id="DIV_RESOURCES">
          <div class="block pl-2 pr-2 pb-0 mb-1" style="background-color: rgba(0, 0, 0, 0.5) !important;">
            <div class="row gutters-tiny" id="RESOURCES_TABLE">
              <div class="col-12">
                <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center township font-w400 font-size-sm" id="TOWNSHIP_RESOURCE_TABLE_ELEMENTS">
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-deck gutters-tiny">
      <div class="col-12 d-none" id="TOWNSHIP_ALERT_TUTORIAL">
        <div class="alert alert-primary alert-dismissable w-100" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
          <p class="mb-0"><lang-string lang-id="TOWNSHIP_MENU_WELCOME_0"></lang-string></p>
          <p class="mb-0"><lang-string lang-id="TOWNSHIP_MENU_WELCOME_1"></lang-string></p>
          </div>
      </div>
      <div class="col-12" id="DIV_PASSIVE_TICKS">
        <div class="block p-2">
            <ul class="nav-main nav-main-horizontal justify-horizontal-center township flex-wrap">
              <li class="m-1" style="min-width: 270px;">
                <div class="spinner-border spinner-border-sm text-info mr-2" role="status"></div>
                <span class="font-size-sm font-w600">
                  <lang-string lang-id="TOWNSHIP_MENU_NEXT_TOWN_UPDATE"></lang-string>
                </span>
                <span class="font-size-sm font-w600 text-warning" id="TIME_TO_NEXT_UPDATE"></span>
              </li>
              <li class="font-size-sm font-w600" style="min-width: 220px;">
                <img class="mr-1 skill-icon-xs" id="TS_SEASON_IMG" data-src="assets/media/skills/township/summer.png">
                <span id="TS_SEASON_NAME">Summer</span> (<span class="font-size-sm font-w600 text-warning" id="TIME_TO_NEXT_SEASON"></span>)
              </li>
              <li class="m-1 mr-2">
                <button class="btn btn-sm btn-primary ml-1" onclick="game.township.viewSeasonModifiers();"><lang-string lang-id="TOWNSHIP_MENU_VIEW_SEASON_MODIFIERS"></lang-string></button>
              </li>
              <li class="font-size-sm font-w600 m-1 mr-2 d-none" id="DIV_ABYSSAL_WAVE">
                <div class="media d-flex">
                  <div class="mr-1">
                    <img class="mr-1 skill-icon-xs" data-src="assets/media/skills/combat/abyssal_damage.png">
                  </div>
                  <div class="media-body text-left">
                    <div>
                      <lang-string lang-id="TOWNSHIP_ABYSSAL_WAVE"></lang-string> <button id="BTN_PROCESS_ABYSSAL_WAVE" class="btn btn-primary btn-sm" onclick="game.township.processAbyssalWaveOnClick();" disabled><lang-string lang-id="TOWNSHIP_BTN_FIGHT_ABYSSAL_WAVE"></lang-string></button>
                    </div>
                    <div id="DIV_ABYSSAL_WAVE_SIZE">
                      <span class="font-size-xs font-w400" id="NEXT_ABYSSAL_WAVE_SIZE"></span>
                    </div>
                    <div id="DIV_BUILD_ABYSSAL_GATEWAY">
                      <span class="font-size-xs font-w600 text-danger"><lang-string lang-id="TOWNSHIP_ABYSSAL_XP_TUTORIAL_0"></lang-string></span>
                    </div>
                  </div>
                </div>
              </li>
              <li class="font-size-xs font-w400 text-left m-1" id="DIV_ABYSSAL_WAVE_XP_VALUES">
                <div>
                  <span id="ABYSSAL_XP_ON_WIN"></span>
                </div>
                <div>
                  <lang-string lang-id="TOWNSHIP_ABYSSAL_XP_TUTORIAL_1"></lang-string>
                </div>
                <div>
                  <lang-string lang-id="TOWNSHIP_ABYSSAL_XP_TUTORIAL_2"></lang-string>
                </div>
              </li>
            </ul>
        </div>
      </div>
      <div class="col-12 d-none" id="DIV_CONTROL_TICKS">
        <div class="block p-2">
          <h5 class="font-w600 text-info mb-0" id="DIV_TICKS"><lang-string lang-id="MENU_TEXT_TICK"></lang-string></h5>
          </div>
      </div>
      <div class="col-12 d-none" id="township-rework-notification">
      <div class="alert alert-info alert-dismissable w-100" role="alert">
        <h3 class="alert-heading h4 my-2">
          <lang-string lang-id="TOWNSHIP_MENU_REWORK_NOTIFICATION_0"></lang-string>
        </h3>
        <p class="mb-2">
          <lang-string lang-id="TOWNSHIP_MENU_REWORK_NOTIFICATION_1"></lang-string>
        </p>
        <p class="mb-2">
          <lang-string lang-id="TOWNSHIP_MENU_REWORK_NOTIFICATION_2"></lang-string>
        </p>
        <p class="mb-2" id="township-rework-notification-3">
          <lang-string lang-id="TOWNSHIP_MENU_REWORK_NOTIFICATION_3"></lang-string>
        </p>
        <button role="button" class="btn btn-danger m-1" onclick="townshipUI.dismissReworkNotification();">
          <lang-string lang-id="COMBAT_MISC_58"></lang-string>
        </button>
      </div>
    </div>
      <div class="col-12 font-w600 d-none" id="TOWN_NO_STORAGE_NOTIFICATION">
        <div class="alert alert-danger d-flex align-items-center p-1 font-size-md w-100" role="alert">
          <div class="flex-00-auto">
              <i class="fa fa-fw fa-exclamation-circle"></i>
          </div>
          <div class="flex-fill ml-3">
              <p class="mb-0" id="TOWN_NO_STORAGE_MSG_0"><lang-string lang-id="TOWNSHIP_MENU_TOWN_NO_STORAGE_0"></lang-string></p>
          </div>
        </div>
      </div>
      <div class="col-12 font-w600 d-none" id="TOWN_NO_SOUL_STORAGE_NOTIFICATION">
        <div class="alert alert-danger d-flex align-items-center p-1 font-size-md w-100" role="alert">
          <div class="flex-00-auto">
              <i class="fa fa-fw fa-exclamation-circle"></i>
          </div>
          <div class="flex-fill ml-3">
              <p class="mb-0" id="TOWN_NO_SOUL_STORAGE_MSG_0"><lang-string lang-id="TOWNSHIP_SOUL_STORAGE_FULL"></lang-string></p>
          </div>
        </div>
      </div>
      <div class="col-12 sticky-category-menu-mobile" id="DIV_CATEGORY_MENU">
        <div class="bg-white p-1 push content-justify-center" style="width: 100%;">
          <div class="d-lg-none">
            <button class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke" type="button" data-toggle="class-toggle" data-target="#horizontal-navigation-township" data-class="d-none">
              <span><lang-string lang-id="MENU_TEXT_TOWNSHIP_MENU_CATEGORY"></lang-string></span>
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="d-none d-lg-block mt-2 mt-lg-0" id="horizontal-navigation-township">
            <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
              <li class="nav-main-item">
                <a class="nav-main-link active" data-toggle="class-toggle" data-target="#horizontal-navigation-township" data-class="d-none" id="BTN_TOWN">
                  <img class="skill-icon-sm m-0 mr-2" data-src="assets/media/skills/township/menu_town.png">
                  <span class="nav-main-link-name font-w600"><lang-string lang-id="TOWNSHIP_MENU_TOWN"></lang-string></span>
                </a>
              </li>
              <li class="nav-main-item">
                <a class="nav-main-link" data-toggle="class-toggle" data-target="#horizontal-navigation-township" data-class="d-none" id="BTN_TASKS">
                  <img class="skill-icon-sm m-0 mr-2" data-src="assets/media/skills/township/menu_tasks.png">
                  <span class="nav-main-link-name font-w600"><lang-string lang-id="TOWNSHIP_MENU_TASKS"></lang-string></span>
                  <i id="TOWNSHIP_TASK_READY_ICON" class="fa fa-exclamation-circle ml-1 text-success d-none"></i>
                </a>
              </li>
              <li class="nav-main-item">
                  <a class="nav-main-link media d-flex" data-toggle="class-toggle" data-target="#horizontal-navigation-township" data-class="d-none" id="BTN_CONVERT_RESOURCES" style="line-height: 1.15;">
                    <div class="mr-2">
                      <img class="skill-icon-sm m-0" data-src="assets/media/skills/township/menu_trader.png">
                    </div>
                    <div class="media-body text-left">
                      <div>
                        <span class="nav-main-link-name font-w600" id="TOWN_TRADER"><lang-string lang-id="TOWNSHIP_MENU_CONVERT_RESOURCES"></lang-string></span>
                        <small class="d-none" id="TOWN_TRADER_NO_TRADING_POST"><br><lang-string lang-id="REQUIRES_A_TRADING_POST_HTML" lang-html="true"></lang-string></small>
                      </div>
                    </div>
                  </a>
              </li>
              <li class="nav-main-item">
                  <a class="nav-main-link media d-flex" data-toggle="class-toggle" data-target="#horizontal-navigation-township" data-class="d-none" id="BTN_YEET_RESOURCES" style="line-height: 1.15;">
                    <div class="mr-2">
                      <img class="skill-icon-sm m-0" data-src="assets/media/skills/township/menu_yeet.png">
                    </div>
                    <div class="media-body text-left">
                      <div>
                        <span class="nav-main-link-name font-w600"><lang-string lang-id="TOWNSHIP_MENU_MANAGE_STORAGE"></lang-string></span>
                      </div>
                    </div>
                  </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
        <div class="col-12 d-none" id="DIV_GENERATE_TOWN">
          <div class="block p-2 bg-light">
            <h4 class="font-w600 mb-2"><lang-string lang-id="TOWNSHIP_MENU_SELECT_WORSHIP"></lang-string></h4>
            <div class="alert alert-info d-flex align-items-center p-1 font-size-sm" role="alert">
              <div class="flex-00-auto">
                  <i class="fa fa-fw fa-exclamation-circle"></i>
              </div>
              <div class="flex-fill ml-3 font-w600">
                <lang-string lang-id="TOWNSHIP_MENU_WELCOME_RECOMMENDATION"></lang-string>
              </div>
            </div>
            <div id="DIV_WORSHIP">
            </div>
            <div id="DIV_WORSHIP_MODIFIERS">
            </div>
            <div class="pt-3">
              <button role="button" id="" class="btn btn-success m-1" onclick="game.township.confirmTownCreation();"><lang-string lang-id="TOWNSHIP_MENU_BTN_CONFIRM_TOWN"></lang-string></button>
            </div>
          </div>
        </div>
        <div class="col-12" id="DIV_CONTAINER">
          <div class="block p-2 bg-light">
            <div id="DIV_TOWN" class="d-none" style="min-height:1000px">
              <div class="row gutters-tiny">
                <div class="col-xl-3 col-lg-4 col-md-12">
                  <div class="row no-gutters">
                    <div class="col-12">
                      <div class="btn-group mb-2 w-100">
                        <button role="button" class="btn btn-outline-primary" id="township-town-tab-btn-0" onclick="townshipUI.setTownViewTab(0);"><lang-string lang-id="BANK_STRING_20"></lang-string></button>
                        <button role="button" class="btn btn-outline-primary" id="township-town-tab-btn-1" onclick="townshipUI.setTownViewTab(1);"><img class="skill-icon-xs" data-src="assets/media/skills/township/grasslands.png"></button>
                        <button role="button" class="btn btn-outline-primary" id="township-town-tab-btn-2" onclick="townshipUI.setTownViewTab(2);"><img class="skill-icon-xs" data-src="assets/media/main/statistics_header.png"></button>
                        <!--<button role="button" class="btn btn-outline-primary" id="township-town-tab-btn-3" onclick="townshipUI.setTownViewTab(3);"><img class="skill-icon-xs" data-src="assets/media/bank/raw_beef.png"></button>-->
                      </div>
                    </div>
                    <div class="col-12" id="township-town-tab-1">
                      <ul class="nav-main font-w400 font-size-sm px-3 px-0-mobile m-0-mobile" id="TOWNSHIP_BIOME_SELECT_ELEMENTS"></ul>
                    </div>
                    <div class="col-12 px-2" id="township-town-tab-2">
                      <h5 class="font-w600 mb-2 text-warning"><lang-string lang-id="TOWNSHIP_MENU_TOWN_INFORMATION"></lang-string></h5>
                      <ul class="nav-main font-w400 font-size-sm px-3" id="TOWNSHIP_TOWN_SUMMARY_ELEMENTS">
                        <li class="m-1"><div role="separator" class="dropdown-divider"></div></li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_WORSHIP"></lang-string></span>
                            <div class="float-right"><span id="TOWNSHIP_TOWN_SUMMARY_WORSHIP">Terran</span> <a class="ml-2 pointer-enabled" onclick="townshipUI.showChangeWorshipSelection();"><lang-string lang-id="MENU_TEXT_CHANGE"></lang-string></a></div>
                          </div>
                        </li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_PROGRESS"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_WORSHIP_PROGRESS" class="float-right">1,500 / 2,000 (75%)</div>
                          </div>
                        </li>
                        <li class="m-1"><div role="separator" class="dropdown-divider"></div></li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_STORAGE"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_STORAGE" class="float-right">- / -</div>
                          </div>
                        </li>
                        <li class="m-1" id="TOWNSHIP_TOWN_SUMMARY_SOUL_STORAGE_DIV">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_SOUL_STORAGE"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_SOUL_STORAGE" class="float-right">- / -</div>
                          </div>
                        </li>
                        <li class="m-1"><div role="separator" class="dropdown-divider"></div>
                        </li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_POPULATION"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_POPULATION" class="float-right"></div>
                          </div>
                        </li>
                        <li class="m-1" id="TOWNSHIP_TOWN_SUMMARY_FORTIFICATION_DIV">
                          <div>
                            <span class="font-w600"><lang-string lang-id="FORTIFICATION"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_FORTIFICATION" class="float-right"></div>
                          </div>
                        </li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_HAPPINESS"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_HAPPINESS" class="float-right"></div>
                          </div>
                        </li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_EDUCATION"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_EDUCATION" class="float-right"></div>
                          </div>
                        </li>
                        <li class="m-1">
                          <div>
                            <span class="font-w600"><lang-string lang-id="TOWNSHIP_MENU_HEALTH"></lang-string></span>
                            <div id="TOWNSHIP_TOWN_SUMMARY_HEALTH" class="float-right"></div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12">
                  <div class="row gutters-tiny" id="ts-town">
                    <div class="col-12 mb-2">
                      <div class="township-repair-container">
                        <div class="btn-group flex-shrink-0 mr-1 mr-0-mobile w-100-mobile">
                          <button class="btn btn-sm btn-outline-success" onclick="game.township.repairAllBuildings();"><lang-string lang-id="TOWNSHIP_MENU_REPAIR_ALL"></lang-string></button>
                          <button class="btn btn-sm btn-outline-success expansion-3-show d-none" onclick="game.township.repairAllBuildingsFromStorageType('Normal');"><img class="skill-icon-xxs mr-1" data-src="assets/media/skills/township/storage.png"><lang-string lang-id="MENU_TEXT_ONLY"></lang-string></button>
                          <button class="btn btn-sm btn-outline-success expansion-3-show d-none" onclick="game.township.repairAllBuildingsFromStorageType('Soul');"><img class="skill-icon-xxs mr-1" data-src="assets/media/skills/township/soul_storage.png"><lang-string lang-id="MENU_TEXT_ONLY"></lang-string></button>
                        </div>
                        <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs mb-2" id="TOWN_REPAIR_ALL_COSTS"></ul>
                      </div>
                    </div>
                    <div class="col-12 mb-2">
                      <div class="township-repair-container">
                        <button class="btn btn-sm btn-warning flex-shrink-0 mr-1 mr-0-mobile" onclick="game.township.repairAllBuildingsInCurrentBiome();"><lang-string lang-id="TOWNSHIP_MENU_REPAIR_ALL_IN_BIOME"></lang-string></button>
                        <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-xs mb-2" id="TOWN_REPAIR_ALL_BIOME_COSTS"></ul>
                      </div>
                    </div>
                    <div class="col-12 mb-2" id="DIV_INCREASE_HEALTH">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="DIV_CONVERT_RESOURCES" class="d-none">
                <div class="row">
                    <div class="col-12" style="position: sticky;top: 0;z-index:1;">
                      <div class="row no-gutters block">
                        <div class="col-12">
                          <h5 class="font-w600 text-info mb-1"><lang-string lang-id="TOWNSHIP_MENU_CONVERT_RESOURCES"></lang-string></h5>
                          <h5 class="font-w400 text-warning font-size-sm mb-1"><lang-string lang-id="TOWNSHIP_MENU_CONVERT_INFO"></lang-string></h5>
                        </div>
                        <div class="col-12 mb-3">
                          <h5 class="font-w600 text-left font-size-sm mb-1"><lang-string lang-id="TOWNSHIP_MENU_JUMP_TO"></lang-string></h5>
                          <ul class="nav-main nav-main-horizontal nav-main-horizontal-override font-w400 font-size-sm" id="convert-resource-jump-to"></ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 mb-2 d-none">
                      <settings-checkbox data-setting-id="enableQuickConvert"></settings-checkbox>
                      <small>Clicking an item bypasses the confirmation popup. Still in development in terms of UI but works nonetheless.</small>
                      <div class="btn-group mb-1 w-100" id="convert-resource-quick-qty">
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-10" id="convert-resource-quick-qty-10">10%</button>
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-25" id="convert-resource-quick-qty-25">25%</button>
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-50" id="convert-resource-quick-qty-50">50%</button>
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-75" id="convert-resource-quick-qty-75">75%</button><br>
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-90" id="convert-resource-quick-qty-90">90%</button>
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-100" id="convert-resource-quick-qty-100">100%</button>
                        <button class="btn btn-sm btn-primary m-1 convert-resource-quick-qty-all-but-1" id="convert-resource-quick-qty-all-but-1">All but 1</button>
                      </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                          <div class="col-12" id="CONVERT_RESOURCES_DATA_TO_TOWN">
                          </div>
                        </div>
                        <div class="row d-none" id="CONVERT_RESOURCES_DATA">
                        </div>
                    </div>
                </div>
            </div>
            <div id="DIV_YEET_RESOURCES" class="col-12 d-none">
              <div class="row">
                <div class="col-12 font-w600">
                  <lang-string lang-id="TOWNSHIP_MENU_MANAGE_STORAGE"></lang-string>
                  <div role="separator" class="dropdown-divider"></div>
                </div>
                <div class="col-12" id="CAP_RESOURCES_DATA"></div>
                <div role="separator" class="dropdown-divider"></div>
                <div class="col-12" id="YEET_RESOURCES_DATA"></div>
                <div class="col-12">
                  <div class="row d-none" id="CONVERT_RESOURCES_DATA"></div>
                </div>
              </div>
            </div>
            <township-tasks-menu class="d-none" id="township-tasks-menu"></township-tasks-menu>
          </div>
        </div>
    </div>

</div>
<!-- END TOWNSHIP Content --><!-- ARCHAEOLOGY Content -->
<div class="content d-none" id="archaeology-container">
  <template id="dig-site-map-select-template">
    <h5 class="font-w600 font-size-sm text-center my-1"><lang-string lang-id="MENU_TEXT_Select_Map"></lang-string></h5>
    <div class="flex-wrap justify-horizontal-center" id="map-container"></div>
  </template>
  <template id="archaeology-dig-site-container-template">
    <div class="block block-content block-rounded block-link-pop border-top border-danger border-4x text-center d-flex justify-vertical-center archaeology-dig-site-container-unlock" id="unlock-container">
      <div class="row gutters-tiny">
        <div class="col-12">
          <h5 class="font-w600"><lang-string lang-id="UNDISCOVERED_DIG_SITE"></lang-string></h5>
          <h5 class="font-w600 font-size-sm mb-1"><lang-string lang-id="MENU_TEXT_REQUIRES"></lang-string></h5>
        </div>
        <div class="col-12" id="unlock-requirements">
        </div>
      </div>
    </div>
    <div class="block block-content block-rounded block-link-pop border-top border-archaeology border-4x text-center" id="dig-site-container">
      <div class="row gutters-tiny">
        <div class="col-12">
          <i class="fa text-muted mr-1 font-w300 fa-eye pointer-enabled" id="eye-toggle"></i>
          <span class="h5 font-w700 mb-2 mr-1" id="name"></span>
          <i class="fa fa-info-circle text-info d-none" id="has-item-requirement"></i>
        </div>
        <div id="area-container">
          <div class="row gutters-tiny">
            <div class="col-12">
              <span class="font-size-sm font-w600 mb-2" id="level"></span>
            </div>
            <div class="col-12 mb-2">
              <img id="image" style="width: 128px;">
            </div>
            <dig-site-map-select id="map-select" class="col-12 mb-1"></dig-site-map-select>
            <div class="col-12 block block-rounded-double bg-combat-inner-dark p-1 mb-3 justify-vertical-center" id="no-map-selected" style="min-height: 75px;">
              <h5 class="font-w600 font-size-sm mb-1 text-danger"><lang-string lang-id="MENU_TEXT_NO_MAP_SELECTED"></lang-string></h5>
            </div>
            <div class="col-12 block block-rounded-double bg-combat-inner-dark p-1 mb-3 justify-vertical-center d-none" id="map-info-container" style="min-height: 75px;">
              <h5 class="font-w600 font-size-sm mb-1" id="map-tier"></h5>
              <div class="h5 font-w400 font-size-sm mb-1" id="map-actions"></div>
              <div class="h5 font-w400 font-size-sm mb-1" id="map-artefact-value"></div>
            </div>
            <div class="col-12 mb-1">
              <h5 class="font-w600 font-size-sm mb-0"><lang-string lang-id="MENU_TEXT_SELECT_ACTIVE_TOOLS"></lang-string></h5>
            </div>
            <div class="col-12 mb-3" id="tool-container">
            </div>
            <div class="col-12 block block-rounded-double bg-combat-inner-dark p-1 mb-2" id="tool-info-container">
              <h5 class="font-w300 font-size-xs mb-1 text-warning"><lang-string lang-id="MENU_TEXT_ONE_ARTEFACT_ROLLED_PER_ACTION"></lang-string></h5>
              <h5 class="font-w600 font-size-sm mb-1 text-warning" id="tool-name"></h5>
              <div class="row gutters-tiny" id="chance-to-find"></div>
            </div>
            <div class="col-12 mb-1">
              <h5 class="font-w600 font-size-sm mb-0"><lang-string lang-id="WHEN_LOCATING_AN_ARTEFACT"></lang-string></h5>
            </div>
            <div class="col-12 row justify-content-center gutters-tiny text-center icon-size-32">
              <doubling-icon id="doubling-icon"></doubling-icon>
              <xp-icon id="xp-icon"></xp-icon>
              <mastery-xp-icon id="mastery-icon"></mastery-xp-icon>
              <mastery-pool-icon id="mastery-pool-icon"></mastery-pool-icon>
              <interval-icon id="interval-icon"></interval-icon>
            </div>
            <div class="col-12 mb-2">
              <button class="btn btn-sm btn-success m-2" id="excavate-btn"><lang-string lang-id="MENU_TEXT_BTN_EXCAVATE"></lang-string></button>
              <button class="btn btn-sm btn-primary m-2" id="show-artefacts-btn"><lang-string lang-id="MENU_TEXT_BTN_SHOW_ARTEFACTS"></lang-string></button>
              <progress-bar id="progress-bar"></progress-bar>
            </div>
            <div class="col-12">
              <mastery-display id="mastery-display" class="mastery-6"></mastery-display>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <template id="artefact-drop-list-template">
    <div class="bg-light rounded p-2 mb-2 d-none" id="has-item-requirement">
      <span class="font-size-sm text-info text-center font-w600">
        <lang-string lang-id="ARCHAEOLOGY_DISITE_TIP_0"></lang-string>
      </span>
    </div>
    <h5 class="font-w600 text-warning mb-1"><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_SIZE_tiny"></lang-string></h5>
    <div class="font-size-sm mb-3" id="artefacts-tiny"></div>
    <h5 class="font-w600 text-warning mb-1"><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_SIZE_small"></lang-string></h5>
    <div class="font-size-sm mb-3" id="artefacts-small"></div>
    <h5 class="font-w600 text-warning mb-1"><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_SIZE_medium"></lang-string></h5>
    <div class="font-size-sm mb-3" id="artefacts-medium"></div>
    <h5 class="ont-w600 text-warning mb-1"><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_SIZE_large"></lang-string></h5>
    <div class="font-size-sm" id="artefacts-large"></div>
  </template>
  <div class="skill-info">
    <skill-header data-skill-id="melvorAoD:Archaeology"></skill-header>
  </div>
  <!-- ARCHAEOLOGY -->
  <div class="row row-deck">
    <div class="col-12 sticky-category-menu-mobile" id="ARCHAEOLOGY_CATEGORY_MENU">
      <div class="bg-white p-1 push content-justify-center" style="width: 100%;">
        <div class="d-lg-none">
          <button class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke" type="button" data-toggle="class-toggle" data-target="#horizontal-navigation-archaeology" data-class="d-none">
            <span><lang-string lang-id="MENU_TEXT_SELECT_ARCHAEOLOGY_CATEGORY"></lang-string></span>
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <div class="d-none d-lg-block mt-2 mt-lg-0" id="horizontal-navigation-archaeology">
          <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center">
            <li class="nav-main-item">
              <a class="nav-main-link active township-tab-selected" data-toggle="class-toggle" data-target="#horizontal-navigation-archaeology" data-class="d-none" id="archaeology-dig-sites-menu">
                <img class="skill-icon-sm m-0 mr-2" data-src="assets/media/skills/archaeology/digsites.png">
                <span class="nav-main-link-name font-w600"><lang-string lang-id="ARCHAEOLOGY_MENU_DIGSITES"></lang-string></span>
              </a>
            </li>
            <li class="nav-main-item">
              <a class="nav-main-link" data-toggle="class-toggle" data-target="#horizontal-navigation-archaeology" data-class="d-none" id="archaeology-museum-menu">
                <img class="skill-icon-sm m-0 mr-2" data-src="assets/media/skills/archaeology/museum.png">
                <span class="nav-main-link-name font-w600"><lang-string lang-id="ARCHAEOLOGY_MENU_MUSEUM"></lang-string></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row row-deck" id="archaeology-dig-sites-container"></div>
  <div class="row row-deck gutters-tiny d-none" id="archaeology-museum-container">
    <div class="col-12">
      <div class="block block-rounded block-content block-content-full">
        <h5 class="font-w600 font-size-sm mb-1 text-center"><lang-string lang-id="ARCHAEOLOGY_MUSEUM_NOTIFICATION_0"></lang-string></h5>
        <h5 class="font-w600 font-size-sm text-warning mb-0 text-center"><lang-string lang-id="ARCHAEOLOGY_MUSEUM_NOTIFICATION_1"></lang-string></h5>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded block-content block-content-full">
        <div class="row gutters-tiny">
          <div class="col-12 col-xl-4">
            <div class="row">
              <div class="col-12">
                <div class="block block-rounded d-flex flex-column">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center bg-combat-inner-dark">
                    <dl class="mb-0">
                      <dt class="font-size-h2 font-w700" id="artefacts-donated"></dt>
                      <dd class="text-muted mb-0"><lang-string lang-id="ARCHAEOLOGY_MUSEUM_ARTEFACTS_DONATED"></lang-string></dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="block block-rounded d-flex flex-column">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center bg-combat-inner-dark">
                    <dl class="mb-0">
                      <dt class="font-size-h2 font-w700" id="museum-next-reward"></dt>
                      <dd class="text-muted mb-0"><lang-string lang-id="ARCHAEOLOGY_MUSEUM_NEXT_REWARD"></lang-string></dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="block block-rounded d-flex flex-column">
                  <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center bg-combat-inner-dark">
                    <dl class="mb-0">
                      <dt class="font-size-h2 font-w700 mb-1 text-center">
                        <button class="btn btn-primary" id="museum-donate-btn">
                          <lang-string lang-id="ARCHAEOLOGY_BTN_DONATE_JUNK_TO_MUSEUM"></lang-string>
                        </button>
                        <button class="btn btn-secondary" id="museum-donate-settings-btn" data-toggle="modal" data-target="#modal-generic-artefact-settings">
                          <i class="fa fa-cog"></i>
                        </button>
                      </dt>
                      <dd class="text-muted mb-0 text-center font-size-sm"><span id="museum-tokens-gained"></span></dd>
                      <dd><div role="separator" class="dropdown-divider"></div></dd>
                      <dd class="text-muted mb-2 font-size-sm text-center"><span id="museum-tokens-in-bank"></span></dd>
                      <dd class="text-muted mb-0">
                        <div class="bg-light rounded p-2 text-center text-info font-size-sm">
                          <i class="fa fa-exclamation-circle mr-2"></i><lang-string lang-id="ARCHAEOLOGY_JUNK_INFO"></lang-string>
                        </div>
                      </dd>
                      <dd class="text-muted mb-0">
                        <div class="bg-light rounded p-2 text-center text-warning font-size-sm">
                          <i class="fa fa-exclamation-circle mr-2"></i><lang-string lang-id="ARCHAEOLOGY_JUNK_INFO_LOCKED"></lang-string>
                        </div>
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-xl-8 px-3" id="archaeology-museum-content">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END ARCHAEOLOGY -->
</div>
<!-- END ARCHAEOLOGY Content -->

	<!-- GENERIC ARTEFACT SETTINGS MODAL -->
	<div class="modal" id="modal-generic-artefact-settings" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter" aria-modal="true" style="display: none; z-index: 1100;">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="block block-rounded block-themed block-transparent mb-0">
	        <div class="block-header bg-primary-dark">
	          <h3 class="block-title">
	            <lang-string lang-id="ARCHAEOLOGY_BTN_DONATE_JUNK_TO_MUSEUM"></lang-string>
	          </h3>
	          <div class="block-options">
	            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
	              <i class="fa fa-fw fa-times"></i>
	            </button>
	          </div>
	        </div>
	        <div class="block-content block-content-full">
						<settings-switch class="font-size-sm text-center mb-1" data-setting-id="genericArtefactAllButOne" data-size="large"></settings-switch>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- END GENERIC ARTEFACT SETTINGS --><!-- CARTOGRAPHY Content -->
<div class="d-none flex-grow-1 flex-column mt-1-mobile" id="cartography-container">
  <div>
    <skill-header data-skill-id="melvorAoD:Cartography"></skill-header>
  </div>
  <!-- CARTOGRAPHY -->
  <world-map-display id="cartography-map-display" class="flex-grow-1 cartography-map-container"></world-map-display>
  <!-- END CARTOGRAPHY -->
</div>
<div class="modal" id="cartography-map-creation-modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-full-width" role="document">
    <div class="modal-content">
      <create-map-menu id="modal-create-map-menu"></create-map-menu>
    </div>
  </div>
</div>
<div class="modal" id="cartography-map-mastery-modal" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <map-mastery-menu id="modal-map-mastery-menu"></map-mastery-menu>
    </div>
  </div>
</div>
<template id="survey-overview-template">
  <div class="block-content p-1-mobile font-size-sm-mobile">
    <div class="row row-deck">
      <div class="col-12">
        <div class="justify-horizontal-center w-100">
          <div class="flex-spacer"></div>
          <div class="justify-vertical-center">
            <small class="text-info"><lang-string lang-id="CURRENTLY_SURVEYING"></lang-string></small>
            <span class="font-w600" id="hex-name"></span>
          </div>
          <div class="flex-spacer justify-horizontal-left">
            <button class="btn btn-primary mx-1 btn-sm-mobile" id="go-to-hex-button">
              <i class="fa fa-share"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="col-12 justify-horizontal-center mb-2 icon-size-32">
        <xp-icon id="xp-icon"></xp-icon>
        <interval-icon id="interval-icon"></interval-icon>
      </div>
      <div class="col-12 mb-2">
        <progress-bar class="progress-height-5" id="progress-bar"></progress-bar>
      </div>
    </div>
  </div>
</template>
<template id="hex-overview-template">
  <div class="block-header p-0">
    <h5 class="block-title pl-4"><lang-string lang-id="COORDS"></lang-string><span class="ml-1" id="hex-coords"></span>
    </h5>
    <div class="block-options">
      <button class="btn-block-option" type="button" aria-label="Close" id="close-btn">
        <i class="fa fa-fw fa-times"></i>
      </button>
    </div>
  </div>
  <div class="block-content pt-0">
    <div class="row row-deck">
      <div class="col-12 d-none" id="poi-info">
        <div class="block block-rounded block-rounded-double bg-combat-inner-dark mb-2 justify-vertical-center">
          <h5 class="mb-1 text-center" id="poi-name"></h5>
          <img class="height-64 mb-1" id="poi-image">
          <button class="btn btn-primary btn-sm-md mb-1" id="poi-discovery-btn"><lang-string
              lang-id="SHOW_DISCOVERY"></lang-string></button>
          <div id="active-modifiers-cont">
            <h5 class="text-center mb-1"><lang-string lang-id="ACTIVE_MODIFIERS"></lang-string></h5>
            <div class="bg-light rounded p-1 text-center text-warning font-size-xs m-1">
              <i class="fa fa-exclamation-circle mr-1"></i><lang-string lang-id="ACTIVE_MODIFIERS_INFO"></lang-string>
            </div>
            <div class="justify-vertical-center font-size-xs text-center" id="active-modifiers-list"></div>
          </div>
        </div>
      </div>
      <div class="col-12 d-none" id="requirements">
        <div class="block block-rounded block-rounded-double bg-combat-inner-dark mb-2">
          <h5 class="text-center mb-1"><lang-string lang-id="SURVEY_REQUIREMENTS"></lang-string></h5>
          <ul id="requirement-list"></ul>
        </div>
      </div>
      <div class="col-12 d-none" id="fast-travel-unlock">
        <div class="block block-rounded block-rounded-double bg-combat-inner-dark mb-2 justify-vertical-center">
          <h5 class="my-1"><lang-string lang-id="FAST_TRAVEL"></lang-string></h5>
          <p class="text-center text-warning mb-1" id="fast-travel-info"></p>
          <quantity-icons class="mb-2 icon-size-32" id="fast-travel-unlock-cost"></quantity-icons>
          <button class="btn btn-primary btn-sm-md mb-2 d-none" id="fast-travel-unlock-btn"><lang-string
              lang-id="UNLOCK_FAST_TRAVEL"></lang-string></button>
        </div>
      </div>
      <div class="col-12">
        <div class="block block-rounded block-rounded-double bg-combat-inner-dark mb-2">
          <div class="row no-gutters mb-2 d-none" id="travel-cost">
            <h5 class="col-6 justify-horizontal-right m-0"><lang-string lang-id="TRAVEL_COST_COL"></lang-string></h5>
            <quantity-icons class="col-6 justify-horizontal-left icon-size-32" id="travel-cost-list"></quantity-icons>
          </div>
          <div class="justify-horizontal-center my-1 flex-wrap" id="interactions">
            <button class="btn btn-success btn-sm-md m-1 d-none" id="auto-survey-btn"><lang-string
                lang-id="AUTO_SURVEY"></lang-string></button>
            <button class="btn btn-success btn-sm-md m-1 d-none" id="queue-survey-btn"></button>
            <button class="btn btn-primary btn-sm-md m-1 d-none" id="travel-btn"><lang-string
                lang-id="TRAVEL"></lang-string></button>
            <button class="btn btn-primary btn-sm-md m-1 d-none" id="portal-btn"></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="image-search-result-template">
  <li class="list-group-item media pointer-enabled" id="item">
    <img id="image" style="height:32px">
    <span class="media-body" id="text"></span>
  </li>
</template>
<template id="poi-search-result-template">
  <li class="list-group-item pointer-enabled justify-horizontal-left" id="item">
    <img class="height-48 mr-2" id="image">
    <span class="justify-vertical-center flex-grow-1" id="text">
      <div class="font-w600 text-center" id="poi-name"></div>
      <div class="font-size-sm text-center justify-vertical-center" id="active-modifiers"></div>
    </span>
  </li>
</template>
<template id="world-map-filter-template">
  <div class="custom-control custom-checkbox m-2">
    <input id="checkbox" class="custom-control-input" type="checkbox">
    <label class="custom-control-label pointer-enabled" id="label">
      <div class="media d-flex align-items-center">
        <div class="mr-2">
          <img class="resize-32" id="icon">
        </div>
        <div class="media-body">
          <span id="name"></span>
        </div>
      </div>
    </label>
  </div>
</template>
<template id="world-map-display-template">
  <canvas style="touch-action: none; position: absolute; display: block; cursor: inherit;" id="canvas" tabindex="0"
    role="application"></canvas>
  <div class="cartography-top-overlay p-2 row no-gutters pointer-events-none" id="top-overlay">
    <div class="col-12 col-sm-4">
      <div class="block block-rounded pointer-events-auto mb-1">
        <div class="block-header p-0">
          <div class="input-group">
            <input class="form-control" type="text" id="location-search-bar">
            <div class="input-group-append">
              <button class="btn btn-danger" id="clear-location-search-btn">X</button>
            </div>
          </div>
        </div>
        <div class="block-content p-0 overflow-y-auto d-none" style="max-height: 40vh;" id="search-results-cont">
          <p class="text-danger text-center my-1" id="no-search-result"><lang-string
              lang-id="NO_LOCATIONS_FOUND"></lang-string></p>
          <ul id="search-results" class="list-group"></ul>
        </div>
      </div>
    </div>
    <div class="col-8 justify-content-start col-sm-4 media justify-content-sm-center">
      <button class="btn btn-primary pointer-events-auto justify-vertical-center border border-2x border-dark btn-sm-mobile"
        id="create-map-btn">
        <span id="create-map-btn-text"></span>
        <div class="text-warning d-none" id="create-map-spinner">
          <div class="spinner-border spinner-border-sm mr-2"></div><span class="font-size-sm"
            id="create-map-info"></span>
        </div>
      </button>
    </div>
    <div class="col-2 justify-content-center col-sm-2 media">
      <button class="btn btn-primary pointer-events-auto border border-2x border-dark btn-sm-mobile" id="poi-discovery-btn">
        <img class="skill-icon-xs" id="poi-discovery-img">
      </button>
    </div>
    <div class="col-2 justify-content-end col-sm-2 media dropdown">
      <button class="btn btn-info dropdown-toggle pointer-events-auto border border-2x border-dark" id="map-filter-btn"
        type="button" data-toggle="dropdown"><i class="fa fa-filter"></i></button>
      <div class="dropdown-menu dropdown-menu-right pointer-events-auto">
        <div class="form-group" id="map-filter-cont"></div>
      </div>
    </div>
  </div>
  <div class="cartography-bot-left-overlay pointer-events-none" id="bottom-left-overlay">
    <div class="btn-group-vertical push m-2 pointer-events-auto">
      <button class="btn btn-primary border border-2x border-dark btn-sm-mobile" id="zoom-in-button" aria-label="Zoom Map In"><i
          class="fa fa-plus"></i></button>
      <button class="btn btn-primary border border-2x border-dark btn-sm-mobile" id="zoom-out-button" aria-label="Zoom Map Out"><i
          class="fa fa-minus"></i></button>
    </div>
    <button class="btn btn-primary m-2 pointer-events-auto border border-2x border-dark btn-sm-mobile" id="home-button"
      aria-label="Go to Player Location"><i class="fa fa-crosshairs"></i></button>
    <survey-overview class="block block-rounded mb-0 pointer-events-auto d-none" id="survey-overview"></survey-overview>
    <hex-overview class="block block-rounded mb-0 pointer-events-auto d-none" id="hex-overview"></hex-overview>
  </div>
  <div class="d-none cartography-accessible-overlay pointer-events-none" role="alert" aria-live="assertive"
    id="accessible-overlay">
    <div class="block block-rounded mb-0">
      <div class="block-content pt-0">
        <div class="row row-deck font-size-sm">
          <div class="col-12" id="accessible-info"></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-0"><span
              class="badge badge-info badge-pill mr-1">0</span><span id="accessible-option-0-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-1"><span
              class="badge badge-info badge-pill mr-1">1</span><span id="accessible-option-1-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-2"><span
              class="badge badge-info badge-pill mr-1">2</span><span id="accessible-option-2-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-3"><span
              class="badge badge-info badge-pill mr-1">3</span><span id="accessible-option-3-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-4"><span
              class="badge badge-info badge-pill mr-1">4</span><span id="accessible-option-4-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-5"><span
              class="badge badge-info badge-pill mr-1">5</span><span id="accessible-option-5-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-6"><span
              class="badge badge-info badge-pill mr-1">6</span><span id="accessible-option-6-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-7"><span
              class="badge badge-info badge-pill mr-1">7</span><span id="accessible-option-7-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-8"><span
              class="badge badge-info badge-pill mr-1">8</span><span id="accessible-option-8-text"></span></div>
          <div class="col-4 justify-horizontal-left d-none" id="accessible-option-9"><span
              class="badge badge-info badge-pill mr-1">9</span><span id="accessible-option-9-text"></span></div>
        </div>
      </div>
    </div>
  </div>
  <div class="justify-vertical-center position-absolute w-100 h-100 bg-combat-dark z-index-5" id="load-screen">
    <div class="spinner-border text-danger" role="status"></div><span class="text-danger" id="load-message"></span>
  </div>
</template>
<template id="create-map-menu-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title">
        <lang-string lang-id="CREATE_MAPS"></lang-string>
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block-content block-content-full">
      <div class="row">
        <div class="col-12">
          <h5 class="font-w600 mb-3 text-warning"><lang-string lang-id="MENU_TEXT_CREATE_DIG_SITE_MAP_NOTICE"
              lang-html="true"></lang-string>
          </h5>
        </div>
        <div class="col-12 d-md-none mb-2">
          <button class="btn btn-light w-100 text-combat-smoke d-flex justify-content-between align-items-center"
            id="dig-site-select-toggle">
            <span><lang-string lang-id="SELECT_DIG_SITE"></lang-string></span><i class="fa fa-bars"></i>
          </button>
        </div>
        <dig-site-select-menu id="dig-site-select" class="d-md-block col-12 col-md-4 d-none"></dig-site-select-menu>
        <div class="col-12 col-md-8">
          <div class="block block-rounded mb-2">
            <ul class="nav nav-tabs nav-tabs-block" role="tablist">
              <li class="nav-item">
                <a class="nav-link pointer-enabled active" id="create-paper-tab" data-toggle="tab"
                  data-target="#create-paper-pane" role="tab" aria-controls="create-paper-pane"
                  aria-selected="true"><lang-string lang-id="CREATE_PAPER"></lang-string></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pointer-enabled" id="map-create-tab" data-toggle="tab" data-target="#map-create-pane"
                  role="tab" aria-controls="map-create-pane" aria-selected="false"><lang-string
                    lang-id="MAP_CREATION"></lang-string></a>
              </li>
              <li class="nav-item">
                <a class="nav-link pointer-enabled" id="map-refinement-tab" data-toggle="tab"
                  data-target="#map-refinement-pane" role="tab" aria-controls="map-refinement-pane"
                  aria-selected="false"><lang-string lang-id="MAP_REFINEMENT"></lang-string></a>
              </li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane show active" id="create-paper-pane" role="tabpanel" aria-labelledby="create-paper-tab">
              <paper-making-menu id="paper-making-menu"></paper-making-menu>
            </div>
            <div class="tab-pane" id="map-create-pane" role="tabpanel" aria-labelledby="map-create-tab">
              <map-upgrade-menu id="map-upgrade-menu"></map-upgrade-menu>
            </div>
            <div class="tab-pane" id="map-refinement-pane" role="tabpanel" aria-labelledby="map-refinement-tab">
              <map-refinement-menu id="map-refinement-menu"></map-refinement-menu>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="dig-site-select-menu-template">
  <h5 class="d-md-block d-none mb-2"><lang-string lang-id="SELECT_DIG_SITE"></lang-string></h5>
  <div class="justify-vertical-center">
    <div class="input-group mb-2">
      <input class="form-control" type="text" id="dig-site-search-bar" placeholder="Search Dig Sites...">
      <div class="input-group-append">
        <button class="btn btn-danger" id="clear-dig-site-search-btn" aria-label="Clear Search Bar">X</button>
      </div>
    </div>
    <p class="text-danger text-center my-1 d-none" id="no-dig-site-message"></p>
    <ul id="dig-site-container" class="list-group overflow-y-auto w-100" style="max-height: 70vh;">
    </ul>
    <p class="text-info text-center my-1"><lang-string lang-id="CREATE_MAP_EXTRA_INFO"></lang-string></p>
  </div>
</template>
<template id="dig-site-map-info-template">
  <div class="block block-rounded-double bg-combat-inner-dark justify-vertical-center" id="no-map-container">
    <span class="font-w600 font-size-sm text-danger"><lang-string
        lang-id="MENU_TEXT_NO_MAP_SELECTED"></lang-string></span>
  </div>
  <div class="block block-rounded-double bg-combat-inner-dark justify-vertical-center font-w600 font-size-sm"
    id="info-container">
    <div class="row gutters-tiny">
      <div class="col-12 text-center">
        <lang-string lang-id="TIER"></lang-string> <span class="text-success" id="map-tier"></span>
      </div>
      <div class="col-12 text-center">
        <lang-string lang-id="UPGRADE_ACTIONS_TO_NEXT"></lang-string> <span class="text-success font-w400"
          id="map-upgrade-progress">0/1000</span>
      </div>
      <div class="col-12 text-center">
        <lang-string lang-id="ACTIONS_REMAINING"></lang-string> <span class="text-success font-w400"
          id="map-charges">0</span>
      </div>
      <div class="col-12 text-center px-4">
        <div role="separator" class="dropdown-divider"></div>
      </div>
      <div class="col-12 text-center">
        <lang-string lang-id="ARTEFACT_VALUES"></lang-string>
      </div>
      <div class="col-12 text-info text-center font-w400">
        <lang-string lang-id="MENU_TEXT_LOWER_IS_BETTER"></lang-string>
      </div>
      <div class="col-12">
        <table class="table table-borderless table-sm table-fixed">
          <tbody>
            <tr>
              <td class="text-right"><lang-string lang-id="TINY"></lang-string></td>
              <td class="text-success font-w400 text-left" id="artefact-value-tiny"></td>
            </tr>
            <tr>
              <td class="text-right"><lang-string lang-id="SMALL"></lang-string></td>
              <td class="text-success font-w400 text-left" id="artefact-value-small"></td>
            </tr>
            <tr>
              <td class="text-right"><lang-string lang-id="MEDIUM"></lang-string></td>
              <td class="text-success font-w400 text-left" id="artefact-value-medium"></td>
            </tr>
            <tr>
              <td class="text-right"><lang-string lang-id="LARGE"></lang-string></td>
              <td class="text-success font-w400 text-left" id="artefact-value-large"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<template id="paper-making-menu-template">
  <div class="row row-deck gutters-tiny">
    <div class="col-6">
      <div class="block block-rounded-double bg-combat-inner-dark justify-horizontal-center pb-2 pt-1">
        <div class="dropdown">
          <button class="btn btn-sm-mobile btn-primary dropdown-toggle text-wrap" type="button" data-toggle="dropdown"
            id="recipe-select-button"><lang-string lang-id="SELECT_LOGS"></lang-string></button>
          <div class="dropdown-menu overflow-y-auto" id="recipe-options" style="max-height: 60vh; min-width:200px">
          </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="block block-rounded-double bg-combat-inner-dark justify-horizontal-center pb-2 pt-1 icon-size-48">
        <doubling-icon id="doubling-icon"></doubling-icon>
        <preservation-icon id="preserve-icon"></preservation-icon>
      </div>
    </div>
    <div class="col-12">
      <div class="row no-gutters block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <requires-box class="col-12 col-sm-6 col-md-12 col-lg-6 mt-2 icon-size-48" id="requires"></requires-box>
        <haves-box class="col-12 col-sm-6 col-md-12 col-lg-6 mt-2 icon-size-48" id="haves"></haves-box>
      </div>
    </div>
    <div class="col-12">
      <div class="row no-gutters block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <produces-box class="col-12 col-sm-6 col-md-12 col-lg-6 icon-size-48" id="produces"></produces-box>
        <haves-box class="col-12 col-sm-6 col-md-12 col-lg-6 icon-size-48" id="produces-haves"></haves-box>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <grants-box class="icon-size-48" id="grants"></grants-box>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <div class="row">
          <div class="col-12 justify-horizontal-center pb-2 icon-size-48">
            <button class="btn btn-success" type="button" id="create-button"><lang-string
                lang-id="MENU_TEXT_CREATE"></lang-string></button>
            <interval-icon id="interval-icon"></interval-icon>
          </div>
          <div class="col-12">
            <progress-bar class="progress-height-5 mx-2" id="progress-bar"></progress-bar>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="map-upgrade-menu-template">
  <div class="row row-deck gutters-tiny">
    <div class="col-lg-4">
      <div class="block block-rounded-double bg-combat-inner-dark justify-vertical-center">
        <h5 class="font-w700 my-1" id="dig-site-name"><lang-string lang-id="NO_DIG_SITE_SELECTED"></lang-string></h5>
        <img class="skill-icon-md" id="dig-site-image" data-src="assets/media/main/question.png">
      </div>
    </div>
    <div class="col-lg-8">
      <div class="block block-rounded-double bg-combat-inner-dark justify-vertical-center">
        <h5 class="font-w600 font-size-sm text-center my-1"><lang-string lang-id="MENU_TEXT_Select_Map"></lang-string>
        </h5>
        <div class="justify-horizontal-center">
          <button id="create-map-button" class="btn btn-outline-success m-1" type="button">
            <i class="fa fa-fw fa-plus"></i>
            <lang-string lang-id="CREATE_MAP"></lang-string>
            <quantity-icons class="icon-size-32" id="map-creation-costs"></quantity-icons>
          </button>
        </div>
      </div>
    </div>
    <dig-site-map-info class="col-12" id="map-info"></dig-site-map-info>
    <div class="col-12">
      <div class="row no-gutters block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <requires-box class="col-12 col-sm-6 col-md-12 col-lg-6 mt-2 icon-size-48" id="upgrade-requires"></requires-box>
        <haves-box class="col-12 col-sm-6 col-md-12 col-lg-6 mt-2 icon-size-48" id="upgrade-haves"></haves-box>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <grants-box class="icon-size-48" id="grants"></grants-box>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark pb-2 pt-1">
        <div class="row">
          <div class="col-12 justify-horizontal-center pb-2 icon-size-48">
            <button class="btn btn-success" type="button" id="upgrade-button"><lang-string
                lang-id="UPGRADE_MAP"></lang-string></button>
            <interval-icon id="interval-icon"></interval-icon>
            <preservation-icon id="preserve-icon"></preservation-icon>
          </div>
          <div class="col-12">
            <progress-bar class="progress-height-5 mx-2" id="progress-bar"></progress-bar>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark pb-2 pt-1 text-center">
        <a class="font-size-sm text-danger font-w600 pointer-enabled link-fx" id="delete-map"><lang-string lang-id="DELETE_DIG_SELECTED_SITE_MAP"></lang-string></a>
      </div>
    </div>
  </div>
</template>
<template id="map-refinement-menu-template">
  <div class="row row-deck gutters-tiny">
    <div class="col-lg-4">
      <div class="block block-rounded-double bg-combat-inner-dark justify-vertical-center">
        <h5 class="font-w700 my-1" id="dig-site-name"><lang-string lang-id="NO_DIG_SITE_SELECTED"></lang-string></h5>
        <img class="skill-icon-md" id="dig-site-image" data-src="assets/media/main/question.png">
      </div>
    </div>
    <div class="col-lg-8">
      <div class="block block-rounded-double bg-combat-inner-dark justify-vertical-center">
        <h5 class="font-w600 font-size-sm text-center my-1"><lang-string lang-id="MENU_TEXT_Select_Map"></lang-string>
        </h5>
        <div class="justify-horizontal-center" id="select-map-container">
        </div>
      </div>
    </div>
    <dig-site-map-info class="col-12" id="map-info"></dig-site-map-info>
    <div class="col-12" id="refinement-info-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <h5 class="font-w600 font-size-sm text-center my-1"><lang-string lang-id="REFINEMENTS"></lang-string> <span
            id="refinement-count">0 / 1</span></h5>
        <div class="justify-vertical-center">
          <ul class="list-group push w-80" id="refinement-container">
          </ul>
          <div class="w-80 justify-vertical-center" id="new-container">
            <h5 class="font-w600 font-size-sm text-center mb-1"><lang-string lang-id="ADD_NEW_REFINEMENT"></lang-string>
            </h5>
            <quantity-icons class="pb-2 icon-size-32" id="refinement-costs"></quantity-icons>
            <div class="btn-group-vertical push" role="group" id="refinement-select-container"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="hex-tooltip-template">
  <div class="justify-vertical-center">
    <div>
      <span class="font-w600 mr-1 font-size-sm">
        <lang-string lang-id="COORDS"></lang-string>
      </span>
      <span class="font-size-sm" id="coords"></span>
    </div>
    <div class="justify-horizontal-center">
      <span class="font-w600 mr-1 font-size-sm">
        <lang-string lang-id="SURVEY_XP"></lang-string>
      </span>
      <span class="mr-2 font-size-sm" id="xp">0</span>
      <span class="font-w600 mr-1 font-size-sm">
        <lang-string lang-id="SURVEY_LEVEL"></lang-string>
      </span>
      <span class="font-size-sm" id="level">0</span>
    </div>
    <div class="justify-horizontal-center">
      <span class="font-w600 mr-1 font-size-sm">
        <lang-string lang-id="SKILL_XP_PER_SURVEY_ACTION"></lang-string>
      </span>
      <span class="text-success font-size-sm" id="skill-xp"></span>
    </div>
  </div>
  <div class="text-center" id="reqs-container"></div>
  <div class="media d-flex align-items-center push" id="poi-container">
    <div class="mr-3">
      <img class="height-64 m-1" id="poi-media">
    </div>
    <div class="media-body">
      <div class="font-w600"><span id="poi-title"></span></div>
      <div class="font-w600 text-warning"><span id="poi-name"></span></div>
    </div>
  </div>
  <div class="justify-vertical-center" id="travel-container">
    <h5 class="font-w600 mb-0 font-size-base" id="travel-info"><lang-string lang-id="TRAVEL_COST"></lang-string></h5>
    <div class="justify-vertical-center font-w400" id="travel-costs"></div>
  </div>
</template>
<template id="map-mastery-menu-template">
  <div class="block block-themed block-transparent mb-3">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title" id="map-title"></h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="block-content block-content-full pb-0">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="font-w600 text-warning"><lang-string lang-id="WHAT_IS_HEX_MASTERY_TITLE"></lang-string></h3>
          <p class="font-w400"><lang-string lang-id="WHAT_IS_HEX_MASTERY_0_HTML" lang-html="true"></lang-string></p>
          <p class="font-w400"><lang-string lang-id="WHAT_IS_HEX_MASTERY_1_HTML" lang-html="true"></lang-string></p>
          <p class="font-w400"><lang-string lang-id="WHAT_IS_HEX_MASTERY_3_HTML" lang-html="true"></lang-string></p>
        </div>
        <div class="col-lg-6">
          <div id="hex-mastery-count"></div>
          <div id="mastery-container"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="map-mastery-bonus-template">
  <div class="col-12">
    <div class="block block-rounded-double bg-combat-inner-dark p-2 mb-2">
      <div class="media d-flex align-items-center push mb-0">
        <div class="mr-3">
          <h3 class="font-w700 text-danger mb-0" id="hex-count"></h3>
        </div>
        <div class="media-body">
          <div class="font-w600 font-size-sm justify-vertical-center text-center">
            <div id="modifier-container">
              <h5 class="mb-0"><lang-string lang-id="PASSIVE_BONUSES"></lang-string></h5>
              <div class="justify-vertical-center" id="modifier-list"></div>
            </div>
            <div id="reward-container">
              <h5 class="mb-0"><lang-string lang-id="TUTORIAL_MISC_2"></lang-string></h5>
              <div class="justify-horizontal-center" id="reward-list"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="poi-discovery-costs-template">
  <div class="dropdown-divider"></div>
  <h5 class="text-warning mb-2" id="info-text"></h5>
  <div class="row no-gutters">
    <requires-box class="col-6 mb-2 icon-size-32" id="costs-box"></requires-box>
    <haves-box class="col-6 mb-2 icon-size-32" id="haves-box"></haves-box>
  </div>
</template>
<!-- END CARTOGRAPHY Content --><!-- HARVESTING Content -->
<div class="content d-none" id="harvesting-container">
  <div class="skill-info">
    <skill-header data-skill-id="melvorItA:Harvesting"></skill-header>
  </div>
  <div class="row row-deck" id="harvesting-veins-container">
    <realm-select-menu class="col-12" data-skill-id="melvorItA:Harvesting"></realm-select-menu>
  </div>
  <!-- END HARVESTING -->
</div>
<!-- END HARVESTING Content --><!-- SHOP Content -->
<div class="content d-none p-0-mobile" id="shop-container">
  <!-- SHOP -->
  <div class="row gutters-tiny">
    <div class="col-12 sticky-div-mobile px-0-mobile">
      <div class="block block-rounded block-link-pop border-top border-shop border-4x">
          <div class="block-header text-center p-1 border-1x border-bottom border-white mb-0">
                <div class="col-12 p-0">
                    <ul class="nav-main nav-main-horizontal nav-main-horizontal-center nav-main-horizontal-override justify-content-center font-size-xs m-0">
                        <li>
                          <span class="p-2 bg-secondary text-white rounded m-1 js-tooltip-enabled" id="shop-current-gp" data-currency-tooltip="melvorD:GP" data-toggle="tooltip" data-html="true" data-placement="bottom" title="" data-original-title="0">
                              <img class="skill-icon-xs" data-src="assets/media/main/coins.png">
                              <span data-currency-quantity="melvorD:GP">0</span>
                          </span>
                        </li>
                        <li>
                          <span class="p-2 bg-secondary text-white rounded m-1 js-tooltip-enabled" id="shop-current-sc" data-currency-tooltip="melvorD:SlayerCoins" data-toggle="tooltip" data-html="true" data-placement="bottom" title="" data-original-title="0 Slayer Coins">
                              <img class="skill-icon-xs" data-src="assets/media/main/slayer_coins.png">
                              <span data-currency-quantity="melvorD:SlayerCoins">0</span>
                          </span>
                        </li>
                        <li>
                          <span class="p-2 bg-secondary text-white rounded m-1 js-tooltip-enabled d-none" id="shop-current-raid-coins" data-currency-tooltip="melvorD:RaidCoins" data-toggle="tooltip" data-html="true" data-placement="bottom" title="" data-original-title="0 Raid Coins"><img class="skill-icon-xs" data-src="assets/media/main/raid_coins.png">
                              <span data-currency-quantity="melvorD:RaidCoins">0</span>
                          </span>
                        </li>
                        <li class="expansion-3-show">
                          <span class="p-2 bg-secondary text-white rounded m-1 js-tooltip-enabled" id="shop-current-ap" data-currency-tooltip="melvorItA:AbyssalPieces" data-toggle="tooltip" data-html="true" data-placement="bottom" title="" data-original-title="0 Abyssal Pieces">
                              <img class="skill-icon-xs" data-src="assets/media/main/abyssal_pieces.png">
                              <span data-currency-quantity="melvorItA:AbyssalPieces">0</span>
                          </span>
                        </li>
                        <li class="expansion-3-show">
                          <span class="p-2 bg-secondary text-white rounded m-1 js-tooltip-enabled" id="shop-current-asc" data-currency-tooltip="melvorItA:AbyssalSlayerCoins" data-toggle="tooltip" data-html="true" data-placement="bottom" title="">
                              <img class="skill-icon-xs" data-src="assets/media/main/abyssal_slayer_coins.png">
                              <span data-currency-quantity="melvorItA:AbyssalSlayerCoins">0</span>
                          </span>
                        </li>
                    </ul>
                </div>
          </div>
          <div class="bg-white p-1 push border-1x border-bottom border-white">
                <!-- Toggle Navigation -->
                <div class="d-lg-none">
                    <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                    <button type="button" class="btn btn-block btn-light d-flex justify-content-between align-items-center text-combat-smoke" data-toggle="class-toggle" data-target="#horizontal-navigation-shop" data-class="d-none">
                        <lang-string lang-id="MENU_TEXT_SELECT_SHOP_CATEGORY"></lang-string>
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <!-- END Toggle Navigation -->

                <!-- Navigation -->
                <div id="horizontal-navigation-shop" class="d-none d-lg-block mt-2 mt-lg-0">
                    <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center" id="shop-tab-container">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" onClick="shopMenu.showAllTabsButRaid();">
                                <span class="nav-main-link-name"><lang-string lang-id="SHOP_MISC_0"></lang-string></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Navigation -->
          </div>
      </div>
    </div>
    <div class="col-12 px-1-mobile" id="new-shop"></div>
  </div>
  <!-- END SHOP -->
</div>
<!-- END SHOP Content --><!-- BANK Content -->
<template id="bank-item-icon-template">
  <a class="" role="button" id="link">
    <img class="bank-img p-3" id="image">
    <div class="font-size-sm text-white text-center in-bank">
      <small class="badge-pill bg-secondary" id="quantity">0</small>
    </div>
    <div style="position: absolute;top: -2px;left: 4px;width: 64px;">
      <img class="skill-icon-xxs m-0 d-none" id="has-damage-type" data-src="assets/media/main/question.png"><img class="skill-icon-xxs m-0 d-none" id="has-upgrade" data-src="assets/media/main/upgrade.png"><img class="skill-icon-xxs m-0 d-none" id="has-downgrade" data-src="assets/media/main/downgrade.png">
    </div>
  </a>
</template>
<template id="bank-tab-menu-tab-template">
  <li class="nav-item pointer-enabled" id="tab-main">
    <a class="nav-link p-2" id="tab-link" style="pointer-events: none;"><img class="skill-icon-xs m-1" id="tab-image"
        data-src="assets/media/skills/combat/food_empty.png"></a>
  </li>
</template>
<template id="bank-tab-menu-pane-template">
  <div class="tab-pane" id="pane" role="tabpanel">
    <div id="item-container" class="row pb-4"></div>
  </div>
</template>
<template id="bank-tab-menu-template">
  <div class="block tabbable">
    <ul class="nav nav-tabs nav-tabs-block sticky-div-mobile" data-toggle="tabs" role="tablist" id="tab-container"></ul>
    <div class="pl-3 pt-1 pb-1 bg-dark-bank-info text-center">
      <div class="row gutters-tiny">
        <div class="col-6 col-lg-3">
          <span class="font-w400 font-size-sm mb-0">
            <span class="font-w600" id="space-fraction-label"></span><span class="bank-space-nav" id="space-fraction">0
              / 12</span>
          </span>
        </div>
        <div class="col-6 col-lg-3">
          <span class="font-w400 font-size-sm mb-0 ml-3">
            <span class="font-w600">
              <lang-string lang-id="BANK:"></lang-string>
              <span id="bank-value-label"></span>
            </span>
          </span>
        </div>
        <div class="col-6 col-lg-3">
          <span class="ml-3 font-w400 font-size-sm mb-0"><span class="font-w600">
              <lang-string lang-id="TAB:"></lang-string>
              <span id="tab-value-label"></span>
          </span>
          </span>
        </div>
        <div class="col-6 col-lg-3">
          <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle ml-2 p-1" id="bank-tab-dropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-right font-size-sm" aria-labelledby="dropdown-align-primary"
            style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(77px, 38px, 0px);"
            x-placement="bottom-end">
            <a class="dropdown-item pointer-enabled" id="sell-all-button"><img class="skill-icon-xxs mr-1"
                data-src="assets/media/main/coins.png"><span id="sell-all-text"></span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item pointer-enabled" id="unlock-all-button"><i
                class="fa fa-unlock text-success mr-1"></i><span id="unlock-all-text"></span></a>
            <a class="dropdown-item pointer-enabled" id="lock-all-button"><i
                class="fa fa-lock text-danger mr-1"></i><span id="lock-all-text"></span></a>
          </div>
        </div>
      </div>
    </div>
    <div class="block-content tab-content" id="pane-container" style="min-height: 400px;"></div>
  </div>
</template>
<template id="bank-options-menu-template">
  <div class="block block-rounded block-link-pop border-top border-bank border-4x">
    <div class="row row-deck gutters-tiny">
      <div class="col-12 col-md-6">
        <div class="p-3">
          <button type="button" class="btn btn-info m-1" id="sort-button">
            <lang-string lang-id="BANK_STRING_2"></lang-string>
          </button>
          <button type="button" class="btn btn-secondary m-1" id="move-mode-button">
            <lang-string lang-id="BANK_STRING_3"></lang-string>
          </button>
          <button type="button" class="btn btn-danger m-1" id="sell-mode-button">
            <lang-string lang-id="BANK_STRING_4"></lang-string>
          </button>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group col-12 mb-0">
          <div class="p-3">
            <div class="input-group">
              <input type="text" class="form-control placeholder-search-bank" id="searchTextbox" name="searchTextbox"
                placeholder="Search Bank...">
              <div class="input-group-append">
                <button type="button" class="btn btn-danger" id="clear-search-button">X</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="bank-tab-dropdown-menu-option-template">
  <a class="dropdown-item pointer-enabled" id="link"><img class="skill-icon-xs mr-2" id="image"> <span
      id="tab-number"></span></a>
</template>
<template id="bank-tab-dropdown-menu-template">
  <button type="button" class="btn btn-secondary dropdown-toggle mt-2 mr-2" id="open-dropdown-button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <lang-string lang-id="MENU_TEXT_SELECT_TAB"></lang-string>
  </button>
  <div class="dropdown-menu font-size-sm overflow-y-auto" aria-labelledby="dropdown-default-secondary"
    style="max-height: 60vh; z-index: 9999;" id="dropdown-options"></div>
</template>
<template id="bank-move-mode-menu-template">
  <div class="row no-gutters" style="width:100%;">
    <div class="col-12">
      <div class="alert alert-secondary d-flex align-items-center m-0" role="alert">
        <div class="flex-00-auto">
          <i class="fa fa-fw fa-info-circle"></i>
        </div>
        <div class="flex-fill ml-3">
          <p class="mb-0">
            <lang-string lang-id="MENU_TEXT_MOVE_ITEM_MODE_ACTIVE"></lang-string>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-content">
        <h5 class="font-w400 font-size-sm text-combat-smoke">
          <bank-tab-dropdown-menu id="tab-selection"></bank-tab-dropdown-menu>
          <button role="button" class="btn btn-primary m-1" id="confirm-move-button">
            <lang-string lang-id="MENU_TEXT_CONFIRM_MOVE"></lang-string>
          </button>
          <span id="item-selection-count"></span>
        </h5>
      </div>
    </div>
  </div>
</template>
<template id="bank-sell-mode-menu-template">
  <div class="row no-gutters" style="width:100%;">
    <div class="col-12">
      <div class="alert alert-danger d-flex align-items-center m-0" role="alert">
        <div class="flex-00-auto">
          <i class="fa fa-fw fa-info-circle"></i>
        </div>
        <div class="flex-fill ml-3">
          <p class="mb-0">
            <lang-string lang-id="MENU_TEXT_SELL_MODE_ACTIVE"></lang-string>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-content">
        <h5 class="font-w400 font-size-sm text-combat-smoke">
          <button role="button" class="btn btn-danger m-1" id="confirm-sell-button">
            <lang-string lang-id="MENU_TEXT_CONFIRM_SALE"></lang-string>
          </button>
          <span id="selection-count"></span> - <lang-string lang-id="SELLS_FOR"></lang-string><span id="selection-value"></span>
        </h5>
      </div>
    </div>
  </div>
</template>
<template id="bank-selected-item-menu-template">
  <!-- Non Sidebar Version -->
  <div class="col-12" id="none-selected-message">
    <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
      <lang-string lang-id="MENU_TEXT_NONE_SELECTED"></lang-string>
    </div>
  </div>
  <div class="row row-deck gutters-tiny d-none" id="selected-item-container">
    <div class="col-4">
      <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
        <img class="bank-img-detail" id="item-image">
        <div style="position:absolute;left:3px;top:0px;">
          <button class="btn btn-sm btn-secondary" id="item-lock-button">
            <i class="fa fa-lock text-danger" id="item-lock-icon"></i>
          </button>
        </div>
        <div style="position:absolute;left:0;bottom:10px;width:100%;">
          <small class="font-size-xs badge-pill bg-secondary m-1 bank-item-qty text-white" id="quantity-badge">-</small>
          <small class="font-size-xs badge-pill bg-primary m-1 d-none" id="handedness-badge"></small>
        </div>
      </div>
    </div>
    <div class="col-8">
      <div class="block block-rounded-double bg-combat-inner-dark p-2">
        <h5 class="font-w700 text-left text-combat-smoke m-1">
          <span id="item-name">-</span>
          <button id="item-wiki-link" class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2">
            <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xxs">
          </button>
        </h5>
        <h5 class="font-w400 font-size-sm text-left m-1 mb-2 d-none" id="item-consumable"><small class="badge bg-primary"><lang-string lang-id="EQUIP_SLOT_Consumable"></lang-string></small></h5>
        <h5 class="font-w400 font-size-sm text-left text-bank-desc m-1 mb-2"><small id="item-description">-</small></h5>
        <h5 class="font-w400 font-size-sm text-left text-combat-smoke m-1 mb-2 d-none" id="item-healing"></h5>
        <h5 class="font-w400 font-size-sm text-left combat-action m-1 mb-2 pointer-enabled" id="view-stats-button">
          <lang-string lang-id="BANK_STRING_34"></lang-string>
        </h5>
      </div>
    </div>
    <div class="col-12" id="special-attack-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
              <img class="skill-icon-xs mr-1" data-src="assets/media/main/special_attack.png">
              <lang-string lang-id="BANK_STRING_37"></lang-string>
          </h5>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12" id="special-attack-list">
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="upgrade-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
            <img class="skill-icon-xs mr-1" id="upgrade-icon" data-src="assets/media/main/upgrade.png">
            <img class="skill-icon-xs mr-1 d-none" id="downgrade-icon" data-src="assets/media/main/downgrade.png">
            <span id="upgrade-text"><lang-string lang-id="BANK_STRING_32"></lang-string></span>
          </h5>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12 text-center">
            <button role="button" class="btn btn-warning" id="upgrade-button">
              <lang-string lang-id="BANK_STRING_32"></lang-string>
            </button>
            <button type="button" class="btn btn-warning dropdown-toggle" id="upgrade-dropdown-button"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <lang-string lang-id="BANK_STRING_32"></lang-string>
            </button>
            <div class="dropdown-menu font-size-sm" id="upgrade-options-container"
              aria-labelledby="dropdown-default-secondary">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="read-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
              <lang-string lang-id="BANK_STRING_33"></lang-string>
          </h5>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12 text-center">
            <button role="button" class="btn btn-warning" id="read-button">
              <lang-string lang-id="BANK_STRING_33"></lang-string>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="friend-container">
      <div class="block block-rounded-double bg-combat-inner-dark p-3">
        <div class="row no-gutters">
          <div class="col-12 text-right">
            <button role="button" class="btn btn-warning" id="find-friend-button"><lang-string
                lang-id="BANK_STRING_FIND_A_FRIEND"></lang-string></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="equip-item-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1" id="size-elem-0">
          <h5 class="font-size-sm font-w600 mb-0">
            <lang-string lang-id="BANK_STRING_27"></lang-string>
          </h5>
          <div class="block-options" id="size-elem-1">
            <h5 class="font-w600 font-size-sm text-right text-combat-smoke mb-0">
              <img class="skill-icon-xxs mr-2" id="equip-slot-image"><span id="equip-slot-name"></span>
            </h5>
          </div>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12">
            <div class="row gutters-tiny">
              <div class="col-12" id="size-elem-2">
                <h5 class="font-w400 font-size-xs text-combat-smoke m-1 text-center">
                  <lang-string lang-id="BANK_STRING_28"></lang-string>
                </h5>
                <div class="btn-group w-100 text-center" id="equip-set-button-container"></div>
              </div>
              <div class="col-12" id="size-elem-3">
              </div>
              <div class="col-12 mt-1" id="size-elem-4">
                <div class="form-group bank-rangeslider-equip-container" id="equip-quantity-slider-container">
                  <input type="text" class="js-rangeslider" id="equip-quantity-slider" name="bank-rangeslider-equip"
                    value="0" data-min="0" data-max="0">
                </div>
              </div>
              <div class="col-12 text-right" id="size-elem-5"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="equip-food-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
              <lang-string lang-id="BANK_STRING_25"></lang-string>
          </h5>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12 col-xl-8" id="size-elem-6">
            <div class="form-group">
              <input type="text" class="js-rangeslider" id="food-quantity-slider" name="bank-rangeslider-food" value="0"
                data-min="0" data-max="0">
            </div>
          </div>
          <div class="col-12 col-xl-4 text-right" id="size-elem-7">
            <button role="button" class="btn btn-sm btn-warning m-1" id="equip-food-button">
              <lang-string lang-id="BANK_STRING_25"></lang-string>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="open-item-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
              <lang-string lang-id="BANK_STRING_35"></lang-string>
          </h5>
          <div class="block-options">
            <a class="font-w400 font-size-sm text-right combat-action pointer-enabled" id="view-chest-contents-button">
              <lang-string lang-id="BANK_STRING_36"></lang-string>
            </a>
          </div>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12 col-xl-8" id="size-elem-8">
            <div class="form-group">
              <input type="text" class="js-rangeslider" id="open-item-quantity-slider" name="bank-rangeslider-open"
                value="0" data-min="0" data-max="0">
            </div>
          </div>
          <div class="col-12 col-xl-4 text-right" id="size-elem-9">
            <button role="button" class="btn btn-sm btn-warning m-1" id="open-item-button">
              <lang-string lang-id="BANK_STRING_35"></lang-string>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="bury-item-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0" id="bury-item-header"></h5>
          <div class="block-options">
            <h5 class="font-w400 font-size-sm text-right text-combat-smoke mb-0" id="bury-item-prayer-points"></h5>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-12 col-xl-8" id="size-elem-10">
            <div class="form-group">
              <input type="text" class="js-rangeslider" id="bury-item-quantity-slider" name="bank-rangeslider-bury"
                value="0" data-min="0" data-max="0">
            </div>
          </div>
          <div class="col-12 col-xl-4 text-right" id="size-elem-11">
            <button role="button" class="btn btn-sm btn-warning m-1" id="bury-item-button">
              <lang-string lang-id="MENU_TEXT_BURY_ITEM"></lang-string>
            </button>
          </div>
          <div class="col-12 text-right">
            <h5 class="font-w400 font-size-sm text-combat-smoke m-1 mb-2" id="bury-item-total-points"></h5>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="claim-token-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
              <lang-string lang-id="BANK_STRING_31"></lang-string>
          </h5>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12 col-xl-8" id="size-elem-12">
            <div class="form-group">
              <input type="text" class="js-rangeslider" id="claim-token-quantity-slider" name="bank-rangeslider-claim"
                value="0" data-min="0" data-max="0">
            </div>
          </div>
          <div class="col-12 col-xl-4 text-right" id="size-elem-13">
            <button role="button" class="btn btn-sm btn-warning m-1" id="claim-token-button">
              <lang-string lang-id="BANK_STRING_31"></lang-string>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12" id="use-eight-container">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
              <lang-string lang-id="BANK_STRING_USE_ITEM"></lang-string>
          </h5>
        </div>
        <div class="row no-gutters p-2">
          <div class="col-12 text-center">
            <button role="button" class="btn btn-sm btn-warning" id="use-eight-button"><lang-string lang-id="BANK_STRING_USE_ITEM"></lang-string></button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark">
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1">
          <h5 class="font-size-sm font-w600 mb-0">
            <lang-string lang-id="BANK_STRING_22"></lang-string>
          </h5>
          <div class="block-options">
            <span class="font-w600 font-size-sm text-right text-combat-smoke" id="single-item-sale-price"></span>
          </div>
        </div>
        <div class="col-12 pt-2">
          <div class="form-group">
            <input type="text" class="js-rangeslider" id="sell-item-quantity-slider" name="bank-rangeslider-sell"
              value="0" data-min="0" data-max="0">
          </div>
          <div class="row no-gutters">
            <div class="col-12 col-xl-5" id="size-elem-14">
              <input type="number" min="0" class="form-control m-1" id="custom-sell-quantity" name="bank-sell-x" placeholder="Sell x">
            </div>
            <div class="col-12 col-xl-7 text-right" id="size-elem-15">
              <button role="button" class="btn btn-info m-1" id="sell-all-but-one-button">
                <lang-string lang-id="BANK_STRING_21"></lang-string>
              </button>
              <button role="button" class="btn btn-info m-1" id="sell-all-button">
                <lang-string lang-id="BANK_STRING_20"></lang-string>
              </button>
            </div>
            <div class="col-12">
              <div class="dropdown-divider"></div>
            </div>
            <div class="col-12 text-center">
              <button role="button" class="btn btn-danger m-1 w-75" id="sell-item-button">
                <lang-string lang-id="BANK_STRING_22"></lang-string>
              </button><br>
            </div>
          </div>
        </div>
        <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 text-center">
          <h5 class="font-w600 font-size-sm text-combat-smoke m-1 w-100">
            <img class="skill-icon-xxs ml-1 mr-1" id="total-sale-price-image" data-src="assets/media/main/coins.png">
            <span id="total-item-sale-price">0</span>
          </h5>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="bank-item-stats-menu-template">
  <div class="row row-deck gutters-tiny d-none" id="selected-item-container">
    <div class="col-4">
      <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
        <img class="bank-img-detail" id="item-image">
        <div style="position:absolute;left:3px;top:0px;"><button class="btn btn-sm btn-secondary"
            id="item-lock-button"><i class="fa fa-lock text-danger" id="item-lock-icon"></i></button></div>
      </div>
    </div>
    <div class="col-8">
      <div class="block block-rounded-double bg-combat-inner-dark p-3">
        <h5 class="font-w700 text-left text-combat-smoke m-1" id="item-name"></h5>
        <small class="badge-pill bg-secondary text-white" id="quantity-badge"></small>
        <h5 class="font-w400 font-size-sm text-left m-1 mb-2 d-none" id="item-consumable"><small class="badge bg-primary"><lang-string lang-id="EQUIP_SLOT_Consumable"></lang-string></small></h5>
        <h5 class="font-w400 font-size-sm text-left text-bank-desc m-1 mb-2" id="item-description"></h5>
        <h5 class="font-w400 font-size-sm text-left text-combat-smoke m-1 mb-2 d-none" id="item-healing"></h5>
        <h5 class="font-w400 font-size-sm text-left combat-action m-1 mb-2 pointer-enabled" id="view-stats-button">
          <lang-string lang-id="BANK_STRING_34"></lang-string>
        </h5>
      </div>
    </div>
    <div class="col-12">
      <div class="block block-rounded-double bg-combat-inner-dark p-3">
        <div class="row no-gutters">
          <div class="col-12">
            <h5 class="font-w700 text-left text-combat-smoke m-1 mb-2">
              <lang-string lang-id="BANK_STRING_19"></lang-string>
            </h5>
          </div>
          <div class="col-12" id="stats-container"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<template id="bank-item-settings-menu-template">
  <div class="row row-deck gutters-tiny d-none" id="selected-item-container">
    <div class="col-12 pl-1">
      <h5 class="font-w700 text-left text-combat-smoke m-1">
        <lang-string lang-id="BANK_STRING_6"></lang-string>
      </h5>
    </div>
    <div class="dropdown-divider w-100"></div>
    <div class="col-12">
      <div class="media d-flex align-items-center push">
        <div class="mr-2">
          <bank-tab-dropdown-menu id="select-tab-icon-dropdown"></bank-tab-dropdown-menu>
        </div>
        <div class="media-body text-left">
          <h5 class="font-w400 text-left text-combat-smoke m-1 mb-2">
            <span class="font-w400 font-size-sm text-left text-combat-smoke"><small>
                <lang-string lang-id="BANK_STRING_58"></lang-string>
              </small></span><br>
              <a class="font-size-xs font-w600 link-fx pointer-enabled" id="reset-tab-icon">Reset Tab Icon to default</a><!-- TODO_L -->
          </h5>
        </div>
      </div>
    </div>
    <div class="col-12 flex-column" id="minibar-settings-container">
      <div class="pl-1 pt-3">
        <h5 class="font-w700 text-left text-combat-smoke m-1">
          <lang-string lang-id="SETTINGS_CATEGORY_4"></lang-string>
        </h5>
      </div>
      <div class="dropdown-divider"></div>
      <div>
        <h5 class="font-w400 font-size-sm text-left text-combat-smoke m-1 mb-2"><small>
            <lang-string lang-id="BANK_STRING_60"></lang-string>
          </small></h5>
      </div>
      <div class="row gutters-tiny" id="minibar-settings-toggles">
      </div>
    </div>
    <div class="col-12 pl-1 pt-3">
      <h5 class="font-w700 text-left text-combat-smoke m-1">
        <lang-string lang-id="BANK_STRING_9"></lang-string>
      </h5>
    </div>
    <div class="dropdown-divider w-100"></div>
    <div class="col-12">
      <h5 class="font-w400 text-left text-combat-smoke m-1 mb-2">
        <settings-switch class="mb-2 pointer-enabled" data-setting-id="defaultToCurrentEquipSet"
          data-size="small"></settings-switch>
        <settings-switch class="mb-2 pointer-enabled" data-setting-id="useDefaultBankBorders"
          data-size="small"></settings-switch>
        <settings-switch class="mb-2 pointer-enabled" data-setting-id="enableScrollableBankTabs"
          data-size="small"></settings-switch>
        <settings-switch class="d-block mb-2 pointer-enabled" data-setting-id="enableStickyBankTabs"
          data-size="small"></settings-switch>
        <settings-switch class="d-block mb-2 pointer-enabled" data-setting-id="enableDoubleClickEquip"
          data-size="small"></settings-switch>
        <settings-switch class="d-block mb-2 pointer-enabled" data-setting-id="enableDoubleClickOpen"
          data-size="small"></settings-switch>
        <settings-switch class="d-block mb-4 pointer-enabled" data-setting-id="enableDoubleClickBury"
          data-size="small"></settings-switch>
        <settings-dropdown class="d-block mb-2" data-setting-id="bankSortOrder"></settings-dropdown>
      </h5>
    </div>
    <div class="col-12 pl-1 pt-3">
      <h5 class="font-w700 text-left text-combat-smoke m-1">
        <lang-string lang-id="BANK_STRING_54"></lang-string>
      </h5>
    </div>
    <div class="dropdown-divider w-100"></div>
    <div class="col-12 p-1">
      <div class="btn-group mb-2 w-100" role="group">
        <button role="button" class="btn btn-sm btn-success" id="unlock-all-button">
          <lang-string lang-id="BANK_STRING_47"></lang-string>
        </button>
        <button role="button" class="btn btn-sm btn-danger" id="lock-all-button">
          <lang-string lang-id="BANK_STRING_46"></lang-string>
        </button>
      </div>
    </div>
  </div>
</template>
<template id="bank-sidebar-menu-template">
  <ul class="nav nav-tabs nav-tabs-block" data-toggle="tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" href="#bank-selected-tab"><img class="skill-icon-xs m-1" id="item-image"
          data-src="assets/media/bank/logs_normal.png"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#bank-stats-tab"><img class="skill-icon-xs m-1"
          data-src="assets/media/main/statistics_header.png"></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#bank-settings-tab"><img class="skill-icon-xs m-1"
          data-src="assets/media/main/settings_header.png"></a>
    </li>
  </ul>
  <div class="p-3 tab-content" id="pane-container">
    <div class="tab-pane active" id="bank-selected-tab" role="tabpanel">
      <bank-selected-item-menu id="selected-menu"></bank-selected-item-menu>
    </div>
    <div class="tab-pane" id="bank-stats-tab" role="tabpanel">
      <bank-item-stats-menu id="stats-menu"></bank-item-stats-menu>
    </div>
    <div class="tab-pane" id="bank-settings-tab" role="tabpanel">
      <bank-item-settings-menu id="settings-menu"></bank-item-settings-menu>
    </div>
    <button role="button" class="btn btn-danger d-none" style="width:100%" id="sidebar-close-button"><lang-string
        lang-id="MENU_TEXT_CLOSE_MENU"></lang-string></button>
  </div>
</template>
<template id="bank-minibar-toggle-template">
  <div class="custom-control custom-switch mb-2">
    <input type="checkbox" class="custom-control-input pointer-enabled" id="skill-toggle" checked>
    <label class="custom-control-label pointer-enabled" id="skill-label"><img class="skill-icon-xs mr-1"
        id="skill-image"></label>
  </div>
</template>
<template id="item-upgrade-menu-template">
  <div class="block block-themed block-transparent mb-0">
    <div class="block-header bg-primary-dark">
      <h3 class="block-title upgrade-item-text">
        <img class="skill-icon-xs mr-1" id="upgrade-icon" data-src="assets/media/main/upgrade.png">
        <img class="skill-icon-xs mr- d-none" id="downgrade-icon" data-src="assets/media/main/downgrade.png">
        <lang-string lang-id="BANK_STRING_32"></lang-string>
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
          <i class="fa fa-fw fa-times"></i>
        </button>
      </div>
    </div>
    <div class="row row-deck">
      <div class="col-12 col-lg-6">
        <div class="block-content">
          <div class="block block-rounded-double bg-combat-inner-dark text-center p-1">
            <span class="font-w400 font-size-sm"><small class="upgrade-item-text">
                <lang-string lang-id="MENU_TEXT_UPGRADES_INTO"></lang-string>
              </small></span>
            <h5 class="font-w700 text-combat-smoke m-1 mb-2" id="item-name"></h5>
          </div>
          <div class="block block-rounded-double bg-combat-inner-dark text-center p-5">
            <img class="w-100" id="item-image"><br><br>
            <h5 class="font-w400 font-size-sm text-center m-1 mb-2 d-none" id="item-consumable"><small class="badge bg-primary"><lang-string lang-id="EQUIP_SLOT_Consumable"></lang-string></small></h5>
            <span id="item-description" class="font-size-sm text-info"></span>
          </div>
          <div id="special-attack-container"
            class="block block-rounded-double bg-combat-inner-dark text-center p-2 d-none">
            <h5 class="font-w700 text-left font-size-sm text-combat-smoke mb-1"><img class="skill-icon-xs mr-2"
                data-src="assets/media/main/special_attack.png">
              <lang-string lang-id="BANK_STRING_37"></lang-string>
            </h5>
            <div id="special-attack-list"></div>
          </div>
          <div id="equip-requirements" class="block block-rounded-double bg-combat-inner-dark text-center p-2">
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 d-none" id="no-stats-message">
        <div class="block-content">
          <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
            <span class="font-w700 text-combat-smoke m-1 mb-2">
              <lang-string lang-id="MENU_TEXT_NO_STATS"></lang-string>
            </span>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6" id="equipment-stats-container">
        <div class="block-content">
          <div class="block block-rounded-double bg-combat-inner-dark p-3">
            <h4 class="font-w700 text-combat-smoke m-1 mb-2">
              <lang-string lang-id="MENU_TEXT_OFFENSIVE_STATS_COMPARISON"></lang-string>
            </h4>
            <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
              <div class="col-12" id="attack-speed-container">
                <div class="row justify-horizontal-center">
                  <div class="col-7">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png">
                    <lang-string lang-id="EQUIPMENT_STAT_ATTACK_INTERVAL"></lang-string>
                  </div>
                  <div class="col-5">
                    <span class="font-w600" id="attack-speed"></span>
                    <span class="text-success" id="attack-speed-diff"></span>
                  </div>
                </div>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png">
                <lang-string lang-id="EQUIPMENT_STAT_STAB_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="stab-attack-bonus"></span> <span class="text-success" id="stab-attack-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png">
                <lang-string lang-id="EQUIPMENT_STAT_SLASH_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="slash-attack-bonus"></span>
                <span class="text-success" id="slash-attack-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png">
                <lang-string lang-id="EQUIPMENT_STAT_BLOCK_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="block-attack-bonus"></span>
                <span class="text-success" id="block-attack-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/strength/strength.png">
                <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="melee-strength-bonus"></span> <span class="text-success" id="melee-strength-bonus-diff"></span>
              </div>
            </div>
            <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png">
                <lang-string lang-id="EQUIPMENT_STAT_ATTACK_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="ranged-attack-bonus"></span> <span class="text-success" id="ranged-attack-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png">
                <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="ranged-strength-bonus"></span> <span class="text-success" id="ranged-strength-bonus-diff"></span>
              </div>
            </div>
            <div class="row font-w400 font-size-sm text-combat-smoke p-2 pb-0 justify-horizontal-center">
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png">
                <lang-string lang-id="EQUIPMENT_STAT_ATTACK_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="magic-attack-bonus"></span> <span class="text-success" id="magic-attack-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png">
                <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="magic-damage-bonus"></span> <span class="text-success" id="magic-damage-bonus-diff"></span>
              </div>
            </div>
            <div class="p-2" id="summoning-max-hit-container"></div>
          </div>
          <div class="block block-rounded-double bg-combat-inner-dark p-3">
            <h4 class="font-w700 text-combat-smoke m-1 mb-2">
              <lang-string lang-id="MENU_TEXT_DEFENSIVE_STATS_COMPARISON"></lang-string>
            </h4>
            <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/defence/defence.png">
                <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="melee-defence-bonus"></span>
                <span class="text-success" id="melee-defence-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png">
                <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="ranged-defence-bonus"></span>
                <span class="text-success" id="ranged-defence-bonus-diff"></span>
              </div>
              <div class="col-8">
                <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png">
                <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
              </div>
              <div class="col-4">
                <span class="font-w600" id="magic-defence-bonus"></span>
                <span class="text-success" id="magic-defence-bonus-diff"></span>
              </div>
            </div>
            <div id="resistances-container" class="p-2"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="block-content block-content-full text-center border-top">
      <div class="block block-rounded-double bg-combat-inner-dark p-1">
        <span class="d-none font-w700 text-combat-smoke mr-1" id="upgrade-mastery-requirement">
          <lang-string lang-id="MENU_TEXT_REQUIRES"></lang-string> <img class="skill-icon-xs ml-2 mastery-icon"
            data-src="assets/media/main/mastery_header.png">
            <span class="ml-1 mr-2" id="upgrade-mastery-level"></span>
        </span>
        <span class="font-w700 text-combat-smoke mr-1">
          <lang-string lang-id="MENU_TEXT_COST"></lang-string>
        </span>
        <span class="font-w600" id="currency-costs"></span>
        <span class="ml-2 font-w600" id="item-costs"></span>
      </div>
      <small class="upgrade-item-text d-none">
        <img class="skill-icon-xs mr-1" data-src="assets/media/main/upgrade.png"><lang-string lang-id="BANK_STRING_32"></lang-string>
      </small>
      <button type="button" id="upgrade-1-button" class="btn btn-success d-none" data-dismiss="modal">x1</button>
      <button type="button" id="upgrade-10-button" class="btn btn-success d-none" data-dismiss="modal">x10</button>
      <button type="button" id="upgrade-100-button" class="btn btn-success d-none" data-dismiss="modal">x100</button>
      <button type="button" id="upgrade-1000-button" class="btn btn-success d-none" data-dismiss="modal">x1,000</button>
      <button type="button" id="upgrade-all-button" class="btn btn-success d-none" data-dismiss="modal">
        <lang-string lang-id="BANK_STRING_20"></lang-string>
      </button>
      <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">
        <lang-string lang-id="FARMING_MISC_24"></lang-string>
      </button>
    </div>
  </div>
</template>
<div class="content d-none" id="bank-container" style="padding-bottom:120px;">
  <!-- BANK -->
  <div class="row row-deck gutters-tiny">
    <bank-options-menu class="col-12" id="main-bank-options"></bank-options-menu>
    <bank-move-mode-menu class="col-12 d-none" id="main-bank-move-mode"></bank-move-mode-menu>
    <bank-sell-mode-menu class="col-12 d-none" id="main-bank-sell-mode"></bank-sell-mode-menu>
    <bank-tab-menu class="col-12 col-lg-7 col-xl-8" id="bank-tab-menu"></bank-tab-menu>
    <div class="col-12 col-lg-5 col-xl-4">
      <div class="block position-sticky" id="bank-item-box" , style="top: 0">
        <bank-sidebar-menu id="main-bank-sidebar"></bank-sidebar-menu>
      </div>
    </div>
  </div>
  <!-- END BANK -->

</div>
<!-- END BANK Content --><!-- STATISTICS Content -->
<template id="stat-table-template">
  <div class="block block-rounded block-link-pop border-top border-settings border-4x" id="stats-table-border">
    <div class="block-header">
      <h3 class="block-title" id="stats-table-title">General</h3>
    </div>
    <div class="block-content">
      <table class="table table-sm table-vcenter stat-table">
        <colgroup>
          <col>
          <col>
        </colgroup>
        <thead>
          <tr>
            <th class="text-right"><lang-string lang-id="STATISTICS_STATISTIC"></lang-string></th>
            <th class="text-center">#</th>
          </tr>
        </thead>
        <tbody id="stats-table-body">
        </tbody>
      </table>
    </div>
  </div>
</template>
<template id="stats-table-row-template">
  <tr>
    <td class="font-w600 font-size-sm text-right" id="stat-name"></td>
    <th class="text-right" scope="row" id="stat-value"></th>
  </tr>
</template>
<div class="content d-none" id="statistics-container">
  <div class="row">
    <category-menu class="col-12" id="stats-category-menu"></category-menu>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3" id="general-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="combat-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="woodcutting-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="fishing-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="firemaking-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="cooking-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="mining-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="smithing-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="thieving-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="farming-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="fletching-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="crafting-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="runecrafting-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="herblore-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="melee-combat-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="ranged-combat-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="magic-combat-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="agility-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="summoning-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="alt-magic-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="astrology-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="shop-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="slayer-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="prayer-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="township-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="archaeology-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="cartography-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="corruption-stats-table"></stat-table>
    <stat-table class="col-12 col-lg-10 col-xl-8 col-xxl-6 offset-lg-1 offset-xl-2 offset-xxl-3 d-none" id="harvesting-stats-table"></stat-table>
  </div>
</div>
<!-- END STATISTICS Content --><div class="content d-none" id="settings-container">

  <div class="row row-deck">


    <div class="col-md-12">
      <div class="block block-rounded block-link-pop border-top border-settings border-4x">
        <div class="block-content">
          <h2 class="content-heading border-bottom mb-4 pb-2 expansion-3-show d-none">Into the Abyss</h2>
          <div class="row expansion-3-show d-none">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="enablePermaCorruption" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showAPNextToShopSidebar" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showASCNextToSlayerSidebar" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showSPNextToPrayerSidebar" data-size="large">
</settings-switch>              <settings-dropdown class="d-block mb-4" data-setting-id="sidebarLevels"></settings-dropdown>
            </div>
          </div>
          <h2 class="content-heading border-bottom mb-4 pb-2 expansion-2-show d-none">Atlas of Discovery</h2>
          <div class="row expansion-2-show d-none">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="disableHexGridOutsideSight" data-size="large">
</settings-switch>              <settings-dropdown class="d-block mb-4" data-setting-id="mapTextureQuality"></settings-dropdown>
              <settings-switch class="mb-4" data-setting-id="enableMapAntialiasing" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="throttleFrameRateOnInactivity" data-size="large">
</settings-switch>              <settings-dropdown class="d-block mb-4" data-setting-id="cartographyFrameRateCap"></settings-dropdown>
              <settings-switch class="mb-4" data-setting-id="useCat" data-size="large">
</settings-switch>            </div>
          </div>
          <h2 class="content-heading border-bottom mb-4 pb-2"><lang-string lang-id="SETTINGS_CATEGORY_0"></lang-string></h2>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="enableOfflineCombat" data-size="large">
</settings-switch>              <settings-dropdown class="d-block mb-4" data-setting-id="showNeutralAttackModifiers"></settings-dropdown>
            </div>
          </div>
          <!-- Large Size -->
          <h2 class="content-heading border-bottom mb-4 pb-2">
            <lang-string lang-id="SETTINGS_CATEGORY_1"></lang-string>
          </h2>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="continueIfBankFull" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="continueThievingOnStun" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="autoRestartDungeon" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showVirtualLevels" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="enablePerfectCooking" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showWikiLinks" data-size="large">
</settings-switch>              <div class="expansion-1-show"><settings-switch class="mb-4" data-setting-id="enableEyebleachMode" data-size="large">
</settings-switch></div>
              <!--<settings-switch class="mb-4" data-setting-id="showEnemySkillLevels" data-size="large">
</settings-switch>-->
            </div>
          </div>
          <!-- END Large Size -->

          <!-- Notification Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2">
            <lang-string lang-id="SETTINGS_CATEGORY_2"></lang-string>
          </h2>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="useLegacyNotifications" data-size="large">
</settings-switch>              <div role="separator" class="dropdown-divider mb-4"></div>
              <settings-dropdown class="mb-4 d-block" data-setting-id="notificationHorizontalPosition"></settings-dropdown>
              <settings-dropdown class="mb-4 d-block" data-setting-id="notificationDisappearDelay"></settings-dropdown>
              <settings-switch class="mb-4" data-setting-id="showItemNamesInNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="importanceSummoningMarkFound" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="importanceErrorMessages" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showSkillXPNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4 expansion-3-show" data-setting-id="showAbyssalXPNotifications" data-size="large"></settings-switch>
              <settings-switch class="mb-4" data-setting-id="useCompactNotifications" data-size="large">
</settings-switch>              <div role="separator" class="dropdown-divider mb-4"></div>
              <settings-switch class="mb-4" data-setting-id="showSaleConfirmations" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showShopConfirmations" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showItemNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showQuantityInItemNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showGPNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showSlayerCoinNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4 expansion-3-show" data-setting-id="showAbyssalPiecesNotifications" data-size="large"></settings-switch>
              <settings-switch class="mb-4 expansion-3-show" data-setting-id="showAbyssalSlayerCoinNotifications" data-size="large"></settings-switch>
              <settings-switch class="mb-4" data-setting-id="showItemPreservationNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showMasteryCheckpointconfirmations" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showCombatStunNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showCombatSleepNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showSummoningMarkDiscoveryModals" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showCropDestructionConfirmations" data-size="large">
</settings-switch>                          </div>
          </div>
          <!-- Push Notification Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2 d-none">
            <lang-string lang-id="SETTINGS_CATEGORY_3"></lang-string>
          </h2>
          <div class="row d-none">
            <div class="col-md-6 offset-md-3">
                            <settings-switch class="mb-4" data-setting-id="enableFarmingPushNotifications" data-size="large">
</settings-switch>              <div class="form-inline mb-4 flex-wrap-reverse">
                <button role="button" id="settings-pushNotification-connect-btn" class="btn btn-sm btn-primary" onClick="connectDevicePushNotifications();">
                  <lang-string lang-id="SETTINGS_SETTING_3_4"></lang-string>
                </button>
                <span class="font-w700 font-size-sm text-danger ml-2 d-none" id="settings-pushNotification-connect-error"></span>
                <span class="font-w700 font-size-sm text-success ml-2 d-none" id="settings-pushNotification-connect-success"></span>
                <button role="button" id="settings-pushNotification-disconnect-btn" class="btn btn-sm btn-danger ml-3 d-none" onClick="disconnectDevicePushNotifications();">
                  <lang-string lang-id="CHARACTER_SELECT_85"></lang-string>
                </button>
                <p class="font-size-sm text-muted ml-2 mb-1">
                  <lang-string lang-id="SETTINGS_SETTING_3_2"></lang-string><br><small id="setting-3-3"></small>
                </p>
              </div>
            </div>
          </div>

          <!-- Minibar Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2">
            <lang-string lang-id="SETTINGS_CATEGORY_4"></lang-string>
          </h2>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="showSkillingMinibar" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showCombatMinibar" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showCombatMinibarCombat" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showEquipmentSetsInCombatMinibar" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showBarsInCombatMinibar" data-size="large">
</settings-switch>            </div>
          </div>
          <span id="settings-cloud-options"></span>
          <!-- Steam Settings -->
                      <h2 class="content-heading border-bottom mb-4 pb-2">
              <lang-string lang-id="SETTINGS_CATEGORY_8"></lang-string>
            </h2>
            <div class="row d-none">
              <div class="col-md-6 offset-md-3">
                <settings-switch class="mb-4" data-setting-id="toggleDiscordRPC" data-size="large">
</settings-switch>              </div>
            </div>
            <div class="row push">
              <div class="col-12 col-lg-4">
                <p class="font-size-sm text-muted">
                  <lang-string lang-id="SETTINGS_SETTING_8_0"></lang-string>
                </p>
              </div>
              <div class="col-12 col-lg-8">
                <div class="form-group">
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(-1);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_0"></lang-string>
                  </button>
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(-0.66);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_1"></lang-string>
                  </button>
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(-0.33);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_2"></lang-string>
                  </button>
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(0);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_3"></lang-string>
                  </button>
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(0.33);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_4"></lang-string>
                  </button>
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(0.66);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_5"></lang-string>
                  </button>
                  <button role="button" class="btn btn-primary m-1" onClick="adjustZoom(1);">
                    <lang-string lang-id="SETTINGS_SETTING_8_0_6"></lang-string>
                  </button>
                </div>
              </div>
              <div class="col-12 col-lg-4">
                <p class="font-size-sm text-muted">
                  <lang-string lang-id="SETTINGS_SETTING_8_1"></lang-string>
                </p>
              </div>
              <div class="col-12 col-lg-8">
                <button type="button" class="btn btn-sm btn-primary m-1 col-md-3" onClick="toggleFullScreen();">

                  <lang-string lang-id="SETTINGS_SETTING_8_1_0"></lang-string>
                </button>
              </div>
            </div>
                    <!-- Interface Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2">
            <lang-string lang-id="SETTINGS_CATEGORY_5"></lang-string>
          </h2>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="darkMode" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="superDarkMode" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showExpansionBackgroundColours" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="showCombatAreaWarnings" data-size="large">
</settings-switch>              <settings-dropdown class="d-block mb-4" data-setting-id="backgroundImage"></settings-dropdown>
              <settings-dropdown class="d-block mb-4" data-setting-id="defaultPageOnLoad"></settings-dropdown>
              <settings-switch class="mb-4" data-setting-id="useSmallLevelUpNotifications" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="enableMiniSidebar" data-size="large">
</settings-switch>              <settings-dropdown class="d-block mb-4" data-setting-id="formatNumberSetting"></settings-dropdown>
              <settings-dropdown class="mb-4 d-none" data-setting-id="colourBlindMode"></settings-dropdown>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="hideThousandsSeperator" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="enableAccessibility" data-size="large">
</settings-switch>            </div>
          </div>
          <!-- END Interface Settings -->
          <!-- Keybind Settings -->
          <div class="d-none browser-only" id="key-bindings-container">
            <h2 class="content-heading border-bottom mb-4 pb-2">
              <lang-string lang-id="KEY_BINDINGS"></lang-string>
            </h2>
            <div class="justify-vertical-center" id="key-bindings-list">
              <div class="row w-80 mb-2 text-center font-w400 border-bottom">
                <div class="col-4">
                  <h5 class="mb-0"><lang-string lang-id="COMMAND"></lang-string></h5>
                </div>
                <div class="col-4">
                  <h5 class="mb-0"><lang-string lang-id="KEY_1"></lang-string></h5>
                </div>
                <div class="col-4">
                  <h5 class="mb-0"><lang-string lang-id="KEY_2"></lang-string></h5>
                </div>  
              </div>
            </div>
          </div>
          <!-- END Keybind Settings -->
          <!-- Performance Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2">
            <lang-string lang-id="SETTINGS_CATEGORY_6"></lang-string>
          </h2>
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <settings-switch class="mb-4" data-setting-id="enableCombatDamageSplashes" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="enableProgressBars" data-size="large">
</settings-switch>              <settings-switch class="mb-4" data-setting-id="pauseOnUnfocus" data-size="large">
</settings-switch>            </div>
          </div>
          <!-- END Performance Settings -->
          <!-- Account Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2">
            <lang-string lang-id="SETTINGS_CATEGORY_7"></lang-string>
          </h2>

          <div class="row push">
            <div class="col-12 col-lg-4">
              <p class="font-size-sm text-muted">
                <lang-string lang-id="SETTINGS_SETTING_7_0"></lang-string>
              </p>
            </div>
            <div class="col-12 col-lg-8 row">
              <button type="button" class="btn btn-sm btn-secondary m-1 col-md-3" onclick="saveData(); createSaveShareLink(currentCharacter);">
                <i class="fa fa-share-square mr-1"></i><lang-string lang-id="MENU_TEXT_CREATE_SAVE_LINK"></lang-string>
              </button>
              <button type="button" class="btn btn-sm btn-primary m-1 col-md-3" onclick="saveData(); openExportSave(currentCharacter);">
                <i class="fa fa-file-export mr-1"></i><lang-string lang-id="CHARACTER_SELECT_37"></lang-string>
              </button>
              <button type="button" class="btn btn-sm btn-warning m-1 col-md-3 d-none browser-only" onclick="saveData(); downloadSave()">
                <i class="fa fa-file-download mr-1"></i><lang-string lang-id="CHARACTER_SELECT_36"></lang-string>
              </button>
            </div>
          </div>

          <div class="row push">
            <div class="col-12 col-lg-4">
              <p class="font-size-sm text-muted" data-toggle="tooltip" data-html="true" data-placement="bottom" title="" data-original-title="Completely removes your progress, resetting everything back to 0. Basically a new account.">
                <lang-string lang-id="SETTINGS_SETTING_7_1"></lang-string>
              </p>
            </div>
            <div class="col-12 col-lg-8">
              <button type="button" class="btn btn-sm btn-danger m-1" onClick="accountDeletion();">
                <i class="fa fa-fw fa-times mr-1"></i>
                <lang-string lang-id="SETTINGS_SETTING_7_3"></lang-string>
              </button>
            </div>
            <div class="col-12 col-lg-4 native-ios">
              <p class="font-size-sm text-muted" data-toggle="tooltip" data-html="true" data-placement="bottom" title="" data-original-title="Click this button if you have purchased the Remove Ads IAP and restore the Ad Free version of the app.">
                <lang-string lang-id="CHARACTER_SELECT_10"></lang-string>
              </p>
            </div>
            <div class="col-12 col-lg-8 native-ios">
              <button type="button" class="btn btn-sm btn-success m-1" onClick="nativeManager.restorePurchases();">
                <i class="fa fa-fw fa-redo-alt mr-1"></i>
                <lang-string lang-id="CHARACTER_SELECT_10"></lang-string>
              </button>
            </div>
          </div>
          <!-- END Account Settings -->
          <h2 class="content-heading border-bottom mb-4 pb-2 expansion-1-show d-none">Throne of the Herald</h2>
          <div class="row expansion-1-show d-none">
            <div class="col-md-6 offset-md-3">
              <button type="button" class="btn btn-sm btn-danger m-1" onClick="resetSkillsTo99();">
                <lang-string lang-id="SETTINGS_RESET_99_BTN"></lang-string>
              </button><br>
              <small><lang-string lang-id="SETTINGS_RESET_99_MSG_0"></lang-string> 
                <strong><lang-string lang-id="SETTINGS_RESET_99_MSG_1"></lang-string></strong><br><strong class="text-warning"><lang-string lang-id="SETTINGS_RESET_99_MSG_2"></lang-string></strong></small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Settings Space -->

  </div>

</div>
<!-- END SETTINGS Content --><!-- MILESTONES Content -->
<div class="content d-none" id="completionLog-container">
  <template id="skill-completion-template">
    <a class="block block-rounded block-link-pop pointer-enabled" id="view-milestones-link">
      <div class="block-content block-content-full" id="block-container">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-3">
            <img class="resize-48" id="skill-image">
          </div>
          <div class="media-body text-left">
            <h4 class="font-w600 text-left text-muted mb-0" id="skill-name"></h4>
            <h5 class="font-size-sm font-w400 text-left text-warning mb-1" id="level-container-0">
              <span id="skill-progress-fraction">1 / 99</span>
            </h5>
            <div class="progress active" style="height: 5px" id="level-container-1">
              <div class="progress-bar bg-info" id="skill-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
            <h5 class="font-size-sm font-w400 text-left text-danger my-1 d-none" id="abyssal-container-0">
              <span id="abyssal-level-fraction">1 / 99</span>
            </h5>
            <div class="progress active d-none" style="height: 5px" id="abyssal-container-1">
              <div class="progress-bar bg-danger" id="abyssal-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </template>
  <template id="mastery-completion-template">
    <div class="block block-rounded">
      <div class="block-content block-content-full pb-2" id="block-container">
        <div class="media d-flex align-items-center push mb-0">
          <div class="mr-3">
            <img class="resize-48" id="skill-image">
          </div>
          <div class="media-body text-left">
            <h4 class="font-w600 text-left text-muted mb-0" id="skill-name"></h4>
            <h5 class="font-size-sm font-w400 text-left mb-1">
              <span id="mastery-progress-fraction">0 / 0</span> <span id="mastery-progress-percent">(0.00%)</span>
            </h5>
            <div class="progress active mb-2" style="height: 5px">
              <div class="progress-bar bg-info" id="mastery-progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
              </div>
            </div>
            <div>
              <button class="btn btn-sm btn-primary m-1" id="progress-button"><lang-string lang-id="TUTORIAL_MISC_0"></lang-string></button>
              <button class="btn btn-sm btn-primary m-1" id="unlocks-button"><lang-string lang-id="MENU_TEXT_UNLOCKS"></lang-string></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  <template id="archaeology-museum-item-template">
    <img class="p-2 resize-48" id="item-image">
    <div style="position: absolute;top: 0;left: 0;pointer-events:none;" id="in-bank">
      <i class="fa fa-exclamation-circle text-success"></i>
    </div>
  </template>
  <template id="item-completion-template">
    <img class="p-2 resize-48" id="item-image">
  </template>
  <template id="monster-completion-template">
    <img class="p-2" id="monster-image">
  </template>
  <template id="pet-completion-template">
    <img class="combat-enemy-img-sm p-2" id="pet-image">
  </template>
  <div class="row gutters-tiny dow-deck">

    <div class="col-12">
      <div class="block block-rounded border-top border-combat border-4x">
        <div class="p-1">
          <div class="media d-flex align-items-center push mb-0 p-2">
            <div class="mr-3">
              <img class="skill-icon-md" data-src="assets/media/main/completion_log.png">
            </div>
            <div class="media-body">
              <h4 class="font-w600 text-left text-muted mb-0">

                <lang-string lang-id="COMPLETION_TRUE_COMPLETION"></lang-string> <small class="comp-log-percent-melvorTrue">69.69%</small> <button class="btn btn-sm btn-info ml-2 expansion-any-show d-none btn-visible-completion-melvorTrue" onclick="game.completion.setVisibleCompletion('melvorTrue');"><lang-string lang-id="SET_VISIBLE"></lang-string></button>
              </h4>
              <div class="font-size-sm mb-2">
                <div class="progress active mr-1 mt-2 ml-1" style="height:10px">
                  <div class="comp-log-percent-progress-melvorTrue progress-bar bg-success" role="progressbar" style="width: 69.69%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  </div>
                </div>
              </div>
              <div class="expansion-any-show d-none">
                <h5 class="font-w600 text-left text-muted mb-0">
                  <lang-string lang-id="COMPLETION_BASE_GAME"></lang-string> <small class="comp-log-percent-melvorBaseGame">69.69%</small> <button class="btn btn-sm btn-outline-info ml-2 btn-visible-completion-melvorBaseGame" onclick="game.completion.setVisibleCompletion('melvorBaseGame');"><lang-string lang-id="SET_VISIBLE"></lang-string></button>
                </h5>
                <div class="font-size-sm mb-2">
                  <div class="progress active mr-1 mt-2 ml-1" style="height:10px">
                    <div class="comp-log-percent-progress-melvorBaseGame progress-bar bg-info" role="progressbar" style="width: 69.69%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>
              </div>
              <div class="expansion-1-show d-none">
                <h5 class="font-w600 text-left text-muted mb-0">
                <lang-string lang-id="DUNGEON_NAME_Throne_of_the_Herald"></lang-string> <small class="comp-log-percent-melvorTotH">69.69%</small> <button class="btn btn-sm btn-outline-info ml-2 btn-visible-completion-melvorTotH" onclick="game.completion.setVisibleCompletion('melvorTotH');"><lang-string lang-id="SET_VISIBLE"></lang-string></button>
                </h5>
                <div class="font-size-sm mb-2">
                  <div class="progress active mr-1 mt-2 ml-1" style="height:10px">
                    <div class="comp-log-percent-progress-melvorTotH progress-bar bg-combat-toth-comp" role="progressbar" style="width: 69.69%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>
              </div>
              <div class="expansion-2-show d-none">
                <h5 class="font-w600 text-left text-muted mb-0">
                <lang-string lang-id="ATLAS_OF_DISCOVERY"></lang-string> <small class="comp-log-percent-melvorAoD">69.69%</small> <button class="btn btn-sm btn-outline-info ml-2 btn-visible-completion-melvorAoD" onclick="game.completion.setVisibleCompletion('melvorAoD');"><lang-string lang-id="SET_VISIBLE"></lang-string></button>
                </h5>
                <div class="font-size-sm mb-2">
                  <div class="progress active mr-1 mt-2 ml-1" style="height:10px">
                    <div class="comp-log-percent-progress-melvorAoD progress-bar bg-combat-aod-comp" role="progressbar" style="width: 69.69%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>
              </div>
              <div class="expansion-3-show d-none">
                <h5 class="font-w600 text-left text-muted mb-0">
                <lang-string lang-id="INTO_THE_ABYSS"></lang-string> <small class="comp-log-percent-melvorItA">69.69%</small> <button class="btn btn-sm btn-outline-info ml-2 btn-visible-completion-melvorItA" onclick="game.completion.setVisibleCompletion('melvorItA');"><lang-string lang-id="SET_VISIBLE"></lang-string></button>
                </h5>
                <div class="font-size-sm mb-2">
                  <div class="progress active mr-1 mt-2 ml-1" style="height:10px">
                    <div class="comp-log-percent-progress-melvorItA progress-bar bg-combat-ita-comp" role="progressbar" style="width: 69.69%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 col-xl-20-perc">
      <a class="block block-rounded block-link-pop border-top border-combat border-4x pointer-enabled" onClick="showCompletionCategory(0);">
        <div class="block-content block-content-full">
          <div class="media d-flex align-items-center push mb-0">
            <div class="mr-3">
              <img class="resize-48" data-src="assets/media/main/milestones_header.png">
            </div>
            <div class="media-body text-left">
              <h4 class="font-w600 text-left text-muted mb-0">
                <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_0"></lang-string>
              </h4>
              <h5 class="font-size-sm font-w400 text-left text-warning mb-1 skills-log-comp-percent">
                69.69%
              </h5>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 col-xl-20-perc">
      <a class="block block-rounded block-link-pop border-top border-combat border-4x pointer-enabled" onClick="showCompletionCategory(1);">
        <div class="block-content block-content-full">
          <div class="media d-flex align-items-center push mb-0">
            <div class="mr-3">
              <img class="resize-48" data-src="assets/media/main/mastery_header.png">
            </div>
            <div class="media-body text-left">
              <h4 class="font-w600 text-left text-muted mb-0">
                <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_1"></lang-string>
              </h4>
              <h5 class="font-size-sm font-w400 text-left text-warning mb-1 mastery-log-comp-percent">
                69.69%
              </h5>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 col-xl-20-perc">
      <a class="block block-rounded block-link-pop border-top border-combat border-4x pointer-enabled" onClick="showCompletionCategory(2);">
        <div class="block-content block-content-full">
          <div class="media d-flex align-items-center push mb-0">
            <div class="mr-3">
              <img class="resize-48" data-src="assets/media/bank/whale.png">
            </div>
            <div class="media-body text-left">
              <h4 class="font-w600 text-left text-muted mb-0">

                <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_2"></lang-string>
              </h4>
              <h5 class="font-size-sm font-w400 text-left text-warning mb-1 item-log-comp-percent">
                69.69%
              </h5>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 col-xl-20-perc">
      <a class="block block-rounded block-link-pop border-top border-combat border-4x pointer-enabled" onClick="showCompletionCategory(3);">
        <div class="block-content block-content-full">
          <div class="media d-flex align-items-center push mb-0">
            <div class="mr-3">
              <img class="resize-48" data-src="assets/media/monsters/goblin.png">
            </div>
            <div class="media-body text-left">
              <h4 class="font-w600 text-left text-muted mb-0">

                <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_3"></lang-string>
              </h4>
              <h5 class="font-size-sm font-w400 text-left text-warning mb-1 monster-log-comp-percent">
                69.69%
              </h5>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 col-xl-20-perc">
      <a class="block block-rounded block-link-pop border-top border-combat border-4x pointer-enabled" onClick="showCompletionCategory(4);">
        <div class="block-content block-content-full">
          <div class="media d-flex align-items-center push mb-0">
            <div class="mr-3">
              <img class="resize-48" data-src="assets/media/pets/bandit_base.png">
            </div>
            <div class="media-body text-left">
              <h4 class="font-w600 text-left text-muted mb-0">

                <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_4"></lang-string>
              </h4>
              <h5 class="font-size-sm font-w400 text-left text-warning mb-1 pet-log-comp-percent">
                69.69%
              </h5>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12" id="completion-log-0">
      <div class="block block-rounded block-content block-content-full">
        <div class="row">
          <div class="col-12" id="skillslog-container"></div>
        </div>
      </div>
    </div>

    <div class="col-12 d-none" id="completion-log-1">
      <div class="block block-rounded block-content block-content-full">
        <div class="row">
          <div class="col-12" id="masterylog-container"></div>
        </div>
      </div>
    </div>

    <div class="col-12 d-none" id="completion-log-2">
      <div class="block block-rounded block-content block-content-full">
        <div class="row">
          <div class="col-12" id="itemlog-container"></div>
        </div>
      </div>
    </div>

    <div class="col-12 d-none" id="completion-log-3">
      <div class="block block-rounded block-content block-content-full">
        <div class="row" id="monsterlog-container">
        </div>
      </div>
    </div>

    <div class="col-12 d-none" id="completion-log-4">
      <div class="block block-rounded block-content block-content-full">
        <div class="row">
          <div class="col-12" id="petlog-container"></div>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- END MILESTONE Content --><!-- LORE Content -->
<div class="content d-none" id="lore-container">
    <div class="block block-content block-content-full block-rounded-extra block-link-pop border-top border-astrology border-4x text-center">
        <div class="row gutters-tiny">
            <div class="col-12 p-2" id="base-game-lore-header">
                <h4 class="text-left text-dark mb-1">
                    <span class="font-w700"><lang-string lang-id="COMPLETION_TRUE_COMPLETION"></lang-string></span>
                </h4>
            </div>
            <div class="col-12 p-2" id="throne-lore-header">
                <h4 class="text-left text-dark mb-1">
                    <span class="font-w700">Throne of the Herald</span>
                </h4>
            </div>
        </div>
    </div>
</div>
<!-- END LORE Content --><div id="event-container"></div>
<!-- GOLBIN RAID CONTENT -->
<div class="content d-none" id="golbinraid-container">
    <div class="row gutters-tiny row-deck">
        <div class="col-12">
            <div class="block block-rounded block-link-pop border-top border-warning border-4x">
                <h4 class="font-w700 text-center text-combat-smoke m-1 mb-2"><lang-string lang-id="GOLBIN_RAID_HEADER"></lang-string></h4>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xl-3">
            <div class="block block-content block-rounded block-link-pop border-top border-success border-4x">
                <h4 class="font-w700 text-center text-combat-smoke m-1 mb-2"><lang-string lang-id="GOLBIN_RAID_STAGE_1"></lang-string></h4>
                <p class="font-w400 font-size-sm text-center text-combat-smoke"><lang-string lang-id="GOLBIN_RAID_STAGE_1_0"></lang-string><br><lang-string lang-id="GOLBIN_RAID_STAGE_1_1"></lang-string></p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="block block-content block-rounded block-link-pop border-top border-success border-4x">
                <h4 class="font-w700 text-center text-combat-smoke m-1 mb-2"><lang-string lang-id="GOLBIN_RAID_STAGE_2"></lang-string></h4>
                <p class="font-w400 font-size-sm text-center text-combat-smoke"><lang-string lang-id="GOLBIN_RAID_STAGE_2_0"></lang-string><br><lang-string lang-id="GOLBIN_RAID_STAGE_2_1"></lang-string><br><lang-string lang-id="GOLBIN_RAID_STAGE_2_2"></lang-string></p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="block block-content block-rounded block-link-pop border-top border-success border-4x">
                <h4 class="font-w700 text-center text-combat-smoke m-1 mb-2"><lang-string lang-id="GOLBIN_RAID_STAGE_3"></lang-string></h4>
                <p class="font-w400 font-size-sm text-center text-combat-smoke"><lang-string lang-id="GOLBIN_RAID_STAGE_3_0"></lang-string><br><lang-string lang-id="GOLBIN_RAID_STAGE_3_1"></lang-string></p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
            <div class="block block-content block-rounded block-link-pop border-top border-danger border-4x">
                <h4 class="font-w700 text-center text-combat-smoke m-1 mb-2"><lang-string lang-id="GOLBIN_RAID_STAGE_4"></lang-string></h4>
                <p class="font-w400 font-size-sm text-center text-combat-smoke"><lang-string lang-id="GOLBIN_RAID_STAGE_4_0"></lang-string><br></p>
            </div>
        </div>
        <div class="col-12">
            <div class="block block-rounded block-link-pop border-top border-warning border-4x">
                <div class="block-header text-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="block-title m-1"><img class="skill-icon-xs mr-2" data-src="assets/media/monsters/goblin.png"><lang-string lang-id="GOLBIN_RAID_BTN_0_0"></lang-string><img class="skill-icon-xs m-2" data-src="assets/media/monsters/goblin.png"></h3>
                            </div>
                            <div class="col-12">
                                <span class="font-size-sm m-1"><lang-string lang-id="GOLBIN_RAID_BTN_0_1"></lang-string></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="col-12 col-lg-8">
            <div class="block block-content block-rounded border-top border-success border-4x">
                <div class="media d-flex align-items-center push">
                    <div class="media-body">
                        <div class="font-w600 text-center mb-2"><lang-string lang-id="GOLBIN_RAID_SELECT_DIFFICULTY"></lang-string></div>
                        <div class="btn-group mb-2 w-100" role="group">
                          <button class="btn btn-outline-success w-25" type="button" id="raid-difficulty-btn-0" onclick="game.golbinRaid.changeDifficulty(0);"><lang-string lang-id="COMBAT_MISC_23"></lang-string></button>
                          <button class="btn btn-warning w-25" type="button" id="raid-difficulty-btn-1" onclick="game.golbinRaid.changeDifficulty(1);"><lang-string lang-id="COMBAT_MISC_96"></lang-string></button>
                          <button class="btn btn-outline-danger w-25" type="button" id="raid-difficulty-btn-2" onclick="game.golbinRaid.changeDifficulty(2);"><lang-string lang-id="COMBAT_MISC_25"></lang-string></button>
                        </div>
                        <ul id="raid-difficulty-text"></ul>
                        <div class="text-center">
                            <div class="btn-group-vertical w-75" role="group">
                                <button class="btn btn-success" type="button" onclick="game.golbinRaid.preStartRaid();" id="raid-start-button">
                                    <div class="media d-flex align-items-center push">
                                        <div class="mr-3">
                                            <img class="shop-img" data-src="assets/media/pets/golden_golbin.png">
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600"><lang-string lang-id="GOLBIN_RAID_BTN_1_0"></lang-string></div>
                                            <div class="font-size-sm">
                                                <small><lang-string lang-id="GOLBIN_RAID_BTN_1_1"></lang-string></small><br>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <button class="btn btn-success" type="button" onclick="game.golbinRaid.unpause();" id="raid-continue-button"><lang-string lang-id="GOLBIN_RAID_CONTINUE_RAID"></lang-string></button>
                            <button class="btn btn-outline-warning" type="button" data-page-id="melvorD:Shop" id="raid-shop-button">
                                <div class="media d-flex align-items-center push">
                                    <div class="mr-3">
                                        <img class="shop-img" data-src="assets/media/main/raid_coins.png">
                                    </div>
                                    <div class="media-body">
                                        <div class="font-w600"><lang-string lang-id="GOLBIN_RAID_BTN_2_0"></lang-string></div>
                                        <div class="font-size-sm">
                                            <small><lang-string lang-id="GOLBIN_RAID_BTN_2_1"></lang-string></small><br>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-2"></div>
    </div>
    <div class="row gutters-tiny">
        <div class="col-12 col-md-6">
            <div class="block block-content block-rounded border-top border-combat border-4x">
                <h5 class="font-w400 font-size-sm mb-2"><lang-string lang-id="GOLBIN_RAID_INFORMATION_0"></lang-string></h5>
                <h5 class="font-w400 font-size-sm mb-2"><lang-string lang-id="GOLBIN_RAID_INFORMATION_1"></lang-string></h5>
                <div role="separator" class="dropdown-divider"></div>
                <h5 class="font-w700 mb-2 text-warning">
                    <img class="skill-icon-xs mr-2" data-src="assets/media/main/golbinraid_howtoplay.png">
                    <lang-string lang-id="GOLBIN_RAID_INFORMATION_2"></lang-string>
                </h5>
                <h5 class="font-w400 font-size-sm">
                    <ul>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_3"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_4"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_5"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_6"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_7"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_8"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_9"></lang-string></li>
                        <li class="text-info"><lang-string lang-id="GOLBIN_RAID_INFORMATION_10"></lang-string></li>
                    </ul>
                </h5>
                <div role="separator" class="dropdown-divider"></div>
                <h5 class="font-w700 mb-2 text-warning">
                    <lang-string lang-id="GOLBIN_RAID_INFORMATION_11"></lang-string>
                </h5>
                <h5 class="font-w400 font-size-sm">
                    <ul>
                        <li class="font-w700 text-success"><lang-string lang-id="GOLBIN_RAID_INFORMATION_12"></lang-string></li>
                        <li class="text-info"><lang-string lang-id="GOLBIN_RAID_INFORMATION_13"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_14"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_15"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_16"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_17"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_18"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_19"></lang-string></li>
                        <li><lang-string lang-id="GOLBIN_RAID_INFORMATION_20"></lang-string></li>
                        <li class="font-w700 text-success"><lang-string lang-id="GOLBIN_RAID_INFORMATION_22"></lang-string></li>
                        <li class="text-danger"><lang-string lang-id="GOLBIN_RAID_INFORMATION_23"></lang-string></li>
                    </ul>
                </h5>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="row gutters-tiny row-deck">
              <stat-table class="col-12" id="raid-stats-table"></stat-table>
            </div>
            <div class="block block-content block-rounded border-top border-combat border-4x">
                <div class="font-w600">
                    <lang-string lang-id="GOLBIN_RAID_HISTORY_TITLE"></lang-string>
                </div>
                <div id="golbinraid-history"></div>
            </div>
        </div>
    </div>

</div>
<!-- END GOLBIN RAID CONTENT -->
<div class="content d-none" id="bday-2023-container" style="padding-bottom:120px;">

  <div class="row gutters-tiny row-deck">
    <div class="col-md-6">
      <div class="block block-rounded block-link-pop border-top border-woodcutting border-4x">
        <div class="block-content block-content-full">
          <h3 class="font-w600 mb-1 text-warning"><lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGES"></lang-string></h3>
          <div class="font-w400 mb-2"><lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGES_DESCRIPTION"></lang-string></div>
          <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
            <div class="media d-flex align-items-center push">
              <div class="mr-3">
                <img class="skill-icon-md" data-src="assets/media/bank/clue.png"/>
              </div>
              <div class="media-body text-left">
                <div class="font-w600 text-warning" id="bday-2023-tracker-div-0">
                  <i class="fa fa-check-circle mr-1 d-none" id="bday-2023-tracker-icon-0"></i>
                  <lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGE_TITLE_1"></lang-string>
                </div>
                <div class="btn btn-sm btn-primary" id="btn-clue-hunt-start" onclick="game.clueHunt.startClueHunt();"><lang-string lang-id="BIRTHDAY_EVENT_2023_START_CLUE_HUNT"></lang-string></div>
              </div>
            </div>
          </div>
          <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
            <div class="media d-flex align-items-center push">
              <div class="mr-3">
                <img class="skill-icon-md" data-src="assets/media/skills/fishing/fishing.png"/>
              </div>
              <div class="media-body text-left">
                <div class="font-w600 text-warning" id="bday-2023-tracker-div-1">
                  <i class="fa fa-check-circle mr-1 d-none" id="bday-2023-tracker-icon-1"></i>
                  <lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGE_TITLE_2"></lang-string>
                </div>
                <div class="font-size-sm"><lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGE_DESCRIPTION_2"></lang-string></div>
              </div>
            </div>
          </div>
          <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
            <div class="media d-flex align-items-center push">
              <div class="mr-3">
                <img class="skill-icon-md" data-src="assets/media/bank/present.png"/>
              </div>
              <div class="media-body text-left">
                <div class="font-w600 text-warning" id="bday-2023-tracker-div-2">
                  <i class="fa fa-check-circle mr-1 d-none" id="bday-2023-tracker-icon-2"></i>
                  <lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGE_TITLE_3"></lang-string>
                </div>
                <div class="font-size-sm"><lang-string lang-id="BIRTHDAY_EVENT_2023_CHALLENGE_DESCRIPTION_3"></lang-string></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 d-none">
      <div class="block block-rounded block-link-pop border-top border-woodcutting border-4x">
        <div class="block-content block-content-full">
					<div class="media d-flex align-items-center push">
						<div class="mr-3">
							<img class="skill-icon-lg" data-src="assets/media/pets/marcy_bday2023.png"/>
						</div>
						<div class="media-body text-left">
							<div class="font-w600">Marcy has lost her marbles. Buy a plushie</div>
						</div>
					</div>
        </div>
      </div>
    </div>
  </div>

</div>
</main>
<!-- END Main Container -->

<!-- START Game Modals -->
<div class="modal" id="modal-account-deletion" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">ACCOUNT DELETION</h3> <!-- TODO_L -->
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content font-size-sm">
          <p>You are about to reset and delete your character. Are you sure you want to do this? If you are mad or
            something, I recommend sleeping on it. Maybe try some yoga or meditation before clicking the button.</p> <!-- TODO_L -->
          <p>If you are really, really, really, really sure about this - Then I won't judge, much...</p> <!-- TODO_L -->
          <div class="block-content block-content-full text-right border-top">
            <button type="button" id="modal-account-deletion-button" class="btn btn-sm btn-danger"
              onClick="accountDeletion(true);"><i class="fa fa-fw fa-times mr-1"></i>CONFIRM DELETION</button> <!-- TODO_L -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-select-agility-obstacle" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document" style="height:80%;">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="select-agility-obstacle-type">
            <lang-string lang-id="MENU_TEXT_SELECT_OBSTACLE"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full">
          <div class="alert bg-dark border border-info d-flex align-items-center w-100 text-info" role="alert"
            id="build-obstacle-info">
            <div class="flex-00-auto">
              <i class="fa fa-fw fa-info-circle"></i>
            </div>
            <div class="flex-fill ml-3">
              <p class="mb-0" id="agility-obstacle-info-0">Building an Obstacle will provide +4% Item Cost Reduction for
                that Obstacle only. Stacks up to 10 times.</p>
              <p class="mb-0" id="agility-obstacle-info-1">Cost reductions are capped at 95%.</p>
            </div>
          </div>
          <div class="alert bg-dark border border-danger d-flex align-items-center w-100 text-danger" role="alert"
            id="build-pillar-info">
            <div class="flex-00-auto">
              <i class="fa fa-fw fa-info-circle"></i>
            </div>
            <div class="flex-fill ml-3">
              <p class="mb-0" id="agility-pillar-cost-info">
                <lang-string lang-id="MENU_TEXT_PILLAR_INFO"></lang-string>
              </p>
            </div>
          </div>
          <div class="row gutters-tiny" id="modal-select-agility-obstacle-content"></div>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-potion-select" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <potion-select-menu id="potion-select-menu-modal"></potion-select-menu>
    </div>
  </div>
</div><div class="modal" id="modal-summoning-synergy" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document" style="height:80%;">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="MISC_STRING_17"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full px-0">
          <div class="col-12" id="summoning-synergies-search-cont">
          </div>
        </div>
      </div>
    </div>
  </div>
</div><div
  class="modal modal-infront"
  id="modal-item-stats"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modal-block-normal"
  aria-hidden="true"
  style="display: none"
>
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" id="modal-content-item-stats">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="MENU_TEXT_VIEW_STATS"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="block block-rounded-double bg-combat-inner-dark text-center p-1">
                <h5 class="font-w700 text-combat-smoke m-1" id="item-view-name"></h5>
              </div>
              <div class="block block-rounded-double bg-combat-inner-dark text-center p-2">
                <img
                  class="item-view-img"
                  id="item-view-img"
                  data-src="assets/media/bank/weapon_sword_adamant.png"
                /><br />
                <span id="item-view-description" class="font-w400 font-size-sm text-info m-1"></span>
              </div>
              <div
                id="item-view-special-attack"
                class="block block-rounded-double bg-combat-inner-dark text-center p-2 d-none"
              >
                <h5 class="font-w700 text-left font-size-sm text-combat-smoke mb-1">
                  <img class="skill-icon-xs mr-2" data-src="assets/media/main/special_attack.png" />
                  <lang-string lang-id="BANK_STRING_37"></lang-string>
                </h5>
                <div id="item-view-special-attack-list"></div>
              </div>
              <div
                id="item-view-description-levels"
                class="block block-rounded-double bg-combat-inner-dark text-center p-2"
              >
                <span id="item-view-description-attack-level" class="font-size-sm d-none"></span>
                <span id="item-view-description-defence-level" class="font-size-sm d-none"></span>
                <span id="item-view-description-ranged-level" class="font-size-sm d-none"></span>
                <span id="item-view-description-magic-level" class="font-size-sm d-none"></span>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="block block-rounded-double bg-combat-inner-dark">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_42"></lang-string>
                  </h5>
                </div>
                <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
                  <div class="col-12" id="item-view-damage-type-cont">
                    <div class="row justify-horizontal-center">
                      <div class="col-6">
                        <h5 class="font-w400 font-size-sm text-combat-smoke mb-1">
                          <lang-string lang-id="DAMAGE_TYPE"></lang-string>
                        </h5>
                      </div>
                      <div class="col-6">
                        <h5 class="font-w400 font-size-sm text-combat-smoke text-right mb-1">
                          <img
                            class="skill-icon-xxs m-0 mr-1"
                            id="item-view-damage-type-icon"
                            data-src="assets/media/main/question.png"
                          />
                          <span id="item-view-damage-type"></span>
                        </h5>
                      </div>
                      <div class="col-12">
                        <div role="separator" class="dropdown-divider"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12" id="item-view-attack-speed-main">
                    <div class="row justify-horizontal-center">
                      <div class="col-8">
                        <lang-string lang-id="EQUIPMENT_STAT_ATTACK_INTERVAL"></lang-string>
                      </div>
                      <div class="col-4">
                        <span class="font-w600" id="item-view-attackSpeed"></span>
                        <span id="item-view-dif-attackSpeed"></span>
                      </div>
                      <div class="col-12">
                        <div role="separator" class="dropdown-divider"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_STAB_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-stabAttackBonus"></span>
                    <span id="item-view-dif-stabAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_SLASH_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-slashAttackBonus"></span>
                    <span id="item-view-dif-slashAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_BLOCK_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-blockAttackBonus"></span>
                    <span id="item-view-dif-blockAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/strength/strength.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-meleeStrengthBonus"></span>
                    <span id="item-view-dif-meleeStrengthBonus"></span>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_ATTACK_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-rangedAttackBonus"></span>
                    <span id="item-view-dif-rangedAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-rangedStrengthBonus"></span>
                    <span id="item-view-dif-rangedStrengthBonus"></span>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_ATTACK_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-magicAttackBonus"></span>
                    <span id="item-view-dif-magicAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DAMAGE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-magicDamageBonus"></span>
                    <span id="item-view-dif-magicDamageBonus"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-4">
              <div class="block block-rounded-double bg-combat-inner-dark">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_91"></lang-string>
                  </h5>
                </div>
                <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/defence/defence.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-meleeDefenceBonus"></span>
                    <span id="item-view-dif-meleeDefenceBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-rangedDefenceBonus"></span>
                    <span id="item-view-dif-rangedDefenceBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-magicDefenceBonus"></span>
                    <span id="item-view-dif-magicDefenceBonus"></span>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-12" id="item-view-resistances"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-content block-content-full text-right border-top">
          <button type="button" class="btn btn-danger ml-3" data-dismiss="modal">
            <lang-string lang-id="FARMING_MISC_24"></lang-string>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modal-playfab-news" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Recent Announcements - Melvor Idle</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-left" id="modal-playfab-news-content">
          <h5 class="font-w300 font-size-sm text-combat-smoke mb-1"><em><small>Either this is still loading, it broke,
                or there is actually no News yet...</small></em></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorF:New_Dawn" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-6-header">New Dawn</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-6-title">New Dawn</h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-6-text">
            The Vorlorans were a race of people who gladly worshipped the Gods and spread their influence across the
            land with fervor. Setting up shrines and churches, gathering offerings, and spreading word of the Gods were
            commonplace. In return, the Gods blessed harvests, summoned rains to extinguish fires, and granted strength
            to those in need. Things continued like this for many years with little complaint from either side.
            <br><br>
            The people elected a special group of holy warriors, which they named The Warriors of Vorloran. This group
            was tasked to root out and kill any evil creatures that rose throughout the land of Melvor, cutting out rot
            and darkness across the land. Among the Warriors of Vorloran rose a leader, named Ahrenia. She happily
            accepted the role of commander and led the warriors well, quickly rising to fame throughout the land for her
            good deeds and skill in combat.
            <br><br>
            As the war between The Gods began their sudden disappearance had left the Warriors of Vorloran to fend for
            themselves in their fight against evil. Their weapons and armor no longer carried their blessings that once
            protected them and with it their dependence on the gods had now left them vulnerable. Unease began to sweep
            through the ranks, fearing an unstoppable evil would eventually arrive. Their fears would then become a
            reality as rumours began to spread of a dangerous mist approaching.
            <br><br>
            The Mist, said to have appeared out of the blue, was already destroying the outer towns of Melvor. The Mist
            seemingly was able to take control over monsters, leaving an affliction that would turn them into a
            murderous undead horde, led by a Dark Entity in which the survivors named Bane. With the Warriors of
            Vorloran weakened they hopelessly tried to protect as many people as they could, and one by one… they fell
            to its afflicted army. Ahrenia, desperate to do anything she could to save her people, traveled to the
            meeting place of the Gods known as the Millennium Tower, located in the Vorloran capital. Within the tower
            no gods greeted her. Only a cloaked figure who called themselves “The Herald”. They offered her the power
            she needed to save her people, and, though hesitant, she accepted.
            <br><br>
            Though the mist had destroyed many towns and cities, there was still much to save, and Ahrenia rushed back
            to do as much as she could. With their hero returned to them, many celebrated and gathered arms, ready to
            fight back against the dark entity with renewed vigor. They marched off with songs in their heart, with
            Ahrenia leading them. All too soon, they reached Bane’s army and met the entity face to face. With a cry,
            Ahrenia charged forward, her blade glowing brightly and the Warriors of Vorloran all behind her. Her mastery
            of the combat arts shone in the battlefield, as fast as light her blade tore through all that tried to
            attack her, switching effortlessly to her to bow to help out the people around her and using magic to wipe
            out hundreds in a blink of an eye. Her men followed closely behind trying to keep her safe so she could
            focus on leading and casting. Her men frequently cried out in pain, others in fury, desperately fighting the
            unending hordes.
            <br><br>
            Soon enough, Ahrenia met face to face with Bane, who tried desperately to drive her back with torrents of
            magic. She pressed on, landing clean blows against Bane who struck back with equal force. With both
            suffering substantial damage, Ahrenia gathered her strength and pointed her sword towards the sky. A ray of
            golden light poured down from the heavens, driving the mist back. The normally silent Bane screeched out
            with a blood-curdling cry, “Herald! I have failed you!” Ahrenia faltered, hearing the name of The Herald,
            but believing in her strength she aimed it towards Bane. Just as the edge of the golden light pierced Bane’s
            rotten, fetid flesh… it stopped. As did she. She looked around in horror as the mist quickly cascaded back
            all around her, swallowing her men and blotting out the sun. She tried to scream out, but no words came. The
            last thing she saw was a cloaked figure approaching her.
            <br><br>
            Now with what little power she has left she offers it to you, “Vorloran, you must find a way to stop the
            Herald at all costs, search the lands and oceans for anything that will help you, you are our final hope
            now.”
          </h5>

          <h5 class="font-w300 font-size-sm text-combat-smoke mb-2">
            <lang-string lang-id="LORE_BY_DEFEATING"></lang-string>
          </h5>
          <h5 class="font-w600 font-size-sm text-success">
            <lang-string lang-id="LORE_YOU_UNLOCKED"></lang-string>
          </h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-view-monster-list" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title"><lang-string land-id="MENU_TEXT_VIEW_MONSTER_LIST"></lang-string></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block block-content" id="modal-view-monster-list-cont"></div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorF:Unknown_Evil" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-5-header">The First Hero and an Unknown Evil</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-5-title">The First Hero and an Unknown Evil</h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-5-text">
            Despite the unbalance the Fall of the Gods would bring upon the land, it was a necessary evil. They were
            once shapers of the world, tasked with creating everything inside of it, and building upon their creations
            to give them life and complexity. Over the years, rising discourse and anger over how to lead and create
            gave way to disputes and wars with immeasurable casualties. The Fall of the Gods has brought forth a time of
            celebration and healing, along with some much-needed rest for you, who has slumbered away peacefully since
            the Gods’ defeat.
            <br><br>
            The Capital of Melvor has been a place of peace and jubilant festivities, with hardly an idle hour in the
            streets since the heroes returned. Joyous laughter and elaborate parties continued while a sinister threat
            gathered on the horizon, unseen by all.
            <br><br>
            You finally rouse from your slumber and depart from the simple, yet cozy tavern you had stayed in for the
            past few days. Wiping the sleep from your eyes, you ponder at the sudden, eerie stillness Melvor has been
            plunged into overnight. A blanket of thick, onyx mist chokes the sky with ghostly tendrils of an inky black
            substance weaving in and out of windows, doorframes, and the like. Despite your peering into shops and
            scouring the streets, there wasn’t a person in sight, with stalls, games, and food left suddenly and without
            apparent reason.
            <br><br>
            You continue on, headed towards the main gates of the Capital. The closer you get to those looming gates,
            the more people you could see gathered all around, seemingly frozen in place in front of the wide-open
            gateway. You call out, yet no noise can be heard from your throat. You try to run but find yourself unable
            to. It feels as if ice has clawed its way into your body, leaving you raw and cold. After trudging along
            slowly for what feels like hours, the citizens are within reach, each with twisted expressions of horror and
            fear, looking out past the gates.
            <br><br>
            You push through the silent crowd and follow their gaze to the horizon, locking your eyes upon a ruined
            tower in the distance. The windows and cracks of the pillar seep black mist, which continues to pour out at
            a frightening pace despite the seemingly frozen state of everything else. You reach out towards the tower
            and see your hand quickly become engulfed. Your feet follow quickly after, despite repeated attempts to kick
            the substance away. The mist locks you in place and creeps up your body, pulling you into the ground. It
            floods into your mouth, filling your lungs as you try to cry out. Things become so... incredibly cold. Every
            bit of heat is sapped from your body, leaving a bitter chill that freezes you to your core. Despite your
            struggles, it quickly consumes you, pulling you into the frozen earth.
            <br><br>
            With a sudden snap, light flickers back, and the cold recedes from your body, almost as quickly as it had
            come. Despite feeling warm, you still feel… tainted. Sick, in a way. You look around and see a high vaulted
            ceiling and dark cobbled stone. Starlight filters into the room, illuminating great illustrations of
            gold-clad warriors and an ancient throne. Four smaller thrones are dotted throughout the room, though they
            currently sit empty and seemingly have for ages. From the main throne, you hear a hearty chuckle, followed
            by a couple of short, raspy coughs.
            <br><br>
            “It’s been awhile since a Vorloran has managed to make their way into my tower. I presume you came to strike
            me down, no?”
            <br><br>
            You begin to speak, but a sputtering cough rattles out instead as remnants of dark mist are expelled from
            your lungs. “Who are you?” You croak.
            <br><br>
            “I am a being far beyond your comprehension. Simply put, I may be your undoing, though time is yet to tell.
            As it currently stands though, it simply doesn’t matter who I am.”
            <br><br>
            You move to draw your weapon but are quickly restrained by black mist that floods into the room. “There’s no
            need for that. One shouldn’t enter a home and threaten the owner. They could quickly find themselves…
            incapacitated.” A sick, toothy grin creeps across the being’s face. The cloaked figure shakes their head and
            continues. “Defeating the Gods was impressive, but your true test still lays ahead. The girl must be
            stopped.”
            <br><br>
            The cloaked figure extends an open palm towards you. “Now, begone.” You hear them quietly whisper, “Ret Nni
            Iwm Ete Ami Its Lu The” before they close their hand. You blink, and find yourself far, far from Melvor.
            People rush past you, nearly knocking you over. Time seems to have returned to normal.
            <br><br>
            “What’s going on? Where are you all off to?” You ask a staring passerby.
            <br><br>
            “It’s all over. Grab what you can and run as far as possible. Do not let the mist catch you.” They quickly
            take off, random bits and belongings tumbling out of their arms as they run along.
            <br><br>
            Confused, you approach a woman, huddled into a corner and heavily sobbing. “She’s gone! We’re all doomed!
            There’s no hope left!”
            <br><br>
            “Who is it? Who’s gone?”
            <br><br>
            “Ahrenia… our hero. She ventured into the mist… and never returned.”
            <br><br>
            You back up, even more confused. As your situation settles in, mist starts to trickle over the eastern wall
            of the city as a crowd frantically runs by. A thought creeps into your mind. Is this… truly the end?

          </h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-skill-tree" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xxl" role="document">
    <div class="modal-content">
      <skill-tree-menu id="modal-skill-tree-menu"></skill-tree-menu>
    </div>
  </div>
</div><div class="modal" id="modal-offline-combat-warning" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="block block-rounded block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="COMBAT_MISC_68"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content font-size-sm text-center">
          <h1 class="font-w700 text-warning">
            <lang-string lang-id="COMBAT_MISC_59"></lang-string>
          </h1>
          <h4 class="font-w400 text-combat-smoke"><span class="font-w700 text-danger">
              <lang-string lang-id="COMBAT_MISC_60"></lang-string>
            </span></h4>
          <h5 class="font-w400 font-size-sm text-combat-smoke">
            <lang-string lang-id="COMBAT_MISC_61"></lang-string>
          </h5>
          <h5 class="font-w400 font-size-sm text-combat-smoke text-left">
            <div class="form-check pb-2 pt-2 border-bottom border-top" onClick="toggleOfflineCombatCheckbox(0);">
              <input class="form-check-input pointer-enabled" type="checkbox" value="" id="cb-offline-combat-0"
                name="cb-offline-combat-0">
              <label class="form-check-label pointer-enabled" for="cb-offline-combat-0">
                <lang-string lang-id="COMBAT_MISC_62"></lang-string>
              </label>
            </div>
            <div class="form-check pb-2 pt-2 border-bottom border-top" onClick="toggleOfflineCombatCheckbox(1);">
              <input class="form-check-input pointer-enabled" type="checkbox" value="" id="cb-offline-combat-1"
                name="cb-offline-combat-1">
              <label class="form-check-label pointer-enabled" for="cb-offline-combat-1">
                <lang-string lang-id="COMBAT_MISC_63"></lang-string>
              </label>
            </div>
            <div class="form-check pb-2 pt-2 border-bottom" onClick="toggleOfflineCombatCheckbox(2);">
              <input class="form-check-input pointer-enabled" type="checkbox" value="" id="cb-offline-combat-2"
                name="cb-offline-combat-2">
              <label class="form-check-label pointer-enabled" for="cb-offline-combat-2">
                <lang-string lang-id="COMBAT_MISC_64"></lang-string>
              </label>
            </div>
            <div class="form-check pb-2 pt-2 border-bottom" onClick="toggleOfflineCombatCheckbox(3);">
              <input class="form-check-input pointer-enabled" type="checkbox" value="" id="cb-offline-combat-3"
                name="cb-offline-combat-3">
              <label class="form-check-label pointer-enabled" for="cb-offline-combat-3">
                <lang-string lang-id="COMBAT_MISC_65"></lang-string>
              </label>
            </div>
            <div class="form-check pb-2 pt-2 border-bottom" onClick="toggleOfflineCombatCheckbox(4);">
              <input class="form-check-input pointer-enabled" type="checkbox" value="" id="cb-offline-combat-4"
                name="cb-offline-combat-4">
              <label class="form-check-label pointer-enabled" for="cb-offline-combat-4">
                <lang-string lang-id="COMBAT_MISC_66"></lang-string>
              </label>
            </div>
          </h5>
        </div>
      </div>
      <div class="block-content block-content-full text-right">
        <button type="button" class="btn btn-sm btn-alt-danger mr-1" data-dismiss="modal" aria-label="Close">
          <lang-string lang-id="CHARACTER_SELECT_45"></lang-string>
        </button>
        <button type="button" id="cb-offline-combat-btn" class="btn btn-sm btn-success" data-dismiss="modal"
          aria-label="Close" disabled onClick="enableOfflineCombat();">
          <lang-string lang-id="COMBAT_MISC_67"></lang-string>
        </button>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book3" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-11-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-11-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-11-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book1" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-9-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-9-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-9-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book7a" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-15-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-15-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-15-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book5" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-13-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-13-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-13-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div
  class="modal"
  id="modal-item-stats-current"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modal-block-normal"
  aria-hidden="true"
  style="display: none"
>
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" id="modal-content-item-stats">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="item-view-name-current"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="block block-rounded-double bg-combat-inner-dark">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_18"></lang-string>
                  </h5>
                </div>
                <equipment-grid></equipment-grid>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="block block-rounded-double bg-combat-inner-dark">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_42"></lang-string>
                  </h5>
                </div>
                <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
                  <div class="col-6">
                    <h5 class="font-w400 font-size-sm text-combat-smoke m-1">
                      <lang-string lang-id="DAMAGE_TYPE"></lang-string>
                    </h5>
                  </div>
                  <div class="col-6">
                    <h5 class="font-w400 font-size-sm text-combat-smoke text-right m-1">
                      <img
                        class="skill-icon-xxs m-0 mr-1"
                        id="item-view-current-damage-type-icon"
                        data-src="assets/media/main/question.png"
                      />
                      <span id="item-view-current-damage-type"></span>
                    </h5>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_ATTACK_INTERVAL"></lang-string>
                  </div>
                  <div class="col-4">
                    <span id="item-view-current-attackSpeed"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_STAB_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-stabAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_SLASH_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-slashAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/combat/combat.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_BLOCK_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span id="item-view-current-blockAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/strength/strength.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-meleeStrengthBonus"></span>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_ATTACK_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span id="item-view-current-rangedAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_STRENGTH_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-rangedStrengthBonus"></span>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_ATTACK_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-magicAttackBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DAMAGE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-magicDamageBonus"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-4">
              <div class="block block-rounded-double bg-combat-inner-dark">
                <div class="block-header block-header-default bg-dark-bank-block-header px-3 py-1 mb-1">
                  <h5 class="font-size-sm font-w600 mb-0 w-100 text-center">
                    <lang-string lang-id="COMBAT_MISC_91"></lang-string>
                  </h5>
                </div>
                <div class="row font-w400 font-size-sm text-combat-smoke p-2 justify-horizontal-center">
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/defence/defence.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-meleeDefenceBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/ranged/ranged.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-rangedDefenceBonus"></span>
                  </div>
                  <div class="col-8">
                    <img class="skill-icon-xxs" data-src="assets/media/skills/magic/magic.png" />
                    <lang-string lang-id="EQUIPMENT_STAT_DEFENCE_BONUS"></lang-string>
                  </div>
                  <div class="col-4">
                    <span class="font-w600" id="item-view-current-magicDefenceBonus"></span>
                  </div>
                  <div class="col-12">
                    <div role="separator" class="dropdown-divider"></div>
                  </div>
                  <div class="col-12" id="item-view-current-resistances"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="block-content block-content-full text-right border-top">
          <button type="button" class="btn btn-danger" data-dismiss="modal">
            <lang-string lang-id="FARMING_MISC_24"></lang-string>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modal-import-export" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="CHARACTER_SELECT_37"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content font-size-sm">
          <div class="row">
            <div class="col-12">
              <button class="btn btn-primary" onclick="exportSave();">
                <lang-string lang-id="CHARACTER_SELECT_37"></lang-string>
              </button>
              <br>
              <br>
              <textarea class="form-control placeholder-exported-save" id="exportSaveField" name="exportSaveField"
                rows="4" placeholder="Exported save will be here"
                onClick="this.setSelectionRange(0, this.value.length)"></textarea>
            </div>
          </div>
        </div>
        <div class="block-content block-content-full text-right border-top">
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorF:Beginning_Of_The_End" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-7-header">Beginning of the End</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-7-title">Beginning of the End</h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-7-text">
            Whether it was by some stroke of luck, divine intervention, or a demonstration of your own indefatigable
            will, you managed to bring Ahrenia back from the brink. It took momentous effort not only from you, but from
            the few living souls still left within Melvor, who desperately fought back Bane’s creatures while you were
            away.

            <br><br>
            You and Ahrenia limp back to the Capital. Days, weeks, or even months could have flown by in the time it
            took you both to walk through the war-ravaged lands surrounding the battered and broken towns and villages
            dotted throughout the charred landscape. Silent followers follow after the two of you as you made your way
            back. They had nowhere else to go. The Capital was the last bastion of safety they knew of, so they trail
            behind you, like moths following a small spark of hope in the night. Idle chatter mentioned other cities out
            in the mist, filled with survivors, holding out hope that they could weather whatever comes next.

            <br><br>
            A glimmer of relief washes over the crowd’s soot-covered faces as you and Ahrenia walk through the Capital’s
            gates. There are far fewer people, even here, than when you first left. Your entourage of weary soldiers and
            scarred peasants dissipate into the crowd, thankful to be amongst the living, and behind solid walls.

            <br><br>
            The ruler of the Capital welcomes the two of you with open arms, thankful to have a modicum of the burden
            lifted from her shoulders. She allows you both within the palace, which appears to have been converted into
            equal parts command center and soup kitchen. Rations are being dolled out to a line of hungry children while
            soldiers anxiously eye the sky and run to and fro.

            <br><br>
            Over the next few days, you rest. Ahrenia tentatively knocks on your door from time to time, bringing in
            people she’s deemed as potentially helpful. Each of them recounts similar tales of Bane, The Dark Entity.
            How he appears from seemingly nowhere, often without warning, bombarding places with a rain of fire before a
            choking carpet of black mist sweeps in shortly after.

            <br><br>
            You managed to keep a running history of all that occurred from the numerous visitors you had. It’s said
            that Bane was first spotted as The Four sequestered themselves away, deep within their dungeons. His dark
            mist swept over the entirety of the eastern lands, with those who succumbed to it raising back up once
            again. Droves of these undead creatures swept through the land, cutting a bloody swath all the way up to the
            Eastern Capital.

            <br><br>
            It was there that some of the best warriors and mages stood their ground against Bane’s army for an entire
            day, fighting on nothing but determination alone, long after their bodies had failed them. The tides turned
            in their favor, and the undead horde was driven back… until Bane appeared from the sky. Almost effortlessly,
            he made fire rain from the sky, not only tearing apart what was left of those defending the city, but
            shattering the walls in mere moments.

            <br><br>
            The undead eagerly destroyed the ravaged defense forces, which of course rose shortly after their deaths to
            join the ever-increasing horde. Massive fires broke out, consuming neighborhoods in minutes as the scattered
            and horrified civilians did all they could to escape. Few did. And of the few that managed to escape the
            slaughter, fewer still managed to hold onto their sanity after seeing those horrors. Any place not
            surrounded by thick walls had already surely fallen, much like the hamlets and villages you and Ahrenia
            passed through as you returned to the Capital.

            <br><br>
            Ahrenia let you digest the information and history over the course of a day before approaching you as you
            leave your room for the first time since entering the palace.

            <br><br>
            “Bane will come here, eventually. They’re only growing in power as more cities fall to him and his horde.”

            <br><br>
            You nod. You’re unsure of what drives him, but you already knew for certain he’d be coming here sooner or
            later.

            <br><br>
            Ahrenia was always said to be a hero, one who traded everything in exchange for incredible power. She was
            passionate, outspoken, and a natural-born leader. But now, she stands here, weary and pleading. Whatever
            confidence she once held herself with was gone, bleakly accepting the situation. She slumps against the wall
            and allows herself to slowly slide to the floor.

            <br><br>
            “I don’t know if you’ve heard. I almost struck him down, once.”

            <br><br>
            Your lips part, speaking for the first time in days. “And that’s when you were lost to the mist?”

            <br><br>
            Ahrenia seems almost surprised at hearing your voice, almost as if she didn’t expect to be heard. “Yes. He…
            Bane… Called out. To a man called The Herald. He said he failed him. The Herald… a least a man claiming to
            be him… was the same man that gave me my power.”

            <br><br>
            “This… Herald. Could he be playing both sides? And… to what end?”

            <br><br>
            She only sadly shakes her head before sighing deeply and raising once again. “I have no idea… All I know is
            that we need to be ready for whatever happens. This might not end with Bane alone…”

            <br><br>
            “How long have we got?”

            <br><br>
            She shrugs, before giving a slight smile. “I dunno. Could be a day. Could be a year. Whatever happens, if
            you were able to pull me out of that mist… I think we’ve got a shot. Rest up.”
            She claps you hard on the shoulder before turning back to her room.

            <br><br>
            You need to be ready. You have to be.

          </h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-quick-buy-item" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
  aria-modal="true" style="display: none; z-index: 1100;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="block block-rounded block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="MENU_TEXT_QUICK_BUY_ITEM"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content" id="quick-buy-item-content">
        </div>
        <div class="block-content block-content-full text-right border-top">
          <button type="button" class="btn btn-success" id="quick-buy-item-button">
            <lang-string lang-id="SHOP_MISC_8"></lang-string>
          </button>
        </div>
      </div>
    </div>
  </div>
</div><div class="interaction-blocker d-none" id="interaction-blocker"></div>
<div class="modal modal-infront" id="modal-offline-loading" data-backdrop="static" data-keyboard="false" tabindex="-1"
  role="dialog" aria-labelledby="modal-block-normal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <offline-loading id="offline-loading-modal"></offline-loading>
    </div>
  </div>
</div><div class="modal" id="modal-combat-triangle" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="overflow-x: auto;">
      <div class="block block-content" id="modal-combat-triangle-cont"></div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book8" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-17-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-17-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-17-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div
  class="modal"
  id="modal-geckoview-bugs"
  tabindex="-1"
  role="dialog"
  aria-labelledby="modal-block-normal"
  aria-hidden="true"
  style="display: none"
>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Beta Android App - Current Bugs</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content font-size-sm">
          <div class="pb-4 pt-1">
            <h4 class="font-w600 push">
              <img class="skill-icon-sm mr-2" data-src="assets/media/main/android_logo.png" />Beta Android App
            </h4>
            <p class="pt-3">
              You are seeing this because you are using the <strong>Beta Android App for Melvor Idle</strong>
            </p>
            <p>
              This popup details the current known bugs that we are actively investigation and hope to resolve soon.
            </p>

            <h5 class="font-w600 text-warning">Known Bugs</h5>
            <p class="font-w600">
              Only bugs that are due to the Native App will be listed here. General game bugs that occur on other apps
              will not be listed.
            </p>
            <ul>
              <li>
                Dragging Bank items to reorganize will cause the screen to scroll alongside your dragging action, making
                it impossible to drag items elsewhere.
              </li>
            </ul>
            <h5 class="mt-4 mb-2">How to report a bug with the app</h5>
            <button
              role="button"
              class="btn btn-secondary m-1"
              onclick="openLink(`https://github.com/MelvorIdle/melvoridle.github.io/issues`)"
            >
              Click here to report a bug
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modal-farming-seed" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <farming-seed-select class="modal-content" id="farming-seed-select"></farming-seed-select>
  </div>
</div><div class="modal" id="modal-mastery" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-content-mastery">
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book6" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-14-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-14-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-14-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book4" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-12-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-12-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-12-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-view-monster-info" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <monster-stats id="modal-monster-stats"></monster-stats>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorD:Futures_Prophecy" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">A Tale of the Past, a future's prophecy</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-0-title">A Tale of the Past, a future's prophecy</h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-0-text">
            In the early stages of our world, everything existed as an energetic and shapeless mass with endless
            possibilities outstretched before it. All it needed was a pair of skilled hands to mold it into whatever
            they saw fit. It was here that The Four each tried, in turn, to harness their abilities to create something
            meaningful. An incalculable amount of time passed as the gods each tried and failed to produce anything that
            held longstanding merit.

            <br><br>
            The Four were comprised of, Aeris, Glacia, Terran, and Ragnar, all of which attempted to rise up to the
            challenge to breathe life and creation into existence. To create something meaningful, and worth sharing
            with one another. However, despite all their efforts, individually, none of them were happy with what they
            were able to make. Frustrated with their individual lack of progress, they eventually pooled their power
            together and created the land known as Melvor.

            <br><br>
            The Four frequently consulted one another, asking for input, sharing in successes, and propping one another
            up during their failures. Everything was harmonious in the beginning, with contributions from all being
            considered and given equal weight. This went incredibly well, until the creation of… us. The Vorlorans that
            inhabit this world. The Four were incredibly divided on how to properly lead, guide, and nurture us, and
            despite having no major disagreements ever before, this was simply too dire for them to move past amicably.
            The Gods fell into disarray, frequently quarreling with one another over status, power, and how to lead us…

            <br><br>
            As The Four splintered, our world did as well, and war was raged across its entirety, egged on by the Gods
            who refused to see past their differences. Blinded by their growing hatred for one another, none saw the
            scheme of Malcs, leader of the lesser dragons. With a huge toll of lives and power, the Four were sealed
            away and held in place by Malcs’ soul, who became revered in the eyes of Melvor’s populace for such a feat.
            Without the Four’s interference or any reason to remain fighting, the once brutal and fiery war died off
            nearly overnight.

            <br><br>
            After draining himself of so much power, Malcs entered a self-imposed exile to regain his strength and guard
            himself against those who may wish to destroy him in his weakened state. Many years passed by as Malcs bound
            himself to his new home. The tales of his riches and power never ceased though, and many sought after his
            location. Nothing stays hidden forever, not even the leader of the lesser dragons. Malcs defended himself
            for years, trying to keep the Four he bound to his soul contained… until it was broken.

            <br><br>
            As his body shattered, the Four were set free once again. Four pillars of light streamed forth, darting into
            the sky:

            <br><br>
            Aeris, the God of Air’s Radiant Silver. <br>
            Glacia, the God of Water’s Soft Blue.<br>
            Terran, the God of Earth’s Mossy Green.<br>
            And Ragnar, the God of Fire’s Burning Red.<br>
            <br><br>
            All four found an endpoint within Melvor, and at the end of these beams of light rose dungeons that rivaled
            the largest and most opulent kingdoms in both size and majesty. Bitter over their imprisonment, their
            temper’s flare once again and the Gods raise armies to tear one another apart. With you at the center, what
            do you aim to do with what you’ve wrought out upon the land?

          </h5>
          <h5 class="font-w600 font-size-sm text-combat-smoke">
            <lang-string lang-id="LORE_LEARN_ABOUT"></lang-string>
          </h5>
          <div class="row gutters-tiny">
            <div class="col-6">
              <h5 class="font-w600 text-combat-smoke" id="lore-1-title">Aeris - The Air God</h5>
              <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-1-text">Radiant Silver, wings of bountiful
                colors. Aeris is known as the Loving God. Given the power of flight she travelled the world radiating
                her love and beauty towards all the populace of Melvor. In the eyes of the people she was a beacon of
                hope and a symbol of peace in which the gods upheld. When trouble arose she would always be there as if
                a guardian was always watching over. During the early times she would often meet with the other gods to
                discuss the role she would play, however she considered only one a good friend. Over the many years that
                had passed her tireless effort had left her exhausted. "It's always the same." she cried. With all her
                effort she truly believed she was doing good. But the world is cruel and ever changing. Was she really
                ever needed? she thought. Upset and no longer wanting to feel this way she decides to exact the opposite
                of what she stood for. And so in the end the once loving god of Melvor becomes the recluse. Leaving the
                people to fend for themselves. "I wonder, what does all this power amount to when its no longer there,
                what do the people do when the hero leaves?"</h5>
            </div>
            <div class="col-6"><img data-src="assets/media/misc/god_aeris.png" style="max-width:80%;"></div>
            <div class="col-6 mt-3"><img data-src="assets/media/misc/god_glacia.png" style="max-width:80%;"></div>
            <div class="col-6 mt-3">
              <h5 class="font-w600 text-combat-smoke" id="lore-2-title">Glacia - The Water God</h5>
              <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-2-text">Soft Blue, a cold heart. Glacia is
                known as the Helping God. While managing the oceans and seas she would guide lost voyagers who had gone
                astray to safety. The explorers of Melvor called her the Ocean's Spirit, for when she was happy the
                oceans were calm and when she was not the waves echoed it. The role she played was not something she
                wanted to do, but she knew it was her duty to maintain. Her true dream was to be free above the clouds
                like Aeris. Being tied to the oceans it was the only thing that was ever on her mind. However the burden
                of not being able to lied deep within her heart. Despite knowing she was shackled she would still try
                time and time again but fail. To always see Aeris soar away after their meeting was enough to break her.
                And as time went by her growing bitterness towards her role eventually escalated to hatred when Aeris
                decided she would no longer fulfil her role anymore. Having clung to this dream for so long and seeing
                someone squander it was outrageous to her. And so they argued and argued for even longer until only what
                was left was nothing but pain behind her eyes. And after all these years it had already consumed her
                inner self. "Do you pity those who use their power for everyone else knowing they can never help
                themselves? they are the ones who tread the line between a blessing and curse."</h5>
            </div>
            <div class="col-6">
              <h5 class="font-w600 text-combat-smoke" id="lore-3-title">Terran - The Earth God</h5>
              <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-3-text">Mossy Green, careless wisdom. Terran
                is known as the Entrusted god. The Earth God was the first before the others. With his power he
                transformed most of the worlds landmass to how it is seen today. All but one of the other gods respected
                him as their elder, knowing full well he would be the most knowledgeable. And so being unrestricted he
                was allowed to do whatever he wanted. The early inhabitants of Melvor saw him as the greatest of all
                which gave him all the support he needed to further continue his work. Terran would also organize the
                meetings of gods and instruct them of the role they should be upholding. But since the other gods never
                questioned him his ignorance towards everyone grew in parallel with his arrogance. As time went by to
                him there were no more boundaries, which in turn led to the anger of the other gods. But it had been so
                long, he did so much so what was different for him now? And so in his mind he was so sure he was
                betrayed when he was confined to a place where he no longer had any influence. "Solitary, confined to my
                own darkness. The whispers of a thousand cries brush over me like the wind. Is this true torture? Maybe
                not. This is the beginning of a new true king."</h5>
            </div>
            <div class="col-6"><img data-src="assets/media/misc/god_terran.png" style="max-width:80%;"></div>
            <div class="col-6"><img data-src="assets/media/misc/god_ragnar.png" style="max-width:80%;"></div>
            <div class="col-6">
              <h5 class="font-w600 text-combat-smoke" id="lore-4-title">Ragnar - The Fire God</h5>
              <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-4-text">Burning Red, a demonic ego. Ragnar
                is known as the Chaotic god. The Fire God was the youngest of all the gods. With the power of fire he
                stood above the rest in terms of strength and he knew. His fierce rivalries with the other gods and his
                lack of emotion towards everyone else was troublesome. Knowing this the other gods shunned him and for
                the benefit of all living creatures he was restrained to a lesser influence by Terran. Ragnar was
                treated like an outcast and for a god to be shackled to this kind of level was demeaning. Ragnar
                despised Terran but he also knew he was not yet strong enough to take on all three of them and so he
                decides to start scheming in the background. Through his subordinates he would start to spread rumors
                which led to hate and violence amongst the people. His targeted actions were ruthless and lingered for
                years. Knowing full well who would eventually be blamed for this, Terran. And so with the growing
                hostilities between the gods and the inevitability of war on the horizon the restraints that once held
                him back turned feeble. The others will remember why he was known as the strongest. "Patience is the key
                to everything, the weak seek to find their opportunity while the strong know when it is their time
                again." </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-ancient-relics" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <ancient-relics-menu id="modal-ancient-relics-menu"></ancient-relics-menu>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book7b" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-16-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-16-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-16-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book2" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-10-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-10-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-10-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book10" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-19-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-19-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-19-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-milestone" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="modal-content-m">
      <skill-milestone-display id="skill-milestones"></skill-milestone-display>
    </div>
  </div>
</div><div class="modal" id="modal-browse-corruptions" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document" style="height:80%;">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="VIEW_CORRUPTIONS"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full px-0">
          <div class="col-12 font-size-sm text-info mb-1">
            <div class="bg-dark rounded p-2 text-center">
              <i class="fa fa-fw fa-info-circle mr-2"></i>
              <lang-string lang-id="MENU_TEXT_CORRUPTION_INFO_1" lang-html="true"></lang-string>
            </div>
          </div>
          <div class="col-12 font-size-sm text-warning font-w600 mb-1">
            <div class="bg-dark rounded p-2 text-center">
              <i class="fa fa-exclamation-circle mr-2"></i>
              <lang-string lang-id="MENU_TEXT_CORRUPTION_INFO_2"></lang-string> <lang-string
                lang-id="MENU_TEXT_CORRUPTION_NO_DAMAGE_MODIFIERS"></lang-string>
            </div>
          </div>
          <div class="col-12 font-size-sm font-w600 mb-1">
            <div class="p-2 text-center border border-success">
              <lang-string lang-id="MENU_TEXT_CORRUPTION_EXTRA_INFO_1"></lang-string><br>
              <lang-string lang-id="MENU_TEXT_CORRUPTION_EXTRA_INFO_2"></lang-string><br>
              <lang-string lang-id="MENU_TEXT_CORRUPTION_EXTRA_INFO_3"></lang-string>
            </div>
          </div>
          <div class="col-12" id="browse-corruptions-cont">
          </div>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorTotH:Book9" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-18-header"></h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-18-title"></h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-18-text"></h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-mastery-checkpoints" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <mastery-pool-bonuses id="modal-mastery-pool-bonuses"></mastery-pool-bonuses>
    </div>
  </div>
</div><div class="modal" id="modal-account-change" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="MENU_TEXT_USERNAME_CHANGE"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content font-size-sm">
          <div id="username-change-form" class="form-group">
            <label for="example-text-input">
              <lang-string lang-id="MENU_TEXT_DESIRED_USERNAME"></lang-string>
            </label>
            <input type="text" class="form-control placeholder-username" id="username-change"
              placeholder="Letters n' stuff go here" maxlength="20">
          </div>
        </div>
        <div class="block-content block-content-full text-right border-top">
          <button type="button" id="username-change-button" class="btn btn-sm btn-primary" data-dismiss="modal"
            onClick="changeName();"><i class="fa fa-check mr-1"></i>
            <lang-string lang-id="CHARACTER_SELECT_42"></lang-string>
          </button>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-book-melvorF:Impending_Darkness" tabindex="-1" role="dialog"
  aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="height:100%;">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title" id="lore-8-header">Impending Darkness</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full text-center">
          <h5 class="font-w600 text-combat-smoke" id="lore-8-title">Impending Darkness</h5>
          <h5 class="font-w300 font-size-sm text-combat-smoke" id="lore-8-text">
            The dust settles. The battlefield around you is a charred mess with little beyond rubble around you. Ahrenia
            is close behind you, panting heavily. The creature in front of you is missing an arm, and blood pours from
            multiple wounds which should have killed him.
            <br><br>
            You cry out, “Bane, this ends now!”
            <br><br>
            Bane braces himself and calls out in return, “Herald! I. Am. Ready!”
            <br><br>
            A familiar crumbling tower appears in the distance. You’re unsure as to whether or not it was always there,
            or if it materialized out of thin air. A man appears, and trailing behind him is an inky, swirling mist.
            <br><br>
            Ahrenia manages to choke out, “It’s... That’s the Herald…”
            <br><br>
            The large, dark figure walks closer to the two of you, raising their hand and speaking as you begin to
            charge at it. “There’s nothing left for either of you to do beyond accepting your fates.”
            <br><br>

            As you get closer, you each swipe your blades at the Herald, both of which are stopped by an invisible force
            that locks them in place.
            <br><br>

            The Herald smirks. “Your trial begins now.”
            <br><br>

            He suddenly appears behind Ahrenia despite not moving and easily knocks her across the open field. She skids
            until her body hits the remains of a scorched tree. You ready your crossbow and fire it at the Herald’s
            throat, but the bolt stops inches away from it before dropping to the ground. It chuckles. “Useless.”

            <br><br>
            You continue in a frenzy, doing everything you can to land a single blow, all of which are easily deflected
            or stopped entirely by an unseen force you can only assume the Herald controls. Ahrenia joins you, side by
            side, but makes similar progress.

            <br><br>
            You both decide on a combined strike, using up what little is left of your energy. Ahrenia points her sword
            into the air and light pours into it as you prepare the Ocean Song. You both cry out, directing everything
            towards the Herald…

            <br><br>
            And then he raises a hand. “Not enough.” You’re both lifted into the air and cast aside, clattering roughly
            on the ground.

            <br><br>
            The Herald stands over Bane, and their booming voice fills the room as you both gather your senses. “You
            were the greatest of my many creations.”

            <br><br>
            The dying Bane seems to beam at the Herald’s praise. He tries to stand, but the Herald waves away his
            effort.

            <br><br>
            “Bane, you will be remembered for what happened here.” The Herald turns, their lifeless purple eyes boring
            deep within your very soul. “And you will not. You cannot stop fate.”

            <br><br>
            A moment passes before two final words leave The Herald’s mouth. “Eternum… Noxia.” A wave of energy
            instantly reverberates across the landscape. The world itself begins to twist and distort around you, before
            beginning to seemingly shake apart at its very seams. The Herald cracks a twisted, toothy smile, surveying
            the process. You lose grip on reality, and as you begin to question what’s real and what’s merely an
            illusion, the earth splits open and swallows you whole.

            <br><br>
            ***

            <br><br>
            You snap awake to an unfamiliar bed, breathless, and in a cold sweat. Ahrenia blearily rubs her eyes before
            fully taking into account that you’re awake. When she does, she gives you a sad smile.

            <br><br>
            You cough as she hands you water, which you greedily drink down. After a moment of collecting yourself, you
            manage to speak. “What… happened?”

            <br><br>
            “The Herald used Bane to cast something… unthinkable. Everywhere I know of is teeming with monsters I’ve
            never seen or heard of before. Even the capital is swarming with them. You’ve been out for a few days.”

            <br><br>
            You groan. Everything you had been building towards… was for naught. Bane may be gone, if what Ahrenia is
            saying is true… then there’s no hope left. “What now, then..?”

            <br><br>
            Surprisingly, she looks… hopeful? “We were approached by… a dragon. It seems incredibly intelligent and it
            wanted to… speak with you. A large green dragon is waiting here to be our guide. We need to leave as soon as
            possible.”

            <br><br>
            You roll out of bed to find yourself in surprisingly good shape, despite the beating you took only a couple
            of days ago. You grab your gear and leave the large tent you were placed in. Sure enough, a dragon with
            emerald scales that glitter in the sunlight lowers its head as you approach. The two of you hop on, holding
            on for dear life as it speeds towards a large volcano.

            <br><br>
            After a few minutes of flying, you slowly release your vice-like grip on the dragon. Ahrenia sits
            dumbstruck, taking in both the beauty… and horror… of the world around you. Between wispy cotton clouds, you
            catch glimpses of the changed world. It’s too difficult to make out distinct details, but large, chaotic
            scars mark the landscape. Massive fissures snake away from the battlefield, twisting in strange and unique
            patterns.

            <br><br>
            You disembark, followed shortly after by Ahrenia. Intricate carvings and decor line the walls of the
            volcano, with deep winding chambers and large piles of gold and other treasures dotted around the place. You
            finally enter a large, open room, where numerous dragons eye you anxiously. An ink-black dragon with a
            smattering of red drops its head to your level, coming eye to eye with you. “You’re the hero that your
            people spoke of. It’s truly an honor.”

            <br><br>
            Completely bewildered by the entire situation, you eye Ahrenia, who only nods in encouragement and gestures
            back to the dragon. As you struggle to find the words, the beast lets out a deep rumble. “My, you’re humble
            as well. There’s no fault in accepting praise. I understand how tired you must be, though. Unfortunately,
            there’s little time for rest.”

            <br><br>
            “Is there anything I can do at this point..?”

            <br><br>
            “Of course. We know what the Herald has done, and we need a way to stop them. We need time, and we need to
            stop the Four Gods, and then locate the Herald before it’s too late.”

            <br><br>
            A million questions surge through your mind. “The Gods..? I’ve already defeated them. What do you mean we
            need to stop them?”

            <br><br>
            Everyone in the room gives you a bewildered expression. The large dragon eyes you curiously. “This isn’t the
            time for games. As we speak, the Gods are gaining more power and more reinforcements. Reinforcements
            provided by the Herald.”

            <br><br>
            Slowly, the dragon’s words sink in as the room starts to spin. You pinch your brow between your fingers as
            you let out a shaky breath. Ahrenia gives you a pat on the back and concern washes over her face, but it’s
            only directed at you, not the situation.

            <br><br>
            “I… I... “ You start to choke out, trying to grasp the situation. You’ve… killed the Gods already. “What… do
            I call you?”

            <br><br>
            The dragon outstretches its wings and stands tall, creating quite an imposing figure. “You may call me by
            the name your people have given me. Malcs, Leader of Dragons.”

            <br><br>
            Your head swirls as the dragon’s words hang in the air. You manage to catch a glimpse outdoors as four beams
            of light shoot up into the sky, each belonging to their own respective gods.

          </h5>
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-item-upgrade" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg" role="document">
    <item-upgrade-menu class="modal-content" id="item-upgrade-menu"></item-upgrade-menu>
  </div>
</div><div class="modal" id="modal-recipe-select" tabindex="-1" role="dialog" aria-labelledby="modal-block-vcenter"
  aria-modal="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="block block-rounded block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="MENU_TEXT_SELECT_RECIPE"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content" id="modal-recipe-select-content">
        </div>
      </div>
    </div>
  </div>
</div><div class="modal" id="modal-spend-mastery-xp" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <spend-mastery-menu id="modal-spend-mastery-menu"></spend-mastery-menu>
    </div>
  </div>
</div><div class="modal" id="modal-change-worship" tabindex="-1" role="dialog" aria-labelledby="modal-block-normal"
  aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="block">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">
            <lang-string lang-id="TOWNSHIP_MENU_SELECT_WORSHIP"></lang-string>
          </h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="fa fa-fw fa-times"></i>
            </button>
          </div>
        </div>
        <div class="block-content block-content-full">
          <div id="DIV_CURRENT_WORSHIP_MODAL" class="h5 font-size-sm mb-2"></div>
          <div class="font-w600 font-size-sm mb-2 text-info"><i class="fa fa-fw fa-info-circle mr-1"></i><lang-string
              lang-id="TOWNSHIP_MENU_LOCKED_WORSHIP_NOTICE"></lang-string></div>
          <div id="DIV_WORSHIP_MODAL"></div>
          <div id="DIV_WORSHIP_MODIFIERS_MODAL"></div>
          <div id="DIV_CANNOT_CHANGE_WORSHIP_SEASON" class="font-w600 text-danger d-none">
            <i class="fa fa-fw fa-info-circle mr-1"></i>
            <lang-string lang-id="TOWNSHIP_MENU_CANNOT_CHANGE_WORSHIP_SEASON"></lang-string>
          </div>
          <button class="btn btn-primary m-1" onclick="townshipUI.showChangeWorshipSwal();"><lang-string
              lang-id="TOWNSHIP_MENU_CONFIRM_WORSHIP_CHANGE"></lang-string></button>
          <span id="TS_WORSHIP_CHANGE_COST"></span>
        </div>
      </div>
    </div>
  </div>
</div><!-- END Game Modals -->

<!-- GAME GUIDE MODAL -->
<div class="modal" id="modal-game-guide" tabindex="-1" role="dialog" aria-labelledby="modal-block-extra-large" aria-modal="true" style="display: none;">
    <div class="modal-dialog modal-xl" role="document" style="height:80%;">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title"><lang-string lang-id="GAME_GUIDE_195"></lang-string></h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="py-2 text-center" id="tutorial-page-Woodcutting">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/woodcutting/woodcutting.png" height="64px" />
    Woodcutting
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Woodcutting`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Cut down various Trees to receive Logs that can be used throughout different Skills as a resource.
  </h5>
  <h5 class="font-w400 mb-5">
    <img class="m-1" data-src="assets/media/skills/woodcutting/woodcutting.png" height="24px" /><strong
      >Woodcutting</strong
    >
    is also a great starting point to receive Seeds for
    <img class="m-1" data-src="assets/media/skills/farming/farming.png" height="24px" /><strong>Farming</strong>.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Extra Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/bird_nest.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Bird Nests</div>
              <div class="font-w400 font-size-sm">
                There is a small chance to receive a <img data-src="assets/media/bank/bird_nest.png" height="16px" />
                <strong>Bird Nest</strong> when cutting down Trees. These can be opened in the
                <img data-src="assets/media/main/bank_header.png" height="16px" /> <strong>Bank</strong> to receive
                various Allotment or Tree Seeds that can be planted in
                <img data-src="assets/media/skills/farming/farming.png" height="16px" /> <strong>Farming</strong>.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/firemaking/firemaking.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Firemaking</div>
              <div class="font-w400 font-size-sm">
                Logs are the main resource used in
                <img data-src="assets/media/skills/firemaking/firemaking.png" height="16px" />
                <strong>Firemaking</strong> to progress the skill.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Fletching</div>
              <div class="font-w400 font-size-sm">
                Logs are one of the main resources required for most items in
                <img data-src="assets/media/skills/fletching/fletching.png" height="16px" /> <strong>Fletching</strong>.
                These items are used for <img data-src="assets/media/skills/ranged/ranged.png" height="16px" />
                <strong>Ranged</strong> Combat training.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/farming/farming.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Farming</div>
              <div class="font-w400 font-size-sm">
                Plant the Allotment & Tree Seeds received from
                <img data-src="assets/media/bank/bird_nest.png" height="16px" /> <strong>Bird Nests</strong> to
                progress.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Fishing">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/fishing/fishing.png" height="64px" />
    Fishing
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Fishing`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Catch various Raw Fish within many different locations that can be used in
    <img class="m-1" data-src="assets/media/skills/cooking/cooking.png" height="24px" /> <strong>Cooking</strong>.
  </h5>
  <h5 class="font-w400 mb-5">
    Be sure to have quite a few spare <img class="m-1" data-src="assets/media/main/bank_header.png" height="24px" />
    <strong>Bank</strong> Slots to accomodate for all the possible items you can get.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="py-2 text-left">
          <h4 class="mb-2">Extra Items</h4>
        </div>
        <div class="row row-deck">
          <div class="col-12">
            <div class="block-content">
              <div class="media d-flex align-items-center push">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/bank/message_in_a_bottle.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">Special Items</div>
                  <div class="font-w400 font-size-sm">
                    Be sure to look out for <img data-src="assets/media/bank/message_in_a_bottle.png" height="16px" />
                    <strong>Special Items</strong> that you can catch. Some unlock access to secret
                    <img data-src="assets/media/skills/fishing/fishing.png" height="16px" />
                    <strong>Fishing</strong> Areas! There's also some rare items you can equip that provide bonuses to
                    Skills.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="block-content block-content-full">
              <div class="media d-flex align-items-center push">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/bank/old_boot.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">Junk Items</div>
                  <div class="font-w400 font-size-sm">
                    Those unskilled in <img data-src="assets/media/skills/fishing/fishing.png" height="16px" />
                    <strong>Fishing</strong> have a tendency to lure a few useless items known as
                    <img data-src="assets/media/bank/old_boot.png" height="16px" /> <strong>Junk</strong>. Generally,
                    these items are fairly useless.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/cooking.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Cooking</div>
              <div class="font-w400 font-size-sm">
                Fish is the main resource used in
                <img data-src="assets/media/skills/cooking/cooking.png" height="16px" /> <strong>Cooking</strong>.
                Cooked Fish can be eaten during <img data-src="assets/media/skills/combat/combat.png" height="16px" />
                <strong>Combat</strong> or <img data-src="assets/media/skills/thieving/thieving.png" height="16px" />
                <strong>Thieving</strong> to provide healing. This is how you survive your adventure.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Alt. Magic</div>
              <div class="font-w400 font-size-sm">
                <img data-src="assets/media/bank/old_boot.png" height="16px" /> <strong>Junk</strong> items can be
                converted to <img data-src="assets/media/bank/diamond.png" height="16px" /> <strong>Gems</strong> using
                the correct <img data-src="assets/media/skills/magic/magic.png" height="16px" />
                <strong>Alt. Magic</strong> Spell.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Firemaking">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/firemaking/firemaking.png" height="64px" />
    Firemaking
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Firemaking`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Burn Logs obtained from
    <img class="m-1" data-src="assets/media/skills/woodcutting/woodcutting.png" height="24px" />
    <strong>Woodcutting</strong> to progress.
  </h5>
  <h5 class="font-w400 mb-5">
    <img class="m-1" data-src="assets/media/skills/firemaking/firemaking.png" height="24px" />
    <strong>Firemaking's</strong> main purpose is to provide Global XP Modifiers to other Skills.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Extra Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ore_coal.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Coal Ore</div>
              <div class="font-w400 font-size-sm">
                Burnt Logs have a chance to provide <img data-src="assets/media/bank/ore_coal.png" height="16px" />
                <strong>Coal Ore</strong>.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/cooking.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Cooking</div>
              <div class="font-w400 font-size-sm">
                Progressing in <img data-src="assets/media/skills/firemaking/firemaking.png" height="16px" />
                <strong>Firemaking</strong> will allow you to purchase Cooking Fires from the
                <img data-src="assets/media/main/shop_header.png" height="16px" /> <strong>Shop</strong>. These provide
                huge increases in <img data-src="assets/media/skills/cooking/cooking.png" height="16px" />
                <strong>Cooking</strong> Skill XP.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Cooking">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/cooking/cooking.png" height="64px" />
    Cooking
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Cooking`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Cooking is your go to source for Food, which is used to provide healing in Combat and Thieving.
  </h5>
  <h5 class="font-w400 mb-5">
    There are 3 different Cooking Utilities provided for you to use, each housing unique Food that can be produced.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Cooking Utilities</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/cooking_fire_redwood.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Cooking Fire</div>
              <div class="font-w400 font-size-sm">For cooking all Fish and Beef products.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/furnace_3.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Furnace</div>
              <div class="font-w400 font-size-sm">For cooking Bread, Chicken, Pizza, Pies, Cupcakes & Cakes.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/pot_3.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Pot</div>
              <div class="font-w400 font-size-sm">For cooking all Soup products.</div>
            </div>
          </div>
          <div class="py-2 text-left">
            <h4 class="mb-2">Perfect Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/perfect.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <p class="font-w400 font-size-sm">
                When Active Cooking, you have a chance to receive a Perfect Version of that Product.
              </p>
              <p class="font-w400 font-size-sm">
                Perfect Items provide +10% HP Healing Value, and +50% Base Sale Price.
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Active & Passive Cooking</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 text-warning">Active Cooking</div>
              <p class="font-w400 font-size-sm">
                The standard way to cook Food. Only one product can be Active Cooked and any given time.
              </p>
              <p class="font-w400 font-size-sm">
                Grants Skill XP, Mastery XP, Mastery Pool XP, Perfect Items and rare Skill Item Drops.
              </p>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 text-warning">Passive Cooking</div>
              <p class="font-w400 font-size-sm">
                You are able to Passive Cook a product at the same time you are Active Cooking. Passive Cooking can only
                be done on Cooking Utilities that are not currently in use.
              </p>
              <p class="font-w400 font-size-sm">
                Products that are Passive Cooking take much longer to Cook than Active Cooking.
              </p>
              <p class="font-w400 font-size-sm">
                Cooked Products from Passive Cooking are added to your Stockpile ready to collect when you wish.
              </p>
              <p class="font-w400 font-size-sm">If you stop Active Cooking, all Passive Cooking will also stop..</p>
              <p class="font-w600 font-size-sm text-danger">
                No Skill XP, Mastery XP, Mastery Pool XP, Perfect Items and rare Skill Item Drops.
              </p>
              <p class="font-w600 font-size-sm text-danger">
                No Item Doubling or Skill Preservation is enabled with Passive Cooking.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Mining">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/mining/mining.png" height="64px" />
    Mining
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Mining`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Mine various types of Rocks to receive resources that can be used to progress in
    <img class="m-1" data-src="assets/media/skills/smithing/smithing.png" height="24px" /> <strong>Smithing</strong> and
    <img class="m-1" data-src="assets/media/skills/runecrafting/runecrafting.png" height="24px" />
    <strong>Runecrafting</strong>
  </h5>
  <h5 class="font-w400 mb-5">
    These Rocks only provide a set amount of resources until they become depleted. They will respawn after a certain
    period of time (Between 2 seconds and 2 minutes).
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Extra Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/diamond.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Gems</div>
              <div class="font-w400 font-size-sm">
                There is a small chance per action to receive a random
                <img data-src="assets/media/bank/diamond.png" height="16px" /> <strong>Gem</strong>.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/smithing/smithing.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Smithing</div>
              <div class="font-w400 font-size-sm">
                Use the <img data-src="assets/media/bank/ore_adamantite.png" height="16px" />
                <strong>Ores</strong> collected to Smelt
                <img data-src="assets/media/bank/bronze_bar.png" height="16px" /> <strong>Bar</strong>, that can then be
                used to create various <img data-src="assets/media/skills/combat/combat.png" height="16px" />
                <strong>Combat</strong> Gear.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/runecrafting/runecrafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Runecrafting</div>
              <div class="font-w400 font-size-sm">
                <img data-src="assets/media/bank/rune_essence.png" height="16px" /> <strong>Rune Essence</strong> is the
                main resource used to progress in
                <img data-src="assets/media/skills/runecrafting/runecrafting.png" height="16px" />
                <strong>Runecrafting</strong>, which is required to progress
                <img data-src="assets/media/skills/magic/magic.png" height="16px" /> <strong>Magic</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Fletching</div>
              <div class="font-w400 font-size-sm">
                <img data-src="assets/media/bank/diamond.png" height="16px" /> <strong>Gems</strong> collected from
                <img data-src="assets/media/skills/mining/mining.png" height="16px" /> <strong>Mining</strong> can be
                used to create <img data-src="assets/media/bank/ammo_bolt_diamond.png" height="16px" />
                <strong>Gem-Tipped Bolts</strong>, providing a high damage option for
                <img data-src="assets/media/skills/ranged/ranged.png" height="16px" /> <strong>Ranged</strong> Combat
                Training.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Crafting</div>
              <div class="font-w400 font-size-sm">
                You can also use these <img data-src="assets/media/bank/diamond.png" height="16px" />
                <strong>Gems</strong> to craft various types of
                <img data-src="assets/media/bank/ring_gold_topaz.png" height="16px" /> <strong>Jewellery</strong> that
                provide <img data-src="assets/media/skills/combat/combat.png" height="16px" />
                <strong>Combat</strong> bonuses.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Smithing">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/smithing/smithing.png" height="64px" />
    Smithing
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Smithing`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-5">
    Smelt Ores obtained from <img class="m-1" data-src="assets/media/skills/mining/mining.png" height="24px" />
    <strong>Mining</strong> to create Bars that are then used to smith various Combat Gear.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Used to Create:</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/armour_platebody_rune.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Melee Armour</div>
              <div class="font-w400 font-size-sm">
                Smith all types of Melee Armour -
                <img data-src="assets/media/bank/armour_helmet_rune.png" height="16px" /> <strong>Helmets</strong>,
                <img data-src="assets/media/bank/armour_platebody_rune.png" height="16px" />
                <strong>Platebodies</strong>,
                <img data-src="assets/media/bank/armour_platelegs_rune.png" height="16px" /> <strong>Platelegs</strong>,
                <img data-src="assets/media/bank/armour_boots_rune.png" height="16px" /> <strong>Boots</strong> &
                <img data-src="assets/media/bank/armour_gloves_rune.png" height="16px" /> <strong>Gloves</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_sword_rune.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Melee Weapons</div>
              <div class="font-w400 font-size-sm">
                Smith all types of Melee Weapons -
                <img data-src="assets/media/bank/weapon_dagger_rune.png" height="16px" /> <strong>Daggers</strong>,
                <img data-src="assets/media/bank/weapon_sword_rune.png" height="16px" /> <strong>Swords</strong>,
                <img data-src="assets/media/bank/weapon_scimitar_rune.png" height="16px" /> <strong>Scimitars</strong>,
                <img data-src="assets/media/bank/weapon_battleaxe_rune.png" height="16px" />
                <strong>Battleaxes</strong> and <img data-src="assets/media/bank/weapon_2h_rune.png" height="16px" />
                <strong>2-Handed Swords</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/arrowtips_adamant.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Arrowtips</div>
              <div class="font-w400 font-size-sm">
                Required to create <img data-src="assets/media/bank/ammo_arrow_adamant.png" height="16px" />
                <strong>Arrows</strong> in <img data-src="assets/media/skills/fletching/fletching.png" height="16px" />
                <strong>Fletching</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/dragon_javelin_heads.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Javelin Heads</div>
              <div class="font-w400 font-size-sm">
                Required to create <img data-src="assets/media/bank/weapon_javelin_dragon.png" height="16px" />
                <strong>Javelins</strong> in
                <img data-src="assets/media/skills/fletching/fletching.png" height="16px" /> <strong>Fletching</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/crossbow_head_bronze.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Crossbow Heads</div>
              <div class="font-w400 font-size-sm">
                Required to create <img data-src="assets/media/bank/weapon_crossbow_bronze.png" height="16px" />
                <strong>Crossbows</strong> in
                <img data-src="assets/media/skills/fletching/fletching.png" height="16px" /> <strong>Fletching</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/headless_bolts.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Headless Bolts</div>
              <div class="font-w400 font-size-sm">
                Required to create <img data-src="assets/media/bank/ammo_bolt_diamond.png" height="16px" />
                <strong>Gem-Tipped Bolts</strong> in
                <img data-src="assets/media/skills/fletching/fletching.png" height="16px" /> <strong>Fletching</strong>.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Combat</div>
              <div class="font-w400 font-size-sm">
                Smithing is one of the main Skills used to create Melee Combat Gear. This is used to train
                <img data-src="assets/media/skills/attack/attack.png" height="16px" /> <strong>Attack</strong>,
                <img data-src="assets/media/skills/strength/strength.png" height="16px" /> <strong>Strength</strong>,
                and <img data-src="assets/media/skills/defence/defence.png" height="16px" /> <strong>Defence</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Fletching</div>
              <div class="font-w400 font-size-sm">
                All items in <img data-src="assets/media/skills/fletching/fletching.png" height="16px" />
                <strong>Fletching</strong> (Except Shortbows and Longbows) require resources obtained via
                <img data-src="assets/media/skills/smithing/smithing.png" height="16px" /> <strong>Smithing</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Crafting</div>
              <div class="font-w400 font-size-sm">Silver and Gold Bars are required to craft Jewellery.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Thieving">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/thieving/thieving.png" height="64px" />
    Thieving
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Thieving`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-5">
    Pickpocket NPCs to gain GP as well as various items. Be sure to pay attention to your Hitpoints as NPCs may spot you
    and stun you, dealing damage in the process.
  </h5>
  <h5>The Art of Stealth</h5>
  <div class="justify-vertical-center">
    <p>
      A good thief never gets caught. In order to accomplish this, you need to increase your
      <span class="text-warning">Stealth</span>.
    </p>
    <h6 class="font-w500 text-combat-smoke">
      <span class="text-warning">Stealth</span> can be increased in a number of ways:
    </h6>
    <ul class="text-left">
      <li>Increasing your Thieving level</li>
      <li>Increasing your Mastery level</li>
      <li>Filling your Thieving Mastery Pool</li>
      <li>Equipping items with <span class="text-warning">Stealth</span> bonuses</li>
      <li>Potions from Herblore</li>
      <li>Agility Courses</li>
    </ul>
    <h6 class="font-w500 text-combat-smoke">
      Your <span class="text-warning">Stealth</span> competes against an NPC's
      <span class="text-danger">Perception</span>
    </h6>
    <ul class="text-left">
      <li>
        Your success rate is determined by: 100 x (100 + <span class="text-warning">Stealth</span>) / (100 +
        <span class="text-danger">Perception</span>) %
      </li>
      <li>
        Your chance to double items is increased by: 25 x (<span class="text-warning">Stealth</span> /
        <span class="text-danger">Perception</span>) %
      </li>
      <li>
        Your chance to receive an NPC's unique item is: ((100 + <span class="text-warning">Stealth</span>) /
        <span class="text-danger">Perception</span>) / 100 %
      </li>
    </ul>
  </div>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Extra Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/herb_sack.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Herb Sack</div>
              <div class="font-w400 font-size-sm">
                Pickpocketting the Farmer NPC has a chance to provide a Herb Sack. These can be opened via the Bank to
                receive random Herb Seeds that can be planted in
                <img data-src="assets/media/skills/farming/farming.png" height="16px" /> <strong>Farming</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/bobbys_pocket.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Unique Items</div>
              <div class="font-w400 font-size-sm">
                There are several unique Items you can obtain via
                <img data-src="assets/media/skills/thieving/thieving.png" height="16px" /> <strong>Thieving</strong>. Be
                sure to watch out for them.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Crafting</div>
              <div class="font-w400 font-size-sm">
                You might discover some unique materials that can be used to craft bags that enhance other skills.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Farming">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/farming/farming.png" height="64px" />
    Farming
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Farming`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Plant your Allotment, Herb or Tree Seeds to produce their grown counter-part. Crops have a 50% chance to die if
    Compost or Weird Gloop is not used.
  </h5>
  <h5 class="font-w400">
    Allotments can be used as a source of Food. Herbs are used to create Potions in Herblore, and Trees are the main
    source of Skill XP in Farming.
  </h5>
  <h5 class="font-w400 mb-5">You are able to perform all Farming actions alongside any other Skill.</h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Extra Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm">There are no Extra Items in Farming.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/herblore/herblore.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Herblore</div>
              <div class="font-w400 font-size-sm">
                Herbs are the main resource required to create any Potion within
                <img data-src="assets/media/skills/herblore/herblore.png" height="16px" /> <strong>Herblore</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Combat</div>
              <div class="font-w400 font-size-sm">
                Allotments can be used as a basic source of Food to restore your
                <img data-src="assets/media/skills/hitpoints/hitpoints.png" height="16px" /> <strong>Hitpoints</strong>.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Fletching">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="64px" />
    Fletching
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Fletching`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-5">Used to create all Weapons and Ammo used for Ranged Combat Training.</h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Used to Create:</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_shortbow_normal.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Shortbows & Longbows</div>
              <div class="font-w400 font-size-sm">Standard Two-Handed Ranged Weaponary. Requires Arrows as Ammo.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ammo_arrow_dragon.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Arrows</div>
              <div class="font-w400 font-size-sm">Ammo required for Shortbows & Longbows. Standard damage output.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_crossbow_adamant.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Crossbows</div>
              <div class="font-w400 font-size-sm">One-Handed Ranged Weaponary. Requires Gem-Tipped Bolts as Ammo.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ammo_bolt_diamond.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Gem-Tipped Bolts</div>
              <div class="font-w400 font-size-sm">Ammo required for Crossbows. High damage output.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_javelin_rune.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Javelins</div>
              <div class="font-w400 font-size-sm">Acts as both a Weapon and Ammo. Standard damage output.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/ranged/ranged.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Ranged</div>
              <div class="font-w400 font-size-sm">
                Fletching is your gateway to training Ranged Combat, providing all required resources necessary to
                progress.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Crafting">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="64px" />
    Crafting
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Crafting`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-5">
    Used to create Armour for Ranged Combat, as well as Jewellery for general Combat bonuses.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Used to Create:</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/armour_hard_leather_body.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Leather Armour</div>
              <div class="font-w400 font-size-sm">
                Very Basic Defensive gear, suitable for
                <img data-src="assets/media/skills/ranged/ranged.png" height="16px" /> <strong>Ranged</strong> Combat
                Training.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/armour_dragonhide_green_body.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Dragonhide Armour</div>
              <div class="font-w400 font-size-sm">
                Strong Defensive gear, suitable for
                <img data-src="assets/media/skills/ranged/ranged.png" height="16px" /> <strong>Ranged</strong> Combat
                Training.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ring_gold_topaz.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Rings & Necklaces</div>
              <div class="font-w400 font-size-sm">
                All purpose Combat Jewellery. Be sure to read the bonuses some of these items provide.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/ranged/ranged.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Ranged</div>
              <div class="font-w400 font-size-sm">
                <img data-src="assets/media/skills/crafting/crafting.png" height="16px" />
                <strong>Crafting</strong> provides the necessary Armour for
                <img data-src="assets/media/skills/ranged/ranged.png" height="16px" /> <strong>Ranged</strong> Combat.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Combat</div>
              <div class="font-w400 font-size-sm">
                The Jewellery is a great starting point to aid with
                <img data-src="assets/media/skills/combat/combat.png" height="16px" /> <strong>Combat</strong> in
                general.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Runecrafting">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/runecrafting/runecrafting.png" height="64px" />
    Runecrafting
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Runecrafting`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-5">
    Used to create Runes for Magic Combat & Alt. Magic, as well as Magic Weapons & Gear to assist with your adventure.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Used to Create:</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/rune_fire.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Standard Runes</div>
              <div class="font-w400 font-size-sm">Your basic Runes. Required to cast any form of Magic Spell.</div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/rune_lava.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Combination Runes</div>
              <div class="font-w400 font-size-sm">
                These are a combined Elemental Rune. An alternative to Standard Runes that can be more efficient at
                times.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/mystic_water_staff.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Staves & Wands</div>
              <div class="font-w400 font-size-sm">
                Required to cast Magic Spells in Combat. Provides Rune reduction cost for most Magic Spells.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/wizard_hat_fire_expert.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Elemental Wizard Gear</div>
              <div class="font-w400 font-size-sm">
                All purpose Magic Combat Gear. Provides elemental damage bonuses respective to their base.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Magic & Alt. Magic</div>
              <div class="font-w400 font-size-sm">
                <img data-src="assets/media/skills/runecrafting/runecrafting.png" height="16px" />
                <strong>Runecrafting</strong> is your gateway to training
                <img data-src="assets/media/skills/magic/magic.png" height="16px" /> <strong>Magic</strong>, providing
                all required resources necessary to progress.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Herblore">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/herblore/herblore.png" height="64px" />
    Herblore
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Herblore`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-2">
    Brew countless Potions that provide benefits to all Skills within the game by using Herbs you grow within Farming.
  </h5>
  <h5 class="font-w400 mb-5">
    Potions can be activated by selecting the
    <img data-src="assets/media/skills/herblore/potion_empty.png" height="24px" /> <strong>Potion</strong> Button in the
    top right of the screen on the respective page associated with that Potion.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Used to Create:</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/herblore/potion_combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Combat Potions</div>
              <div class="font-w400 font-size-sm">
                Provides bonuses for all <img data-src="assets/media/skills/combat/combat.png" height="16px" />
                <strong>Combat</strong> Skills. Only one Potion may be active at a time in
                <img data-src="assets/media/skills/combat/combat.png" height="16px" /> <strong>Combat</strong>.
              </div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/herblore/potion_skills.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Skill Potions</div>
              <div class="font-w400 font-size-sm">
                Provides bonuses for all non-Combat Skills. One Potion per non-Combat Skill can be active at any given
                time.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/main/logo.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">All Skills</div>
              <div class="font-w400 font-size-sm">Herblore interacts with every Skill within the game.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-AltMagic">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="64px" />
    Alt. Magic
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Alternative_Magic`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Alt. Magic is a secondary method to progress in the Magic Skill using non-Combat abilities. You are still training
    Magic as a whole.
  </h5>
  <h5 class="font-w400 mb-5">
    All Alt. Magic Spells require Runes created in Runecrafting to cast. Some Spell also require you to select an item
    by clicking on the Magic Hat image.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Extra Items</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm">There are no Extra Items in Alt. Magic.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Skill Interactions</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Magic</div>
              <div class="font-w400 font-size-sm">
                Although you're training the exact same Skill, progressing in Alt. Magic can also unlock all the
                Milestones available for Magic Combat.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-GolbinRaid">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/pets/golden_golbin.png" height="64px" />
    Golbin Raid
  </h2>
  <h5 class="font-w400 mb-5">Yet to complete.</h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-5">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/milestones_header.png" height="64px" />
    Milestones
  </h2>
  <h5 class="font-w400">This Page details all unlocks available for each Skill in the game.</h5>
  <h5 class="font-w400 mb-5">Simply select a Skill to view the unlocks from Level 1-99.</h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-12">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/mastery_header.png" height="64px" />
    Mastery
  </h2>
  <h5 class="font-w400">The Mastery System is a secondary leveling experience within Melvor Idle.</h5>
  <h5 class="font-w400 mb-5">
    Items and Content within non-Combat Skills have individual levels attached to them. As you perform actions on those
    Items, you gain Mastery XP for that Item, as well as for your Mastery Pool to spend elsewhere in the Skill.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/main/mastery_header.png" height="24px" /> <strong>Mastery XP</strong>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                For every action you perform within a Skill, you gain separate
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> for
                that item you were performing the action on. Each Item will provide a different amount of
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> per
                item depending on a few factors (Set out below).
              </div>
              <div class="font-w400 font-size-sm">
                There is 3 different ways to increase the amount of
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> you
                earn per Item: Increasing the Mastery Level for that Item, Increasing the Total Mastery Level for that
                Skill, Unlocking more Milestones within the Skill.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/main/mastery_pool.png" height="24px" /> <strong>Mastery Pool</strong>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                The <img data-src="assets/media/main/mastery_pool.png" height="16px" /> <strong>Mastery Pool</strong> is
                an extra mechanic to assist with increasing the Mastery Level of items.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                For every action you perform within a Skill, extra
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> is
                added to your <img data-src="assets/media/main/mastery_pool.png" height="16px" />
                <strong>Mastery Pool</strong> for that Skill which can then be spent to increase the Mastery Level of
                other items within the same Skill.
              </div>
              <div class="font-w400 font-size-sm">
                To be exact: an extra 25% of the <img data-src="assets/media/main/mastery_header.png" height="16px" />
                <strong>Mastery XP</strong> you earn from the action is added to your
                <img data-src="assets/media/main/mastery_pool.png" height="16px" /> <strong>Mastery Pool</strong>. This
                is increased to 50% when you achieve Level 99 for that Skill.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Mastery Pool Checkpoints</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Filling up your Mastery Pool will unlock Checkpoints, which are extra bonuses provided to your for
                keeping your Mastery Pool filled with Mastery XP.
              </div>
              <div class="font-w400 font-size-sm">
                Mastery Pool Checkpoints are unlocked when your Mastery Pool is filled to 10%, 25%, 50% and 95%. All
                four bonuses can be active at the same time.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Mastery Item Bonuses</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Progressing in Mastery Levels for the Item will unlock extra bonuses that generally apply to that Item
                only, with the exception of some Skills.
              </div>
              <div class="font-w400 font-size-sm">
                Be sure to read the Unlocks available for that Skill to get an idea on what you can achieve.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Statistics">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/statistics_header.png" height="64px" />
    Statistics
  </h2>
  <h5 class="font-w400">This Page details many different Statistics that is tracked within the game.</h5>
  <h5 class="font-w400 mb-5">
    Currently, it is very basic in the Statistics it provides, but it is scheduled for an overhaul in a future Major
    Update.
  </h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Settings">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/settings_header.png" height="64px" />
    Settings
  </h2>
  <h5 class="font-w400">
    This Page provides you with options to toggle various elements of the game on and off. This includes general
    gameplay settings, interface and account settings.
  </h5>
  <h5 class="font-w400 mb-5">Be sure to always check back here every update in case something new has arrived!</h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Shop">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/shop_header.png" height="64px" />
    Shop
  </h2>
  <h5 class="font-w400 mb-5">Yet to complete.</h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Bank">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/bank_header.png" height="64px" />
    Bank
  </h2>
  <div class="col-12">
    <div class="py-5 text-center">
      <h4 class="font-w400 text-muted mb-5">
        The Bank is one of the most important aspects of the game. This is where all your items are stored for use.
      </h4>
      <div class="col-12">
        <div class="row row-deck">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="block-content block-content-full">
              <div class="py-2 text-center">
                <h4 class="mb-2">Bank Space</h4>
              </div>
              <p class="font-size-sm text-dark text-left">
                You start out with very limited bank space, but you can buy more within the Shop!
              </p>
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-6">
            <div class="block-content block-content-full">
              <div class="py-2 text-left">
                <h4 class="mb-2">
                  <img class="mr-2" data-src="assets/media/skills/combat/food_empty.png" height="36px" />Bank Tabs
                </h4>
              </div>
              <p class="font-size-sm text-dark text-left">
                Every one is provided 10 Bank tabs to organise their inventory. These tabs allow for easy organisation,
                as well as quick access to items you need.
              </p>
              <p class="font-size-sm text-dark text-left">
                For Desktop users, you are able to drag any item into any tab you wish. For everyone else, there is an
                option at the top of the bank to quickly move items into new tabs. Kind of like a Bulk Move Item mode.
              </p>
              <p class="font-size-sm text-dark text-left">
                The first item within the Tab determines the image that is displayed.
              </p>
            </div>
          </div>

          <div class="col-12 col-xl-6">
            <div class="block-content block-content-full bg-light">
              <div class="py-2 text-center">
                <img data-src="assets/media/updates/v017_bank_tabs.png" style="max-height: 400px; max-width: 80%" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="block-content block-content-full">
              <div class="py-2 text-left">
                <h4 class="mb-2">Bank Layout</h4>
              </div>
              <p class="font-size-sm text-dark text-left">
                The Bank is separated into two sections: The Main Container and the Bank Sidebar.
              </p>
              <p class="font-size-sm text-dark text-left">
                The Main Container is just like it has always been, the section that stores all your items.
              </p>
              <p class="font-size-sm text-dark text-left">
                The Bank Sidebar - Selecting an item will display this sidebar with all details and actions relating to
                your item.
              </p>
              <p class="font-size-sm text-dark text-left">
                This new Bank Sidebar allows for easy scaling with new mechanics and ideas around items.
              </p>
              <p class="font-size-sm text-dark text-left">
                You are also able to see the Item Stats for the selected item, as well as change settings relating to
                the bank including <strong>New Bank Sorting Options</strong>.
              </p>
              <p class="font-size-sm text-dark text-left">
                On Mobile devices, this Bank Sidebar will pop-out for you when selecting an item.
              </p>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="block-content block-content-full bg-light">
              <div class="py-2 text-center">
                <img
                  class="m-2"
                  data-src="assets/media/updates/v017_bank_sidebar.png"
                  style="max-height: 800px; max-width: 80%"
                />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="block-content block-content-full">
              <div class="py-2 text-left">
                <h4 class="mb-2">Bulk Selling</h4>
              </div>
              <p class="font-size-sm text-dark text-left">
                Another new option you get is the ability to Bulk Sell All of your items.
              </p>
              <p class="font-size-sm text-dark text-left">
                By simply activating the option at the top of the Bank, you will be able to mark any unlocked item for
                Sale to quickly remove them from your Bank.
              </p>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="block-content block-content-full bg-light">
              <div class="py-2 text-center">
                <img
                  class="m-1"
                  data-src="assets/media/updates/v017_bank_sell_mode.png"
                  style="max-height: 600px; max-width: 80%"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Combat">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="64px" />
    Combat
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Combat`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400 mb-2">Combat provides a in-depth experience for those who enjoy high risk, high reward.</h5>
  <h5 class="font-w400 mb-5">
    With a selection of 3 different Attack Styles, and an assortment of Enemies and Dungeons to encounter, you will be
    required to test your Skill to master what there is to come.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" /> <strong>Combat Skills</strong>
            </h4>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/attack/attack.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Attack
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Attack`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm">
                    Each Level increases your Melee Accuracy Rating (Higher chance to hit). Increasing Attack Levels
                    also unlocks more powerful Melee Weapons for you to Equip.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/strength/strength.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Strength
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Strength`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm">
                    Each Level increases your Max Hit for Melee. Sometimes it takes more than one Level to increase the
                    Max Hit.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/defence/defence.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Defence
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Defence`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm">
                    Each Level increases your Evasion Rating for Melee, Ranged and Magic (Higher chance to evade Enemy
                    hits). Increasing Defence Levels also unlocks more powerful Armour for you to Equip.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/hitpoints/hitpoints.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Hitpoints
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Hitpoints`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm">Each Level increases your Maximum Hitpoints.</div>
                  <div class="font-w400 font-size-sm">For Standard Players, your Health Regenerates over time.</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/ranged/ranged.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Ranged
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Ranged`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm">
                    Each Level increases your Ranged Accuracy Rating. Increasing Ranged Levels also unlocks more
                    powerful Ranged Weapons & Armour for you to Equip.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Magic
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Magic`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm">
                    Each Level increases your Magic Accuracy Rating and your Magic Evasion Rating. Increasing Magic
                    Levels also unlocks more powerful Magic Spells, Weapons & Armour for you to Equip and Use.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/prayer/prayer.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Prayer
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Prayer`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm mb-2">
                    Prayers are active Buffs you can apply to yourself at the cost of Prayer Points. Prayer Points are
                    obtained by burying Bones from the Bank that you collect by slaying Enemies.
                  </div>
                  <div class="font-w400 font-size-sm">
                    Prayer Experience can only be granted using Active Prayers that specify that they provide Prayer XP.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/slayer/slayer.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">
                    Slayer
                    <a
                      id="item-wiki-link"
                      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
                      onclick="openLink(`https://wiki.melvoridle.com/w/Slayer`);"
                    >
                      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
                    </a>
                  </div>
                  <div class="font-w400 font-size-sm mb-2">
                    Slayer is a Skill where you are given a Task to complete. This Task involves the Slaying of selected
                    Enemies.
                  </div>
                  <div class="font-w400 font-size-sm mb-2">
                    Slaying Enemies from your Slayer Tasks grant Slayer Coins which can be spent within the Shop to
                    unlock more Weapons & Armour.
                  </div>
                  <div class="font-w400 font-size-sm mb-2">
                    Slaying XP is earned by defeating Slayer Task Enemies, or by simply slaying Enemies within Slayer
                    Areas.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" />
              <strong>Important Combat Stats</strong>
            </h4>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600">Max Hit</div>
                  <div class="font-w400 font-size-sm">The Maximum Amount of Damage you deal per Attack.</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600">Chance to Hit</div>
                  <div class="font-w400 font-size-sm">This is your % chance to land a hit.</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600">Accuracy Rating</div>
                  <div class="font-w400 font-size-sm">
                    The number that determines your Chance to Hit. The goal is to keep this number
                    <strong>higher</strong> than the Enemy's Evasion Rating for the
                    <img data-src="assets/media/skills/attack/attack.png" height="16px" />
                    <img data-src="assets/media/skills/ranged/ranged.png" height="16px" />
                    <img data-src="assets/media/skills/magic/magic.png" height="16px" />
                    <strong>Attack Type</strong> you are currently using.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600">Dmg Reduction</div>
                  <div class="font-w400 font-size-sm">The % amount of Damage that is ignored from Enemy Attacks.</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600">Evasion</div>
                  <div class="font-w400 font-size-sm">
                    This number determines the Enemy's chance to hit you. The goal is to keep the Evasion number for the
                    Enemy's <img data-src="assets/media/skills/attack/attack.png" height="16px" />
                    <img data-src="assets/media/skills/ranged/ranged.png" height="16px" />
                    <img data-src="assets/media/skills/magic/magic.png" height="16px" /> <strong>Attack Type</strong>
                    <strong>higher</strong> than the Enemy's Accuracy Rating.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" /> <strong>Combat Areas</strong>
            </h4>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">Combat Areas</div>
                  <div class="font-w400 font-size-sm mb-2">
                    Standard Combat Areas. Start here on your Combat Journey.
                  </div>
                  <div class="font-w400 font-size-sm">Large Variety of Monsters and Drops.</div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/slayer/slayer.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">Slayer Areas</div>
                  <div class="font-w400 font-size-sm mb-2">Great for Slayer Training.</div>
                  <div class="font-w400 font-size-sm">
                    Killing Monsters here grants Slayer XP. Some Areas require Special Items or Slayer Level to access.
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/combat/dungeon.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600">Dungeons</div>
                  <div class="font-w400 font-size-sm mb-2">
                    Fight through various types of Enemies to reach the final Boss. Slay the Boss to receive high value
                    rewards.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" /> <strong>Combat Triangle</strong>
            </h4>
            <div class="font-w400 font-size-sm">
              Monsters have varying Attack Styles. These Attack Styles determine
              <img data-src="assets/media/main/cb_triangle_icon.png" height="16px" /> <strong>Modifiers</strong> to your
              Max Hit and Damage Reduction.
            </div>
            <img class="m-2" data-src="assets/media/main/cbtriangle_v2.svg?2" style="width: 100%" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Agility">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/agility/agility.png" height="64px" />
    Agility
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Agility`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Construct your very own Obstacle Course to provides many different Global Active Passives to your Character.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Obstacles</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                You can build up to 10 different Obstacles, categorized into their own sections of the Obstacle Course.
              </div>
              <div class="font-w400 font-size-sm mb-2">You may destroy and swap Obstacles as you wish.</div>
              <div class="font-w400 font-size-sm mb-2">
                Obstacles will become inactive if there is a gap in your Obstacle Course. This means the Global Active
                Passives will become Inactive. The game will tell you when this happens.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Passive Pillars</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">At Level 99 Agility, you unlock a Passive Pillar.</div>
              <div class="font-w400 font-size-sm mb-2">
                These provide Global Active Passives just like Obstacles do, but are not actually an Obstacle that you
                must complete.
              </div>
              <div class="font-w400 font-size-sm mb-2">These are only active when all 10 Obstacles are built.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Summoning">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/summoning/summoning.png" height="64px" />
    Summoning
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Summoning`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Discover Marks, create and Summon Familiars, and unlock Synergies to assist you throughout the entire game.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Marks</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Discovering Marks is the first step in your Summoning journey.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                These can be discovered by performing any action in the Skill that the Mark defines. Continue to perform
                actions in this Skill to find more Marks, and level up.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Having the respective Familiar equipped will double the Mark's drop rate.
              </div>
              <div class="font-w700 font-size-sm mb-2 text-warning">
                Note: You must create at least 1 Summoning Tablet for this Mark to find more after the first one is
                found.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Familiars</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">Your companion throughout the game.</div>
              <div class="font-w400 font-size-sm mb-2">
                Discovering 1 Mark will allow you to create Summoning Tablets. These Tablets can then be equipped from
                the Bank to provide passive bonuses for you.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Familiars use 1 charge per action in it's relative Skill. Combat Familairs uses 1 charge each time it
                attacks in Combat.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Synergies</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Continue to level up your Marks to unlock Synergies between other Familiars.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Equipping two Familiars with an unlocked Synergy will grant an extra bonus on top of their existing
                passives.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Familiars use an extra 1 charge each per action with the Synergy active.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Astrology">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/astrology/astrology.png" height="64px" />
    Astrology
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Astrology`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Astrology involves the study of constellations and gaining knowledge that can greatly benefit you. By continuing to
    study these constellations, you can gain many permanent benefits that greatly increase your power across all aspects
    of the game.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Studying Constellations</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                You gain Skill XP by studying various Constellations. These Constellations provide specific bonuses to
                Skills that are listed.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                As you increase your Mastery Level, you will unlock new Stars that can be upgraded to earn powerful
                bonuses.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Stardust & Golden Stardust</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                While studying, your character may spot falling stars from the sky. These will automatically grant you
                Stardust and Golden Stardust.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                These items can be used to upgrade stars within constellations, granting permanent incremental
                modifiers.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="py-2 text-center" id="tutorial-page-Township">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/township/township.png" height="64px" />
    Township
    <a
      id="item-wiki-link"
      class="btn btn-sm btn-outline-secondary p-0 wiki-link ml-2 pointer-enabled"
      onclick="openLink(`https://wiki.melvoridle.com/w/Township`);"
    >
      <img data-src="assets/media/main/wiki_logo.svg?2" class="skill-icon-xs" />
    </a>
  </h2>
  <h5 class="font-w400">
    Township is a Skill that is designed to passively progress in the background while you train in other areas of the
    game, and acts as a utility Skill to assist with your progression. It is not designed to be solely focused on.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-12">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">Town Updates & Earning Skill XP</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Your Town will update every <strong>1 hour</strong>, even when you are Offline. When your Town updates,
                you will gain resources and Skill XP.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                The amount of Skill XP you earn every update is based on your Town's <strong>Population</strong>.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Offline Town Updates follow the same rules as regular Offline, which is capped at 24 hours.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/summer.png" />Seasons
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Township has Seasons which provide various bonuses and debuffs to the Skill depending on which one is
                currently active.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Seasons always last 3 days, and you can view the Season rotation by selecting "View Season Modifiers"
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Some Worships have secret rare Seasons which can some times occur.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/population.png" />Population (Skill
              XP)
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                This determines the amount of Skill XP you earn every Town update. Keep this high to progress faster in
                the Skill.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/storage.png" />Storage
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Township requires its own resources to progress and construct Buildings. These resources are stored
                within Township itself, and the maximum amount is determined by your Storage amount.
              </div>
              <div class="font-w400 font-size-sm mb-2">Keep this number high to store more resources over time.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/happiness.png" />Happiness
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                This will increase your Population, which in turn will increase the Skill XP you earn every Town Update.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/education.png" />Education
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                This will increase the amount of resources you generate within Township every Town Update.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/health.png" />Health
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Your Town's current Population is modified by the Health percent. The lower this is, the lower your
                Population will become.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                At level 15 Township, Health will be reduced by 1% every Town update. This number cannot go below 20%.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                You can increase the Health value by spending Herbs or Potions within the Town menu.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/worship.png" />Worship
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Displays information regarding your selected Worship, and the current progress to your next bonus.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Hover over or tap this icon to see what bonuses your selected Worship provides.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_town.png" />Town
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                The main menu of the Skill which displays a breakdown of your current Town, and allows you to construct
                more buildings.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_tasks.png" />Tasks
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Complete various Tasks to earn rewards both within Township and outside of the Skill.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Be sure to check this menu regularly for the <strong>Casual Tasks</strong> that appear every 5 hours.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_trader.png" />The Trader
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                This is where you can convert your own raw resources from the Bank into Township to assist in
                progression.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                You are also able to convert resources from Township for rare and unique Consumables that will assist in
                the general game.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                The Trader requires a Trading Post to be constructed within your Town to access.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_yeet.png" />Manage Storage
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Here you can manage your Township resources by setting resource caps, or remove resources that are
                taking up too much storage space.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Cartography">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/cartography/cartography.png" height="64px" />
    Cartography
  </h2>
  <h5 class="font-w400">
    Explore the Map of Melvor and uncover many hidden areas and secrets throughout your journey.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-lg-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Starting off - Earn Skill XP by Surveying Hexes</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Each Survey action will grant Skill XP based on the level of the Hex.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                To begin earning Skill XP, click/tap an undiscovered Hex and select either “Auto Survey” or “Survey”
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">“Auto Survey” (How to idle)</div>
              <div class="font-w400 font-size-sm mb-2">
                "Auto Survey" will automatically queue Hexes in a predefined order to survey, allowing you to idle the
                Skill until you manually stop training or decide to travel.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                This is the recommended method to survey Hexes for a true Idle experience.
              </div>
              <div class="font-w600 font-size-sm mb-2">
                Important Note: Auto Survey will ignore "Survey Range" as it continues to survey Hexes. In the event
                Auto Surveying is stopped, you must be within "Survey Range" of a Hex to begin surveying again.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">"Survey"</div>
              <div class="font-w400 font-size-sm mb-2">
                The “Survey” button allows you to manually queue which Hexes to survey for a more curated experience.
                Each individual Hex that you queue for surveying must be within your “Survey Range”.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Training will stop when all queued Hexes have been surveyed to Max Level.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Mechanics</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">Surveying</div>
              <div class="font-w400 font-size-sm mb-2">
                Surveying Hexes is the primary mechanic of Cartography which will allow you to slowly uncover the Map of
                Melvor and discover various locations that will help with Archaeology and Combat.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Each Hex has its own “Max Level” which when reached, will allow you to travel to that Hex.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Traveling</div>
              <div class="font-w400 font-size-sm mb-2">
                You are able to travel around the Map of Melvor on Hexes that have been surveyed to Max Level.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Travelling comes at a cost of GP per Hex you travel across. The pathfinding algorithm for traveling will
                always choose the cheapest route possible.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Survey Range & Sight Range</div>
              <div class="font-w400 font-size-sm mb-2">
                <strong>Survey Range</strong> determines what Hexes can be surveyed from your current location. You must
                be within the Survey Range of a Hex to begin a survey action. This is denoted by a light grey Hex.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <strong>Sight Range</strong> acts as your vision, allowing you to see if anything is hiding beneath a
                Hex within a certain range.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Undiscovered Hexes</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="px-3">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-success mb-1">"!" Hexes</div>
              <div class="font-w400 font-size-sm mb-2">Denotes an Archaeology "Dig Site" exists underneath.</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="px-3">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">"?" Hexes</div>
              <div class="font-w400 font-size-sm mb-2">Denotes a "Point of Interest".</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Discovered Hexes</h4>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="px-3">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">
                <img class="skill-icon-sm mr-2" data-src="assets/media/skills/cartography/sprites/dig_site.png" />Dig
                Site
              </div>
              <div class="font-w400 font-size-sm mb-2">An Archaeology "Dig Site".</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="px-3">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">
                <img
                  class="skill-icon-sm mr-2"
                  data-src="assets/media/skills/cartography/sprites/point_of_interest.png"
                />Point of Interest
              </div>
              <div class="font-w400 font-size-sm mb-2">
                A standard "Point of Interest" which will some times provide Item rewards.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="px-3">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">
                <img
                  class="skill-icon-sm mr-2"
                  data-src="assets/media/skills/cartography/sprites/active_poi.png"
                />Active Point of Interest
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Provides powerful permanent modifiers. Requires you to be located on the Hex to become active.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="px-3">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">
                <img class="skill-icon-sm mr-2" data-src="assets/media/skills/cartography/sprites/port.png" />Port
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Used when traveling to significantly reduce GP cost to get to a location. These are automatically used
                when traveling.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Discovering Dig Sites &amp; Creating Maps for Archaeology</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Before you can train Archaeology, you must first locate Dig Sites within Cartography and then create
                Maps.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Discovering a Dig Site</div>
              <div class="font-w400 font-size-sm mb-2">
                Dig Sites are marked with a "!" on the undiscovered Hex. When you survey this Hex to maximum level, you
                will be able to create Maps for it - the primary requirement for excavating Dig Sites in Archaeology.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Creating Maps for Dig Sites</div>
              <div class="font-w400 font-size-sm mb-2">
                Select the "Create Map" button at the top of Cartography to begin making Maps.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                First, you need to create Paper which is made out of any Log of your choosing.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Next, select "Map Creation" create a Maps for the selected Dig Site. This will use Paper per action to
                increase the power of the Map.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Map Tiers</div>
              <div class="font-w400 font-size-sm mb-2">
                There are 4 tiers of Maps - Poor, Fine, Excellent and Perfect. While creating a Map, it will
                automatically upgrade to the next tier based on the amount of Upgrade Actions required.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Map Actions</div>
              <div class="font-w400 font-size-sm mb-2">
                The "Actions Remaining" listed on a Map determines the amount of uses it has within Archaeology until it
                disappears. A Map can have up to 20,000 actions.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                You are able to use a Map in Archaeology whenever you want, as long as it has actions remaining.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Artefact Values</div>
              <div class="font-w400 font-size-sm mb-2">
                This value determines your chance at obtaining an Artefact of that size from the Dig Site within
                Archaeology. The lower the number, the higher the chance of obtaining one.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                When upgrading a Map to the next tier, these numbers will reduce, providing you with a better chance per
                action to obtain the Artefact. These values stop decreasing once your Map reaches Perfect tier.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Map Refinements</div>
              <div class="font-w400 font-size-sm mb-2">
                Map Refinements are modifiers you can attach to your Maps to increase its power. These refinements also
                come at a cost per application.
              </div>
              <div class="font-w400 font-size-sm mb-2">Higher tier Maps have more refinement slots to use.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Archaeology">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/archaeology/archaeology.png" height="64px" />
    Archaeology
  </h2>
  <h5 class="font-w400">
    Excavate Dig Sites located in Cartography to discover an assortment of rare and unique items which will provide
    great assistance for your progression outside of the Skill.
  </h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Dig Sites</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                These are the areas in which you will be excavating for items.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">How to unlock Dig Sites</div>
              <div class="font-w400 font-size-sm mb-2">
                You must first locate the Dig Site in
                <img
                  class="skill-icon-xxs mr-1"
                  data-src="assets/media/skills/cartography/cartography.png"
                />Cartography to unlock it.
              </div>
              <div class="font-w400 font-size-sm mb-2">You also need the required Archaeology Level.</div>
              <div class="font-w600 font-size-sm text-warning mb-1">Maps for Dig Sites</div>
              <div class="font-w400 font-size-sm mb-2">
                Before you can begin excavation, you must first create Maps of the Dig Site within Cartography (See
                above details about how to do this).
              </div>
              <div class="font-w400 font-size-sm mb-2">
                Once you have your Maps, you can return and begin excavation.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Map Slots</div>
              <div class="font-w400 font-size-sm mb-2">
                There is a limit on how many Maps you can have created at any given time for a Dig Site. This number
                starts at 1, and increases as you progress through the use of Shop Purchases.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                If you run out of actions on a Map, it will automatically begin using the next Map in order until all
                Maps are depleted in which the Skill will then stop.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Dig Site Tools</div>
              <div class="font-w400 font-size-sm mb-2">
                You will notice there are 4 different types of Tools that you can toggle in Archaeology. These tools
                determine the size of the Artefacts that you are digging for.
              </div>
              <ul class="font-w400 font-size-sm mb-2">
                <li>Sieve - Locates Tiny Artefacts</li>
                <li>Trowel - Locates Small Artefacts</li>
                <li>Brush - Locates Medium Artefacts</li>
                <li>Shovel - Locates Large Artefacts</li>
              </ul>
              <div class="font-w400 font-size-sm mb-2">
                You may have any assortment of Tools active while excavating. The more tools you have selected, the less
                chance there is to obtain specific sized Artefacts.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Artefact Rarity</div>
              <div class="font-w400 font-size-sm mb-1">
                The chance to obtain Artefacts are determined by their rarity. There are 5 rarities:
              </div>
              <ul class="font-w400 font-size-sm mb-2">
                <li>Common</li>
                <li>Uncommon</li>
                <li>Rare</li>
                <li>Very Rare</li>
                <li>Legendary</li>
              </ul>
              <div class="font-w400 font-size-sm mb-2">
                Not every Dig Site will have an item for every single rarity. You can view the undiscovered items
                breakdown for a Dig Site by clicking the “Show Artefacts” button.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Grand Museum of Melvor</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                The Grand Museum of Melvor has enlisted you to locate and recover lost Artefacts by exploring
                Archaeological Dig Sites in and around Melvor, and in return, you will be rewarded for donating these
                Artefacts to the Museum.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">How it works</div>
              <div class="font-w400 font-size-sm mb-2">
                You must donate at least 1 of every single Artefact located in Archaeology to the Museum. When donating
                the Artefact, it will be removed from your Bank and will forever sit inside the Museum.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                To donate an item, just click it in the museum. There museum will indicate what Artefacts have already
                been donated, and which ones are sitting in your Bank waiting to be donated.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                It is a requirement for completion that every single item in Archaeology is donated to the Museum.
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">Rewards</div>
              <div class="font-w400 font-size-sm mb-2">
                For every 10 or so Artefacts that you donate, you will be rewarded with GP or Items (Like Bank Slot
                Tokens).
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="py-2 text-center d-none" id="tutorial-page-Woodcutting-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/woodcutting/woodcutting.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Woodcutting"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_41"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_42"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/bird_nest.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="ITEM_NAME_Bird_Nest"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_45"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/firemaking/firemaking.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Firemaking"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_46"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Fletching"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_47"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/farming/farming.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Farming"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_48"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Fishing-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/fishing/fishing.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Fishing"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_49"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_50"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="py-2 text-left">
          <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
        </div>
        <div class="row row-deck">
          <div class="col-12">
            <div class="block-content">
              <div class="media d-flex align-items-center push">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/bank/message_in_a_bottle.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_52"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_51"></lang-string></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="block-content block-content-full">
              <div class="media d-flex align-items-center push">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/bank/old_boot.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_53"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_54"></lang-string></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/cooking.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Cooking"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_55"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="PAGE_NAME_AltMagic"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_56"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Firemaking-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/firemaking/firemaking.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Firemaking"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_57"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_58"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ore_coal.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="ITEM_NAME_Coal_Ore"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_59"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/cooking.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Cooking"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_60"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Cooking-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/cooking/cooking.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Cooking"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_171"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_202"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_172"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/cooking_fire_redwood.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_173"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_174"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/furnace_3.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_175"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_176"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/pot_3.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_177"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_178"></lang-string></div>
            </div>
          </div>
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_179"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/cooking/perfect.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_180"></lang-string></p>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_181"></lang-string></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_182"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 text-warning"><lang-string lang-id="GAME_GUIDE_183"></lang-string></div>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_184"></lang-string></p>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_185"></lang-string></p>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 text-warning"><lang-string lang-id="GAME_GUIDE_186"></lang-string></div>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_187"></lang-string></p>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_188"></lang-string></p>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_189"></lang-string></p>
              <p class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_190"></lang-string></p>
              <p class="font-w600 font-size-sm text-danger"><lang-string lang-id="GAME_GUIDE_191"></lang-string></p>
              <p class="font-w600 font-size-sm text-danger"><lang-string lang-id="GAME_GUIDE_192"></lang-string></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Mining-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/mining/mining.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Mining"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_61"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_62"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/diamond.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_63"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_64"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/smithing/smithing.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Smithing"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_65"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/runecrafting/runecrafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Runecrafting"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_66"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Fletching"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_67"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Crafting"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_68"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Smithing-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/smithing/smithing.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Smithing"></lang-string>
  </h2>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_196"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_101"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/armour_platebody_rune.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_197"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_69"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_sword_rune.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_198"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_70"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/arrowtips_adamant.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_199"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_71"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/dragon_javelin_heads.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_200"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_72"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/crossbow_head_bronze.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_201"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_73"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/headless_bolts.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="ITEM_NAME_Headless_Bolts"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_74"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="PAGE_NAME_Combat"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_75"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Fletching"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_76"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Crafting"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_77"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Thieving-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/thieving/thieving.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Thieving"></lang-string>
  </h2>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_78"></lang-string></h5>
  <h5><lang-string lang-id="GAME_GUIDE_79"></lang-string></h5>
  <div class="justify-vertical-center">
    <p><lang-string lang-id="GAME_GUIDE_80"></lang-string></p>
    <h6 class="font-w500 text-combat-smoke"><lang-string lang-id="GAME_GUIDE_81"></lang-string></h6>
    <ul class="text-left">
      <li><lang-string lang-id="GAME_GUIDE_82"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_83"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_84"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_85"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_86"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_87"></lang-string></li>
    </ul>
    <h6 class="font-w500 text-combat-smoke"><lang-string lang-id="GAME_GUIDE_88"></lang-string></h6>
    <ul class="text-left">
      <li><lang-string lang-id="GAME_GUIDE_89"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_90"></lang-string></li>
      <li><lang-string lang-id="GAME_GUIDE_91"></lang-string></li>
    </ul>
  </div>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/herb_sack.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="ITEM_NAME_Herb_Sack"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_92"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/bobbys_pocket.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600">Unique Items</div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_93"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Crafting"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_94"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Farming-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/farming/farming.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Farming"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_95"></lang-string></h5>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_96"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_97"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_98"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/herblore/herblore.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Herblore"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_99"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="PAGE_NAME_Combat"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_100"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Fletching-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/fletching/fletching.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Fletching"></lang-string>
  </h2>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_101"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_shortbow_normal.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_102"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_103"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ammo_arrow_dragon.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_104"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_105"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_crossbow_adamant.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_106"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_107"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ammo_bolt_diamond.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_108"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_109"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/weapon_javelin_rune.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_110"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_111"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/ranged/ranged.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Ranged"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_112"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Crafting-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/crafting/crafting.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Crafting"></lang-string>
  </h2>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_113"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_101"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/armour_hard_leather_body.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_114"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_115"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/armour_dragonhide_green_body.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_116"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_117"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/ring_gold_topaz.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_118"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_119"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/ranged/ranged.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Ranged"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_120"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="PAGE_NAME_Combat"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_121"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Runecrafting-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/runecrafting/runecrafting.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Runecrafting"></lang-string>
  </h2>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_122"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_101"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/rune_fire.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_123"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_124"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/rune_lava.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_125"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_126"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/mystic_water_staff.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_127"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_128"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/bank/wizard_hat_fire_expert.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_129"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_130"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_131"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_132"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Herblore-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/herblore/herblore.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Herblore"></lang-string>
  </h2>
  <h5 class="font-w400 mb-2"><lang-string lang-id="GAME_GUIDE_133"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_134"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_101"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/herblore/potion_combat.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_135"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_136"></lang-string></div>
            </div>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/herblore/potion_skills.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_137"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_138"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/main/logo.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="GAME_GUIDE_139"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_140"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-AltMagic-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_AltMagic"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_164"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_165"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_43"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_166"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_44"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="mr-3">
              <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
            </div>
            <div class="media-body text-left">
              <div class="font-w600"><lang-string lang-id="SKILL_NAME_Magic"></lang-string></div>
              <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_167"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-GolbinRaid-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/pets/golden_golbin.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_GolbinRaid"></lang-string>
  </h2>
  <h5 class="font-w400 mb-5">Yet to complete.</h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-5-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/milestones_header.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_0"></lang-string>
  </h2>
  <h5 class="font-w400">This Page details all unlocks available for each Skill in the game.</h5>
  <h5 class="font-w400 mb-5">Simply select a Skill to view the unlocks from Level 1-99.</h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-12-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/mastery_header.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_CompletionLog_SUBCATEGORY_1"></lang-string>
  </h2>
  <h5 class="font-w400">The Mastery System is a secondary leveling experience within Melvor Idle.</h5>
  <h5 class="font-w400 mb-5">
    Items and Content within non-Combat Skills have individual levels attached to them. As you perform actions on those
    Items, you gain Mastery XP for that Item, as well as for your Mastery Pool to spend elsewhere in the Skill.
  </h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/main/mastery_header.png" height="24px" /> <strong>Mastery XP</strong>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                For every action you perform within a Skill, you gain separate
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> for
                that item you were performing the action on. Each Item will provide a different amount of
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> per
                item depending on a few factors (Set out below).
              </div>
              <div class="font-w400 font-size-sm">
                There is 3 different ways to increase the amount of
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> you
                earn per Item: Increasing the Mastery Level for that Item, Increasing the Total Mastery Level for that
                Skill, Unlocking more Milestones within the Skill.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/main/mastery_pool.png" height="24px" /> <strong>Mastery Pool</strong>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                The <img data-src="assets/media/main/mastery_pool.png" height="16px" /> <strong>Mastery Pool</strong> is
                an extra mechanic to assist with increasing the Mastery Level of items.
              </div>
              <div class="font-w400 font-size-sm mb-2">
                For every action you perform within a Skill, extra
                <img data-src="assets/media/main/mastery_header.png" height="16px" /> <strong>Mastery XP</strong> is
                added to your <img data-src="assets/media/main/mastery_pool.png" height="16px" />
                <strong>Mastery Pool</strong> for that Skill which can then be spent to increase the Mastery Level of
                other items within the same Skill.
              </div>
              <div class="font-w400 font-size-sm">
                To be exact: an extra 25% of the <img data-src="assets/media/main/mastery_header.png" height="16px" />
                <strong>Mastery XP</strong> you earn from the action is added to your
                <img data-src="assets/media/main/mastery_pool.png" height="16px" /> <strong>Mastery Pool</strong>. This
                is increased to 50% when you achieve Level 99 for that Skill.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Mastery Pool Checkpoints</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Filling up your Mastery Pool will unlock Checkpoints, which are extra bonuses provided to your for
                keeping your Mastery Pool filled with Mastery XP.
              </div>
              <div class="font-w400 font-size-sm">
                Mastery Pool Checkpoints are unlocked when your Mastery Pool is filled to 10%, 25%, 50% and 95%. All
                four bonuses can be active at the same time.
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">Mastery Item Bonuses</h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                Progressing in Mastery Levels for the Item will unlock extra bonuses that generally apply to that Item
                only, with the exception of some Skills.
              </div>
              <div class="font-w400 font-size-sm">
                Be sure to read the Unlocks available for that Skill to get an idea on what you can achieve.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Statistics-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/statistics_header.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_Statistics"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_168"></lang-string></h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Settings-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/settings_header.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_Settings"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_169"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_170"></lang-string></h5>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Bank-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/main/bank_header.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_Bank"></lang-string>
  </h2>
  <div class="col-12">
    <div class="py-5 text-center">
      <h4 class="font-w400 text-muted mb-5"><lang-string lang-id="GAME_GUIDE_193"></lang-string></h4>
      <div class="col-12">
        <div class="row row-deck">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="block-content block-content-full">
              <div class="py-2 text-center">
                <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_0"></lang-string></h4>
              </div>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_194"></lang-string></p>
            </div>
          </div>
          <div class="col-md-2"></div>
          <div class="col-md-6">
            <div class="block-content block-content-full">
              <div class="py-2 text-left">
                <h4 class="mb-2">
                  <img class="mr-2" data-src="assets/media/skills/combat/food_empty.png" height="36px" /><lang-string
                    lang-id="GAME_GUIDE_1"
                  ></lang-string>
                </h4>
              </div>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_4"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_5"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_6"></lang-string></p>
            </div>
          </div>

          <div class="col-12 col-xl-6">
            <div class="block-content block-content-full bg-light">
              <div class="py-2 text-center">
                <img data-src="assets/media/updates/v017_bank_tabs.png" style="max-height: 400px; max-width: 80%" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="block-content block-content-full">
              <div class="py-2 text-left">
                <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_2"></lang-string></h4>
              </div>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_7"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_8"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_9"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_10"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_11"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_12"></lang-string></p>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="block-content block-content-full bg-light">
              <div class="py-2 text-center">
                <img
                  class="m-2"
                  data-src="assets/media/updates/v017_bank_sidebar.png"
                  style="max-height: 800px; max-width: 80%"
                />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="block-content block-content-full">
              <div class="py-2 text-left">
                <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_3"></lang-string></h4>
              </div>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_13"></lang-string></p>
              <p class="font-size-sm text-dark text-left"><lang-string lang-id="GAME_GUIDE_14"></lang-string></p>
            </div>
          </div>
          <div class="col-12 col-xl-6">
            <div class="block-content block-content-full bg-light">
              <div class="py-2 text-center">
                <img
                  class="m-1"
                  data-src="assets/media/updates/v017_bank_sell_mode.png"
                  style="max-height: 600px; max-width: 80%"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Combat-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="64px" />
    <lang-string lang-id="PAGE_NAME_Combat"></lang-string>
  </h2>
  <h5 class="font-w400 mb-2"><lang-string lang-id="GAME_GUIDE_15"></lang-string></h5>
  <h5 class="font-w400 mb-5"><lang-string lang-id="GAME_GUIDE_16"></lang-string></h5>
  <div class="col-12">
    <div class="row gutters-tiny">
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" />
              <strong><lang-string lang-id="GAME_GUIDE_17"></lang-string></strong>
            </h4>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/attack/attack.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Attack"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_18"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/strength/strength.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Strength"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_19"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/defence/defence.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Defence"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_20"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/hitpoints/hitpoints.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Hitpoints"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_21"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/ranged/ranged.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Ranged"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_22"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/magic/magic.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Magic"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_23"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/prayer/prayer.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Prayer"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_24"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_25"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/slayer/slayer.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="SKILL_NAME_Slayer"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_26"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_27"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_28"></lang-string></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" />
              <strong><lang-string lang-id="GAME_GUIDE_29"></lang-string></strong>
            </h4>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_30"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_31"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_32"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_33"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_34"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_35"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_36"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_37"></lang-string></div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="COMBAT_MISC_18"></lang-string></div>
                  <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_38"></lang-string></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" />
              <strong><lang-string lang-id="GAME_GUIDE_COMBAT_COMBAT_AREAS"></lang-string></strong>
            </h4>
          </div>
          <div class="row">
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/combat/combat.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_COMBAT_COMBAT_AREAS"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2">
                    <lang-string lang-id="GAME_GUIDE_COMBAT_COMBAT_AREAS_0"></lang-string>
                  </div>
                  <div class="font-w400 font-size-sm">
                    <lang-string lang-id="GAME_GUIDE_COMBAT_COMBAT_AREAS_1"></lang-string>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/slayer/slayer.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_COMBAT_SLAYER_AREAS"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="COMBAT_MISC_4"></lang-string></div>
                  <div class="font-w400 font-size-sm">
                    <lang-string lang-id="GAME_GUIDE_COMBAT_SLAYER_AREAS_0"></lang-string>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-xl-6">
              <div class="media d-flex align-items-center push mb-2">
                <div class="mr-3">
                  <img class="m-2" data-src="assets/media/skills/combat/dungeon.png" height="48px" />
                </div>
                <div class="media-body text-left">
                  <div class="font-w600"><lang-string lang-id="GAME_GUIDE_COMBAT_DUNGEONS"></lang-string></div>
                  <div class="font-w400 font-size-sm mb-2">
                    <lang-string lang-id="GAME_GUIDE_COMBAT_DUNGEONS_0"></lang-string>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img data-src="assets/media/skills/combat/combat.png" height="24px" />
              <strong><lang-string lang-id="GAME_GUIDE_39"></lang-string></strong>
            </h4>
            <div class="font-w400 font-size-sm"><lang-string lang-id="GAME_GUIDE_40"></lang-string></div>
            <img class="m-2" data-src="assets/media/main/cbtriangle_v2.svg?2" style="width: 100%" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Agility-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/agility/agility.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Agility"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_141"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_142"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_143"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_144"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_145"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_146"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_147"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_148"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_149"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Summoning-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/summoning/summoning.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Summoning"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_150"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_151"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_152"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_153"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_154"></lang-string></div>
              <div class="font-w700 font-size-sm mb-2 text-warning">
                <lang-string lang-id="GAME_GUIDE_155"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_160"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_161"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_162"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_163"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_156"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_157"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_158"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_159"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="py-2 text-center" id="tutorial-page-Township-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/township/township.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Township"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_Township_0"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-12">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_Township_1"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_2" lang-html="true"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_3" lang-html="true"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_Township_4"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/summer.png" /><lang-string
                lang-id="TOWNSHIP_MENU_SEASONS"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_Township_5"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_Township_6"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_Township_7"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/population.png" /><lang-string
                lang-id="TOWNSHIP_MENU_POPULATION"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_Township_8"></lang-string></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/storage.png" /><lang-string
                lang-id="TOWNSHIP_MENU_STORAGE"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2"><lang-string lang-id="GAME_GUIDE_Township_9"></lang-string></div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_10"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/happiness.png" /><lang-string
                lang-id="TOWNSHIP_MENU_HAPPINESS"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_11"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/education.png" /><lang-string
                lang-id="TOWNSHIP_MENU_EDUCATION"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_12"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/health.png" /><lang-string
                lang-id="TOWNSHIP_MENU_HEALTH"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_13"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_14"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_15"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/worship.png" /><lang-string
                lang-id="TOWNSHIP_MENU_WORSHIP"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_16"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_17"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_town.png" /><lang-string
                lang-id="TOWNSHIP_MENU_TOWN"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_18"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_tasks.png" /><lang-string
                lang-id="TOWNSHIP_MENU_TASKS"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_19"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_20" lang-html="true"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_trader.png" /><lang-string
                lang-id="TOWNSHIP_MENU_CONVERT_RESOURCES"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_21"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_22"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_23"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2">
              <img class="skill-icon-sm mr-2" data-src="assets/media/skills/township/menu_yeet.png" /><lang-string
                lang-id="TOWNSHIP_MENU_MANAGE_STORAGE"
              ></lang-string>
            </h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Township_24"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center" id="tutorial-page-Astrology-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/astrology/astrology.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Astrology"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_Astrology_0"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_Astrology_1"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Astrology_2"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Astrology_3"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content block-content-full">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_Astrology_4"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Astrology_5"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_Astrology_6"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Cartography-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/cartography/cartography.png" height="64px" />
    <lang-string lang-id="SKILL_NAME_Cartography"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_0"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_1"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_2"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_3"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_4"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_5"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_6"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_7"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_8"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_9"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_10"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_11"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_12"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_13"></lang-string>
              </div>
              <div class="font-w600 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_14"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="block-content py-1">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-success mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_15"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_16"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="block-content py-1">
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_17"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_18"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_19"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_20"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_21"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_22"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_23"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_24"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_25"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_26"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_27"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_28"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_29"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_30"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_31"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_32"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_33"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_34"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_35"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_36"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_CARTOGRAPHY_37"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="py-2 text-center d-none" id="tutorial-page-Archaeology-1">
  <h2 class="h1 mb-2">
    <img class="m-2" data-src="assets/media/skills/archaeology/archaeology.png" height="64px" />

    <lang-string lang-id="SKILL_NAME_Archaeology"></lang-string>
  </h2>
  <h5 class="font-w400"><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_0"></lang-string></h5>
  <div class="col-12">
    <div class="row row-deck">
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_1"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_2"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_3"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_4"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_5"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_6"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_7"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_8"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_9"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_10"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_11"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_12"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_13"></lang-string>
              </div>
              <ul class="font-w400 font-size-sm mb-2">
                <li><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_14"></lang-string></li>
                <li><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_15"></lang-string></li>
                <li><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_16"></lang-string></li>
                <li><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_17"></lang-string></li>
              </ul>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_18"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_19"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_20"></lang-string>
              </div>
              <ul class="font-w400 font-size-sm mb-2">
                <li><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_RARITY_Common"></lang-string></li>
                <li><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_RARITY_Uncommon"></lang-string></li>
                <li><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_RARITY_Rare"></lang-string></li>
                <li><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_RARITY_Very_Rare"></lang-string></li>
                <li><lang-string lang-id="ARCHAEOLOGY_ARTEFACT_RARITY_Legendary"></lang-string></li>
              </ul>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_21"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="block-content">
          <div class="py-2 text-left">
            <h4 class="mb-2"><lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_22"></lang-string></h4>
          </div>
          <div class="media d-flex align-items-center push">
            <div class="media-body text-left">
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_23"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_24"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_25"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_26"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_27"></lang-string>
              </div>
              <div class="font-w600 font-size-sm text-warning mb-1">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_28"></lang-string>
              </div>
              <div class="font-w400 font-size-sm mb-2">
                <lang-string lang-id="GAME_GUIDE_ARCHAEOLOGY_29"></lang-string>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END GAME GUIDE MODAL -->

<!-- COMBAT MINIBAR -->
<div class="combat-minibar rounded d-none" id="combat-footer-minibar" style="pointer-events:none;">
  <div class="text-center combatMinibarShowEquipmentSets">
    <div class="btn-group mb-1" id="combat-equipment-set-menu-2"></div>
  </div>
  <div class="text-center combatMinibarShowEnemyBars">
    <button class="btn btn-sm btn-light btn-combat-minibar-hp" data-page-id="melvorD:Combat" style="width:200px; pointer-events:auto; background-color: #1e232d !important">
        <div class="progress active bg-info mt-2 mr-2 ml-2" style="height: 4px; margin-bottom:1px;">
            <div id="combat-enemy-barrier-bar-1" class="progress-bar bg-info" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
        <div class="progress active bg-danger mt-0 mb-1 mr-2 ml-2" style="height: 5px">
            <div id="combat-enemy-hitpoints-bar-1" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
        <progress-bar class="progress-height-5 mx-2 mt-1 mb-2" id="combat-progress-attack-enemy-1"></progress-bar>
        <div class="font-size-sm text-white text-center combat-minibar-hp-text" id="hp"><small class="badge-pill bg-primary-darker"><span class="lang-minibar-enemy"></span> <span id="combat-enemy-hitpoints-current-1"></span> / <span id="combat-enemy-hitpoints-max-1"></span></small></div>
    </button>
  </div>
  <div class="justify-horizontal-left flex-wrap">
    <button class="btn btn-sm btn-light btn-combat-minibar-food position-relative" id="combat-footer-minibar-eat-btn" style="pointer-events:auto;background-color: #1e232d !important">
      <img class="skill-icon-xs" id="combat-footer-minibar-food-img" data-src="assets/media/bank/whale.png">
      <div class="font-size-sm text-white text-center">
        <small class="badge-pill bg-primary-darker" id="combat-food-current-qty-1">0</small>
      </div>
    </button>
    <button class="btn btn-sm btn-light btn-combat-minibar-hp combat-minibar-player" data-page-id="melvorD:Combat" style="width:200px; pointer-events:auto;background-color: #1e232d !important">
      <div class="progress active bg-danger m-2 mb-1" style="height: 5px">
          <div id="combat-player-hitpoints-bar-1" class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <progress-bar class="progress-height-5 mx-2 mt-1" style="margin-bottom: 1px;" id="combat-progress-attack-player-1"></progress-bar>
      <progress-bar class="progress-height-3 mx-2 mt-0 mb-2 summoning-combat-bar" id="combat-progress-attack-summoning-1"></progress-bar>
      <div class="font-size-sm text-white text-center combat-minibar-hp-text lang-minibar-player" id="hp"><small class="badge-pill bg-primary-darker"><span class="lang-minibar-you"></span><span id="combat-player-hitpoints-current-1"></span> / <span id="combat-player-hitpoints-max-1"></span></small></div>
    </button>
    <button class="btn btn-sm btn-light" id="combat-footer-minibar-run-btn" style="pointer-events:auto;background-color: #1e232d !important">
      <img class="skill-icon-xs" data-src="assets/media/skills/combat/run.png">
    </button>
  </div>
</div>
<!-- END COMBAT MINIBAR -->

<!-- SKILLING MINIBAR -->

<div class="sidemenu bg-white rounded" id="minibar-container"></div>
<div class="sidemenu bg-white rounded" id="skill-footer-minibar-container">
    <div id="skill-footer-minibar">
    </div>
    <button class="btn btn-sm btn-light text-white" onClick="toggleSkillMinibar(); this.blur();" style="width:42px; height:34px;">
        <i class="si si-arrow-down" id="skill-footer-minibar-icon"></i>
    </button>
</div>
<!-- END SKILLING MINIBAR -->
<!-- QUICK EQUIP MINIBAR -->


<div class="sidemenu-quick-equip bg-white rounded border border-1x border-warning pb-1 d-none" id="skill-footer-minibar-items-container">
    <div class="font-size-sm text-center text-white">
        <small class="font-w600"><lang-string lang-id="MENU_TEXT_QUICK_EQUIP"></lang-string></small><br>
        <small class="font-w400 text-info"><lang-string lang-id="MENU_TEXT_QUICK_EQUIP_INFO"></lang-string></small>
    </div>
    <div id="skill-footer-minibar-quick-equip">
        <div id="minibar-skill-item-container" class="text-right"></div>
    </div>
    <div class="dropdown-divider my-1"></div>
    <div class="text-center">
        <a class="link-fx text-danger pointer-enabled font-size-xs" id="toggle-delete-item-quick-equip"><lang-string lang-id="TOGGLE"></lang-string> <i class="fas fa-trash"></i></a>
    </div>
</div>

<template id="game-notification-template">
    <div class="newNotification overlay-container overlay-top overlay-right" id="container" style="z-index:1000">
        <div class="flex-notify">
            <img class="newNotification-img" id="media">
            <div class="mr-2">
                <div class="position-relative font-size-sm font-w600 text-info" id="splash-container"></div>
                <div id="div-quantity"><span class="font-w700" id="quantity"></span></div>
            </div>
            <span class="text-white font-size-xs justify-vertical-center mr-1" id="text"></span>
            <span class="text-warning font-size-xs justify-vertical-center" id="in-bank"></span>
        </div>
        <div class="overlay-item text-warning" id="icon-important"><i class="fa fa-exclamation-circle"></i></div>
    </div>
</template>
