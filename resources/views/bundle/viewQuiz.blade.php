@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="col-md-12">
            <h3>
                Manage Bundle Quiz
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
                        <h2>Jumlah Soal Terisi : {{$soal_terisiQuiz}}/{{$jumlah_soalQuiz->jumlah_soal}}</h2>
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

                                            Isi Soal

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
                                    @if($soals->isEmpty())
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
                                        @foreach($soals as $soal)
                                            <div class="row">
                                                <div class="col-md-1">

                                                    {{++$i}}

                                                </div>
                                                <div class="col-md-1">

                                                    {{$soal->banksoalQuiz_id}}

                                                </div>
                                                <div class="col-md-6">

                                                    {!! $soal->isi_soal !!}

                                                </div>
                                                <div class="col-md-2">

                                                    {{--<button type="submit" class="btn btn-success">Preview</button>--}}
                                                    <a href="{{ route('soal.viewQuiz',[$id,$soal->banksoalQuiz_id]) }}" class="btn btn-success">Preview</a>

                                                </div>
                                                <div class="col-md-1">
                                                    <a href="{{ route('soal.editQuiz',[$id,$soal->banksoalQuiz_id]) }}" class="btn btn-warning">Edit</a>
                                                    {{--{!! Form::open(['method' => 'POST','route' => ['soal.edit', $soal->soal_id, $id]]) !!}--}}
                                                    {{--{!! Form::submit('Edit', ['class' => 'btn btn-warning']) !!}--}}
                                                    {{--{!! Form::close() !!}--}}
                                                    {{--<button type="submit" class="btn btn-warning">Edit</button>--}}

                                                </div>
                                                <div class="col-md-1">
                                                    {!! Form::open(['method' => 'DELETE','route' => ['soal.deleteQuiz', $soal->banksoalQuiz_id, $id]]) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}
                                                    {{--<a href="" type="submit" class="btn btn-danger">Delete</a>--}}

                                                </div>
                                            </div>
                                        @endforeach
                                        {!! $soals->render() !!}
                                    @endif
                                    <hr>
                                    <div>
                                        @if(!$fullQuiz)
                                            <a href="{{route('soal.createQuiz',$id)}}" class="btn btn-primary">Input new Soal</a>
                                        @endif
                                        <div>
                                            <a href="{{route('bundle.list')}}" class="btn btn-warning">Back</a>
                                        </div>
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