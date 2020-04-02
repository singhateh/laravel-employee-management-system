@extends('employees-mgmt.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    @include('flash_message')
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of Employees</h3>
        </div>
        <div class="col-sm-4">
          <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#addEmployee">
            <i class="fa fa-plus"></i> Add New Employee
          </button>
        </div>
        @include('employees-mgmt.create')
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('employee-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['First Name', 'Department_Name'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['firstname'] : '', isset($searchingVals) ? $searchingVals['department_name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered table-dark">
            <thead>
            
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Employee</th>
                <th scope="col">DoB</th>
                {{-- <th scope="col">Join Date</th> --}}
                <th scope="col">Department</th>
                <th scope="col">Division</th>
                <th scope="col" rowspan="3">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr role="row" class="odd">
                  <td><img src="../{{$employee->picture }}"  class="user-image" width="50px" height="50px"/></td>
                  <td >{{ $employee->firstname }} {{$employee->middlename}} {{$employee->lastname}}</td>
                  <td class="hidden-xs">{{ $employee->birthdate }}</td>
                  {{-- <td class="hidden-xs">{{ $employee->date_join }}</td> --}}
                  <td class="hidden-xs">{{ $employee->department_name }}</td>
                  <td class="hidden-xs">{{ $employee->division_name }}</td>
                  <td colspan="3">
                    <form class="row" method="POST" action="{{ route('employee-management.destroy', ['id' => $employee->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('employee-management.edit', ['id' => $employee->id]) }}" class="btn btn-info col-sm-2 col-xs-3 btn-margin">
                          <i class="fa fa-edit "></i>
                        </a>
                        <a href="{{ route('employee-management.edit', ['id' => $employee->id]) }}" class="btn btn-primary col-sm-2 col-xs-3 btn-margin">
                          <i class="fa fa-print "></i>
                        </a>
                         <button type="submit" class="btn btn-danger col-sm-2 col-xs-3 btn-margin">
                          <i class="fa fa-trash "></i>
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($employees)}} of {{count($employees)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $employees->links() }}
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