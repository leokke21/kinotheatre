<?php  require_once "adminMenu.php" ?>

<main>
    <!-- Основной контент -->
    <h1>Все страны</h1>
    <table>
        <tr>
        <th>Номер</th>
        <th>Страна</th>
        <th colspan = "2">Действия</th>
        <!-- <button class="change-button">Изменить</button>
        <button class="delete-button">Удалить</button>       -->
        </tr>
        <?php
        
            foreach ($countries->getAll() as $key => $item) {
                ?>
                
                <tr>
                        <td><?= $item['id_country'] ?></td>
                        <td><?= $item['name_country'] ?></td>
                        <td>
                            <form action="#" method="get">
                                <button
                                    type="submit"
                                    name="submit-edit"
                                    class="btn btn-primary"
                                    value="<?= $item['id_country'] ?>"
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
                                    value="<?= $item['id_country'] ?>"
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
    <h3>Добавление новой страны</h3>
    <hr>
    <form action="" method="Get" class="fs-4">
        <p>
            <input type="text" class="form-control fs-5" placeholder="Введите название страны" name="country" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required>
        </p>
        <p>
            <button type="submit" name="addCountry" class="form-control btn btn-success fs-5">&#10133; Добавить страну</button>
        </p>
    </form>
</div>


<?php


// update
if(isset($_GET['submit-edit'])) {
    $ID = $_GET['submit-edit'];
    $countries->readName($ID);
?>
<div class="update">
    <h3>Изменить название страны</h3>
    <hr>
    <form action="" method="post" class="fs-4">
        <p>
            <input type="text" class="form-control fs-5" placeholder="Введите название страны" name="country" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required value="<?=$countries->name_country ?>">
        </p>
        <p>
            <input type="hidden" name='Hid' value= <?= $ID ?>>
            <button type="submit" name="submitUpdate" class="form-control btn btn-success fs-5">&#128190; Изменить название страны</button>
        </p>
    </form>
</div>
<?php
}
if( isset($_POST['submitUpdate'])) {
    $countries->name_country = $_POST['country'];

    // costyle foreach
    foreach($countries->proverka($_POST['country']) as $item) {
        
        
        // if($item["kol"] ==0) {
            $ID = $_POST['Hid'];
        // }
        if($countries->Edit($ID)) {
            echo `
            <div class="alert alert-success" role="alert">
                <b> страна  изменена успешно </b>
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
// echo $_POST['addCountry'];

// create
    if(isset($_GET['addCountry'])) {
        $name_country = $_GET['country'];

        // костыль foreach;
        foreach($countries->proverka($_GET['country']) as $item) {
            
            
            if($item["kol"] !=0) {
                echo `
                <div class="alert alert-danger" role="alert">
                    Данная страна `.$_GET["country"].` есть в БД!
                </div>`;
                exit;
            } else {
                $countries->name_country = $name_country;
                if ($countries ->create()) {
                    echo `
                    <div class="alert alert-success" role="alert">
                        <b> страна `.$name_country.` Добавлена </b>
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
        if ($countries -> delete($ID)) {
            echo `
            <div class="alert alert-success" role="alert">
                <b> страна  Удалена </b>
            </div>`;
            echo ("<meta hhtp-equiv='refresh' content = '5'>");
        }
    }

    
?>
<!-- конец -->
</div>
</body>
</html>