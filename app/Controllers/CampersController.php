<?php
namespace App\Controllers;
use App\Models\CampersModel;



class CampersController{
    public function getCampers(){
        try {
            $obj = new CampersModel();
            $res = $obj->getCampers();
            print_r($res);
            return $res;
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function postCampers(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new CampersModel($_DATA['idCampers'],$_DATA['nombreCamper'],$_DATA['apellidoCamper'],$_DATA['fechaNac'],$_DATA['fk_idReg']);
            $res = $obj->postCampers();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha agregado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function updateCampers(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new CampersModel($_DATA['idCampers'],$_DATA['nombreCamper'],$_DATA['apellidoCamper'],$_DATA['fechaNac'],$_DATA['fk_idReg']);
            $res = $obj->updateCampers();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha actualizado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function deleteCampers(){
        try {
            $_DATA = json_decode(file_get_contents('php://input'), true);
            $obj = new CampersModel($_DATA['idCampers']);
            $res = $obj->deleteCampers();
            print_r( ["Stado"=> 200, "Mensage"=> "Se ha eliminado el dato"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }


}






?>