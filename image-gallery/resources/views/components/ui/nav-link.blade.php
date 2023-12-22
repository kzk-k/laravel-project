@props(['active'])

@php
    $classes = $active ?? false ? 'inline-block sm:w-auto w-full px-4 py-2 text-sm rounded-full text-slate-700 hover:bg-slate-200/60 hover:text-slate-900 bg-slate-200/60 text-slate-900' : 'inline-block sm:w-auto w-full px-4 py-2 text-sm rounded-full text-slate-700 hover:bg-slate-200/60 hover:text-slate-900';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
