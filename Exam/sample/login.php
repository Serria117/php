<?php
    require_once("database.php");
    $errors = [];

    function isFormValidated(){
        global $errors;
        return count($errors) == 0;
    }
    if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $info = [];
        $info['name'] = $_POST['name'];
        $info['pwd'] = sha1($_POST['pwd']);
        if (empty($_POST['name'])){
            $errors[] = 'Username is required';
        }
        if (empty($_POST['pwd'])){
            $errors[] = 'Password is required';
        }
        $data = check_login($info);
        // print_r($data);
        
        if(!isset($data['username'])){
            $errors[] = 'Username is invalid';
        }
        if($data['password_hash'] != $info['pwd']){
            $errors[] = 'Wrong password';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Error: </span>
            <ul>
                
            <?php foreach ($errors as $key => $value){
                if (!empty($value)){
                echo '<li>', $value, '</li>';
                }
            }
            ?>
            </ul>
        </div><br>
    <?php endif; ?>
    <p>Login form</p>
    <form action=<?php echo  $_SERVER["PHP_SELF"]?> method="post">
        <label for="name">Username:</label>
        <input type="text" name="name" id="name">
        <br>

        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
        <br>

        <input type="checkbox" name="remember" id="remember"> Remembered me! 
        <br>

        <input type="submit" value="Log in">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()) echo "Login successfully";?> 
        
</body>
</html>