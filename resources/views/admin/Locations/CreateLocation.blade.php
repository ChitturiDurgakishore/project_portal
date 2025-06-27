<!-- This content is designed to be used within a Laravel Blade component, e.g., x-admin-layout -->
<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-geo-alt me-2"></i>Add New Location
            </h2>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-header bg-white rounded-top-lg py-3">
                    <h5 class="mb-0 text-dark">Enter Location Details</h5>
                </div>
                <div class="card-body p-4">
                    <!-- Form for adding a new location -->
                    <!-- Action points to your Laravel route for storing locations (e.g., /locations/store) -->
                    <form action="/locations/store" method="POST">
                        @csrf {{-- Laravel CSRF protection --}}

                        <div class="mb-3">
                            <label for="country" class="form-label fw-semibold">Country:</label>
                            <input type="text" class="form-control rounded-md @error('country') is-invalid @enderror" id="country" name="country" placeholder="e.g., INDIA" value="{{ old('country') }}" required aria-label="Country Name">
                            @error('country')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="state" class="form-label fw-semibold">State:</label>
                            <input type="text" class="form-control rounded-md @error('state') is-invalid @enderror" id="state" name="state" placeholder="e.g., Telangana" value="{{ old('state') }}" required aria-label="State Name">
                            @error('state')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="city" class="form-label fw-semibold">City:</label>
                            <input type="text" class="form-control rounded-md @error('city') is-invalid @enderror" id="city" name="city" placeholder="e.g., Hyderabad" value="{{ old('city') }}" required aria-label="City Name">
                            @error('city')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="/admin/locations" class="btn btn-secondary rounded-md me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary rounded-md shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Add Location
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
