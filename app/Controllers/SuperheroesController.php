<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Superheroe;

class SuperheroesController extends BaseController
{

    public function addAction()
    {
        $data = array();
        $nombre = $data['nombreErr'] = $velocidad = $data['velocidadErr'] = "";
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (empty($_POST["velocidad"])) {
                $data['velocidadErr'] = "La velocidad es obligatoria";
                $processform = false;
            } else {
                $velocidad = stripslashes(htmlspecialchars(trim($_POST["velocidad"])));
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setNombre($nombre);
                $sh->setVelocidad($velocidad);
                $sh->set();
                echo $sh->getMensaje();
                echo "<br><a href='/'>Volver a inicio</a><br>";
                echo "<a href='../list'>Ver todos</a>";
            } else {
                $this->renderHTML('..\views\superheroes_add_view.php', $data);
            }
        } else {
            $this->renderHTML('..\views\superheroes_add_view.php', $data);
        }
    }

    public function editAction()
    {
        $data = array();
        $id = $data['id'] = strstr(explode("/", $_SERVER["REQUEST_URI"])[3], '&', true);
        $data['nombre'] = str_replace('%20', ' ', strstr(explode("=", $_SERVER["REQUEST_URI"])[1], '&', true));
        $data['velocidad'] = explode("=", $_SERVER["REQUEST_URI"])[2];
        $nombre = $data['nombreErr'] = $velocidad = $data['velocidadErr'] = "";
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (empty($_POST["velocidad"])) {
                $data['velocidadErr'] = "La velocidad es obligatoria";
                $processform = false;
            } else {
                $velocidad = stripslashes(htmlspecialchars(trim($_POST["velocidad"])));
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setId($id);
                $sh->setNombre($nombre);
                $sh->setVelocidad($velocidad);
                $sh->edit();
                echo $sh->getMensaje();
                echo "<br><a href='/'>Volver a inicio</a><br>";
                echo "<a href='../list'>Ver todos</a>";
            } else {
                $this->renderHTML('..\views\superheroes_edit_view.php', $data);
            }
        } else {
            $this->renderHTML('..\views\superheroes_edit_view.php', $data);
        }
    }

    public function delAction()
    {
        $id = explode("/", $_SERVER["REQUEST_URI"])[3];
        $sh = Superheroe::getInstancia();
        $sh->setId($id);
        $sh->delete();
        echo $sh->getMensaje();
        echo "<br><a href='/'>Volver a inicio</a><br>";
        echo "<a href='../list'>Ver todos</a>";
    }

    public function listAction()
    {
        $sh = Superheroe::getInstancia();
        $data = $sh->getAll();

        if (isset($_POST["buscarId"])) {
            $processform = true;
            if (empty($_POST["id"])) {
                $processform = false;
            } else {
                $id = stripslashes(htmlspecialchars(trim($_POST["id"])));
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setId($id);
                $data = $sh->get();
                $this->renderHTML('..\views\superheroes_get_view.php', $data);
            } else {
                $this->renderHTML('..\views\superheroes_list_view.php', $data);
            }
        } else if (isset($_POST["buscarNombre"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setNombre($nombre);
                $data = $sh->search();
                $this->renderHTML('..\views\superheroes_get_view.php', $data);
            } else {
                $this->renderHTML('..\views\superheroes_list_view.php', $data);
            }
        } else {
            $this->renderHTML('..\views\superheroes_list_view.php', $data);
        }
    }
}
