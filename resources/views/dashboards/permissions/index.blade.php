@extends('layouts.admin')

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
			<h1 class="page-header">Permission Management</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 51px;">
                    List Permission
                    <div class="pull-right">
                    	@permission('permission-create')
			            <a class="btn btn-success btn-sm" href="{{ route('permissions.create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>Create New Permission</a>
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
					@foreach ($permissions as $key => $permission)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $permission->display_name }}</td>
						<td>{{ $permission->description }}</td>
						<td>
							<a class="btn btn-info btn-sm" href="{{ route('permissions.show',$permission->id) }}"><i class="fa fa-btn fa-eye" aria-hidden="true"></i>Show</a>
							@permission('permission-edit')
							<a class="btn btn-primary btn-sm" href="{{ route('permissions.edit',$permission->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
							@endpermission
							@permission('permission-delete')
							{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
				            <button class="btn btn-danger btn-sm"><i class="fa fa-btn fa-trash-o" aria-hidden="true"></i>Delete</button>
				        	{!! Form::close() !!}
				        	@endpermission
						</td>
					</tr>
					@endforeach
					</table>
					{!! $permissions->render() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
@endsection
