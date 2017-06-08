<!-- 
   |||       ||||        |||       |||     || ||||||||||||  ||||||||||  |||       |||        |||       |||     ||
   ||||     || ||       |||||      ||||    ||      ||       ||          ||||     ||||       |||||      ||||    ||
   || ||   ||  ||      ||   ||     || ||   ||      ||       ||          || ||   || ||      ||   ||     || ||   ||
   ||  || ||   ||     ||     ||    ||  ||  ||      ||       ||||||||||  ||  || ||  ||     ||     ||    ||  ||  ||
   ||   |||    ||    |||||||||||   ||   || ||      ||       ||          ||   |||   ||    |||||||||||   ||   || ||
   ||    |     ||   ||         ||  ||    ||||      ||       ||          ||    |    ||   ||         ||  ||    ||||
  ||||        |||| ||||       |||| ||     |||      ||       |||||||||| ||||       |||| ||||       |||| ||     |||
-->
<!DOCTYPE HTML>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1">
  <title>Pendaftaran | Landing Page</title>
  <!-- X-ICON -->
  <link rel="icon" href="../front/favicon.png" type="image/png">
  <!-- Reset CSS -->
  <link href="../front/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../front/css/style.css" rel="stylesheet" type="text/css">
  <link href="../front/css/linecons.css" rel="stylesheet" type="text/css">
  <link href="../front/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="../front/css/responsive.css" rel="stylesheet" type="text/css">
  <link href="../front/css/animate.css" rel="stylesheet" type="text/css">
  <!-- Google Font -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,900,700,700italic,400italic,300italic,300,100italic,100,900italic'
    rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,700,800,600,300,200' rel='stylesheet' type='text/css'>
  <!-- Reset JS -->
  <script type="text/javascript" src="../front/js/jquery.1.8.3.min.js"></script>
  <script type="text/javascript" src="../front/js/bootstrap.js"></script>
  <script type="text/javascript" src="../front/js/jquery-scrolltofixed.js"></script>
  <script type="text/javascript" src="../front/js/jquery.easing.1.3.js"></script>
  <script type="text/javascript" src="../front/js/jquery.isotope.js"></script>
  <script type="text/javascript" src="../front/js/wow.js"></script>
  <script type="text/javascript" src="../front/js/classie.js"></script>
  <!-- JQuery -->
  <script type="text/javascript">
    $(document).ready(function (e) {
      $('.res-nav_click').click(function () {
        $('ul.toggle').slideToggle(600)
      });

      $(document).ready(function () {
        $(window).bind('scroll', function () {
          if ($(window).scrollTop() > 0) {
            $('#header_outer').addClass('fixed');
          }
          else {
            $('#header_outer').removeClass('fixed');
          }
        });

      });

    });
    function resizeText() {
      var preferredWidth = 767;
      var displayWidth = window.innerWidth;
      var percentage = displayWidth / preferredWidth;
      var fontsizetitle = 25;
      var newFontSizeTitle = Math.floor(fontsizetitle * percentage);
      $(".divclass").css("font-size", newFontSizeTitle)
    }
  </script>
</head>

