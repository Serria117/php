<?php
    //print 02 lines on screen using 01 echo statement:
    echo ('Tomorrow I&#039;ll learn "PHP" and xampp is installed on c:\xampp\<br> 
    I will have a lot of <$>.');
    echo '<br><br>';

    //print the following rectangle on screen:
    echo '*************<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>';
    echo '*************<br>';

    //let radius = 5, find the circumference and area of the circle
    define('pi',3.14);
    $r = 5;
    $area = pi*$r*$r;
    echo 'area of the circle = '.$area.'<br><br>';

    //On 1st-Jan-2018, I open a bank account of 50,000,000 VND with interest rate = 7.13% for 12 months. How much money do I have after 3 years?
    define('rate',0.0713);
    $money = 50000000;
    $time = 12*3;
    echo "Total interest after 3 years:" .$interest = $money*$time .'<br><br>';

    //temperature now is 12 Celsius degrees, find the Fahrenheit degree?
    $C = 12;
    echo "12 Celcius = ".$F = $C*1.8+32 ." Fahrenheit<br><br>";

    //initiate an array of 7 numbers. Find the sum and the average.
    $arr = array(3,4,7,8,9,13,29);
    echo "The following array was initiated: <br>";
    foreach ($arr as $element) {
        echo $element ." ";
    };
    echo '<br>';
    $avg = array_sum($arr)/count($arr);
    echo 'Average value of the array: ' .$avg;
    echo '<br><br>';

    //write code to swap values of 2 variables
    //$a=5, $b=7 ----> $a=7, $b=5
    $a = 5;
    $b = 7;
    echo "Before swap: a = $a, b = $b <br>";
    $swap = $a;
    $a = $b;
    $b = $swap;
    echo "After swap: a = $a, b = $b <br>";
?>
