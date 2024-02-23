<x-app-layout>
    <x-slot name="header">
        <h6 class="text-muted small">
            {{ __('Profile') }}
        </h6>
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-lg-11 col-12">
            <div class="">
                <div class="mb-3">
                    <div class="">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="mb-3">
                    <div class="">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="mb-3">
                    <div class="">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
