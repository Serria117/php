<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Learning</title>
</head>

<body>
    <?php
            echo "<h1 style='color:blueviolet'>Hello world</h1>";
        ?>

    <?php
            echo "<h1 style='color:blue'>Welcome to PHP </h1>";
        ?>

    <?php
            $first = 'Dao ';
            $last = 'Thanh Ha';
            (INT)$age = 25;
            $fullname = $first.$last;
        ?>

    <?php      
            echo $fullname;
            echo "<br>";
            echo $first.$last;
            echo "<br>";
            echo 'Age: '.$age;
            echo "<br>";
        ?>
    <?php
            if ($age >=20){
                echo ("Đủ điều kiện");
            }
            else{
                echo ("Không đủ điều kiện");
            }
            
        ?>
    <?php
            //Mảng (array):
            echo ("<br><br><b>Mảng một chiều:</b><br>");
            $sinhVien = ['Hiệp', 'Thành', 'Thái', 'Quân'];
            $count = count($sinhVien);
            echo "Số lượng sinh viên: ".$count ."<br>";
            //Vòng lặp for:
            echo "<br><b>Vòng lặp for:</b>";
            for ($i=0;$i<$count;$i++){
                echo ("<br>Tên sinh viên thứ [$i]: ".$sinhVien[$i]);
            };
            
            //Vòng lặp for-each:
            echo "<br><b>Vòng lặp for-each:</b>";
            foreach ($sinhVien as $svName) {
                echo ("<br>Tên sinh viên: ".$svName);
            };

            echo "<br><br><b>Mảng 2 chiều:</b><br>";
            $thongTinSV = array(
                array('Thai',23,'thai@gmail.com'),
                array('Tung',22,'tung@gmail.com'),
                array('Khanh',18,'khanh@gmail.com')
            );

            for ($i=0;$i<3;$i++){
                for ($j=0;$j<3;$j++){
                    echo $thongTinSV[$i][$j]."&nbsp;&nbsp;&nbsp;";
                }
                echo "<br>";
            }
            
            echo "<br><br><b>Mảng key-value:</b><br>";
            $thongTinSV1 = [
                'Name' => 'Thanh Hà',
                'Age' => 20,
                'Email' => 'Ha@gmail.com'
            ];
            
            foreach ($thongTinSV1 as $key => $value) {
                echo $key.": ".$value."<br>";
            };

            $book = [
                'title' => "The Hitchhiker's Guide to the Galaxy",
                'author' => 'Douglas Adams',
                'description' => 'a comedy sci-fi adventure originally based on a BBC radio series'
            ];

            echo "<br><br>";
            echo 'Tên sách: '.$book['title']."<br>";
            echo 'Tác giả: '.$book['author']."<br>";
            echo 'Mô tả: '.$book['description']."<br>";
            
        ?>
</body>

</html>