@extends('teachers.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap-extended.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/colors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/dark-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/bordered-layout.css') }}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/pages/app-user.css') }}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/assets/css/style.css') }}">
<!-- END: Custom CSS-->
@endsection

@section('teachermainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
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
<!-- BEGIN: Content-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users edit start -->
        <section class="app-user-edit">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Update Teacher</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ url('teacher-update/'.$teacher->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="card-title">Profile Information</h4>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">First Name</label>
                                            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name" value="{{ $teacher->teacherProfile->f_name }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Last Name</label>
                                            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Last Name" value="{{ $teacher->teacherProfile->l_name }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $teacher->teacherProfile->profileUser->username }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $teacher->teacherProfile->profileUser->email }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">NRIC</label>
                                            <input type="int" class="form-control" id="ic" name="ic" placeholder="NRIC" value="{{ $teacher->teacherProfile->ic }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Date of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="{{ $teacher->teacherProfile->dob }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="basicInput">Phone Number</label>
                                            <input type="int" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ $teacher->teacherProfile->phone }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="basicInput">Gender</label>
                                            <select class="form-control" id="gender" name="gender" value="{{ $teacher->gender }}">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="basicInput">Status</label>
                                            <select class="form-control" id="status" name="status" value="{{ $teacher->status }}">
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
                                            <input type="text" class="form-control" id="street" name="street" placeholder="Street" value="{{ $teacher->teacherProfile->profileAlamat->street }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">City</label>
                                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $teacher->teacherProfile->profileAlamat->city }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">State</label>
                                            <input type="text" class="form-control" id="state" name="state" placeholder="State" value="{{ $teacher->teacherProfile->profileAlamat->state }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Zipcode</label>
                                            <input type="int" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" value="{{ $teacher->teacherProfile->profileAlamat->zipcode }}"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" placeholder="Country" value="{{ $teacher->teacherProfile->profileAlamat->country }}"/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="card-title">School Information</h4>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Schoool Name</label>
                                            <input type="text" class="form-control" id="s_name" name="s_name" placeholder="School Name" value="@foreach ($teacher->teacherSchool as $school) {{ $school->schoolsOne->s_name }} @endforeach"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Type</label>
                                            <input type="text" class="form-control" id="type" name="type" placeholder="Type" value="@foreach ($teacher->teacherSchool as $school) {{ $school->schoolsOne->type }} @endforeach"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Year</label>
                                            <input type="int" class="form-control" id="year" name="year" placeholder="Year" value="@foreach ($teacher->teacherSchool as $school) {{ $school->schoolsOne->year }} @endforeach"/>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="basicInput">Academic Level</label>
                                            <select class="form-control" id="acad_level" name="acad_level" value="@foreach ($teacher->teacherSchool as $school) {{ $school->schoolsOne->acad_level }} @endforeach">
                                                <option value="SPM">SPM</option>
                                                <option value="STPM">STPM</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Degree">Degree</option>
                                                <option value="Master">Master</option>
                                                <option value="PHD">PHD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->

    </div>
</div>
<!-- END: Content-->
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('templates/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('templates/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('templates/app-assets/js/scripts/pages/app-user-edit.js') }}"></script>
<script src="{{ asset('templates/app-assets/js/scripts/components/components-navs.js') }}"></script>
<!-- END: Page JS-->
@endsection