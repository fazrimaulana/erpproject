@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
           @endif
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <label class="label-control">Files</label> <a href="#" data-toggle="modal" data-target="#AddNewFile" data-backdrop="static" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> Add New File</a> </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><label class="label-control">Name</label></td>
                                <td><label class="label-control">Path</label></td>
                                <td><label class="label-control">Extension</label></td>
                                <td><label class="label-control">Mimetype</label></td>
                                <td><label class="label-control">Action</label></td>
                            </tr>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->path }}</td>
                                <td>{{ $value->extension }}</td>
                                <td>{{ $value->mimetype }}</td>
                                <td>
                                <a href="#" class="edit" data-id="{{ $value->id }}"><span class="btn btn-sm btn-primary glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></span></a> 
                                <a href="{{ url('/files/'.$value->name.'.'.$value->extension) }}" data-toggle="tooltip" data-placement="bottom" title="View" target="_blank"><span class="btn btn-sm btn-success glyphicon glyphicon-eye-open"></span></a> 
                                <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="event.preventDefault();document.getElementById('delete-form{{$value->id}}').submit();" ><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></a>
                                <form id="delete-form{{$value->id}}" action="{{ url('/dashboard/file/delete') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id_delete" value="{{ $value->id }}">
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    {{ $data->render() }}
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Start Modal Add New File -->
<div class="modal fade" id="AddNewFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New File</h4>
      </div>
      <div class="modal-body">
            <form method="post" class="form-horizontal" action="{{ url('/dashboard/file/add') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="File" class="col-sm-2 control-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" name="document" class="form-control" required>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>      
    </div>
  </div>
</div>
<!-- End Modal Add New File -->

<!-- Start Modal Edit File -->
<div class="modal fade EditFile" id="EditFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Edit File</h4>
      </div>
      <div class="modal-body">
            <form method="post" class="form-horizontal" action="{{ url('/dashboard/file/edit') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id_edit">
                <div class="form-group">
                    <label for="File" class="col-sm-2 control-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" name="document" class="form-control" id="document-edit">
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-edit" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>      
    </div>
  </div>
</div>
<!-- End Modal Edit File -->

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".edit").on("click", function(){
                $("#id_edit").val($(this).data('id'));
                $("#EditFile").modal({
                    backdrop: "static",
                    show:true,
                });
            });
            $(".close-edit").on("click", function(){
                $("#id_edit").val("");
                $("#document-edit").val("");
            });
        });
    </script>
@stop
