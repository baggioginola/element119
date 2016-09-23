<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 6/23/2016
 * Time: 6:10 PM
 */

require_once 'usuarios.php';
require_once 'categorias.php';
require_once 'productos.php';
require_once 'imagenes.php';
require_once 'dir.php';

$app->post('/login/authenticate', function() use($app){
    require_once __CONTROLLER__ . 'CLoginController.class.inc.php';
    if(!$result = Login::singleton()->authenticate()){
        echo 'fail';
    }
    echo $result;

});