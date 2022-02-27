<?php
/**
* @author Laura Hidalgo Rivera
* 
*/

require_once ('..\vendor\autoload.php');
require_once '..\bootstrap.php';

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\SuperheroesController;

$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'indexAction']
));
$router->add(array(
    'name' => 'sh_add',
    'path' => '/^\/superheroes\/add$/',
    'action' => [SuperheroesController::class, 'addAction']
));
$router->add(array(
    'name' => 'sh_edit',
    'path' => '/^\/superheroes\/edit\/[1-9][0-9]*/',
    'action' => [SuperheroesController::class, 'editAction']
));
$router->add(array(
    'name' => 'sh_del',
    'path' => '/^\/superheroes\/del\/[1-9][0-9]*/',
    'action' => [SuperheroesController::class, 'delAction']
));

$router->add(array(
    'name' => 'sh_list',
    'path' => '/^\/superheroes\/list$/',
    'action' => [SuperheroesController::class, 'listAction']
));

$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "Not found.";
}

?>