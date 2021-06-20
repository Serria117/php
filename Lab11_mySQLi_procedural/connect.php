<?php
#Kết nối:
$servername = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'qlsinhvien';
$conn = mysqli_connect($servername, $user, $pass);
if (!$conn) {
    die('Connection failed');
}else "Connection success";
#Select database:
mysqli_select_db($conn, $dbname);
#Chạy lệnh sql:
$sql = "Select * from student";
$result = mysqli_query($conn, $sql);
$numrow = mysqli_num_rows($result);
if ($numrow>0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "student name: ".$row['name']." -- email: ".$row['email']." -- phone: ".$row['phone']."<br>";
    }
}
#Đóng kết nối:
mysqli_close($conn);
?>
