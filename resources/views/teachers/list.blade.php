@extends('teachers.layout')

@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/pages/app-user.css') }}">
<!-- END: Page CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/bootstrap-extended.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/colors.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/components.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/dark-layout.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('templates/app-assets/css/themes/bordered-layout.css') }}">

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('templates/assets/css/style.css') }}">
<!-- END: Custom CSS-->
@endsection
 
@section('content')
<!--BEGIN: Datatable-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- list section start -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="user-list-table table" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- list section end -->
        </section>
    </div>
</div>
<!--END: Datatable-->
@endsection

@section('js')
<!-- BEGIN: Page Vendor JS-->
<!-- <script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('templates/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script> -->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Page JS-->
<!-- <script src="{{ asset('templates/app-assets/js/scripts/pages/app-user-list.js') }}"></script> -->
<!-- END: Page JS-->

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('templates/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('templates/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('templates/app-assets/js/core/app.js') }}"></script>
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
            ajax:  "{{ route('teacher.fetch') }}",
            columns: [
                { data: 'id' },
                { data: 'f_name' },
                { data: 'l_name' },
                { data: 'email' },
                { data: 'phone' },
                { data: 'status' },
                { data: 'action' },
            ]
        });
    });
</script>
@endsection