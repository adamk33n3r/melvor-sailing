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

export function getElementByIdWithoutId<T extends HTMLElement>(id: string, parent?: HTMLElement): T {
    if (parent !== undefined) {
        const ele = parent.querySelector<T>(`#${id}`);
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
