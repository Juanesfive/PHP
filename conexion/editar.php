<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();


$id = $_GET('id');