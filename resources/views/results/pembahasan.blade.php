@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($soals as $key => $soal)
            <div class="jumbotron">
                {!! $soal->kdUsm->nama !!}
            </div>
            <div class="row">
                {!! $soal->isi_soal !!}
                {!! $jwbdia[$key] !!}
                {!! $soal->jawaban_a !!}
                {!! $soal->jawaban_b !!}
                {!! $soal->jawaban_c  !!}
                {!! $soal->jawaban_d !!}
                {!! $soal->kunciUsm->jawaban_benar !!}
                {!! $soal->pembahasanUsm->description !!}
            </div>
        @endforeach
        {!! $soals->render() !!}
    </div>
@endsection