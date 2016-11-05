
@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Account Management</h2>
                {!!Form::open(['route' => 'account.download' , 'role' => 'form','files' => true,'method'=>'POST'])!!}
                    {!! Form::select('role', ['7' => 'Bimbel Premium', '8' => 'Bimbel Online', '9' => 'Bimbel Tryout', '10' => 'Free User']) !!}
                    <input type="submit" class="btn btn-success" value="Download Excel">
                {!! Form::close() !!}
                {{--<a href="{{ URL::to('admin/account/download') }}"><button class="btn btn-success">Download Excel</button></a>--}}
            </div>
        </div>
    </div>
    @include('modals.delete')
    @include('modals.banned')
    <table class="table table-striped table-hover">
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
                <td class="row">
                    <div class="col-md-4">
                        <a href="{{ route('account.show',$userlist->id) }}" class="btn btn-info">Show</a>
                    </div>
                    <div class="col-md-4" data-form="deleteModal">
                        {!! Form::model('delete', ['method' => 'delete', 'route' => ['account.delete', $userlist->id], 'class' =>'form-delete']) !!}
                        {!! Form::submit(trans('delete'), ['class' => 'btn btn-danger delete', 'name' => 'delete_modal']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-4" data-form="bannedModal">
                        {!! Form::model('banned', ['method' => 'post', 'route' => ['account.banned', $userlist->id], 'class' =>'form-banned']) !!}
                        {!! Form::submit(trans('banned'), ['class' => 'btn btn-warning banned', 'name' => 'banned_modal']) !!}
                        {!! Form::close() !!}
                    </div>
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