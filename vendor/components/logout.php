<?php
    include "core.php";
    session_unset();
    var_dump($_SESSION);
    header("Location: ../../index.php");
?>