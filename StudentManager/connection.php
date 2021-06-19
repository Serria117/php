<?php
class data{
    private $serverName = 'localhost';
    private $userName = 'root';
    private $pass = '';
    private $database = 'qlsinhvien2';
    private $conn = null;
    public $result = null;

    public function connect(){
        $this->conn = new mysqli($this->serverName, $this->userName, $this->pass, $this->database);
    }
    public function connectInfo(){
        $this->connect();
        if($this->conn->connect_error){
            die('connection failed.'.$this->conn->connect_error.'<br>');
        }else {
            echo "Connection successfully established. <br>";
        }
    }
    public function update($sql){
        $this->connect();
        $this->conn->query($sql);
    }
    public function select($sql){
        $this->connect();
        $this->result = $this->conn->query($sql);
    }
    public function closeConnect(){
        $this->conn->close();
    }
}
class classRoom extends data{
    public function display(){
        if ($this->result->num_rows>0) {
            echo ("<br>
                <table ><caption><b>Danh sách lớp học</b></caption><tr>
                <th class=\"display\">Mã lớp</th>
                <th class=\"display\">Tên lớp</th>
                <th class=\"display\">Sĩ số</th></tr>
            ");
            while($row = $this->result->fetch_assoc()){
                echo ("
                    <tr>
                    <td class=\"display\">".$row['classID']."</td>
                    <td class=\"display\">".$row['className']."</td>
                    <td class=\"display\">".$row['classNum']."</td>
                    </tr>
                ");
            }echo "</table>";
        }
    }
}

class student extends data{
    public function display(){
        if ($this->result->num_rows>0) {
            echo ("<br>
                <table ><caption><b>Danh sách sinh viên</b></caption><tr>
                <th class=\"display\">Mã sinh viên</th>
                <th class=\"display\">Tên sinh viên</th>
                <th class=\"display\">Điện thoại</th>
                <th class=\"display\">Email</th>
                <th class=\"display\">Lớp</th>
                </tr>
            ");
            while($row = $this->result->fetch_assoc()){
                echo ("
                    <tr>
                    <td class=\"display\">".$row['studentID']."</td>
                    <td class=\"display\">".$row['studentName']."</td>
                    <td class=\"display\">".$row['Phone']."</td>
                    <td class=\"display\">".$row['Email']."</td>
                    <td class=\"display\">".$row['className']."</td>
                    </tr>
                ");
            }echo "</table>";
        }
    }
}
?>
