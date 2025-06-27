<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h1 class="mt-4 mb-4">Edit  About Us Content</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <form action="/admin/footer-about/{{ $aboutUsDetails->id }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                        </div>
                        <input type="text " name="id" value="{{old('id',$aboutUsDetails->id)}}" hidden>
                        <div class="mb-3">
                            <label for="aboutUsContent" class="form-label">About Us Content</label>
                            <textarea class="form-control" id="aboutUsContent" name="name" rows="10" required>{{ old('name', $aboutUsDetails->name) }}</textarea>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusActive" value="show" {{ old('status', $aboutUsDetails->status) == 'show' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusActive">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusInactive" value="dontshow" {{ old('status', $aboutUsDetails->status) == 'dontshow' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusInactive">Inactive</label>
                            </div>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="/admin/footer-settings" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update About Us</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
