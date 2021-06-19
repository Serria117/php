<h3>Tính trừu tượng và Abstract Class</h3>
<?php
    abstract class person{
        protected $firstName;
        protected $lastName;
        public function setFirstName($name){
            $this->firstName = $name;
        }
        public function setLastName($name){
            $this->lastName = $name;
        }
        public function getFullName(){
            return $this->firstName." ".$this->lastName;
        }
        //Phương thức trừu tượng: lớp kế thừa sẽ phải định nghĩa phương thức này
        abstract public function displayInfo();
    }
    class student extends person{
        private $class;
        public function setClass($className){
            $this->class = $className;
        }
        public function getClass(){
            return $this->class;
        }
        public function displayInfo(){
            echo 'Name: '.$this->getFullName().'<br>'.
                 'Class: '.$this->getClass().'<br>';
        }
    }
    $student1 = new student();
    $student1->setFirstName("Thanh Ha");
    $student1->setLastName("Dao");
    $student1->setClass("C2011L");

    echo "Student info:<br>";

    $student1->displayInfo();
?>