<h2>Registro de ciudadanos</h2>

<form action="" method="post">
    <label>Nombre <input type="text" name="nombre"></label><span class="error"><?=$data['nombreErr']?></span><br><br>
    <label>E-mail <input type="email" name="email" placeholder="example@email.com"></label><span class="error"><?=$data['emailErr']?></span><br><br>
    <label>Nombre de usuario <input type="text" name="usuario"></label><span class="error"><?=$data['usuarioErr']?></span><br><br>
    <label>Contraseña <input type="password" name="psw"></label><span class="error"><?=$data['pswErr']?></span><br><br>
    <label>Repetir contraseña <input type="password" name="reppsw"></label><span class="error"><?=$data['reppswErr']?></span><br><br>
    <input type="submit" name="submit" value="Registrarse">
</form>