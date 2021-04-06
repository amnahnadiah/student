@extends('teachers.layout')
 
@section('content')

<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
        <!-- users list start -->
        <section class="app-user-list">
            <!-- users filter start -->
            <div class="card">
                <h5 class="card-header">Search Filter</h5>
                <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <!-- users filter end -->
            <!-- list section start -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table class="user-list-table table">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- Modal to add new user starts-->
                <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
                    <div class="modal-dialog">
                        <form class="add-new-user modal-content pt-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                            <div class="modal-header mb-1">
                                <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                            </div>
                            <div class="modal-body flex-grow-1">
                                <div class="form-group">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"/>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Modal to add new user Ends-->
            </div>
            <!-- list section end -->
        </section>
        <!-- users list ends -->
    </div>
</div>
@endsection