<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 9/26/2016
 * Time: 12:53 PM
 */

$app->post('/login/authenticate', function () use ($app) {
    require_once __CONTROLLER__ . 'CLoginController.class.inc.php';
    if (!$result = Login::singleton()->authenticate()) {
        echo 'fail';
    }
    echo $result;

});

$app->get('/logout', function () use ($app) {
    require_once __CONTROLLER__ . 'CLoginController.class.inc.php';

    Login::singleton()->logout();

    $app->redirect(DOMAIN . 'login');

});
