<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h3>Registration form</h3>
        <form class="" action="" method="post">
            UserName: <input type="text" name="name" value=""> <br>
            Password: <input type="password" name="pass" value=""> <br>
            Phone Number: <input type="text" name="phone" value="" maxlength="10"> <br>
            <input type="submit" name="submit" value="Registration">
        </form>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $conn = new mysqli('localhost', 'root', '', 'abc12');
        if($conn->connect_error){
            die("Connection failed.");
        }
        if (isset($_POST['submit']))
        {
            //check if all fields are not empty:
            if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['pass'])){
                die ("You must enter all required fields.");
            }
            //check username:
            $name = $conn->real_escape_string($_POST['name']);
            $sql_checkName = "SELECT * FROM abc12users WHERE username = ?";
            $stmt1 = $conn->prepare($sql_checkName);
            echo $conn->error;
            $stmt1->bind_param("s", $name);
            $stmt1->execute();
            $result = $stmt1->get_result();
            $stmt1->close();
            if ($result->num_rows>0) {
                die("The username has already been taken.");
            }
            //insert data for new user:
            $phone = $conn->real_escape_string($_POST['phone']);
            $pass = sha1($_POST['pass']);
            $sql_insert = "INSERT INTO abc12users (username, password_hash, phone) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bind_param("sss", $name, $pass, $phone);
            $stmt->execute();
            $stmt->close();

            echo "Success register new user: <br>";
            echo "userName: ".$name."<br>";
            echo "Phone number: ".$phone;
            $conn->close();
        }
        ?>
    </body>
    <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>
