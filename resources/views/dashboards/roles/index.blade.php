@extends('layouts.dashboard')

@section('CUSTOM_CSS')
    
@endsection

@section('CUSTOM_JS')
	@if ($message = Session::get('success'))
		<script type="text/javascript">
    		$(function () {
    			toastr.success('{{ $message }}');
    		});
		</script>
	@endif
@endsection

@section('CONTENT')
<div id="page-wrapper" style="min-height: 396px;">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Role Management</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 51px;">
                    List Role
                    <div class="pull-right">
                        @permission(('role-create'))
			            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>Create New Role</a>
			            @endpermission
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
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
							<a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="fa fa-btn fa-eye" aria-hidden="true"></i>Show</a>
							@permission(('role-edit'))
							<a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
							@endpermission
							@permission(('role-delete'))
							{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
				            <button class="btn btn-danger btn-sm"><i class="fa fa-btn fa-trash-o" aria-hidden="true"></i>Delete</button>
				        	{!! Form::close() !!}
				        	@endpermission
						</td>
					</tr>
					@endforeach
					</table>
					{!! $roles->render() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
@endsection