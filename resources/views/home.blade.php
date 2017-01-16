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
                                    <td valign="center"><a href="{{ url('/dashboard/task/'.$value->id.'/view') }}" data-toggle="tooltip" data-placement="left" title="End At {{ App\Helpers\Tanggal::TanggalIndo($value->end_at) }}"><span class="glyphicon glyphicon-hand-right"></span> <label class="label-control">{{ $value->name}}</label></a> <span class="label label-primary">{{ $value->status }}</span> <span class="glyphicon glyphicon-time"> {{ App\Helpers\Tanggal::TanggalIndo($value->end_at) }}</span></td>
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
@endsection
