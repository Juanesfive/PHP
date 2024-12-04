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
<form class="form" action="controlador.php" method="post">
    <fieldset>
        <legend>Agregar Usuario</legend>
        <div>
            <label class="form__label" for="nombre">Nombres</label>
            <input class="form__input" type="text" id="nombre" name="nombre" placeholder="Nombre"  required>
        </div>
        <div>
            <label class="form__label" for="apellido">Apellido</label>
            <input class="form__input" type="text" id="apellido" name="apellido" placeholder="Apellido" required>
        </div>
        <div>
            <label class="form__label" for="correo">Correo</label>
            <input class="form__input" type="email" id="correo" name="correo" placeholder="Correo" required>
        </div>
        <div>
            <label class="form__label" for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
        </div>
        <div>
            <label class="form__label" for="id_ciudad">Ciudad</label>
            <select class="form__select"  name="id_ciudad" id="id_ciudad" required>
                <?php foreach ($ciudades as $ciudad) { ?>
                    <option value="<?= $ciudad['id_ciudad'] ?>"><?= $ciudad['nombre_ciudades'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label class="form__label">Género</label>
            <?php foreach ($generos as $genero) { ?>
                <div>
                    <label>
                        <input type="radio" name="id_genero" value="<?= $genero['id_genero'] ?>" required>
                        <?= $genero['nombre_genero'] ?>
                    </label>
                </div>
            <?php } ?>
        </div>
        <div>
            <label class="form__label">Lenguajes</label>
            <?php foreach ($lenguajes as $lenguaje) { ?>
                <div>
                    <label>
                        <input type="checkbox" name="LENGUAJES[]" value="<?= $lenguaje['id_lenguaje'] ?>">
                        <?= $lenguaje['nombre_lenguajes'] ?>
                    </label>
                </div>
            <?php } ?>
        </div>
        <button class="form__button" type="submit">Guardar Datos</button>
    </fieldset>
</form>
