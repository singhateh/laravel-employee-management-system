@extends('system-mgmt.report.base')
@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title" style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">List of Current Employees</h3>
        </div>
        <div class="col-sm-1" style="margin-left:40%;">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.excel') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['from']}}" name="from" />
                <input type="hidden" value="{{$searchingVals['to']}}" name="to" />
                <button type="submit" class="btn btn-primary pull-right">
                 <i class="fa fa-excel-o"></i> Export to Excel
                </button>
            </form>
        </div>
        <div class="col-sm-2">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('report.pdf') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['from']}}" name="from" />
                <input type="hidden" value="{{$searchingVals['to']}}" name="to" />
                <button type="submit" class="btn btn-danger pull-right">
                  Export to PDF
                </button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('report.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-date-search-row', ['items' => ['From', 'To'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['from'] : '', isset($searchingVals) ? $searchingVals['to'] : '']])
          @endcomponent
         @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered table-dark">
            <thead>
              <tr role="row">
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Employee Name</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Date of Birth</th>
                <th width = "40%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Address</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Join Date</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr role="row" class="odd">
                  <td>{{ $employee->firstname }} {{ $employee->middlename }} {{ $employee->lastname }}</td>
                  <td>{{ $employee->birthdate }}</td>
                  <td>{{ $employee->address }}</td>
                  <td>{{ $employee->date_join }}</td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">page 1 to {{count($employees)}} of {{count($employees)}} entries</div>
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