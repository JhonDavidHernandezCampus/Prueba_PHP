<?php
namespace Home;

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once './vendor/autoload.php';
require_once './routes/routes.php';

use Dotenv\Dotenv;

use Config\Conexion;
$conx = new Conexion;
print_r($conx->connect('mysql'));
echo "este";

function variables(){
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}




?>