<?php
    session_start(); include 'connect.php';
    if (isset($_SESSION['userName'])) {
        echo "Welcome: ".$_SESSION['userName']."<br>";
        echo "<br><a href=\"logout.php\">Log out</a>";
    }else echo "Session end";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <style media="screen">
            table{
                border-collapse: collapse;
                padding: 20px;
            }
            td:not(.form){
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h3>Register new student</h3>
            <form class="" action="" method="post">
                <table>
                    <tr>
                        <td class="form">Student name:</td>
                        <td class="form">
                            <input type="text" name="studentName" value="">
                        </td>
                    </tr>
                    <tr>
                        <td class="form">Email:</td>
                        <td class="form">
                            <input type="text" name="email" value="">
                        </td>
                    </tr>
                    <tr>
                        <td class="form">Phone:</td>
                        <td class="form">
                            <input type="text" name="phone" value="">
                        </td>
                    </tr>
                    <tr>
                        <td class="form">Class: </td>
                        <td class="form">
                            <select class="className" name="class">
                                <?php
                                    $conn = connect();
                                    $sql = "SELECT className from class";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows>0) {
                                        while($row = $result->fetch_assoc()){
                                            echo "<option>".$row['className']."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="register" value="Register">
                            <input type="submit" name="viewStudent" value="Display student">
                            <input type="submit" name="viewClass" value="Display class">
                        </td>
                    </tr>
                </table>
            </form>
            <?php
                if (isset($_POST['register'])) {
                    if (!isset($_SESSION['userType'])|| $_SESSION['userType'] != 'admin') {
                        die ("Your account doesn't have permission to access database. Click <a href=\"login.php\">here</a> to login with admin account.");
                    }
                    if (empty($_POST['studentName']) || empty($_POST['email']) || empty($_POST['phone'])) {
                        die ("All fields are required.");
                    }
                    $name = $_POST['studentName'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $class = $_POST['class'];
                    register($name, $email, $phone, $class);
                    echo "New student registered successfully.";
                }

                if (isset($_POST['viewStudent'])) {
                    viewSutdent();
                }
                if (isset($_POST['viewClass'])) {
                    viewClass();
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
