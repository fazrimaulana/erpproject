@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-sm-12">
            @if (session('status'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('status') }}
                </div>
           @endif
        </div>
    </div>

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
                    <label class="label-control">Change Password</label>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password_baru') ? ' has-error' : '' }}">
                            <label for="password_baru" class="col-md-3 control-label">Password Baru</label>
                            <div class="col-md-7">
                                <input id="password_baru" type="password" class="form-control" name="password_baru" value="{{ old('password_baru') }}">
                                @if ($errors->has('password_baru'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_baru') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_lama') ? ' has-error' : '' }}">
                            <label for="password_lama" class="col-md-3 control-label">Password Lama</label>
                            <div class="col-md-7">
                                <input id="password_lama" type="password" class="form-control" name="password_lama" value="{{ old('password_lama') }}">
                                @if ($errors->has('password_lama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_lama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary">Change Password</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
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
