@extends('layout.admin-layout')

@section('title', 'Admin Profile')

@section('content')

    <div class="container-fluid py-4">

        <div class="card border-0 shadow-sm rounded-4">

            <div class="card-body p-4">

                {{-- ================================================= --}}
                {{-- PROFILE HEADER --}}
                {{-- ================================================= --}}

                <div class="d-flex align-items-center gap-3 mb-4">

                    @if ($user->profile_photo)
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Profile"
                            class="rounded-circle shadow-sm" width="90" height="90" style="object-fit: cover;">
                    @else
                        <img src="{{ asset('image/adminlogo.png') }}" alt="Profile" class="rounded-circle shadow-sm"
                            width="90" height="90" style="object-fit: cover;">
                    @endif


                    <div>

                        <h3 class="fw-bold mb-1">
                            {{ $user->name }}
                        </h3>

                        <p class="text-muted mb-2">
                            {{ $user->email }}
                        </p>

                        <span class="badge bg-success rounded-pill px-3 py-2">

                            <i class="bi bi-shield-check me-1"></i>

                            {{ ucfirst($user->role) }}

                        </span>

                    </div>

                </div>


                <hr class="my-4">


                {{-- ================================================= --}}
                {{-- PROFILE DETAILS --}}
                {{-- ================================================= --}}

                <h5 class="fw-bold mb-3">
                    Profile Details
                </h5>


                <div class="row g-3">


                    {{-- USER ID --}}
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                User ID
                            </small>

                            <strong>
                                #{{ $user->id }}
                            </strong>

                        </div>

                    </div>


                    {{-- FULL NAME --}}
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Full Name
                            </small>

                            <strong>
                                {{ $user->name }}
                            </strong>

                        </div>

                    </div>


                    {{-- EMAIL --}}
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Email
                            </small>

                            <strong>
                                {{ $user->email }}
                            </strong>

                        </div>

                    </div>


                    {{-- PHONE --}}
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Phone
                            </small>

                            <strong>
                                {{ $user->phone ?? 'Not added' }}
                            </strong>

                        </div>

                    </div>


                    {{-- ROLE --}}
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Role
                            </small>

                            <strong>
                                {{ ucfirst($user->role) }}
                            </strong>

                        </div>

                    </div>


                    {{-- ACCOUNT CREATED --}}
                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Account Created
                            </small>

                            <strong>
                                {{ $user->created_at->timezone('Asia/Kolkata')->format('d M Y, h:i A') }}
                            </strong>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- TOTAL USERS --}}
                    {{-- ================================================= --}}

                    <div class="col-md-6">

                        <div class="p-3 bg-light rounded-3 h-100">

                            <small class="text-muted d-block mb-1">
                                Total Users
                            </small>

                            <strong class="fs-5">
                                {{ $totalUsers }}
                            </strong>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- CHANGE PASSWORD --}}
                    {{-- ================================================= --}}

                    <div class="col-md-6">

                        <div
                            class="p-3 bg-light rounded-3 h-100
                                d-flex align-items-center
                                justify-content-between gap-3">

                            <div>

                                <div class="d-flex align-items-center gap-2 mb-1">

                                    <i class="bi bi-shield-lock-fill text-primary"></i>

                                    <strong>
                                        Change Your Password
                                    </strong>

                                </div>

                                <small class="text-muted">
                                    Keep your admin account secure.
                                </small>

                            </div>


                            <button type="button" class="btn btn-dark rounded-pill px-3 text-nowrap" data-bs-toggle="modal"
                                data-bs-target="#changePasswordModal">

                                <i class="bi bi-key-fill me-1"></i>

                                Change Password

                            </button>

                        </div>

                    </div>


                </div>

            </div>

        </div>

    </div>



    {{-- ============================================================ --}}
    {{-- CHANGE PASSWORD MODAL --}}
    {{-- ============================================================ --}}

    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">

                {{-- MODAL HEADER --}}

                <div class="modal-header bg-dark text-white border-0">

                    <div>

                        <h5 class="modal-title fw-bold mb-1" id="changePasswordModalLabel">

                            <i class="bi bi-shield-lock-fill me-2"></i>

                            Change Password

                        </h5>

                        <small class="text-white-50">

                            Secure your admin account

                        </small>

                    </div>

                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">

                    </button>

                </div>



                {{-- MODAL BODY --}}

                <div class="modal-body p-4">


                    {{-- INFO --}}
                    <div class="alert alert-light border rounded-3 mb-4">
                        <div class="d-flex gap-2">
                            <i class="bi bi-info-circle text-primary"></i>

                            <small class="text-muted">

                                Enter your current password and choose a new
                                password for your admin account.

                            </small>

                        </div>

                    </div>
                    {{-- FORM --}}

                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf
                        {{-- CURRENT PASSWORD --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Current Password

                            </label>

                            <div class="input-group">

                                <span class="input-group-text bg-white">

                                    <i class="bi bi-lock-fill"></i>

                                </span>

                                <input type="password" name="current_password" class="form-control"
                                    placeholder="Enter current password" required>
                            </div>

                        </div>
                        {{-- NEW PASSWORD --}}

                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                New Password
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-key-fill"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Enter new password"
                                    required>
                            </div>
                            <small class="text-muted">
                                Minimum 8 characters recommended.
                            </small>
                        </div>
                        {{-- CONFIRM PASSWORD --}}

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Confirm New Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-text bg-white">
                                    <i class="bi bi-check2-square"></i>
                                </span>

                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm new password" required>
                            </div>
                        </div>
                        {{-- BUTTONS --}}

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-dark rounded-pill px-4">

                                <i class="bi bi-check-circle me-1"></i>
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ============================================================ --}}
    {{-- SUCCESS POPUP --}}
    {{-- ============================================================ --}}

    @if (session('success'))
        <div class="modal fade" id="passwordSuccessModal" tabindex="-1" aria-labelledby="passwordSuccessModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content border-0 shadow-lg rounded-4">

                    <div class="modal-body text-center p-5">


                        {{-- SUCCESS ICON --}}

                        <div class="mb-3">

                            <div class="bg-success bg-opacity-10
                                rounded-circle d-inline-flex
                                align-items-center
                                justify-content-center"
                                style="width:75px;height:75px;">

                                <i class="bi bi-check-circle-fill text-success fs-1"></i>

                            </div>

                        </div>


                        {{-- TITLE --}}

                        <h4 class="fw-bold mb-2">

                            Password Changed!

                        </h4>


                        {{-- MESSAGE --}}

                        <p class="text-muted mb-4">

                            {{ session('success') }}

                        </p>


                        {{-- DONE BUTTON --}}

                        <button type="button" class="btn btn-success rounded-pill px-4" data-bs-dismiss="modal">

                            <i class="bi bi-check2 me-1"></i>

                            Done

                        </button>

                    </div>

                </div>

            </div>

        </div>



        {{-- AUTO OPEN SUCCESS MODAL --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const successModalElement =
                    document.getElementById('passwordSuccessModal');

                if (successModalElement) {

                    const successModal =
                        new bootstrap.Modal(successModalElement);

                    successModal.show();

                }

            });
        </script>
    @endif



    {{-- ============================================================ --}}
    {{-- ERROR POPUP --}}
    {{-- ============================================================ --}}

    @if ($errors->any())
        <div class="modal fade" id="passwordErrorModal" tabindex="-1" aria-labelledby="passwordErrorModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content border-0 shadow-lg rounded-4">

                    <div class="modal-body text-center p-5">


                        <div class="mb-3">

                            <div class="bg-danger bg-opacity-10
                                rounded-circle d-inline-flex
                                align-items-center
                                justify-content-center"
                                style="width:75px;height:75px;">

                                <i class="bi bi-exclamation-circle-fill text-danger fs-1"></i>

                            </div>

                        </div>


                        <h4 class="fw-bold mb-2">

                            Password Not Changed

                        </h4>


                        <p class="text-muted mb-4">

                            {{ $errors->first() }}

                        </p>


                        <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">

                            <i class="bi bi-x-circle me-1"></i>

                            Close

                        </button>

                    </div>

                </div>

            </div>

        </div>



        {{-- AUTO OPEN ERROR MODAL --}}

        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const errorModalElement =
                    document.getElementById('passwordErrorModal');

                if (errorModalElement) {

                    const errorModal =
                        new bootstrap.Modal(errorModalElement);

                    errorModal.show();

                }

            });
        </script>
    @endif


@endsection
