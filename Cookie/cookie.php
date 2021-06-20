<?php
//Cookie là 1 file chứa thông tin được server tạo ra đặt trên máy client để lưu trữ các thông tin về người sử dụng.
//Khi trình duyệt chứa cookie gửi yêu cầu đến server, cookie sẽ được gửi đi -> dựa vào cookie server sẽ nhận diện được người dùng của phiên làm việc trước và trả về các dữ liệu phù hợp.
//Cookie có thời hạn, sau 1 thời hạn nhất định thì cookie bị xóa.
//Trong trình duyệt Chrome, để xem cookie của các site đặt trên máy tính: mở Setting > Privacy and security -> See all cookies and site data

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <form class="" action="" method="post">
            User name: <input type="text" name="name" value=""><br><br>
            Password: <input type="text" name="pass" value=""><br><br>
            <input type="submit" name="login" value="Log in">
        </form>
        <?php
            if (isset($_POST['login'])) {
                setcookie('username', $_POST['name'],time()+(60*60*24));
                setcookie('pass', $_POST['pass'],time()+(60*60*24));
                header ("location: showcookie.php");
            }
        ?>
    </body>
</html>
