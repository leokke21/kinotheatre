<?php
require_once 'Design\menu.php';
?>

<div class="card-menu">
    <p>Введите Название Жанра</p>
    <form action="" method = "get">
        <input id="card" type="text" name="genr"> <br>
        <input type= "submit" name="genre">Показать</input>
            
    </form>
    
    <div class="c">
    <?php
            if(isset($_GET["genr"])) {

            
                $name = $_GET['genr'];
                $movie = $movies->getByGenre($name);
                // print_r($movie);
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
            }  }  ;
            ?>

    </div>
</div>


<?php

require_once 'Design\footer.php';
?>