<?php include("header.php");

/************************** pages no ***********************/
 $per_page_record = 12;        
    if (isset($_GET["page"])) {  $page  = $_GET["page"];  } else {  $page=1; }     
        $start_from = ($page-1) * $per_page_record;     
/*****************************page end *****************************/

// $sql="SELECT * FROM `NFT_info` ORDER BY id DESC limit ".$start_from.",". $per_page_record;
$sql="SELECT * FROM `NFT_info` where (NFT_name like'%".$_GET['data']."%' || NFT_price like '%".$_GET['data']."%' || NFT_payment like '%".$_GET['data']."%' || NFT_paymentcurrency like '%".$_GET['data']."%' || NFT_owner_address like '%".$_GET['data']."%' ||  NFT_discription like '%".$_GET['data']."%' || NFT_id like '%".$_GET['data']."%' || NFT_collection like '%".$_GET['data']."%' ) ORDER BY id limit ".$start_from.",". $per_page_record;

$data=mysqli_query($link,$sql);

$sqluser="SELECT * FROM `nft_user` where (Username like'%".$_GET['data']."%') ORDER BY Id limit ".$start_from.",". $per_page_record;
$datauser=mysqli_query($link,$sqluser);

$sqlcollection="SELECT * FROM `nft_collections` where (collection_name like'%".$_GET['data']."%' || collection_symbol like'%".$_GET['data']."%') ORDER BY id limit ".$start_from.",". $per_page_record;
$datacollection=mysqli_query($link,$sqlcollection);
?> 

<section class="py-5">
         <div class="container">
             <div class="row py-5">
                 <div class="col-md-12">
                     <div class="text-center">
                         <h1 class="section-title">Searched NFT</h1>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <?php while($hotBids_row=mysqli_fetch_assoc($data)){
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
                                                <a href="./collection.php?name=<?php echo $hotBids_row['NFT_collection'] ?>&v=<?php echo rand(); ?>" data-toggle="tooltip" data-placement="top" title="Collection:<?php echo $rowOwner['collection_name'] ?>" tabindex="-1">
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
    </section>
    

      <hr>
      
        <!-- Top seller Page Start  -->
        <section class="top-seller-area black-bg py-5 ">
            <div class="container">
                <div class="row">
                    <div class="text-center" data-wow-duration="2000ms" data-wow-delay="100ms">
                        <h1 class="section-title">Top Collection </span></h1>
                    </div>
                </div>
                <div class="row pt-5 wow animated fadeInUp animated" data-wow-duration="2000ms" data-wow-delay="400ms">
                    <?php 
                    $i=1;
                    while($resss= mysqli_fetch_assoc($datacollection)){
                        
                        ?>
                   <div class="col-xl-3 col-md-6 col-sm-6">
                        <a href="./collection.php?collection=<?php echo $resss['collection_name']; ?>&v=<?php echo rand();?>" class="single-top-seller">
                            <div class="single-top-seller-border d-flex align-items-center">
                                <div class="seller-rank-wrapper">
                                    <span class="seller-rank-number"><?php echo $i;?></span>
                                </div>
                              <div class="seller-author-img">
                                    <img src="<?php echo $resss['collection_logo'] ;?>" alt="">
                                    <span class="seller-author-badge"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="seller-author-info">
                                    <span class="seller-autor-name"><?php echo $resss['collection_name'];?></span>
                                    <!--<span class="seller-author-sell-amount">$2500,000</span>-->
                                </div>
                            </div>
                        </a>
                    </div> 
                    <?php  $i++;}?> 
                </div>
            </div>
        </section>
      
      <hr>
      
      <!-- Top seller Page Start  -->
        <section class="top-seller-area black-bg py-5 ">
            <div class="container">
                <div class="row">
                    <div class="text-center" data-wow-duration="2000ms" data-wow-delay="100ms" >
                        <h1 class="section-title">Top Buyer </span></h1>
                    </div>
                </div>
                <div class="row pt-5 wow animated fadeInUp animated" data-wow-duration="2000ms" data-wow-delay="400ms">
                    <?php 
                    $i=1;
                    while($ress= mysqli_fetch_assoc($datauser)){
                        
                        ?>

                    <div class="col-xl-3 col-md-6 col-sm-6">
                        <a href="./profile.php?address=<?php echo $ress['Useraddress'] ?>&v=<?php echo rand();?>" class="single-top-seller">
                            <div class="single-top-seller-border d-flex align-items-center">
                                <div class="seller-rank-wrapper">
                                    <span class="seller-rank-number"><?php echo $i;?></span>
                                </div>
                              <div class="seller-author-img">
                                    <img src="<?php echo $ress['Userimage'] ;?>" alt="">
                                    <span class="seller-author-badge"><i class="fas fa-check"></i></span>
                                </div>
                                <div class="seller-author-info">
                                    <span class="seller-autor-name"><?php echo $ress['Username'] ;?></span>
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
      
          
    <style>
    .inline {
            display: inline-block;
            position: absolute;
            margin: 24px 0px;
        }
    
        input,
        button {
            height: 45px;
        }

    .pagination {
        width: 100%;
        display: flex;
        justify-content: center;
        margin-bottom: 20px;
    }
    .pagination a {
        font-weight: bold;
        font-size: 18px;
        color: var(--secondary-color);
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        border: 1px solid var(--text-opcity);
    }
    
    .pagination a.active {
        background-color: var(--text-pink);
        color: var(--secondary-color);
    }
    
    
    .pagination a:hover:not(.active) {
      background-color: var(--text-primary-color);
      color: var(--secondary-color);
    }
</style>
<div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM `NFT_info`";     
        $rs_result = mysqli_query($link, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
    echo "";     
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='load-more.php?v=".rand()."&page=".($page-1)."'>  Prev </a>";   
        }       
                   
        for ($i=1; $i<=3; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='load-more.php?v=".rand()."&page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='load-more.php?v=".rand()."&page=".$i."'>".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='load-more.php?v=".rand()."&page=".($page+1)."'>  Next </a><a href='load-more.php?v=".rand()."&page=".$total_pages."'> Last </a>";   
        }   
  
      ?>    
      </div>  
      
      
<?php include("footer.php"); ?>