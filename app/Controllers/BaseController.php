<?php
/**
* @author Laura Hidalgo Rivera
* 
*/

namespace App\Controllers;

class BaseController {
    public function renderHTML($fileName, $data=[]) {
        include($fileName);
    }
}

?>