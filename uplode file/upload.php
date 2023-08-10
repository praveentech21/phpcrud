<?php

    if(isset($_POST['submit']) && isset($_FILES['file'])){

        $image_name=$_FILES['file']['name'];
        $image_tempname=$_FILES['file']['tmp_name'];
        $image_error=$_FILES['file']['error'];
        if($image_error === 0){
                $image_extension=pathinfo($image_name,PATHINFO_EXTENSION);
                $image_extension=strtolower($image_extension);
                $all_Img_ext = array('jpg','png','jpeg');
                if(in_array($image_extension,$all_Img_ext)){
                    $image_new_name=uniqid('IMG-',true).'.'.$image_extension;
                    $image_uplode_path = 'Upload/'.$image_new_name;
                    move_uploaded_file($image_tempname,$image_uplode_path);
                }   
                else{
                    echo "You have uploding wrong type data";
                    header("location:index.php");
                }
        }
        else{
            echo "Unknow Error Occured";
            header("location:index.php");
        }

    }

?>


