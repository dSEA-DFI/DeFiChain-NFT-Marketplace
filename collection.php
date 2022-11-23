<?php include "header.php";?>
<style>
    .inner_one { 
        color: #fff;
        border-radius: 15px;
        padding: 15px;
    }

.count_sec {
    display: flex;
}
.top-author {
    justify-content: space-between;
}



</style>



<?php 

$NFT_collection=$_GET['collection'];
$data=mysqli_query($link,"SELECT * FROM `nft_collections` WHERE collection_name='".$NFT_collection."'");
$hotBids_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_collection='".$NFT_collection."'");
$tradeBNB=mysqli_query($link,"SELECT SUM(value) as value FROM `Nft_sell` WHERE collection='".$NFT_collection."' AND currency='BNB' GROUP BY collection");
$tradeBUSD=mysqli_query($link,"SELECT SUM(value) as value FROM `Nft_sell` WHERE collection='".$NFT_collection."' AND  currency='BUSD' GROUP BY collection");
$floorBNB=mysqli_query($link,"SELECT MIN(NFT_price) as price FROM `NFT_info` WHERE NFT_collection='".$NFT_collection."' AND NFT_payment='BNB' GROUP BY NFT_collection");
$floorBUSD=mysqli_query($link,"SELECT MIN(NFT_price) as price FROM `NFT_info` WHERE NFT_collection='".$NFT_collection."' AND NFT_payment='BUSD' GROUP BY NFT_collection");
$dataowner=mysqli_query($link,"SELECT NFT_owner_address FROM `NFT_info` where NFT_collection='".$NFT_collection."' GROUP BY NFT_owner_address");
$row=mysqli_fetch_assoc($data);
$traderBNB=mysqli_fetch_assoc($tradeBNB);
$traderBUSD=mysqli_fetch_assoc($tradeBUSD);
$floorPriceBNB=mysqli_fetch_assoc($floorBNB);
$floorPriceBUSD=mysqli_fetch_assoc($floorBUSD);
?>
<div class="collectible">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 data-aos="fade-up" data-aos-duration="2000"><?php echo $_GET['collection'];?></h2>
            </div>
        </div>
    </div>
