<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid py-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0 text-dark">Add New Skill</h3>
                <a href="/admin/skills" class="btn btn-secondary rounded-md shadow">
                    <i class="bi bi-arrow-left-circle me-2"></i>Back to Skills List
                </a>
            </div>

            <div class="card shadow-sm rounded-lg mx-auto" style="max-width: 600px;">
                <div class="card-header bg-primary text-white rounded-top-lg">
                    <h5 class="mb-0">Skill Details</h5>
                </div>
                <div class="card-body">
                    {{-- Session messages for success or error after form submission --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="/admin.skills.store" method="POST"> {{-- Corrected form action using route() helper --}}
                        @csrf {{-- CSRF token for security --}}

                        <!-- Skill Name Field -->
                        <div class="mb-3">
                            <label for="skillName" class="form-label font-weight-bold">Skill Name</label>
                            <input type="text" class="form-control rounded-md shadow-sm" id="skillName"
                                name="name" value="{{ old('name') }}" placeholder="e.g., Python, SQL, Agile"
                                required>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Skill Category (Optional) -->
                        <div class="mb-3">
                            <label for="skillCategory" class="form-label font-weight-bold">Skill Category
                                (Optional)</label>
                            <select name="category" id="skillCategory" class="form-select rounded-md shadow-sm">
                                {{-- Added Bootstrap & custom classes --}}
                                <option value="">Select Category</option> {{-- More descriptive default option --}}
                                @foreach ($categories as $category)
                                    {{-- Assuming $category is an object/array with a 'category' property --}}
                                    <option value="{{ $category->category }}"
                                        {{ old('category') == $category->category ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary rounded-md shadow mt-3 px-4 py-2">
                            <i class="bi bi-plus-lg me-2"></i>Add Skill
                        </button>
                    </form>

                </div>
            </div>
        </div>

        <style>
            /* Assuming these styles are already in your main CSS or layout.
               Included here for completeness if this were a standalone file. */
            .rounded-md {
                border-radius: 0.375rem !important;
            }

            .rounded-lg {
                border-radius: 0.5rem !important;
            }

            .shadow-sm {
                box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
            }

            .shadow {
                box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
            }

            .form-label.font-weight-bold {
                font-weight: 600;
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-secondary {
                background-color: #6c757d;
                border-color: #6c757d;
                color: #fff;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                border-color: #0056b3;
            }

            .btn-secondary:hover {
                background-color: #5a6268;
                border-color: #545b62;
            }
        </style>
    </x-slot>
</x-admin-layout>
