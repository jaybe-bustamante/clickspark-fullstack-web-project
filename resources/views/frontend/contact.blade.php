<x-main-layout>
    <x-slot name="title">
        Contact Us
    </x-slot>
    <x-slot name="alert">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </x-slot>

    <div class="container-fluid px-lg-5">

        <div class="row mt-3 px-xl-5 px-lg-2 px-md-5">
            <h1 class=" text-lg-start text-center h3 fw-bold undline">Contact Us</h1>
            <div class="col-lg-6 pt-4 px-lg-3 px-md-4 px-3">
                <div class="cs-font">

                    <p class="text-lg-start text-center cs-font ch60 fs-5">We are here to help you. If you have any questions or need to contact us, please use our contact form or you can reach us using our <span class=" fw-bold">Chatbot</span> at lower right of the website.</p>
                    <h5 class="card-title">Contact Information</h5>
                    <p class="cs-font lh-lg">You can contact us using the following information:<br>
                        Email: help@clickspark.com<br>
                        Phone: 123-456-7890<br>
                        Address: 123 Main St, Guinobatan, Albay PH</p>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="{{ route('contact.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label cs-font">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        <div class="invalid-feedback">
                            Please enter your name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label cs-font">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Please enter your email.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label cs-font">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            Please enter your message.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary button-1">Submit</button>
                </form>
            </div>


        </div>
    </div>
    <x-slot name="scripts">
        <script>
            (function() {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()

        </script>
    </x-slot>
</x-main-layout>
