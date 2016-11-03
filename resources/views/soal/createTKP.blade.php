@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Upload Soal</h3>
        </div>
    </div>
    <div class="clearfix">

    </div>
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
                    <h2>Upload Soal</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-xs-10 col-xs-offset-1">
                        {!!Form::open(['route' => ['soal.createTKP', $id] , 'role' => 'form','files' => true,'method'=>'POST'])!!}
                        {{--{{ csrf_field() }}--}}
                        <select name="kdPilihan">
                            @foreach($kds as $kd)
                                <option value="{{$kd->id}}">{{$kd->nama}}</option>
                            @endforeach
                        </select>
                        {{--{!!Form::select('kdPilihan',$kds->pluck('nama')->all(), ['placeholder' => 'Pilih Salah Satu...','class' => 'form-control']) !!}--}}
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Soal
                                </div>
                                <div class="panel-body">
                                    {{--<textarea id="soal" class="soal form-control" name="content">{!! old('content', $content) !!}</textarea>--}}
                                    {!! Form::textarea('soal', null, array('class ' => 'form-control soal'))!!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::select('bobot_a', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5']) !!}
                                    <label>
                                        A
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! Form::textarea('jawabanA', null, array('class ' => 'form-control jawaban')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::select('bobot_b', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5']) !!}
                                    <label>
                                        B
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! Form::textarea('jawabanB', null, array('class ' => 'form-control jawaban')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::select('bobot_c', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5']) !!}
                                    <label>
                                        C
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! Form::textarea('jawabanC', null, array('class ' => 'form-control jawaban')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::select('bobot_d', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5']) !!}
                                    <label>
                                        D
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! Form::textarea('jawabanD', null, array('class ' => 'form-control jawaban')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    {!! Form::select('bobot_e', ['1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5']) !!}
                                    <label>
                                        E
                                    </label>
                                </div>
                                <div class="panel-body">
                                    {!! Form::textarea('jawabanE', null, array('class ' => 'form-control jawaban')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Pembahasan
                                </div>
                                <div class="panel-body">
                                    {!! Form::textarea('pembahasan', null, array('class ' => 'form-control soal')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-md-offset-5">
                            <input type="submit" class="btn btn-default">
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endsection