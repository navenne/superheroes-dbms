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
        <a href='./superheroes/del/<?= $superheroe['id'] ?>'><span class='material-icons'>delete</span></a>
        <a href='./superheroes/edit/<?= $superheroe['id'] ?>&nombre=<?= $superheroe['nombre'] ?>'><span class='material-icons'>edit</span></a>
    </p>
<?php
}
?>