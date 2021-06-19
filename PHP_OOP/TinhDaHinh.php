<?php
    //Tính đa hình là sự đa dạng của mỗi hành động (phương thức) cụ thể ở mỗi đối tượng khác nhau
    class animal{
        //Định nghĩa hàm (phương thức) 'eat' trong lớp animal
        public function eat(){
            echo 'animal eat their food';
        }
    }
    //Khai báo lớp 'cat' là lớp con của animal:
    class cat extends animal{
        //Viết lại phương thức 'eat' trong lớp con,
        public function eat(){
            echo 'cat eat fish';
        }
    }
    class dog extends animal{
        //nếu không viết lại thì phương thức 'eat' của lớp con sẽ kế thừa từ lớp cha
    }
    $cat1 = new cat;
    $dog1 = new dog;
    echo $cat1->eat();
    echo '<br>';
    echo $dog1->eat();
?>