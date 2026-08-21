{{-- ===== Forgot Password Modal ===== --}}
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 14px; border: none;">

            <button type="button" class="btn-close-custom" data-bs-dismiss="modal" aria-label="Close"
                style="position:absolute; top:18px; right:18px; background:none; border:none; color:#7A7E9A; font-size:1.1rem; z-index:5;">
                <i class="bi bi-x-lg"></i>
            </button>

            <div class="modal-body" style="padding: 45px 40px;">

                <p class="section-label mb-2">RESET PASSWORD</p>
                <h3 class="section-title mb-3">Forgot Your Password?</h3>
                <p class="text-muted small mb-4">
                    Enter your email address and we'll send you a link to reset your password.
                </p>

                @if (session('error'))
                    <div class="alert alert-danger py-2 small mb-3">{{ session('error') }}</div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success py-2 small mb-3">{{ session('success') }}</div>
                @endif

                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <input type="hidden" name="form" value="forgot_password">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="you@example.com"
                            required>
                    </div>

                    <button type="submit" class="btn-explore w-100 justify-content-center mt-2">
                        Send Reset Link
                        <span class="icon-circle"><i class="bi bi-arrow-right"></i></span>
                    </button>
                </form>

                <p class="text-center mt-4 mb-0 small">
                    Remembered your password?
                    <a href="#" class="signin-forgot" id="backToSignInFromForgot">Sign In</a>
                </p>

            </div>

        </div>
    </div>
</div>
