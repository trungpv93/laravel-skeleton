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
        Create New Role
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ url('/roles') }}">Roles</a></li>
        <li class="active">Create New Role</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

			<div class="box box-primary">
				<div class="box-header with-border">
                    <a class="btn btn-success btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-btn fa-arrow-left" aria-hidden="true"></i>Back</a>
				</div>
				<!-- /.box-header -->
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
				<div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                <strong>Display Name:</strong>
                                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
                                 @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->display_name }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                    </div>
				</div>
				<!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-floppy-o" aria-hidden="true"></i>Save</button>
                </div>
                {!! Form::close() !!}
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
