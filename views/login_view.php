<h2>Iniciar Sesión</h2>

<form action="" method="post">
    <label>Usuario <input type="text" name="usuario"></label><span class="error"><?=$data['usuarioErr']?></span><br><br>
    <label>Contraseña <input type="password" name="psw"></label><span class="error"><?=$data['pswErr']?></span><br><br>
    <input type="submit" name="submit" value="Iniciar Sesión">
</form>