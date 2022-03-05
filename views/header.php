<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Laura Hidalgo Rivera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Laura Hidalgo Rivera</title>
</head>

<body>
    <header>
        <h1><a href="/">Superheroes</a></h1>
        <div>
            <div class="options">
                <a href="/superheroes/list">Listar Superheroes</a>
                <?php if ($_SESSION['usuario']["perfil"] == "ciudadano") { ?>
                    <a href="/peticiones/list">Mis Peticiones</a>
                <?php } ?>
                <?php if ($_SESSION['usuario']["perfil"] == "Experto") { ?>
                    <a href="/superheroes/add">Crear Superheroes</a>
                <?php } ?>
            </div>
            <div>
                <?php
                if ($_SESSION['usuario']["perfil"] == "invitado") { ?>
                    <a href="/register" class="button">Registro</a>
                    <a href="/login" class="button">Iniciar Sesión</a>
                <?php
                } else { ?>
                    <a href="/logout" class="button">Logout</a>
                <?php
                }
                ?>
            </div>
        </div>
    </header>
</body>

</html>