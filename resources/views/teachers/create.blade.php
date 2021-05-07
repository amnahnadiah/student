@extends('teachers.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/vendors.min.css') }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<!-- END: Page CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap-extended.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/colors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/dark-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/bordered-layout.css') }}">
<!-- END: Theme CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/assets/css/style.css') }}">
<!-- END: Custom CSS-->
@endsection

@section('adminmainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/admin/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Teacher">Teacher</span></a>
        <ul class="menu-content">
            <li class="active"><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher-create/"><i data-feather="circle"></i><span class="menu-item" data-i18n="View">Create</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher"><i data-feather="circle"></i><span class="menu-item" data-i18n="List">List</span></a>
            </li>
        </ul>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/edulevel"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/subject"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Subject">Subject</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/class"><i data-feather="server"></i><span class="menu-title text-truncate" data-i18n="Class">Class</span></a>
    </li>
    <li class=" nav-item">
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i data-feather="log-out"></i>{{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
@endsection
 
@section('content')
<!-- BEGIN: Create Teacher-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- users filter start -->
            <div class="card">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add new teacher</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form" action="{{ url('/teacher-create') }}" method="POST">
                                    @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="card-title">Profile Information</h4>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="f_name">First Name</label>
                                                    <input type="text" id="f_name" class="form-control" placeholder="First Name" name="f_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="l_name">Last Name</label>
                                                    <input type="text" id="l_name" class="form-control" placeholder="Last Name" name="l_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" id="username" class="form-control" placeholder="Username" name="username" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" class="form-control" placeholder="Email" name="email"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" id="password" class="form-control"  placeholder="Password" name="password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number</label>
                                                    <input type="int" id="phone" class="form-control" name="phone" placeholder="Phone Number" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="ic">NRIC</label>
                                                    <input type="int" id="ic" class="form-control" name="ic" placeholder="NRIC" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="dob">Date of Birth</label>
                                                    <input type="date" id="dob" class="form-control" name="dob" placeholder="Date of Birth" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option>Choose Gender</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option>Choose Status</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="card-title">Address Information</h4>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Street</label>
                                                    <input type="text" class="form-control" id="street" name="street" placeholder="Street"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="City"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">State</label>
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="State"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Zipcode</label>
                                                    <input type="int" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Country</label>
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="Country"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h4 class="card-title">School Information</h4>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Schoool Name</label>
                                                    <input type="text" class="form-control" id="s_name" name="s_name" placeholder="School Name"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Type</label>
                                                    <input type="text" class="form-control" id="type" name="type" placeholder="Type"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Year</label>
                                                    <input type="int" class="form-control" id="year" name="year" placeholder="Year"/>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 col-12 mb-1">
                                                <div class="form-group">
                                                    <label for="basicInput">Academic Level</label>
                                                    <select class="form-control" id="acad_level" name="acad_level">
                                                        <option>Choose Academic Level</option>
                                                        <option value="SPM">SPM</option>
                                                        <option value="STPM">STPM</option>
                                                        <option value="Diploma">Diploma</option>
                                                        <option value="Degree">Degree</option>
                                                        <option value="Master">Master</option>
                                                        <option value="PHD">PHD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group form-check form-switch col-12">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="is_teacher" name="is_teacher" value=1 type="checkbox" tabindex="4" />
                                                    <label class="custom-control-label" for="is_teacher">Are this person a teacher?</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->
            </div>
        </section>
    </div>
</div>
<!-- END: Create Teacher-->
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('templates/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('templates/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->
@endsection