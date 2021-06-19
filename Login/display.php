<h2>User list</h2>
<?php
include_once 'Connect.php';
$connect = getConnect();
if ($connect!=null) {
    $sqlSelect = "SELECT userName, userPhone, userEmail, userPass from User12";
    $result = $connect->query($sqlSelect);
    if ($result != false && $result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
            echo "<br>User name: ".$row['userName']." -- Phone: ".$row['userPhone']." -- Email: ".$row['userEmail'];
        }
    }
}
?>
