<?php 
include "config.php";
$add=$_POST['address'];
$user=mysqli_query($link, "SELECT * FROM `nft_user` WHERE `Useraddress`='$add'");
$newarray=array();
while($row=mysqli_fetch_assoc($user))
    
{
        array_push($newarray ,$row);        
    }
   
   echo json_encode($newarray);

?>