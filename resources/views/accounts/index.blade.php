
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Account Management</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($user_list as $key => $userlist)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $userlist->name }}</td>
                <td>{{ $userlist->email }}</td>
                @foreach($userlist->roles as $role)
                    <td>{{ $role->display_name }}</td>
                @endforeach
                <td>
                    <a class="btn btn-info" href="/">Show</a>
                    {{--{{ route('account.show',$userlist->id) }}--}}
                    {{--@permission('role-edit')--}}
                    {{--<a class="btn btn-primary" href="{{ route('roles.edit',$userlist->id) }}">Edit</a>--}}
                    {{--@endpermission--}}
                    {{--@permission('role-delete')--}}
                    {{--{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $userlist->id],'style'=>'display:inline']) !!}--}}
                    {{--{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                    {{--{!! Form::close() !!}--}}
                    {{--@endpermission--}}
                </td>
            </tr>
        @endforeach
    </table>
    {!! $user_list->render() !!}
@endsection