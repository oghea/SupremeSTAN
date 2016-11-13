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
                <td>
                    @if($verification != NULL)
                        @if($verification->tryoutUSM_id == $tryoutUSM->id)
                            <a class="btn btn-primary disabled" href="{{ route('tryoutUser.doTPA',$tryoutUSM->id) }}">Kerjakan</a>
                        @else
                            <a class="btn btn-primary" href="{{ route('tryoutUser.doTPA',$tryoutUSM->id) }}">Kerjakan</a>
                        @endif
                    @else
                        <a class="btn btn-primary" href="{{ route('tryoutUser.doTPA',$tryoutUSM->id) }}">Kerjakan</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    {!! $tryoutUSMList->render() !!}
@endsection