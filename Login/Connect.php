<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";
function getConnect () {
    global $servername ; // = "localhost";
    global $username  ; //= "root";
    global  $password ;// = "";
    global  $dbname ;//= "mydata";
    $connect = new mysqli($servername,$username,$password,$dbname) ;
    if(!$connect->connect_error) {
        return $connect;
    } else  {
        return NULL;
    }
}

function insertUser ($name, $phone, $email, $pass) {
    $connect = getConnect();
    if($connect!=NULL) {
        $sqlInsert = "INSERT into User12 (userName, userPhone, userEmail, userPass)  values (";
        $sqlInsert = $sqlInsert .   "'$name', '$phone', '$email', '$pass')";
        $kq = $connect->query($sqlInsert) ;
    return $kq;
    }
    $connect->close();
}

function getLogin ($phone, $pass) {
    $connect = getConnect();
    if($connect!=NULL) {
        $sqlSelect = "SELECT `userPhone`, `userPass` from `User12` where  `userPhone` = $phone and userPass = $pass";
        $kq = $connect->query($sqlSelect) ;
        return $kq;
    }
}
?>
