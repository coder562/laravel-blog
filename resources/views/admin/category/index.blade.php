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
                        <a href="" class="btn btn-danger" style="float:right" data-toggle="modal" data-target="#add_category">Add category</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Created_At</th>
                                    <th>Updated_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $cat )


                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->slug}}</td>
                                    <td>{{$cat->description}}</td>
                                    <td><img src="{{'/admin/upload/'.$cat->image}}" width="20%" alt=""></td>
                                    <td>{{$cat->created_at}}</td>
                                    <td>{{$cat->updated_at}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#viewModal-{{$cat->id}}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#editmodal-{{$cat->id}}">
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

 {{-- category model --}}
 <div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/category_update')}}" method="post" id="createCategory" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Text" class="form-control">
                            <small class="form-text text-muted">This is a help text</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                        <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                    </div>
                    {{-- <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Category Image</label></div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="file-input" name="image" class="form-control-file">
                        </div>
                    </div> --}}
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Category Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="file-input" name="image" class="form-control-file" style='height: 32px;' onchange="loadFilee(event)">
                            <img id="output" style="max-width: 150px; max-height: 150px; border-radius: 0%;">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-md" onclick="event.preventDefault();
                    document.getElementById('createCategory').submit();">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
 {{-- end category model --}}


 @foreach ( $category as $cat )


<!-- view model start -->
<div class="modal fade" id="viewModal-{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
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
                        <p class="form-control-static">{{$cat->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Slug</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$cat->slug}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$cat->description}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$cat->image}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Created at</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$cat->created_at}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Updated at</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$cat->updated_at}}</p>
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
    <div class="modal fade" id="editmodal-{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('admin/category_update',$cat->id)}}" method="post" id="edit_Category-{{$cat->id}}" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="text" value="{{$user->id}}" name="id"> --}}
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static"><input type="text" name="name" value="{{$cat->name}}"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Slug</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static"><input type="text" name="slug" value="{{$cat->slug}}"></p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static"><textarea name="description">{{$cat->description}}</textarea></p>
                                </div>
                            </div>
                            {{-- <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static"> {{$cat->image}}</p>
                                </div>
                            </div> --}}
                            <div class="row from-group">
                                <div class="col col-md-3">
                                    <label class="from-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9 form-inline">
                                     <p class="from-control">
                                         <input type="file" id="file-input" name="image" class="form-control-file" value="{{$cat->image}}" style='height: 32px;' onchange="loadFile(event)">
                                     </p>
                                      <a id="demo">{{$cat->image}}</a>
                                    <img id="outpu" src="{{ url('/admin/upload/'.$cat->image) }}" style="min-height: 100px; min-width: 100px; max-height: 100px; max-width: 100px; border-radius: 100%;">
                                </div>
                            </div>




                    </div><!--modal body end-->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary"
                        onclick="event.preventDefault();
                        document.getElementById('edit_Category-{{$cat->id}}').submit();
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
                        document.getElementById('delete_category-{{$cat->id}}').submit();">Confirm</button>
                        <form action="{{url('admin/category_delete')}}" id="delete_User-{{$cat->id}}" method="post">
                            @csrf

                        </form>
                    </div>

            </div>
        </div>
    </div>

    <!-- end delete model -->
    @endforeach
</div><!-- .content -->
<script>
    var loadFilee=function(event){
    var output= document.getElementById('output');
    output.src=URL.createObjectURL(event.target.files[0]);
    };
</script>
{{-- input image script code end --}}




{{-- edit image script code start --}}
<script>
   var loadFile=function(event){
   document.getElementById('demo').style.display='none';
   var outpu= document.getElementById('outpu');
   outpu.src=URL.createObjectURL(event.target.files[0]);
   };
</script>
@endsection
{{-- div class="row form-group">
                              <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <p class="form-control-static">{{$user->name}}</p>
                            </div> --}}

