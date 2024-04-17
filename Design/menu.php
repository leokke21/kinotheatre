<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="Design/style/style.css">
</head>
<body>
    <?php
    // Подключение классов
    require_once "assets/classes/database.php";

        require_once 'assets/classes/Actormovie.php';
        require_once 'assets/classes/Movies.php';
        require_once 'assets/classes/Actor.php';
        require_once 'assets/classes/genres.php';
        require_once 'assets/classes/Country.php';
    // Экземпляры классов
    $db = new Db();
    $actormovie = new Actormovie($db);
    $movies = new Movie($db);
    $actor = new Actor($db);
    $genres = new Genre($db);
    $countries = new Country($db);

    ?>
    
    <nav class="nav pb-5">
        <ul>
            <!-- Логотип -->
            <li><a href="#"><img src="../assets/img/ikonka.jpg" alt="логотип" class="logo"></a></li>
            <!-- Навигация -->
            <li><a href="..\index.php">Главная</a></li>
            <li><a href="..\aficha.php">Афиша</a></li>
            <li><a href="..\actors.php">Актеры</a></li>

            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Запросы
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="..\zaprosy1.php">Запросы 1</a></li>
                    <li><a class="dropdown-item" href="..\zaprosy2.php">Запросы 2</a></li>
                    <li><a class="dropdown-item" href="..\zaprosy3.php">Запросы 3</a></li>
                </ul>
            </div>

            
            <li><a href="..\page.php">&#127917;/&#127758</a></li>


            <!-- ВЫпадающий список -->

            <li><a href="#">Выбор</a>
            <ul>
                <li><a href="..\afichanomer.php">По номеру</a></li>
                <li><a href="..\choiseCountry.php">По стране</a></li>
                <li><a href="..\choiseGenre.php">По жанру</a></li>
                <li><a href="..\choiseActor.php">по актеру</a></li>
                <li><a href="..\choiseThree.php">3 выбора</a></li>
            </ul>
        </li>
            <li><a href="../admin/adminIndex.php">Админка</a></li>
            
        </ul>
    </nav>
  