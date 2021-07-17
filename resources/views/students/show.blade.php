@extends('students.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/bordered-layout.css')}}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/pages/app-invoice-list.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/pages/app-user.css')}}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/assets/css/style.css')}}">
<!-- END: Custom CSS-->
@endsection

@section('adminmainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/admin/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Teacher">Teacher</span></a>
        <ul class="menu-content">
            <li><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher-create/"><i data-feather="circle"></i><span class="menu-item" data-i18n="View">Create</span></a>
            </li>
            <li><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher"><i data-feather="circle"></i><span class="menu-item" data-i18n="List">List</span></a>
            </li>
        </ul>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/room"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
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

@section('teachermainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
    </li>
    <li class=" nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/room"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
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
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <section class="app-user-view">
            <!-- User Card & Plan Starts -->
            <div class="row">
                <!-- User Card starts-->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card user-card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0">{{ $student->profiles->f_name }}</h4>
                                                    <span class="card-text">{{ $student->profiles->users->email }}</span>
                                                </div>
                                                <div class="demo-inline-spacing">
                                                    <a href="{{ Request::root() }}/student-index" class="btn btn-outline-info round">Back</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-12 mt-2 mt-xl-0">
                                    <div class="user-info-wrapper">
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title">
                                                <i data-feather="user" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Name</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $student->profiles->f_name }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="check" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">NRIC</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $student->profiles->ic }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Telephone No</span>
                                            </div>
                                            <p class="card-text mb-0">+60{{ $student->profiles->phone }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="search" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Date of Birth</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $student->profiles->dob }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title">
                                                <i data-feather="meh" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Gender</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $student->gender }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="map-pin" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Address</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $student->profiles->alamats->street }}</p>
                                        </div>
                                            <div class="d-flex flex-wrap">
                                            <div class="user-info-title"></div>
                                            <p class="card-text mb-0">{{ $student->profiles->alamats->zipcode }} {{ $student->profiles->alamats->city }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title"></div>
                                            <p class="card-text mb-0">{{ $student->profiles->alamats->state }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap">
                                            <div class="user-info-title"></div>
                                            <p class="card-text mb-0">{{ $student->profiles->alamats->country }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="zap" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Parent Name</span>
                                            </div>
                                            <p class="card-text mb-0">{{ $student->guardians->p_name }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Parent Phone No</span>
                                            </div>
                                            <p class="card-text mb-0">+60{{ $student->guardians->p_phone }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="target" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">School Name</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                @foreach ($student->studentSchoolMany as $school)
                                                    {{ $school->schoolsOne->s_name }}
                                                @endforeach</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">School Phone No</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                @foreach ($student->studentSchoolMany as $school)
                                                    {{ $school->schoolsOne->s_phone }}
                                                @endforeach 
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="settings" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">School Type</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                    @foreach ($student->studentSchoolMany as $school)
                                                    {{ $school->schoolsOne->type }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="settings" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Academic Level</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                    @foreach ($student->profiles->profileEdulevelMany as $edulevel)
                                                    {{ $edulevel->edulevelsOne->level }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title">
                                                <i data-feather="settings" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Year</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                    @foreach ($student->studentSchoolMany as $school)
                                                    {{ $school->schoolsOne->year }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /User Card Ends-->
            </div>
            <!-- User Card & Plan Ends -->
            
            </div>
            <!-- User Timeline & Permissions Ends -->
        </section>

    </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/extensions/moment.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('templates/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('templates/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('templates/app-assets/js/scripts/pages/app-user-view.js')}}"></script>
<!-- END: Page JS-->
@endsection