@props(['messages'])

@if ($messages)
    @foreach ((array) $messages as $message)
        <span {{ $attributes->merge(['class' => 'block text-sm text-red-600 my-1']) }}>{{ $message }}</span>
    @endforeach
@endif
