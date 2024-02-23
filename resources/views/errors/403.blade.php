<x-error-layout>
    <x-slot name="title">
        403 You are lost
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="display-2 fw-bold">403</h1>
                <h2 class="display-6 cs-font">{!! $exception->getMessage() !!}</h2>
                <p class=" fs-5 cs-font">Click the button below to go back to the homepage.</p>
                <a href="/" class="btn button-1">Go Home</a>
            </div>
        </div>
    </div>
</x-error-layout>
