<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Peticion extends DBAbstractModel
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
    private $titulo;
    private $descripcion;
    private $realizada;
    private $idSuperheroe;
    private $idCiudadano;
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

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setRealizada($realizada)
    {
        $this->realizada = $realizada;
    }

    public function setIdSuperheroe($idSuperheroe)
    {
        $this->idSuperheroe = $idSuperheroe;
    }

    public function setIdCiudadano($idCiudadano)
    {
        $this->idCiudadano = $idCiudadano;
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $titulo = $this->titulo;
        $descripcion = $this->descripcion;
        $realizada = $this->realizada;
        $idSuperheroe = $this->idSuperheroe;
        $idCiudadano = $this->idCiudadano;
        $this->query = "INSERT INTO peticiones(titulo, descripcion, realizada, idSuperheroe, idCiudadano)
                        VALUES(:titulo, :descripcion, :realizada, :idSuperheroe, :idCiudadano)";
        $this->parametros['titulo'] = $titulo;
        $this->parametros['descripcion'] = $descripcion;
        $this->parametros['realizada'] = $realizada;
        $this->parametros['idSuperheroe'] = $idSuperheroe;
        $this->parametros['idCiudadano'] = $idCiudadano;
        $this->get_results_from_query();
        $this->mensaje = 'Petición agregada correctamente';
    }

    public function get()
    {
        $id = $this->id;
        $this->query = "SELECT * FROM peticiones WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Petición obtenida correctamente';
        return $this->rows[0];
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM peticiones";
        $this->get_results_from_query();
        $this->mensaje = 'Peticiones listadas correctamente';
        return $this->rows;
    }

    public function edit()
    {
        $id = $this->id;
        $titulo = $this->titulo;
        $realizada = $this->realizada;
        $idSuperheroe = $this->idSuperheroe;
        $idCiudadano = $this->idCiudadano;
        $this->query = "UPDATE peticiones SET titulo = :titulo, descripcion = :descripcion, realizada = :realizada, idSuperheroe = :idSuperheroe, idCiudadano = :idCiudadano WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->parametros['titulo'] = $titulo;
        $this->parametros['realizada'] = $realizada;
        $this->parametros['idSuperheroe'] = $idSuperheroe;
        $this->parametros['idCiudadano'] = $idCiudadano;
        $this->get_results_from_query();
        $this->mensaje = 'Petición editada correctamente';
    }

    public function delete()
    {
        $id = $this->id;
        $this->query = "DELETE FROM peticiones WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Petición borrada correctamente';
    }

    public function getLast($cantidad)
    {
        $this->query = "SELECT * FROM peticiones ORDER BY id DESC LIMIT $cantidad";
        $this->get_results_from_query();
        $this->mensaje = 'Peticiones obtenidas correctamente';
        return $this->rows;
    }

    public function setRealizadaDb($realizada)
    {
        $id = $this->id;
        $this->query = "UPDATE peticiones SET realizada = :realizada WHERE id = :id";
        $this->parametros['realizada'] = $realizada;
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Petición editada correctamente';
    }

}
