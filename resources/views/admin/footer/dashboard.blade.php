<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <!-- Main Page Title -->
            <h1 class="mt-4 mb-4">Footer Settings</h1>

            <!-- About Us Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">About Us </h4>
                </div>
                <div class="card-body">
                    @if ($AboutUs)
                        <div class="mb-3">
                            <h5 class="card-title">Content Preview:</h5>
                            <p class="card-text">{{ Str::limit($AboutUs->name, 200) }}</p> {{-- Displaying a limited preview of About Us content --}}
                            <p class="card-text"><small class="text-muted">Status:
                                <span class="badge {{ $AboutUs->status == 'show' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($AboutUs->status) }}
                                </span>
                            </small></p>
                        </div>
                        <div class="text-end">
                            <a href="/admin/footer-about/{{ $AboutUs->id }}/edit" class="btn btn-outline-primary">
                                <i class="bi bi-pencil-square"></i> Edit About Us
                            </a>
                        </div>
                    @else
                        <div class="alert alert-info text-center" role="alert">
                            No "About Us" content found for the footer.
                        </div>
                        <div class="text-center">
                            <a href="/admin/footer-about/create" class="btn btn-success">
                                <i class="bi bi-plus-circle me-2"></i> Add About Us Content
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Social Links Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Social Media Links</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Platform Name</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sociallinks as $link)
                                    <tr>
                                        <td>{{ $link->name }}</td>
                                        <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                                        <td>
                                            <span class="badge {{ $link->status == 'show' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($link->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/admin/footer-social/{{ $link->id }}/edit" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="/admin/footer-social/{{ $link->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this social link?');">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No social media links found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 text-end">
                        <a href="/admin/footer-social/create" class="btn btn-success">
                            <i class="bi bi-plus-circle me-2"></i> Add New Social Link
                        </a>
                    </div>
                </div>
            </div>

            <!-- Support Links Section -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Support / Quick Links</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Link Name</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($supportlinks as $link)
                                    <tr>
                                        <td>{{ $link->name }}</td>
                                        <td><a href="{{ $link->url }}" target="_blank">{{ $link->url }}</a></td>
                                        <td>
                                            <span class="badge {{ $link->status == 'show' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($link->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/admin/footer-support/{{ $link->id }}/edit" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="/admin/footer-support/{{ $link->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this support link?');">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No support links found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 text-end">
                        <a href="/admin/footer-support/create" class="btn btn-success">
                            <i class="bi bi-plus-circle me-2"></i> Add New Support Link
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
