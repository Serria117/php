<h2>PHP OOP - Class and Object</h2>
<?php
    class player{
        public $name;
        public $birthDate;
        private $power;
        private $speed;
        private $skill;
        function run(){}
        function shoot(){}
        function info(){
            echo '<b>Player info:</b><br>';
            echo "Name: ".$this->name.'<br>';
            echo "Birth Date: ".$this->birthDate.'<br>';
            echo "Power: ".$this->power.'<br>';
            echo "Speed: ".$this->speed.'<br>';
            echo "Skill: ".$this->skill.'<br>';
            echo "________________________________<br>";
        }
        public function __construct($name,$birthDate,$power,$speed,$skill){
            $this->name = $name;
            $this->birthDate = $birthDate;
            $this->power = $power;
            $this->speed = $speed;
            $this->skill = $skill;
        }
    }

    $player1 = new player('Ronaldo','1986-02-05',95,98,80);
    $player2 = new player('Messi','1987-06-24',90,85,80);
    $player3 = new player('Neymar','1992-02-05',85,80,75);

    $player1->info();
    $player2->info();
    $player3->info();

?>