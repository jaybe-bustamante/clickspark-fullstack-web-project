<x-guest-layout>
    <x-slot name="header">
        {{ __('Verify Email') }}
    </x-slot>
    <div class="container-fluid">
        <div class="text-center cs-font fs-5 mx-auto col-xl-4 col-lg-5 col-md-7 col-10 fs-6">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-5 col-md-6 col-10 card border-0 px-xl-5 px-4 rounded-4 mb-3">
                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-success text-center small">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
                @endif

                <div class="mt-4 d-flex justify-content-between align-items-center">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <button type="submit" class="btn button-1 h-100">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-link text-muted">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
