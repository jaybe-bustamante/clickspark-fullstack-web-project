<section class="card border-0 shadow-sm">
    <header class="card-header border-0 ">
        <div class="h5 p-0 m-0">
            {{ __('Profile Information') }}
        </div>
    </header>
    <div class="card-body mb-3 border-0">
        <p class="cs-font small px-2 text-center text-xl-start">
            {{ __("Update your account's profile information and email address.") }}
        </p>

        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-3">
            @csrf
            @method('patch')

            <div class="row justify-content-xl-start justify-content-center px-1 px-md-2 gap-2">

                <div class=" col-10 col-xl-5 col-lg-9 col-md-9">

                    <div class="form-group mb-3">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="form-group mb-2">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    </div>
                </div>
                <!-- Avatar -->
                <div class="col-10 col-xl-6 col-lg-9 col-md-9">
                    <div class="form-group mb-2">
                        <x-input-label for="avatar" :value="__('Avatar')" />
                        <div class="row g-0 gap-0">
                            <div class="mb-3 text-center col-xl-4">
                                @if (auth()->user()->avatar)
                                <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="Avatar" width="120" height="120" class="avatar">
                                @else
                                <img src="img/default-avatar.jpg" alt="Default Avatar" width="120" height="120" class="avatar">
                                @endif
                            </div>

                            <div class="col-xl-8">
                                <x-input-label for="avatar" :value="__('Upload Avatar')" />
                                <input id="avatar" name="avatar" type="file" class="form-control" :value="old('avatar', auth()->user()->avatar)" />
                                <label for="avatar" class="form-label mt-2 small text-muted">File accepted: jpg, png. Max file size 2MB</label>
                                <x-input-error class="mt-2 small text-danger" :messages="$errors->get('avatar')" />
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Save Button -->
                <div class="d-flex gap-2 col-xl-11 col-lg-9 col-md-9 col-10">
                    <button type="submit" class="btn button-1 px-4">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="small text-success mt-2 ps-2">{{ __('Saved.') }}</p>
                    @endif
                </div>

            </div>

        </form>

    </div>
</section>
