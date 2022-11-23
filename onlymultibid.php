<?php include "header.php";?>
<style type="text/css">


    #countdown li {
        display: inline-block;
        font-size: 15px;
        list-style-type: none;
        padding: 0px 15px 10px 20px;
        text-transform: uppercase;
        text-align: center;
        border-radius: 5px;
        background: #d91c5c;
        color: #fff;
    }

    #countdown li span {
      display: block;
      font-size: 30px;
      font-weight: 600;
  }

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
    if($row['Type']==0){
        echo"<script>location.href = './buy-description.php?id=".$_GET['id']."';</script>";
    }else if($row['Type']==2){
        echo"<script>location.href = './onlybid.php?id=".$_GET['id']."';</script>";
    }else if($row['Type']==1){
        echo"<script>location.href = './bid-description.php?id=".$_GET['id']."';</script>";
    }else if($row['Type']==3){
        echo"<script>location.href = './buy-multi.php?id=".$_GET['id']."';</script>";
    }
    
}
?>



        <div class="collectible">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 data-aos="fade-up" data-aos-duration="2000">Single Product</h2>
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
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="impressions">
                                        <a class="mr-10" href="#" target="_blank"><i class="fab fa-facebook"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <button class="reffer_btn-authhh" onclick=" ref(&quot;http://ec2-3-36-77-61.ap-northeast-2.compute.amazonaws.com/buynft.php?id=5002131&quot;)">Associated Links</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mb-3">
                        <div class="product__details__text">
                            <h3><?php echo $row['NFT_name']?></h3>
                            <div class="blog__sidebar__item__tags">
                            <p>Item Category: <span class="item-tags"><?php echo $row['NFT_category']?></span><br>
                                <span class="reffer_btn-authh">NFT Id: <?php echo $row['NFT_id']?></span></p>
                            </div>
                            
                            <div class="row mt-30">
                                <div class="col-lg-6 col-md-12">
                                    <div class="latest-product__text">
                                        <div class="top-author">
                                            <a href="./profile.php?address=<?php echo $rowCreator['Useraddress'] ?>" class="author-info">
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
                                            <a href="./profile.php?address=<?php echo $rowOwner['Useraddress'] ?>" class="author-info">
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
                                            <h4 class="bid-title" id="submit2">Bid Now</h4>
                                            <p class=""><?php echo $row['NFT_discription']?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" class="btn btn-secondary px-5" style="color: #fff; background: #d91c5c;" data-bs-toggle="modal" data-bs-target="#exampleModaled">
                                                    Bid Now
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
                                    <div class="col-lg-6 col-md-12">
                                        <div class="item-detail">
                                            <p class="mb-0">Minimum bid</p>
                                            <h3 class="mt-15"><?php echo $row['NFT_price']?> <?php echo $row['NFT_payment']?> </h3>
                                            <p class="mb-0">
                                                <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <nav class="accordion dropdown-arrows">
                                <input type="radio" name="accordion-radio-button" id="accordion-item-1" autocomplete="off">
                                <section class="accordion-item">
                                    <label class="accordion-header" for="accordion-item-1">Bids</label>
                                    <label class="closing" for="accordion-closing-button"></label>
                                    <div class="accordion-text">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-light">
                                                <?php 
                                                $dataHistory=mysqli_query($link,"SELECT * FROM NFT_onlybid WHERE NFT_id='".$_GET['id']."'");
                                                if( mysqli_num_rows($dataHistory)){
                                                    ?>
                                                    <thead>
                                                        <tr>
                                                            <th><span class="font-weight-normal">User Image</span></th>
                                                            <th><span class="font-weight-normal">User Name</span></th>
                                                            <th><span class="font-weight-normal">Bid</span></th>
                                                            <th><span class="font-weight-normal">Time</span></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        
                                                        while($rowhistory=mysqli_fetch_assoc($dataHistory)){
                                                            $databidder=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress='".$rowhistory['NFT_bidder']."'");
                                                            $rowbidder=mysqli_fetch_assoc($databidder)
                                                            ?>
                                                            <tr>
                                                                <td><a href="./profile.php?address=<?php echo $rowbidder['Useraddress'] ?>"><img src="<?php echo $rowbidder['Userimage']; ?>" class="" width="30px" height="30px" style="border-radius: 50%;" alt=""></a></td>
                                                                <td><?php echo $rowbidder['Username']; ?></td>
                                                                <td><?php echo $rowhistory['NFT_bid']; ?> <?php echo $rowhistory['payment']; ?></td>
                                                                <td><?php echo $rowhistory['Date']; ?></td>
                                                            </tr>
                                                            <?php 
                                                        }
                                                    }else{?>
                                                     <tr>
                                                         <td> No Bids Found</td>
                                                     </tr>
                                                 <?php }
                                                 ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </section>


                             <input type="radio" name="accordion-radio-button" id="accordion-closing-button" autocomplete="off">
                         </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= Footer ======= -->
