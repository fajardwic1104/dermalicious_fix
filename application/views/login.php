<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator - Login</title>
    <?php $this->load->view('css/style_login.php') ?>
</head>
<body class="login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="<?=base_url('assets/dist/img/logo-dermalicious.jpg')?>" alt="Logo Dermalicious" width="100%">
    </div>
  <!-- Login Form -->
    <div class="card-body">
      <p class="login-box-msg">Dermalicious Information System</p>
      <form action="<?=site_url('login/login')?>" method="post">
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password-field" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
            <span toggle="#password-field" class="fas fa-eye-slash field-icon toggle-password" style="cursor:pointer"></span>
            </div>
          </div>
        </div>
        <?php if ($this->session->flashdata('empty')) {
          echo '<div class="alert alert-danger" style="font-size:12px" role="alert">'.$this->session->flashdata('empty').'</div>';
        }?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="rememberme">
              <label for="remember">Remember Me</label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- /.card -->
</div>
<?php $this->load->view('js/script_login.php') ?>
</body>
</html>