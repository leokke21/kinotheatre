<?php

class Country
{
    //Переменная подключения БД и имя первой таблицы
    public Db $Pdo;
    private $tablname = "countries";
    private $tablnameMovies = "movies";

    //поля таблицы
    public $id_country;
    public $name_country;

    public function __construct($db)
    {
        $this->Pdo = $db;
    }

    //Создаются все методы для работы с таблицей

    //получение всех записей
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->tablname;
        $stmt = $this->Pdo->query($query);
        return $stmt;
    }
    //получение по имени
    public function getByName($name)
    {
        $query = "SELECT * FROM " . $this->tablname." a,".$this ->tablnameMovies." b WHERE a.id_country = b.id_country AND name_country LIKE ?";
        $stmt = $this->Pdo->query($query, ["%".$name."%"])->fetchAll();
        return $stmt;
    }
    //получение 1  по ID
    public function readName($id)
    {
        $id +=1;
        $query = "SELECT * FROM ".$this ->tablname." WHERE id_country = ?";
        $stmt = $this->Pdo->query($query, [$id]);
        return $stmt;
    }
    
    // проверка на совпадение  при вводе
    function proverka($namecountry)
    {
        $query = "SELECT COUNT(*) AS kol FROM " . $this->tablname . " WHERE name_country ='$namecountry'";
        $result = $this->Pdo->query($query)->fetchAll();
        return $result;
    }


    //создание нового 
    function create()
    {
        $query = "INSERT INTO " . $this->tablname . " (name_country) VALUES(?)";
        $this->Pdo->query($query, [$this->name_country]);
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
        $this->id_country = $id;
        $query = "DELETE FROM " . $this->tablname . " WHERE id_country = ?";
        $this->Pdo->query($query, [$this->id_country]);
            return true;
    }

    //Редактирование записи
    function Edit($id)
    {
        $this->id_country = $id;
        $query = "UPDATE " . $this->tablname .
            " SET name_country =? WHERE id_country =?";

        $stmt = $this->Pdo->query($query, [$this->name_country, $this->id_country] );
        
            return true;
    }
}
