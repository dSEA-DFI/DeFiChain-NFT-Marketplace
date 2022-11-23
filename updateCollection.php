<?php 
include "config.php";

$Displayname=$_POST['Displayname'];
$symbol=$_POST['symbol'];
$discription=$_POST['discription'];
$url=$_POST['url'];
$id=$_POST['id'];

    $valid_extension = array('jpeg','jpg','png', 'gif','mp4','jfif');
    $path = "./uploads/";
    
    $img = $_FILES['tokenImage']['name'];
    $tmp = $_FILES['tokenImage']['tmp_name'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    $final_image = rand(1000, 1000000) . $img;
    
    if($img){
        if (in_array($ext, $valid_extension))
    {
    
        $path = $path.strtolower($final_image);
    
        if (move_uploaded_file($tmp, $path))
        {
            
            $path = "uploads/" . strtolower($final_image);
            
            
                   $query="UPDATE `nft_collections` SET `collection_symbol`='".$symbol."',`collection_name`='".$Displayname."',`collection_logo`='".$path."',`collection_description`='".$discription."',`url`='".$url."' WHERE id='".$id."'";
                   $data=mysqli_query($link,$query);
                        if($data){
                            
                            echo "1";
            
                        }else{
                            echo $query;
                            echo "failed";
                        }
                    
             
           
        }
    }
    }else{
        $updatesql="UPDATE `nft_collections` SET `collection_symbol`='".$symbol."',`collection_name`='".$Displayname."',`collection_description`='".$discription."',`url`='".$url."' WHERE id='".$id."'";
        $dataupate=mysqli_query($link,$updatesql);
        if($dataupate){
            echo "1";
        }else{
            echo "failed";
        }
    }
    


?>