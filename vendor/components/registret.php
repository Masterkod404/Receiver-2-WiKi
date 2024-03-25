<?php
    include "core.php";

     $login=$_POST['login'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $password_two=$_POST['password_two'];
     if($password==$password_two){
            $sql=$db->query("SELECT * FROM `Users` WHERE `name`='{$login}'");
            if($sql->num_rows==0){
                unset($_SESSION['errors']);
                $password_utf=md5($password);
                $db->query("
                    INSERT INTO 
                    `Users`(`password`, `level`, `progres_Bar`, `email`, `imgProf`, `name`) 
                    VALUES ('{$password_utf}',0,0,'{$email}','logoDefoltProfile.png','{$login}')
                ");
                $sql=$db->query("SELECT * FROM `Users` WHERE `name`='{$login}'");
                $row=$sql->fetch_assoc();
                $_SESSION['user']['id']=$row['id'];
                $_SESSION['user']['isAdmin']=$row['isAdmin'];
                $_SESSION['user']['name']=$row['name'];
                $_SESSION['user']['imgProf']=$row['imgProf'];
                header("Location: ../../index.php");
            }else{
                $_SESSION['errors']="Извините, но данный логин занят.";
                header("Location: ../../registr.php");  
            }
     }else{
        $_SESSION['errors']="Ваши пароли не совпадают!";
        header("Location: ../../registr.php");  
     }
    
?> 