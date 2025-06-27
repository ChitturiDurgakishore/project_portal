<x-admin-layout>
    <x-slot name="MainContent">
        <div class="container-fluid">
            <h1 class="mt-4 mb-4">Edit Navigation Link</h1>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Link Details </h4>
                </div>
                <div class="card-body">
                    <form action="/admin/updatelink" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-3">
                            <input type="text" name="id" value="{{old('id',$linkdetails->id)}}" hidden>
                            <label for="linkName" class="form-label">Link Name</label>
                            <input type="text" class="form-control" id="linkName" name="name" value="{{ old('name', $linkdetails->name) }}" required>
                            @error('name')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="linkUrl" class="form-label">URL</label>
                            <input type="text" class="form-control" id="linkUrl" name="url" value="{{ old('url', $linkdetails->url) }}" placeholder="e.g., /about-us" required>
                            @error('url')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusActive" value="show" {{ old('status', $linkdetails->status) == 'show' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusActive">Show</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusInactive" value="dontshow" {{ old('status', $linkdetails->status) == 'dontshow' ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusInactive">Dont Show</label>
                            </div>
                            @error('status')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="/admin/header-settings" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
