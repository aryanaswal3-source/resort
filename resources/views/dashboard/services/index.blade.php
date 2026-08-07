@extends('layout.admin-layout')

@section('title', 'Manage Services')

@section('content')
    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Manage Services</h3>
            <a href="{{ route('admin.services.create') }}" class="btn btn-dark">
                <i class="bi bi-plus-lg"></i> Add New Service
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Nights</th>
                            <th>Persons</th>
                            <th>Featured</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($services as $service)
                            <tr>
                                <td>
                                    <img src="{{ $service->image ? asset('storage/' . $service->image) : asset('image/adminlogo.png') }}"
                                        alt="{{ $service->title }}"
                                        style="width: 60px; height: 45px; object-fit: cover; border-radius: 6px;">
                                </td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->location ?? '-' }}</td>
                                <td class="fw-semibold">₹{{ number_format($service->price, 0) }}</td>
                                <td>{{ $service->rating ?? '-' }}</td>
                                <td>{{ $service->nights }}</td>
                                <td>{{ $service->persons }}</td>
                                <td>
                                    @if ($service->is_featured)
                                        <span class="badge bg-info text-dark">Featured</span>
                                    @else
                                        <span class="text-secondary">—</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this service?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-secondary py-4">
                                    No services added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection