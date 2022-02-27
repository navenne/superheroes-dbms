<h2><?= $data['nombre'] ?></h2>
<ul>
    <li>Id: <?= $data['id'] ?></li>
</ul>

<form action="" method="post">
    <label>Nombre <input type="text" name="nombre" placeholder="Nombre"></label><span><?= $data['nombreErr'] ?></span><br><br>
    <label>Velocidad <input type="number" name="velocidad" placeholder="Velocidad"><span><?= $data['velocidadErr'] ?></span></label><br><br>
    <input type="submit" name="submit" value="Guardar"><br><br>
</form>