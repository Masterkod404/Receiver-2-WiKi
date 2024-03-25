<?php
    
    include "vendor/components/core.php";
    unset($_SESSION['errors']);
    unset($_SESSION['StatesCreate']['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Receiver Wiki</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <?php
        include "vendor/components/header.php";
    ?>
    <div class="backStates">  
        <div class="statesCard">
            <h1>Меню добавления и просмотра статей</h1>
            <form  enctype="multipart/form-data" action="vendor/components/addStates.php" method="post" class="formsSelect">
                <h2>Добавление новой статьи</h2>
                <div class="nameAndDesc">
                <div id="file-input">
                        <input id="fileInpute"  type="file"  name="headerImg" onchange="clickLable(this)"/>
                        <label id="lableIn2"  name="headerImg" for="fileInpute"></label>
                </div>
                    
                    <div>
                        <input type="text" name="nameStates" placeholder="Введите название статьи...">
                        <textarea id="story" name="story"></textarea>
                    </div>
                    
                </div>
                <button name="actionCreate">Добавить статью</button>
            </form>
            <div class="StatesSellectUsers">
                <?php
                   $sql="SELECT * FROM `article` WHERE `user_id`=".$_SESSION['user']['id'];

                   $rows=$db->query($sql);
                   if(mysqli_num_rows($rows)<= 0){
                ?>
                    <h1 class="warningStates"> Похоже в настоящее время у вас нет записей</h1>
                <?php
                   }else{
                   foreach ($rows as $row) {
                ?>
                    <form class="blockstates" method="post" action="vendor/components/runStates.php">
                        <div class="blockSelInfo">
                            <input type="text" name="id" value="<?= $row['id'] ?>" hidden> 
                            <img class="imgblockStates" src="assets/img/imgStates/<?= $row['imgBlock'] ?>" alt="Иконка">
                            <div class="nameAndDesc">
                                <h1><?=$row['nameArticle']?></h1>
                                <p>
                                    <?=$row['descripptionBlock']?>
                                </p>
                            </div>
                        </div>
                        <div class="likesAndStates">
                            <p><img src="assets/img/hearth.png">0</p>
                            <h3>Статус: <?php if($row['checkedSel']==0){ echo "на рассмотрении";}else if($row['checkedSel']==2){echo "отклонена";}else{echo "одобрена";}?></h3>
                        </div>
                        <button>Открыть статью</button>
                    </form>
                <?php
                   }}
                ?>
            </div>
        </div>
    </div>
</body>
    <script src="vendor/scripts/iputeFocuse.js"></script>
</html>