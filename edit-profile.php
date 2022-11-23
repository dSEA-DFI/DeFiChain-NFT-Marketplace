<?php include "header.php";?>
        <div class="collectible">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit Profile</h2>
                    </div>
                </div>
            </div>
        </div>
        <section class="checkout section-padding-100">
            <div class="container">
                <div class="checkout__form">
                    <h4>User Profile</h4>
                    <form id="form_create_item" class="form-border" method="post" action="" enctype="multipart/form-data">
                        <div class="row" id="from_data">
                            <div class="col-lg-12 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Upload your avatar<span>*</span></p>
                                            <div class="upload-div">
                                                <p>JPG, PNG, GIF, WEBP, MP4 or MP3. Up to 100 MB</p>
                                                <input type="file" name="file" id="tokenimag" class="file" accept="image/*">
                                            </div>
                                        </div>
                                        <!--<div class="checkout__input">-->
                                        <!--    <p>Upload Cover avatar<span>*</span></p>-->
                                        <!--    <div class="upload-div">-->
                                        <!--        <p>JPG, PNG, GIF, WEBP, MP4 or MP3. Up to 100 MB</p>-->
                                        <!--        <input type="file" name="file" id="tokenimag1" class="file" accept="image/*">-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="checkout__input mt-20">
                                            <p>User Name<span>*</span></p>
                                            <input type="text" id="myusername" name="Name" placeholder="User Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="checkout__input mt-20">
                                            <p>Twitter Account<span></span></p>
                                            <input type="text" id="tweetname" name="tweetname" placeholder="Tweeter Username">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="checkout__input mt-20">
                                            <p>Instagram Account<span></span></p>
                                            <input type="text" id="instaname" name="instaname" placeholder="Instagram Username">
                                        </div>
                                    </div>
                                     
                                    <div class="col-lg-12">
                                        <div class="checkout__input mt-20">
                                            <p>User Email</p>
                                            <input type="email" id="email" name="email" placeholder="User Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="checkout__input mt-30">
                                            <p>Introduction</p>
                                            <textarea rows="7" onkeyup="capitalizeFirstLetter()" id="description" name="description" placeholder="Introduction"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="Accounts" id="Accounts" value="" hidden="">
                                <button class="btn btn-primary w-100 rounded-50 font-weight-bold" name="submit" id="submit" value="save" onclick="updateInfo()" type="button">Update your personal information</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
$(document).ready( function(){
      setTimeout(async function(){
        //   document.getElementById("loadingdiv").className = "d-block";
                 if(selectedAccount){
                      $("#Account").val(selectedAccount);
                      
                      
                            var formdata = new FormData();
                            formdata.append("address",selectedAccount);
                            var requestOptions = {
                                method: "POST",
                                body: formdata,
                                redirect: "follow",
                            };
                            fetch("./userdata.php", requestOptions)
                            .then((response) => response.json())
                            .then((nnewresult) => {
                            
                           console.log(nnewresult);
                                $("#myusername").val(nnewresult[0].Username);
                                $("#email").val(nnewresult[0].Useremail);
                                $("#tweetname").val(nnewresult[0].Usertwitname);
                                $("#description").val(nnewresult[0].Userbio);
                                $("#instaname").val(nnewresult[0].Userinstaname);
                                 
                            })
                     
                 }else{
                     Swal.fire({
    					icon: 'warning',
    					title: 'warning...',
    					text: 'Please connect your wallet',
    				})
                 }
      },2000)
})
function capitalizeFirstLetter() {

    // converting first letter to uppercase
    let str=document.getElementById("description").value;
    const capitalized = str.charAt(0).toUpperCase() + str.slice(1);
    document.getElementById("description").value=capitalized;
}

async function updateInfo(){
    if(selectedAccount){
    document.getElementById("loadingdiv").className = "d-block";
    let tokenimage=document.getElementById('tokenimag');
    let tokenimage1=tokenimage;
    var formdata = new FormData();
					    formdata.append("Username",document.getElementById("myusername").value);
					    formdata.append("tokenimage",tokenimage.files[0]);
					    formdata.append("tokenimage1",tokenimage1.files[0]);
					    formdata.append("Email",document.getElementById("email").value);
					    formdata.append("Bio",document.getElementById("description").value);
					    formdata.append("Instagram",document.getElementById("instaname").value);
					    formdata.append("Twitter",document.getElementById("tweetname").value);
					    formdata.append("address",selectedAccount);
					    
						var requestOptions = {
							method: "POST",
							body: formdata,
							redirect: "follow",
						};
						fetch("./updateuserinfo.php", requestOptions)
					    .then((response) => response.text())
						.then((result) => {
						    console.log(result)
						    document.getElementById("loadingdiv").className = "d-none";
						    Swal.fire({
                                    icon: "success",
                                    title: "Great...",
                                    text: "Profile Update Successfully",
                                }).then((ok) => {
                                     location.href = "./my_item.php"+"?v="+Math.floor((Math.random() * 1000000) + 1);
                                });
						    
						}).catch({
						    
						})
    }else{
                     Swal.fire({
    					icon: 'warning',
    					title: 'warning...',
    					text: 'Please connect your wallet',
    				})
                 }
                
}
</script>
        <!-- ======= Footer ======= -->
        <?php include "footer.php"?>
      