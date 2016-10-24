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

              $('body').on('click', '#btnDelete', function(){
                var me = $(this);
                swal({   
                        title: "Are you sure?",   
                        text: "You will not be able to recover this imaginary file!",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false 
                    }, function(){   
                            me.parent().submit();
                    });
            });
        });
    </script>
@endsection

@section('CONTENT')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Role Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Roles</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">List Role</h3>
					<div class="pull-right">
                        <div class="btn-group">
                            @permission(('role-create'))
				            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>Create New</a>
				            @endpermission      
                        </div>
                     </div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Description</th>
							<th width="280px">Action</th>
						</tr>
					@foreach ($roles as $key => $role)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $role->display_name }}</td>
						<td>{{ $role->description }}</td>
						<td>
							<a class="btn btn-sm btn-info" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            @permission(('role-edit'))
                                <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                @endpermission
							@permission(('role-delete'))
							{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
				            <button type="button" id="btnDelete" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				        	{!! Form::close() !!}
				        	@endpermission
						</td>
					</tr>
					@endforeach
					</table>
					{!! $roles->render() !!}
				</div>
				<!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection