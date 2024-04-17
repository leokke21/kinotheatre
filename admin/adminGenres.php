<?php  require_once "adminMenu.php" ?>

<main>
    <!-- Основной контент -->
    <h1>Все Жанры</h1>
    <table>
        <tr>
        <th>Номер</th>
        <th>жанр</th>
        <th colspan = "2">Действия</th>
        <!-- <button class="change-button">Изменить</button>
        <button class="delete-button">Удалить</button>       -->
        </tr>
        <?php
        
            foreach ($genres->getAll() as $key => $item) {
                ?>
                
                <tr>
                        <td><?= $item['id_genre'] ?></td>
                        <td><?= $item['name_genre'] ?></td>
                        <td>
                            <form action="#" method="get">
                                <button
                                    type="submit"
                                    name="submit-edit"
                                    class="btn btn-primary"
                                    value="<?= $item['id_genre'] ?>"
                                > &#128397;
                                    Редактировать
                                </button>
                                
                            </form>
                        </td>

                        <td>
                            <form action="#" method="get">
                                <button
                                    type="submit"
                                    name="submit-delete"
                                    class="btn text-bg-danger"
                                    value="<?= $item['id_genre'] ?>"
                                > &#128465;
                                    Удалить
                                </button>
                                
                            </form>
                        </td>
                    </tr>
                <?php
            }
            ?>
            </table>  
            
</main>
<div class="new">
    <h3>Добавление нового жанра</h3>
    <hr>
    <form action="" method="Get" class="fs-4">
        <p>
            <input type="text" class="form-control fs-5" placeholder="Введите название жанр" name="genre" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required>
        </p>
        <p>
            <button type="submit" name="addgenre" class="form-control btn btn-success fs-5">&#10133; Добавить жанр</button>
        </p>
    </form>
</div>


<?php


// update
if(isset($_GET['submit-edit'])) {
    $ID = $_GET['submit-edit'];
    $genres->readName($ID);
?>
<div class="update">
    <h3>Изменить название жанра</h3>
    <hr>
    <form action="" method="post" class="fs-4">
        <p>
            <input type="text" class="form-control fs-5" placeholder="Введите название жанра" name="genre" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required value="<?=$genres->name_genre ?>">
        </p>
        <p>
            <input type="hidden" name='Hid' value= <?= $ID ?>>
            <button type="submit" name="submitUpdate" class="form-control btn btn-success fs-5">&#128190; Изменить название жанр</button>
        </p>
    </form>
</div>
<?php
}
if( isset($_POST['submitUpdate'])) {
    $genres->name_genre = $_POST['genre'];

    // costyle foreach
    foreach($genres->proverka($_POST['genre']) as $item) {
        
        
        // if($item["kol"] ==0) {
            $ID = $_POST['Hid'];
        // }
        if($genres->Edit($ID)) {
            echo `
            <div class="alert alert-success" role="alert">
                <b> жанр  изменена успешно </b>
            </div>`;
            echo ("<meta hhtp-equiv='refresh' content = '5'>");
        } else {
            echo `<div class="alert alert-warning" role="alert">
                <b> Ошибка</b>
            </div>`;
        }
    }
}
?>



<?php
// echo $_POST['addgenre'];

// create
    if(isset($_GET['addgenre'])) {
        $name_genre = $_GET['genre'];

        // костыль foreach;
        foreach($genres->proverka($_GET['genre']) as $item) {
            
            
            if($item["kol"] !=0) {
                echo `
                <div class="alert alert-danger" role="alert">
                    Данный жанр `.$_GET["genre"].` есть в БД!
                </div>`;
                exit;
            } else {
                $genres->name_genre = $name_genre;
                if ($genres ->create()) {
                    echo `
                    <div class="alert alert-success" role="alert">
                        <b> жанр `.$name_genre.` Добавлен </b>
                    </div>`;
                }
                else {
                    echo `
                    <div class="alert alert-warning" role="alert">
                        <b> произошла ошибка! </b>
                    </div>`;
                }
            }
        
        }


        
    }
    // delete
    if (isset($_GET['submit-delete'])) {
        $ID = $_GET['submit-delete'];
        if ($genres -> delete($ID)) {
            echo `
            <div class="alert alert-success" role="alert">
                <b> жанр  Удален </b>
            </div>`;
            echo (`<head>
            <meta http-equiv="refresh" content="1">
          </head>`);
        }
    }

    
?>
<!-- конец -->
</div>
</body>
</html>