<?php
session_start();


$otp=$_POST['otp'];
$email=$_SESSION['EMAIL'];
$res=mysqli_query($con,"select * from user where email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
      mysqli_query($con,"update user set otp='' where email='$email'");
      $_SESSION['IS_LOGIN']=$email;
    echo "exist";
}else {
    echo "not_exist";
}

?>