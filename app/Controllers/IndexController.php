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
        $data = $sh->getLast(15);
        $this->renderHTML('..\views\superheroes_view.php', $data);
    }
}