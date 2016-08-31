<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/4/2016
 * Time: 4:41 PM
 */
define('ENVIRONMENT', 'test'); # must be production or test.
define('__ROOT__', dirname(__FILE__));
define('PROJECT', 'vc/test/github/element119/');
//define('PROJECT', '');
define('DOMAIN', 'http://' . $_SERVER['HTTP_HOST'] . '/' . PROJECT);

define('CSS', DOMAIN . 'includes/public/css/');
define('JS', DOMAIN . 'includes/public/js/');
define('IMAGES', DOMAIN . 'includes/public/img/');
define('FONTS', DOMAIN . 'includes/public/fonts/');
define('CLASSES', __ROOT__ . '/core/classes/');
define('__CONTROLLER__', __ROOT__ . '/app/controller/');
define('__MODEL__', __ROOT__ . '/app/model/');
define('__VIEW__', __ROOT__ . '/app/view/');
define('FRAMEWORK', __ROOT__ . '/core/framework/');
define('DATABASE',  __ROOT__ . '/core/framework/readBean/');

#templates
define('TEMPLATE',  __ROOT__ . '/app/view/template/');
#Databases
define('DBHOST', 'localhost');
define('DBNAME', 'element119');
define('DBUSER', 'root');
define('DBPASS', '');

#Mail recipient.
define('MAIL_RECIPIENT', 'mariocuevas88@gmail.com');
define('MAIL_FROM', 'From: Debugger-Core <debug@grupocoser.com>');

#Response codes
define('STATUS_SUCCESS', 200);
define('STATUS_FAILURE_CLIENT', 404);
define('STATUS_FAILURE_INTERNAL', 500);

define('MESSAGE_SUCCESS', 'La transaccion fue exitosa');
define('MESSAGE_ERROR', 'La transaccion fue fallida, intente mas tarde');