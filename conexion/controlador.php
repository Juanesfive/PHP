<?php
require('conexion.php');

$db = new Conexion();

echo "<pre>";
print_r($_POST); 
echo "</pre>";

$conexion = $db->getConexion();

// Capturar los datos enviados por el formulario
$nombre = $_POST['nombre'] ?? null;
$apellido = $_POST['apellido'] ?? null;
$correo = $_POST['correo'] ?? null;
$fecha_nacimiento = $_POST['fecha_nacimiento'] ?? null;
$id_genero = $_POST['id'] ?? null; 
$id_ciudad = $_POST['id_ciudad'] ?? null;
$lenguajes_seleccionados = $_POST['LENGUAJES'] ?? []; // Array de lenguajes seleccionados

// Validar los datos obligatorios
if (!$nombre || !$apellido || !$correo || !$fecha_nacimiento || !$id_genero || !$id_ciudad) {
    die("Error: Faltan datos obligatorios.");
}

// Insertar en la tabla USUARIOS
$sql_usuarios = "INSERT INTO usuarios (nombre, apellido, correo, fecha_nacimiento, id_genero, id_ciudad) 
                 VALUES (:nombre, :apellido, :correo, :fecha_nacimiento, :id_genero, :id_ciudad)";
$stm_usuarios = $conexion->prepare($sql_usuarios);

$stm_usuarios->bindParam(":nombre", $nombre);
$stm_usuarios->bindParam(":apellido", $apellido);
$stm_usuarios->bindParam(":correo", $correo);
$stm_usuarios->bindParam(":fecha_nacimiento", $fecha_nacimiento);
$stm_usuarios->bindParam(":id_genero", $id_genero);
$stm_usuarios->bindParam(":id_ciudad", $id_ciudad);

if ($stm_usuarios->execute()) {
    echo "Datos del usuario guardados exitosamente.<br>";
} else {
    die("Error al guardar los datos del usuario.");
}

// Obtener el ID del usuario recién insertado
$id_usuario = $conexion->lastInsertId();

// Insertar lenguajes seleccionados en lenguajes_usuarios
foreach ($lenguajes_seleccionados as $id_lenguaje) {
    $sql_lenguajes_usuarios = "INSERT INTO lenguajes_usuarios (id_usuario, id_lenguaje) VALUES (:id_usuario, :id_lenguaje)";
    $stm_lenguajes_usuarios = $conexion->prepare($sql_lenguajes_usuarios);

    $stm_lenguajes_usuarios->bindParam(":id_usuario", $id_usuario);
    $stm_lenguajes_usuarios->bindParam(":id_lenguaje", $id_lenguaje);

    if ($stm_lenguajes_usuarios->execute()) {
        echo "Lenguaje con ID $id_lenguaje asociado al usuario exitosamente.<br>";
    } else {
        echo "Error al asociar el lenguaje con ID $id_lenguaje.<br>";
    }
}



// $usuario = $stm -> execute();

// $id_usuario  = $conexion -> lastInsertId();

// var_dump($id_usuario);