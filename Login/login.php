<?php
session_start();
include_once 'Connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <form class="" action="" method="post">
            <table>
                <tr>
                    <td>Phone:</td>
                    <td>
                        <input type="text" name="phone" value="" placeholder="Your phone number">
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="pwd" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="login" value="Login">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
if (isset($_POST['phone']) && isset($_POST['pwd'])) {
    $phone = $_POST['phone'];
    $pass = $_POST['pwd'];
    $ketqua = getLogin($phone, $pass);
    if ($ketqua != false && $ketqua->num_rows>0) {
        echo "login success.<br>";
        $_SESSION['user'] = $phone;
        $_SESSION['pass'] = $pass;
        header("location: showLogin.php");
    }else {
        echo "incorrected user or password.";
    }
}
?>