<body>
  <!-- Header section -->
  <header id="header_outer">
    <div class="container">
      <div class="header_section">
        <div class="logo">
          <a href="javascript:void(0)">SMKN 1 KEPANJEN</a>
        </div>
        <nav class="nav" id="nav">
          <ul class="toggle">
            <li><a href="#top_content">Home</a></li>
            <li><a href="#service">About Us</a></li>
            <li><a href="#work_outer">Jurusan</a></li>
            <li><a href="#client_outer">Informasi</a></li>
            <!--<li><a href="#team">Designer</a></li>-->
            <li><a href="login"><u>Login</u></a></li>
            <li><a href="#contact">Subscribe</a></li>
          </ul>
          <ul class="">
            <li><a href="#top_content">Home</a></li>
            <li><a href="#service">About Us</a></li>
            <li><a href="#work_outer">Jurusan</a></li>
            <li><a href="#client_outer">Informasi</a></li>
            <!--<li><a href="#team">Designer</a></li>-->
            <li><a href="login"><u>Login</u></a></li>
            <li><a href="#contact">Subscribe</a></li>
          </ul>
        </nav>
        <a class="res-nav_click animated wobble wow" href="javascript:void(0)"><i class="fa-bars"></i></a> </div>
    </div>
  </header>
  <!-- /end header section -->

  <!-- Top content -->
  <section id="top_content" class="top_cont_outer">
    <div class="top_cont_inner">
      <div class="container">
        <div class="top_content">
          <div class="row">
            <div class="col-lg-5 col-sm-7">
              <div class="top_left_cont flipInY wow animated">
                <img src="../front/img/logo.png"><br>
                <a href="signup" class="learn_more2">Daftar Sekarang</a>
              </div>
            </div>
            <div class="col-lg-7 col-sm-5"> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /end top content -->

  <!-- About Us -->
  <section id="service">
    <div class="container">
      <h2>Tentang Kami</h2>
      <div class="service_area">
        <div class="row">
          <div class="col-lg-4">
            <div class="service_block">
              <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa-shield"></i></span> </div>
              <h3 class="animated fadeInUp wow">VISI</h3>
              <p class="animated fadeInDown wow">Mewujudkan Sekolah Menengah Kejuruan Negeri 1 Kepanjen sebagai lembaga pendidikan kejuruan yang menghasilkan 
                Sumber Daya Manusia dibidang teknologi yang profesional serta bertaqwa kepada Tuhan Yang Maha Esa.
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service_block">
              <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa-shield"></i></span> </div>
              <h3 class="animated fadeInUp wow">SMK NEGERI 1 KEPANJEN</h3>
              <p class="animated fadeInDown wow">Alamat Jl. Raya Kedungpedaringan Kepanjen Kab. Malang, Telp. (0341) 395777, Fax (0341) 394776, E-mail smkn1kepanjen@ymail.com Website smkn1kepanjen.sch.id Kode Pos 65163. 
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service_block">
              <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa-shield"></i></span> </div>
              <h3 class="animated fadeInUp wow">MISI</h3>
              <p class="animated fadeInDown wow"><strong>1.</strong> Meningkatkan pengelolaan sekolah secara profesional. <strong>2.</strong> Meningkatkan pelaksaan Pendidikan Sistem Ganda 
                (PSG) Tujuan Mendorong SMK Negeri 1 Kepanjen untuk secara bertahap memiliki sarana dan prasarana pendidikan sumber belajar yang sesuai dengan 
                Standar Nasional dan Standar Internasional melalui Program Pengadaan Peralatan di lingkungan SMKN 1 Kepanjen melalui Bantuan Pengadaan Peralatan APBN 2009.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /end about us -->

  <!-- main section -->
  <section id="work_outer">
    <!-- Jurusan -->
    <div class="top_cont_latest">
      <div class="container">
        <h2>Program Keahlian</h2>
        <div class="work_section">
          <div class="row">
            <div class="col-lg-6 col-sm-6 wow fadeInLeft delay-05s">
            @foreach($jurusans as $jurusan)
              <div class="service-list">
                <div class="service-list-col1"><i class="icon-cog"></i></div>
                <div class="service-list-col2">
                  <h3>{{$jurusan['nama']}}</h3>
                  <p>Kuota yang tersedia saat ini <strong>{{$jurusan['kuota']}}</strong> calon siswa.</p>
                </div>
              </div>
              @endforeach
              <div class="work_bottom"><span>Ayo Pilih Keahlianmu Sekarang...!</span><a href="signup" class="contact_btn">Daftar Sekarang</a></div>
            </div>
            <figure class="col-lg-6 col-sm-6  text-right wow fadeInUp delay-02s"> </figure>
          </div>
        </div>
      </div>
    </div>
    <!-- /end jurusan -->
  </section>
  <!-- /end main section -->

  <section class="main-section" id="client_outer">
  <!-- main section client part -->
  <h2>Informasi Sekolah</h2>
  <div class="client_area ">
    <div class="client_section animated  fadeInUp wow">
      <div class="client_profile">
        <div class="client_profile_pic"><img src="../front/img/client-pic1.jpg" alt=""></div>
        <h3>SMKN 1 Kepanjen</h3>
        <span>Kanesa Bisa</span> </div>
      <div class="quote_section">
        <div class="quote_arrow"></div>
        <p><b><img src="../front/img/quote_sign_left.png" alt=""></b> SMKN 1 Kepanjen merupakan salah satu pendidikan kejuruan di
          wilayah Kepanjen kabupaten Malang yang memiliki tujuan untuk menciptakan tenaga kerja yang profesional & kompetitif.
          <small><img src="../front/img/quote_sign_right.png" alt=""></small> </p>
      </div>
      <div class="clear"></div>
    </div>
    <div class="client_section animated  fadeInDown wow">
      <div class="client_profile flt">
        <div class="client_profile_pic"><img src="../front/img/client-pic2.jpg" alt=""></div>
        <h3>Tentang Kami</h3>
        <span>SMKN 1 Kepanjen</span> </div>
      <div class="quote_section flt">
        <div class="quote_arrow2"></div>
        <p><b><img src="../front/img/quote_sign_left.png" alt=""></b> Alamat Jl. Raya Kedungpedaringan Kepanjen Kab. Malang, Telp. (0341) 395777,
          Fax (0341) 394776, E-mail <u>smkn1kepanjen@ymail.com</u> Website <u>smkn1kepanjen.sch.id</u> Kode Pos 65163.
          <small><img src="../front/img/quote_sign_right.png" alt=""></small> </p>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  </section>
  <hr>
  <!-- /end main section client part -->

  <!-- Main Ssection Team -->
  <!--<section class="main-section team" id="team">-->
    <!-- Taem -->
    <!--<div class="container">
      <h2>Designer Komponen Website</h2>
      <h6>Website kami terdiri dari 3 komponen, diantaranya Design, Frontend & Backend</h6>
      <div class="team-leader-block clearfix">
        <div class="team-leader-box">
          <div class="team-leader wow fadeInDown delay-03s">
            <div class="team-leader-shadow">
              <a href="javascript:void(0)"></a>
            </div>
            <img src="../front/img/team-leader-pic1.jpg" alt="">
            <ul>
              <li>
                <a href="javascript:void(0)" class="fa-twitter"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-facebook"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-github"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-instagram"></a>
              </li>
            </ul>
          </div>
          <h3 class="wow fadeInDown delay-03s">Designer</h3>
          <span class="wow fadeInDown delay-03s">HTML5, CSS3 & BOOTSTRAP</span>
          <p class="wow fadeInDown delay-03s">Developer yang bertugas di bagian design merupakan developer yang bertugas merancang suatu desain project atau website.
          </p>
        </div>
        <div class="team-leader-box">
          <div class="team-leader  wow fadeInDown delay-06s">
            <div class="team-leader-shadow">
              <a href="javascript:void(0)"></a>
            </div>
            <img src="../front/img/team-leader-pic2.jpg" alt="">
            <ul>
              <li>
                <a href="javascript:void(0)" class="fa-twitter"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-facebook"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-github"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-instagram"></a>
              </li>
            </ul>
          </div>
          <h3 class="wow fadeInDown delay-06s">Frontend</h3>
          <span class="wow fadeInDown delay-06s">AngularJS</span>
          <p class="wow fadeInDown delay-06s">Developer yang bertugas di bagian Frontend merupakan developer yang bertugas membuat tampilan luar atau layout pada
            website.</p>
        </div>
        <div class="team-leader-box">
          <div class="team-leader wow fadeInDown delay-09s">
            <div class="team-leader-shadow">
              <a href="javascript:void(0)"></a>
            </div>
            <img src="../front/img/team-leader-pic3.jpg" alt="">
            <ul>
              <li>
                <a href="javascript:void(0)" class="fa-twitter"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-facebook"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-github"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-instagram"></a>
              </li>
            </ul>
          </div>
          <h3 class="wow fadeInDown delay-09s">Backend</h3>
          <span class="wow fadeInDown delay-09s">Laravel MySQL</span>
          <p class="wow fadeInDown delay-09s">Developer yang bertugas di bagian Backend tidak mengurus tampilan luar, tetapi hanya mengurus database atau server pada
           website.</p>
        </div>
      </div>
    </div>-->
    <!-- /end team -->
  <!--</section>-->
  <!-- /end main section team -->

  <!-- Footer -->
  <footer class="footer_section" id="contact">
    <div class="container">
      <section class="main-section contact" id="contact">
        <div class="contact_section">
          <div class="block">
            <div class="title text-center">
              <h2>Subscribe</h2>
              <p>Daftarkan Email anda untuk mendapatkan informasi lebih lanjut dari kami !</p>
            </div>
            <form class="form-inline text-center col-sm-12 col-xs-12" role="form">
              <div class="form-group">
                  <input type="text" class="form-control" id="signup-form" >
              </div>
              <a href="" type="submit" class="btn btn-default btn-signup">
                  <i class="fa fa-paper-plane"></i>
              </a>
            </form>
          </div>
        </div>
      </section>
    </div>
    <!-- Copyright -->
    <div class="container">
      <div class="footer_bottom"><span>Copyright © 2017 | By <a href="https://github.com/Mantemanku27" target="_blank">Mantemanku27</a></span></div>
    </div>
    <!-- /end copyright -->
  </footer>
  <!-- /end footer -->

  <script type="text/javascript">
    $(document).ready(function (e) {
      $('#header_outer').scrollToFixed();
      $('.res-nav_click').click(function () {
        $('.main-nav').slideToggle();
        return false
      });
    });
  </script>
  
  <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset: 100
      }
    );
    wow.init();
    document.getElementById('').onclick = function () {
      var section = document.createElement('section');
      section.className = 'wow fadeInDown';
      section.className = 'wow shake';
      section.className = 'wow zoomIn';
      section.className = 'wow lightSpeedIn';
      this.parentNode.insertBefore(section, this);
    };
  </script>

  <script type="text/javascript">
    $(window).load(function () {
      $('a').bind('click', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
          scrollTop: $($anchor.attr('href')).offset().top - 91
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
      });
    })
  </script>

  <script type="text/javascript">
    jQuery(document).ready(function ($) {
      // Portfolio Isotope
      var container = $('#portfolio-wrap');


      container.isotope({
        animationEngine: 'best-available',
        animationOptions: {
          duration: 200,
          queue: false
        },
        layoutMode: 'fitRows'
      });

      $('#filters a').click(function () {
        $('#filters a').removeClass('active');
        $(this).addClass('active');
        var selector = $(this).attr('data-filter');
        container.isotope({ filter: selector });
        setProjects();
        return false;
      });


      function splitColumns() {
        var winWidth = $(window).width(),
          columnNumb = 1;


        if (winWidth > 1024) {
          columnNumb = 4;
        } else if (winWidth > 900) {
          columnNumb = 2;
        } else if (winWidth > 479) {
          columnNumb = 2;
        } else if (winWidth < 479) {
          columnNumb = 1;
        }

        return columnNumb;
      }

      function setColumns() {
        var winWidth = $(window).width(),
          columnNumb = splitColumns(),
          postWidth = Math.floor(winWidth / columnNumb);

        container.find('.portfolio-item').each(function () {
          $(this).css({
            width: postWidth + 'px'
          });
        });
      }

      function setProjects() {
        setColumns();
        container.isotope('reLayout');
      }

      container.imagesLoaded(function () {
        setColumns();
      });


      $(window).bind('resize', function () {
        setProjects();
      });

    });
    $(window).load(function () {
      jQuery('#all').click();
      return false;
    });
  </script>
</body>
</html>
