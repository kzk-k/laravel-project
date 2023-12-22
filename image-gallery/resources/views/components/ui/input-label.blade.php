@props(['value', 'for'])

<label @if ($for) for="{{ $for }}" @endif
    {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
