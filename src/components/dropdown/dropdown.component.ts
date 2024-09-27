import { getElementByIdWithoutId } from '../../ts/util';

interface DropdownOptionsData<T> {
  name: string;
  value: T;
  media: string;
  disabled?: boolean;
}

interface DropdownOptions<T> {
  name: string;
  options: DropdownOptionsData<T>[];
  selected?: DropdownOptionsData<T>;
}

export function DropdownComponent<T>(data: DropdownOptions<T>, onChange: (value: T) => void) {
  return {
    $template: '#port-dropdown-template',
    mounted() {
      this.dropdownButton = getElementByIdWithoutId('port-dropdown-button');
      this.optionsContainer = getElementByIdWithoutId('port-options-container');
      this.label = getElementByIdWithoutId('port-label');

      this.setData(data);
    },
    setEnabled(enabled: boolean) {
      (this.dropdownButton as HTMLButtonElement).disabled = !enabled;
    },
    setData(data: DropdownOptions<T>) {
      this.label.innerHTML = data.name;
      this.optionsContainer.innerHTML = '';
      data.options.forEach((option) => {
        const item = createElement('a', { className: 'dropdown-item pointer-enabled' });
        if (option.disabled) {
          item.classList.add('disabled', 'text-danger');
        } else {
          item.onclick = () => {
            this.updateValue(option.value);
            onChange(option.value);
          };
        }
        this.appendOptionToElement(option, item);
        this.optionsContainer.append(item);
      });

      if (data.selected !== undefined)
        this.updateValue(data.selected);
    },
    appendOptionToElement(option: DropdownOptionsData<T>, element: HTMLElement) {
      element.innerHTML = option.name;
      if (option.media !== undefined) {
        const image = createElement('img', { className: 'skill-icon-sm m-0', attributes: [['src', option.media]] });
        element.prepend(image, ' ');
      }
    },
    updateValue(newOption: DropdownOptionsData<T>) {
      this.appendOptionToElement(newOption, this.dropdownButton);
    },
  };
}
