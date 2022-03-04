<h2><?= $data['superheroe']['nombre'] ?></h2>

<img src="<?= "upload/" . $data['superheroe']['imagen']; ?>">

<ul>
    <li>Id: <?= $data['superheroe']['id'] ?></li>
    <li>Evolución: <?= $data['superheroe']['evolucion'] ?></li>
    <li>Habilidades:
        <ul>
            <?php
            foreach ($data['superheroe']['habilidades'] as $habilidad) { ?>
                <li><?= $habilidad['nombre'] ?>: <?= $habilidad['valor'] ?></li>
            <?php }
            ?>
        </ul>
    </li>
</ul>

<?php if ($_SESSION['usuario']["perfil"] == "Experto") { ?>
    <p>
        <a href='./del/<?= $data['superheroe']['id'] ?>'>Delete<span class='material-icons'>delete</span></a>
        <a href='./edit/<?= $data['superheroe']['id'] ?>&nombre=<?= $data['superheroe']['nombre'] ?>'>Edit<span class='material-icons'>edit</span></a>
    </p>
<?php } ?>