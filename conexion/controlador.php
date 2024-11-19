<?php
require('conexion.php');

$db = new Conexion();

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
$conexion = $db->getConexion();

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_genero = $_POST['id_genero'];
$id_ciudad = $_POST['id_ciudad'];
$id_leng = $_POST['id_leng'];

$sql = "INSERT INTO USUARIOS (nombre,apellido,correo,fecha_nacimiento, fk_id_genero,fk_id_ciudad) VALUES
(:nombre, :apellido, :correo, :fecha_nacimiento, :fk_id_genero, :fk_id_ciudad)";

$sql = "INSERT INTO LENGUAJES (id_leng, nom_lenguaje)values (:id_leng, :nom_lenguaje)";

$stm = $conexion ->prepare($sql);

$stm -> bindParam(":nombre" , $nombre);
$stm -> bindParam(":apellido" , $apellido);
$stm -> bindParam(":correo" , $correo);
$stm -> bindParam(":fecha_nacimiento" , $fecha_nacimiento);
$stm -> bindParam(":fk_id_genero" , $fk_id_genero);
$stm -> bindParam(":fk_id_ciudad" , $fk_id_ciudad);

$stm -> execute();

$id_usuario = $conexion ->lastInsertId();
foreach ($id_leng as $key => $value){
    $sql = "INSERT INTO LENGUAJES (id_leng, nom_lenguaje) values (:id_leng, :nom_lenguaje)";
    $stm = $conexion ->prepare($sql);
    $stm -> bindParam(":id_leng" , $id_leng);
    var_dump($key);
    echo "<br>";
    var_dump($value);
}

// $usuario = $stm -> execute();

// $id_usuario  = $conexion -> lastInsertId();

// var_dump($id_usuario);