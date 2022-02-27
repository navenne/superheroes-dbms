<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Laura Hidalgo Rivera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura Hidalgo Rivera</title>
</head>

<body>

    <h1>Superhéroe</h1>

    <ul>
        <li>Id: <?= $data['id'] ?></li>
        <li>Nombre: <?= $data['nombre'] ?></li>
        <li>Velocidad: <?= $data['velocidad'] ?></li>
    </ul>

    <?php
    echo " <a href='./del/" . $data['id'] . "'>Del</a> ";
    echo "<a href='./edit/" . $data['id'] . "&nombre=" . $data['nombre'] . "&velocidad=" . $data['velocidad'] . "'>Edit</a><br><br>";
    ?>
    <a href="/">Volver a inicio</a><br>
    <a href='./list'>Ver todos</a>
</body>

</html>