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
                            <li role="presentation" class="active"><a href="#tab_content1" id="tpa-tab" role="tab" data-toggle="tab" aria-expanded="true">TPA</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="tbi-tab" data-toggle="tab" aria-expanded="false">TBI</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content3" role="tab" id="twk-tab2" data-toggle="tab" aria-expanded="false">TWK</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content4" role="tab" id="tiu-tab2" data-toggle="tab" aria-expanded="false">TIU</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content5" role="tab" id="tkp-tab2" data-toggle="tab" aria-expanded="false">TKP</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="tpa-tab">
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
                                                @if($tp->full)
                                                    <a href="{{ route('bundle.view',$tp->id) }}" class="btn btn-success disabled">Upload Soal</a>
                                                @else
                                                    <a href="{{ route('bundle.view',$tp->id) }}" class="btn btn-success">Upload Soal</a>
                                                @endif


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
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="tbi-tab">
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
                                                @if($tb->full)
                                                    <a href="{{ route('bundle.view',$tb->id) }}" class="btn btn-success disabled">Upload Soal</a>
                                                @else
                                                    <a href="{{ route('bundle.view',$tb->id) }}" class="btn btn-success">Upload Soal</a>
                                                @endif
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
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="twk-tab">
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

                                        Upload Soal

                                    </div>
                                    <div class="col-md-2">

                                        Delete

                                    </div>
                                </div>
                                <hr>
                                @if($twk->isEmpty())
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
                                    @foreach($twk as $tw)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-1">

                                                {{$tw->id}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$tw->judul}}

                                            </div>
                                            <div class="col-md-2">
                                                @if($tw->full)
                                                    <a href="{{ route('bundle.viewTKD',$tw->id) }}" class="btn btn-success disabled">Upload Soal</a>
                                                @else
                                                    <a href="{{ route('bundle.viewTKD',$tw->id) }}" class="btn btn-success">Upload Soal</a>
                                                @endif

                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::open(['method' => 'DELETE','route' => ['bundle.deleteTKD', $tw->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endforeach
                                        {!! $twk->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('/admin/bundle/twk/create')}}" class="btn btn-primary">Create Bundle TWK</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="tiu-tab">
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

                                        Upload Soal

                                    </div>
                                    <div class="col-md-2">

                                        Delete

                                    </div>
                                </div>
                                <hr>
                                @if($tiu->isEmpty())
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
                                    @foreach($tiu as $ti)
                                        <div class="row">
                                            <div class="col-md-1">

                                                {{++$i}}

                                            </div>
                                            <div class="col-md-1">

                                                {{$ti->id}}

                                            </div>
                                            <div class="col-md-4">

                                                {{$ti->judul}}

                                            </div>
                                            <div class="col-md-2">
                                                @if($ti->full)
                                                    <a href="{{ route('bundle.viewTKD',$ti->id) }}" class="btn btn-success disabled">Upload Soal</a>
                                                @else
                                                    <a href="{{ route('bundle.viewTKD',$ti->id) }}" class="btn btn-success">Upload Soal</a>
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::open(['method' => 'DELETE','route' => ['bundle.deleteTKD', $ti->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $tiu->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('/admin/bundle/tiu/create')}}" class="btn btn-primary">Create Bundle TIU</a>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="tkp-tab">
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

                                        Upload Soal

                                    </div>
                                    <div class="col-md-2">

                                        Delete

                                    </div>
                                </div>
                                <hr>
                                @if($tkp->isEmpty())
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
                                    @foreach($tkp as $tk)
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
                                                @if($tk->full)
                                                    <a href="{{ route('bundle.viewTKD',$tk->id) }}" class="btn btn-success disabled">Upload Soal</a>
                                                @else
                                                    <a href="{{ route('bundle.viewTKD',$tk->id) }}" class="btn btn-success">Upload Soal</a>
                                                @endif

                                            </div>
                                            <div class="col-md-2">
                                                {!! Form::open(['method' => 'DELETE','route' => ['bundle.deleteTKD', $tk->id]]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    @endforeach
                                    {!! $tkp->render() !!}
                                @endif
                                <hr>
                                <div>
                                    <a href="{{url('/admin/bundle/tkp/create')}}" class="btn btn-primary">Create Bundle TKP</a>
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