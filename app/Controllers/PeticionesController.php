<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Peticion;
use App\Models\Superheroe;
use App\Models\Ciudadano;

class PeticionesController extends BaseController
{
    public function addAction()
    {
        $data = array();
        $titulo = $data['tituloErr'] = $descripcion = $data['descripcionErr'] = "";
        $idSuperheroe = explode("/", $_SERVER["REQUEST_URI"])[3];
        $ci = Ciudadano::getInstancia();
        $ci->setIdUsuario($_SESSION['usuario']['id']);
        $idCiudadano = $ci->getByIdUsuario()['id'];
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["titulo"])) {
                $data['tituloErr'] = "El titulo es obligatorio";
                $processform = false;
            } else {
                $titulo = stripslashes(htmlspecialchars(trim($_POST["titulo"])));
            }

            if (empty($_POST["descripcion"])) {
                $data['descripcionErr'] = "La descripción es obligatoria";
                $processform = false;
            } else {
                $descripcion = stripslashes(htmlspecialchars(trim($_POST["descripcion"])));
            }

            if ($processform) {
                $pt = Peticion::getInstancia();
                $pt->setTitulo($titulo);
                $pt->setDescripcion($descripcion);
                $pt->setRealizada(false);
                $pt->setIdSuperheroe($idSuperheroe);
                $pt->setIdCiudadano($idCiudadano);
                $pt->set();

                header('Location: /');
            } else {
                $this->renderHTML('..\views\peticiones_add_view.php', $data);
            }
        } else {
            $this->renderHTML('..\views\peticiones_add_view.php', $data);
        }
    }

    public function listAction()
    {
        $pt = Peticion::getInstancia();
        $sh = Superheroe::getInstancia();
        $data = array();
        $data['peticiones'] = $pt->getAll();
        foreach ($data['peticiones'] as $key => $peticion) {
            $pt->setId($peticion['id']);
            $sh->setId($peticion['idSuperheroe']);
            $data['peticiones'][$key]['superheroe'] = $sh->get()['nombre'];
        }
        $this->renderHTML('..\views\peticiones_list_view.php', $data);
    }

    public function delAction()
    {
        $id = explode("/", $_SERVER["REQUEST_URI"])[3];
        $pt = Peticion::getInstancia();
        $pt->setId($id);
        $pt->delete();
        echo $pt->getMensaje();
        echo "<br><a href='/'>Volver a inicio</a><br>";
        echo "<a href='../list'>Ver todos</a>";
    }
}