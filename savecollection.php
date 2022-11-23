<?php 
include "config.php";

$Displayname=$_POST['Displayname'];
$symbol=$_POST['symbol'];
$discription=$_POST['discription'];
$url=$_POST['url'];
$owneradd=$_POST['owneraddress'];

    $valid_extension = array('jpeg','jpg','png', 'gif','mp4','jfif');
    $path = "./uploads/";
    
    $img = $_FILES['tokenImage']['name'];
    $tmp = $_FILES['tokenImage']['tmp_name'];
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    $final_image = rand(1000, 1000000) . $img;
    
    
    if (in_array($ext, $valid_extension))
    {
    
        $path = $path.strtolower($final_image);
    
        if (true)
        {
            move_uploaded_file($tmp, $path);
            $path = "uploads/" . strtolower($final_image);
            
            $exist="SELECT * FROM nft_collections Where (collection_name like'%".$Displayname."%') ORDER BY ID DESC ";
            $dataexist=mysqli_query($link,$exist);
            
            if(mysqli_num_rows($dataexist) > 0){
                   echo "0";
                }else{
                   $query="INSERT INTO `nft_collections`( `collection_name`, `collection_logo`, `Address`,`collection_symbol`,`collection_description`,`url`) 
                   VALUES ('$Displayname','$path','$owneradd','$symbol','$discription','$url')";
                   $data=mysqli_query($link,$query);
                        if($data){
                            
                            echo "1";
            
                        }else{
                            echo $query;
                            echo "failed";
                        }
                    
                }
           
        }
    }


?>