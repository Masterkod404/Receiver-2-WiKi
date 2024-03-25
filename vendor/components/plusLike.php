<?php
    include "core.php";
    $id=$_POST['id'];
    $steats_id=$_POST['likes'];
    $sql="SELECT `id_likes` FROM `likesarticle` WHERE `id_likes`='{$steats_id}' AND `id_users`='{$id}'";
    $rows=$db->query($sql);
    if($rows->num_rows==1){
        $sql2="DELETE FROM `likesarticle` WHERE `likesarticle`.`id_likes` = '{$steats_id}' AND `likesarticle`.`id_users`='{$id}'";
        $db->query($sql2);
        echo json_encode([
            'status' => false
        ]);  
    }else{
        
        $sql2="INSERT INTO `likesarticle`(`id_likes`, `id_users`) VALUES('$steats_id','$id')";
        $db->query($sql2);
        echo json_encode([
            'status' => true
        ]);
    }
    
?>