<h1>LAB2:</h1>
<?php
    $arr1 = array(10,192,4,6,2,7,98,298,381);
    echo "Tổng array = ".$sum = array_sum($arr1).'<br>';
    echo "Số phần tử = ".$count = count($arr1).'<br>';
    
    echo '<br>Danh sách phần tử:<br>';
    $i = 0;
    foreach ($arr1 as $element) {
        echo "<li>Phần tử [$i] = ".$element.'</li>';
        $i++;
    }

    echo '<br>Sắp xếp các phần tử bằng hàm sort(): <br>';
    sort($arr1);
    $i = 0;
    foreach ($arr1 as $element) {
        echo "<li>Phần tử [$i] = ".$element.'</li>';
        $i++;
    }

    echo '<br>Đảo ngược vị trí mảng đã sắp xếp: <br>';
    $i = 0;
    foreach (array_reverse($arr1) as $element) {
        echo "<li>Phần tử [$i] = ".$element.'</li>';
        $i++;
    }
    //Hàm MD5: mã hóa dữ liệu:
    $data = "password";
    print("<br>Mã hóa MD5 của chuỗi '$data': ".md5($data));

    //Hàm strlen(string): tính độ dài chuỗi:
    $data2 = 'Cộng hòa xã hội chủ nghĩa Việt Nam';
    echo "<br>'Cộng hòa xã hội chủ nghĩa Việt Nam' có độ dài: ".strlen($data2);

    //Hàm substr(string,begin,end): lấy chuỗi trong chuỗi:
    echo '<br>substr(\'Cộng Hòa xã hội chủ nghĩa Việt Nam\',0,12) = '.substr($data2,0,12);

    //Hàm str_replace(old sub string, new sub string, string): thay thế 1 chuỗi con bằng 1 chuỗi con khác trong 1 chuỗi
    echo '<br>Replace \'Việt Nam\' by \'Hoa Kỳ\' in \'Cộng hòa xã hội chủ nghĩa Việt Nam\': '.str_replace('Việt Nam','Hoa Kỳ',$data2);
    print("<br>");
    //Hàm isset kiểm tra xem 1 biến đã được khởi tạo hay chưa
    if (isset($data0)){
        echo '<br>Variable $data2 initialized, value = '.$data0;
    }else echo '<br>Variable not exist';

    //hàm empty() kiểm tra xem 1 biến có chứa giá trị hay không
    if (empty($data2)){
        echo '<br>Variable is empty';
    }else echo '<br>variable is not empty, value = '.$data2;
    echo "<br>";
    phpinfo();
?>