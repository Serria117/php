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
        echo phepchia(1,4); //code trông khối try {} thực hiện và trả về kết quả nếu không xảy ra ngoại lệ
    }
    catch (Exception $m) {
        echo $m->getMessage(); //Nếu ngoại lệ xảy ra sẽ thực hiện code trong khối catch {}
    }
    finally {
        if(isset($m)){
            echo "<br>Program completed with error(s).";
        }else {
            echo "<br>Program completed without error.";
        }
    }
?>

<?php
    // Sử dụng try-catch và exception để kiểm tra kết nối mySQL
    function dbconnect($host, $user, $pass, $db){
        mysqli_report(MYSQLI_REPORT_ALL);
        try {
            $conn = new mysqli($host, $user, $pass, $db);
            echo "Connect success.";
            return $conn;
        }catch (Exception $e){
            echo "Connection failed. Reason: ".$e->getMessage();
        }
    }
?>