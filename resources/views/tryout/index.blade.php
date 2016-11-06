@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="col-md-12">
            <h3>
                Manage Tryouts
                <small>Pilih Bundle, Publish Tryouts</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 ">
            <div class="col-md-12 profile-content">
                <div class="x_title">
                    <h2>Manage Tryout</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="USM-tab" role="tab" data-toggle="tab" aria-expanded="true">USM</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="TKD-tab" data-toggle="tab" aria-expanded="false">TKD</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="USM-tab">
                                <div class="row">
                                    <div class="col-md-1">

                                        No

                                    </div>
                                    <div class="col-md-4">

                                        Judul Tryout

                                    </div>
                                    <div class="col-md-2">

                                        Durasi

                                    </div>
                                    <div class="col-md-2">

                                        Jumlah Soal

                                    </div>
                                    <div class="col-md-2">

                                        Publish Date

                                    </div>
                                    <div class="col-md-1">

                                        Publish

                                    </div>
                                </div>
                                <hr>
                                @if($usm->isEmpty())
                                    <div class="row">
                                        <div class="col-md-1">

                                            0

                                        </div>
                                        <div class="col-md-4">

                                            kosong

                                        </div>
                                        <div class="col-md-7">

                                            kosong

                                        </div>
                                    </div>
                                @else
                                    @foreach($usm as $key => $us)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$us->judul}}

                                            </div>
                                            <div class="col-md-2">

                                                {{$durasi_usm[$key]->durasi}} Menit

                                            </div>
                                            <div class="col-md-2">

                                                {{$jumlah_usm[$key]->jumlah}}

                                            </div>
                                            <div class="col-md-2">

                                                @if($us->publish == 0)
                                                    not yet published
                                                @else
                                                    {{$us->publish_date}}
                                                @endif

                                            </div>
                                            <div class="col-md-1">
                                                @if($us->publish == 0)
                                                    {!! Form::open(['method' => 'PATCH','route' => ['tryout.publishUSM', $us->id]]) !!}
                                                    {!! Form::submit('Publish', ['class' => 'btn btn-success']) !!}
                                                    {!! Form::close() !!}
                                                @else
                                                    {!! Form::open(['method' => 'PATCH','route' => ['tryout.unPublishUSM', $us->id]]) !!}
                                                    {!! Form::submit('UnPublish', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $usm->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('admin/tryout/create')}}" class="btn btn-primary">Create Tryout USM</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="TKD-tab">
                                <div class="row">
                                    <div class="col-md-1">

                                        No

                                    </div>
                                    <div class="col-md-4">

                                        Judul Tryout

                                    </div>
                                    <div class="col-md-2">

                                        Durasi

                                    </div>
                                    <div class="col-md-2">

                                        Jumlah Soal

                                    </div>
                                    <div class="col-md-2">

                                        Publish Date

                                    </div>
                                    <div class="col-md-1">

                                        Publish

                                    </div>
                                </div>
                                <hr>
                                @if($tkd->isEmpty())
                                    <div class="row">
                                        <div class="col-md-1">

                                            0

                                        </div>
                                        <div class="col-md-4">

                                            kosong

                                        </div>
                                        <div class="col-md-7">

                                            kosong

                                        </div>
                                    </div>
                                @else
                                    @foreach($tkd as $key => $tk)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$tk->judul}}

                                            </div>
                                            <div class="col-md-2">

                                                {{$tk->durasi}} Menit

                                            </div>
                                            <div class="col-md-2">

                                                {{$jumlah_tkd[$key]->jumlah}}

                                            </div>
                                            <div class="col-md-2">

                                                @if($tk->published == 0)
                                                    not yet published
                                                @else
                                                    {{$tk->publish_date}}
                                                @endif

                                            </div>
                                            <div class="col-md-1">
                                                @if($tk->published == 0)
                                                    {!! Form::open(['method' => 'PATCH','route' => ['tryout.publishTKD', $tk->id]]) !!}
                                                    {!! Form::submit('Publish', ['class' => 'btn btn-success']) !!}
                                                    {!! Form::close() !!}
                                                @else
                                                    {!! Form::open(['method' => 'PATCH','route' => ['tryout.unPublishTKD', $tk->id]]) !!}
                                                    {!! Form::submit('UnPublish', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $tkd->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('admin/tryout/createTKD')}}" class="btn btn-primary">Create Tryout TKD</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection