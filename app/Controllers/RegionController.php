<?php
namespace App\Controllers;
use App\Models\RegionModel;



class RegionController{
    public function getRegion(){
        try {
            $obj = new RegionModel();
            $res = $obj->getRegion();
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postRegion(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RegionModel($_DATA['idReg'],$_DATA['nombreReg'],$_DATA['fk_idDep']);
            $res = $obj->postRegion();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateRegion(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RegionModel($_DATA['idReg'],$_DATA['nombreReg'],$_DATA['fk_idDep']);
            $res = $obj->updateRegion();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteRegion(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new RegionModel($_DATA['idReg']);
            $res = $obj->deleteRegion();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


}






?>