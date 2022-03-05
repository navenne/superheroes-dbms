<?php
$ids = array();
$valores = array();
$i = 0;
foreach ($data['sh_habilidades'] as $key => $sh_habilidad) {
    array_push($ids, $sh_habilidad['idHabilidad']);
    array_push($valores, $sh_habilidad['valor']);
}
?>

<h2>Editando: <?= $data['nombre'] ?></h2>

<form action="" method="post" enctype="multipart/form-data">
    <label>Nombre <input type="text" name="nombre" placeholder="Nombre" value="<?=$data['nombre']?>"></label><span class="error"><?= $data['nombreErr'] ?></span><br><br>
    <label>Foto <input type="file" name="imagen_edit"> </label><span class="error"><?= $data['imagenErr'] ?></span><br><br>
    Habilidades <span class="error"><?= $data['habilidadesErr'] ?></span><br><br>
    <?php
    foreach ($data['habilidades'] as $key => $habilidad) { ?>
        <input type="checkbox" name="<?= $habilidad['id'] ?>" <?php echo (in_array($habilidad['id'], $ids)) ? "checked" : "" ?>><?= ucwords($habilidad['nombre']) ?>
        <input type="number" name="valor<?= $habilidad['id'] ?>" value="<?php
        if (in_array($habilidad['id'], $ids)) {
            echo $valores[$i];
            $i++;
        }
        ?>" placeholder="Valor..."><br><br>
    <?php } ?>
    </label>
    <input type="submit" name="submit" value="Guardar"><br><br>
</form>