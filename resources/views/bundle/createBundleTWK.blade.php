@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Upload Soal</h3>
        </div>
    </div>
    <div class="clearfix">

    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Step Upload TWK</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Smart Wizard -->
                    {!!Form::open(['action' => 'ManageBundleController@storeBundleTWK' ,'class' => 'form-horizontal form-label-left'])!!}
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            {!! Form::text('judul',null,array('class'=>'form-control' , 'placeholder' => 'Judul Bundle' , 'id'=>'judul')) !!}
                        </div>
                        <div class="form-group">
                            <label>Judul BAB</label>
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered table-hover">
                                <div class="row">
                                    <div class="col-md-1">

                                                    TWK

                                                </div>
                                    <div class="col-md-6">

                                                    Nama KD

                                                </div>
                                    <div class="col-md-5">

                                                    Jumlah

                                                </div>
                                </div>
                                <div id="tab_logic">
                                    <div class="row" id="kd[0]">
                                                    <div class="col-md-1">

                                                        1

                                                    </div>
                                                    <div class="col-md-6">

                                                        <input type="text" name='kd[0][nama]' id="namaKD0" placeholder='Nama KD' class="form-control"/>

                                                    </div>
                                                    <div class="col-md-5">

                                                        <input type="text" name='kd[0][jumlah]' id="jumlahKD0" placeholder='Jumlah Soal' class="form-control"/>

                                                    </div>
                                                </div>
                                </div>
                            </table>
                        </div>
                        <div class="col-md-12">
                            <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                            <a id='delete_row' class="btn btn-danger">Delete Row</a>
                        </div>
                        {!! Form::submit('Submit', ['class' => 'pull-right btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection