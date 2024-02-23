<x-app-layout>
    <x-slot name="header">
        <h6 class="text-muted small">
            Create Project <i class="bi bi-caret-right-fill"></i> Review your Details
        </h6>
    </x-slot>


    <div class=" container-fluid container-md mb-4 px-0 mx-0">
        <h4 class="undline mb-4">Please review your your Project Details</h4>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 border-bottom h5 cs-font">
                Project Information
            </div>
            <div class="card-body cs-font">
                <h5 class="card-title">{{ $project->title }}</h5>
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
                        <li class="list-unstyled mb-2"><a href="{{ Storage::url($attachment->file_path) }}" target="_blank">View Attachment</a></li>
                        @endforeach
                    </ul>
                </p>

                <!-- Amount -->
                <p class="card-text"><strong>Amount:</strong> ${{ $project->amount }}</p>


                <div class="d-flex gap-2 align-items-center mt-4">
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-outline-secondary rounded-5">Edit</a>

                    <a href="{{ route('projects.payment', $project->id) }}" class="btn button-4">Continue</a>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
