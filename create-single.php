<?php include "header.php";
date_default_timezone_set("Asia/Kolkata");
$date = date("Y-m-d");
?>
<div class="collectible">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Create NFT</h2>
            </div>
        </div>
    </div>
</div>
<div class="hot_all_collections py-lg-5 py-md-5 py-sm-4 py-4">
    <div class="container">
        <!--<div class="row align-item-center justify-content-center">-->
        <!--    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 m-auto">-->
        <!--        <div class="create_heading">-->
        <!--            <h2 class="ttext-white text_gradient">Create single collectible</h2>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="row">
            <div class="col-lg-12 col-12 m-auto">
                <div class="col-area">
                    <div class="row">
                        <div class="col-xl-7 col-lg-8 col-md-12 col-sm-12 col-12 m-auto" style="height: 100%;">
                            <div class="registration_form">
                                <div class="col-md-12 col-12 name_input py-2">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" id="title" placeholder="e. g. 'Enter NFT name'" />
                                    </div>
                                </div>
                                <div class="col-md-12 col-12 description_input py-2">
                                    <div class="form-group">
                                        <label for="Description">Description </label>
                                        <textarea rows="2" class="form-control" placeholder="e. g. 'Description of your nft in detail'" name="description" id="description"></textarea>
                                        <small class="text-muted">With preserved line-breaks </small>
                                    </div>
                                </div>
                            
                                <div class="upload-section">
                                    <label>Upload file</label>
                                    <div class="upload_here">
                                        <p>PNG,JPG,GIF files size not more than 100mb.</p>
                                        <input type="file" name="file" id="tokenImage" style="display: none;" class="file" required="" accept="all/*" />
                                        <div class="input-group my-3">
                                            <div class="input-group-append">
                                                <button type="button" class="browse btn connect_wa_llets">Choose file...</button>
                                            </div>
                                        </div>
                                        <!--<div class="choosen_img" id="img">-->
                                        <!--    <img src="" id="preview" class="rounded">-->
                                        <!--</div>-->
                                    </div>
                                </div>
                                <div class="put-on-marketplace mt-3">
                                    <div class="choose-tab-this mt-3">
                                        <ul class="nav nav-pills mb-3 fixed_price_box" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-fixed-tab" data-toggle="pill" href="#pills-fixed" role="tab" aria-controls="pills-home" aria-selected="true">
                                                    <div class="make-tab text-center">
                                                        <i class="fa fa-tags"></i>
                                                        <span class="d-block" id="fixed">
                                                            Fixed <br />
                                                            Price
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-open-tab" data-toggle="pill" href="#pills-open" role="tab" aria-controls="pills-open" aria-selected="false">
                                                    <div class="make-tab text-center">
                                                        <i class="fal fa-users"></i>
                                                        <span class="d-block" id="auction">
                                                            Open for <br />
                                                            bids
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-time-tab" data-toggle="pill" href="#pills-time" role="tab" aria-controls="pills-time" aria-selected="false">
                                                    <div class="make-tab text-center">
                                                        <i class="fad fa-chess-clock"></i>
                                                        <span class="d-block" id="auction">
                                                            Timed <br />
                                                            Auction
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tables_area">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade createTab active show" id="pills-fixed" role="tabpanel" aria-labelledby="pills-fixed-tab">
                                                    <div class="fixed_area">
                                                        <div class="select_price">
                                                            <label>Price</label>
                                                            <div class="input-group mb-3">
                                                                <input type="number" min="0" class="form-control" id="price" placeholder="Enter price for one piece" onkeyup="serviceFixed()" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text p-0" id="basic-addon2">
                                                                        <select class="form_control border-0" id="select">
                                                                            <option value="BNB">BNB</option>
                                                                            <option value="<?php echo $TOKEN; ?>"><?php echo $TOKEN; ?></option>
                                                                            <!-- <option>WBW</option> -->
                                                                        </select>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger" id="warningFixed"></span>
                                                            <div class="service_text">
                                                                <span class="" style="color: var(--secondary-color);" >Sales fee <b class="" style="color: var(--text-pink);" id="serviceFixed"></b></span> <br />
                                                                <span class="" style="color: var(--secondary-color);" >You will receive <b class="" style="color: var(--text-pink);" id="getbnbFixed"></b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-open" role="tabpanel" aria-labelledby="pills-open-tab">
                                                    <div class="fixed_area">
                                                        <div class="unlock_once">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="">
                                                                        <div class="form-group" id="input_open3" style="display: none;">
                                                                            <input type="email" class="form-control" id="unlockbid" placeholder="Digital key, code to redeem or likes to a file..." />
                                                                            <small class="text-muted">Markdown is supported </small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="select_price">
                                                                        <label>Price</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" min="0" class="form-control" id="onllyprice" placeholder="Enter price for one piece" onkeyup="serviceOnlyBid()" />
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text p-0" id="basic-addon2">
                                                                                    <select class="form_control border-0" id="select2">
                                                                                        <option value="BNB">BNB</option>
                                                                                        <option value="<?php echo $TOKEN; ?>"><?php echo $TOKEN; ?></option>
                                                                                        <!-- <option>WBW</option> -->
                                                                                    </select>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                        <span class="text-danger" id="warningOnlyBid"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="service_text pl-3 mb-2">
                                                                    <span class="" style="color: var(--secondary-color);">Sales fee <b class="" style="color: var(--text-pink);" id="serviceOnlyBid"></b></span> <br />
                                                                    <span class="" style="color: var(--secondary-color);">You will receive <b class="" style="color: var(--text-pink);" id="getbnbOnlyBid"></b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-time" role="tabpanel" aria-labelledby="pills-time-tab">
                                                    <div class="fixed_area">
                                                        <div class="select_price">
                                                            <label>Minimum bid </label>
                                                            <div class="input-group mb-3">
                                                                <input type="number" min="0" class="form-control" id="minimumbid" placeholder="Enter price for one piece" onkeyup="serviceAuction()" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text p-0" id="basic-addon2">
                                                                        <select class="form_control border-0" id="select1">
                                                                            <option value="BNB">BNB</option>
                                                                            <option value="<?php echo $TOKEN; ?>"><?php echo $TOKEN; ?></option>
                                                                        </select>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <span class="text-danger" id="warningAuction"></span>
                                                            <div class="service_text mb-2">
                                                                <span class="" style="color: var(--secondary-color);">Sales fee <b class="" style="color: var(--text-pink);" id="serviceAuction"></b></span> <br />
                                                                <span class="" style="color: var(--secondary-color);">You will receive <b class="" style="color: var(--text-pink);" id="getbnbAuction"></b></span>
                                                            </div>
                                                            <div class="row">
                                                                <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">-->
                                                                <!--    <div class="starting_date">-->
                                                                <!--        <div class="form-group">-->
                                                                <!--            <label>Starting Date</label>-->
                                                                <!--            <label>After manager approval</label>-->
                                                                <!--        </div>-->
                                                                <!--    </div>-->
                                                                <!--</div>-->
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="starting_date mb-2">
                                                                        <div class="form-group">
                                                                            <label>Expiration Date </label>
                                                                            <input type="date" class="form-control" id="enddays" min="<?php echo $date; ?>" placeholder="" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choose_collection">
                                                <div class="free_minit pt-4 row">
                                                    <!--<div class="col-md-6 col-12 name_input py-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label for="Name">Name</label>-->
                                                    <!--        <input type="text" class="form-control" id="title" placeholder="e. g. 'Enter NFT name'" />-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    
                                                    <div class="col-md-4 col-12 royalties_input py-2">
                                                        <div class="form-group">
                                                            <label>Collection </label>
                                                            <select class="form-control" id="collection"> </select>
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-md-12 col-12 description_input py-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label for="Description">Description </label>-->
                                                    <!--        <textarea rows="2" class="form-control" placeholder="e. g. 'Description of your nft in detail'" name="description" id="description"></textarea>-->
                                                    <!--        <small class="text-muted">With preserved line-breaks </small>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-md-4 col-12 royalties_input py-2">
                                                        <div class="form-group">
                                                            <label for="Royalties">Royalties </label>
                                                            <input type="number" min="0" class="form-control" placeholder="1 %" id="royalties" onkeyup="royalties(2)" />
                                                            <small class="text-muted">Suggested: 0%, 10%, 20%, 30%. Maximum is 50% </small>
                                                            <div class="">
                                                                <span class="text-danger" id="warning2"></span>
                                                                <p class="text-danger" id="Royalties" style="display: none;">Royalties must be less than 50%</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12 royalties_input py-2">
                                                        <div class="form-group">
                                                            <label>Category </label>
                                                            <select class="form-control" id="category">
                                                                <?php
                                                                            $categoryQuery = mysqli_query($link,"SELECT * FROM nft_category ");
                                                                            if(mysqli_num_rows($categoryQuery)>0){ while($cats = mysqli_fetch_assoc($categoryQuery)){ ?>
                                                                <option value="<?php echo $cats['category_name']; ?>"><?php echo $cats['category_name']; ?></option>
                                                                <?php } // end of while
                                                                         } // end of if
                                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="show_btn">
                                                        <!--<button class="btn connect_wa_llets w-100" id="advanced_btn">Show advanced setting</button>-->
                                                        <div class="py-xl-3 show_form text-white" id="hide_btn" style="display: none;">
                                                            <h6>Properties <small class="text-muted">(Optional)</small></h6>
                                                            <div class="row px-0">
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-12 col-sm-12">
                                                                    <div class="royalties_input">
                                                                        <div class="form-group">
                                                                            <input type="number" min="0" class="form-control" id="advancheight" placeholder="e.g. Size" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-12 col-sm-12">
                                                                    <div class="royalties_input">
                                                                        <div class="form-group">
                                                                            <input type="number" min="0" class="form-control" id="advancwidth" placeholder="e.g. M" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="royalties_input py-2">
                                                                        <div class="form-group">
                                                                            <label>Alternative text for NFT <small class="text-muted">(Optional)</small> </label>
                                                                            <input class="form-control" id="advancedesc" placeholder="Image description in details (do not start with word 'image')" />
                                                                            <small class="text-muted">Text that will be used in VoiceOver for people with disabilities</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="py-3">
                                            <div class="kldnajblj">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="">
                                                        <h5>Properties</h5>
                                                        <small>Textual traits that show up as rectangles</small>
                                                    </div>
                                                    <div class="plus-icons">
                                                        <div class="">
                                                            <button class="btn connect_wa_llets rounded" data-bs-toggle="modal" data-bs-target="#exampleModal2" style="padding: 10px !important;">
                                                                <i class="fa-solid fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <div class="boxs_main" style="display: none;" id="prop">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="w3" style="font-size: 13px; color: red; display: none;">Please connect Your Wallet First</span>
                                        <div class="mt-4">
                                            <button class="btn connect_wa_llets w-100" id="submitButton" onclick="condition()">Create Items</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first" id="image_preview" style="display: none;">
                            <div class="registration_form">
                                <div class="preview-section">
                                    <label>Preview</label>
                                    <div class="preview-box text-white">
                                        <div class="upload-file-preview">
                                            <span>
                                                Upload file to preview your brand new NFT
                                            </span>
                                            <img src="./assets/img/jl-logo.png" id="imagepreview" class="img-fluid rounded w-100" height="300px" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first" id="video_preview" style="display: none;">
                            <div class="registration_form">
                                <div class="preview-section">
                                    <h6>Preview</h6>
                                    <div class="preview-box text-white">
                                        <div class="upload-file-preview">
                                            <span>
                                                Upload file to preview your brand new NFT
                                            </span>
                                            <video width="100%" height="300px" class="w-100 position-relative" controls="" src="" id="videopreview" mcafee_wa_processedvideo="true" style="height: auto !important;"></video>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first" id="audio_preview" style="display: none;">
                            <div class="registration_form">
                                <div class="preview-section">
                                <label>Preview</label>
                                <div class="preview-box text-white">
                                    <div class="upload-file-preview">
                                        <span>
                                            Upload file to preview your brand new NFT
                                        </span>
                                        <audio width="100%" height="300px" class="w-100 position-relative" controls="" id="audiopreview" mcafee_wa_processedvideo="true">
                                            <source src="" type="audio/ogg" />
                                            <source src="" type="audio/mpeg" />
                                        </audio>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="loadingdiv" class="d-none" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 200;">
    <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background: #cccccc7a;">
        <h3>Transaction in process</h3>
        <img src="./uploads/loader.gif" width="100" height="100" />
    </div>
