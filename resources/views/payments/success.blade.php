<x-app-layout>
    <x-slot name="header">
        <h6 class="text-muted small">Payment Success</h6>
    </x-slot>

    <div class="container-fluid container-md mb-4 px-0 mx-0">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 border-bottom h5 cs-font">
                Payment Confirmation
            </div>
            <div class="card-body cs-font text-center">
                <h4 class="mb-3">Thank You! Your payment was successful.</h4>
                <p>You will be redirected in your Project Page in <span id="redirectTimer">5</span> seconds...</p>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            let timeLeft = 5;
            const timerId = setInterval(countdown, 1000);

            function countdown() {
                if (timeLeft == 0) {
                    clearTimeout(timerId);
                    window.location.href = "{{ route('project.details', $project->id) }}";
                } else {
                    document.getElementById('redirectTimer').textContent = timeLeft;
                    timeLeft--;
                }
            }

        </script>
    </x-slot>
</x-app-layout>
