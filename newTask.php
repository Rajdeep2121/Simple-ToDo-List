<?php
session_start();
// header('location:login.php');
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'newProj');

$email = $_SESSION['email'];
$text = $_POST['task'];


$reg = "insert into content(email,text) values ('$email','$text')";
$qry = mysqli_query($con,$reg);
if($qry){
    echo "<h3 style='font-family:Segoe UI;'>New Task Added</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
else{
    echo "some error";
}

