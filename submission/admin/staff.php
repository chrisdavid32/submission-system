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
      <a href="staff.php" class="nav-link active">
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
          <h1 class="m-0"></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->

  <section class="content">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-8">
          <?php
          include('staffcrate.php');
          ?>
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Add Staffs</h3>
            </div>
            <form action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Staff ID Number</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="staffid">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <select class="form-control" name="tit">
                    <option value="">-Select Title-</option>
                    <option value="Prof">Prof</option>
                    <option value="Dr">Dr</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Staff Department</label>
                  <select class="form-control" name="dept">
                    <option value="">please select department</option>
                    <?php
                    $go = "select * from course order by course_name ASC";
                    $qy = mysqli_query($con, $go);
                    $sn = 0;
                    while ($quy = mysqli_fetch_assoc($qy)) {
                      $sn++; ?>
                      <option value="<?php print($quy['course_id']); ?>"><?php print ucwords($quy['course_name']); ?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Last Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="surname">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Other Name</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="othername">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name="save" class="btn btn-primary">Add Staff</button>
              </div>
          </div>
          <!-- /.card-body -->


          </form>
        </div>
      </div>
    </div>
</div>

<!-- /.row -->
<!-- /.container-fluid -->
</section>
</div>

<?php
include('./external/footer.php');
?>