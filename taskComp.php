<?php
session_start();
// header('location:login.php');
$con = mysqli_connect('localhost','root','');
// mysqli_select_db($con,'newProj');
// create db if it doesnt exist
$createdb = "create database newProj";
if($con->query($createdb) === TRUE){
    echo "";
}
else{
    echo "";
}

mysqli_select_db($con,'newProj');

// create table if it doesnt exist
$create = "create table contentComp(email varchar(255),text varchar(255), PRIMARY KEY(email,text)) ";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}


$email = $_SESSION['email'];
$text = $_GET['text'];

$chooseOne = "select * from content where text='$text' and email='$email'";
$resultOne = mysqli_query($con,$chooseOne);
$numOne = mysqli_num_rows($resultOne);

if($numOne==1){
    $regnew = "delete from content where text='$text' and email='$email'";
    $qrynew = mysqli_query($con,$regnew);
    $reg = "insert into contentComp values ('$email','$text')";
    $qry = mysqli_query($con,$reg);
    if($qry){
        echo "<h3 style='color: green;font-family:Segoe UI;'>Task Completed</h3>";
        echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
    }
}
else{
    echo "<h3 style='color: red;font-family:Segoe UI;'>Some error</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
