<?php
    class connection{
        private $host = 'localhost';
        private $user = 'root';
        private $db = 'qlsinhvien';
        private $pwd = '';
        private $port = '3306';
        private $conn = null;
        private $result = null;

        public function connectionInfo(){
            $this->connect();
            if($this->conn->connect_error){
                die("");
            }else{
                echo '<b>---Connection established---</b><br>';
                echo 'Server name: '.$this->host.'<br>';
                echo 'Database: '.$this->db.'<br>';
            }
        }
        //Phương thức kết nối
        private function connect(){
            $this->conn = new mysqli($this->host,$this->user,$this->pwd,$this->db,$this->port);
            if($this->conn->connect_error){
                die("Connection failed! ".$this->conn->connect_error);
            }else{
                $this->conn->query('SET NAMES UTF8'); //Để hiện thị tiếng Việt Unicode
            }
        }

        public function closeConnect(){
            $this->conn->close();
        }
        //Phương thức select
        public function select($sql){
            $this->connect();
            $this->result = $this->conn->query($sql);
        }
        //Phương thức lấy kết quả từ truy vấn select
        public function getResult(){
            if($this->result->num_rows>0){   
                echo "<table class=\"result\"><caption>Student's info</caption>
                    <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                     </tr>
                ";
                while($row = $this->result->fetch_assoc()){
                    //convert SQL date format to normal date format:
                    $time = strtotime($row["BIRTHDATE"]);
                    $conv_date = date("d/m/Y",$time);
                    //print result into html table:
                    echo "<tr>
                        <td>".$row["STT"]."</td>
                        <td>".$row["NAME"]."</td>
                        <td>".$conv_date."</td>
                        <td>".$row["EMAIL"]."</td>
                        </tr>
                    ";
                }
                echo "</table>";
            }else echo "Not found. No student's name matched your search.";
            echo '<br>___________________________________________________________________<br>';
        }

        //Phương thức update (insert, update, delete);
        public function update($sql){
            $this->connect();
            $this->conn->query($sql);
        }

        //Phương thức kiểm tra email trùng lặp khi đăng ký mới:
        public function checkEmail($checkEmail){
            $this->connect();
            $checkQuery = "SELECT * FROM student WHERE email = '".$checkEmail."'";
            $this->result = $this->conn->query($checkQuery);
            if($this->result->num_rows > 0){
                return TRUE;
            }
            else return FALSE;
        }
    }
?>