<x-app-layout>
    <x-slot name="title">My Payments</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">My Payments</h5>
    </x-slot>

    <div class="container mt-4 mb-5">
        <h5 class="mb-3 fw-bold">My Payments</h5>
        <div class="card mb-4 cs-border-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="cs-font">Project</th>
                                <th class="cs-font">Date</th>
                                <th class="cs-font">Transaction ID</th>
                                <th class="cs-font">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                            <tr>
                                <td>{{ $payment->project->title ?? 'N/A' }}</td>
                                <td>{{ $payment->created_at->format('M d, Y') }}</td>
                                <td>{{ $payment->transaction_id }}</td>
                                <td>${{ number_format($payment->amount, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">No Payments Recorded</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
