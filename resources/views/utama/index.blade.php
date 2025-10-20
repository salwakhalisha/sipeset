
<!DOCTYPE html>
<!--
	 by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="en">
<head>
<!-- Meta Data -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sipeset</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Stlylesheet -->
<link rel="stylesheet" href="{{asset('dust/bootstrap/css/bootstrap.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('dust/css/font-awesome/css/font-awesome.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('dust/css/style.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('dust/css/no-ui-slider/jquery.nouislider.css')}}" type="text/css" />

<!-- Skin Color -->
<link rel="stylesheet" href="{{asset('dust/css/colors/green.css')}}" id="color-skins"/>

<link rel="shortcut icon" href="{{asset('dust/assets/img/icontower.png')}}"/>

@livewireStyles

</head>
<body>

<!-- Start Preloader -->
<!-- <div id="loader">
   <div class="spinner">
      <div class="cube cube0"></div>
      <div class="cube cube1"></div>
      <div class="cube cube2"></div>
      <div class="cube cube3"></div>
      <div class="cube cube4"></div>
      <div class="cube cube5"></div>
      <div class="cube cube6"></div>
      <div class="cube cube7"></div>
      <div class="cube cube8"></div>
      <div class="cube cube9"></div>
      <div class="cube cube10"></div>
      <div class="cube cube11"></div>
      <div class="cube cube12"></div>
      <div class="cube cube13"></div>
      <div class="cube cube14"></div>
      <div class="cube cube15"></div>
   </div> -->
</div>
<!-- End Preloader -->

<!-- Start Header -->
<header>
   <nav class="navbar navbar-default navbar-alt" role="navigation">
      <div class="container">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand to-top" rel="home" href="#">
               <img src="{{asset('dust/img/assets/logo-white.png')}}" alt="Visual" class="logo-big">
               <img src="{{asset('dust/img/assets/logo-dark.png')}}" alt="Visual" class="logo-small">
            </a>
         </div>

         <!-- Collect the nav links, forms, and other content for toggling -->
         <div class="collapse navbar-collapse" id="main-nav">
            <ul class="nav navbar-nav  navbar-right">
               <li>
                  <a class="to-top">
                     Beranda
                  </a>
               </li>
               <li class="to-section">
                  <a href="#features">
                     Tentang Kami
                  </a>
               </li>

               <li class="to-section">
                  <a href="#data-menara">
                     Data Menara
                  </a>
               </li>
               <li class="to-section">
                  <a href="#penyedia-menara">
                     Penyedia Menara
                  </a>
               </li>

               <li class="to-section">
                  <a href="#team">
                     Tim Kerja
                  </a>
               </li>

               <li class="to-section">
                  <a href="#portfolio">
                     Portfolio
                  </a>
               </li>

               <li class="to-section">
                  <a href="#testimonials">
                     Testimoni
                  </a>
               </li>

               <li class="to-section">
                  <a href="#contact">
                     Hubungi Kami
                  </a>
               </li>
            </ul>
         </div>
         <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
   </nav>
</header>
<!-- End Header -->

<!-- Start Home Revolution Slider Parallax Section -->
<section id="home-revolution-slider">
   <div class="hero">
      <div class="tp-banner-container">
         <div class="tp-banner">
            <ul>
               <!-- SLIDE 1 -->
               <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="{{asset('img/backgrounds/bg.jpg')}}" data-delay="10000" data-saveperformance="on" data-title="Sistem Informasi">
                  <img src="{{asset('dust/img/backgrounds/bg.jpg')}}" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                  <!-- Home Heading -->
                  <div class="tp-caption sft"
                                        data-x="center"
                                        data-y="260"
                                        data-speed="1200"
                                        data-start="1100"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <h5 class="home-heading op-1">Sistem Informasi Pendataan <br>Aset TIK</h5>
                  </div>

                  <!-- Home Subheading -->
                  <div class="tp-caption home-subheading sft "
                                        data-x="center"
                                        data-y="360"
                                        data-speed="1200"
                                        data-start="1350"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <!-- <div class="op-1">Beautiful & Elegant One page Parallax Template</div> -->
                  </div>

                  <!-- Home Button -->
                  <div class="tp-caption home-button sft fadeout"
                                        data-x="center"
                                        data-y="400"
                                        data-speed="1200"
                                        data-start="1550"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <div class="op-1">
                        <a href="#features" class="btn btn-primary btn-scroll">
                           Tentang Kami
                        </a>
                     </div>
                  </div>
               </li>

               <!-- SLIDE 2 -->
               <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="{{asset('dust/img/backgrounds/bg-1.jpg')}}" data-delay="10000"  data-saveperformance="on" data-title="Pengawasan">
                  <img src="{{asset('dust/img/backgrounds/bg-1.jpg')}}" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                  <!-- Home Heading -->
                  <div class="tp-caption sft"
                                        data-x="center"
                                        data-y="260"
                                        data-speed="1200"
                                        data-start="1100"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <h2 class="home-heading op-2"></h2>
                  </div>

                  <!-- Home Subheading -->
                  <div class="tp-caption home-subheading sft fadeout"
                                        data-x="center"
                                        data-y="360"
                                        data-speed="1200"
                                        data-start="1350"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <!-- <div class="op-2">Beautiful & Elegant One page Parallax Template</div> -->
                  </div>

                  <!-- Home Button -->
                  <div class="tp-caption home-button sft fadeout"
                                        data-x="center"
                                        data-y="400"
                                        data-speed="1200"
                                        data-start="1550"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <div class="op-2">
                        <a href="#portfolio" class="btn btn-primary btn-scroll">
                           APA YANG KAMI LAKUKAN
                        </a>
                     </div>
                  </div>
               </li>

               <!-- SLIDE 3 -->
               <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-thumb="{{asset('dust/img/backgrounds/bg-2.jpg')}}" data-delay="10000"  data-saveperformance="on" data-title="Tim Pengawas">
                  <img src="{{asset('dust/img/backgrounds/bg-2.jpg')}}" alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                  <!-- Home Heading -->
                  <div class="tp-caption sft"
                                        data-x="center"
                                        data-y="260"
                                        data-speed="1200"
                                        data-start="1100"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <h2 class="home-heading op-3"></h2>
                  </div>

                  <!-- Home Subheading -->
                  <div class="tp-caption home-subheading sft fadeout"
                                        data-x="center"
                                        data-y="360"
                                        data-speed="1200"
                                        data-start="1350"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <!-- <div class="op-3">Beautiful & Elegant One page Parallax Template</div> -->
                  </div>

                  <!-- Home Button -->
                  <div class="tp-caption home-button sft fadeout"
                                        data-x="center"
                                        data-y="400"
                                        data-speed="1200"
                                        data-start="1550"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300"
                                        style="z-index: 4; max-width: auto; max-height: auto; white-space:normal;">
                     <div class="op-3">
                        <a href="#team" class="btn btn-primary btn-scroll">
                           TIM KERJA KAMI
                        </a>
                     </div>
                  </div>
               </li>
            </ul>
            <div class="tp-bannertimer"></div>
         </div>
         <div class="home-bottom">
            <div class="container text-center">
               <div class="move bounce">
                  <a href="#features" class="ion-ios-arrow-down btn-scroll">
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Home Revolution Slider Parallax Section -->

