<?php

$connection = mysqli_connect("localhost","root","","sec");

if($connection){
    //echo "DB connected successfully";
}else{
    echo "connection failed";
}


if(isset($_POST['submit'])){

$email = $_POST['email'];
$name = $_POST['name'];

if($email != ""){

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

  $email_check = "select * from entries where email = '$email'";
  
  //echo $email_check;
  $result = mysqli_query($connection, $email_check);

if (mysqli_num_rows($result) > 0) {

    header('Location: index.php?msg=Email Id Already Registered');

} else {
  $query = "INSERT into entries (name,email) VALUES ('$name','$email')";
  $insert_result = mysqli_query($connection,$query);

  if($insert_result){

   //mail script started 

//mail script started 
$memail = $email;
$subject =  "XKCD Comic";
$message = '<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
body {
    padding: 0;
    margin: 0;
}

html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
    *[class="table_width_100"] {
        width: 96% !important;
    }
    *[class="border-right_mob"] {
        border-right: 1px solid #dddddd;
    }
    *[class="mob_100"] {
        width: 100% !important;
    }
    *[class="mob_center"] {
        text-align: center !important;
    }
    *[class="mob_center_bl"] {
        float: none !important;
        display: block !important;
        margin: 0px auto;
    }   
    .iage_footer a {
        text-decoration: none;
        color: #929ca8;
    }
    img.mob_display_none {
        width: 0px !important;
        height: 0px !important;
        display: none !important;
    }
    img.mob_width_50 {
        width: 40% !important;
        height: auto !important;
    }
}
.table_width_100 {
    width: 680px;
}
</style>


<div id="mailsub" class="notification" align="center">

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8">


<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
    <tr><td>
    </td></tr>
    <tr><td align="center" bgcolor="#ffffff">
        <table width="90%" border="0" cellspacing="0" cellpadding="0"><div style="height: 30px; line-height: 30px; font-size: 10px;"></div>
            <tr><td align="center">
                        <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; float:left; width:100%; padding:20px;text-align:center; font-size: 13px;">
                                    <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
                                    <img src="https://siddhartha.co.in/wp-content/uploads/2019/09/sists-logo-1.jpg" width="260" alt="SITS" border="0"  /></font></a>
                    </td>
                    <td align="right">
            <div style="height: 50px; line-height: 50px; font-size: 10px;"></div>
    </td></tr>
    <tr><td align="center" bgcolor="#fbfcfd">
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr><td align="center"><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
                <div style="line-height: 44px;">
                    <font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
                    <span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
                        Hi Folk, your subscription to XKCD comic is successful.
                    </span></font>
                </div><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
            </td></tr>
            <tr><td align="center">
                <div style="line-height: 24px;">
                    <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                    <span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
                        <!--We hope you enjoy emails from SITS. If you wish to unsubscribe.-->
                        Please Verify your Email Account<br/><br/>
                         <a href="http://localhost/xkcd/verify.php?email='.$email.'" target="_blank" class=" block-center" style="background:orange;color:#fff;padding:15px;border-radius:5%;text-decoration:none;font-weight:600;width:200px"> 
                        Verify Email
                    </a>.
                    </span></font>
                </div><div style="height: 40px; line-height: 40px; font-size: 10px;"></div>
            </td></tr>
            <!--<tr><td align="center">
                <div style="line-height: 24px;">
                    <a href="#" target="_blank" class="btn btn-danger block-center">
                        click
                    </a>
                </div><div style="height: 60px; line-height: 60px; font-size: 10px;"></div>
            </td></tr>-->
        </table>        
    </td></tr>
    <tr><td class="iage_footer" align="center" bgcolor="#ffffff">

        
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr><td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
                <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                    '.date('Y').' ?? SITS. ALL Rights Reserved.
                </span></font>              
            </td></tr>          
        </table>
        

    </td></tr>
    <tr><td>

    </td></tr>
</table>
</td></tr>
</table>
 
</td></tr>
</table>';
//echo $message;die();
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

$sendMail = mail($memail, $subject, $message,$headers);
if($sendMail)
{
echo "Email Sent Successfully";
}
else
{
echo "Mail Failed";
}
//mail script ended
    
    header('Location: index.php?msg=Subscription Successful');
  }else{
     header('Location: index.php?msg=Something Went Wrong, Try Again');
  }
}


} else {
     header('Location: index.php?msg=not a valid email address');

}

}

    }
?>