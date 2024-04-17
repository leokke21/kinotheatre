<?php
require_once 'Design\menu.php';
?>
<div class="contain">
    
<div class="card-menu">
    <p>Введите Название Жанра</p>
    <form action="" method = "get">

            <!-- Выбор страны -->
            <select name="country" id="">

                    <!-- <option value="0">Выберите что хотите заказать </option> -->
                <?php
                    foreach($countries->getAll() as $item) {
                ?>
                        
                        <option value="<?=$item['id_country']?>"><?= $item['name_country'] ?></option>

                   <?php } 
                ?>
            </select> <br> <br>
            <!-- Выбор жанра -->
            <select name="genre" id="">

                    <!-- <option value="0">Выберите что хотите заказать </option> -->
                <?php
                    foreach($genres->getAll() as $item) {
                ?>
                        
                        <option value="<?=$item['id_genre']?>"><?= $item['name_genre'] ?></option>

                   <?php } 
                ?>
            
            </select> <br> <br>
            <!-- Выбор жанра -->
            <select name="id" id="">

                    <!-- <option value="0">Выберите что хотите заказать </option> -->
                <?php
                    foreach($movies->getAll() as $item) {
                ?>
                        
                        <option value="<?=$item['id_movie']?>"><?=$item['id_movie']?></option>

                   <?php } 
                ?>  
            </select><br> <br>
            <input type="submit" name="search" value='поиск'>  
    </form>
    
    <div class="c">
    <?php
            if(isset($_GET["search"])) {

                $movies ->id_country = $_GET["country"];
                $movies ->id_genre = $_GET["genre"];
                $movies ->id_movie = $_GET["id"];
                
                $movie = $movies->search();
                // print_r($movie);
                if($movie[0] != "") {
                    
                
                foreach($movie as $item) {
                ?>

                    <div class="card" style="width: 18rem;">
                        <div class="card-body">

                            <h4 class="card-text" > <?=$item['name']?></h4>
                            <p> Режиссер: <?=$item['director']?></p>
                            <p> <?=$item['year']?> год выпуска</p>
                            <p> <?=$item['time']?>МИНУТ </p>
                            <img src='assets/<?=$item['poster']?>' alt="">
                        </div>
                        </div>`
                <?php 
            }  } } ;
            ?>

    </div>
</div>


</div>
<?php

require_once 'Design\footer.php';
?>