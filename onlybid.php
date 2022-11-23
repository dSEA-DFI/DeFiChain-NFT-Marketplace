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

    .accordion-text {
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

    input:checked+.accordion-item {
        height: auto;
    }

    input:checked+.accordion-item .accordion-text,
    input:checked+.accordion-item .closing {
        display: block;
    }

    input:checked+.accordion-item .accordion-text {
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

    input:checked+section.accordion-item .accordion-header:before {
        transform: rotate(90deg);
        top: 1px;
    }
    
    nav.accordion.dropdown-arrows table tbody, td, tfoot, th, thead, tr { 
    color: #000 !important; 
}
    
</style>


<?php

$id = $_GET['id'];
if ($_GET['id']) {
    $NFT_data = mysqli_query($link, "SELECT * FROM NFT_info WHERE NFT_id='" . $_GET['id'] . "'");
    $row = mysqli_fetch_assoc($NFT_data);
    $dataOwner = mysqli_query($link, "SELECT * FROM `nft_user` WHERE Useraddress= '" . $row['NFT_owner_address'] . "'");
    $rowOwner = mysqli_fetch_assoc($dataOwner);

    $dataCreator = mysqli_query($link, "SELECT * FROM `nft_user` WHERE Useraddress=  '" . $row['NFT_creator_add'] . "'");
    $rowCreator = mysqli_fetch_assoc($dataCreator);
    $databidder = mysqli_query($link, "SELECT * FROM `nft_user` WHERE Useraddress=  '" . $row['NFT_highest_bidder'] . "'");
    $rowbidder = mysqli_fetch_assoc($databidder);

    if ($row['Type'] == 0) {
        echo "<script>location.href = './buy-description.php?id=" . $_GET['id'] . "';</script>";
    } else if ($row['Type'] == 1) {
        echo "<script>location.href = './bid-description.php?id=" . $_GET['id'] . "';</script>";
    } else if ($row['Type'] == 3) {
        echo "<script>location.href = './buy-multi.php?id=" . $_GET['id'] . "';</script>";
    } else if ($row['Type'] == 4) {
        echo "<script>location.href = './onlymultibid.php?id=" . $_GET['id'] . "';</script>";
    }
    $ddress = $_SESSION['address'];
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
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="product__details__pic pro_inners">
                    <div class="product__details__pic__item">

                        <?php
                        $img = $row['NFT_image'];
                        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                        // print_r($ext);
                        if ($ext == "mp4" || $ext == "mpeg" || $ext == "aac") {
                        ?>
                            <video width="100%" height="225px" controls src="<? echo $row['NFT_image']; ?>">
                                Your browser does not support the video tag.
                            </video>
                        <? } else if ($ext == "mp3" || $ext == "mpeg" || $ext == "aac") {
                        ?>
                            <audio width="100%" height="225px" controls src="<? echo $row['NFT_image']; ?>">
                                Your browser does not support the video tag.
                            </audio>
                        <? } else {
                        ?>
                            <img src="<?php echo $row['NFT_image']; ?>" class="img-fluid rounded" alt="">
                        <? } ?>
                    </div> 
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
                                        <div class="px-3 py-2 m-1 rounded text-center" style="border: 1px solid var(--text-opcity);background: #00d9f321; width: 30.30%;">
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
                <div class="pro_inners">
                    <div class="product__details__text">
                        <div class="d-flex justify-content-between">
                            <h3><?php echo $row['NFT_name']?></h3>
                            <a class="btn btn-dark" href="https://bscscan.com/token/0x97b73a7be57053dff3c5ded9a73903975ebd2e57?a=<?php echo $row['NFT_id'];?>" target="_blank">View on BSCscan</a>
                        </div>
                        <div class="blog__sidebar__item__tags d-flex align-items-center justify-content-between">
                            <p>Collection: <a href="./collection.php?collection=<?php echo $row['NFT_collection'];?>&v=<?php echo rand(); ?>" class="item-tags" style="color:var(--text-pink)"><?php echo $row['NFT_collection'];?></a><br>
                            <p>Item Category: <span class="item-tags"><?php echo $row['NFT_category'] ?></span></p>
                            <p>
                                <span class="reffer_btn-authh">NFT Id: <?php echo $row['NFT_id'] ?></span>
                            </p>
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
                        <div class="offer-btn"><?php echo $row['NFT_royalties'] ?>% of sales go to creators</div>
                        <div class="auction-details text-center mb-30">
                            <div class="top-bord"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="item-detail">
                                        <h4 class="bid-title" id="bid">Bid Now</h4>
                                        <h4 class="bid-title d-none" id="claim">claim</h4>
    
                                        <p class=""><?php echo $row['NFT_discription'] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-lg-12 text-center">
                                                <button type="button" class="btn create-btn px-5" style="color: #fff;" id="submit1" data-bs-toggle="modal" data-bs-target="#exampleModaled">
                                                    Bid Now
                                                </button>
                                                <button type="button" class="btn create-btn px-5 d-none" style="color: #fff;" id="claimNFT" onclick="myFunction()">
                                                    Claim
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
                                        <p class="mb-0">Minimum Biding Price</p>
                                        <h3 class="mt-15"><?php echo $row['NFT_price'] ?> <?php echo $row['NFT_payment'] ?> </h3>
                                        <!--  <p class="mb-0">
                                                    <br>
                                                </p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="row mt-2">
                            <div class="col-md-12">
    
                                <nav class="accordion dropdown-arrows">
                                    <input type="radio" name="accordion-radio-button" id="accordion-item-1" autocomplete="off">
                                    <section class="accordion-item">
                                        <label class="accordion-header" for="accordion-item-1">Bids</label>
                                        <label class="closing" for="accordion-closing-button"></label>
                                        <div class="accordion-text">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-light">
                                                    <?php
                                                    $dataHistory = mysqli_query($link, "SELECT * FROM NFT_onlybid WHERE NFT_id='" . $_GET['id'] . "'");
                                                    if (mysqli_num_rows($dataHistory)) {
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
    
                                                            while ($rowhistory = mysqli_fetch_assoc($dataHistory)) {
                                                                $databidder = mysqli_query($link, "SELECT * FROM `nft_user` WHERE Useraddress='" . $rowhistory['NFT_bidder'] . "'");
                                                                $rowbidder = mysqli_fetch_assoc($databidder)
                                                            ?>
                                                                <tr>
                                                                    <td><a href="./profile.php?address=<?php echo $rowbidder['Useraddress'] ?>"><img src="<?php echo $rowbidder['Userimage']; ?>" class="" width="30px" height="30px" style="border-radius: 50%;" alt=""></a></td>
                                                                    <td><?php echo $rowbidder['Username']; ?></td>
                                                                    <td><?php echo $rowhistory['NFT_bid']; ?> <?php echo $rowhistory['payment']; ?></td>
                                                                    <td><?php echo $rowhistory['Date']; ?></td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        } else { ?>
                                                            <tr>
                                                                <td>
                                                                    <p style="color:#000"> No Bids Found</p>
                                                                </td>
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
            </div>
        </div>
    </div>
</section>
<!-- ======= Footer ======= -->
<?php include "footer.php" ?>
 
<!-- Modal -->
<div class="modal fade" id="exampleModaled" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-capitalize" id="exampleModalLabeled"><?php echo $row['NFT_name'] ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="buy-bid-model-content" id="buy-bid-model-content">
                    <h4 class="modal-title text-left">Checkout</h4>
                    <p>
                        <?php echo $row['NFT_description'] ?>
                    </p>

                    <div class="checkout-list">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <form>
                                    <div class="mb-3">
                                        <input type="number" class="form-control border-0 border-bottom rounded-0" id="enterBid" onkeyup="checkbid()" aria-describedby="emailHelp">
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <p class="m-0"><?php echo $row['NFT_payment'] ?></p>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="checkout-list">
                        <div class="your_balance d-flex justify-content-between">
                            <div class="bala_tit">
                                <p>Your balance</p>
                            </div>
                            <div class="bala_desc" id="yourbalance">0 DFI</div>
                        </div>
                    </div>
                    <div class="checkout-list">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <p>Sales Fee</p>
                            </div>
                            <div class="" id="service">0.00006 DFI</div>
                        </div>
                    </div>
                    <div class="checkout-btns-in">
                        <div class="">
                            <p class="text-danger" id="inceficinet" style="display: none;">Insufficient Balance For Bid</p>
                        </div>
                        <div class="">
                            <p class="text-danger" id="minimumbid" style="display: none;">Bid Must Be Greater Than Minimum Bid</p>
                        </div>
                        <button class="connect_wa_llets w-100" data-dismiss="modal" aria-label="Close" id="submitbid" onclick="submitBid()" disabled="">Proceed to payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$dataHistory = mysqli_query($link, "SELECT * FROM NFT_onlybid WHERE NFT_id='" . $_GET['id'] . "' AND Accept_offer=1");
$newrow = mysqli_fetch_assoc($dataHistory);
if ($row['NFT_payment'] == "BNB") { ?>
    <script>
        setTimeout(async function() {
            let web3 = new Web3(provider);
            document.getElementById("service").innerHTML = sellingFees
            document.getElementById("yourbalance").innerHTML = ((await web3.eth.getBalance(selectedAccount)) / 10 ** 18).toFixed(3) + " DFI";
        }, 2000)
    </script>
<?php } else { ?>
    <script>
        setTimeout(async function() {
            document.getElementById("service").innerHTML = sellingFees
            document.getElementById("yourbalance").innerHTML = ((await myTokenContract.methods.balanceOf(selectedAccount).call()) / 10 ** 18).toFixed(3) + " <?php echo $row['NFT_payment']; ?>";
        }, 2000)
    </script>
<?php } ?>
<script>
    // setTimeout(async function(){
    let highestBidder = "<?php echo $newrow['NFT_bidder'] ?>";
    document.getElementById("loadingdivnew").className = "d-block"
    const myInterval = setInterval(checkwaleltConect, 10000);

    function checkwaleltConect() {
        let sell = "<?php echo $row['NFT_resell'] ?>"
        if (sell == "on") {
            if (selectedAccount) {
                document.getElementById("loadingdivnew").className = "d-none"
                if (highestBidder == selectedAccount) {
                    document.getElementById("claimNFT").className = "btn btn-secondary px-5 d-block"
                    document.getElementById("claim").className = "d-block"

                    document.getElementById("bid").className = "d-none"
                    document.getElementById("submit1").className = "d-none"
                }
                clearInterval(myInterval);
            } else {
                document.getElementById("loadingdivconnect").className = "d-block"
            }
        } else {
            document.getElementById("submit1").className = "d-none";
            document.getElementById("claimNFT").className = "d-none";
            clearInterval(myInterval);
            document.getElementById("loadingdivnew").className = "d-none"
        }
    }
    // },2000)
    function checkbid() {

        let balance = 0;
        let bid = document.getElementById("enterBid").value;
        let price = <?php echo $row['NFT_price'] ?>;
        let currency = "<?php echo $row['NFT_payment']; ?>"
        if (currency == "BNB") {
            balance = bnbBalance;
            if (Number(balance) < Number(bid)) {
                document.getElementById("inceficinet").style.display = "block";
                document.getElementById("submitbid").disabled = true;
            } else {
                document.getElementById("inceficinet").style.display = "none";
                document.getElementById("submitbid").disabled = false;
            }
            if (Number(price) > Number(bid)) {
                document.getElementById("minimumbid").style.display = "block";
                document.getElementById("submitbid").disabled = true;
            } else {
                document.getElementById("minimumbid").style.display = "none";
                document.getElementById("submitbid").disabled = false;
            }
        } else {
            balance = tokenBalance;
            if (Number(balance) < Number(bid)) {
                document.getElementById("inceficinet").style.display = "block";
                document.getElementById("submitbid").disabled = true;
            } else {
                document.getElementById("inceficinet").style.display = "none";
                document.getElementById("submitbid").disabled = false;
            }
            if (Number(price) > Number(bid)) {
                document.getElementById("minimumbid").style.display = "block";
                document.getElementById("submitbid").disabled = true;
            } else {
                document.getElementById("minimumbid").style.display = "none";
                document.getElementById("submitbid").disabled = false;
            }
        }
    }

    async function submitBid() {
        if (provider) {
            let id = '<?php echo $_GET['id'] ?>';
            let price = '<?php echo $row['NFT_price']; ?>';
            let NFT_name = "<?php echo $row['NFT_name']; ?>";
            let NFT_image = "<?php echo $row['NFT_image']; ?>";
            let NFT_paymenCurrency = "<?php echo $row['NFT_paymentcurrency']; ?>";
            let payment = "<?php echo $row['NFT_payment']; ?>";
            let x = document.getElementById("enterBid").value;
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
            formdata.append("Nft_quantity", 1);
            formdata.append("endid", id);
            formdata.append("start_id", id);
            formdata.append("Multistatus", 0);

            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./saveonlybid.php", requestOptions)
                .then(response => response.json())
                .then(result => {
                    if (result.code == 400) throw result.message;
                    Swal.fire({
                        icon: 'success',
                        title: 'Great...',
                        text: `${result.message}`,

                    }).then((ok) => {
                        location.href = "./bid-description.php?id=" + id;
                    }).catch(console.log);

                }).catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: `${err}`
                    })
                })
        } else {
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
    let NFTprice = "<?php echo $newrow['NFT_bid']; ?>";
    let id = "<?php echo $row['NFT_id']; ?>";
    let ownerAddress = "<?php echo $row['NFT_owner_address']; ?>";
    let NFT_royalties = "<?php echo $row['NFT_royalties']; ?>";
    let NFT_creator_add = "<?php echo $row['NFT_creator_add']; ?>";
    let NFT_paymenCurrency = "<?php echo $row['NFT_paymenCurrency']; ?>";
    let payment = "<?php echo $row['NFT_payment']; ?>";
    let NFT_image = "<?php echo $row['NFT_image']; ?>";
    let NFT_name = "<?php echo $row['NFT_name']; ?>";


    async function myFunction() {
        if (provider) {

            window.web3 = new Web3(provider);
            const account = selectedAccount;

            if (payment == "BNB") {

                let valuee = await web3.utils.toWei(NFTprice.toString(), "ether");
                myContract.methods.transferNFT(id, ownerAddress, 0).send({
                        from: account,
                        value: valuee
                    })
                    .on("transactionHash", function(hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                    })
                    .then((receipt1) => {
                        document.getElementById("loadingdiv").className = "d-none";
                        dataUpdate(account, NFT_creator_add, valuee);

                    }).catch(console.log("error"));
            } else {
                // NFTprice = NFTprice * 10;
                let tokens = await web3.utils.toWei(NFTprice.toString(), "ether");

                myTokenContract.methods.approve(wallet.contract_address, tokens)
                    .send({
                        from: account
                    })
                    .on("transactionHash", function(hash) {
                        document.getElementById("loadingdiv").className = "d-block";
                    }).then(() => {
                        buyNFT();
                    }).catch(console.log);
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please Connet Your Wallet First!',
            })
        }
    }
    async function buyNFT() {
        let valuee = await web3.utils.toWei(NFTprice.toString(), "ether");
        myContract.methods.transferNFT(id, ownerAddress, valuee).send({
                from: selectedAccount
            })
            .on("transactionHash", function(hash) {
                document.getElementById("loadingdiv").classList.remove("d-none");
                document.getElementById("loadingdiv").className = "d-block";
            })
            .then((receipt1) => {
                document.getElementById("loadingdiv").className = "d-none";
                dataUpdate(selectedAccount, NFT_creator_add, valuee);

            }).catch(console.log("error"));
    }

    function dataUpdate(buyerAddress, NFT_creator_add, payAmount) {
        var formdata = new FormData();
        formdata.append("tokeind", id);

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("./updateOffer.php", requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));

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
                    location.href = "./my_item.php"+"?v="+Math.floor((Math.random() * 1000000) + 1);
                });
            })
            .catch((error) => console.log("error", error));


    }
</script>
 