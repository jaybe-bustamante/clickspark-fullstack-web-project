@props(['status'])

@if ($status)
<div {{ $attributes->merge(['class' => 'text-center text-danger small']) }}>
    {{ $status }}
</div>
@endif
