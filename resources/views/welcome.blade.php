<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SupremeSTAN</title>
    <!--Kita ngetes harusnya bisa -->

    <!-- Bootstrap Core CSS -->

    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|PT+Sans|" rel="stylesheet">

    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="vendors/font-awesome/css/font-awesome.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="vendors/animate.css/animate.css">

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top respon" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> -->
            <a class="page-scroll" href="#page-top"><img  src="images/supwhite.png" style="height:45px;width:145px;"></a>
            <!-- <a class="navbar-brand page-scroll" href="#page-top"></a> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav nav-left">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">PKN STAN</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">WHY US</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">PROGRAM</a>
                </li>
                <li>
                    <a class="page-scroll" href="#team">SUPREME TUTORS</a>
                </li>
                <li>
                    <a class="page-scroll" href="#where">CONTACT US</a>
                </li>
            </ul>
            <ul class="nav navbar-nav nav-right">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="login-nav">
                    <a class="page-scroll " href="{{ url('/') }}">LOGIN</a>
                </li>
                <li class="signup-nav">
                    <a class="page-scroll " href="{{ url('/register') }}">SIGN UP</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<nav class="navbar navbar-default navbar-fixed-top mobile" role="navigation">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="page-scroll" href="#page-top"><img id="logo-brand" src="images/supwhite.png" style="height:45px;width:145px;"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav nav-left">
                <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                <li class="hidden">
                    <a class="page-scroll" href="#page-top"></a>
                </li>
                <li>
                    <a class="page-scroll" href="#about">PKN STAN</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">WHY US</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">PROGRAM</a>
                </li>
                <li>
                    <a class="page-scroll" href="#team">SUPREME TUTORS</a>
                </li>
                <li>
                    <a class="page-scroll" href="#where">CONTACT US</a>
                </li>
                <li >
                    <a class="page-scroll" href="{{ url('/') }}">LOGIN</a>
                </li>
                <li >
                    <a class="page-scroll" href="{{ url('/register') }}">SIGN UP</a>
                </li>
            </ul>

        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Intro Section -->
