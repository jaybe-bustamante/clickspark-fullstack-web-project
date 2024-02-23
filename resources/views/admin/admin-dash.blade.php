<x-admin-layout>

    <x-slot name="header">
        <h6 class=" text-muted text-opacity-25 small">
            {{ __('Dashboard') }}
        </h6>
    </x-slot>

    <div class="row justify-content-center mb-5">
        <div class="col-12 p-0 m-0">
            <section class="container-fluid container-md">
                <h5 class="mb-3 fw-bold">
                    Welcome back sir {{ Auth::user()->name }},
                </h5>
                <p class="cs-font">
                    Here's a quick overview of our page.
                </p>
                <div class="row justify-content-center">
                    <div class="mb-3 col-12">
                        <div class="card border-0 shadow-sm cs-border-1">
                            <div class="card-header bg-white border-0">
                                <div class="pt-2 d-block text-sm-start text-center">
                                    <p class="m-0 p-0">
                                        <span class="h5 cs-font text-start">Created Projects</span>:
                                        <span class="text-danger h5">{{ $totalProjects }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover cs-font">
                                        <thead>
                                            <tr>
                                                <th class="col cs-font">Project Title</th>
                                                <th class="col cs-font">Client</th>
                                                <th class="col cs-font">Status</th>
                                                <th class="col cs-font">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($projects as $project)
                                            <tr>
                                                <td>{{ $project->title }}</td>
                                                <td>{{ $project->user->name }}</td>
                                                <td class="small">{{ $project->status }}</td>
                                                <td>
                                                    <a href="{{ route('admin.project.details', $project->id) }}" class="btn btn-info btn-sm text-white small">View</a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted small">No Projects to Show.</td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @if($projects->count())
                                <div class="text-center mt-4">
                                    <a href="{{ route('admin.projects.all') }}" class="btn button-4">View All</a>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <div class="card border-0 shadow-sm cs-border-2">
                            <div class="card-body border-0">
                                <div class="d-block text-sm-start text-center d-sm-flex justify-content-center align-items-center">
                                    <p class="m-0 p-0">
                                        <span class="h5 cs-font">User Registered</span>:
                                        <span class="text-danger h5">{{ $totalUsers }}</span>
                                    </p>
                                    <span class="ms-auto">
                                        <a href="{{ route('admin.users.index') }}" class="btn button-4 mt-2 mt-sm-0">View</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <div class="card border-0 shadow-sm cs-border-3">
                            <div class="card-body border-0">
                                <div class="d-block text-sm-start text-center d-sm-flex justify-content-center align-items-center">
                                    <p class="m-0 p-0">
                                        <span class="h5 cs-font">Earnings</span>:
                                        <span class="text-danger h5">${{ number_format($totalEarnings, 2) }}</span>
                                    </p>
                                    <span class="ms-auto">
                                        <a href="{{ route('admin.payments.index') }}" class="btn button-4 mt-2 mt-sm-0">View</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
        </div>
    </div>
</x-admin-layout>
