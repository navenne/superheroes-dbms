<form method="post" enctype="multipart/form-data">
    <label>Nombre de usuario <input type="text" name="usuario"></label><span class="error"><?= $data['usuarioErr'] ?></span><br><br>
    <label>Contraseña <input type="password" name="psw"></label><span class="error"><?= $data['pswErr'] ?></span><br><br>
    <label>Repetir contraseña <input type="password" name="reppsw"></label><span class="error"><?= $data['reppswErr'] ?></span><br><br>
    <label>Nombre <input type="text" name="nombre" placeholder="Nombre"></label><span class="error"><?= $data['nombreErr'] ?></span><br><br>
    <label>Foto <input type="file" name="imagen" id="imagen"> </label><span class="error"><?= $data['imagenErr'] ?></span><br><br>
    Habilidades <span class="error"><?= $data['habilidadesErr'] ?></span><br><br>
    <?php
    foreach ($data['habilidades'] as $key => $habilidad) { ?>
        <input type="checkbox" name="<?= $habilidad['id'] ?>"><?= ucwords($habilidad['nombre']) ?>
        <input type="number" name="valor<?= $habilidad['id'] ?>" placeholder="Valor..."><br><br>
    <?php } ?>
    </label>
    <input type="submit" name="submit" value="Crear"><br><br>
</form>