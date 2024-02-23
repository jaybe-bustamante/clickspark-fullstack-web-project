@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label cs-font small']) }}>
    {{ $value ?? $slot }}
</label>
