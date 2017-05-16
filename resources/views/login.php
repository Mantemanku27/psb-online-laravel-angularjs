<!-- 
   |||       ||||        |||       |||     || ||||||||||||  ||||||||||  |||       |||        |||       |||     ||
   ||||     || ||       |||||      ||||    ||      ||       ||          ||||     ||||       |||||      ||||    ||
   || ||   ||  ||      ||   ||     || ||   ||      ||       ||          || ||   || ||      ||   ||     || ||   ||
   ||  || ||   ||     ||     ||    ||  ||  ||      ||       ||||||||||  ||  || ||  ||     ||     ||    ||  ||  ||
   ||   |||    ||    |||||||||||   ||   || ||      ||       ||          ||   |||   ||    |||||||||||   ||   || ||
   ||    |     ||   ||         ||  ||    ||||      ||       ||          ||    |    ||   ||         ||  ||    ||||
  ||||        |||| ||||       |||| ||     |||      ||       |||||||||| ||||       |||| ||||       |||| ||     |||
-->

<!DOCTYPE html>
<html lang="en" data-ng-app="clipApp">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="app.description">
  <meta name="keywords" content="app, responsive, angular, bootstrap, dashboard, admin">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="HandheldFriendly" content="true" />
  <meta name="apple-touch-fullscreen" content="yes" />
  <title data-ng-bind="pageTitle()">Pendaftaran | Login</title>
  <!-- Import Google fonts -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Themify Icons -->
  <link rel="stylesheet" href="../bower_components/themify-icons/css/themify-icons.css">
  <!-- Loading Bar -->
  <link rel="stylesheet" href="../bower_components/angular-loading-bar/build/loading-bar.min.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" href="../bower_components/animate.css/animate.min.css">
  <!-- Assets CSS -->
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/plugins.css">
  <!-- X Icon -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" type="x-icon">
</head>
<!-- Login -->
<a class="back-landing" href="landingpage">Kembali ke landing page sekarang !</a>
<div class="row">
  <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
    <!-- box login -->
    <div class="box-login">
      <form class="subscribe" accept-charset="UTF-8" action="api/post-login" method="post">
        <h4>
          <?php if (session()->has('auth_messagee')) { ?>
          <h7 style="color: red"><?php echo session()->get('auth_messagee') ?></h7>
          <?php } ?>

          <?php if (session()->has('auth_message')) { ?>
          <h7 style="color: red"><?php echo session()->get('auth_message') ?></h7>
          <?php } ?></h4>

        <fieldset>
          <legend>
            Masuk Ke Akun Anda !
          </legend>
          <p>
            <img class="avatar-login" src="../assets/images/avatar-login.png">
            Silahkan Masukan Email & Password untuk login.
          </p>
          <div class="form-group">
            <span class="input-icon">
              <input type="email" class="form-control" name="email" placeholder="Email">
              <i class="fa fa-user"></i> </span>
          </div>
          <div class="form-group form-actions">
            <span class="input-icon">
              <input type="password" class="form-control password" name="password" placeholder="Password">
              <i class="fa fa-lock"></i>
          </div>
          <div class="form-actions">
            <div class="checkbox clip-check check-primary">
              <input type="checkbox" id="remember" value="1">
              <label for="remember">
                Biarkan saya tetap masuk.
              </label>
            </div>
            <button type="submit" class="btn btn-primary pull-right">
              Login <i class="fa fa-arrow-circle-right"></i>
            </button>
          </div>
          <div class="new-account">
            Belum punya aku?
            <a href="signup">
              Buat akun sekarang
            </a>
          </div>
        </fieldset>
      </form>
    </div>
    <!-- /end box login -->
  </div>
</div>
<!-- /end login -->
</html>
