<x-admin-layout>
    <x-slot name="title">Earnings</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">Earnings</h5>
    </x-slot>

    <div class="container mt-4 mb-5 ">
        <div class=" d-md-flex align-items-center justify-content-between mb-3">
            <h5 class=" fw-bold">Earnings</h5>
            <form action="{{ route('admin.payments.search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search for users" value="{{ request('search') }}">
                    <button class="btn button-1 rounded-end-2" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
        <div class="card mb-4 cs-border-1">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="cs-font">User</th>
                                <th class="cs-font">Project</th>
                                <th class="cs-font">Date</th>
                                <th class="cs-font">Transaction ID</th>
                                <th class="cs-font">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                            <tr>
                                <td>{{ $payment->user->name }}</td>
                                <td>{{ $payment->project->title ?? 'N/A' }}</td>
                                <td>{{ $payment->created_at->format('M d, Y') }}</td>
                                <td>{{ $payment->transaction_id }}</td>
                                <td>${{ number_format($payment->amount, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card cs-border-3">
            <div class="card-body">
                <p class="cs-font"><strong class="h4 fw-bold cs-font">Total Earning:</strong> <span class="h5 text-danger">${{ number_format($totalEarnings, 2) }}</span></p>
            </div>
        </div>
        <a href="https://sandbox.paypal.com" class="btn button-1 mt-4 px-4" target="_blank">Open <i class="bi bi-paypal"></i>ayPal</a>
    </div>
</x-admin-layout>
