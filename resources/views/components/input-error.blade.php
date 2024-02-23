@props(['messages'])

@if ($messages)
<ul {{ $attributes->merge(['class' => 'errortxt']) }}>
    @foreach ((array) $messages as $message)
    <li>{{ $message }}</li>
    @endforeach
</ul>
@endif
