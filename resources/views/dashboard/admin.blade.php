@extends('layouts.app')

@section('content')
    <div class="page-title">
        <div class="col-md-12">
            <h3>
                Manage Tryouts
                <small>Upload soal, pilihan, kunci, pembahasan, publish tryouts</small>
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 ">
            <div class="col-md-12 profile-content">
                <div class="x_title">
                    <h2>Manage Tryout</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                        <div class="row">
                            <div class="col-md-1">

                                No

                            </div>
                            <div class="col-md-4">

                                Judul

                            </div>
                            <div class="col-md-3">

                                Jenis

                            </div>
                            <div class="col-md-2">

                                Status

                            </div>
                            <div class="col-md-2">

                                Manage

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-1">

                                1

                            </div>
                            <div class="col-md-4">

                                Tryout 1

                            </div>
                            <div class="col-md-3">

                                USM

                            </div>
                            <div class="col-md-2">

                                Not Publish

                            </div>
                            <div class="col-md-2">

                                <button type="submit" class="btn btn-success">Publish</button>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-1">

                                2

                            </div>
                            <div class="col-md-4">

                                Tryout 2

                            </div>
                            <div class="col-md-3">

                                TKD

                            </div>
                            <div class="col-md-2">

                                Publish

                            </div>
                            <div class="col-md-2">

                                <button type="submit" class="btn btn-success">Publish</button>

                            </div>
                        </div>
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">Create Tryout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection