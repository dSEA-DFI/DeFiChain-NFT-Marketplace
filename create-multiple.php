
<?php include("header.php"); ?>

        <!--<div class="collectible">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-12 pt-4">-->
        <!--                <h2 data-aos="fade-up" data-aos-duration="2000">Create Multiple NFT</h2>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="hot_all_collections py-lg-5 py-md-5 py-sm-4 py-4">
            <div class="container">
                <!--<div class="row align-item-center justify-content-center">-->
                <!--    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-12 m-auto">-->
                <!--        <div class="create_heading">-->
                <!--            <h2 class="ttext-white text_gradient"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Create Multi  Copy Collectible. </font></font></h2>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="row">
                    <div class="col-lg-10 col-12 m-auto registration_form">
                        <div class="col-area">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                    <div class="upload-section">
                                        <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Upload file</font></font></label>
                                        <div class="upload_here">
                                            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">PNG,JPG,GIF files size not more than 100mb.</font></font></p>
                                            <input type="file" name="file" id="tokenImage" style="display: none;" class="file" required="" accept="all/*">
                                            <div class="input-group my-3">
                                                <div class="input-group-append">
                                                 <div class="input-group-append">
                                                    <button type="button" class="browse connect_wa_llets">Choose file...</button>
                                                </div>
                                            </div>
                                            <!--<div class="choosen_img" id="img">-->
                                                <img src="" id="preview" class="rounded">
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
                                                            <span class="d-block" id="fixed"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                            Specify price, </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">sell immediately
                                                            </font></font></span>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!--<li class="nav-item">-->
                                                <!--    <a class="nav-link" id="pills-open-tab" data-toggle="pill" href="#pills-open" role="tab" aria-controls="pills-open" aria-selected="false">-->
                                                <!--        <div class="make-tab text-center">-->
                                                <!--            <i class="fal fa-users"></i> -->
                                                <!--            <span class="d-block" id="auction"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-->
                                                <!--            Open auction </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">, no time limit-->
                                                <!--            </font></font></span>-->
                                                <!--        </div>-->
                                                <!--    </a>-->
                                                <!--</li>-->
                                            </ul>
                                            <div class="tables_area">
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade active show" id="pills-fixed" role="tabpanel" aria-labelledby="pills-fixed-tab">
                                                        <div class="fixed_area">
                                                            <div class="select_price">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">price</font></font></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="number" min="0" class="form-control" placeholder="Enter a price for one piece of NFT." id="price" onkeyup="serviceFixed()">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text p-0" id="basic-addon2">
                                                                            <select class="form_control border-0" id="select">
                                                                                <option value-="BNB">BNB</option>
                                                                                <option value-="<?php echo $TOKEN; ?>"><?php echo $TOKEN; ?></option>
                                                                            </select>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <span class="text-danger" id="warningFixed"></span>
                                                                <div class="service_text mb-2">
                                                                    <span class="text-white">Sales fee <b class="" style="color:var(--text-pink)" id="serviceFixed"></b></span> <br>
                                                                    <span class="text-white">You will receive <b class="" style="color:var(--text-pink)" id="getbnbFixed"></b></span>
                                                                </div>
                                                            </div>
                                                            <div class="unlock_once">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="">
                                                                            <div class="form-group" id="input_open" style="display:none;"> 
                                                                                <input type="text" class="form-control" id="unlockfixed" placeholder="Digital key, code to redeem or likes to a file..." value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-open" role="tabpanel" aria-labelledby="pills-open-tab">
                                                        <div class="fixed_area">
                                                            <div class="unlock_once">
                                                                <div class="select_price">
                                                                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">price</font></font></label>
                                                                    <div class="input-group mb-3">
                                                                        <input type="number" min="0" class="form-control" placeholder="Enter a price for one piece of NFT ." id="onllyprice" onkeyup="serviceOnlyBid()">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text p-0" id="basic-addon2">
                                                                                <select class="form_control border-0" id="select1">
                                                                                    <option value-="BNB">BNB</option>
                                                                                <option value-="<?php echo $TOKEN; ?>"><?php echo $TOKEN; ?></option>
                                                                            </select>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <span class="text-danger" id="warning0"></span>
                                                                    <div class="service_text mb-2">
                                                                        <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">sales fee </font></font><b class="text-dark" id="service1"></b></span> <br>
                                                                        <span class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">you have received </font></font><b class="text-dark" id="getbnb1"> </b></span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="">
                                                                            <div class="form-group" id="input_open3" style="display:none"> 
                                                                                <input type="email" class="form-control" id="" placeholder="Digital key, code to redeem or likes to a file..." value="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-time" role="tabpanel" aria-labelledby="pills-time-tab">
                                                        <div class="fixed_area">
                                                            <div class="select_price">
                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">lowest price </font></font></label>
                                                                <div class="input-group mb-3">
                                                                    <input type="number" min="0" class="form-control" placeholder="ใส่ราคาสำหรับหนึ่งชิ้นงาน NFT d(00)">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text p-0" id="basic-addon2">
                                                                            <select class="form_control border-0" id="">
                                                                                <option value-="TRX">TRX</option>
                                                                                <option value-="AMB">AMB</option>
                                                                            </select>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <span class="text-danger" id="warning00"></span>
                                                                <div class="row">
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="starting_date">
                                                                            <div class="form-group">
                                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Auction start date</font></font></label>
                                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                                    <option>Start immediately when the listing is complete.</option>
                                                                                    <option>specify date</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                                                        <div class="starting_date">
                                                                            <div class="form-group">
                                                                                <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">auction end date </font></font></label>
                                                                                <select class="form-control" id="exampleFormControlSelect1">
                                                                                    <option>1 day</option>
                                                                                    <option>3 days</option>
                                                                                    <option>5 days</option>
                                                                                    <option>7 days</option>
                                                                                    <option>specify date</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="py-2">
                                                                    <span class="text-muted">
                                                                    การเสนอราคาประมูลภายในช่วงเวลาก่อน 10 นาทีล่าสุด จะขยายเวลาประมูลเพิ่มออกไปอีก 10 นาทีเสมอ <a href="#">เรียนรู้เพิ่มเติมเกี่ยวกับการประมูลแบบจำกัดเวลา</a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="unlock_once pt-4">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="put-on-marketplace">
                                                                            <h6 class="font-weight-normal mb-0">ปลดล็อคเมื่อมีคนซื้อ </h6>
                                                                            <small class="text-muted">ไฟล์จะถูกปลดล็อคเมื่อทำธุรกรรมสำเร็จ</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="switch-here">
                                                                            <div class="custom-control custom-switch">
                                                                                <input type="checkbox" class="custom-control-input" id="customSwitchUnlock">
                                                                                <label class="custom-control-label" for="customSwitchUnlock"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="py-2">
                                                                            <div class="form-group" id="input_Unlock"> 
                                                                                <input type="email" class="form-control" id="unlockbid" placeholder="Digital key, code to redeem or likes to a file...">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="choose_collection">
                                                <!--<h5 class="font-weight-normal"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Select the NFT file collection.</font></font></h5>-->
                                                <!--<div class="create_box_2">-->
                                                <!--    <ul class="list-unstyled d-flex">-->
                                                <!--        <li class="create_erc20_box">-->
                                                <!--            <a href="./create-collection.php" class="text-decoration-none">-->
                                                <!--                <div class="text-center">-->
                                                <!--                    <i class="fal fa-plus-circle"></i> -->
                                                <!--                    <h6 class="d-block font-weight-normal">-->
                                                <!--                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">-->
                                                <!--                        Create Collection </font></font><br>-->
                                                                        <!--<small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">TRC-721 collection.</font></font></small>-->
                                                <!--                    </h6>-->
                                                <!--                </div>-->
                                                <!--            </a>-->
                                                <!--        </li>-->
                                                <!--        <li class="create_erc20_box">-->
                                                <!--            <div class="text-center">-->
                                                                <!--<i class="fal fa-plus-circle"></i>-->
                                                <!--                <h6 class="d-block font-weight-normal">-->
                                                <!--                    AMBLE Default Collection <br>-->
                                                <!--                    <input type="hidden" value="2" id="srgramcol">-->
                                                                    <!--<small class="text-muted">AMBLE</small>-->
                                                <!--                </h6>-->
                                                <!--            </div>-->
                                                <!--        </li>-->
                                                <!--        <li class="create_erc20_box d-none" id="create-box">-->
                                                <!--            <div class="text-center">-->
                                                <!--                <div class="form-group">-->
                                                <!--                    <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">collection </font></font></label>-->
                                                <!--                    <select class="form-control" id="collection">-->
                                                <!--                    </select>-->
                                                <!--                </div>-->
                                                <!--            </div>-->
                                                <!--        </li>-->
                                                <!--    </ul>-->
                                                <!--</div>-->
                                                <div class="free_minit pt-4">
                                                    <div class="name_input py-2">
                                                        <div class="form-group">
                                                            <label for="Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name</font></font></label>
                                                            <input type="email" class="form-control" placeholder="For example 'XYZ NFT'." id="title"> 
                                                        </div>
                                                    </div>
                                                    <div class="name_input py-2">
                                                        <div class="form-group">
                                                            <label for="Name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Number of NFT copies</font></font></label>
                                                            <input type="number" min="0" class="form-control input1" placeholder="Specify the number of NFT copies you wish to create for this NFT." id="copies" > 
                                                            <span class="text-danger" id="warning1"></span>
                                                        </div>
                                                    </div>
                                                    <div class="description_input py-2">
                                                        <div class="form-group"> 
                                                            <label for="Description"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Description </font></font>  </label>
                                                            <textarea rows="2" class="form-control" placeholder="For example, Best copies of example nft" id="description"></textarea>
                                                            <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">With preserved line-breaks </font></font></small>
                                                        </div>
                                                    </div>
                                                    <div class="royalties_input py-2">
                                                        <div class="form-group">
                                                            <label for="Royalties"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Royalities </font></font></label>
                                                            <input type="number" min="0" class="form-control input2" placeholder="1 %" id="royalties" onkeyup="royalties(2)">
                                                            <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Recommended value : 0%, 10%, 20%, 30%. The maximum is 50%. </font></font></small>
                                                            <div class="">
                                                                <span class="text-danger" id="warning2"></span>
                                                                <p class="text-danger" id="Royalties" style="display:none"> Royalties must be less than 50% </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="royalties_input py-2">
                                                        <div class="form-group">
                                                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Category </font></font></label>
                                                            <select class="form-control" id="category">
                                                                    <?php
                                                                        $categoryQuery = mysqli_query($link,"SELECT * FROM nft_category ");
                                                                        if(mysqli_num_rows($categoryQuery)>0){
                                                                        while($cats = mysqli_fetch_assoc($categoryQuery)){
                                                                    ?>
                                                                        <option value="<?php echo $cats['category_name']; ?>"><?php echo $cats['category_name']; ?></option>
                                                                    <?php } // end of while
                                                                     } // end of if
                                                                    ?>
                                                                    
                                                                </select>
                                                        </div>
                                                    </div>
                                                        <div class="royalties_input py-2">
                                                            <div class="form-group">
                                                                <label>Collection </label>
                                                                <select class="form-control" id="collection">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    <div class="show_btn">
                                                        <!--<button class="btn connect_wa_llets w-100" id="advanced_btn"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">More advanced configurations</font></font></button>-->
                                                        <div class="py-xl-3 show_form text-white" id="hide_btn" style="display: none;">
                                                            <h6><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">More information </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(optional)</font></font></small> </h6>
                                                            <div class="row px-0">
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-12 col-sm-12">
                                                                    <div class="royalties_input">
                                                                        <div class="form-group"> 
                                                                            <input type="number" min="0" class="form-control" id="advancheight" placeholder="such as the height"> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-6 col-lg-6 col-md-12 col-12 col-sm-12">
                                                                    <div class="royalties_input">
                                                                        <div class="form-group"> 
                                                                            <input type="number" min="0" class="form-control" id="advancwidth" placeholder="such as a width"> 
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                                    <div class="royalties_input py-2">
                                                                        <div class="form-group">
                                                                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alternative text for NFT </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(optional)</font></font></small>  </label>
                                                                            <input class="form-control" id="advancedesc" placeholder="Image description in details (do not start with word 'image')">
                                                                            <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Special characters are used as VoiceOver to assist people with disabilities.</font></font></small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-4"> 
                                                            <button class="btn connect_wa_llets w-100" id="submitButton" onclick="condition()"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Create Items</font></font></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first" id="image_preview" style="display:none">
                                    <div class="preview-section text-white">
                                        <label>Preview</label>
                                        <div class="preview-box">
                                            <div class="upload-file-preview">
                                                <span>
                                                Upload file to preview your brand new NFT
                                                </span>
                                                <img src="" id="preview1" class="img-fluid rounded" height="300px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first" id="video_preview" style="display:none">
                                    <div class="preview-section">
                                        <label>Preview</label>
                                        <div class="preview-box text-white">
                                            <div class="upload-file-preview">
                                                <span>
                                                Upload file to preview your brand new NFT
                                                </span>
                                                <video width="100%" height="300px" controls="" src="" id="videopreview">
                                                </video>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-0 order-lg-0 order-first" id="audio_preview" style="display:none">
                                    <div class="preview-section">
                                        <label>Preview</label>
                                        <div class="preview-box text-white">
                                            <div class="upload-file-preview">
                                                <span>
                                                Upload file to preview your brand new NFT
                                                </span>
                                                <audio width="100%" height="300px" controls="" id="audiopreview">
                                                    <source src="" type="audio/ogg">
                                                    <source src="" type="audio/mpeg">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        
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
        var fileExtension = fileName.split('.').pop(); 
        var reader = new FileReader();
        reader.onload = function (e) {
            // get loaded data and render thumbnail.
           if(fileExtension=="mp4"){
                document.getElementById('video_preview').style.display='block';
                document.getElementById('image_preview').style.display='none';
                document.getElementById('audio_preview').style.display='none';
                document.getElementById("videopreview").src = e.target.result;
               }else if(fileExtension=="mp3"||fileExtension=="mpeg"||fileExtension=="aac"){
                document.getElementById('image_preview').style.display='none';
                document.getElementById('video_preview').style.display='none';
                document.getElementById('audio_preview').style.display='block';
                document.getElementById("audiopreview").src = e.target.result;
               }
               else{
                document.getElementById('image_preview').style.display='block';
                document.getElementById('video_preview').style.display='none';
                document.getElementById('audio_preview').style.display='none';
                document.getElementById("preview1").src = e.target.result;
                
            }
            
            
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
    
</script>
<script>
setTimeout(async ()=>{
  
   if(provider != null && selectedAccount != null) {
        let fees=await myContract.methods.sellingFess().call()
    
        document.getElementById("serviceFixed").innerHTML = fees + "%";
        document.getElementById("service1").innerHTML = fees + "%";
        
        document.getElementById("getbnbFixed").innerHTML = " 0";
        document.getElementById("getbnb1").innerHTML = " 0"; 
       
   }
},2000);

// SALES FEE CALCUATION FOR FIXed NFT
async function serviceFixed() {
  if (provider) {
    let price = Number(document.getElementById("price").value);
    let serviceFees=Number(await myContract.methods.sellingFess().call());
    let percentage=price-((price*serviceFees)/100);
    document.getElementById("getbnbFixed").innerText ="You Will Get " + percentage;
  }
}
// SALES FEE CALCUATION FOR Only Bid NFT
async function serviceOnlyBid() {
  if (provider) {
    let price = Number(document.getElementById("onllyprice").value);
    let serviceFees=await myContract.methods.sellingFess().call();
    let percentage=price-((price*serviceFees)/100);
    document.getElementById("getbnb1").innerHTML ="You Will Get " + percentage;
  }
}

// VALIDATE THE ROYALITIES
async function royalties(counter){
let royalties = (document.getElementById("royalties").value);
    if(royalties>0){
            document.getElementById("warning"+counter).innerText = "";
            if (royalties>50){
                document.getElementById("Royalties").style.display="block";
                document.getElementById("submitButton").disabled=true;
            }else{
                  document.getElementById("Royalties").style.display="none";
                document.getElementById("submitButton").disabled=false;
            }
    }else{
        document.getElementById("warning"+counter).innerText = "Invalid Value";
    }

}

async function condition() {
    if (provider) {
    
    let title = document.getElementById("title").value;
    let description = document.getElementById("description").value;
    let value = document.getElementById("price").value;
    let fileInput = document.getElementById("tokenImage").value;
    let onlybidprice = document.getElementById("onllyprice").value;
    try{
    if ($("#pills-fixed-tab").hasClass("active")) {

        $("#submit").attr("value", "fixed");
        if (title == "" || description == "" || value == "" || fileInput == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: 'Please Fill All Details '
            })
        } else {
            myFunction();
        }
    } else {

        if (title == "" || description == "" || fileInput == "" || onlybidprice == "" ) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: 'Please Fill All Details '
            })
        } else {
                myFunction();
        }
    }
    }catch(err){}
} else {
    Swal.fire({
        icon: 'warning',
        title: 'OOPS...',
        text: 'Please Connect Your Wallet First',
    }).then((ok) => {

    })

}
}   
async function myFunction() {
    if(provider) {
        window.web3 = new Web3(provider);
		let chainid =  await web3.eth.getChainId(); 
        if(chainid == 97) {
			document.getElementById("loadingdiv").className = "d-block";
		    const account = selectedAccount;
            let payment = $("#select option:selected").val();
            let payment1 = $("#select1 option:selected").val();
		    if($("#pills-fixed-tab").hasClass("active")) {
				$("#submit").attr("value", "fixed");
				let price = document.getElementById("price").value;
			    savedata(payment,price,0,3);
    		} else{
    			
				$("#submit").attr("value", "onlybid");
				let onlyprice = document.getElementById("onllyprice").value;
				savedata(payment1,onlyprice,0,4)
            } 
			
		} else {
				Swal.fire({
					icon: 'warning',
					title: 'warning...',
					text: 'Please Select the Binance Network ',
				})
			}
	}else{
	    Swal.fire({
				icon: 'warning',
				title: 'warning...',
				text: 'Please connect your wallet First',
			})
	}
}

