<!-- 
   |||       ||||        |||       |||     || ||||||||||||  ||||||||||  |||       |||        |||       |||     ||
   ||||     || ||       |||||      ||||    ||      ||       ||          ||||     ||||       |||||      ||||    ||
   || ||   ||  ||      ||   ||     || ||   ||      ||       ||          || ||   || ||      ||   ||     || ||   ||
   ||  || ||   ||     ||     ||    ||  ||  ||      ||       ||||||||||  ||  || ||  ||     ||     ||    ||  ||  ||
   ||   |||    ||    |||||||||||   ||   || ||      ||       ||          ||   |||   ||    |||||||||||   ||   || ||
   ||    |     ||   ||         ||  ||    ||||      ||       ||          ||    |    ||   ||         ||  ||    ||||
  ||||        |||| ||||       |||| ||     |||      ||       |||||||||| ||||       |||| ||||       |||| ||     |||
-->

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, maximum-scale=1">
  <title>Pendaftaran | Landing Page</title>
  <!-- Favicon logo -->
  <link rel="icon" href="../front/favicon.png" type="image/png">
  <!-- Reset css -->
  <link href="../front/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="../front/css/style.css" rel="stylesheet" type="text/css">
  <link href="../front/css/linecons.css" rel="stylesheet" type="text/css">
  <link href="../front/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="../front/css/responsive.css" rel="stylesheet" type="text/css">
  <link href="../front/css/animate.css" rel="stylesheet" type="text/css">
  <!-- Font css dari web browser -->
  <link href='http://fonts.googleapis.com/css?family=Lato:400,900,700,700italic,400italic,300italic,300,100italic,100,900italic'
    rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,700,800,600,300,200' rel='stylesheet' type='text/css'>
  <!-- Reset Js -->
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
            <li><a href="#team">Designer</a></li>
            <li><a href="#contact">Subscribe</a></li>
          </ul>
          <ul class="">
            <li><a href="#top_content">Home</a></li>
            <li><a href="#service">About Us</a></li>
            <li><a href="#work_outer">Jurusan</a></li>
            <li><a href="#client_outer">Informasi</a></li>
            <li><a href="#team">Designer</a></li>
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
                <a href="#service" class="learn_more2">Daftar Sekarang</a>
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
              <h3 class="animated fadeInUp wow">Website Multifungsi</h3>
              <p class="animated fadeInDown wow">Merupakan website yang di rancang untuk memudahkan suatu pendidikan dalam melakukan penerimaan peserta didik
                baru.
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service_block">
              <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa-shield"></i></span> </div>
              <h3 class="animated fadeInUp wow">Friendly Support</h3>
              <p class="animated fadeInDown wow">Proin iaculis purus consequat sem cure digni. Donec porttitora entum suscipit aenean rhoncus posuere odio in
                tincidunt.
              </p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="service_block">
              <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa-shield"></i></span> </div>
              <h3 class="animated fadeInUp wow">Keamanan terjamin</h3>
              <p class="animated fadeInDown wow">Merupakan website yang di rancang dengan suatu sitem keamanan yang cukup terjamin oleh designer.
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
              <div class="service-list">
                <div class="service-list-col1"><i class="icon-cog"></i></div>
                <div class="service-list-col2">
                  <h3>Rekayasa Perangkat Lunak</h3>
                  <p>Kuota Jurusan Rekayasa Perangkat Lunak Masih membutuhkan 200 pserta didik baru</p>
                </div>
              </div>
              <div class="service-list">
                <div class="service-list-col1"><i class="icon-cog"></i></div>
                <div class="service-list-col2">
                  <h3>Teknik Komputer Jaringan</h3>
                  <p>Kuota Jurusan Teknik Komputer Jaringan Masih membutuhkan 200 pserta didik baru</p>
                </div>
              </div>
              <div class="service-list">
                <div class="service-list-col1"><i class="icon-cog"></i></div>
                <div class="service-list-col2">
                  <h3>Teknik Elektronika Industri</h3>
                  <p>Kuota Jurusan Teknik Elektronika Industri Masih membutuhkan 200 pserta didik baru</p>
                </div>
              </div>
              <div class="service-list">
                <div class="service-list-col1"><i class="icon-cog"></i></div>
                <div class="service-list-col2">
                  <h3>Teknik Kendaraan Ringan</h3>
                  <p>Kuota Jurusan Teknik Kendaraan Ringan Masih membutuhkan 200 pserta didik baru</p>
                </div>
              </div>
              <div class="service-list">
                <div class="service-list-col1"><i class="icon-cog"></i></div>
                <div class="service-list-col2">
                  <h3>Teknik Sepeda Motor</h3>
                  <p>Kuota Jurusan Teknik Sepeda Motor Masih membutuhkan 200 pserta didik baru</p>
                </div>
              </div>
              <div class="work_bottom"><span>Ayo Pilih Keahlianmu Sekarang...!</span><a href="#" class="contact_btn">Daftar Sekarang</a></div>
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
        <h3>Saul Goodman</h3>
        <span>Lawless Inc</span> </div>
      <div class="quote_section">
        <div class="quote_arrow"></div>
        <p><b><img src="../front/img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure digni ssim donec porttitora
          entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
          <small><img src="../front/img/quote_sign_right.png" alt=""></small> </p>
      </div>
      <div class="clear"></div>
    </div>
    <div class="client_section animated  fadeInDown wow">
      <div class="client_profile flt">
        <div class="client_profile_pic"><img src="../front/img/client-pic2.jpg" alt=""></div>
        <h3>Marie Schrader</h3>
        <span>DEA Foundation</span> </div>
      <div class="quote_section flt">
        <div class="quote_arrow2"></div>
        <p><b><img src="../front/img/quote_sign_left.png" alt=""></b> Proin iaculis purus consequat sem cure digni ssim donec porttitora
          entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
          <small><img src="../front/img/quote_sign_right.png" alt=""></small> </p>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  </section>
  <!-- /end main section client part -->
  <div class="c-logo-part">
    <!-- c logo part start -->
    <div class="container">
      <ul class="delay-06s animated  bounce wow">
        <li>
          <a href="javascript:void(0)"><img src="../front/img/c-liogo1.png" alt=""></a>
        </li>
        <li>
          <a href="javascript:void(0)"><img src="../front/img/c-liogo2.png" alt=""></a>
        </li>
        <li>
          <a href="javascript:void(0)"><img src="../front/img/c-liogo3.png" alt=""></a>
        </li>
        <li>
          <a href="javascript:void(0)"><img src="../front/img/c-liogo5.png" alt=""></a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /end c logo part end -->
  
  <!-- Main Ssection Team -->
  <section class="main-section team" id="team">
    <!-- Taem -->
    <div class="container">
      <h2>Komponen Website</h2>
      <h6>Take a closer look into our amazing team. We won’t bite.</h6>
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
                <a href="javascript:void(0)" class="fa-pinterest"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-google-plus"></a>
              </li>
            </ul>
          </div>
          <h3 class="wow fadeInDown delay-03s">Designer</h3>
          <span class="wow fadeInDown delay-03s">HTML5, CSS3 & BOOTSTRAP</span>
          <p class="wow fadeInDown delay-03s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur
            adipiscing elit proin consequat.</p>
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
                <a href="javascript:void(0)" class="fa-pinterest"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-google-plus"></a>
              </li>
            </ul>
          </div>
          <h3 class="wow fadeInDown delay-06s">Frontend</h3>
          <span class="wow fadeInDown delay-06s">AngularJS</span>
          <p class="wow fadeInDown delay-06s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur
            adipiscing elit proin consequat.</p>
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
                <a href="javascript:void(0)" class="fa-pinterest"></a>
              </li>
              <li>
                <a href="javascript:void(0)" class="fa-google-plus"></a>
              </li>
            </ul>
          </div>
          <h3 class="wow fadeInDown delay-09s">Backend</h3>
          <span class="wow fadeInDown delay-09s">Laravel MySQL</span>
          <p class="wow fadeInDown delay-09s">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur
            adipiscing elit proin consequat.</p>
        </div>
      </div>
    </div>
    <!-- /end team -->
  </section>
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
      <div class="footer_bottom"><span>Copyright © 2017 | By <a href="https://github.com/Mantemanku27">Mantemanku27</a></span></div>
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