<?php include "footer.php"?>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModaled">
  Launch demo modal
</button>
 -->
<!-- Modal -->
<div class="modal fade" id="exampleModaled" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabeled">Place a Bid</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-size: cover;">
    <div class="p-3 form-border" style="background-size: cover;">
        <!--<h3>Place a Bid</h3>-->
        You are about to place a bid 
        <div class="spacer-single" style="background-size: cover;"></div>
        <h6>Your bid (BNB)</h6>
        <input type="text" name="bid_value" id="bid_value" class="form-control" placeholder="Enter bid" onkeyup="pay()">
        <div class="spacer-single" style="background-size: cover;"></div>
        <br>
        <h6>Enter quantity. <span class="id-color-2"><?php echo $row['end_id']-$row['start_id']+1?> available</span></h6>
        <input type="text" name="bid_qty" id="bid_qty" class="form-control" value="1" onkeyup="checkAval()">
        <small class="text-danger" id="alert" style="display: none;">Insufficient balance</small>
        <small class="text-danger" id="insufficient" style="display: none;">Enter quantity less than the available quantity</small> 
        <div class="spacer-single" style="background-size: cover;"></div>
        <div class="de-flex mt-2" style="background-size: cover;">
            <div style="background-size: cover;">Single Of One</div>
            <div style="background-size: cover;"><b id=""></b><?php echo $row['NFT_price']?> <?php echo $row['NFT_payment']?></div>
        </div>
     
        <div class="de-flex" style="background-size: cover;">
            <div style="background-size: cover;">Your balance</div>
            <div style="background-size: cover;"><b id="balancebid">1BNB</b></div>
        </div>
        <div class="de-flex" style="background-size: cover;">
            <div style="background-size: cover;">Service fee </div>
            <div style="background-size: cover;"><b id="servicebid">0.002 BNB</b></div>
        </div>
        <div class="spacer-single" style="background-size: cover;"></div>
        <button type="button" onclick="submitBid()" id="multibuy" class="btn-main btn-fullwidth w-100 d-block">Place a Bid(only) </button>
        <!--<button class="btn-main btn-fullwidth" onclick="onlybid()" id="onlybid">Place a Bid(only)</button>-->
    </div>
</div>
    
    </div>
  </div>
