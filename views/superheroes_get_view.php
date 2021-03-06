<h2><?= $data['superheroe']['nombre'] ?></h2>

<img src="<?= "/upload/" . $data['superheroe']['imagen']; ?>">

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

<?php if ($_SESSION['usuario']["perfil"] == "experto") { ?>
    <p>
        <a href='./del/<?= $data['superheroe']['id'] ?>'>Delete<span class='material-icons'>delete</span></a>
        <a href='./edit/<?= $data['superheroe']['id'] ?>'>Edit<span class='material-icons'>edit</span></a>
    </p>
<?php } 
if ($_SESSION['usuario']["perfil"] == "ciudadano") { ?>
    <p>
        <a href='../peticiones/add/<?= $data['superheroe']['id'] ?>'><span class='material-icons'>add_circle</span></a>
    </p>
<?php } ?>