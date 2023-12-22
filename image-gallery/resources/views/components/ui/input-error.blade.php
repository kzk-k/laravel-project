{{-- @props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif --}}


{{-- @props(['name'])

@if ($errors->has($name))
    <span class="block text-sm text-red-600 space-y-1">{{ $errors->first($name) }}</span>
@endif --}}

@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <span {{ $attributes->merge(['class' => 'block text-sm text-red-600 my-1']) }}>{{ $message }}</span>
    @endforeach
@endif
