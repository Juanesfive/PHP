<?php
require('conexion.php');

$db = new Conexion();

// echo "<pre>";
// print_r($_REQUEST);
// echo "</pre>";

$conexion = $db->getConexion();


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_genero = $_POST['id'];
$id_ciudad = $_POST['id_ciudad'];
$lenguajes_seleccionados = $_POST['LENGUAJES'];

if (!$nombre || !$apellido || !$correo || !$fecha_nacimiento || !$id_genero || !$id_ciudad) {
    echo "Error: Faltan datos obligatorios.<br>";
} else {

    echo "Todos los datos obligatorios están presentes.<br>";
}

$sql_usuarios = "INSERT INTO usuarios (nombre, apellido, correo, fecha_nacimiento, id_genero, id_ciudad) 
                 VALUES (:nombre, :apellido, :correo, :fecha_nacimiento, :id_genero, :id_ciudad)";
$stm_usuarios = $conexion->prepare($sql_usuarios);

$stm_usuarios->bindParam(":nombre", $nombre);
$stm_usuarios->bindParam(":apellido", $apellido);
$stm_usuarios->bindParam(":correo", $correo);
$stm_usuarios->bindParam(":fecha_nacimiento", $fecha_nacimiento);
$stm_usuarios->bindParam(":id_genero", $id_genero);
$stm_usuarios->bindParam(":id_ciudad", $id_ciudad);

if ($stm_usuarios->execute())


    $id_usuario = $conexion->lastInsertId();





foreach ($lenguajes_seleccionados as $key => $value) {
    echo $key . " " . $value;
    $sqlR = "INSERT INTO lenguajes_usuarios (id_usuario, id_lenguaje) VALUES (:id_usuario, :id_lenguaje)";
    $stmR = $conexion->prepare($sqlR);

    $stmR->bindParam(":id_lenguaje ", $id_usuario);
    $stmR->bindParam(":id_usuario", $value);
    // $stmR->execute();
}
header("Location: lista.php");