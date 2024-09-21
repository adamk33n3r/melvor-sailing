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
