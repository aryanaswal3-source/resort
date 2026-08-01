@extends('layout.admin-layout')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid px-0">

    <div class="row">

        <div class="col-12">

            <div class="card border-0 rounded-5 shadow-lg overflow-hidden dashboard-banner">

                <div class="card-body py-4 px-5">

                    <div class="row align-items-center">

                        <!-- Left -->
                        <div class="col-lg-8">

                            <span class="badge rounded-pill px-3 py-2 bg-light text-success mb-3 fs-6">
                                🌴 Sunset Vista Resort
                            </span>

                            <h6 class="text-light fw-semibold mb-2">
                                Good Afternoon,
                                <span class="text-warning">Admin</span> 👋
                            </h6>

                            <h2 class="fw-bold text-white mb-3">
                                Everything You Need <br>
                                To Manage Your Resort <br>
                                Is Right Here.
                            </h2>

                            <p class="text-light mb-3">

                                <i class="fa-solid fa-bed text-warning"></i> Rooms

                                <span class="mx-2">•</span>

                                <i class="fa-solid fa-calendar-check text-warning"></i> Bookings

                                <span class="mx-2">•</span>

                                <i class="fa-solid fa-users text-warning"></i> Guests

                                <span class="mx-2">•</span>

                                <i class="fa-solid fa-money-bill-wave text-warning"></i> Payments

                                <span class="mx-2">•</span>

                                <i class="fa-solid fa-star text-warning"></i> Reviews

                            </p>

                            <button class="btn btn-warning rounded-pill px-4 py-2 fw-semibold">
                                <i class="fa-solid fa-chart-line me-2"></i>
                                View Dashboard
                            </button>

                        </div>

                        <!-- Right -->
                        <div class="col-lg-4 text-center d-none d-lg-block">

                            <i class="fa-solid fa-hotel text-warning"
                                style="font-size:130px;opacity:.15;"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ============ Booking Overview ============ --}}
    <style>
        .bo-card {
            border-radius: 20px;
            color: #fff;
            padding: 20px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .bo-card .bo-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: rgba(255, 255, 255, .25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex: none;
        }

        .bo-card .bo-text {
            display: flex;
            flex-direction: column;
        }

        .bo-card .bo-number {
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1.1;
        }

        .bo-card .bo-label {
            font-size: .78rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
            opacity: .9;
        }

        .bo-card::after {
            content: "";
            position: absolute;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .08);
            right: -20px;
            bottom: -20px;
        }

        .bo-total   { background: linear-gradient(135deg, #12321a, #1d4526); }
        .bo-pending { background: linear-gradient(135deg, #f2932e, #e0741a); }
        .bo-confirm { background: linear-gradient(135deg, #12857a, #0d6b62); }
        .bo-payment { background: linear-gradient(135deg, #6a3fc0, #4c2a94); }

        .bo-view-btn {
            background: #d9f2c4;
            color: #1d4526;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            font-size: .9rem;
            padding: 10px 22px;
        }
        .bo-view-btn:hover { background: #c9ecad; color: #1d4526; }
    </style>

    <div class="row mt-4">
        <div class="col-12">

            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                <h4 class="fw-bold m-0 d-flex align-items-center gap-2" style="color:#1d4526;">
                    <i class="fa-solid fa-bag-shopping"></i> Booking Overview
                </h4>
                <a href="#" class="bo-view-btn d-inline-flex align-items-center gap-2">
                    <i class="fa-solid fa-list"></i> View All Bookings
                </a>
            </div>

            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="bo-card bo-total">
                        <div class="bo-icon"><i class="fa-solid fa-hotel"></i></div>
                        <div class="bo-text">
                            <div class="bo-number">24</div>
                            <div class="bo-label">Total Bookings</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bo-card bo-pending">
                        <div class="bo-icon"><i class="fa-regular fa-clock"></i></div>
                        <div class="bo-text">
                            <div class="bo-number">7</div>
                            <div class="bo-label">Pending Bookings</div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bo-card bo-confirm">
                        <div class="bo-icon"><i class="fa-solid fa-circle-check"></i></div>
                        <div class="bo-text">
                            <div class="bo-number">17</div>
                            <div class="bo-label"> <small>Confirmed Bookings</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bo-card bo-payment">
                        <div class="bo-icon"><i class="fa-solid fa-sack-dollar"></i></div>
                        <div class="bo-text">
                            <div class="bo-number">5</div>
                            <div class="bo-label">Pending Payments</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- ============ Quick Actions ================ --}}

    {{-- <div class="row mt-4">
        <div class="col-12">
            <div class="qa-title mb-3">
                <span class="dot"></span> Quick Actions
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <a href="#" class="qa-card qa-room">
                        <div class="qa-icon"><i class="fa-solid fa-bed"></i></div>
                        <h6>Add Room</h6>
                        <p>Create new room type</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="qa-card qa-category">
                        <div class="qa-icon"><i class="fa-solid fa-layer-group"></i></div>
                        <h6>Add Category</h6>
                        <p>Create room category</p>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="qa-card qa-bookings">
                        <div class="qa-icon"><i class="fa-solid fa-calendar-check"></i></div>
                        <h6>View Bookings</h6>
                        <p>Manage guest bookings</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

</div> --}}

@endsection