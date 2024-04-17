<?php
require_once 'Design\menu.php';
?>


<h1>НАШИ АКТЕРЫ</h1>
<div class='cards'>
    <?php
    foreach ($actor->getAll() as $key => $item) {
        ?>
        <div class="card" style="width: 18rem;"  >
            <div class="card-body">
                
                <h4 class="card-text" > <?= $item['name_actor'] ?></h4>
                <a href="<?="clickActor.php?id_actor=$key"?>"><img src='assets/<?= $item['foto'] ?>' alt=""> </a>
            </div>

        </div>
        <?php
    }
    ?>

</div>
<?php

require_once 'Design\footer.php';
?>