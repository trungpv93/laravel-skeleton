@extends('layouts.dashboard')

@section('CUSTOM_CSS')
    
@endsection

@section('CUSTOM_JS')

@endsection

@section('before_container')

@endsection

@section('CONTENT')
<div id="page-wrapper" style="min-height: 396px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User <em>{{ $user->email }}</em></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-success btn-sm" href="{{ route('users.index') }}"><i class="fa fa-btn fa-arrow-left" aria-hidden="true"></i>Back</a>
                    <div class="pull-right">
                        @permission(('user-edit'))
                         <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
                        @endpermission
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>User Name:</strong>
                                {!! Form::text('username', $user->username, array('placeholder' => 'User Name','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                {!! Form::text('email', $user->email, array('placeholder' => 'Email','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Last online at:</strong>
                                {!! Form::text('last_online_at', $user->last_online_at, array('placeholder' => 'Last online','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Roles:</strong>
                                @if(!empty($userRoles))
                                    @foreach($userRoles as $v)
                                        <label class="label label-success">{{ $v->display_name }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
@endsection
