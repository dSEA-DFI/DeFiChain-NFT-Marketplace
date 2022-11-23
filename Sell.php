<?php include "header.php";?>
<style type="text/css">
    button#multibuy {
        background: var(--text-pink);
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


    div#contents_right {
        border: 1px solid #dddddd;
        padding: 15px;
        border-radius: 15px;
    }

    .img_box .collection_wrap {
        width: 60%;
        float: left;
        padding-left: 10px;
        font-size: 17px;
        font-weight: 600;
    }

    img#myImg {
        border-radius: 15px;
    }

    .sale {
        padding: 50px 0;
    }

    .collection_price p {
        font-weight: 600;
    }

    .collection_price {
        text-align: right;
        font-size: 17px;
    }

    h6.collection_name {
        font-weight: 600;
        font-size: 16px;
    }

    .fee {
        float: right;
        font-size: 20px;
        color: var(--secondary-color);
    }

    p.fees {
        font-size: 17px;
        color: var(--secondary-color);
        font-weight: 600;
    }

    .sale .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: var(--text-pink);
    }

    .sale .nav-pills .nav-link {
        background: 0 0;
        border: 1px solid #cccccc;
        border-radius: 0.25rem;
        color: var(--secondary-color);
        padding: 10px 40px;
        margin: 0px 15px 0px 0;
    }

    .sale h2 {
        font-size: 25px;
        font-weight: 600;
        color: var(--secondary-color);
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 46px;
        height: 23px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    input:checked+.slider {
        background-color: #2196f3;
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: var(--text-pink);
        -webkit-transition: .2s;
        transition: .2s;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .slider::before {
        position: absolute;
        content: "";
        width: 15px;
        height: 15px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .2s;
        transition: .2s;
    }

    .submitbutton button.btn.btn-dark {
        background-color: var(--text-pink);
        border-color: var(--text-pink);
    }

    .sale h4 {
        font-size: 17px;
        margin-bottom: 0;
    }


    .onoffswitch {
      position: relative;
      width: 78px;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
  }

  .onoffswitch-checkbox {
      display: none;
  }

  .onoffswitch-label {
      display: block;
      overflow: hidden;
      cursor: pointer;
      /*border: 1px solid #999999;*/
      border-radius: 20px;
  }

  .onoffswitch-inner {
      width: 200%;
      margin-left: -100%;
      -moz-transition: margin 0.3s ease-in 0s;
      -webkit-transition: margin 0.3s ease-in 0s;
      -o-transition: margin 0.3s ease-in 0s;
      transition: margin 0.3s ease-in 0s;
  }

  .onoffswitch-inner:before,
  .onoffswitch-inner:after {
      float: left;
      width: 50%;
      height: 30px;
      padding: 0;
      line-height: 30px;
      font-size: 15px;
      color: white;
      font-family: Trebuchet, Arial, sans-serif;
      font-weight: bold;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
  }

  .onoffswitch-inner:before {
      content: "ON";
      padding-left: 11px;
      background-color: #ff00c0;
      color: #ffffff;
  }

  .onoffswitch-inner:after {
      content: "OFF";
      padding-right: 11px;
      background-color: #eeeeee;
      color: #999999;
      text-align: right;
  }

  .onoffswitch-switch {
      width: 26px;
      margin: 2px;
      background: #ffffff;
      border: 2px solid #999999;
      border-radius: 20px;
      position: absolute;
      top: 0;
      bottom: 0;
      right: 44px;
      -moz-transition: all 0.3s ease-in 0s;
      -webkit-transition: all 0.3s ease-in 0s;
      -o-transition: all 0.3s ease-in 0s;
      transition: all 0.3s ease-in 0s;
  }

  .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
      margin-left: 0;
  }

  .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
      right: 0px;
  }


</style>

<!-- ======= Header ======= -->
<?php 

