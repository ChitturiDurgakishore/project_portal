<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h2 class="mb-4 text-primary">
                <i class="bi bi-people-fill me-2"></i> Users (Employees)
            </h2>

            <ul class="nav nav-pills mb-4 d-flex justify-content-center flex-wrap">
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link text-white" href="/admin/users"
                        style="background-color: #0d6efd; border-radius: 0.25rem;">
                        Verified Users
                    </a>
                </li>
                <li class="nav-item me-2 mb-2">
                    <a class="nav-link" href="/admin/users/pending">Pending Users</a>
                </li>
            </ul>

            <div class="card shadow-sm rounded-lg mb-4">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="py-3 px-4 text-secondary">User Details</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-center">Account Status</th>
                                    <th scope="col" class="py-3 px-4 text-secondary text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="py-3 px-4 align-middle">
                                            <div class="d-flex align-items-center">
                                                {{-- Profile Picture --}}
                                                @if ($user->profile_pic)
                                                    <i class="bi bi-person-circle fs-2 me-3 text-muted"></i>
                                                @else
                                                    {{-- Fallback icon if no profile picture --}}
                                                    <i class="bi bi-person-circle fs-2 me-3 text-muted"></i>
                                                @endif
                                                <div>
                                                    {{-- Name and Title/Experience --}}
                                                    <h5 class="mb-1 text-dark">{{ $user->name }}</h5>
                                                    <h6 class="card-subtitle mb-1 text-primary small"
                                                        style="color: #007bff !important;">
                                                        {{ $user->title ?? 'N/A' }}
                                                        @if ($user->experience)
                                                            ({{ $user->experience }} Yrs Exp)
                                                        @endif
                                                    </h6>
                                                    {{-- Email, Location, and Availability --}}
                                                    <p class="text-muted small mb-0 mt-1">
                                                        <i class="bi bi-envelope me-1"></i> {{ $user->email ?? 'N/A' }}
                                                        <span class="mx-2">|</span>
                                                        <i class="bi bi-geo-alt me-1"></i>
                                                        {{ $user->location ?? 'N/A' }}
                                                        <span class="mx-2">|</span>
                                                        <i class="bi bi-calendar-check me-1"></i>
                                                        {{ $user->availability ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 align-middle text-center">
                                            <span
                                                class="badge {{ ($user->verified ?? 'false') == 'true' ? 'bg-success' : 'bg-warning text-dark' }} rounded-pill">
                                                @if (($user->verified ?? 'false') == 'true')
                                                    Verified
                                                @else
                                                    Not Verified
                                                @endif
                                            </span>

                                        </td>
                                        <td class="py-3 px-4 align-middle text-end">
                                            <a href="/admin/users/{{ $user->user_id }}"
                                                class="btn btn-outline-secondary btn-sm rounded-md">
                                                <i class="bi bi-eye me-1"></i> View Details
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-muted py-4">
                                            <div class="alert alert-info text-center shadow-sm rounded-lg py-4 mb-0">
                                                <i class="bi bi-info-circle me-2"></i> No users found matching the
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
