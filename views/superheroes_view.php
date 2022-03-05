<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Evolución</th>
            <th>Habilidades</th>
            <?php if ($_SESSION['usuario']["perfil"] == "experto" || $_SESSION['usuario']["perfil"] == "ciudadano") { ?>
                <th>Acciones</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['superheroes'] as $superheroe) { ?>
            <tr>
                <td>
                    <?= $superheroe['id']; ?>
                </td>
                <td>
                    <img src="<?= "upload/" . $superheroe['imagen']; ?>">
                </td>
                <td>
                    <?= $superheroe['nombre']; ?>
                </td>
                <td>
                    <?= $superheroe['evolucion']; ?>
                </td>
                <td>
                    <ul>
                        <?php
                        foreach ($superheroe['habilidades'] as $habilidad) { ?>
                            <li><?= $habilidad['nombre'] ?>: <?= $habilidad['valor'] ?></li>
                        <?php }
                        ?>
                    </ul>
                </td>
                <?php if ($_SESSION['usuario']["perfil"] == "experto") { ?>
                    <td>
                        <a href='./superheroes/del/<?= $superheroe['id'] ?>'><span class='material-icons'>delete</span></a>
                        <a href='./superheroes/edit/<?= $superheroe['id'] ?>'><span class='material-icons'>edit</span></a>
                    </td>
                <?php }
                if ($_SESSION['usuario']["perfil"] == "ciudadano") { ?>
                    <td>
                        <a href='./peticiones/add/<?= $superheroe['id'] ?>'><span class='material-icons'>add_circle</span></a>
                    </td>
                <?php } ?>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>