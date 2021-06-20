<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upload File</title>
        <style>
            h2{
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
        </style>
    </head>
    <body>
        <h2>Upload file with PHP</h2>
        <form class="" action="" method="post" enctype="multipart/form-data">
            Select file to upload: <input type="file" name="fileUpload" id="fileUpload" value=""><br>
            <input type="submit" name="submit" value="UPLOAD"><br>
        </form>
        <?php
            if(isset($_POST['submit'])){
                $thuMuc = "uploads/";
                $tenFile = $thuMuc.basename($_FILES['fileUpload']['name']);
                if(move_uploaded_file($_FILES['fileUpload']["tmp_name"],$tenFile)){
                    echo "File $tenFile uploaded.<br>";
                    echo "<img src='$tenFile' 'alt='image' style='width:1000px; height:auto;'>";
                }else {
                    echo "File not uploaded.";
                }
            }
         ?>
         <br><br>

    </body>
</html>
