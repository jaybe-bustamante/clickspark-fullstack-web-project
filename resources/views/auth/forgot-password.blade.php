<x-guest-layout>
    <x-slot name="title">
        {{ __('Forgot Password') }}
    </x-slot>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-7 col-11 card border-0 px-xl-5 px-md-4 px-4 rounded-4">
                <div class="text-center cs-font fs-5 ch60 fs-6">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label class="form-label cs-font">Email</label>
                        <input id="email" class="form-control cs-font" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button class="btn button-1 w-100" type="submit">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
