<?php
session_start();
// header('location:login.php');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'newProj');

$email = $_SESSION['email'];
$text = $_POST['deltask'];

$chooseOne = "select * from contentComp where text='$text' and email='$email'";
$chooseTwo = "select * from content where text='$text' and email='$email'";
$resultOne = mysqli_query($con,$chooseOne);
$resultTwo = mysqli_query($con,$chooseTwo);
$numOne = mysqli_num_rows($resultOne);
$numTwo = mysqli_num_rows($resultTwo);
if($numTwo==1 || $numOne==1){
    $reg = "delete from contentComp where text='$text' and email='$email'";
    $qry = mysqli_query($con,$reg);
    $regnew = "delete from content where text='$text' and email='$email'";
    $qrynew = mysqli_query($con,$regnew);
    if($qrynew && $qry){
        echo "<h3 style='font-family:Segoe UI;'>Task Deleted</h3>";
        echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
    }
}
else{
    echo "<h3 style='font-family:Segoe UI;'>Task Doesn't Exist</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
