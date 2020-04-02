
  <!-- Modal -->
  <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Add new users</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> New user Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user-management.store') }}">
                        {{ csrf_field() }}

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required placeholder="First Name">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required placeholder="Last Name">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus placeholder="User Name">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="E-Mail Address">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password">
                            </div>
                        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-primary">Save User</button>
        </div>
    </form>
      </div>
    </div>
  </div>