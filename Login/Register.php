<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Đăng ký</title>
    </head>
    <body>
        <h2>Register user</h2>
        <form class="" action="" method="post">
            <table>
                <tr>
                    <td>User name: </td>
                    <td>
                        <input type="text" name="username" value="">
                    </td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="phone" value="">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" value="">
                    </td>
                </tr>
                <tr>
                    <td>password: </td>
                    <td>
                        <input type="text" name="password" value="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            require_once 'Connect.php';
            if (isset($_POST['username']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password'])){
                $name = $_POST['username'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $pwd = $_POST['password'];
                insertUser($name, $phone, $email, $pwd);
            }
        ?>
    </body>
</html>
