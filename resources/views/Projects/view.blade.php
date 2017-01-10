@extends('layouts.app')
@section('content')
<div class="container-fluid">

    <!-- Start Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View Project
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <center>Client</center>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="{{ url('/avatar/User-icon.png') }}" class="img-responsive">
                        </div>
                        <div class="col-sm-10">
                            <a href="{{ url('/dashboard/client/'.$data->client_id.'/view') }}">{{ $data->client->company_name }}</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <center>Assign To</center>
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-sm-2">
                            @if($data->user->avatar=="" || $data->user->avatar==null)
                                <img src="{{ url('/avatar/User-icon.png') }}" class="img-responsive">
                            @else
                                <img src="{{ url($data->user->avatar) }}" class="img-responsive">
                            @endif
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                {{ $data->user->name }}
                            </div>
                            <div class="row">
                                {{ $data->user->team->name }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label-control">Name : {{ $data->name }}</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label-control">Start At : {{ $data->start_at }}</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label-control">End At : {{ $data->end_at }}</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <label class="label-control">Description : {{ $data->description }}</label>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        <div class="col-md-6">
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#teams" aria-controls="teams" role="tab" data-toggle="tab">Teams</a></li>
                <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">Tasks</a></li>
                <li role="presentation"><a href="#files" aria-controls="files" role="tab" data-toggle="tab">Files</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <!-- Team -->
                <div role="tabpanel" class="tab-pane active" id="teams">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Teams <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#AddNewTeam" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span>Add New Team</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td><label class="label-control">Name</label></td>
                                        <td><label class="label-control">Position</label></td>
                                    </tr>
                                    @foreach($data->user_team as $key => $value)
                                        <tr>
                                            <td>

                                            {{ $value->name }}
                                            <br>

                                            <a href="#" class="editteam" data-id="{{ $value->id }}"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></span></a>
                                            | <a href="{{ url('/dashboard/profile/'.$value->id) }}" data-toggle="tooltip" data-placement="bottom" title="View"><span class="glyphicon glyphicon-eye-open"></span></a> 
                                            | <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="event.preventDefault();document.getElementById('delete-form{{ $value->id }}').submit();" ><span class="glyphicon glyphicon-trash"></span></a>
                                            <form id="delete-form{{ $value->id }}" action="{{ url('/dashboard/project/'.$data->id.'/team_delete') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_delete" value="{{ $value->id }}">
                                            </form>

                                            </td>
                                            <td>{{ $value->team->name }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Team -->

                <!-- Task -->
                <div role="tabpanel" class="tab-pane" id="tasks">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tasks <a href="{{ url('/dashboard/project/'.$data->id.'/addtask') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-plus"></span>Add New Task</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td><label class="label-control">Name</label></td>
                                        <td><label class="label-control">Assign To</label></td>
                                        <td><label class="label-control">Start At</label></td>
                                        <td><label class="label-control">End At</label></td>
                                    </tr>
                                    @foreach($data->task as $key => $value)
                                        <tr>
                                            <td>

                                            {{ $value->name }}
                                            <br>

                                            <a href="{{ url('/dashboard/project/'.$data->id.'/edit_task/'.$value->id) }}"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></span></a>
                                            | <a href="#" class="view-task" data-id="{{ $value->id }}" data-url="{{ url('/') }}"><span class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="View"></span></a> 
                                            | <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="event.preventDefault();document.getElementById('delete-form-task{{ $value->id }}').submit();" ><span class="glyphicon glyphicon-trash"></span></a>
                                            <form id="delete-form-task{{ $value->id }}" action="{{ url('/dashboard/project/task/delete') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_delete" value="{{ $value->id }}">
                                            </form>

                                            </td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->start_at }}</td>
                                            <td>{{ $value->end_at }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Task -->

                <!-- File -->
                <div role="tabpanel" class="tab-pane" id="files">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Files <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#AddNewFile" data-backdrop="static"><span class="glyphicon glyphicon-plus"></span>Add New File</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td><label class="label-control">Name</label></td>
                                        <td><label class="label-control">Extension</label></td>
                                        <td><label class="label-control">Action</label></td>
                                    </tr>
                                    @foreach($data->file_project as $key => $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->extension }}</td>
                                            <td><a href="{{ url('/'.$value->path) }}" data-toggle="tooltip" data-placement="bottom" title="Download">Download</a> |
                                                <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="event.preventDefault();document.getElementById('delete-form-file{{ $value->id }}').submit();" >Delete</a>
                                                <form id="delete-form-file{{ $value->id }}" action="{{ url('/dashboard/project/'.$data->id.'/delete_file/'.$value->id) }}" method="POST" style="display: none;">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id_delete" value="{{ $value->id }}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End File -->

            </div>
        </div>
    </div>
    <!-- End Row -->

</div>

<!-- Start Modal Add New Team -->
<div class="modal fade" id="AddNewTeam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add New Team</h4>
      </div>
      <div class="modal-body">
            <form method="post" class="form-horizontal" id="AddNewTeamForm" action="{{ url('dashboard/project/'.$data->id.'/addteam') }}">
                {{ csrf_field() }}
                <div class="form-group" id="user_id-group">
                    <label for="User" class="col-sm-2 control-label">User</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="user_id" name="user_id">
                            <option value="">Select</option>
                            @foreach($users as $key => $value)
                                <option value="{{$value->id}}">{{ $value->name }} ({{ $value->team->name }})</option>
                            @endforeach
                        </select>
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
            <form method="post" class="form-horizontal" id="EditTeamForm" action="{{ url('dashboard/project/'.$data->id.'/edit_team') }}">
                {{ csrf_field() }}
                <input type="hidden" name="user_id_edit" id="user_id_edit">
                <div class="form-group" id="edit-user_id-group">
                    <label for="User" class="col-sm-2 control-label">User</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="edit_user_id" name="edit_user_id" required>
                            <option value="">Select</option>
                            @foreach($users as $key => $value)
                                <option value="{{$value->id}}" id="pilihTeam{{ $value->id }}">{{ $value->name }} ({{ $value->team->name }})</option>
                            @endforeach
                        </select>
                        <span class="help-block"></span>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-team-edit" id="close-team-edit" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>      
    </div>
  </div>
</div>
<!-- End Modal Edit Team -->

<!-- Start Modal Add New File -->
<div class="modal fade" id="AddNewFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add New File</h4>
      </div>
      <div class="modal-body">
            <form method="post" class="form-horizontal" action="{{ url('dashboard/project/'.$data->id.'/addfile') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="File" class="col-sm-2 control-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" name="document" class="form-control" id="document-edit" required>
                    </div>
                </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default close-edit" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>      
    </div>
  </div>
</div>
<!-- End Modal Add New File -->

<!-- Start Modal View Task -->
<div class="modal fade" id="ViewTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">View Task</h4>
      </div>
      <div class="modal-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#detail-task" aria-controls="detail-task" role="tab" data-toggle="tab">Detail Task</a></li>
            <li role="presentation"><a href="#files-task" aria-controls="files-task" role="tab" data-toggle="tab">Files Task</a></li>
        </ul>

        <!-- Tab Content -->
            <div class="tab-content">

                <!-- Tab Detail Task -->
                <div role="tabpanel" class="tab-pane active" id="detail-task">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="label-control">Name</label>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-9">
                                    <label class="label-control" id="name-task"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="label-control">Assign To</label>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-9">
                                    <label class="label-control" id="assign-task"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="label-control">Start At</label>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-9">
                                    <label class="label-control" id="start-task"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="label-control">End At</label>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-9">
                                    <label class="label-control" id="end-task"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label class="label-control">Description</label>
                                </div>
                                <div class="col-sm-1">
                                    :
                                </div>
                                <div class="col-sm-9">
                                    <label class="label-control" id="description-task"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Task -->

                <!-- Tab Detail Task -->
                <div role="tabpanel" class="tab-pane" id="files-task">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive" id="data-files">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Tab Task -->

            </div>
            <!-- End Tab Content -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>     
    </div>
  </div>
</div>
<!-- End Modal View Task -->

@endsection

@section('script')
    <script type="text/javascript">

            $(".close-edit").on("click", function(){
                $("#document-edit").val("");
            });

            $(".close-team").on("click", function(){
                $("#user_id").val("");
                var $form = $('#AddNewTeamForm');
                $form.find('.form-group').removeClass('has-error').find('.help-block').text('');
            });

            $(".view-task").on("click", function(){
                var id = $(this).data("id");
                var url = $(this).data("url");
                /*console.log(id);*/
                $.get('view_task/'+id, function(data){ 
                    /*console.log(data.task);
                    console.log(data.user);
                    console.log(data.file_task);*/
                    $('#name-task').html(""+data.task.name);
                    $('#assign-task').html(""+data.user);
                    $('#start-task').html(""+data.task.start_at);
                    $('#end-task').html(""+data.task.end_at);
                    $('#description-task').html(""+data.task.description);

                    var dataHead = "<tr><td>Name</td><td>Action</td></tr>";
                    var dataFiles = "";

                    $.each(data.file_task, function(key, val){
                        /*console.log(val.name);*/
                        dataFiles += " <tr><td>"+ val.name +"</td><td><a href='"+ url + "/" + val.path +"' target='_blank'>Download</a></td></tr>";

                    });

                    $('#data-files').html("<table class='table table-bordered table-hover'>"+dataHead+dataFiles+"</table>");
                    $('#ViewTask').modal({
                        "backdrop":"static",
                        "show":true,
                    });
                });
            });

            $(".editteam").on("click", function(){
                var id = $(this).data("id");
                console.log(id);
                $.get('edit_team/'+id, function(data){
                    $('#pilihTeam'+id).prop('selected', true);
                    $('#user_id_edit').val(id);
                    $('#EditTeam').modal({
                        "backdrop":"static",
                        "show":true,
                    });
                });
            });

            $('#AddNewTeam').submit(function(e)
            {
                var $form = $('#AddNewTeamForm');
                e.preventDefault();
                var url = $form.attr('action');
                var formData = $form.serialize();

                $.post(url, formData, function(response){
                    if (response.status=="sukses") {
                        window.location.href = 'view';
                    }
                    else
                    {
                        associate_errors(response['data'], $form);
                    }
                }).fail(function(response){
                    alert("Error");
                });

            });

            function associate_errors(errors, $form)
            {
                $form.find('.form-group').removeClass('has-errors').find('.help-block').text('');
                $.each(errors, function(key, val){
                    var $group = $form.find('#' + key + '-group');
                    $group.addClass('has-error').find('.help-block').text(val);
                });
            }

    </script>
@stop
