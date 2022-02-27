<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Laura Hidalgo Rivera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura Hidalgo Rivera</title>
</head>

<body>

<h1>Superhéroes</h1>
<a href="./superheroes/add">Crear superhéroe</a><br><br>
<a href="./superheroes/list">Ver todos</a><br><br>

    <?php

    foreach ($data as $key => $value) {
        echo $value['nombre'];
        echo " <a href='./superheroes/del/" . $value['id'] . "'>Del</a> ";
        echo "<a href='./superheroes/edit/" . $value['id'] . "&nombre=" . $value['nombre'] . "&velocidad=" . $value['velocidad'] . "'>Edit</a><br>";
    }

    ?>
</body>

</html>