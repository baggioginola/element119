<?php

require_once __DIR__ . '/includes/header.inc.php';

require_once 'routes_backend.php';

$app->get('/', function() use($app){
    $app->render('index.php');
});

$app->get('/login', function() use($app){
    $app->render('login.php', array('layout' => false));
});

$app->get('/usuarios', function() use($app){
    $app->render('usuarios.php');
});

$app->get('/categorias', function() use($app){
    $app->render('/categorias.php');
});

$app->get('/productos', function() use($app){
    $app->render('/productos.php');
});

$app->get('/login', function() use($app){
    $app->render('/login.php');
});

$app->get('/test/:id', function($id) use($app){
    switch($id){
        case 'users':
            require_once __CONTROLLER__ . 'CUserController.class.inc.php';
            require_once 'core/classes/CLogs.class.inc.php';

            $log[__LINE__] = 'test';
            if(!$result = UserController::singleton()->getAll()){
                echo 'Fail';
            }
            break;
        case 'logs':
            require_once 'core/classes/CLogs.class.inc.php';
            $array = array('test' => 'test1', 'data' => 'dat2');
            $log[] = 'test';
            $log[] = $array;

            Logs::singleton()->setLog($log,'index.php',__LINE__);
            Logs::singleton()->addLogs('test');
            break;
    }
});

$app->get('/fake-user', function() use($app){
    require_once 'core/classes/Faker-master/src/autoload.php';
    require_once __CONTROLLER__ . 'CUserController.class.inc.php';

    $faker = Faker\Factory::create();

    $data = array();

    for($i = 0; $i<10; $i++) {
        $data['nombre'] = $faker->firstName;
        $data['apellidos'] = $faker->lastName;
        $data['email'] = $faker->email;
        $data['password'] = md5($faker->password());
        $data['nivel'] = $faker->numberBetween(0, 1);
        $data['active'] = 1;

        $result = UserController::singleton()->addFakeData($data);
        echo $result;
    }
});

$app->run();