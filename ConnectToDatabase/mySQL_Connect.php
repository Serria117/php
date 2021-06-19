<?php
    include_once 'head.html';
    //Connection info:
    $svName = 'localhost';
    $userName = 'root';
    $dbName = 'qlsinhvien';
    $pwd = '';

    //initialize connection using mysqli() class:
    $conn = new mysqli($svName,$userName,$pwd,$dbName,'3306'); //(server name, user name, password, database name, port number)
    
    //Check connection:
    if($conn->connect_error){           
        die("Connection failed. ".$conn->connect_error);
    }else{
        echo "Connection established.<br>";
        echo "Server name: <i>$svName</i> - port: 3306<br>";
        echo "Database name: <i>$dbName</i>";
    }
?>

<br><br>
<!-- Search student by name (select query) using html form -->
<form action="" method="GET">
    <input type="text" name="search" placeholder="Search Student by name" style = "width: 200px">
    <input type="submit" name="submit" value="Search">
    <input type="submit" name="viewAll" value="Display All">
</form>

<br>
<?php //Insert new student:
    include 'Register.php';
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])||empty($_POST['year'])||empty($_POST['month'])||empty($_POST['day'])||empty($_POST['email'])){
            echo("<script type=\"text/javascript\">
                alert('You must enter all required fields!');
            </script>");
        }
        else{
            $newName = $_POST['name'];
            $newBD = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
            $newEmail = $_POST['email'];
            $sql_Ins = "INSERT INTO STUDENT (ID,NAME, BirthDate, email) VALUES (NULL,'".$newName."','".$newBD."','".$newEmail."')";
            if($conn->query($sql_Ins)===TRUE){
                echo "<script type=\"text/javascript\">
                    alert('New student registered successfully!');
                </script>";
            }
            else {
                echo "<script type=\"text/javascript\">
                    alert('Error! Check connection or datatype');
                </script>";
            }
        }
    }
?>


<?php
    if(isset($_GET["submit"])){
        if(strlen($_GET["search"])<3){
            die("Error: Search query must be atleast 3 characters! <br>");
        }else{
            $sql_Search = "Call search_Student('".$_GET["search"]."')";   
            $result = $conn->query($sql_Search);      
            echo '<br>___________________________________________________________________<br><br>';
        }
    }
    //Display all student:
    if(isset($_GET["viewAll"])){
        $sql_all = "SELECT * FROM view_Student limit 50"; //view_Student is a view created to view student and order by name
        $result = $conn->query($sql_all);
        echo '<br>___________________________________________________________________<br><br>';
    }
    
    //insert query result into the html table        
    if($result->num_rows>0){            
        echo "<table class=\"result\"><caption>Result</caption>
            <tr>
            <th>STT</th>
            <th>Tên sinh viên</th>
            <th>Ngày sinh</th>
            <th>Email</th>
            </tr>
            ";
        while($row = $result->fetch_assoc()){
            //convert SQL date format to normal date format:
            $time = strtotime($row["BIRTHDATE"]);
            $conv_date = date("d/m/Y",$time);
            //print result into html table:
            echo "<tr>
                <td>".$row["STT"]."</td>
                <td>".$row["NAME"]."</td>
                <td>".$conv_date."</td>
                <td>".$row["EMAIL"]."</td>
                </tr>
            ";
        }
        echo "</table>";
    }else echo "Not found. No student's name matched your search.";
    echo '<br>___________________________________________________________________<br>';
    
    
    
?>

<?php
    include_once 'bottom.html';
?>