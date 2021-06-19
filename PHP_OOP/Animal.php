<?php
    /*abstract class: class trừu tượng, 
    không thể khởi tạo đối tượng mà chỉ có thể được kế thừa bởi class con
    abstract function: hàm trừu tượng, 
    */
    abstract class animal{
        public $name="";
        public $color="";
        public $weight=0;
        abstract function eat();
    }
    /*Khi class con kế thừa 1 abstract class thì không phải khởi tạo lại các
    thuộc tính của abstract class nữa mà nó mặc nhiên được kế thừa => tiết kiệm việc viết code
    Ví dụ: class dog kế thừa của class animal thì các thuộc tính name, color... không cần
    khởi tạo lại
    */
    class dog extends animal{
        function trongNha(){}
    }
?>