@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="col-md-12">
            <h3>
                Overview
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12 profile-content">
                <blockquote class="quote-box">
                    <p class="quotation-mark">
                        “
                    </p>
                    <p class="quote-text">
                        @if(Auth::user()->user_profile->quote==null)
                            Your Noble dreams
                        @else
                            {{Auth::user()->user_profile->quote}}
                        @endif
                    </p>
                    <hr>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-12 col-sm-12 col-xs-12 profile-font profile-content">
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-xs-5">
                        <label>
                            Alamat
                        </label>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-md-offset-0 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-1">
                        <label class="raleway-italic">
                            @if(Auth::user()->user_profile->address==null)
                                Belum ada data, diisi yuk
                            @else
                                {{Auth::user()->user_profile->address}}
                            @endif
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-xs-5">
                        <label>
                            Email
                        </label>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-md-offset-0 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-1">
                        <label class="raleway-italic">
                            {{Auth::user()->email}}
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-xs-5">
                        <label>
                            No Handphone
                        </label>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-1 supreme-1">
                        <span>:</span>
                    </div>
                    <div class="col-md-7 col-md-offset-0 col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-1">
                        <label class="raleway-italic">
                            @if(Auth::user()->user_profile->phone==null)
                                Belum ada data, diisi yuk
                            @else
                                {{Auth::user()->user_profile->phone}}
                            @endif
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="col-md-12 col-xs-12 profile-content">
                <div class="x_title">
                    <h2>Grafik Score USM</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- <div id="chartContainerUSM" style="height: 300px; width: 100%;">
                    </div> -->
                    <canvas id="myChart" width="300" height="200"></canvas>
                    <div class="col-xs-12" style="margin-top:50px">
                        <button type="button" class="btn btn-danger disabled" style="cursor:default">Tidak lulus</button>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <button type="button" class="btn btn-success disabled" style="cursor:default">Lulus</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="col-md-12 col-xs-12 profile-content">
                <div class="x_title">
                    <h2>Grafik Score TKD</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- <div id="chartContainerTKD" style="height: 300px; width: 100%;">
                    </div> -->
                    <canvas id="myChart1" width="300" height="200"></canvas>
                    <div class="col-xs-12" style="margin-top:50px">
                        <button type="button" class="btn btn-danger disabled" style="cursor:default">Tidak lulus</button>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <button type="button" class="btn btn-success disabled" style="cursor:default">Lulus</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="col-xs-12 profile-content">
                <div class="x_title">
                    <h2>Jatah Tryout</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Diagram</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <p class="">Jenis</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <p class="">Jumlah</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>USM </p>
                                        </td>
                                        <td>{{Auth::user()->TO_USM}}x Tryout</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>TKD </p>
                                        </td>
                                        <td>{{Auth::user()->TO_TKD}}x Tryout</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Harian</p>
                                        </td>
                                        <td>{{Auth::user()->TO_harian}}x Tryout</td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
            <div class="col-xs-12 profile-content">
                <div class="x_title">
                    <h2>Grafik Score TKD</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <canvas id="myChart2" width="300" height="100"></canvas>
                    <div class="col-xs-12" style="margin-top:50px">
                        <button type="button" class="btn btn-danger disabled" style="cursor:default">Tidak lulus</button>
                    </div>
                    <div class="col-xs-12" style="margin-top:10px">
                        <button type="button" class="btn btn-success disabled" style="cursor:default">Lulus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 ">
            <div class="col-md-12 profile-content">
                <blockquote class="blockquote-reverse">
                    <p>-</p>
                    <footer>Widodo Saputra <cite title="Source Title">Owner of supreme</cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>

@endsection