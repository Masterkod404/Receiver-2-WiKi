<?php
    include "core.php";
    session_start();
    $id_user=$_SESSION['user']['id'];
    $nameStatesBlock=$_POST["nameStates"];
    $descStatesBlock=$_POST["story"];
    $filePatch=$_FILES['headerImg']['tmp_name'];
    $fileNameNew=uniqid().".png";
    $dateStatesCreate=date('Y-m-d');
    $sql="INSERT INTO `article`(`user_id`, `nameArticle`, `dateArticle`, `descripptionBlock`, `imgBlock`, `checkedSel`) VALUES('{$id_user}','{$nameStatesBlock}','{$dateStatesCreate}','{$descStatesBlock}','{$fileNameNew}',0)";
    $db->query($sql);
    move_uploaded_file($_FILES['headerImg']['tmp_name'],"../../assets/img/imgStates/".$fileNameNew);
    $sql2="SELECT MAX(`id`) AS 'Serch' FROM `article`";
    $row=mysqli_fetch_assoc($db->query($sql2));
    $_SESSION['StatesCreate']['id']=$row['Serch'];
    header("Location: ../../States.php");
?>