</div>
<section class="product-details section-padding-100-70">
    <div class="container pro_inners">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="img-fluid rounded" src="<?php echo $row['collection_logo'];?>">
                    </div> 
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="product__details__text">
                    <h3>
                        <?php echo $row['collection_name'];?>
                    </h3>
                    <p> 
                        <?php echo $row['collection_description'];?>
                    </p>
                    <div class="py-3">
                         <div class="d-flex align-items-center top-author">
                             <h6 class="font-weight-normal m-0">Item Count : &nbsp;</h6>
                             <h6 class="font-weight-normal m-0"><?php echo mysqli_num_rows($hotBids_data)?></h6>
                         </div>
                    </div>
                    <div class="py-3">
                         <div class="d-flex align-items-center top-author">
                             <h6 class="font-weight-normal m-0">Owner Count : &nbsp;</h6>
                             <h6 class="font-weight-normal m-0"><?php echo mysqli_num_rows($dataowner)?></h6>
                         </div>
                    </div>
                    <div class="py-3">
                         <div class="d-flex align-items-center top-author" style="justify-content: space-between;">
                              <div class="count_sec">
                             <h6 class="font-weight-normal m-0">Total volume  &nbsp;</h6>
                             <h6 class="font-weight-normal m-0"><?php echo !empty($traderBNB['value'])?$traderBNB['value']:0;?> BNB</h6>
                         </div>
                          <div class="count_sec">
                             <h6 class="font-weight-normal m-0">Total volume &nbsp;</h6>
                             <h6 class="font-weight-normal m-0"><?php echo !empty($traderBUSD['value'])?$traderBUSD['value']:0;?> BUSD</h6>
                         </div>
                     </div>
                    </div>
                    <div class="py-3">
                         <div class="d-flex align-items-center top-author" style="justify-content: space-between;">
                            <div class="count_sec">
                             <h6 class="font-weight-normal m-0">Floor Price : &nbsp;</h6>
                             <h6 class="font-weight-normal m-0"><?php echo !empty($floorPriceBNB['price'])?$floorPriceBNB['price']:0;?> BNB</h6>
                         </div>
                          <div class="count_sec">
                             <h6 class="font-weight-normal m-0">Floor Price : &nbsp;</h6>
                             <h6 class="font-weight-normal m-0"><?php echo !empty($floorPriceBUSD['price'])?$floorPriceBUSD['price']:0;?> BUSD</h6>
                         </div>
                     </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="explore_star mt-5">
    <div class="container">
        <div class="row">
            <?php 
                $hotBids_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_collection='".$row['collection_name']."'");
                while($hotBids_row=mysqli_fetch_assoc($hotBids_data)){ 
            ?>
            <div class="col-lg-3 col-md-6 mb-5">
                <div class="inner_one">
                    <div class="d-flex align-items-center justify-content-between">
                    <div class="tp_pht">
                        <?php
                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$hotBids_row['NFT_owner_address']."'");
                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                ?>
                        <a href="./profile.php?address=<?php echo $hotBids_row['NFT_owner_address'] ?>&v=<?php echo rand();?>"
                            class="tooltip-text" data-toggle="tooltip" data-placement="top"
                            title="Owner:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                            <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico" />
                        </a>
                        <?php
                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$hotBids_row['NFT_creator_add']."'");
                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                ?>
                        <a href="./profile.php?address=<?php echo $hotBids_row['NFT_creator_add'] ?>&v=<?php echo rand();?>"
                            data-toggle="tooltip" data-placement="top"
                            title="Creator:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                            <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico01" />
                        </a>
                        <?php
                        $dataOwner = mysqli_query($link, "SELECT * FROM `nft_collections` WHERE collection_name=  '" . $hotBids_row['NFT_collection'] . "'");
                        $rowOwner = mysqli_fetch_assoc($dataOwner);
                        ?>
                        <a href="./collection.php?collection=<?php echo $hotBids_row['NFT_collection'] ?>&v=<?php echo rand(); ?>" data-toggle="tooltip" data-placement="top" title="Collection:<?php echo $rowOwner['collection_name'] ?>" tabindex="-1">
                            <img src="<?php echo $rowOwner['collection_logo'] ?>" class="ico02" />
                        </a>                         

                    </div>
                    <?php
                    if($hotBids_row['last_price']>0 && $hotBids_row['NFT_resell'] == "on"){
                    ?>
                    <div class="last__prices">
                        <p class="m-0 hig_bg" style="color: var(--text-pink)">Last Price</p>
                        <h6><?php echo $hotBids_row['last_price']; ?> <?php echo $hotBids_row['last_buy_currency']; ?></h6>
                    </div>
                    <?php } ?> 
                    </div>
                    <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>"
                        class="text-decoration-none" tabindex="-1">

                        <?php 
                            $img= $hotBids_row['NFT_image'];
                            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                            // print_r($ext);
                            if($ext=="mp4"||$ext=="mpeg"||$ext=="aac"){
                               ?>
                        <video width="100%" height="225px" controls src="<? echo $hotBids_row['NFT_image']; ?>">
                            Your browser does not support the video tag.
                        </video>
                        <?}else if($ext=="mp3"||$ext=="mpeg"||$ext=="aac"){
                                ?>
                        <audio width="100%" height="225px" controls src="<? echo $hotBids_row['NFT_image']; ?>">
                            Your browser does not support the video tag.
                        </audio>
                        <?}else{
                                ?>
                        <img src="<?php echo $hotBids_row['NFT_image']; ?>" class="img-fluid mai_pht rounded" alt="">
                        <?}?>
                    </a>
                    <div class="user_name_hakf mt-1">
                        <div class="d-flex mb-1 align-items-center justify-content-between">
                            <div class="hajaj_user text-left">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="iwMhCq">
                                            <?php echo $hotBids_row['NFT_name']; ?>
                                        </h6>
                                    </div>
                                    <!--<div class="nft-card-assets">-->
                                    <!--    <img src="assets/img/img1.jpg" width="20" height="20" alt="Asset logo" />-->
                                    <!--</div>-->
                                </div>
                                <?php
                                
                                if($hotBids_row['Type'] == '0'){ ?>
                                    <small class="hig_bg">Price:
                                        <?php echo $hotBids_row['NFT_price']; ?> <?php echo $hotBids_row['NFT_payment']; ?> 
                                    </small>                                    
                                <?php }else{
                                ?>
                                
                                    <small class="hig_bg">Highest Bid:
                                        <?php echo $hotBids_row['NFT_highest_bid']; ?> <?php echo $hotBids_row['NFT_payment']; ?> 
                                    </small>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <div class="trx_price_heart d-flex align-items-center justify-content-between">
                            <?php 
                                                        if($hotBids_row['Type']==1||$hotBids_row['Type']==2||$hotBids_row['Type']==3)
                                                        {
                                                        ?>
                            <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw"
                                tabindex="0">
                                Bid Now
                            </a>
                            <?php }
                                                        else{ ?>
                            <a href="./buy-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw"
                                tabindex="0">
                                Buy Now
                            </a>
                            <?php }?>
 
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>



<!-- ======= Footer ======= -->
<?php include "footer.php";?>