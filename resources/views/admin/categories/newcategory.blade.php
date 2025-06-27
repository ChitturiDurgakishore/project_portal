<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-tags me-2"></i>Add New Category
            </h2>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white rounded-top-lg py-3">
                    <h5 class="mb-0 text-dark">Enter Category Details</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Form for adding a new category -->
                    <form action="/admin/categories/added" method="POST">
                        @csrf {{-- Laravel CSRF protection --}}

                        <div class="mb-4">
                            <label for="category_name" class="form-label fw-semibold">Category Name:</label>
                            <input type="text" class="form-control rounded-md @error('name') is-invalid @enderror" id="category_name" name="category" placeholder="e.g., Software Development" value="{{ old('name') }}" required aria-label="Category Name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="/admin/job-categories" class="btn btn-secondary rounded-md me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-md shadow-sm">
                                <i class="bi bi-plus-circle me-1"></i> Add Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
