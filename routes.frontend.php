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

$app->get('/diamond', function() use ($app) {
    $app->render('diamond.php');
});

$app->get('/bulk-ceramic-coating', function() use ($app){
    $app->render('bulk_ceramic_coating.php');
});

$app->get('/motorcycle', function() use ($app){
    $app->render('motorcycle.php');
});

$app->get('/aircraft', function() use ($app){
    $app->render('aircraft.php');
});

$app->get('/marine', function() use ($app){
    $app->render('marine.php');
});

$app->get('/rv', function() use ($app){
    $app->render('rv.php');
});