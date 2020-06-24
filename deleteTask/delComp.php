<?php
session_start();
// header('location:login.php');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'newProj');

$email = $_SESSION['email'];
$text = $_GET['text'];

$chooseOne = "select * from contentComp where text='$text' and email='$email'";
$resultOne = mysqli_query($con,$chooseOne);
$numOne = mysqli_num_rows($resultOne);

if($numOne==1){
    $regnew = "delete from contentComp where text='$text' and email='$email'";
    $qrynew = mysqli_query($con,$regnew);
    if($qrynew){
        echo "<h3 style='color: red;font-family:Segoe UI;'>Task Deleted</h3>";
        echo "<script>setTimeout(\"location.href = '../profile.php';\",1500);</script>";
    }
}
else{
    echo "<h3 style='color: red;font-family:Segoe UI;'>Task Doesn't Exist</h3>";
    echo "<script>setTimeout(\"location.href = '../profile.php';\",1500);</script>";
}
