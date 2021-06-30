<?php
    define("DB_SERVER","localhost");
    define("DB_USER","root");
    define("DB_PASSWORD","");
    define("DB_NAME","abc12");

    function db_connect(){
        $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
        return $connection;
    }

    $db = db_connect();

    function db_disconnect(){
        if(isset($connection)){
            mysqli_close($connection);
        } 
    }


    function confirm_query_result($result){
        global $db;
        if(!$result){
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }else{
            return $result;
        }
    }

    function insert_registration($info){
        global $db;

        $sql = "INSERT INTO `abc12users` ";
        $sql .= "(USER_NAME, PASSWORD_HASH, PHONE) ";
        $sql .= "VALUES (";
        $sql .= "'" . $info['name'] . "',"; 
        $sql .= "'" . $info['pwd'] . "',";
        $sql .= "'" . $info['phone'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);

        return confirm_query_result($result);
    }

    function check_duplicate($info){
        global $db;

        $sql = "SELECT USER_NAME FROM `abc12users` ";
        $sql .= "WHERE USER_NAME ='" . $info['name'] . "'";
        
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)){
            return true;
        }else{
            return false;
        }
        mysqli_free_result($result);
    }

    function check_login($info){
        global $db;

        $sql = "SELECT `username`,password_hash FROM `abc12users` ";
        $sql .= "WHERE username ='" . $info['name'] . "'";
        $result = mysqli_query($db, $sql);     

        if(mysqli_num_rows($result)>0) {
            $data = mysqli_fetch_assoc($result);
            return $data;
        }else{
            return false;
        }
    }
$_FILES['file']['name'];
$_FILES['file']['type'];
$_FILES['file']['size'];
$_FILES['file']['tmp_name'];
$_FILES['file']['error'];
?>

