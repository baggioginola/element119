<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 9/22/2016
 * Time: 11:55 AM
 */
class LoginModel extends Database
{
    private static $object = null;
    private static $table = 'usuario';

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    public function authenticate($data = array())
    {
        if(!$data) {
            return false;
        }

        if(!isset($data['email']) || !isset($data['password'])) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        $result_array = array();

        $query = "SELECT id, nombre, apellidos, password FROM " . self::$table . " WHERE email = '" . $data['email'] . "' ";

        if (!$result = $this->query($query)) {
            return false;
        }

        while ($row = $this->fetch_assoc($result)) {
            $result_array = $row;
        }

        if($result_array['password'] != $data['password']) {
            return false;
        }

        return $result_array;
    }
}