</div>

<style>
    input.property_inputs {
        padding: 8px;
        border: 1px solid #ddd;
        color: #000;
    }
    div#prop {
        display: flex !important;
        align-items: center;
        flex-wrap: wrap;
    }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLabel2">Add Properties</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background: #fff; opacity: 1;">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-5">
                    <div class="text_boxs">
                        <p>Properties show up underneath your item, are clickable, and can be filtered in your collection's sidebar.</p>
                    </div>
                    <div>
                        <table class="properties_table">
                            <thead class="traits_form_head border-0">
                                <tr>
                                    <th class="add_type">Type</th>
                                    <th class="add_name">Name</th>
                                </tr>
                            </thead>

                            <tbody class="traits_form_body">
                                <tr class="traits_form_properties">
                                    <td class="p-0">
                                        <div class="property_main d-flex align-items-center">
                                            <button class="btn connect_wa_llets rounded-0" style="padding: 9px !important;">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <input
                                                class="property_inputs w-100"
                                                autocapitalize="off"
                                                autocomplete="off"
                                                autocorrect="off"
                                                class="input_value"
                                                placeholder="Character"
                                                spellcheck="false"
                                                type="text"
                                                value=""
                                                name="property[]"
                                                id="property"
                                            />
                                        </div>
                                    </td>
                                    <td class="p-0">
                                        <input class="property_inputs w-100" autocapitalize="off" autocomplete="off" autocorrect="off" class="input_male" placeholder="Male" spellcheck="false" type="text" value="" name="type[]" id="type" />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row py-5">
                        <div class="add_btns col-6">
                            <button type="button" class="btn create-account w-100 rounded add_properties">Add more</button>
                        </div>

                        <div class="add_btns col-6">
                            <button type="button" onclick="properties()" class="btn connect_wa_llets w-100" style="padding: 10px !important;">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="assets/vendor/aos/aos.js"></script>-->
