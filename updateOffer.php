<?php
include "config.php";
$id=$_POST['tokeind'];
$data=mysqli_query($link, "DELETE FROM `NFT_onlybid` WHERE `NFT_id`=$id");

?>