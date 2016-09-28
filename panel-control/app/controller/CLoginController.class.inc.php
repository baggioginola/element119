<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 9/22/2016
 * Time: 11:44 AM
 */

require_once 'CBaseController.class.inc.php';
require_once __CONTROLLER__ . 'CUserController.class.inc.php';

require_once __MODEL__ . 'CLoginModel.class.inc.php';

require_once CLASSES . 'CSession.class.inc.php';

class Login extends BaseController
{
    public static $object = null;
    private $parameters = array();

    private $validParameters = array(
        'email' => TYPE_ALPHA,
        'password' => TYPE_ALPHA
    );

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function authenticate()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_CLIENT, MESSAGE_ERROR));
        }

        if (!$result = LoginModel::singleton()->authenticate($this->parameters)) {
            return json_encode($this->getResponse(STATUS_FAILURE_CLIENT, MESSAGE_ERROR));
        }

        $token = Encryption::singleton()->generateToken();

        UserController::singleton()->updateToken($result['id'], $token);

        Session::singleton()->store($token);

        Session::singleton()->storeUserInfo($result['nombre'], $result['apellidos']);

        return json_encode($this->getResponse());
    }

    public function logout()
    {
        if(!Session::singleton()->destroy()) {
            return json_encode($this->getResponse(STATUS_FAILURE_CLIENT, MESSAGE_ERROR));
        }
        return json_encode($this->getResponse());
    }

    /**
     * @return bool
     */
    private function _setParameters()
    {
        if (!isset($_POST) || empty($_POST)) {
            return false;
        }

        if (!$this->validateParameters($_POST, $this->validParameters)) {
            return false;
        }

        foreach ($_POST as $key => $value) {
            $this->parameters[$key] = $value;
        }

        return true;
    }
}