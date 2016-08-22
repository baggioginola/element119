<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 21/08/2016
 * Time: 11:03 PM
 */

$app->group('/productos', function () use($app) {
    $app->post('/getByCategory', function() use($app){
        require_once __CONTROLLER__.'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->getByCategory()){
            echo 'Fail';
        }
        echo $result;

    });
    $app->post('/getByName', function() use($app){
        require_once __CONTROLLER__.'CProductsController.class.inc.php';
        if(!$result = Products::singleton()->getByName()){
            echo 'Fail';
        }
        echo $result;

    });
});