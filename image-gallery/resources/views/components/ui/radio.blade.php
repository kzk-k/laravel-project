@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'value' => null,
    'checked' => false,
])

<div class="flex items-center h-5">
    <input type="radio" id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" value="{{ $value ?? '' }}"
        @checked(old($name, $checked) == '1') class="hidden peer">
    <label for="{{ $id ?? '' }}"
        class="peer-checked:[&_svg]:scale-100 text-sm font-medium text-neutral-600 peer-checked:text-gray-800 [&_svg]:scale-0 peer-checked:[&_.custom-checkbox]:border-gray-800 peer-checked:[&_.custom-checkbox]:bg-gray-800 select-none flex items-center space-x-2">
        <span
            class="flex items-center justify-center w-5 h-5 border border-gray-300 custom-checkbox text-neutral-900 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                stroke="currentColor" class="w-2 h-2 text-white dark:text-gray-800 duration-300 ease-out">
                <circle cx="12" cy="12" r="10" fill="white" />
            </svg>
        </span>
        <span>{{ $label ?? '' }}</span>
    </label>
</div>
