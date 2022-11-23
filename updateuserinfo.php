
<?php
include "./config.php";

$valid_extensions = array('jpeg','jpg','png','gif','mp4', 'mp3' ,'jfif','aac','mpeg'); // valid extensions
$path = 'uploads/';
$img = $_FILES['tokenimage']['name'];
$tmp = $_FILES['tokenimage']['tmp_name'];
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$final_image = rand(1000, 1000000) . $img;

$img2 = $_FILES['tokenimage1']['name'];
$tmp2 = $_FILES['tokenimage1']['tmp_name'];
$ext2 = strtolower(pathinfo($img2, PATHINFO_EXTENSION));
$final_image2 = rand(1000, 1000000) . $img2;

if($img=='' && $img2!=''){
    if (in_array($ext2, $valid_extensions)){
    $path2 = "uploads/" . strtolower($final_image2);
    move_uploaded_file($tmp2, $path2);
    $sql="UPDATE `nft_user` SET `coverphoto`='".$path2."' WHERE `Useraddress`='".$_POST['address']."'"; 
    $data = mysqli_query($link,$sql);
    }else{
    echo "invalid banner";
    }     
}
if($img!='' && $img2==''){
    if (in_array($ext, $valid_extensions)){
    $path = "uploads/" . strtolower($final_image);
    move_uploaded_file($tmp, $path);
    $sql="UPDATE `nft_user` SET `Userimage`='".$path."' WHERE `Useraddress`='".$_POST['address']."'"; 
    $data = mysqli_query($link,$sql);
    }else{
    echo "invalid image ";
    }   
}
if($img!='' && $img2!=''){
    if (in_array($ext, $valid_extensions)){
        if (in_array($ext2, $valid_extensions)){
    
            $path = "uploads/" . strtolower($final_image);
            $path2 = "uploads/" . strtolower($final_image2);
            move_uploaded_file($tmp, $path);
            move_uploaded_file($tmp2, $path2);
            
            $sql="UPDATE `nft_user` SET `Userimage`='".$path."',`coverphoto`='".$path2."' WHERE `Useraddress`='".$_POST['address']."'"; 
            $data = mysqli_query($link,$sql);
            if ($data){
                echo "Success";
            }else{
                echo "failed";
            }

        }else{
            echo "invalid ";
        }
        
    }else{
    echo "invalid banner";
}
   
}

$sql="UPDATE `nft_user` SET `Username`='".$_POST['Username']."',  `Useremail`='".$_POST['Email']."', `Userbio`='".$_POST['Bio']."',`Userinstaname`='".$_POST['Instagram']."', `Usertwitname`='".$_POST['Twitter']."'  WHERE `Useraddress`='".$_POST['address']."'"; 

$data = mysqli_query($link,$sql);
    

    if ($data){
        echo "Success";
    }else{
        echo "failed";
    }



?>










