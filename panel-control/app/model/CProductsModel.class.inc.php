<?php
/**
 * Created by PhpStorm.
 * User: mario.cuevas
 * Date: 7/6/2016
 * Time: 4:01 PM
 */

require_once CLASSES . 'CDatabase.class.inc.php';

class ProductsModel extends Database
{
    private static $object = null;
    private static $table = 'producto';

    public static function singleton()
    {
        if (is_null(self::$object)) {
            self::$object = new self();
        }
        return self::$object;
    }

    /**
     * @return array|bool
     */
    public function getAll()
    {
        if (!$this->connect()) {
            return false;
        }
        $result_array = array();

        $query = "SELECT categoria.nombre as categoria_nombre, " . self::$table . ".id, " . self::$table . ".nombre, precio
                    FROM " . self::$table . "
                    INNER JOIN categoria ON producto.id_categoria = categoria.id
                    WHERE categoria.active = true and producto.active = true";

        if (!$result = $this->query($query)) {
            return false;
        }

        while ($row = $this->fetch_assoc($result)) {
            $result_array[] = $row;
        }

        return $result_array;
    }

    /**
     * @param array $data
     * @return bool|int|string
     */
    public function add($data = array())
    {
        if (empty($data)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        if (!$this->insert($data, self::$table)) {
            return false;
        }

        $this->close_connection();

        return true;
    }

    public function getById($id = '')
    {
        if (empty($id)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        $result_array = array();

        $query = "SELECT categoria.key_nombre as categoria_nombre, categoria.id as id_categoria, 
                    " . self::$table . ".id, " . self::$table . ".nombre, precio,
                    " . self::$table . ".descripcion, especificaciones, 
                    " . self::$table . ".key_nombre as key_nombre, 
                    " . self::$table . ".imagenes as imagenes
                    FROM " . self::$table . "
                    INNER JOIN categoria ON producto.id_categoria = categoria.id WHERE producto.id = '" . $id . "' ";

        if (!$result = $this->query($query)) {
            return false;
        }

        $this->close_connection();

        while ($row = $this->fetch_assoc($result)) {
            $result_array = $row;
        }

        return $result_array;
    }

    public function getByName($name = '', $id_categoria = '')
    {
        if (empty($name) || empty($id_categoria)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        $result_array = array();

        $query = "SELECT " . self::$table . ".id, " . self::$table . ".nombre FROM " . self::$table . "
                    INNER JOIN categoria on " . self::$table . ".id_categoria = categoria.id
                    WHERE producto.key_nombre = '" . $name . "' and producto.active = true and categoria.id = " . $id_categoria;

        if (!$result = $this->query($query)) {
            return false;
        }

        $this->close_connection();

        while ($row = $this->fetch_assoc($result)) {
            $result_array = $row;
        }

        return $result_array;
    }

    /**
     * @param array $data
     * @return bool|int|string
     */
    public function edit($data = array(), $id = '')
    {
        if (empty($data) || empty($id)) {
            return false;
        }

        if (!$this->connect()) {
            return false;
        }

        if (!$result = $this->update($data, $id, self::$table)) {
            return false;
        }

        $this->close_connection();

        return $result;
    }
}