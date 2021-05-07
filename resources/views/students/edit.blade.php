@extends('students.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
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
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/pages/app-user.css')}}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/assets/css/style.css')}}">
<!-- END: Custom CSS-->
@endsection
    
@section('studentmainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/edulevel"><i data-feather="award"></i><span class="menu-title text-truncate" data-i18n="Education Level">Education Level</span></a>
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
        <!-- users edit start -->
        <section class="app-user-edit">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- Account Tab starts -->
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <form class="form" action ="{{ url('student-update/' .$student->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <h4>Student Information</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="f_name">First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" value="{{ $student->profiles->f_name }}" name="f_name" id="f_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="l_name">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" value="{{ $student->profiles->users->l_name }}" name="l_name" id="l_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">User Name</label>
                                            <input type="text" class="form-control" placeholder="User Name" value="{{ $student->profiles->users->username }}" name="username" id="username" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" placeholder="Email" value="{{ $student->profiles->users->email }}" name="email" id="email" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ic">IC</label>
                                            <input type="integer" class="form-control" placeholder="IC" value="{{ $student->profiles->ic }}" name="ic" id="ic" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="integer" class="form-control" placeholder="phone" value="{{ $student->profiles->phone }}" name="phone" id="phone" />
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" class="form-control" placeholder="dob" value="{{ $student->profiles->dob }}" name="dob" id="dob" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" value="{{ $student->gender }}">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <h4>Address Information</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" class="form-control" value="{{ $student->profiles->alamats->street }}" placeholder="Street" id="street" name="street" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" value="{{ $student->profiles->alamats->city }}" placeholder="City" id="city" name="city"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" value="{{ $student->profiles->alamats->state }}" placeholder="State" id="state" name="state"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="zipcode">ZipCode</label>
                                            <input type="integer" class="form-control" value="{{ $student->profiles->alamats->zipcode }}" placeholder="ZipCode" id="zipcode" name="zipcode"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" value="{{ $student->profiles->alamats->country }}" placeholder="Country" id="countrye" name="country"/>
                                        </div>
                                    </div>
                                </div>
                                <h4>Parent Information</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="p_name">Parent Name</label>
                                            <input type="text" class="form-control" value="{{ $student->guardians->p_name }}" placeholder="Parent Name" id="p_name" name="p_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="relationship">Relationship</label>
                                            <input type="text" class="form-control" value="{{ $student->guardians->relatioship }}" placeholder="Relationship" id="relationship" name="relationship"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="p_phone">Phone No</label>
                                            <input type="integer" class="form-control" value="{{ $student->guardians->p_phone }}" placeholder="Phone No" id="p_phone" name="p_phone"/>
                                        </div>
                                    </div>
                                </div>
                                <h4>School Information</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="s_name">School Name</label>
                                            <input type="text" class="form-control" value=" @foreach ($student->studentSchoolMany as $school){{ $school->schoolsOne->s_name }} @endforeach" placeholder="School Name" id="s_name" name="s_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="type">School Type</label>
                                            <input type="text" class="form-control" value="    @foreach ($student->studentSchoolMany as $school){{ $school->schoolsOne->type }}@endforeach" placeholder="SMK/SK" id="type" name="type"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="edu_id">Academic Level</label>
                                            <select class="form-control" id="edu_id" name="edu_id" value="  @foreach($student->profiles->profileEdulevelMany as $edulevel){{ $edulevel->edulevelsOne->level }}@endforeach">
                                                <option value=1>UPSR</option>
                                                <option value=2>PT3</option>
                                                <option value=3>SPM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="s_phone">Phone No</label>
                                            <input type="integer" class="form-control" value=" @foreach ($student->studentSchoolMany as $school){{ $school->schoolsOne->s_phone }}@endforeach " placeholder="Phone No" id="s_phone" name="s_phone"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="integer" class="form-control" value="  @foreach ($student->studentSchoolMany as $school){{ $school->schoolsOne->year }}@endforeach" placeholder="Year of School" id="year" name="year"/>
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Submit</button>
                                        <button type="back" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" action ="{{ url('student-edit/' .$student->id) }}">Back</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                        </div>
                        <!-- Account Tab ends -->
                    </div>
                </div>
            </div>
        </section>
        <!-- users edit ends -->
    </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset ('templates/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset ('templates/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset ('templates/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset ('templates/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset ('templates/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset ('templates/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset ('templates/app-assets/js/scripts/pages/app-user-edit.js')}}"></script>
<script src="{{ asset ('templates/app-assets/js/scripts/components/components-navs.js')}}"></script>
<!-- END: Page JS-->
@endsection