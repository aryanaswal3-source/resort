@extends('layout.admin-layout')

@section('title', 'Edit Service')

@section('content')
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Edit Service</h3>
            <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $service->title) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $service->location) }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Description *</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Icon (Bootstrap Icon class, e.g. bi-house-door)</label>
                            <input type="text" name="icon" class="form-control"
                                value="{{ old('icon', $service->icon) }}" placeholder="bi-house-door">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @if ($service->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                                        style="width: 100px; height: 70px; object-fit: cover; border-radius: 6px;">
                                    <span class="text-secondary small d-block">Current image (upload new to replace)</span>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Rating (0–5)</label>
                            <input type="number" name="rating" class="form-control" step="0.1" min="0"
                                max="5" value="{{ old('rating', $service->rating) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Reviews Count</label>
                            <input type="number" name="reviews_count" class="form-control" min="0"
                                value="{{ old('reviews_count', $service->reviews_count) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Nights</label>
                            <input type="number" name="nights" class="form-control" min="0"
                                value="{{ old('nights', $service->nights) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Persons</label>
                            <input type="number" name="persons" class="form-control" min="0"
                                value="{{ old('persons', $service->persons) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Photo Count</label>
                            <input type="number" name="photo_count" class="form-control" min="0"
                                value="{{ old('photo_count', $service->photo_count) }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Video Count</label>
                            <input type="number" name="video_count" class="form-control" min="0"
                                value="{{ old('video_count', $service->video_count) }}">
                        </div>

                        <div class="col-md-6 d-flex align-items-center">
                            <div class="form-check mt-4">
                                <input type="checkbox" name="is_featured" value="1" class="form-check-input"
                                    id="is_featured" {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">
                                    Mark as Featured
                                </label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Price per Night (₹)</label>
                            <input type="number" name="price" class="form-control" step="0.01" min="0"
                                value="{{ old('price', $service->price) }}" required>
                        </div>

                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-dark px-4">Update Service</button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
