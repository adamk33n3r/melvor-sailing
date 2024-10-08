export class ComponentClass implements ComponentProps {
  [key: string]: unknown;
  $template: string;
  $refs: HTMLElement[];
  $nextTick: () => Promise<void>;
  update(): void {}
}
  