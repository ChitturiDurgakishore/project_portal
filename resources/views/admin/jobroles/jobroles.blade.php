<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-person-workspace me-2"></i>Available Job Roles
            </h2>

            <div class="card shadow-sm rounded-lg mb-4">
                {{-- Removed card-header as it doesn't fit the card body content --}}
                <div class="card-body px-4 py-3"> {{-- Adjusted padding for card-body --}}
                    <div class="row">
                        @forelse ($roles as $role)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3"> {{-- Responsive column sizing --}}
                                <div class="card card-body shadow-sm rounded-lg d-flex flex-row justify-content-between align-items-center py-2">
                                    <span class="fw-semibold text-dark me-2">{{ $role }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center shadow-sm rounded-lg py-4 mb-0">
                                    <i class="bi bi-info-circle me-2"></i> No unique job titles found.
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
