@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Department Mangement
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Employeee Mangement System</a></li>
        <li class="active">Department</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection