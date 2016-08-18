<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 8/17/2016
 * Time: 4:37 PM
 */

$app->group('/dir', function () use($app) {

    $app->post('/update', function() use($app){
        require_once CLASSES . 'CDir.class.inc.php';
        if(!$result = CDir::singleton()->update()) {
            echo 'Fail';
        }
        echo $result;
    });
});