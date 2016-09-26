<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 9/21/2016
 * Time: 5:05 PM
 */

require_once FRAMEWORK . 'Slim/Middleware.php';
require_once CLASSES . 'CSession.class.inc.php';
require_once __CONTROLLER__ . 'CUserController.class.inc.php';

class CAuth extends \Slim\Middleware
{

    protected $app;
    public function __construct()
    {
        $this->app = \Slim\Slim::getInstance();
        $this->whiteList = array('\/login');
    }

    public function authenticate()
    {
        return Session::singleton()->validate();
    }

    public function isPublicUrl($url)
    {
        $patterns_flattened = implode('|', $this->whiteList);
        $matches = null;
        preg_match('/' . $patterns_flattened . '/', $url, $matches);
        return (count($matches) > 0);
    }

    public function call()
    {
        if ($this->isPublicUrl($this->app->request->getPathInfo())) {
            if(!$this->authenticate()) {
                $this->next->call();
            }
            else {
                $this->app->redirect('categorias');
            }
        }
        else {
            if(!$this->authenticate()) {
                $this->app->redirect('login');
            }
            else {
                $this->next->call();
            }
        }

    }
}