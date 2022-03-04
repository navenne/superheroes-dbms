<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Models;

require_once 'DBAbstractModel.php';

class Superheroe extends DBAbstractModel
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
    private $imagen;
    private $evolucion;
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

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function setEvolucion($evolucion)
    {
        $this->evolucion = $evolucion;
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
        $imagen = $this->imagen;
        $evolucion = $this->evolucion;
        $idUsuario = $this->idUsuario;
        $this->query = "INSERT INTO superheroes(nombre, imagen, evolucion, idUsuario)
                        VALUES(:nombre, :imagen, :evolucion, :idUsuario)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['imagen'] = $imagen;
        $this->parametros['evolucion'] = $evolucion;
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroe agregado correctamente';
    }

    public function get()
    {
        $id = $this->id;
        $this->query = "SELECT * FROM superheroes WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroe obtenido correctamente';
        return $this->rows[0];
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM superheroes";
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroes listados correctamente';
        return $this->rows;
    }

    public function edit()
    {
        $id = $this->id;
        $nombre = $this->nombre;
        $imagen = $this->imagen;
        $evolucion = $this->evolucion;
        $idUsuario = $this->idUsuario;
        $this->query = "UPDATE superheroes SET nombre = :nombre, imagen = :imagen, evolucion = :evolucion, idUsuario = :idUsuario WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['imagen'] = $imagen;
        $this->parametros['evolucion'] = $evolucion;
        $this->parametros['idUsuario'] = $idUsuario;
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroe editado correctamente';
    }

    public function delete()
    {
        $id = $this->id;
        $this->query = "DELETE FROM superheroes WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroe borrado correctamente';
    }
    
    public function getLast($cantidad)
    {
        $this->query = "SELECT * FROM superheroes ORDER BY id DESC LIMIT $cantidad";
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroes obtenidos correctamente';
        return $this->rows;
    }

    public function search()
    {
        $nombre = $this->nombre;
        $this->query = "SELECT * FROM superheroes WHERE nombre LIKE '%$nombre%'";
        $this->parametros['nombre'] = $nombre;
        $this->get_results_from_query();
        $this->mensaje = 'Superhéroe obtenido correctamente';
        return $this->rows[0];
    }

    public function getHabilidades()
    {
        $id = $this->id;
        $this->query = "SELECT idHabilidad, valor FROM superheroes_habilidades WHERE idSuperheroe = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        $this->mensaje = 'Habilidades obtenidas correctamente';
        return $this->rows;
    }

    public function setHabilidades($habilidades)
    {
        $id = $this->id;
        foreach ($habilidades as $idHabilidad => $valor) {
            $this->query = "INSERT INTO superheroes_habilidades(idSuperheroe, idHabilidad, valor) VALUES(:id, :idHabilidad, :valor)";
            $this->parametros['id'] = $id;
            $this->parametros['idHabilidad'] = $idHabilidad;
            $this->parametros['valor'] = $valor;
            $this->get_results_from_query();
        }
        $this->mensaje = 'Habilidades insertadas correctamente';
    }
}
