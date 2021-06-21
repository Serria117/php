<!-- <form action="" method="post"></form>
thêm lớp học: 
<input type="text" name="Class">
<br/>
thêm giáo viên: 
<input type="text" name="gv">
<br/><br/>
<input type="submit" name="submit">
</form> -->
<?php
$hostname="localhost";
$username="root";
$pass="";
$dbname="App";
$conn= new mysqli($hostname,$username,$pass,$dbname);
if($conn->connect_error){
    echo'lỗi kết nối';
}else{
    $mclass='';
    $mgv='';  
   
        if(isset($_POST['Class'])){
         $mclass=$_POST['Class'];
         echo"Lớp học là: $mclass ";
        }else {echo $mclass;}
        if(isset($_POST['gv'])){
            $mgv=$_POST['gv'];
            echo"Lớp học là: $mgv";
        }
        $sql="INSERT INTO class (Class,teacher) VALUES ('$mclass','$mgv')";
        $conn->query($sql);

}
?>
<form action="" method="post">
thêm lớp học: 
<input type="text" name="Class">
<br/>
thêm giáo viên: 
<input type="text" name="gv">
<br/><br/>
<input type="submit" name="submit">
</form>
