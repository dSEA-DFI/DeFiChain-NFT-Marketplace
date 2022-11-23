<?php session_start();
include "header.php";
?>
<style type="text/css">
    #countdown li {
        display: inline-block;
        font-size: 15px;
        list-style-type: none;
        padding: 0px 15px 10px 20px;
        text-transform: uppercase;
        text-align: center;
        border-radius: 5px;
        background: var(--text-pink);
        color: var(--secondary-color);
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
</style>


<?php 
    
    $id=$_GET['id'];
    if($_GET['id']){
        $NFT_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_id='".$_GET['id']."'");
        $row=mysqli_fetch_assoc($NFT_data);
        $dataOwner=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress= '".$row['NFT_owner_address']."'");
        $rowOwner=mysqli_fetch_assoc($dataOwner);
        
        $dataCreator=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$row['NFT_creator_add']."'");
        $rowCreator=mysqli_fetch_assoc($dataCreator);
        $databidder=mysqli_query($link,"SELECT * FROM `nft_user` WHERE Useraddress=  '".$row['NFT_highest_bidder']."'");
        $rowbidder=mysqli_fetch_assoc($databidder);
        
        if($row['Type']==0){
        echo"<script>location.href = './buy-description.php?id=".$_GET['id']."';</script>";
        }
        else if($row['Type']==2){
            echo"<script>location.href = './onlybid.php?id=".$_GET['id']."';</script>";
        }
        else if($row['Type']==3){
            echo"<script>location.href = './buy-multi.php?id=".$_GET['id']."';</script>";
        }
        else if($row['Type']==4){
            echo"<script>location.href = './onlymultibid.php?id=".$_GET['id']."';</script>";
        }
       $ddress=$_SESSION['address'];
    }
    ?>
