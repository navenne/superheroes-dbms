<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

require_once('..\vendor\autoload.php');
require_once '..\bootstrap.php';

use App\Core\Router;
use App\Controllers\IndexController;
use App\Controllers\AuthController;
use App\Controllers\SuperheroesController;

session_start();
if (!isset($_SESSION['usuario']['perfil'])) {
    $_SESSION['usuario']['perfil'] = 'invitado';
}

$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'indexAction']
));

if ($_SESSION['usuario']['perfil'] == 'invitado') {
    $router->add(array(
        'name' => 'login',
        'path' => '/^\/login$/',
        'action' => [AuthController::class, 'loginAction']
    ));
    $router->add(array(
        'name' => 'registro',
        'path' => '/^\/register$/',
        'action' => [AuthController::class, 'registerAction']
    ));
}

if ($_SESSION['usuario']['perfil'] != 'invitado') {
    $router->add(array(
        'name' => 'logout',
        'path' => '/^\/logout$/',
        'action' => [AuthController::class, 'logoutAction']
    ));
}

if ($_SESSION['usuario']['perfil'] == 'Experto') {
    $router->add(array(
        'name' => 'sh_add',
        'path' => '/^\/superheroes\/add$/',
        'action' => [SuperheroesController::class, 'addAction']
    ));
    $router->add(array(
        'name' => 'sh_edit',
        'path' => '/^\/superheroes\/edit\/[1-9][0-9]*$/',
        'action' => [SuperheroesController::class, 'editAction']
    ));
    $router->add(array(
        'name' => 'sh_del',
        'path' => '/^\/superheroes\/del\/[1-9][0-9]*$/',
        'action' => [SuperheroesController::class, 'delAction']
    ));
}

$router->add(array(
    'name' => 'sh_list',
    'path' => '/^\/superheroes\/list$/',
    'action' => [SuperheroesController::class, 'listAction']
));

$request = $_SERVER['REQUEST_URI'];
$route = $router->match($request);
include("../views/header.php");

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "Not found.";
}
