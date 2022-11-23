<?php include("header.php"); 
if(isset($_POST['submit'])){
    $to      = 'info@dsea.io, defichainnfts@gmx.de';
    $subject = $_POST['to_name'];
    $message = $_POST['desc'];
    $headers = 'From: '.$_POST['to_mail'].'.'       . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)){
        echo"<script>alert('Message Sent successfull')</script>";
    }else{
        echo"<script>alert('Something went wrong please try again later')</script>";
    };
}
?>

        <div class="collectible">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>


<div class="contact_information pb-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 Tarun-pt m-auto">
                <form method="post" id="contact-form" enctype="multipart/form-data" action="">
                    <div class="controls">
                        <h2>Message</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="name" type="text" name="to_name" class="form-control" placeholder="Name" />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="email" type="email" name="to_mail" class="form-control" placeholder="Email address" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="msg" name="desc" class="form-control" placeholder="Your Message" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-success btn-send" value="Send" name="submit" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
             
        </div>
    </div>
</div>


<?php include("footer.php"); ?>
