@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Publish Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($tryoutTKDList as $tryoutTKD)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$tryoutTKD->judul}}</td>
                <td>{{$tryoutTKD->publish_date}}</td>
                <td><a class="btn btn-primary" href="{{ route('tryoutUser.doTKD',$tryoutTKD->id) }}">Kerjakan</a></td>
            </tr>
        @endforeach
    </table>
    {!! $tryoutTKDList->render() !!}
@endsection