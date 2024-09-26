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

export function tickToTime(ticks: number) {
    if (ticks >= TICKS_PER_MINUTE) {
        const minutes = Math.floor(ticks / TICKS_PER_MINUTE);
        if (minutes >= 60) {
            return `${Math.floor(minutes / 60)}h ${minutes % 60}m`;
        }
        return `${minutes}m ${Math.floor(ticks % TICKS_PER_MINUTE / TICKS_PER_SECOND)}s`;
    }
    return `${Math.floor(ticks / TICKS_PER_SECOND)}s`;
}
