<?php 
include "link.php";
if(isset($_GET['delid']))
{
    $see=$_GET['delid'];
    $ruu="delete from `basic` where `S_NO`=$see";
    $del=mysqli_query($link,$ruu)  or die(mysqli_error());
    
        header('location:detail.php') or die(mysqli_error());
}
?>      