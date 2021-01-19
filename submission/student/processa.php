 <?php
 if (isset($_POST['submit'])) {
  $course = $_POST['course'];
  $subject = $_POST['subject'];
  // echo "$subject";
  if (empty($course) || empty($subject)) {
   echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
                          </button>
                              Some field are Empty check and try again..
                              </div>';
  } else {
   $sql = "select count(*) as total from submission where course = '$course' and username='$user'";
   $data = mysqli_query($con, $sql);
   $result = mysqli_fetch_array($data);
   if ($result['total'] > 0) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
                          </button>
                              You have already submitted Assignment for this course. check status for comfirmation if not contact the course lecturer.
                              </div>';
   } else {
    $tj = rand(70, 900) * time();
    $docname = "ASS" . sprintf("%.4s", str_shuffle($tj));
    $note = $_FILES["file1"]["name"];
    $size = $_FILES["file1"]["size"];
    $temp = $_FILES["file1"]["tmp_name"];
    $location = "tasks/";
    $ext = strtolower(substr($note, strpos($note, ".") + 1));
    if ($ext != 'pdf' && $ext != 'docx') {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
                   </button>
                   Invalid file format! The file must be either Docx or PDF)...
                   </div>';
    } elseif ($size > 3000000) {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
                   </button>
                   file is too large. File must not be greater than 3MB.
                   </div>';
    } else {
     $newUser = str_replace("/", "-", $docname);
     $tmp = explode(".", $_FILES["file1"]["name"]);
     $newfile = $newUser . '.' . end($tmp);
     $fileName = $newfile;
     move_uploaded_file($temp, '../' . $location . $newfile);
     $staf = mysqli_fetch_array(mysqli_query($con, "select * from allocate where course_name='$course'"));
     $coursedetail = $staf['allocate_to'];
     $ins = "insert into submission(username,course,file,lecturer,date)values('$user', '$course', '$fileName', '$coursedetail', '$date')";
     $ty = mysqli_query($con, $ins);
     if ($ty) {
      echo ' <div class="alert alert-success alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
                   </button>
                   Assignment submitted successfully
                   </div>';
     } else {
      echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
                   </button>
                   submission fail.
                   </div>';
     }
    }
   }
  }
 }
 ?>