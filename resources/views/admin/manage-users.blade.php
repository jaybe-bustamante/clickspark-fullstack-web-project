<x-admin-layout>
    <x-slot name="title">User Management</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">User Management</h5>
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
            <h5 class=" fw-bold">User Management</h5>
            <form action="{{ route('admin.users.search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-label="Search for users" value="">
                    <button class="btn button-1 rounded-end-2" type="submit" id="button-addon2">Search</button>
                </div>
            </form>
        </div>

        <div class="card cs-border-1">
            <div class="card-body px-1 px-sm-3">
                <div class="table-responsive">
                    <table class="table table-hover cs-font">
                        <thead>
                            <tr>
                                <th class="cs-font col">Name</th>
                                <th class="cs-font col">Email</th>
                                <th class="cs-font col">Projects</th>
                                <th class="cs-font col">Registered</th>
                                <th class="cs-font col">Actions</th>
                                <th class="cs-font col">Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->projects->count() }}</td>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="d-inline-flex gap-2 align-self-center">
                                        <!-- Edit Button -->
                                        <a href="#editUserModal{{$user->id}}" class="btn btn-sm btn-info text-white px-3" data-bs-toggle="collapse" role="button">
                                            Edit
                                        </a>
                                        <!-- Delete Button -->
                                        <button onclick="confirmDelete({{ $user->id }});" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                        <form id="delete-user-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <!-- Change Role Dropdown -->
                                    <div class="dropdown dropdown-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton{{$user->id}}" data-bs-toggle="dropdown" aria-expanded="false">
                                            {{ $user->role }}
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$user->id}}">
                                            <li><a class="dropdown-item" href="#" onclick="changeRole({{ $user->id }}, 'user')">User</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="changeRole({{ $user->id }}, 'admin')">Admin</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <!-- Change Role Form -->
                                <form id="change-role-form-{{ $user->id }}" action="{{ route('admin.users.changeRole', $user->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="role" value="">
                                </form>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <div id="editUserModal{{$user->id}}" class="collapse">
                                        <!-- User Edit Form -->
                                        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="mb-3 col-xl-6 col-lg-8 col-md-6 col-12">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                                </div>
                                                <div class="mb-3 col-xl-6 col-lg-8 col-md-6 col-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control col-xl-4 col-lg-8 col-md-6 col-12" name="email" value="{{ $user->email }}">
                                                </div>
                                            </div>

                                            <button type="submit" class="btn button-1">Save</button>
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
        <script>
            function confirmDelete(userId) {
                const confirmation = confirm("Are you sure you want to delete this user?");
                if (confirmation) {
                    document.getElementById(`delete-user-form-${userId}`).submit();
                }
            }

            function changeRole(userId, role) {
                if (confirm(`Are you sure you want to change this user's role to ${role}?`)) {
                    document.getElementById(`change-role-form-${userId}`).role.value = role;
                    document.getElementById(`change-role-form-${userId}`).submit();
                }
            }

        </script>
    </x-slot>
</x-admin-layout>
