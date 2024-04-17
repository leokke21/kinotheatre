<?php
class Actormovie
{
    // Переменная БД  PDO
    public Db $Pdo;
    // Названия таблиц
    // private $tableName = 'Kinotheatre';
    
    private $tablnameactormovies = 'actor_movie';
    private $tablnamemovies = 'movies';
    private $tablnameactors = 'actors';

// Поля таблицы 

public $id;
public $id_movie;
public $id_actor;
    public function __construct($db)
    {
        $this->Pdo = $db;
    }

    // public function getAll() {
    //     $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_genre = c.id_genre AND a.id_country = b.id_country ORDER BY id_movie DESC";
    //     $stmt = $this->Pdo->prepare($query);
    //     $stmt->execute();
    //     return $stmt;
    // }

// Проверка на совпадение
    public function match_checking($id_movie, $id_actor) {
        $query = "SELECT COUNT(*) AS kol FROM".$this->tablnameactormovies." WHERE id_movie = '$id_movie' AND id_actor = '$id_actor'";
        $result = $this ->Pdo->query($query)->fetch(PDO::FETCH_ASSOC);
        if ($result['kol'] ==0)
            return true;
        else
            return false;
    }

    //получение всех записей
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->tablnamemovies." a, ". $this->tablnameactors." b, ".$this->tablnameactormovies ." c WHERE a.id_movie = c.id_movie AND b.id_actor = c.id_actor";
        $stmt = $this->Pdo->query($query);
        return $stmt;
    }
    public function getByActor($id_actor) {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnameactormovies." c WHERE a.id_movie = c.id_movie AND c.id_actor = $id_actor";
        $stmt = $this->Pdo->query($query)->fetchAll();
        return $stmt;
    }


        
    // проверка на совпадение  при вводе
    function proverka($actor)
    {
        $query = "SELECT COUNT(*) AS kol FROM " . $this->tablnameactormovies . " WHERE id_actor ='$actor'";
        $result = $this->Pdo->query($query)->fetchAll();
        return $result;
    }


    //создание нового 
    function create()
    {
        $query = "INSERT INTO " . $this->tablnameactormovies . " (id_actor, id_movie) VALUES(?, ?)";
        $this->Pdo->query($query, [$this->id_actor, $this->id_movie]);
            return true;
    }

    // удаление записи
    function delete($id)
    {
        $this->id_actor = $id;
        $query = "DELETE FROM " . $this->tablnameactormovies . " WHERE id_actor = ?";
        $this->Pdo->query($query, [$this->id_actor]);
            return true;
    }
}

?>