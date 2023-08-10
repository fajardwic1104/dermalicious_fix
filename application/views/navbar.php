<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: auto;">
    <img src="<?=base_url('assets/dist/img/logo-dermalicious.jpg')?>" alt="Logo Dermalicious" width="150px">
<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>

      </li>
      <li class="nav-item dropdown">

        <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
        class="nav-link dropdown-toggle">Hai, <?=$this->session->userdata('nama_user')?></a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <?php if ($this->session->userdata('level') == "super admin" || $this->session->userdata('level') == "Admin Dermalicious") {?>
              <li><a href="<?=site_url('master/MasterMenu')?>" class="dropdown-item">Menu Master</a></li>
            <?php }?>
            <li><a href="<?=site_url('login/logout')?>" class="dropdown-item">Log Out </a></li>
          </ul>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="btn btn-primary" href="<?=site_url('login/logout')?>" role="button">Log Out
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->