@extends('layouts.app')

@section('content')
    {{$jatah_USM}}
    @if($jatah_USM == 0)
        <a href="{{ route('tryoutUser.notAuthorize') }}" class="btn btn-success">Tryout USM</a>
    @else
        <a href="{{ route('tryoutUser.listUSM') }}" class="btn btn-success">Tryout USM</a>
    @endif
    {{$jatah_TKD}}
    @if($jatah_TKD == 0)
        <a href="{{ route('tryoutUser.notAuthorize') }}" class="btn btn-success">Tryout USM</a>
    @else
        <a href="{{ route('tryoutUser.listTKD') }}" class="btn btn-success">Tryout TKD</a>
    @endif
    {{$jatah_Quiz}}

@endsection