</div>
<?php if($row['NFT_payment']=="BNB"){?>
<script>
    setTimeout(async function(){
        let web3 = new Web3(provider);
        document.getElementById("servicebid").innerHTML=sellingFees
        document.getElementById("balancebid").innerHTML=((await web3.eth.getBalance(selectedAccount))/10**18).toFixed(3)+" BNB";
        // document.getElementById("balance").value=((await web3.eth.getBalance(selectedAccount))/10**18).toFixed(3);
    },2000)
</script>
<?php }else{?>
<script>
    setTimeout(async function(){
        document.getElementById("servicebid").innerHTML=sellingFees
        document.getElementById("balancebid").innerHTML=((await myTokenContract.methods.balanceOf(selectedAccount).call())/10**18).toFixed(3)+" <?php echo $row['NFT_payment']; ?>";
        // document.getElementById("balance").value=((await web3.eth.getBalance(selectedAccount))/10**18).toFixed(3);
    },2000)
</script>
<?php }?>
<script>
    document.getElementById("loadingdivnew").className="d-block"
    const myInterval = setInterval(checkwaleltConect, 3000);
    let ownerAdd = "<?php echo $row['NFT_owner_address'];?>";
    let sell = "<?php echo $row['NFT_resell'];?>";
    function checkwaleltConect() {
        if(selectedAccount){
          if(ownerAdd==selectedAccount || sell=="off"){
              document.getElementById("submit2").style.visibility = 'hidden';
            }
            document.getElementById("loadingdivnew").className="d-none"
            clearInterval(myInterval);
        }else{
            document.getElementById("loadingdivconnect").className="d-block"
        }
    }
    
</script>

