<?php include "header.php";?>
<style>

    button.btn-con {
        background: #d91c5c;
        border: none;
        border-radius: 5px;
        color: #fff;
        line-height: 34px;
    }
</style>

<?php 
if(isset($_GET['address'])){
    $address=$_GET['address'];
    
}
?>
<!-- End Header -->
<div class="collectible">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>My items</h2>
            </div>
        </div>
    </div>
</div>
<section class="my_items_srt py-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12 col-sm-12 col-12">
                <div class="main_items_area">
                    <div class="back_ground_area">

                        <div class="user_imgs" id="image">

                        </div>
                        <div class="users_name text-center mt-5">
                            <h3 class="font-weight-normal mt-3" id="username"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Testname 1</font></font></h3>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-5 col-12 m-auto">
                            <div class="address_boxs text-center" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                <a class="text-decoration-none px-3 py-1 rounded-pill bg-light text-dark" rel="noopener noreferrer" id="currentAddress"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></a>
                            </div>
                        </div>

                        <div class="col-md-12 m-auto has_id_area text-center d-md-flex d-block align-item-center justify-content-center">
                            <div class="icons_box d-flex">
                                <span class=" " data-toggle="tooltip" data-placement="top" title="" data-original-title="twitter">
                                    <a href="https://mobile.twitter.com/null" class="text-decoration-none " id="tweeterurl"><i class="fab fa-twitter"></i></a>
                                </span>
                                &nbsp;&nbsp;
                                <span class=" " data-toggle="tooltip" data-placement="top" title="" data-original-title="instagram">
                                    <a href="https://www.instagram.com/null" class="text-decoration-none " id="instaurl"><i class="fab fa-instagram"></i></a>
                                </span>

                            </div>
                        </div>


                        <div class="col-md-12 col-12 m-auto mb-3">
                            <div class="text-center mt-1">
                                <font style="vertical-align: inherit;" id="userbio">This is my bio </font>
                            </div>
                        </div>


                        <!--<div class="col-md-12 m-auto text-center">-->
                        <!--    <a href="./edit-profile.php" class="connect_wa_llets my-2 my-sm-0 mr-2 px-3"><i class="fal fa-user-edit"></i> <span class=" "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Edit Profile</font></font></span></a>-->
                            <!--<button class="connect_wa_llets my-2 my-sm-0 px-md-3 px-3">0.00% <span class=" ">Average Will Go To Tree Plant</span></button> -->
                        <!--</div>-->
                    </div>
                    <div class="container mt-3">
                        <div class="my_tabs">
                            <!-- Nav pills -->
                            <div class="d-flex m-auto align-item-center justify-content-center">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#home">On Sale</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#menu1">Owned</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#menu2">Created</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="pill" href="#menu3">My Collection</a>
                                    </li>
                                    <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link" data-bs-toggle="pill" href="#menu4">Liked</a>-->
                                        <!--</li>-->
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="pill" href="#menu5">Activity</a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link" data-bs-toggle="pill" href="#menu6">Accept</a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link" data-bs-toggle="pill" href="#menu7">Recevied</a>-->
                                        <!--</li>-->
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="home" class="container tab-pane active"><br>
                                        <div  class="explore_star">
                                            <div class="row" id="Sale">

                                            </div>
                                        </div>
                                    </div>

                                    <div id="menu1" class="container tab-pane fade"><br>
                                        <div  class="explore_star">
                                            <div class="row" id="owned">

                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu2" class="container tab-pane fade"><br>
                                        <div  class="explore_star">
                                            <div class="row" id="created">

                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu3" class="container tab-pane fade">
                                        <br>
                                        <div  class="explore_star">
                                            <div class="row" id="collection">

                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu4" class="container tab-pane fade">
                                        <br>
                                        <div  class="explore_star">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 mb-5">
                                                    <div class="inner_explore">
                                                        <div class="tp_pht">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="my name any" tabindex="0">
                                                                <img src="assets/img/img1.jpg" class="ico">
                                                            </a>
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="my name any" tabindex="0">
                                                                <img src="assets/img/img2.jpg" class="ico01">
                                                            </a>
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Galaxy collection" tabindex="0">
                                                                <img src="assets/img/img1.jpg" class="ico02">
                                                            </a>
                                                        </div>
                                                        <a href="buy-description.html" class="text-decoration-none" tabindex="0">
                                                            <img src="assets/img/03.jpg" class="mai_pht rounded w-100">
                                                        </a>
                                                        <div class="user_name_hakf mt-1">
                                                            <div class="d-flex mb-1 align-items-center justify-content-between">
                                                                <div class="hajaj_user text-left">
                                                                    <div class="d-flex align-items-center justify-content-between">
                                                                        <div>
                                                                            <h6 class="iwMhCq">NFT open for bid token</h6>
                                                                        </div>
                                                                        <div class="nft-card-assets">
                                                                            <img src="assets/img/img1.jpg" width="20" height="20" alt="Asset logo">
                                                                        </div>
                                                                    </div>
                                                                    <small class="hig_bg">Highest Bid: 0.0007 AMB</small>
                                                                </div>
                                                            </div>
                                                            <div class="trx_price_heart d-flex align-items-center justify-content-between">
                                                                <a href="#" class="by_nw" tabindex="0">
                                                                    Buy Now
                                                                </a>
                                                                <div class="like_save">
                                                                    <span class="heart_class">
                                                                        <i class="fal fa-heart heart-black" aria-hidden="true"></i> &nbsp;
                                                                    </span>
                                                                    <span id="like3625775082284">2 </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu5" class="container tab-pane fade">
                                        <br>
                                        <div class="nft_tabs">
                                            <table>
                                              <tr>
                                                <th>NFT ID</th>
                                                <th>Image</th>
                                                <th>item</th>
                                                <th>Price</th>
                                                <th>Time</th>
                                            </tr>
                                            <tbody id="activity">

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <div id="menu6" class="container tab-pane fade">
                                    <br>
                                    <div class="nft_tabs">
                                        <table>
                                          <tr>
                                            <th>S.No</th>
                                            <th>Image</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Time</th>
                                        </tr>
                                        <tbody id="accpect">

                                            </tbody>

                                    </table>
                                </div>
                            </div>
                            <div id="menu7" class="container tab-pane fade">
                                <br>
                                <div class="nft_tabs">
                                    <table>
                                      <tr>
                                            <th>S.No</th>
                                            <th>Image</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Time</th>
                                        </tr>
                                  <tbody id="recive">

                                            </tbody>

                                </table>
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

