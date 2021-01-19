<?php
session_start();
include('../include/config.php');
is_lecturer();
if (isset($_GET['id'])) {
 $title = $_GET['id'];
 $ft = mysqli_query($con, "delete from assignment where id='$title' ");
 if ($ft) {
  echo ' <div class="alert alert-success alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
		                      </button>
		                         Allocation Removed Successfully
		                          </div>';
  header('location:file.php');
 } else {
  echo ' <div class="alert alert-warning alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                        Fail to delete
		                          </div>';
 }
}
