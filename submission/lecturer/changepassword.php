 <?php
 if (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $comfirm_password = $_POST['comfirm_password'];
  if (empty($password) || empty($comfirm_password)) {
   echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Some field are Empty check and try again..
                              </div>';
  } else {
   if ($password != $comfirm_password) {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Password Mismatch!!!
                              </div>';
   } else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    //var_dump($hashed_password);
    $sql = "update login set password='$hashed_password' where username='$user'";
    $query = mysqli_query($con, $sql);
    if ($query) {
     echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Password Updated Successfully.
                              </div>';
    } else {
     echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              Password Fail!!!
                              </div>';
    }
   }
  }
 }
 ?>