<script>
    let myInterval = setInterval(showdata, 3000);
    document.getElementById("loadingdivnew").className = "d-block"; 
    async function showdata(){
        var wallet_address= "<?php echo $address;?>";
        if(wallet_address=='' || wallet_address==undefined){
            
             document.getElementById("loadingdivconnect").className="d-block"
        }else{ 
            clearInterval(myInterval);
            console.log("sfdgdgfd")
            document.getElementById("currentAddress").innerHTML = wallet_address; 


            
                    var formdata = new FormData();
                    formdata.append("address",wallet_address);
                    formdata.append("type","owned");
                    var requestOptions = {
                        method: "POST",
                        body: formdata,
                        redirect: "follow",
                    };
                    fetch("./itemsdata.php", requestOptions)
                    .then((response) => response.json())
                    .then((ownednft) => {
                       var ownedtab = "";
                       for (i = 0; i < ownednft.length; i++) { 
                           ownedtab += `
                           <div class="col-lg-3 col-md-6 mb-5">
                           <div class="inner_explore">
                           `;
                           if(ownednft[i].last_price>0 && ownednft[i].NFT_resell == "on"){
                            ownedtab += `
                            <div class="d-flex align-items-center justify-content-end">
                                <div class="">
                                    <p class="m-0" style="color:var(--text-pink)">Last Price</p>
                                    <h6 class="m-0">${ownednft[i].last_price} ${ownednft[i].last_buy_currency}</h6>
                                </div>
                            </div>
                            `;
                           }
                           if(ownednft[i].NFT_resell=="on"){
                           ownedtab += `<a href="buy-description.php?id=${ownednft[i].NFT_id}&v=${Math.floor((Math.random() * 1000000) + 1)}" class="text-decoration-none" tabindex="0">`
                           }else{
                                ownedtab += `<a href="buy-description.php?id=${ownednft[i].NFT_id}" class="text-decoration-none" tabindex="0">`
                           }
                           ownedtab += `<img src="${ownednft[i].NFT_image}" class="mai_pht rounded w-100">
                           </a>
                           <div class="user_name_hakf mt-1">
                           <div class="d-flex mb-1 align-items-center justify-content-between">
                           <div class="hajaj_user text-left">
                           <div class="d-flex align-items-center justify-content-between">
                           <div>
                           <h6 class="iwMhCq">${ownednft[i].NFT_name}</h6>
                           </div>

                           </div>
                           <small class="hig_bg">Current Price: ${ownednft[i].NFT_price} ${ownednft[i].NFT_payment}</small>
                           </div>
                           </div>

                           </div>
                           </div>
                           </div>
                           `;
                       }
                       if(ownedtab==''){
                           ownedtab+= `<p>No NFTS Found</p>`;
                       }
                       document.getElementById("owned").innerHTML = ownedtab;
                       document.getElementById("loadingdivnew").className = "d-none";
                   });
          
            

            /*************************** created functionality **************************/ 

            var formdata = new FormData();
            formdata.append("address",wallet_address);
            formdata.append("type","created");

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then((createnft) => {
               var createdtab = "";
               for (i = 0; i < createnft.length; i++) { 
                   createdtab += `
                   <div class="col-lg-3 col-md-6 mb-5">
                   <div class="inner_explore">
                   `;
                   if(createnft[i].last_price>0 && createnft[i].NFT_resell == "on"){
                    createdtab += `
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="">
                            <p class="m-0" style="color:var(--text-pink)">Last Price</p>
                            <h6 class="m-0">${createnft[i].last_price} ${createnft[i].last_buy_currency}</h6>
                        </div>
                    </div>
                    `;
                   }                   
                   if(createnft[i].NFT_resell=="on"){
                   createdtab += `<a href="buy-description.php?id=${createnft[i].NFT_id}&v=${Math.floor((Math.random() * 1000000) + 1)}" class="text-decoration-none" tabindex="0">`
                   }else{
                        createdtab += `<a href="Sell.php?id=${createnft[i].NFT_id}" class="text-decoration-none" tabindex="0">`
                   }
                   createdtab += `
                   <img src="${createnft[i].NFT_image}" class="mai_pht rounded w-100">
                   </a>
                   <div class="user_name_hakf mt-1">
                   <div class="d-flex mb-1 align-items-center justify-content-between">
                   <div class="hajaj_user text-left">
                   <div class="d-flex align-items-center justify-content-between">
                   <div>
                   <h6 class="iwMhCq">${createnft[i].NFT_name}</h6>
                   </div>

                   </div>
                   <small class="hig_bg">Current Price: ${createnft[i].NFT_price} ${createnft[i].NFT_payment}</small>
                   </div>
                   </div>

                   </div>
                   </div>
                   </div>
                   `;
               }
               if(createdtab==''){
                createdtab+= `<p>No NFTS Found</p>`;
            }
            document.getElementById("created").innerHTML = createdtab;
            document.getElementById("loadingdivnew").className = "d-none";
        });
            /*************************** Collection functionality **************************/ 

            var formdata = new FormData();
            formdata.append("address",wallet_address);
            formdata.append("type","collections");

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then((collectiondata) => {
               let collectiontab = "";
               for (let i = 0; i < collectiondata.length; i++) { 
                   collectiontab += `
                   <div class="col-lg-3 col-md-6 mb-5">
                   <div class="inner_explore">

                   <a href="./collection.php?collection=${collectiondata[i].collection_name}&v=${Math.floor((Math.random() * 1000000) + 1)}" class="text-decoration-none" tabindex="0">
                   <img src="${collectiondata[i].collection_logo}" class="mai_pht rounded w-100">
                   </a>
                   <div class="user_name_hakf mt-1">
                   <div class="d-flex mb-1 align-items-center justify-content-between">
                   <div class="hajaj_user text-left">
                   <div class="d-flex align-items-center justify-content-between">
                   <div>
                   <h6 class="iwMhCq">${collectiondata[i].collection_name}</h6>
                   </div>

                   </div>

                   </div>
                   </div>
                   <div class="trx_price_heart d-flex align-items-center justify-content-between">
                   <a href="./collection.php?collection=${collectiondata[i].collection_name}&v=${Math.floor((Math.random() * 1000000) + 1)}" class="by_nw" tabindex="0">
                   View Collection
                   </a>
                   </div>
                   </div>
                   </div>
                   </div>`;
               }if(collectiontab==''){
                collectiontab+= `<p>No Collections Found</p>`;
            }
            document.getElementById("collection").innerHTML = collectiontab;
            document.getElementById("loadingdivnew").className = "d-none";
        });
            /*************************** Sale functionality **************************/ 


            var formdata = new FormData();
            formdata.append("address",wallet_address);
            formdata.append("type","Sale");

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then((Salenft) => {
               var Saletab = "";
               for (i = 0; i < Salenft.length; i++) { 
                   Saletab += `
                   <div class="col-lg-3 col-md-6 mb-5">
                   <div class="inner_explore">
                   `;
                   if(Salenft[i].last_price>0 && Salenft[i].NFT_resell == "on"){
                    Saletab += `
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="">
                            <p class="m-0" style="color:var(--text-pink)">Last Price</p>
                            <h6 class="m-0">${Salenft[i].last_price} ${Salenft[i].last_buy_currency}</h6>
                        </div>
                    </div>
                    `;
                   }                    
                   if(Salenft[i].NFT_resell=="on"){
                   Saletab += `<a href="buy-description.php?id=${Salenft[i].NFT_id}&v=${Math.floor((Math.random() * 1000000) + 1)}" class="text-decoration-none" tabindex="0">`
                   }else{
                        Saletab += `<a href="Sell.php?id=${Salenft[i].NFT_id}" class="text-decoration-none" tabindex="0">`
                   }
                   Saletab += `
                   <img src="${Salenft[i].NFT_image}" class="mai_pht rounded w-100">
                   </a>
                   <div class="user_name_hakf mt-1">
                   <div class="d-flex mb-1 align-items-center justify-content-between">
                   <div class="hajaj_user text-left">
                   <div class="d-flex align-items-center justify-content-between">
                   <div>
                   <h6 class="iwMhCq">${Salenft[i].NFT_name}</h6>
                   </div>

                   </div>
                   <small class="hig_bg">Current Price: ${Salenft[i].NFT_price} ${Salenft[i].NFT_payment}</small>
                   </div>
                   </div>

                   </div>
                   </div>
                   </div>
                   `;
               }if(Saletab==''){
                Saletab+= `<p>No Collections Found</p>`;
            }
            document.getElementById("Sale").innerHTML = Saletab;
            document.getElementById("loadingdivnew").className = "d-none";
        });
            /*************************** userInfo functionality **************************/ 


            var formdata = new FormData();
            formdata.append("address",wallet_address);
            formdata.append("type","userdetails");

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then((userData) => {
               let imagedata='';
               let t_name;
                let i_name;
                if(userData[0].Usertwitname==null){
                    t_name=''
                }else{
                    t_name=userData[0].Usertwitname;
                }
                if(userData[0].Userinstaname==null){
                    i_name=''
                }else{
                    i_name=userData[0].Userinstaname;
                }
               imagedata=`<div class="user_imgs">
               <img class="rounded-pill art_imsss" width="120px" height="120px" src="${userData[0].Userimage}" alt="Card image cap">
               </div>`;

               document.getElementById("image").innerHTML = imagedata;
               document.getElementById("username").innerHTML = userData[0].Username;
               document.getElementById("userbio").innerHTML = userData[0].Userbio;
               document.getElementById("tweeterurl").setAttribute("href", `https://twitter.com/${userData[0].t_name}`);
               document.getElementById("instaurl").setAttribute("href", `https://www.instagram.com/${userData[0].i_name}`);
               document.getElementById("loadingdivnew").className = "d-none";
           });                                     
            /*************************** Activity functionality **************************/ 

            var formdata = new FormData();
            formdata.append("address",wallet_address);
            formdata.append("type","activity");

            var requestOptions = {
                method: "POST",
                body: formdata,
                redirect: "follow",
            };
            fetch("./itemsdata.php", requestOptions)
            .then((response) => response.json())
            .then((activitynft) => {
               var Activitytab = "";
               let payment='';
               for (i = 0; i < activitynft[0].length; i++) { 
                   if(activitynft[1][i]==null){
                       payment=activitynft[1][i].NFT_payment;
                   }else{
                       payment=activitynft[1][i].NFT_payment;
                   }
                   Activitytab += `<tr>
                   <td>${activitynft[0][i].Nft_id}</td>
                   <td><a href="./buy-description.php?id=${activitynft[0][i].Nft_id}"><img src="${activitynft[0][i].Nft_image}" style="width:50px" alt=""></a></td>
                   <td>${activitynft[0][i].nft_type}</td>
                   <td>${activitynft[0][i].Nft_price} ${payment}</td>
                   <td style="color:rgb(52, 199, 123);">${activitynft[0][i].Date}</td></tr>
                   `;
               }if(Activitytab==''){
                Activitytab+= `<p>No Activity Found</p>`;
            }
            document.getElementById("activity").innerHTML = Activitytab;
            document.getElementById("loadingdivnew").className = "d-none";

        });
        
        }

    }
</script>
<script>
    function accpectOffer(bid,quantity,id,address,status){
        if(status==0){
        var formdata = new FormData();
        formdata.append("Tid", id);
        formdata.append("address", address);
        formdata.append("price", bid);
        formdata.append("quantity", "1");
        
        var requestOptions = {
          method: 'POST',
          body: formdata,
          redirect: 'follow'
        };
        
        fetch("./accpectOffer.php", requestOptions)
          .then(response => response.text())
          .then(result => console.log(result))
          .catch(error => console.log('error', error));
        }else{
                
        }
     }
</script>
<?php  include "footer.php"?>