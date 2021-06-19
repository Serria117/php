<?php
    require 'welcome.html';
    include '_menu.php';
    echo "<h2>OOP PHP</h2>";
    class Student{          //class là 1 'kiểu', 'loại' đối tượng
        public $name;       //biến (variable) trong class là các thuộc tính (properties) của đối tượng
        public $age;
        public $email;
        public $toan;
        public $ly;
        public $hoa;
        public function diemTB(){  //hàm (function) trong class được gọi là các phương thức (method) mà đối tượng có thể thi hành
            $dtb = ($this->toan + $this->ly + $this->hoa)/3;
            echo "Điểm TB: ".$dtb;
        }
        public function info($name,$age,$email){
            $this->name = $name;
            $this->age = $age;
            $this->email = $email;
        }
        public function diem($toan,$ly,$hoa){
            $this->toan = $toan;
            $this->ly = $ly;
            $this->hoa = $hoa;
        }
        function displayInfo(){
            echo "<br><b>Thông tin sinh viên:</b><br>";
            echo "Họ tên: ".$this->name."<br>Tuổi: ".$this->age."<br>Email: ".$this->email."<br>";
        }
        function __contruct($name,$age,$email,$toan,$ly,$hoa){
            $this->name = $name;
            $this->age = $age;
            $this->email = $email;
            $this->toan = $toan;
            $this->ly = $ly;
            $this->hoa = $hoa;
        }
    }


    $sv1 = new Student();        //khai báo 1 object thuộc class Student bằng từ khóa 'new'
    $sv1->info('Thanh Ha',33,'ha.dt@aptech.edu.vn');     //thi hành phương thức (method)
    $sv1->diem(9,8,9);

    //$sv1->displayInfo();
    //$sv1->diemTB();

    //$sv2 = new Student();
    //$sv2->info('Minh Thái',20,'thai@gmail.com');

    //constructor (hàm khởi tạo):
    $sv3 = new Student('ABC',21,'abc@xyz.com',9,7,7);
    $sv3->displayInfo();
?>