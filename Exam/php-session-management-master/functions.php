<?php

    function login($conn, $username, $password){
        $sql = "SELECT * FROM abc12users WHERE username = '$username'";
        $query = mysqli_query($conn, $sql);
        return $query;    
    }

?>