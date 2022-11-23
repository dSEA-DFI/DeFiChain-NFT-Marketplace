<?php include "header.php"; 
$data=mysqli_query($link,"SELECT * FROM `nft_collections` WHERE id='".$_GET['id']."'");
$row=mysqli_fetch_assoc($data);

?>

<style type="text/css">
    .meet_about {
        margin-top: 70px;
    } 
</style>

<section class="collectible py-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-auto">
               <div class=""> 
                <h2 class="text-center"> <b>Edit NFT Collection </b>
                    </h2>
                </div>
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="collections_modals p-4">
                    <div class="two_box_uploads row">
                        <div class="col-12">
                            <div class="collections_img text-center">
                                <div class="choosen_img" id="img">
                                    <img src="<?php echo $row['collection_logo'];?>" id="preview-create" class="rounded border" width="200px" height="200px">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="upload_colle pt-5 text-center">
                                <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">We recommend the image file size not smaller than 400x400 pixel (animated Gif images).</font></font></p>  
                                <div class="dbakdj_uploads">
                                    <input type="file" name="file" id="image" style="display: none;" class="file" required="" accept="image/*">
                                    <div class="input-group my-3 justify-content-center">
                                        <div class="input-group-append">
                                            <button type="button" class="browse btn connect_wa_llets"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Select an image file...</font></font></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12"> 
                <div class="collections_modals p-4">
                    <div class="royalties_input py-4">
                        <div class="form-group">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Display Name </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(required)</font></font></small>  </label>
                            <input type="text" class="form-control" value="<?php echo $row['collection_name'];?>" id="display_name" placeholder="Enter collection name">
                            <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">The collection's name is a Token name, it can't be changed in the future.</font></font></small>
                        </div>
                    </div>
                    <div class="Symbol_input">
                        <div class="form-group">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Symbol </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(required)</font></font></small>  </label>
                            <input type="text" class="form-control" value="<?php echo $row['collection_symbol'];?>"  id="symbol" placeholder="Enter a token symbol with 3-5 English characters."> 
                        </div>
                    </div>
                    <div class="Symbol_input py-4">
                        <div class="form-group">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">More explanation </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(required)</font></font></small>  </label>
                            <input type="text" class="form-control" value="<?php echo $row['collection_description'];?>"  id="description" placeholder="Expand a little bit about your token collection."> 
                        </div>
                    </div>
                    <div class="Symbol_input">
                        <div class="form-group">
                            <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Set a Custom URL for a collection. </font></font><small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(optional)</font></font></small>  </label>
                            <input type="text" class="form-control" id="url" placeholder="Set Custom URL (English)">
                            <small class="text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Can be used as a public URL for promotion. </font></font></small>
                        </div>
                    </div>
                    <div class="my-4"> 
                        <button class="btn connect_wa_llets w-100" onclick="submit()"><font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">update Collection</font></font>
                        </button>
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
</section>

<?php include 'footer.php'; ?>

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
        
        var reader = new FileReader();
        reader.onload = function (e) {
                    // get loaded data and render thumbnail.
                    document.getElementById("preview-create").src = e.target.result;
                    // document.getElementById("preview1").src = e.target.result;  
                };
                // read the image file as a data URL.
                reader.readAsDataURL(this.files[0]);
            });


    // document.getElementById("customSwitch1").addEventListener("change", (e) => {
    //     e.target.checked ? $("#submit").attr("disabled", false) : $("#submit").attr("disabled", true);
    // });
      async  function submit(){
                    let web3 =new Web3(provider);

                    let display_name=document.getElementById('display_name').value;
                    let symbol=document.getElementById('symbol').value;
                    let discription =document.getElementById('description').value;
                    let url =document.getElementById('url').value;
                    let fileInput1 = document.getElementById("image").value;
                    let fileInput = document.getElementById("image");
                    console.log(fileInput1,"fileInput1");
            if(display_name==""||symbol==""||discription==""){
                    Swal.fire({
                        icon:"warning",
                        title: 'OOPS...',
                        text: 'Please fill all the required fields',
                          })
            
                }else{
                    if(provider){
                    //  const accounts = await ethereum.request({ method: "eth_requestAccounts" });
                     let account =selectedAccount;
                        var formdata= new FormData();
                        formdata.append("Displayname",display_name);
                        formdata.append("symbol",symbol);
                        formdata.append("discription",discription);
                        formdata.append("url",url);
                        formdata.append("id","<?php echo $_GET['id'];?>");
                        formdata.append("tokenImage", fileInput.files[0]);
                        var requestOptions={
                            method:"POST",
                            body:formdata,
                            redirect:"follow",

                        }

                        fetch("./updateCollection.php" , requestOptions)
                        .then((response) => response.text())
                                        .then((result) => {

                                            console.log(result);
                                            if(result=='0'){
                                                 Swal.fire({
                                                        icon: "warning",
                                                        title: "OOPS!...",
                                                        text: "Collection Name Already Exist",
                                                    }).then((ok) => {
                                                        location.href = "";
                                                    });
                                                
                                            }else if(result=="1"){
                                                 Swal.fire({
                                                        icon: "success",
                                                        title: "Great...",
                                                        text: "Congratulation! Collection Updated Successfully",
                                                    }).then((ok) => {
                                                        location.href="./my_item.php"+"?v="+Math.floor((Math.random() * 1000000) + 1);
                                                    });
                                            }
                                           
                                        });

                    }else{
                         Swal.fire({
                                        icon: "warning",
                                        title: "warning!...",
                                        text: "Please sign in first",
                                    }).then((ok) => {
                                       
                                    });
                    }

                    }
                    
                 }
</script>

