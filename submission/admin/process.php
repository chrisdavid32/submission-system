 <?php
    if (isset($_POST['save'])) {
        $dept = $_POST['dept'];
        $course = $_POST['course'];
        $staff = $_POST['staff'];
        $lecturer = $_POST['lecturer'];
        //print $lecturer;
        if (empty($dept) || empty($course) || empty($staff) || empty($lecturer)) {
            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Empty fields detected
                              </div>';
        } else {
            //print "done";
            $query = "select count(*) as total from allocate where course_name='$course'";
            $check = mysqli_query($con, $query);
            $result = mysqli_fetch_assoc($check);
            if ($result['total'] > 0) {
                echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Course already allocated!!!
                              </div>';
            } else {
                $sql = "insert into allocate(dept,course_name,lecturer,allocate_to)values('$dept', '$course', ' $staff', '$lecturer')";
                $sql2 = "update upload set status='allocate' where titleid='$course'";
                $ty = mysqli_query($con, $sql);
                $ty2 = mysqli_query($con, $sql2);
                if ($ty) {
                    echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Course Allocated successfully
                              </div>';
                } elseif ($ty2) {
                    echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Course Allocated successfully
                              </div>';
                } else {
                    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                             Allocation Fail..
                              </div>';
                }
            }
        }
    }
    ?>