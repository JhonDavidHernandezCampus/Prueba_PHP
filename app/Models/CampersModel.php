<?php
namespace App\Models;

use Config\Conexion;
use PDO;


class CampersModel{
    public $message;
    public function __construct(private $idCampers=1,public $nombreCamper=1,public $apellidoCamper=1,public $fechaNac=1,public $fk_idReg=1) {
        $this->idCampers = $idCampers;
        $this->nombreCamper = $nombreCamper;
        $this->apellidoCamper= $apellidoCamper;
        $this->fechaNac = $fechaNac;
        $this->fk_idReg = $fk_idReg;
    }

    public function getCampers(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM campers';
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

    public function postCampers(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO campers(idCampers,nombreCamper,apellidoCamper,fechaNac,fk_idReg) VALUES (:idCampers,:nombreCamper,:apellidoCamper,:fechaNac,:fk_idReg)';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idCampers',$this->idCampers);
            $res->bindValue('nombreCamper', $this->nombreCamper);
            $res->bindValue('apellidoCamper', $this->apellidoCamper);
            $res->bindValue('fechaNac', $this->fechaNac);
            $res->bindValue('fk_idReg', $this->fk_idReg);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateCampers(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE campers SET idCampers=:idCampers,nombreCamper=:nombreCamper,apellidoCamper=:apellidoCamper,fechaNac=:fechaNac,fk_idReg=:fk_idReg WHERE idCampers=:idCampers';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idCampers',$this->idCampers);
            $res->bindValue('nombreCamper', $this->nombreCamper);
            $res->bindValue('apellidoCamper', $this->apellidoCamper);
            $res->bindValue('fechaNac', $this->fechaNac);
            $res->bindValue('fk_idReg', $this->fk_idReg);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteCampers(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM campers WHERE idCampers=:idCampers';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idCampers',$this->idCampers);
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