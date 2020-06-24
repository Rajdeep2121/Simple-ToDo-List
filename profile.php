
<?php
session_start();
if(empty($_SESSION['logged_in'])){
    echo "You are not logged in. <a href='login.html'>Click here</a> to login";
    exit(1);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>To Do List</title>
        
<style>

body{
    text-align: center;
    font-family: HelveticaNueu;
    background-color: #333333;
    color: white;
}
p{
    animation: slide-up 0.4s ease-out;
    padding-bottom: 20px;
    margin-left: 5%;
    margin-right: 5%;
    background: url('pics/3.jpg');
    background-position: right;
    background-size: cover;
    background-repeat: no-repeat;
    color: black;
    border-radius: 10px;
    padding-top: 10px;
    font-size: 25pt;
}
@keyframes slide-up {
    0%{opacity: 0; transform: translateY(10px)}
    100%{opacity: 1; transform: translateY(0px)}
}

a{
    color: white;
    margin-bottom: 20px;
}
a:hover{
    color: white;
    font-size: 15pt;
    transition: 0.4s ease-in;
}
@font-face {
    font-family: Kaushan;
    src: url('fonts/KaushanScript-Regular.ttf');
}
@font-face {
    font-family: HelveticaNueu;
    src: url('fonts/helvetica/HelveticaNeuBold.ttf');
}
@font-face {
    font-family: Proxima;
    src: url('fonts/ProximaNovaBold.otf');
}
h3{
    margin-top: 100px;
    margin-bottom: 20px;
    text-decoration: underline;
}
span{
    border: 3px solid black;
    padding: 10px;
    border-radius: 10px;
}
span:hover{
    background-color: black;
    color: white;
    text-decoration: underline;
    cursor: pointer;
    transition: 0.5s ease-out;
}
button{
    margin-top: 10px;
    background-color: #4285F4;
    color: white;
    padding: 5px 10px;
    border: none;
}

input{
    margin: auto;
}
#logout{
    float: right;
    top: 0;
}

.big-type h2{
    font-size: 40px;
    line-height: 1.0625;
    font-weight: 600; 
    font-family: "Helvetica Neue","Helvetica","Arial",sans-serif;
}
.texture-orange{
    color: #e5895f;
    background-image: url('pics/2.jpg');
}
.texture-blue{
    color: #e5895f;
    background-image: url('pics/1.jpg');
}
.masked-copy {
    -webkit-background-clip: text;
    color: transparent !important;
}
#profileHead{
    margin-bottom: 50px;
}
/* #containTask p{
    background-color: wheat;
    /* background-image: url('pics/1.jpg'); */
    color: black;
    background-position: center;
} */
</style>

    </head>
    <body>
        <div class="logout" style="float:right;">
            <button id="log" type="submit" onclick="window.location.href='logout.php'">Logout</button>
        </div>

        <div class="masked-copy texture-orange big-type" id="profileHead">
            <?php
                 echo "<h2>Welcome ",$_SESSION['name'],"</h2>"; 
            ?>
        </div>

        <div class="row">
            <div class="col-md-12 masked-copy texture-blue big-type">
                <h1>TO DO LIST</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <div class="addTask">
                        <form action="newTask.php" method="POST">
                            <div class="col-md-6">
                                <h2>New Task</h2>
                                <input class="form-control" style="width: 300px;text-align: center;" type="text" name="task" placeholder="Enter task"><br>
                                <button type="submit" >Add new Task</button>
                            </div>
                        </form>
                        <form action="completed.php" method="POST">
                            <div class="col-md-6">
                                <h2>Completed Task</h2>
                                <input class="form-control" style="width: 300px;text-align: center;" type="text" name="comptask" placeholder="Enter task"><br>
                                <button type="submit" >Task Completed</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-right">
                <div class="notCompleted ">
                    <div class="masked-copy texture-blue big-type">
                        <h3><span>NOT COMPLETED</span></h3>
                    </div>

<?php
    
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'newProj');
$email = $_SESSION['email']; 

$sql = "select * from content where email='$email'";
$records = mysqli_query($con, $sql);
$id = 0;
if($records==''){
    echo "";
}
else{
    while($row = mysqli_fetch_array($records)){
        echo "<div class='col-md-12' id='containTask' style='margin-bottom: 30px;margin-top: 30px;'>";
        echo "<p id='".$id."'>".$id.".  ".$row['text']."</p>";
        ?>
        <a href="delnotComp.php?text=<?php echo $row['text'] ?>">Delete</a>
        <?php
        $id = $id + 1;
        // echo ;
        echo "</div>";
    }
}
?>


                </div>
            </div>
            <div class="col-md-6 border-left">
                <div class="Completed">
                    <div class="masked-copy texture-blue big-type">
                        <h3><span>COMPLETED</span></h3>
                    </div>
<?php
    
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con,'newProj');
    $email = $_SESSION['email']; 
    
    $sql = "select * from contentComp where email='$email'";
    $records = mysqli_query($con, $sql);
    $id = 0;
    if($records==''){
        echo "";
    }
    else{
        while($row = mysqli_fetch_array($records)){
            echo "<div class='col-md-12' id='containTask' style='margin-bottom: 30px;margin-top: 30px;'>";
            echo "<p id='".$id."'>".$row['text']."</p>";
            ?>
            <a href="delComp.php?text=<?php echo $row['text'] ?>" >Delete</a>
            <?php
            $id = $id + 1;
            echo "</div>";
        }
    }
    ?>
                </div>
            </div>
        </div>   
	</body>
</html>