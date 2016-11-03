@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="col-md-12">
            <h3>
                Create Tryout
                <small>Pilih Bundle</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 ">
            <div class="col-md-12 profile-content">
                <div class="x_title">
                    <h2>Create Tryout</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! Form::open(array('route' => 'tryout.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
                                <strong>Name:</strong>
                                {!! Form::text('judul', null, array('placeholder' => 'Judul','class' => 'form-control')) !!}
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group {{ $errors->has('bundleTPA') ? ' has-error' : '' }}">
                                <strong>Bundle TPA:</strong>
                                <br/>
                                @if ($errors->has('bundleTPA'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bundleTPA') }}</strong>
                                    </span>
                                @endif
                                @foreach($bundleTPA as $value)
                                    <label>{{ Form::radio('bundleTPA[]', $value->id, false, array('class' => 'usm')) }}
                                        {{ $value->judul }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group {{ $errors->has('bundleTBI') ? ' has-error' : '' }}">
                                <strong>Bundle TBI:</strong>
                                <br/>
                                @if ($errors->has('bundleTBI'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bundleTBI') }}</strong>
                                    </span>
                                @endif
                                @foreach($bundleTBI as $value)
                                    <label>{{ Form::radio('bundleTBI[]', $value->id, false, array('class' => 'tbi')) }}
                                        {{ $value->judul }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection