@extends('layouts.dashboard')

@section('CSS')
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
@endsection

@section('JS')
    <script src="{{ elixir('js/all.js') }}"></script>

    <!-- Custom JS -->
    
@endsection

@section('CONTENT')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection