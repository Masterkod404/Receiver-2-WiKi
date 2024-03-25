<?php  
    include "vendor/components/core.php";
    unset($_SESSION['errors']);
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
    $name=$_SESSION['user']['name'];
    $sql=$db->query("SELECT * FROM `users` WHERE `name`='{$name}'");
    $row=$sql->fetch_assoc();
    $level=$row['level'];
    $email=$row['email'];
    $progres_bar=$row['progres_Bar'];
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
    <div class="backProf">  
        <div class="profilCard">
        <img src="assets/img/logoProfileCard.png" alt="логотип карточки" class="imgCard">
            <div class="profilNameAndAll">
                <img src="assets/img/imgProfil/<?= $_SESSION['user']['imgProf'] ?>" alt="Фото профиля" >
                <div class="profileInfo">
                    <h2 class="name"><?=$_SESSION['user']['name']?></h2>
                    <h2>Ваш уровень погружения: <?=$level?></h2>
                    <div class="progressBar">
                        <div class="progress" style="width:<?=$progres_bar?>%"></div>
                    </div>
                     <h2>Почта: <?=$email?></h2>
                </div>
               
            </div>
            <div class="profilMenu">
            <?php
                if($_SESSION['user']['isAdmin']==0){
            ?>
                <h2>Меню профиля</h2>
                <a href="statesProfile.php">Добавление и просмотр статей</a>
                <a href="">Просмотр оценок</a>
                <a href="profilsreject.php">Редактирование профиля</a>
                <a href="">Уведомления</a>
                <a href="">Обсуждения</a>
            <?php
                }
                if($_SESSION['user']['isAdmin']==1){
            ?>
                <h2>Меню профиля</h2>
                <a href="statesProfile.php">Одобрение статей</a>
                <a href="">Просмотр профилей</a>
                <a href="">Просмотр оценок</a>
                <a href="profilsreject.php">Редактирование профиля</a>
                <a href="">Уведомления</a>
                <a href="">Обсуждения</a>
            <?php
                }
            ?>
            </div>
        </div>
    </div>
    
</body>
</html>