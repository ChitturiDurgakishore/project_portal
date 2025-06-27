<x-admin-layout>
<x-slot name="MainContent">
<center>
<!-- Social Media Link Edit Page as MainContent -->
<!-- Social Media Link Edit Page as MainContent -->
<div class="container-fluid py-4">
    <h3 class="mb-4 text-dark">Edit Support Link</h3>

    <div class="card shadow-sm rounded-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-lg">
            <h5 class="mb-0">Support Link Details</h5>
        </div>
        <div class="card-body">
            <form action="/admin/support-links/update" method="POST">
                <!-- CSRF Token for Laravel (essential for security) -->
                @csrf
                <!-- Method Spoofing for PUT (required by your route) -->
                @method('PUT')

                <!-- Hidden ID Field -->
                <input type="hidden" name="id" value="{{ old('id', $details->id ?? '') }}">

                <!-- Platform Name Field -->
                <div class="mb-3">
                    <label for="platformName" class="form-label font-weight-bold">Platform Name</label>
                    <input type="text" class="form-control rounded-md shadow-sm" id="platformName" name="name" value="{{ old('platform_name', $details->name ?? '') }}" required>
                </div>

                <!-- URL Field -->
                <div class="mb-3">
                    <label for="platformURL" class="form-label font-weight-bold">URL</label>
                    <input type="text" class="form-control rounded-md shadow-sm" id="platformURL" name="url" value="{{ old('url', $details->url ?? '') }}" required>
                </div>

                <!-- Status Field (Radio Buttons) -->
                <div class="mb-4">
                    <label class="form-label font-weight-bold">Status</label>
                    <div class="d-flex flex-wrap gap-3">
                        <div class="form-check form-check-inline">
                            {{-- Check if $details exists and its status is 'show' or if old input matches 'show' --}}
                            <input class="form-check-input" type="radio" name="status" id="statusShow" value="show" {{ (isset($details) && $details->status == 'show') || old('status') == 'show' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusShow">Show</label>
                        </div>
                        <div class="form-check form-check-inline">
                            {{-- Check if $details exists and its status is 'dontshow' or if old input matches 'dontshow' --}}
                            <input class="form-check-input" type="radio" name="status" id="statusHide" value="dontshow" {{ (isset($details) && $details->status == 'dontshow') || old('status') == 'dontshow' ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusHide">Dont Show</label>
                        </div>
                    </div>                </div>

                <!-- Update Button -->
                <button type="submit" class="btn btn-primary rounded-md shadow mt-3 px-4 py-2">
                    <i class="bi bi-pencil-square me-2"></i>Update Link
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
