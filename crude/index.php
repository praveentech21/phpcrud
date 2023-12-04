
<?php
    $con = new mysqli('localhost','root','','spellbee');
    if($con->connect_error){
        die("Connection failed: ".$con->connect_error);
    }
    else{
        echo "Connected successfully";
    }

    $data = mysqli_query($con,"select * from users");


?>
<!DOCTYPE html>
<html lang="en">    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Basic fom</title>
    </head>
    <body>
        <h1>Basic form</h1>
        <h2>Fill the form</h2>
        <table>
            <tbody>
                <tr>
                <td>Name</td>
            <td>ID</td>
            <td>Department</td>
                </tr>
            </tbody>
            <?php
             while($row = mysqli_fetch_assoc($data)){ ?>
                <tr>
                <td><?php echo $row['player_name'] ?></td>
            <td><?php echo $row['pid'] ?></td>
            <td><?php echo $row['department'] ?></td>
                </tr>


              <?php }
            ?>
        </table>
    </body>
</html>