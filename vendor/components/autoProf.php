<?php
    include "core.php";

     $login=$_POST['login'];
     $password=md5($_POST['password']);
     $sql=$db->prepare("SELECT * FROM `Users` WHERE `name`=? AND `password`=?");
     $sql->bind_param("ss", $login, $password);
     $sql->execute();
     $rows = $sql->get_result();
     if($rows->num_rows>0){
        $row = $rows->fetch_assoc();
        unset($_SESSION['errors']);
        $_SESSION['user']['id']=$row['id'];
        $_SESSION['user']['isAdmin']=$row['isAdmin'];
        $_SESSION['user']['name']=$row['name'];
        $_SESSION['user']['imgProf']=$row['imgProf'];
        header("Location: ../../index.php");
     }else{
        $_SESSION['errors']="Неправильный логин или пароль, повторите попытку!";
        header("Location: ../../autoAndReg.php");
     }
    
?>  