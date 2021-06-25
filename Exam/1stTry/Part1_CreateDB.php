<?php
define('host','localhost');
define('user', 'root');
define('pass','');
define('db','abc12');

function createDB(){
    $connect = new mysqli(host, user, pass);
    $sql_createDB = "CREATE DATABASE IF NOT EXISTS abc12";
    $sql_createTB = "CREATE TABLE IF NOT EXISTS abc12users (
        username varchar(100) PRIMARY KEY UNIQUE,
        password_hash char(40),
        phone varchar(10)
    )";
    if(!$connect->query($sql_createDB)){
        die ("Unable to create database. Check connection and try again.");
    }
    $connect->select_db("abc12");
    if(!$connect->query($sql_createTB)){
        die ("Unable to create table. Check connection and try again.");
    }
}
createDB();

function connect(){
    $connect = new mysqli(host, user, pass, db);
    if($connect->connect_error){
        return false;
    } else {
        return $connect;
    }
}

?>
