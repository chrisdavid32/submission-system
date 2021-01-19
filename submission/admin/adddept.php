 <?php
 if (isset($_POST['submit'])) {
  $dept = $_POST['dept'];
  $school = $_POST['school'];
  if (empty($dept) || empty($school)) {
   echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                             Empty Field detected!
                              </div>';
  } else {
   $sql = "select count(*) as total from course where course_name='$dept'";
   $check = mysqli_query($con, $sql);
   $result = mysqli_fetch_assoc($check);
   if ($result['total'] > 0) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              The Department &nbsp; <strong>' . strtoupper($dept) . '</strong>, Already Exist!!!
                              </div>';
   } else {
    $st = rand(50, 5000) * time();
    $courseid = "D" . sprintf("%0.4s", $st);
    $qyy = "insert into course(course_id,course_name,faculty) values ('$courseid', '$dept', '$school')";
    $isc = mysqli_query($con, $qyy);
    if ($isc) {
     echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              <strong>' . strtoupper($dept) . '</strong> &nbsp;Added Successfully
                              </div>';
    } else {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Registration Fail..
                              </div>';
    }
   }
  }
 }
 ?>