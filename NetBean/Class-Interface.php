<?php

/*
 * Class là các khuôn mẫu chứa các thuộc tính và phương thức cho một đối tượng (object);
 * Interface là bộ khung chỉ chứa các phương thức và không mang code thực thi,
có tác dụng hướng dẫn lập trình viên tuân thủ việc sử dụng các phương thức khi triển khai (implement) class từ 1 interface;
tức là khi 1 class được khởi tạo và implement 1 interface thì nó phải viết lại tất cả các phương thức của interface.
 * Các class chỉ có thể kế thừa 1 class nhưng có thể triển khai nhiều interface
*/
interface player{
    public function move();
    public function run();
    public function shoot();
}

//interface playerTier1 và playerTier2 kế thừa các phương thức của interface player đồng thời khai báo 2 phương thức riêng
interface playerTier1 extends player{
    public function attack1();
}

interface playerTier2 extends player{
    public function attack2();
}
//class soldier1 triển khai các phương thức của interface playerTier1, bao gồm cả các phương thực playerTier1 kế thừa từ interface player
class soldier1 implements playerTier1{

    public function attack1() {

    }

    public function move() {

    }

    public function run() {

    }

    public function shoot() {

    }

}

//class soldier2 triển khai các phương thức của cả 2 interface playerTier1 và playerTier2:
class soldier2 implements playerTier1, playerTier2{

    public function attack1() {

    }

    public function attack2() {

    }

    public function move() {

    }

    public function run() {

    }

    public function shoot() {

    }

}
?>
