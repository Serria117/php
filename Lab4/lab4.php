<?php
//Hình chữ nhật
for ($i = 0;$i<=10;$i++){
    echo '********************<br>';
}

echo '<br><br>';

//Hình tam giác
for($i=20;$i>0;$i--){
    for ($j=0;$j<$i;$j++){
        echo '*';
    }
    echo "<br>";
}

echo '<br><br>';

for ($i=0;$i<=15;$i++){
    for ($j=0;$j<15;$j++){
        if($j<$i){
            echo '*';
        }
    }
    echo '<br>';
}
for($i=14;$i>0;$i--){
    for ($j=0;$j<$i;$j++){
        echo '*';
    }
    echo "<br>";
}


for($i=10;$i>=0;$i--){
    for($j=0;$j<20-$i;$j++){
        if($i>=$j){
            echo '&nbsp;';
        }else echo '*';
    }
    echo '<br>';
}
?>