@extends('layouts.app')

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
                    Profile
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <td><label class="label-control">Name</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->name }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Email</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->email }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Team</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->team->name }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Birthday</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->birthday }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Hire Date</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->here_date }}</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <a href="{{ url('/dashboard/profile/'.$data->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ url('/dashboard/profile/'.$data->id.'/changePassword') }}" class="btn btn-primary btn-sm">Change Password</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
