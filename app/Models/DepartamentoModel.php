<?php
namespace App\Models;

use Config\Conexion;
use PDO;


class DepartamentoModel{
    public $message;
    public function __construct(private $idDep=1,public $nombreDep=1, public $fk_idPais=1) {
        $this->idDep = $idDep;
        $this->nombreDep = $nombreDep;
        $this->fk_idPais = $fk_idPais;
    }

    public function getDepartamento(){
        try {
            $conx = new Conexion;
            $query = 'SELECT * FROM departamento';
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

    public function postDepartamento(){
        try {
            $conx = new Conexion;
            $query = 'INSERT INTO departamento(idDep,nombreDep,fk_idPais) VALUES (:idDep,:nombreDep,:fk_idPais)';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idDep',$this->idDep);
            $res->bindValue('nombreDep', $this->nombreDep);
            $res->bindValue('fk_idPais', $this->fk_idPais);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function updateDepartamento(){
        try {
            $conx = new Conexion;
            $query = 'UPDATE departamento SET idDep=:idDep,nombreDep=:nombreDep,fk_idPais=:fk_idPais WHERE idDep=:idDep';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idDep',$this->idDep);
            $res->bindValue('nombreDep', $this->nombreDep);
            $res->bindValue('fk_idPais', $this->fk_idPais);
            $res->execute();
            $this->message =["Code"=> 200, "Message"=> $res->fetchAll(PDO::FETCH_ASSOC)];
        } catch (\PDOException $e) {
            $this->message = ["Code"=> $e->getCode(), "Message"=> $res->errorInfo()[2]];
        }finally{
            print_r($this->message);
        }
    }

    public function deleteDepartamento(){
        try {
            $conx = new Conexion;
            $query = 'DELETE FROM departamento WHERE idDep=:idDep';
            $res = $conx->connect('mysql')->prepare($query);
            $res->bindValue('idDep',$this->idDep);
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