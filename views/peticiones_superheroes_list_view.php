<table>
    <thead>
        <tr>
            <th>Realizada</th>
            <th>ID Petición</th>
            <th>Título</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <form method="post">
        <?php
        foreach ($data['peticiones'] as $peticion) { ?>
            <tr>
                <td>
                    <input type="checkbox" value="<?= $peticion['id']; ?>" name="check[]" <?php echo ($peticion['realizada']) ? "checked disabled" : "" ?>>
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
            </tr>
        <?php
        }
        ?>
        <input type="submit" value="Guardar" name="submit" class="ptlistguardar">
        </form>
    </tbody>
</table>