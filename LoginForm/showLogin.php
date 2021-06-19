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
            if (isset($_SESSION['email']) && isset($_SESSION['user'])) {
                echo "Login success.<br>";
                echo "Welcome user: ".$_SESSION['user'];
            }else echo "Session ended.";
            ?>
            <hr>
            <a href="login.php">Back to login</a> | <a href="logOut.php">Log out</a>
        </div>
    </body>
</html>
<br>
