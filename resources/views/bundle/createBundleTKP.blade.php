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
                    <h2>Step Upload TKP</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Smart Wizard -->
                    {!!Form::open(['action' => 'ManageBundleController@storeBundleTKP' ,'class' => 'form-horizontal form-label-left'])!!}
                    {!! Form::text('judul',null,array('class'=>'form-control' , 'placeholder' => 'Judul Bundle' , 'id'=>'judul')) !!}
                    <table class="table table-bordered table-hover">
                        <div class="row">
                            <div class="col-md-1">

                                TPA

                            </div>
                            <div class="col-md-6">

                                Nama KD

                            </div>
                            <div class="col-md-5">

                                Jumlah

                            </div>
                        </div>
                        <hr>
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
                    <div class="col-md-12">
                        <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                        <a id='delete_row' class="pull-left btn btn-danger">Delete Row</a>
                    </div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection