<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h1 class="mt-4 mb-4">Create New Navigation Link</h1>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Link</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/header-links/new" method="POST"> {{-- Action points to the store route --}}
                        @csrf {{-- CSRF token for security --}}
                        {{-- No @method('PUT') here, as it's a POST request for creation --}}

                        <div class="mb-3">
                            <label for="linkName" class="form-label">Link Name</label>
                            <input type="text" class="form-control" id="linkName" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="linkUrl" class="form-label">URL</label>
                            {{-- Changed type to 'url' for better semantic validation --}}
                            <input type="text" class="form-control" id="linkUrl" name="url" value="{{ old('url') }}" placeholder="e.g., /about-us" required>
                            @error('url')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <input type="text" name="section_type" value="header-links" hidden>
                            <label for="sectionType" class="form-label">Section Type</label>
                            <div>
                            <input type="checkbox" value="header" name="section">Header</input>
                            </div>
                            @error('section_type')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusShow" value="show" {{ old('status', 'show') == 'show' ? 'checked' : '' }}> {{-- Default to 'show' --}}
                                <label class="form-check-label" for="statusShow">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusDontShow" value="dontshow" {{ old('status') == 'dontshow' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusDontShow">Don't Show</label>
                            </div>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            {{-- The cancel button typically goes back to the list page --}}
                            <a href="/admin/header-settings" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Create Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
