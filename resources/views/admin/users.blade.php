@extends('layout.admin-layout')

@section('title', 'Users')

@section('content')

    <div class="container-fluid py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1">Users</h3>
                <p class="text-muted mb-0">
                    Registered users of your resort
                </p>
            </div>

            <div class="badge bg-success fs-6 px-3 py-2">
                Total Users: {{ $users->count() }}
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-0">

                <div class="table-responsive">

                    <table class="table align-middle mb-0">

                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Joined</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($users as $user)
                                <tr>

                                    <td class="ps-4">
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center gap-3">

                                            @if ($user->profile_photo)
                                                <img src="{{ asset('storage/' . $user->profile_photo) }}" width="45"
                                                    height="45" class="rounded-circle" style="object-fit: cover;"
                                                    alt="{{ $user->name }}">
                                            @else
                                                <img src="{{ asset('image/adminlogo.png') }}" width="45" height="45"
                                                    class="rounded-circle" style="object-fit: cover;"
                                                    alt="{{ $user->name }}">
                                            @endif

                                            <div>
                                                <div class="fw-semibold">
                                                    {{ $user->name }}
                                                </div>

                                                <small class="text-muted">
                                                    #{{ $user->id }}
                                                </small>
                                            </div>

                                        </div>
                                    </td>

                                    <td>
                                        {{ $user->email }}
                                    </td>

                                    <td>
                                        {{ $user->phone ?? 'Not added' }}
                                    </td>

                                    <td>

                                        @if ($user->role === 'admin')
                                            <span class="badge bg-danger">
                                                Admin
                                            </span>
                                        @else
                                            <span class="badge bg-primary">
                                                User
                                            </span>
                                        @endif

                                    </td>

                                    <td>
                                        {{ $user->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }}
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">

                                        No users found.

                                    </td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection
