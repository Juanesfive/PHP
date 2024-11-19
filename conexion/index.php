<?php


require('conexion.php');

$db = "";
$conexion = "";

$db = new Conexion();
$conexion = $db->getConexion();

$sql = "SELECT * FROM ciudades"; // consulta para las ciudades
$sql_generos = "SELECT * FROM generos";
$sql_lenguajes = "SELECT * FROM LENGUAJES"; // consulta para los generos
// preparar los datos para las ciudades
$bandera = $conexion->prepare($sql);
$bandera->execute();
$ciudades = $bandera->fetchAll();
// preparar los datos para los generos
$bandera_generos = $conexion->prepare($sql_generos);
$bandera_generos->execute();
$generos = $bandera_generos->fetchAll();
// preparar para lenguajes
$bandera_lenguajes = $conexion -> prepare($sql_lenguajes);
$bandera_lenguajes -> execute();
$LENGUAJES = $bandera_lenguajes ->fetchAll();



?>
<form action="controlador.php" method="post">
    <fieldset>
        <legend>Conexion PHP a MySQL</legend>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido">
        </div>
        <div>
            <label for="correo">Correo</label>
            <input type="text" id="correo" name="correo" placeholder="Correo">
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="Fecha">
        </div>

        <div>
            <label for="id_ciudad">Ciudades</label>
            <select name="id_ciudad" id="id_ciudad">
                <?php
                
                foreach ($ciudades as $key => $value) {
                ?>
                    <option id="<?= $value['id_ciudad'] ?>" value="<?= $value['id_ciudad'] ?>">
                        <?= $value['nom_ciudad'] ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>

        <div>
            
            <?php
                echo "<br>";
            foreach ($generos as $key => $value) {
            ?>
                <div>
                    <label for="GENEROS<?= $value['id_genero'] ?>"><?= $value['nom_genero'] ?>
                        <input type="radio" name="id_genero" value="<?= $value['id_genero'] ?>" id="GENEROS<?= $value['id_genero'] ?>">
                    </label>
                </div>
            <?php
            }
            ?>
        </div>

        <div>
            <?php
                echo "<br>";
            foreach ($LENGUAJES as $key => $value) {
            ?>
                <div>
                    <label for="LENGUAJES<?= $value['id_leng'] ?>"><?= $value['nom_lenguaje'] ?>
                        <input type="checkbox" name="LENGUAJES []" value="<?= $value['id_leng'] ?>" id="LENGUAJES<?= $value['id_leng'] ?>">
                    </label>
                </div>
            <?php
            }

            ?>
        </div>
        
            <br>
        <button>Guardar Datos</button>
    </fieldset>
</form>