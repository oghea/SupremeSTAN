@extends('layouts.app')

@section('content')
    <div class="col-xs-12 text-center"><h1>TRYOUT HARIAN</h1></div>
    <div class="col-xs-12 text-center"><h2>Nama Tryout</h2></div>
    <div class="col-xs-12 text-center"><h2>Waktu Tryout</h2></div>
    <div class="col-xs-12 text-center"><a class="btn btn-primary" href="{{ route('tryoutUser.doTKD',$tryoutTKD->id) }}">Kerjakan</a></div>
    {!! $tryoutTKDList->render() !!}
@endsection