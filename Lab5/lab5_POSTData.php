<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receive POST</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
    <h1>WELCOME</h1>
    <h2>Data Sent successfully</h2>
    <?php
        if(isset($_POST["sendPOST"])){
            echo "Name: ".$_POST["name"]."<br>";
            echo "Email: ".$_POST["email"]."<br>";
        }
    ?>
</body>
</html>