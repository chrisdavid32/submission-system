<?php
$GLOBALS['con'] = mysqli_connect("localhost", "root", "", "elearning");
$GLOBALS['date'] = date(" dS  F Y ");

if (isset($_SESSION['userid']) || isset($_SESSION['role'])) {
 $GLOBALS['user'] = $_SESSION['userid'];
 $GLOBALS['roleID'] = $_SESSION['role'];
}

function is_student()
{
 if (empty($GLOBALS['user']) || empty($GLOBALS['roleID'])) {
  header("location:../index.php");
 } elseif ($GLOBALS['roleID'] != 1) {
  header("location:../index.php");
 } else {
  $GLOBALS['user'] = $_SESSION['userid'];
 }
}

function is_admin()
{
 if (empty($GLOBALS['user']) || empty($GLOBALS['roleID'])) {
  header("location:../index.php");
 } elseif ($GLOBALS['roleID'] != 2) {
  header("location:../index.php");
 } else {
  $GLOBALS['user'] = $_SESSION['userid'];
 }
}

function is_lecturer()
{
 if (empty($GLOBALS['user']) || empty($GLOBALS['roleID'])) {
  header("location:../index.php");
 } elseif ($GLOBALS['roleID'] != 3) {
  header("location:../index.php");
 } else {
  $GLOBALS['user'] = $_SESSION['userid'];
 }
}

$GLOBALS['date'] = date("l dS  F Y h:i:s a");
