@extends('layouts.dashboard')

@section('CSS')
    <link href="{{ elixir('css/default.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
@endsection

@section('JS')
    <script src="{{ elixir('js/default.js') }}"></script>

    <!-- Custom JS -->
    <script type="text/javascript">
        $(function () {
            @if ($message = Session::get('message'))
                @if($isError = Session::get('error'))
                    toastr.error('{{ $message }}');
                @else
                    toastr.success('{{ $message }}');
                @endif
            @endif
        });
    </script>
@endsection

@section('CONTENT')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role <em>{{ $role->display_name }} </em>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/roles') }}">Roles</a></li>
        <li class="active">Role <em>{{ $role->display_name }}</em></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

			<div class="box box-primary">
				<div class="box-header with-border">
                    <a class="btn btn-info btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-btn fa-arrow-left" aria-hidden="true"></i>Back</a>
                    <div class="pull-right">
                        <div class="btn-group">
                            @permission(('user-edit'))
                            <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
                            @endpermission
                        </div>
                     </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
                   <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $role->display_name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {{ $role->description }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permissions:</strong>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        <label class="label label-success">{{ $v->display_name }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
				</div>
				<!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
