
  <!-- Modal -->
  <div class="modal fade" id="addEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Add new employee</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> New employee Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('employee-management.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-row">
                            <div class="col-md-4">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus placeholder="First name">
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-md-4">
                            <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}"  placeholder="Middle name">

                            @if ($errors->has('middlename'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('middlename') }}</strong>
                                </span>
                            @endif
                    </div>
                            <div class="col-md-4">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="Last name">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                        </div>
                           
                            <br><br>
                            <div class="col-md-4">
                                <select class="form-control js-country" name="country_id">
                                    <option value="-1" selected disabled>Please select your country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                            <div class="col-md-4">
                                <select class="form-control js-states" name="state_id">
                                    <option value="-1" selected disabled>Please select your state</option>

                                </select>
                        </div>
                            <div class="col-md-4">
                                <select class="form-control js-cities" name="city_id" >
                                    <option value="-1" selected disabled>Please select your city</option>
                                </select>
                        </div>
                        <br><br>
                            <div class="col-md-4">
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required placeholder="Zip Code">

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                        </div>
                        {{-- <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="zip" class="col-md-4 control-label">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control" name="age" value="{{ old('age') }}" required>

                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('birthdate') }}" name="birthdate" class="form-control" id="birthDate" required placeholder="Date of Birth" >
                                </div>
                        </div>
                            <div class="col-md-4">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" value="{{ old('date_join') }}" name="date_join" class="form-control pull-right" id="hiredDate" required placeholder="Join Date">
                                </div>
                        </div>
                        <br><br>
                            <div class="col-md-4">
                                <select class="form-control" name="department_id">
                                    <option selected disabled>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('department_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="division_id">
                                    <option selected disabled>Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id}}">{{$division->name}}</option>
                                    @endforeach
                                </select>
                                 @if ($errors->has('division_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('division_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                                <div class="col-md-4">
                                    <input type="file" id="picture" name="picture" required >
                                </div>
                                <br><br>
                        <div class="col-md-12">
                            <textarea id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address"></textarea>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Employee</button>
        </div>
    </form>
      </div>
    </div>
  </div>