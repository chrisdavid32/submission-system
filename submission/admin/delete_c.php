<?php
session_start();
include('../include/config.php');
is_admin();
if (isset($_GET['id'])) {
	$title = $_GET['id'];
	$sqlquery = mysqli_fetch_array(mysqli_query($con, "select * from upload where id='$title'"));
	$det = $sqlquery['titleid'];
	$ft = mysqli_query($con, "delete from upload where id='$title' ");
	$ftt = mysqli_query($con, "delete from allocate where course_name='$det' ");
	if ($ft) {
		echo ' <div class="alert alert-success alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-times (alias)"></i></span>
		                      </button>
		                         Allocation Removed Successfully
		                          </div>';
		header('location:course.php');
	} else {
		echo ' <div class="alert alert-warning alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                        Fail to delete
		                          </div>';
	}
}
