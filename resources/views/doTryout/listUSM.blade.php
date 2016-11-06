@extends('layouts.app')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Publish Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($tryoutUSMList as $tryoutUSM)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$tryoutUSM->judul}}</td>
                <td>{{$tryoutUSM->publish_date}}</td>
                <td><a class="btn btn-primary" href="{{ route('tryout.doUSM',$tryoutUSM->id) }}">Kerjakan</a></td>
            </tr>
        @endforeach
    </table>
    {!! $tryoutUSMList->render() !!}
@endsection