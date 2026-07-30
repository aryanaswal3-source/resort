{{-- ===== Sign Up Modal (Bootstrap forms) ===== --}}
<div class="modal fade" id="signUpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content signin-modal-content">

            <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="signin-row">

                {{-- Left gradient panel (reused from signin) --}}
                <div class="signin-side">
                    <i class="bi bi-water floating-icon i1"></i>
                    <i class="bi bi-umbrella floating-icon i2"></i>
                    <i class="bi bi-stars floating-icon i3"></i>

                    <div class="signin-side-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <h4>Join Us</h4>
                    <p>Create your account to book rooms and unlock exclusive resort offers</p>
                </div>

                {{-- Right form panel: pure Bootstrap classes --}}
                <div class="signin-form-side">
                    <p class="section-label mb-2">GET STARTED</p>
                    <h3 class="section-title mb-4">Create Your Account</h3>

                    @if (session('form') === 'register' && $errors->any())
                        <div class="alert alert-danger py-2 small mb-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="form" value="register">

                        {{-- Photo upload --}}
                        <div class="text-center mb-3">
                            <label for="profilePhoto" style="cursor:pointer;">
                                <img id="photoPreview" src="{{ asset('image/avatar/resort-logo.png') }}"
                                     class="rounded-circle border" width="90" height="90"
                                     style="object-fit: cover;" alt="Preview">
                                <div class="small text-muted mt-1">
                                    <i class="bi bi-camera"></i> Upload Photo
                                </div>
                            </label>
                            <input type="file" name="profile_photo" id="profilePhoto" class="d-none"
                                   accept="image/*" onchange="
                                       const file = this.files[0];
                                       if (file) {
                                           document.getElementById('photoPreview').src = URL.createObjectURL(file);
                                       }
                                   ">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{ old('name') }}" placeholder="Your name" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{ old('email') }}" placeholder="you@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold">Phone Number</label>
                            <input type="text" name="phone" id="phone" class="form-control"
                                   value="{{ old('phone') }}" placeholder="98765 43210" maxlength="15">
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="••••••••" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password_confirmation" class="form-label fw-semibold">Confirm</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                       class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn-explore w-100 justify-content-center mt-2">
                            Create Account
                            <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                        </button>
                    </form>

                    <p class="text-center mt-4 mb-0 small">
                        Already have an account?
                        <a href="#" class="signin-forgot" id="backToSignIn">Sign In</a>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>