if($_GET['id']){
    $NFT_data=mysqli_query($link,"SELECT * FROM NFT_info WHERE NFT_id='".$_GET['id']."'");
    $row=mysqli_fetch_assoc($NFT_data);
}
?>
<!-- End Header -->
<div class="collectible">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 data-aos="fade-up" data-aos-duration="2000">Sell</h2>
            </div>
        </div>
    </div>
</div>


<div class="sale">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pro_inners">
                    <h2>List item for sale</h2>
                    <div class="d-flex align-items-center justify-content-between border p-2 rounded mb-3">
                        <div>
                            <h4>Put on marketplace</h4>
                        </div>

                        <div class="onoffswitch">
                          <input type="checkbox" name="toggle" value="on" class="onoffswitch-checkbox" id="togBtn" checked >
                          <label class="onoffswitch-label" for="togBtn">
                              <div class="onoffswitch-inner"></div>
                              <div class="onoffswitch-switch"></div>
                          </label>
                      </div> 
                       <!--  <div>
                            <label class="switch">
                                <input type="checkbox" id="togBtn" value="off"  name="toggle">
                                <div class="slider round"></div>
                            </label>
                        </div> -->
                    </div>
                <div id="hello_sir">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">
                            <i class="fas fa-dollar-sign"></i> <br>
                        Fixed Price</button>
                    </li>
                    
                     <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-open-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-open" type="button" role="tab" aria-controls="pills-open"
                            aria-selected="true">
                            <i class="fas fa-dollar-sign"></i> <br>
                        Open for Bid</button>
                    </li>
                    
                    
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false"> <i class="fas fa-dollar-sign"></i> <br> Timed Auction</button>
                    </li>
                </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <h5>Price</h5>
                        <select class="form-select" aria-label="Default select example" id="select" onchange="changeToken()">
    
                            <option selected value="<?php echo $TOKEN; ?>">
                                <?php echo $TOKEN; ?>
                            </option>
                            <option value="BNB"> BNB </option>
                        </select>
                        <div class="price_box mt-3">
                            <input name="price" placeholder="Amount" class="form-control" id="pricefixed" value=""
                            style="cursor: text;">
                        </div>
                        <div class="fees_wrap">
                            <!--<h3 class="title mt-3">Fees</h3>-->
                            <p class="fees">
                                Sales Fee
                                <span class="fee" id="serviceFees">0</span>
                            </p>
                        </div>
    
                        <!--<div class="submitbutton py-4">-->
                        <!--    <button type="button" onclick="myFunction()"-->
                        <!--    class="btn btn-dark share-btn w-100">Submit</button>-->
                        <!--</div>-->
    
                    </div>
                     <div class="tab-pane fade" id="pills-open" role="tabpanel"
                        aria-labelledby="pills-open-tab">
                        <h5>Price</h5>
                        <select class="form-select" aria-label="Default select example" id="select3" onchange="changeToken2()">
    
                            <option selected value="<?php echo $TOKEN; ?>">
                                <?php echo $TOKEN; ?>
                            </option>
                            <option value="BNB"> BNB </option>
                        </select>
                        <div class="price_box mt-3">
                            <input name="price" placeholder="Amount" class="form-control" id="priceopen" value=""
                            style="cursor: text;">
                        </div>
                        <div class="fees_wrap">
                            <!--<h3 class="title mt-3">Fees</h3>-->
                            <p class="fees">
                                Sales Fee
                                <span class="fee" id="serviceFees">0</span>
                            </p>
                        </div>
    
                        <!--<div class="submitbutton py-4">-->
                        <!--    <button type="button" onclick="myFunction()"-->
                        <!--    class="btn btn-dark share-btn w-100">Submit</button>-->
                        <!--</div>-->
    
                    </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <h5>Price</h5>
                            <select class="form-select" aria-label="Default select example" id="select1" onchange="changeToken1()">
                                <option selected value="<?php echo $TOKEN; ?>">
                                    <?php echo $TOKEN; ?>
                                </option>
                                <option value="BNB"> BNB </option>
                            </select>
                            <div class="price_box mt-3">
                                <input name="price" placeholder="Amount" class="form-control" id="minimumbid" value=""
                                style="cursor: text;">
                            </div>
                            <div class="price_box mt-3">
                                <input name="date" placeholder="Date" class="form-control" id="enddays" value=""
                                type="date" style="cursor: text;">
                            </div>
                           
                        </div>
                    </div>
                </div>
                 <div class="submitbutton py-4">
                                <button type="button" onclick="myFunction()"
                                class="btn btn-dark share-btn w-100">Submit</button>
                            </div>
    </div>
