<?php

/**
 * @author Laura Hidalgo Rivera
 * 
 */

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Ciudadano;

class AuthController extends BaseController
{
    public function registerAction()
    {
        $data = array();
        $usuario = $data['usuarioErr'] = $psw = $data['pswErr'] = $data['reppswErr'] = "";
        $processform = false;

        if (isset($_POST["submit"])) {
            $processform = true;

            if (empty($_POST["nombre"])) {
                $data['nombreErr'] = "El nombre es obligatorio";
                $processform = false;
            } else {
                $nombre = stripslashes(htmlspecialchars(trim($_POST["nombre"])));
            }

            if (preg_match("/^[\w\-\.]+(?<![_\.-])@([\w-]+\.)+[\w-]{2,4}$/", $_POST["email"]) != 1) {
                $data['emailErr'] = "Formato incorrecto. Ej: example@email.com";
                $processform = false;
            } else {
                $email = stripslashes(htmlspecialchars(trim($_POST["email"])));
            }

            if (preg_match("/^[\d\w]{3,15}$/i", $_POST['usuario']) != 1) {
                $data['usuarioErr'] = "Obligatorio de 3 a 15 caracteres. Solo permitido: letras, números y guion bajo _";
                $processform = false;
            } else {
                $usuario = $_POST["usuario"];
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
            
            if ($processform) {
                $us = Usuario::getInstancia();
                $us->setUsuario($usuario);
                $us->setPsw($psw);
                $us->set();

                $ci = Ciudadano::getInstancia();
                $ci->setNombre($nombre);
                $ci->setEmail($email);
                $ci->setIdUsuario($us->lastInsert());
                $ci->set();

                $this->renderHTML('..\views\superheroes_view.php');
            } else {
               $this->renderHTML('..\views\registro_view.php');
            }
        } else {
            $this->renderHTML('..\views\registro_view.php');
        }
    }
}