<!--   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.20.0/standard-all/ckeditor.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    $(document).on("click", ".browse", function () {
        var file = $(this).parents().find(".file");
        file.trigger("click");
    });
    $('input[type="file"]').change(function (e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);
        var fileExtension = fileName.split(".").pop();
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            if (fileExtension == "mp4") {
                document.getElementById("video_preview").style.display = "block";
                document.getElementById("image_preview").style.display = "none";
                document.getElementById("audio_preview").style.display = "none";
                document.getElementById("videopreview").src = e.target.result;
            } else if (fileExtension == "mp3" || fileExtension == "mpeg" || fileExtension == "aac") {
                document.getElementById("image_preview").style.display = "none";
                document.getElementById("video_preview").style.display = "none";
                document.getElementById("audio_preview").style.display = "block";
                document.getElementById("audiopreview").src = e.target.result;
            } else {
                document.getElementById("image_preview").style.display = "block";
                document.getElementById("video_preview").style.display = "none";
                document.getElementById("audio_preview").style.display = "none";
                document.getElementById("imagepreview").src = e.target.result;
            }
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>

<script>
    function myTimer() {
        window.web3 = new Web3(provider);
        const account = selectedAccount;

        var formdata = new FormData();
        formdata.append("owneraddfetch", account);
        formdata.append("type", fetch);
        var requestOptions = {
            method: "POST",
            body: formdata,
            redirect: "follow",
        };

        fetch("./fetchcollection.php", requestOptions)
            .then((response) => response.json())
            .then((result) => {
                let html = "";
                html += `
                                    <option value="DSEA Collection">DSEA Collection</option>
                                   `;
                if (result.length) {
                    for (i = 0; i < result.length; i++) {
                        html += `
                                        <option value="${result[i].collection_name}">${result[i].collection_name}</option>
                                       `;
                    }
                }
                document.getElementById("collection").innerHTML = html;
            });
    }
    async function fetchFees() {
        if (provider != null && selectedAccount != null) {
            let web3 = new Web3(provider);
            let myContract1 = await new web3.eth.Contract(wallet.contract_abi, wallet.contract_address);
            await myContract1.methods
                .sellingFess()
                .call()
                .then((fees) => {
                    document.getElementById("serviceFixed").innerHTML = fees + "%";
                    document.getElementById("serviceOnlyBid").innerHTML = fees + "%";
                    document.getElementById("serviceAuction").innerHTML = fees + "%";

                    document.getElementById("getbnbFixed").innerHTML = " 0";
                    document.getElementById("getbnbOnlyBid").innerHTML = " 0";
                    document.getElementById("getbnbAuction").innerHTML = " 0";
                })
                .catch(console.log);
        }
    }
    $(document).ready(async function () {
        let myinterval = setInterval(function () {
            if (provider && selectedAccount) {
                document.getElementById("w3").style.display = "none";
                document.getElementById("submitButton").disabled = false;
                clearInterval(myinterval);
                myTimer();
                fetchFees();
            } else {
                document.getElementById("w3").style.display = "block";
                document.getElementById("submitButton").disabled = true;
            }
        }, 1000);
        setTimeout(async function(){
        CKEDITOR.replace( 'description',{
              uiColor: '#0597c0'
          } );
        },2000)
    });
</script>

<script>
    $(document).ready(() => {
        $(".add_properties").click(function () {
            $(".traits_form_body").append(
                `<tr class="traits_form_properties">
                                <td class="p-0">
                                   <div class="property_main d-flex align-items-center">
                                        <button class="btn connect_wa_llets rounded-0 properties_delete_btn" style="padding: 9px !important;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input class="property_inputs w-100 " autocapitalize="off" autocomplete="off" autocorrect="off" class="input_value" placeholder="Character" spellcheck="false" type="text" value="" name="property[]" id="property">
                                   </div>
                                </td>
                                <td class="p-0">
                                    <input class="property_inputs w-100" autocapitalize="off" autocomplete="off" autocorrect="off" class="input_male" placeholder="Male" spellcheck="false" type="text" value="" name="type[]" id="type">
                                </td>
                            </tr>`
            );
        });
    });
    $(document).on("click", ".properties_delete_btn", function () {
        var count = $(".traits_form_properties").length;

        if (count !== 1) {
            $(".traits_form_properties").last().remove();
        }
    });
    function properties() {
        $("#exampleModal2").modal("toggle");
        // closeProperties()
        let property = $("input[name='property[]']");
        let type = $("input[name='type[]']");

        document.getElementById("prop").style.display = "prop d-block";
        document.getElementById("prop").style.display = "block";
        var values = $("input[name='property[]']")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");

        var type1 = $("input[name='type[]']")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");

        let html = "";
        for (let i = 0; i < property.length; i++) {
            if (property[i].value != "" && type[i].value != "") {
                html += ` 
                                        <div clsass="d-flex align-items-center flex-wrap">
                                            <div class="boxs_m2 px-3 py-2 m-1 rounded text-center" style="border: 1px solid var(--text-opcity);background: #00d9f321;">
                                                <h6 class="">${property[i].value} </h6> 
                                                <h6 class=" m-0">${type[i].value}</h6>
                                            </div> 
                                        </div> 
                                      `;
                document.getElementById("prop").innerHTML = html;
            }
        }
    }

    // SALES FEE CALCUATION FOR FIXed NFT
    async function serviceFixed() {
        if (provider) {
            window.wweb3 = new Web3(provider);
            let myContract1 = await new web3.eth.Contract(wallet.contract_abi, wallet.contract_address);

            myContract1.methods
                .sellingFess()
                .call()
                .then((fees) => {
                    let value1 = document.getElementById("price").value;
                    if (Number(value1) > 0) {
                        document.getElementById("serviceFixed").innerHTML = fees + "%";
                        let percentage = value1 - value1 * (fees / 100);
                        percentage = percentage.toFixed(5);
                        document.getElementById("getbnbFixed").innerHTML = "You Will Get " + percentage;
                        document.getElementById("submitButton").removeAttribute("disabled", "disabled");
                        document.getElementById("warningFixed").innerText = "";
                    } else {
                        document.getElementById("serviceFixed").innerHTML = " 0";
                        document.getElementById("getbnbFixed").innerHTML = " 0";
                        document.getElementById("submitButton").setAttribute("disabled", "disabled");
                        document.getElementById("warningFixed").innerText = "Invalid Value";
                    }
                })
                .catch(console.log);
        }
    }

    // SALES FEE CALCUATION FOR ONLY BID NFT
    async function serviceOnlyBid() {
        if (provider) {
            window.wweb3 = new Web3(provider);
            let myContract1 = await new web3.eth.Contract(wallet.contract_abi, wallet.contract_address);
            myContract1.methods
                .sellingFess()
                .call()
                .then((fees) => {
                    let value1 = document.getElementById("onllyprice").value;
                    if (value1 > 0) {
                        document.getElementById("serviceOnlyBid").innerHTML = fees + "%";
                        let percentage = value1 - value1 * (fees / 100);
                        percentage = percentage.toFixed(5);
                        document.getElementById("getbnbOnlyBid").innerHTML = "You Will Get " + percentage;
                        document.getElementById("submitButton").removeAttribute("disabled", "disabled");
                        document.getElementById("warningOnlyBid").innerText = "";
                    } else {
                        document.getElementById("serviceOnlyBid").innerHTML = " 0";
                        document.getElementById("getbnbOnlyBid").innerHTML = " 0";
                        document.getElementById("submitButton").setAttribute("disabled", "disabled");
                        document.getElementById("warningOnlyBid").innerText = "Invalid Value";
                    }
                })
                .catch(console.log);
        }
    }

    // SALES FEE CALCUATION FOR AUCTION NFT
    async function serviceAuction() {
        if (provider) {
            window.wweb3 = new Web3(provider);
            let myContract1 = await new web3.eth.Contract(wallet.contract_abi, wallet.contract_address);
            myContract1.methods
                .sellingFess()
                .call()
                .then((fees) => {
                    let value1 = document.getElementById("minimumbid").value;
                    if (Number(value1) > 0) {
                        document.getElementById("serviceAuction").innerHTML = fees + "%";
                        let percentage = value1 - (value1 * (fees / 100));
                        percentage = percentage.toFixed(5);
                        document.getElementById("getbnbAuction").innerHTML = "You Will Get " + percentage;
                        document.getElementById("submitButton").removeAttribute("disabled", "disabled");
                        document.getElementById("warningAuction").innerText = "";
                    } else {
                        document.getElementById("serviceAuction").innerHTML = " 0";
                        document.getElementById("getbnbAuction").innerHTML = " 0";
                        document.getElementById("submitButton").setAttribute("disabled", "disabled");
                        document.getElementById("warningAuction").innerText = "Invalid Value";
                    }
                })
                .catch(console.log);
        }
    }

    // VALIDATE THE ROYALITIES
    async function royalties(counter) {
        let royalties = document.getElementById("royalties").value;
        if (royalties > 0) {
            document.getElementById("warning" + counter).innerText = "";
            if (royalties > 50) {
                document.getElementById("Royalties").style.display = "block";
                document.getElementById("submitButton").disabled = true;
            } else {
                document.getElementById("Royalties").style.display = "none";
                document.getElementById("submitButton").disabled = false;
            }
        } else {
            document.getElementById("warning" + counter).innerText = "Invalid Value";
        }
    }

    async function condition() {
        if (provider) {
            let royalties = document.getElementById("royalties").value;
            let title = document.getElementById("title").value;
            let description =CKEDITOR.instances.description.getData();
            let value = document.getElementById("price").value;
            let fileInput = document.getElementById("tokenImage").value;
            let bid = document.getElementById("minimumbid").value;
            let days = document.getElementById("enddays").value;
            let onlybidprice = document.getElementById("onllyprice").value;
            console.log("description",description);
            if ($("#pills-fixed-tab").hasClass("active")) {
                $("#submit").attr("value", "fixed");
                if (title == "" || description == "" || value == "" || fileInput == "" || royalties == "") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        footer: "Please Fill All Details ",
                    });
                } else {
                    if (royalties >= 50) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: "Royalties  Must be less than 50 ",
                        });
                    } else {
                        myFunction();
                    }
                }
            } else if (bid != 0) {
                if (title == "" || description == "" || fileInput == "" || bid == "" || royalties == "" || days == "") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        footer: "Please Fill All Details ",
                    });
                } else {
                    if (royalties >= 50) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: "Royalties Must be less than 50 ",
                        });
                    } else {
                        myFunction();
                    }
                }
            } else {
                if (title == "" || description == "" || fileInput == "" || royalties == "" || onlybidprice == "") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        footer: "Please Fill All Details ",
                    });
                } else {
                    if (royalties >= 50) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: "Royalties  Must be less than 50 ",
                        });
                    } else {
                        myFunction();
                    }
                }
            }
        } else {
            Swal.fire({
                icon: "warning",
                title: "OOPS...",
                text: "Please Connect Your Wallet First",
            }).then((ok) => {});
        }
    }

    async function myFunction() {
        if (provider) {
            window.web3 = new Web3(provider);
            let chainid = await web3.eth.getChainId();
            if (chainid == 56) {
                document.getElementById("loadingdiv").className = "d-block";
                const account = selectedAccount;
                let payment = $("#select option:selected").val();
                let payment1 = $("#select1 option:selected").val();
                let payment2 = $("#select2 option:selected").val();

                if ($("#pills-fixed-tab").hasClass("active")) {
                    $("#submit").attr("value", "fixed");
                    let price = document.getElementById("price").value;
                    savedata(payment, price, 0, 0);
                } else if ($("#pills-open-tab").hasClass("active")) {
                    $("#submit").attr("value", "onlybid");
                    let onlyprice = document.getElementById("onllyprice").value;
                    savedata(payment2, onlyprice, 0, 2);
                } else {
                    $("#submit").attr("value", "auction");
                    let bid = document.getElementById("minimumbid").value;
                    let enddays = document.getElementById("enddays").value;
                    let NFT_auction_time = document.getElementById("enddays").value;

                    NFT_auction_time = NFT_auction_time.split("-");
                    var newDate = new Date(NFT_auction_time[0], NFT_auction_time[1] - 1, NFT_auction_time[2]);
                    savedata(payment1, bid, newDate.getTime(), 1);
                }
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "warning...",
                    text: "Please Select the Binance Network ",
                });
            }
        } else {
            Swal.fire({
                icon: "warning",
                title: "warning...",
                text: "Please connect your wallet First",
            });
        }
    }

    async function savedata(payment, price, tokenauction, nftType) {
        let property = $("input[name='property[]']");
        let type = $("input[name='type[]']");
        // properties values
        var propertyvalues = $("input[name='property[]']")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");

        var typevalue = $("input[name='type[]']")
            .map(function () {
                return this.value;
            })
            .get()
            .join(",");

        let account = selectedAccount;
        let nftTokenId = Math.floor(Math.random() * 100000000);
        let url = "<?php echo $SITE_URL; ?>/uploads/";
        let fileInput1 = document.getElementById("tokenImage").value;
        let filename1 = fileInput1.replace(/^.*[\\\/]/, "");
        url = url + filename1;
        let royalties = Number(document.getElementById("royalties").value);
        let title = document.getElementById("title").value;
        let description = document.getElementById("description").value;
        let fileInput = document.getElementById("tokenImage");
        let days = document.getElementById("enddays").value;
        if (days == "") {
            days = 0;
        }
        let category = document.getElementById("category").value;
        let collections = document.getElementById("collection").value;
        if (collections == "") {
            collections = 1;
        }
        let price1 = Number((price * creationfees) / 100);
        const amount = (price1 * 10 ** 18).toString();
        value = web3.utils.toWei(price.toString(), "ether");
        let contractAddress = wallet.contract_address;
        if (payment != "BNB") {
            contractAddress = walletToken.contract_address;
        }
        try {
            let desc=CKEDITOR.instances.description.getData();
            var formdata = new FormData();
            formdata.append("tokenid", nftTokenId);
            formdata.append("tokenName", title);
            formdata.append("tokenprice", price);
            formdata.append("tokenroyal", royalties);
            formdata.append("sell", "on");
            formdata.append("tokenauction", tokenauction / 1000);
            formdata.append("tokenowneradd", account);
            formdata.append("NFT_paymenCurrency", contractAddress);
            formdata.append("payment", payment);
            formdata.append("tokendesc", desc);
            formdata.append("days", days);
            formdata.append("type", nftType);
            formdata.append("multistatus", 0);
            formdata.append("tokenImage", fileInput.files[0]);
            formdata.append("category", category);
            formdata.append("endid", nftTokenId);
            formdata.append("collection", collections);
            formdata.append("property", propertyvalues);
            formdata.append("propertyname", typevalue);

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./save.php", requestOptions)
                .then((response) => response.text())
                .then((response) => {
                    
                    if (response.code == 400) throw response.message;
                    if (payment == "BNB") {
                        mint(url, 0, nftTokenId, false, value, wallet.contract_address, royalties, amount);
                    } else {
                        let tokenAmount = (price * creationfees) / 100;
                        approveToken(price, url, tokenAmount, nftTokenId, royalties, payment);
                    }
                })
                .catch((error) => {
                    
                    document.getElementById("loadingdiv").className = "d-none";
                    Swal.fire({
                        icon: "warning",
                        title: "warning...",
                        text: error,
                    });
                });
        } catch (err) {
            
            console.log(err);
        }
    }

    async function approveToken(price, url, Tokenamount, nftTokenId, royalties, payment) {
        let totaltoken = BigInt(price * 10 ** 19);
        price = BigInt(price * 10 ** 18);

        switch (payment) {
            case "<?php echo $TOKEN; ?>":
                myTokenContract.methods
                    .approve(wallet.contract_address, totaltoken)
                    .send({ from: selectedAccount })
                    .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").className = "d-block";
                    })
                    .then(() => {
                        mint(url, Tokenamount, nftTokenId, true, price, walletToken.contract_address, royalties, 0);
                    })
                    .catch(() => {
                document.getElementById("loadingdiv").className = "d-none";

                var formdata = new FormData();
                formdata.append("NFT_id", nftTokenId);
                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./deleteData.php", requestOptions)
                    .then((response) => response.text())
                    .then()
                    .catch();
            });
                break;
        }
    }
    async function mint(url, Tokenamount, nftTokenId, isToken, NFTPrice, contract_address, royalties, creationFees) {
        document.getElementById("loadingdiv").className = "d-none";
        myContract.methods
            .mintNFT(url, Tokenamount, nftTokenId, isToken, NFTPrice, contract_address, royalties)
            .send({
                from: selectedAccount,
                value: creationFees,
            })
            .on("transactionHash", function (hash) {
                document.getElementById("loadingdiv").className = "d-block";
                var formdata = new FormData();
                formdata.append("hash", hash);
                formdata.append("work", "Fixed price NFT Minted");
                formdata.append("NFT_id", nftTokenId);
                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./nft_hash.php", requestOptions)
                    .then((response) => response.text())
                    .catch();
            })
            .then(() => {
                document.getElementById("loadingdiv").className = "d-none";
                Swal.fire({
                    icon: "success",
                    title: "Great...",
                    text: "Congratulations! NFT Successfully Created",
                }).then((ok) => {
                    location.href = "./my_item.php" + "?v=" + Math.floor(Math.random() * 1000000 + 1);
                });
            })
            .catch(() => {
                document.getElementById("loadingdiv").className = "d-none";

                var formdata = new FormData();
                formdata.append("NFT_id", nftTokenId);
                var requestOptions = {
                    method: "POST",
                    body: formdata,
                    redirect: "follow",
                };
                fetch("./deleteData.php", requestOptions)
                    .then((response) => response.text())
                    .then()
                    .catch();
            });
    }
</script>

<?php include "footer.php"?>
