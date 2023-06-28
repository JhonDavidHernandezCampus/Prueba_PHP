<?php
namespace App\Controllers;
use App\Models\DepartamentoModel;



class DepartamentoController{
    public function getDepartamento(){
        try {
            $obj = new DepartamentoModel();
            $res = $obj->getDepartamento();
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postDepartamento(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new DepartamentoModel($_DATA['idDep'],$_DATA['nombreDep'], $_DATA['fk_idPais']);
            $res = $obj->postDepartamento();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateDepartamento(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new DepartamentoModel($_DATA['idDep'],$_DATA['nombreDep'], $_DATA['fk_idPais']);
            $res = $obj->updateDepartamento();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteDepartamento(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new DepartamentoModel($_DATA['idDep']);
            $res = $obj->deleteDepartamento();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


}






?>