@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ url('/js/bootstrap-daterangepicker/daterangepicker.css') }}">
@stop
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3">
            <div class="panel panel-default">

                <div class="panel-body">
                    <img src="{{ url('/avatar/User-icon.png') }}" class="img-responsive">
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <label class="label-control">Edit Profile</label>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Name</label>
                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-2 control-label">Email</label>
                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $data->email }}" readonly>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('team') ? ' has-error' : '' }}">
                            <label for="team" class="col-md-2 control-label">Team</label>
                            <div class="col-md-8">
                                <select class="form-control" name="team"> 
                                    <option value="">PILIH</option>
                                    @foreach($team as $key => $value)
                                        <option value="{{ $value->id }}" @if($data->team->id==$value->id) selected  @endif >{{ $value->name }}</option>
                                    @endforeach 
                                </select>
                                @if ($errors->has('team'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('team') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                            <label for="birthday" class="col-md-2 control-label">Birthday</label>
                            <div class="col-md-8">
                                <input id="birthday" type="text" class="form-control" name="birthday" value="{{ $data->birthday }}">
                                @if ($errors->has('birthday'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('here_date') ? ' has-error' : '' }}">
                            <label for="here_date" class="col-md-2 control-label">Here Date</label>
                            <div class="col-md-8">
                                <input id="here_date" type="text" class="form-control" name="here_date" value="{{ $data->here_date }}">
                                @if ($errors->has('here_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('here_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-2 control-label">Avatar</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="avatar" id="avatar">
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Update</button>
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
        $('#birthday').daterangepicker({
          locale: {
            format: 'YYYY-MM-DD'
          },
          singleDatePicker: true,
          singleClasses: "picker_1",
          showDropdowns: true,
        }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
        });

        $('#here_date').daterangepicker({
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
