<?php

/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 9/23/2016
 * Time: 9:22 AM
 */

require_once CLASSES . 'CEncryption.class.inc.php';
require_once __CONTROLLER__ . 'CUserController.class.inc.php';
class Session
{
    private static $object = null;

    public static function singleton()
    {
        if (!isset(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function sealSession($token)
    {
        $_SESSION['token'] = $token;
    }

    public function validateSession()
    {
        if(!$token = $this->getToken()){
            return false;
        }

        if(!$result = UserController::singleton()->getByToken($token)) {
            return false;
        }

        if($result['token_expiration'] < gmdate('Y-m-d H:i:s')) {
            return false;
        }

        return UserController::singleton()->updateToken($result['id'], $result['token']);
    }

    private function getToken()
    {
        if(!isset($_SESSION['token'])) {
            return false;
        }
        return $_SESSION['token'];
    }
}