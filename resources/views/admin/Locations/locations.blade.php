<!-- This content is designed to be used within a Laravel Blade component, e.g., x-admin-layout -->
<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-geo-alt me-2"></i>Manage Locations
            </h2>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center rounded-top-lg py-3">
                    <h5 class="mb-2 mb-md-0 text-dark">Location List</h5>
                    <div class="d-flex flex-grow-1 flex-md-grow-0 justify-content-end align-items-center">
                        <!-- Search Form -->
                        <form action="/admin.locations.search" method="GET" class="d-flex me-2 flex-grow-1 flex-md-grow-0">
                            <input type="text" class="form-control rounded-md" name="search" placeholder="Search by city, state, or country..." aria-label="Search Location" value="{{ request('search') }}" style="max-width: 300px;">
                            <button type="submit" class="btn btn-outline-secondary ms-2 rounded-md">
                                <i class="bi bi-search"></i>
                            </button>
                            @if(request('search'))
                                <a href="/admin.locations.search" class="btn btn-outline-danger ms-2 rounded-md" aria-label="Clear Search">
                                    <i class="bi bi-x-circle"></i>
                                </a>
                            @endif
                        </form>
                        <!-- Add New Location button -->
                        <a href="/locations/create" class="btn btn-primary btn-sm rounded-md shadow-sm">
                            <i class="bi bi-plus-circle me-1"></i> Add New Location
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-secondary">Country</th>
                                    <th scope="col" class="py-3 px-4 text-secondary">State</th>
                                    <th scope="col" class="py-3 px-4 text-secondary">City</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($locations as $location)
                                    <tr>
                                        <td class="py-3 px-4 text-dark align-middle">{{ $location->country }}</td>
                                        <td class="py-3 px-4 text-dark align-middle">{{ $location->state }}</td>
                                        <td class="py-3 px-4 text-dark align-middle">{{ $location->city }}</td>
                                        <td class="py-3 px-4 text-end">
                                            <!-- Delete button now uses a form to send a DELETE request -->
                                            <form action="/locations/delete/{{ $location->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-md">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            No locations available. Click "Add New Location" to get started!
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals removed as they require JavaScript -->
    </x-slot>
</x-admin-layout>
