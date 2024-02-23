<x-guest-layout>
    <x-slot name="title">
        Login
    </x-slot>


    <div class="container-fluid">
        <div class="">
            <h1 class="text-center h3 fw-bold undline">Login</h1>
            <p class="text-center cs-font fs-5 ch60 col-xl-3 col-lg-5 col-md-7 col-10 fs-6 ">Welcome back!<br>Log in to your account to access your dashboard and manage your projects.</p>
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-10 card border-0 px-xl-5 px-4 rounded-4 mb-3">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label cs-font small">Email</label>
                            <input id="email" class="form-control cs-font" type="email" name="email" :value="old('email')" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label cs-font small">Password</label>
                            <input id="password" class="form-control cs-font" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Session Status -->
                        <x-auth-session-status class="mb-2" :status="session('status')" />

                        <!-- Remember Me checkbox --->
                        <div class="mb-3 form-check">
                            <input class="form-check-input cs-font" type="checkbox" name="remember" id="remember_me">
                            <label class="form-label cs-font small">Remember me</label>
                        </div>

                        <!-- Submit btn -->
                        <button type="submit" class="btn button-1 w-100">Login</button>
                    </form>

                    <!-- Forgot Password -->
                    <div class="text-center mt-3">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="cs-font fw-medium link-offset-1 link-offset-2-hover small">Forgot your password?</a>
                        @endif
                    </div>

                    <!-- Nav links -->
                    <div class=" my-4 d-flex justify-content-between">
                        <a href="/" class="cs-font fs-6 fw-medium link-offset-1 link-offset-2-hover"><i class="bi bi-arrow-left-short"></i> ClickSpark</a>
                        <div class="cs-font small">No account?</div>
                        <a href="{{ route('register') }}" class="cs-font fs-6 fw-medium link-offset-1 link-offset-2-hover">Sign up <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
