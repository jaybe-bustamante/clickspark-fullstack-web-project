<x-guest-layout>
    <x-slot name="title">
        Sign Up
    </x-slot>

    <div class="container-fluid">
        <h1 class="text-center h3 fw-bold undline">Sign Up</h1>

        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-11 card border-0 px-xl-5 px-4 rounded-4 mb-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-2">
                        <label class="form-label cs-font small">Name</label>
                        <input id="name" class="form-control cs-font" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label cs-font small">Email</label>
                        <input id="email" class="form-control cs-font" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="mb-2">
                        <label class="form-label cs-font small">Password</label>
                        <input id="password" class="form-control cs-font" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label cs-font small">Confirm Password</label>
                        <input id="password_confirmation" class="form-control cs-font" type="password" name="password_confirmation" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                    <button type="submit" class="btn button-1 w-100">Sign Up</button>
                </form>
                <div class=" my-4 d-flex justify-content-between">
                    <a href="/" class="cs-font fs-6 fw-medium link-offset-1 link-offset-2-hover"><i class="bi bi-arrow-left-short"></i> ClickSpark</a>
                    <div class="cs-font small">Have an account?</div>
                    <a href="{{ route('login') }}" class="cs-font fs-6 fw-medium link-offset-1 link-offset-2-hover">Log in <i class="bi bi-arrow-right-short"></i></a>
                </div>
            </div>
        </div>
</x-guest-layout>