<div class="site-wrapper content">

   <!-- Start Features Section -->
   <section id="features">
      <div class="container">
         <div class="col-md-12 text-center wow fadeInUp">
            <h3 class="section-title">Tentang Kami</h3>
            <p class="subheading">Dinas Komunikasi Informatika dan Persandian Kabupaten Aceh Tamiang <br>secara periodik terus-menerus melakukan <span class="highlight"> pengawasan dan pengendalian </span> <br> Menara Telekomunikasi demi kualitas telematika digital di wilayah Kabupaten Aceh Tamiang</p>
         </div>
         <div class="row features-row wow fadeInUp">
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-info">
                  {{-- <i class="icon-eyeglasses size-2x highlight"></i> --}}
                  {{-- <i class="icon-eyeglasses back-icon"></i> --}}
               </div>
               <div class="feature-info">
                  <h4>Pengawasan</h4>
                  <p class="feature-description">Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang melalui Bidang Teknologi Informatika dan E-government melakukan pengawasan terhadap sarana menara telekomunikasi yang ada pada wilayah Pemerintahan Kabupaten Aceh Tamiang secara periodik setiap tahunnya (semester I dan II) .</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  {{-- <i class="icon-lock-open size-2x highlight"></i> --}}
                  {{-- <i class="icon-lock-open back-icon"></i> --}}
               </div>
               <div class="feature-info">
                  <h4>Pengendalian</h4>
                  <p class="feature-description">Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang melalui Bidang Teknologi Informatika dan E-government juga melakukan pengendalian bersama-sama penyedia menara dan masyarakat untuk menjaga kelancaran operasional menara telekomunikasi yang baik yang dapat memenuhi kebutuhan masyarakat Aceh Tamiang.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  {{-- <i class="icon-energy size-2x highlight"></i> --}}
                  {{-- <i class="icon-energy back-icon"></i> --}}
               </div>
               <div class="feature-info">
                  <h4>Laporan dan Pengaduan</h4>
                  <p class="feature-description">Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang melalui Bidang Teknologi Informatika dan E-government berkewajiban menerima dan selalu membuka pintu terhadap berbagai laporan gangguan menara telekomunikasi yang bersumber dari pihak penyedia menara itu sendiri serta laporan masyarakat sekitar demi terwujudnya layanan komunikasi digital yang memadai dan tidak beresiko.</p>
               </div>
            </div>
         </div>
         <div class="row wow fadeInUp">
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  {{-- <i class="icon-settings size-2x highlight"></i> --}}
                  {{-- <i class="icon-settings back-icon"></i> --}}
               </div>
               <div class="feature-info">
                  <h4>Retribusi</h4>
                  <p class="feature-description">Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang berkewajiban untuk menagihkan sebahagian biaya pengganti (retribusi) terhadap pengawasan dan pelayanan yang telah dilakukan Pemerintah Kabupaten Aceh Tamiang kepada badan hukum (penyedia menara) yang telah menerima layanan pengawasan dan pengendalian.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  {{-- <i class="icon-book-open size-2x highlight"></i> --}}
                  {{-- <i class="icon-book-open back-icon"></i> --}}
               </div>
               <div class="feature-info">
                  <h4>Tim Pengawas dan Pengendali</h4>
                  <p class="feature-description">Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang melalui Bidang Teknologi Informatika dan E-government memiliki tim pengawas dan pengendali menara telekomunikasi yang selalu memonitor, mengevaluasi dan melaporkan menara telekomunikasi di Kab. Aceh Tamiang.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  {{-- <i class="icon-support size-2x highlight"></i> --}}
                  {{-- <i class="icon-support back-icon"></i> --}}
               </div>
               <div class="feature-info">
                  <h4>Menerima Laporan 24 Jam</h4>
                  <p class="feature-description">Masyarakat atau pihak penyedia menara dapat melaporkan keadaan menara telekomunikasi dengan memanfaatkan fasilitas kontak kami pada web ini.</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--End Features Section -->


   <!-- Start Fun Facts Section -->
   <section id="data-menara" class="parallax-section-5">
      <div class="container">
         <div class="col-md-12 text-center white wow fadeInUp">
            <h3 class="section-title">Data Menara</h3>
            <p class="subheading">Jumlah <span class="highlight">Menara</span> yang beroperasional di Kab. Aceh Tamiang.</p>
         </div>
         <div class="counter-row row text-center wow fadeInUp">
            <div class="col-md-3 col-sm-6 fact-container">
               <div class="fact">
                  <span class="counter highlight">#</span>
                  <h4 class="highlight">PT. TELKOMSEL</h4>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 fact-container">
               <div class="fact">
                  <span class="counter highlight">#</span>
                  <h4 class="highlight">PT. PROTELINDO</h4>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 fact-container">
               <div class="fact">
                  <h2 class="counter highlight">#</h2>
                  <h4 class="highlight">PT. MITRATEL</h4>
               </div>
            </div>
            <div class="col-md-3 col-sm-6 fact-container">
               <div class="fact">
                  <span class="counter highlight">#</span>
                  <h4 class="highlight">PT. TBG</h4>
               </div>
            </div>

            <div class="col-md-3 col-sm-6 fact-container">
               <div class="fact">
                  <span class="counter highlight">#</span>
                  <h4 class="highlight">PT. CMI</h4>
               </div>
            </div>

            <div class="col-md-3 col-sm-6 fact-container">
               <div class="fact">
                  <span class="counter highlight">#</span>
                  <h4 class="highlight">PT. STP</h4>
               </div>
            </div>


         </div>
      </div>
   </section>
   <!-- End Fun Facts Section -->
   <br>
   <br>
    <!-- Start Clients Section -->
    <section id="penyedia-menara">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h3 class="section-title wow fadeInUp">Penyedia Menara</h3>
               <p class="subheading wow fadeInUp">Penyedia Menara yang beroperasi di Kabupaten Aceh Tamiang.</p>
            </div>
            <div class="clients">
               <div id="client-slider" class="owl-carousel">
                  <div class="item">
                     <img src="{{asset('dust/img/clients/telkomsel.png')}}" alt="" />
                  </div>
                  <div class="item">
                     <img src="{{asset('dust/img/clients/mitratel.png')}}" alt="" />
                  </div>
                  <div class="item">
                     <img src="{{asset('dust/img/clients/tbg.png')}}" alt="" />
                  </div>
                  <div class="item">
                     <img src="{{asset('dust/img/clients/cmi.png')}}" alt="" />
                  </div>
                  <div class="item">
                     <img src="{{asset('dust/img/clients/protelindo.png')}}" alt="" />
                  </div>
                  <div class="item">
                     <img src="{{asset('dust/img/clients/stp.png')}}" alt="" />
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Clients Section -->

   <!-- Start Team Section -->
   <section id="team">
      <div class="container">
         <div class="col-md-12 text-center wow fadeInUp">
            <h3 class="section-title">TIM PENGAWAS DAN PENGENDALI</h3>
            <p class="subheading">Tim Pengawas dan Pengendali <span class="highlight">Menara Telekomunikasi</span> Pemerintah Kab. Aceh Tamiang</p>
         </div>
         <div class="row">
            <div class="col-md-3 col-sm-3 team-member">
               <div class="effect effects wow fadeInUp">
                  <div class="img">
                     <img src="img/team/team-1.jpg" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-facebook"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-twitter"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class=" icon-envelope-open"></i>
                              </a>
                           </li>
                        </ul>
                        <a class="close-overlay hidden">
                           x
                        </a>
                     </div>
                  </div>
               </div>
               <div class="member-info wow fadeInUp">
                  <h4>Wan Dedi Wahyudi, SE, MM</h4>
                  <h5 class="highlight">Kepala Bidang TIK dan E-Gov</h5>
                  <p>Koordinator Pengawasan dan Pengendali Menara Telekomunikasi </p>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 team-member">
               <div class="effect effects wow fadeInUp">
                  <div class="img">
                     <img src="dust/img/team/team-2.jpg" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-facebook"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-twitter"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class=" icon-envelope-open"></i>
                              </a>
                           </li>
                        </ul>
                        <a class="close-overlay hidden">
                           x
                        </a>
                     </div>
                  </div>
               </div>
               <div class="member-info wow fadeInUp">
                  <h4>Juliandi Siregar, ST</h4>
                  <h5 class="highlight">Kepala Seksi Pengembangan SDM dan Pengawasan Telematika</h5>
                  <p>Anggota</p>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 team-member">
               <div class="effect effects wow fadeInUp">
                  <div class="img">
                     <img src="{{asset('dyst/img/team/team-3.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-facebook"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-twitter"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class=" icon-envelope-open"></i>
                              </a>
                           </li>
                        </ul>
                        <a class="close-overlay hidden">
                           x
                        </a>
                     </div>
                  </div>
               </div>
               <div class="member-info wow fadeInUp">
                  <h4>Aleka Syaputra, SS</h4>
                  <h5 class="highlight">Kepala Seksi E-gov dan Persandian</h5>
                  <p>Anggota</p>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 team-member">
               <div class="effect effects wow fadeInUp">
                  <div class="img">
                     <img src="{{asset('dust/img/team/team-4.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-facebook"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class="icon-social-twitter"></i>
                              </a>
                           </li>
                           <li class="social-icon">
                              <a href="#" onClick="return false;">
                                 <i class=" icon-envelope-open"></i>
                              </a>
                           </li>
                        </ul>
                        <a class="close-overlay hidden">
                           x
                        </a>
                     </div>
                  </div>
               </div>
               <div class="member-info wow fadeInUp">
                  <h4>Revi Rinaldi, ST, M. Ilkom</h4>
                  <h5 class="highlight">Kepala Seksi Infrastruktur dan Teknologi Informatika</h5>
                  <p>Anggota</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Team Section -->

   <!-- Start Quote Section -->
   <!-- <section id="quote" class="parallax-section-6">
      <div class="container">
         <div class="row wow fadeInUp">
            <div class="col-lg-12 wow fadeInUp" style="z-index:3">
               <div id="quote-slider" class="owl-carousel">
                  <div>
                     <blockquote>
                        <i class="icon-left ion-quote ion-2x highlight"></i>
                        <span> Data Adalah New Oil, Bahkan Lebih Berharga dari Minyak (Presiden RI - Jokowi)</span>
                        <i class="icon-right ion-quote ion-2x highlight"></i>
                     </blockquote>
                     <h4 class="quote-author highlight">Visual Team</h4>
                  </div>
                  <div>
                     <blockquote>
                        <i class="icon-left ion-quote ion-2x highlight"></i>
                        <span> Mewujudkan masyarakat dan pemerintahan Digital adalah kewajiban kita bersama (Bupati Kab. Aceh Tamiang - Mursil) </span>
                        <i class="icon-right ion-quote ion-2x highlight"></i>
                     </blockquote>
                     <h4 class="quote-author highlight">Visual Team</h4>
                  </div>
                  <div>
                     <blockquote>
                        <i class="icon-left ion-quote ion-2x highlight"></i>
                        <span> Pengawasan dan Pengendalian Menara Telekomunikasi adalah bentuk layanan kita kepada penyedia menara dan masyarakat Kab. Aceh Tamiang (Kepala Dinas KOMINFOSAN Kab. ACeh Tamiang - Bastian, S.Kom) </span>
                        <i class="icon-right ion-quote ion-2x highlight"></i>
                     </blockquote>
                     <h4 class="quote-author highlight">Visual Team</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section> -->
   <!-- End Quote Section -->

   <!-- Start Portfolio Section -->
   <section id="portfolio" style="position: relative;">
      <div class="separator"></div>
      <div class="container-fluid">
         <div class="col-md-12 text-center">
            <h3 class="section-title wow fadeInUp">Aktivitas Pengawasan dan Pengendalian</h3>
            <p class="subheading wow fadeInUp">Pengawasan dan pengendalian menara telekomunikasi dengan yang dilakukan<span class="highlight">Dinas Komunikasi Informatika dan Persandian</span>.</p>
         </div>
         <div id="filters-container-fullwidth" class="cbp-l-filters-alignCenter wow fadeInUp">
            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
               <div class="cbp-filter-counter"></div>
            </div>
            <!-- <div data-filter=".identity" class="cbp-filter-item">Pengendalian
               <div class="cbp-filter-counter"></div>
            </div>
            <div data-filter=".web-design" class="cbp-filter-item">Koordinasi
               <div class="cbp-filter-counter"></div>
            </div>
            <div data-filter=".graphic" class="cbp-filter-item">Meeting
               <div class="cbp-filter-counter"></div>
            </div> -->

         </div>


         <div id="grid-container-fullwidth" class="cbp-l-grid-fullScreen">
            <ul>
               <li class="cbp-item effect effects identity logo">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/1.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/1.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project1.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Future Trend</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects identity logo">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/2.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="">
                              <a href="{{asset('dust/img/portfolio/fullsize/2.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project2.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Pro Bicycle</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects web-design">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/3.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/3.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project3.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Door Cover</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects motion identity">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/4.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a class="cbp-lightbox" href="https://www.youtube.com/watch?v=3wbvpOIIBQA" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project4.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Pro Close-up</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects identity">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/5.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/5.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project5.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Bohemian Coding</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects motion logo">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/6.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="https://www.youtube.com/watch?v=9No-FiEInLA" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project6.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Poster Wall</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects web-design">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/7.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/7.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project7.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Red Bridge</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects web-design">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/8.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/8.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project8.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">V8 M52 Engine</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects identity motion">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/9.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="http://vimeo.com/16465813" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project9.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Ergonomic Pad</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects web-design graphic">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/10.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/10.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project10.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Cooling Tower</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects web-design graphic">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/11.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/11.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project10.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Cooling Tower</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

               <li class="cbp-item effect effects web-design graphic">
                  <div class="img">
                     <img src="{{asset('dust/img/portfolio/12.jpg')}}" class="img-responsive" alt="" />
                     <div class="overlay">
                        <ul class="expand">
                           <li class="cbp-l-icon">
                              <a href="{{asset('dust/img/portfolio/fullsize/12.jpg')}}" class="cbp-lightbox" data-title="Dashboard<br>by Visual">
                                 <!-- <i class="icon-magnifier"></i> -->
                              </a>
                           </li>
                           <!-- <li class="cbp-l-icon">
                              <a href="projects/project10.html" class="cbp-singlePage">
                                 <i class="icon-link"></i>
                              </a>
                           </li> -->
                           <!-- <li class="cbp-l-caption-title">Cooling Tower</li>
                           <li class="cbp-l-caption-desc">by Visual Design</li> -->
                        </ul>
                     </div>
                  </div>
               </li>

            </ul>
         </div>


      </div>
   </section>
   <!-- End Portfolio Section -->

   <!-- Start Get Connected -->
   <!-- <section id="services" class="parallax-section-9">
      <div class="container">
         <div class="col-md-12 text-center">
            <h3 class="section-title wow fadeInUp">What we do.</h3>
            <p class="subheading wow fadeInUp">We use <span class="highlight">our expertise</span> to extend your brand.</p>
         </div>
         <div class="row features-row wow fadeInUp">
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  <i class="icon-eyeglasses size-2x highlight"></i>
               </div>
               <div class="feature-info">
                  <h4>Parallax Design</h4>
                  <p class="feature-description">Vivamus molestie phasellus enim sed orci eu pharetra. Donec posuere nunc vitae tortor sagittis feugiat in non massa.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 white feature-column">
               <div class="feature-icon">
                  <i class="icon-lock-open size-2x highlight"></i>
               </div>
               <div class="feature-info">
                  <h4>Fully Responsive</h4>
                  <p class="feature-description">Vivamus molestie phasellus enim sed orci eu pharetra. Donec posuere nunc vitae tortor sagittis feugiat in non massa.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 white feature-column">
               <div class="feature-icon">
                  <i class="icon-energy size-2x highlight"></i>
               </div>
               <div class="feature-info">
                  <h4>Fast & Smooth</h4>
                  <p class="feature-description">Vivamus molestie phasellus enim sed orci eu pharetra. Donec posuere nunc vitae tortor sagittis feugiat in non massa.</p>
               </div>
            </div>
         </div>
         <div class="row features-row wow fadeInUp">
            <div class="col-md-4 col-sm-12 feature-column">
               <div class="feature-icon">
                  <i class="icon-eyeglasses size-2x highlight"></i>
               </div>
               <div class="feature-info">
                  <h4>Parallax Design</h4>
                  <p class="feature-description">Vivamus molestie phasellus enim sed orci eu pharetra. Donec posuere nunc vitae tortor sagittis feugiat in non massa.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 white feature-column">
               <div class="feature-icon">
                  <i class="icon-lock-open size-2x highlight"></i>
               </div>
               <div class="feature-info">
                  <h4>Fully Responsive</h4>
                  <p class="feature-description">Vivamus molestie phasellus enim sed orci eu pharetra. Donec posuere nunc vitae tortor sagittis feugiat in non massa.</p>
               </div>
            </div>
            <div class="col-md-4 col-sm-12 white feature-column">
               <div class="feature-icon">
                  <i class="icon-energy size-2x highlight"></i>
               </div>
               <div class="feature-info">
                  <h4>Fast & Smooth</h4>
                  <p class="feature-description">Vivamus molestie phasellus enim sed orci eu pharetra. Donec posuere nunc vitae tortor sagittis feugiat in non massa.</p>
               </div>
            </div>
         </div>
      </div>
   </section> -->
   <!-- End Services Section -->

   <!-- Start Testimonials Section -->
   <section id="testimonials" class="parallax-section-4">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h3 class="section-title white wow fadeInUp">Apa yang dikatakan Penyedia Menara dan Masyarakat</h3>
               <p class="subheading grey wow fadeInUp">Kumpulan Testimoni Penyedia Menara dan Masyarakat</p>
            </div>
            <div class="col-md-12 text-center wow fadeInUp">
               <div id="owl-testimonials" class="owl-carousel">
                  <div>
                     <div class="testimonial">
                        <i class="icon-left ion-quote ion-2x highlight"></i>
                        <span> Selamat kepada Pemerintah Kab. Aceh Tamiang melalui Dinas KOMINFOSAN Kab. Aceh Tamiang telah menyediakan <br>
                        Sistem Informasi Pengawasan Menara Telekomunikasi yang memudahkan kami (PT. TELKOMSEL) berkomunikasi kepada Pemerintah Daerah Kabupaten Aceh Tamiang. </span>
                        <i class="icon-right ion-quote ion-2x highlight"></i>
                     </div>
                     <div class="testimonial-name">
                        <img src="{{asset('dust/img/clients/client-1.png')}}" alt="client">
                        <h4 class="white">Ibu Mora (PT. Telkomsel)</h4>
                        <!-- <a href="#">
                           www.google.com
                        </a> -->
                     </div>
                  </div>
                  <div>
                     <div class="testimonial">
                        <i class="icon-left ion-quote ion-2x highlight"></i>
                        <span> Kami sangat mengapresiasi kerjasama bersama Dinas Komunikasi Informatika dan Persandian Kabupaten Aceh Tamiang.<br>
                        yang berjalan baik selama ini. </span>
                        <i class="icon-right ion-quote ion-2x highlight"></i>
                     </div>
                     <div class="testimonial-name">
                        <img src="dust/img/clients/client-2.png" alt="client">
                        <h4 class="white">Ibu Jastra (PT. Mitratel)</h4>
                        <!-- <a href="#">
                           www.facebook.com
                        </a> -->
                     </div>
                  </div>
                  <div>
                     <div class="testimonial">
                        <i class="icon-left ion-quote ion-2x highlight"></i>
                        <span> Sebagai Datuk Penghulu Bukit Tempurung kami sangat berterimakasih kepada Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang.<br>
                        yang telah melakukan pengawasan dan pengendalian menara telekomunikasi di lingkungan desa kami</span>
                        <i class="icon-right ion-quote ion-2x highlight"></i>
                     </div>
                     <div class="testimonial-name">
                        <img src="dust/img/clients/client-3.png" alt="client">
                        <h4 class="white"> (Datuk Penghulu Desa Bukit Tempurung)</h4>
                        <!-- <a href="#">
                           www.msn.com
                        </a> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- End Testimonials Section -->

   <!-- Start Contact Form Section -->
   <section id="contact">
      <div class="container">
         <div class="row">
            <div class="col-md-12 text-center">
               <h3 class="section-title wow fadeInUp">Hubungi Kami</h3>
               <p class="subheading wow fadeInUp"> Sampaikan pesan kepada kami, mari bekerja bersama demi pelayanan komunikasi digital yang lebih baik kepada masyarakat Kab. Aceh Tamiang. </p>
            </div>

            <!-- <div class="col-md-7 wow fadeInUp">
               <div id="message"></div>
               @livewire('form-kirim-pesan')
            </div> -->

            <div class="col-md-5 wow fadeInLeft">
               <h4> Kantor DISKOMINFOSAN Kab. Aceh Tamiang : </h4>
               <address>
               Jl. Ir. H. Juanda (Medan-Banda Aceh)<br>
               Komplek Perkantoran Bupati Aceh Tamiang<br>
               </address>

               <h4> Hubungi Kami : </h4>
               <address>
               <!-- <abbr title="Phone">
               <strong> Phone </strong>
               </abbr> : (0641) xxxxxx <br>
               <abbr title="Fax">
               <strong>Fax </strong>
               </abbr> : (061) xxxxxx <br>
               <abbr title="Email"> -->
               <strong>Email </strong>
               </abbr> : kominfosan@acehtamiangkab.go.id
               </address>
            </div>
         </div>
      </div>
   </section>
   <!-- End Contact Form Section -->


   <!-- Start Footer 1 -->
   <footer id="footer">
      <!-- End Footer Widgets -->

      <div class="footer-copyright">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h3 class="section-title wow fadeInUp">SIPESET</h3>
                  <p class="wow fadeInUp"> All Rights Reserved. Copyright © 2021 Dinas Komunikasi Informatika dan Persandian Kab. Aceh Tamiang
                  <!-- <a href="http://templatestock.co" target="_blank">Template Stock</a>  -->
                  </p>
               </div>
            </div>
         </div>
      </div>
      <!-- End Footer Copyright -->

   </footer>
   <!-- End Footer 1 -->

   <!-- Start Back To Top -->
   <a id="back-to-top">
      <i class="icon ion-chevron-up"></i>
   </a>
   <!-- End Back To Top -->

</div>
<!-- End Site Wrapper -->


<!-- jQuery -->
<script type="text/javascript" src="{{asset('dust/js/plugins/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/moderniz.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/smoothscroll.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/no-ui-slider/jquery.nouislider.all.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/revslider.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/parallax.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/easign1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/cubeportfolio.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/owlcarousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/tweetie.min.js')}}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/gmap3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/plugins/counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dust/js/scripts.js')}}"></script>
@livewireScripts
</body>
</html>
