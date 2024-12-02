<?php
require('conexion.php');
$db = new Conexion();
$conexion = $db->getConexion();

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Error: ID no proporcionado.");
}


$sql_usuario = "SELECT * FROM usuarios WHERE id = :id";
$stm_usuario = $conexion->prepare($sql_usuario);
$stm_usuario->execute([':id' => $id]);
$usuario = $stm_usuario->fetch();

if (!$usuario) {
    die("Error: Usuario no encontrado.");
}


$sql_ciudades = "SELECT * FROM ciudades";
$ciudades = $conexion->query($sql_ciudades)->fetchAll();

$sql_generos = "SELECT * FROM generos";
$generos = $conexion->query($sql_generos)->fetchAll();

$sql_lenguajes = "SELECT * FROM lenguajes";
$lenguajes = $conexion->query($sql_lenguajes)->fetchAll();

$sql_lenguajes_usuario = "SELECT id_lenguaje FROM lenguajes_usuarios WHERE id_usuario = :id_usuario";
$stm_lenguajes_usuario = $conexion->prepare($sql_lenguajes_usuario);
$stm_lenguajes_usuario->execute([':id_usuario' => $id]);
$lenguajes_usuario = $stm_lenguajes_usuario->fetchAll(PDO::FETCH_COLUMN);
?>

<form action="actualizar.php" method="post">
    <fieldset>
        <legend>Editar Usuario</legend>
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">

        <div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
        </div>

        <div>
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" value="<?= htmlspecialchars($usuario['apellido']) ?>" required>
        </div>

        <div>
            <label for="correo">Correo</label>
            <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($usuario['correo']) ?>" required>
        </div>

        <div>
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= htmlspecialchars($usuario['fecha_nacimiento']) ?>" required>
        </div>

        <div>
            <label for="id_ciudad">Ciudad</label>
            <select name="id_ciudad" id="id_ciudad" required>
                <?php foreach ($ciudades as $ciudad) { ?>
                    <option value="<?= $ciudad['id'] ?>" <?= $ciudad['id'] == $usuario['id_ciudad'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($ciudad['nombre']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div>
            <label>Género</label>
            <?php foreach ($generos as $genero) { ?>
                <div>
                    <label>
                        <input type="radio" name="id" value="<?= $genero['id'] ?>" <?= $genero['id'] == $usuario['id_genero'] ? 'checked' : '' ?>>
                        <?= htmlspecialchars($genero['nombre']) ?>
                    </label>
                </div>
            <?php } ?>
        </div>

        <div>
            <label>Lenguajes</label>
            <?php foreach ($lenguajes as $lenguaje) { ?>
                <div>
                    <label>
                        <input type="checkbox" name="LENGUAJES[]" value="<?= $lenguaje['id'] ?>" <?= in_array($lenguaje['id'], $lenguajes_usuario) ? 'checked' : '' ?>>
                        <?= htmlspecialchars($lenguaje['nombre']) ?>
                    </label>
                </div>
            <?php } ?>
        </div>

        <br>
        <button type="submit">Actualizar Datos</button>
    </fieldset>
</form>

