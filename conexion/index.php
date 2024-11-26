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

<form action="controlador.php" method="post">
    <fieldset>
        <legend>Conexión PHP a MySQL</legend>
        <div>
            <label for="nombre">Nombres</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
        </div>
        <div>
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        <div>
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" placeholder="Correo" required>
        </div>
        <div>
            <label for="fecha_nacimiento">Fecha Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
        <div>
            <label for="id_ciudad">Ciudades</label>
            <select name="id_ciudad" id="id_ciudad" required>
    <?php foreach ($ciudades as $ciudad) { ?>
        <option value="<?= $ciudad['id'] ?>"><?= $ciudad['nombre'] ?></option>
    <?php } ?>
</select>

        </div>
        <div>
            <label>Género</label>
            <?php foreach ($generos as $genero) { ?>
    <div>
        <label>
            <input type="radio" name="id" value="<?= $genero['id'] ?>" required>
            <?= $genero['nombre'] ?>
        </label>
    </div>
<?php } ?>

        </div>
        <div>
            <label>Lenguajes</label>
            <?php foreach ($lenguajes as $lenguaje) { ?>
    <div>
        <label>
            <input type="checkbox" name="LENGUAJES[]" value="<?= $lenguaje['id'] ?>">
            <?= $lenguaje['nombre'] ?>
        </label>
    </div>
<?php } ?>

        </div>
        <br>
        <button type="submit">Guardar Datos</button>
    </fieldset>
</form>


