<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Laura Hidalgo Rivera">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laura Hidalgo Rivera</title>
</head>

<body>

    <h1>Crear superhéroe</h1>

    <a href="/">Volver a inicio</a><br><br>

    <form action="" method="post">
        <label>Nombre <input type="text" name="nombre" placeholder="Nombre"></label><span><?=$data['nombreErr']?></span><br><br>
        <label>Velocidad <input type="number" name="velocidad" placeholder="Velocidad"><span><?=$data['velocidadErr']?></span></label><br><br>
        <input type="submit" name="submit" value="Crear"><br><br>
    </form>

</body>

</html>