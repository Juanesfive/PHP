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
<form class="form" action="actualizar.php" method="post">
        <fieldset>
            <legend>Editar Usuario</legend>
            <input type="hidden" name="id" value="<?= $usuario['id_usuarios'] ?>">
            <div>
                <label class="form__label" for="nombre">Nombre</label>
                <input class="form__input" type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
            </div>
            <div>
                <label class="form__label" for="apellido">Apellido</label>
                <input class="form__input" type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
            </div>
            <div>
                <label class="form__label" for="correo">Correo</label>
                <input class="form__input" type="email" id="correo" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
            </div>
            <div>
                <label class="form__label" for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input class="form__input" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= htmlspecialchars($usuario['fecha_nacimiento']) ?>" required>
            </div>
            <div>
                <label class="form__label">Género</label>
                <?php foreach ($generos as $genero) { ?>
                    <div>
                        <label>
                            <input type="radio" name="id_genero" value="<?= $genero['id_genero'] ?>" <?= $genero['id_genero'] == $usuario['id_genero'] ? 'checked' : '' ?>>
                            <?= $genero['nombre_genero'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <div>
                <label class="form__label" for="id_ciudad">Ciudad</label>
                <select class="form__select" name="id_ciudad" id="id_ciudad" required>
                    <?php foreach ($ciudades as $ciudad) { ?>
                        <option value="<?= $ciudad['id_ciudad'] ?>" <?= $ciudad['id_ciudad'] == $usuario['id_ciudad'] ? 'selected' : '' ?>><?= $ciudad['nombre_ciudades'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label class="form__label">Lenguajes</label>
                <?php foreach ($lenguajes as $lenguaje) { ?>
                    <div>
                        <label>
                            <input type="checkbox" name="LENGUAJES[]" value="<?= $lenguaje['id_lenguaje'] ?>" <?= in_array($lenguaje['id_lenguaje'], $lenguajes_usuario) ? 'checked' : '' ?>>
                            <?= $lenguaje['nombre_lenguajes'] ?>
                        </label>
                    </div>
                <?php } ?>
            </div>
            <button class="form__button" type="submit">Actualizar Datos</button>
        </fieldset>
    </form>
</body>
</html>



