<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Ciudadano extends DBAbstractModel
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
    private $email;
    private $idUsuario;
    private $created_at;
    private $updated_at;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $nombre = $this->nombre;
        $email = $this->email;
        $idUsuario = $this->idUsuario;
        $this->query = "INSERT INTO ciudadanos(nombre, email, idUsuario)
                        VALUES(:nombre, :email, :idUsuario)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['email'] = $email;
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadano agregado correctamente';
    }

    public function get()
    {
        $id = $this->id;
        $this->query = "SELECT * FROM ciudadanos WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadano obtenido correctamente';
        return $this->rows[0];
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM ciudadanos";
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadanos listados correctamente';
        return $this->rows;
    }

    public function edit()
    {
        $id = $this->id;
        $nombre = $this->nombre;
        $email = $this->email;
        $this->query = "UPDATE ciudadanos SET nombre = :nombre, email = :email WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['email'] = $email;
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadano editado correctamente';
    }

    public function delete()
    {
        $id = $this->id;
        $this->query = "DELETE FROM ciudadanos WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadano borrado correctamente';
    }
    
    public function getLast($cantidad)
    {
        $this->query = "SELECT * FROM ciudadanos ORDER BY id DESC LIMIT $cantidad";
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadanos obtenidos correctamente';
        return $this->rows;
    }

    public function getByIdUsuario()
    {
        $idUsuario = $this->idUsuario;
        $this->query = "SELECT * FROM ciudadanos WHERE idUsuario = :idUsuario";
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        $this->mensaje = 'Ciudadano obtenido correctamente';
        return $this->rows[0];
    }
}
