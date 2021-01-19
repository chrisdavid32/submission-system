<?php
session_start();
include('../include/config.php');
include('./external/header.php');
is_student();
?>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">

        <div class="sidebar-brand-text mx-3">Student Module</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="assignment.php">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Check Assignment</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="submit.php">
          <i class="fas fa-fw fa-upload"></i>
          <span>Submission</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="status.php">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Status</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="setting.php">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Setting</span></a>
      </li>
      <hr class="sidebar-divider">
    </ul>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php
        include('./external/topnav.php');
        ?>
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>
          <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
              <?php
              include('cpassword.php');
              ?>
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputPassword1">New Password</label>
                      <input type="password" class="form-control" id="exampleInputText" name="password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Comfirn Password</label>
                      <input type="password" class="form-control" id="exampleInputText" name="comfirm_password">
                    </div>
                    <br>
                    <br>
                    <button type="submit" name="submit" class="btn btn-success">Change Password</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!---Container Fluid-->
      </div>
      <?php
      include('./external/footer.php');
      ?>