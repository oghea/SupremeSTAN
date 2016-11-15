@extends('layouts.app')

@section('content')
    @foreach($tryoutQuizList as $tryoutQuiz)
            <div class="col-xs-12" style="border: solid;margin:auto;display:block;position:relative;">
                <div class="col-xs-12 text-center text-uppercase">
                    <h1>TRYOUT HARIAN</h1>
                </div>
                <div class="col-xs-12 text-center text-uppercase">
                    <h2>{{$tryoutQuiz->publish_date}}</h2>
                </div>
                <div class="col-xs-12 text-center text-uppercase">
                    <h2>{{$tryoutQuiz->judul}}</h2>
                </div>
                <div class="col-xs-12 text-center text-uppercase">
                    <h2>{{$tryoutQuiz->durasi}} Menit</h2>
                </div>
                <div class="col-xs-12 text-center text-uppercase">
                    <a class="btn btn-primary" href="{{ route('tryoutUser.doQuiz',$tryoutQuiz->id) }}">Kerjakan</a>
                </div>
            </div>
    @endforeach
    {!! $tryoutQuizList->render() !!}
@endsection