<?php  require_once "adminMenu.php" ?>

<main>
    <!-- Основной контент -->
    <h1>Все Актеры</h1>
    <table>
        <tr>
        <th>Номер</th>
        <th>Актер</th>
        <th>Фото</th>
        <th colspan = "2">Действия</th>
        <!-- <button class="change-button">Изменить</button>
        <button class="delete-button">Удалить</button>       -->
        </tr>
        <?php
        
            foreach ($actor->getAll() as $key => $item) {
                ?>
                
                <tr>
                        <td><?= $item['id_actor'] ?></td>
                        <td><?= $item['name_actor'] ?></td>
                        <td><img src="../assets/<?= $item['foto'] ?>" class="image" alt=""> </td>
                        <td>
                            <form action="#" method="get">
                                <button
                                    type="submit"
                                    name="submit-edit"
                                    class="btn btn-primary"
                                    value="<?= $item['id_actor'] ?>"
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
                                    value="<?= $item['id_actor'] ?>"
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
    <h3>Добавление нового Актера</h3>
    <hr>
    <form action="" method="post" class="fs-4" enctype="multipart/form-data">
        <p>
            <input type="text" class="form-control fs-5" placeholder="Введите имя Актера" name="actor" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required>
        </p>
        <input type="file" name="addfile" required>
        <p>
            <button type="submit" name="addactor" class="form-control btn btn-success fs-5">&#10133; Добавить Актера</button>
        </p>
    </form>
</div>


<?php

 
// update
if(isset($_GET['submit-edit'])) {
    $ID = $_GET['submit-edit'];
    $actor->readName($ID);
?>
<div class="update">
    <h3>Изменить название Актера</h3>
    <hr>
    <form action="" method="post" class="fs-4">
        <p>
            <input type="text" class="form-control fs-5" placeholder="Введите название Актера" name="actor" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required value="<?=$actor->name_actor ?>">
        </p>
        <input type="file" name="editfile" required>
        <p>
            <input type="hidden" name='Hid' value= <?= $ID ?>>
            <button type="submit" name="submitUpdate" class="form-control btn btn-success fs-5">&#128190; Изменить название </button>
        </p>
    </form>
</div>
<?php
}
if( isset($_POST['submitUpdate'])) {
    $actor->name_actor = $_POST['actor'];

    $path = $_FILES['addfile']['name'];
    move_uploaded_file($_FILES['addfile']['tmp_name'],'../assets/img/'.$path);

    // costyle foreach
    foreach($actor->proverka($_POST['actor']) as $item) {
        
        
        // if($item["kol"] ==0) {
            $ID = $_POST['Hid'];
            $actor->foto = 'img/'.$path;
        // }
        if($actor->Edit($ID)) {
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
// echo $_POST['addactor'];

// create
    if(isset($_POST['addactor'])) {
        $name_actor = $_POST['actor'];

        $path = $_FILES['addfile']['name'];
        move_uploaded_file($_FILES['addfile']['tmp_name'],'../assets/img/'.$path);
        // костыль foreach;
        foreach($actor->proverka($_POST['actor']) as $item) {
            
            
            if($item["kol"] !=0) {
                echo `
                <div class="alert alert-danger" role="alert">
                    Данный Актер `.$_POST["actor"].` есть в БД!
                </div>`;
                exit;
            } else {
                $actor->name_actor = $name_actor;
                $actor->foto = 'img/'.$path;
                if ($actor ->create()) {
                    echo `
                    <div class="alert alert-success" role="alert">
                        <b> Актер `.$name_actor.` Добавлен </b>
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
        if ($actor -> delete($ID)) {
            echo `
            <div class="alert alert-success" role="alert">
                <b> Актер  Удален </b>
            </div>`;
            echo ("<meta hhtp-equiv='refresh' content = '5'>");
        }
    }

    
?>
<!-- конец -->
</div>
</body>
</html>