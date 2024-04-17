<?php
class Db
{
    public PDO $connection;
    private PDOStatement $stmt;
    public function __construct()
    {
        
            $host = 'localhost';
            $dbname = 'Kinotheatre';
            $username = 'root';
            $password = '';
            $charset = 'UTF8';
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
        
        $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";
        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        }
        catch (PDOException $e) {
            echo "Db error: {$e ->getMessage()}";
            die;
        }
    }

    public function query($query, $params = []) {
        $this->stmt = $this->connection ->prepare($query);
        $this->stmt->execute($params);
        return $this->stmt;
    }
    // public function quer($query) {
    //     $this->stmt = $this->connection ->prepare($query);
    //     $this->stmt->execute();
    //     return $this->stmt;
    // }
}
?>