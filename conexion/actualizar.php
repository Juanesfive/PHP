<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();

// print_r($_REQUEST);


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_genero = $_POST['id'];
$id_ciudad = $_POST['id_ciudad'];
$lenguajes_seleccionados = $_POST['LENGUAJES'];

try {

    $conexion -> beginTransaction();
    $sql_actualizar = "UPDATE usuarios SET nombre = :nombre, apellido = :apellido, correo = :correo, fecha_nacimiento = :fecha_nacimiento, id_genero = :id_genero, id_ciudad = :id_ciudad WHERE id = :id";
    $conexionActualizar = $conexion->prepare($sql_actualizar);

    

    $conexionActualizar->bindParam(":id", $_REQUEST['id']);
    $conexionActualizar->bindParam(":nombre", $nombre);
    $conexionActualizar->bindParam(":apellido", $apellido);
    $conexionActualizar->bindParam(":correo", $correo);
    $conexionActualizar->bindParam(":fecha_nacimiento", $fecha_nacimiento);
    $conexionActualizar->bindParam(":id_genero", $id_genero);
    $conexionActualizar->bindParam(":id_ciudad", $id_ciudad);
    $conexionActualizar->bindParam(":usuario_id", $usuario_id);
    // $conexionActualizar->execute();

    // eliminar los datos para volver a insertarlos
    $sql_eliminar = "DELETE FROM lenguajes_usuarios WHERE id_usuario = :id_usuario";
    $stm_eliminar = $conexion->prepare($sql_eliminar);
    $stm_eliminar->bindParam(":id_usuario", $usuario_id);
    $stm_eliminar->execute();

    // se inserta de nuevo los que el usuario ha seleccionado

    $sqlLenguaje = "insert into lenguajes_usuarios (id_usuario, id_lenguaje) values (:id_usuario, :id_lenguaje)";

    $conexionLenguaje = $conexion->prepare($sqlLenguaje);

    foreach ($lenguajes_seleccionados as $lenguaje) {
        $conexionLenguaje->bindParam(":id_usuario", $usuario_id);
        $conexionLenguaje->bindParam(":id_lenguaje", $lenguaje);
        $conexionLenguaje->execute();
    }

    $conexion->commit();

    header("Location: lista.php");

    $conexion->rollBack();




} catch (Exception $th) {
    echo "Error: al actualizar " . $th;

    
}