</div>
<div class="col-md-6">
    <div class="pro_inners">
        <h2 class="title">Preview</h2>
        <div id="contents_right">
            <div class="img_box clearfix">
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
                        <div class="collection_wrap mt-3">
                            <p class="collection_link">
                                <?php echo $row['NFT_name']?> #
                                <?php echo $row['NFT_id']?>
                            </p>
                            <h6 class="collection_name">
                                <?php echo $row['NFT_discription']?>
                            </h6>
                        </div>
                        <div class="collection_price mt-3 text-right">
                            <p>Price</p>
                            <span>
                                <i class="">
                                    <img id="tokenImage" src="./assets/img/BUSD.png" width="20px" />
                                </i>
                                <span class="count">
                                    <?php echo $row['NFT_price']?>
                                </span>
                            </span>
                        </div>
                        <div class="img_box_bottom">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script>


    const changeToken = () => {
        let token = document.getElementById("select").value;
        if(token == "BNB"){
            document.getElementById("tokenImage").setAttribute("src","./assets/img/Binance.png");
        }else if(token == "BUSD"){
            document.getElementById("tokenImage").setAttribute("src","./assets/img/BUSD.png");
        }
    }

    const changeToken1 = () => {
        let token = document.getElementById("select1").value;
        if(token == "BNB"){
            document.getElementById("tokenImage").setAttribute("src","./assets/img/Binance.png");
        }else if(token == "BUSD"){
            document.getElementById("tokenImage").setAttribute("src","./assets/img/BUSD.png");
        }
    }
    
    const changeToken2 = () => {
        let token = document.getElementById("select3").value;
        if(token == "BNB"){
            document.getElementById("tokenImage").setAttribute("src","./assets/img/Binance.png");
        }else if(token == "BUSD"){
            document.getElementById("tokenImage").setAttribute("src","./assets/img/BUSD.png");
        }
    }

    $("#togBtn").on("change", () => {
         $("#togBtn").val($("#togBtn").val() === "on" ? "off" : "on");
        if(document.getElementById("togBtn").value == "on"){
            // $("#togBtn").val($("#togBtn").val()=="on";
            document.getElementById("hello_sir").style.display="block";
        }else{
            // $("#togBtn").val($("#togBtn").val()=="off";
            document.getElementById("hello_sir").style.display="none";
        }
    });
    
    async function myFunction() {
    
        if (provider) {
            if(document.getElementById("togBtn").value == "on")
            {   
                window.web3 = new Web3(provider);
                let chainid = await web3.eth.getChainId();
                if (chainid == 56) {
                    // 			document.getElementById("loadingdiv").className = "d-block";
                    const account = selectedAccount;
                    let payment = $("#select option:selected").val();
                    let payment1 = $("#select1 option:selected").val();
                    let payment2 = $("#select3 option:selected").val();
    
                    if ($("#pills-home-tab").hasClass("active")) {
                        $("#submit").attr("value", "fixed");
                        let price = document.getElementById("pricefixed").value;
                        myNewFunction("<?php echo $_GET['id'];?>", payment, price, 0, 0);
                    } else if($("#pills-profile-tab").hasClass("active")){
                        $("#submit").attr("value", "auction");
                        let bid = (document.getElementById("minimumbid").value);
                        let enddays = (document.getElementById("enddays").value);
                        let NFT_auction_time = document.getElementById("enddays").value;
                        console.log(NFT_auction_time);
    
                        NFT_auction_time = NFT_auction_time.split("-");
                        var newDate = new Date(NFT_auction_time[0], NFT_auction_time[1] - 1, NFT_auction_time[2]);
                        console.log(newDate.getTime());
                        myNewFunction("<?php echo $_GET['id'];?>", payment1, bid, newDate.getTime(), 1)
                    }else{
                        $("#submit").attr("value", "Open");
                        let price = document.getElementById("priceopen").value;
                        myNewFunction("<?php echo $_GET['id'];?>", payment2, price, 0, 2);
                    }
           
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'warning...',
                        text: 'Please Select the Binance Network ',
                    })
                }
            }else{
                let Id="<?php echo $_GET['id'];?>";
                myContract.methods.resellOff(Id).send({ from: selectedAccount }).on("transactionHash", function (hash) {
                document.getElementById("loadingdiv").className = "d-block";
            }).then(() => {
                    var formdata = new FormData();
                    formdata.append("id",Id);
                    
                    var requestOptions = {
                      method: 'POST',
                      body: formdata,
                      redirect: 'follow'
                    };
                    
                    fetch("./sellOff.php", requestOptions)
                      .then(response => response.json())
                      .then(result => {
                           Swal.fire({
                            icon: 'success',
                            title: 'Great...',
                            text: response.message,
                        }).then((ok) => {
                            location.href = "./my_item.php"+"?v="+Math.floor((Math.random() * 1000000) + 1);
                        })
                          
                      }).catch(error => {console.log('error', error)
                      Swal.fire({
                                icon: 'warning',
                                title: 'warning...',
                                text: `${error}`,
                            })
                            });
            }).catch((error) => console.log("error", error));
                
            }
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'warning...',
                text: 'Please connect your wallet First',
            })
        }
        
 
    }
    function myNewFunction(Id, payment, price, tokenauction, nftType) {
        let contractAddress = wallet.contract_address;
        let token = false;
        if (payment != "BNB") {
            contractAddress = walletToken.contract_address;
            token = true;
        }
        let sale=true;
        if(document.getElementById("togBtn").value=="off"){
            sale=false;
        }
        let newvalue = (price * 10 ** 18).toString();
        myContract.methods.setTokenPrice(newvalue, Id, sale, contractAddress, token).send({ from: selectedAccount }).on("transactionHash", function (hash) {
            document.getElementById("loadingdiv").className = "d-block";
        }).then(() => {
        console.log(payment, price, tokenauction, nftType, Id,"values");
            updatedata(payment, price, tokenauction, nftType, Id);
         }).catch((error) => console.log("error", error));


    }
    function updatedata(payment, price, tokenauction, nftType, Id) {
        console.log(payment, price, tokenauction, nftType, Id);
        let account = selectedAccount;

        let contractAddress = wallet.contract_address;
        if (payment != "BNB") {
            contractAddress = walletToken.contract_address
        }
        try {
            var formdata = new FormData();
            formdata.append("id", Id);
            formdata.append("price", price);
            formdata.append("auction", (tokenauction / 1000));
            formdata.append("account", account);
            formdata.append("currency", contractAddress);
            formdata.append("payment", payment);
            formdata.append("type", nftType);
            formdata.append("sale", document.getElementById("togBtn").value);

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./resell.php", requestOptions).then((response) => response.json()).then((response) => {
                if (response.code == 400) throw response.message;
                document.getElementById("loadingdiv").className = "d-none";
                Swal.fire({
                    icon: 'success',
                    title: 'Great...',
                    text: response.message,
                }).then((ok) => {
                    location.href = "./my_item.php"+"?v="+Math.floor((Math.random() * 1000000) + 1);
                })
            }).catch((error) => console.log("error", error));

        } catch (err) {
            console.log(err, "err");
        }
    }
</script>

<!-- ======= Footer ======= -->
<?php include "footer.php"?>
