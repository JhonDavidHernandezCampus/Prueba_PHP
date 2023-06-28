<?php
namespace App\Models;

use Config\Conexion;
use PDO;


class RegionModel{
    public $message;
    public function __construct(private $idReg=1,public $nombreReg=1, public $fk_idDep=1) {
        $this->idReg = $idReg;
        $this->nombreReg = $nombreReg;
        $this->fk_idDep = $fk_idDep;
    }

    public function getRegion(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM region';
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

    public function postRegion(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO region(idReg,nombreReg,fk_idDep) VALUES (:idReg,:nombreReg,:fk_idDep)';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idReg',$this->idReg);
            $res->bindValue('nombreReg', $this->nombreReg);
            $res->bindValue('fk_idDep', $this->fk_idDep);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateRegion(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE region SET idReg=:idReg,nombreReg=:nombreReg, fk_idDep=:fk_idDep WHERE idReg=:idReg';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idReg',$this->idReg);
            $res->bindValue('nombreReg', $this->nombreReg);
            $res->bindValue('fk_idDep', $this->fk_idDep);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteRegion(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM region WHERE idReg=:idReg';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idReg',$this->idReg);
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