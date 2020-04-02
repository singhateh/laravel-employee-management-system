@extends('system-mgmt.country.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif; color:red">Update Country</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('country.update', ['id' => $country->id]) }}">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $country->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        
                            <div class="col-md-6">
                                <input id="country_code" type="text" class="form-control" name="country_code" value="{{ $country->country_code }}" required>

                                @if ($errors->has('country_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br><br><br>                        
                        <div class="form-group">
                            <div class="col-md-3 pull-right">
                                <button type="submit" class="btn btn-primary">
                                   <i class="fa fa-refresh"></i> Update Country
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
