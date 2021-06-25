<?php
    session_start();
    require_once 'Part1_CreateDB.php'; //Create data base and connection

    function logIn($name, $pass) {
        if(empty($name) || empty($pass)){
            $login = "You must enter username and password.";  //no username or password entered
        } else {
            $name = filter_var($name, FILTER_SANITIZE_STRING); //filter the name string for unwanted character or script
            $pass = sha1($pass);
            $conn = connect();
            $sql = "SELECT * FROM abc12users WHERE username = ? AND password_hash = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $name, $pass);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows>0){
                $login = true;  //login success
            }else {
                $login = false; //login failed
            }
        }
        return $login; //The value of $login variable will determine log in result.
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>
<body>
<?php
    //The form is only show if no session is created
    if(empty($_SESSION['login'])){ ?>
    
    <h3>Login form</h3>
    <form action="" method="post">
        <label for="name">UserName: </label><input type="text" name="name" id=""><br><br>
        <label for="pass">Password: </label><input type="password" name="pass" id=""><br><br>
        <input type="checkbox" name="rmb" id=""> Remember me <br><br>
        <input type="submit" name="login" value="Log in">
    </form>
</body>

 <?php }
    if(isset($_POST['login'])){
        $login = logIn($_POST['name'], $_POST['pass']);
        //log in success => create the session and if 'Remember me' is checked create the cookie.
        if($login === true){
            $_SESSION['login'] = true;
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['time'] = time();
            if (isset($_POST['rmb'])) {
                setcookie('name',$_POST['name'],time()+60*60*24*30);
            }
            header("Location: part3_login.php"); //reload page with session
        //log in failed, return the error message
        } else if($login === false) {
            echo "Invalid username or password.";
        }
        //no username or password entered, return the error message
        else {
            echo $login;
        }
    }
 
 ?>

<?php
    //if the session has been created after successfully logged in, show the "log out" button
    if(!empty($_SESSION['login'])){ 
        $duration = time() - $_SESSION['time'];
        $timeout = 1000-$duration;
        echo "Welcome ".$_SESSION['name'];
        echo "<br>Your session will be expired in: ".$timeout." seconds.";
        ?>
        <br><form method='post'><button name='logout'>Log out</button></form>
    <?php 
    } 
    //if the "log out" button is pressed, unset the session, clear the cookie and reload the page to show the "login form".
    if(isset($_POST['logout'])){
        session_destroy();
        if (isset($_COOKIE['name'])) {
            setcookie('name','',time()-3600);
        }
        header("Location: part3_login.php");
        exit();
    }
?>
</html>
