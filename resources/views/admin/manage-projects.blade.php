<x-admin-layout>
    <x-slot name="title">Manage Projects</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">Project Management</h5>
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

    <div class="container mt-4 mb-5 ">
        <div class=" d-md-flex align-items-center justify-content-between mb-3">
            <h5 class=" fw-bold">Project Management</h5>
            <form action="{{ route('admin.project.search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search for users" value="{{ request('search') }}">
                    <button class="btn button-1 rounded-end-2" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>
        <div class="card cs-border-1">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover cs-font">
                        <thead>
                            <tr>
                                <th class="cs-font col">Project Title</th>
                                <th class="cs-font col">Client</th>
                                <th class="cs-font col">Date Created</th>
                                <th class="cs-font col">Status</th>
                                <th class="cs-font col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->user->name }}</td>
                                <td>{{ $project->created_at->format('M d, Y') }}</td>
                                <td>{{ $project->status }}</td>
                                <td>
                                    <div class=" d-inline-flex gap-2 align-self-center">
                                        <a href="{{ route('admin.project.details', $project->id) }}" class="btn btn-sm btn-info text-white">View</a>
                                        <button onclick="event.preventDefault(); confirmDelete({{ $project->id }});" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                        <form id="delete-project-form-{{ $project->id }}" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
