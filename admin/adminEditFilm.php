<?php  require_once "adminMenu.php" ?>

    <!-- Основной контент -->
    <?php 
    
    $movie = $movies->getById($_GET['submit-edit'])[0]  ?>
    <?php 
        // print_r( $movie );
        // echo $movie['year'];
    ?>

<div class="new">
    <h3>Изменение фильма №<?php echo $_GET['submit-edit'] ?></h3>
    <hr>
    <form action="" method="post" class="fs-4" enctype="multipart/form-data">

            <input type="text" class="form-control fs-5" placeholder="Введите название Фильма" name="name" title="Вводим только на русском языке" required value = '<?= $movie['name'] ?>'>
            <input type="text" class="form-control fs-5" placeholder="Введите режжисера Фильма" name="director" pattern="^[А-Яф-яЁё]+${1,50}" title="Вводим только на русском языке" required value= '<?= $movie['director'] ?>'>
            <br>
            <!-- Выбор страны -->
            <select name="country" id="">

                    <!-- <option value="0">Выберите что хотите заказать </option> -->
                <?php
                    foreach($countries->getAll() as $item) {
                ?>
                        
                        <option 
                        value="<?=$item['id_country']?>" 
                        <?php
                            if($item['id_country'] == $movie['id_country']) {
                                echo 'selected';
                            }
                        ?>
                        >
                        <?= $item['name_country'] ?>
                        </option>
                        
                   <?php 
                   } 
                ?>
            </select> <br> <br>
            <!-- Выбор жанра -->
            <select name="genre" id="">

                    <!-- <option value="0">Выберите что хотите заказать </option> -->
                <?php
                    foreach($genres->getAll() as $item) {
                ?>
                        
                        <option value="<?=$item['id_genre']?>"
                        <?php
                            if($item['id_genre'] == $movie['id_genre']) {
                                echo 'selected';
                            }
                        ?>>

                        <?= $item['name_genre'] ?>
                    </option>

                   <?php } 
                ?>
            </select> <br> <br>
            <input type="number" class="form-control fs-5" placeholder="Введите Год создания" name="year" title="Вводим только на русском языке" required value= '<?= $movie['year'] ?>' >
            <input type="number" class="form-control fs-5" placeholder="Введите Продолжительность" name="time" pattern="^[0-9]+${1,50}" title="Вводим только на русском языке" required value= '<?= $movie['time'] ?>' >
            <input type="text" class="form-control fs-5" placeholder="Введите Описание" name="description"  title="Вводим только на русском языке" required value= '<?= $movie['content'] ?>' >
            <input type="number" class="form-control fs-5" placeholder="Введите Бюджет" name="budget" pattern="^[0-9]+${1,50}" title="Вводим только на русском языке" required value= '<?= $movie['budget'] ?>' >
        <input type="file" name="addfile"  >
        <p>
            
        </p>
        <p>
            <button type="submit" name="update-movie" class="form-control btn btn-success fs-5">&#10133; Изменить Фильм</button>
        </p>
    </form>
</div>
<div class="poster">
    <h2>Постер</h2>
    <img src="../assets/<?= $movie['poster'] ?>" alt="" class='imgPoster'>
</div>
            
</main>

<?php
// create

if(isset($_POST['update-movie'])) {

    // Присвоение значений переменным
    // echo "w";
    $movies ->id_country =$_POST['country'];
    $movies ->id_genre =$_POST['genre'];

    $movies ->name =$_POST['name'];
    $movies ->director =$_POST['director'];

    $movies ->year =$_POST['year'];
    $movies ->time =$_POST['time'];

    $movies ->content =$_POST['description'];
    $movies ->budget =$_POST['budget'];
    $movies ->poster =$movie['poster'];
    // poster
    if(($_FILES['addfile']['name']) != '') {
        $path = $_FILES['addfile']['name'];
        move_uploaded_file($_FILES['addfile']['tmp_name'],'../assets/img/'.$path);
        $movies ->poster ='img/'.$path;
        
        // echo "o";
    }
    $movies ->Edit($_GET['submit-edit']);
    // echo ("<meta hhtp-equiv='refresh' content = '1'>");


    // // костыль foreach;
    // foreach($movies->proverka($_POST['name']) as $item) {
        
    //     // echo "r";
    //     // echo($movies ->poster);
    //     if($item["kol"] ==0) {
    //         // echo "k";
    //         // echo `
    //         // <div class="alert alert-danger" role="alert">
    //         //     Фильм  есть в БД! 
    //         // </div>`;
    //         // echo `<div class="alert alert-danger" > 12345</div>`;
    //         exit;
    //     } else {
    //         if ($movies ->Edit($_GET['submit-edit'])) {
    //             // echo `
    //             // <div class="alert alert-success" role="alert">
    //             //     <b> Фильм `.$movies ->name.` Добавлен </b>
    //             // </div>`;
    //         }
    //     }
    
    // }
    
}
?>
<?php  require_once "adminFooter.php" ?>