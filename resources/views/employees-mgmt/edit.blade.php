@extends('employees-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Update employee</h3>
                    </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('employee-management.update', ['id' => $employee->id]) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                            <div class="col-md-4">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $employee->firstname }}" required autofocus placeholder="First Name">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <input id="middlename" type="text" class="form-control" name="middlename" value="{{ $employee->middlename }}" required placeholder="Middle Name">

                                @if ($errors->has('middlename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="col-md-4">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $employee->lastname }}" required>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                        </div>
                           <br><br><br>

                           <div class="col-md-4">
                            <select class="form-control" name="country_id">
                                @foreach ($countries as $country)
                                    <option {{$employee->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                @endforeach
                            </select>
                            </div>

                            <div class="col-md-4">
                                <select class="form-control" name="state_id">
                                    @foreach ($states as $state)
                                        <option {{$employee->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                        </div>
  
                            <div class="col-md-4">
                                <select class="form-control" name="city_id">
                                    @foreach ($cities as $city)
                                        <option {{$employee->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        <br><br><br>
                            <div class="col-md-4">
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ $employee->zip }}" required>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $employee->birthdate }}" name="birthdate" class="form-control pull-right" id="birthDate" required>
                                </div>
                        </div>

                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ $employee->date_join }}" name="date_join" class="form-control pull-right" id="hiredDate" required>
                                </div>
                        </div>
                        <br><br><br>

                            <div class="col-md-4">
                                <select class="form-control" name="department_id">
                                    @foreach ($departments as $department)
                                        <option {{$employee->department_id == $department->id ? 'selected' : ''}} value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                            <div class="col-md-4">
                                <select class="form-control" name="division_id">
                                    <option selected disabled></option>
                                    @foreach ($divisions as $division)
                                        <option {{$employee->division_id == $division->id ? 'selected' : ''}} value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                            <div class="col-md-4">
                                <img src="../../{{$employee->picture }}" width="50px" height="50px"/>
                                <input type="file" id="picture" name="picture" />
                            </div>
                        <div class="col-md-8">
                            <textarea id="address" type="text" class="form-control" name="address"  required>{{ $employee->address }}</textarea>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                    </div>
                    <br><br><br><br>
                        <div class="form-group pull-right">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"> Update Employee</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
