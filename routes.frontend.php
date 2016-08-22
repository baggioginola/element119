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

$app->get('/faq', function() use ($app) {
    $app->render('faq.php');
});

$app->get('/about', function() use ($app) {
    $app->render('about.php');
});

$app->get('/contact', function() use ($app) {
    $app->render('contact.php');
});

$app->get('/customer-service', function() use ($app) {
    $app->render('customer_service.php');
});

$app->get('/partnerships', function() use ($app) {
    $app->render('partnerships.php');
});

$app->get('/:category', function() use ($app) {
    $app->render('categoria.php');
});
