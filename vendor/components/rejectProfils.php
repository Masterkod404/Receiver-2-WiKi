<?php
    include "core.php";
    session_start();
    if(isset($_POST['nameAndEmailAndFoto'])){
        if($_FILES['headerImg']['name']==""){
            $sqlNameEmail="UPDATE `users` SET `name`='{$_POST['userName']}',`email`='{$_POST['emailUser']}' WHERE `id`='{$_SESSION['user']['id']}'";
            $db->query($sqlNameEmail);
            $_SESSION['errors']="Обновление прошло успешно!";
            $_SESSION['user']['name']=$_POST['userName'];
            header("Location: ../../profil.php");
        }else{
            $fileNameNew=uniqid().".png";
            $sqlImgSel= "SELECT `imgProf` FROM `users` WHERE `id`='{$_SESSION['user']['id']}'";
            $rowImg=mysqli_fetch_assoc($db->query($sqlImgSel)); 
            unlink($rowImg['imgProf']);
            $sqlNameEmailPng="UPDATE `users` SET `name`='{$_POST['userName']}',`email`='{$_POST['emailUser']}',`imgProf`='{$fileNameNew}' WHERE `id`='{$_SESSION['user']['id']}'";
            $db->query($sqlNameEmailPng);
            move_uploaded_file($_FILES['headerImg']['tmp_name'],"../../assets/img/imgProfil/".$fileNameNew);
            $_SESSION['user']['imgProf']=$fileNameNew;
            header("Location: ../../profil.php");
        }
    }else if(isset($_POST['passwordProf'])){
        $sqlPass="SELECT `password` FROM `users` WHERE `id`=". $_SESSION['user']['id'] ." AND `password`='". md5($_POST['chekedPassword'])."'";
        $resultPass=$db->query($sqlPass);
        $rowsPass=mysqli_fetch_assoc($resultPass);
        var_dump($_POST['onePassword']);
        var_dump($_POST['twoPassword']);
        if($resultPass->num_rows== 0){
            $_SESSION['errors']="Пароль неверный, повторите попытку!";
            header("Location: ../../profilsreject.php");
        }else{
            if($_POST['onePassword']!=$_POST['twoPassword']){
                $_SESSION['errors']="Пароли несовпадают, повторите попытку!";
                header("Location: ../../profilsreject.php");
                
            }else{
                $sqlPasswTwo="UPDATE `users` SET `password`='". md5($_POST['onePassword']) ."' WHERE `id`=". $_SESSION['user']['id'];
                $db->query($sqlPasswTwo);
                $_SESSION['errors']="Обновление прошло успешно!";
                header("Location: ../../profil.php");
            }
            
        }
    }
?>