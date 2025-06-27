<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-person-fill me-2"></i>User Details: {{ $details->name }}
            </h2>

            <div class="card shadow-sm rounded-lg mb-5">
                <div class="card-header bg-primary text-white rounded-top-lg py-3 d-flex align-items-center">
                        <i class="bi bi-person-circle fs-1 me-3 text-white-50"></i>
                    <div>
                        <h5 class="mb-0">{{ $details->name }}</h5>
                        <h6 class="card-subtitle mt-1 text-white-75">{{ $details->title ?? 'N/A' }}</h6>
                    </div>
                </div>
                <div class="card-body p-5">

                    <h5 class="text-secondary mb-4"><i class="bi bi-info-circle me-3"></i>User Profile</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Full Name:</strong> {{ $details->name ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>Title:</strong> {{ $details->title ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>Gender:</strong> {{ $details->gender ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Experience:</strong> {{ $details->experience ?? 'N/A' }} Years</p>
                            <p class="mb-0"><strong>Date of Birth:</strong> {{ ($details->dob ? \Carbon\Carbon::parse($details->dob)->format('M d, Y') : 'N/A') }}</p>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-headset me-3"></i>Contact & Web</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-12">
                            <p class="mb-3"><strong>Email:</strong> {{ $details->email ?? 'N/A' }}</p>
                            <p class="mb-3"><strong>Contact Number:</strong> {{ $details->contact ?? 'N/A' }}</p>
                            <p class="mb-0"><strong>Website:</strong> <a href="{{ $details->website ?? '#' }}" target="_blank">{{ $details->website ?? 'N/A' }}</a></p>
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-geo-alt me-3"></i>Location Details</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-12">
                            <p class="mb-0"><strong>Location:</strong> {{ $details->location ?? 'N/A' }}</p>
                            {{-- If you had separate city, state, country fields for user, you could display them here --}}
                        </div>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-card-text me-3"></i>User Bio</h5>
                    <div class="alert alert-light border rounded-md p-4 mb-5 pb-4 border-bottom">
                        <p class="mb-0">{{ $details->bio ?? 'No user bio provided.' }}</p>
                    </div>

                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-patch-check me-3"></i>Account & Availability Status</h5>
                    <div class="row mb-5 pb-4 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-3">
                                <strong>Verified:</strong>
                                {{-- Using the updated badge logic for verified status --}}
                                <span class="badge {{ ($details->verified ?? 'no') == 'yes' ? 'bg-success' : 'bg-warning text-dark' }} rounded-pill ms-2">
                                    @if (($details->verified ?? 'no') == 'yes')
                                        Verified
                                    @else
                                        Unverified
                                    @endif
                                </span>
                            </p>
                            <p class="mb-0">
                                <strong>Availability:</strong> {{ $details->availability ?? 'N/A' }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            {{-- No direct equivalent to premium_type or jobs_total from company details, so removed --}}
                        </div>
                    </div>


                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-pencil-square me-3"></i>Update User Status</h5>
                    <form action="/admin/users/update" method="POST" class="border p-5 rounded-lg bg-light">
                        @csrf
                        @method('PUT')
                        <input type="text" value={{$user_id}} name="user_id" hidden>
                        <div class="mb-5">
                            <label for="verified_status_select" class="form-label fw-semibold">Verification Status:</label>
                            <select class="form-select rounded-md" id="verified_status_select" name="verified">
                                <option value="false" {{ ($details->verified ?? '') == 'false' ? 'selected' : '' }}>NOT VERIFIED</option>
                                <option value="true" {{ ($details->verified ?? '') == 'true' ? 'selected' : '' }}>VERIFIED</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end mt-5">
                            <a href="/admin/users" class="btn btn-secondary rounded-md me-2">
                                <i class="bi bi-arrow-left-circle me-1"></i> Back to Users
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
