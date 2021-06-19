<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['pass'])) {
    echo "Login success.<br>";
    echo "Welcome user: ".$_SESSION['user'];
}else echo "Session ended.";
?>
<br>
<a href="login.php">Back to login</a> | <a href="logOut.php">Log out</a>
