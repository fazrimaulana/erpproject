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
                <div class="panel-heading"> <label class="label-control">Projects</label> <a href="#" data-toggle="modal" data-target="#AddNewTeam" data-backdrop="static" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> Add New Team</a> </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><label class="label-control">Name</label></td>
                                <td><label class="label-control">Description</label></td>
                                <td><label class="label-control">Action</label></td>
                            </tr>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td>
                                <a href="#" class="editteam" data-id="{{ $value->id }}" data-name="{{ $value->name }}" data-description="{{ $value->description }}"><span class="btn btn-sm btn-primary glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></span></a> 
                                <a href="#" class="viewteam" data-id="{{ $value->id }}"><span class="btn btn-sm btn-success glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="View"></span></a> 
                                <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="event.preventDefault();document.getElementById('delete-form{{ $value->id }}').submit();" ><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></a>
                                <form id="delete-form{{ $value->id }}" action="{{ url('/dashboard/team/delete') }}" method="POST" style="display: none;">
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

<!-- Start Modal Add New Team -->
<div class="modal fade" id="AddNewTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add New Team</h4>
      </div>
      <div class="modal-body">
            <form method="post" class="form-horizontal" id="AddNewTeamForm" action="{{ url('/dashboard/team/add') }}">
                {{ csrf_field() }}
                <div class="form-group" id="name">
                    <label for="Name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group" id="name">
                    <label for="Description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-team" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>      
    </div>
  </div>
</div>
<!-- End Modal Add New Team -->

<!-- Start Modal Edit Team -->
<div class="modal fade" id="EditTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Team</h4>
      </div>
      <div class="modal-body">
            <form method="post" class="form-horizontal" id="EditTeamForm" action="{{ url('/dashboard/team/edit') }}">
                {{ csrf_field() }}
                <input type="hidden" name="id_edit" id="id-edit">
                <div class="form-group" id="name">
                    <label for="Name" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name_edit" id="name-edit" placeholder="Name" required>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group" id="name">
                    <label for="Description" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description_edit" placeholder="Description" id="description-edit"></textarea>
                        <span class="help-block"></span>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-team" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>      
    </div>
  </div>
</div>
<!-- End Modal Edit Team -->

<!-- Start Modal View Team -->
<div class="modal fade" id="ViewTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">View Team</h4>
      </div>
      <div class="modal-body">
            Name Team : <label class="label-control" id="name-show"></label>
            <div class="table-responsive">
                <div class="table-responsive" id="data-team">

                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-team" data-dismiss="modal">Close</button>
      </div>    
    </div>
  </div>
</div>
<!-- End Modal View Team -->

@endsection

@section('script')

    <script type="text/javascript">
        $(".editteam").on("click", function(){
                var id = $(this).data("id");
                var name = $(this).data("name");
                var description = $(this).data("description");
                $('#id-edit').val(id);
                $('#name-edit').val(name);
                $('#description-edit').val(description);
                $('#EditTeam').modal({
                    "backdrop":"static",
                    "show":true,
                });
        });

        $(".viewteam").on("click", function(){
            var id = $(this).data("id");
            /*console.log(id);*/
            $.get('view_team/'+id, function(data){
                /*console.log(data.name);
                console.log(data.user);*/
                $('#name-show').html(data.name);

                var dataHead = "<tr><td>Name</td><td>Email</td></tr>";
                var dataTeam = "";

                $.each(data.user, function(key, val){
                    /*console.log(val.name);*/
                    dataTeam += " <tr><td>"+ val.name +"</td><td>"+ val.email +"</td></tr>";
                });

                $('#data-team').html("<table class='table table-bordered table-hover'>"+dataHead+dataTeam+"</table>");

                $('#ViewTeam').modal({
                    "backdrop":"static",
                    "show":true,
                });
            });
        });

    </script>

@stop