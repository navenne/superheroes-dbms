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
<a href="/">Volver a inicio</a><br><br>
<form action="" method="post">
    <input type="number" placeholder="Buscar por id..." name="id">
    <input type="submit" name="submit" value="Buscar">
</form>
    
    <?php

    foreach ($data as $key => $value) {
        echo $value['nombre'];
        echo " <a href='../del/" . $value['id'] . "'>Del</a> ";
        echo "<a href='../edit/" . $value['id'] . "&nombre=" . $value['nombre'] . "&velocidad=" . $value['velocidad'] . "'>Edit</a><br>";
    }

    ?>
</body>

</html>