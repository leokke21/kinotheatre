<?php  require_once "adminMenu.php" ?>

    <!-- Основной контент -->
    
<div class="new">
    <h3>Добавление нового Фильма</h3>
    <hr>
    <form action="" method="post" class="fs-4" enctype="multipart/form-data">

            <input type="text" class="form-control fs-5" placeholder="Введите название Фильма" name="name" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required>
            <input type="text" class="form-control fs-5" placeholder="Введите режжисера Фильма" name="director" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required>
            <br>
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
            <input type="number" class="form-control fs-5" placeholder="Введите Год создания" name="year" pattern="^[0-9]+${4,4}" title="Вводим только на русском языке" required>
            <input type="number" class="form-control fs-5" placeholder="Введите Продолжительность" name="time" pattern="^[0-9]+${1,50}" title="Вводим только на русском языке" required>
            <input type="text" class="form-control fs-5" placeholder="Введите Описание" name="description"  title="Вводим только на русском языке" required>
            <input type="number" class="form-control fs-5" placeholder="Введите Бюджет" name="budget" pattern="^[0-9]+${1,50}" title="Вводим только на русском языке" required>
        <input type="file" name="addfile" required>
        <p>
            <button type="submit" name="addmovie" class="form-control btn btn-success fs-5">&#10133; Добавить Фильм</button>
        </p>
    </form>
</div>

            
</main>

<?php
// create

if(isset($_POST['addmovie'])) {

    // Присвоение значений переменным

    $movies ->id_country =$_POST['country'];
    $movies ->id_genre =$_POST['genre'];

    $movies ->name =$_POST['name'];
    $movies ->director =$_POST['director'];

    $movies ->year =$_POST['year'];
    $movies ->time =$_POST['time'];

    $movies ->content =$_POST['description'];
    $movies ->budget =$_POST['budget'];

    // poster
    $path = $_FILES['addfile']['name'];
    move_uploaded_file($_FILES['addfile']['tmp_name'],'../assets/img/'.$path);
    $movies ->poster ='img/'.$path;


    // костыль foreach;
    foreach($movies->proverka($_POST['name']) as $item) {
        
        
        if($item["kol"] !=0) {
            // echo `
            // <div class="alert alert-danger" role="alert">
            //     Фильм  есть в БД! 
            // </div>`;
            // echo `<div class="alert alert-danger" > 12345</div>`;
            exit;
        } else {
            if ($movies ->create()) {
                // echo `
                // <div class="alert alert-success" role="alert">
                //     <b> Фильм `.$movies ->name.` Добавлен </b>
                // </div>`;
            }
        }
    
    }
}
?>
<?php  require_once "adminFooter.php" ?>