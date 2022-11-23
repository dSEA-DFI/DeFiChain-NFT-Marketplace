<?php include("header.php"); ?> 

<style>
    .swiper-button-next:after, .swiper-rtl .swiper-button-prev:after,
    .swiper-button-prev:after, .swiper-rtl .swiper-button-next:after { font-size: 27px;}
    .swiper-button-next,
    .swiper-button-prev {background-color: var(--text-pink);color: var(--secondary-color);width: 40px;height: 40px;border-radius: 50px;}
   
</style>

 
        <!-- hero section start -->
        
        <section class="hero-area py-md-5 position-relative">
            
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="create-text">
                            <div class="nft-text">
                                <h1 class="" style="color:var(--text-pink); font-size:120px">
                                    <!--<span class="Arkhip" style="color:var(--text-pink)">Create Collection</span>-->
                                    <strong>dSEA</strong>
                                    </h1>
                                 <p style="font-size:33px;">Collect & Trade NFTs</p>
                            </div>
                            <div class="create-btns justify-content-md-start gap py-4">
                                <a href="./create-collections.php?v=<?php echo rand();?>" class="btn create-btn" style="background: var(--text-pink);">Create A Collection</a>
                                <a href="./create-single.php?v=<?php echo rand();?>" class="btn create-account">Create NFT</a>
                            </div>
                            <div class="price-view">
                                <ui
                                    class="list-unstyled gap d-flex align-items-center flex-wrap">
                                    <li class="text-center">
                                        <?php 
                                        $trade=mysqli_query($link,"SELECT SUM(value) as value FROM `Nft_sell` WHERE currency='BNB'");
                                        $traderow=mysqli_fetch_assoc($trade);
                                        ?>
                                        <h3 class="font-weight-normal"><?php echo number_format($traderow['value'],2)." BNB";?></h3>
                                        <h6 class="font-weight-normal">Total Volume</h6>
                                    </li>
                                     <li class="text-center">
                                        <?php 
                                        $trade=mysqli_query($link,"SELECT SUM(value) as value FROM `Nft_sell`WHERE currency='BUSD'");
                                        $traderow=mysqli_fetch_assoc($trade);
                                        ?>
                                        <h3 class="font-weight-normal"><?php echo number_format($traderow['value'],2)." BUSD";?></h3>
                                        <h6 class="font-weight-normal">Total Volume</h6>
                                    </li>
                                    <!--<li class="text-center">-->
                                    <!--    <h3 class="font-weight-normal">1M+</h3>-->
                                    <!--    <h6 class="font-weight-normal">Auctions</h6>-->
                                    <!--</li>-->
                                    <!--<li class="text-center">-->
                                    <!--    <h3 class="font-weight-normal">1M+</h3>-->
                                    <!--    <h6 class="font-weight-normal">NFT Artists</h6>-->
                                    <!--</li>-->
                                </ui>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="heroarea-img gooey">
                            <!--<img src="./assets/img/readyplayerme-personal-3d-avatars-wolf3d-hero.png" class="img-fluid"-->
                            <!--    alt="">-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner -->
        <!-- All Categories Start -->
        <div class="resources_section pb-md-5 pb-3">
          
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="browse-text text-center">
                            <h1 class="text-uppercase">
                                Popular <span style="color:var(--text-pink)">NFT</span> Categories
                            </h1>
                             
                        </div>
                    </div>
                </div>
                
                 <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="py-md-5 py-1">
                            <div class="triple-slider">
                                <!-- Duplicate swipers will be created automatically -->

                                <!-- Main center swiper -->
                                <div class="swiper">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php
                                            $Categories_data=mysqli_query($link,"SELECT * FROM nft_category WHERE status=0");
                                            while($Categories_row=mysqli_fetch_assoc($Categories_data)){
                                        ?>
                                            <div class="swiper-slide position-relative">
                                                <div class="browse_box">
                                                    <div class="browse_imges">
                                                        <a href="./all-collection.php?id=<?php echo $Categories_row['id'];?>&v=<?php echo rand();?>">
                                                            <img class="bg-image rounded" src="<?php echo $Categories_row['category_image'];?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="browse_content py-2 px-3">
                                                        <div class="browse_name">
                                                            <h5 class="font-weight-normal">
                                                                <?php echo $Categories_row['category_name'];?>
                                                            </h5>
                                                        </div>
                                                        <!--<div class="d-flex align-items-center justify-content-between ">-->
                                                        <!--    <div class="browse_token_img">-->
                                                        <!--        <h6 class="font-weight-normal">-->
                                                        <!--            Floor Price:- <span>26 DFI</span>-->
                                                        <!--        </h6>-->
                                                        <!--    </div>-->
                                                        <!--    <div class="browse_token_price">-->
                                                        <!--        <h6 class="font-weight-normal">-->
                                                        <!--            Floor Price:- <span>26 DFI</span>-->
                                                        <!--        </h6>-->
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    </div> 
                                                </div>
                                            </div> 
                                            <?php }?>
                                        </div> 
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
            </div>
        </div>
        <!-- All Categories End -->
        <!-- Hot Bid Start  -->
        <div class="Hot_Bids py-md-5 py-3">
            <div class="container">
                <h1 class="py-md-5 py-2 text-center">Hot Bids</h1>
                <div class="slick-slider" data-aos="fade-down" data-aos-duration="2000">
                    <?php 
                    $hotBids_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE Type=2 AND NFT_resell='on' AND email_send=0 AND block=0 ORDER BY ID DESC");
                    while($hotBids_row=mysqli_fetch_assoc($hotBids_data)){
                        
                    
                    ?>
                    <div class="element element-1">
                        <div class="inner_one">
                            <div class="d-flex align-items-center justify-content-between">
                            <div class="tp_pht">
                                <?php
                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$hotBids_row['NFT_owner_address']."'");
                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                ?>
                                <a href="./profile.php?address=<?php echo $hotBids_row['NFT_owner_address'] ?>&v=<?php echo rand();?>" class="tooltip-text" data-toggle="tooltip" data-placement="top" title="Owner:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                                <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico" />
                                </a>
                                <?php
                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$hotBids_row['NFT_creator_add']."'");
                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                ?>
                                <a href="./profile.php?address=<?php echo $hotBids_row['NFT_creator_add'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Creator:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
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
                                if($hotBids_row['last_price']>0 && $hotBids_row['NFT_resell']=="on"){
                                ?>
                                <div class="last__prices">
                                    <p class="m-0 hig_bg" style="color: var(--text-pink)">Last Price</p>
                                    <h6><?php echo $hotBids_row['last_price']; ?> <?php echo $hotBids_row['last_buy_currency']; ?></h6>
                                </div>
                                <?php } ?>
                            </div>                            
                            <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="text-decoration-none" tabindex="-1">
                           
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
                                             
                                        </div>
                                        <small class="hig_bg">Highest Bid: <?php echo $hotBids_row['NFT_highest_bid']; ?> <?php echo $hotBids_row['NFT_payment']; ?></small>
                                    </div>
                                </div>
                                <div class="trx_price_heart d-flex align-items-center justify-content-between">
                                    <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw" tabindex="-1">
                                    Bid Now
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- Hot Bid End  -->
        
        <!-- Live Auctions Start  -->
        <div class="Hot_Bids py-md-5 py-3">
            <div class="container">
                <h1 class="my-md-5 my-3 text-center">Live Auctions</h1>
                <div class="slick-slider" data-aos="fade-down" data-aos-duration="2000">
                    <?php 
                    $hotBids_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_auction>0 AND NFT_resell='on' AND email_send=0 AND block=0 ORDER BY ID DESC");
                    while($hotBids_row=mysqli_fetch_assoc($hotBids_data)){
                        
                    
                    ?>
                    <div class="element element-1">
                        <div class="inner_one">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="tp_pht">
                                    <?php
                                    $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$hotBids_row['NFT_owner_address']."'");
                                    $rowOwner=mysqli_fetch_assoc($dataOwner);
                                    ?>
                                    <a href="./profile.php?address=<?php echo $hotBids_row['NFT_owner_address'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Owner:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                                        <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico" />
                                    </a>
                                    <?php
                                    $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$hotBids_row['NFT_creator_add']."'");
                                    $rowOwner=mysqli_fetch_assoc($dataOwner);
                                    ?>
                                    <a href="./profile.php?address=<?php echo $hotBids_row['NFT_creator_add'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Creator:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
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
                                    if($hotBids_row['last_price']>0 && $hotBids_row['NFT_resell']=="on"){
                                    ?>
                                    <div class="last__prices">
                                        <p class="m-0 hig_bg" style="color: var(--text-pink)">Last Price</p>
                                        <h6><?php echo $hotBids_row['last_price']; ?> <?php echo $hotBids_row['last_buy_currency']; ?></h6>
                                    </div>
                                    <?php } ?>
                            </div>
                            <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="text-decoration-none" tabindex="-1">
                           
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
                                        </div>
                                        <small class="hig_bg">Highest Bid: <?php echo $hotBids_row['NFT_highest_bid']; ?> <?php echo $hotBids_row['NFT_payment']; ?></small>
                                    </div>
                                </div>
                                <div class="trx_price_heart d-flex align-items-center justify-content-between">
                                    <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw" tabindex="-1">
                                    Bid Now
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    
                </div>
            </div>
        </div>
        <!-- Live Auctions End  -->
        <!-- Top Collection  Page Start  -->
        <section class="top-seller-area black-bg">
            <div class="container">
                <div class="row py-md-5 py-3">
                    <div class="text-center" data-wow-duration="2000ms" data-wow-delay="100ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 100ms; animation-name: fadeInUp;">
                        <h1 class="section-title">Top Collection </span></h1>
                    </div>
                </div>
                <div class="row wow animated fadeInUp animated" data-wow-duration="2000ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 400ms; animation-name: fadeInUp;">
                    <?php
                    $query="SELECT * FROM nft_collections WHERE collection_status=0 ORDER BY id DESC";
                    $datacollection=mysqli_query($link,$query);$i=1;
                    while($rowcollection=mysqli_fetch_assoc($datacollection)){
                    ?>
                    <div class="col-xl-4 col-md-6 col-sm-6">
                        <a href="collection.php?collection=<?php echo $rowcollection['collection_name']; ?>&v=<?php echo rand();?>" class="single-top-seller">
                            <div class="single-top-seller-border d-flex align-items-center">
                                <div class="seller-rank-wrapper">
                                    <span class="seller-rank-number"><?php echo $i;?></span>
                                </div>
                                <div class="seller-author-img">
                                    <img src="<?php echo $rowcollection['collection_logo']; ?>" alt="">
                                    <span class="seller-author-badge"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="seller-author-info">
                                    <span class="seller-autor-name"><?php echo $rowcollection['collection_name']; ?></span>
                                    <!--<span class="seller-author-sell-amount">$2500,000</span>-->
                                </div>
                            </div>
                        </a>
                    </div>
                    <?
                    $i++;}?>
                </div>
            </div>
        </section>
        <!-- Top Collection  Page End  -->
        
        <!-- Explore  Page End  -->
        <div class="explore_tabings">
            <div class="container mt-md-5">
                <div class="py-md-5 py-3">
                    <h2>Explore</h2>
                </div>
                <div class="my_tabs">
                   <div class="row">
                       <div class="col-md-10">
                            <!-- Nav pills -->
                            <div class="justify-content-center">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#home">All</a>
                                    </li>
                                    <?php
                                        $Categories_data=mysqli_query($link,"SELECT * FROM nft_category WHERE status=0");
                                        while($Categories_row=mysqli_fetch_assoc($Categories_data)){
                                    ?>
                                    <li class="nav-item">
                                        <a class="nav-link " data-bs-toggle="pill" href="#menu<?php echo $Categories_row['id'];?>"><?php echo $Categories_row['category_name'];?></a>
                                    </li>
                                    
                                    <?php }?>
                                </ul>
                            </div>
                       </div>
                       <div class="col-md-2">
                            <div class="text-center">
                                <a href="./load-more.php?v=<?php echo rand();?>"><button type="submit" class="btn create-btn w-100">
                                    View More
                                </button>
                                </a>
                            </div>
                       </div>
                   </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="container tab-pane active">
                            <br>
                            <div  class="explore_star">
                                <div class="row">
                                    <?php 
                                    $hotBids_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_resell='on' AND block=0 ORDER BY ID DESC LIMIT 8");
                                    while($hotBids_row=mysqli_fetch_assoc($hotBids_data)){
                                      
                                    ?>
                                    <div class="col-lg-3 col-md-6 mb-5">
                                        <div class="inner_explore">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="tp_pht">
                                                    <?php
                                                    $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$hotBids_row['NFT_owner_address']."'");
                                                    $rowOwner=mysqli_fetch_assoc($dataOwner);
                                                    ?>
                                                    <a href="./profile.php?address=<?php echo $hotBids_row['NFT_owner_address'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Owner:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                                                    <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico" />
                                                    </a>
                                                    <?php
                                                    $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$hotBids_row['NFT_creator_add']."'");
                                                    $rowOwner=mysqli_fetch_assoc($dataOwner);
                                                    ?>
                                                    <a href="./profile.php?address=<?php echo $hotBids_row['NFT_creator_add'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Creator:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
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
                                                if($hotBids_row['last_price']>0 && $hotBids_row['NFT_resell']=="on"){
                                                ?>
                                                <div class="last__prices">
                                                    <p class="m-0 hig_bg" style="color: var(--text-pink)">Last Price</p>
                                                    <h6><?php echo $hotBids_row['last_price']; ?> <?php echo $hotBids_row['last_buy_currency']; ?></h6>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            if($hotBids_row['NFT_auction']==0){
                                            ?>
                                            <a href="./buy-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="text-decoration-none" tabindex="0">
                                            <?php }else{?>
                                            <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="text-decoration-none" tabindex="0">
                                            <?php }?>
                                            <img src="<?php echo $hotBids_row['NFT_image']; ?>" class="mai_pht rounded w-100">
                                            </a>
                                            <div class="user_name_hakf mt-1">
                                                <div class="d-flex mb-1 align-items-center justify-content-between">
                                                    <div class="hajaj_user text-left">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h6 class="iwMhCq"><?php echo $hotBids_row['NFT_name']; ?></h6>
                                                                <a href="./collection.php?collection=<?php echo $hotBids_row['NFT_collection']; ?>"><p><?php echo $hotBids_row['NFT_collection']; ?></p> </a>
                                                            </div>
                                                            <!--<div class="nft-card-assets">-->
                                                            <!--   <span class="limits"> <?php echo $hotBids_row['start_id']-$hotBids_row['NFT_id']+1; ?>/<?php echo $hotBids_row['end_id']-$hotBids_row['NFT_id']+1; ?> </span>-->
                                                                <!-- <img src="assets/img/img1.jpg" width="20" height="20" alt="Asset logo"> -->
                                                            <!--</div>-->
                                                        </div>
                                                        <?php 
                                                        if($hotBids_row['NFT_auction']>0)
                                                        {
                                                        ?>
                                                        <small class="hig_bg">Highest Bid: <?php echo $hotBids_row['NFT_highest_bid']; ?> <?php echo $hotBids_row['NFT_payment']; ?></small>
                                                        <?php }
                                                        else{ ?>
                                                         <small class="hig_bg">Price: <?php echo $hotBids_row['NFT_price']; ?> <?php echo $hotBids_row['NFT_payment']; ?></small>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="trx_price_heart d-flex align-items-center justify-content-between">
                                                    <?php 
                                                        if($hotBids_row['Type']==1||$hotBids_row['Type']==2||$hotBids_row['Type']==3)
                                                        {
                                                        ?>
                                                        <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw" tabindex="0">
                                                            Bid Now
                                                        </a>
                                                        <?php }
                                                        else{ ?>
                                                         <a href="./buy-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw" tabindex="0">
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
                        <?php
                        $Categories_data=mysqli_query($link,"SELECT * FROM nft_category WHERE status=0");
                        while($Categories_row=mysqli_fetch_assoc($Categories_data)){
                        ?>
                        <div id="menu<?php echo $Categories_row['id'];?>" class="container tab-pane ">
                            <br>
                            <div  class="explore_star">
                                <div class="row">
                                    <?php 
                                    $hotBids_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_category='".$Categories_row['category_name']."' AND NFT_resell='on' AND block=0 ORDER BY ID DESC LIMIT 8");
                                   
                                    while($hotBids_row=mysqli_fetch_assoc($hotBids_data)){
                                      
                                    ?>
                                    <div class="col-lg-3 col-md-6 mb-5">
                                        <div class="inner_explore">
                                            <div class="d-flex align-items-center justify-content-between">
                                            <div class="tp_pht">
                                                <?php
                                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$hotBids_row['NFT_owner_address']."'");
                                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                                ?>
                                                <a href="./profile.php?address=<?php echo $hotBids_row['NFT_owner_address'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Owner:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
                                                <img src="<?php echo $rowOwner['Userimage'] ?>" class="ico" />
                                                </a>
                                                <?php
                                                $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$hotBids_row['NFT_creator_add']."'");
                                                $rowOwner=mysqli_fetch_assoc($dataOwner);
                                                ?>
                                                <a href="./profile.php?address=<?php echo $hotBids_row['NFT_creator_add'] ?>&v=<?php echo rand();?>" data-toggle="tooltip" data-placement="top" title="Creator:<?php echo $rowOwner['Username'] ?>" tabindex="-1">
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
                                            if($hotBids_row['last_price']>0 && $hotBids_row['NFT_resell']=="on"){
                                            ?>
                                            <div class="last__prices">
                                                <p class="m-0 hig_bg" style="color: var(--text-pink)">Last Price</p>
                                                <h6><?php echo $hotBids_row['last_price']; ?> <?php echo $hotBids_row['last_buy_currency']; ?></h6>
                                            </div>
                                            <?php } ?>
                                            </div>
                                            <?php
                                            if($hotBids_row['NFT_auction']==0){
                                            ?>
                                            <a href="./buy-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="text-decoration-none" tabindex="0">
                                            <?php }else{?>
                                            <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="text-decoration-none" tabindex="0">
                                            <?php }?>
                                            <img src="<?php echo $hotBids_row['NFT_image']; ?>" class="mai_pht rounded w-100">
                                            </a>
                                            <div class="user_name_hakf mt-1">
                                                <div class="d-flex mb-1 align-items-center justify-content-between">
                                                    <div class="hajaj_user text-left">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div>
                                                                <h6 class="iwMhCq"><?php echo $hotBids_row['NFT_name']; ?></h6>
                                                                <p><?php echo $hotBids_row['NFT_collection']; ?></p>
                                                            </div>
                                                            <!--<div class="nft-card-assets">-->
                                                            <!--   <span class="limits"> <?php echo $hotBids_row['start_id']-$hotBids_row['NFT_id']+1; ?>/<?php echo $hotBids_row['end_id']-$hotBids_row['NFT_id']+1; ?> </span>-->
                                                            <!--</div>-->
                                                        </div>
                                                        <?php 
                                                        if($hotBids_row['NFT_auction']>0)
                                                        {
                                                        ?>
                                                        <small class="hig_bg">Highest Bid: <?php echo $hotBids_row['NFT_highest_bid']; ?> <?php echo $hotBids_row['NFT_payment']; ?></small>
                                                        <?php }
                                                        else{ ?>
                                                         <small class="hig_bg">Price: <?php echo $hotBids_row['NFT_price']; ?> <?php echo $hotBids_row['NFT_payment']; ?></small>
                                                        <?php }?>
                                                    </div>
                                                </div>
                                                <div class="trx_price_heart d-flex align-items-center justify-content-between">
                                                    <?php 
                                                        if($hotBids_row['Type']==1||$hotBids_row['Type']==2||$hotBids_row['Type']==3)
                                                        {
                                                        ?>
                                                        <a href="./bid-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw" tabindex="0">
                                                            Bid Now
                                                        </a>
                                                        <?php }
                                                        else{ ?>
                                                         <a href="./buy-description.php?id=<?php echo $hotBids_row['NFT_id']; ?>&v=<?php echo rand();?>" class="by_nw" tabindex="0">
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
                        
                        <?php }?>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Explore end-->
        <!-- Top seller Page Start  -->
        <section class="top-seller-area black-bg  py-md-5 py-3">
            <div class="container py-md-5 py-1">
                <div class="row">
                    <div class="text-center" data-wow-duration="2000ms" data-wow-delay="100ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 100ms; animation-name: fadeInUp;">
                        <h1 class="section-title">Top Buyer</span></h1>
                    </div>
                </div>
                <div class="row pt-5 wow animated fadeInUp animated" data-wow-duration="2000ms" data-wow-delay="400ms" style="visibility: visible; animation-duration: 2000ms; animation-delay: 400ms; animation-name: fadeInUp;">
                    <?php 
                    $querybuyer="SELECT `Username`,`image`,`Address`,COUNT(nft_id) as id FROM `Nft_sell` GROUP by `Address`,`Username`,`image` order by id DESC limit 0,8";
                    $data=mysqli_query($link,$querybuyer);$i=1;
                    while($ress= mysqli_fetch_assoc($data)){ 
                        $user=mysqli_query($link,"SELECT * FROM `nft_user` WHERE `Useraddress`='".$ress['Address']."' AND block=0");
                        $us=$user->fetch_assoc();
                        ?>

                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <a href="./profile.php?address=<?php echo $us['Useraddress'] ?>&v=<?php echo rand();?>" class="single-top-seller">
                            <div class="single-top-seller-border d-flex align-items-center">
                                <div class="seller-rank-wrapper">
                                    <span class="seller-rank-number"><?php echo $i;?></span>
                                </div>
                              <div class="seller-author-img">
                                    <img src="<?php echo $us['Userimage'] ;?>" alt="">
                                    <span class="seller-author-badge"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="seller-author-info">
                                    <span class="seller-autor-name"><?php echo $us['Username'] ;?></span>
                                    <!--<span class="seller-author-sell-amount">$2500,000</span>-->
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php  $i++;}?>    
                </div>
            </div>
        </section>
        <!-- Top seller Page End  -->

<?php include("footer.php"); ?>
</section>