<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();

// Consultar ciudades
$sql_ciudades = "SELECT * FROM ciudades";
$stm_ciudades = $conexion->prepare($sql_ciudades);
$stm_ciudades->execute();
$ciudades = $stm_ciudades->fetchAll();

// Consultar géneros
$sql_generos = "SELECT * FROM generos";
$stm_generos = $conexion->prepare($sql_generos);
$stm_generos->execute();
$generos = $stm_generos->fetchAll();

// Consultar lenguajes
$sql_lenguajes = "SELECT * FROM lenguajes";
$stm_lenguajes = $conexion->prepare($sql_lenguajes);
$stm_lenguajes->execute();
$lenguajes = $stm_lenguajes->fetchAll();
?>

<link rel="stylesheet" type="text/css" href="./style.css">
<form class="formulario" action="controlador.php" method="post">
    <fieldset>
        <legend>Agregar Usuario</legend>
        <div>
            <label class="formulario__datos" for="nombre">Nombres</label>
            <input class="formulario__entrada-datos" type="text" id="nombre" name="nombre" placeholder="Nombre"  required>
        </div>
        <div>
            <label class="formulario__datos" for="apellido">Apellido</label>
            <input class="formulario__entrada-datos" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        <div>
            <label class="formulario__datos" for="correo">Correo</label>
            <input class="formulario__entrada-datos" type="email" id="correo" name="correo" placeholder="Correo" required>
        </div>
        <div>
            <label class="formulario__datos" for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input class="formulario__entrada-datos" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
        <div>
            <label class="formulario__datos" for="id_ciudad">Ciudad</label>
            <select class="formulario__ciudad"  name="id_ciudad" id="id_ciudad" required>
                <?php foreach ($ciudades as $key => $value) { ?>
                    <option value="<?= $value['id_ciudad'] ?>"><?= $value['nombre_ciudades'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label class="formulario__datos">Género</label>
            <?php foreach ($generos as $key => $value) { ?>
                <div>
                    <label>
                        <input type="radio" name="id_genero" value="<?= $value['id_genero'] ?>" required>
                        <?= $value['nombre_genero'] ?>
                    </label>
                </div>
            <?php } ?>
        </div>
        <div>
            <label class="formulario__datos">Lenguajes</label>
            <?php foreach ($lenguajes as $key => $value) { ?>
                <div>
                    <label>
                        <input type="checkbox" name="LENGUAJES[]" value="<?= $value['id_lenguaje'] ?>">
                        <?= $value['nombre_lenguajes'] ?>
                    </label>
                </div>
            <?php } ?>
        </div>
        <button class="formulario__boton" type="submit">Guardar Datos</button>
    </fieldset>
</form>
