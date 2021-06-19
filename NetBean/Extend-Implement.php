<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            *{
                font-family: sans-serif;
            }
        </style>
    </head>
    <body>
        <?php
        /*
         Phân biệt extends và interface
        - từ khóa extends dùng để mở rộng 1 class hoặc 1 interface,
        các class hoặc interface extend từ các class hoặc interface sẽ kế thừa các thuộc tính và phương thức;
        - class chỉ có thể extend từ class và interface chỉ có thể extend từ interface;
        - từ khóa implements dùng để triển khai các hàm trong interface sang các class;
        - các class chỉ có thể implement từ 1 hoặc nhiều interface, các interface không thể implement từ 1 interface khác
        - khi 1 class được extend từ 1 class thì nó được kế thừa các phương thức của class cha, nếu có phương thức trùng tên
        với phương thức của class cha được viết lại thì nó sẽ ghi đè phương thức đó ở class con.
        - Khi 1 class implement 1 hoặc nhiều interface thì nó phải viết lại tất cả các phương thức của các interface,
        do bản thân các phương thức trong interface là các hàm không mang code thực thi.
         */

        //Khai báo interface với các hàm trừu tượng không mang code thực thi
        interface person {
            public function learn();
            public function work();
            public function eat();
            public function sleep();
        }
        //khai báo class student implement từ interface person,
        //class student phải triển khai viết lại toàn bộ các phương thức trong interface, nếu không viết đủ sẽ báo lỗi
        class student implements person{

            public function eat() {

            }

            public function learn() {
                echo 'student is learning<br>';
            }

            public function sleep() {

            }

            public function work() {

            }

        }
        //Khai báo class ITStudent kế thừa class student,
        //phương thức learn được viết lại trong class này sẽ ghi đè phương thức của class cha
        class ITStudent extends student{
            public function learn() {
                echo 'IT student learn coding<br>';
            }

        }

        ?>
    </body>
</html>
<?php
class giaiPhuongTrinh{
    private $a;
    private $b;
    private $c;
    public $x1;
    public $x2;

    public function setA($a){}
    public function setB($b){}
    public function setC($c){}
    public function tinhDelta(){}
    public function giaiPT(){}

}
$gpt = new giaiPhuongTrinh;
if(isset($_POST['submit'])){
    $gpt->setA($_POST['a']);
    $gpt->setB($_POST['b']);
    $gpt->setC($_POST['c']);
    $gpt->giaiPT();
}

 ?>
