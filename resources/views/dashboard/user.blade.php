@extends('layouts.app')

@section('content')
        <div class="col-md-9">
            <div class="col-md-12 col-xs-12 profile-content">
                <blockquote class="quote-box">
                    <p class="quotation-mark">
                        “
                    </p>
                    <p class="quote-text">
                        @if(Auth::user()->user_profile->quote==null)
                            Masukin impianmu cuk
                        @else
                            {{Auth::user()->user_profile->quote}}
                        @endif
                    </p>
                    <hr>
                </blockquote>
                <div class="col-md-12 profile-font">
                    <div class="row">
                        <div class="col-md-4 col-xs-5">
                            <label>
                                Alamat
                            </label>
                        </div>
                        <div class="col-md-1 col-xs-1 supreme-1">
                            <span>:</span>
                        </div>
                        <div class="col-md-7 col-md-offset-0 col-xs-8 col-xs-offset-2">
                            <label class="raleway-italic">
                                @if(Auth::user()->user_profile->address==null)
                                    Belum ada data cuk,isi makanya
                                @else
                                    {{Auth::user()->user_profile->address}}
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-5">
                            <label>
                                Email
                            </label>
                        </div>
                        <div class="col-md-1 col-xs-1 supreme-1">
                            <span>:</span>
                        </div>
                        <div class="col-md-7 col-md-offset-0 col-xs-8 col-xs-offset-2">
                            <label class="raleway-italic">
                                {{Auth::user()->email}}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-5">
                            <label>
                                No Handphone
                            </label>
                        </div>
                        <div class="col-md-1 col-xs-1 supreme-1">
                            <span>:</span>
                        </div>
                        <div class="col-md-7 col-md-offset-0 col-xs-8 col-xs-offset-2">
                            <label class="raleway-italic">
                                @if(Auth::user()->user_profile->phone==null)
                                    Belum ada data cuk,isi makanya
                                @else
                                    {{Auth::user()->user_profile->phone}}
                                @endif
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 marpad-widget">
                    <div class="col-md-3 widget-kotak">
                        <div class="row border-garis">
                            <div class="col-md-4 col-xs-4 no-marpad-1">
                                <span><i class="fa fa-pencil-square-o fa-2x fa-align-center" aria-hidden="true"></i></span>
                            </div>
                            <div class="col-md-8 col-xs-8 text-center border-widget mobile-no-marpad-1">
                                <span>Tryout Remaining</span>
                            </div>
                        </div>
                        <div class="row text-center widget-isi">
                            <h1>{{Auth::user()->jatahTO}}</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1 widget-kotak">
                        <div class="row border-garis">
                            <div class="col-md-3 col-xs-4 no-marpad-1">
                                <span><i class="fa fa-pencil-square-o fa-2x fa-align-center" aria-hidden="true"></i></span>
                            </div>
                            <div class="col-md-9 col-xs-8 text-center border-widget mobile-no-marpad-1">
                                <span>Your Average Score</span>
                            </div>
                        </div>
                        <div class="row text-center widget-isi">
                            <div class="bar-kotak">
                                <span class="progressText"><B></B></span>
                                <div class="progress ">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="10" aria-valuemax="100" style="">
                                        <span  class="popOver" data-toggle="tooltip" data-placement="top" title="70"> </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1 widget-kotak">
                        <div class="row border-garis">
                            <div class="col-md-4 col-xs-4 no-marpad-1">
                                <span><i class="fa fa-pencil-square-o fa-2x fa-align-center" aria-hidden="true"></i></span>
                            </div>
                            <div class="col-md-8 col-xs-8 text-center border-widget mobile-no-marpad-1">
                                <span>Warning!</span>
                            </div>
                        </div>
                        <div class="row text-center widget-isi">
                            <div class="penampung-isi-wigdet">
                                <h6 class="no-marpad" style="text-align:center;"	>Masih Bingung??Langsung aja join sama kita!!! Klik tombol dibawah ini</h6>
                                <div class="content-buttons">
                                    <a href="#" class="btn btn-success btn-sm" role="button">JOIN SUPREME</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection