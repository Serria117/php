<?php
    function connect(){
        $conn = new mysqli('localhost', 'root', '', 'qlsv');
         if($conn->connect_error){
            return null;
        }else return $conn;
    }

    function view(){
        $conn = connect();
        $sql = "SELECT * FROM sinhvien";
        $result = $conn->query($sql);
        if($result->num_rows>0){
            echo "<table>
                <tr><th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th></tr>
            ";
            while($row = $result->fetch_assoc()){
                echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td></tr>";
            }
        }
    }
?>
