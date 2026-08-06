@extends('layout.admin-layout')

@section('title', 'Bookings')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Bookings</h4>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Guest</th>
                        <th>Room</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Guests</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ $booking->name }}</div>
                                <div class="text-muted small">{{ $booking->email }}</div>
                                <div class="text-muted small">{{ $booking->phone }}</div>
                            </td>
                            <td>{{ $booking->room_type }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('d M Y') }}</td>
                            <td>{{ $booking->adults }} Adults, {{ $booking->children }} Children</td>
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
                                <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST" class="d-inline-flex align-items-center gap-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()" style="width: auto;">
                                        <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>

                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this booking?');">
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
                            <td colspan="7" class="text-center text-muted py-4">No bookings yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection