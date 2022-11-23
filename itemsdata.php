<?php 
include "config.php";
$address=$_POST['address'];
$type=$_POST['type'];
$NFT_ids=$_POST['NFT_ids'];
//  echo $NFT_ids;

if($type=='owned'){
    // $array=array();
    
    // foreach ($NFT_ids as $obj) {
    //     array_push($array,$obj->property);
    // }
    //  $newArray = array();
    //  $count=count($array);
    // for($i=0;$i<$count;$i++){
    //     $query = "SELECT * FROM `NFT_info` WHERE  NFT_id='$array[$i]' ORDER BY ID DESC";
    //     // echo $query;
    //     $result=$link->query($query);
    //     while($row = mysqli_fetch_assoc($result))
    //     {array_push($newArray ,$row);} 
    // }
    //     echo json_encode($newArray);
    
    $query = "SELECT * FROM `NFT_info` WHERE  NFT_owner_address='$address' ORDER BY ID DESC";
     $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
}
if($type=='created'){
     $query = "SELECT * FROM `NFT_info` WHERE  NFT_creator_add='$address' ORDER BY ID DESC";
     $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
}
if($type=='Sale'){
     $query = "SELECT * FROM `NFT_info` WHERE  NFT_owner_address='$address' AND `NFT_resell`='on' ORDER BY ID DESC";
     $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
    
}
if($type=='activity'){
    $query = "SELECT * FROM `Nft_activity` WHERE  `Address`='$address' ORDER BY ID DESC";
    $result=$link->query($query);
    $newArray = array();
    $newArray2 = array();
    $newArray3 = array();
    while($row = mysqli_fetch_assoc($result))
    {   
        $data=mysqli_query($link,"SELECT NFT_payment FROM `NFT_info` WHERE  NFT_id='".$row['Nft_id']."'");
        $rownew=mysqli_fetch_assoc($data);
        
        array_push($newArray ,$row);
        array_push($newArray2 ,$rownew);
     
    } 
    array_push($newArray3,$newArray);
    array_push($newArray3,$newArray2);
    echo json_encode($newArray3);
}
if($type=='accpect'){
    $query = "SELECT * FROM `NFT_onlybid` WHERE  `NFT_bidder`='$address' AND Accept_offer=1 ORDER BY ID DESC";
    $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
}
if($type=='receive'){
    $query = "SELECT * FROM `NFT_onlybid` WHERE  `owner_address`='$address' AND Accept_offer=0 ORDER BY ID DESC";
    $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
}
if($type=='collections'){
     $query = "SELECT * FROM `nft_collections` WHERE `Address`='$address' ORDER BY id DESC";
     $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
}
if($type== 'userdetails'){
    $query= "SELECT * FROM nft_user Where Useraddress='$address'";
    $result=$link->query($query);
    $newArray = array();
    while($row = mysqli_fetch_assoc($result))
    {array_push($newArray ,$row);
     
    } 
    echo json_encode($newArray);
}

?>