<div class="collectible">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 data-aos="fade-up" data-aos-duration="2000">Bid Description</h2>
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
                                        <div class="px-3 py-2 m-1 rounded text-center" style="width:125px;border: 1px solid var(--text-opcity);background: #00d9f321;">
                                            <h6 class=""><?php echo $rowproperties['NFT_property'] ?> </h6> 
                                            <h6 class=" m-0"><?php echo $rowproperties['NFT_type'] ?></h6>
                                        </div>
                                    <?php }?>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?}?>
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
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-3">
                <div class="product__details__text">
                    <div class="d-flex justify-content-between">
                            <h3><?php echo $row['NFT_name']?></h3>
                            <a class="btn btn-dark" href="https://bscscan.com/token/0x97b73a7be57053dff3c5ded9a73903975ebd2e57?a=<?php echo $row['NFT_id'];?>" target="_blank">View on BSCscan</a>
                    </div>
                    <div class="blog__sidebar__item__tags">
                        <p>Collection: <a href="./collection.php?collection=<?php echo $row['NFT_collection'];?>&v=<?php echo rand(); ?>" class="item-tags" style="color:var(--text-pink)"><?php echo $row['NFT_collection'];?></a><br>
                        <p>Item Category: <span class="item-tags">
                                <?php echo $row['NFT_category']?>
                            </span><br>
                            <span class="reffer_btn-authh">NFT Id:
                                <?php echo $row['NFT_id']?>
                            </span>
                        </p>
                    </div>
                    <div class="row mt-30">
                        <div class="col-lg-6 col-md-12">
                            <div class="latest-product__text">
                                <div class="top-author">
                                    <a href="./profile.php?address=<?php echo $rowCreator['Useraddress'] ?>&v=<?php echo rand();?>"
                                        class="author-info">
                                        <img src="<?php echo $rowCreator['Userimage']; ?>" class="avatar" alt="">

                                    </a>
                                    <div class="item-pri">
                                        <p class="papple">Creator</p>
                                        <h5>
                                            <?php echo $rowCreator['Username'] ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="latest-product__text">
                                <div class="top-author">
                                    <a href="./profile.php?address=<?php echo $rowOwner['Useraddress'] ?>&v=<?php echo rand();?>"
                                        class="author-info">
                                        <img src="<?php echo $rowOwner['Userimage'] ?>" class="avatar" alt="">

                                    </a>
                                    <div class="item-pri">
                                        <p class="papple">Owner</p>
                                        <h5>
                                            <?php echo $rowOwner['Username'] ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offer-btn">
                        <?php echo $row['NFT_royalties']?>% of sales go to creators
                    </div>
                    <div class="auction-details text-center mb-30">
                        <div class="top-bord"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="item-detail">
                                    <h4 class="bid-title" id="bid">Bid Now</h4>
                                    <h4 class="bid-title d-none" id="claim">claim</h4>

                                    <p class="">
                                        <?php echo $row['NFT_discription']?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="button" class="btn create-btn m-auto px-5" style="color: #fff;"
                                                id="submit1" data-bs-toggle="modal" data-bs-target="#exampleModaled">
                                                Bid Now
                                            </button>
                                            <button type="button" class="btn create-btn m-auto px-5 d-none"
                                                style="color: #fff;" id="claimNFT" onclick="myFunction()">
                                                Claim
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center" id="resell" style="display: none; width: 100%; margin-top: 10px;">
                                <h4 class="modal-title text-center mb-4">Would you like to resell?</h4>
                                <a class="d-inline text-center" href="#">
                                    <button type="button" class="btn btn-secondary px-5" style="color: #fff !important;"
                                        id="yes" onclick="demoDisplay1()">
                                        Yes
                                    </button>
                                </a>
                                <a class="d-inline text-center" href="#">
                                    <button type="button" class="btn btn-secondary px-5" style="color: #fff !important;"
                                        onclick="myFunction()" data-dismiss="modal">
                                        Don't
                                    </button>
                                </a>
                            </div>
                            <div class="resend-amount" id="enteramount"
                                style="display: none; width: 100%; margin-top: 10px;">
                                <h4 class="modal-title text-center mb-4">Enter the resale amount.</h4>
                                <form>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="value"
                                                style="background-color: #f8f9fa; border: none; color: #000; border-radius: 25px;"
                                                placeholder="Enter resell amount(WPR)">
                                        </div>
                                        <div class="col">
                                            <button type="button" class="btn btn-primary px-3" onclick="myFunction()"
                                                style="color: #fff !important;" data-dismiss="modal">
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
                                    <h3 class="mt-15">
                                        <?php echo $row['NFT_highest_bid']?>
                                        <?php echo $row['NFT_payment']?>
                                    </h3>
                                    <!--  <p class="mb-0">
                                                <br>
                                            </p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        if($row['NFT_auction']>time())
                        {?>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div id="countdown">
                                <ul style="padding-left: 0px;">
                                    <li><span id="days"></span>days</li>
                                    <li><span id="hours"></span>Hours</li>
                                    <li><span id="minutes"></span>Minutes</li>
                                    <li><span id="seconds"></span>Seconds</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php }else{?>
                    <div class="auction-details mb-0 mt-2">
                        <div class="top-bord"></div>
                        <div class="row">
                            <div class="blog__sidebar__recent">
                                <div class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <a href="./profile.php?address=<?php echo $rowbidder['Useraddress'] ?>&v=<?php echo rand();?>">
                                            <img src="<?php echo $rowbidder['Userimage'];?>" width="75" alt=""></a>
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>
                                            <?php echo $rowbidder['Username'];?>
                                        </h6>
                                        <p class="author-link mb-0">
                                            Price
                                            <?php echo $row['NFT_highest_bid']?>
                                            <?php echo $row['NFT_payment']?> <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?}?>
                    <div class="row mt-2">
                        <div class="col-md-12">

                            <nav class="accordion dropdown-arrows">
                                <input type="radio" name="accordion-radio-button" id="accordion-item-1"
                                    autocomplete="off">
                                <section class="accordion-item bg-transparent">
                                    <label class="accordion-header" for="accordion-item-1" style="color:var(--secondary-color)">Bids</label>
                                    <label class="closing" for="accordion-closing-button"></label>
                                    <div class="accordion-text">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-light">
                                                <?php 
                                                $dataHistory=mysqli_query($link,"SELECT * FROM NFT_bid WHERE NFT_id='".$_GET['id']."'");
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
                                                        <td><a
                                                                href="./profile.php?address=<?php echo $rowbidder['Useraddress'] ?>&v=<?php echo rand();?>"><img
                                                                    src="<?php echo $rowbidder['Userimage']; ?>"
                                                                    class="" width="30px" height="30px"
                                                                    style="border-radius: 50%;" alt=""></a></td>
                                                        <td>
                                                            <?php echo $rowbidder['Username']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rowhistory['NFT_bid']; ?>
                                                            <?php echo $rowhistory['payment']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rowhistory['Date']; ?>
                                                        </td>
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


                                <input type="radio" name="accordion-radio-button" id="accordion-closing-button"
                                    autocomplete="off">
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

