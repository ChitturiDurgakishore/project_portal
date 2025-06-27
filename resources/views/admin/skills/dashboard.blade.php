<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid py-4">
             <div class="d-flex justify-content-center align-items-center mb-3 position-relative" >

                <a href="/admin/skills/create" class="btn btn-primary rounded-md shadow position-absolute end-0 me-3" >
                    <i class="bi bi-plus-circle me-2"></i>Create New Skill
                </a>
            </div>
            <h3 class="mb-0 text-dark">Manage Skills</h3>
            <!-- Title and Create Button Row -->


            <!-- Search Bar Section -->
            <!-- Search Bar Section -->
            <div class="card shadow-sm rounded-lg mb-4 mx-auto" style="max-width: 700px;">
                <div class="card-body">
                    {{-- Form action updated to a named route, assuming you define 'admin.skills.search' --}}
                    <form action="/admin.skills.search" method="GET"
                        class="row g-2 align-items-center justify-content-center">
                        <div class="col-md-8">
                            <label for="searchSkill" class="form-label visually-hidden">Search Skill</label>
                            {{-- Corrected value to use 'skillname' as the input name --}}
                            <input type="search" name="skillname" id="searchSkill"
                                class="form-control rounded-md shadow-sm" placeholder="Search by skill name..."
                                value="{{ request('skillname') }}">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-secondary w-100 rounded-md shadow-sm">
                                <i class="bi bi-search me-2"></i>Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Skills List Table -->
            <div class="card shadow-sm rounded-lg mx-auto" style="max-width: 700px;"> {{-- Reduced max-width for table --}}
                <div class="card-header bg-secondary text-white rounded-top-lg">
                    <h5 class="mb-0">All Skills List</h5>
                </div>
                <div class="card-body">
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

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-start">Skill Name</th>
                                    <th scope="col" class="text-center" style="width: 150px;">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($skills as $skill)
                                    <tr>
                                        <td class="text-start">{{ $skill->skillname }}</td>
                                        <td class="text-center">
                                            <form action="/admin/skills/{{ $skill->id }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this skill?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger btn-sm rounded-md shadow-sm">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-center text-muted py-4">No skills found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <style>
            /* General Card and Button Styling (assuming these are in your main CSS/layout) */
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

            .card-header.bg-secondary {
                background-color: #6c757d !important;
                /* Bootstrap secondary color */
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-secondary {
                /* Style for search button */
                background-color: #6c757d;
                border-color: #6c757d;
                color: #fff;
            }

            .btn-danger {
                background-color: #dc3545;
                border-color: #dc3545;
            }

            .btn-primary:hover {
                background-color: #0056b3;
                border-color: #0056b3;
            }

            .btn-secondary:hover {
                background-color: #5a6268;
                border-color: #545b62;
            }

            .btn-danger:hover {
                background-color: #c82333;
                border-color: #c82333;
            }

            /* Position adjustments for the create button relative to its parent flex container */
            .position-relative {
                position: relative;
            }

            .position-absolute {
                position: absolute;
            }

            .end-0 {
                right: 0;
            }

            .me-3 {
                margin-right: 1rem !important;
                /* Bootstrap spacing utility */
            }
        </style>
    </x-slot>
</x-admin-layout>
