<?php
if(isset($_POST['regno'])){
    $regno = $_POST['regno'];
    $sql = "update users set status = '1' where regno = '$regno'";
    $resutls = mysqli_query($conn,$sql);
    if($resutls){
        echo json_encode(array("scussess"=>1));
    }
    else{
        echo json_encode(array("failed"=>0));
    }
}


?>