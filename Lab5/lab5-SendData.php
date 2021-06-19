<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .post{
            border: 1px solid;
            width: 500px;
            padding-left: 20px;
        }
        .get{
            border: 1px solid;
            width: 500px;
            padding-left: 20px;
        }
    </style>
    <title>Send POST</title>
</head>
<body>
    <h1>Xử lý form bằng POST và GET trong PHP</h1>
    <div class="post">
        <h2>Input data for POST:</h2>
        <form action="lab5_POSTData.php" method="post">
            <input type="text" name="name" id="name" placeholder="Name"><br><br>
            <input type="email" name="email" id="email" placeholder="Email"><br><br>
            <input type="submit" name="sendPOST" value="Send"><br><br>
        </form>
    </div><br><br>
    <div class="get">
    <h2>Input data for GET:</h2>
    <form action="lab5_GETData.php" method="get">
            <input type="text" name="name" id="name" placeholder="Name"><br><br>
            <input type="email" name="email" id="email" placeholder="Email"><br><br>
            <input type="submit" name="sendGET" value="Send"><br><br>
        </form>
    </div>
</body>
</html>