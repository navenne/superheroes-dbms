<h2><?= $data['nombre'] ?></h2>

<ul>
    <li>Id: <?= $data['id'] ?></li>
</ul>

<p>
    <a href='./del/<?= $value['id'] ?>'>Delete<span class='material-icons'>delete</span></a>
    <a href='./edit/<?= $value['id'] ?>&nombre=<?= $value['nombre'] ?>'>Edit<span class='material-icons'>edit</span></a>
</p>