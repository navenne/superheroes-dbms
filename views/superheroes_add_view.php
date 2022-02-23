<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Laura Hidalgo Rivera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura Hidalgo Rivera</title>
</head>

<body>

    <h1>Añadir superhéroe</h1>

    <form action="" method="post">
        <label>Nombre <input type="text" name="nombre"></label><span><?=$data['nombreErr']?></span><br><br>
        <label>Velocidad <input type="number" name="velocidad"><span><?=$data['velocidadErr']?></span></label><br><br>
        <input type="submit" name="submit" value="Añadir"><br><br>
    </form>

</body>

</html>