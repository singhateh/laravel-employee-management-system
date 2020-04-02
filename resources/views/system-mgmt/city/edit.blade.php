@extends('system-mgmt.city.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Update city</h3>
                    </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('city.update', ['id' => $city->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $city->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" name="state_id">
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}" {{$state->id == $city->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <br><br><br>
                        <div class="form-group pull-right">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"></i> Update City
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
