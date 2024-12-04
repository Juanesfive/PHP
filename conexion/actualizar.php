<link rel="stylesheet" type="text/css" href="./style.css">
<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_genero = $_POST['id_genero'];
$id_ciudad = $_POST['id_ciudad'];
$id_usuario = $_POST['id'];
$lenguajes_seleccionados = $_POST['LENGUAJES'];

$errores = [];


if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{1,}$/", $nombre)) {
    $errores[] = "El nombre debe contener al menos un nombre y solo puede incluir letras y espacios.";
}


if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚÑñ\s]{1,}$/", $apellido)) {
    $errores[] = "El apellido debe contener al menos un apellido y solo puede incluir letras y espacios.";
}


if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $correo)) {
    $errores[] = "El correo electrónico no es válido.";
}


$sql_verificar_correo = "SELECT * FROM usuarios WHERE correo = :correo";
$stm_verificar_correo = $conexion->prepare($sql_verificar_correo);
$stm_verificar_correo->bindParam(":correo", $correo);
$stm_verificar_correo->execute();
if ($stm_verificar_correo->rowCount() > 0) {
    $errores[] = "El correo electrónico ya está registrado en la base de datos.";
}

if (empty($id_genero)) {
    $errores[] = "Debes seleccionar al menos un género.";
}
if (empty($lenguajes_seleccionados)) {
    $errores[] = "Debes seleccionar al menos un lenguaje.";
}


if (count($errores) > 0) {
    foreach ($errores as $error) {
        echo "<p class='error-mensaje'>Error: $error</p>";
    }
    exit();
}


try {
    $conexion->beginTransaction();

    
    $sql_actualizar = "UPDATE usuarios SET nombre = :nombre,
    apellido = :apellido, correo = :correo, fecha_nacimiento =
    :fecha_nacimiento, id_genero = :id_genero, id_ciudad = :id_ciudad
    WHERE id_usuarios = :id_usuario";
    $conexionActualizar = $conexion->prepare($sql_actualizar);
    $conexionActualizar->bindParam(":id_usuario", $id_usuario);
    $conexionActualizar->bindParam(":nombre", $nombre);
    $conexionActualizar->bindParam(":apellido", $apellido);
    $conexionActualizar->bindParam(":correo", $correo);
    $conexionActualizar->bindParam(":fecha_nacimiento", $fecha_nacimiento);
    $conexionActualizar->bindParam(":id_genero", $id_genero);
    $conexionActualizar->bindParam(":id_ciudad", $id_ciudad);
    
    $conexionActualizar->execute();


    $sql_eliminar = "DELETE FROM lenguajes_usuarios WHERE id_usuario = :id_usuario";
    $stm_eliminar = $conexion->prepare($sql_eliminar);
    $stm_eliminar->bindParam(":id_usuario", $id_usuario);
    $stm_eliminar->execute();


    $sqlLenguaje = "INSERT INTO lenguajes_usuarios (id_usuario, id_lenguaje) VALUES (:id_usuario, :id_lenguaje)";
    $conexionLenguaje = $conexion->prepare($sqlLenguaje);
    
    foreach ($lenguajes_seleccionados as $id_lenguaje) {
        $conexionLenguaje->bindParam(":id_usuario", $id_usuario);
        $conexionLenguaje->bindParam(":id_lenguaje", $id_lenguaje);
        $conexionLenguaje->execute();
    }

    $conexion->commit();
    header("Location: lista.php");
} catch (Exception $th) {
    $conexion->rollBack();
    echo "Error: al actualizar " . $th->getMessage();
}
?>
