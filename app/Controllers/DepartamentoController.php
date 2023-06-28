<?php
namespace App\Controllers;
use App\Models\PaisModel;



class DepartamentoController{
    public function getPais(){
        try {
            $obj = new PaisModel();
            $res = $obj->getPais();
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postPais(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new PaisModel($_DATA['id'],$_DATA['name_country']);
            $res = $obj->postPais();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updatePais(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new PaisModel($_DATA['id'],$_DATA['name_country']);
            $res = $obj->updatePais();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deletePais(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new PaisModel($_DATA['id']);
            $res = $obj->deletePais();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


}






?>