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
$lenguajes_seleccionados = $_POST['LENGUAJES'] ?? null;

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
    $errores[] = "El correo electrónico ya está registrado en la base de datos. ";
}


if (empty($id_genero)) {
    $errores[] = "Debes seleccionar al menos un género. ";
}


if (empty($lenguajes_seleccionados)) {
    $errores[] = "Debes seleccionar al menos un lenguaje. ";
}


if (count($errores) > 0) {
    foreach ($errores as $key => $value) {
        echo "<p class='error-mensaje'>Error: $value</p>";
    }
    exit(); 
}



$sql_usuarios = "INSERT INTO usuarios (nombre, apellido, correo, fecha_nacimiento, id_genero, id_ciudad) VALUES (:nombre, :apellido, :correo, :fecha_nacimiento, :id_genero, :id_ciudad)";
$stm_usuarios = $conexion->prepare($sql_usuarios);
$stm_usuarios->bindParam(":nombre", $nombre);
$stm_usuarios->bindParam(":apellido", $apellido);
$stm_usuarios->bindParam(":correo", $correo);
$stm_usuarios->bindParam(":fecha_nacimiento", $fecha_nacimiento);
$stm_usuarios->bindParam(":id_genero", $id_genero);
$stm_usuarios->bindParam(":id_ciudad", $id_ciudad);

if ($stm_usuarios->execute()) {
    $id_usuario = $conexion->lastInsertId();
    
    
    $sqlR = "INSERT INTO lenguajes_usuarios (id_usuario, id_lenguaje) VALUES (:id_usuario, :id_lenguaje)";
    $stmR = $conexion->prepare($sqlR);
    
    foreach ($lenguajes_seleccionados as $key => $value) {
        $stmR->bindParam(":id_usuario", $id_usuario);
        $stmR->bindParam(":id_lenguaje", $value);
        $stmR->execute();
    }

    header("Location: lista.php");
} else {
    echo "Error al insertar el usuario.";
}
?>