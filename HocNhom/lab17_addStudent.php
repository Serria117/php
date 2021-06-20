<html> 
    <head> 
    <body style="background-image: url('uploads/StatusBar_01.PNG'); background-repeat: no-repeat; background-size: cover">
     <br/>   
     <div style = 'margin-left: 20px; margin-top: 20px; background-color: cyan; width: 700px; height: 450px'>
&nbsp;
          <div style = 'margin-left: 20px; margin-top: 0px; background-color: azure; width: 650px; height: 420px; float: clear'>
<?php
$svId;  $svName ;    $svMail;    $svPhone;    $svPass;     $svPass_re ;

if(isset($_POST['svId'])) { 
    $svId = $_POST['svId'];
}

if(isset($_POST['svName'])) { 
    $svName = $_POST['svName'];
    echo ' <br/> Name : ' .   $svName;
}

if(isset($_POST['svMail'])) { 
    $svMail = $_POST['svMail'];
    echo ' <br/> Mail : ' .   $svMail;
}

if(isset($_POST['svPhone'])) { 
    $svPhone = $_POST['svPhone'];
    echo ' <br/> Phone : ' .   $svPhone;
}

if(isset($_POST['svPass'])) { 
    $svPass = $_POST['svPass'];
    //echo ' <br/> Pass : ' .   md5($svPass);
}

if(isset($_POST['svPass_re'])) { 
    $svPass_re = $_POST['svPass_re'];
    //echo ' <br/> Pass_re : ' .   md5($svPass_re);
}

include_once './lab17_connDB.php';

if  (isset($svId) && isset($svName) && isset($svMail) && isset($svPhone) && isset($svPass))  {
     $kq = insertStudent($svId,$svName, $svMail,  $svPhone, md5($svPass)) ;
}
?>      
    <center > <h2> Insert database </h2> </center>
    <form  name="f4" method="POST" >
        ID :  <input type="text" name ="svId" value="" /> <br/> <br/>
        Name :  <input type="text" name ="svName" value="" /> <br/> <br/>
        Phone :<input type="text" name ="svPhone" value="" /> <br/> <br/>
        Mail : <input type="text" name ="svMail" value="" /> <br/> <br/>    
        Pass : &nbsp;<input type="password" name ="svPass" value="" /> <br/> <br/>    
        re_pass <input type="password" name ="svPass_re" value="" /> <br/> <br/> 
        <input type="submit" name ="submit" value=" Add Student" /> <br/> <br/>
    </form>
    </div>
     </div>
    
     <br/>
  <?php include './lab17_displayStudent.php'; 
  ?>
</body>
</html> 