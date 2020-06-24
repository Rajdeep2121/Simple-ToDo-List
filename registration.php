<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
.container{
    width: 60%;
    border: 1px solid black;
    margin-top: 7%;
    background-color: whitesmoke;
    border-radius: 10px;
    padding: 10px;
}
body{
    background-color: black;
}
</style>
    <title>Login Page</title>
</head>
<body>
    
<div class="container" style="width: 65%;">
        <div class="login-box">
            <div class="row">
                <div class="col-md-6 border-right">
                    <h2>Login</h2>
                    <form action="validation.php" method="POST">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="col-md-6 border-left">
                    <h2>Register</h2>
                    <form action="registration.php" method="POST">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
<?php
session_start();
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
    echo "<b style='color: red;'>Email already exists</b>";
    echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
}
else{
    $reg = "insert into task(name,password,email) values ('$name','$pass','$email')";
    mysqli_query($con,$reg);
    echo "<b style='color: green;'>Registration successful<br>Login again!</b>";
    echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
}

?><br>
                    <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
