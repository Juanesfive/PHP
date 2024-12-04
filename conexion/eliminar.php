<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();
$id = $_GET['id'];

if (!$id) {
    die("Error: ID no proporcionado.");
}

try {
    
    $conexion->beginTransaction();

    
    $sql_eliminar_lenguajes = "DELETE FROM lenguajes_usuarios WHERE id_usuario = :id_usuario";
    $stm_eliminar_lenguajes = $conexion->prepare($sql_eliminar_lenguajes);
    $stm_eliminar_lenguajes->bindParam(":id_usuario", $id);
    $stm_eliminar_lenguajes->execute();

    
    $sql_eliminar_usuario = "DELETE FROM usuarios WHERE id_usuarios = :id";
    $stm_eliminar_usuario = $conexion->prepare($sql_eliminar_usuario);
    $stm_eliminar_usuario->bindParam(":id", $id);
    $stm_eliminar_usuario->execute();

    
    $conexion->commit();
    header("Location: lista.php");
    exit();
} catch (Exception $e) {
    
    $conexion->rollBack();
    die("Error al eliminar el registro: " . $e->getMessage());
}
?>



