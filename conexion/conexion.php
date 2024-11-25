<?php

class Conexion
{
    private $conexion;
    private $host = "localhost";
    private $db = "adso_2894667";
    private $usuario = "JuanVasquez_2894667"; 
    private $contrasena = "#Aprendiz2024";

    public function __construct()
    {
        try {
            $opciones = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8mb4";
            $this->conexion = new PDO($dsn, $this->usuario, $this->contrasena, $opciones);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConexion()
    {
        return $this->conexion;
    }

    public function cerrarConexion()
    {
        $this->conexion = null;
    }
}
