<?php
foreach ($data as $key => $value) { ?>
    <p><?=$value['nombre'];?>
    <a href='./superheroes/del/<?=$value['id']?>'><span class='material-icons'>delete</span></a>
    <a href='./superheroes/edit/<?=$value['id']?>&nombre=<?=$value['nombre']?>'><span class='material-icons'>edit</span></a>
    </p>
<?php
}
?>
