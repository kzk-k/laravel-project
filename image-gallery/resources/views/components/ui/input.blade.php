@props([
    'label' => null,
    'id' => null,
    'name' => null,
    'type' => 'text',
    'placeholder' => null,
])

<div>
    @if ($label)
        <label for="{{ $id ?? '' }}" class="block text-sm font-medium leading-5 text-gray-700">
            {{ $label }}
        </label>
    @endif

    <div class="mt-1.5 rounded-md shadow-sm">
        <input id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" type="{{ $type ?? '' }}" required autofocus
            @if ($placeholder) placeholder={{ $placeholder }} @endif
            class="appearance-none flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-gray-300 ring-offset-background placeholder:text-gray-500 focus:border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200/60 disabled:cursor-not-allowed disabled:opacity-50
            @if ($errors->has($name)) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @endif" />
    </div>

    @if ($errors->has($name))
        <span class="block text-sm text-red-600 my-1">{{ $errors->first($name) }}</span>
    @endif
</div>
