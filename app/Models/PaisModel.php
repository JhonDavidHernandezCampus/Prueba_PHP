<?php
namespace App\Models;

use Config\Conexion;
use PDO;


class PaisModel{
    public $message;
    public function __construct(private $idPais=1,public $nombrePais=1) {
        $this->idPais = $idPais;
        $this->nombrePais = $nombrePais;
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
            $query = 'INSERT INTO pais(idPais,nombrePais) VALUES (:idPais,:nombrePais)';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idPais',$this->idPais);
            $res->bindValue('nombrePais', $this->nombrePais);
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
            $query = 'UPDATE pais SET idPais=:idPais,nombrePais=:nombrePais WHERE idPais=:idPais';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idPais',$this->idPais);
            $res->bindValue('nombrePais', $this->nombrePais);
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
            $query = 'DELETE FROM pais WHERE idPais=:idPais';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idPais',$this->idPais);
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