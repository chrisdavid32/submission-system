<?php
include('../include/config.php');
if (isset($_POST['aa'])) {
  $a = $_POST['a'];
  $query = "SELECT * FROM staff WHERE department = '$a' ORDER BY tit ASC";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {
    $staff_id = $row['staff_id'];
    $title = $row['tit'];
    $name = $row['last_name'];
    $other = $row['other_name'];
?>
    <option value='<?php echo $staff_id ?>'><?php echo ucwords($title) . '.&nbsp; ' .
                                              ucwords($name) . ' ' . ucwords($other) ?></option>
<?php };
}
?>