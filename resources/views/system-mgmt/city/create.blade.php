
  <!-- Modal -->
  <div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="background:#605ca8;color:white">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="color:#fff">&times;</span>
              </button>
          <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">Add new city</h5>
        </div>
        <div class="modal-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="modal-title" id="exampleModalLongTitle" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red"> New city Portal</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('city.store') }}">
                        {{ csrf_field() }}

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <select class="form-control" name="state_id">
                                <option selected disabled>Select State</option>
                                @foreach ($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                 </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="sumbit" class="btn btn-primary">Save City</button>
        </div>
    </form>
      </div>
    </div>
  </div>