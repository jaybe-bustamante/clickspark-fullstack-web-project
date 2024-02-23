<x-app-layout>
    <x-slot name="title">My Projects</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">My Projects</h5>
    </x-slot>

    <div class="container mt-4 mb-5">
        <h5 class="mb-3 fw-bold">My Projects</h5>
        <div class="card border-0 shadow-sm cs-border-2">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover cs-font">
                        <thead>
                            <tr>
                                <th class="col cs-font">Project Title</th>
                                <th class="col cs-font">Type</th>
                                <th class="col cs-font">Status</th>
                                <th class="col cs-font">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->service_type }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <a href="{{ route('project.details', $project->id) }}" class="btn btn-sm btn-info text-white small">View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">No Projects to Show.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <x-slot name="script">
        <!-- Confirm delete action -->
        <script>
            function confirmDelete(projectId) {
                const confirmation = confirm("Are you sure you want to delete this project?");
                if (confirmation) {
                    document.getElementById(`delete-project-form-${projectId}`).submit();
                }
            }

        </script>
    </x-slot>

    </x-admin-layout>
