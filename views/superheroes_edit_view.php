<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Laura Hidalgo Rivera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura Hidalgo Rivera</title>
</head>

<body>

    <h1>Editar</h1>

    <h2>Superhéroe</h2>
    <ul>
        <li>Id: <?=$data['id']?></li>
        <li>Nombre: <?=$data['nombre']?></li>
        <li>Velocidad: <?=$data['velocidad']?></li>
    </ul>

    <form action="" method="post">
        <label>Nombre <input type="text" name="nombre" placeholder="Nombre"></label><span><?=$data['nombreErr']?></span><br><br>
        <label>Velocidad <input type="number" name="velocidad" placeholder="Velocidad"><span><?=$data['velocidadErr']?></span></label><br><br>
        <input type="submit" name="submit" value="Guardar"><br><br>
    </form>

</body>

</html>