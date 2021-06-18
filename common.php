<?php
    $con = mysqli_connect("localhost","root","","todo")or die(mysqli_errormessage($con));
if(!isset($_SESSION)){
      session_start();
}
?>
