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
        User Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">List User</h3>
					<div class="pull-right">
                        <div class="btn-group">
                            @permission(('user-create'))
							<a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa fa-btn fa-plus" aria-hidden="true"></i>Create New</a>
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
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Last online at</th>
							<th width="280px">Action</th>
						</tr>
						@foreach ($users as $key => $user)
						<tr>
							<td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($user->last_online_at))->format('d/m/Y h:i A') }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-btn fa-eye" aria-hidden="true"></i>Show</a>
                                @permission(('user-edit'))
                                <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
                                @endpermission
                                @permission(('user-delete'))
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
				<!-- /.box-body -->
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