<script>
    async function pay(){
        
        let balance;
        let currency="<?php echo $row['NFT_payment'];?>"
        let price=Number(document.getElementById("bid_value").value);
        if(currency=="BNB"){
            balance=bnbBalance
            
            if(balance<price){
                document.getElementById("multibuy").disabled=true;
                document.getElementById("alert").style.display="block";
                
            }else{
                document.getElementById("multibuy").disabled=false;
                document.getElementById("alert").style.display="none";
            }
        }else{
            
            balance=tokenBalance;
            
            if(balance<price){
                document.getElementById("multibuy").disabled=true;
                document.getElementById("alert").style.display="block";
            }else{
                document.getElementById("multibuy").disabled=false;
                document.getElementById("alert").style.display="none";
            }
        }
    }
    function checkAval(){
        let available=Number(<?php echo $row['end_id']-$row['start_id']+1?>);
        let value=Number(document.getElementById("bid_qty").value);
        console.log(available,"available");
        console.log(value,"value");
        if(available<value){
                document.getElementById("multibuy").disabled=true;
                document.getElementById("insufficient").style.display="block";
            }else{
                document.getElementById("multibuy").disabled=false;
                document.getElementById("insufficient").style.display="none";
            }
    }
        async function submitBid() {
        if(provider){
                let id = '<?php echo $_GET['id'] ?>';
                let price = '<?php echo $row['NFT_price'];?>';
                let NFT_name = "<?php echo $row['NFT_name'];?>";
                let NFT_image = "<?php echo $row['NFT_image'];?>";
                let NFT_paymenCurrency = "<?php echo $row['NFT_paymentcurrency'];?>";
                let payment = "<?php echo $row['NFT_payment'];?>";
                let start_id = Number("<?php echo $row['start_id'];?>");
                let x = Number(document.getElementById("bid_value").value);
                let web3 = new Web3(provider)
                var formdata = new FormData();
                formdata.append("tokenid", id);
                formdata.append("bid", x);
                formdata.append("bidder_Address", selectedAccount);
                formdata.append("NFT_name", NFT_name);
                formdata.append("NFT_image", NFT_image);
                formdata.append("NFT_paymenCurrency", NFT_paymenCurrency);
                formdata.append("payment", payment);
                formdata.append("onwerAddress", "<?php echo $row['NFT_owner_address'] ?>");
                formdata.append("Nft_quantity", Number(document.getElementById("bid_qty").value));
                formdata.append("start_id", start_id);
                formdata.append("endid", (start_id+Number(document.getElementById("bid_qty").value))-1);
                formdata.append("Multistatus", 1);
    
                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };
    
                fetch("./saveonlybid.php", requestOptions)
                    .then(response => response.json())
                    .then(result => {
                        console.log(result);
                        if (result.code==400) throw result.message;
                        Swal.fire({
                                  icon: 'success',
                                  title: 'Great...',
                                  text: `${result.message}`,
                                 
                                    }).then((ok) => {
                                                      location.href="./bid-description.php?id="+id;
                                                    }).catch(console.log);
                
                }).catch((err)=>{
                    console.log(err);
                    Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `${err}`
                    })
                })
        }else{
            Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: 'Please connect your Wallet First'
                })
        }

}	
</script>
<script>

    let id = "<?php echo $row['NFT_id'];?>";
    let ownerAddress = "<?php echo $row['NFT_owner_address'];?>";
    let NFT_royalties = "<?php echo $row['NFT_royalties'];?>";
    let NFT_creator_add = "<?php echo $row['NFT_creator_add'];?>";
    let NFT_paymenCurrency = "<?php echo $row['NFT_paymentcurrency'];?>";
    let payment = "<?php echo $row['NFT_payment'];?>";
    let NFT_image = "<?php echo $row['NFT_image'];?>";
    let NFT_name = "<?php echo $row['NFT_name'];?>";
    let start_id=Number("<?php echo $row['start_id'];?>");    
    let end_id="<?php echo $row['end_id'];?>";    
    console.log(NFT_paymenCurrency,"NFT_paymenCurrency");
    async function myFunction() {
        let quantity=Number(document.getElementById("quantity").value);
        console.log("function Called");
        if (provider) {
                    
            window.web3 = new Web3(provider);
            const account = selectedAccount;
            
            if (payment=="BNB") {
               let valuee = document.getElementById("pay").value
                valuee = await web3.utils.toWei(valuee.toString(), "ether");
                console.log(valuee,"value");
                myMultipleContract.methods.buyWithBNB(start_id,(start_id+quantity)-1,NFT_royalties,NFT_creator_add).send({ from: account, value : valuee})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    dataUpdate(selectedAccount,NFT_creator_add,valuee,(start_id+quantity)); 
                    
                }).catch(console.log("error"));
            } 
            else{   
                    let NFTprice=Number(document.getElementById("pay").value)*10;
                    console.log(NFTprice)
                    NFTprice = await web3.utils.toWei(NFTprice.toString(), "ether");
                    let tokens = await web3.utils.toWei(NFTprice.toString(), "ether");
                    myTokenContract.methods.approve(walletMultiple.contract_address, tokens)
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
        let valuee = document.getElementById("pay").value
        let quantity=Number(document.getElementById("quantity").value);
         valuee = await web3.utils.toWei(valuee.toString(), "ether");
                console.log("Hello We are in the tokens section",valuee);
                console.log(start_id,(start_id+quantity));
                myMultipleContract.methods.buyWithTokens(start_id,(start_id+quantity)-1,NFT_royalties,valuee,NFT_paymenCurrency,NFT_creator_add).send({from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    dataUpdate(selectedAccount,NFT_creator_add,valuee,(start_id+quantity)); 
                    
                }).catch(console.log("error"));
    }
    function dataUpdate(buyerAddress,NFT_creator_add,payAmount,start_id){
        
        var formdata = new FormData();
        formdata.append("value", payAmount);
        formdata.append("buyerAddress", buyerAddress);
        formdata.append("sellerAddress", NFT_creator_add);
        formdata.append("tokenid", id);
        formdata.append("NFT_image", NFT_image);
        formdata.append("NFT_name", NFT_name);
        formdata.append("start_id", start_id);
        formdata.append("quantity", Number(document.getElementById("quantity").value));
        formdata.append("payment", payment);
        formdata.append("paymentCurrency", NFT_paymenCurrency);

        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };

        fetch("./buymultiple.php", requestOptions)
            .then((response) => response.text())
            .then((result) => {
                Swal.fire({
                    icon: "success",
                    title: "Great...",
                    text: "Congratulation! You Bought This NFT",
                }).then((ok) => {
                    location.href = "./buy-description.php?id=" + id;
                });
            })
            .catch((error) => console.log("error", error));
    }
  
</script>

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
