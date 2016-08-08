<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 8/2/2016
 * Time: 6:10 PM
 */

$app->get('/', function() use ($app) {
    $app->render('index.php');
});

$app->get('/system-x', function() use ($app) {
    $app->render('system-x.php');
});