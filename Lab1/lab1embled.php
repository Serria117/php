<?php
//QUESTION: use values of the 02 arrays below in <body> 
//to make html content look the same as lab1_embed_end.png
//you should embed php code in <body> to access elements of the 02 arrays

$book = [
    'title' => "The Hitchhiker's Guide to the Galaxy",
    'author' => 'Douglas Adams',
    'description' => 'a comedy sci-fi adventure originally based on a BBC radio series'
];
$characters = [
    'Arthur Dent',
    'Ford Prefect',
    'Zaphod Beeblebrox',
    'Marvin, the paranoid android',
    'Slartibartfast'
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Challenge: Embed in HTML</title>
    <link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<h1>
    <?php
        echo $book['title'] ."by " .$book['author'];
    ?>
</h1>
<p>
    <?php
        echo '&quot;'.$book['title'].'&quot; is '.$book['description'];
    ?>
</p>
<h2>Main Characters</h2>
<ul>
    <?php
        foreach ($characters as $name) {
            echo "<li>$name</li>";
        }
    ?>
</ul>
</body>
</html>