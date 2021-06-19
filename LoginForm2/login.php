<?php session_start(); include_once 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
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
                background-color:#714494;
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
            <h2>Login</h2>
            <form class="" action="" method="post">
                <table>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="text" name="email" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="pass" value="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input style="width: 150px; height: 30px; border-radius: 5px;" type="submit" name="login" value="Login">
                        </td>
                    </tr>
                </table>
            </form>
            <hr>
            Don't have an account yet? <a href="registerForm.php">Register</a> now
            <br>
            <?php
            if (isset($_POST['login'])) {
                if (!empty($_POST['email']) && !empty($_POST['pass'])) {
                    $email = htmlspecialchars($_POST['email']);
                    $pass = htmlspecialchars($_POST['pass']);
                    $login = logIn($email, $pass);
                    if ($login != false && $login->num_rows>0) {
                        while ($row = $login->fetch_assoc()) {
                            $_SESSION['time']=time();
                            $_SESSION['email'] = $email;
                            $_SESSION['user'] = $row['name'];
                            header("location: showLogin.php");
                        }
                    } else {
                        echo "<br><span style=\"color: red;\" >Incorrect email or password!</span>";
                    }
                }
            }
            ?>
        </div>
    </body>
    <script type="text/javascript">
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>
