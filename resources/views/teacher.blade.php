@extends('home')

@section('teacherheader')
<a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="user-nav d-sm-flex d-none">
        <span class="user-name font-weight-bolder">{{ Auth::user()->username }}</span>
        <span class="user-status">Teacher</span>
    </div>
</a>
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
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <section class="app-user-view">
            <!-- User Card & Plan Starts -->
            <div class="row">
                <!-- User Card starts-->
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card user-card">
                        <div class="card-header">
                            <h1 class="card-title">Teacher Information</h1>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h3 class="mb-0">{{ Auth::user()->username }}</h3>
                                                    <h5 class="mb-0">{{ Auth::user()->email }}</h5>
                                                    <span class="card-text">{{ Auth::user()->userProfile->profileTeacher->status }}</span>
                                                </div>
                                                <div class="demo-inline-spacing">
                                                    <a href="{{ Request::root() }}/teacher-edit/{{ Auth::user()->userProfile->profileTeacher->id }}" class="edit btn btn-smbtn btn-outline-success round waves-effect">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-12 mt-2 mt-xl-0">
                                    <div class="user-info-wrapper">
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="user" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Full Name</span>
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->f_name }} {{ Auth::user()->userProfile->l_name }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="user-check" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Gender</span>
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->profileTeacher->gender }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="credit-card" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">NRIC</span>
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->ic }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="gift" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Date of Birth</span>
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->dob }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="phone" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Phone Number</span>
                                            </div>
                                            <p class="card-text mb-0">+60{{ Auth::user()->userProfile->phone }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="home" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Home Address</span>
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->profileAlamat->street }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->profileAlamat->city }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                            </div>
                                            <p class="card-text mb-0"> {{ Auth::user()->userProfile->profileAlamat->zipcode }} {{ Auth::user()->userProfile->profileAlamat->state }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                            </div>
                                            <p class="card-text mb-0">{{ Auth::user()->userProfile->profileAlamat->country }}</p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="book" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">School Name</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                @foreach (Auth::user()->userProfile->profileTeacher->teacherSchool as $school)
                                                    {{ $school->schoolsOne->s_name }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="book-open" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">School Type</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                @foreach (Auth::user()->userProfile->profileTeacher->teacherSchool as $school)
                                                    {{ $school->schoolsOne->type }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="check" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Graduate Year</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                @foreach (Auth::user()->userProfile->profileTeacher->teacherSchool as $school)
                                                    {{ $school->schoolsOne->year }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="d-flex flex-wrap my-50">
                                            <div class="user-info-title col-lg-4">
                                                <i data-feather="award" class="mr-1"></i>
                                                <span class="card-text user-info-title font-weight-bold mb-0">Academic Level</span>
                                            </div>
                                            <p class="card-text mb-0">
                                                @foreach (Auth::user()->userProfile->profileTeacher->teacherSchool as $school)
                                                    {{ $school->schoolsOne->acad_level }}
                                                @endforeach
                                            </p>
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
<!-- END: Content-->
@endsection