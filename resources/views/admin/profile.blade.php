@extends('layout.admin-layout')

@section('title', 'Admin Profile')

@section('content')

    <div class="container-fluid py-4">

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">

                <div class="d-flex align-items-center gap-3 mb-4">

                    @if ($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile" class="rounded-circle"
                            width="90" height="90" style="object-fit: cover;">
                    @else
                        <img src="{{ asset('image/adminlogo.png') }}" alt="Profile" class="rounded-circle" width="90"
                            height="90" style="object-fit: cover;">
                    @endif

                    <div>
                        <h3 class="fw-bold mb-1">{{ $user->name }}</h3>

                        <p class="text-muted mb-0">
                            {{ $user->email }}
                        </p>

                        <span class="badge bg-success mt-2">
                            {{ ucfirst($user->role) }}
                        </span>
                    </div>

                </div>

                <hr>

                <h5 class="fw-bold mb-3">Profile Details</h5>

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">User ID</small>
                            <strong>#{{ $user->id }}</strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">Full Name</small>
                            <strong>{{ $user->name }}</strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">Email</small>
                            <strong>{{ $user->email }}</strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">Phone</small>
                            <strong>{{ $user->phone ?? 'Not added' }}</strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">Role</small>
                            <strong>{{ ucfirst($user->role) }}</strong>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">Account Created</small>
                            <strong>
                                {{ $user->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }}
                            </strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-3">
                            <small class="text-muted d-block">Total Users</small>
                            <strong>{{ $totalUsers }}</strong>
                        </div>
                    </div>


                </div>

            </div>
        </div>

    </div>

@endsection
