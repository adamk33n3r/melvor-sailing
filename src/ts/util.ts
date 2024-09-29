export function createTooltipComponent(
    target: Element,
    component: Component<any>,
    tippyProps: Partial<TippyProps>,
) {
    const dummyHost = document.createElement('div');
    ui.create(component, dummyHost);
    const addedEle = dummyHost.children.item(dummyHost.children.length - 1)
    const tooltip = tippy(target, {
        ...tippyProps,
        content: addedEle,
    });
    return tooltip;
}

export function getElementByIdWithoutId(id: string) {
    const ele = document.getElementById(id);
    ele.removeAttribute('id');
    return ele;
}

export function tickToTime(ticks: number, truncate = false) {
    if (ticks >= TICKS_PER_MINUTE) {
        const minutes = Math.floor(ticks / TICKS_PER_MINUTE);
        if (minutes >= 60) {
            const minutesLeft = minutes % 60;
            return `${Math.floor(minutes / 60)}h` + (truncate && minutesLeft == 0 ? '' : ` ${minutesLeft}m`);
        }
        const secondsLeft = Math.floor(ticks % TICKS_PER_MINUTE / TICKS_PER_SECOND)
        return `${minutes}m` + (truncate && secondsLeft == 0 ? '' : ` ${secondsLeft}s`);
    }
    return `${Math.floor(ticks / TICKS_PER_SECOND)}s`;
}
