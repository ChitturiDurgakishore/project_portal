<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h1 class="mt-4 mb-4">Edit Title</h1>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Title Details</h4>
                </div>
                <div class="card-body">
                    <form action="/admin/header-title/{{ $title->id }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <input type="text" name="id" value="{{old('id',$title->id)}}" hidden>
                        </div>

                        <div class="mb-3">
                            <label for="titleContent" class="form-label">Title Content</label>
                            {{-- Using textarea if the title can be multi-line or longer --}}
                            <textarea class="form-control" id="titleContent" name="name" rows="3" required>{{ old('name', $title->name) }}</textarea>
                            {{-- If title is always single-line, you can use:
                            <input type="text" class="form-control" id="titleContent" name="name" value="{{ old('name', $title->name) }}" required>
                            --}}
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusActive" value="show" {{ old('status', $title->status) == 'show' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusActive">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusInactive" value="dontshow" {{ old('status', $title->status) == 'dontshow' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusInactive">Inactive</label>
                            </div>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="/admin/header-settings" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Title</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
