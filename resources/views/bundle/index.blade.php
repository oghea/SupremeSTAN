@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="col-md-12">
        <h3>
            Manage Bundle
            <small>Upload soal, pilihan, kunci, pembahasan, publish tryouts</small>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12 col-xs-12 ">
        <div class="col-md-12 profile-content">
            <div class="x_title">
                <h2>Upload bundle</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                {{--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">--}}
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">TPA</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">TBI</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">TKD</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-1">

                                        No

                                    </div>
                                    <div class="col-md-1">

                                        ID

                                    </div>
                                    <div class="col-md-4">

                                        Nama Bundle

                                    </div>
                                    <div class="col-md-2">

                                        Durasi

                                    </div>
                                    <div class="col-md-2">

                                        Upload Soal

                                    </div>
                                    <div class="col-md-2">

                                        Delete

                                    </div>
                                </div>
                                <hr>
                                @if($tpa->isEmpty())
                                    <div class="row">
                                        <div class="col-md-1">

                                            0

                                        </div>
                                        <div class="col-md-4">

                                            kosong

                                        </div>
                                        <div class="col-md-7">

                                            bebas berapa aja

                                        </div>
                                    </div>
                                @else
                                    @foreach($tpa as $tp)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-1">

                                                {{$tp->id}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$tp->judul}}

                                            </div>
                                            <div class="col-md-2">

                                                {{$tp->durasi}}

                                            </div>
                                            <div class="col-md-2">

                                                <a href="{{ route('bundle.view',$tp->id) }}" class="btn btn-success">Upload Soal</a>

                                            </div>
                                            <div class="col-md-2">
                                                {{--<a href="{{ route('bundle.delete',$tp->id) }}" class="btn btn-danger">Delete</a>--}}
                                                {!! Form::open(['method' => 'DELETE','route' => ['bundle.delete', $tp->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endforeach
                                        {!! $tpa->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('/admin/bundle/tpa/create')}}" class="btn btn-primary">Create Bundle TPA</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-1">

                                        No

                                    </div>
                                    <div class="col-md-1">

                                        ID

                                    </div>
                                    <div class="col-md-4">

                                        Nama Bundle

                                    </div>
                                    <div class="col-md-2">

                                        Durasi

                                    </div>
                                    <div class="col-md-2">

                                        Upload Soal

                                    </div>
                                    <div class="col-md-2">

                                        Delete

                                    </div>
                                </div>
                                <hr>
                                @if($tbi->isEmpty())
                                    <div class="row">
                                        <div class="col-md-1">

                                            0

                                        </div>
                                        <div class="col-md-4">

                                            kosong

                                        </div>
                                        <div class="col-md-7">

                                            bebas berapa aja

                                        </div>
                                    </div>
                                @else
                                    @foreach($tbi as $tb)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-1">

                                                {{$tb->id}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$tb->judul}}

                                            </div>
                                            <div class="col-md-2">

                                                {{$tb->durasi}}

                                            </div>
                                            <div class="col-md-2">

                                                <a href="{{ route('bundle.view',$tb->id) }}" class="btn btn-success">Upload Soal</a>

                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::open(['method' => 'DELETE','route' => ['bundle.delete', $tb->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endforeach
                                        {!! $tbi->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('/admin/bundle/tbi/create')}}" class="btn btn-primary">Create Bundle TBI</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-1">

                                        No

                                    </div>
                                    <div class="col-md-1">

                                        ID

                                    </div>
                                    <div class="col-md-4">

                                        Nama Bundle

                                    </div>
                                    <div class="col-md-2">

                                        Durasi

                                    </div>
                                    <div class="col-md-2">

                                        Upload Soal

                                    </div>
                                    <div class="col-md-2">

                                        Delete

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

                                            bebas berapa aja

                                        </div>
                                    </div>
                                @else
                                    @foreach($tkd as $tk)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-1">

                                                {{$tk->id}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$tk->judul}}

                                            </div>
                                            <div class="col-md-2">

                                                {{$tk->durasi}}

                                            </div>
                                            <div class="col-md-2">

                                                <a href="{{ route('bundle.viewTKD',$tk->id) }}" class="btn btn-success">Upload Soal</a>

                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::open(['method' => 'DELETE','route' => ['bundle.deleteTKD', $tk->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endforeach
                                        {!! $tkd->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('/admin/bundle/tkd/create')}}" class="btn btn-primary">Create Bundle TKD</a>
                                </div>
                            </div>
                        </div>
                    </div>



                {{--</form>--}}
            </div>
        </div>
    </div>
</div>
@endsection