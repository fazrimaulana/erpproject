@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome {{ Auth::user()->name }} ( {{ Auth::user()->team->name }} )</div>

                <div class="panel-body">

                    <div class="col-sm-6">
                        <table class="table table-hover">
                            <caption><h1><label class="label-control">Projects</label></h1></caption>
                            <tbody>
                                @foreach($projects as $key => $value)
                                <tr>
                                    <td valign="center"><a href="{{ url('/dashboard/project/'.$value->id.'/view') }}"><span class="glyphicon glyphicon-hand-right"></span> <label class="label-control">{{ $value->client->company_name }} - {{ $value->name }}</label></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                        
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                        <table class="table table-hover">
                            <caption><h1><label class="label-control">My Tasks</label></h1></caption>
                            <tbody>
                                @foreach(Auth::user()->task as $key => $value)
                                <tr>
                                    <td valign="center">
                                        <a href="#" class="view-task" data-id="{{ $value->id }}" data-url="{{ url('/') }}">
                                            <span class="glyphicon glyphicon-hand-right"></span> 
                                            <label class="label-control">{{ $value->name}}</label>
                                        </a> 
                                        <span @if($value->status=='open') class="label label-primary" @else class="label label-danger" @endif>{{ $value->status }}</span> 
                                        <span class="glyphicon glyphicon-time"> {{ App\Helpers\Tanggal::TanggalIndo($value->end_at) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

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
<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
<script>
            $(".view-task").on("click", function(){
                var id = $(this).data("id");
                var url = $(this).data("url");
                /*console.log(id);*/
                $.get('home/view_task/'+id, function(data){ 
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

</script>

@stop