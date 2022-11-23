<?php
include "config.php";
$nftid = $_POST['tokenid'];
$nftname = $_POST['tokenName'];
$nftprice = $_POST['tokenprice'];
$nftroyalities = $_POST['tokenroyal'];
$sell = $_POST['sell'];
$nftauction = $_POST['tokenauction'];
$nftowneradd = $_POST['tokenowneradd'];
$NFT_paymenCurrency = $_POST['NFT_paymenCurrency'];
$payment = $_POST['payment'];
$nftdesc = $_POST['tokendesc'];
$days = $_POST['days'];
$type = $_POST['type'];
$multistatus = $_POST['multistatus'];
$Categoryid = $_POST['category'];
$nftcollection = $_POST['collection'];
$endid = $_POST['endid'];
$property=$_POST['property'];
$propertyname=$_POST['propertyname'];

$arrayproperty= explode(",",$property);
$arrayname= explode(",",$propertyname);

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'mp4', 'mp3', 'jfif', 'aac', 'mpeg'); // valid extensions
$path = './uploads/';
$img = $_FILES['tokenImage']['name'];
$tmp = $_FILES['tokenImage']['tmp_name'];
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
$final_image = rand(1000, 1000000).".".$ext;

if (in_array($ext, $valid_extensions)) {
    $path = $path . strtolower($final_image);
    if (true) {
        if (move_uploaded_file($tmp, $path)) {
            $path = "uploads/" . strtolower($final_image);
            date_default_timezone_set("Asia/Kolkata");
            $date = date("Y-m-d h:i:s");
           

            // if(empty($res['NFT_name']) || (!empty($res['NFT_name'])&& $a!=$b)){

            if ($nftauction == '0') {
                $NFT_auction_time = 0;
                $sql = "INSERT INTO `NFT_info`( `NFT_name`, `NFT_price`, `NFT_royalties`, `NFT_resell`, `NFT_auction`, `NFT_auction_time`, `NFT_highest_bid`, `NFT_highest_bidder`, `NFT_owner_address`, `NFT_creator_add`, `NFT_discription`,`NFT_category`, `NFT_id`, `NFT_image`, `NFT_time`, `start_id`, `end_id`, `NFT_collection`,`Type`,`Multistatus`,`NFT_payment`,`NFT_paymentcurrency`)
                    VALUES ('$nftname', '$nftprice', '$nftroyalities', '$sell', '$nftauction', '$NFT_auction_time', '0', '0', '$nftowneradd', '$nftowneradd', '$nftdesc','$Categoryid', '$nftid', '$path', '$date', '$nftid', '$endid','$nftcollection', '$type','$multistatus','$payment','$NFT_paymenCurrency')";                    

                // echo $sql;
                $data = mysqli_query($link, $sql);
                $sql1 = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`) 
                VALUES ( '$nftname', '$path', 'Minted', '$date','$nftowneradd','$nftid','$nftprice')";
                $datanew = mysqli_query($link, $sql1);
                
                
                if ($data) {

                    echo json_encode(array("message" => "Item was created.", "code" => 200,"sql" => $sql1));
                    for($i=0;$i<sizeof($arrayproperty);$i++){
                        if(!empty($arrayproperty[$i])){
                           $sqlprop="INSERT INTO `NFT_properties`( `NFT_id`,`NFT_property`,`NFT_type`)VALUES ('$nftid', '$arrayproperty[$i]',  '$arrayname[$i]')";
                           $data1=mysqli_query($link, $sqlprop); 
                           if($data1){
                           }  
                        }
                      
                    }
                } else {

                    echo json_encode(array("message" => "Unable to create item.", "code" => 400,"sql" => $sql));
                }
            } else {
                $NFT_auction_time = $nftauction;

                $sql = "INSERT INTO `NFT_info`( `NFT_name`, `NFT_price`, `NFT_royalties`, `NFT_resell`, `NFT_auction`, `NFT_auction_time`, `NFT_highest_bid`, `NFT_highest_bidder`, `NFT_owner_address`, `NFT_creator_add`, `NFT_discription`,`NFT_category`, `NFT_id`, `NFT_image`, `NFT_time`, `start_id`, `end_id`, `NFT_collection`,`Type`,`Multistatus`,`NFT_payment`,`NFT_paymentcurrency`)
                    VALUES ('$nftname', '$nftprice', '$nftroyalities', '$sell', '$nftauction', '$NFT_auction_time',$nftprice, '$nftowneradd', '$nftowneradd', '$nftowneradd', '$nftdesc','$Categoryid', '$nftid', '$path', '$date', '$endid', '$endid','$nftcollection', '$type','$multistatus','$payment','$NFT_paymenCurrency')";                      
                    $data1 = mysqli_query($link, $sql);
                 
                $sql1 = "INSERT INTO `Nft_activity` ( `Nft_name`, `Nft_image`, `nft_type`, `Date`,`Address`,`Nft_id`,`Nft_price`) 
                VALUES ( '$nftname', '$path', 'Minted', '$date', '$nftowneradd', '$nftid', '$nftprice')";
                $data = mysqli_query($link, $sql1);
                if ($data1) {

                    echo json_encode(array("message" => " Auction Item was created.", "code" => 200,"sql" => $sql1));
                    for($i=0;$i<sizeof($arrayproperty);$i++){
                        if(!empty($arrayproperty[$i])){
                           $sqlprop="INSERT INTO `NFT_properties`( `NFT_id`,`NFT_property`,`NFT_type`)VALUES ('$nftid', '$arrayproperty[$i]',  '$arrayname[$i]')";
                           $data1=mysqli_query($link, $sqlprop); 
                           if($data1){
                           }  
                        }
                      
                    }
                } else {

                    echo json_encode(array("message" => " Unable to create Auction item.", "code" => 400));
                }
            }
            $js = array(
                "NFT_id" => $nftid,
                "NFT_name" => $nftname,
                "NFT_price" => $nftprice,
                "NFT_royalties" => $nftroyalities,
                "NFT_owner_address" => $nftowneradd,
                "NFT_creator_add" => $nftowneradd,
                "NFT_discription" => $nftdesc,
                "NFT_image" => "http://test.dsea.io/" . $path,
                "NFT_time" => $date
            );
            $a = 1;
            if ($a) {
                $pathnew = "./metadata/" . $nftid;
                $fp = fopen($pathnew, 'w');
                fwrite($fp, json_encode($js));
                fclose($fp);
                $ab = 1;
            }

            //   }else{
            //       echo "Exist";
            //   }
        }
    } else {
        echo 'not saved';
    }
} else {
    echo "invalid";
}
