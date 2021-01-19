<?php

session_start();
include('../include/config.php');
is_admin();
if (isset($_GET['id'])) {
	$title = $_GET['id'];
	$sqlquery = mysqli_fetch_array(mysqli_query($con, "select * from allocate where id='$title'"));
	$det = $sqlquery['course_name'];
	$ft = mysqli_query($con, "delete from allocate where id='$title' ");
	$sql = "update upload set status='not_allocated' where titleid='$det'";
	$ty2 = mysqli_query($con, $sql);
	if ($ft) {
		echo ' <div class="alert alert-success alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                         Allocation Removed Successfully
		                          </div>';
		header('location:view_allocate.php');
	} elseif ($ty2) {
		echo ' <div class="alert alert-success alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                          Allocation Removed Successfully
		                          </div>';
		header('location:view_allocate.php');
	} else {
		echo ' <div class="alert alert-warning alert-dismissible" role="alert">
		                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                      <span aria-hidden="true"><i class="fa fa-close (alias)"></i></span>
		                      </button>
		                        Fail to delete
		                          </div>';
	}
}
