<?php

include "config.php";
$Tid=$_POST['Tid'];
$address= $_POST['address'];
$price= $_POST['price'];
$quantity= $_POST['quantity'];

$subject = "NFT Auction Claim ";

echo $Tid;

$sql2="SELECT `Useremail` FROM `nft_user` WHERE Useraddress ='{$address}'";
$result2=mysqli_query($link,$sql2);
$res1=$result2->fetch_assoc();

$to=$res1['Useremail'];
echo "usermail", $to;

$txt= '<html>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
        <body>
        <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" bgcolor="#F5F6FB">
            <tbody>
                <tr>
                    <td align="center" valign="top">
                        <table cellpadding="0" cellspacing="0" border="0" align="center" width="550" class="m_45504504110266303W100P" style="margin: 0 auto;">
                            <tbody>
                                <tr>
                                    <td align="center" valign="top">
                                        <table cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                                 
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" border="0" bgcolor="#FFFFFF" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td bgcolor="#ffffff" height="30" style="line-height: 30px; font-size: 30px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="color: #c7ced9; font-family: "Rubik", sans-serif; font-size: 14px; line-height: 150%; font-weight: 400;">
                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="100%" align="center" style="color: #50579e; font-family: "Rubik", sans-serif; font-size: 20px; line-height: 150%; font-weight: 400; text-align: center;">
                                                                        Welcome to
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table cellpadding="0" cellspacing="0" border="0" class="m_45504504110266303w95">
                                                            <tbody>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" height="5" style="line-height: 5px; font-size: 5px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="480" align="center" style="color: #50579e; font-family: "Rubik", sans-serif; font-size: 35px; line-height: 150%; font-weight: 400;">
                                                                        <a href="http://test.dsea.io/" target="_blank">
                                                                             <img src="" alt="" border="0" style="width: 107px;"/>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" height="10" style="line-height: 10px; font-size: 10px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="480" align="center" style="color: #50579e; font-family: "Rubik", sans-serif; font-size: 35px; line-height: 150%; font-weight: 400;">
                                                                       Claim Your nft 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" height="40" style="line-height: 40px; font-size: 40px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#ffffff">
                                            <tbody>
                                                <tr> 
                                                    <td align="left" valign="top" width="30">&nbsp;</td>
                                                    <td align="left" valign="top" width="233">
                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" class="m_45504504110266303h10" height="25" style="line-height: 25px; font-size: 25px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <a href="" target="_blank" data-saferedirecturl="">
                                                                            <img src="" border="0" width="105" style="display: block;" class="m_45504504110266303w80P CToWUd" />
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" class="m_45504504110266303h10" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        class="m_45504504110266303fvwa"
                                                                        align="left"
                                                                        valign="top"
                                                                        style="color: #1c1e29; font-family: "Rubik", sans-serif; font-size: 16px; line-height: 150%; font-weight: 400; text-align: left;"
                                                                    >
                                                                      Click here to claim your NFT
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td bgcolor="#ffffff" class="m_45504504110266303h10" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="top">
                                                                        <table border="0" cellspacing="0" cellpadding="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" style="border-radius: 22px; padding:9px 20px" bgcolor="#50579e">
                                                                                         <a href ="http://test.dsea.io/bid-description.php?id='.$Tid.'"  style="font-size:14px; color:white; text-decoration:none" >
                                                                                            CLICK HERE
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td align="left" valign="top" width="277">
                                                        <a href="" target="_blank" data-saferedirecturl="">
                                                            <img src="http://test.dsea.io/images/nft10enth-logo.png " border="0" height="363" width="477" style="display: block;"
                                                                class="m_45504504110266303w100P m_45504504110266303height CToWUd"
                                                            />
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td align="center" class="m_45504504110266303w100P" bgcolor="#4e9d66">
                                                        <table cellpadding="0" cellspacing="0" border="0" class="m_45504504110266303w100P" width="85%">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center">
                                                                        <table cellpadding="0" cellspacing="0" border="0" class="m_45504504110266303w95">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td bgcolor="#4e9d66" height="40" style="line-height: 40px; font-size: 40px;">&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#4e9d66" align="center" style="color: #ffffff; font-family: "Rubik", sans-serif; font-size: 24px; line-height: 150%; font-weight: 400;">
                                                                                        Get More From DSEA
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#4e9d66" height="10" style="line-height: 10px; font-size: 10px;">&nbsp;</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#4e9d66" align="center"
                                                                                        style="color: #f0fff4; font-family: "Rubik", sans-serif; font-size: 16px; line-height: 150%; font-weight: 400;"
                                                                                    >
                                                                                        Fully protect yourself from writing mistakes<br />
                                                                                        by activating all DSEA features.
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td bgcolor="#4e9d66" height="40" style="line-height: 40px; font-size: 40px;">&nbsp;</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="40" style="line-height: 40px; font-size: 40px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td align="center" style="border-bottom: #d6d6d6 solid 1px;" width="100%">
                                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#F5F6FB">
                                                            <tbody>
                                                                <tr>
                                                                    <td bgcolor="#F5F6FB" height="30" style="line-height: 30px; font-size: 30px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" style="color: #999999; font-family: "Rubik", sans-serif; font-size: 14px; line-height: 120%; font-weight: 400;">
                                                                        <table cellpadding="0" cellspacing="0" border="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="left" width="64" style="line-height: 100%;">
                                                                                        <a href="https://www.facebook.com/" style="text-decoration: none;" target="_blank" data-saferedirecturl="">
                                                                                           <img src="http://test.dsea.io/images/facebook.png" border="0" width="30"/>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td width="20" class="m_45504504110266303hide"></td>
                                                                                    <td align="left" width="64" style="line-height: 100%;">
                                                                                        <a href="https://www.instagram.com/" style="text-decoration: none;" target="_blank" data-saferedirecturl="">
                                                                                           <img src="http://test.dsea.io/images/instagram.png" border="0" width="30"/>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td width="20" class="m_45504504110266303hide"></td>
                                                                                    <td align="left" width="64" style="line-height: 100%;">
                                                                                        <a
                                                                                            href="https://www.linkedin.com/showcase/"
                                                                                            style="text-decoration: none;"
                                                                                            target="_blank"
                                                                                            data-saferedirecturl=""
                                                                                        >
                                                                                           <img src="http://test.dsea.io/images/linkedin.png" border="0" width="30"/>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td width="20" class="m_45504504110266303hide"></td>
                                                                                    <td align="left" width="32" style="line-height: 100%;">
                                                                                        <a href="https://twitter.com/" style="text-decoration: none;" target="_blank" data-saferedirecturl="">
                                                                                           <img src="http://test.dsea.io/DSEA/images/twitter.png" border="0" width="30"/>
                                                                                        </a>
                                                                                    </td>
                                                                                    <td width="20" class="m_45504504110266303hide"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td bgcolor="#F5F6FB" height="10" style="line-height: 10px; font-size: 30px;">&nbsp;</td>
                                                                </tr>
                                                                <tr></tr>
                                                                <tr>
                                                                    <td bgcolor="#F5F6FB" height="10" style="line-height: 10px; font-size: 30px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                                <tr></tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" align="center" style="color: #999999; font-family: "Rubik", sans-serif; font-size: 14px; line-height: 120%; font-weight: 400;">
                                                        Learn more about DSEA, interact with the DSEA team, engage in community discussions, and have your say in shaping the future of decentralized finance.
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" align="center" valign="top" style="font-family: "Rubik", sans-serif; font-weight: 400; font-size: 14px; line-height: 20px;">
                                                        <a href="#" style="text-decoration: none; color: #4e9d66;" target="_blank">
                                                            © 2021 DSEA. All Rights Reserved.
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td bgcolor="#F5F6FB" height="20" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8 \r\n";

$headers .= "From: testingail2005@gmail.com" . "\r\n" ;


if(mail($to,$subject,$txt,$headers)){
    
   $update="UPDATE NFT_onlybid SET `Accept_offer`=1 where NFT_id='$Tid' AND NFT_bidder='$address' AND NFT_bid='$price'"; 
   $dataupdate=mysqli_query($link,$update);
   echo "mail successfull"; 
    
    
}else{
    
    echo  "mail unsuccessful";
}
// echo $txt;

?>
