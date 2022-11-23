<?php
include "config.php";

$price =$_POST['value'];
$owner=$_POST['buyerAddress'];
$ownerAddress=$_POST['sellerAddress'];
$NFT_image=$_POST["NFT_image"];
$NFT_name=$_POST["NFT_name"];
$resell=$_POST["resell"];
$id=$_POST['tokenid'];
$collection=$_POST['collection'];
$currency = $_POST['currency'];

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
 
// $databuy=mysqli_query($link,"select * from NFT_buy where NFT_id='{$id}' AND Address='{$owner}'");
// if(mysqli_num_rows($databuy)==0)
// {
    $query="INSERT INTO `NFT_buy`( `Username`, `image`,`Address`, `value`, `time`,`NFT_image`,`NFT_name`,`NFT_id`,`collection`,`currency`) 
    VALUES ('{$OwnerName}','{$userimage}','{$owner}','{$price}','{$date}','{$NFT_image}','{$NFT_name}','{$id}','{$collection}','{$currency}')";
    $result=mysqli_query($link,$query);
    if($result){
            $sqlnew = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`) 
            VALUES ( '$NFT_name', '$NFT_image', 'Bought', '$date','$owner','$id','$price')";
            $datanew = mysqli_query($link, $sqlnew);
    }
    else{
        echo "failed BUY ";
    }

// }else{
//     $buyRow=mysqli_fetch_assoc($databuy);
//     $buyAmount=$buyRow['value']+$price;
//     $buyUpdate=mysqli_query($link,"UPDATE `NFT_buy` SET `value`='$buyAmount' WHERE `Address`='{$owner}' AND `NFT_id`='{$id}'");
// }

// query for sell tabel
// $databuy=mysqli_query($link,"select * from Nft_sell where NFT_id='{$id}' AND Address='{$owner}'");
// if(mysqli_num_rows($databuy)==0)
// {
    $queryseller="INSERT INTO `Nft_sell`( `Username`, `image`,`Address`, `value`, `Time`,`Nft_image`,`NFT_name`,`nft_id`,`collection`,`currency`)
    VALUES ('{$OwnerName}','{$userimage}','{$ownerAddress}','{$price}','{$date}','{$NFT_image}','{$NFT_name}','{$id}','{$collection}','{$currency}')";
    $resultseller=mysqli_query($link,$queryseller);
    if($resultseller){
        $sqlnew = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`) 
                VALUES ( '$NFT_name', '$NFT_image', 'Sold', '$date','$ownerAddress','$id','$price')";
        $datanew = mysqli_query($link, $sqlnew);
    }
    else{
        echo "failed SEll";
    }
// }else{
//     $buyRow=mysqli_fetch_assoc($databuy);
//     $buyAmount=$buyRow['value']+$price;
//     $buyUpdate=mysqli_query($link,"UPDATE `Nft_sell` SET `value`='$buyAmount' WHERE `Address`='{$owner}' AND `NFT_id`='{$id}'");
// }

//Query For Update Owner
$update="UPDATE NFT_info SET `NFT_owner_address`='$owner',`NFT_resell`='$resell',`last_price`='$price',`last_buy_currency`='$currency' WHERE NFT_id='$id' ";
$dataupdate=mysqli_query($link,$update);

?>