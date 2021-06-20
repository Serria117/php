<?php
    if (isset($_COOKIE['username']) && isset($_COOKIE['pass'])) {
        echo "Bạn đã đăng nhập. Username: ".$_COOKIE['username']." --- Pass: ".$_COOKIE['pass'];
    }else {
        echo "Cookie không tồn tại";
    }
?>
