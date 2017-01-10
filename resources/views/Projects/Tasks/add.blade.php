@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ url('/js/bootstrap-daterangepicker/daterangepicker.css') }}">
@stop
@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
           @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel panel-heading">
                    <label class="label-control">Form Add Task For Project {{ $data->name }} {{ $data->client->company_name }}</label>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="Name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Assign To" class="col-sm-3 control-label">Assign To</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="assign_to" name="assign_to">
                                    <option value="">Select</option>
                                    @foreach($users as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }} ({{ $value->team->name }})</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('assign_to'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('assign_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Start At" class="col-sm-3 control-label">Start At</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="start_at" name="start_at" placeholder="Start At" value="{{ old('start_at') }}">
                                @if ($errors->has('start_at'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('start_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="End At" class="col-sm-3 control-label">End At</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="end_at" name="end_at" placeholder="End At" value="{{ old('end_at') }}">
                                @if ($errors->has('end_at'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('end_at') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="File" class="col-sm-3 control-label">File</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="document" name="document" placeholder="File" value="{{ old('document') }}">
                                @if ($errors->has('document'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('document') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">Save</button>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ url('/js/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
        $('#start_at').daterangepicker({
          locale: {
            format: 'YYYY-MM-DD'
          },
          singleDatePicker: true,
          singleClasses: "picker_1",
          showDropdowns: true,
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#end_at').daterangepicker({
          locale: {
            format: 'YYYY-MM-DD'
          },
          singleDatePicker: true,
          singleClasses: "picker_1",
          showDropdowns: true,
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

    </script>
@stop