<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 21/08/2016
 * Time: 08:09 PM
 */
$app->group('/categorias', function () use($app) {
    $app->post('/getAll', function() use($app){
        require_once __CONTROLLER__ . 'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->getAll()){
            echo 'Fail';
        }
        echo $result;

    });

    $app->post('/getByName', function() use($app){
        require_once __CONTROLLER__.'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->getByName()){
            echo 'Fail';
        }
        echo $result;

    });
});