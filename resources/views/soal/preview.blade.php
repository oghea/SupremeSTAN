@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Preview</h3>
        </div>
    </div>
    <div class="clearfix">

    </div>
    <div class="page-title">
        <div class="col-md-12">
            <h3>
                Preview Soal
                <small>Preview</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 ">
            <div class="col-md-12 profile-content">
                <div class="x_title">
                    <h2>Preview</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-10 col-xs-offset-1">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Soal
                                </div>
                                <div class="panel-body">
                                    {!! $soal->isi_soal !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::radio('jawaban', 1) !!}
                                    <label>
                                        A
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! $soal->jawaban_a !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::radio('jawaban', 2) !!}
                                    <label>
                                        B
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! $soal->jawaban_b !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::radio('jawaban', 3) !!}
                                    <label>
                                        C
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! $soal->jawaban_c !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::radio('jawaban', 4) !!}
                                    <label>
                                        D
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! $soal->jawaban_d !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-5">
                            @if($usm)
                                <a href="{{ route('bundle.view',$bundleId) }}" class="btn btn-warning">Back</a>
                            @else
                                <a href="{{ route('bundle.viewTKD',$bundleId) }}" class="btn btn-warning">Back</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection