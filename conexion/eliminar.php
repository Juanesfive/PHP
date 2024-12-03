<?php
require('conexion.php');

$db = new Conexion();
$conexion = $db->getConexion();

$id = $_GET['id'];

if (!$id) {
    die("Error: ID no proporcionado.");
}

$sql = "DELETE FROM usuarios WHERE id = :id";
$stm = $conexion->prepare($sql);

if ($stm->execute([':id' => $id])) {
    header("Location: lista.php");
    exit();
} else {
    die("Error al eliminar el registro.");
}
?>



