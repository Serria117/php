<?php
    include 'top.html';
    class giaiPT2{
        private $a;
        private $b;
        private $c;
        public $x1;
        public $x2;
        public $comment;
        //Function set và validate hệ số a, b, c
        public function setA($set){
            if(!isset($set) || !is_numeric($set)){
                die("Hệ số phải là số thực.<br>");
            }else $this->a = $set;
        }
        public function setB($set){
            if(!isset($set) || !is_numeric($set)){
                die("Hệ số phải là số thực.<br>");
            }else $this->b = $set;
        }
        public function setC($set){
            if(!isset($set) || !is_numeric($set)){
                die("Hệ số phải là số thực.<br>");
            }else $this->c = $set;
        }
        //function tính delta:
        public function delta(){
            if(isset($this->a) && isset($this->b) && isset($this->c)){
                $delta = pow($this->b,2)-(4*$this->a*$this->c);
                return $delta;
            }
        }
        public function calc(){
            if($this->a == 0){
                die("Phương trình bậc 2 phải có hệ số a <>0");
            }
            $this->delta();
            if($this->delta() < 0){
                $this->comment = "Phương trình vô nghiệm.";
                $this->x1 = "vô nghiệm";
                $this->x2 = "vô nghiệm";
                echo "Delta = ".$this->delta()."<br>";
                echo "$this->comment <br>";
            }
            if($this->delta() == 0){
                $this->comment = "Phương trình có nghiệm kép.";
                $this->x1 = (-$this->b)/(2*$this->a);
                $this->x2 = $this->x1;
                echo "Delta = ".$this->delta()."<br>";
                echo "$this->comment x<sub>1</sub> = x<sub>2</sub> = $this->x1 <br>";
            }
            if($this->delta() >0 ){
                $this->comment = "Phương trình có 2 nghiệm.";
                $this->x1 = (-$this->b+sqrt($this->delta()))/(2*$this->a);
                $this->x2 = (-$this->b-sqrt($this->delta()))/(2*$this->a);
                echo "Delta = ".$this->delta()."<br>";
                echo "$this->comment <br>";
                echo "x<sub>1</sub> = $this->x1<br>";
                echo "x<sub>2</sub> = $this->x2";
            }
        }
    }

    class database{
        private $server = 'localhost';
        private $userName = 'root';
        private $pwd = '';
        private $database = 'phuongtrinh2';
        private $conn = null;
        private $result = null;

        public function connect(){
            $this->conn = new mysqli($this->server,$this->userName,$this->pwd,$this->database);
            if($this->conn->connect_error){
                die("Connection failed. ".$this->conn->connect_error);
            }
        }

        public function select($sql){
            $this->connect();
            $this->result = $this->conn->query($sql);
            if($this->result->num_rows>0){
                echo (
                    "<hr><h3>Kết quả</h3>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>Số a</th>
                            <th>Số b</th>
                            <th>Số c</th>
                            <th>Delta</th>
                            <th>x<sub>1</sub></th>
                            <th>x<sub>2</sub></th>
                            <th>Comment</th>
                        </tr>"
                );
                while($row = $this->result->fetch_assoc()){
                    echo (
                        "<tr>
                            <td>".$row['ID']."</td>
                            <td>".$row['soA']."</td>
                            <td>".$row['soB']."</td>
                            <td>".$row['soC']."</td>
                            <td>".$row['delta']."</td>
                            <td>".$row['x1']."</td>
                            <td>".$row['x2']."</td>
                            <td>".$row['comment']."</td>
                        </tr>"
                    );
                }
                echo "</table>";
            }
        }
        public function insert($sql){
            $this->connect();
            $this->conn->query($sql);
        }

        public function closeConn(){
            $this->conn->close();
        }
    }
    /*Run*/
    $phuongTrinh = new giaiPT2;
    $database1 = new database;
    if(isset($_POST['submit'])){
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];

        /**Giải phương trình */
        $phuongTrinh->setA($a);
        $phuongTrinh->setB($b);
        $phuongTrinh->setC($c);
        $phuongTrinh->calc();

        /**Lưu kết quả vào database */
        $delta = $phuongTrinh->delta();
        $x1 = $phuongTrinh->x1;
        $x2 = $phuongTrinh->x2;
        $comment = $phuongTrinh->comment;
        $sql_ins = "INSERT INTO `ketqua1` (`ID`, `soA`, `soB`, `soC`, `delta`, `x1`, `x2`, `comment`) VALUES (NULL,'$a','$b','$c','$delta','$x1','$x2','$comment')";
        $database1->insert($sql_ins);

        /*Hiển thị kết quả*/
        $sql_sel = "SELECT * FROM ketqua1";
        $database1->select($sql_sel);
        $database1->closeConn();
    }
    /*Button hiển thị kết quả*/
    if(isset($_POST['display'])){
        $sql_sel = "SELECT * FROM ketqua1";
        $database1->select($sql_sel);
        $database1->closeConn();
    }
    /*Button clear toàn bộ kết quả (truncate table)*/
    if (isset($_POST['reset'])){
        $sql_sel = "TRUNCATE TABLE ketqua1";
        $database1->insert($sql_sel);
        $database1->closeConn();
    }
    include 'bottom.html';
?>
