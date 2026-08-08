{{-- ===== Sign In Modal ===== --}}
<div class="modal fade" id="signInModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content signin-modal-content">

            <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="signin-row">

                {{-- Left gradient panel --}}
                <div class="signin-side">
                    <i class="bi bi-water floating-icon i1"></i>
                    <i class="bi bi-umbrella floating-icon i2"></i>
                    <i class="bi bi-stars floating-icon i3"></i>

                    <div class="signin-side-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <h4>Welcome Back</h4>
                    <p>Sign in to manage your bookings and continue your stay with us</p>
                </div>

                {{-- Right form panel --}}
                <div class="signin-form-side">
                    <p class="section-label mb-2">WELCOME BACK</p>
                    <h3 class="section-title mb-4">Sign In to Your Account</h3>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="signin-input-group">
                            <label class="signin-label">Email</label>
                            <i class="bi bi-envelope field-icon"></i>
                            <input type="email" name="email" class="signin-input" placeholder="you@example.com" required>
                        </div>

                        <div class="signin-input-group">
                            <label class="signin-label">Password</label>
                            <i class="bi bi-lock field-icon"></i>
                            <input type="password" class="signin-input" name="password" id="signinPassword" placeholder="••••••••"
                                required>
                            <button type="button" class="toggle-password"
                                onclick="
                                const f=document.getElementById('signinPassword');
                                f.type = f.type === 'password' ? 'text' : 'password';
                                this.querySelector('i').classList.toggle('bi-eye');
                                this.querySelector('i').classList.toggle('bi-eye-slash');
                            ">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe"   name="remember">
                                <label class="form-check-label small" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#" class="small signin-forgot">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn-explore w-100 justify-content-center">
                            Sign In
                            <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                        </button>
                    </form>

                    <div class="signin-divider">OR CONTINUE WITH</div>

                    <div class="social-btn-row">
                        <button type="button" class="btn-social google">
                            <i class="bi bi-google"></i> Google
                        </button>
                        <button type="button" class="btn-social facebook">
                            <i class="bi bi-facebook"></i> Facebook
                        </button>
                    </div>

                    <p class="text-center mt-4 mb-0 small">
                        Don't have an account? <a href="#" class="signin-forgot" id="goToSignUp">Create one</a>
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
