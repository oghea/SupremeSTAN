@extends('layouts.app')

@section('content')
    {{$jatah_USM}}
    <a href="{{ route('tryout.listUSM') }}" class="btn btn-success">Tryout USM</a>
    {{$jatah_TKD}}
    <a href="{{ route('tryout.listTKD') }}" class="btn btn-success">Tryout TKD</a>
    {{$jatah_Quiz}}

@endsection