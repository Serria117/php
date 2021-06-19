<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sign Up</title>
        <style media="screen">
            *{
                box-sizing: border-box;
                font-family: sans-serif;
            }
            .container{
                margin: 0 auto;
                width: 50%;
                background-color: #cccccc;
                text-align: center;
                border-radius: 17px;
                padding-bottom: 10px;
            }
            table{
                margin: 0 auto;
                border-collapse: collapse;
                text-align: left;
            }
            h2{
                background-color: black;
                color: white;
                border-top-left-radius: 17px;
                border-top-right-radius: 17px;
                padding: 10px;
            }
            td{
                padding: 5px;
            }
        </style>
        <script type="text/javascript">
            function validateEmail(){
                var regEx = /^\S+@\w+\.\w+/;
                var email = document.getElementById("email");
                var input = email.value;
                var result = regEx.test(input);
                if (result === false) {
                    alert("invalid email address.");
                    email.value = "";
                    email.focus();
                }
            }
            function validatePhone(){
                var regEx = /\D/;
                var phone = document.getElementById("phone");
                var input = phone.value;
                var result = regEx.test(input);
                if(result === true){
                    alert("Invalid phone number");
                    phone.value = "";
                    phone.focus();
                }
            }
        </script>
    </head>
    <body>
        <div class="container">
            <h2>Sign Up</h2>
            <form class="" action="Register.php" method="post">
                <table>
                    <tr>
                        <td>Name<span style="color: red;">*</span>: </td>
                        <td>
                            <input id="name" type="text" name="name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>" placeholder="Your name">
                        </td>
                    </tr>
                    <tr>
                        <td>Phone number<span style="color: red;">*</span>: </td>
                        <td>
                            <input id="phone" type="text" name="phone" value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>" placeholder="digit number only" onchange="validatePhone();">
                        </td>
                    </tr>
                    <tr>
                        <td>Email<span style="color: red;">*</span>: </td>
                        <td>
                            <input id="email" type="email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" placeholder="abc@xyz.com" onchange="validateEmail();">
                        </td>
                    </tr>
                    <tr>
                        <td>Password<span style="color: red;">*</span>: </td>
                        <td>
                            <input id="pass1" type="text" name="pass1" value="">
                        </td>
                    </tr>
                    <tr>
                        <td>Re-enter password<span style="color: red;">*</span>: </td>
                        <td>
                            <input id="pass2" type="password" name="pass2" value="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;"> <input style="width: 200px; height: 30px; border-radius: 5px;" type="submit" name="register" value="Sign Up"> </td>
                    </tr>
                </table>
            </form>
            <hr>
            Already have an account? <a href="login.php">Login</a><br>
        </div>
    </body>
    <script type="text/javascript">
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>
