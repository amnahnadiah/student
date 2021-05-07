@extends('home')

@section('adminheader')
<a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <div class="user-nav d-sm-flex d-none">
        <span class="user-name font-weight-bolder">{{ Auth::user()->username }}</span>
        <span class="user-status">Admin</span>
    </div>
</a>
@endsection

@section('adminmainmenu')
<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li class="active nav-item"><a class="d-flex align-items-center" href="{{ Request::root() }}/admin/routes"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a>
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
    <div class="content-header row"></div>

        <!-- Teacher list -->
        <div class="content-body">
            <section id="default-divider">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Teachers</h4>
                    </div>
                    <div class="col-8">
                        <a href="{{ Request::root() }}/teacher-create" class="edit btn btn-smbtn btn-outline-dark round waves-effect">Add new Teacher</a>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="dataTableTeacher">
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
            </section>
        </div>
        <!--/ Teacher list -->

        <!-- Subject list -->
        <div class="content-body">
            <section id="default-divider">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Subjects</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table" id="dataTableSubject">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!--/ Subject list -->

    </div>
</div>
<!-- END: Content-->
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#dataTableTeacher').dataTable(
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

<script type="text/javascript">
    $(document).ready(function() 
    {
        $('#dataTableSubject').dataTable(
        {
            processing: false,
            serverSide: false,
            ajax:  "{{ route('subject.fetch') }}",
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'description' },
                { data: 'action' },
            ]
        });
    });
</script>
@endsection
