<form action="" method="post">
    <label>Por id <input type="number" placeholder="Buscar por id..." name="id"></label>
    <input type="submit" name="buscarId" value="Buscar">
</form>

<form action="" method="post">
    <label>Por nombre <input type="text" placeholder="Buscar por nombre..." name="nombre"></label>
    <input type="submit" name="buscarNombre" value="Buscar">
</form>

<?php
foreach ($data as $key => $value) { ?>
    <p><?=$value['nombre'];?>
    <a href='../del/<?=$value['id']?>'><span class='material-icons'>delete</span></a>
    <a href='../edit/<?=$value['id']?>&nombre=<?=$value['nombre']?>'><span class='material-icons'>edit</span></a>
    </p>
<?php
}
?>