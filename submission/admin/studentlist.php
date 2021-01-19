<?php
session_start();
ob_start();
include('../include/config.php');
include('./external/header.php');
is_admin();
?>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
      <a href="index.php" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="staff.php" class="nav-link">
        <i class="nav-icon fas fa-user"></i>
        <p>
          Add Staff
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="department.php" class="nav-link">
        <i class="nav-icon fas fa-school"></i>
        <p>
          Add Department
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="course.php" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Add Course
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="allocate.php" class="nav-link">
        <i class="nav-icon fas fa-tasks"></i>
        <p>
          Course Allocation
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="view_allocate.php" class="nav-link">
        <i class="nav-icon fas fa-eye"></i>
        <p>
          View Allocation
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><strong>List Student</strong></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Matric No</th>
                    <th>FullName</th>
                    <th>Department</th>
                    <th>Level</th>
                  </tr>
                </thead>
                <?php

                $data = "select * from Sigup order by matric ASC";

                $qy = mysqli_query($con, $data);
                $sn = 0;
                while ($quy = mysqli_fetch_array($qy)) {
                  $sn++;
                ?>
                  <tbody>
                    <tr>
                      <td><?php print($sn); ?></td>
                      <?php
                      $cyn = mysqli_fetch_array(mysqli_query($con, "select * from course where course_id='{$quy['department']}'"));

                      ?>
                      <td><?php print ucwords(($quy['matric'])); ?></td>
                      <td><?php print (ucfirst($quy['last_name'])) . '&nbsp;' . (ucfirst($quy['other_name'])); ?></td>
                      <td><?php print strtoupper(($cyn['course_name'])); ?></td>
                      <td><?php print strtoupper(($quy['level'])); ?></td>
                    <?php } ?>
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>

    <!-- /.row -->
    <!-- /.container-fluid -->
  </section>
</div>

<?php
include('./external/footers.php');
?>