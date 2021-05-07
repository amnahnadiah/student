@extends('students.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/forms/select/select2.min.css')}}">
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
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/form-wizard.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
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
    <div class="content-body">
        <!-- Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Information</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" action ="{{ url('/student-create') }}" method="POST">
                                    @csrf
                                <div class="row">
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
                                            <label for="ic">IC</label>
                                            <input type="int" id="ic" class="form-control" placeholder="IC" name="ic" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="phone">Telephone No</label>
                                            <input type="int" id="phone" class="form-control" name="phone" placeholder="Telephone No" />
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
                                                <option value=""></option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                            <h4 class="card-title">Address Information</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="street">Street</label>
                                            <input type="text" id="street" class="form-control" name="street" placeholder="Street" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" id="city" class="form-control" name="city" placeholder="City" />
                                        </div>   
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <input type="text" id="state" class="form-control" name="state" placeholder="State" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="zipcode">ZipCode</label>
                                            <input type="int" id="zipcode" class="form-control" name="zipcode" placeholder="ZipCode" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" id="country" class="form-control" name="country" placeholder="Country" />
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4 class="card-title">Parent Information</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="p_name">Parent Name</label>
                                            <input type="text" id="p_name" class="form-control" name="p_name" placeholder="Father/Mother Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="relationship">Relationship</label>
                                            <input type="text" id="relationship" class="form-control" name="relationship" placeholder="Relationship" />
                                        </div>   
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="p_phone">Phone No</label>
                                            <input type="int" id="p_phone" class="form-control" name="p_phone" placeholder="Phone No" />
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4 class="card-title">School Information</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="s_name">School Name</label>
                                            <input type="text" id="s_name" class="form-control" name="s_name" placeholder="School Name" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="type">Type of School</label>
                                            <input type="text" id="type" class="form-control" name="type" placeholder="Type of School (SMK/SK)" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="edu_id">Academic Level</label>
                                            <select class="form-control" id="edu_id" name="edu_id">
                                                <option value=""></option>
                                                <option value=1>UPSR</option>
                                                <option value=2>PT3</option>
                                                <option value=3>SPM</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="s_phone">School Phone No</label>
                                            <input type="int" id="s_phone" class="form-control" name="s_phone" placeholder="School Phone No" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="year">Year</label>
                                            <input type="integer" id="year" class="form-control" name="year" placeholder="Year" />
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
</div>
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('templates/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ asset('templates/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('templates/app-assets/js/scripts/forms/form-wizard.js')}}"></script>
<!-- END: Page JS-->
@endsection