 <?php
  include('../include/config.php');
  if (isset($_POST['aa'])) {
    $a = $_POST['a'];
    $query = "SELECT * FROM upload WHERE dept = '$a' and status = 'not_allocated' ORDER BY `title` ASC";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
      $titleid = $row['titleid'];
      $title = $row['title'];
      $code = $row['code'];
  ?>
     <option value='<?php echo $titleid ?>'><?php echo ucwords($title) . '&nbsp; &nbsp;{' .
                                              strtoupper($code)  ?>}</option>
 <?php   };
  }
  ?>