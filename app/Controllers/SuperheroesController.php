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
                header('Location: /');
            } else {
                $this->renderHTML('..\views\superheroes_add_view.php', $data);
            }
        } else {
            $this->renderHTML('..\views\superheroes_add_view.php', $data);
        }
    }

    public function editAction()
    {

    }

    public function delAction()
    {
    }
}
