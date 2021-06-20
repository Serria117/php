<?php
session_start();
  if( isset($_SESSION['svPhoneLogin']))  { 
          echo 'đang có session '; 
          $_SESSION['svPhoneLogin'] = NULL;
         echo ' <br/>Set null sesion ->  Bạn đã đăng xuất '; 
       
 }  else  {  echo 'không có session' ; }

?>
<br/>
<a href="lab17_login.php"> quay lai đăng nhập  </a> 