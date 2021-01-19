<?php
$sql = mysqli_query($con, "select * from staff ");
$lec = mysqli_num_rows($sql);
$sql2 = mysqli_query($con, "select * from sigup ");
$student = mysqli_num_rows($sql2);

$sql3 = mysqli_query($con, "select * from course ");
$department = mysqli_num_rows($sql3);

$sql4 = mysqli_query($con, "select * from allocate ");
$allocate = mysqli_num_rows($sql4);
