<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Usuario extends DBAbstractModel
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
    private $usuario;
    private $psw;
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

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setPsw($psw)
    {
        $this->psw = $psw;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $usuario = $this->usuario;
        $psw = $this->psw;
        $this->query = "INSERT INTO usuarios(usuario, psw)
                        VALUES(:usuario, :psw)";
        $this->parametros['usuario'] = $usuario;
        $this->parametros['psw'] = $psw;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario agregado correctamente';
    }

    public function get()
    {
        $id = $this->id;
        $this->query = "SELECT * FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario obtenido correctamente';
        return $this->rows[0];
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        $this->mensaje = 'Usuarios listados correctamente';
        return $this->rows;
    }

    public function edit()
    {
        $id = $this->id;
        $usuario = $this->usuario;
        $psw = $this->psw;
        $this->query = "UPDATE usuarios SET usuario = :usuario, psw = :psw WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->parametros['usuario'] = $usuario;
        $this->parametros['psw'] = $psw;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario editado correctamente';
    }

    public function delete()
    {
        $id = $this->id;
        $this->query = "DELETE FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Usuario borrado correctamente';
    }
    
    public function getLast($cantidad)
    {
        $this->query = "SELECT * FROM usuarios ORDER BY id DESC LIMIT $cantidad";
        $this->get_results_from_query();
        $this->mensaje = 'Usuarios obtenidos correctamente';
        return $this->rows;
    }
}
