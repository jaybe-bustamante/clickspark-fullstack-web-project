<x-app-layout>
    <x-slot name="header">
        <h6 class="text-muted small">
            Edit Project <i class="bi bi-caret-right-fill"></i> Update your Details
        </h6>
    </x-slot>

    <div class="container-fluid container-md mb-4 px-0">
        <h2>Edit Project</h2>
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white border-0 border-bottom h5 cs-font">
                Update Project Information
            </div>
            <div class="card-body cs-font">
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">
                        <div class="col-12 col-lg-6 col-xl-4">
                            <label for="serviceType" class="form-label small">Service Type<span class="small text-danger">*</span></label>
                            <input type="text" class="form-control" id="serviceType" name="service_type" value="{{ old('service_type', $project->service_type) }}" required readonly />
                        </div>

                        <div class="col-12 col-lg-6 col-xl-4">
                            <label for="title" class="form-label small">Title<span class="small text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required />
                        </div>

                        <div class="col-12 col-xl-4">
                            <label for="industry" class="form-label small">Industry<span class="small text-danger">*</span></label>
                            <input type="text" class="form-control" id="industry" name="industry" value="{{ old('industry', $project->industry) }}" required />
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label small">Project Description<span class="small text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="targetAudience" class="form-label small">Target Audience<span class="small text-danger">*</span></label>
                            <textarea class="form-control" id="targetAudience" name="target_audience" required>{{ old('target_audience', $project->target_audience) }}</textarea>
                        </div>

                        <div class="col-12">
                            <label for="designPreference" class="form-label small">Design Preference<span class="small text-danger">*</span></label>
                            <textarea class="form-control" id="designPreference" name="design_preference" required>{{ old('design_preference', $project->design_preference) }}</textarea>
                        </div>

                        <div class="col-12 col-lg-4" id="attachmentsContainer">
                            <label for="attachments" class="form-label small">Attachments</label>
                            <!-- Existing attachments -->
                            @foreach($project->attachments as $attachment)
                            <div class="mb-2">
                                <a href="{{ Storage::url($attachment->file_path) }}" target="_blank">View Attachment</a>
                                <input type="checkbox" name="attachments_to_delete[]" value="{{ $attachment->id }}"> Mark for deletion
                            </div>
                            @endforeach
                            <input type="file" class="form-control mb-2" name="attachments[]" multiple />
                        </div>

                        <div class="col-12 col-lg-4" id="colorPreferenceContainer">
                            <label class="form-label small">Color Preference</label>
                            <!-- Existing color preferences -->
                            @foreach(old('color_preference', $project->color_preference ?? []) as $color)
                            <div class="d-flex mb-2 color-preference">
                                <input type="color" class="form-control" name="color_preference[]" value="{{ $color }}">
                                <button type="button" class="btn btn-danger ms-2 remove-color">-</button>
                            </div>
                            @endforeach
                            <button type="button" class="btn button-1" id="addColorPreference">Add another color</button>
                        </div>

                        <div class="col-12 col-lg-4">
                            <label for="notes" class="form-label small">Additional Notes</label>
                            <textarea class="form-control" id="notes" name="notes">{{ old('notes', $project->notes) }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn button-1 my-3 float-end">Update Project</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-slot name="script">

    <script>
        document.getElementById('addColorPreference').addEventListener('click', function() {
            const container = document.getElementById('colorPreferenceContainer');
            const newColor = document.createElement('div');
            newColor.classList.add('d-flex', 'mb-2', 'color-preference');
            newColor.innerHTML = `
        <input type="color" class="form-control" name="color_preference[]" value="#ffffff">
        <button type="button" class="btn btn-danger ms-2 remove-color">-</button>
    `;
            container.insertBefore(newColor, this);

            newColor.querySelector('.remove-color').addEventListener('click', function() {
                this.parentElement.remove();
            });
        });

        document.querySelectorAll('.remove-color').forEach(button => {
            button.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });

    </script>
