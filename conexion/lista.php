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
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Correo</th>
        <th>Fecha de Nacimiento</th>
        <th>ID Género</th>
        <th>ID Ciudad</th>
        <th>Lenguajes Seleccionados</th>
    </thead>
    <tbody>
    <?php
        foreach ($usuarios as $key => $value) {
    ?>
            <tr>
            <td><?= $value['id'] ?></td>
            <td><?= $value['Nombre'] ?></td>
            <td><?= $value['Apellido'] ?></td>
            <td><?= $value['Correo'] ?></td>
            <td><?= $value['Fecha de Nacimiento'] ?></td>
            <td><?= $value['ID Género'] ?></td>
            <td><?= $value['ID Ciudad'] ?></td>
            <td><?= $value['Lenguajes Seleccionados'] ?></td>
            <td><a href="editar.php?id=<?=$value['id'] ?>">editar</a></td>
            <td><a href="eliminar.php?id=<?= $value['id'] ?>">eliminar</a></td>
            </tr>
        <?php
        }
        ?>
            
    </tbody>
</table>

