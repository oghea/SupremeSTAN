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
                <form enctype="multipart/form-data" action="profile/edit" method="POST" class="form-horizontal" role="form" id="loginForm">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="Prayogi Antaras Putra">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last Name:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="Prayogi Antaras Putra">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Alamat:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" value="Jl. Metro gang subur, Kota Metro. Lampung">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">No Handphone:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="081297345428">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Gender:</label>
                        <div class="col-md-8">
                            <label class="radio-inline"><input type="radio" name="optradio">Pria</label>
                            <label class="radio-inline"><input type="radio" name="optradio">Wanita</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Line:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="@prayogiAP">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Provinsi:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="Lampung">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Kota:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="Metro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Sekolah Asal:</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" value="SMAN 3 Metro">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Update Profile Image</label>
                        <div class="col-md-8">
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                </form>
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