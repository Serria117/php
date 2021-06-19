<?php
    require 'head.html';
    require 'connection.php'; //the class 'connection' initilized in this file
?>

<?php
//Make connection:
    $connectQLSV = new connection;
    $connectQLSV->connectionInfo();
?>
<br><br>
<form action="" method="GET">
    <input type="text" name="search" placeholder="Search Student by name" style = "width: 200px">
    <input type="submit" name="submit" value="Search">
    <input type="submit" name="viewAll" value="Display All">
</form>
<br>
<!-- Update student -->
<?php
    require 'Register.php';
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])||empty($_POST['year'])||empty($_POST['month'])||empty($_POST['day'])||empty($_POST['email'])){
            echo("<script type=\"text/javascript\">
                alert('You must enter all required fields!');
            </script>");
        }else{
            $newName = $_POST['name'];
            $newBD = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
            $newEmail = $_POST['email'];
            $checkEmail = $connectQLSV->checkEmail($newEmail);
            if($checkEmail==TRUE){
                echo ("The email <i>".$newEmail."</i> already exists in the database.");
                $connectQLSV->closeConnect();
            }
            else{
                $sql_Ins = "INSERT INTO STUDENT (ID,NAME, BirthDate, email) VALUES (NULL,'".$newName."','".$newBD."','".$newEmail."')";
                if($connectQLSV->update($sql_Ins)){
                    echo "<script type=\"text/javascript\">alert('New student registered successfully!');</script>";
                }
            }
        }
    }
?>
<br>
<?php
    //Search student by name
    if(isset($_GET["submit"])){
        if(strlen($_GET["search"])<3){
            die("Error: Search query must be atleast 3 characters! <br>");
        }
        else{
            $sql_search = "Call search_Student('".$_GET["search"]."')"; //'search_Student' is a stored-procedure inside the database
            $connectQLSV->select($sql_search);
            $connectQLSV->getResult();
        }
    }
    //Display all student:
    if(isset($_GET["viewAll"])){
        $sql_all = "SELECT * FROM view_Student limit 50"; //'view_Student' is a view inside the database
        $connectQLSV->select($sql_all);
            $connectQLSV->getResult();
    }
?>