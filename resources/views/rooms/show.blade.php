@extends('rooms.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/vendors/css/vendors.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/themes/bordered-layout.css')}}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/app-assets/css/pages/page-blog.css')}}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset ('templates/assets/css/style.css')}}">
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
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/room"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/subject"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Subject">Subject</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/class"><i data-feather="server"></i><span class="menu-title text-truncate" data-i18n="Class">Class</span></a>
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
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/room"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/subject"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Subject">Subject</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/class"><i data-feather="server"></i><span class="menu-title text-truncate" data-i18n="Class">Class</span></a>
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

@section('studentmainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/room"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/subject"><i data-feather="book"></i><span class="menu-title text-truncate" data-i18n="Subject">Subject</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/class"><i data-feather="server"></i><span class="menu-title text-truncate" data-i18n="Class">Class</span></a>
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
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12"></div>
            </div>
        </div>
    </div>
    <div class="content-detached content-left">
        <div class="content-body">
            <!-- Blog List -->
            <div class="blog-list-wrapper">
                <!-- Blog List Items -->
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <a href="{{ Request::root() }}/subject">
                                <img class="card-img-top img-fluid" src="{{ asset ('templates/app-assets/images/slider/upsr.jpg')}}" alt="UPSR" />
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ Request::root() }}/subject" class="blog-title-truncate text-body-heading">UPSR Subjects</a>
                                </h4>
                                <p class="card-text blog-content-truncate">
                                    Subjects for UPSR students.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <a href="{{ Request::root() }}/subject">
                                <img class="card-img-top img-fluid" src="{{ asset ('templates/app-assets/images/slider/pt3.jpg')}}" alt="PT3" />
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ Request::root() }}/subject" class="blog-title-truncate text-body-heading">PT3 Subjects</a>
                                </h4>
                                <p class="card-text blog-content-truncate">
                                    Subjects for PT3 Students
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <a href="{{ Request::root() }}/subject">
                                <img class="card-img-top img-fluid" src="{{ asset ('templates/app-assets/images/slider/spm.jpg')}}" alt="SPM" />
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="{{ Request::root() }}/subject" class="blog-title-truncate text-body-heading">SPM Subjects</a>
                                </h4>
                                <p class="card-text blog-content-truncate">
                                    Subjects for SPM students
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog List Items -->
            </div>
            <!--/ Blog List -->
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset ('templates/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset ('templates/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset ('templates/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->
@endsection