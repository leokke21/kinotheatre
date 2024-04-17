
<?php
require_once 'Design\menu.php';
?>


<h1>НАШИ ФИЛЬМЫ</h1>
<div class='cards'>
    <?php
    foreach ($movies->getAll() as $key => $item) {
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                
                <h4 class="card-text" > <?= $item['name'] ?></h4>
                <p> Режиссер: <?= $item['director'] ?></p>
                <p> <?= $item['year'] ?> год выпуска</p>
                <p> <?= $item['time'] ?>МИНУТ </p>
                <img src='assets/<?= $item['poster'] ?>' alt="">
            </div>

        </div>
        <?php
    }
    ?>

</div>

<?php

require_once 'Design\footer.php';
?>