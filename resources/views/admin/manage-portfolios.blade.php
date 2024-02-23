<x-admin-layout>
    <x-slot name="title">Manage Portfolio</x-slot>
    <x-slot name="header">
        <h5 class="text-muted small">Portfolio Management</h5>
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="container mt-4 mb-5 px-0">

        <div class="d-lg-flex align-items-center mb-3 justify-content-between">
            <div class="d-md-flex mb-3 mb-lg-3 gap-2 align-items-center">
                <h5 class="fw-bold">Portfolio Management</h5>
                <button type="button" class="btn button-1" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                    Add New
                </button>
            </div>

            <form action="{{ route('admin.portfolio.search') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                    <button class="btn button-1 rounded-end-2" type="submit">Search</button>
                </div>
            </form>
        </div>

        <!-- Add Portfolio Item Modal -->
        <div class="modal fade" id="addPortfolioModal" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPortfolioModalLabel">Add New in Portfolio Page</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="Brand">Brand Design</option>
                                    <option value="Print">Print Design</option>
                                    <option value="Label">Product Labe Design</option>
                                    <option value="Web">Web Design & Dev</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn button-1 rounded-2">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card cs-border-1">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="cs-font col">Image</th>
                                <th class="cs-font col">Category</th>
                                <th class="cs-font col">Description</th>
                                <th class="cs-font col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($portfolios as $portfolio)
                            <tr>
                                <td><img src="{{ asset('storage/'.$portfolio->image) }}" alt="portfolio image" width="120"></td>
                                <td class="align-middle">{{ $portfolio->category }}</td>
                                <td class="align-middle">{{ $portfolio->description }}</td>
                                <td class="align-middle">

                                    <form action="{{ route('admin.portfolio.destroy', $portfolio->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
