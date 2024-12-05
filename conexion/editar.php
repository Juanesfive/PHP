<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();
$id = $_GET['id'];

$sql_usuario = "SELECT * FROM usuarios WHERE id_usuarios = :id";
$stm_usuario = $conexion->prepare($sql_usuario);
$stm_usuario->bindParam(":id", $id);
$stm_usuario->execute();
$usuario = $stm_usuario->fetch();

$sql_ciudades = "SELECT * FROM ciudades";
$ciudades = $conexion->query($sql_ciudades)->fetchAll();

$sql_generos = "SELECT * FROM generos";
$generos = $conexion->query($sql_generos)->fetchAll();

$sql_lenguajes = "SELECT * FROM lenguajes";
$lenguajes = $conexion->query($sql_lenguajes)->fetchAll();

$sql_lenguajes_usuario = "SELECT id_lenguaje FROM lenguajes_usuarios WHERE id_usuario = :id_usuario";
$stm_lenguajes_usuario = $conexion->prepare($sql_lenguajes_usuario);
$stm_lenguajes_usuario->bindParam(":id_usuario", $id);
$stm_lenguajes_usuario->execute();
$lenguajes_usuario = $stm_lenguajes_usuario->fetchAll(PDO::FETCH_COLUMN);
?>
<link rel="stylesheet" type="text/css" href="./style.css">
<form class="formulario" action="actualizar.php" method="post">
        <fieldset>
            <legend>Editar Usuario</legend>
            <input type="hidden" name="id" value="<?= $usuario['id_usuarios'] ?>">
            <div>
                <label class="formulario__datos" for="nombre">Nombre</label>
                <input class="formulario__entrada-datos" type="text" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>" required>
            </div>
            <div>
                <label class="formulario__datos" for="apellido">Apellido</label>
                <input class="formulario__entrada-datos" type="text" id="apellido" name="apellido" value="<?= $usuario['apellido'] ?>" required>
            </div>
            <div>
                <label class="formulario__datos" for="correo">Correo</label>
                <input class="formulario__entrada-datos" type="email" id="correo" name="correo" value="<?= $usuario['correo'] ?>" required>
            </div>
            <div>
                <label class="formulario__datos" for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input class="formulario__entrada-datos" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $usuario['fecha_nacimiento'] ?>" required>
            </div>
            <div>
                <label class="formulario__datos">Género</label>
                <?php foreach ($generos as $key => $value) { ?>
                    <div>
                        <label>
                            <input type="radio" name="id_genero" value="<?= $value['id_genero'] ?>" <?= $value['id_genero'] == $usuario['id_genero'] ? 'checked' : '' ?>>
                            <?= $value['nombre_genero'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <div>
                <label class="formulario__datos" for="id_ciudad">Ciudad</label>
                <select class="formulario__ciudad" name="id_ciudad" id="id_ciudad" required>
                    <?php foreach ($ciudades as $key => $value) { ?>
                        <option value="<?= $value['id_ciudad'] ?>" <?= $value['id_ciudad'] == $usuario['id_ciudad'] ? 'selected' : '' ?>><?= $value['nombre_ciudades'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label class="formulario__datos">Lenguajes</label>
                <?php foreach ($lenguajes as $key => $value) { ?>
                    <div>
                        <label>
                            <input type="checkbox" name="LENGUAJES[]" value="<?= $value['id_lenguaje'] ?>" <?= in_array($value['id_lenguaje'], $lenguajes_usuario) ? 'checked' : '' ?>>
                            <?= $value['nombre_lenguajes'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <button class="formulario__boton" type="submit">Actualizar Datos</button>
        </fieldset>
    </form>
</body>
</html>



