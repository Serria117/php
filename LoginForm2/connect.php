<?php

    function connect(){
        $svName = 'localhost';
        $userName = 'root';
        $pwd = '';
        $dbName = 'user';
        $conn = new mysqli($svName, $userName, $pwd, $dbName);
        if ($conn != false && !$conn->connect_error) {
            return $conn;
        }else {
            return null;
        }

    }
    function reEnterPass($pass1, $pass2){
        if ($pass1 != $pass2) {
            die ("<script>alert(\"Password missmatched. Try again.\")</script>");
        }
    }
    function checkDupEmail($email){
        $conn = connect();
        $sql = "SELECT email FROM user1 WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows>0) {
            return false;
        }else return true;
        $conn->close();
    }
    function checkDupPhone($phone){
        $conn = connect();
        $sql = "SELECT phone FROM user1 WHERE phone = '$phone'";
        $result = $conn->query($sql);
        if ($result->num_rows>0) {
            return false;
        }else return true;
        $conn->close();
    }

    function registerUser($name, $phone, $email, $pass){
        $conn = connect();
        $checkEmail = checkDupEmail($email);
        $checkPhone = checkDupPhone($phone);
        if ($conn != null) {
            if ($checkEmail === true && $checkPhone === true) {
                $sql = "INSERT INTO `user1` (`name`, `phone`, `email`, `pass`)
                VALUES (?, ?, ?, ?)";
                // $conn->query($sql);
                //prepare sql statement to prevent sql injection attack
                $stm = $conn->prepare($sql);
                $stm->bind_param("ssss", $name_, $phone_, $email_, $pass_);
                $name_ = $name;
                $phone_ = $phone;
                $email_ = $email;
                $pass_ = md5($pass);
                $stm->execute();
                $stm->close();
                $conn->close();
            } else {
                die ("<span style=\"color: red;\">The email or phone number you entered has already registered.<span>");
            }
        }
        $conn->close();
    }
    function logIn($email, $pass){
        $conn = connect();
        if(!$conn == null){
            $md5Pass = md5($pass);
            $sql = "SELECT `name`, `email`, `pass` FROM `user1` WHERE `email` = ? AND `pass` = ?";
            $stm = $conn->prepare($sql); //prepare sql statement
            $stm->bind_param("ss", $email_, $pass_);
            $email_ = $email;
            $pass_ = $md5Pass;
            $stm->execute();
            $result = $stm->get_result(); //get result from the executed sql statement.
            $stm->close();
            $conn->close();
            return $result;
        } else {
            return null;
        }
        $conn->close();
    }
?>
