<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <?php
            $_POST['numero'];

        ?>

    <form action="./controlador.php" method="post">
      <div>
        <label for="nombre">Ingrese el nombre</label>
        <input type="text" name="nombre" id="Nombre" />
      </div>
      <br />
      <div>
        <label for="apellido">Ingrese el apellido</label>
        <input type="text" name="apellido" id="apellido" />
      </div>
      <br />
      <div>
        <label for="edad">Ingrese la edad</label>
        <input type="text" name="edad" id="edad" />
      </div>
      <br />
      <div>
        <label for="telefono">Ingrese el telefono</label>
        <input type="text" name="telefono" id="telefono" />
      </div>
      <br />

      <div>
        <label for="css">CSS</label>
        <input type="checkbox" name="checkbox[]" id="css" value="css" />
      </div>

      <div>
        <label for="js">JAVASCRIPT</label>
        <input type="checkbox" name="checkbox[]" id="js" value="js"/>
      </div>

      <div>
        <label for="html">HTML</label>
        <input type="checkbox" name="checkbox[]" id="html" value="html"/>
      </div>

      <button type="submit">Enviar</button>
    </form>
  </body>
</html>
