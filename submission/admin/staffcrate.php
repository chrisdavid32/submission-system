 <?php
 if (isset($_POST['save'])) {
  $tit = $_POST['tit'];
  $staffid = $_POST['staffid'];
  $lastname = $_POST['surname'];
  $othername = $_POST['othername'];
  $dept = $_POST['dept'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  if (empty($staffid) || empty($tit) || empty($lastname) || empty($othername) || empty($dept) || empty($email) || empty($phone)) {
   echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Empty fields detected
                              </div>';
  } else {
   $sql = "select count(*) as total from staff where staff_id='$staffid'";
   $check = mysqli_query($con, $sql);
   $result = mysqli_fetch_assoc($check);
   if ($result['total'] > 0) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Staff with the ID <strong> ' . strtoupper($staffid) . ' </strong> ,Already exist in our Database!!!
                              </div>';
   } else {
    $hashed_password = password_hash($staffid, PASSWORD_DEFAULT);
    $qry = "insert into staff(tit,staff_id,last_name,other_name,department,email,phone)values('$tit','$staffid', '$lastname', '$othername', '$dept', '$email', '$phone')";
    $qyy = "insert into login(username,password,usertype,page)values('$staffid', '$hashed_password', '3', 'lecturer')";
    $ty = mysqli_query($con, $qry);
    $sv = mysqli_query($con, $qyy);
    if ($sv) {
     echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Lecturer Added Successfully.<br/>
                                Your userid:: &nbsp; ' . $staffid . '<br/> 
                              password:: &nbsp;&nbsp; ' . $staffid . '<br/>
                               <a href="index.php">
                                <button>ok</button>
                               </a>

                              </div>';
    } elseif ($ty) {
     echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Lecturer Added Successfully.<br/>
                               Your userid:: &nbsp; ' . $staffid . '<br/> 
                               password:: &nbsp;&nbsp; ' . $staffid . '<br/>
                               <a href="index.php">
                                <button>ok</button>
                               </a>

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