@extends('layout.admin-layout')

@section('title', 'Gallery')

@section('content')

<div class="container-fluid px-0">

    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
        <h4 class="fw-bold m-0 d-flex align-items-center gap-2" style="color:#8a4a52;">
            <i class="fa-solid fa-image"></i> Gallery
        </h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Upload Form --}}
    <div class="card border-0 rounded-4 shadow-sm p-4 mb-4">

        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3 align-items-end">

                <div class="col-md-3">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Luxury Suite">
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-semibold">Price</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           placeholder="2500"
                           required>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-semibold">Image</label>
                    <input type="file"
                           name="image"
                           class="form-control"
                           accept="image/*"
                           required>
                </div>

                <div class="col-md-3">
                    <button type="submit" class="btn btn-warning w-100 fw-semibold">
                        <i class="fa-solid fa-upload me-2"></i>
                        Add Image
                    </button>
                </div>

            </div>

            @error('title')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            @error('price')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

            @error('image')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror

        </form>

    </div>

    {{-- Gallery --}}
    <div class="row g-3">

        @forelse($images as $image)

            <div class="col-6 col-md-3">

                <div class="card border-0 rounded-4 shadow-sm overflow-hidden">

                    <img src="{{ asset('storage/'.$image->image_path) }}"
                         class="w-100"
                         style="height:200px;object-fit:cover;"
                         alt="{{ $image->title }}">

                    <div class="p-3">

                        <h6 class="fw-bold mb-1">
                            {{ $image->title ?? 'Untitled' }}
                        </h6>

                        <div class="text-success fw-bold mb-3">
                            ₹{{ number_format($image->price,2) }}
                        </div>

                        <form action="{{ route('admin.gallery.destroy',$image->id) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this image?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-outline-danger btn-sm w-100">
                                <i class="fa-solid fa-trash"></i>
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-info text-center">
                    No images found.
                </div>

            </div>

        @endforelse

    </div>

</div>

@endsection