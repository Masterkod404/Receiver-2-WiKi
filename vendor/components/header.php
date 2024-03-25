<header>
            <a href="index.php" class="LinkLogo">  </a>
        <?php
                $path_parts = pathinfo($_SERVER['SCRIPT_NAME']);
                if(isset($_SESSION['user'])){

                
        ?>
                <div class="Log"> 
                <?php
                if($path_parts['basename']=="profil.php" || $path_parts['basename']=="profilsreject.php"){

                }else{
                ?>
                <a href="profil.php" class="profileLog">
                        <p><?= $_SESSION['user']['name']?></p>
                        <img src="assets/img/imgProfil/<?= $_SESSION['user']['imgProf'] ?>" alt="Авто">
                </a>  
                <?php
                }
                ?>
                <a href="vendor/components/logout.php">
                        Выход
                </a>         
                </div>
               
        <?php 
                
                }else{
                
                if($path_parts['basename']=="autoAndReg.php" || $path_parts['basename']=="registr.php"){

                }else{
        ?>
            
            <a href="autoAndReg.php" class="noLog">
                     Авторизоватся       
            </a>
        <?php
                }
                }
        ?>
</header>