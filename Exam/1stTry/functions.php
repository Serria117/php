<?php
    function connect() {
        mysqli_report(MYSQLI_REPORT_ALL);
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'qlsinhvien';
        try {
            $conn = new mysqli($host, $user, $pass, $db);
            // echo "Connect success.<br>";
            return $conn;
        }catch (Exception $error) {
            echo "Connection failed. Reason: ".$error->getMessage();
            exit();
        }
    }

?>