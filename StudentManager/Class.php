<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý lớp học</title>
        <style media="screen">
            *{
                font-family: sans-serif;
            }
            .container{
                margin: 0 auto;
                width: 60%;
                text-align: center;
                background-color: ghostwhiteray;
            }
            table{
                margin: 0 auto;
                border-collapse: collapse;
            }
            .display{
                padding: 7px 30px 7px 30px;
            }
            th{
                background-color: #235ca1;
                color: white;
            }
            tr:nth-child(odd):not(.reg){
                background-color: #ededed;
            }
            .reg{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <?php
            require 'connection.php';
            $qllop = new classRoom;
            $qllop->connectInfo()
        ?>
        <div class="container">
            <h2>Quản lý lớp học</h2>

            <form class="" action="" method="post">
                <table>
                    <tr class="reg">
                        <td>ID lớp:</td>
                        <td>
                            <input type="text" name="classID" value="">
                        </td>
                    </tr>
                    <tr class="reg">
                        <td>Tên lớp:</td>
                        <td>
                            <input type="text" name="className" value="">
                        </td>
                    </tr>
                    <tr class="reg">
                        <td colspan="2">
                            <input type="submit" name="submit" value="Thêm mới lớp học">
                            <input type="submit" name="display" value="Danh sách lớp học">
                        </td>
                    </tr>
                </table>
            </form>
            <i>*Sĩ số tự cập nhật khi thêm mới sinh viên vào lớp</i><br>
        <?php
            function display(){

            }
            if (isset($_POST['submit']) && !empty($_POST['classID']) && !empty($_POST['className'])){
                $classID = $_POST['classID'];
                $className = $_POST['className'];
                $sql = "INSERT INTO `class` (`classID`, `className`) VALUES ('$classID', '$className')";
                $qllop->update($sql);
                echo "Data input successfully. <br>";
                $sql = "SELECT * FROM `class`";
                $qllop->select($sql);
                $qllop->display();
            }

            if (isset($_POST['display'])) {
                $sql = "SELECT * FROM `class`";
                $qllop->select($sql);
                $qllop->display();
            }
        $qllop->closeConnect();
        ?>
    </div>

    </body>
    <script>
      //Không cho phép resubmit form khi người dùng refresh page (F5)
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>
