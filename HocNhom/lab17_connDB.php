<?php
    $severName_="localhost";
    $UserName_="root";
    $Password_="";
    $dbName_="lab17";

    function getConnect_X(){
        global $severName_;
        global $UserName_;
        global $Password_;
        global $dbName_;
        $connect = new mysqli( $severName_,$UserName_,$Password_,$dbName_) ;
        if( !$connect->connect_error) { 
            return $connect ;
        } else {       
            return NULL ;
        }
    }

    function insertStudent ($svId, $svName, $svMail, $svPhone, $svPass) { 
        $connect = getConnect_X() ;  
            $sqlInsert = "insert into student(svId , svName , svMail ,  svPhone , svPass)  values (";
            $sqlInsert = $sqlInsert .  " '$svId' , '$svName' , '$svMail' ,  '$svPhone' , '$svPass' )" ; 
      
            if($connect !=NULL) {  
            $kq = $connect->query($sqlInsert) ;     
            $connect->close();
            return $sqlInsert  . " ---- " ; 
        } 
            return $sqlInsert  . " ---- " ; ;  
}

    function insertClass($classId, $className){
        $connect = getConnect_X() ;  
            $sqlInsert = "insert into class(classId, className)  values (";
            $sqlInsert = $sqlInsert .  " '$classId', '$className')" ; 
      
            if($connect !=NULL) {  
            $kq = $connect->query($sqlInsert) ;     
            $connect->close();
            return $sqlInsert  . " ---- " ; 
        } 
            return $sqlInsert  . " ---- " ; ;  
    }

    function getLogin($svPhone, $svPass) {
        $connect = getConnect_X();
        if(!$connect->connect_error) {
            $svPassmd5 = md5($svPass);
            $sqlSelectUser = "select  *  from student where svPhone = '$svPhone' and svPass='$svPassmd5'";
            $kq = $connect->query($sqlSelectUser);
            if (isset($kq) && $kq->num_rows>0) {
                return $kq;  
            }else return 0;       
        } else return 0;
    }
?>