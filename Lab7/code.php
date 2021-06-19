<?php
    include 'top.html';
    class giaiPT{
        private $a;
        private $b;
        private $c;
        public function setA($setA){
            $this->a = $setA;
        }
        public function setB($setB){
            $this->b = $setB;
        }
        public function setC($setC){
            $this->c = $setC;
        }
        public function delta(){
            $delta = pow($this->b,2)-(4*$this->a*$this->c);
            return $delta;
        }
        public function calc(){
            if(strlen($this->a)==0 || strlen($this->b)==0 || strlen($this->c)==0){
                die ("Giá trị a b c không được để trống.");
            }
            if(is_numeric($this->a)==false || is_numeric($this->b)==false ||is_numeric($this->c)==false){
                die("Phải nhập giá trị a b c là số thực.");
            }
            if($this->a==0){
                die ('Phương trình bậc 2 phải có hệ số a <> 0.');
            }
            if($this->delta()<0){
                echo 'a = '. $this->a. ', b = '.$this->b. ', c = '.$this->c. '<br>';
                echo 'delta ='. $this->delta(). '<br>';
                echo 'Phương trình vô nghiệm<br>';
            }
            if($this->delta()==0){
                echo 'a = '. $this->a. ', b = '.$this->b. ', c = '.$this->c. '<br>';
                echo 'delta ='. $this->delta(). '<br>';
                $x1 = (0-$this->b)/(2*$this->a);
                echo 'x1 = x2 = '.$x1. '<br>';
            }
            if($this->delta()>0){
                echo 'a = '. $this->a. ', b = '.$this->b. ', c = '.$this->c. '<br>';
                echo 'delta ='. $this->delta(). '<br>';
                $x1 = (0-$this->b+sqrt($this->delta()))/(2*$this->a);
                $x2 = (0-$this->b-sqrt($this->delta()))/(2*$this->a);
                echo 'x1 = '.$x1. '<br>';
                echo 'x2 = '.$x2. '<br>';
            }
        }
    }
    $pt = new giaiPT;
    $calc = filter_input(INPUT_POST,'calc');
    $a = filter_input(INPUT_POST,'a');
    $b = filter_input(INPUT_POST,'b');
    $c = filter_input(INPUT_POST,'c');

     if(isset($calc)){
         $pt->setA($a);
         $pt->setB($b);
         $pt->setC($c);
         $pt->calc();
     }
     include 'bottom.html';
?>