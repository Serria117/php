<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Quản lý sinh viên</title>
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
                text-align: left;
            }
        </style>
    </head>
    <body>
        <?php
        require 'connection.php';
        $qlsv = new student;
        $qlsv->connectInfo();
        ?>
        <div class="container">
            <h2>Quản lý sinh viên</h2>
            <h3>Thêm mới:</h3>
            <form class="" action="" method="post">
                <table>
                    <tr class="reg">
                        <td>Họ và tên:</td>
                        <td>
                            <input type="text" name="name" value="">
                        </td>
                     </tr>
                     <tr class="reg">
                         <td>Điện thoại:</td>
                         <td>
                             <input type="text" name="phone" value="">
                         </td>
                     </tr>
                     <tr class="reg">
                         <td>Email:</td>
                         <td>
                             <input type="text" name="email" value="">
                         </td>
                     </tr>
                     <tr class="reg">
                         <td>Mã lớp: </td>
                         <td>
                             <select class="" name="classID">
                                 <?php
                                    $sql = "SELECT `classId` FROM class";
                                    $qlsv->select($sql);
                                    if ($qlsv->result->num_rows>0) {
                                        while($row = $qlsv->result->fetch_assoc()){
                                            echo ("<option value=\"".$row['classId']."\">".$row['classId']."</option>");
                                        }
                                    }
                                  ?>
                             </select>
                         </td>
                     </tr>
                     <tr class="reg">
                         <td colspan="2" style="text-align: center;">
                             <input type="submit" name="submit" value="Thêm sinh viên">
                             <input type="submit" name="display" value="Danh sách sinh viên">
                         </td>
                     </tr>
                 </table>
             </form>
             <?php
             date_default_timezone_set("Asia/Ho_Chi_Minh");
            if (isset($_POST['submit'])) {
                // force user to enter all required fields:
                if(empty($_POST['name']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['classID'] )){
                    die ("You must enter all required field.");
                }
                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $class = $_POST['classID'];
                //update sinh viên:
                $sql = "INSERT INTO sinhvien (studentID, studentName, Phone, Email, classID) VALUES (NULL, '$name', '$phone', '$email', '$class')";
                $qlsv->update($sql);
                //log:
                $fl = fopen("logsql.txt", "a");
                $log = "The query '".$sql."' has been executed at: " .date("H:i:sa -- d/m/Y")."\n";
                fwrite($fl,$log);
                fclose($fl);
                //update sĩ số:
                $sql = "UPDATE `class` SET `classNum` = (SELECT COUNT(`classID`) FROM `sinhvien` WHERE `classID` = '$class') WHERE `class`.`classID` = '$class'";
                $qlsv->update($sql);
                //Hiển thị danh sách sinh viên:
                $sql_sel = "SELECT `studentID`, `studentName`, `Phone`, `Email`, `className` FROM `sinhvien` INNER JOIN `class` where sinhvien.classID = class.classID";
                $qlsv->select($sql_sel);
                $qlsv->display();
            }
            if (isset($_POST['display'])) {
                $sql_sel = "SELECT `studentID`, `studentName`, `Phone`, `Email`, `className` FROM `sinhvien` INNER JOIN `class` where sinhvien.classID = class.classID";
                $qlsv->select($sql_sel);
                $qlsv->display();
            }
            ?>

         </div>
    </body>
    <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>
