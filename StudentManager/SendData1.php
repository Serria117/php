
<?php
function connect(){
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "qlsinhvien";
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn != false && !$conn -> connect_error){
        return $conn;
    }else{
        return null;
    }
}
$conna= connect();
if($conna==null){
    die("Không thể kết nối");
}else{
    echo "<p> kết nối db thành công </p>";
}
?>
<html>
<form action="" method="post">
<p>
    Name
</p>
<input name="name" id='txtName' type="text"/> <br/><br/>
<p>
    Email
</p>
<input name="email" id='txtemail' type="text"/> <br/><br/>
<p>
    Pass
</p>
<input name="pass" id='pass' type="text"/> <br/><br/>

<input name="submit" id='submit' type="submit"/> <br/><br/>

</from>
</html>
<?php
connect();
$mName='';
$mEmail='';
$mPass='';
date_default_timezone_set("Asia/Ho_Chi_Minh");
if(isset ($_POST['submit'])){


    if(isset ($_POST["name"])){
        $mName = $_POST['name'];
        echo "Name: $mName <br/><br/>" ;
        echo "Tên bạn là : ".$mName." <br/><br/>" ;
    }
    if(isset ($_POST["email"])){
        $mEmail = $_POST["email"];
        echo "Email: $mEmail <br/><br/>" ;
        echo "Email bạn đăng kí là : ".$mEmail." <br/><br/>" ;
    }
    if(isset ($_POST["pass"])){
        $mPass = $_POST["pass"];
        echo "đang kí thành công pass" ;
    }
    $sql = "INSERT INTO account (Pass,Name,Email)
    VALUES ('$mPass','$mName','$mEmail')";
    $conna->query($sql);
    $myFile = fopen("log.txt", "a"); //mở file log.txt để thực hiện ghi nối tiếp (append)
    $log = "The query '".$sql."' has been executed at: " .date("H:i:sa -- d/m/Y")."\n";
    fwrite($myFile,$log); //ghi thông tin trong biến $log vào file.
    fclose($myFile); //đóng file.
}

?>
