@php
use Illuminate\Support\Facades\File;
@endphp
<x-admin-layout>



    <x-slot name="title">{{ $project->title }}</x-slot>
    <x-slot name="header">
        <h2 class="text-muted small ">Project Details</h2>

    </x-slot>

    <x-slot name="alert">
        @if($project->status === 'completed')
        <div class="alert alert-success" role="alert">
            This project has been Completed. Please ensure you have downloaded all necessary files.
        </div>
        @endif
    </x-slot>

    <div class="container-fluid container-md  my-2 mb-md-5">
        <div class="mb-4">
            <div class="d-flex justify-content-between mb-3">
                <h3 class="mb-3">{{ $project->title }}</h3>
                <button class="btn btn-sm button-4 rounded-5" data-bs-toggle="modal" data-bs-target="#completionModal">Project Completed</button>

            </div>

            <a href="#" class="cs-link small" data-bs-toggle="collapse" data-bs-target="#projectDescriptionCollapse" aria-expanded="false" aria-controls="projectDescriptionCollapse">
                Show Project Description <i class="bi bi-caret-down"></i>
            </a>

            <!-- Project Description -->
            <div class="collapse" id="projectDescriptionCollapse">
                <div class="card card-body mt-2">
                    <p class="card-text"><strong>Project Type:</strong> {{ $project->service_type }}</p>
                    <p class="card-text"><strong>Industry:</strong> {{ $project->industry }}</p>
                    <p class="card-text"><strong>Description:</strong> {{ $project->description }}</p>
                    <p class="card-text"><strong>Target Audience:</strong> {{ $project->target_audience }}</p>
                    <p class="card-text"><strong>Design Preference:</strong> {{ $project->design_preference }}</p>
                    <p class="card-text"><strong>Color Preference:</strong>
                        @if($project->color_preference)
                        @foreach($project->color_preference as $color)
                        <span class="badge border" style="background-color: {{ $color }};">{{ $color }}</span>
                        @endforeach
                        @endif
                    </p>
                    <p class="card-text"><strong>Notes:</strong> {{ $project->notes }}</p>
                    <p class="card-text">
                        <strong>Attachments:</strong>
                        <ul>
                            @foreach($project->attachments as $attachment)
                            <li class="list-unstyled mb-2 "><a href="{{ Storage::url($attachment->file_path) }}" target="_blank" class="">View Attachment</a></li>
                            @endforeach
                        </ul>
                    </p>

                </div>
            </div>
        </div>

        <!-- Project Messaging -->
        <div class="chat-container bg-white pt-3 border rounded-0">
            <ul class="chat-messages list-unstyled overflow-y-auto">
                @forelse($messages as $message)
                <li class=" mb-3 border-bottom">

                    <!-- Username and avatar -->
                    <div class="d-flex align-items-center px-2">
                        @if ($message->user->avatar)
                        <img src="{{ Storage::url($message->user->avatar) }}" alt="Avatar" width="32" height="32" class="rounded-circle">
                        @else
                        <!-- Default Avatar -->
                        <img src="{{ asset('img/default-avatar.jpg') }}" alt="Default Avatar" width="32" height="32" class="rounded-circle">
                        @endif

                        <strong class="ms-2 fw-medium cs-font small {{ $message->user->role == 'admin' ? 'text-admin' : '' }}">{{ $message->user->name }}:</strong>
                    </div>

                    <!-- Message Content -->
                    <div class="message-content bg-white mx-3 py-2 mt-1">
                        {{ $message->body }}

                        @if($message->file_path)
                        @php
                        $fileType = File::extension(Storage::path($message->file_path));
                        @endphp

                        <div>
                            <a href="#" class="view-attachment cs-link link-offset-2-hover" data-file="{{ Storage::url($message->file_path) }}" data-type="{{ $fileType }}">
                                View Attached ({{ strtoupper($fileType) }})
                            </a>
                        </div>
                        @endif

                        <div class="text-muted small text-end pe-2">{{ $message->created_at->diffForHumans() }}</div>
                    </div>

                </li>
                @empty
                <li class="text-center my-5">
                    <span class=" text-black-50 fs-2">No messages yet. Talk to {{ $project->user->name }} Now!</span>
                </li>
                @endforelse
            </ul>

            <!-- Message chatbox -->
            <form method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data" class="my-3">
                @csrf
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <div class=" d-block d-sm-flex m-2 text-md-center align-items-center">

                    <!-- Textarea -->
                    <div class="col-12 col-md-9 col-xl-10">
                        <textarea name="message" class="form-control rounded-2" required placeholder="Type your message here..." rows="1"></textarea>
                    </div>

                    <!-- Send Button -->
                    <div class="col-12 col-md-3 col-xl-2 mt-2 mt-md-0 ms-2">
                        <button type="submit" class="btn button-1 rounded-5">&nbsp<i class="bi bi-send"></i> Send&nbsp</button>
                        <button type="button" id="attchFileBtn" class="btn btn-sm btn-success ms-2 rounded-5" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Attached Files"><i class="bi bi-upload"></i></button>
                    </div>
                    <input type="file" id="attachFile" name="file" class="form-control d-none">
                </div>
                <div class="px-3 text-primary" id="attachFileName"></div>
            </form>

        </div>

    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="" id="imagePreview" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Complete Prompt Modal -->
    <div class="modal fade" id="completionModal" tabindex="-1" aria-labelledby="completionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="completionModalLabel">Confirm Project Completion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to mark this project as completed? Please ensure you have downloaded all necessary files.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-5" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="{{ route('projects.complete', $project->id) }}">
                        @csrf
                        <button type="submit" class="btn button-4">Complete Project</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script src="{{ asset('assets/js/project-details-chat.js') }}"> </script>

    </x-slot>

</x-admin-layout>
