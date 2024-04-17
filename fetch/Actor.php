<?php

include_once __DIR__ .'/../assets/classes/Actor.php';
include_once __DIR__ .'/../assets/classes/database.php';


$name = $_GET['name'];
$Actor = new Actor(new Db);
echo json_encode($Actor->getByName($name));