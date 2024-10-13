export abstract class ComponentClass implements ComponentProps {
  [key: string]: unknown;
  abstract $template: string;
  $refs: HTMLElement[] = [];
  $nextTick: () => Promise<void> = () => Promise.resolve();
  update(): void {
    // Use this function to update the component's view
  }
}
  