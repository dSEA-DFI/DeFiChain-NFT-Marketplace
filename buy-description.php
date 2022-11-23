<?php include "header.php";?>
<style type="text/css">
    .accordion {
        width: 100%;
        margin: 0 auto;
    }

    .accordion input {
        display: none;
    }

    .accordion-item {
        position: relative;
    }
    .accordion-item {
        padding: 0px 15px;
    }
   .accordion-header {
    width: 100%;
    height: 50px;
    line-height: 50px;
    display: block;
    cursor: pointer;
    border-bottom: 1px solid #cecece;
    color: #333333;
    font-weight: 700;
    font-size: 17px;
}

    .accordion-text {
        width: 100%;
        font-size: 11pt;
        color: #555555;
        display: block;
        height: 0;
        overflow: hidden;
        opacity: 0;
        position: relative;
        top: -10px;
    }

    .accordion-text  {
        line-height: 1.68em;
    }

    .closing {
        position: absolute;
        height: 50px;
        width: 100%;
        top: 0;
        left: 0;
        cursor: pointer;
        display: none;
    }

    input:checked + .accordion-item {
        height: auto;
    }

    input:checked + .accordion-item .accordion-text,
    input:checked + .accordion-item .closing {
        display: block;
    }

    input:checked + .accordion-item .accordion-text {
        height: auto;
        opacity: 1;
        top: 0;
    }
/*
    .dropdown-arrows section .accordion-header {
        padding: 0 0 0 30px;
    }*/

    .dropdown-arrows section .accordion-header:before {
        position: absolute;
        display: block;
        content: '\203a';
        font-size: 18pt;
        right: 20px;
        top: -2px;
        color: #333333;
    }

    input:checked + section.accordion-item .accordion-header:before {
        transform: rotate(90deg);
        top: 1px;
    }

</style>


<?php 

if($_GET['id']){
    $NFT_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_id='".$_GET['id']."'");
    $row=mysqli_fetch_assoc($NFT_data);
    $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$row['NFT_owner_address']."'");
    $rowOwner=mysqli_fetch_assoc($dataOwner);
    
    $dataCreator=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$row['NFT_creator_add']."'");
    $rowCreator=mysqli_fetch_assoc($dataCreator);
    if($row['Type']==1){
        echo"<script>location.href = './bid-description.php?id=".$_GET['id']."';</script>";
    }else if($row['Type']==2){
        echo"<script>location.href = './onlybid.php?id=".$_GET['id']."';</script>";
    }else if($row['Type']==3){
        echo"<script>location.href = './buy-multi.php?id=".$_GET['id']."';</script>";
    }else if($row['Type']==4){
        echo"<script>location.href = './onlymultibid.php?id=".$_GET['id']."';</script>";
    }
    
}
?>
<div class="collectible">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 data-aos="fade-up" data-aos-duration="2000">Buy Description</h2>
            </div>
        </div>
    </div>
