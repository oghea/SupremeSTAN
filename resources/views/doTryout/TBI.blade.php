@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top:20px;">
        {!!Form::open(['route' => ['tryoutUser.doTBI', $id] ,'role' => 'form','method'=>'POST','id'=>'form-tpa'])!!}
        @foreach($soalTBI as $TBI)
            <div id="{{++$i}}" class="col-md-12">
                <div class="col-md-1" style="text-align:center">
                    <h1>{{$i}}</h1>
                </div>
                <div class="col-md-11">
                    <div class="col-md-12" style="margin-bottom:10px;font-size:18px;">
                        {!!$TBI->isi_soal !!}
                    </div>
                    <input type="hidden" value="{{$TBI->id}}" name="urutan[{{$TBI->id}}]">
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TBI->id}}]" value="1" id="{{$TBI->id}}a-option">
                            <label for="{{$TBI->id}}a-option">
                                {!!$TBI->jawaban_a !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TBI->id}}]" value="2" id="{{$TBI->id}}b-option">
                            <label for="{{$TBI->id}}b-option">
                                {!! $TBI->jawaban_b !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TBI->id}}]" value="3" id="{{$TBI->id}}c-option">
                            <label for="{{$TBI->id}}c-option">
                                {!! $TBI->jawaban_c !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="jawaban[{{$TBI->id}}]" value="4" id="{{$TBI->id}}d-option">
                            <label for="{{$TBI->id}}d-option">
                                {!! $TBI->jawaban_d !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                        <input type="radio" name="jawaban[{{$TBI->id}}]" value="0" style="display: none;" checked="checked">
                    </div>
                </div>
            </div>
        @endforeach
        {!! Form::close() !!}
    </div>
@endsection