@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    View Client
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
                                <td><label class="label-control">Company Name</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->company_name }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Country</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->countries->name }}</label></td>
                            </tr>

                            <?php
                                $address = json_decode($data->address);
                            ?>

                            @foreach($address as $key => $value)
                                <tr>
                                    <td><label class="label-control">Address {{ $key+1 }}</label></td>
                                    <td><label class="label-control">:</label></td>
                                    <td><label class="label-control">{{ $value }}</label></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td><label class="label-control">Province</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->province }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">City</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->city }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Pos Code</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->pos_code }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">Email</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->email }}</label></td>
                            </tr>
                            <tr>
                                <td><label class="label-control">No HP</label></td>
                                <td><label class="label-control">:</label></td>
                                <td><label class="label-control">{{ $data->no_hp }}</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
