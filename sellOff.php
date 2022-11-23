<?php 
include "config.php";

$query=mysqli_query($link,"UPDATE `NFT_info` SET `NFT_resell` = 'off' WHERE `NFT_info`.`NFT_id` = '".$_POST['id']."'");
if($query) echo json_encode(array("code"=>200,"message"=>"NFT Sell Off"));
else echo json_encode(array("code"=>400,"message"=>"Something Went Wrong! Please try again"));
?>