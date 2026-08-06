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

                                <i class="fa-solid fa-hotel text-warning" style="font-size:130px;opacity:.67;"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- ============ Booking Overview ============ --}}

        <div class="row mt-4">
            <div class="col-12">

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3">
                    <h4 class="fw-bold m-0 d-flex align-items-center gap-2" style="color:#8a4a52;">
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
                            <div class="bo-icon"><i class="fa-solid fa-indian-rupee-sign"></i></div>
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
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-3 ">
            <h4 class="fw-bold m-0 d-flex align-items-center gap-2" style="color:#8a4a52;">
                <i class="bi bi-escape fw-bolder fs-3"></i> Quick Actions
            </h4>
        </div>

        <div class="row g-3 mt-2">

            <div class="col-md-4">
                <div class="quick-action-card qa-additem">
                    <div class="qa-icon">
                        <i class="fa-solid fa-bed"></i>
                    </div>
                    <h6>Add Room</h6>
                    <p>Create new room type</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="quick-action-card qa-addcategory">
                    <div class="qa-icon">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <h6>Bookings</h6>
                    <p>Manage reservations</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="quick-action-card qa-vieworders">
                     <a href=" {{ route('admin.queries.index') }}" class="stretched-link"></a>
                    <div class="qa-icon">
                        <i class="fa-solid fa-user-group"></i>
                    </div>
                    <h6>Guests Queries</h6>
                    <p>View guest queries</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="quick-action-card qa-bulkproducts">
                    <div class="qa-icon">
                        <i class="fa-solid fa-door-open"></i>
                    </div>
                    <h6>Rooms List</h6>
                    <p>View all rooms</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="quick-action-card qa-itemslist">
                    <a href="{{ route('admin.services.create') }}" class="stretched-link"></a>
                    <div class="qa-icon">
                        <i class="fa-solid fa-spa"></i>
                    </div>
                    <h6>Add Facility</h6>
                    <p>Create amenity or service</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="quick-action-card qa-categories">
                    <div class="qa-icon">
                        <i class="fa-solid fa-indian-rupee-sign"></i>
                    </div>
                    <h6>Payments</h6>
                    <p>Track guest payments</p>
                </div>
            </div>

        </div>
    @endsection
