<nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
 <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
  <i class="fa fa-bars"></i>
 </button>
 <?php
 $time = date("H:i");
 $date = date("Y-m-d");
 $sql = mysqli_query($con, "SELECT u.dept,u.level,u.titleid,u.title FROM upload u JOIN assignment a ON u.dept = a.department AND u.level = a.level AND u.titleid = a.course AND u.title = a.title AND a.date >= '$date' AND a.time >= '$time' AND a.status='not_view' JOIN sigup s ON a.department = s.department AND a.level = s.level WHERE s.matric = '$user'");
 $list = mysqli_num_rows($sql);
 ?>
 <ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown no-arrow mx-1">
   <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-envelope fa-fw"></i>
    <span class="badge badge-warning badge-counter"><?php print $list ?></span>
   </a>
   <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
    <h6 class="dropdown-header">
     Message Center
    </h6>
    <?php
    $sq = mysqli_query($con, "SELECT u.dept,u.level,u.titleid,u.title FROM upload u JOIN assignment a ON u.dept = a.department AND u.level = a.level AND u.titleid = a.course AND u.title = a.title AND a.date >= '$date' AND a.time >= '$time' AND a.status='not_view' JOIN sigup s ON a.department = s.department AND a.level = s.level WHERE s.matric = '$user'");
    $data = mysqli_fetch_assoc($sq);

    ?>
    <a class="dropdown-item d-flex align-items-center" href="assignment.php">
     <div class="dropdown-list-image mr-3">
     </div>
     <div class="font-weight-bold">
      <?php

      $time = date("H:i");
      $date = date("Y-m-d");
      if ($list < 1) {
       echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           </button>
                            No update in Todo.
                              </div>';
      } else {
       $sq = "SELECT u.dept,u.level,u.titleid,u.title FROM upload u JOIN assignment a ON u.dept = a.department AND u.level = a.level AND u.titleid = a.course AND u.title = a.title AND a.date >= '$date' AND a.time >= '$time' AND a.status='not_view' JOIN sigup s ON a.department = s.department AND a.level = s.level WHERE s.matric = '$user'";
       $query = mysqli_query($con, $sq);
       $sn = 0;
       while ($data = mysqli_fetch_array($query)) {
        $sn++;
      ?>
        <div class="text-truncate"><?php print $sn; ?>.&nbsp;&nbsp;&nbsp;<?php print(ucwords($data['title'])); ?> </div>
      <?php
       }
      }
      ?>

     </div>
    </a>
    <div class="dropdown-item text-center small text-gray-500">
    </div>
   </div>
  </li>
  <?php
  $sql = "select * from sigup where matric='$user'";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($query);
  ?>
  <div class="topbar-divider d-none d-sm-block"></div>
  <li class="nav-item dropdown no-arrow">
   <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="img-profile rounded-circle" src="img/boy.png" style="max-width: 60px">
    <span class="ml-2 d-none d-lg-inline text-white"><?php print(ucwords($result['last_name'] . ' ' . $result['other_name'])); ?></span>
   </a>
   <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="setting.php">
     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
     Profile
    </a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="../logout.php">
     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
     Logout
    </a>
   </div>
  </li>
 </ul>
</nav>