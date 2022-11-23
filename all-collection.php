
<?php 
include "header.php";
$id=$_GET['id'];

$data=mysqli_query($link,"SELECT * FROM `nft_category` WHERE id='".$id."'");
$row=mysqli_fetch_assoc($data);
$datanew=mysqli_query($link,"SELECT * FROM `NFT_info` WHERE NFT_category='".$row['category_name']."'");

?> 
        <!-- End Header -->
        <div class="collectible">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php echo $row['category_name'];?></h2>
                    </div>
                </div>
            </div>
        </div>
        <div  class="explore_star mt-5">
            <div class="container">
                <div class="row">
                    <?php 
                    while($hotBids_row=mysqli_fetch_assoc($datanew)){
                        
                    
                    ?>
                    <div class="col-lg-3 col-md-6 mb-5">
                       <div class="inner_one">
                            <div class="tp_pht">
                                <?php
                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$hotBids_row['NFT_owner_address']."'");
                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                ?>
                                <a href="./profile.php?address=<?php echo $hotBids_row['NFT_owner_address'] ?>" class="tooltip-text" data-toggle="tooltip" data-placement="top" title="Owner:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                                <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico" />
                                </a>
                                <?php
                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$hotBids_row['NFT_creator_add']."'");
                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                ?>
                                <a href="./profile.php?address=<?php echo $hotBids_row['NFT_creator_add'] ?>" data-toggle="tooltip" data-placement="top" title="Creator:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                                <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico01" />
                                </a>
                            
                            </div>
                            <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>" class="text-decoration-none" tabindex="-1">
                           
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
                                                <h6 class="iwMhCq"><?php echo $hotBids_row['NFT_name']; ?></h6>
                                            </div>
                                            <!--<div class="nft-card-assets">-->
                                            <!--    <img src="assets/img/img1.jpg" width="20" height="20" alt="Asset logo" />-->
                                            <!--</div>-->
                                        </div>
                                        <small class="hig_bg">Highest Bid: <?php echo $hotBids_row['NFT_highest_bid']; ?> BNB</small>
                                    </div>
                                </div>
                                
                                                <div class="trx_price_heart d-flex align-items-center justify-content-between">
                                                    <?php 
                                                        if($hotBids_row['Type']==1||$hotBids_row['Type']==2||$hotBids_row['Type']==3)
                                                        {
                                                        ?>
                                                        <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>" class="by_nw" tabindex="0">
                                                            Bid Now
                                                        </a>
                                                        <?php }
                                                        else{ ?>
                                                         <a href="./buy-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>" class="by_nw" tabindex="0">
                                                            Buy Now
                                                        </a>
                                                        <?php }?>
                                                    
                                                    <!--<div class="like_save">-->
                                                    <!--    <span class="heart_class">-->
                                                    <!--    <i class="fal fa-heart heart-black" aria-hidden="true"></i> &nbsp;-->
                                                    <!--    </span>-->
                                                    <!--    <span id="like3625775082284">2 </span>-->
                                                    <!--</div>-->
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
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <!-- Vendor JS Files -->
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            AOS.init();
        </script>