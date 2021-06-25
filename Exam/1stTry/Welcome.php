<?php
    session_start();
    if(isset($_SESSION['login'])){
        $duration = time() - $_SESSION['time'];
        $timeout = 3000-$duration;

        echo "Welcome: ".$_SESSION['name'].". You have logged in successfully.";
        echo "<br>Your session will end after: ".$timeout." seconds."; 
        ?>
        
        <br><form method='post'><input type='submit' name='logout' value='Log out'></form>
    <?php
        if($timeout<=0 || isset($_POST['logout'])){
            unset($_SESSION['login']);
            session_destroy();
        }
    }else {
        header("location: Part3_login.php");
    }
?>