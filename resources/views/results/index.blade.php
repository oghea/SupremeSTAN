@extends('layouts.app')

@section('content')
    <div class="container" style="background-color:#ffffff;">
        {{-- Results-Title --}}
            <div class="col-xs-12 text-center" style="padding-bottom:30px;">
                <h1>
                    Hasil TRYOUT!
                </h1>
            </div>
        {{-- END-Results-Title --}}
        <!-- start accordion -->
            <div class="col-xs-12 accordion" id="accordion" role="tablist" aria-multiselectable="true" style="background-color:#ffffff;">
              <div class="panel">
                <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <h4 class="panel-title">
                    <i class="fa fa-bars" aria-hidden="true"></i> Tryout I
                  </h4>
                </a>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                  <div class="panel-body">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: left;letter-spacing:5px;">
                        <h3>TANGGAL TRYOUT : 19/11/2016</h3>
                        <h3>NILAI : 80</h3>
                        <h3>WAKTU : 80 MENIT</h3>
                    </div>
                    <div class="col-xs-12 col-sm-5 text-center" style="border:solid;padding:10px;margin-bottom:10px;">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>TPA</strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th><i class="fa fa-check" aria-hidden="true"></i> Benar</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-close" aria-hidden="true"></i> Salah</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-circle-o" aria-hidden="true"></i> Kosong</th>
                                        <th>10</th>
                                    </tr>
                                </tbody>
                        </table>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>TBI</strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th><i class="fa fa-check" aria-hidden="true"></i> Benar</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-close" aria-hidden="true"></i> Salah</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-circle-o" aria-hidden="true"></i> Kosong</th>
                                        <th>10</th>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-sm-offset-1 text-center" style="border:solid;padding:10px;">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>Evaluasi: </strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente ipsam modi est officiis quidem, placeat hic corporis, at repellendus accusantium architecto qui aliquid amet. Eos ad assumenda earum quos. Commodi?</th>
                                    </tr>
                                </tbody>
                        </table>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>Pembahasan :</strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th>Baca pembahasan onlinenya : <a href="">Judul Tryout</a></th>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel">
                <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h4 class="panel-title">
                    <i class="fa fa-bars" aria-hidden="true"></i> Tryout II
                  </h4>
                </a>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                      <div class="panel-body">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: left;letter-spacing:5px;">
                            <h3>TANGGAL TRYOUT : 19/11/2016</h3>
                            <h3>NILAI : 80</h3>
                            <h3>WAKTU : 80 MENIT</h3>
                        </div>
                        <div class="col-xs-12 col-sm-5 text-center" style="border:solid;padding:10px;margin-bottom:10px;">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>TPA</strong></span>
                            </div>
                            <table> 
                                    {{-- <thead> 
                                        <tr>    
                                            <th>Keterangan</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead> --}}
                                    <tbody> 
                                        <tr>    
                                            <th><i class="fa fa-check" aria-hidden="true"></i> Benar</th>
                                            <th>10</th>
                                        </tr>
                                        <tr>    
                                            <th><i class="fa fa-close" aria-hidden="true"></i> Salah</th>
                                            <th>10</th>
                                        </tr>
                                        <tr>    
                                            <th><i class="fa fa-circle-o" aria-hidden="true"></i> Kosong</th>
                                            <th>10</th>
                                        </tr>
                                    </tbody>
                            </table>
                            
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                              <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>TBI</strong></span>
                            </div>
                            <table> 
                                    {{-- <thead> 
                                        <tr>    
                                            <th>Keterangan</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead> --}}
                                    <tbody> 
                                        <tr>    
                                            <th><i class="fa fa-check" aria-hidden="true"></i> Benar</th>
                                            <th>10</th>
                                        </tr>
                                        <tr>    
                                            <th><i class="fa fa-close" aria-hidden="true"></i> Salah</th>
                                            <th>10</th>
                                        </tr>
                                        <tr>    
                                            <th><i class="fa fa-circle-o" aria-hidden="true"></i> Kosong</th>
                                            <th>10</th>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-sm-offset-1 text-center" style="border:solid;padding:10px;">
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                                <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>Evaluasi: </strong></span>
                            </div>
                            <table> 
                                    {{-- <thead> 
                                        <tr>    
                                            <th>Keterangan</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead> --}}
                                    <tbody> 
                                        <tr>    
                                            <th>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente ipsam modi est officiis quidem, placeat hic corporis, at repellendus accusantium architecto qui aliquid amet. Eos ad assumenda earum quos. Commodi?</th>
                                        </tr>
                                    </tbody>
                            </table>
                            
                            <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                              <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>Pembahasan :</strong></span>
                            </div>
                            <table> 
                                    {{-- <thead> 
                                        <tr>    
                                            <th>Keterangan</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead> --}}
                                    <tbody> 
                                        <tr>    
                                            <th>Baca pembahasan onlinenya : <a href="">Judul Tryout</a></th>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                      </div>
                </div>
              </div>
              <div class="panel">
                <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  <h4 class="panel-title">
                    <i class="fa fa-bars" aria-hidden="true"></i> Tryout III
                  </h4>
                </a>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: left;letter-spacing:5px;">
                        <h3>TANGGAL TRYOUT : 19/11/2016</h3>
                        <h3>NILAI : 80</h3>
                        <h3>WAKTU : 80 MENIT</h3>
                    </div>
                    <div class="col-xs-12 col-sm-5 text-center" style="border:solid;padding:10px;margin-bottom:10px;">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>TPA</strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th><i class="fa fa-check" aria-hidden="true"></i> Benar</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-close" aria-hidden="true"></i> Salah</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-circle-o" aria-hidden="true"></i> Kosong</th>
                                        <th>10</th>
                                    </tr>
                                </tbody>
                        </table>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>TBI</strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th><i class="fa fa-check" aria-hidden="true"></i> Benar</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-close" aria-hidden="true"></i> Salah</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>    
                                        <th><i class="fa fa-circle-o" aria-hidden="true"></i> Kosong</th>
                                        <th>10</th>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-sm-offset-1 text-center" style="border:solid;padding:10px;">
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                            <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>Evaluasi: </strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente ipsam modi est officiis quidem, placeat hic corporis, at repellendus accusantium architecto qui aliquid amet. Eos ad assumenda earum quos. Commodi?</th>
                                    </tr>
                                </tbody>
                        </table>
                        
                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align:left;">
                          <i class="fa fa-hand-o-right" aria-hidden="true"></i> <span style="font-weight:600;letter-spacing: 5px;"><strong>Pembahasan :</strong></span>
                        </div>
                        <table> 
                                {{-- <thead> 
                                    <tr>    
                                        <th>Keterangan</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead> --}}
                                <tbody> 
                                    <tr>    
                                        <th>Baca pembahasan onlinenya : <a href="">Judul Tryout</a></th>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!-- end of accordion -->
    @foreach($to as $key => $ot)
        <div class="row">
            <div class="col-md-1"> {{$toid[$key]}} </div>
            <div class="col-md-3"> {{$ot}} </div>
            <div class="col-md-2"> {{$skor[$key]}} </div>
            <div class="col-md-3"> {{$ket[$key]}} </div>
            <div class="col-md-3"> <a class="btn btn-primary" href="{{ route('result.pembahasan',$toid[$key]) }}">Pembahasan</a></div>
        </div>
    @endforeach
    </div>
@endsection