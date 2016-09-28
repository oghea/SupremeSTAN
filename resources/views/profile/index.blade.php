@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <div class="col-md-12 col-xs-12 profile-content">
            <div class="col-md-12 profile-font">
                <h3>Personal info !!!</h3>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Nama
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic ">
                        <label>
                            @if(Auth::user()->user_profile->first_name==null)
                                {{Auth::user()->name}}
                            @else
                                {{Auth::user()->user_profile->first_name}} {{Auth::user()->user_profile->last_name}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Alamat
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->address==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->address}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Status
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @foreach($users->roles as $role)
                                {{$role->display_name}}
                            @endforeach
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Email:
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            {{Auth::user()->email}}
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            No Handphone
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->phone==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->phone}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Gender
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->gender==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->gender}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Line
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->line_id==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->line_id}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Provinsi
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->state==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->state}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Kota
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->city==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->city}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <label>
                            Sekolah Asal
                        </label>
                    </div>
                    <div class="col-md-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-xs-7 raleway-italic">
                        <label>
                            @if(Auth::user()->user_profile->school_origin==null)
                                Belum ada data cuk,isi makanya
                            @else
                                {{Auth::user()->user_profile->school_origin}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="edit-profile-buttons">
                    <a href="{{url('/profile/edit')}}" class="btn btn-warning btn-sm" role="button">Edit Profile</a>
                    <a href="/" class="btn btn-danger btn-sm" role="button">Change Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection