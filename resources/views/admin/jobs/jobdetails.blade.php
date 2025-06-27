<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-briefcase-fill me-2"></i>Job Details: {{ $details->title }}
            </h2>

            <div class="card shadow-sm rounded-lg mb-5"> {{-- Increased margin-bottom for the whole card --}}
                <div class="card-header bg-primary text-white rounded-top-lg py-3">
                    <h5 class="mb-0">{{ $details->title }}</h5>
                    <h6 class="card-subtitle mt-1 text-white-75">{{ $details->company_name ?? 'N/A' }}</h6>
                </div>
                <div class="card-body p-5"> {{-- Increased padding for the card body --}}

                    <!-- Section: Overview -->
                    <h5 class="text-secondary mb-4"><i class="bi bi-info-circle me-3"></i>Job Overview</h5>
                    {{-- Increased mb and me for icon --}}
                    <div class="row mb-5 pb-4 border-bottom"> {{-- Increased mb and pb for section separator --}}
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Company:</strong> {{ $details->company_name ?? 'N/A' }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-3"><strong>Category:</strong> {{ $details->category_name ?? 'N/A' }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-3"><strong>Vacancies:</strong> {{ $details->vacancies }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-3"><strong>Deadline:</strong>
                                {{ \Carbon\Carbon::parse($details->deadline)->format('M d, Y') }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-0"><strong>Job Type:</strong> {{ $details->job_type }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Min Salary:</strong> {{ number_format($details->min_salary, 2) }}
                            </p> {{-- Increased mb --}}
                            <p class="mb-3"><strong>Max Salary:</strong> {{ number_format($details->max_salary, 2) }}
                            </p> {{-- Increased mb --}}
                            <p class="mb-3"><strong>Salary Type:</strong> {{ $details->salary_type }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-3"><strong>Experience Required:</strong> {{ $details->experience_req }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-0"><strong>Education Required:</strong> {{ $details->edu_req }}</p>
                        </div>
                    </div>

                    <!-- Section: Location -->
                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-geo-alt me-3"></i>Location Details</h5>
                    {{-- Increased mb, mt, and me for icon --}}
                    <div class="row mb-5 pb-4 border-bottom"> {{-- Increased mb and pb for section separator --}}
                        <div class="col-12">
                            <p class="mb-3"><strong>Country:</strong> {{ $details->country }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-3"><strong>State:</strong> {{ $details->state }}</p> {{-- Increased mb --}}
                            <p class="mb-3"><strong>City:</strong> {{ $details->city }}</p> {{-- Increased mb --}}
                            <p class="mb-0"><strong>Address:</strong> {{ $details->address ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Section: Description -->
                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-file-earmark-text me-3"></i>Job
                        Description</h5> {{-- Increased mb, mt, and me for icon --}}
                    <div class="alert alert-light border rounded-md p-4 mb-5 pb-4 border-bottom"> {{-- Increased padding, mb, pb --}}
                        <p class="mb-0">{{ $details->description }}</p>
                    </div>

                    <!-- Section: Additional Details -->
                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-list-task me-3"></i>Additional Details
                    </h5> {{-- Increased mb, mt, and me for icon --}}
                    <div class="row mb-5 pb-4 border-bottom"> {{-- Increased mb and pb for section separator --}}
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Tags:</strong> {{ $details->tags ?? 'N/A' }}</p>
                            {{-- Increased mb --}}
                            <p class="mb-0"><strong>Benefits:</strong> {{ $details->benefits ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-3"><strong>Skills Required:</strong>
                                @if ($skills && $skills->count())
                                    {{ $skills->pluck('skill_name')->implode(', ') }}
                                @else
                                    N/A
                                @endif
                            </p>
                            <p class="mb-0"><strong>Created On:</strong>
                                {{ \Carbon\Carbon::parse($details->created_date)->format('M d, Y H:i A') }}</p>
                        </div>
                    </div>

                    <!-- Section: Current Status -->
                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-bookmark-check me-3"></i>Current Status
                    </h5> {{-- Increased mb, mt, and me for icon --}}
                    <p class="mb-3"> {{-- Increased mb --}}
                        <strong>Status:</strong>
                        <span
                            class="badge {{ $details->view_status == 'pending' ? 'bg-warning text-dark' : ($details->view_status == 'approved' ? 'bg-success' : 'bg-danger') }} rounded-pill ms-2">
                            {{ ucfirst($details->view_status) }}
                        </span>
                    </p>
                    <p class="mb-5"> {{-- Increased mb --}}
                        <strong>Featured :</strong>
                        <span
                            class="badge {{ $details->featured_status == 'yes' ? 'bg-success' : 'bg-danger' }} rounded-pill ms-2">
                            {{ $details->featured_status }}
                        </span>
                    </p>

                    <!-- Form for Changing Status and Featured Status -->
                    <h5 class="text-secondary mb-4 mt-5 pt-2"><i class="bi bi-pencil-square me-3"></i>Update Job Status
                    </h5> {{-- Increased mb, mt, and me for icon --}}
                    <form action="/admin/jobs/{{ $details->job_id }}/update" method="POST"
                        class="border p-5 rounded-lg bg-light"> {{-- Increased padding --}}
                        @csrf
                        @method('PUT')

                        <div class="mb-4"> {{-- Increased mb --}}
                            <label for="status_select" class="form-label fw-semibold">Change Status:</label>
                            <select class="form-select rounded-md" id="status_select" name="view_status">
                                <option value="pending" {{ $details->view_status == 'pending' ? 'selected' : '' }}>
                                    PENDING</option>
                                <option value="approved" {{ $details->view_status == 'approved' ? 'selected' : '' }}>
                                    APPROVED</option>
                                <option value="rejected" {{ $details->view_status == 'rejected' ? 'selected' : '' }}>
                                    REJECTED</option>
                            </select>
                        </div>

                        <div class="form-check mb-5"> {{-- Increased mb --}}
                            <label for="status_select" class="form-label fw-semibold">Featured :</label>
                            <select class="form-select rounded-md" id="status_select" name="featured_status">
                                <option value="yes" {{ $details->featured_status == 'yes' ? 'yes' : '' }}>YES
                                </option>
                                <option value="no" {{ $details->featured_status == 'no' ? 'no' : '' }}>NO</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-5"> {{-- Increased mt --}}
                            <a href="/admin/job-posts" class="btn btn-secondary rounded-md me-2">
                                <i class="bi bi-arrow-left-circle me-1"></i> Back to Jobs
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
