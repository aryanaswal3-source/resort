@extends('layout.admin-layout')

@section('title', 'Bookings')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Bookings</h4>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- ===== Search Box ===== --}}
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <form action="{{ route('admin.bookings.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Search by name, email or phone..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-dark">
                    <i class="fa-solid fa-search"></i> Search
                </button>
                @if (request('search'))
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-secondary">
                        Clear
                    </a>
                @endif
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>Guest</th>
                        <th>Room</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Guests</th>
                        <th>Price</th>
                        <th>GST</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>`
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id ?? '-' }}</td>
                            <td>
                                <div class="fw-semibold">{{ $booking->name }}</div>
                                <div class="text-muted small">{{ $booking->email }}</div>
                                <div class="text-muted small">{{ $booking->phone }}</div>
                            </td>
                            <td>{{ $booking->service->title ?? 'N/A' }}</td>
                            <!-- ...baaki sab same rahega... -->
                            <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                            <td>{{ $booking->adults }} Adults, {{ $booking->children }} Children</td>
                            <td>₹{{ number_format($booking->price, 0) }}</td>
                            <td>₹{{ number_format($booking->gst_amount, 0) }}</td>
                            <td class="fw-bold">₹{{ number_format($booking->total_amount, 0) }}</td>
                            <td>
                                @if ($booking->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif ($booking->status === 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @else
                                    <span class="badge bg-danger">Cancelled</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST"
                                    class="d-inline-flex align-items-center gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()"
                                        style="width: auto;">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>
                                            Confirmed</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>
                                            Cancelled</option>
                                    </select>
                                </form>

                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Delete this booking?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                @if (request('search'))
                                    No bookings found for "{{ request('search') }}".
                                @else
                                    No bookings yet.
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- ===== Pagination Links ===== --}}
    <div class="mt-4">
        {{ $bookings->links('pagination::bootstrap-5') }}
    </div>

@endsection
