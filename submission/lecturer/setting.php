<?php

session_start();
ob_start();
include('../include/config.php');
is_lecturer();
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('../include/hd.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="#">Lecturer Module </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="assignment.php">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Assignment</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="file.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">File Record</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="view.php">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">View Submission</span>
          </a>
        </li>

        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="setting.php">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Account Setting </span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <?php
          $tf = mysqli_fetch_array(mysqli_query($con, "select * from staff where staff_id='$user'"));
          ?>
          <p style="color: white"> WELLCOME:&nbsp;&nbsp;<span style="color: white; font-size: 20px; font-weight:bold" class="mb-0 text-sm font-weight-bold"> <?php print(strtoupper($tf['tit'] . ". " . $tf['last_name'] . " " . $tf['other_name']));
                                                                                                                                                              ?>&nbsp;&nbsp;</span>
        </li>
        &nbsp;&nbsp;
        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="card mb-3">
        <div class="row">
          <div class="col-lg-3">
          </div>
          <div class="col-lg-6">
            <?php
            include('changepassword.php');
            ?>
            <form method="post" enctype="multipart/form-data">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-book"></i>Update Password</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8" style="margin-top:0px">
                      <label for="exampleInputName">New Password</label>
                      <input class="form-control" id="exampleInputName" type="password" name="password" />
                      <br />
                    </div>
                    <div class="col-md-8" style="margin-top:0px">
                      <label for="exampleInputName">Comfirm Password</label>
                      <input class="form-control" id="exampleInputName" type="password" name="comfirm_password" />
                      <br />
                    </div>
                    <div class="col-md-12" style="margin-top:0px" align="center">
                      <button class="btn btn-success" name="submit"><i class="fa fa-sign-in"></i> &nbsp;Submit</button>
                    </div>
                  </div>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
      <?php
      include('../include/foot.php');
      ?>