<?php if($row['NFT_auction']>time())
{?>
<script type="text/javascript">
    let type = "<?php echo $row['NFT_payment'];?>";
    let sell = "<?php echo $row['NFT_resell'];?>";

    let ownerAdd = "<?php echo $row['NFT_owner_address'];?>";
    document.getElementById("loadingdivnew").className = "d-block"
    const myInterval = setInterval(checkwalelt, 10000);
    async function checkwalelt() {

        if (selectedAccount) {
            
            document.getElementById("loadingdivnew").className = "d-none"
            if (type == "BNB") {
                let web3 = new Web3(provider);
                document.getElementById("service").innerHTML = sellingFees
                document.getElementById("yourbalance").innerHTML = ((await web3.eth.getBalance(selectedAccount)) / 10 ** 18).toFixed(3) + " BNB";
            } else {
                document.getElementById("service").innerHTML = sellingFees
                document.getElementById("yourbalance").innerHTML = ((await myTokenContract.methods.balanceOf(selectedAccount).call()) / 10 ** 18).toFixed(3) + " <?php echo $row['NFT_payment']; ?>";
            }
            
            if (ownerAdd == selectedAccount || sell == "off") {
                document.getElementById("submit1").style.visibility = 'hidden';

            }
            clearInterval(myInterval);
        } else {
            document.getElementById("loadingdivconnect").className = "d-block"
        }
    }
    (function () {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;

        const countDown = <?php echo $row['NFT_auction'];?>* 1000,

            x = setInterval(function () {
                const now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById("days").innerText = Math.floor(distance / (day)),
                    document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                //do something later when date is reached
                if (distance < 0) {
                    document.getElementById("headline").innerText = "It's my birthday!";
                    document.getElementById("countdown").style.display = "none";
                    document.getElementById("content").style.display = "block";
                    clearInterval(x);
                }
                //seconds
            }, 1000)
    }());
</script>
<?php }else{?>
<script>
    let highestBidder = "<?php echo $row['NFT_highest_bidder'] ?>";
    document.getElementById("loadingdivnew").className = "d-block"
    const myInterval = setInterval(checkwaleltConect, 3000);
    function checkwaleltConect() {
        if (selectedAccount) {
            document.getElementById("loadingdivnew").className = "d-none"
            if (highestBidder == selectedAccount) {
                document.getElementById("claimNFT").className = "btn btn-secondary px-5 d-block"
                document.getElementById("claim").className = "d-block"

                document.getElementById("bid").className = "d-none"
                document.getElementById("submit1").className = "d-none"

            } else {
                document.getElementById("bid").innerText = "Auction Is Over!";
                document.getElementById("submit1").className = "d-none"
            }
            clearInterval(myInterval);
        } else {
            document.getElementById("loadingdivconnect").className = "d-block"
        }
    }
    if (<?php echo $row['email_send'] ?>==0 ) {
        var formdata = new FormData();
        formdata.append("Tid", <?php echo $_GET['id'];?>);

        var requestOptions = {
            method: 'POST',
            body: formdata,
            redirect: 'follow'
        };

        fetch("./emailAuction.php", requestOptions)
            .then(response => response.text())
            .then(result => {
            })
    }
</script>
<?php }?>
<!-- Modal -->
<div class="modal fade" id="exampleModaled" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title text-capitalize" id="exampleModalLabeled">
                    <?php echo $row['NFT_name']?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="buy-bid-model-content" id="buy-bid-model-content">
                    <h5 class="modal-title text-left">You are about to bid on the #
                        <?php echo $row['NFT_id']?>
                    </h5>
                    <p>
                        <?php echo $row['NFT_description']?>
                    </p>

                    <div class="checkout-list">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <form>
                                    <div class="mb-3">
                                        <input type="number" class="form-control border-0 border-bottom rounded-0"
                                            id="enterBid" onkeyup="checkbid()" aria-describedby="emailHelp">
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <p class="m-0">
                                    <?php echo $row['NFT_payment']?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="checkout-list">
                        <div class="your_balance d-flex justify-content-between">
                            <div class="bala_tit">
                                <p>Your balance</p>
                            </div>
                            <div class="bala_desc" id="yourbalance">0 BNB</div>
                        </div>
                    </div>
                    <div class="checkout-list">
                        <div class="d-flex justify-content-between">
                            <div class="">
                                <p>Sales Fee</p>
                            </div>
                            <div class="" id="service">0.00006 BNB</div>
                        </div>
                    </div>
                    <div class="checkout-btns-in">
                        <div class="">
                            <p class="text-danger" id="inceficinet" style="display: none;">Insufficient Balance For Bid
                            </p>
                        </div>
                        <div class="">
                            <p class="text-danger" id="minimumbid" style="display: none;">Bid Must Be Greater Than
                                Minimum Bid</p>
                        </div>
                        <button class="connect_wa_llets w-100" data-dismiss="modal" aria-label="Close" id="submitbid"
                            onclick="submitBid()" disabled="">Bid Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://unpkg.com/web3@1.2.11/dist/web3.min.js"></script>

