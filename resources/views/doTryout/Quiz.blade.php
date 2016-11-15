@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top:20px;">
        {!!Form::open(['route' => ['tryoutUser.doQuiz', $id] ,'role' => 'form','method'=>'POST','id'=>'form-tpa'])!!}
        @foreach($soalQuiz as $Quiz)
            <div id="{{++$i}}" class="col-md-12">
                <div class="col-md-1" style="text-align:center">
                    <h1>{{$i}}</h1>
                </div>
                <div class="col-md-11">
                    <div class="col-md-12" style="margin-bottom:10px;font-size:18px;">
                        {!!$Quiz->isi_soal !!}
                    </div>
                    <input type="hidden" value="{{$Quiz->id}}" name="urutan[{{$Quiz->id}}]">
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="1" id="{{$Quiz->id}}a-option">
                            <label for="{{$Quiz->id}}a-option">
                                {!!$Quiz->jawaban_a !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="2" id="{{$Quiz->id}}b-option">
                            <label for="{{$Quiz->id}}b-option">
                                {!! $Quiz->jawaban_b !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="3" id="{{$Quiz->id}}c-option">
                            <label for="{{$Quiz->id}}c-option">
                                {!! $Quiz->jawaban_c !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="4" id="{{$Quiz->id}}d-option">
                            <label for="{{$Quiz->id}}d-option">
                                {!! $Quiz->jawaban_d !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="5" id="{{$Quiz->id}}e-option">
                            <label for="{{$Quiz->id}}d-option">
                                {!! $Quiz->jawaban_e !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                        <input type="radio" name="jawaban[{{$Quiz->id}}]" value="0" style="display: none;" checked="checked">
                    </div>
                </div>
            </div>
        @endforeach
        {!! Form::close() !!}
    </div>
@endsection