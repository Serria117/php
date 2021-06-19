<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sinh viên</title>
</head>
<body>
    <?php include 'connection.php'; $qlsv = new student ?>
    <div class="container">
        <h2>Chọn lớp học:</h2>
        <form class="" action="" method="post">
            Lớp:
            <select class="" name="class">
                <option value="C2011L">C2011L</option>
                <option value="C2009L">C2009L</option>
                <option value="C2008H">C2008H</option>
                <option value="C2011G">C2011G</option>
            </select>
            <input type="submit" name="submit" value="submit">
            <?php
            if (isset($_POST['class'])) {
                $className = $_POST['class'];
                echo "<br>Bạn chọn lớp: ".$className;
            }
            ?>
        </form>

    </div>
</body>
</html>
