<section class="my-3 mb-4">
    <x-slot name="alert">
        @if ($errors->userDeletion->isNotEmpty())
        <div class="alert alert-danger my-2 alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-triangle"></i> {{ $errors->userDeletion->first() }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </x-slot>
    <header>
        <h2 class="h5 text-dark">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-muted">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger rounded-5" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
        {{ __('Delete Account') }}
    </button>


    <!-- Modal -->
    <div class="modal fade" id="deleteAccountModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAccountModal" aria-hidden="true" :show="$errors->userDeletion->isNotEmpty()">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="h4 modal-title">{{ __('Delete Account') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}" class="p-3">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <h2 class="h5 cs-font">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h2>

                        <p class="mt-1 small text-muted">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                        </p>

                        <div class="mt-3">
                            <label for="password" class="visually-hidden">{{ __('Password') }}</label>

                            <input id="password" name="password" type="password" class="form-control mt-1 w-75" placeholder="{{ __('Password') }}" />

                            <div class="invalid-feedback">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <div class="mt-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </button>

                            <button type="submit" class="btn btn-danger ms-2">
                                {{ __('Delete Account') }}
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



</section>
