<?php

include_once __DIR__ .'/../assets/classes/Movies.php';
include_once __DIR__ .'/../assets/classes/database.php';


$name = $_GET['name'];
$Movie = new Movie(new Db);
echo json_encode($Movie->getByName($name));