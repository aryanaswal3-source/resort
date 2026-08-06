@extends('layout.admin-layout')

@section('title', 'Customer Queries')

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Customer Queries</h2>
                <p class="text-muted mb-0">Manage all customer room enquiries.</p>
            </div>

            <span class="badge bg-dark fs-6 px-3 py-2">
                Total : {{ $queries->total() }}
            </span>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm">
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        <div class="card border-0 shadow-lg rounded-4">

            <div class="card-header bg-white border-0 py-3">
                <h5 class="mb-0 fw-bold">
                    <i class="fa-solid fa-envelope-open-text text-warning me-2"></i>
                    Customer Query List
                </h5>
            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Room</th>
                            <th>Stay</th>
                            <th>Guests</th>
                            <th>Status</th>
                            <th class="text-center" width="200">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($queries as $q)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    <div class="fw-semibold"> {{ $q->name }} </div>

                                    <small class="text-muted">
                                        <i class="fa-solid fa-phone me-1"></i>{{ $q->mobile }}</small>

                                </td>

                                <td>

                                    <span class="badge bg-primary">
                                        {{ $q->room_type }}
                                    </span>

                                    <div class="small text-muted mt-1">
                                        {{ $q->rooms }} Room(s)
                                    </div>

                                </td>

                                <td>

                                    <div class="fw-semibold">
                                        {{ $q->check_in->format('d M Y') }}
                                    </div>

                                    <small class="text-muted">

                                        <i class="fa-solid fa-arrow-right-long"></i>

                                        {{ $q->check_out->format('d M Y') }}

                                    </small>

                                </td>

                                <td>

                                    {{ $q->adults }} Adult

                                    @if ($q->children)
                                        <br>

                                        <small class="text-muted">

                                            {{ $q->children }} Child

                                        </small>
                                    @endif

                                </td>

                                <td>

                                    <div class="d-flex align-items-center gap-2">

                                        <span
                                            class="badge
                                                @if ($q->status == 'pending') bg-warning text-dark
                                                @elseif($q->status == 'contacted') bg-info
                                                @elseif($q->status == 'confirmed') bg-success
                                                @elseif($q->status == 'cancelled') bg-danger @endif">
                                            {{ ucfirst($q->status) }}
                                        </span>



                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2 text-center"">

                                        <form action="{{ route('admin.queries.status', $q->id) }}" method="POST"
                                            class="mb-0">
                                            @csrf
                                            @method('PATCH')

                                            <select class="form-select form-select-sm" name="status"
                                                onchange="this.form.submit()" style="min-width:160px;">
                                                <option value="pending" @selected($q->status == 'pending')>Pending</option>
                                                <option value="contacted" @selected($q->status == 'contacted')>Contacted</option>
                                                <option value="confirmed" @selected($q->status == 'confirmed')>Confirmed</option>
                                                <option value="cancelled" @selected($q->status == 'cancelled')>Cancelled</option>
                                            </select>
                                        </form>

                                        <form action="{{ route('admin.queries.destroy', $q->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this query?')" class="mb-0">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>

                                <td colspan="7" class="text-center py-5">

                                    <img src="https://cdn-icons-png.flaticon.com/512/7486/7486740.png" width="120">

                                    <h5 class="mt-3">
                                        No Queries Found
                                    </h5>

                                    <p class="text-muted">
                                        Customer enquiries will appear here.
                                    </p>

                                </td>

                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-4">

            {{ $queries->links() }}

        </div>

    </div>

@endsection
