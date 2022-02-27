<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Superheroe;

class IndexController extends BaseController
{
    public function indexAction()
    {
        $sh = Superheroe::getInstancia();
        $data = array();
        $data['superheroes'] = $sh->getLast(15);
        $data['habilidades'] = array();
        foreach ($data['superheroes'] as $key => $superheroe) {
            $sh->setId($superheroe['id']);
            array_push($data['habilidades'], $sh->getHabilidades());
        }
        $this->renderHTML('..\views\superheroes_view.php', $data);
    }
}
