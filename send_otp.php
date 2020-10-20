<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;


$email=$_POST['email'];

$res=mysqli_query($con,"select * from user where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
    $otp=rand(11111,99999);
    mysqli_query($con,"update user set otp='$otp' where email='$email'");
    $_SESSION['EMAIL']=$email;
    echo "exist";
    include_once "PHPMailer/PHPMailer.php";

                $mail = new PHPMailer();
                $mail->setFrom('hello@markhormedia.com');
                $mail->addAddress($email, $email);
                $mail->Subject = "Please verify OTP!";
                $mail->isHTML(true);
                $mail->Body = "
                   Your OTP verification code is ".$otp;
               

                $mail->send();
            

}else {
    echo "not_exist";
}


?>