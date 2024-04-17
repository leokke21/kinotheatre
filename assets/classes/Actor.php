<?php

class Actor
{
    //Переменная подключения БД и имя первой таблицы
    public Db $conn;
    private $tablname = "actors";

    //поля таблицы
    public $id_actor;
    public $name_actor;
    public $foto;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Создаются все методы для работы с таблицей

    //получение всех записей
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->tablname;
        $stmt = $this->conn->query($query);
        return $stmt;
    }
    //получение по имени
    public function getByName($name)
    {
        $query = "SELECT * FROM " . $this->tablname." WHERE name_actor LIKE ?";
        $stmt = $this->conn->query($query, ["%".$name."%"])->fetchAll();
        return $stmt;
    }
    //получение 1  по ID
    public function readName($id)
    {
        $id +=1;
        $query = "SELECT * FROM ".$this ->tablname." WHERE id_actor = ?";
        $stmt = $this->conn->query($query, [$id]);
        return $stmt;
    }
    
    // проверка на совпадение  при вводе
    function proverka($nameactor)
    {
        $query = "SELECT COUNT(*) AS kol FROM " . $this->tablname . " WHERE name_actor ='$nameactor'";
        $result = $this->conn->query($query)->fetchAll();
        return $result;
    }


    //создание нового 
    function create()
    {
        $query = "INSERT INTO " . $this->tablname . " (name_actor, foto) VALUES(?, ?)";
        $stmt = $this->conn->query($query, [$this->name_actor, $this->foto]);
            return true;
    }

    //количество записей
    function numberActors()
    {
        $query = "SELECT COUNT(*) AS kol FROM $this->tablname ";
        $result = $this->conn->query($query)->fetch(PDO::FETCH_ASSOC);
        return $result['kol'];
    }

    // удаление записи
    function delete($id)
    {
        $this->id_actor = $id;
        $query = "DELETE FROM " . $this->tablname . " WHERE id_actor = ?";
        $stmt = $this->conn->query($query, [ $this->id_actor]);
            return true;
    }

    //Редактирование записи
    function Edit($id)
    {
        $this->id_actor = $id;
        $query = "UPDATE " . $this->tablname .
            " SET name_actor =?, foto = ?  WHERE id_actor =?";

        $stmt = $this->conn->query($query, [$this->name_actor, $this->foto, $this->id_actor]);
            return true;
    }
}
