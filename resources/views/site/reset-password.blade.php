@extends('layout.site-layout')

@section('title', 'Reset Password')

@section('content')

<section class="py-5" style="min-height: 70vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="p-4 p-md-5 bg-white rounded-4 shadow-sm">

                    <p class="section-label mb-2">RESET PASSWORD</p>
                    <h3 class="section-title mb-4">Choose a New Password</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 small mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" class="form-control" value="{{ $email }}" disabled>
                        </div>

                        <div class="mb-3 position-relative">
                            <label class="form-label fw-semibold">New Password</label>
                            <input type="password" name="password" id="newPassword" class="form-control pe-5" placeholder="••••••••" required>
                            <i class="bi bi-eye position-absolute" style="right: 15px; top: 42px; cursor: pointer; color: #6c757d;" onclick="
                                const f = document.getElementById('newPassword');
                                f.type = f.type === 'password' ? 'text' : 'password';
                                this.classList.toggle('bi-eye');
                                this.classList.toggle('bi-eye-slash');
                            "></i>
                        </div>

                        <div class="mb-4 position-relative">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="confirmNewPassword" class="form-control pe-5" placeholder="••••••••" required>
                            <i class="bi bi-eye position-absolute" style="right: 15px; top: 42px; cursor: pointer; color: #6c757d;" onclick="
                                const f = document.getElementById('confirmNewPassword');
                                f.type = f.type === 'password' ? 'text' : 'password';
                                this.classList.toggle('bi-eye');
                                this.classList.toggle('bi-eye-slash');
                            "></i>
                            plore w-100 justify-content-center">
                            Reset Password
                            <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection