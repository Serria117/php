<?php
    function phepchia($a, $b){
        if($b===0){
            throw new Exception("Không thể chia cho 0."); //Khai báo 1 ngoại lệ có thể dẫn đến sự cố
        }
        $x = $a/$b;
        return $x;
    }

    //Cấu trúc try - catch
    try {
        echo phepchia(1,4); //code thực hiện và hiển thị kết quả nếu không xảy ra ngoại lệ
    }
    catch (Exception $m) {
        echo $m->getMessage(); //Nếu ngoại lễ xảy ra sẽ thực hiện code trong catch {}
    }
    finally {
        if(isset($m)){
            echo "<br>Program completed with error(s).";
        }else {
            echo "<br>Program completed without error.";
        }
        
    }
?>