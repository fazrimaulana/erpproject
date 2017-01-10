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
                <div class="panel-heading"> <label class="label-control">Projects</label> <a href="{{ url('/dashboard/project/add') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> Add New Project</a> </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><label class="label-control">Client</label></td>
                                <td><label class="label-control">Name</label></td>
                                <td><label class="label-control">Assign To</label></td>
                                <td><label class="label-control">Start At</label></td>
                                <td><label class="label-control">End At</label></td>
                                <td><label class="label-control">Action</label></td>
                            </tr>
                            @foreach($data as $key => $value)
                            <tr>
                                <td>{{ $value->client->company_name }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>{{ $value->start_at }}</td>
                                <td>{{ $value->end_at }}</td>
                                <td>
                                <a href="{{ url('/dashboard/project/'.$value->id.'/edit') }}"><span class="btn btn-sm btn-primary glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></span></a> 
                                <a href="{{ url('/dashboard/project/'.$value->id.'/view') }}" data-toggle="tooltip" data-placement="bottom" title="View"><span class="btn btn-sm btn-success glyphicon glyphicon-eye-open"></span></a> 
                                <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="event.preventDefault();document.getElementById('delete-form{{ $value->id }}').submit();" ><span class="btn btn-sm btn-danger glyphicon glyphicon-trash"></span></a>
                                <form id="delete-form{{ $value->id }}" action="{{ url('/dashboard/project/delete') }}" method="POST" style="display: none;">
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
@endsection
