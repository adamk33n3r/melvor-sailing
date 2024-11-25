export function createTooltipComponent<T>(
    target: Element,
    component: Component<T>,
    tippyProps: Partial<TippyProps>,
) {
    const dummyHost = document.createElement('div');
    ui.create(component, dummyHost);
    const addedEle = dummyHost.children.item(dummyHost.children.length - 1)!;
    const tooltip = tippy(target, {
        ...tippyProps,
        content: addedEle,
    });
    return tooltip;
}

export function getElementByIdAndRemoveId<T extends HTMLElement>(id: string, parent?: HTMLElement): T {
    if (parent !== undefined) {
        const ele = parent.querySelector<T>(`#${id}`);
        if (ele === null) throw new Error(`Element with id ${id} not found`);
        ele.removeAttribute('id');
        return ele;
    }

    const ele = document.getElementById(id) as T;
    ele.removeAttribute('id');
    return ele;
}

export function tickToTime(ticks: number, truncate = false) {
    return formatTime(ticks / TICKS_PER_SECOND, truncate);
}

export function formatTime(seconds: number, truncate = false) {
    if (seconds >= 60) {
        const minutes = Math.floor(seconds / 60);
        if (minutes >= 60) {
            const minutesLeft = minutes % 60;
            return `${Math.floor(minutes / 60)}h` + (truncate && minutesLeft == 0 ? '' : ` ${minutesLeft}m`);
        }
        // const secondsLeft = Math.floor(ticks % TICKS_PER_MINUTE / TICKS_PER_SECOND)
        const secondsLeft = Math.floor(seconds % 60);
        return `${minutes}m` + (truncate && secondsLeft == 0 ? '' : ` ${secondsLeft}s`);
    }
    return `${Math.floor(seconds)}s`;
}

/**
 * Translated from osrs wiki, modified to not be as confusing
 * Instead of low being "chance at level 1", it is "chance at level req"
 * @deprecated
 */
export function interp(level: number, maxLevel: number, lowChance: number, highChance: number, req: number = 1) {
    if (level < req) return 0;
    const lowNum = req === maxLevel ? 1 : (maxLevel - level);
    const denom = req === maxLevel ? 1 : (maxLevel - req);
    return Math.min(Math.max((Math.floor(lowChance * (lowNum / denom) + highChance * ((level - req) / denom) + 0.5) + 1) / 256, 0), 1);
}

/**
 * Rewrote it to not be dumb, just takes in a straight percentage (0-100). Not something in relation to 256
 * @param level The level to interpolate to
 * @param lowChance The low chance (at requirement level)
 * @param highChance The high chance (at 99)
 * @param req The requirement level of the product
 * @returns The interpolated chance
 */
export function interp2(level: number, maxLevel: number, lowChance: number, highChance: number, req: number) {
    const denom = req === maxLevel ? 1 : (maxLevel - req);
    return Math.min(Math.max(lowChance + (highChance - lowChance) * ((level - req) / denom), 0), 100);
}

/**
 * Data structure for a chance product
 * @typeParam T The type of the object
 */
export interface ChanceData<T> {
    /**
     * The product
     */
    product: T;
    /**
     * The low chance (at requirement level)
     */
    low: number;
    /**
     * The high chance (at 99)
     */
    high: number;
    /**
     * The requirement level of the product
     */
    req: number;
}

/**
 * 
 * @param bounds ChanceData array. Expects percentages (0-100)
 * @param level The level to calculate the chance for
 * @param index The index of the obj you're calculating the chance for in `bounds`
 * @returns The cascaded chance
 */
export function cascadeInterp2(bounds: ChanceData<unknown>[], level: number, maxLevel: number, index: number) {
    let rate = 1;
    for (let i = 0; i < bounds.length; i++) {
        const v = bounds[i];
        if (i === index) {
            rate = rate * interp2(level, maxLevel, v.low, v.high, v.req) / 100;
            return rate * 100;
        }
        if (level >= v.req) {
            rate = rate * (1 - interp2(level, maxLevel, v.low, v.high, v.req)/100);
        }
    }
    return rate;
}

export function getChance(chanceData: ChanceData<unknown>, level: number, maxLevel: number) {
    return interp2(level, maxLevel, chanceData.low, chanceData.high, chanceData.req);
}

/**
 * @deprecated 
 */
export function cascadeInterp(bounds: ChanceData<unknown>[], level: number, maxLevel: number, index: number) {
    let rate = 1;
    for (let i = 0; i < bounds.length; i++) {
        const v = bounds[i];
        if (i === index) {
            // eslint-disable-next-line @typescript-eslint/no-deprecated
            rate = rate * interp(level, maxLevel, v.low, v.high);
            return rate;
        }
        if (level >= v.req) {
            // eslint-disable-next-line @typescript-eslint/no-deprecated
            rate = rate * (1 - interp(level, maxLevel, v.low, v.high));
        }
    }
}

export function setSkillToLevel(skill: AnySkill, level: number) {
    skill.setXP(exp.levelToXP(level) + 1);
}

export function giveItem(itemID: string, quantity: number) {
    game.bank.addItemByID(itemID, quantity, false, false, true, true, 'Sailing:Util');
}
