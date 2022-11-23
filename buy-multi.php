<?php include "header.php";?>
<style type="text/css">
    button#multibuy {
        background: #d91c5c;
        border: none;
        padding: 8px;
        border-radius: 5px;
        color: #fff;
        font-size: 20px;
        margin-top: 10px;
    }

    .de-flex {
        display: flex;
        justify-content: space-between;
    }
</style>

<body>
    <!-- ======= Header ======= -->
    <?php
    
    if ($_GET['id']) {
        $NFT_data = mysqli_query($link, "SELECT * FROM NFT_info WHERE NFT_id='" . $_GET['id'] . "'");
        $row = mysqli_fetch_assoc($NFT_data);
        $dataOwner = mysqli_query($link, "SELECT * FROM `nft_user` WHERE Useraddress= '" . $row['NFT_owner_address'] . "'");
        $rowOwner = mysqli_fetch_assoc($dataOwner);

        $dataCreator = mysqli_query($link, "SELECT * FROM `nft_user` WHERE Useraddress=  '" . $row['NFT_creator_add'] . "'");
        $rowCreator = mysqli_fetch_assoc($dataCreator);
        if ($row['Type'] == 0) {
            echo "<script>location.href = './buy-description.php?id=" . $_GET['id'] . "';</script>";
        } else if ($row['Type'] == 2) {
            echo "<script>location.href = './onlybid.php?id=" . $_GET['id'] . "';</script>";
        } else if ($row['Type'] == 1) {
            echo "<script>location.href = './bid-description.php?id=" . $_GET['id'] . "';</script>";
        } else if ($row['Type'] == 4) {
            echo "<script>location.href = './onlymultibid.php?id=" . $_GET['id'] . "';</script>";
        }
    }
    ?>
    <!-- End Header -->
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
        <div class="container ">
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
                         
                    </div>
                    <div class="py-3">
                        <div class="kldnajblj">
                            <h5>Properties</h5>
                            <div class="">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="px-3 py-2 m-1 rounded text-center" style="width:125px;border: 1px solid var(--text-opcity);background: #00d9f321;">
                                        <h6 class="">shape </h6> 
                                        <h6 class=" m-0">round</h6>
                                    </div>
                                    <div class="px-3 py-2 m-1 rounded text-center" style="width:125px;border: 1px solid var(--text-opcity);background: #00d9f321;">
                                        <h6 class="">colour </h6> 
                                        <h6 class=" m-0">black</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mb-3">
                    <div class="pro_inners">
                        <div class="product__details__text ">
                            <h3><?php echo $row['NFT_name'] ?></h3>
                            <div class="blog__sidebar__item__tags d-flex align-items-center justify-content-between">
                                <p>Item Category: <span class="item-tags"><?php echo $row['NFT_category'] ?></span></p>
                                 <p> <span class="reffer_btn-authh">NFT Id: <?php echo $row['NFT_id'] ?></span> </p>
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
                                            <h4 class="bid-title" id="submit2">Buy Now</h4>
                                            <p class=""><?php echo $row['NFT_discription'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-12 text-center">
                                                    <button type="button" class="btn create-btn px-5" data-bs-toggle="modal" data-bs-target="#exampleModaled">
                                                        Buy Now
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="text-center" id="resell" style="display: none; width: 100%; margin-top: 10px;">
                                        <h4 class="modal-title text-center mb-4">Would you like to resell?</h4>
                                        <a class="d-inline text-center" href="#">
                                            <button type="button" class="btn create-btn px-5" id="yes" onclick="demoDisplay1()">
                                                Yes
                                            </button>
                                        </a>
                                        <a class="d-inline text-center" href="#">
                                            <button type="button" class="btn create-btn px-5" onclick="myFunction()" data-dismiss="modal">
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
                                            <p class="mb-0">Price</p>
                                            <h3 class="mt-15"><?php echo $row['NFT_price'] ?> <?php echo $row['NFT_payment'] ?> </h3>
                                            <p class="mb-0">
                                                <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="blog__sidebar__item mt-30 mb-30 mt-3">
                                        <h4>History</h4>
                                        <div class="blog__sidebar__recent">
                                            <?php
                                            $datahistory = mysqli_query($link, "SELECT * FROM `NFT_multi` WHERE NFT_id='" . $_GET['id'] . "'");
                                            while ($rowhistory = mysqli_fetch_assoc($datahistory)) {
                                                $userdata = mysqli_query($link, "SELECT * FROM nft_user where Useraddress='" . $rowhistory['owner_address'] . "'");
                                                $rowuser = mysqli_fetch_assoc($userdata);
                                            ?>
                                                <div class="blog__sidebar__recent__item">
                                                    <div class="blog__sidebar__recent__item__pic">
                                                        <a href="./profile.php?address=<?php echo $rowuser['Useraddress'] ?>">
                                                            <img src="<?php echo $rowuser['Userimage'] ?>" width="75" alt=""></a>
                                                    </div>
                                                    <div class="blog__sidebar__recent__item__text">
                                                        <h6><?php echo $rowuser['Username'] ?></h6>
                                                        <p class="author-link mb-0">
                                                            <?php echo $rowhistory['quantity']; ?> at Price <?php echo ($rowhistory['price']) / 10 ** 18; ?> <?php echo $rowhistory['payment']; ?> <br>
                                                        </p>
                                                        <span><?php echo $rowhistory['time']; ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
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
                    <h5 class="modal-title text-capitalize" id="exampleModalLabeled">Checkout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="background-size: cover;">
                    <div class="p-3 form-border" style="background-size: cover;">
                        <!-- <h3>Checkout</h3> -->
                        You are about to purchase a <b><?php echo $row['NFT_name'] ?> #<?php echo $row['NFT_id'] ?></b> from <b><?php echo $rowCreator['Username'] ?></b>
                        <div class="spacer-single" style="background-size: cover;"></div>
                        <h6>Enter quantity. <span class="id-color-2"> <?php echo $row['end_id'] - $row['start_id'] ?> available</span></h6>
                        <input type="text" name="buy_now_qty" id="quantity" class="form-control" value="1" onkeyup="pay()">
                        <small class="text-danger" style="display:none" id="alert">Insufficient balance</small>
                        <small class="text-danger" id="insuff" style="display: none;"> Enter quantity less than the available quantity</small>
                        <div class="spacer-single" style="background-size: cover;"></div>
                        <div class="de-flex mt-3" style="background-size: cover;">
                            <div style="background-size: cover;">Your balance</div>
                            <div style="background-size: cover;"><b id="balance"></b></div>
                        </div>
                        <div class="de-flex" style="background-size: cover;">
                            <div style="background-size: cover;">Service fee</div>
                            <div style="background-size: cover;"><b id="service"></b></div>
                        </div>
                        <div class="de-flex" style="background-size: cover;">
                            <div style="background-size: cover;">You will pay</div>
                            <div style="background-size: cover;"><b id="pay"><?php echo $row['NFT_price']; ?> <?php echo $row['NFT_payment']; ?></b></div>
                        </div>
                        <div class="spacer-single" style="background-size: cover;"></div>
                        <button type="button" class="btn create-btn btn-fullwidth w-100 d-block" data-bs-dismiss="modal" aria-label="Close" onclick="myFunction()" id="multibuy">Buy for <span id="willpay"><?php echo $row['NFT_price']; ?> <?php echo $row['NFT_payment']; ?></span></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php if ($row['NFT_payment'] == "BNB") { ?>
        <script>
            setTimeout(async function() {
                let web3 = new Web3(provider);
                document.getElementById("service").innerHTML = sellingFees
                document.getElementById("balance").innerHTML = ((await web3.eth.getBalance(selectedAccount)) / 10 ** 18).toFixed(3) + " BNB";
                // document.getElementById("balance").value=((await web3.eth.getBalance(selectedAccount))/10**18).toFixed(3);
            }, 2000)
        </script>
    <?php } else { ?>
        <script>
            setTimeout(async function() {
                document.getElementById("service").innerHTML = sellingFees
                document.getElementById("balance").innerHTML = ((await myTokenContract.methods.balanceOf(selectedAccount).call()) / 10 ** 18).toFixed(3) + " <?php echo $row['NFT_payment']; ?>";
                // document.getElementById("balance").value=((await web3.eth.getBalance(selectedAccount))/10**18).toFixed(3);
            }, 2000)
        </script>
    <?php } ?>
    <script>
        document.getElementById("loadingdivnew").className = "d-block"
        const myInterval = setInterval(checkwaleltConect, 3000);
        let ownerAdd = "<?php echo $row['NFT_owner_address']; ?>";
        let sell = "<?php echo $row['NFT_resell']; ?>";

        function checkwaleltConect() {
            if (selectedAccount) {
                if (ownerAdd == selectedAccount || sell == "off") {
                    document.getElementById("submit2").style.visibility = 'hidden';
                }
                document.getElementById("loadingdivnew").className = "d-none"
                clearInterval(myInterval);
            } else {
                document.getElementById("loadingdivconnect").className = "d-block"
            }
        }
    </script>
    <script>
        async function pay() {
            let available = Number(<?php echo $row['end_id'] - $row['start_id'] ?>);
            let value = Number(document.getElementById("quantity").value);
            let balance;
            let currency = "<?php echo $row['NFT_payment']; ?>"
            let price = value * <?php echo $row['NFT_price']; ?>;
            document.getElementById("pay").innerHTML = price + "<?php echo $row['NFT_payment']; ?>";
            document.getElementById("pay").value = price
            document.getElementById("multibuy").innerHTML = price + "<?php echo $row['NFT_payment']; ?>";
            if (currency == "BNB") {
                balance = bnbBalance
                if (available < value) {
                    document.getElementById("multibuy").disabled = true;
                    document.getElementById("insuff").style.display = "block";
                } else {
                    document.getElementById("multibuy").disabled = false;
                    document.getElementById("insuff").style.display = "none";
                }
                if (balance < price) {
                    document.getElementById("multibuy").disabled = true;
                    document.getElementById("alert").style.display = "block";

                } else {
                    document.getElementById("multibuy").disabled = false;
                    document.getElementById("alert").style.display = "none";
                }
            } else {

                balance = tokenBalance;
                if (available < value) {
                    document.getElementById("multibuy").disabled = true;
                    document.getElementById("insuff").style.display = "block";
                } else {
                    document.getElementById("multibuy").disabled = false;
                    document.getElementById("insuff").style.display = "none";
                }
                if (balance < price) {
                    document.getElementById("multibuy").disabled = true;
                    document.getElementById("alert").style.display = "block";
                } else {
                    document.getElementById("multibuy").disabled = false;
                    document.getElementById("alert").style.display = "none";
                }
            }
        }
    </script>
    <script>
        let id = "<?php echo $row['NFT_id']; ?>";
        let ownerAddress = "<?php echo $row['NFT_owner_address']; ?>";
        let NFT_royalties = "<?php echo $row['NFT_royalties']; ?>";
        let NFT_creator_add = "<?php echo $row['NFT_creator_add']; ?>";
        let NFT_paymenCurrency = "<?php echo $row['NFT_paymentcurrency']; ?>";
        let payment = "<?php echo $row['NFT_payment']; ?>";
        let NFT_image = "<?php echo $row['NFT_image']; ?>";
        let NFT_name = "<?php echo $row['NFT_name']; ?>";
        let start_id = Number("<?php echo $row['start_id']; ?>");
        let end_id = "<?php echo $row['end_id']; ?>";
        console.log(NFT_paymenCurrency, "NFT_paymenCurrency");
        async function myFunction() {
            let quantity = Number(document.getElementById("quantity").value);
            console.log("function Called");
            if (provider) {

                window.web3 = new Web3(provider);
                const account = selectedAccount;

                if (payment == "BNB") {
                    let valuee = document.getElementById("pay").value
                    valuee = await web3.utils.toWei(valuee.toString(), "ether");
                    console.log(valuee, "value");
                    myMultipleContract.methods.buyWithBNB(start_id, (start_id + quantity) - 1, NFT_royalties, NFT_creator_add).send({
                            from: account,
                            value: valuee
                        })
                        .on("transactionHash", function(hash) {
                            document.getElementById("loadingdiv").classList.remove("d-none");
                            document.getElementById("loadingdiv").className = "d-block";
                        })
                        .then((receipt1) => {
                            document.getElementById("loadingdiv").className = "d-none";
                            dataUpdate(selectedAccount, NFT_creator_add, valuee, (start_id + quantity));

                        }).catch(console.log("error"));
                } else {
                    let NFTprice = Number(document.getElementById("pay").value) * 10;
                    console.log(NFTprice)
                    NFTprice = await web3.utils.toWei(NFTprice.toString(), "ether");
                    let tokens = await web3.utils.toWei(NFTprice.toString(), "ether");
                    myTokenContract.methods.approve(walletMultiple.contract_address, tokens)
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
            let valuee = document.getElementById("pay").value
            let quantity = Number(document.getElementById("quantity").value);
            valuee = await web3.utils.toWei(valuee.toString(), "ether");
            console.log("Hello We are in the tokens section", valuee);
            console.log(start_id, (start_id + quantity));
            myMultipleContract.methods.buyWithTokens(start_id, (start_id + quantity) - 1, NFT_royalties, valuee, NFT_paymenCurrency, NFT_creator_add).send({
                    from: selectedAccount
                })
                .on("transactionHash", function(hash) {
                    document.getElementById("loadingdiv").classList.remove("d-none");
                    document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => {
                    document.getElementById("loadingdiv").className = "d-none";
                    dataUpdate(selectedAccount, NFT_creator_add, valuee, (start_id + quantity));

                }).catch(console.log("error"));
        }

        function dataUpdate(buyerAddress, NFT_creator_add, payAmount, start_id) {

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