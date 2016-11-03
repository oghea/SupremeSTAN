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
                    {!! Form::open(array('route' => 'tryout.storeTKD','method'=>'POST')) !!}
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
                            <div class="form-group {{ $errors->has('bundleTIU') ? ' has-error' : '' }}">
                                <strong>Bundle TIU:</strong>
                                <br/>
                                @if ($errors->has('bundleTIU'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bundleTIU') }}</strong>
                                    </span>
                                @endif
                                @foreach($bundleTIU as $value)
                                    <label>{{ Form::radio('bundleTIU[]', $value->id, false, array('class' => 'tiu')) }}
                                        {{ $value->judul }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group {{ $errors->has('bundleTWK') ? ' has-error' : '' }}">
                                <strong>Bundle TWK:</strong>
                                <br/>
                                @if ($errors->has('bundleTWK'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bundleTWK') }}</strong>
                                    </span>
                                @endif
                                @foreach($bundleTWK as $value)
                                    <label>{{ Form::radio('bundleTWK[]', $value->id, false, array('class' => 'twk')) }}
                                        {{ $value->judul }}</label>
                                    <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group {{ $errors->has('bundleTKP') ? ' has-error' : '' }}">
                                <strong>Bundle TKP:</strong>
                                <br/>
                                @if ($errors->has('bundleTKP'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bundleTKP') }}</strong>
                                    </span>
                                @endif
                                @foreach($bundleTKP as $value)
                                    <label>{{ Form::radio('bundleTKP[]', $value->id, false, array('class' => 'tkp')) }}
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