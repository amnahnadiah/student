@extends('teachers.layout')
 
@section('content')

<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <section class="app-user-view">
            <!-- User Card & Plan Starts -->
            <div class="row">
                <!-- User Card starts-->
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="card user-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0">{{ $user->username }}</h4>
                                                    <span class="card-text">{{ $user->password }}</span>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <a href="./app-user-edit.html" class="btn btn-primary">Edit</a>
                                                    <button class="btn btn-outline-danger ml-1">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                    <div class="user-info-wrapper">
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title">
                                                <i data-feather="user" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">First Name</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $profile->f_name }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="user" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Last Name</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $profile->l_name }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="check" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Status</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $teacher->status }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="star" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Position</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $teacher->position }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="award" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Academic Level</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $teacher->acad_level }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title">
                                                <i data-feather="credit-card" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">NRIC</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $profile->ic }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title">
                                                <i data-feather="gift" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">DOB</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $profile->dob }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Contact</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $profile->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /User Card Ends-->
        </section>
    </div>
</div>
@endsection