@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top:20px;">
        {!!Form::open(['route' => ['tryoutUser.doTPA', $id] ,'role' => 'form','method'=>'POST','id'=>'form-tpa'])!!}
        @foreach($soalTPA as $TPA)
            <div id="{{++$i}}" class="col-md-12">
                <div class="col-md-1" style="text-align:center">
                    <h1>{{$i}}</h1>
                </div>
                <div class="col-md-11">
                    <div class="col-md-12" style="margin-bottom:10px;font-size:18px;">
                        {!!$TPA->isi_soal !!}
                    </div>
                    <input type="hidden" value="{{$TPA->id}}" name="urutan[{{$TPA->id}}]">
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TPA->id}}]" value="1" id="{{$TPA->id}}a-option">
                            <label for="{{$TPA->id}}a-option">
                                {!!$TPA->jawaban_a !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TPA->id}}]" value="2" id="{{$TPA->id}}b-option">
                            <label for="{{$TPA->id}}b-option">
                                {!! $TPA->jawaban_b !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TPA->id}}]" value="3" id="{{$TPA->id}}c-option">
                            <label for="{{$TPA->id}}c-option">
                                {!! $TPA->jawaban_c !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TPA->id}}]" value="4" id="{{$TPA->id}}d-option">
                            <label for="{{$TPA->id}}d-option">
                                {!! $TPA->jawaban_d !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                        <input type="radio" name="jawaban[{{$TPA->id}}]" value="0" style="display: none;" checked="checked">
                    </div>
                </div>
            </div>
        @endforeach
        {!! Form::close() !!}
    </div>
@endsection