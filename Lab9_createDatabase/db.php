<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Create database and table</title>
    </head>
    <body>
        <div class="container">
            <form class="" action="" method="post">
                <table>
                    <tr>
                        <td>Database name: </td>
                        <td>
                            <input type="text" name="dbname" value="<?= isset($_POST['dbname']) ? $_POST['dbname'] : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input style="width: 120px;" type="submit" name="createDB" value="Create database">
                            <input style="width: 120px;" type="submit" name="createTable" value="Create table">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
        $svName = 'localhost';
        $userName = 'root';
        $pwd = '';
        $dbName = null;
        $conn = new mysqli($svName, $userName, $pwd, $dbName);
        if ($conn->connect_error) {
            echo "can not connect to server.";
            exit();
        }else {
            //create database:
            if (isset($_POST['createDB']) && isset($_POST['dbname'])) {
                $db = $conn->real_escape_string($_POST['dbname']);
                $sql_db = "CREATE DATABASE IF NOT EXISTS ".$db.";";
                if($conn->query($sql_db)){
                    echo "Database \"<i>".$db."</i>\" created successfully.";
                    $dbName = $db;
                    $conn->close();
                }else {
                    echo "Unable to create database.";
                    $conn = null;
                };
            }
            //create table:
            if (isset($_POST['createTable']) && isset($_POST['dbname'])){
                $dbName = $_POST['dbname'];
                $conn->select_db($dbName);
                $sql_tb = "CREATE TABLE sinhvien (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50), email VARCHAR(50), phone VARCHAR(12), pass VARCHAR(100))";
                if ($conn->query($sql_tb)) {
                    echo "Table <i>'sinhvien'</i> created successfully";
                    $conn->close();
                }else {
                    echo "Unable to create table.";
                    $conn = null;
                }
            }
        }
        ?>
    </body>
</html>
