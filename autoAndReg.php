<?php
    include "vendor/components/core.php";
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
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
    <?php
        include "vendor/components/header.php";
    ?>
    <div class=backAuto>
        <form action="vendor/components/autoProf.php" method="post" class="autoRez">
            <h1>Авторизация</h1>
            <h2>Логин</h2>
            <input type="text" name="login" placeholder="Логин">
            <h2>Пароль</h2>
            <input type="password" name="password" placeholder="Пароль">
            <p><?php if(isset($_SESSION['errors'])){echo($_SESSION['errors']);}?></p>
            <button name="auto">Авторизоватся</button>
            <a href="registr.php">Еще не зарегестрированы? Присоеденяйтесь!</a>
        </form>
    </div>
    
</body>
</html>