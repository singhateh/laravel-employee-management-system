@extends('system-mgmt.state.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
        @include('flash_message')
  <div class="box-header">
    <div class="row">
      <div class="col-sm-8">
        <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of States</h3>
      </div>
        <div class="col-sm-4">
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addState">
            <i class="fa fa-plus"></i> Add New State
          </button>
        </div>
        @include('system-mgmt.state.create')
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('state.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered table-dark">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="state: activate to sort column ascending">State Name</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="country: activate to sort column ascending">Country Name</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($states as $state)
                <tr role="row" class="odd">
                  <td>{{ $state->name }}</td>
                  <td>{{ $state->country_name }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('state.destroy', ['id' => $state->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('state.edit', ['id' => $state->id]) }}" class="btn btn-info col-sm-3 col-xs-5 btn-margin">
                          <i class="fa fa-edit fa-lg"></i>
                        </a>
                        <a href="{{ route('state.edit', ['id' => $state->id]) }}" title="Print State" class="btn btn-primary col-sm-3 col-xs-5 btn-margin">
                          <i class="fa fa-print fa-lg"></i>
                          </a>
                        <button type="submit" title="Delete State" class="btn btn-danger col-sm-3 col-xs-5 btn-margin">
                          <i class="fa fa-trash fa-lg"></i>
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($states)}} of {{count($states)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $states->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  {{-- </div> --}}
@endsection