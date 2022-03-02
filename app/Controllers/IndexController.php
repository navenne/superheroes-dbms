<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Superheroe;
use App\Models\Habilidad;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $sh = Superheroe::getInstancia();
        $hb = Habilidad::getInstancia();
        $data = array();
        $data['superheroes'] = $sh->getLast(15);
        foreach ($data['superheroes'] as $key => $superheroe) {
            $sh->setId($superheroe['id']);
            $data['superheroes'][$key]['habilidades'] = $sh->getHabilidades();
            foreach ($data['superheroes'][$key]['habilidades'] as $clave => $habilidad) {
                $hb->setId($habilidad['idHabilidad']);
                $data['superheroes'][$key]['habilidades'][$clave]['nombre'] = $hb->get()['nombre'];
            }
        }
        $this->renderHTML('..\views\superheroes_view.php', $data);
    }
}
