<?php
namespace App\Models;

use Config\Conexion;
use PDO;


class PaisModel{
    public $message;
    public function __construct(private $id=1,public $name_country=1) {
        $this->id = $id;
        $this->name_country = $name_country;
    }

    public function getPais(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM pais';
            $res = $conx->connect('mysql')->prepare($query);
            $res->execute();
            return json_encode($res->fetchAll(PDO::FETCH_ASSOC));
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function postPais(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO countries(id,name_country) VALUES (:id,:countries)';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('countries', $this->name_country);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updatePais(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE countries SET id=:id,name_country=:countries WHERE id=:id';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('id',$this->id);
            $res->bindValue('countries', $this->name_country);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deletePais(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM countries WHERE id=:id';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('id',$this->id);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }
}


?>