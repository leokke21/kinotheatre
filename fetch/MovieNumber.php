<?php

include_once __DIR__ .'/../assets/classes/Movies.php';
include_once __DIR__ .'/../assets/classes/database.php';


$id = $_GET['id'];
$Movie = new Movie(new Db);
echo json_encode($Movie->getById($id));