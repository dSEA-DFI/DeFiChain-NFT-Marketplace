<?php 
include "config.php";
$payment=$_POST['payment'];
$currency=$_POST['currency'];
$price=$_POST['price'];
$auction=$_POST['auction'];
$type=$_POST['type'];
$NFT_id=$_POST['id'];
$account=$_POST['account'];
$sale=$_POST['sale'];

if($type==0){
    $query="UPDATE `NFT_info` SET `NFT_price`='".$price."',`NFT_resell`='".$sale."',`NFT_auction`=0,`NFT_auction_time`=0,`NFT_payment`='".$payment."',
    `NFT_paymentcurrency`='".$currency."',`NFT_highest_bid`=0,`NFT_highest_bidder`='".$account."',`Type`=$type,`email_send`=0 WHERE NFT_id='$NFT_id'";
    $data=mysqli_query($link,$query);
     if ($data) {

                    echo json_encode(array("message" => "Item was Updated.", "code" => 200));
                } else {

                    echo json_encode(array("message" => "Unable to Update item.", "code" => 400));
                }
}else if($type==1){
    $query="UPDATE `NFT_info` SET `NFT_price`=0,`NFT_resell`='".$sale."',`NFT_auction`=$auction,`NFT_auction_time`=$auction,`NFT_payment`='".$payment."',
    `NFT_paymentcurrency`='".$currency."',`NFT_highest_bid`='".$price."',`NFT_highest_bidder`='".$account."',`Type`=$type,`email_send`=0 WHERE NFT_id='$NFT_id'";
    $data=mysqli_query($link,$query);
     if ($data) {

                    echo json_encode(array("message" => "Item was Updated.", "code" => 200));
                } else {

                    echo json_encode(array("message" => "Unable to Updated item.", "code" => 400));
                }
}else{
    $query="UPDATE `NFT_info` SET `NFT_price`='".$price."',`NFT_resell`='".$sale."',`NFT_auction`=$auction,`NFT_auction_time`=$auction,`NFT_payment`='".$payment."',
    `NFT_paymentcurrency`='".$currency."',`NFT_highest_bid`='".$price."',`NFT_highest_bidder`='".$account."',`Type`=$type,`email_send`=0 WHERE NFT_id='$NFT_id'";
    $data=mysqli_query($link,$query);
     if ($data) {

                    echo json_encode(array("message" => "Item was Updated.", "code" => 200));
                } else {

                    echo json_encode(array("message" => "Unable to Updated item.", "code" => 400));
                }
}
?>