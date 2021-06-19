<?php
    class connectDB{
        private $serverName = 'localhost';
        private $userName = 'root';
        private $pwd = '';
        private $dbName = 'qlsinhvien1';
        private $conn;
        private $result;

        private function connect(){
            $this->conn = new mysqli($this->serverName,$this->userName,$this->pwd,$this->dbName);
            if($this->conn->connect_error){
                die("Connection failed ".$this->conn->connect_error);
            }else{
                echo 'Connection success<br>';
                $this->conn->query('SET NAMES UTF8');
            }
        }
        public function select($sql){
            $this->connect();
            if($this->conn->connect_error){
                die ("");
            }else {
                $this->result = $this->conn->query($sql);
            }
        }
        public function getResult(){
            if($this->result->num_rows>0){
                while($row=$this->result->fetch_assoc()){
                    echo ('<br>'.$row['ID'].' --- '.$row['NAME'].' --- '.$row['EMAIL']);
                }
            }
        }

        public function update($sql){
            $this->connect();
            $this->conn->query($sql);
        }
    }
    /* Start connection */
    $conn_QLSV = new connectDB;
    $sql = "SELECT * FROM student";
    $conn_QLSV->select($sql);
    $conn_QLSV->getResult();   
?>