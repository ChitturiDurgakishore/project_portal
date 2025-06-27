<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-building me-2"></i>Manage Companies
            </h2>

            <ul class="nav nav-pills mb-4 d-flex justify-content-center flex-wrap">
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link text-white" href="/admin/companies"
                        style="background-color: #0d6efd; border-radius: 0.25rem;">
                        All Companies
                    </a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link" href="/admin/pendingcompanies">Pending Companies</a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link" href="/admin/companies/featuredpending">Featured Pending</a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link " href="/admin/companies/featured">Featured Companies</a>
                </li>
            </ul>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-secondary">Company Details</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-center">Verification Status
                                    </th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $company)
                                    <tr>
                                        <td class="py-3 px-4 align-middle">
                                            <h5 class="mb-1 text-dark">{{ $company->company_name }}</h5>
                                            <h6 class="card-subtitle mb-1 text-primary small"
                                                style="color: #007bff !important;">
                                                {{ $company->industry_type ?? 'N/A' }}</h6>
                                            <p class="text-muted small mb-0 mt-2">
                                                <i class="bi bi-geo-alt me-1"></i> {{ $company->city ?? 'N/A' }},
                                                {{ $company->state ?? 'N/A' }}
                                                <span class="mx-2">|</span>
                                                <i class="bi bi-people me-1"></i> {{ $company->jobs_total ?? 'N/A' }}
                                                Available JObs
                                            </p>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-center">
                                            <span
                                                class="badge {{ ($company->verified ?? 'false') == 'true' ? 'bg-success' : 'bg-warning text-dark' }} rounded-pill">
                                                @if (($company->verified ?? 'false') == 'true')
                                                    Verified
                                                @else
                                                    Unverified
                                                @endif
                                            </span>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-end">
                                            <a href="/admin/companies/{{ $company->company_id }}"
                                                class="btn btn-outline-secondary btn-sm rounded-md">
                                                <i class="bi bi-eye me-1"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">
                                            <div class="alert alert-info text-center shadow-sm rounded-lg py-4 mb-0">
                                                <i class="bi bi-info-circle me-2"></i> No companies found matching the
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
