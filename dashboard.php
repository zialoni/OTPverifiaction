<?php
session_start();

if(isset($_SESSION['IS_LOGIN'])){
   echo "Welcome USer";
}else {
    header('location:index.php');
    die();
}

?>

<a href="logout.php">LOG OUT</a>