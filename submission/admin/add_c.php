 <?php
    if (isset($_POST['submit'])) {
        $dept = $_POST['dept'];
        $level = $_POST['level'];
        $title = $_POST['title'];
        $code = $_POST['code'];
        if (empty($dept) || empty($level) || empty($title) || empty($code)) {
            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Empty Field Detacted 
                              </div>';
        } else {
            $sql = "select count(*) as total from upload where title='$title' and dept='$dept'";
            $check = mysqli_query($con, $sql);
            $result = mysqli_fetch_assoc($check);
            $getDept = mysqli_fetch_assoc(mysqli_query($con, "select * from course where course_id='$dept'"));
            //echo $getDept['course_name'];
            $newdept = $getDept['course_name'];
            if ($result['total'] > 0) {
                echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Course already exist with thesame Course Title in <strong> ' . ucwords($newdept) . ' </strong> Department !!!
                              </div>';
            } else {
                $sql2 = "select count(*) as total from upload where dept='$dept' and code='$code'";
                $check2 = mysqli_query($con, $sql2);
                $result2 = mysqli_fetch_assoc($check2);
                if ($result2['total'] > 0) {
                    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Coure Code already exist for the department check and try again!!!
                              </div>';
                } else {
                    $sqt =  "select count(*) as total from upload where dept='$dept' and level='$level' and code='$code'";
                    $cht = mysqli_query($con, $sqt);
                    $rut = mysqli_fetch_assoc($cht);
                    if ($rut['total'] > 0) {
                        echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              The Coure Code is already attach to a course of thesame level!!!
                              </div>';
                    } else {
                        $st = rand(50, 5000) * time();
                        $courseid = "CD" . sprintf("%0.4s", $st);
                        $qry = "insert into upload(dept,level,titleid,title,code,status)values('$dept', '$level', '$courseid', '$title', '$code', 'not_allocated')";
                        $st = mysqli_query($con, $qry);
                        if ($st) {
                            echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              course added successfully. 
                                </div>';
                        } else {
                            echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                             Course Registration Fail..
                              </div>';
                        }
                    }
                }
            }
        }
    }
    ?>