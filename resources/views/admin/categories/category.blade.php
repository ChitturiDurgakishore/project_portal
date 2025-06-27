<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-tags me-2"></i>Manage Job Categories
            </h2>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white rounded-top-lg py-3 d-flex justify-content-between align-items-center">
                    {{-- Changed justify-content-end to justify-content-between and added align-items-center --}}
                    <h5 class="mb-0 text-muted fw-bold">Total Categories: <span class="text-primary">{{$count}}</span></h5>
                    <a href="/admin/categories/create" class="btn btn-primary btn-sm rounded-md shadow-sm ms-auto">
                        <i class="bi bi-plus-circle me-1"></i> Add New Category
                    </a>
                </div>
                <div class="card-body p-0"> {{-- p-0 to make table full-width within card --}}
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-secondary">ID</th>
                                    <th scope="col" class="py-3 px-4 text-secondary">Category</th>
                                    <th scope="col" class="py-3 px-4 text-secondary">Job Count</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-end">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td class="py-3 px-4 align-middle">{{ $category->id }}</td>
                                        <td class="py-3 px-4 align-middle text-dark">{{ $category->category }}</td>
                                        <td class="py-3 px-4 align-middle">{{$category->count}}</td>
                                        <td class="py-3 px-4 align-middle text-end">
                                            <!-- Form to delete this category -->
                                            <form action="/admin/job-categories/delete/{{$category->id}}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE') {{-- Spoof DELETE request --}}
                                                <button type="submit" class="btn btn-sm btn-danger rounded-md"
                                                        onclick="return confirm('Are you sure you want to DELETE the category \'{{ $category->category }}\'? This will also affect related job posts. This action cannot be undone.');"
                                                        aria-label="Delete category {{ $category->category }}">
                                                    <i class="bi bi-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">
                                            <div class="alert alert-info text-center shadow-sm rounded-lg py-4 mb-0">
                                                <i class="bi bi-info-circle me-2"></i> No job categories found.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
