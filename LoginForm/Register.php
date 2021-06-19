<?php include_once "connect.php";
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if (empty($name) || empty($phone) || empty($email) || empty($pass1) || empty($pass2)) {
        header("location: registerForm.php?error=emptyfield&name=".$name."&phone=".$phone."&email=".$email);
        // echo "<br>You must enter all required fields.";
        exit();

    } else {
        connect();
        reEnterPass($_POST['pass1'], $_POST['pass2']);
        $name = htmlspecialchars($_POST['name']);
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pass = htmlspecialchars($_POST['pass1']);
        $pass2 = htmlspecialchars($_POST['pass2']);
        registerUser($name, $phone, $email, $pass);
        echo "Register successfully. You can now login.";
    }
}
?>
<script type="text/javascript">
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
</script>
