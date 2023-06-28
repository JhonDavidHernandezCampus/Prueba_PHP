<?php
namespace Config;
use PDO;
use PDOException;

class Conexion{
    private $conx;
    protected static $setings = array(
        "mysql"=> Array(
            'driver'=> "mysql",
            'host'=> 'localhost',
            'username'=> 'root',
            'database'=> 'campuslands',
            'password'=> '3224757531', // remplazar esto por sus creedenciales
            'collation'=> 'utf8mb4_unicode_ci',
            'flags' => [
                \PDO::ATTR_PERSISTENT => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_EMULATE_PREPARES =>true,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
            ],
            "pgsql"=> Array(
                'driver'=> "pgsql",
                'host'=> 'localhost',
                'username'=> 'root',
                'database'=> 'campuslands',
                'password'=> '3224757531',
                'flags' =>[
                    \PDO::ATTR_PERSISTENT => false,
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ]
            )
        )
    );

    public function __construct($args = []){
        $this->conx = $args['conx'] ??null;
    }
    
    public function connect($dbkey){
        $dbConfig = self::$setings[$dbkey];
        $this->conx = null;
        $dsn = "{$dbConfig['driver']}:host={$dbConfig['host']};dbname={$dbConfig['database']}";
        try {
            $this->conx = new \PDO($dsn, $dbConfig['username'], $dbConfig['password'], $dbConfig['flags']);
        } catch (\PDOException $e) {
            $error = "erro en la conexcion";
            return $error;
        }
        
        return $this->conx;
    }
}

?>