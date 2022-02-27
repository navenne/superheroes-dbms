<h2><?= $data['superheroe']['nombre'] ?></h2>

<ul>
    <li>Id: <?= $data['superheroe']['id'] ?></li>
    <li>Habilidades:
        <ul>
            <?php
            foreach ($data['habilidades'] as $habilidad) { ?>
                <li><?=$habilidad['nombre']?><li>
                <?php
            }
                ?>
        </ul>
    </li>
</ul>

<p>
    <a href='./del/<?= $data['superheroe']['id'] ?>'>Delete<span class='material-icons'>delete</span></a>
    <a href='./edit/<?= $data['superheroe']['id'] ?>&nombre=<?= $data['superheroe']['nombre'] ?>'>Edit<span class='material-icons'>edit</span></a>
</p>