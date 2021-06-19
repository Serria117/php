<?php
$test = "<script>alert('You have been attacked')</script>";
$test = htmlspecialchars($test);
echo "$test";
?>
