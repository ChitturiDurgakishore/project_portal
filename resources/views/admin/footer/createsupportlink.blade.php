<x-admin-layout>
<x-slot name="MainContent">
<center>
<!-- Social Media Link Create Page as MainContent -->
<div class="container-fluid py-4">
    <h3 class="mb-4 text-dark">Create New Social Media Link</h3>

    <div class="card shadow-sm rounded-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-lg">
            <h5 class="mb-0"> Details</h5>
            <!-- Optional: Link back to a list of social media links -->
        </div>
        <div class="card-body">
            <form action="/admin/support-links/create" method="POST"> {{-- Assuming /admin/social-media-links will handle POST for creation --}}
                <!-- CSRF Token for Laravel (essential for security) -->
                @csrf
                {{-- @method('PUT') is NOT needed for a create (POST) form --}}

                {{-- Hidden ID Field is NOT needed for a create form --}}

                <!-- Platform Name Field -->
                <div class="mb-3">
                    <label for="platformName" class="form-label font-weight-bold">Platform Name</label>
                    <input type="text" class="form-control rounded-md shadow-sm" id="platformName" name="name"  required>
                </div>

                <!-- URL Field -->
                <div class="mb-3">
                    <label for="platformURL" class="form-label font-weight-bold">URL</label>
                    <input type="text" class="form-control rounded-md shadow-sm" id="platformURL" name="url"  required>
                                </div>

                <!-- Status Field (Radio Buttons) -->
                <div class="mb-4">
                    <label class="form-label font-weight-bold">Status</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check form-check-inline">
                            {{-- 'show' is checked by default for a new entry, unless old input suggests otherwise --}}
                            <input class="form-check-input" type="radio" name="status" id="statusShow" value="show" {{ old('status', 'show') == 'show' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusShow">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            {{-- 'dontshow' is an option --}}
                            <input class="form-check-input" type="radio" name="status" id="statusHide" value="dontshow" {{ old('status') == 'dontshow' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusHide">Dont Show</label>
                        </div>
                    </div>
                                </div>

                <!-- Create Button -->
                <button type="submit" class="btn btn-primary rounded-md shadow mt-3 px-4 py-2">
                    <i class="bi bi-plus-circle me-2"></i>Create Link
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Custom styles for rounded elements and shadows, if not entirely covered by Bootstrap/Tailwind */
    .rounded-md {
        border-radius: 0.375rem !important; /* Bootstrap's default for rounded-3 is 0.3rem */
    }
    .rounded-lg {
        border-radius: 0.5rem !important;
    }
    .shadow-sm {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
    }
    .shadow {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
    /* Ensure font-weight for labels */
    .form-label.font-weight-bold {
        font-weight: 600; /* Inter SemiBold */
    }
    /* Added for spacing between radio buttons if needed beyond inline */
    .form-check-inline {
        margin-right: 1.5rem; /* Adjust as needed for spacing */
    }
</style>


</center>
</x-slot>
</x-admin-layout>
