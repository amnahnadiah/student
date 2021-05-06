@extends('students.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/themes/bordered-layout.css')}}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/plugins/forms/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('templates/app-assets/css/pages/app-user.css')}}">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('templates/assets/css/style.css')}}">
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

@section('teachermainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/teacher/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
    </li>
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/student-index"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Student">Student</span></a>
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
        <div class="card">
            <div class="card-datatable table-responsive pt-0">
                <table class="user-list-table table" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>No Phone</th>
                            <th>Address</th>
                            <th>Academic Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
</div>
@endsection

@section('js')
<!-- BEGIN: Vendor JS-->
<script src="{{asset('templates/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- <script src="{{asset('templates/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('templates/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{asset('templates/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('templates/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
<script src="{{asset('templates/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('templates/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('templates/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script> -->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{asset('templates/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('templates/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function()
        {
        $('#dataTable').dataTable(
        {
            processing: false,
            serverSide: false,
            ajax: "{{ route('student.fetch') }}",
            columns: 
            [
                { data: 'id'  },
                { data: 'f_name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'address' },
                { data: 'acad_level'},
                { data: 'action'},
            ]
        });
    });
</script>   
@endsection
