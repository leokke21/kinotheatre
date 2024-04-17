<?php
class Movie
{
    // Переменная БД  PDO
    public Db $Pdo;
    // Названия таблиц
    // private $tableName = 'Kinotheatre';
    private $tablnamemovies = 'movies';
    private $tablnamecountry = 'countries';
    private $tablnamegenres = 'genres';

// Поля таблицы 
public $id_movie;
public $name;
public $director;
public $poster;
public $year;
public $time;
public $content;
public $budget;
public $id_country;
public $id_genre;
    public function __construct($db)
    {
        $this->Pdo = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_genre = c.id_genre AND a.id_country = b.id_country ORDER BY id_movie DESC";
        $stmt = $this->Pdo->query($query);
        return $stmt;
    }

    public function getById($id) {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_genre = c.id_genre AND a.id_country = b.id_country AND a.id_movie = $id";
        $stmt = $this->Pdo->query($query)->fetchAll();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO ".$this->tablnamemovies."(name,director,poster,year,time,content,budget,id_country,id_genre) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $this->Pdo->query($query,[$this->name,$this->director,$this->poster,$this->year,$this->time,$this->content,$this->budget,$this->id_country, $this->id_genre,]);
        return true;
        
    }
    function Edit($id)
    {
        $this->id_movie = $id;
        $query = "UPDATE ".$this->tablnamemovies." SET name =? ,director =? ,poster =? ,year =? ,time =? ,content =? ,budget=?,id_country =? ,id_genre =? WHERE id_movie = ?";
        $this->Pdo->query($query,[$this->name,$this->director,$this->poster,$this->year,$this->time,$this->content,$this->budget,$this->id_country, $this->id_genre, $this->id_movie]);
        return true;
    }
    function proverka($name)
    {
        $query = "SELECT COUNT(*) AS kol FROM " . $this->tablnamemovies . " WHERE name ='$name'";
        $result = $this->Pdo->query($query)->fetchAll();
        return $result;
    }
    public function getByName($name) {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_genre = c.id_genre AND a.id_country = b.id_country AND a.name LIKE ? ORDER BY id_movie DESC ";
        $stmt = $this->Pdo->query($query,["%".$name."%"])->fetchAll();
        return $stmt;
    }
    public function getByCountry($name) {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_country = b.id_country AND a.id_genre = c.id_genre AND  b.name_country  LIKE ? ORDER BY id_movie DESC ";
        $stmt = $this->Pdo->query($query,["%".$name."%"])->fetchAll();
        return $stmt;
    }
    public function getByGenre($name) {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_country = b.id_country AND a.id_genre = c.id_genre AND  c.name_genre LIKE ? ORDER BY id_movie DESC ";
        $stmt = $this->Pdo->query($query,["%".$name."%"])->fetchAll();
        return $stmt;
    }
    public function search() {
        $query = "SELECT * FROM ".$this ->tablnamemovies." a,".$this ->tablnamecountry." b , ".$this ->tablnamegenres." c WHERE a.id_country = b.id_country AND a.id_genre = c.id_genre AND  c.id_genre = ? AND b.id_country  = ? AND a.id_movie  = ? ORDER BY id_movie DESC ";
        $stmt = $this->Pdo->query($query,[$this->id_genre, $this->id_country, $this->id_movie])->fetchAll();
        return $stmt;
    }
    
// запросы

    
    
    function mega_join () {
        $result = "SELECT movies.*, countries.name_country, genres.name_genre, actors.name_actor, GROUP_CONCAT(actors.name_actor SEPARATOR '<br>')  as actors
        FROM actors,actor_movie, countries, genres, movies WHERE movies.id_country = countries.id_country 
                          and movies.id_movie = actor_movie.id_movie and actor_movie.id_actor = actors.id_actor and movies.id_genre = genres.id_genre
        GROUP BY movies.id_movie";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    function mega_join_while ($WHERE) {
        $result = "SELECT movies.*, countries.name_country, genres.name_genre, actors.name_actor, GROUP_CONCAT(actors.name_actor SEPARATOR '<br>')  as actors
    FROM actors,actor_movie, countries, genres, movies WHERE movies.id_country = countries.id_country 
                      and movies.id_movie = actor_movie.id_movie and actor_movie.id_actor = actors.id_actor and movies.id_genre = genres.id_genre and $WHERE
                      GROUP BY movies.id_movie";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    
    function mega_join_while_group ($WHERE ,$group) {
        $result = "SELECT movies.*, countries.name_country, genres.name_genre, actors.name_actor, GROUP_CONCAT(actors.name_actor SEPARATOR '<br>')  as actors
    FROM actors,actor_movie, countries, genres, movies WHERE movies.id_country = countries.id_country 
                      and movies.id_movie = actor_movie.id_movie and actor_movie.id_actor = actors.id_actor and movies.id_genre = genres.id_genre and $WHERE
                      GROUP BY movies.id_movie 
                      ORDER BY $group";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    function mega_join_low_budget ($group) {
        $result = "SELECT movies.*, countries.name_country, genres.name_genre, actors.name_actor, GROUP_CONCAT(actors.name_actor SEPARATOR '<br>')  as actors
    FROM actors,actor_movie, countries, genres, movies WHERE movies.id_country = countries.id_country 
                      and movies.id_movie = actor_movie.id_movie and actor_movie.id_actor = actors.id_actor and movies.id_genre = genres.id_genre
                      GROUP BY movies.id_movie 
                      ORDER BY $group limit 10";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    
    
    function mega_join_low_budget1 ($group) {
        $result = "SELECT movies.*, countries.name_country, genres.name_genre, actors.name_actor, GROUP_CONCAT(actors.name_actor SEPARATOR ', ')  as actors
    FROM actors,actor_movie, countries, genres, movies WHERE movies.id_country = countries.id_country 
                      and movies.id_movie = actor_movie.id_movie and actor_movie.id_actor = actors.id_actor and movies.id_genre = genres.id_genre
                      GROUP BY countries.name_country
                      ORDER BY $group ";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    
    function join_group ($elem) {
        $result = "SELECT movies.*, countries.id_country, countries.name_country, $elem FROM countries , movies WHERE movies.id_country = countries.id_country   GROUP BY name_country--";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    
    function join_group2 ($elem) {
        $result = "SELECT movies.*, genres.name_genre, $elem FROM genres , movies WHERE movies.id_genre = genres.id_genre   GROUP BY name_genre--";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }
    function join_group3 ($elem) {
        $result = "SELECT movies.*, actor_movie.*, actors.name_actor, $elem FROM actors , actor_movie , movies WHERE movies.id_movie = actor_movie.id_movie and actor_movie.id_actor = actors.id_actor    GROUP BY name_actor--";
        $stmt = $this->Pdo->query($result);
        return $stmt;
    }

    // public function getPorodaAll() {
    //     $res = $this->PDO->query("SELECT poroda FROM $this->tableName GROUP BY poroda")->findAll();
    //     return array_map(function ($el) {
    //         return $el['poroda'];
    //     }, $res);
    // }
    // public function getDogsByPoroda($poroda) {
    //     return $this->PDO->query("SELECT id FROM $this->tableName WHERE poroda = ?", [$poroda])->findAll();
    // }

    // public function add($name,$poroda, $age, $owner, $photo) {
    //     $query = "INSERT INTO $this->tableName (`name`, `poroda`, `age`, `owner`, `photo`) VALUES (?,?,?,?,?)";
    //     return $this->PDO->queryAdd($query, [ $name,$poroda, $age, $owner, $photo]);
    // }

}