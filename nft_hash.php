<?php

include("config.php");
$NFT_id=$_POST['NFT_id'];
$NFt_hash=$_POST['hash'];
$NFt_work=$_POST['work'];
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d h:i:s");
$query="INSERT INTO `NFT_hash`( `NFT_id`, `hash`,`work` ,`time`) VALUES ('$NFT_id','$NFt_hash','$NFt_work','$date')";
$data=mysqli_query($link,$query);
if($data){
    mysqli_query($link, "UPDATE `nft_info` SET `status`=1 WHERE `NFT_id`='$NFT_id'");
}
else{
}
?>