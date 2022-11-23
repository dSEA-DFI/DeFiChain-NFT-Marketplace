<?php

require "config.php";

$address = $_POST['address'];

$data = mysqli_query($link,"SELECT * FROM `nft_user` Where Useraddress='" . $address . "'");
$num_rows=mysqli_num_rows($data);
if ($num_rows) {
    $sell=mysqli_query($link,"SELECT COUNT(Address) as sell_count FROM `Nft_sell` WHERE Address='" . $address . "' GROUP BY Address");
    $row=mysqli_fetch_assoc($sell);
    $sell_count=$row['sell_count'];
    echo $sell_count;
} else {
    $query1 = "INSERT INTO `nft_user`( `Useraddress`) VALUES ('" . $address . "')";
    $data1 = $link->query($query1);
    echo 0;
}
