@extends('layouts.dashboard')

@section('CUSTOM_CSS')
    
@endsection

@section('CUSTOM_JS')

@endsection

@section('CONTENT')
<div id="page-wrapper" style="min-height: 396px;">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Permission</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-success btn-sm" href="{{ route('permissions.index') }}"><i class="fa fa-btn fa-arrow-left" aria-hidden="true"></i>Back</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					{!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', $permission->name, array('placeholder' => 'Name','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
						<div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Display Name:</strong>
				                {!! Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Description:</strong>
				                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
				            </div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
								<button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-floppy-o" aria-hidden="true"></i>Save</button>
				        </div>
					</div>
					{!! Form::close() !!}
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
@endsection
