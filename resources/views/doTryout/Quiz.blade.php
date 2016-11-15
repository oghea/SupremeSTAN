@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top:20px;">
        {!!Form::open(['route' => ['tryoutUser.doQuiz', $id,$time] ,'role' => 'form','method'=>'POST','id'=>'form-tpa'])!!}
        @foreach($soalQuiz as $Quiz)
            <div id="{{++$i}}" class="col-md-12">
                <div class="col-md-1" style="text-align:center;margin-bottom:10px;font-size:18px!important;">
                    <p>{{$i}}.</p>
                </div>
                <div class="col-md-11">
                    <div class="col-md-12" style="margin-bottom:10px;font-size:18px!important;">
                        {!!$Quiz->isi_soal !!}
                    </div>
                    <input type="hidden" value="{{$Quiz->id}}" name="urutan[{{$Quiz->id}}]">
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="1" id="{{$Quiz->id}}a-option">
                            <label for="{{$Quiz->id}}a-option">
                                <div class="check"></div>
                                {!!$Quiz->jawaban_a !!}
                            </label>  
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="2" id="{{$Quiz->id}}b-option">
                            <label for="{{$Quiz->id}}b-option">
                                <div class="check"><div class="inside"></div></div>
                                {!! $Quiz->jawaban_b !!}
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="3" id="{{$Quiz->id}}c-option">
                            <label for="{{$Quiz->id}}c-option">
                                <div class="check"></div>
                                {!! $Quiz->jawaban_c !!}
                            </label>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="4" id="{{$Quiz->id}}d-option">
                            <label for="{{$Quiz->id}}d-option">
                                <div class="check"><div class="inside"></div></div>
                                {!! $Quiz->jawaban_d !!}
                            </label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$Quiz->id}}]" value="5" id="{{$Quiz->id}}e-option">
                            <label for="{{$Quiz->id}}e-option">
                                <div class="check"><div class="inside"></div></div>
                                {!! $Quiz->jawaban_e !!}
                            </label>
                        </div>
                        <input type="radio" name="jawaban[{{$Quiz->id}}]" value="0" style="display: none;" checked="checked">
                    </div>
                </div>
            </div>
        @endforeach
        {!! Form::close() !!}
    </div>
@endsection