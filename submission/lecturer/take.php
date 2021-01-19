 <?php
 if (isset($_POST['submit'])) {
  $course = $_POST['course'];
  $due_date = $_POST['due_date'];
  $due_time = $_POST['due_time'];
  if (empty($course) || empty($due_date) || empty($due_time)) {
   echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Some field are Empty check and try again..
                              </div>';
  } else {
   $time = date("H:i");
   $date = date("Y-m-d");
   // echo  $date;
   if ($due_date < $date) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                           Submission Date cannot be lessthan the Current Date..
                              </div>';
   } elseif ($due_date <= $date && $due_time < $time) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                           Submission Time cannot be lessthan the Current Time..
                              </div>';
   } else {
    // echo $due_date;
    $tj = rand(70, 900) * time();
    $docname = "ASM" . sprintf("%.2s", str_shuffle($tj));
    $note = $_FILES["file1"]["name"];
    $size = $_FILES["file1"]["size"];
    $temp = $_FILES["file1"]["tmp_name"];
    $location = "uploads/";
    $ext = strtolower(substr($note, strpos($note, ".") + 1));
    if ($ext != 'pdf' && $ext != 'docx') {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                   </button>
                   Invalid file format! The file must be either word or PDF)...
                   </div>';
    } elseif ($size > 3000000) {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                   </button>
                   file is too large it must file must not be greater than 3MB.
                   </div>';
    } else {
     $newUser = str_replace("/", "-", $docname);
     $tmp = explode(".", $_FILES["file1"]["name"]);
     $newfile = $newUser . '.' . end($tmp);
     $fileName = $newfile;
     move_uploaded_file($temp, '../' . $location . $newfile);
     $courseinfo = mysqli_fetch_array(mysqli_query($con, "select * from upload where titleid='$course'"));
     $dept = $courseinfo['dept'];
     $level = $courseinfo['level'];
     $title = $courseinfo['title'];
     // var_dump($course);

     $qyy = "insert into assignment(lecturer,department,level,course,title,file,date, time,status)values('$user', '$dept', '$level', '$course', '$title', '$fileName', '$due_date', '$due_time', 'not_view')";
     $ty = mysqli_query($con, $qyy);
     if ($ty) {
      echo ' <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                    </button>
                   Assignment uploaded Successfully. 
                    </div>';
     }
    }
   }
  }
 }
 ?>