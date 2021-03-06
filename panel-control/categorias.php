<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 6/23/2016
 * Time: 6:09 PM
 */

$app->group('/categorias', function () use($app) {
    $app->post('/getAll', function() use($app){
        require_once __CONTROLLER__.'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->getAll()){
            echo 'Fail';
        }
        echo $result;

    });

    $app->post('/add', function() use($app){
        require_once __CONTROLLER__ . 'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->add()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/getById', function() use($app){
        require_once __CONTROLLER__ . 'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->getById()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/edit', function() use($app){
        require_once __CONTROLLER__ . 'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->edit()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/delete', function() use($app){
        require_once __CONTROLLER__ . 'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->delete()) {
            echo 'Fail';
        }
        echo $result;
    });

    $app->post('/checkDuplicatedName', function() use($app){
        require_once __CONTROLLER__ . 'CCategoriesController.class.inc.php';
        if(!$result = Categories::singleton()->checkDuplicatedName()) {
            echo 'Fail';
        }
        echo $result;
    });
});