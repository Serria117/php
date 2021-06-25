<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name="name" id=""><br><br>
        Pass: <input type="text" name="pass" id=""><br><br>
        <input type="submit" value="Login" name="login">
    </form>
    <?php
        if(isset($_POST['login'])){
            $conn = new mysqli('localhost', 'root', '', 'qlsinhvien');
            $name = $_POST['name'];
            // Test against SQL injection string: "root' OR 1=1; -- "
            // $name = mysqli_real_escape_string($conn, $name);     //=> OK
            // $name = filter_var($name, FILTER_SANITIZE_STRING);    //=> OK
            // $name = addslashes($name);                           //=> OK
            // $name = htmlspecialchars($name);                      //=> Failed
            // $name = htmlentities($name);                            //Failed
            $pass = sha1($_POST['pass']);
            $sql = "SELECT * FROM users WHERE username = '$name' AND pass = '$pass'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
                echo "$name<br>";
                echo "Login success.";
            }else{
                echo "$name<br>";
                echo "login failed.";
            }

            $conn->close();
        }

    ?>
</body>
</html>