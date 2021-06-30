<?php
    require_once 'Part1_CreateDB.php';
    // $conn = connect();
    function validateRegister($name, $pass, $phone){
        $error = array();
        if(empty($name)){
            $error['name'] = "Username is required.";
        }
        if(!empty($name) && !preg_match("/^([a-zA-Z' ]+)$/", $name)){
            $error['name'] = "Username must contain only alphabet characters.";
        }
        if(!empty($name) && preg_match("/^([a-zA-Z' ]+)$/", $name) && strlen($name)<2){
            $error['name'] = "Username must contain atleast 2 characters.";
        }
        if(empty($pass)){
            $error['pass'] = "Password is required.";
        }
        if(!empty($pass) && strlen($pass)<6){
            $error['pass'] = "Password must contain atleast 6 characters.";
        }
        if(empty($phone)){
            $error['phone'] = "Phone is required.";
        }
        if(!empty($phone) && !preg_match("/^[0-9]+/", $phone)){
            $error['phone'] = "Phone must contain only digit number.";
        }
        if(!empty($phone) && preg_match("/^[0-9]+/", $phone) && strlen($phone)<10 ){
            $error['phone'] = "phone must contain atleast 10 digits.";
        }
        if(count($error)>0){
            echo "<b style='color: red'>Error(s): </b><br>";
            foreach ($error as $value) {
                echo "<li>". $value. "</li>";
            }
        }
        return $error;
    }
    function checkDup($name){
        $conn = connect();
        $sql = "SELECT * FROM abc12users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>0){
            return false;
        } else {return true;}
        $stmt->close();
        $conn->close();
    }
    function register($name, $pass, $phone){
        $conn = connect();
        $check = checkDup($name); //Check for duplicated username in the database
        if($check === false){
            die ("Username has already taken,");
        }
        $pass = sha1($pass);     //hashcode the password before insert into the database
        $sql = "INSERT INTO abc12users (username, password_hash, phone) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $pass, $phone);
        $stmt->execute();
        $stmt->close();

        //Check back from database if new user inserted successfully:
        $sql = "SELECT * FROM abc12users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            echo "The following user has registered successfully: <br>";
            echo "UserName: ".$row['username'];
            echo "<br>Phone: ".$row['phone'];
        }else {echo "User registration failed.";}
        $conn->close();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</head>
<body>
    <form action="" method="post">
        <p>Registration Form</p>
        UserName: <input type="text" name="name" id=""><br><br>
        Password: <input type="password" name="pass" id=""><br><br>
        Phone Number: <input type="text" name="phone" id=""><br><br>
        <input type="submit" value="Registration" name="submit">
    </form>

    <?php
        if(isset($_POST['submit'])){
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
            $pass = $_POST['pass'];
            $error = validateRegister($name, $pass, $phone);
            if(count($error)>0){
                exit();
            }else {
                register($name, $pass, $phone);
            }
        }
    ?>
</body>
    
</html>
