<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Superheroe;
use App\Models\Habilidad;
use App\Models\Usuario;
use App\Models\Peticion;

class SuperheroesController extends BaseController
{

    public function addAction()
    {
        $data = array();
        $usuario = $data['usuarioErr'] = $psw = $data['pswErr'] = $data['reppswErr'] = $nombre = $data['nombreErr'] = $imagen = $data['imagenErr'] = $data['habilidadesErr'] = "";
        $processform = false;
        $hb = Habilidad::getInstancia();
        $data['habilidades'] = $hb->getAll();

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (!isset($_FILES["imagen"])) {
                $data['imagenErr'] = "La imagen es obligatoria";
                $processform = false;
            } else {
                define("DIRUPLOAD", 'upload/');
                define("MAXSIZE", 20000000000);

                $allowedExts = array("gif", "jpeg", "jpg", "png", "PNG");
                $allowedFormat = array("image/gif", "image/jpeg", "image/jpg", "image/jpeg", "image/x-png", "image/png", "image/PNG");

                $temp = explode(".", $_FILES["imagen"]["name"]);
                $extension = end($temp);

                if (($_FILES["imagen"]["size"] < MAXSIZE) &&
                    in_array($_FILES["imagen"]["type"], $allowedFormat)  &&
                    in_array($extension, $allowedExts)
                ) {
                    if ($_FILES["imagen"]["error"] > 0) {
                        $data['imagenErr'] = "Error: " . $_FILES["imagen"]["error"];
                        $processform = false;
                    } else {
                        $filename = $_FILES["imagen"]["name"];
                        $imagen = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES["imagen"]["tmp_name"], DIRUPLOAD . $imagen);
                    }
                } else {
                    $data['imagenErr'] = "Invalid file";
                    $processform = false;
                }
            }

            if (preg_match("/^[\d\w]{3,15}$/i", $_POST['usuario']) != 1) {
                $data['usuarioErr'] = "Obligatorio de 3 a 15 caracteres. Solo permitido: letras, números y guion bajo _";
                $processform = false;
            } else {
                $us = Usuario::getInstancia();
                $us->setUsuario($_POST['usuario']);
                if ($us->search() != "") {
                    $data['usuarioErr'] = "Ya existe ese usuario";
                    $processform = false;
                } else {
                    $usuario = $_POST["usuario"];
                }
            }

            if ($_POST["psw"] != $_POST["reppsw"]) {
                $data['pswErr'] = $data['reppswErr'] = "Las contraseñas no coinciden";
                $processform = false;
            } else if (empty($_POST["psw"]) || empty($_POST["reppsw"])) {
                $data['pswErr'] = $data['reppswErr'] = "Campo obligatorio";
                $processform = false;
            } else if (preg_match("/^(.{21,}|.{0,7}|[^a-z]{1,}|[^A-Z]{1,}|[^\d]{1,}|[^\W]{1,})$|[\s]/", $_POST['psw']) == 1) {
                $data['pswErr'] = "La contraseña debe tener entre 8 y 20 caracteres y al menos 1 mayúscula, 1 número, 1 caracter especial. No puede contener espacios";
                $processform = false;
            } else {
                $psw = password_hash($_POST["psw"], PASSWORD_DEFAULT);
            }

            foreach ($data['habilidades'] as $key => $habilidad) {
                $id = $habilidad['id'];
                if (isset($_POST["$id"]) && empty($_POST["valor$id"])) {
                    $data['habilidadesErr'] = "Por favor introduce un valor para cada habilidad seleccionada";
                    $processform = false;
                }
            }

