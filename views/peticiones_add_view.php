<form method="post">
    <label>Titulo <input type="text" name="titulo"></label><span class="error"><?= $data['tituloErr'] ?></span><br><br>
    <label>Descripción <br><textarea name="descripcion" cols="30" rows="10"></textarea><span class="error"><?= $data['descripcionErr'] ?></span><br><br>
    <input type="submit" name="submit" value="Crear"><br><br>
</form>