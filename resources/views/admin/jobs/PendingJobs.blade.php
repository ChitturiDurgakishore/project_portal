<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-briefcase me-2"></i>Manage Job Posts
            </h2>

            <!-- Filtering/Status Navigation -->
            <!-- These links will trigger your backend controller to filter jobs -->
            <ul class="nav nav-pills mb-4 d-flex justify-content-center flex-wrap">
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link " href="/admin/job-posts">All Jobs</a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link text-white" href="/admin/jobs/pendingjobs"
                        style="background-color: #0d6efd; border-radius: 0.25rem;">
                        Pending Jobs
                    </a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link" href="/admin/jobs/featuredpending">Featured Pending</a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link" href="/admin/jobs/featured">Featured Jobs</a>
                </li>
            </ul>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-secondary">Job Details</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-center">Status</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jobs as $job)
                                    <tr>
                                        <td class="py-3 px-4 align-middle">
                                            <h5 class="mb-1 text-dark">{{ $job->title }}</h5>
                                            <h6 class="card-subtitle mb-1 text-primary small"
                                                style="color: #007bff !important;">{{ $job->company_name ?? 'N/A' }}
                                            </h6>
                                            <p class="text-muted small mb-0 mt-2">
                                                <i class="bi bi-geo-alt me-1"></i> {{ $job->city }},
                                                {{ $job->state }}
                                                <span class="mx-2">|</span>
                                                <i class="bi bi-currency-dollar me-1"></i>
                                                @if ($job->min_salary && $job->max_salary)
                                                    {{ number_format($job->min_salary) }} -
                                                    {{ number_format($job->max_salary) }}
                                                @else
                                                    Negotiable
                                                @endif
                                            </p>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-center">
                                            <span
                                                class="badge {{ $job->view_status == 'pending' ? 'bg-warning text-dark' : 'bg-success' }} rounded-pill">
                                                {{ ucfirst($job->view_status) }}
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-end">
                                            <!-- View Details Button -->
                                            <a href="/admin/job-posts/{{$job->job_id}}"
                                                class="btn btn-outline-secondary btn-sm rounded-md">
                                                <i class="bi bi-eye me-1"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">
                                            <div class="alert alert-info text-center shadow-sm rounded-lg py-4 mb-0">
                                                <i class="bi bi-info-circle me-2"></i> No job posts found matching the
                                                criteria.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