<section id="intro" class="intro-section">
    <div class="container mid-dv">
        <div class="row">
            <div class="col-md-12 papah">
                <h1 class="super">THE BEST WAY TO <br><span class="super-color">GO IN PKN STAN</span></h1>
            </div>
            <div class="col-md-12">
                <h4 style="color:#ffffff;">Help to maximize all your potential in learning.</h4>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 judul-sec">
                <h3>PKN STAN</h3>
                <h1>-Sekolah Tinggi Akuntasi Negara-</h1>
            </div>
            <div class="col-md-12">
                <div class="col-md-5" style="margin-bottom: 30px;">
                    <img class="icon-jur" src="images/icon/account.png" data-toggle="modal" data-target="#myModal">
                    <h4><strong>Akuntasi</strong></h4>
                    <h4>Alumni jurusan akuntansi dapat ditempatkan di berbagai instansi pemerintahan di bawah Kementrian Keuangan, seperti Badan Keuangan Fiskal (BKF), Direktorat Jenderal Bea dan Cukai (DJBC), Direktorat Jenderal Pajak (DJP), serta lainnya.</h4>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Akuntasi</h4>
                            </div>
                            <div class="modal-body">
                                terdiri atas program:<br>
                                - DIII Akuntansi <br>
                                - DIV Akuntansi <br>
                                Alumni jurusan akuntansi dapat ditempatkan di berbagai instansi pemerintahan di bawah Kementrian Keuangan, seperti <strong> Badan Keuangan Fiskal (BKF), Direktorat Jenderal Bea dan Cukai (DJBC), Direktorat Jenderal Pajak (DJP), Badan Pemeriksa Keuangan (BPK), Kementrian Perhubungan</strong>, dan instansi pemerintahan lainnya.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-2" style="margin-bottom: 30px;">
                    <img class="icon-jur" src="images/icon/TAX.png" data-toggle="modal" data-target="#myModal1">
                    <h4><strong>Pajak</strong></h4>
                    <h4>Para alumnus Pajak kemungkinan besar akan ditempatkan di Direktorat Jenderal Pajak. Namun tidak menutup kemungkinan penempatan pada Badan Keuangan Fiskal maupun Badan Pendidikan dan Pelatihan Keuangan (BPPK).</h4>
                </div>
                <!-- modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Pajak</h4>
                            </div>
                            <div class="modal-body">
                                - DI Pajak <br>
                                - DIII Pajak <br>
                                - DIII PBB/Penilai <br>
                                Para alumnus Pajak kemungkinan besar akan ditempatkan di <strong> Direktorat Jenderal Pajak (DJP)</strong>. Namun tidak menutup kemungkinan penempatan pada <strong> Badan Keuangan Fiskal maupun Badan Pendidikan dan Pelatihan Keuangan (BPPK)</strong>. Sementara untuk lulusan PBB/Penilai dapat diterima di instansi <strong>Direktorat Jenderal Pajak dan Direktorat Jenderal Kekayaan Negara (DJKN).</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5" style="margin-bottom: 50px;">
                    <img class="icon-jur" src="images/icon/bea.png" data-toggle="modal" data-target="#myModal2">
                    <h4><strong>Kepabean dan Cukai</strong></h4>
                    <h4>Lulusan Kepabeanan dan Cukai akan bekerja di Direktorat Jenderal Bea dan Cukai.</h4>
                </div>
                <!-- modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Kepabeanan dan Cukai</h4>
                            </div>
                            <div class="modal-body">
                                - DI Kepabeanan dan Cukai <br>
                                - DIII Kepabeanan dan Cukai <br>
                                Lulusan Kepabeanan dan Cukai akan bekerja di <strong>Direktorat Jenderal Bea dan Cukai.</strong>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-2" style="margin-bottom: 50px;">
                    <img class="icon-jur" src="images/icon/management keuangan.png" data-toggle="modal" data-target="#myModal3">
                    <h4><strong>Manajemen Keuangan</strong></h4>
                    <h4>Untuk jurusan terakhir, program Kebendaharaan Negara biasanya menempatkan lulusannya di Direktorat Jenderal Perbendaharaan (DJPBN).</h4>
                </div>
                <!-- modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Management Keuangan</h4>
                            </div>
                            <div class="modal-body">
                                - DI Kebendaharaan Negara <br>
                                - DIII Kebendaharaan Negara <br>
                                - DIII Manajemen Aset <br>
                                Untuk jurusan terakhir, program Kebendaharaan Negara biasanya menempatkan lulusannya di <strong>Direktorat Jenderal Perbendaharaan (DJPBN), Direktorat Jenderal Pajak (DJP) </strong>dan Direktorat Jenderal Bea dan Cukai (DJBC). Sedangkan lulusan program Manajemen Aset umumnya ditempatkan di <strong>Direktorat Jendral Kekayaan Negara (DJKN)</strong>, meskipun ada juga yang direkrut <strong>Badan Pendidikan dan Pelatihan Keuangan (BPPK)</strong>.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="services-section">
    <div class="container">
        <div class="row" style="margin-bottom:50px;">
            <div class="col-md-12 judul-sec">
                <h3>WHY US?</h3>
                <h1>Bimbel Supreme</h1>
            </div>
            <div class="col-lg-7 col-md-7 video-pro" style="background-image: url(images/icon/mac.jpg);background-size:80%;padding:none;background-position:center;background-repeat:no-repeat;height:429px;">
                <iframe style="border-radius:5px;padding-top: 20px;padding-bottom: 6px;padding-left: 15px;padding-right: 14px;" width="530" height="310" frameborder="0" src="https://www.youtube.com/embed/YHstbcl6lQI">
                </iframe>
            </div>

            <div class="col-md-5 col-xs-12" style="margin-top:50px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img class="icon-jur" src="images/icon-14.png" style="margin: 0 auto;">
                            <div class="caption-slider">
                                <h3>Exclusive</h3>
                                <h4>Bimbingan belajar USM STAN supreme hanya menerima 50 siswa untuk bergabung. dengan sistem penerimaan siswa yang sedikit berbeda, kami menawarkan suasan pembelajaran yang tak bisa sembarang ditemui.</h4>
                            </div>
                        </div>

                        <div class="item ">
                            <img class="icon-jur" src="images/icon-14.png" style="margin: 0 auto;">
                            <div class="caption-slider">
                                <h3>Comfortable</h3>
                                <h4>Tanpa melupakan progresivitas dalam proses pembelajaran, kami menjamin kenyamanan yang akan terjalin dilingkungan Bimbingan Belajar supreme. Baik maupun siswa dan tentor, maupun baik pihak supreme dan orang tua siswa.</h4>
                            </div>
                        </div>

                        <div class="item ">
                            <img class="icon-jur" src="images/icon-14.png" style="margin: 0 auto;">
                            <div class="caption-slider">
                                <h3>Guarantee</h3>
                                <h4>Sebagai jaminan untuk siswa supreme yang belum berhasil lolos Ujian Saringan masuk PKN STAN, kami memberikan kesempatan bagi siswa yang bersangkutan untuk kembali bergabung bersama supreme ditahun berikutnya.</h4>
                            </div>
                        </div>
                    </div>


                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
</section>

