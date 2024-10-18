import { getElementByIdAndRemoveId } from '../../ts/util';

interface DropdownOptionsData<T> {
  name: string;
  value: T;
  media: string;
  disabled?: boolean;
}

interface DropdownOptions<T> {
  name: string;
  side: 'left' | 'right';
  block: boolean;
  options: DropdownOptionsData<T>[];
  selected?: DropdownOptionsData<T>;
}

export function DropdownComponent<T>(data: DropdownOptions<T>, onChange: (value: T) => void) {
  let self = {} as ReturnType<typeof DropdownComponent<T>>;
  return {
    $template: '#port-dropdown-template',
    label: data.name,
    rightLabel: data.side === 'right',
    leftLabel: data.side === 'left',
    block: data.block,
    dropdownButton: null as unknown as HTMLButtonElement,
    optionsContainer: null as unknown as HTMLDivElement,
    mounted() {
      self = this;
      self.dropdownButton = getElementByIdAndRemoveId('port-dropdown-button');
      self.optionsContainer = getElementByIdAndRemoveId('port-options-container');

      self.setData(data);
    },
    setEnabled(enabled: boolean) {
      self.dropdownButton.disabled = !enabled;
    },
    setData(data: Pick<DropdownOptions<T>, 'options' | 'selected'>) {
      self.optionsContainer.innerHTML = '';
      data.options.forEach((option) => {
        const item = createElement('a', { className: 'dropdown-item pointer-enabled' });
        if (option.disabled) {
          item.classList.add('disabled', 'text-danger');
        } else {
          item.onclick = () => {
            self.updateValue(option);
            onChange(option.value);
          };
        }
        self.appendOptionToElement(option, item);
        self.optionsContainer.append(item);
      });

      if (data.selected !== undefined)
        self.updateValue(data.selected);
    },
    appendOptionToElement(option: DropdownOptionsData<T>, element: HTMLElement) {
      element.innerHTML = option.name;
      const image = createElement('img', { className: 'skill-icon-sm m-0', attributes: [['src', option.media]] });
      element.prepend(image, ' ');
    },
    updateValue(newOption: DropdownOptionsData<T>) {
      self.appendOptionToElement(newOption, self.dropdownButton);
    },
  };
}
