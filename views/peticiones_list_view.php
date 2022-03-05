<table>
    <thead>
        <tr>
            <th>Realizada</th>
            <th>Superhéroe</th>
            <th>ID Petición</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['peticiones'] as $peticion) { ?>
            <tr>
                <td>
                    <span class='material-icons'><?php echo ($peticion['realizada']) ? "done" : "close"; ?></span>
                </td>
                <td>
                    <?= $peticion['superheroe']; ?>
                </td>
                <td>
                    <?= $peticion['id']; ?>
                </td>
                <td>
                    <?= $peticion['titulo']; ?>
                </td>
                <td>
                    <?= $peticion['descripcion']; ?>
                </td>
                <?php 
                if ($_SESSION['usuario']["perfil"] == "ciudadano") { ?>
                    <td>
                        <a href='../del/<?= $peticion['id'] ?>'><span class='material-icons'>delete</span></a>
                    </td>
                <?php } ?>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>