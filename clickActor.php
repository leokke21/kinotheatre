<?php
require_once 'Design\menu.php';
?>


<h1>Актер</h1>
<div class='cards'>
    <?php
    $id_actor = $_GET['id_actor'];
    foreach ($actor->readName($id_actor) as $item ) {
        
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-text" > <?= $item["name_actor"] ?></h4>
                <img src='assets/<?= $item['foto'] ?>' alt="">
            </div>

        </div>
        <?php
    }
    ?>

</div>
<h1>Театр</h1>

<div class='cards'>
    <?php
    foreach ($actormovie->getByActor($id_actor) as $key => $item) {
        ?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                
                <h4 class="card-text" > <?= $item['name'] ?></h4>
                <p> Режиссер: <?= $item['director'] ?></p>
                <p> <?= $item['year'] ?> год выпуска</p>
                <p> <?= $item['time'] ?></p>
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