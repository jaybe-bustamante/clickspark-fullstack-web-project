<section class="card border-0 shadow-sm">
    <header class="card-header border-0">
        <div class="h5 p-0 m-0">
            {{ __('Update Password') }}
        </div>
    </header>
    <div class="card-body mb-3 border-0">
        <p class="cs-font small px-2 text-center text-xl-start">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

        <form method="post" action="{{ route('password.update') }}" class="mt-3">
            @csrf
            @method('put')

            <div class="row justify-content-xl-start justify-content-center px-1 px-md-2 gap-2">
                <div class=" col-10 col-xl-11 col-lg-9 col-md-9">
                    <div class="row mb-2 align-items-center">
                        <div class="col-xl-3">
                            <x-input-label class="" for="update_password_current_password" :value="__('Current Password')" />
                        </div>
                        <div class="col-xl-6">
                            <x-text-input id="update_password_current_password" name="current_password" type="password" class=" col-xl-6" autocomplete="current-password" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class=" mb-3" />


                    <div class="row mb-2 align-items-center">
                        <div class="col-xl-3">
                            <x-input-label for="update_password_password" :value="__('New Password')" />
                        </div>
                        <div class="col-xl-6">
                            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mb-3" />

                    <div class="row mb-2 align-items-center">
                        <div class="col-xl-3">
                            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                        </div>
                        <div class="col-xl-6">
                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                        </div>
                    </div>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mb-3" />

                    <div class="flex gap-2 d-flex gap-2 col-xl-11 col-lg-9 col-md-9 col-10">
                        <button type="submit" class="btn button-1 px-4">{{ __('Save') }}</button>

                        @if (session('status') === 'password-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
