<?php
$NNT = array();
$TK = array();
$xml = simplexml_load_file("file.xml");
foreach ($xml->HSoKhaiThue->TTinChung->TTinTKhaiThue->TKhaiThue->children() as $child) {
    if($child->count()>0){
        foreach ($child->children() as $subChild) {
            echo $subChild->getName(). ": ".$subChild. "<br>";
    $TK[$subChild->getName()] = $subChild;
        }
    }else{
        echo $child->getName(). ": ".$child. "<br>";
        $TK[$child->getName()] = $child;
    }
}
echo "<br> <b>Người nộp thuế:</b> <br>";
foreach ($xml->HSoKhaiThue->TTinChung->TTinTKhaiThue->NNT->children() as $child) {
    // echo $child->getName(). ": ".$child. "<br>";
    $NNT[$child->getName()] = $child;
}

foreach ($NNT as $key=>$value) {
    if(!empty($value)) {
        echo "$key: $value <br>";
    }
}

echo "<br> <b>Đại lý thuế:</b> <br>";
foreach ($xml->HSoKhaiThue->TTinChung->TTinTKhaiThue->DLyThue->children() as $child) {
    echo $child->getName(). ": ".$child. "<br>";
}
echo "<br> <b>Số liệu tờ khai:</b> <br>";

$data = array();
foreach ($xml->HSoKhaiThue->CTieuTKhaiChinh->children() as $child) {
    if($child->count()>0){
        foreach($child->children() as $subChild){
            // echo "<tr><td>". $subChild->getName().":</td><td>".number_format((INT)$subChild)."</td></tr>";
            $data[$subChild->getName()] = $subChild;
        }
    } else {
        // echo "<tr><td>". $child->getName(). ":</td><td>".number_format((INT)$child)."</td></tr>";
        $data[$child->getName()] = $child;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 5px;
        }
        table{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
        th{
            color: white;
            background-color: blueviolet;
        }
        th, td{
            border: 1px solid black;
            padding: 10px;
        }
        td{
            text-align: left;
        }
        
    </style>
</head>
<body>
<div>
    <?php
    echo "<table><tr>";
    echo "<th>Kỳ kê khai</th>";
    echo "<th> Loại tờ khai </th>";
    echo "<th>Lần nộp</th>";
    foreach ($data as $key=>$value){
        if($key != "tieuMucHachToan"){
            echo "<th>".$key."</th>";
        }
    }
    echo "</tr><tr>";
    echo "<td>".$TK['kyKKhai']."</td>";
    echo "<td>".$TK['loaiTKhai']."</td>";
    echo "<td>".$TK['soLan']."</td>";
    foreach ($data as $key=>$value) {
        if($key != "tieuMucHachToan") {
            echo "<td>".number_format((INT)$value)."</td>";
        }
    }
    echo "</tr></table>";
    ?>
</div>
    
</body>
</html>