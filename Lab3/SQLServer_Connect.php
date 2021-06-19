<h2>Connect to SQL Server Database</h2>
<?php
    
    $serverName = "DESKTOP-BIAQ9BR\\APTECH"; //Tên server

    //array chứa thông tin đăng nhập vào database
    $connArray = array(
        "Database" => "QLSinhVien2",
        "UID" => "sa",
        "PWD" => "H@250687"
    ); 

    $conn = sqlsrv_connect($serverName,$connArray) or die("Không thể kết nối tới DB"); //Biến kết nối tới DB
    if($conn){
        echo "Connection established. <br> ";
        echo 'Database name: '.$connArray['Database']. '<br>';
        echo  'Server name: ' .$serverName .'<br><br>';
    }else 'Connection failed';

    $queryString = "SELECT * FROM SinhVien"; //String chứa câu lệnh querry

    $queryComm = sqlsrv_query($conn, $queryString);  //thực hiện lệnh query

    //Lấy kết quả tử câu lệnh query
    if($queryComm === false){
        die("Cannot execute query.");
    }else {
        while($row=sqlsrv_fetch_array($queryComm)){
            echo $row['MaSV']." -- ".$row['TenSV']." -- ".$row['NgaySinh']->format("y/m/d")."<br>";
        }
    }
?>