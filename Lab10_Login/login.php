<?php session_start(); include "connect.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <h2>Login</h2>
            <form class="" action="" method="post">
                <table>
                    <tr>
                        <td>User name:</td>
                        <td>
                            <input type="text" name="username" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>password:</td>
                        <td>
                            <input type="text" name="pass" value="">
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" colspan="2">
                            <input style="width: 120px;" type="submit" name="login" value="Login">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if (isset($_POST['login'])) {
                    if (empty($_POST['username']) || empty($_POST['pass'])) {
                        echo "You must enter username and password.";
                    } else {
                        $name = htmlspecialchars($_POST['username']);
                        $pass = htmlspecialchars($_POST['pass']);
                        $pass = sha1($pass);
                        $login = logIn($name, $pass);
                        if($login == 1){
                            echo ("Welcome admin");
                            $_SESSION['userType'] = 'admin';
                            $_SESSION['userName'] = $name;
                            header ("location: AdminSession.php");
                        }else if($login == 0){
                            echo ("Welcome user");
                            $_SESSION['userType'] = 'user';
                            $_SESSION['userName'] = $name;
                            header ("location: AdminSession.php");
                        }else echo "Invalid username or password";
                    }
                }
            ?>
        </div>
    </body>
    <script type="text/javascript">
        if (window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</html>
