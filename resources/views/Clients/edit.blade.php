@extends('layouts.app')
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
                    <label class="label-control">Form Edit Client</label>
                </div>
                <div class="panel-body">
                    <form method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="Name" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $data->name }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Company Name" class="col-sm-3 control-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" value="{{ $data->company_name }}">
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Country Code" class="col-sm-3 control-label">Country Code</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="country_code">
                                    <option value="">Select</option>
                                    @foreach($country_code as $key => $value)
                                        <option value="{{ $value->code }}" @if($value->code==$data->country_code) selected @endif >{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('country_code'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('country_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <?php
                            $address = json_decode($data->address);
                        ?>

                        @foreach($address as $key => $value)
                            <div class="form-group">
                                <label for="Address" class="col-sm-3 control-label">Address {{ $key+1 }}</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address[]" id="address" placeholder="Address">{{ $value }}</textarea>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('address') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label for="Province" class="col-sm-3 control-label">Province</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="province" name="province" placeholder="Province" value="{{ $data->province }}">
                                @if ($errors->has('province'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="City" class="col-sm-3 control-label">City</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $data->city }}">
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Pos Code" class="col-sm-3 control-label">Pos Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="pos_code" name="pos_code" placeholder="Pos Code" value="{{ $data->pos_code }}">
                                @if ($errors->has('pos_code'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('pos_code') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="Email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $data->email }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="No HP" class="col-sm-3 control-label">No HP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP" value="{{ $data->no_hp }}">
                                @if ($errors->has('no_hp'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-default">Update</button>  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
