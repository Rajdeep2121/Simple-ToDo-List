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
$create = "create table content(email varchar(255),text varchar(255), PRIMARY KEY(email,text)) ";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}


$email = $_SESSION['email'];
$text = $_POST['task'];


$reg = "insert into content(email,text) values ('$email','$text')";
$qry = mysqli_query($con,$reg);
if($qry){
    echo "<h3 style='color: green;font-family:Segoe UI;'>New Task Added</h3>";
    echo "<script>setTimeout(\"location.href = 'profile.php';\",1500);</script>";
}
else{
    echo "some error";
}

