<?php
// Подключение классов
    require_once "../assets/classes/database.php";

        require_once '../assets/classes/Actormovie.php';
        require_once '../assets/classes/Movies.php';
        require_once '../assets/classes/Actor.php';
        require_once '../assets/classes/Country.php';
        require_once '../assets/classes/genres.php';

    // Экземпляры классов
    $db = new Db();
    $actormovie = new Actormovie($db);
    $movies = new Movie($db);
    $actor = new Actor($db);
    $countries = new Country($db);
    $genres = new Genre($db);
?>