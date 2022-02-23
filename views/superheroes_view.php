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
<a href="./superheroes/add">Añadir superhéroe</a><br><br>
    
    <?php

    foreach ($data as $key => $value) {
        echo $value['nombre'];
        echo " <a href='./superheroes/del/'" . $value['id'];
        echo "<a href='update.php?id=" . $value['id'] . "&nombre=" . $value['nombre'] . "'>Edit</a><br>";
    }

    ?>
</body>

</html>