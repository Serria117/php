<?php
    require_once("database.php");
    $errors = [];

    function isFormValidated(){
        global $errors;
        return count($errors) == 0;
    }
    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        $info = [];
        $info['name'] = $_POST['name'];
        if (empty($_POST['name'])){
            $errors[] = 'Username is required';
        }
        if (empty($_POST['pwd'])){
            $errors[] = 'Password is required';
        }
        if (empty($_POST['phone'])){
            $errors[] = 'Phone Number is required';
        }
        if(check_duplicate($info)){
            $errors[] = 'This Username has been used.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practise Exam</title>
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
    <p>Registration Form</p>
    <form action=<?php echo $_SERVER["PHP_SELF"] ?> method="post">
        <label for="name">Username:</label>
        <input type="text" name="name" id="name" value="<?php echo isFormValidated()? '': $_POST['name']; ?>">
        <br>

        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd" value="<?php echo isFormValidated()? '': $_POST['pwd']; ?>">
        <br>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" value="<?php echo isFormValidated()? '': $_POST['phone']; ?>">
        <br>

        <input type="submit" value="Resgitration">
    </form>
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && isFormValidated()): ?>
        <?php
        $info = [];
        $info['name'] = $_POST['name'];
        $info['pwd'] = sha1($_POST['pwd']);
        $info['phone'] = $_POST['phone'];
        $result = insert_registration($info);
        ?>
        <h2>Register successfully</h2>
        <ul>
        <?php
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if ($key == 'pwd') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }
        ?>
        </ul>
    <?php endif; ?>
    <br><br>
</body>
</html>

<?php
    db_disconnect($db)
?>
