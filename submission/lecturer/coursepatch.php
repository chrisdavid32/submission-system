<?php
$id = $_GET['id'];
$query = mysqli_query($con, "select * from assignment where id='$id'");
$data = mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
 $due_date = $_POST['due_date'];
 $due_time = $_POST['due_time'];
 if (empty($due_date) || empty($due_time)) {
  echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                              A field values is empty.
                              </div>';
 } else {
  $time = date("H:i");
  $date = date("Y-m-d");
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
   // echo "done";
   $sql = "update assignment set date='$due_date', time='$due_time' where id='$id'";
   $check = mysqli_query($con, $sql);
   if ($check) {
    echo ' <div class="alert alert-success alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                           Submission detail Updated successfully.
                              </div>';
    header("Refresh:1, url=file.php");
   } else {
    echo ' <div class="alert alert-danger alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
                          </button>
                           fail to update!
                              </div>';
   }
  }
 }
}
