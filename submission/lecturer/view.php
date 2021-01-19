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
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="view.php">
            <i class="fa fa-fw fa-eye"></i>
            <span class="nav-link-text">View Submission</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
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
          <p style="color: white"> WELLCOME:&nbsp;&nbsp;<span style="color: white; font-size: 20px; font-weight:bold" class="mb-0 text-sm font-weight-bold"> <?php print(strtoupper($tf['tit'] . ". " . $tf['last_name'] . " " . $tf['other_name'])); ?>&nbsp;&nbsp;</span>
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
          <div class="col-lg-5">
            <form method="post" enctype="multipart/form-data">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-book"></i></div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12" style="margin-top:0px">
                      <label for="exampleInputName">Course</label>
                      <select class="form-control" name="course">
                        <option value="">Select Course</option>
                        <?php
                        $sql = "SELECT u.`title`, u.titleid FROM upload u INNER JOIN allocate a ON u.`titleid`=a.`course_name` WHERE a.`allocate_to`= '$user' order by title ASC";
                        $query = mysqli_query($con, $sql);
                        while ($data = mysqli_fetch_array($query)) {
                          $sn++ ?>
                          <option value="<?php print($data['titleid']); ?>"><?php print ucwords(($data['title'])); ?></option>
                        <?php
                        }
                        ?>
                      </select>
                      <br />
                    </div>
                    <div class="col-md-12" style="margin-top:0px" align="center">
                      <button class="btn btn-success" name="submit"><i class="fa fa-sign-in"></i> &nbsp;Load</button>
                    </div>
                  </div>
                </div>

              </div>
          </div>
          <div class="col-lg-7">
          </div>
        </div>
        <?php
        if (isset($_POST['submit'])) {
          $course = $_POST['course'];
          if (empty($course)) {
            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Course is empty!
                              </div>';
          } else {
        ?>
            <div class="col-lg-12">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fa fa-table"></i> List of file</div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Matric No.</th>
                          <th>Course</th>
                          <th>Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <?php
                      $query = "select * from submission where course='$course' AND lecturer='$user'";
                      $data = mysqli_query($con, $query);
                      $sn = 0;
                      while ($info = mysqli_fetch_array($data)) {
                        $sn++;
                        $file = $info['file'];
                      ?>
                        <tbody>
                          <tr>
                            <td><?php print($sn); ?></td>
                            <?php
                            $coursename = mysqli_fetch_array(mysqli_query($con, "select * from upload where titleid='{$info['course']}'"));
                            ?>
                            <td><?php print(strtoupper($info['username'])); ?></td>
                            <td><?php print(ucwords($coursename['title'])); ?></td>
                            <td><?php print($info['date']); ?></td>
                            <td> <?php
                                  $filename = $file;
                                  $down = '<a href="../tasks/download.php?token=' . $filename . '" role="button" name="downl" class="btn btn-success">Download</a>';
                                  echo $down;
                                  ?>
                            </td>
                          <?php } ?>
                          </tr>
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }

        ?>

        <div class="card-footer small text-muted"></div>
      </div>
      <?php
      include('../include/foot.php');
      ?>