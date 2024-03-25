<?php

include "vendor/components/core.php";
if(!isset($_SESSION['user'])){
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
     <div class="backCardReject">  
        <div class="blockCardReject">
            <form class="ProfilCardReject" action="vendor/components/rejectProfils.php" method="post" enctype="multipart/form-data">
                <h1>Оснавная информация профиля</h1>
                <div class="namesAndImg">
                    <div class="imgProfileR">
                            <input id="fileInpute"  type="file"  name="headerImg" onchange="clickLable(this)" />
                            <label id="lableIn"   for="fileInpute" style="background-image:url('assets/img/imgProfil/<?= $_SESSION['user']['imgProf'] ?>')"> </label>
                    </div>
                    <div class="nameAndEmailRejct">
                        <label><p>Ваш логин: </p><input type="text" name="userName" value="<?=$_SESSION['user']['name'];?>" placeholder="Логин"></label>
                        <?php
                            $sql="SELECT `email` FROM `users` WHERE `name`='".$_SESSION['user']['name']."'";
                            $rows=$db->query($sql);
                            $row=mysqli_fetch_assoc($rows); 
                        ?>
                        <label><p>Ваша почта:</p> <input type="text" name="emailUser" value="<?=$row['email']?>" placeholder="Email"></label>
                        <lable class="statusUsers">Ваш статус: <?php if($_SESSION['user']['isAdmin']==0){ echo "пользователь";}else{echo "администратор";} ?></lable>
                    </div>
                </div>
                <button name="nameAndEmailAndFoto">Изменить данные</button>
            </form>
            <form class="PasswordCardReject" action="vendor/components/rejectProfils.php" method="post">
                <h1>Смена пароля</h1>
                <label><p>Введите текущий пароль: </p><input type="password" name="chekedPassword" placeholder="Текущий пароль"></label>
                <label><p>Введите новый пароль: </p><input type="password" name="onePassword" placeholder="Новый пароль"></label>
                <label><p>Повторите новый пароль: </p><input type="password" name="twoPassword" placeholder="Повторение пароля"></label>
                <h4 class="errorsAll"><?php if(isset($_SESSION['errors'])){ echo $_SESSION['errors'];} ?></h4>
                <button name="passwordProf">Изменить данные</button>
            </form>
        </div>
    </div>
</body>
<script src="vendor/scripts/iputeFocuse.js"></script>
</html>