<?php
include "config.php"; 
$NFT_id=$_POST['NFT_id'];

$query="DELETE FROM `NFT_info` WHERE NFT_id='$NFT_id'";
    $result =$link->query($query);
    if($result)
    {
        echo "DELETED";
    }
    else{
        echo "Not Deleted ";
    }
    
$query="DELETE FROM `nft_activity` WHERE Nft_id='$NFT_id'";
    $result =$link->query($query);
    if($result)
    {
        echo "DELETED";
    }
    else{
        echo "Not Deleted ";
    }
?>