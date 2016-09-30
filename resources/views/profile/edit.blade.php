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

                <h3>Personal info</h3>
                {{--<form enctype="multipart/form-data" action="profile/edit" method="POST" class="form-horizontal" role="form" id="loginForm">--}}
                {!!Form::open(['action' => 'UserProfileController@update' , 'role' => 'form','class' => 'form-horizontal' ,'files' => true])!!}
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">First Name:</label>
                        <div class="col-lg-8">
                            {!! Form::text('first_name', $namadepan, array('placeholder' => 'First Name','class' => 'form-control')) !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last Name:</label>
                        <div class="col-lg-8">
                            {!! Form::text('last_name', $namabelakang, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="col-lg-3 control-label">Alamat:</label>
                        <div class="col-lg-8">
                            {!! Form::text('address', $alamat, array('placeholder' => 'Masukan Alamat Anda','class' => 'form-control')) !!}
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Provinsi:</label>
                        <div class="col-md-8">
                            {!!Form::select('state', [
                            'DKI Jakarta' => 'DKI Jakarta',
                            'Lampung' => 'Lampung']
                            , $provinsi, ['placeholder' => 'Pilih Salah Satu...','class' => 'form-control']) !!}
                            @if ($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Kota:</label>
                        <div class="col-md-8">
                            {!! Form::text('city', $kota, array('placeholder' => 'Masukan Kota Asal Anda','class' => 'form-control')) !!}
                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('birth_date') ? ' has-error' : '' }}" id="datepickId">
                        <label class="col-md-3 control-label">Tanggal Lahir:</label>
                        <div class="col-md-8 input-group date">
                            {{--{!! Form::date('birth_date', $ttl,array('placeholder' => 'dd/mm/yyyy','class' => 'form-control')) !!}--}}
                            {!! Form::text('birth_date', $ttl, array('placeholder' => 'dd/mm/yyyy','class' => 'form-control')) !!}
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                        @if ($errors->has('birth_date'))
                        <div class="col-md-8 col-md-offset-3">
                            <span class="help-block">
                                <strong>{{ $errors->first('birth_date') }}</strong>
                            </span>
                        </div>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">No Handphone:</label>
                        <div class="col-md-8">
                            {!! Form::text('phone', $hp, array('placeholder' => 'Masukan No HP anda','class' => 'form-control')) !!}
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Gender:</label>
                        <div class="col-md-8">
                            <label class="radio-inline">{!! Form::radio('gender', 'Pria',$sexM) !!}Pria</label>
                            <label class="radio-inline">{!! Form::radio('gender', 'Wanita',$sexF) !!}Wanita</label>
                            @if ($errors->has('gender'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Line:</label>
                        <div class="col-md-8">
                            {!! Form::text('line_id', $line, array('placeholder' => 'Masukan ID Line bila ada','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('parent_name') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Nama Orang Tua/Wali:</label>
                        <div class="col-md-8">
                            {!! Form::text('parent_name', $ortu, array('placeholder' => 'Masukan nama orangtua/wali','class' => 'form-control')) !!}
                            @if ($errors->has('parent_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('parent_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('parent_phone') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">No HP Orang Tua/Wali:</label>
                        <div class="col-md-8">
                            {!! Form::text('parent_phone', $ortuHp, array('placeholder' => 'Masukan No HP orangtua/wali','class' => 'form-control')) !!}
                            @if ($errors->has('parent_phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('parent_phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sekolah Asal:</label>
                        <div class="col-md-8">
                            {!! Form::text('school_origin', $sekolahAsal, array('placeholder' => 'Masukan Sekolah Asal Anda','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Quote:</label>
                        <div class="col-md-8">
                            {!! Form::text('quote', $quote, array('placeholder' => 'Masukan Noble Dreams Anda','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Update Profile Image</label>
                        <div class="col-md-8">
                            {!! Form::file('avatar') !!}
                            @if ($errors->has('avatar'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                            @endif
                            {{--<input type="file" name="avatar">--}}
                            {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                        </div>
                    </div>
                    <hr>
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

    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-10 col-md-offset-1">--}}
                {{--<img src="storage/uploads/avatars/{{ Auth::user()->user_profile->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">--}}
                {{--<h2>{{ Auth::user()->name }}'s Profile</h2>--}}
                {{--<form enctype="multipart/form-data" action="profile" method="POST">--}}
                    {{--<label>Update Profile Image</label>--}}
                    {{--<input type="file" name="avatar">--}}
                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                    {{--<input type="submit" class="pull-right btn btn-sm btn-primary">--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection