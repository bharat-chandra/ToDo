<?php
require("common.php");
$email = $_POST['email'];
$email = mysqli_real_escape_string($con, $email);
$password = $_POST['password'];
$password = mysqli_real_escape_string($con, $password);
$password = md5($password);

$query = "SELECT id, email FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
$num = mysqli_num_rows($result);

if ($num == 0) {
  $error = $$_GET['error'];
  $error = "<span class='red'>Enter Correct E-mail and Password Combination</span>";
  header('location: index.php?msg=please enter correct details if your account exist , or else create your account now');
} else {
  $row = mysqli_fetch_array($result);
  $_SESSION['email'] = $row['email'];
  $_SESSION['id'] = $row['id'];
  $user_id = $row['id'];
  header('location: index.php?id='.$user_id);
}
?>
