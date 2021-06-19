<h2>Lab3:</h2>
<?php 
    $x = "";
    if (isset($x)){
        echo 'Biến $x đã được khởi tạo<br>';
    }else echo 'Biến chưa được khởi tạo<br>';

    if(empty($x)){
        echo 'Biến $x có giá trị rỗng<br>';
    }else echo 'Biến $x không mang giá trị rỗng<br>';

    $a = array('Ha','Thanh','Thai','Khanh','Quan');
    
    if(is_array($a)){
        echo '$a là 1 array<br>';
    }else echo '$a không phải array<br>';

    $testStr = 'HELLO WORLD';
    if(is_string($testStr)){
        echo "<i>'$testStr'</i> là 1 string có độ dài: ".strlen($testStr).' ký tự, và có: '.str_word_count($testStr).' từ.<br>';
    }else echo '$testStr không phải string<br>';

    $str2arr = str_split($testStr,1);
    echo "Converstr_split($testStr,1)t string thành array:<br>";
    foreach ($str2arr as $element) {
        echo "[$element] ";
    }
    echo "<br>";
    print_r(str_split($testStr,1));
    echo "<br>";
    $testStr2 = str_replace('HELLO','GOODBYE',$testStr);
    echo "Replace 'Hello' with 'Goodbye': ".$testStr2."<br>";
    $x = 10;
    $y = 3.14;
    $z = 134;

    if(is_int($x)){
        echo "$x là số INT<br>";
    }else echo "$x không phải số INT<br>";

    if(is_int($y)){
        echo "$y là số INT<br>";
    }else echo "$y không phải số INT<br>";

    if(is_float($y)){
        echo "$y là số FLOAT<br>";
    }else echo "$y không phải số FLOAT<br>";
    
?>
