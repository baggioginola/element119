<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 5/12/2016
 * Time: 8:54 AM
 */
require_once __CONTROLLER__ . 'CBaseController.class.inc.php';
require_once __MODEL__ . 'CUserModel.class.inc.php';

class UserController extends BaseController
{
    private static $object = null;

    private $parameters = array();

    private $log = array();

    private $validParameters = array(
        'id' => TYPE_INT,
        'nombre' => TYPE_ALPHA,
        'apellidos' => TYPE_ALPHA,
        'email' => TYPE_ALPHA,
        'password' => TYPE_PASSWORD,
        'nivel' => TYPE_INT,
        'active' => TYPE_INT,
        'token' => TYPE_ALPHA,
        'token_expiration' => TYPE_DATETIME
    );

    /**
     * @return null|UserController
     */
    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    /**
     * @return string
     */
    public function getAll()
    {
        if (!$result = UserModel::singleton()->getAll()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }
        return json_encode($result);
    }

    /**
     * @return string
     */
    public function getById()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $result = UserModel::singleton()->getById($this->parameters['id']);

        return json_encode($result);
    }

    /**
     * @return string
     */
    public function add()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if (!UserModel::singleton()->add($this->parameters)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    /**
     * @return string
     */
    public function edit()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $id = $this->parameters['id'];

        unset($this->parameters['id']);

        if (!UserModel::singleton()->edit($this->parameters, $id)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    /**
     * @return string
     */
    public function delete()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        $id = $this->parameters['id'];

        unset($this->parameters['id']);

        if (!UserModel::singleton()->edit($this->parameters, $id)) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse());
    }

    public function updateToken($id = '', $token = '')
    {
        if ($id == '') {
            return false;
        }

        $data = array('token' => $token, 'token_expiration' => gmdate('Y-m-d H:i:s', strtotime('+1 hour')));

        if (!UserModel::singleton()->edit($data, $id)) {
            return false;
        }

        return true;
    }

    public function getByToken($token = '')
    {
        if (empty($token)) {
            return false;
        }

        $result = UserModel::singleton()->getByToken($token);

        if(!$result) {
            return false;
        }

        return $result;
    }

    public function addFakeData($data)
    {
        foreach ($data as $key => $value) {
            $this->parameters[$key] = $value;
        }

        $result = UserModel::singleton()->add($this->parameters);

        return $result;
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