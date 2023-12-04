<?php

session_start();
include 'connect.php';
if(isset($_POST['submit'])){
  $mobile = $_POST['mobile'];
  $pass = $_POST['pass'];
  $sql = "SELECT * FROM `users` WHERE `pid` = '$mobile' AND `points` = '$pass'";
  $resutls = mysqli_query($conn,$sql);
  if(mysqli_num_rows($resutls) > 0){
    $_SESSION['user'] = $mobile;
    header("location:index.php");
  }else{
    echo "<script>alert('Invalid Credentials')</script>";
  }
}


?>
