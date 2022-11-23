<?php
include "config.php";

$price =$_POST['value'];
$owner=$_POST['buyerAddress'];
$ownerAddress=$_POST['sellerAddress'];
$NFT_image=$_POST["NFT_image"];
$NFT_name=$_POST["NFT_name"];
$id=$_POST['tokenid'];
$start_id=$_POST['start_id'];
$quantity=$_POST['quantity'];
$payment=$_POST['payment'];
$paymentCurrency=$_POST['paymentCurrency'];

// query for buyer information 
$query1 = "SELECT `Id`, `Username`,`Userimage` FROM `nft_user` WHERE Useraddress='{$owner}'";

$result1 = $link->query($query1);
$res=$result1->fetch_assoc();
$userimage= $res['Userimage'];
$OwnerName= $res['Username'];

// query fo seller information
$query2 = "SELECT `Id`, `Username`,`Userimage` FROM `nft_user` WHERE Useraddress='{$ownerAddress}'";
$result2 = $link->query($query2);
$res1=$result2->fetch_assoc();
$sellerimage= $res1['Userimage'];
$sellerName= $res1['Username'];

date_default_timezone_set("Asia/Kolkata");
$date=date("Y/m/d");

// query for buy tabel 
 
$databuy=mysqli_query($link,"select * from NFT_buy where NFT_id='{$id}' AND Address='{$owner}'");
if(mysqli_num_rows($databuy)==0)
{
    $query="INSERT INTO `NFT_buy`( `Username`, `image`,`Address`, `value`, `time`,`NFT_image`,`NFT_name`,`NFT_id`) 
    VALUES ('{$OwnerName}','{$userimage}','{$owner}','{$price}','{$date}','{$NFT_image}','{$NFT_name}','{$id}')";
    $result=mysqli_query($link,$query);
    if($result){
            $sqlnew = "INSERT INTO `Activity`( `address`, `type`, `nft_id`,`nft_image`,`nft_name`, `price`, `time`) VALUES ('$owner','Buy','$id','$NFT_image','$NFT_name','{$price}','$date')";
            $datanew = mysqli_query($link, $sqlnew);
    }
    else{
        echo "failed BUY ";
    }

}else{
    $buyRow=mysqli_fetch_assoc($databuy);
    $buyAmount=$buyRow['value']+$price;
    $buyUpdate=mysqli_query($link,"UPDATE `NFT_buy` SET `value`='$buyAmount' WHERE `Address`='{$owner}' AND `NFT_id`='{$id}'");
}

// query for sell tabel
$databuy=mysqli_query($link,"select * from Nft_sell where NFT_id='{$id}' AND Address='{$owner}'");
if(mysqli_num_rows($databuy)==0)
{
    $queryseller="INSERT INTO `Nft_sell`( `Username`, `image`,`Address`, `value`, `Time`,`Nft_image`,`NFT_name`,`nft_id`) VALUES ('{$OwnerName}','{$userimage}','{$ownerAddress}','{$price}','{$date}','{$NFT_image}','{$NFT_name}','{$id}')";
    $resultseller=mysqli_query($link,$queryseller);
    if($resultseller){
        $sqlnew = "INSERT INTO `Activity`( `address`, `type`, `nft_id`,`nft_image`,`nft_name`, `price`, `time`) VALUES ('$ownerAddress','Sell','$nftid','$NFT_image','$NFT_name',0,'$date')";
        $datanew = mysqli_query($link, $sqlnew);
    }
    else{
        echo "failed SEll";
    }
}else{
    $buyRow=mysqli_fetch_assoc($databuy);
    $buyAmount=$buyRow['value']+$price;
    $buyUpdate=mysqli_query($link,"UPDATE `Nft_sell` SET `value`='$buyAmount' WHERE `Address`='{$owner}' AND `NFT_id`='{$id}'");
}

//Query For Update Owner
$update="UPDATE NFT_info SET `start_id`=$start_id WHERE NFT_id='$id' ";
echo $update;
$dataupdate=mysqli_query($link,$update);

$end_id=($quantity+$id)-1;
$insertMulti="INSERT INTO `NFT_multi`(`NFT_id`, `owner_address`, `quantity`, `start_id`, `end_id`, `creator_address`, `NFT_image`, `NFT_name`, `time`, `payment`, `payment_currency`,`price`,`last_price`,`last_buy_currency`) 
VALUES ('$id','$owner','$quantity','$id','$end_id','$ownerAddress','{$NFT_image}','{$NFT_name}','$date','$payment','$paymentCurrency','{$price}','{$price}','$payment')";
echo $insertMulti;
$datainsert=mysqli_query($link,$insertMulti);

?>