<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function validateDay(){
            var day = document.GetElementById("day");
            if (day.value>31){
                alert ("Invalid day value.");
                day.focus;
                return;
            }
        }
        
    </script>
</head>
<body>
    <h3><b>Register student</b></h3>
    <form action="" method="post">
        <table>
            <tr>
                <th colspan="2" style="text-align: center;">
                    Add new Student
                    <span style="font-style: italic;font-size: smaller;">(All fields required)</span>
                </th>
            </tr>
            <tr class="reg">
                <td>Name:</td>
                <td><input type="text" name="name" id="name" placeholder="Name"></td>
            </tr>
            <tr class="reg">
                <td>Birth date:</td>
                <td>
                    <input style="width:35px;" type="text" name="day" id="day" placeholder="day" onchange="validateDay();">
                    <input style="width:35px;" type="text" name="month" id="month" placeholder="month">
                    <input style="width:38px;" type="text" name="year" id="year" placeholder="year">
                </td>
            </tr>
            <tr class="reg">
                <td>Email:</td>
                <td><input type="email" name="email" id="email" placeholder="abc@xyz.com"></td>
            </tr>
            <tr class="reg" style="text-align: center;">
                <td colspan="2"><input style="width:100px"  type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>