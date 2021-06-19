<?php
    function connect() {
        $svName = 'localhost';
        $userName = 'root';
        $pass = '';
        $dbName = 'qlsinhvien';
        if ($conn = new mysqli($svName, $userName, $pass, $dbName)) {
            return $conn;
        }else return null;
    }

    function checkPhone($phone){
        $conn = connect();
        if($conn != null){
            $sql = "SELECT COUNT(svPhone) OVER (ORDER by svPhone) FROM student WHERE svPhone = ?";
            $prepStm = $conn->prepare($sql);
            $prepStm->bind_param("s", $phone);
            $prepStm->execute();
            $result = $prepStm->get_result();
            if ($result->num_rows>0) {
                return false;
            }else return true;
        }
        else die ("Connection failed.");
    }

    function checkEmail($email){
        $conn = connect();
        if($conn != null){
            $sql = "SELECT COUNT(svEmail) OVER (ORDER by svEmail) FROM student WHERE svEmail = ?";
            $prepStm = $conn->prepare($sql);
            $prepStm->bind_param("s", $email);
            $prepStm->execute();
            $result = $prepStm->get_result();
            if ($result->num_rows>0) {
                return false;
            }else return true;
        }
        else die ("Connection failed.");
    }


    function register($name, $email, $phone, $pass){
        $conn = connect();
        if($conn === null){
            die("Connection failed.");
        }
        else {
            $chkEmail = checkEmail($email);
            $chkPhone = checkPhone($phone);
            if ($chkEmail === false || $chkPhone === false) {
                die("Email or Phone has already been taken.");
            }
        }
    }



    function logIn($email, $pass) {
        $conn = connect();
        $sql_logIn = "SELECT * FROM student WHERE svEmail = ? AND svPass = ?";
        if($conn != null){
            $prepStm = $conn->prepare($sql_logIn);
            $prepStm->bind_param("ss", $email, $pass);
            $prepStm->execute();
            $result = $prepStm->get_result();
            $prepStm->close();
            $conn->close();
        }
        else {
            die ("Connection failed.");
        }
        if ($result->num_rows=0) {
            return null;
        }
        else {
            return $result;
        }
    }
?>
