@extends('users-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-11 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Update user</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.update', ['id' => $user->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          

                            <div class="col-md-4">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $user->firstname }}" required autofocus placeholder="First Name">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" required placeholder=" Username">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="col-md-4">
                            <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" required placeholder="Last Name">

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                    </div>
                        <br><br>
                        <br>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password (optional)">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password (optional)">
                            </div>
                        {{-- </div> --}}
                        {{-- </div> --}}
<br><br>
<br><br>
                        <div class="form-group pull-right">
                            <div class="col-md-3 col-md-offset-0">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"></i> Update User
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
