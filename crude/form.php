<?php
$link=new mysqli('localhost','root','','learn');
if(!$link){echo "data base was not connected sucessfully";}
if(isset($_GET['updid']))
{ 
  $upd=$_GET['updid'];
  $ruu=mysqli_query($link,"select * from `basic` where s_No=$upd");
  if(!$ruu){ echo "mysqli query error" ;}
  $sen=mysqli_fetch_assoc($ruu) or die(mysqli_error());
  $na=$sen['name'];
  $roll=$sen['Roll_number'];
  $phone=$sen['Phone_number'];
  $dob=$sen['date_of_birth'];
  $email=$sen['email'];
  $pass=$sen['password'];
} 
if(isset($_POST['sub']))
{ 
  $na=$_POST['name'];
  $roll=$_POST['Roll'];
  $phone=$_POST['mobile'];
  $dob=$_POST['Dob'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  if(isset($_GET['updid'])){
    $upd=$_GET['updid'];
    echo "we are updating $upd";
    $run="UPDATE `basic` SET `Name`='$na',`Roll_Number`='$roll',`Phone_Number`='$phone',`Date_of_birth`='$dob',`Email`='$email',`Password`='$pass' WHERE s_no=$upd;";
// update `basic` set Name=`$na`,Roll_Number=`$roll`,Phone_Number=`$phone`,date_of_Birth=`$dob`,email=`$email`,password=`$pass` where S_NO=$upd

  }else{
  $run="insert into `basic` (`S_nO`,`name`,`Roll_Number`,`Phone_Number`,`date_of_Birth`,`Email`,`Password`) values('','$na','$roll','$phone','$dob','$email','$pass')";}
  $pas=mysqli_query($link,$run) or mysqli_error();
  if($pas){
    header('location:detail.php');
  }
}
?>  
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container my-5">
  <form method="post">
    
  <div class="form-group">
    <label >Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" placeholder="Enter Name" name="name" value=Name>
  </div>
  <div class="form-group">
    <label >Roll Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" placeholder="Enter Roll Number" name="Roll">
  </div>
  <div class="form-group">
    <label >Phone Number</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" name="mobile" placeholder="Enter Mobile Number">
  </div>
  <div class="form-group">
    <label >Date of Birth</label>
    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" placeholder="Date of Birth" name="Dob">
  </div>
  <div class="form-group">
    <label >Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="off" placeholder="Enter email">
  </div>  
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" name="password" placeholder="Enter password">
  </div>  
  <button type="submit" class="btn btn-primary" name="sub">Submit</button>
</form>
</div> 

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>