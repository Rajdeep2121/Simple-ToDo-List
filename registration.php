<?php
session_start();
// header('location:login.php');
$con = mysqli_connect('localhost','root','');
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
$create = "create table task(name varchar(255),password varchar(255),email varchar(255), PRIMARY KEY(email))";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}


$email = $_POST['email'];
$pass = $_POST['password'];
$name = $_POST['name'];
$s = "select * from task where email='$email'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
    echo "<h3 style='font-family:Segoe UI;'>Email already exists</h3>";
    echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>";
}
else{
    $reg = "insert into task(name,password,email) values ('$name','$pass','$email')";
    mysqli_query($con,$reg);
    echo "<h3 style='font-family:Segoe UI;'>Registration successful</h3><h4 style='font-family:Segoe UI;'>Login again!</h4>";
    echo "<script>setTimeout(\"location.href = 'login.php';\",1500);</script>";
}

?>