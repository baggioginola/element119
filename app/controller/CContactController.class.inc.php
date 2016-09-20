<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 03/09/2016
 * Time: 07:58 PM
 */

require_once __CONTROLLER__ . 'CBaseController.class.inc.php';

class Contact extends BaseController
{
    public static $object = null;

    private $parameters = array();
    #private $send_to = 'contacto@grupocoser.com.mx';
    private $send_to = 'mariocuevas88@gmail.com';
    private $subject = 'Contacto de Pagina Web';
    private $header = 'From:  Sitio Web <info@element119.com.mx>';

    private $validParameters = array(
        'email' => TYPE_ALPHA,
        'mensaje' => TYPE_ALPHA,
        'nombre' => TYPE_ALPHA,
        'company' => TYPE_ALPHA,
        'website' => TYPE_ALPHA,
        'country' => TYPE_ALPHA
    );

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function sendMessage()
    {
        if (!$this->_setParameters()) {
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        if(!$this->emailRequest()){
            return json_encode($this->getResponse(STATUS_FAILURE_INTERNAL, MESSAGE_ERROR));
        }

        return json_encode($this->getResponse(STATUS_SUCCESS, MESSAGE_SUCCESS));
    }

    private function emailRequest()
    {
        if(!$this->parameters){
            return false;
        }

        #$this->header .= $this->parameters['email'];

        return mail($this->send_to, $this->subject, $this->parameters['mensaje'], $this->header);
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