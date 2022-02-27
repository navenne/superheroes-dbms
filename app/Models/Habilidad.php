<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Habilidad extends DBAbstractModel
{
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }
    /*FIN DE LA CONSTRUCCIÓN DEL MODELO SINGLETON*/

    private $id;
    private $nombre;
    private $created_at;
    private $updated_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $nombre = $this->nombre;
        $this->query = "INSERT INTO habilidades(nombre)
                        VALUES(:nombre)";
        $this->parametros['nombre'] = $nombre;
        $this->get_results_from_query();
        $this->mensaje = 'Habilidad agregada correctamente';
    }

    public function get()
    {
        $id = $this->id;
        $this->query = "SELECT * FROM habilidades WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Habilidad obtenida correctamente';
        return $this->rows[0];
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM habilidades";
        $this->get_results_from_query();
        $this->mensaje = 'Habilidades listadas correctamente';
        return $this->rows;
    }

    public function edit()
    {
        $id = $this->id;
        $nombre = $this->nombre;
        $this->query = "UPDATE habilidades SET nombre = :nombre WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->parametros['nombre'] = $nombre;
        $this->get_results_from_query();
        $this->mensaje = 'Habilidad editada correctamente';
    }

    public function delete()
    {
        $id = $this->id;
        $this->query = "DELETE FROM habilidades WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Habilidad borrada correctamente';
    }
    
    public function getLast($cantidad)
    {
        $this->query = "SELECT * FROM habilidades ORDER BY id DESC LIMIT $cantidad";
        $this->get_results_from_query();
        $this->mensaje = 'Habilidades obtenidas correctamente';
        return $this->rows;
    }
}
