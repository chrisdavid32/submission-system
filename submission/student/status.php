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
      <li class="nav-item active">
        <a class="nav-link" href="status.php">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Status</span></a>
      </li>
      <li class="nav-item">
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
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>S/N</th>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Date Submitted</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <?php
                    $sql = "select * from submission where username='$user' order by id ASC";
                    $query = mysqli_query($con, $sql);
                    $sn = 0;
                    while ($data = mysqli_fetch_array($query)) {
                      $sn++;
                    ?>
                      <tbody>
                        <?php
                        $course = mysqli_fetch_array(mysqli_query($con, "select * from upload where titleid='{$data['course']}'"));
                        ?>
                        <tr>
                          <td><?php print($sn); ?></td>
                          <td><?php print(ucwords($course['title']));  ?></td>
                          <td><?php print(strtoupper($course['code']));  ?></td>
                          <td><?php echo ($data['date']);  ?></td>
                          <td style="color: green;">Success</td>
                        </tr>
                      </tbody>
                    <?php
                    }
                    ?>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
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