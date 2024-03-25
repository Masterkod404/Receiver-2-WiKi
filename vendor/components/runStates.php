<?php
    include "core.php";
    $_SESSION['StatesCreate']['id']=$_POST['id'];
    header('Location: ../../States.php');
?>