<?php

include_once  './lab17_connDB.php';

$connect = getConnect_X();
if($connect!=NULL) { 
    $sqlSelect = "Select svId , svName , svMail ,  svPhone , svPass from student" ;
    $result = $connect->query($sqlSelect) ;
    if($result->num_rows > 0) { 
        while ($row=$result->fetch_assoc() ) { 
            echo '<br/> ID: ' . $row['svId'] . ', Name : ' . $row['svName'] . ', email :' . $row['svMail'] . ', Phone :' . $row['svPhone'].', pass : '.md5($row['svPass']);
        }
    }
}

?>