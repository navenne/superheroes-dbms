<form action="" method="post">
    <label>Por id <input type="number" placeholder="Buscar por id..." name="id"></label>
    <input type="submit" name="buscarId" value="Buscar">
</form>

<form action="" method="post">
    <label>Por nombre <input type="text" placeholder="Buscar por nombre..." name="nombre"></label>
    <input type="submit" name="buscarNombre" value="Buscar">
</form>

<?php
foreach ($data['superheroes'] as $superheroe) { ?>
    <p>
        <?= $superheroe['nombre']; ?> |
        <?php
        foreach ($data['habilidades'] as $habilidades) {
            foreach ($habilidades as $habilidad) {
                echo $habilidad['nombre'] . "  ";
            }
        }
        ?>
    <a href='../del/<?=$superheroe['id']?>'><span class='material-icons'>delete</span></a>
    <a href='../edit/<?=$superheroe['id']?>&nombre=<?=$superheroe['nombre']?>'><span class='material-icons'>edit</span></a>
    </p>
<?php
}
?>