<?php session_start(); unset($_SESSION['userName']);?>
<html>
    <head> </head>
    <body>
    <br/>
    <center><h2> Login </h2> </center>
    <?php
    include_once './lab17_connDB.php';
    $login = NULL;
    $svPhone  ;$svPass ;
    if (isset($_POST['login'])) {
        if(empty($_POST['svPhone']) || empty($_POST['svPass'])){ //Kiểm tra không để trống thông tin đăng nhập
            echo ("Không được để trống thông tin đăng nhập.");
        } else {
            $svPhone = $_POST['svPhone'];
            $svPass = $_POST['svPass'];
            $kq = getLogin($svPhone, $svPass);
            if($kq === 0 ){                                     //Kiểm tra thông tin đăng nhập
                echo ("Thông tin đăng nhập sai.");
            }else {
                echo "Đăng nhập thành công";
                while ($row = $kq->fetch_assoc()){
                    $userName = $row['svName'];                 // Lấy userName từ database
                }
                $_SESSION['userName'] = $userName;              //Khởi tạo biến session chứa userName
                // header("location: lab17_addStudent.php");
            }
        }
    }

    ?>
    <form method="post" name="f3" >
        <br/> sv phone : <input type="text" value ="" name="svPhone" /> <br/><br/>
        sv pass : &nbsp; &nbsp; <input type="password" value=""  name ="svPass" />  <br/><br/>
        <input type="submit" name="login" value="đăng nhập" />
    </form>
    <br/><br/>   <a href="lab17_LogOut.php" > Logout </a>
    <br/><br/>   <a href="lab17_addStudent.php" > Add Student </a>
    </body>
</html>
