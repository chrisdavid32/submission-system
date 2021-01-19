  <?php
  if (isset($_POST['submit'])) {
   $matric = $_POST['matric'];
   $lastname = $_POST['lastname'];
   $othername = $_POST['othername'];
   $email = $_POST['email'];
   $level = $_POST['level'];
   $dept = $_POST['department'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   if (empty($matric) || empty($lastname) || empty($othername) || empty($email) || empty($level) || empty($dept) || empty($password) || empty($cpassword)) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
		                      </button>
		                          Fill out all fields 
		                          </div>';
   } elseif ($password != $cpassword) {
    echo ' <div class="alert alert-warning alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          your password doesnot match!
		                          </div>';
   } else {
    $sql = "select count(*) as total from sigup where matric='$matric'";
    $check = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($check);
    if ($result['total'] > 0) {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Matric Number Already exist!!!
		                          </div>';
    } else {
     $sql3 = "select count(*) as total from sigup where email='$email'";
     $check3 = mysqli_query($con, $sql3);
     $result3 = mysqli_fetch_assoc($check3);
     if ($result3['total'] > 0) {
      echo ' <div class="alert alert-danger alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Email Already exist in Database!!!
		                          </div>';
     } else {
      //$page ="1";
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $qry = "insert into sigup(matric,last_name,other_name,email,department,level)values('$matric', '$lastname', '$othername', '$email', '$dept', '$level')";
      $qyy = "insert into login(username,password,usertype,page)values('$matric', '$hashed_password', '1', 'student')";
      $ty = mysqli_query($con, $qry);
      $sv = mysqli_query($con, $qyy);
      if ($sv) {
       echo ' <div class="alert alert-success alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Account Created Successfully. <a href="index.php">
		                           	<button>proceed to login</button>
		                           </a>

		                          </div>';
      } elseif ($ty) {
       echo ' <div class="alert alert-success alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Account Created Successfully. <a href="index.php">
		                           	<button>proceed to login</button>
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
  }

  ?>