<!-- Price Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row" style="margin-bottom:50px;">
            <div class="col-md-12 judul-sec" >
                <h3 style="color"><strong>PROGRAM</strong></h3>
                <h1 style="color:#44c7f4;">Payment Accounts</h1>
            </div>
            <div class="col-md-6 col-md-offset-3 " style="color:#ffffff;">
                <h3 ><strong>FREE MEMBER TRYOUT</strong></h3>
                <p>Get instant access to try this supreme tryout with pro tutor.</p>
                <div class="col-md-12">
                    <a type="button" class="btn btn-warning" href="{{url('/register')}}">More Info!</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team" class="team-section">
    <div class="container">
        <div class="row" style="margin-bottom:50px;">
            <div class="col-md-12 judul-sec">
                <h3>TUTORS</h3>
                <h1>Supreme Tutors</h1>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="images/team1.jpg" alt="">
                    <div class="overlay">
                        <h2>Andi Setyo Wicaksono<br>D3-Akuntasi 2014</h2>
                        <p class="set1">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </p>
                        <hr>
                        <hr>
                        <p class="set2">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="images/team1.jpg" alt="">
                    <div class="overlay">
                        <h2>Gandes Palupi<br>D3-Kebendaharaan 2014</h2>
                        <p class="set1">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </p>
                        <hr>
                        <hr>
                        <p class="set2">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="hovereffect">
                    <img class="img-responsive" src="images/team1.jpg" alt="">
                    <div class="overlay">
                        <h2>Zufar Lutfi Wisanggeni<br>D3-Pajak 2014</h2>
                        <p class="set1">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </p>
                        <hr>
                        <hr>
                        <p class="set2">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-google"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="where" class="where-section">
    <div class="container">
        <div class="row" style="margin-bottom:50px;">
            <div class="col-md-12 judul-sec">
                <h3>CONTACT US</h3>
                <h1>Connect socially with us</h1>
            </div>
            <div class="col-md-3">
                    <a href="http://facebook.com/groups/163484537384503"><span  class="fa-stack fa-lg fa-3x">
                        <i class="fa fa-square fa-stack-3x" style="color:black;"></i>
                        <i class="fa fa-square fa-stack-2x kotak" style="color:white;"></i>
                        <i class="fa fa-facebook fa-stack-1x sos-med-color"></i>
                    </span></a>
                <h3 style="color:#ffffff;">LIKE US ON FACEBOOK</h3>
            </div>
            <div class="col-md-3">
                    <a href="http://youtube.com"><span class="fa-stack fa-lg fa-3x">
                        <i class="fa fa-square fa-stack-3x" style="color:black;"></i>
                        <i class="fa fa-square fa-stack-2x kotak" style="color:white;"></i>
                        <i class="fa fa-youtube fa-stack-1x sos-med-color"></i>
                    </span></a>
                <h3 style="color:#ffffff;">WATCH ON YOUTUBE</h3>
            </div>
            <div class="col-md-3">
                    <a href="http://instagram.com/bimbelsupreme"><span class="fa-stack fa-lg fa-3x">
                        <i class="fa fa-square fa-stack-3x" style="color:black;"></i>
                        <i class="fa fa-square fa-stack-2x kotak" style="color:white;"></i>
                        <i class="fa fa-instagram fa-stack-1x sos-med-color"></i>
                    </span></a>
                <h3 style="color:#ffffff;">FOLLOW US ON INSTAGRAM</h3>
            </div>
            <div class="col-md-3">
                    <a href="mailto:bimbelsupreme@gmail.com?Subject=Hello%20again"><span class="fa-stack fa-lg fa-3x">
                        <i class="fa fa-square fa-stack-3x" style="color:black;"></i>
                        <i class="fa fa-square fa-stack-2x kotak" style="color:white;"></i>
                        <i class="fa fa-google fa-stack-1x sos-med-color"></i>
                    </span></a>
                <h3 style="color:#ffffff;">ASK US ON EMAIL</h3>
            </div>
        </div>
    </div>
</section>

<!-- CopyRight Section -->
<section id="copyright" class="copyright-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="color:#ffffff;">
                <h5>&copy; SUPREME - DESIGN & WEBSITE BY PAPAH CREATIVE</h5>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Scrolling Nav JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>

<script>
    $(document).ready(function(){
        $('.icon-jur').each(function() {
            animationHover(this, 'pulse');
        });
    });

    function animationHover(element, animation){
        element = $(element);
        element.hover(
                function() {
                    element.addClass('animated ' + animation);
                },
                function(){
                    //wait for animation to finish before removing classes
                    window.setTimeout( function(){
                        element.removeClass('animated ' + animation);
                    }, 2000);
                });
    }
</script>
</body>

</html>
