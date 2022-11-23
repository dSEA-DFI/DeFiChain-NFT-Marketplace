<?php session_start();?>
<style>
    #exampleModalConnect {
        z-index: 9999;
    }

    .nav-item .active {
        background: var(--secondary-color);
        padding: 10px 20px !important;
        border-radius: 12px;
        color: var(--primary-color) !important;
    }
</style>
<?php

include("config.php");
// DEFINE A GLOBAL VARIABLE
$TOKEN = "BUSD";
$SITE_URL = "http://dsea.io/";
$tab=$_GET['tab'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <link href="./assets/img/jl-logo.png" rel="icon" />
    <link href="./assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="./assets/vendor/aos/aos.css" rel="stylesheet" />

    <link href="./assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />

    <link href="./assets/css/style.css?v=<?php echo filemtime('./assets/css/style.css'); ?>" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="./assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/slick-theme.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <!--swiper css-->

    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css?v=<?php echo filemtime('./assets/css/swiper-bundle.min.css'); ?>">
    <link rel="stylesheet" href="./assets/css/swipers.css?v=<?php echo filemtime('./assets/css/swipers.css'); ?>">
    <!--swiper css end-->


    <!--<link href="./assets/css/custom.css?v=<?php echo filemtime('./assets/css/custom.css'); ?>" rel="stylesheet" /> -->
    <!--<script src="./assets/js/Responsive-navbar-active-animation.js"></script>-->

    <!-- font family-->
    <link href="http://fonts.cdnfonts.com/css/karla" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/arkhip" rel="stylesheet">
    <!-- font family-->

    <title>dSEA NFT Marketplace</title>
    
    <style>
        .bg_modal_onload {
            background: var(--primary-color);
            position: fixed;
            top: 0;
            width: 100%;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: 9999;
        }
        .login-area{ 
            position: relative;
        }
        .login-overlay {
            position: absolute;
            background: #0D102D;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: left top;
            top: 0;
            width: 100%;
            left: 0;
            height: 100%;
            opacity: 0.98;
        }
        .login-form {
            background: #131740;
            padding: 40px 40px; 
            border-radius: 4px;
        }
        .login-area form#contactForm {
            border: none;
            border-radius:0;
            box-shadow: none;
        }
        .login-form .form-control {
            display: block;
            width: 100%;
            height: 50px;
            padding: 7px 15px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #fff;
            background-color: transparent;
            background-image: none;
            border: 1px solid #666;
            border-radius: 3px;
            margin-bottom: 20px;
        }
        .login-title {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .check-group {
            position: relative;
            margin: 10px 0px 20px;
            display: block;
        }
        .check-group .checkbox {
            position: absolute;
            display: inline-block;
            margin-top: 0px;
            margin-bottom: 0px;
            left: 20px;
        }
        .checkbox label {
            font-weight: 300;
            letter-spacing: 0;
            margin-bottom: 0;
            outline: none;
            display: -webkit-inline-box;
            display: inline-flex;
            -webkit-box-align: center;
            align-items: center;
            padding-left: 0;
            font-size: 15px;
        }
        .checkbox input[type="checkbox"] {
            min-height: 25px;
            height: 26px;
            margin-top: 0px;
            margin-left: -20px;
            margin-right: 10px;
        }
        .text-muted {
            font-size: 14px;
            float: right;
            margin-top: 2px;
            color: #c4d5f6;
        }
        .text-muted:hover{
            color: #fff;
        }
        .remember-text {
            color: #c4d5f6;
            font-weight: 300;
            font-size: 14px;
            left: 25px;
            position: absolute;
            top: 0px;
        }
        .text-muted {
            font-size: 12px;
            float: right;
            margin-top: 2px;
            color: #ccc!important;
        }
        .text-muted:hover{
            color: #FF06B7!important;
        }
        .separetor {
            margin-top: 20px;
        }
        .separetor span {
            color: #fff;
            position: relative;
            top: 10px;
        }
   
        .acc-not {
            font-size: 13px;
            margin-top: 20px;
            font-weight: 600;
            color: #ccc;
        }
        .signup-form .check-group {
            margin: 10px 0px 40px;
        }
        .slide-btn.login-btn {
            display: inline-block;
            font-weight: 600;
            margin: 0px;
            padding: 5px 10px;
            text-align: center;
            text-transform: uppercase;
            transition: all 0.4s ease 0s;
            width: 100%;
            border-radius: 0px;
            color: #fff;
            height: 50px;
            font-size: 16px;
            margin-top: 25px;
            border-radius: 5px;
            background: var(--text-pink);
            border:1px solid var(--text-pink);
        }
        .login-btn:hover{
            transition: all 0.4s ease 0s;
            background: var(--text-primary-color);
            border:1px solid var(--text-primary-color);
        }
    </style>
</head>


<body class="scrollbar">

    <section class="body-video">
        <video id="background-video" autoplay loop muted>
            <source src="./assets/img/jally-fish.mp4" type="video/mp4">
            <!--<source src="./assets/img/Untitled.mp4" type="video/mp4">-->
        </video>
    </section>

    <section class="main-div">


        <!-- top header navigation area -->
        <section class="main-navbar navbar-mainbg sticky-top">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand py-0" href="./?v=<?php echo rand(); ?>">
                        <img src="./assets/img/jl-logo.png" alt="" width="62px" class="img-fluid" />
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="fa-solid fa-bars" style="color: var(--secondary-color);"></i>
                        </span>
                    </button>


                    <div class="collapse navbar-collapse align-items-center" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item px-3">
                                <a class="nav-link <?php if($tab=='') echo "active"; ?>" aria-current="page" href="index.php?v=<?php echo rand(); ?>">Explore</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link <?php if($tab=='profile') echo "active"; ?>"  href="my_item.php?tab=profile&v=<?php echo rand(); ?>">Profile</a>
                            </li>
                            <!--<li class="nav-item dropdown px-3">-->
                            <!--    <a class="nav-link dropdown-toggle <?php if($tab=='create') echo "active"; ?> " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">-->
                            <!--        Create NFT-->
                            <!--    </a>-->
                            <!--    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">-->
                            <!--        <li><a class="dropdown-item" target="-blank" href="./create-single.php?tab=create&v=<?php echo rand(); ?>">NFT</a></li>-->
                                    <!--<li><a class="dropdown-item"  href="./create-multiple.php?tab=create&v=<?php echo rand(); ?>">Multiple NFT</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <li class="nav-item px-3">
                              <a class="nav-link <?php if($tab=='create') echo "active"; ?> " href="./create-single.php?tab=create&v=<?php echo rand(); ?>">Create NFT</a>
                            </li>
                            <li class="nav-item px-3">
                                <a class="nav-link <?php if($tab=='collection') echo "active"; ?>"  href="./create-collections.php?tab=collection&v=<?php echo rand(); ?>">Create Collection</a>
                            </li>

                        </ul>

                        <div class="header-social-links d-flex align-items-center">
                            <div class="dropdown">
                            <div class="dropdown d-flex align-items-center">
                                <button id="myBtn" class="btn create-btn connect con mr-2" data-bs-toggle="modal" data-bs-target="#exampleModalConnect">Connect Wallet</button>
                                
                                    <button id="usericon" style="display:none; padding: 6px 18px; color:var(--secondary-color)" class="btn connect con mr-2" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-user fa-1x" style="color:var(--secondary-color)"></i> Connected
                                    </button>
                                    <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton1" style="background: var(--primary-color);">
                                        <li>
                                            <div class="">
                                                <button id="mybtn" class="btn p-0" style="color: var(--secondary-color);"></button>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="py-3">
                                                <h6 class="font-weight-normal" style="color: var(--secondary-color);">Sell count: <span id="sell_count">0.00000</span> </h6>
                                            </div>
                                        </li>
                                        <li>
                                            <button style="display:none;" onclick="onDisconnect()" class="btn create-btn connect disconnect" style="padding: 4px 20px !important;">
                                                <span class="d-flex align-items-center" style="gap:15px"> <i class="fa-solid fa-power-off"></i> DisConnect</span>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <form method="get" action="search.php" class="d-flex mb-0 position-relative">
                            <input class="form-control mx-2 w-md-100 w-sm-75" name="data" type="search" placeholder="Search" aria-label="Search">
                            <span class="input_search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </form>
                    </div>
                    <!-- theme light & dark -->
                    <section class="darklight">
                        <img src="./assets/img/Half-Moon.png" width="25px" id="icon" onclick="changeTheme()" />
                    </section>
                    <!-- theme light & dark -->

                </div>
            </nav>
        </section>



        <!-- Modal account -->


        <div id="loadingdiv" class="d-none" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000;">
            <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background-color: #0d0d0db8;backdrop-filter: blur(10px);">
                <h3 class="text-white">Transaction in process, Please wait and do not refresh the page.</h3>
                <img src="./uploads/loader.gif" class="rounded-pill" width="200" height="200" />
            </div>
        </div>
        <div id="loadingdivnew" class="d-none" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000;">
            <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background-color: #0d0d0db8;backdrop-filter: blur(10px);">
                <h3 class="text-white">Fetching Data</h3>
                <img src="./uploads/loader.gif" class="rounded-pill" width="200" height="200" />
            </div>
        </div>
        <div id="loadingdivconnect" class="d-none" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000; ">
            <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background-color: #0d0d0db8;backdrop-filter: blur(10px);">
                <h3 class="text-white">Please Connect your Wallet First</h3>
                <img src="./uploads/loader.gif" class="rounded-pill" width="200" height="200" />
                <button id="myBtn" class="btn-main connect con ms-0" data-bs-toggle="modal" data-bs-target="#exampleModalConnect">Connect Wallet</button>
            </div>
        </div>
        <script>
         
            
            // MAINNET
            var wallet = {
                contract_address: "0x97b73a7Be57053dFf3C5dEd9a73903975eBd2E57",
                contract_abi: [ { "inputs": [ { "internalType": "contract IBEP20", "name": "currency", "type": "address" } ], "name": "addCurrenicies", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "stateMutability": "payable", "type": "constructor" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "owner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "approved", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "Approval", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "owner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "operator", "type": "address" }, { "indexed": false, "internalType": "bool", "name": "approved", "type": "bool" } ], "name": "ApprovalForAll", "type": "event" }, { "inputs": [ { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "approve", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "_user", "type": "address" } ], "name": "blackList", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "address payable", "name": "_reference", "type": "address" } ], "name": "buyWithBNB", "outputs": [], "stateMutability": "payable", "type": "function" }, { "inputs": [ { "internalType": "string", "name": "_tokenURI", "type": "string" }, { "internalType": "uint256", "name": "amount", "type": "uint256" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "bool", "name": "isToken", "type": "bool" }, { "internalType": "uint256", "name": "price", "type": "uint256" }, { "internalType": "contract IBEP20", "name": "paymentCurrency", "type": "address" }, { "internalType": "uint256", "name": "royalties", "type": "uint256" } ], "name": "mintNFT", "outputs": [], "stateMutability": "payable", "type": "function" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "previousOwner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "newOwner", "type": "address" } ], "name": "OwnershipTransferred", "type": "event" }, { "inputs": [], "name": "pauseSale", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "_user", "type": "address" } ], "name": "removeFromBlacklist", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "name": "renounceOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "resellOff", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "safeTransferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "bytes", "name": "_data", "type": "bytes" } ], "name": "safeTransferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "operator", "type": "address" }, { "internalType": "bool", "name": "approved", "type": "bool" } ], "name": "setApprovalForAll", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "_creationFess", "type": "uint256" }, { "internalType": "uint256", "name": "_sellingFess", "type": "uint256" }, { "internalType": "uint256", "name": "_referralFees", "type": "uint256" } ], "name": "setContractFees", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "price", "type": "uint256" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "bool", "name": "sell", "type": "bool" }, { "internalType": "contract IBEP20", "name": "paymentCurrency", "type": "address" }, { "internalType": "bool", "name": "isToken", "type": "bool" } ], "name": "setTokenPrice", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "name": "startSale", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "from", "type": "address" }, { "indexed": true, "internalType": "address", "name": "to", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "Transfer", "type": "event" }, { "inputs": [ { "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "transferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "address payable", "name": "_reference", "type": "address" }, { "internalType": "uint256", "name": "amount", "type": "uint256" } ], "name": "transferNFT", "outputs": [], "stateMutability": "payable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "newOwner", "type": "address" } ], "name": "transferOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "owner", "type": "address" } ], "name": "balanceOf", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "creationFess", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "getApproved", "outputs": [ { "internalType": "address", "name": "", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "hasSaleStarted", "outputs": [ { "internalType": "bool", "name": "", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "address", "name": "operator", "type": "address" } ], "name": "isApprovedForAll", "outputs": [ { "internalType": "bool", "name": "", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "name", "outputs": [ { "internalType": "string", "name": "", "type": "string" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "name": "nftINFO", "outputs": [ { "internalType": "uint256", "name": "price", "type": "uint256" }, { "internalType": "uint256", "name": "royalty", "type": "uint256" }, { "internalType": "address", "name": "owner_address", "type": "address" }, { "internalType": "address", "name": "creator_address", "type": "address" }, { "internalType": "contract IBEP20", "name": "paymentCurrency", "type": "address" }, { "internalType": "bool", "name": "isToken", "type": "bool" }, { "internalType": "bool", "name": "sell", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "owner", "outputs": [ { "internalType": "address", "name": "", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "ownerOf", "outputs": [ { "internalType": "address", "name": "", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "referenceFees", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "sellingFess", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "bytes4", "name": "interfaceId", "type": "bytes4" } ], "name": "supportsInterface", "outputs": [ { "internalType": "bool", "name": "", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "symbol", "outputs": [ { "internalType": "string", "name": "", "type": "string" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "index", "type": "uint256" } ], "name": "tokenByIndex", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "uint256", "name": "index", "type": "uint256" } ], "name": "tokenOfOwnerByIndex", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "tokenURI", "outputs": [ { "internalType": "string", "name": "", "type": "string" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "totalSupply", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "_owner", "type": "address" } ], "name": "walletOfOwner", "outputs": [ { "internalType": "uint256[]", "name": "", "type": "uint256[]" } ], "stateMutability": "view", "type": "function" } ]
            };            
        </script>
        <script>
            // MAINNET
            var walletToken = {
                contract_address: "0xe9e7CEA3DedcA5984780Bafc599bD69ADd087D56",
                contract_abi: [{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"owner","type":"address"},{"indexed":true,"internalType":"address","name":"spender","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Approval","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"previousOwner","type":"address"},{"indexed":true,"internalType":"address","name":"newOwner","type":"address"}],"name":"OwnershipTransferred","type":"event"},{"anonymous":false,"inputs":[{"indexed":true,"internalType":"address","name":"from","type":"address"},{"indexed":true,"internalType":"address","name":"to","type":"address"},{"indexed":false,"internalType":"uint256","name":"value","type":"uint256"}],"name":"Transfer","type":"event"},{"constant":true,"inputs":[],"name":"_decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"_name","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"_symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"owner","type":"address"},{"internalType":"address","name":"spender","type":"address"}],"name":"allowance","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"approve","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[{"internalType":"address","name":"account","type":"address"}],"name":"balanceOf","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"burn","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"decimals","outputs":[{"internalType":"uint8","name":"","type":"uint8"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"subtractedValue","type":"uint256"}],"name":"decreaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"getOwner","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"spender","type":"address"},{"internalType":"uint256","name":"addedValue","type":"uint256"}],"name":"increaseAllowance","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"mint","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"name","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"owner","outputs":[{"internalType":"address","name":"","type":"address"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[],"name":"renounceOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":true,"inputs":[],"name":"symbol","outputs":[{"internalType":"string","name":"","type":"string"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"totalSupply","outputs":[{"internalType":"uint256","name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transfer","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"sender","type":"address"},{"internalType":"address","name":"recipient","type":"address"},{"internalType":"uint256","name":"amount","type":"uint256"}],"name":"transferFrom","outputs":[{"internalType":"bool","name":"","type":"bool"}],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"internalType":"address","name":"newOwner","type":"address"}],"name":"transferOwnership","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"}]
            };        
        </script>

        <script type="text/javascript" src="https://unpkg.com/web3@1.2.11/dist/web3.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/web3modal@1.9.0/dist/index.js"></script>
        <script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.2.1/dist/umd/index.min.js"></script>
        <script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script>
        $(window).load(function(){        
           $('#usermodallog').modal('show');
            }); 
    </script>
        <script>
            "use strict";
            const Web3Modal = window.Web3Modal.default;
            const WalletConnectProvider = window.WalletConnectProvider.default;
            // const Fortmatic = window.Fortmatic;
            // const evmChains = window.evmChains;
            // const Binance= window.BinanceChain;
            let web3Modal
            let provider;
            let selectedAccount;
            let humanFriendlyBalance = 0;
            let myContract;
            let myTokenContract;
            let myMultipleContract;
            let creationfees = 0;
            let creationFeesMultiple = 0;
            let bnbBalance = 0;
            let tokenBalance = 0;
            let sellingFees = 0;
            
            // mainnet
            let supportedChainid = 56
            let supportedRpcUrl = "https://bsc-dataseed.binance.org/";
            let supportedExplorer = "https://bscscan.com/";
            let supportedNetwork = "Binance Mainnet";
            

            // mainnet switch
            async function Switchchain() {
                try {
                    await ethereum.request({
                        method: "wallet_switchEthereumChain",
                        params: [{ chainId: '0x' + supportedChainid.toString(16) }],
                    });
                    // connectWallet();
                } catch (switchError) {
                    console.log(switchError);
                    // This error code indicates that the chain has not been added to MetaMask.
                    if (switchError.code === 4902) {
                        try {
                            await ethereum.request({
                                method: "wallet_addEthereumChain",
                                params: [
                                {
                                    chainId: '0x' + supportedChainid.toString(16),
                                    chainName: supportedNetworkName,
                                    rpcUrls: [supportedRPCurl], blockE
                                },
                                ],
                            });
                            // connectWallet();
                        } catch (addError) {
                            // handle "add" error
                        }
                    }
                    // handle other "switch" errors
                }
            }            

            // testnet Switch
            // async function Switchchain() {
            //     try {

            //         await ethereum.request({
            //             method: 'wallet_switchEthereumChain',
            //             params: [{
            //                 chainId: '0x61'
            //             }],
            //         });
            //     } catch (switchError) {

            //         // This error code indicates that the chain has not been added to MetaMask.
            //         if (switchError.code === 4902) {
            //             try {
            //                 await ethereum.request({
            //                     method: 'wallet_addEthereumChain',
            //                     params: [{
            //                         chainId: '0x61',
            //                         chainName: 'Binance chain  ',
            //                         rpcUrls: ['https://bsc-dataseed.binance.org/'],
            //                     }, ],
            //                 });
            //             } catch (addError) {
            //                 // handle "add" error
            //             }
            //         }
            //         // handle other "switch" errors
            //     }
            // }

            async function fetchAccountData(provider) {
                const web3 = new Web3(provider);
                const chainId = await web3.eth.getChainId();
                if (chainId == '') {
                    chainchanged();
                }
                if (chainId == supportedChainid) {
                    const accounts = await web3.eth.getAccounts();
                    selectedAccount = accounts[0];
                    myContract = new web3.eth.Contract(wallet.contract_abi, wallet.contract_address);
                    // myMultipleContract = new web3.eth.Contract(walletMultiple.contract_abi, walletMultiple.contract_address);
                    myTokenContract = new web3.eth.Contract(walletToken.contract_abi, walletToken.contract_address);
                    creationfees = Number(await myContract.methods.creationFess().call());
                    // creationFeesMultiple = Number(await myMultipleContract.methods.creationFess().call());

                    bnbBalance = ((await web3.eth.getBalance(selectedAccount)) / 10 ** 18).toFixed(3);
                    tokenBalance = ((await myTokenContract.methods.balanceOf(selectedAccount).call()) / 10 ** 18).toFixed(3);
                    sellingFees = await myContract.methods.sellingFess().call();
                    var formdata = new FormData();
                    formdata.append("address", selectedAccount);
                    formdata.append("action", "login");
                    var requestOptions = {
                        method: "POST",
                        body: formdata,
                        redirect: "follow",
                    };

                    fetch("./createUserSession.php", requestOptions)
                        .then((response) => response.json())
                        .then((result) => {
                        })
                        .catch((error) => console.log("error", error));


                    if (selectedAccount) {
                        if (screen.width < 1024) {

                            // document.querySelector(".connect").textContent = selectedAccount.substring(0, 5);
                            document.getElementById("mybtn").innerHTML = selectedAccount.substr(0,10)+"..."+selectedAccount.substr(38,42);
                            //  document.querySelector(".connect").disabled = true;
                            document.querySelector(".disconnect").style.display = "block";
                            document.getElementById("usericon").style.display = "block";
                            document.querySelector(".connect").style.display = "none";
                        } else {

                            // document.querySelector(".connect").textContent = selectedAccount.substring(0, 5);
                            // document.querySelector(".connect").disabled = true;
                            document.getElementById("mybtn").innerHTML = selectedAccount.substr(0,10)+"..."+selectedAccount.substr(38,42);
                            document.querySelector(".disconnect").style.display = "block";
                            //   document.querySelector("#list").style.display="block";
                            //   document.querySelector("#pro").style.display="block";

                            document.getElementById("usericon").style.display = "block";
                            document.querySelector(".connect").style.display = "none";
                        }
                        localStorage.setItem("wallet_address", selectedAccount);
                        const balance = await web3.eth.getBalance(selectedAccount);
                        const ethBalance = web3.utils.fromWei(balance, "ether");
                        humanFriendlyBalance = parseFloat(ethBalance).toFixed(4);
                        user(selectedAccount);
                        document.getElementById("loadingdivconnect").className = "d-none"
                        // window.location.reload();
                    }
                    // document.querySelector("#alert-error-https").style.display = "none";
                } else {
                    Switchchain();

                }

            }

            async function onConnect() {

                try {

                    provider = new WalletConnectProvider({
                        infuraId: "",
                        rpc: {
                            56: "https://bsc-dataseed.binance.org/",
                            // 97: "https://data-seed-prebsc-1-s1.binance.org:8545/",
                        },
                        chainId: supportedChainid,
                        qrcode: true,
                        qrcodeModalOptions: {
                            mobileLinks: [
                                "metamask",
                                "trust",
                            ],
                        },
                    });
                    await provider.enable();
                    localStorage.setItem("wallet", "trust");
                    const web3 = new Web3(provider);
                    let chainId = await web3.eth.getChainId();


                    setTimeout(async function() {
                        if (chainId == supportedChainid) {
                            await fetchAccountData(provider);


                        } else {
                            Switchchain();
                        }
                    }, 5000);

                    provider.on("accountsChanged", (accounts) => {
                        fetchAccountData(provider);
                    });

                    provider.on('networkChanged', function(networkId) {

                        if (networkId != supportedChainid) {
                            Switchchain();
                        } else {
                            fetchAccountData(provider);
                            var formdata = new FormData();
                            formdata.append("address", selectedAccount);
                            formdata.append("action", "login");
                            var requestOptions = {
                                method: "POST",
                                body: formdata,
                                redirect: "follow",
                            };

                            fetch("./createUserSession.php", requestOptions)
                                .then((response) => response.json())
                                .then((result) => {
                                })
                                .catch((error) => console.log("error", error));
                        }
                    });


                } catch (e) {

                    return;
                }
            }
            async function metamask() {

                try {

                    provider = await window.web3.currentProvider;
                    await provider.enable();
                    await fetchAccountData(provider);

                    localStorage.setItem("wallet", "metamask");

                    provider.on("accountsChanged", (accounts) => {
                        window.location.reload();
                        fetchAccountData(provider);
                        var formdata = new FormData();
                        formdata.append("address", selectedAccount);
                        formdata.append("action", "login");
                        var requestOptions = {
                            method: "POST",
                            body: formdata,
                            redirect: "follow",
                        };

                        fetch("./createUserSession.php", requestOptions)
                            .then((response) => response.json())
                            .then((result) => {
                            })
                            .catch((error) => console.log("error", error));
                    });

                    provider.on('networkChanged', function(networkId) {

                        if (networkId != supportedChainid) {
                            Switchchain();
                        } else {
                            fetchAccountData(provider);

                        }
                    });
                } catch (e) {
                    Swal.fire({
                        icon: 'warning',
                        title: "Couldn't find Metamask!...",
                        html: "You can download it from" + "<a href='https://metamask.io/'>https://metamask.io/ </a>" + "or try connecting via WalletConnect!",
                    }).then((ok) => {})
                    return;
                }

            }
            async function onDisconnect() {

                //await provider.close();
                // provider = null;
                // localStorage.removeItem("wallet");
                // localStorage.clear();

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Disconnect?',
                    text: "Are you sure you want to disconnect?",
                    icon: 'info',
                    confirmButtonText: 'Disconnect',
                    reverseButtons: true
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        var connectedWith = localStorage.getItem('wallet');

                        if (wallet === "Metamask") {
                            provider = ethereum;
                        }

                        if (provider.disconnect) provider.disconnect().catch(console.log);
                        var formdata = new FormData();
                        formdata.append("action", "logout");
                        var requestOptions = {
                            method: "POST",
                            body: formdata,
                            redirect: "follow",
                        };

                        fetch("./createUserSession.php", requestOptions)
                            .then((response) => response.json())
                            .then((result) => {
                            })
                            .catch((error) => console.log("error", error));
                        localStorage.clear();
                        if (screen.width < 1024) {
                            document.querySelector(".mconnect").textContent = "Connect";
                            document.querySelector(".mdisconnect").style.display = "none";
                            document.querySelector("#mpro").style.display = "none";
                        } else {
                            document.querySelector(".connect").textContent = "Connect";
                            document.querySelector(".disconnect").style.display = "none";
                            window.location.reload();
                        }
                    }
                })
                selectedAccount = null;
            }


            window.addEventListener('load', async () => {
                let wallet = localStorage.getItem("wallet");

                if (wallet == "metamask") {
                    metamask();

                } else if (wallet == "trust") {
                    onConnect();
                }
            });

            function user(account) {
                var formdata = new FormData();
                formdata.append("address", account);

                var requestOptions = {
                    method: 'POST',
                    body: formdata,
                    redirect: 'follow'
                };

                fetch("./checkNewUser.php", requestOptions)
                    .then(response => response.text())
                    .then(result => {
                        console.log("result",result);
                        document.getElementById("sell_count").innerHTML=result;
                    })
                    .catch(error => console.log('error', error));

            }
        </script>
        <!-- End Header -->