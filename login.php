<html>
<head>
<title>
    Login Page
</title>
<link rel="stylesheet" href="login.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>