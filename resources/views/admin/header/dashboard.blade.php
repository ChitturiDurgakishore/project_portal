<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h1 class="mt-4 mb-4">Header & Navigation Control</h1>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Header Navigation Links</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($links as $link)
                                    <tr>
                                        <td>{{ $link->name }}</td>
                                        <td>{{ $link->url }}</td>
                                        <td>
                                            <span class="badge {{ $link->status == 'show' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($link->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="/admin/header-links/{{ $link->id }}/edit" class="btn btn-sm btn-outline-primary me-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="/admin/header-links/{{ $link->id }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE') <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this link?');">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3 text-end">
                        <a href="/admin/header-links/create" class="btn btn-success">
                            <i class="bi bi-plus-circle me-2"></i> Add New Link
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Header Title Control</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Content</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $title->name }}</td>
                                    <td>
                                        <span class="badge {{ $title->status == 'show' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($title->status) }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/header-title/{{ $title->id ?? '' }}/edit" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
