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
			<h1 class="page-header">User Management</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" style="height: 51px;">
					List User 
					<div class="pull-right">
                        <div class="btn-group">
                            @permission('user-create')
							<a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>Create New</a>
							@endpermission      
                        </div>
                     </div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>User Name</th>
				      		<th>Email</th>
				      		<th>Last online at</th>
							<th>Action</th>
						</tr>
					@foreach ($users as $key => $user)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $user->name }}</td>
				    <td>{{ $user->username }}</td>
				    <td>{{ $user->email }}</td>
						<td>{{ $user->last_online_at }}</td>
						<td>
							<a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-btn fa-eye" aria-hidden="true"></i>Show</a>
							@permission('user-edit')
							<a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
							@endpermission
							@permission('user-delete')
							{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
				            <button class="btn btn-danger btn-sm"><i class="fa fa-btn fa-trash-o" aria-hidden="true"></i>Delete</button>
				        	{!! Form::close() !!}
				        	@endpermission
						</td>
					</tr>
					@endforeach
					</table>
					{!! $users->render() !!}
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>
@endsection
