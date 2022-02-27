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
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setId($id)
    {
        $this->id = trim(stripslashes(htmlspecialchars($id)));
    }

    public function setNombre($nombre)
    {
        $this->nombre = trim(stripslashes(htmlspecialchars($nombre)));
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = trim(stripslashes(htmlspecialchars($velocidad)));
    }

    public function getMensaje()
    {
        return $this->mensaje;
    }

    public function set()
    {
        $nombre = $this->nombre;
        $velocidad = $this->velocidad;
        $this->query = "INSERT INTO superheroes(nombre, velocidad)
                        VALUES(:nombre, :velocidad)";
        $this->parametros['nombre'] = $nombre;
        $this->parametros['velocidad'] = $velocidad;
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
        $velocidad = $this->velocidad;
        $this->query = "UPDATE superheroes SET nombre = :nombre, velocidad = :velocidad WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->parametros['nombre'] = $nombre;
        $this->parametros['velocidad'] = $velocidad;
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
}
