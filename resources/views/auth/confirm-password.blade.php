<x-guest-layout>
    <div class="container-fluid">
        <div class="mt-2 mb-4 small text-center ch60">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-10 card border-0 px-xl-5 px-4 rounded-4 mb-3">
                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="" type="password" name="password" required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="">
                        <x-primary-button>
                            {{ __('Confirm') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
