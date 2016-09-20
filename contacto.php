<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 03/09/2016
 * Time: 08:10 PM
 */

$app->group('/contacto', function () use($app) {
    $app->post('/sendMessage', function() use($app){
        require_once __CONTROLLER__.'CContactController.class.inc.php';
        if(!$result = Contact::singleton()->sendMessage()){
            echo 'Fail';
        }
        echo $result;

    });
});