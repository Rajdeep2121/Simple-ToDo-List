<?php
session_start();
session_destroy();
echo "You have been logged out!";
echo "<script>setTimeout(\"location.href ='index.php';\",1500);</script>";
?>
