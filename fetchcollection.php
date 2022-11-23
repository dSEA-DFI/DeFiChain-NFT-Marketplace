<?php 

include "config.php";

$fetchowner=$_POST['owneraddfetch'];

$fetchdata="SELECT * from nft_collections Where Address='$fetchowner'";
$datafetch=mysqli_query($link,$fetchdata);

$newArray = array();
while($row = mysqli_fetch_assoc($datafetch))
{array_push($newArray ,$row);
 
}
echo json_encode($newArray);
   

?>
