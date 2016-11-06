@extends('layouts.app')

@section('content')
    <div class="col-md-12" style="margin-top:20px;">
        @foreach($soalTKD as $TKD)
        <div id="{{$i}}" class="col-md-12">
            <div class="col-md-1" style="text-align:center">
                <h1>{{$i++}}</h1>
            </div>
            <div class="col-md-11">
                <div class="col-md-12" style="margin-bottom:10px;font-size:18px;">
                    {!!$TKD->isi_soal !!}
                </div>
                <div class="row">
                    <div class="col-md-6 jawaban-user">
                        <input type="radio" name="{{$TKD->id}}jawaban" id="{{$TKD->id}}a-option">
                        <label for="{{$TKD->id}}a-option">
                            {!!$TKD->jawaban_a !!}
                        </label>
                        <div class="check"></div>
                    </div>
                    <div class="col-md-6 jawaban-user">
                        <input type="radio" name="{{$TKD->id}}jawaban" id="{{$TKD->id}}b-option">
                        <label for="{{$TKD->id}}b-option">
                            {!! $TKD->jawaban_b !!}
                        </label>
                        <div class="check"><div class="inside"></div></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 jawaban-user">
                        <input type="radio" name="{{$TKD->id}}jawaban" id="{{$TKD->id}}c-option">
                        <label for="{{$TKD->id}}c-option">
                            {!! $TKD->jawaban_c !!}
                        </label>
                        <div class="check"></div>
                    </div>
                    <div class="col-md-6 jawaban-user">
                        <input type="radio" name="{{$TKD->id}}jawaban" id="{{$TKD->id}}d-option">
                        <label for="{{$TKD->id}}d-option">
                            {!! $TKD->jawaban_d !!}
                        </label>
                        <div class="check"><div class="inside"></div></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 jawaban-user">
                        <input type="radio" name="{{$TKD->id}}jawaban" id="{{$TKD->id}}e-option">
                        <label for="{{$TKD->id}}e-option">
                            {!! $TKD->jawaban_e !!}
                        </label>
                        <div class="check"></div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($soalTKP as $TKP)
            <div id="{{$i}}" class="col-md-12">
                <div class="col-md-1" style="text-align:center">
                    <h1>{{$i++}}</h1>
                </div>
                <div class="col-md-11">
                    <div class="col-md-12" style="margin-bottom:10px;font-size:18px;">
                        {!!$TKP->isi_soal !!}
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="{{$TKP->id}}jawaban" id="{{$TKP->id}}a-option">
                            <label for="{{$TKP->id}}a-option">
                                {!!$TKP->jawaban_a !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="{{$TKP->id}}jawaban" id="{{$TKP->id}}b-option">
                            <label for="{{$TKP->id}}b-option">
                                {!! $TKP->jawaban_b !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="{{$TKP->id}}jawaban" id="{{$TKP->id}}c-option">
                            <label for="{{$TKP->id}}c-option">
                                {!! $TKP->jawaban_c !!}
                            </label>
                            <div class="check"></div>
                        </div>
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="{{$TKP->id}}jawaban" id="{{$TKP->id}}d-option">
                            <label for="{{$TKP->id}}d-option">
                                {!! $TKP->jawaban_d !!}
                            </label>
                            <div class="check"><div class="inside"></div></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 jawaban-user">
                            <input type="radio" name="{{$TKP->id}}jawaban" id="{{$TKP->id}}e-option">
                            <label for="{{$TKP->id}}e-option">
                                {!! $TKP->jawaban_e !!}
                            </label>
                            <div class="check"></div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection