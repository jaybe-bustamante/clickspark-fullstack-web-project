<x-admin-layout>
    <x-slot name="title">Email Management</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">Email Management</h5>
    </x-slot>

    <x-slot name="alert">
        @if(session('success'))
        <div class="">
            <div class="alert alert-success pt-3">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </x-slot>

    <div class="container py-4 mt-4 mb-5 ">
        <h5 class="mb-3 fw-bold">Email Management</h5>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item tab" role="presentation">
                <a class="nav-link active cs-link" aria-current="page" href="#contactSubmissions" data-bs-toggle="tab">Contact Us Submissions</a>
            </li>
            <li class="nav-item tab" role="presentation">
                <a class="nav-link cs-link" href="#newsletterSubscribers" data-bs-toggle="tab">Newsletter Subscribers</a>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Contact Us Table -->
            <div class="tab-content">
                <div class="tab-pane show fade active" id="contactSubmissions" role="tabpanel" tabindex="0">
                    <div class="p-2 border bg-white">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cs-font">Name</th>
                                        <th class="cs-font">Email</th>
                                        <th class="cs-font">Message</th>
                                        <th class="cs-font">Received</th>
                                        <th class="cs-font">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contactSubmissions as $submission)
                                    <tr>
                                        <td>{{ $submission->name }}</td>
                                        <td>{{ $submission->email }}</td>
                                        <td>{{ Str::limit($submission->message, 20) }}</td>
                                        <td>{{ $submission->created_at->format('M d Y') }} <br> {{ $submission->created_at->format('h:i A') }}</td>
                                        <td>
                                            <div class="d-inline-flex gap-2 py-2">
                                                <!-- Delete Btn -->
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $submission->id }}">
                                                    Delete
                                                </button>

                                                <!-- Read Modal Btn -->
                                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#readModal{{ $submission->id }}">
                                                    Read
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Read Modal -->
                                    <div class="modal fade" id="readModal{{ $submission->id }}" tabindex="-1" aria-labelledby="readModalLabel{{ $submission->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="readModalLabel{{ $submission->id }}">Message from {{ $submission->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>{{ $submission->message }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- Reply Modal Btn-->
                                                    <a href="#replyModal{{ $submission->id }}" class="btn btn-secondary" data-bs-toggle="modal">
                                                        Reply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reply Modal -->
                                    <div class="modal fade" id="replyModal{{ $submission->id }}" tabindex="-1" aria-labelledby="replyModalLabel{{ $submission->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="replyModalLabel{{ $submission->id }}">Reply to {{ $submission->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('contact-messages.reply', $submission->id) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="replyMessage{{ $submission->id }}" class="col-form-label">Message:</label>
                                                            <textarea class="form-control" id="replyMessage{{ $submission->id }}" name="replyContent"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Send Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $submission->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $submission->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $submission->id }}">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this message from {{ $submission->name }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('contact-messages.delete', $submission->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Messages found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Newsletter Subscribers Table -->
            <div class="tab-pane fade" id="newsletterSubscribers" role="tabpanel" tabindex="0">
                <div class="p-2 border bg-white">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cs-font">Email</th>
                                    <th class="cs-font">Subscribed At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($newsletterSubscribers as $subscriber)
                                <tr>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>{{ $subscriber->created_at->format('M d Y h:i A') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="2" class="text-center">No subscribers found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var readModalEl = document.querySelectorAll('[id^="readModal"]');
                readModalEl.forEach(function(modal) {
                    modal.addEventListener('hidden.bs.modal', function(event) {
                        var target = document.querySelector('.modal.show');
                        if (target) {
                            document.body.classList.add('modal-open');
                        }
                    });
                });
            });

        </script>

    </x-slot>


</x-admin-layout>
