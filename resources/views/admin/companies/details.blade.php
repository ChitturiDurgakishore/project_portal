<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-building-fill me-2"></i>Company Details: {{ $details->company_name }}
            </h2>

            <div class="card shadow-sm rounded-lg mb-5">
                <div class="card-header bg-primary text-white rounded-top-lg py-3">
                    <h5 class="mb-0">{{ $details->company_name }}</h5>
                    <h6 class="card-subtitle mt-1 text-white-75">{{ $details->industry_type ?? 'N/A' }}</h6>
                </div>
                <div class="card-body p-5">

                    <h5 class="text-secondary mb-4"><i class="bi bi-info-circle me-3"></i>Company Profile</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Company Name:</strong> {{ $details->company_name ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>Industry Type:</strong> {{ $details->industry_type ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>Organization Type:</strong> {{ $details->org_type ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Team Size:</strong> {{ $details->team_size ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Established Date:</strong> {{ \Carbon\Carbon::parse($details->established_date)->format('M d, Y') }}</p>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-globe me-3"></i>Contact Information</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-12">
                            <p class="mb-3"><strong>Website:</strong> <a href="{{ $details->website ?? '#' }}" target="_blank">{{ $details->website ?? 'N/A' }}</a></p>
                            <p class="mb-3"><strong>Email:</strong> {{ $details->email ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Phone:</strong> {{ $details->phone ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-geo-alt me-3"></i>Location Details</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-12">
                            <p class="mb-3"><strong>Country:</strong> {{ $details->country ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>State:</strong> {{ $details->state ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>City:</strong> {{ $details->city ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>Address:</strong> {{ $details->address ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Map Link:</strong> <a href="{{ $details->map_link ?? '#' }}" target="_blank">{{ $details->map_link ? 'View on Map' : 'N/A' }}</a></p>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-card-text me-3"></i>Company Bio</h5>
                    <div class="alert alert-light border rounded-md p-4 mb-5 pb-4 border-bottom">
                        <p class="mb-0">{{ $details->bio ?? 'No company bio provided.' }}</p>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-images me-3"></i>Branding & Visuals</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Logo:</strong>
                                @if ($details->logo)
                                    <img src="{{ $details->logo }}" alt="Company Logo" class="img-thumbnail d-block mt-2" style="max-width: 150px; max-height: 150px; object-fit: contain;">
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-0"><strong>Banner:</strong>
                                @if ($details->banner)
                                    <img src="{{ $details->banner }}" alt="Company Banner" class="img-fluid rounded d-block mt-2" style="max-height: 200px; width: auto; object-fit: cover;">
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-patch-check me-3"></i>Account & Premium Status</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-3">
                                <strong>Verified:</strong>
                                <span class="badge {{ $details->verified == 'true' ? 'bg-success' : 'bg-danger' }} rounded-pill ms-2">
                                    {{ ucfirst($details->verified ?? 'false') }}
                                </span>
                            </p>
                            <p class="mb-0">
                                <strong>Is Premium:</strong>
                                <span class="badge {{ $details->is_premium == 'true' ? 'bg-success' : 'bg-danger' }} rounded-pill ms-2">
                                    {{ ucfirst($details->is_premium ?? 'false') }}
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Premium Type:</strong> {{ $details->premium_type ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Total Jobs Posted:</strong> {{ $details->jobs_total ?? 0 }}</p>
                        </div>
                    </div>


                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-pencil-square me-3"></i>Update Company Status</h5>
                    <form action="/admin/companies/update" method="POST" class="border p-5 rounded-lg bg-light">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <input type="text" value="{{$id}}" name="company_id" hidden>
                            <label for="view_status_select" class="form-label fw-semibold">Change View Status:</label>
                            <select class="form-select rounded-md" id="view_status_select" name="verified">
                                <option value="false" {{ ($details->verified ?? '') == 'false' ? 'selected' : '' }}>PENDING</option>
                                <option value="true" {{ ($details->verified ?? '') == 'true' ? 'selected' : '' }}>APPROVED</option>
                                <option value="rejected" {{ ($details->view_status ?? '') == 'rejected' ? 'selected' : '' }}>REJECTED</option>
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="verified_status_select" class="form-label fw-semibold">Featured Status :</label>
                            <select class="form-select rounded-md" id="verified_status_select" name="is_premium">
                                <option value="false" {{ ($details->is_premium ?? '') == 'false' ? 'selected' : '' }}>NOT FEATURED</option>
                                <option value="true" {{ ($details->is_premium ?? '') == 'true' ? 'selected' : '' }}>FEATURED</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <a href="/admin/companies" class="btn btn-secondary rounded-md me-2">
                                <i class="bi bi-arrow-left-circle me-1"></i> Back to Companies
                            </a>
                            <button type="submit" class="btn btn-primary rounded-md shadow-sm">
                                <i class="bi bi-save me-1"></i> Save Changes
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
