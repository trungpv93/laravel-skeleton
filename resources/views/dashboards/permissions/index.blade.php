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
        Permission Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permissions</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">List Permission</h3>
					<div class="pull-right">
                        <div class="btn-group">
                            @permission(('permission-create'))
				            <a class="btn btn-success btn-sm" href="{{ route('permissions.create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>Create New Permission</a>
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
					@foreach ($permissions as $key => $permission)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $permission->display_name }}</td>
						<td>{{ $permission->description }}</td>
						<td>
							<a class="btn btn-sm btn-info" href="{{ route('permissions.show',$permission->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
							@permission(('permission-delete'))
							{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
				            <button type="button" id="btnDelete" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
				        	{!! Form::close() !!}
				        	@endpermission
						</td>
					</tr>
					@endforeach
					</table>
					{!! $permissions->render() !!}
				</div>
				<!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
