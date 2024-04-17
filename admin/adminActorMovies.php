<?php  require_once "adminMenu.php" ?>

<main>
    <!-- Основной контент -->
    <h1>Все Актеры</h1>
    <table>
        <tr>
        <th>Актер</th>
        <th>Фото</th>
        <th>Фильм</th>
        <th>Постер</th>
        <th colspan = "2">Действия</th>
        <!-- <button class="change-button">Изменить</button>
        <button class="delete-button">Удалить</button>       -->
        </tr>
        <?php
        
            foreach ($actormovie->getAll() as $key => $item) {
                ?>
                
                <tr>
                        <td><?= $item['name_actor'] ?></td>
                        <td><img src="../assets/<?= $item['foto'] ?>" class="image" alt=""> </td>
                        <td><?= $item['name'] ?></td>
                        <td><img src="../assets/<?= $item['poster'] ?>" class="image" alt=""> </td>
                        <td>
                            <form action="#" method="get">
                                <button
                                    type="submit"
                                    name="submit-edit"
                                    class="btn btn-primary"
                                    value="<?= $item['id'] ?>"
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
                                    value="<?= $item['id'] ?>"
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
    <h3>Добавление новой Связи</h3>
    <hr>
    <form action="" method="get" class="fs-4" enctype="multipart/form-data">

            <!-- Выбор страны -->
            <select name="movie" id="">

            <?php
            foreach($movies->getAll() as $item) {
            ?>

                <option value="<?=$item['id_movie']?>"><?= $item['name'] ?></option>
            
            <?php } 
            ?>
            </select> <br> <br>

            <!-- Выбор жанра -->
            <select name="actor" id="">
            
            <!-- <option value="0">Выберите что хотите заказать </option> -->
            <?php
            foreach($actor->getAll() as $item) {
            ?>

                <option value="<?=$item['id_actor']?>"><?= $item['name_actor'] ?></option>
            
            <?php } 
            ?>
            </select> <br> <br>

            <button type="submit" name="submitCreate" class="form-control btn btn-success fs-5">&#128190; Добавить </button>
            
    </form>
</div>


<?php

// create

if(isset($_GET['submitCreate'])) {

    // Присвоение значений переменным

    $actormovie ->id_actor =$_GET['actor'];
    $actormovie ->id_movie =$_GET['movie'];
    $actormovie ->create();

    
} 

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
if( isset($_GET['submitUpdate'])) {
    $actor->name_actor = $_GET['actor'];

    $path = $_FILES['addfile']['name'];
    move_uploaded_file($_FILES['addfile']['tmp_name'],'../assets/img/'.$path);

    // costyle foreach
    foreach($actor->proverka($_GET['actor']) as $item) {
        
        
        // if($item["kol"] ==0) {
            $ID = $_GET['Hid'];
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

 // delete
 if (isset($_GET['submit-delete'])) {
    $ID = $_GET['submit-delete'];
    $actormovie -> delete($ID);
}
?>