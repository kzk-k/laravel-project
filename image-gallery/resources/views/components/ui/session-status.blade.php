@props([
    'status' => null,
    'type' => 'positive',
])

@if ($status)
    @if ($type)
        <div {{ $attributes->merge(['class' => 'text-sm text-gray-600']) }} x-data="{ show: true }" x-show="show"
            x-transition x-init="setTimeout(() => show = false, 2000)">
            {{ $status }}
        </div>
    @else
        <div {{ $attributes->merge(['class' => 'rounded bg-green-600 p-4 font-bold text-sm text-white']) }}>
            {{ $status }}
        </div>
    @endif
@endif
