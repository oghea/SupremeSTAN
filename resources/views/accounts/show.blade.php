@extends('layouts.app')

@section('content')
    {{$user_profile->name}}
    {{$user_profile->email}}
    {{$user_profile->user_profile->first_name}}
@endsection