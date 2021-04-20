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
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" id="status" name="status">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="is_teacher" name="is_teacher" value=1>
                                                    <label class="form-check-label" for="is_teacher">Is this person a teacher?</label>
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