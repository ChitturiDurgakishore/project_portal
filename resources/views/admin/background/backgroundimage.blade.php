<x-admin-layout>
    <x-slot name="MainContent">
        <center>
    <div class="background-settings-container"> <!-- New container for styling -->
        <!-- Main Page Title -->
        <h3 class="mb-4 text-dark">Manage Background Settings</h3>

        <!-- Image Upload Form -->
        <div class="card shadow-sm rounded-lg mb-4">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-lg">
                <h5 class="mb-0">Upload New Background Image</h5>
                {{-- Optional: Link back to a list of images/resources if applicable --}}
                <a href="/admin/images" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-images"></i> View All Images
                </a>
            </div>
            <div class="card-body">
                <form action="/admin/images" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Image File Input Field -->
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label font-weight-bold">Upload Image File</label>
                        <input type="file" class="form-control rounded-md shadow-sm" id="imageUpload"
                            name="image_file" accept="image/*" required>
                        <div class="form-text text-muted">Select an image file (JPG, PNG, GIF, etc.) to upload.</div>
                        @error('image_file')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Optional: Display Name for the Image -->
                    <div class="mb-3">
                        <label for="imageName" class="form-label font-weight-bold">Image Name</label>
                        <input type="text" class="form-control rounded-md shadow-sm" id="imageName"
                            name="image_name" value="{{ old('image_name') }}"
                            placeholder="e.g., Nature Background, Abstract Pattern">
                        <div class="form-text text-muted">A descriptive name for the image.</div>
                        @error('image_name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary rounded-md shadow mt-3 px-4 py-2">
                        <i class="bi bi-cloud-arrow-up me-2"></i>Upload Image
                    </button>
                </form>
            </div>
        </div>

        <!-- Background Color Settings Section -->
        <div class="card shadow-sm rounded-lg mb-4">
            <div class="card-header bg-success text-white rounded-top-lg">
                <h5 class="mb-0">Background Color Settings</h5>
            </div>
            <div class="card-body">
                <form action="/admin/background-color/update" method="POST">
                    @csrf
                    @method('PUT') {{-- Use PUT method for updating a specific setting --}}

                    <div class="mb-3">
                        <label class="form-label font-weight-bold d-block mb-3">Select a Solid Background Color</label>
                        <div class="d-flex flex-wrap gap-4">
                            @php
                                // Assuming $color is a HomeContent model instance for background color settings
                                // and its color value is stored in a 'color_value' column.
                                // If $color is null or its 'color_value' is null, it defaults to '#f8f9fa'.
                                $selectedColor = $color->url ?? '#e0f2ff'; // Changed default to match new container background

                                $colors = [
                                    ['label' => 'Light Grey', 'value' => '#f8f9fa'],
                                    ['label' => 'Very Pale Blue', 'value' => '#e0f2ff'],
                                    ['label' => 'Soft Peach', 'value' => '#ffe0cc'],
                                    ['label' => 'Light Green', 'value' => '#d4edda'],
                                    ['label' => 'Pale Cyan', 'value' => '#d1ecf1'],
                                    ['label' => 'Dark Grey', 'value' => '#343a40'],
                                    ['label' => 'Primary Blue', 'value' => '#007bff'],
                                    ['label' => 'Warning Yellow', 'value' => '#ffc107'],
                                    ['label' => 'Danger Red', 'value' => '#dc3545'],
                                ];
                            @endphp

                            @foreach ($colors as $colorOption) {{-- Renamed $color to $colorOption to avoid conflict with $color variable from controller --}}
                                <div class="form-check form-check-inline d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="background_color"
                                        id="color_{{ Str::slug($colorOption['label']) }}"
                                        value="{{ $colorOption['value'] }}"
                                        {{ (old('background_color', $selectedColor) == $colorOption['value']) ? 'checked' : '' }}>
                                    <label class="form-check-label ms-2 d-flex align-items-center"
                                        for="color_{{ Str::slug($colorOption['label']) }}">
                                        <span class="color-swatch rounded-sm me-2"
                                            style="background-color: {{ $colorOption['value'] }};"></span>
                                        {{ $colorOption['label'] }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-text text-muted mt-3">Select a solid background color for your website.</div>
                        @error('background_color')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Save Color Button -->
                    <button type="submit" class="btn btn-success rounded-md shadow mt-3 px-4 py-2">
                        <i class="bi bi-palette me-2"></i>Save Color
                    </button>
                </form>
            </div>
        </div>

        <!-- Section to show the current background image (Moved to last) -->
        <div class="card shadow-sm rounded-lg mb-4">
            <div class="card-header bg-info text-white rounded-top-lg">
                <h5 class="mb-0">Current Background Image Preview</h5>
            </div>
            <div class="card-body text-center">
                @if (isset($background) && $background->url)
                    <img src="{{ $background->url }}" alt="Current Background Image"
                        class="img-fluid rounded shadow-sm" style="max-height: 200px; object-fit: contain;">
                    <p class="mt-2 text-muted small">URL: {{ $background->url }}</p>
                @else
                    <p class="text-muted">No background image currently set in the database or URL not
                        available.</p>
                @endif
            </div>
        </div>
    </div>

</center>

<style>
    /* Custom styles for rounded elements and shadows, if not entirely covered by Bootstrap/Tailwind */
    .rounded-md {
        border-radius: 0.375rem !important;
        /* Bootstrap's default for rounded-3 is 0.3rem */
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

    /* Ensure font-weight for labels */
    .form-label.font-weight-bold {
        font-weight: 600;
        /* Inter SemiBold */
    }

    /* Style for color swatches */
    .color-swatch {
        display: inline-block;
        width: 24px;
        /* Size of the color box */
        height: 24px;
        /* Size of the color box */
        border: 1px solid rgba(0, 0, 0, 0.1);
        /* Subtle border for contrast */
        vertical-align: middle;
        /* Align with text */
    }

    /* Adjust spacing for inline radio buttons */
    .form-check-inline {
        margin-right: 1.5rem;
        /* Adjust as needed for spacing */
        margin-bottom: 0.5rem;
        /* Small bottom margin for wrapping */
    }

    /* --- New: Container Background Style --- */
    .background-settings-container {
        background-color: #e0f2ff; /* Very Pale Blue from your color options */
        border-radius: 12px; /* Slightly more rounded than inner cards */
        padding: 2rem; /* Ample padding inside the container */
        margin-top: 2rem; /* Space from the top of the content area */
        margin-bottom: 2rem; /* Space at the bottom */
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1); /* More prominent shadow for the whole section */
    }
</style>

    </x-slot>
</x-admin-layout>
