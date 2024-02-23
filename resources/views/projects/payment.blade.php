<x-app-layout>
    <x-slot name="header">
        <h6 class="text-muted small">
            Project Payment <i class="bi bi-caret-right-fill"></i> Review your Details <i class="bi bi-caret-right-fill"></i> Confirm Payment Details
        </h6>
    </x-slot>

    <div class="container-fluid container-md mb-4 px-0 mx-0">
        <h4 class="underline mb-4">Confirm Your Payment</h4>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 border-bottom h5 cs-font">
                Payment Information
            </div>
            <div class="card-body cs-font justify-content-center">
                <p class="card-text"><strong>Title:</strong> {{ $project->title }}</p>
                <p class="card-text"><strong>Service Type:</strong> {{ $project->service_type }}</p>
                <p class="card-text"><strong>Amount to Pay:</strong> <span class="text-success">${{ number_format($project->amount, 2) }}</span></p>

                <div class="alert alert-info mt-4 small col-xl-4 col-lg-8 col-md-6 col-12">
                    Please choose your payment method.
                </div>

                <!-- Payment Button -->
                <form action="" method="POST" id="paymentForm">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $project->amount }}">
                    <input type="hidden" name="currency" value="USD">
                    <input type="hidden" name="title" value="{{ $project->title }}">
                    <input type="hidden" name="service_type" value="{{ $project->service_type }}">
                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                    <div class=" col-xl-4 col-lg-8 col-md-6 col-12" id="paypal-button-container">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <x-slot name="script">

        <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}&currency=USD"></script>


        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '{{ $project->amount }}'
                            }
                        }]
                    });
                }
                , onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {

                        return fetch('/paypal-transaction-complete', {
                            method: 'post'
                            , headers: {
                                'content-type': 'application/json'
                                , 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                            , body: JSON.stringify({
                                orderID: data.orderID
                                , project_id: '{{ $project->id }}'
                            })
                        }).then(function(response) {
                            window.location.href = '/payment-success?project_id={{ $project->id }}';
                        });
                    });
                }
            }).render('#paypal-button-container');

        </script>

    </x-slot>

</x-app-layout>
