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
    <a class="navbar-brand" href="#">A&P Submission </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="assignment.php">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Assignment</span>
          </a>
        </li>
        <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="file.php">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">File Record</span>
          </a>
        </li>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
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

          <font style="color: white; font-size: 20px; font-weight:bold" class="mb-0 text-sm  font-weight-bold"></font>
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
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">List of Submitted file</li>
      </ol>
      <!-- Icon Cards-->

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
                    <th>Department</th>
                    <th>Level</th>
                    <th>Course</th>
                    <th>Final Submission Day</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                $time = date("H:i");
                $date = date("Y-m-d");
                $query = "select * from assignment where lecturer='$user' and date >= '$date' and time >= '$time'";
                $data = mysqli_query($con, $query);
                $sn = 0;
                while ($info = mysqli_fetch_array($data)) {
                  $sn++;
                ?>
                  <tbody>
                    <tr>
                      <td><?php print($sn); ?></td>
                      <?php $for = mysqli_fetch_array(mysqli_query($con, "select * from course where course_id='{$info['department']}'"));
                      $course = mysqli_fetch_array(mysqli_query($con, "select * from upload where titleid='{$info['course']}'"));
                      ?>
                      <td><?php print(ucwords($for['course_name'])); ?></td>
                      <td><?php print(strtoupper($info['level'])); ?></td>
                      <td><?php print(ucwords($course['title'])); ?></td>
                      <td><?php print($info['date'] . ' ' . $info['time']); ?></td>
                      <td><a href="edit.php?id=<?php print($info['id']); ?>" class="btn btn-success">Adjust Date</a>
                      </td>
                      <td><a href="delete.php?id=<?php print($info['id']); ?>" class="btn btn-danger">Cancel Assignemt</a>
                      </td>
                    <?php } ?>
                    </tr>
                  </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
      </div>
      <?php
      include('../include/foot.php');
      ?>