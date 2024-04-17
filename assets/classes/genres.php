<?php

class Genre
{
    //Переменная подключения БД и имя первой таблицы
    public Db $Pdo;
    private $tablname = "genres";
    private $tablnameMovies = "movies";

    //поля таблицы
    public $id_genre;
    public $name_genre;

    public function __construct($db)
    {
        $this->Pdo = $db;
    }

    //Создаются все методы для работы с таблицей

    //получение всех записей
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->tablname;
        $stmt = $this->Pdo->query($query)->fetchAll();
        return $stmt;
    }
    //получение по имени
    public function getByName($name)
    {
        $query = "SELECT * FROM " . $this->tablname." a,".$this ->tablnameMovies." b WHERE a.id_genre = b.id_genre AND name_genre LIKE ?";
        $stmt = $this->Pdo->query($query, ["%".$name."%"])->fetchAll();
        return $stmt;
    }
    //получение 1  по ID
    public function readName($id)
    {
        $id +=1;
        $query = "SELECT * FROM ".$this ->tablname." WHERE id_genre = ?";
        $stmt = $this->Pdo->query($query, [$id]);
        return $stmt;
    }
    
    // проверка на совпадение  при вводе
    function proverka($namegenre)
    {
        $query = "SELECT COUNT(*) AS kol FROM " . $this->tablname . " WHERE name_genre ='$namegenre'";
        $result = $this->Pdo->query($query)->fetchAll();
        return $result;
    }


    //создание нового 
    function create()
    {
        $query = "INSERT INTO " . $this->tablname . " (name_genre) VALUES(?)";
        $this->Pdo->query($query, [$this->name_genre]);
            return true;
    }

    // //количество записей
    // function numberActors()
    // {
    //     $query = "SELECT COUNT(*) AS kol FROM $this->tablname ";
    //     $result = $this->Pdo->query($query)->fetch(PDO::FETCH_ASSOC);
    //     return $result['kol'];
    // }

    // удаление записи
    function delete($id)
    {
        $this->id_genre = $id;
        $query = "DELETE FROM " . $this->tablname . " WHERE id_genre = ?";
        $this->Pdo->query($query, [$this->id_genre]);
            return true;
    }

    //Редактирование записи
    function Edit($id)
    {
        $this->id_genre = $id;
        $query = "UPDATE " . $this->tablname .
            " SET name_genre =? WHERE id_genre =?";

        $stmt = $this->Pdo->query($query, [$this->name_genre, $this->id_genre] );
        
            return true;
    }
}