<script type="text/javascript"
    src="https://unpkg.com/@walletconnect/web3-provider@1.5.2/dist/umd/index.min.js"></script>

<script>
    // setTimeout(async function(){
    //     let web3 = new Web3(provider);
    //     let sellPrice= sellingFees;
    //     document.getElementById("service").innerHTML=(<?php echo $row['NFT_price']; ?>*sellPrice)/100;
    //     document.getElementById("yourbalance").innerHTML=bnbBalance+" BNB";
    // },2000)
    function checkbid() {

        let balance = 0;
        let bid = document.getElementById("enterBid").value;
        let price =<?php echo $row['NFT_price']?>;
        let currency = "<?php echo $row['NFT_payment'];?>"
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
            let price = '<?php echo $row['NFT_price'];?>';
            let NFT_name = "<?php echo $row['NFT_name'];?>";
            let NFT_image = "<?php echo $row['NFT_image'];?>";
            let NFT_paymenCurrency = "<?php echo $row['NFT_paymentcurrency'];?>";
            let payment = "<?php echo $row['NFT_payment'];?>";
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

            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("./savebid.php", requestOptions)
                .then(response => response.json())
                .then(result => {
                    if (result.code == 400) throw result.message;
                    Swal.fire({
                        icon: 'success',
                        title: 'Great...',
                        text: `${result.message}`,

                    }).then((ok) => {
                        location.href = "./bid-description.php?id=" + id+"&v="+Math.floor((Math.random() * 100000000) + 1);
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

    let NFTprice = "<?php echo $row['NFT_highest_bid'];?>";
    let id = "<?php echo $row['NFT_id'];?>";
    let ownerAddress = "<?php echo $row['NFT_owner_address'];?>";
    let NFT_royalties = "<?php echo $row['NFT_royalties'];?>";
    let NFT_creator_add = "<?php echo $row['NFT_creator_add'];?>";
    let NFT_paymenCurrency = "<?php echo $row['NFT_paymenCurrency'];?>";
    let payment = "<?php echo $row['NFT_payment'];?>";
    let NFT_image = "<?php echo $row['NFT_image'];?>";
    let NFT_name = "<?php echo $row['NFT_name'];?>";


    async function myFunction() {
        if (provider) {

            window.web3 = new Web3(provider);
            const account = selectedAccount;

            if (payment == "BNB") {

                let valuee = await web3.utils.toWei(NFTprice.toString(), "ether");
                myContract.methods.transferNFT(id, ownerAddress, 0).send({ from: account, value: valuee })
                    .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                    })
                    .then((receipt1) => {
                        document.getElementById("loadingdiv").className = "d-none";
                        dataUpdate(account, NFT_creator_add, valuee);

                    }).catch(console.log("error"));
            }
            else {
                // let NFTprice = NFTprice * 10;
                let tokens  = await web3.utils.toWei(NFTprice.toString(), "ether");

                myTokenContract.methods.approve(wallet.contract_address, tokens)
                    .send({ from: account })
                    .on("transactionHash", function (hash) {
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
        myContract.methods.transferNFT(id, ownerAddress, valuee).send({ from: selectedAccount })
            .on("transactionHash", function (hash) {
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
                    location.href = "./bid-description.php?id=" + id+"&v="+Math.floor((Math.random() * 1000000) + 1);
                });
            })
            .catch((error) => console.log("error", error));
    }

</script>
<!-- ======= Footer ======= -->
<?php include "footer.php"?>
 