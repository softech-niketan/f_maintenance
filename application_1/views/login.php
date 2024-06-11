<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Machine Shop Sign in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img class="mx-auto d-block rounded-circle" src="<?php echo base_url('') ?>/dist/img/logo.jpg" alt="">
      <!-- <a href="../../index2.html"><b>Business LTE</b></a> -->
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Machine Shop Sign in</p>

        <form action="<?php echo base_url('login_check') ?>" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                Log In
              </button>
            </div>
            <!-- <a href="<?php echo base_url('register') ?>" class="text-center">Don't have a membership</a> -->
            <!-- /.col -->

            <!-- /.col -->
          </div>
          <?php if ($this->session->flashdata('errors')) {
          ?>
            <br>
            <br>

            <div class="login-details text-left mb-25">
              <div class='alert alert-danger'>
                <?php echo $this->session->flashdata('errors');  ?>
              </div>
            </div>

          <?php }
          ?>
        </form>


        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>