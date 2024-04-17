<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="../Design/style/Admin.css">
</head>
<body>
    <?php  require_once "adminClasses.php" ?>
    <header>
        <a href="../index.php"><img src="../assets/img/ikonka.jpg" alt="логотип" class="logo" > </a> 
        <h1>АДМИНКА: НАШИ ФИЛЬМЫ</h1>
    </header>
    <div class="content">

    <!-- навигационное меню слева -->
    <nav>
        <a href="#"><h2>Данные</h2></a>
        <hr>
        <a href="adminCountry.php" class="link"><p>Страны</p> <img src="../assets/img/вправо.png" alt="перейти" class="right"></a>
        <a href="adminGenres.php" class="link"><p>Жанры</p> <img src="../assets/img/вправо.png" alt="перейти" class="right"></a>
        <a href="adminActors.php" class="link"><p>Все актеры</p> <img src="../assets/img/вправо.png" alt="перейти" class="right" ></a>
        <hr>
        <a href="adminFilms.php"><h2>Фильмы</h2></a>
        <hr>
        <a href="adminFilms.php"><p>Все фильмы</p></a>
        <a href="adminAddFilm.php"><p>Добавить фильм</p></a>
        <hr>
        <a href="adminActorMovies.php">Актеры и фильмы</a>
    </nav>

    