@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($to as $key => $ot)
        <div class="row">
            <div class="col-md-1"> {{$toid[$key]}} </div>
            <div class="col-md-3"> {{$ot}} </div>
            <div class="col-md-2"> {{$skor[$key]}} </div>
            <div class="col-md-3"> {{$ket[$key]}} </div>
            <div class="col-md-3"> <a class="btn btn-primary" href="{{ route('result.pembahasan',$toid[$key]) }}">Pembahasan</a></div>
        </div>
    @endforeach
    </div>
@endsection