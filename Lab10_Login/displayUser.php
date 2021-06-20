<?php session_start();
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <style media="screen">
            .container{
                margin: 0 auto;
                width: 40%;
                text-align: center;
                background-color: #cccccc;
                font-family: calibri;
                padding-bottom: 20px;
                border-radius: 13px;
            }
            h2{
                padding: 10px;
                background-color: #ffa80f;
                color: white;
                border-top-left-radius: 13px;
                border-top-right-radius: 13px;
            }
            table{
                border-collapse: collapse;
                margin: 0 auto;
                width: 60%;
                text-align: center;
            }
            th{
                background-color: #4d718c;
                color: white;
            }
            tr:nth-child(even){
                background-color: white;
            }
            a.btn{
                /* border: 1px solid; */
                padding: 5px;
                text-decoration: none;
                border-radius: 6px;
                width: 120px;
                display: inline-block;
                color: white;
                background-color: #ffa217;

            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Student list</h2>
            <?php
                if(isset($_SESSION['userType'])){
                    viewClass(); 
                    echo $_SESSION['userType'];
                }else {
                    echo "You must <a href=\"login.php\">log in</a> to view Student list.";
                }
                
            ?>
            <br>
            <hr>
            <a class="btn" href="Welcome.php">Back</a><br>
        </div>
    </body>
</html>
