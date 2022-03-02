<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Superheroe;
use App\Models\Habilidad;

class SuperheroesController extends BaseController
{

    public function addAction()
    {
        $data = array();
        $nombre = $data['nombreErr'] = $imagen = $data['imagenErr'] = "";
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (empty($_POST["imagen"])) {
                $data['imagenErr'] = "La imagen es obligatoria";
                $processform = false;
            } else {
                $imagen = stripslashes(htmlspecialchars(trim($_POST["imagen"])));
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setNombre($nombre);
                $sh->setImagen($imagen);
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
        $data['imagen'] = explode("=", $_SERVER["REQUEST_URI"])[2];
        $nombre = $data['nombreErr'] = $imagen = $data['imagenErr'] = "";
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (empty($_POST["imagen"])) {
                $data['imagenErr'] = "La imagen es obligatoria";
                $processform = false;
            } else {
                $imagen = stripslashes(htmlspecialchars(trim($_POST["imagen"])));
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setId($id);
                $sh->setNombre($nombre);
                $sh->setImagen($imagen);
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
        $hb = Habilidad::getInstancia();
        $data = array();
        $data['superheroes'] = $sh->getAll();
        foreach ($data['superheroes'] as $key => $superheroe) {
            $sh->setId($superheroe['id']);
            $data['superheroes'][$key]['habilidades'] = $sh->getHabilidades();
            foreach ($data['superheroes'][$key]['habilidades'] as $clave => $habilidad) {
                $hb->setId($habilidad['idHabilidad']);
                $data['superheroes'][$key]['habilidades'][$clave]['nombre'] = $hb->get()['nombre'];
            }
        }

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
                $data = array();
                $data['superheroe'] = $sh->get();
                $data['superheroe']['habilidades'] = $sh->getHabilidades();
                foreach ($data['superheroe']['habilidades'] as $clave => $habilidad) {
                    $hb->setId($habilidad['idHabilidad']);
                    $data['superheroe']['habilidades'][$clave]['nombre'] = $hb->get()['nombre'];
                }
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
                $data = array();
                $data['superheroe'] = $sh->search();
                $sh->setId($data['superheroe']['id']);
                $data['superheroe']['habilidades'] = $sh->getHabilidades();
                $this->renderHTML('..\views\superheroes_get_view.php', $data);
            } else {
                $this->renderHTML('..\views\superheroes_list_view.php', $data);
            }
        } else {
            $this->renderHTML('..\views\superheroes_list_view.php', $data);
        }
    }
}
