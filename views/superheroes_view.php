<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Evolución</th>
            <th>Habilidades</th>
            <th>Acciones</th>
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
                    <?= $superheroe['imagen']; ?>
                </td>
                <td>
                    <?= $superheroe['nombre']; ?>
                </td>
                <td>
                    <?= $superheroe['evolucion']; ?>
                </td>
                <td>
                    <?php
                    foreach ($data['habilidades'] as $habilidades) {
                        foreach ($habilidades as $habilidad) {
                            echo $habilidad['nombre'] . "  ";
                        }
                    }
                    ?>
                </td>
                <td>
                    <a href='./superheroes/del/<?= $superheroe['id'] ?>'><span class='material-icons'>delete</span></a>
                    <a href='./superheroes/edit/<?= $superheroe['id'] ?>&nombre=<?= $superheroe['nombre'] ?>'><span class='material-icons'>edit</span></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>