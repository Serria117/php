<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Session</title>
        <style media="screen">
            *{
                box-sizing: border-box;
                font-family: sans-serif;
            }
            .container{
                margin: 0 auto;
                width: 40%;
                background-color: #cccccc;
                text-align: center;
                border-radius: 17px;
                padding-bottom: 10px;
            }
            table{
                margin: 0 auto;
                border-collapse: collapse;
                text-align: left;
            }
            h2{
                background-color:#d48702;
                color: white;
                border-top-left-radius: 17px;
                border-top-right-radius: 17px;
                padding: 10px;
            }
            td{
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Session</h2>
            <?php
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            if (isset($_SESSION['email']) && isset($_SESSION['user'])) {
                $duration = time() - $_SESSION['time']; //kiểm tra duration (thời gian) của phiên làm việc
                echo "Login success.<br>";
                echo "Welcome user: ".$_SESSION['user'];
                echo "<br>You have logged in at: ".date("h:i:sa - d/m/Y", $_SESSION['time']);
                echo "<br>You have logged in for: ".$duration." s"; //HIển thị thời gian từ lúc đăng nhập
                if ($duration >= 300) { //khi duration của phiên làm việc >300s thì đến trang logout để đăng xuất
                    header("location: logOut.php");
                }
            }else echo "Session ended.";
            ?>
            <hr>
            <a href="login.php">Back to login</a> | <a href="logOut.php">Log out</a>
        </div>
    </body>
</html>
<br>
