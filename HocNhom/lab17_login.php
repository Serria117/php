<html>
    <head> </head>
    <body>
    <br/>
    <center><h2> Login </h2> </center>
    <?php
    include_once './lab17_connDB.php';
    session_start() ;
    $login = NULL;
    $svPhone  ;$svPass ;
    if (isset($_POST['login'])) {
        if(isset($_POST['svPhone']) && isset($_POST['svPass'])) {
                    $svPhone  = $_POST['svPhone'] ;
                    $svPass = $_POST['svPass']   ;
                    $ketqua = getLogin($svPhone, $svPass) ;
                    if(isset($ketqua) && is_object($ketqua)) {
                        if($ketqua->num_rows>0) {
                        echo ' login success !' ;
                        if(empty($_SESSION['createTime'])){
                        $_SESSION['createTime'] = time() ;
                        }
                        $_SESSION['svPhoneLogin']  = $svPhone;
                        } else  {  echo 'login fail ';
                        $_SESSION['svPhoneLogin'] = NULL;
                        }
                    }else  {  echo 'login fail ';
                        $_SESSION['svPhoneLogin'] = NULL;
                    }
        }
            if(isset($_SESSION['svPhoneLogin'])) {
            $login = $_SESSION['svPhoneLogin'];
            echo   '<br/> so DT : ' . $login . ' đã đang nhập ' ;
        }else {    echo  ' <br/>Chưa  đang nhập ' ; }
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
