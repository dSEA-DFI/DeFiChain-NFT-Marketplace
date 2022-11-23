<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "config.php";

$NFT_id = $_POST['tokenid'];
$bid = $_POST['bid'];
$bidder_Address = $_POST['bidder_Address'];
$NFT_name = $_POST['NFT_name'];
$NFT_image = $_POST['NFT_image'];
$NFT_paymentcurrency = $_POST['NFT_paymenCurrency'];
$NFT_payment = $_POST['payment'];
date_default_timezone_set("Asia/Kolkata");
$date= date("Y-m-d h:i:s");



$query="SELECT `Username`, `Userimage`,`Useremail` FROM `nft_user` WHERE Useraddress='$bidder_Address' ";
$data=mysqli_query($link,$query);
$result=mysqli_fetch_assoc($data);
$usermail=$result['Useremail'];
if($usermail==''){
        echo json_encode(array("message" => " Sorry! Your Profile Is Not Complete, Please Update Your Email Address", "code" => 400));
    }else{

        $Useremail=$result['Useremail'];
        $biddername=$result['Username'];
        $image=$result['Userimage']; 
        
        $sql1="SELECT `NFT_bid` FROM `NFT_bid` WHERE NFT_id=$NFT_id And NFT_bid=$bid";
        $data2 = mysqli_query($link,$sql1);
        (json_encode($data2->fetch_assoc()));
        
        if($data2->num_rows==0)
        {
             
            $sql3="SELECT `NFT_bid` FROM `NFT_bid` WHERE NFT_id=$NFT_id And NFT_bid=$bid AND NFT_bidder='{$bidder_Address}'";
            $data3 = mysqli_query($link,$sql3);
            (json_encode($data3->fetch_assoc()));
            if($data3->num_rows==0)
            {
                
                $sql="INSERT INTO `NFT_bid`(`NFT_id`, `NFT_name`, `NFT_image`, `NFT_bid`, `NFT_bidder`,`Date`,`NFT_paymenCurrency`,`payment`) VALUES ('{$NFT_id}','{$NFT_name}','{$NFT_image}','{$bid}','{$bidder_Address}','{$date}','{$NFT_paymentcurrency}','{$NFT_payment}')";
                $data = mysqli_query($link,$sql);
                if($data){
                $sql1 = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`) 
                VALUES ( '$NFT_name', '$NFT_image', 'Bid', '$date', '$bidder_Address', '$NFT_id', '$bid')";
                $data = mysqli_query($link, $sql1);
                $heighestBidder=mysqli_query($link,"SELECT NFT_highest_bid FROM NFT_info WHERE NFT_id='$NFT_id'");  
                $rowheighestBidder=mysqli_fetch_assoc($heighestBidder);
                $highBid=$rowheighestBidder['NFT_highest_bid'];
                if($highBid<$bid){
                    $updateQuery=mysqli_query($link,"UPDATE `NFT_info` SET `NFT_highest_bid`=$bid,`NFT_highest_bidder`='{$bidder_Address}' WHERE `NFT_id`='{$NFT_id}'");
                    echo json_encode(array("message" => "Congratulations! Bid Submit Successfully And You Are the highest Bidder", "code" => 200));
                }else{
                    
                  echo json_encode(array("message" => "Congratulations! Bid Submit Successfully", "code" => 200));
                }
                }else{
                    echo json_encode(array("message" => " Sorry! Something Wrong With Bid", "code" => 400,"query" => $sql));
                }
              }
              else{
                  
                  echo json_encode(array("message" => " Sorry! Your Bid is already Submit At This Amount Please Try Higher Amount", "code" => 400));
              }
        }
        else
        {
            echo json_encode(array("message" => " Sorry! This The Bid is already Submit At This Amount Please Try Higher Amount", "code" => 400));
        }
}

?>

