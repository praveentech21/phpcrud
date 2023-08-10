<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<?php
$link=new mysqli('localhost','root','','learn');
$bak="select * from `basic`";
$ruu=mysqli_query($link,$bak);

?>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="form.php" class="text-light"> Add User</a></button>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Date Of Birth</th>
      <th scope="col">Email</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
    if($ruu){
      while($data=mysqli_fetch_assoc($ruu))
      {
        $name=$data['Name'];
        $Roll=$data['Roll_Number'];
        $phone=$data['Phone_Number'];
        $mail=$data['Email'];
        $dob=$data['Date_of_birth'];
        $pass=$data['Password'];
        $si=$data['S_NO'];
        echo' <tr>
      <td scope="row">'.$name.'</td>
      <td>'.$Roll.'</td>
      <td>'.$phone.'</td>
      <td>'.$dob.'</td>
      <td>'.$pass.'</td>
      <td>
      <button class="btn btn-primary"><a href="form.php?updid='.$si. '" class="text-light">Update</a></button>
      <button class="btn btn-danger"><a href="delete.php?delid='.$si.' "class="text-light">Delete</a></button>
      </td>
      </tr>
      ';
      }
    } 
   
    ?> 
  </tbody>
  
</table>
    </div>

</body>
</html>