async function savedata(payment ,price,tokenauction,nftType){
    let account=selectedAccount;
    
    let creationfees= creationFeesMultiple;
    let nftTokenId = Math.floor(Math.random() * 100000000);
    let url = "<?php echo $SITE_URL; ?>/uploads/";
	let fileInput1 = document.getElementById("tokenImage").value;
	let filename1 = fileInput1.replace(/^.*[\\\/]/, '')
	url = url + filename1;
	let royalties = Number(document.getElementById("royalties").value);
	let copies = Number(document.getElementById("copies").value);
	let title = document.getElementById("title").value;
	let description = document.getElementById("description").value;
	let fileInput = document.getElementById("tokenImage");
   
    let category = document.getElementById("category").value;
    let collections = document.getElementById("collection").value;
    if(collections == ""){
        collections = 1;
    }
    let price1 = Number((price*creationfees)/100);
    const amount=(price1*(10**18)).toString();
    value = web3.utils.toWei(price.toString(), 'ether');
	let contractAddress=wallet.contract_address;
	if(payment!="BNB"){
	    contractAddress=walletToken.contract_address
	}
	try{
		var formdata = new FormData();
		formdata.append("tokenid", nftTokenId);
		formdata.append("tokenName", title);
		formdata.append("tokenprice", price);
		formdata.append("tokenroyal", royalties);
        formdata.append("sell", 'on');
		formdata.append("tokenauction", (tokenauction/1000));
		formdata.append("tokenowneradd", account);
		formdata.append("NFT_paymenCurrency",contractAddress);
		formdata.append("payment", payment);
	    formdata.append("tokendesc", description);
	    formdata.append("days", 0);
		formdata.append("type", nftType);
		formdata.append("multistatus", 1);
		formdata.append("tokenImage", fileInput.files[0]);
		formdata.append("category", category);
		formdata.append("endid", (nftTokenId+copies)-1);
		formdata.append("collection", collections);
	
		var requestOptions = {
			method: "POST",
			body: formdata,
			redirect: "follow",
		};
		fetch("./save.php", requestOptions).then((response) => response.json()).then((response ) => {
             if (response.code==400) throw response.message;
		    if(payment=="BNB"){
		        mint(url,0,nftTokenId,(nftTokenId+copies)-1,0,wallet.contract_address,amount);
		    }else{
		        let tokenAmount=(price*creationfees)/100;
		        approveToken(price,url,tokenAmount,nftTokenId,(nftTokenId+copies)-1,payment);
		    }
		        
		 	}).catch((error) => {
		 	    document.getElementById("loadingdiv").className = "d-none";
		 	});
		 	
	}catch(err){
	} 	
}
async function approveToken(price,url,Tokenamount,start_id,end_id,payment){
    let totaltoken = BigInt( price *(10**19));
     price = BigInt( price *(10**18));
                                    
    switch (payment) {
        case "<?php echo $TOKEN; ?>":
            myTokenContract.methods.approve(walletMultiple.contract_address, totaltoken)
                .send({ from: selectedAccount })
                .on("transactionHash", function (hash) {
                    document.getElementById("loadingdiv").className = "d-block";
                  
                })
                .then(() => {
                    // mintfix(walletTOKEN.contract_address);
                     mint(url,Tokenamount,start_id,end_id,1,walletToken.contract_address,0);
                })
                .catch(console.log);
            break;
       
    }
}	
async function mint(url,Tokenamount,start_id,end_id,state,contract_address,creationFees)
{
    document.getElementById("loadingdiv").className = "d-none";
	myMultipleContract.methods.mintNFT(url,Tokenamount,start_id,end_id,state,contract_address).send({
			from: selectedAccount,
			value:creationFees
		}).on("transactionHash", function(hash) {
			document.getElementById("loadingdiv").className = "d-block";
			var formdata = new FormData();
			formdata.append("hash", hash);
			formdata.append("work", "Fixed price NFT Minted");
			formdata.append("NFT_id", start_id);
			var requestOptions = {
				method: 'POST',
				body: formdata,
				redirect: 'follow'
			};
			fetch("./nft_hash.php", requestOptions).then(response => response.text()).then(result => console.log(result)).catch(error => console.log('error', error));
		}).then(() => {
		     document.getElementById("loadingdiv").className = "d-none";
			Swal.fire({
				icon: 'success',
				title: 'Great...',
				text: 'Congratulations! NFT Successfully Created',
			}).then((ok) => {
				location.href = "./home.php";
			})
		}).catch(() => {
		     document.getElementById("loadingdiv").className = "d-none";
		 
			var formdata = new FormData();
			formdata.append("NFT_id", start_id);
			var requestOptions = {
				method: 'POST',
				body: formdata,
				redirect: 'follow'
			};
			fetch("./deleteData.php", requestOptions).then(response => response.text()).then().catch(error => console.log('error', error));
		})
}

function  myTimer(){
	    if(provider){
	      window.web3 = new Web3(provider);
          const account = selectedAccount;
          
          var formdata = new FormData();
                formdata.append("owneraddfetch",account);
                formdata.append("type",fetch);
                var requestOptions = {
                              method: "POST",
                              body: formdata,
                              redirect: "follow",
                            };

                fetch("./fetchcollection.php", requestOptions)
                        .then((response) => response.json())
                        .then((result) => {
                            
                           if(result.length){

                            let html="";
                            html+=`
                                    <option value="DSEA Collection">DSEA Collection</option>
                                   `;
                            for(i=0;i<result.length;i++){
                                
                                html+=`
                                    <option value="${result[i].collection_name}">${result[i].collection_name}</option>
                                   `;
                                document.getElementById('collection').innerHTML=html;

                            }
                            //   document.getElementById('create-box').style.display="block";
                              
                           }
                            
                        })
	     }
        
  }
const handle = setTimeout(myTimer, 3000);	
</script>
 <?php include "footer.php"?>