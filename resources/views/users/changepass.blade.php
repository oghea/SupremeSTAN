@extends('layouts.app')

@section('content')
    <div class="col-md-9">
    <div class="col-md-12 col-xs-12 profile-content">
        <div class="col-md-12 profile-font">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                Please make a sure information!!!
            </div>
            <h3>Change Password</h3>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!!Form::open(['action' => 'UserController@PostChangePassword' , 'role' => 'form','class' => 'form-horizontal'])!!}
                <div class="form-group">
                    <label class="col-md-3 control-label">New Password:</label>
                    <div class="col-md-8">
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm Password:</label>
                    <div class="col-md-8">
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="submit" class="btn btn-primary" value="Save Changes">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Cancel">
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection