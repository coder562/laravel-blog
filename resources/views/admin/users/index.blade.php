@extends('layouts.backend.app')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>User Id</th>
                                    <th>Created_At</th>
                                    <th>Updated_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )


                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#viewModal-{{$user->id}}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#editmodal-{{$user->id}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#deletemodal">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
    <!--  view model -->
@foreach ( $users as $user )

<!-- view model start -->
<div class="modal fade" id="viewModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$user->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$user->email}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Role</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$user->role->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">User Id</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$user->user_id}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Created at</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$user->created_at}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Updated at</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$user->updated_at}}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- view model end -->


        <!--  view end model -->

    <!-- edit model -->
    <div class="modal fade" id="editmodal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('admin/users_update',$user->id)}}" method="post" id="edit_User-{{$user->id}}">
                            @csrf
                            {{-- <input type="text" value="{{$user->id}}" name="id"> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->name}}</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->email}}</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                @foreach ( $role as $roles )


                                <input type="radio" name="role" value="{{$roles->id}}" {{$user->role->id==$roles->id ? 'checked' : ""}}>{{$roles->name}}
                                @endforeach
                                {{-- <input type="radio" name="role" value="user">User
                                <input type="radio" name="role" value="suspend">Suspend --}}
                            </div>


                    </div><!--modal body end-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary"
                        onclick="event.preventDefault();
                        document.getElementById('edit_User-{{$user->id}}').submit();
                        " >Update</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit model end -->

    <!-- delete model -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            The user will be deleted!!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary"
                        onclick="event.preventDefault();
                        document.getElementById('delete_User-{{$user->id}}').submit();">Confirm</button>
                        <form action="{{url('admin/users_delete',$user->id)}}" id="delete_Category-{{$user->id}}" method="post">
                            @csrf

                        </form>
                    </div>

            </div>
        </div>
    </div>

    <!-- end delete model -->
    @endforeach
</div><!-- .content -->
@endsection
{{-- div class="row form-group">
                              <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->name}}</p>
                            </div> --}}
