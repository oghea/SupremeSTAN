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
                    <div class="col-md-4 pull-right">
                        @foreach($currentSubj as $Subj)
                            @if($Subj->subId == 1 || $Subj->subId == 2)
                                <h2>Jumlah Soal Terisi : {{$soal_terisiTKD}}/{{$jumlah_soaltkd}}</h2>
                            @elseif($Subj->subId == 3)
                                <h2>Jumlah Soal Terisi : {{$soal_terisiTKP}}/{{$jumlah_soaltkd}}</h2>
                            @endif
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {{--<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">--}}
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <div id="myTabContent" class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-1">

                                            No

                                        </div>
                                        <div class="col-md-1">

                                            ID

                                        </div>
                                        <div class="col-md-6">

                                            Judul KD

                                        </div>
                                        <div class="col-md-2">

                                            Preview

                                        </div>
                                        <div class="col-md-1">

                                            Edit

                                        </div>
                                        <div class="col-md-1">

                                            Delete

                                        </div>
                                    </div>
                                    <hr>
                                    @if($soals->isEmpty() && $soalTKP->isEmpty())
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
                                            @foreach($currentSubj as $Subj)
                                                @if($Subj->subId == 1 || $Subj->subId == 2)
                                                    @if(!$fullTKD)
                                                        <a href="{{route('soal.createTKD',$id)}}" class="btn btn-primary">Input new Soal</a>
                                                    @endif
                                                @elseif($Subj->subId == 3)
                                                    @if(!$fullTKP)
                                                        <a href="{{route('soal.createTKP',$id)}}" class="btn btn-primary">Input new Soal</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @elseif($soalTKP->isEmpty())
                                        @foreach($soals as $soal)
                                            <div class="row">
                                                <div class="col-md-1">

                                                    {{++$i}}

                                                </div>
                                                <div class="col-md-1">

                                                    {{$soal->banksoalTKD_id}}

                                                </div>
                                                <div class="col-md-6">

                                                    {{$soal->nama}}

                                                </div>
                                                <div class="col-md-2">

                                                    {{--<button type="submit" class="btn btn-success">Preview</button>--}}
                                                    <a href="{{ route('soal.viewTKD',[$id,$soal->banksoalTKD_id]) }}" class="btn btn-success">Preview</a>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('soal.editTKD',[$id,$soal->banksoalTKD_id]) }}" class="btn btn-warning">Edit</a>
                                                    {{--{!! Form::open(['method' => 'POST','route' => ['soal.edit', $soal->soal_id, $id]]) !!}--}}
                                                    {{--{!! Form::submit('Edit', ['class' => 'btn btn-warning']) !!}--}}
                                                    {{--{!! Form::close() !!}--}}
                                                    {{--<button type="submit" class="btn btn-warning">Edit</button>--}}

                                                </div>
                                                <div class="col-md-1">
                                                    {!! Form::open(['method' => 'DELETE','route' => ['soal.deleteTKD', $soal->banksoalTKD_id, $id]]) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                    {{--<a href="" type="submit" class="btn btn-danger">Delete</a>--}}

                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $soals->render() !!}
                                            @if(!$fullTKD)
                                                <div>
                                                    <a href="{{route('soal.createTKD',$id)}}" class="btn btn-primary">Input new Soal</a>
                                                </div>
                                            @endif
                                    @elseif($soals->isEmpty())
                                        @foreach($soalTKP as $soal_tkp)
                                            <div class="row">
                                                <div class="col-md-1">

                                                    {{++$i}}

                                                </div>
                                                <div class="col-md-1">

                                                    {{$soal_tkp->banksoalTKP_id}}

                                                </div>
                                                <div class="col-md-6">

                                                    {{$soal_tkp->nama}}

                                                </div>
                                                <div class="col-md-2">

                                                    {{--<button type="submit" class="btn btn-success">Preview</button>--}}
                                                    <a href="{{ route('soal.viewTKP',[$id,$soal_tkp->banksoalTKP_id]) }}" class="btn btn-success">Preview</a>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('soal.editTKP',[$id,$soal_tkp->banksoalTKP_id]) }}" class="btn btn-warning">Edit</a>
                                                    {{--{!! Form::open(['method' => 'POST','route' => ['soal.edit', $soal->soal_id, $id]]) !!}--}}
                                                    {{--{!! Form::submit('Edit', ['class' => 'btn btn-warning']) !!}--}}
                                                    {{--{!! Form::close() !!}--}}
                                                    {{--<button type="submit" class="btn btn-warning">Edit</button>--}}

                                                </div>
                                                <div class="col-md-1">
                                                    {!! Form::open(['method' => 'DELETE','route' => ['soal.deleteTKD', $soal_tkp->banksoalTKP_id, $id]]) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                    {{--<a href="" type="submit" class="btn btn-danger">Delete</a>--}}

                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $soalTKP->render() !!}
                                            @if(!$fullTKP)
                                                <div>
                                                    <a href="{{route('soal.createTKP',$id)}}" class="btn btn-primary">Input new Soal</a>
                                                </div>
                                            @endif
                                    @endif
                                    <div>
                                        <a href="{{route('bundle.list')}}" class="btn btn-warning">Back</a>
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