            if ($processform) {
                $us = Usuario::getInstancia();
                $us->setUsuario($usuario);
                $us->setPsw($psw);
                $us->set();
                $idUsuario = $us->lastInsert();

                $sh = Superheroe::getInstancia();
                $sh->setNombre($nombre);
                $sh->setImagen($imagen);
                $sh->setEvolucion('principiante');
                $sh->setIdUsuario($idUsuario);
                $sh->set();

                $habilidades = array();
                foreach ($data['habilidades'] as $habilidad) {
                    $id = $habilidad['id'];
                    if (isset($_POST["$id"])) {
                        $habilidades[$id] = $_POST["valor$id"];
                    }
                }
                $sh->setId($sh->lastInsert());
                $sh->setHabilidades($habilidades);

                header("Location: /");
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
        $id = $data['id'] = explode("/", $_SERVER["REQUEST_URI"])[3];
        $sh = Superheroe::getInstancia();
        $sh->setId($id);
        $data['sh_habilidades'] = $sh->getHabilidades();
        $data['nombre'] = $sh->get()['nombre'];
        $imagen = $sh->get()['imagen'];
        $idUsuario = $sh->get()['idUsuario'];
        $nombre = $data['nombreErr'] = $data['imagenErr'] = $data['habilidadesErr'] = "";
        $hb = Habilidad::getInstancia();
        $data['habilidades'] = $hb->getAll();
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;
            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (isset($_FILES['imagen_edit'])) {
                define("DIRUPLOAD", 'upload/');
                define("MAXSIZE", 20000000000);

                $allowedExts = array("gif", "jpeg", "jpg", "png", "PNG");
                $allowedFormat = array("image/gif", "image/jpeg", "image/jpg", "image/jpeg", "image/x-png", "image/png", "image/PNG");

                $temp = explode(".", $_FILES["imagen_edit"]["name"]);
                $extension = end($temp);

                if (($_FILES["imagen_edit"]["size"] < MAXSIZE) &&
                    in_array($_FILES["imagen_edit"]["type"], $allowedFormat)  &&
                    in_array($extension, $allowedExts)
                ) {
                    if ($_FILES["imagen_edit"]["error"] > 0) {
                        $data['imagenErr'] = "Error: " . $_FILES["imagen_edit"]["error"];
                        $processform = false;
                    } else {
                        $filename = $_FILES["imagen_edit"]["name"];
                        $imagen = uniqid() . '.' . pathinfo($filename, PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES["imagen_edit"]["tmp_name"], DIRUPLOAD . $imagen);
                    }
                }
            }

            foreach ($data['habilidades'] as $key => $habilidad) {
                $id = $habilidad['id'];
                if (isset($_POST["$id"]) && empty($_POST["valor$id"])) {
                    $data['habilidadesErr'] = "Por favor introduce un valor para cada habilidad seleccionada";
                    $processform = false;
                }
            }

            if ($processform) {
                $sh = Superheroe::getInstancia();
                $sh->setId($data['id']);
                $sh->setNombre($nombre);
                $sh->setImagen($imagen);
                $sh->setEvolucion('principiante');
                $sh->setIdUsuario($idUsuario);
                $habilidades = array();
                foreach ($data['habilidades'] as $habilidad) {
                    $id = $habilidad['id'];
                    if (isset($_POST["$id"])) {
                        $habilidades[$id] = $_POST["valor$id"];
                    }
                }
                $sh->updateHabilidades($habilidades);
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

    public function petitionsListAction()
    {
        $pt = Peticion::getInstancia();
        $sh = Superheroe::getInstancia();
        $sh->setIdUsuario($_SESSION['usuario']['id']);
        $id = $sh->getByIdUsuario()['id'];
        $sh->setId($id);
        $data = array();
        $data['peticiones'] = $sh->getPeticiones();

        if (isset($_POST["submit"])) {

            $pt = Peticion::getInstancia();
            foreach ($_POST['check'] as $key => $peticion) {
                $pt->setId($peticion);
                $pt->setRealizadaDb(true);
            }
                header('Location: /');
        } else {
            $this->renderHTML('..\views\peticiones_superheroes_list_view.php', $data);
        }
    }

}
