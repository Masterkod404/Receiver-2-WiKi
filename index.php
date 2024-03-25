<?php

include "vendor/components/core.php";
unset($_SESSION['errors']);
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
    <div class="GL" id="GL">
        <div class="GLcontent">
            <h1>Receiver-WiKi</h1>
            <h2>Полезная информация как для старых ствольных коробок, так и для новых!</h2>
        </div>
    </div>
    <div class="postIndex">
        <div class="menuPost">
            <div class="blockMenuPost">
                <h2>Меню статей</h2>
                <a href="">Популярные темы</a>
                <a href="">Группы статей</a>
                <a href="">Обсуждения и теории</a>
                <a href="">Поиск статей</a>
            </div>
        </div>

        <div class="contentPost">
            <h1>Статьи на сайте!</h1>
            <?php
                $sql = "SELECT `article`.`id`, `article`.`nameArticle` , `article`.`descripptionBlock` , `article`.`imgBlock` , (SELECT COUNT(`id_likes`) FROM `likesarticle`,`article` WHERE `likesarticle`.`id_likes` = `article`.`id` ) AS 'Likes' FROM `likesarticle`,`article` WHERE`likesarticle`.`id_likes` = `article`.`id` GROUP BY(`article`.`id`)";
            
            $rows = $db->query($sql);
            foreach ($rows as $row) {
            ?>
                <div class="blockPostContent">

                    <form class="postStates" method="post" action="vendor/components/runStates.php" name="postsForm">
                        <h1><?= $row['nameArticle'] ?></h1>
                        <div class="blockLowStates">
                            <img src="assets/img/imgStates/<?= $row['imgBlock'] ?>" alt="Фото" class="logoStates">
                            <div class="textStates">
                                <p>
                                    <?= $row['descripptionBlock'] ?>
                                </p>
                                <div class="PostButton">
                                    <?php 
                                    if (isset($_SESSION['user']['id'])) {
                                        $id = $_SESSION['user']['id'];

                                    } else {
                                        $id = -1;
                                    } 
                                    ?>
                                    <label for="likesIn" class="hertPng"><img src="assets/img/hearth.png" alt="Лайк" style="<?php if($rows2==0){ echo "background: var(--color-one)";} ?>">
                                    <input type="button" name="plusLikes" onclick="startLike({likes: <?= $row['id'] ?>, id: <?= $id ?>})" value="<?= $row['Likes'] ?>" id="likesIn" >
                                    </label>
                                    <button>Читать дальше</button>
                                </div>
                            </div>


                        </div>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </form>

                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include "vendor/components/footer.php";
    ?>
</body>
<script src="vendor/scripts/likesStates.js"></script>

</html>