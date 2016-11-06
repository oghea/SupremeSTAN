@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Account has been Banned</div>

                    <div class="panel-body">
                        Please contact administrator for inquiry
                        <a href="{{ route('logout') }}" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
