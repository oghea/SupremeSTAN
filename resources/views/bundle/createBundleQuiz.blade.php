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
                    <h2>Step Upload Quiz Harian</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Smart Wizard -->
                    <p>ikutin step-stepnya bro,jangan lompat ntar jatoh</p>
                    {!!Form::open(['action' => 'ManageBundleController@storeBundleQuiz' ,'class' => 'form-horizontal form-label-left'])!!}
                    <div id="wizard" class="form_wizard wizard_horizontal">
                        <ul class="wizard_steps">
                            <li>
                                <a href="#step-1">
                                    <span class="step_no">1</span>
                                    <span class="step_descr">
                              Step 1<br />
                              <small>Step 1 description</small>
                            </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="step_no">2</span>
                                    <span class="step_descr">
                              Step 2<br />
                              <small>Step 2 description</small>
                            </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <span class="step_no">3</span>
                                    <span class="step_descr">
                              Step 3<br />
                              <small>Step 3 description</small>
                            </span>
                                </a>
                            </li>
                        </ul>
                            <div id="step-1">
                                {{--<form class="form-horizontal form-label-left">--}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Judul Bundle</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            {!! Form::text('judul',null,array('class'=>'form-control' , 'placeholder' => 'Judul Bundle' , 'id'=>'judul')) !!}
                                            {{--<input type="text" class="form-control" placeholder="Judul Bundle">--}}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" class="form-control" readonly="readonly" placeholder="Quiz">
                                        </div>
                                    </div>
                                {{--</form>--}}
                            </div>
                            <div id="step-2">
                                {{--<form class="form-horizontal form-label-left">--}}
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Waktu</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            {!! Form::text('durasi',null,array('class'=>'form-control' , 'placeholder' => 'waktu dalam menit' , 'id'=>'durasi')) !!}
                                            {{--<input type="text" class="form-control" placeholder="Waktu">--}}
                                        </div>
                                    </div>
                                {{--</form>--}}
                            </div>
                            <div id="step-3">
                            <div class="col-md-12" style="min-height:200px;">
                                <table class="table table-bordered table-hover">
                                    <div class="row">
                                        <div class="col-md-1">

                                            Quiz

                                        </div>
                                        <div class="col-md-5">

                                            Jumlah Soal

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Form::text('jumlah',null,array('class'=>'form-control' , 'placeholder' => 'Jumlah Soal Mininmal 5' , 'id'=>'jumlah')) !!}
                                            {{--<input type="text" class="form-control" placeholder="Waktu">--}}
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- End SmartWizard Content -->
            </div>
        </div>
    </div>
@endsection