<?php
    
    include "vendor/components/core.php";
    session_start();
    unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Receiver Wiki</title>
</head>
<body>
    
    <h1>Проверка статьи</h1>
    <h1>Айди данной записи: <?=$_SESSION['StatesCreate']['id']?></h1>
    <a href="index.php">Главная</a>
</body>
</html>