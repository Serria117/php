<?php

include_once  './lab17_connDB.php';

$connect = getConnect_X();
if($connect!=NULL) { 
    $sqlSelect = "Select classId , className from class" ;
    $result = $connect->query($sqlSelect) ;
    if($result->num_rows > 0) { 
        while ($row=$result->fetch_assoc() ) { 
            echo '<br/> ID: ' . $row['classId'] . ', Name: ' . $row['className'];
        }
    }
}

?>