<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();

$sql = "SELECT * FROM usuarios";
$stm_usuarios = $conexion->prepare($sql);
$stm_usuarios->execute();
$usuarios = $stm_usuarios->fetchAll();

?>

<table border="1">
    <thead>
        <th>id</th>
        <th>Nombre</th>
        <th>apellido</th>
        <th>Correo</th>
        <th>Fecha de Nacimiento</th>
        <th>ID Género</th>
        <th>ID Ciudad</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php
        foreach ($usuarios as $key => $value) {
    ?>
            <tr>
            <td><?= $value['id'] ?></td>
            <td><?= $value['nombre'] ?></td>
            <td><?= $value['apellido'] ?></td>
            <td><?= $value['correo'] ?></td>
            <td><?= $value['fecha_nacimiento'] ?></td>
            <td><?= $value['id_genero'] ?></td>
            <td><?= $value['id_ciudad'] ?></td>
            <td><a href="editar.php?id=<?=$value['id'] ?>">editar</a></td>
            <td><a href="eliminar.php?id=<?= $value['id'] ?>">eliminar</a></td>
            </tr>
        <?php
        }
        ?>
            
    </tbody>
</table>

