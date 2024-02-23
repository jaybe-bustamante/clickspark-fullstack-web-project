<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn button-1 w-100']) }}>
    {{ $slot }}
</button>
