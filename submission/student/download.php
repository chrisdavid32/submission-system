<?php
//session_start();
ob_start();
include('../include/config.php');
is_student();
$id=$user;

$file = $_REQUEST['token'];
if(file_exists($file)){
    header('content-disposition:attachment;filename="'.basename($file).'"');
    
    header('content-Length: ' .filesize($file));
    readfile($file);
    $sub =filesize($file);
    
    exit;
}
