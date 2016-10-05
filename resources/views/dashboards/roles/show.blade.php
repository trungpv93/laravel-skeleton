@extends('layouts.dashboard')

@section('CUSTOM_CSS')
    
@endsection

@section('CUSTOM_JS')

@endsection

@section('CONTENT')
<div id="page-wrapper" style="min-height: 396px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Role <em>{{ $role->display_name }}</em></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-success btn-sm" href="{{ route('roles.index') }}"><i class="fa fa-btn fa-arrow-left" aria-hidden="true"></i>Back</a>
                    <div class="pull-right">
                        @permission(('role-edit'))
                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa fa-btn fa-pencil" aria-hidden="true"></i>Edit</a>
                        @endpermission
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', $role->name, array('placeholder' => 'Name','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Display Name:</strong>
                                {!! Form::text('display_name', $role->display_name, array('placeholder' => 'Display Name','class' => 'form-control', 'disabled' => 'disabled')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Description:</strong>
                                {!! Form::textarea('description', $role->description, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px', 'disabled' => 'disabled')) !!}
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
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

</div>
@endsection