</div>
<section class="product-details section-padding-100-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="product__details__pic pro_inners">
                    <div class="product__details__pic__item">

                        <?php 
                        $img= $row['NFT_image'];
                        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                            // print_r($ext);
                        if($ext=="mp4"||$ext=="mpeg"||$ext=="aac"){
                           ?>  
                           <video width="100%" height="225px" controls src="<? echo $row['NFT_image']; ?>">
                              Your browser does not support the video tag.
                          </video>
                          <?}else if($ext=="mp3"||$ext=="mpeg"||$ext=="aac"){
                            ?>
                            <audio width="100%" height="225px" controls src="<? echo $row['NFT_image']; ?>">
                              Your browser does not support the video tag.
                          </audio>
                          <?}else{
                            ?>
                            <img src="<?php echo $row['NFT_image']; ?>" class="img-fluid rounded" alt="">
                            <?}?>
                        </div>
                        <!--<div class="row">-->
                        <!--    <div class="col-md-6 mb-3">-->
                        <!--        <div class="impressions">-->
                        <!--            <a class="mr-10" href="#" target="_blank"><i class="fab fa-facebook"></i></a>-->
                        <!--            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>-->
                        <!--            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-6 mb-3">-->
                        <!--        <button class="reffer_btn-authhh" onclick=" ref(&quot;http://ec2-3-36-77-61.ap-northeast-2.compute.amazonaws.com/buynft.php?id=5002131&quot;)">Associated Links</button>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <?php
                        $sqlproperties="SELECT * FROM `NFT_properties` WHERE `NFT_id`='".$_GET['id']."'";
                        $dataproperties=mysqli_query($link,$sqlproperties);
                        $rowprop=mysqli_num_rows($dataproperties);
                        if($rowprop!=0){
                        ?>
                        <div class="py-3">
                            <div class="kldnajblj">
                                <h5>Properties</h5>
                                <div class="">
                                    <div class="d-flex align-items-center flex-wrap">
                                        <?php
                                            while($rowproperties=mysqli_fetch_assoc($dataproperties)){
                                            ?>
                                        <div class="px-3 py-2 m-1 rounded text-center" style="border: 1px solid var(--text-opcity);background: #00d9f321; width:30.30%;">
                                            <h6 class=""><?php echo $rowproperties['NFT_property'] ?> </h6> 
                                            <h6 class=" m-0"><?php echo $rowproperties['NFT_type'] ?></h6>
                                        </div>
                                    <?php }?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?}?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <div class="product__details__text pro_inners">
                        <div class="d-flex justify-content-between">
                            <h3><?php echo $row['NFT_name']?></h3>
                            <a class="btn btn-dark" href="https://bscscan.com/token/0x97b73a7be57053dff3c5ded9a73903975ebd2e57?a=<?php echo $row['NFT_id'];?>" target="_blank">View on BSCscan</a>
                        </div>
                            <div class="blog__sidebar__item__tags">
                                <p>Collection: <a href="./collection.php?collection=<?php echo $row['NFT_collection'];?>&v=<?php echo rand(); ?>" class="item-tags" style="color:var(--text-pink)"><?php echo $row['NFT_collection'];?></a><br>
                                <p>Item Category: <span class="item-tags"><?php echo $row['NFT_category']?></span><br>
                                <span class="reffer_btn-authh">NFT Id: <?php echo $row['NFT_id']?></span></p>
                            </div>
                            <div class="row mt-30">
                                <div class="col-lg-6 col-md-12">
                                    <div class="latest-product__text">
                                        <div class="top-author">
                                            <a href="./profile.php?address=<?php echo $rowCreator['Useraddress'] ?>&v=<?php echo rand();?>" class="author-info">
                                                <img src="<?php echo $rowCreator['Userimage']; ?>" class="avatar" alt="">

                                            </a>
                                            <div class="item-pri">
                                                <p class="papple">Creator</p>
                                                <h5><?php echo $rowCreator['Username'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="latest-product__text">
                                        <div class="top-author">
                                            <a href="./profile.php?address=<?php echo $rowOwner['Useraddress'] ?>&v=<?php echo rand();?>" class="author-info">
                                                <img src="<?php echo $rowOwner['Userimage'] ?>" class="avatar" alt="">

                                            </a>
                                            <div class="item-pri">
                                                <p class="papple">Owner</p>
                                                <h5><?php echo $rowOwner['Username'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="offer-btn"><?php echo $row['NFT_royalties']?>% of sales go to creators</div>
                            <div class="auction-details text-center mb-30">
                                <div class="top-bord"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item-detail">
                                            <h4 class="bid-title" id="submit">Description</h4>
                                            <p class=""><?php echo $row['NFT_discription']?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" class="btn btn-secondary px-5" style="color: #fff;" id="submit1" onclick="myFunction()">
                                                        Buy Now
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-center" id="resell" style="display: none; width: 100%; margin-top: 10px;">
                                        <h4 class="modal-title text-center mb-4">Would you like to resell?</h4>
                                        <a class="d-inline text-center" href="#">
                                            <button type="button" class="btn btn-secondary px-5" style="color: #fff !important;" id="yes" onclick="demoDisplay1()">
                                                Yes
                                            </button>
                                        </a>
                                        <a class="d-inline text-center" href="#">
                                            <button type="button" class="btn btn-secondary px-5" style="color: #fff !important;" onclick="myFunction()" data-dismiss="modal">
                                                Don't
                                            </button>
                                        </a>
                                    </div>
                                    <div class="resend-amount" id="enteramount" style="display: none; width: 100%; margin-top: 10px;">
                                        <h4 class="modal-title text-center mb-4">Enter the resale amount.</h4>
                                        <form>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" id="value" style="background-color: #f8f9fa; border: none; color: #000; border-radius: 25px;" placeholder="Enter resell amount(WPR)">
                                                </div>
                                                <div class="col">
                                                    <button type="button" class="btn btn-primary px-3" onclick="myFunction()" style="color: #fff !important;" data-dismiss="modal">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="auction-details mb-0">
                                <div class="top-bord"></div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="item-detail">
                                            <?php 
                                        $datalatestPrice=mysqli_query($link,"SELECT * FROM NFT_buy WHERE NFT_id='".$_GET['id']."' order by id desc limit 1");
                                            if( mysqli_num_rows($datalatestPrice)){
                                                $rowprice=mysqli_fetch_assoc($datalatestPrice);
                                                $price=$rowprice['value'];
                                                $currency=$rowprice['currency'];
                                        ?>
                                            <div class="text-right" style="text-align: right;"> 
                                                <p class="mb-0">Last Price</p>
                                                <h5><strong><?php echo $price;?> <?php echo $currency;?></strong></h5>
                                            </div>
                                            <?php }?>
                                            <h3 class="mt-15" id="hPrice">Price <strong> <?php echo $row['NFT_price']?> <?php echo $row['NFT_payment']?></strong> </h3> 
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-12">

                                    <nav class="accordion dropdown-arrows">
                                        <input type="radio" name="accordion-radio-button" id="accordion-item-1" autocomplete="off">
                                        <section class="accordion-item">
                                            <label class="accordion-header" for="accordion-item-1">History</label>
                                            <label class="closing" for="accordion-closing-button"></label>
                                            <div class="accordion-text">
                                                <div class="table-responsive">
                                    <table class="table table-hover table-light">
                                        <?php 
                                        $dataHistory=mysqli_query($link,"SELECT * FROM NFT_buy WHERE NFT_id='".$_GET['id']."'");
                                            if( mysqli_num_rows($dataHistory)){
                                        ?>
                                        <thead>
                                            <tr>
                                                <th><span class="font-weight-normal text-dark">User Image</span></th>
                                                <th><span class="font-weight-normal text-dark">User Name</span></th>
                                                <th><span class="font-weight-normal text-dark">Price</span></th>
                                                <th><span class="font-weight-normal text-dark">Time</span></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            
                                            while($rowhistory=mysqli_fetch_assoc($dataHistory)){
                                                
                                            ?>
                                           <tr>
                                            <td><span  style="color:#000"><a href="./profile.php?address=<?php echo $rowbidder['Address'] ?>&v=<?php echo rand();?>"><img src="<?php echo $rowhistory['image']; ?>" class="" width="30px" height="30px" style="border-radius: 50%;" alt=""></a></span></td>
                                            <td><span  style="color:#000"><?php echo $rowhistory['Username']; ?></span></td>
                                            <td><span  style="color:#000"><?php echo ($rowhistory['value']); ?> <?php echo ($rowhistory['currency']); ?></span></td>
                                            <td><span  style="color:#000"><?php echo $rowhistory['time']; ?></span></td>
                                        </tr>
                                           <?php
                                           }
                                           }else{?>
                                               <tr>
                                                   <td style="color:#000"> No History Found</td>
                                               </tr>
                                          <?php 
                                           }?>
                                        </tbody>
                                    </table>
                                </div>
                                                </div>
                                            </section>


                                            <input type="radio" name="accordion-radio-button" id="accordion-closing-button" autocomplete="off">
                                        </nav>
                                    </div>
                                </div>




<!-- <div class="row">
    <div class="col-lg-12">
        <div class="blog__sidebar__item mt-30 mb-30 mt-3">
            <h4>History</h4>
            <div class="blog__sidebar__recent">
                <div class="blog__sidebar__recent__item">
                    <div class="blog__sidebar__recent__item__pic">
                        <a href="#">
                            <img src="assets/img/001.jpg" width="75" alt=""></a>
                        </div>
                        <div class="blog__sidebar__recent__item__text">
                            <h6>Nishant jangid</h6>
                            <p class="author-link mb-0">
                                Price 0.0012 TRX <br>
                            </p>
                            <span>2021-12-15</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
</div>
</div>
</div>
</section>
<!-- ======= Footer ======= -->
<?php include "footer.php"?>
<!-- End Footer -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    AOS.init();
</script>
<script>
    document.getElementById("loadingdivnew").className="d-block"
    const myInterval = setInterval(checkwaleltConect, 10000);
    let ownerAdd = "<?php echo $row['NFT_owner_address'];?>";
    let sell = "<?php echo $row['NFT_resell'];?>";
    function checkwaleltConect() {
        
        if(selectedAccount){
            
          if(ownerAdd==selectedAccount || sell=="off"){
              
              document.getElementById("submit1").style.visibility = 'hidden';
              if(sell=="off") document.getElementById("hPrice").style.visibility = 'hidden';
              
          }
            document.getElementById("loadingdivnew").className="d-none"
            clearInterval(myInterval);
        }else{
            document.getElementById("loadingdivconnect").className="d-block"
            
        }
    }
    
</script>
<script>

    let NFTprice = "<?php echo $row['NFT_price'];?>";
    let id = "<?php echo $row['NFT_id'];?>";
    let ownerAddress = "<?php echo $row['NFT_owner_address'];?>";
    let NFT_royalties = "<?php echo $row['NFT_royalties'];?>";
    let NFT_creator_add = "<?php echo $row['NFT_creator_add'];?>";
    let NFTpricenew = "<?php echo $row['NFT_price'];?>";
    let NFT_paymenCurrency = "<?php echo $row['NFT_paymenCurrency'];?>";
    let payment = "<?php echo $row['NFT_payment'];?>";
    let NFT_image = "<?php echo $row['NFT_image'];?>";
    let NFT_name = "<?php echo $row['NFT_name'];?>";
    
    async function myFunction() {
        
        if (provider) {
                    
            window.web3 = new Web3(provider);
            const account = selectedAccount;
            
            if (payment=="BNB") {
                
                let valuee = await web3.utils.toWei(NFTprice.toString(), "ether");
                
                myContract.methods.transferNFT(id,ownerAddress,0).send({ from: account, value : valuee})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    dataUpdate(account,NFT_creator_add,valuee); 
                    
                }).catch(console.log("error"));
            } 
            else{   
                    let NFTpricee=NFTprice*10;
                    let tokens = await web3.utils.toWei(NFTpricee.toString(), "ether");
                    myTokenContract.methods.approve(wallet.contract_address, tokens)
                        .send({ from: account })
                        .on("transactionHash", function (hash) {
                            document.getElementById("loadingdiv").className = "d-block";
                        }).then(() => {
                            buyNFT();
                        }).catch(console.log);
            }
        }else{
                Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'Please Connet Your Wallet First!',
                    })
        }
    }
    
    async function buyNFT(){
        let valuee = await web3.utils.toWei(NFTprice.toString(), "ether");
                myContract.methods.transferNFT(id,ownerAddress,valuee).send({from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    dataUpdate(selectedAccount,NFT_creator_add,valuee); 
                    
                }).catch(console.log("error"));
    }
    function dataUpdate(buyerAddress,NFT_creator_add,payAmount){
        
        var formdata = new FormData();
        formdata.append("value", payAmount/10**18);
        formdata.append("buyerAddress", buyerAddress);
        formdata.append("sellerAddress", NFT_creator_add);
        formdata.append("tokenid", id);
        formdata.append("NFT_image", NFT_image);
        formdata.append("NFT_name", NFT_name);
        formdata.append("resell", "off");
        formdata.append("collection", "<?php echo $row['NFT_collection'];?>");
        formdata.append("currency", "<?php echo $row['NFT_payment'];?>");

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };

        fetch("./buy_list.php", requestOptions)
            .then((response) => response.text())
            .then((result) => {
                Swal.fire({
                    icon: "success",
                    title: "Great...",
                    text: "Congratulation! You Bought This NFT",
                }).then((ok) => {
                    location.href = "./buy-description.php?id=" + id+"&v="+Math.floor((Math.random() * 1000000) + 1);
                });
            })
            .catch((error) => console.log("error", error));
    }
  
</script>